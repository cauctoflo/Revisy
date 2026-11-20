/* Carnets de révision : sources, notes, demandes à Claude, flashcards (répétition espacée), fiches, quiz */
"use strict";
const SUBJ={r107:["R1.07","Outils mathématiques","🧮"],r106:["R1.06","Maths discrètes","🔢"],r105:["R1.05","Bases de données","🗄️"],r104:["R1.04","Systèmes","🐧"],
  r103:["R1.03","Architecture","💾"],r102:["R1.02","Web (HTML / CSS)","🌐"],r101:["R1.01","Init Dev","💻"],autre:["Autre","Autre matière","📒"]};
const SITE_TABS={r107:[["mt","TD noté blanc (calcul matriciel)"],["mx","Fiche de révision"],["c0","Fiches tests ch. 0"]],r106:[["dv","Fiche devoir 2 (chap. 3 + 4)"],["fx","Résumé express"]],r105:[["bx","Fiche de révision"]],r101:[["ax","Fiche mémento"]],r102:[["wx","Mémento TP"]],r103:[["kx","Fiche mémento"]],r104:[["sx","Fiche mémento"]]};
const $=(s,r=document)=>r.querySelector(s),$$=(s,r=document)=>[...r.querySelectorAll(s)];
const esc=s=>String(s??"").replace(/[&<>"']/g,c=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;"}[c]));
const app=$("#app");
let S={list:[],progress:{},cur:null,meta:null,show:"chat",sel:new Set()};

/* ---------- Réseau ---------- */
async function api(a,data,opt={}){
  const init={method:data?"POST":"GET",credentials:"same-origin",headers:{}};
  if(data instanceof FormData)init.body=data;
  else if(data){init.headers["Content-Type"]="application/json";init.body=JSON.stringify(data)}
  const q=opt.q?"&"+new URLSearchParams(opt.q):"";
  const r=await fetch("api.php?a="+a+q,init);
  if(r.status===401){location.href="/login.php?next="+encodeURIComponent(location.pathname+location.hash);throw new Error("auth")}
  const j=await r.json().catch(()=>({error:"réponse illisible"}));
  if(!r.ok||j.error)throw new Error(j.error||("erreur "+r.status));
  return j}
let tT;function toast(m){const t=$("#toast");t.textContent=m;t.hidden=false;clearTimeout(tT);tT=setTimeout(()=>t.hidden=true,2600)}
function fail(e){console.error(e);if(e.message!=="auth")toast("Oups : "+e.message)}

