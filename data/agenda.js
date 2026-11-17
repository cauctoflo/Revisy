/* Matières et évaluations (sources : mails univ, Arche, Google Agenda, 17/11/2026) */
window.SUBJECTS = [
 {id:"r103", code:"R1.03", name:"Architecture", color:"#7e22ce", dark:"#d8b4fe"},
 {id:"r106", code:"R1.06", name:"Maths discrètes", color:"#b4235a", dark:"#f472b6"},
 {id:"r107", code:"R1.07", name:"Outils maths", color:"#4338ca", dark:"#a5b4fc"},
 {id:"r104", code:"R1.04", name:"Systèmes", color:"#4d7c0f", dark:"#bef264"},
 {id:"r101", code:"R1.01", name:"Init Dev", color:"#1d4ed8", dark:"#93c5fd"},
 {id:"r105", code:"R1.05", name:"Bases de données", color:"#0f766e", dark:"#2dd4bf"},
 {id:"r102", code:"R1.02", name:"Web HTML / CSS", color:"#c2410c", dark:"#fb923c"}
];

window.EXAMS = [
 {subj:"r103", at:"2026-11-18T13:30", end:"15:20", title:"Éval individuelle Architecture",
  scope:"TP1 + TP2. 1 h de pratique sous PowerShell 7 (sujets et comptes rendus de TP autorisés, pas d'internet), puis QCM Moodle de 15 questions en 15 min, sans document, une seule tentative.",
  rules:"Rendu : un ZIP (journal de session, réponses, 2 fichiers texte)."},
 {subj:"r106", at:"2026-11-23T08:30", end:"09:50", title:"Devoir n°2 Maths discrètes",
  scope:"Chap. 3 Relations binaires + chap. 4 Divisibilité dans ℤ. Feuilles de TD 3 et 4 + exercices corrigés d'Arche.", rules:"1 h."},
 {subj:"r106", at:"2026-11-25T10:10", end:"12:00", title:"Éval en binôme SAÉ 1.04",
  scope:"Thème de la SAÉ 1.04 (bases de données) : produits cartésiens et relations (chap. 2 et 3).", rules:"Écrit, en TD, en binôme."},
 {subj:"r107", at:"2026-11-26T13:30", end:"15:20", title:"TD noté SAÉ 1.02 (matrices)",
  scope:"Chap. 1 Calcul matriciel. Compte rendu noté, 20 % de S1.02.", rules:"En binôme. Aucun document, pas de calculatrice."},
 {subj:"r107", at:"2026-12-01T23:59", title:"Tests Arche chap. 0 (date limite)",
  scope:"Les 8 tests du chapitre 0, au moins 10 tentatives chacun.", rules:"Bonus jusqu'à 1 pt sur le devoir 2, pénalité sous 10 tentatives.", kind:"deadline"},
 {subj:"r104", at:"2026-12-03T08:00", end:"09:50", title:"Devoir Systèmes",
  scope:"Probablement TP3 permissions, TP4 regex, TP5 scripts Bash (à confirmer).", rules:""},
 {subj:"r101", at:"2026-12-07T08:30", end:"09:50", title:"Devoir Init Dev",
  scope:"Contenu à confirmer.", rules:""},
 {subj:"r107", at:"2026-12-08T08:30", end:"09:50", title:"Devoir 2 Outils maths",
  scope:"Gauss-Jordan (chap. 2), chap. 3 Dérivation, chap. 4 Polynômes.", rules:"Calculatrice seule autorisée."}
];

/* Lien vers les cours complets (app Révisions BUT1) */
window.FULL_COURSE_URL = "https://claude.ai/artifact/1omxbHNTZ135Boo6oxkCYC";
