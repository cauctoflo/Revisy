# Révise BUT1

Appli web de révision pour le BUT1 info, pensée pour le téléphone : sessions de 3 minutes, séries quotidiennes, XP, vibrations, agenda des évals avec compte à rebours. Elle s'installe sur l'écran d'accueil et marche hors ligne.

- `index.html`, `style.css`, `app.js` : l'appli (sans framework, sans build).
- `data/` : matières, évals, questions. `gens.js` : exercices générés à l'infini. `units.js` : le parcours de chaque matière.
- `tools/import-contenu.js` : importe les fichiers `contenu/<matière>.json` dans `data/ext.js`.

Lancer en local : `python3 -m http.server` puis ouvrir http://localhost:8000.