/* ---------- Petites aides ---------- */
const color=s=>`var(--c-${SUBJ[s]?s:"autre"})`;
function ago(t){const d=Math.round((Date.now()/1000-t)/60);if(d<1)return "à l'instant";if(d<60)return `il y a ${d} min`;const h=Math.round(d/60);if(h<24)return `il y a ${h} h`;const j=Math.round(h/24);return j<2?"hier":`il y a ${j} jours`}
function rich(s){return esc(s).replace(/\*\*(.+?)\*\*/g,"<b>$1</b>").replace(/`([^`]+)`/g,"<code>$1</code>").replace(/\^\{([^}]+)\}/g,"<sup>$1</sup>").replace(/\^(-?[0-9n]+)/g,"<sup>$1</sup>").replace(/_\{([^}]+)\}/g,"<sub>$1</sub>").replace(/\n/g,"<br>")}
function isDue(id,now=Date.now()/1000){const p=S.progress[id];return !p||p.due<=now}
function dueCount(decks){let n=0;for(const d of decks)for(const c of d.cards)if(isDue(c.id))n++;return n}
function plural(n,w){return `${n} ${w}${n>1?"s":""}`}
function modal(title,body,foot="",cls=""){
  const ov=document.createElement("div");ov.className="ov";ov.innerHTML=`<div class="modal ${cls}" role="dialog" aria-modal="true" aria-label="${esc(title)}"><div class="mh"><h2>${esc(title)}</h2><button type="button" class="xbtn" data-x aria-label="Fermer">×</button></div><div class="mb">${body}</div>${foot?`<div class="mf">${foot}</div>`:""}</div>`;
  document.body.appendChild(ov);const close=()=>{ov.remove();document.removeEventListener("keydown",k)};const k=e=>{if(e.key==="Escape")close()};
  document.addEventListener("keydown",k);ov.addEventListener("mousedown",e=>{if(e.target===ov)close()});$("[data-x]",ov).onclick=close;ov.close=close;
  setTimeout(()=>{const f=$("input,textarea,select",ov);if(f)f.focus()},30);return ov}
function confirm2(btn,label,go){if(btn.dataset.ok==="1")return go();btn.dataset.ok="1";const old=btn.innerHTML;btn.innerHTML=label;setTimeout(()=>{if(btn.isConnected){btn.dataset.ok="";btn.innerHTML=old}},3500)}

/* ---------- Routeur ---------- */
addEventListener("hashchange",route);
async function route(){const m=location.hash.match(/^#\/nb\/(n[a-f0-9]{12})/);try{if(m)await openNb(m[1]);else await home()}catch(e){fail(e);if(m)location.hash="#/"}}

/* ---------- Accueil : la liste des carnets ---------- */
async function home(){
  const j=await api("list");S.list=j.notebooks;S.progress=j.progress||{};S.cur=null;document.documentElement.style.removeProperty("--encre");
  let st={};try{st=(await api("stats")).log||{}}catch(e){}
  const today=new Date().toISOString().slice(0,10),todayN=st[today]||0;let streak=0;for(let d=new Date();;d.setDate(d.getDate()-1)){const k=d.toISOString().slice(0,10);if(st[k])streak++;else if(k!==today)break;if(streak>365)break}
  const order=Object.keys(SUBJ);const L=S.list.slice().sort((a,b)=>order.indexOf(a.subject)-order.indexOf(b.subject)||b.updated-a.updated);
  app.innerHTML=`${topbar()}<main class="home"><div class="hero"><div><h1><span class="hl">Mes carnets</span></h1><p>Un carnet par matière : ajoute tes cours (PDF, textes, liens), écris tes notes, demande à Claude des fiches, des flashcards ou des quiz, puis révise avec les cartes.</p></div>
  <div class="statrow"><div class="stat"><b>${todayN}</b><small>cartes revues aujourd'hui</small></div><div class="stat"><b>${streak}</b><small>jour${streak>1?"s":""} de suite</small></div></div></div>
  <div class="grid">${L.map(n=>{const s=SUBJ[n.subject]||SUBJ.autre;const c=n.counts||{};return `<button type="button" class="nbcard" style="--encre:${color(n.subject)}" data-open="${n.id}">
    <span class="emo">${esc(n.emoji||s[2])}</span><span class="code">${esc(s[0])}</span><h3>${esc(n.title)}</h3>${c.pending?`<span class="due" title="Demandes en attente">${c.pending} demande${c.pending>1?"s":""}</span>`:""}
    <div class="meta"><span>${plural(c.sources||0,"source")}</span><span>${plural(c.cards||0,"carte")}</span><span>${plural(c.fiches||0,"fiche")}</span><span>${ago(n.updated)}</span></div></button>`}).join("")}
    <button type="button" class="nbcard new" data-new><span>+</span>Créer un carnet</button></div></main>`;
  $$("[data-open]").forEach(b=>b.onclick=()=>location.hash="#/nb/"+b.dataset.open);
  $("[data-new]").onclick=newNbDialog;
  if(!S.list.length)setTimeout(newNbDialog,200)}
function topbar(inNb){
  const n=S.meta;return `<header class="top">${inNb?`<button type="button" class="back" data-home>← Carnets</button><div class="grow"><input class="nbtitle" value="${esc(n.title)}" aria-label="Nom du carnet" data-title maxlength="120"></div>`:`<a class="brand" href="#/"><span class="hl">Carnets</span></a><div class="grow"></div>`}
  <nav class="links"><a class="btn ghost sm hide-sm" href="/site/">Site de révision</a><a class="btn ghost sm" href="/login.php?out=1">Déconnexion</a></nav></header>`}
function newNbDialog(){
  const taken=new Set(S.list.map(n=>n.subject));
  const ov=modal("Nouveau carnet",`<div class="field"><label>Matière</label><div class="seg">${Object.entries(SUBJ).map(([k,s])=>`<button type="button" class="chip" style="--encre:${color(k)}" data-s="${k}">${s[2]} ${esc(s[0])}${taken.has(k)?" ✓":""}</button>`).join("")}</div></div>
    <div class="field"><label for="nbt">Nom du carnet</label><input class="txt" id="nbt" maxlength="120" placeholder="Ex. R1.07 Outils mathématiques"></div>
    <p class="muted" style="font-size:14px">Si la matière a déjà du contenu prêt (fiches, cartes), il est ajouté tout de suite.</p>`,`<button type="button" class="btn ghost" data-x2>Annuler</button><button type="button" class="btn" data-go disabled>Créer</button>`);
  let subj=null;const t=$("#nbt",ov),go=$("[data-go]",ov);
  $$("[data-s]",ov).forEach(b=>b.onclick=()=>{subj=b.dataset.s;$$("[data-s]",ov).forEach(x=>x.classList.toggle("on",x===b));if(!t.value||t.dataset.auto){t.value=`${SUBJ[subj][0]} ${SUBJ[subj][1]}`;t.dataset.auto=1}go.disabled=false});
  t.oninput=()=>{delete t.dataset.auto;go.disabled=!subj&&!t.value.trim()};
  $("[data-x2]",ov).onclick=ov.close;
  go.onclick=async()=>{go.disabled=true;try{const j=await api("create",{title:t.value.trim(),subject:subj||"autre"});ov.close();location.hash="#/nb/"+j.id}catch(e){fail(e);go.disabled=false}}}

/* ---------- Un carnet ---------- */
async function openNb(id,keep){
  const j=await api("get",null,{q:{id}});S.cur=j.nb;S.meta=j.meta;S.progress=j.progress||{};
  if(!keep)S.sel=new Set(S.cur.sources.map(s=>s.id));
  document.documentElement.style.setProperty("--encre",color(S.meta.subject));renderNb()}
async function reload(){await openNb(S.meta.id,true)}
function renderNb(){
  const n=S.cur,m=S.meta,s=SUBJ[m.subject]||SUBJ.autre;
  const scroll=$$(".pb").map(p=>p.scrollTop);
  app.innerHTML=`${topbar(true)}<main class="nb" data-show="${S.show}">
  <section class="panel p-sources" aria-label="Sources"><div class="ph"><h2>Sources</h2><button type="button" class="btn sm color" data-addsrc>+ Ajouter</button></div><div class="pb">${srcList()}</div></section>
  <section class="panel p-chat" aria-label="Carnet"><div class="ph"><h2>${esc(s[2])} Carnet</h2><span class="code">${esc(s[0])}</span></div><div class="pb">${chatPanel()}</div></section>
  <section class="panel p-studio" aria-label="Studio"><div class="ph"><h2>Studio</h2></div><div class="pb">${studioPanel()}</div></section></main>
  <nav class="tabs" role="tablist">${[["sources","Sources"],["chat","Carnet"],["studio","Studio"]].map(([k,l])=>`<button role="tab" data-tab="${k}" aria-selected="${S.show===k}">${l}</button>`).join("")}</nav>`;
  $$(".pb").forEach((p,i)=>p.scrollTop=scroll[i]||0);
  bindNb()}
function srcIcon(t){return {file:"📄",text:"📝",link:"🔗",site:"📘"}[t]||"📄"}
function srcList(){const n=S.cur;if(!n.sources.length)return `<div class="empty">Pas encore de source.<br>Ajoute un PDF de cours, colle un texte ou mets un lien : c'est sur ces sources que Claude travaille.</div>`;
  return `<label class="src" style="cursor:default"><input type="checkbox" data-all ${S.sel.size===n.sources.length?"checked":""}><span class="t"><b>Tout sélectionner</b><small>${plural(S.sel.size,"source")} pour les demandes</small></span></label>`+
  n.sources.slice().reverse().map(x=>`<div class="src" data-view="${x.id}"><span class="ic">${srcIcon(x.type)}</span><span class="t"><b>${esc(x.title)}</b><small>${x.type==="file"?`${Math.max(1,Math.round((x.size||0)/1024))} Ko · `:""}${x.by==="claude"||x.by==="seed"?"ajoutée par Claude · ":""}${ago(x.at)}</small></span><input type="checkbox" data-sel="${x.id}" ${S.sel.has(x.id)?"checked":""} aria-label="Utiliser cette source"></div>`).join("")}
