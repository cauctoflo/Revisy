<?php
/* Connexion par mot de passe pour revisy : cookie signé, valable 60 jours. */
declare(strict_types=1);

const REVISY_PASS_HASH = '$2y$10$r4ZNLheAbeypkx4a0WKjj.FzgLBYpX8cZs9LvN70F/IOcZVmJfkWW';
const REVISY_COOKIE = 'revisy_auth';
const REVISY_DAYS = 60;

/* Dossier de stockage privé : hors du site si possible, sinon _data/ dans le site. */
function store_dir(): string {
  static $dir = null;
  if ($dir !== null) return $dir;
  $root = dirname(__DIR__);
  $cands = [dirname($root) . '/revisy-data', $root . '/_data'];
  foreach ($cands as $c) {
    if ((is_dir($c) || @mkdir($c, 0700, true)) && is_writable($c)) { $dir = $c; break; }
  }
  if ($dir === null) { http_response_code(500); exit('Stockage indisponible'); }
  foreach (['files'] as $sub) if (!is_dir("$dir/$sub")) @mkdir("$dir/$sub", 0700, true);
  if (!file_exists("$dir/index.html")) @file_put_contents("$dir/index.html", '');
  if (!file_exists("$dir/.htaccess")) @file_put_contents("$dir/.htaccess", "Require all denied\n");
  return $dir;
}

/* Lecture / écriture JSON protégée : chaque fichier commence par <?php exit; ?> */
function jread(string $name, $default = null) {
  $f = store_dir() . "/$name.php";
  if (!is_file($f)) return $default;
  $raw = (string)file_get_contents($f);
  $p = strpos($raw, "\n");
  $j = json_decode($p === false ? '' : substr($raw, $p + 1), true);
  return $j === null ? $default : $j;
}
function jwrite(string $name, $data): void {
  $f = store_dir() . "/$name.php";
  $tmp = $f . '.' . bin2hex(random_bytes(4)) . '.tmp';
  file_put_contents($tmp, "<?php exit; ?>\n" . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
  rename($tmp, $f);
}

function secret(): string {
  $s = jread('secret');
  if (!is_string($s) || strlen($s) < 32) { $s = bin2hex(random_bytes(32)); jwrite('secret', $s); }
  return $s;
}
function client_ip(): string {
  return $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '?';
}
function is_https(): bool {
  return (($_SERVER['HTTPS'] ?? '') !== '' && $_SERVER['HTTPS'] !== 'off')
    || ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https';
}
function make_token(): string {
  $exp = time() + REVISY_DAYS * 86400;
  return $exp . '.' . hash_hmac('sha256', (string)$exp, secret());
}
function is_logged(): bool {
  $t = $_COOKIE[REVISY_COOKIE] ?? '';
  if (!preg_match('/^(\d{10})\.([a-f0-9]{64})$/', $t, $m)) return false;
  if ((int)$m[1] < time()) return false;
  return hash_equals(hash_hmac('sha256', $m[1], secret()), $m[2]);
}
function set_login_cookie(): void {
  setcookie(REVISY_COOKIE, make_token(), [
    'expires' => time() + REVISY_DAYS * 86400, 'path' => '/',
    'secure' => is_https(), 'httponly' => true, 'samesite' => 'Lax',
  ]);
}
function clear_login_cookie(): void {
  setcookie(REVISY_COOKIE, '', ['expires' => 1, 'path' => '/', 'secure' => is_https(), 'httponly' => true, 'samesite' => 'Lax']);
}

/* Anti-force brute : 8 essais ratés par IP et par 15 minutes. */
function too_many_attempts(): bool {
  $a = jread('attempts', []);
  $ip = client_ip(); $now = time();
  $list = array_values(array_filter($a[$ip] ?? [], fn($t) => $t > $now - 900));
  return count($list) >= 8;
}
function note_failure(): void {
  $a = jread('attempts', []);
  $ip = client_ip(); $now = time();
  foreach ($a as $k => $v) { $a[$k] = array_values(array_filter($v, fn($t) => $t > $now - 900)); if (!$a[$k]) unset($a[$k]); }
  $a[$ip][] = $now;
  jwrite('attempts', $a);
}

function safe_next(string $n): string {
  return (preg_match('#^/[A-Za-z0-9/_\-.?=&%]*$#', $n) && !str_starts_with($n, '//')) ? $n : '/site/';
}

/* À appeler en haut de chaque page protégée. */
function require_login(bool $api = false): void {
  header('X-Robots-Tag: noindex, nofollow');
  if (is_logged()) return;
  if ($api) { http_response_code(401); header('Content-Type: application/json'); echo '{"error":"auth"}'; exit; }
  header('Location: /login.php?next=' . rawurlencode($_SERVER['REQUEST_URI'] ?? '/site/'));
  exit;
}
