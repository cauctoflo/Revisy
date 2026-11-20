<?php require dirname(__DIR__) . '/lib/auth.php'; require_login(); ?><!doctype html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="robots" content="noindex,nofollow"><title>Carnets · Révisions BUT1</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Patrick+Hand&family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono:wght@400;600&display=swap">
<link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head><body>
<div id="app" aria-live="polite"></div>
<div id="toast" role="status" hidden></div>
<script src="app.js?v=<?= filemtime(__DIR__ . '/app.js') ?>"></script>
</body></html>