const KINDS=[["fiche","📄 Fiche de révision","Fais-moi une fiche de révision complète et claire sur ces sources, avec les définitions, les méthodes, des exemples et les pièges."],
  ["cartes","🃏 Flashcards","Fais-moi des flashcards (questions courtes, réponses précises) sur tout ce qu'il faut savoir dans ces sources."],
  ["quiz","✅ Quiz","Fais-moi un quiz de 10 questions type contrôle sur ces sources, avec la correction expliquée."],
  ["resume","🧾 Résumé","Résume ces sources : l'essentiel à retenir, en une page."],
  ["tout","✨ Tout préparer","Prépare tout pour réviser ces sources : une fiche de révision, des flashcards et un quiz."]];
function chatPanel(){const n=S.cur,m=S.meta;const pend=n.requests.filter(r=>r.status==="pending"),done=n.requests.filter(r=>r.status!=="pending");
  const cards=n.decks.reduce((a,d)=>a+d.cards.length,0),due=dueCount(n.decks);
  return `<div class="summary"><span class="chip">${srcIcon("file")} ${plural(n.sources.length,"source")}</span><span class="chip">🃏 ${plural(cards,"carte")} · ${due} à revoir</span><span class="chip">📄 ${plural(n.fiches.length,"fiche")}</span><span class="chip">✅ ${plural(n.quizzes.length,"quiz")}</span></div>
  <div class="ask"><h3>Demander à Claude</h3><p>Choisis ce que tu veux, précise si besoin, puis envoie. Ensuite dis à Claude « va voir mes carnets » dans le chat : il lit tes sources et range le résultat dans le Studio.</p>
   <div class="chips">${KINDS.map(([k,l])=>`<button type="button" class="chip" data-kind="${k}">${l}</button>`).join("")}</div>
   <div class="row"><textarea class="txt" id="askt" placeholder="Ex. Fais-moi des flashcards sur le chapitre 3, surtout les relations d'équivalence" maxlength="4000"></textarea></div>
   <div class="row" style="justify-content:space-between;align-items:center"><span class="hint">${plural(S.sel.size,"source sélectionnée")}</span><button type="button" class="btn color" data-send>Envoyer la demande</button></div></div>
  ${pend.length?`<div class="secttl">En attente de Claude <span class="badge">${pend.length}</span></div>${pend.map(reqHTML).join("")}`:""}
  <div class="secttl"><span class="grow">Mes notes</span></div>
  <div class="notes">${n.notes.map(x=>`<div class="note" data-note="${x.id}" tabindex="0">${esc(x.text)||"<span style='opacity:.5'>Note vide</span>"}<button type="button" class="x" data-ndel="${x.id}" aria-label="Supprimer la note">×</button></div>`).join("")}<button type="button" class="note add" data-nadd>+ Nouvelle note</button></div>
  ${done.length?`<div class="secttl">Demandes faites</div>${done.slice().reverse().map(reqHTML).join("")}`:""}`}
function reqHTML(r){return `<div class="req ${r.status==="pending"?"pending":"done"}"><span class="st">${r.status==="pending"?"EN ATTENTE":"FAIT"}</span>${esc(r.text)}
  ${r.reply?`<div class="rep">${esc(r.reply)}</div>`:""}<div class="foot"><span>${ago(r.at)} · ${plural((r.sources||[]).length,"source")}</span><button type="button" class="linkbtn" data-rdel="${r.id}">${r.status==="pending"?"annuler":"retirer"}</button></div></div>`}
