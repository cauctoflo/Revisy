/* R1.06 chap. 3 Relations binaires et chap. 4 Divisibilité (Devoir 2) */
window.R106 = {
cours: [
 {id:"c-rel", title:"Relations binaires", points:[
  "Relation de A vers B = partie de <b>A × B</b>. On note x R y ou (x, y) ∈ R.",
  "Nombre de relations de A vers B : <b>2^(card A × card B)</b>. Dans {1,2,3} : 2⁹ = 512.",
  "Application : chaque x de A a <b>exactement une</b> image.",
  "Réflexive : x R x pour tout x (toute la diagonale).",
  "Symétrique : x R y ⇒ y R x (toujours une flèche retour).",
  "Antisymétrique : x R y et y R x ⇒ x = y (jamais d'aller-retour entre deux éléments distincts).",
  "Transitive : x R y et y R z ⇒ x R z. Ne tester que les couples qui s'enchaînent ; un contre-exemple suffit."]},
 {id:"c-eq", title:"Équivalence et ordre", points:[
  "<b>Équivalence</b> = réflexive + symétrique + transitive (« avoir même … que »).",
  "Classe Cℓ(x) = {y / x R y}. Les classes forment une <b>partition</b> de E.",
  "<b>Ordre</b> = réflexive + <b>antisymétrique</b> + transitive. Ex. ≤, ⊂, divisibilité dans ℕ.",
  "Ordre total : tout le monde est comparable (≤). Sinon partiel (⊂, |).",
  "Piège : la divisibilité dans ℤ n'est pas antisymétrique (1 | −1 et −1 | 1)."]},
 {id:"c-div", title:"Division euclidienne", points:[
  "a = bq + r avec <b>0 ≤ r &lt; |b|</b>. Le reste est toujours positif.",
  "−35 = 12 × (−3) + 1. −2013 = 7 × (−288) + 3.",
  "b | a ⇔ a = kb ⇔ reste nul. On n'écrit jamais b/a.",
  "Linéarité : a | b et a | c ⇒ a | xb + yc."]},
 {id:"c-prem", title:"Premiers et diviseurs", points:[
  "Premier : exactement 2 diviseurs dans ℕ. <b>0 et 1 ne sont pas premiers.</b>",
  "Décomposition unique : 150 = 2 × 3 × 5², 120 = 2³ × 3 × 5.",
  "Nombre de diviseurs de p₁^a × p₂^b × … : <b>(a+1)(b+1)…</b>. 120 → 4×2×2 = 16.",
  "Piège : redécomposer (21⁵ = 3⁵ × 7⁵)."]}
],
bank: [
 {id:"d1",type:"mcq",q:"Une relation binaire de A vers B est…",choices:["une partie de A × B","une partie de A ∪ B","un élément de A × B","une application de A dans B"],answer:0,expl:"R ⊂ A × B, c'est-à-dire R ∈ P(A × B)."},
 {id:"d2",type:"mcq",q:"Combien y a-t-il de relations dans A = {1, 2, 3} ?",choices:["512","9","64","27"],answer:0,expl:"card(A × A) = 9, donc 2⁹ = 512 parties."},
 {id:"d3",type:"mcq",q:"Une relation d'équivalence est…",choices:["réflexive, symétrique, transitive","réflexive, antisymétrique, transitive","symétrique et antisymétrique","réflexive et transitive seulement"],answer:0,expl:"Avec antisymétrique à la place de symétrique, c'est une relation d'ordre."},
 {id:"d4",type:"mcq",q:"Une relation d'ordre est…",choices:["réflexive, antisymétrique, transitive","réflexive, symétrique, transitive","symétrique et transitive","antisymétrique seulement"],answer:0,expl:"Ex. ≤ dans ℝ, ⊂ dans P(X), | dans ℕ."},
 {id:"d5",type:"mcq",q:"Les classes d'une relation d'équivalence sur E…",choices:["forment une partition de E","sont toutes égales","peuvent être vides","se chevauchent"],answer:0,expl:"Non vides, disjointes deux à deux, et leur union vaut E."},
 {id:"d6",type:"mcq",q:"La relation « &lt; » dans ℝ est-elle réflexive ?",choices:["Non, x &lt; x est faux","Oui","Seulement sur ℕ","Oui car elle est transitive"],answer:0,expl:"< est transitive et antisymétrique, mais pas réflexive : ce n'est pas un ordre au sens du cours."},
 {id:"d7",type:"mcq",q:"La divisibilité dans ℤ est-elle une relation d'ordre ?",choices:["Non, elle n'est pas antisymétrique","Oui","Non, elle n'est pas réflexive","Non, elle n'est pas transitive"],answer:0,expl:"1 | −1 et −1 | 1 mais 1 ≠ −1. Dans ℕ, c'est un ordre partiel."},
 {id:"d8",type:"mcq",q:"Sur {1,2,3}, R = {(1,1),(1,2),(1,3),(3,3)} est…",choices:["transitive et antisymétrique, ni réflexive ni symétrique","réflexive et transitive","symétrique","une relation d'ordre"],answer:0,expl:"Pas réflexive (2 R 2 manque), pas symétrique (1R2 sans 2R1), transitive, antisymétrique."},
 {id:"d9",type:"mcq",q:"Sur {1,2,3}, T = {(1,1),(1,2),(2,2),(2,3)} est-elle transitive ?",choices:["Non : 1T2 et 2T3 mais pas 1T3","Oui","Oui car elle est antisymétrique","Non : 3T3 manque"],answer:0,expl:"Un seul contre-exemple suffit."},
 {id:"d10",type:"mcq",q:"« x R y ⇔ xy est un carré parfait » sur {1..8} : quelle est la classe de 2 ?",choices:["{2, 8}","{2, 4, 8}","{2}","{1, 2, 4, 8}"],answer:0,expl:"2×2 = 4 et 2×8 = 16 sont des carrés ; 2×4 = 8 non. Classes : {1,4}, {2,8}, {3}, {5}, {6}, {7}."},
 {id:"d11",type:"mcq",q:"Division euclidienne de −35 par 12 :",choices:["−35 = 12 × (−3) + 1","−35 = 12 × (−2) − 11","−35 = 12 × (−2) + 11","−35 = 12 × 3 + 1"],answer:0,expl:"Le reste doit vérifier 0 ≤ r < 12 : q = −3, r = 1."},
 {id:"d12",type:"mcq",q:"0 et 1 sont-ils premiers ?",choices:["Ni l'un ni l'autre","Les deux","Seulement 1","Seulement 0"],answer:0,expl:"Un premier a exactement deux diviseurs dans ℕ."},
 {id:"d13",type:"mcq",q:"Combien 120 = 2³ × 3 × 5 a-t-il de diviseurs positifs ?",choices:["16","8","12","6"],answer:0,expl:"(3+1)(1+1)(1+1) = 16."},
 {id:"d14",type:"mcq",q:"Si a = 2n + 7 et b = n + 1, un diviseur commun de a et b divise…",choices:["5","7","2","n"],answer:0,expl:"a − 2b = 5, et d | a, d | b ⇒ d | a − 2b."},
 {id:"d15",type:"mcq",q:"b | a se lit…",choices:["b divise a (a est un multiple de b)","a divise b","b divisé par a","a sur b"],answer:0,expl:"Ne pas l'écrire b/a, qui est un nombre."},
 {id:"d16",type:"mcq",q:"Quelle relation est à la fois une équivalence et un ordre ?",choices:["l'égalité","≤","⊂","la divisibilité"],answer:0,expl:"= est réflexive, symétrique, antisymétrique et transitive."},
 {id:"d17",type:"mcq",q:"Parmi les 16 relations de {a, b} vers {1, 2}, combien sont des applications ?",choices:["4","16","2","8"],answer:0,expl:"Chaque élément a exactement une image parmi 2 : 2 × 2 = 4."},
 {id:"d18",type:"mcq",q:"Décomposition de 150 :",choices:["2 × 3 × 5²","2 × 75","2² × 3 × 5","3 × 5 × 10"],answer:0,expl:"150 = 2 × 75 = 2 × 3 × 25."}
]
};
