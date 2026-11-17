/* Générateurs de questions : chaque appel renvoie une question neuve */
(function(){
const R=(a,b)=>a+Math.floor(Math.random()*(b-a+1));
const pick=a=>a[Math.floor(Math.random()*a.length)];
const b8=n=>(n&255).toString(2).padStart(8,"0");
const sp=s=>s.replace(/(\d{4})(?=\d)/g,"$1 ");
const hx=n=>n.toString(16).toUpperCase();
const f=s=>`<span class='f'>${s}</span>`;
const signed=n=>n>127?n-256:n;
function mcq(q,good,bad,expl,extra){const ch=[good];for(const b of bad){if(ch.length>=4)break;if(!ch.includes(b))ch.push(b)}return Object.assign({type:"mcq",q,choices:ch,answer:0,expl},extra||{})}
function inp(q,answers,expl,extra){return Object.assign({type:"input",q,answers:answers.map(String),expl},extra||{})}

const UTF=[["Bonjour",7],["Café",5],["été",5],["Noël",5],["Fusée 😊 ",11],["Café ☕ 😊 ",15],["Hé ☕",6],["déjà",6],["😊",4],["Salut !",7],["ça va",6],["Zoé",4],["☕☕",6],["Où ?",5],["BUT 1",5],["Ève",4]];
const charBytes=c=>{const cp=c.codePointAt(0);return cp<0x80?1:cp<0x800?2:cp<0x10000?3:4};

const G={
 // ---------- R1.03 ----------
 binDec(){const n=R(5,255);return inp(`Convertis ${f(sp(b8(n))+"₂")} en décimal.`,[n],`${b8(n).split("").map((d,i)=>d==="1"?2**(7-i):0).filter(Boolean).join(" + ")} = ${n}.`,{im:"numeric",kind:"Conversion"})},
 decBin(){const n=R(5,255);return inp(`Écris ${f(n)} en binaire sur 8 bits.`,[b8(n)],`${n} = ${sp(b8(n))}₂. Méthode : retire les puissances de 2 en partant de 128.`,{im:"numeric",kind:"Conversion",bin:true})},
 hexDec(){const n=R(16,4095);return inp(`Combien vaut ${f("0x"+hx(n))} en décimal ?`,[n],`${hx(n).split("").map((d,i,a)=>parseInt(d,16)+"×"+16**(a.length-1-i)).join(" + ")} = ${n}.`,{im:"numeric",kind:"Conversion"})},
 decHex(){const n=R(16,255);return inp(`Écris ${f(n)} en hexadécimal (2 chiffres).`,[hx(n).padStart(2,"0"),"0x"+hx(n).padStart(2,"0")],`${n} = ${Math.floor(n/16)}×16 + ${n%16} → ${hx(n).padStart(2,"0")}. En binaire : ${sp(b8(n))}.`,{kind:"Conversion"})},
 binHex(){const n=R(0,255);return inp(`Écris l'octet ${f(sp(b8(n)))} en hexadécimal.`,[hx(n).padStart(2,"0"),"0x"+hx(n).padStart(2,"0")],`Découpe en paquets de 4 bits : ${b8(n).slice(0,4)} = ${hx(n>>4)}, ${b8(n).slice(4)} = ${hx(n&15)}.`,{kind:"Conversion"})},
 c2Read(){const n=R(128,255);return inp(`Que vaut l'octet ${f(sp(b8(n)))} en <b>signé</b> (complément à deux) ?`,[n-256],`Bit de gauche à 1 : négatif. Non signé ${n}, donc signé ${n} − 256 = ${n-256}.`,{im:"text",kind:"Complément à deux"})},
 c2Neg(){const n=R(1,127);return inp(`Écris ${f("−"+n)} sur 8 bits en complément à deux.`,[b8(-n)],`${n} = ${sp(b8(n))} → on inverse : ${sp(b8(~n))} → +1 : ${sp(b8(-n))}.`,{im:"numeric",kind:"Complément à deux",bin:true})},
 add8(){let a,b;const t=R(0,3);
  if(t===0){a=R(64,127);b=R(64,127)} else if(t===1){a=R(128,255);b=R(128,255)} else if(t===2){a=R(0,127);b=R(128,255)} else {a=R(0,120);b=R(0,120)}
  const s=a+b,res=s&255,c=s>255?1:0,sa=signed(a),sb=signed(b),ov=(sa>=0&&sb>=0&&signed(res)<0)||(sa<0&&sb<0&&signed(res)>=0)?1:0;
  const lab=(cc,oo)=>`carry ${cc}, overflow ${oo?"oui":"non"}`;
  const good=lab(c,ov),bad=[lab(1-c,ov),lab(c,1-ov),lab(1-c,1-ov)];
  return mcq(`${f(sp(b8(a)))} + ${f(sp(b8(b)))} sur 8 bits. Résultat ${f(sp(b8(res)))} : que vaut le drapeau…`,good,bad,
   `Non signé : ${a} + ${b} = ${s} ${c?"> 255 → carry 1":"≤ 255 → carry 0"}. Signé : ${sa} + ${sb} = ${sa+sb} ${ov?"hors de [−128 ; 127] → overflow":"dans [−128 ; 127] → pas d'overflow"}.`,{kind:"Addition 8 bits"})},
 sub8(){const a=R(0,60),b=R(a+1,100),r=(a-b)&255;return inp(`Calcule ${f(sp(b8(a)))} − ${f(sp(b8(b)))} sur 8 bits (réponse en binaire).`,[b8(r)],`On ajoute le complément à deux de ${b} (${sp(b8(-b))}) : résultat ${sp(b8(r))} = ${a-b} en signé.`,{im:"numeric",kind:"Soustraction",bin:true})},
 utf8(){const w=pick(UTF)[0],n=[...w].reduce((t,c)=>t+charBytes(c),0),sys=pick(["Fedora","Windows"]);const tot=n+(sys==="Fedora"?1:2);
  const det=[...w].map(c=>(c===" "?"espace":c)+"("+charBytes(c)+")").join(" ");
  return inp(`${sys==="Fedora"?"Sous Fedora (Bash)":"Sous Windows (PowerShell 7)"}, ${f(`echo "${w}" &gt; t.txt`)}. Taille du fichier en octets ?`,[tot],`${det} = ${n} octets de texte, + ${sys==="Fedora"?"LF (0A) = 1":"CRLF (0D 0A) = 2"} → ${tot} octets.`,{im:"numeric",kind:"UTF-8"})},
 utf8Char(){const c=pick([["é",2,"C3 A9"],["😊",4,"F0 9F 98 8A"],["☕",3,"E2 98 95"],["A",1,"41"],["ç",2,"C3 A7"],["€",3,"E2 82 AC"],["à",2,"C3 A0"],["z",1,"7A"]]);
  return mcq(`Combien d'octets pour « ${c[0]} » en UTF-8 ?`,String(c[1]),["1","2","3","4"].filter(x=>x!=String(c[1])),`${c[0]} = ${c[2]}.`,{kind:"UTF-8"})},
 endian(){const by=[R(16,255),R(16,255),R(16,255),R(16,255)].map(x=>hx(x).padStart(2,"0"));const big=pick([true,false]);
  const good=(big?by:by.slice().reverse()).join(" ");const bad=[(big?by.slice().reverse():by).join(" "),[by[1],by[0],by[3],by[2]].join(" "),by.map(x=>x[1]+x[0]).reverse().join(" ")];
  return mcq(`Comment est rangé ${f("0x"+by.join(""))} en <b>${big?"big":"little"}-endian</b> (adresses 0 → 3) ?`,good,bad,`${big?"Big-endian : poids fort en premier.":"Little-endian : poids faible en premier."} Les octets gardent leur valeur, seul leur ordre change.`,{kind:"Endianness"})},
 band(){const a=R(150,255),b=R(20,200),s=a+b;return inp(`En PowerShell : ${f(`$s = ${a} + ${b}`)} puis ${f("$s -band 255")}. Résultat ?`,[s&255],`${s} = ${s.toString(2)}₂. -band 255 garde les 8 bits de droite : ${b8(s)} = ${s&255}. ${s>255?"Carry = 1.":""}`,{im:"numeric",kind:"PowerShell"})},
 ieee(){const E=R(-2,4),k=R(0,7),s=pick([0,0,1]);const m=1+k/8,v=(s?-1:1)*m*2**E;const e=E+127;
  const frac=k.toString(2).padStart(3,"0");const str=v.toString().replace(".",",");
  return inp(`Décode en simple précision : ${f(`${s} | ${e.toString(2).padStart(8,"0")} | ${frac}0000…`)}`,[String(v),str],`Signe ${s?"−":"+"} ; e = ${e}, E = ${e} − 127 = ${E} ; mantisse 1,${frac}₂ = ${String(m).replace(".",",")} ; ${s?"−":""}${String(m).replace(".",",")} × 2^${E} = ${str}.`,{im:"decimal",kind:"IEEE 754"})},
 range(){const n=pick([4,5,6,8,10,12,16]);const sg=pick([true,false]);const good=sg?`−${2**(n-1)} à ${2**(n-1)-1}`:`0 à ${2**n-1}`;
  const bad=sg?[`−${2**(n-1)-1} à ${2**(n-1)-1}`,`−${2**(n-1)} à ${2**(n-1)}`,`0 à ${2**n-1}`]:[`0 à ${2**n}`,`1 à ${2**n}`,`−${2**(n-1)} à ${2**(n-1)-1}`];
  return mcq(`Plage des entiers <b>${sg?"signés":"non signés"}</b> sur ${n} bits ?`,good,bad,sg?`−2^${n-1} à 2^${n-1} − 1.`:`0 à 2^${n} − 1.`,{kind:"Plages"})},

 // ---------- R1.06 ----------
 divEu(){const b=R(3,15),q=R(-25,25),r=R(0,b-1),a=b*q+r;const wrong=r?[`${a} = ${b} × ${q+1} + ${r-b}`,`${a} = ${b} × ${-q} + ${r}`,`${a} = ${b} × ${q-1} + ${r+b}`]:[`${a} = ${b} × ${q+1} − ${b}`,`${a} = ${b} × ${q-1} + ${b}`,`${a} = ${b} × ${-q} + 0`];
  return mcq(`Division euclidienne de ${f(a)} par ${f(b)} :`,`${a} = ${b} × ${q<0?"("+q+")":q} + ${r}`,wrong,`Il faut 0 ≤ r &lt; ${b}. q = ${q}, r = ${r}.`,{kind:"Division euclidienne"})},
 nbDiv(){const P=[2,3,5,7,11];const ps=P.slice(0,R(2,3)).filter(()=>Math.random()<.9);if(ps.length<2)ps.push(13);let n=1,form=[],cnt=1;ps.forEach(p=>{const a=R(1,3);n*=p**a;form.push(p+(a>1?"^"+a:""));cnt*=a+1});
  return inp(`Combien ${f(n)} a-t-il de diviseurs positifs ?`,[cnt],`${n} = ${form.join(" × ").replace(/\^(\d)/g,(m,d)=>"⁰¹²³⁴⁵⁶⁷⁸⁹"[d])} → ${form.map(x=>"("+((+(x.split("^")[1]||1))+1)+")").join("×")} = ${cnt}.`,{im:"numeric",kind:"Diviseurs"})},
 countRel(){const n=R(1,4),m=R(1,4);return inp(`Combien de relations binaires de A vers B si card A = ${n} et card B = ${m} ?`,[2**(n*m)],`2^(${n}×${m}) = 2^${n*m} = ${2**(n*m)}.`,{im:"numeric",kind:"Relations"})},
 relProp(){const E=[1,2,3];let pairs=[];E.forEach(x=>E.forEach(y=>{if(Math.random()<.42)pairs.push([x,y])}));if(pairs.length<2)pairs=[[1,1],[1,2],[2,3]];
  const has=(x,y)=>pairs.some(p=>p[0]===x&&p[1]===y);const prop=pick(["réflexive","symétrique","antisymétrique","transitive"]);let ok=true,why="";
  if(prop==="réflexive"){const m=E.find(x=>!has(x,x));ok=!m;why=ok?"Les 3 boucles (1,1), (2,2), (3,3) y sont.":`(${m},${m}) manque.`}
  if(prop==="symétrique"){const p=pairs.find(([x,y])=>!has(y,x));ok=!p;why=ok?"Chaque couple a son retour.":`(${p[0]},${p[1]}) est là mais pas (${p[1]},${p[0]}).`}
  if(prop==="antisymétrique"){const p=pairs.find(([x,y])=>x!==y&&has(y,x));ok=!p;why=ok?"Aucun aller-retour entre deux éléments distincts.":`(${p[0]},${p[1]}) et (${p[1]},${p[0]}) avec ${p[0]} ≠ ${p[1]}.`}
  if(prop==="transitive"){let ce=null;for(const [x,y] of pairs)for(const [y2,z] of pairs)if(y===y2&&!has(x,z)&&!ce)ce=[x,y,z];ok=!ce;why=ok?"Chaque enchaînement x R y, y R z donne bien x R z.":`${ce[0]} R ${ce[1]} et ${ce[1]} R ${ce[2]} mais pas ${ce[0]} R ${ce[2]}.`}
  return mcq(`Sur E = {1, 2, 3}, R = {${pairs.map(p=>"("+p+")").join(", ")}}. R est-elle <b>${prop}</b> ?`,ok?"Oui":"Non",[ok?"Non":"Oui"],why,{kind:"Propriétés d'une relation",keep:true})},
 decomp(){const opts=[[24,"2³ × 3"],[150,"2 × 3 × 5²"],[120,"2³ × 3 × 5"],[720,"2⁴ × 3² × 5"],[1323,"3³ × 7²"],[2860,"2² × 5 × 11 × 13"],[90,"2 × 3² × 5"],[84,"2² × 3 × 7"],[200,"2³ × 5²"],[252,"2² × 3² × 7"]];const [n,g]=pick(opts);const bad=opts.filter(o=>o[0]!==n).map(o=>o[1]);
  return mcq(`Décomposition en facteurs premiers de ${f(n)} :`,g,bad.sort(()=>Math.random()-.5),`${n} = ${g}.`,{kind:"Premiers"})},

 // ---------- R1.07 ----------
 matProd(){const A=[R(-3,4),R(-3,4),R(-3,4),R(-3,4)],B=[R(-3,4),R(-3,4),R(-3,4),R(-3,4)];const C=[A[0]*B[0]+A[1]*B[2],A[0]*B[1]+A[1]*B[3],A[2]*B[0]+A[3]*B[2],A[2]*B[1]+A[3]*B[3]];
  const m=x=>`<span class='mx'><span>${x[0]}</span><span>${x[1]}</span><span>${x[2]}</span><span>${x[3]}</span></span>`;
  return inp(`Calcule A × B avec A = ${m(A)} et B = ${m(B)}. Écris les 4 coefficients ligne par ligne, séparés par des espaces.`,[C.join(" ")],`c₁₁ = ${A[0]}×${B[0]} + ${A[1]}×${B[2]} = ${C[0]} ; c₁₂ = ${C[1]} ; c₂₁ = ${C[2]} ; c₂₂ = ${C[3]}. Ligne de A × colonne de B.`,{im:"text",kind:"Produit de matrices",spaced:true})},
 matType(){const n=R(1,4),p=R(1,4),q=R(1,4),p2=pick([p,p,R(1,4)]);const ok=p===p2;
  return mcq(`A de type (${n}, ${p}) et B de type (${p2}, ${q}). Le produit A × B…`,ok?`est de type (${n}, ${q})`:"est impossible",ok?["est impossible",`est de type (${p}, ${p2})`,`est de type (${q}, ${n})`]:[`est de type (${n}, ${q})`,`est de type (${p}, ${p2})`,`est de type (${n}, ${p})`],ok?`(n, p) × (p, q) = (n, q).`:`Il faut nb colonnes de A (${p}) = nb lignes de B (${p2}).`,{kind:"Matrices"})}
};
window.GENS=G;
})();