function studioPanel(){const n=S.cur;const due=dueCount(n.decks);
  return `<button type="button" class="btn color bigstudy" data-studyall ${n.decks.length?"":"disabled"}>🃏 Réviser les cartes${due?` · ${due} à revoir`:""}</button>
  <div class="secttl"><span class="grow">Flashcards</span><button type="button" class="btn ghost sm" data-newdeck>+ Paquet</button></div>
  ${n.decks.length?n.decks.map(d=>{const dd=dueCount([d]);return `<div class="tile"><span class="ic">🃏</span><span class="t"><b>${esc(d.title)}</b><small>${plural(d.cards.length,"carte")} · ${d.by==="moi"?"par toi":"par Claude"}</small></span>${dd?`<span class="badge">${dd}</span>`:`<span class="badge z">0</span>`}<span class="acts"><button type="button" class="iconbtn" data-study="${d.id}" title="Réviser" aria-label="Réviser ce paquet">▶</button><button type="button" class="iconbtn" data-editdeck="${d.id}" title="Modifier" aria-label="Modifier">✎</button></span></div>`}).join(""):`<div class="empty">Pas encore de cartes. Demande des flashcards à Claude, ou crée ton paquet.</div>`}
  <div class="secttl">Fiches de révision</div>
  ${n.fiches.length?n.fiches.map(f=>`<div class="tile"><span class="ic">📄</span><span class="t"><b>${esc(f.title)}</b><small>${f.by==="moi"?"par toi":"par Claude"} · ${ago(f.at)}</small></span><span class="acts"><button type="button" class="iconbtn" data-fiche="${f.id}" title="Ouvrir" aria-label="Ouvrir la fiche">▶</button></span></div>`).join(""):`<div class="empty">Les fiches que Claude écrit pour toi arrivent ici, prêtes à imprimer.</div>`}
  ${(SITE_TABS[S.meta.subject]||[]).map(([t,l])=>`<a class="tile" style="text-decoration:none" href="/site/" data-sitetab="${t}"><span class="ic">📘</span><span class="t"><b>${esc(l)}</b><small>sur le site de révision</small></span><span class="iconbtn">↗</span></a>`).join("")}
  <div class="secttl">Quiz</div>
  ${n.quizzes.length?n.quizzes.map(q=>`<div class="tile"><span class="ic">✅</span><span class="t"><b>${esc(q.title)}</b><small>${plural(q.questions.length,"question")}</small></span><span class="acts"><button type="button" class="iconbtn" data-quiz="${q.id}" title="Lancer" aria-label="Lancer le quiz">▶</button></span></div>`).join(""):`<div class="empty">Pas encore de quiz.</div>`}
  <div class="secttl">Le carnet</div>
  <div style="display:flex;gap:8px;flex-wrap:wrap"><button type="button" class="btn ghost sm" data-subj>Changer de matière</button><button type="button" class="btn ghost sm" data-delnb>Supprimer le carnet</button></div>`}
function bindNb(){
  const n=S.cur,id=S.meta.id;
  $("[data-home]").onclick=()=>location.hash="#/";
  const ti=$("[data-title]");ti.onchange=async()=>{try{await api("update_nb",{id,title:ti.value});S.meta.title=ti.value;toast("Nom enregistré")}catch(e){fail(e)}};
  $$("[data-tab]").forEach(b=>b.onclick=()=>{S.show=b.dataset.tab;renderNb();scrollTo(0,0)});
  $("[data-addsrc]").onclick=addSourceDialog;
  const all=$("[data-all]");if(all)all.onchange=()=>{S.sel=all.checked?new Set(n.sources.map(s=>s.id)):new Set();renderNb()};
  $$("[data-sel]").forEach(c=>{c.onclick=e=>e.stopPropagation();c.onchange=()=>{c.checked?S.sel.add(c.dataset.sel):S.sel.delete(c.dataset.sel);renderNb()}});
  $$("[data-view]").forEach(r=>r.onclick=()=>viewSource(r.dataset.view));
  const ta=$("#askt");$$("[data-kind]").forEach(b=>b.onclick=()=>{const k=KINDS.find(x=>x[0]===b.dataset.kind);ta.value=k[2];ta.dataset.kind=k[0];ta.focus()});
  $("[data-send]").onclick=async()=>{const t=ta.value.trim();if(!t){ta.focus();return toast("Écris ta demande ou choisis un bouton")}
    try{const j=await api("request_add",{nb:id,text:t,kind:ta.dataset.kind||"",sources:[...S.sel]});n.requests=j.requests;toast("Demande envoyée : dis à Claude « va voir mes carnets »");renderNb()}catch(e){fail(e)}};
  $$("[data-rdel]").forEach(b=>b.onclick=()=>confirm2(b,"confirmer",async()=>{try{const j=await api("request_del",{nb:id,rid:b.dataset.rdel});n.requests=j.requests;renderNb()}catch(e){fail(e)}}));
  $("[data-nadd]").onclick=()=>editNote(null);
  $$("[data-note]").forEach(x=>{x.onclick=e=>{if(!e.target.closest("[data-ndel]"))editNote(x.dataset.note)};x.onkeydown=e=>{if(e.key==="Enter")editNote(x.dataset.note)}});
  $$("[data-ndel]").forEach(b=>b.onclick=e=>{e.stopPropagation();confirm2(b,"✓",async()=>{try{const j=await api("note_del",{nb:id,nid:b.dataset.ndel});n.notes=j.notes;renderNb()}catch(e){fail(e)}})});
  $("[data-studyall]").onclick=()=>study(n.decks);
  $$("[data-study]").forEach(b=>b.onclick=()=>study(n.decks.filter(d=>d.id===b.dataset.study),true));
  $$("[data-editdeck]").forEach(b=>b.onclick=()=>deckEditor(n.decks.find(d=>d.id===b.dataset.editdeck)));
  $("[data-newdeck]").onclick=()=>deckEditor(null);
  $$("[data-fiche]").forEach(b=>b.onclick=()=>viewFiche(n.fiches.find(f=>f.id===b.dataset.fiche)));
  $$("[data-quiz]").forEach(b=>b.onclick=()=>playQuiz(n.quizzes.find(q=>q.id===b.dataset.quiz)));
  $$("[data-sitetab]").forEach(a=>a.onclick=()=>{try{localStorage.setItem("r106-subj",S.meta.subject);localStorage.setItem("r106-view","subj");localStorage.setItem("r106-tab",a.dataset.sitetab)}catch(e){}});
  $("[data-subj]").onclick=()=>{const ov=modal("Matière du carnet",`<div class="seg">${Object.entries(SUBJ).map(([k,s])=>`<button type="button" class="chip ${k===S.meta.subject?"on":""}" style="--encre:${color(k)}" data-s="${k}">${s[2]} ${esc(s[0])} ${esc(s[1])}</button>`).join("")}</div>`);
    $$("[data-s]",ov).forEach(b=>b.onclick=async()=>{try{await api("update_nb",{id,subject:b.dataset.s});ov.close();reload()}catch(e){fail(e)}})};
  $("[data-delnb]").onclick=e=>confirm2(e.currentTarget,"Confirmer : tout supprimer",async()=>{try{await api("delete_nb",{id});toast("Carnet supprimé");location.hash="#/"}catch(e){fail(e)}})}

