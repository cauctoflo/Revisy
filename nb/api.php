<?php
/* API du carnet de révision (façon NotebookLM). Tout est stocké en JSON dans le dossier privé. */
require dirname(__DIR__) . '/lib/auth.php';
require_login(true);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

const SUBJECTS = ['r101','r102','r103','r104','r105','r106','r107','autre'];

function out($d, int $code = 200): void { http_response_code($code); echo json_encode($d, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); exit; }
function fail(string $m, int $code = 400): void { out(['error' => $m], $code); }
function uid(string $p = ''): string { return $p . bin2hex(random_bytes(6)); }
function body(): array {
  static $b = null;
  if ($b !== null) return $b;
  $ct = $_SERVER['CONTENT_TYPE'] ?? '';
  if (str_contains($ct, 'application/json')) { $b = json_decode((string)file_get_contents('php://input'), true) ?: []; }
  else $b = $_POST;
  return $b;
}
function arg(string $k, $def = null) { $b = body(); return $b[$k] ?? $_GET[$k] ?? $def; }
function str(string $k, int $max = 2000): string { return mb_substr(trim((string)arg($k, '')), 0, $max); }
function nbid(): string { $id = (string)arg('nb', arg('id', '')); if (!preg_match('/^n[a-f0-9]{12}$/', $id)) fail('carnet inconnu', 404); return $id; }
function index(): array { return jread('notebooks', []); }
function save_index(array $l): void { jwrite('notebooks', array_values($l)); }
function load(string $id): array { $n = jread("nb-$id"); if (!is_array($n)) fail('carnet introuvable', 404); return $n; }
function blank(): array { return ['sources' => [], 'notes' => [], 'requests' => [], 'decks' => [], 'fiches' => [], 'quizzes' => []]; }
function save(string $id, array $n): void {
  jwrite("nb-$id", $n);
  $l = index();
  foreach ($l as &$e) if ($e['id'] === $id) {
    $e['updated'] = time();
    $e['counts'] = ['sources' => count($n['sources']), 'cards' => array_sum(array_map(fn($d) => count($d['cards'] ?? []), $n['decks'])),
      'fiches' => count($n['fiches']), 'pending' => count(array_filter($n['requests'], fn($r) => ($r['status'] ?? '') === 'pending'))];
  }
  save_index($l);
}
function clean_html(string $h): string {
  /* contenu écrit par Claude : on retire scripts, handlers et iframes par sécurité */
  $h = preg_replace('#<(script|iframe|object|embed|style)\b[^>]*>.*?</\1>#is', '', $h);
  $h = preg_replace('#\son[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)#i', '', $h);
  return preg_replace('#javascript:#i', '', $h);
}
function norm_cards($cards): array {
  $o = [];
  foreach ((array)$cards as $c) {
    $q = mb_substr(trim((string)($c['q'] ?? '')), 0, 2000); $a = mb_substr(trim((string)($c['a'] ?? '')), 0, 4000);
    if ($q === '' || $a === '') continue;
    $o[] = ['id' => preg_match('/^c[a-z0-9]{4,40}$/', (string)($c['id'] ?? '')) ? $c['id'] : uid('c'), 'q' => $q, 'a' => $a, 'tag' => mb_substr((string)($c['tag'] ?? ''), 0, 60)];
  }
  return $o;
}
function seed_into(array &$n, string $subj): void {
  $f = __DIR__ . "/seed/$subj.json";
  if (!is_file($f)) return;
  $s = json_decode((string)file_get_contents($f), true) ?: [];
  import_payload($n, $s, 'seed');
  $n['seedv'] = md5_file($f);
}
/* Un carnet prêt par matière, créé une seule fois (s'il est supprimé, il ne revient pas). */
const SUBJ_NAMES = ['r106' => ['R1.06 Maths discrètes', '🔢'], 'r107' => ['R1.07 Outils mathématiques', '🧮'], 'r104' => ['R1.04 Systèmes', '🐧'],
  'r101' => ['R1.01 Init Dev', '💻'], 'r103' => ['R1.03 Architecture', '💾'], 'r105' => ['R1.05 Bases de données', '🗄️'], 'r102' => ['R1.02 Web HTML / CSS', '🌐']];
