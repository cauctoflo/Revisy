<?php
require __DIR__ . '/lib/auth.php';
header('X-Robots-Tag: noindex, nofollow');
$next = safe_next((string)($_GET['next'] ?? $_POST['next'] ?? '/site/'));
$err = '';
if (isset($_GET['out'])) { clear_login_cookie(); header('Location: /login.php'); exit; }
if (is_logged() && $_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ' . $next); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (too_many_attempts()) { $err = 'Trop d\'essais. Réessaie dans un quart d\'heure.'; }
  elseif (password_verify((string)($_POST['pass'] ?? ''), REVISY_PASS_HASH)) { set_login_cookie(); header('Location: ' . $next); exit; }
  else { note_failure(); usleep(600000); $err = 'Mot de passe incorrect.'; }
}
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES);
?><!doctype html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow"><title>Connexion · Révisions BUT1</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Bricolage+Grotesque:opsz,wght@12..96,700;12..96,800&family=Atkinson+Hyperlegible:wght@400;700&display=swap">
<style>
:root{--paper:#fffefb;--ink:#111;--muted:#5f5f5f;--line:#dcdcd9;--grid:rgba(96,125,170,.16);--accent:#4338ca}
@media (prefers-color-scheme:dark){:root{--paper:#121212;--ink:#f2f2f2;--muted:#a3a3a3;--line:#2c2c2c;--grid:rgba(160,180,220,.08);--accent:#a5b4fc}}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;display:grid;place-items:center;padding:16px;background-color:var(--paper);color:var(--ink);
 background-image:linear-gradient(var(--grid) 1px,transparent 1px),linear-gradient(90deg,var(--grid) 1px,transparent 1px);background-size:22px 22px;font:16px/1.45 "Atkinson Hyperlegible",system-ui,sans-serif}
.card{width:100%;max-width:380px;background:var(--paper);border:1.5px solid var(--line);border-radius:16px;padding:28px 24px;box-shadow:4px 4px 0 rgba(0,0,0,.12)}
h1{margin:0;font:700 40px/1 Caveat,cursive}
h1 span{background:linear-gradient(transparent 55%,rgba(255,226,90,.9) 55%,rgba(255,226,90,.9) 92%,transparent 92%)}
p{color:var(--muted);margin:8px 0 20px}
.dots{display:flex;gap:6px;margin:0 0 18px}.dots i{width:14px;height:14px;border-radius:50%}
label{font-weight:700;display:block;margin-bottom:6px}
input{width:100%;font:inherit;padding:12px 14px;border-radius:10px;border:1.5px solid var(--line);background:transparent;color:var(--ink)}
input:focus{outline:2px solid var(--accent);outline-offset:1px}
button{margin-top:14px;width:100%;font:800 17px "Bricolage Grotesque",sans-serif;padding:12px;border:0;border-radius:10px;background:var(--ink);color:var(--paper);cursor:pointer}
.err{color:#c62828;font-weight:700;margin:10px 0 0}
</style></head><body>
<form class="card" method="post" autocomplete="on">
  <div class="dots" aria-hidden="true"><i style="background:#1d4ed8"></i><i style="background:#c2410c"></i><i style="background:#0e7490"></i><i style="background:#15803d"></i><i style="background:#0f766e"></i><i style="background:#b4235a"></i><i style="background:#4338ca"></i></div>
  <h1><span>Révisions BUT1</span></h1>
  <p>Ton carnet de révision privé. Entre le mot de passe pour continuer.</p>
  <label for="pass">Mot de passe</label>
  <input id="pass" name="pass" type="password" required autofocus autocomplete="current-password">
  <input type="hidden" name="next" value="<?= $h($next) ?>">
  <button type="submit">Entrer</button>
  <?php if ($err): ?><p class="err" role="alert"><?= $h($err) ?></p><?php endif; ?>
</form>
</body></html>