/* ---------- Sources ---------- */
let pdfjsP=null;
function loadPdfJs(){if(pdfjsP)return pdfjsP;pdfjsP=new Promise((ok,ko)=>{const s=document.createElement("script");s.src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js";
  s.onload=()=>{window.pdfjsLib.GlobalWorkerOptions.workerSrc="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";ok(window.pdfjsLib)};s.onerror=()=>{pdfjsP=null;ko(new Error("pdf.js indisponible"))};document.head.appendChild(s)});return pdfjsP}
async function pdfText(file){const lib=await loadPdfJs();const doc=await lib.getDocument({data:await file.arrayBuffer()}).promise;let out=[];
  for(let i=1;i<=doc.numPages;i++){const p=await doc.getPage(i);const c=await p.getTextContent();let line="",lastY=null;const lines=[];
    for(const it of c.items){const y=it.transform[5];if(lastY!==null&&Math.abs(y-lastY)>3){lines.push(line);line=""}line+=it.str+(it.hasEOL?"":"");lastY=y}lines.push(line);
    out.push(`--- page ${i} ---\n`+lines.map(l=>l.replace(/\s+/g," ").trim()).filter(Boolean).join("\n"))}
  return out.join("\n\n")}
function addSourceDialog(){
  const id=S.meta.id;let mode="file";
  const ov=modal("Ajouter des sources",`<div class="seg">${[["file","📄 Fichiers (PDF…)"],["text","📝 Texte collé"],["link","🔗 Lien"]].map(([k,l])=>`<button type="button" class="chip ${k===mode?"on":""}" data-m="${k}">${l}</button>`).join("")}</div><div data-body></div>`);
  const body=$("[data-body]",ov);
  function draw(){$$("[data-m]",ov).forEach(b=>b.classList.toggle("on",b.dataset.m===mode));
    if(mode==="file"){body.innerHTML=`<label class="drop" data-drop><b>Glisse tes fichiers ici</b><br>ou clique pour choisir (PDF, images, .txt, .md…)<input type="file" multiple hidden accept=".pdf,.txt,.md,.csv,.json,.html,.png,.jpg,.jpeg,.webp,.gif,.c,.h,.py,.sql,.sh,.css,.js"></label><p class="hint">Le texte des PDF est lu tout de suite pour que Claude puisse travailler dessus. 40 Mo max par fichier.</p><div data-log></div>`;
      const inp=$("input",body),drop=$("[data-drop]",body);inp.onchange=()=>upload([...inp.files]);
      drop.ondragover=e=>{e.preventDefault();drop.classList.add("on")};drop.ondragleave=()=>drop.classList.remove("on");drop.ondrop=e=>{e.preventDefault();drop.classList.remove("on");upload([...e.dataTransfer.files])}}
    else if(mode==="text"){body.innerHTML=`<div class="field"><label>Titre</label><input class="txt" data-t maxlength="200" placeholder="Ex. Notes du TD 3"></div><div class="field"><label>Texte</label><textarea class="txt" data-tx style="min-height:220px" placeholder="Colle ici ton cours, tes notes, un énoncé…"></textarea></div><div style="text-align:right"><button type="button" class="btn color" data-ok>Ajouter</button></div>`;
      $("[data-ok]",body).onclick=async()=>{const text=$("[data-tx]",body).value;if(!text.trim())return toast("Le texte est vide");try{await api("add_source",{nb:id,type:"text",title:$("[data-t]",body).value,text});ov.close();toast("Source ajoutée");reload()}catch(e){fail(e)}}}
    else{body.innerHTML=`<div class="field"><label>Lien</label><input class="txt" data-u placeholder="https://…"></div><div class="field"><label>Titre (facultatif)</label><input class="txt" data-t maxlength="200"></div><div class="field"><label>Ce qu'il y a dedans (facultatif)</label><textarea class="txt" data-tx placeholder="Colle le contenu si Claude doit pouvoir le lire (les pages Arche demandent ta connexion)."></textarea></div><div style="text-align:right"><button type="button" class="btn color" data-ok>Ajouter</button></div>`;
      $("[data-ok]",body).onclick=async()=>{try{await api("add_source",{nb:id,type:"link",url:$("[data-u]",body).value.trim(),title:$("[data-t]",body).value,text:$("[data-tx]",body).value});ov.close();toast("Lien ajouté");reload()}catch(e){fail(e)}}}}
  async function upload(files){const log=$("[data-log]",body);let ok=0;
    for(const f of files){const row=document.createElement("div");row.className="src";row.innerHTML=`<span class="ic">${srcIcon("file")}</span><span class="t"><b>${esc(f.name)}</b><small>lecture…</small></span>`;log.appendChild(row);const st=$("small",row);
      try{let text="";if(/\.pdf$/i.test(f.name)||f.type==="application/pdf"){try{text=await pdfText(f)}catch(e){console.warn(e)}}
        else if(/^text\/|json$/.test(f.type)||/\.(txt|md|csv|c|h|py|sql|sh|css|js|html)$/i.test(f.name))text=await f.text();
        st.textContent="envoi…";const fd=new FormData();fd.append("nb",id);fd.append("type","file");fd.append("title",f.name.replace(/\.[a-z0-9]+$/i,""));fd.append("text",text.slice(0,400000));fd.append("file",f);
        await api("add_source",fd);st.textContent=text?`ajouté · ${Math.round(text.length/1000)} k caractères lus`:"ajouté (texte non lisible)";ok++}
      catch(e){st.textContent="échec : "+e.message}}
    if(ok){toast(plural(ok,"source")+" ajoutée"+(ok>1?"s":""));reload().then(()=>{})}}
  $$("[data-m]",ov).forEach(b=>b.onclick=()=>{mode=b.dataset.m;draw()});draw()}