function auto_create(): void {
  $done = jread('autocreated', []); $l = index(); $have = array_column($l, 'subject'); $changed = false;
  foreach (SUBJ_NAMES as $subj => [$title, $emoji]) {
    if (in_array($subj, $done, true) || !is_file(__DIR__ . "/seed/$subj.json")) continue;
    $done[] = $subj; $changed = true;
    if (in_array($subj, $have, true)) continue;
    $id = uid('n'); $n = blank(); seed_into($n, $subj);
    $l[] = ['id' => $id, 'title' => $title, 'subject' => $subj, 'emoji' => $emoji, 'created' => time(), 'updated' => time()];
    save_index($l); save($id, $n); $l = index();
  }
  if ($changed) jwrite('autocreated', $done);
}
/* Quand le contenu d'une matière est mis à jour (nouveau seed), les carnets existants le reçoivent à l'ouverture. */
function sync_seed(string $id, array &$n, string $subj): void {
  if (!in_array($subj, SUBJECTS, true)) return;
  $f = __DIR__ . "/seed/$subj.json";
  if (!is_file($f) || ($n['seedv'] ?? '') === md5_file($f)) return;
  seed_into($n, $subj); save($id, $n);
}
function import_payload(array &$n, array $p, string $by = 'claude'): array {
  $r = ['decks' => 0, 'fiches' => 0, 'quizzes' => 0, 'sources' => 0, 'requests' => 0];
  foreach ((array)($p['decks'] ?? []) as $d) {
    $title = mb_substr(trim((string)($d['title'] ?? 'Cartes')), 0, 120); $cards = norm_cards($d['cards'] ?? []);
    if (!$cards) continue;
    $found = false;
    foreach ($n['decks'] as &$ed) if ($ed['title'] === $title && ($ed['by'] ?? '') !== 'moi') { $ed['cards'] = $cards; $ed['at'] = time(); $found = true; }
    unset($ed);
    if (!$found) $n['decks'][] = ['id' => uid('d'), 'title' => $title, 'by' => $by, 'at' => time(), 'cards' => $cards];
    $r['decks']++;
  }
  foreach ((array)($p['fiches'] ?? []) as $f) {
    $title = mb_substr(trim((string)($f['title'] ?? 'Fiche')), 0, 160); $html = clean_html((string)($f['html'] ?? ''));
    if ($html === '') continue;
    $found = false;
    foreach ($n['fiches'] as &$ef) if ($ef['title'] === $title) { $ef['html'] = $html; $ef['at'] = time(); $found = true; }
    unset($ef);
    if (!$found) $n['fiches'][] = ['id' => uid('f'), 'title' => $title, 'by' => $by, 'at' => time(), 'html' => $html];
    $r['fiches']++;
  }
  foreach ((array)($p['quizzes'] ?? []) as $q) {
    $qs = [];
    foreach ((array)($q['questions'] ?? []) as $x) {
      $ch = array_values(array_map('strval', (array)($x['choices'] ?? [])));
      if (!isset($x['q']) || count($ch) < 2) continue;
      $qs[] = ['q' => (string)$x['q'], 'choices' => $ch, 'answer' => max(0, min(count($ch) - 1, (int)($x['answer'] ?? 0))), 'expl' => (string)($x['expl'] ?? '')];
    }
    if (!$qs) continue;
    $title = mb_substr((string)($q['title'] ?? 'Quiz'), 0, 120); $found = false;
    foreach ($n['quizzes'] as &$eq) if ($eq['title'] === $title && ($eq['by'] ?? '') !== 'moi') { $eq['questions'] = $qs; $eq['at'] = time(); $found = true; }
    unset($eq);
    if (!$found) $n['quizzes'][] = ['id' => uid('q'), 'title' => $title, 'by' => $by, 'at' => time(), 'questions' => $qs];
    $r['quizzes']++;
  }
  foreach ((array)($p['sources'] ?? []) as $s) {
    if ($by === 'seed') {
      $found = false;
      foreach ($n['sources'] as &$es) if (($es['by'] ?? '') === 'seed' && $es['title'] === (string)($s['title'] ?? '')) { $es['text'] = mb_substr((string)($s['text'] ?? ''), 0, 400000); $found = true; }
      unset($es);
      if ($found) continue;
    }
    $n['sources'][] = ['id' => uid('s'), 'type' => in_array($s['type'] ?? '', ['link', 'site'], true) ? $s['type'] : 'text',
      'title' => mb_substr((string)($s['title'] ?? 'Source'), 0, 200), 'text' => mb_substr((string)($s['text'] ?? ''), 0, 400000),
      'url' => (string)($s['url'] ?? ''), 'at' => time(), 'by' => $by];
    $r['sources']++;
  }
  foreach ((array)($p['done'] ?? []) as $d) {
    foreach ($n['requests'] as &$rq) if ($rq['id'] === ($d['id'] ?? '')) { $rq['status'] = 'done'; $rq['reply'] = mb_substr((string)($d['reply'] ?? ''), 0, 4000); $rq['doneAt'] = time(); $r['requests']++; }
    unset($rq);
  }
  return $r;
}

