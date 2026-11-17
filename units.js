/* Parcours : chaque matière = une suite d'unités (questions de cours + générateurs + fiches éclair) */
(function(){
const L=window.LEGACY||{};
const ids=(arr,from,to,p)=>arr.filter(q=>{const n=+q.id.replace(/\D/g,"");return q.id.startsWith(p)&&n>=from&&n<=to});
const H=window.R103.bank, D=window.R106.bank;
const pickH=(...ranges)=>ranges.flatMap(([a,b])=>ids(H,a,b,"h"));
const pickD=(...ranges)=>ranges.flatMap(([a,b])=>ids(D,a,b,"d"));

window.COURS={r103:window.R103.cours, r106:window.R106.cours};
const EXT=window.EXT||{};
const X=(sid,test)=>((EXT[sid]||{}).questions||[]).filter(test);
const kind=(sid,re)=>X(sid,q=>re.test(q.kind||""));

window.CHAPTERS=Object.fromEntries(Object.entries(EXT).map(([k,v])=>[k,v.chapters||[]]));

window.UNITS={
 r103:[
  {id:"bin",title:"Binaire et hexa",cours:["c-bin"],qs:pickH([1,4],[64,64]).concat(kind("r103",/Bases/)),gens:["binDec","decBin","hexDec","decHex","binHex"]},
  {id:"c2",title:"Complément à deux",cours:["c-c2"],qs:pickH([5,9],[63,63]).concat(kind("r103",/Complément/)),gens:["c2Read","c2Neg","range"]},
  {id:"carry",title:"Carry et overflow",cours:["c-carry","c-ps"],qs:pickH([10,14],[53,57]).concat(kind("r103",/Carry|PowerShell/)),gens:["add8","sub8","band"]},
  {id:"utf8",title:"Texte et UTF-8",cours:["c-texte","c-eol","c-cmd"],qs:pickH([15,28],[60,62]).concat(kind("r103",/Fichiers|UTF/)),gens:["utf8","utf8Char"]},
  {id:"tp1",title:"Commandes du TP1",cours:["c-tp1","c-notions"],qs:pickH([29,42],[58,59],[65,65]).concat(kind("r103",/TP1/)),gens:[]},
  {id:"float",title:"Endianness et flottants",cours:["c-endian","c-float"],qs:pickH([43,52]).concat(kind("r103",/^(Cours|TP2) · (Flottants|Endian)/)),gens:["endian","ieee"]},
  {id:"prat",title:"TP blanc : prévois le résultat",qs:X("r103",q=>!/^(Cours|TP1|TP2) ·/.test(q.kind||"")),gens:["utf8","band","sub8"],desc:"La partie pratique sous PowerShell"},
  {id:"qcm",title:"Comme au QCM Moodle",exam:true,n:15,minutes:15,qs:H.concat(X("r103",()=>true)),gens:["utf8Char","endian","range"],desc:"15 questions, 15 minutes, correction à la fin"}
 ],
 r106:[
  {id:"rel",title:"Relations binaires",cours:["c-rel","c-eq"],qs:pickD([1,10],[16,17]).concat(X("r106",q=>q.ch==3)),gens:["relProp","relProp","countRel"]},
  {id:"div",title:"Divisibilité",cours:["c-div","c-prem"],qs:pickD([11,15],[18,18]).concat(X("r106",q=>q.ch==4)),gens:["divEu","nbDiv","decomp"]},
  {id:"dev2",title:"Comme au devoir 2",exam:true,n:12,minutes:20,qs:D.concat(X("r106",()=>true)),gens:["relProp","divEu","nbDiv","decomp","countRel"],desc:"12 questions chronométrées"},
  {id:"log",title:"Logique (chap. 1)",qs:L.logique||[],gens:[]},
  {id:"ens",title:"Ensembles (chap. 2)",qs:L.ensembles||[],gens:[]}
 ],
 r107:[
  {id:"mat",title:"Matrices",qs:X("r107",q=>String(q.ch).startsWith("1")).length?X("r107",q=>String(q.ch).startsWith("1")):(L.maths||[]),gens:["matProd","matType"]},
  {id:"matc",title:"Produits sans calculatrice",qs:[],gens:["matProd","matProd","matType"],n:8,desc:"Pour le TD noté du 26/11"},
  {id:"gj",title:"Gauss-Jordan",qs:kind("r107",/Gauss/),gens:[]},
  {id:"der",title:"Dérivation",qs:kind("r107",/Dérivation/),gens:[]},
  {id:"pol",title:"Polynômes",qs:kind("r107",/Polynômes/),gens:[]},
  {id:"dev2",title:"Comme au devoir 2",exam:true,n:12,minutes:20,qs:kind("r107",/Gauss|Dérivation|Polynômes/),gens:[],desc:"Gauss-Jordan, dérivation, polynômes"}
 ],
 r101:[
  {id:"c14",title:"C : bases et fonctions",qs:X("r101",q=>/^C[1-4]$/.test(q.ch)),gens:[]},
  {id:"c59",title:"C : tableaux, chaînes, structures",qs:X("r101",q=>/^C[5-9]$/.test(q.ch)),gens:[]},
  {id:"a13",title:"Algo : bases, boucles",qs:X("r101",q=>/^algo[1-3]$/.test(q.ch)).length?X("r101",q=>/^algo[1-3]$/.test(q.ch)):(L.algo||[]).filter(q=>q.ch<=3),gens:[]},
  {id:"a48",title:"Algo : tables, types, portée",qs:X("r101",q=>/^algo[4-8]$/.test(q.ch)).length?X("r101",q=>/^algo[4-8]$/.test(q.ch)):(L.algo||[]).filter(q=>q.ch>=4),gens:[]},
  {id:"dev",title:"Comme au devoir",exam:true,n:12,minutes:20,qs:X("r101",()=>true),gens:[],desc:"12 questions chronométrées"}
 ],
 r105:[{id:"bdd",title:"MCD, cardinalités, MLD",qs:L.bdd||[],gens:[]}],
 r102:[{id:"web",title:"HTML et CSS",qs:L.web||[],gens:[]}],
 r104:[
  {id:"cm",title:"Système, chemins, jokers",qs:X("r104",q=>q.ch==="cm"),gens:[]},
  {id:"cmd",title:"Commandes et redirections",qs:X("r104",q=>q.ch==="cmd"),gens:[]},
  {id:"perm",title:"Permissions (TP3)",qs:X("r104",q=>q.ch==="perm"),gens:[]},
  {id:"regex",title:"Regex (TP4)",qs:X("r104",q=>q.ch==="regex"),gens:[]},
  {id:"bash",title:"Scripts Bash (TP5)",qs:X("r104",q=>q.ch==="bash"),gens:[]},
  {id:"prat",title:"Pratique du terminal",qs:X("r104",q=>q.ch==="prat"),gens:[]},
  {id:"dev",title:"Comme au devoir",exam:true,n:12,minutes:20,qs:X("r104",()=>true),gens:[],desc:"12 questions chronométrées"}
 ]
};
})();