function viewSource(sid){const s=S.cur.sources.find(x=>x.id===sid);if(!s)return;const id=S.meta.id;
  const furl=`api.php?a=file&nb=${id}&sid=${s.id}`;const isPdf=s.type==="file"&&/pdf/.test(s.mime||"");const isImg=s.type==="file"&&/^image\//.test(s.mime||"");
  let tab=isPdf?"doc":"text";
  const ov=modal(s.title,`<div class="seg">${isPdf?`<button type="button" class="chip on" data-v="doc">Document</button><button type="button" class="chip" data-v="text">Texte lu</button>`:""}${s.url?`<a class="chip" href="${esc(s.url)}" target="_blank" rel="noopener">Ouvrir le lien ↗</a>`:""}${s.type==="file"?`<a class="chip" href="${furl}" target="_blank" rel="noopener">Ouvrir dans un onglet ↗</a>`:""}</div><div data-c style="height:calc(100% - 50px)"></div>`,
    `<button type="button" class="btn ghost" data-del>Supprimer la source</button><button type="button" class="btn" data-x3>Fermer</button>`,"wide");
  const c=$("[data-c]",ov);
  function draw(){$$("[data-v]",ov).forEach(b=>b.classList.toggle("on",b.dataset.v===tab));
    if(tab==="doc")c.innerHTML=`<iframe class="frame" src="${furl}" title="${esc(s.title)}"></iframe>`;
    else if(isImg)c.innerHTML=`<img src="${furl}" alt="${esc(s.title)}" style="max-width:100%;border-radius:10px">${s.text?`<div class="srctext">${esc(s.text)}</div>`:""}`;
    else c.innerHTML=s.text?`<div class="srctext">${esc(s.text)}</div>`:`<div class="empty">Pas de texte lisible pour cette source.</div>`}
  $$("[data-v]",ov).forEach(b=>b.onclick=()=>{tab=b.dataset.v;draw()});draw();
  $("[data-x3]",ov).onclick=ov.close;
  $("[data-del]",ov).onclick=e=>confirm2(e.currentTarget,"Confirmer la suppression",async()=>{try{await api("del_source",{nb:id,sid});S.sel.delete(sid);ov.close();reload()}catch(e){fail(e)}})}

/* ---------- Notes ---------- */
function editNote(nid){const n=S.cur;const x=nid?n.notes.find(t=>t.id===nid):null;
  const ov=modal(x?"Modifier la note":"Nouvelle note",`<textarea class="txt" data-t style="min-height:220px;font:19px/1.35 'Patrick Hand',sans-serif" maxlength="20000" placeholder="Ce que tu veux retenir, une question pour le prof, une astuce…">${esc(x?x.text:"")}</textarea>`,
    `<button type="button" class="btn ghost" data-x4>Annuler</button><button type="button" class="btn color" data-ok>Enregistrer</button>`);
  $("[data-x4]",ov).onclick=ov.close;
  $("[data-ok]",ov).onclick=async()=>{const t=$("[data-t]",ov).value;try{const j=await api("note_save",{nb:S.meta.id,nid:nid||"",text:t});n.notes=j.notes;ov.close();renderNb()}catch(e){fail(e)}}}