/* Répétition espacée (SM-2 simplifié). grade : 0 à revoir, 1 difficile, 2 bien, 3 facile */
function schedule(array $p, int $g): array {
  $ef = $p['ef'] ?? 2.5; $iv = $p['iv'] ?? 0; $reps = $p['reps'] ?? 0; $lapses = $p['lapses'] ?? 0;
  if ($g === 0) { $reps = 0; $lapses++; $iv = 0; $due = time() + 600; $ef = max(1.3, $ef - 0.2); }
  else {
    $q = [1 => 3, 2 => 4, 3 => 5][$g];
    $ef = max(1.3, $ef + (0.1 - (5 - $q) * (0.08 + (5 - $q) * 0.02)));
    if ($reps === 0) $iv = $g === 3 ? 3 : 1;
    elseif ($reps === 1) $iv = $g === 1 ? 3 : 6;
    else $iv = (int)round($iv * ($g === 1 ? 1.2 : $ef) * ($g === 3 ? 1.3 : 1));
    $reps++; $due = time() + max(1, $iv) * 86400 - 3600 * 4;
  }
  return ['ef' => round($ef, 2), 'iv' => $iv, 'reps' => $reps, 'lapses' => $lapses, 'due' => $due, 'last' => time(), 'g' => $g];
}