/* ---------- Paquets de cartes ---------- */
function deckEditor(d){const id=S.meta.id;const deck=d?JSON.parse(JSON.stringify(d)):{title:"Mes cartes",cards:[{q:"",a:""}]};
  const ov=modal(d?"Modifier le paquet":"Nouveau paquet",`<div class="field"><label>Nom du paquet</label><input class="txt" data-dt maxlength="120" value="${esc(deck.title)}"></div><div data-rows></div>
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:8px"><button type="button" class="btn ghost sm" data-addc>+ Carte</button><button type="button" class="btn ghost sm" data-bulk>Coller plusieurs cartes</button></div>
    <p class="hint">Astuce : **gras**, \`code\`, x^2 pour les puissances, un retour à la ligne pour aérer.</p>`,
    `${d?`<button type="button" class="btn ghost" data-deld>Supprimer</button>`:""}<button type="button" class="btn ghost" data-x5>Annuler</button><button type="button" class="btn color" data-ok>Enregistrer</button>`,"wide");
  const rows=$("[data-rows]",ov);
  function sync(){deck.title=$("[data-dt]",ov).value;$$(".cardrow",rows).forEach((r,i)=>{deck.cards[i].q=$("[data-q]",r).value;deck.cards[i].a=$("[data-a]",r).value})}
  function draw(){rows.innerHTML=deck.cards.map((c,i)=>`<div class="cardrow"><textarea class="txt" data-q placeholder="Question ${i+1}">${esc(c.q)}</textarea><textarea class="txt" data-a placeholder="Réponse">${esc(c.a)}</textarea><button type="button" class="iconbtn" data-rm="${i}" aria-label="Retirer la carte">✕</button></div>`).join("");
    $$("[data-rm]",rows).forEach(b=>b.onclick=()=>{sync();deck.cards.splice(+b.dataset.rm,1);draw()})}
  draw();
  $("[data-addc]",ov).onclick=()=>{sync();deck.cards.push({q:"",a:""});draw();const t=$$("[data-q]",rows).pop();t&&t.focus()};
  $("[data-bulk]",ov).onclick=()=>{const t=prompt2("Une carte par ligne, question et réponse séparées par « ; » ou une tabulation :",lines=>{sync();for(const l of lines.split("\n")){const m=l.split(/\t|;/);if(m.length>=2&&m[0].trim())deck.cards.push({q:m[0].trim(),a:m.slice(1).join(";").trim()})}deck.cards=deck.cards.filter(c=>c.q||c.a);draw()})};
  $("[data-x5]",ov).onclick=ov.close;
  const del=$("[data-deld]",ov);if(del)del.onclick=e=>confirm2(e.currentTarget,"Confirmer",async()=>{try{await api("deck_del",{nb:id,did:d.id});ov.close();reload()}catch(e){fail(e)}});
  $("[data-ok]",ov).onclick=async()=>{sync();deck.cards=deck.cards.filter(c=>c.q.trim()&&c.a.trim());if(!deck.cards.length)return toast("Ajoute au moins une carte complète");
    try{await api("deck_save",{nb:id,deck});ov.close();toast("Paquet enregistré");reload()}catch(e){fail(e)}}}
function prompt2(label,cb){const ov=modal("Coller des cartes",`<p class="muted" style="margin-top:0">${esc(label)}</p><textarea class="txt" data-t style="min-height:220px;font-family:var(--f-mono);font-size:14px" placeholder="Capitale de la France ; Paris"></textarea>`,`<button type="button" class="btn color" data-ok>Ajouter</button>`);
  $("[data-ok]",ov).onclick=()=>{cb($("[data-t]",ov).value);ov.close()}}

/* ---------- Révision (répétition espacée) ---------- */
function nextLabel(id,g){const p=S.progress[id]||{};const reps=p.reps||0,iv=p.iv||0,ef=p.ef||2.5;
  if(g===0)return "10 min";let d;if(reps===0)d=g===3?3:1;else if(reps===1)d=g===1?3:6;else d=Math.round(iv*(g===1?1.2:ef)*(g===3?1.3:1));return d<=1?"1 j":d<31?d+" j":Math.round(d/30)+" mois"}
function study(decks,all){
  const now=Date.now()/1000;let pool=[];for(const d of decks)for(const c of d.cards)pool.push({...c,deck:d.title});
  let due=pool.filter(c=>S.progress[c.id]&&S.progress[c.id].due<=now).sort((a,b)=>S.progress[a.id].due-S.progress[b.id].due);
  let fresh=pool.filter(c=>!S.progress[c.id]);
  let queue=[...due,...fresh.slice(0,25)];
  if(!queue.length&&all)queue=pool.slice().sort(()=>Math.random()-.5).slice(0,25);
  if(!queue.length){toast("Rien à revoir pour l'instant 🎉 Reviens plus tard.");return}
  const total=queue.length;let i=0,flipped=false,good=0,again=0,seen=0;
  const el=document.createElement("div");el.className="study";document.body.appendChild(el);document.body.style.overflow="hidden";
  const close=()=>{el.remove();document.body.style.overflow="";document.removeEventListener("keydown",key);reload()};
  function draw(){
    if(!queue.length){el.innerHTML=`<div class="sbar"><button type="button" class="xbtn" data-q aria-label="Fermer">×</button><div class="meter"><i style="width:100%"></i></div></div><div class="sbody"><div class="done"><h2><span class="hl">Bravo !</span></h2><p>${plural(seen,"carte")} revue${seen>1?"s":""} · ${good} réussie${good>1?"s":""} du premier coup${again?` · ${again} à revoir bientôt`:""}.</p><p class="muted">Les cartes reviendront au bon moment : c'est la répétition espacée.</p><button type="button" class="btn color" data-q2>Terminer</button></div></div>`;
      $("[data-q]",el).onclick=close;$("[data-q2]",el).onclick=close;return}
    const c=queue[0];
    el.innerHTML=`<div class="sbar"><button type="button" class="xbtn" data-q aria-label="Fermer">×</button><div class="meter"><i style="width:${Math.round(100*(total-queue.length)/total)}%"></i></div><span class="hint">${queue.length} restante${queue.length>1?"s":""}</span></div>
     <div class="sbody"><div class="flash ${flipped?"flip":""}" data-f tabindex="0" role="button" aria-label="Retourner la carte"><div class="in"><div class="face front"><span class="lbl">Question</span><span class="tag">${esc(c.deck)}</span><div>${rich(c.q)}</div></div><div class="face back"><span class="lbl">Réponse</span><div class="q2">${rich(c.q)}</div><div>${rich(c.a)}</div></div></div></div>
     ${flipped?`<div class="grades">${["À revoir","Difficile","Bien","Facile"].map((l,g)=>`<button type="button" class="g${g}" data-g="${g}">${l}<small>${nextLabel(c.id,g)} · ${g+1}</small></button>`).join("")}</div>`:`<button type="button" class="btn showbtn color" data-show>Afficher la réponse <small style="opacity:.7;font-weight:400">(espace)</small></button>`}
     <p class="hint">Sois honnête : « À revoir » fait revenir la carte dans 10 minutes.</p></div>`;
    $("[data-q]",el).onclick=close;$("[data-f]",el).onclick=()=>{flipped=!flipped;draw()};
    const sb=$("[data-show]",el);if(sb)sb.onclick=()=>{flipped=true;draw()};
    $$("[data-g]",el).forEach(b=>b.onclick=()=>grade(+b.dataset.g))}
  async function grade(g){const c=queue.shift();seen++;if(g===0){again++;queue.splice(Math.min(queue.length,4),0,c)}else if(!S.progress[c.id]||S.progress[c.id].g!==0)good++;flipped=false;draw();
    try{const j=await api("review",{cid:c.id,g});S.progress[c.id]=j.p}catch(e){fail(e)}}
  function key(e){if(e.target.closest("input,textarea"))return;if(e.key==="Escape")return close();if(!queue.length)return;
    if(e.key===" "||e.key==="Enter"){e.preventDefault();if(!flipped){flipped=true;draw()}}else if(flipped&&/^[1-4]$/.test(e.key))grade(+e.key-1)}
  document.addEventListener("keydown",key);draw()}

/* ---------- Fiches ---------- */
function viewFiche(f){if(!f)return;const cours=f.by==="seed"&&f.html.indexOf("<article")<0&&/class="(box|hn|f|tscroll)\b/.test(f.html);
  const ov=modal(f.title,cours?`<div data-cours></div>`:`<article class="fiche">${f.html}</article>`,`<button type="button" class="btn ghost" data-del>Supprimer</button><button type="button" class="btn color" data-pr>⎙ Imprimer ou PDF</button>`,"wide");
  if(cours){const host=$("[data-cours]",ov);const sr=host.attachShadow({mode:"open"});sr.innerHTML=`<link rel="stylesheet" href="cours.css?v=2"><div class="cours-wrap" data-subj="${esc(S.meta.subject)}"><article class="sheet fiche">${f.html}</article></div>`}
  $("[data-pr]",ov).onclick=()=>{document.body.classList.add("printing");setTimeout(()=>{print();document.body.classList.remove("printing")},50)};
  $("[data-del]",ov).onclick=e=>confirm2(e.currentTarget,"Confirmer",async()=>{try{await api("fiche_del",{nb:S.meta.id,fid:f.id});ov.close();reload()}catch(e){fail(e)}})}

/* ---------- Quiz ---------- */
function playQuiz(qz){if(!qz)return;let i=0,score=0;const qs=qz.questions;
  const el=document.createElement("div");el.className="study";document.body.appendChild(el);document.body.style.overflow="hidden";
  const close=()=>{el.remove();document.body.style.overflow=""};
  function draw(){if(i>=qs.length){el.innerHTML=`<div class="sbar"><button type="button" class="xbtn" data-q aria-label="Fermer">×</button><div class="meter"><i style="width:100%"></i></div></div><div class="sbody"><div class="done"><h2><span class="hl">${score} / ${qs.length}</span></h2><p>${score===qs.length?"Parfait !":score>=qs.length*.7?"Très bien, encore un petit effort.":"Relis la fiche puis refais le quiz."}</p><button type="button" class="btn ghost" data-r>Recommencer</button> <button type="button" class="btn color" data-q2>Terminer</button></div></div>`;
      $("[data-q]",el).onclick=close;$("[data-q2]",el).onclick=close;$("[data-r]",el).onclick=()=>{i=0;score=0;draw()};return}
    const q=qs[i];el.innerHTML=`<div class="sbar"><button type="button" class="xbtn" data-q aria-label="Fermer">×</button><div class="meter"><i style="width:${Math.round(100*i/qs.length)}%"></i></div><span class="hint">${i+1} / ${qs.length}</span></div>
      <div class="sbody"><div class="qz"><div class="q">${rich(q.q)}</div>${q.choices.map((c,k)=>`<button type="button" class="ch" data-c="${k}">${rich(c)}</button>`).join("")}<div data-ex></div></div></div>`;
    $("[data-q]",el).onclick=close;
    $$("[data-c]",el).forEach(b=>b.onclick=()=>{const k=+b.dataset.c,ok=k===q.answer;if(ok)score++;$$("[data-c]",el).forEach(x=>{x.disabled=true;if(+x.dataset.c===q.answer)x.classList.add("ok");else if(x===b)x.classList.add("ko")});
      $("[data-ex]",el).innerHTML=`<div class="ex"><b>${ok?"Bonne réponse !":"Raté."}</b> ${rich(q.expl||"")}</div><div style="text-align:right;margin-top:12px"><button type="button" class="btn color" data-n>${i+1<qs.length?"Question suivante →":"Voir mon score"}</button></div>`;
      $("[data-n]",el).onclick=()=>{i++;draw()};$("[data-n]",el).focus()})}
  draw()}

route();