$a = (string)($_GET['a'] ?? '');
switch ($a) {
  case 'list':
    auto_create();
    foreach (index() as $e) { $n = jread('nb-' . $e['id']); if (is_array($n)) sync_seed($e['id'], $n, (string)($e['subject'] ?? '')); }
    out(['notebooks' => index(), 'progress' => jread('progress', (object)[])]);

  case 'create': {
    $subj = in_array(arg('subject'), SUBJECTS, true) ? arg('subject') : 'autre';
    $title = str('title', 120) ?: 'Nouveau carnet';
    $id = uid('n'); $n = blank(); seed_into($n, $subj);
    $l = index(); $l[] = ['id' => $id, 'title' => $title, 'subject' => $subj, 'emoji' => str('emoji', 8), 'created' => time(), 'updated' => time()];
    save_index($l); save($id, $n);
    out(['id' => $id]);
  }
  case 'update_nb': {
    $id = nbid(); $l = index();
    foreach ($l as &$e) if ($e['id'] === $id) {
      if (arg('title') !== null) $e['title'] = str('title', 120) ?: $e['title'];
      if (in_array(arg('subject'), SUBJECTS, true)) $e['subject'] = arg('subject');
      if (arg('emoji') !== null) $e['emoji'] = str('emoji', 8);
    }
    save_index($l); out(['ok' => true]);
  }
  case 'delete_nb': {
    $id = nbid(); $n = jread("nb-$id", blank());
    foreach ($n['sources'] as $s) if (!empty($s['file'])) @unlink(store_dir() . '/files/' . basename($s['file']));
    @unlink(store_dir() . "/nb-$id.php");
    save_index(array_filter(index(), fn($e) => $e['id'] !== $id)); out(['ok' => true]);
  }
  case 'get': {
    $id = nbid(); $meta = null; foreach (index() as $e) if ($e['id'] === $id) $meta = $e;
    if (!$meta) fail('carnet introuvable', 404);
    $n = load($id); sync_seed($id, $n, (string)($meta['subject'] ?? ''));
    out(['meta' => $meta, 'nb' => $n, 'progress' => jread('progress', (object)[])]);
  }
  case 'add_source': {
    $id = nbid(); $n = load($id); $type = (string)arg('type', 'text');
    $s = ['id' => uid('s'), 'type' => 'text', 'title' => str('title', 200), 'text' => mb_substr((string)arg('text', ''), 0, 400000), 'url' => '', 'at' => time(), 'by' => 'moi'];
    if ($type === 'file') {
      $f = $_FILES['file'] ?? null;
      if (!$f || $f['error'] !== UPLOAD_ERR_OK) fail('envoi du fichier impossible (taille ?)');
      if ($f['size'] > 40 * 1024 * 1024) fail('fichier trop gros (40 Mo max)');
      $name = bin2hex(random_bytes(16)) . '.bin';
      if (!move_uploaded_file($f['tmp_name'], store_dir() . "/files/$name")) fail('enregistrement impossible', 500);
      $s['type'] = 'file'; $s['file'] = $name; $s['mime'] = preg_replace('#[^a-z0-9/.+-]#i', '', (string)($f['type'] ?: 'application/octet-stream'));
      $s['size'] = (int)$f['size']; $s['title'] = $s['title'] ?: mb_substr((string)$f['name'], 0, 200);
    } elseif ($type === 'link') {
      $url = str('url', 1000); if (!preg_match('#^https?://#i', $url)) fail('lien invalide');
      $s['type'] = 'link'; $s['url'] = $url; $s['title'] = $s['title'] ?: $url;
    } elseif ($type === 'site') {
      $s['type'] = 'site'; $s['url'] = str('url', 300);
    }
    if ($s['title'] === '') $s['title'] = mb_substr(trim(preg_replace('/\s+/', ' ', $s['text'])), 0, 60) ?: 'Source';
    $n['sources'][] = $s; save($id, $n); out(['source' => $s]);
  }
  case 'del_source': {
    $id = nbid(); $n = load($id); $sid = str('sid', 40);
    foreach ($n['sources'] as $s) if ($s['id'] === $sid && !empty($s['file'])) @unlink(store_dir() . '/files/' . basename($s['file']));
    $n['sources'] = array_values(array_filter($n['sources'], fn($s) => $s['id'] !== $sid)); save($id, $n); out(['ok' => true]);
  }
  case 'file': {
    $id = nbid(); $n = load($id); $sid = (string)($_GET['sid'] ?? '');
    foreach ($n['sources'] as $s) if ($s['id'] === $sid && !empty($s['file'])) {
      $p = store_dir() . '/files/' . basename($s['file']); if (!is_file($p)) break;
      header('Content-Type: ' . ($s['mime'] ?? 'application/octet-stream'));
      header('Content-Length: ' . filesize($p));
      header('Content-Disposition: inline; filename="' . rawurlencode($s['title']) . '"');
      header('X-Content-Type-Options: nosniff');
      header("Content-Security-Policy: default-src 'none'; style-src 'unsafe-inline'; img-src data:; object-src 'self'; sandbox");
      readfile($p); exit;
    }
    fail('fichier introuvable', 404);
  }
  case 'note_save': {
    $id = nbid(); $n = load($id); $nid = str('nid', 40); $text = mb_substr((string)arg('text', ''), 0, 20000);
    $done = false;
    foreach ($n['notes'] as &$x) if ($x['id'] === $nid) { $x['text'] = $text; $x['at'] = time(); $done = true; }
    unset($x);
    if (!$done) $n['notes'][] = ['id' => uid('t'), 'text' => $text, 'at' => time()];
    save($id, $n); out(['notes' => $n['notes']]);
  }
  case 'note_del': {
    $id = nbid(); $n = load($id); $nid = str('nid', 40);
    $n['notes'] = array_values(array_filter($n['notes'], fn($x) => $x['id'] !== $nid)); save($id, $n); out(['notes' => $n['notes']]);
  }
  case 'request_add': {
    $id = nbid(); $n = load($id); $text = str('text', 4000); if ($text === '') fail('demande vide');
    $n['requests'][] = ['id' => uid('r'), 'text' => $text, 'kind' => str('kind', 30), 'sources' => array_values(array_map('strval', (array)arg('sources', []))), 'at' => time(), 'status' => 'pending'];
    save($id, $n); out(['requests' => $n['requests']]);
  }
  case 'request_del': {
    $id = nbid(); $n = load($id); $rid = str('rid', 40);
    $n['requests'] = array_values(array_filter($n['requests'], fn($x) => $x['id'] !== $rid)); save($id, $n); out(['requests' => $n['requests']]);
  }
  case 'deck_save': {
    $id = nbid(); $n = load($id); $d = (array)arg('deck', []); $did = (string)($d['id'] ?? '');
    $deck = ['id' => preg_match('/^d[a-f0-9]{12}$/', $did) ? $did : uid('d'), 'title' => mb_substr(trim((string)($d['title'] ?? 'Mes cartes')), 0, 120) ?: 'Mes cartes', 'by' => 'moi', 'at' => time(), 'cards' => norm_cards($d['cards'] ?? [])];
    $done = false;
    foreach ($n['decks'] as &$x) if ($x['id'] === $deck['id']) { $deck['by'] = $x['by'] ?? 'moi'; $x = $deck; $done = true; }
    unset($x);
    if (!$done) $n['decks'][] = $deck;
    save($id, $n); out(['deck' => $deck]);
  }
  case 'deck_del': {
    $id = nbid(); $n = load($id); $did = str('did', 40);
    $n['decks'] = array_values(array_filter($n['decks'], fn($x) => $x['id'] !== $did)); save($id, $n); out(['ok' => true]);
  }
  case 'fiche_del': {
    $id = nbid(); $n = load($id); $fid = str('fid', 40);
    $n['fiches'] = array_values(array_filter($n['fiches'], fn($x) => $x['id'] !== $fid)); save($id, $n); out(['ok' => true]);
  }
  case 'quiz_del': {
    $id = nbid(); $n = load($id); $qid = str('qid', 40);
    $n['quizzes'] = array_values(array_filter($n['quizzes'], fn($x) => $x['id'] !== $qid)); save($id, $n); out(['ok' => true]);
  }
  case 'review': {
    $cid = str('cid', 60); $g = (int)arg('g', 2); if ($cid === '' || $g < 0 || $g > 3) fail('note invalide');
    $p = jread('progress', []); $p[$cid] = schedule($p[$cid] ?? [], $g); jwrite('progress', $p);
    $log = jread('log', []); $day = date('Y-m-d'); $log[$day] = ($log[$day] ?? 0) + 1; jwrite('log', $log);
    out(['p' => $p[$cid]]);
  }
  case 'stats':
    out(['log' => jread('log', (object)[])]);
  case 'import': {
    $id = nbid(); $n = load($id); $p = (array)arg('payload', []);
    $r = import_payload($n, $p, 'claude'); save($id, $n); out(['imported' => $r]);
  }
  case 'export': {
    $all = [];
    foreach (index() as $e) {
      if (arg('nb') && arg('nb') !== $e['id']) continue;
      $n = jread('nb-' . $e['id'], blank());
      $all[] = ['meta' => $e, 'sources' => array_map(fn($s) => array_diff_key($s, ['file' => 1]), $n['sources']), 'notes' => $n['notes'],
        'requests' => $n['requests'], 'decks' => array_map(fn($d) => ['id' => $d['id'], 'title' => $d['title'], 'by' => $d['by'] ?? '', 'n' => count($d['cards'])], $n['decks']),
        'fiches' => array_map(fn($f) => ['id' => $f['id'], 'title' => $f['title']], $n['fiches'])];
    }
    out(['notebooks' => $all]);
  }
  default:
    fail('action inconnue');
}
