/* Révise BUT1 : moteur de l'appli (parcours, leçons, séries, agenda) */
(function(){
"use strict";
const $=s=>document.querySelector(s);
const esc=s=>String(s).replace(/[&<>"]/g,c=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"}[c]));
const R=(a,b)=>a+Math.floor(Math.random()*(b-a+1));
const shuffle=a=>{a=a.slice();for(let i=a.length-1;i>0;i--){const j=Math.floor(Math.random()*(i+1));[a[i],a[j]]=[a[j],a[i]]}return a};
const SUBJ=Object.fromEntries(window.SUBJECTS.map(s=>[s.id,s]));
const UNITS=window.UNITS, GENS=window.GENS, COURS=window.COURS;
const DAY=864e5;

/* ---------- Sauvegarde ---------- */
const KEY="revise-but1-v1";
const DEF={xp:0,days:{},streak:{n:0,last:null,best:0},freeze:1,q:{},units:{},answered:0,good:0,subj:null,set:{sound:true,vib:true,goal:50,theme:"auto",remind:"19:00"},seenIntro:false};
let S;
try{S=Object.assign({},DEF,JSON.parse(localStorage.getItem(KEY)||"{}"));S.set=Object.assign({},DEF.set,S.set);S.streak=Object.assign({},DEF.streak,S.streak)}catch(e){S=structuredClone(DEF)}
const save=()=>{try{localStorage.setItem(KEY,JSON.stringify(S))}catch(e){}};

/* ---------- Dates ---------- */
const dkey=d=>{d=d||new Date();return d.getFullYear()+"-"+String(d.getMonth()+1).padStart(2,"0")+"-"+String(d.getDate()).padStart(2,"0")};
const dayStart=d=>{d=new Date(d);d.setHours(0,0,0,0);return d};
const daysBetween=(a,b)=>Math.round((dayStart(b)-dayStart(a))/DAY);
const DOW=["dim.","lun.","mar.","mer.","jeu.","ven.","sam."],MON=["janv.","févr.","mars","avr.","mai","juin","juil.","août","sept.","oct.","nov.","déc."];
const hm=d=>d.getHours()+" h"+(d.getMinutes()?" "+String(d.getMinutes()).padStart(2,"0"):"");
const exams=()=>window.EXAMS.map(e=>Object.assign({},e,{d:new Date(e.at)})).sort((a,b)=>a.d-b.d);
const upcoming=()=>exams().filter(e=>e.d>Date.now()-60*60e3);
function jx(d){const n=daysBetween(new Date(),d);return n<=0?"Aujourd'hui":n===1?"Demain":"J-"+n}

/* ---------- Thème et couleur de matière ---------- */
function applyTheme(){const t=S.set.theme;if(t==="auto")document.documentElement.removeAttribute("data-theme");else document.documentElement.setAttribute("data-theme",t)}
const isDark=()=>S.set.theme==="dark"||(S.set.theme==="auto"&&matchMedia("(prefers-color-scheme: dark)").matches);
const col=id=>{const s=SUBJ[id];return s?(isDark()?s.dark:s.color):"#121212"};
function setC(el,id){el.style.setProperty("--c",col(id))}

/* ---------- Retours : vibrations et sons ---------- */
function buzz(p){if(S.set.vib&&navigator.vibrate)try{navigator.vibrate(p)}catch(e){}}
let AC=null;
function tone(seq){if(!S.set.sound)return;try{AC=AC||new (window.AudioContext||window.webkitAudioContext)();if(AC.state==="suspended")AC.resume();let t=AC.currentTime;for(const [f,d,type,vol] of seq){const o=AC.createOscillator(),g=AC.createGain();o.type=type||"sine";o.frequency.value=f;g.gain.setValueAtTime(0,t);g.gain.linearRampToValueAtTime(vol||.18,t+.01);g.gain.exponentialRampToValueAtTime(.001,t+d);o.connect(g).connect(AC.destination);o.start(t);o.stop(t+d+.02);t+=d*.75}}catch(e){}}
const SFX={
 tap(){buzz(8)},
 good(){buzz(35);tone([[660,.12,"triangle"],[990,.22,"triangle"]])},
 bad(){buzz([90,60,90]);tone([[220,.18,"square",.08],[165,.28,"square",.08]])},
 combo(){buzz([30,40,30,40,60]);tone([[523,.1],[659,.1],[784,.1],[1047,.25]])},
 end(){buzz([50,40,50,40,160]);tone([[523,.14,"triangle"],[659,.14,"triangle"],[784,.14,"triangle"],[1047,.4,"triangle"]])},
 streak(){buzz([100,60,100,60,250]);tone([[392,.12],[523,.12],[659,.12],[784,.12],[1047,.5]])}
};
function toast(t,ms){const el=$("#toast");el.textContent=t;el.hidden=false;el.classList.remove("pop");void el.offsetWidth;clearTimeout(toast.t);toast.t=setTimeout(()=>el.hidden=true,ms||2200)}
function xpPop(n){const d=document.createElement("div");d.className="xp-pop";d.textContent="+"+n+" XP";document.body.appendChild(d);setTimeout(()=>d.remove(),950)}
function confetti(){const c=$("#confetti");c.hidden=false;const x=c.getContext("2d");c.width=innerWidth*devicePixelRatio;c.height=innerHeight*devicePixelRatio;x.scale(devicePixelRatio,devicePixelRatio);
 const cols=["#ffe86b","#1f8a4c","#e8590c","#4338ca","#b4235a","#0f766e","#7e22ce"];const P=Array.from({length:120},()=>({x:innerWidth/2,y:innerHeight*.35,vx:(Math.random()-.5)*14,vy:-Math.random()*14-4,r:Math.random()*6+4,c:cols[R(0,cols.length-1)],a:Math.random()*6}));
 let f=0;(function step(){x.clearRect(0,0,innerWidth,innerHeight);P.forEach(p=>{p.vy+=.45;p.x+=p.vx;p.y+=p.vy;p.a+=.2;x.save();x.translate(p.x,p.y);x.rotate(p.a);x.fillStyle=p.c;x.fillRect(-p.r/2,-p.r/4,p.r,p.r/2);x.restore()});if(++f<110)requestAnimationFrame(step);else c.hidden=true})()}

/* ---------- Questions ---------- */
const QIDX={};
for(const sid in UNITS)for(const u of UNITS[sid])for(const q of u.qs){QIDX[sid+":"+q.id]={q,sid}}
const qst=k=>S.q[k]||(S.q[k]={b:0,n:0,w:0,t:0});
function unitKey(sid,u){return sid+"/"+u.id}
function unitStat(sid,u){return S.units[unitKey(sid,u)]||{lv:0,best:0}}
function mastery(sid,u){
 if(!u.qs.length){const st=unitStat(sid,u);return Math.min(1,st.lv/5)}
 let s=0;for(const q of u.qs){const t=S.q[sid+":"+q.id];s+=t?Math.min(t.b,4)/4:0}return s/u.qs.length}
function subjMastery(sid){const us=(UNITS[sid]||[]).filter(u=>!u.exam);if(!us.length)return 0;return us.reduce((a,u)=>a+mastery(sid,u),0)/us.length}
function mistakes(sid){return Object.keys(S.q).filter(k=>(!sid||k.startsWith(sid+":"))&&QIDX[k]&&S.q[k].w>0&&S.q[k].b<3)}

function prep(raw,sid,gen){
 const q=Object.assign({},raw,{sid,key:gen?null:sid+":"+raw.id,gen:!!gen});
 if(q.type==="mcq"){
  const keep=q.keep||(q.choices.length===2&&/^(vrai|oui)$/i.test(q.choices[0]));
  const idx=q.choices.map((c,i)=>i);const order=keep?idx:shuffle(idx);
  q.choices=order.map(i=>raw.choices[i]);q.answer=order.indexOf(raw.answer)}
 return q}
function genQ(name,sid){try{return prep(GENS[name](),sid,true)}catch(e){console.error(name,e);return null}}
function buildQueue(sid,pool,gens,n){
 const now=Date.now();
 const scored=pool.map(q=>{const t=S.q[sid+":"+q.id];let s=Math.random()*1.2;
  if(!t||!t.n)s+=2;else{if(t.w>0&&t.b<3)s+=3;s+=Math.max(0,2-t.b*.5);if(now-t.t<15*60e3)s-=3}
  return {q,s}}).sort((a,b)=>b.s-a.s);
 let nG=gens.length?(pool.length?Math.round(n*.4):n):0;let nS=Math.min(n-nG,scored.length);nG=gens.length?n-nS:0;
 const out=scored.slice(0,nS).map(x=>prep(x.q,sid));
 for(let i=0;i<nG;i++){const g=genQ(gens[i%gens.length===0?R(0,gens.length-1):R(0,gens.length-1)],sid);if(g)out.push(g)}
 return shuffle(out)}

/* ---------- Série et XP ---------- */
function streakNow(){const s=S.streak;if(!s.last)return 0;const gap=daysBetween(new Date(s.last+"T12:00"),new Date());if(gap<=1)return s.n;if(gap===2&&S.freeze>0)return s.n;return 0}
function bumpStreak(){const t=dkey(),s=S.streak;if(s.last===t)return false;
 const gap=s.last?daysBetween(new Date(s.last+"T12:00"),new Date()):99;
 if(gap===1)s.n++;else if(gap===2&&S.freeze>0){S.freeze--;s.n++;toast("Ton gel de série t'a sauvé hier !")}else s.n=1;
 s.last=t;s.best=Math.max(s.best,s.n);if(s.n%7===0)S.freeze=Math.min(2,S.freeze+1);return true}
function addXP(n){S.xp+=n;const t=dkey();S.days[t]=(S.days[t]||0)+n}
function renderTop(){
 const n=streakNow(),t=S.days[dkey()]||0,g=S.set.goal;
 $("#streakN").textContent=n;$("#chipStreak").classList.toggle("lit",S.streak.last===dkey());
 $("#xpToday").textContent=t;$("#xpGoal").textContent=g;$("#xpTotal").textContent=S.xp;
 $("#goalRing").style.strokeDashoffset=94.25*(1-Math.min(1,t/g))}

/* ---------- Navigation ---------- */
let TAB="home",ticker=null;
function go(tab){TAB=tab;document.querySelectorAll(".tabbar button").forEach(b=>b.toggleAttribute("aria-current",b.dataset.tab===tab)||b.setAttribute("aria-current",b.dataset.tab===tab?"page":""));
 document.querySelectorAll(".tabbar button").forEach(b=>{if(b.dataset.tab===tab)b.setAttribute("aria-current","page");else b.removeAttribute("aria-current")});
 clearInterval(ticker);renderTop();({home:viewHome,agenda:viewAgenda,cours:viewCours,profil:viewProfil})[tab]();window.scrollTo(0,0)}
document.querySelectorAll(".tabbar button").forEach(b=>b.onclick=()=>{SFX.tap();go(b.dataset.tab)});
$("#chipStreak").onclick=()=>{const n=streakNow();toast(n?`Série de ${n} jour${n>1?"s":""}. Record : ${S.streak.best}. Gels : ${S.freeze}.`:"Fais une leçon pour allumer ta série !")};

function curSubj(){if(S.subj&&SUBJ[S.subj])return S.subj;const e=upcoming().find(e=>(UNITS[e.subj]||[]).length);return e?e.subj:"r103"}
function countdownHTML(d){const ms=Math.max(0,d-Date.now());const D=Math.floor(ms/DAY),H=Math.floor(ms/36e5)%24,M=Math.floor(ms/6e4)%60,Sx=Math.floor(ms/1e3)%60;
 return `<div><b>${D}</b><small>jour${D>1?"s":""}</small></div><div><b>${String(H).padStart(2,"0")}</b><small>heures</small></div><div><b>${String(M).padStart(2,"0")}</b><small>min</small></div><div><b>${String(Sx).padStart(2,"0")}</b><small>sec</small></div>`}

/* ---------- Accueil : parcours ---------- */
let deferredInstall=null;
window.addEventListener("beforeinstallprompt",e=>{e.preventDefault();deferredInstall=e;if(TAB==="home")viewHome()});
const standalone=()=>matchMedia("(display-mode: standalone)").matches||navigator.standalone;

function viewHome(){
 const sid=curSubj(),v=$("#view");const nx=upcoming()[0];
 const at=new Date().getHours()>=18&&S.streak.last!==dkey()&&streakNow()>0;
 const mk=mistakes().length;
 v.innerHTML=`<div class="stack">
  ${nx?`<section class="hero" id="hero"><div><div class="eyebrow">Prochaine éval · ${SUBJ[nx.subj]?SUBJ[nx.subj].code:""} · ${jx(nx.d)}</div><h2>${esc(nx.title)}</h2><div class="muted" style="color:inherit;opacity:.85;font-size:14px">${DOW[nx.d.getDay()]} ${nx.d.getDate()} ${MON[nx.d.getMonth()]} · ${hm(nx.d)}</div></div>
   <div class="cd" id="cd">${countdownHTML(nx.d)}</div>
   ${(UNITS[nx.subj]||[]).length?`<button class="btn block" id="heroGo"><svg class="ic"><use href="#i-bolt"/></svg>Réviser maintenant</button>`:""}</section>`:""}
  ${at?`<div class="banner"><svg class="ic"><use href="#i-flame"/></svg><span>Ta série de <b>${streakNow()} jours</b> s'éteint à minuit. Une session de 3 minutes suffit.</span></div>`:""}
  ${!standalone()&&!S.hideInstall?installCard():""}
  <div class="quick">
   <button class="qbtn hl" id="bus"><svg class="ic"><use href="#i-bus"/></svg><b>Session bus</b><small>8 questions · 3 min, sur l'éval la plus proche</small></button>
   <button class="qbtn" id="mist" ${mk?"":"disabled"}><svg class="ic"><use href="#i-redo"/></svg><b>Mes erreurs</b><small>${mk?mk+" question"+(mk>1?"s":"")+" à revoir":"Aucune pour l'instant"}</small></button>
  </div>
  <div class="subjs" id="subjs">${window.SUBJECTS.map(s=>{const e=upcoming().find(e=>e.subj===s.id);const n=e?daysBetween(new Date(),e.d):null;
   return `<button class="subj" data-s="${s.id}" aria-pressed="${s.id===sid}" style="--sc:${col(s.id)}"><b><i></i>${s.code}</b><small class="${n!==null&&n<=1?"hot":""}">${e?jx(e.d):"pas d'éval"}</small></button>`}).join("")}</div>
  <div class="path" id="path"></div>
 </div>`;
 setC(v,sid);
 const hero=$("#hero");if(hero){setC(hero,nx.subj);ticker=setInterval(()=>{const cd=$("#cd");if(cd)cd.innerHTML=countdownHTML(nx.d)},1000);
  const hg=$("#heroGo");if(hg)hg.onclick=()=>startBus(nx.subj)}
 $("#bus").onclick=()=>startBus();
 $("#mist").onclick=()=>startMistakes();
 document.querySelectorAll(".subj").forEach(b=>b.onclick=()=>{SFX.tap();S.subj=b.dataset.s;save();viewHome()});
 const ins=$("#insBtn");if(ins)ins.onclick=async()=>{if(deferredInstall){deferredInstall.prompt();await deferredInstall.userChoice;deferredInstall=null;viewHome()}};
 const insX=$("#insX");if(insX)insX.onclick=()=>{S.hideInstall=true;save();viewHome()};
 renderPath(sid)}
function installCard(){const ios=/iphone|ipad|ipod/i.test(navigator.userAgent);
 return `<div class="card install"><div class="row" style="justify-content:space-between"><b style="font-family:var(--f-d)">Installe l'appli sur ton téléphone</b><button class="chip" id="insX" aria-label="Masquer"><svg class="ic" style="width:14px;height:14px"><use href="#i-x"/></svg></button></div>
 ${deferredInstall?`<button class="btn block" id="insBtn">Ajouter à l'écran d'accueil</button>`:ios?`<span class="muted" style="font-size:14px">Dans Safari : bouton <b>Partager</b> puis <b>Sur l'écran d'accueil</b>. Elle marchera ensuite hors ligne, dans le bus.</span>`:`<span class="muted" style="font-size:14px">Dans Chrome : menu <b>⋮</b> puis <b>Installer l'application</b> (ou « Ajouter à l'écran d'accueil »). Elle marchera ensuite hors ligne.</span>`}</div>`}

function renderPath(sid){
 const p=$("#path"),us=UNITS[sid]||[],s=SUBJ[sid];
 if(!us.length){p.innerHTML=`<div class="empty">Le contenu de ${s.code} ${esc(s.name)} arrive bientôt.</div>`;return}
 const m=subjMastery(sid);
 let next=us.findIndex(u=>!u.exam&&unitStat(sid,u).lv<1);if(next<0)next=us.reduce((bi,u,i)=>!u.exam&&mastery(sid,u)<mastery(sid,us[bi])?i:bi,0);
 const off=[0,52,70,40,-10,-56,-70,-36];
 p.innerHTML=`<div class="unit-h"><div><b>${s.code} · ${esc(s.name)}</b><small>Maîtrise ${Math.round(m*100)} %</small></div><svg class="ic" style="width:30px;height:30px"><use href="#i-book"/></svg></div>`+
 us.map((u,i)=>{const st=unitStat(sid,u),ms=mastery(sid,u),done=st.lv>=5,c=2*Math.PI*46;
  return `<div class="node-wrap" style="transform:translateX(${off[i%off.length]}px);margin-top:${i?18:30}px">
   <button class="node ${done?"done":""} ${u.exam?"exam":""}" data-u="${i}" aria-label="${esc(u.title)}">
    ${i===next?`<span class="start-pop">${st.lv?"Continuer":"Commencer"}</span>`:""}
    <svg class="node-ring" viewBox="0 0 100 100"><circle class="bg" cx="50" cy="50" r="46"/><circle class="fg" cx="50" cy="50" r="46" stroke-dasharray="${c}" stroke-dashoffset="${c*(1-ms)}"/></svg>
    <svg class="ic"><use href="#${u.exam?"i-clock":done?"i-star":"i-bolt"}"/></svg></button>
   <b>${esc(u.title)}</b>${u.exam?`<small>${esc(u.desc||"")}</small>`:`<span class="crowns">${[0,1,2,3,4].map(k=>`<svg class="ic ${k<st.lv?"":"off"}"><use href="#i-star"/></svg>`).join("")}</span>`}
  </div>`}).join("");
 p.querySelectorAll(".node").forEach(b=>b.onclick=()=>{SFX.tap();unitSheet(sid,+b.dataset.u)})}

/* ---------- Feuille d'une unité ---------- */
function openSheet(html,onReady){const w=$("#sheet");w.innerHTML=`<div class="sheet" role="dialog"><div class="grab"></div>${html}</div>`;w.hidden=false;w.onclick=e=>{if(e.target===w)closeSheet()};onReady&&onReady(w.firstChild)}
function closeSheet(){$("#sheet").hidden=true;$("#sheet").innerHTML=""}
function unitSheet(sid,i){const u=UNITS[sid][i],st=unitStat(sid,u),ms=mastery(sid,u);const n=u.n||10;
 openSheet(`<div class="eyebrow">${SUBJ[sid].code} · Unité ${i+1}</div><h2>${esc(u.title)}</h2>
  <div class="row"><div class="meter" style="flex:1"><i style="width:${Math.round(ms*100)}%"></i></div><b style="font:700 14px var(--f-m)">${Math.round(ms*100)} %</b></div>
  <span class="muted" style="font-size:14px">${u.qs.length} question${u.qs.length>1?"s":""} de cours${u.gens.length?" + exercices générés à l'infini":""}. ${st.lv?`${st.lv} leçon${st.lv>1?"s":""} réussie${st.lv>1?"s":""}.`:""}</span>
  ${u.cours&&u.cours.length?`<button class="btn ghost block" id="uc"><svg class="ic"><use href="#i-book"/></svg>Lire l'essentiel (1 min)</button>`:""}
  <button class="btn c block" id="ul"><svg class="ic"><use href="#${u.exam?"i-clock":"i-bolt"}"/></svg>${u.exam?`Lancer · ${n} questions, ${u.minutes} min`:`Leçon · ${n} questions`}</button>`,el=>{setC(el,sid);
  el.querySelector("#ul").onclick=()=>{closeSheet();startUnit(sid,i)};
  const c=el.querySelector("#uc");if(c)c.onclick=()=>{closeSheet();flashCards(sid,u.cours,()=>startUnit(sid,i))}})}

/* ---------- Fiches éclair (avant la leçon) ---------- */
function flashCards(sid,ids,then){const cards=(COURS[sid]||[]).filter(c=>ids.includes(c.id));let k=0;const el=$("#lesson");el.hidden=false;setC(el,sid);document.body.style.overflow="hidden";
 const draw=()=>{const c=cards[k];el.innerHTML=`<div class="l-top"><button class="x" id="lx" aria-label="Fermer"><svg class="ic"><use href="#i-x"/></svg></button><div class="cards-pager" style="flex:1">${cards.map((_,j)=>`<i class="${j===k?"on":""}"></i>`).join("")}</div></div>
  <div class="l-body"><div class="qkind">L'essentiel · ${k+1}/${cards.length}</div>${fcHTML(c)}</div>
  <div class="l-foot"><button class="btn c block" id="fn">${k<cards.length-1?"Suivant":"Je m'entraîne"}</button></div>`;
  $("#lx").onclick=closeLesson;$("#fn").onclick=()=>{SFX.tap();if(k<cards.length-1){k++;draw()}else{then()}}};draw()}
const fcHTML=c=>`<div class="fc"><h3><i></i>${esc(c.title)}</h3><ul>${c.points.map(p=>`<li>${p}</li>`).join("")}</ul></div>`;

/* ---------- Leçon ---------- */
let L=null;
function startUnit(sid,i){const u=UNITS[sid][i];const n=u.n||10;
 const q=buildQueue(sid,u.qs,u.gens,n);runLesson({sid,unit:u,ui:i,queue:q,exam:!!u.exam,minutes:u.minutes,title:u.title})}
function startBus(sid){sid=sid||(upcoming().find(e=>(UNITS[e.subj]||[]).length)||{subj:curSubj()}).subj;const us=(UNITS[sid]||[]).filter(u=>!u.exam);if(!us.length){toast("Pas encore de contenu pour cette matière.");return}
 const pool=us.flatMap(u=>u.qs),gens=[...new Set(us.flatMap(u=>u.gens))];runLesson({sid,queue:buildQueue(sid,pool,gens,8),title:"Session bus"})}
function startMistakes(){const ks=shuffle(mistakes()).slice(0,10);if(!ks.length)return;runLesson({sid:QIDX[ks[0]].sid,queue:ks.map(k=>prep(QIDX[k].q,QIDX[k].sid)),title:"Mes erreurs",mixed:true})}

function runLesson(o){
 L=Object.assign({i:0,combo:0,best:0,good:0,firstTry:0,xp:0,wrong:[],retried:new Set(),t0:Date.now(),total:o.queue.length},o);
 const el=$("#lesson");el.hidden=false;document.body.style.overflow="hidden";setC(el,o.sid);
 if(L.exam){L.deadline=Date.now()+L.minutes*6e4}
 drawQ()}
function closeLesson(){if(L&&L.i>0&&!L.over&&!confirm("Quitter la leçon ? Ta progression de cette leçon sera perdue."))return;
 clearInterval(L&&L.tick);L=null;const el=$("#lesson");el.hidden=true;el.innerHTML="";document.body.style.overflow="";go(TAB)}

function drawQ(){
 const q=L.queue[L.i];if(!q){return finish()}
 if(L.mixed)setC($("#lesson"),q.sid);
 const el=$("#lesson");const prog=Math.round(100*L.i/L.queue.length);
 const neg=q.type==="input"&&q.answers.some(a=>/^-/.test(a));
 el.innerHTML=`<div class="l-top"><button class="x" id="lx" aria-label="Quitter"><svg class="ic"><use href="#i-x"/></svg></button>
   <div class="meter"><i style="width:${prog}%"></i></div>
   ${L.exam?`<span class="timer" id="tm"><svg class="ic" style="width:16px;height:16px"><use href="#i-clock"/></svg><span></span></span>`:`<span class="combo" id="cb" ${L.combo>=2?"":"style=visibility:hidden"}><svg class="ic"><use href="#i-flame"/></svg>${L.combo}</span>`}</div>
  <div class="l-body">
   <div class="qkind">${esc(q.kind||(L.mixed?SUBJ[q.sid].code:L.title))}${L.retried.has(q)?" · deuxième chance":""}</div>
   <div class="qtext">${q.q}</div>
   ${q.mcd?mcdHTML(q.mcd):""}
   ${q.type==="mcq"?`<div class="choices">${q.choices.map((c,i)=>`<button class="choice" data-i="${i}" aria-pressed="false"><span class="k">${i+1}</span><span>${c}</span></button>`).join("")}</div>`
   :`<input class="ans" id="ans" autocomplete="off" autocapitalize="off" spellcheck="false" inputmode="${q.im||"text"}" placeholder="Ta réponse">
     ${q.bin?`<div class="keys">${["0","1","⌫"].map(k=>`<button data-k="${k}">${k}</button>`).join("")}</div>`:neg?`<div class="keys"><button data-k="−">−</button><button data-k=",">,</button></div>`:""}
     ${q.set?`<div class="hint">Écris l'ensemble avec des accolades, ex. {a,b,c}</div>`:""}`}
  </div>
  <div class="l-foot" id="foot"><button class="btn c block" id="go" disabled>${L.exam?"Valider":"Vérifier"}</button></div>`;
 $("#lx").onclick=closeLesson;
 const goB=$("#go");let sel=null;
 if(q.type==="mcq"){el.querySelectorAll(".choice").forEach(b=>b.onclick=()=>{if(b.disabled)return;SFX.tap();el.querySelectorAll(".choice").forEach(x=>x.setAttribute("aria-pressed","false"));b.setAttribute("aria-pressed","true");sel=+b.dataset.i;goB.disabled=false})}
 else{const a=$("#ans");a.oninput=()=>goB.disabled=!a.value.trim();a.onkeydown=e=>{if(e.key==="Enter"&&a.value.trim()){e.preventDefault();goB.click()}};
  el.querySelectorAll(".keys button").forEach(b=>b.onclick=()=>{SFX.tap();const k=b.dataset.k;if(k==="⌫")a.value=a.value.slice(0,-1);else a.value+=k==="−"?"-":k;a.oninput()});
  if(!q.bin&&matchMedia("(pointer:fine)").matches)a.focus()}
 if(L.exam){const tm=$("#tm span");const upd=()=>{const ms=L.deadline-Date.now();if(ms<=0){clearInterval(L.tick);timeUp();return}tm.textContent=Math.floor(ms/6e4)+":"+String(Math.floor(ms/1e3)%60).padStart(2,"0");$("#tm").classList.toggle("hot",ms<60e3)};clearInterval(L.tick);L.tick=setInterval(upd,500);upd()}
 goB.onclick=()=>{if(goB.dataset.next){next();return}
  const given=q.type==="mcq"?sel:$("#ans").value;const ok=check(q,given);
  record(q,ok);
  if(L.exam){if(!ok)L.wrong.push({q,given});else L.good++;L.i++;drawQ();return}
  feedback(q,ok,given)}}

function mcdHTML(m){const [E1,E2,A,c1,c2,,i1,i2]=m;return `<div class="mcd">${esc(E1)} <span style="opacity:.7">(${esc(c1)})</span> — ${esc(A)} — <span style="opacity:.7">(${esc(c2)})</span> ${esc(E2)}</div>`}
function norm(s){return String(s).toLowerCase().normalize("NFC").replace(/[−–]/g,"-").replace(/\s+/g,"").replace(/^0x/,"").replace(/,/g,".").replace(/\.0+$/,"")}
function normSet(s){return String(s).replace(/[{}\s]/g,"").split(/[,;]/).filter(Boolean).sort().join(",")}
function check(q,g){
 if(q.type==="mcq")return g===q.answer;
 if(q.set)return q.answers.some(a=>normSet(a)===normSet(g));
 if(q.spaced){const n=s=>String(s).trim().replace(/[−–]/g,"-").replace(/[,;]+/g," ").replace(/\s+/g," ");return q.answers.some(a=>n(a)===n(g))}
 const G=norm(g);return q.answers.some(a=>{const A=norm(a);if(A===G)return true;const x=parseFloat(A),y=parseFloat(G);return !isNaN(x)&&/^-?[\d.]+$/.test(G)&&/^-?[\d.]+$/.test(A)&&Math.abs(x-y)<1e-9})}
function record(q,ok){S.answered++;if(ok)S.good++;if(q.key){const t=qst(q.key);t.n++;t.t=Date.now();if(ok)t.b=Math.min(5,t.b+1);else{t.w++;t.b=Math.max(0,t.b-2)}}save()}
const PRAISE=["Bien joué !","Excellent !","Parfait !","Exactement !","Bravo !","Tu gères !"];
function feedback(q,ok,given){
 const foot=$("#foot"),el=$("#lesson");
 if(q.type==="mcq"){el.querySelectorAll(".choice").forEach(b=>{b.disabled=true;const i=+b.dataset.i;if(i===q.answer)b.classList.add("good");else if(i===given)b.classList.add("wrong")})}
 else{$("#ans").readOnly=true;el.querySelectorAll(".keys button").forEach(b=>b.disabled=true)}
 const sol=q.type==="mcq"?q.choices[q.answer]:esc(q.answers[0]);
 if(ok){L.combo++;L.best=Math.max(L.best,L.combo);L.good++;const retry=L.retried.has(q);let g=retry?5:10;if(!retry)L.firstTry++;
  if(L.combo>0&&L.combo%5===0){g+=5;setTimeout(()=>{SFX.combo();toast(`Série de ${L.combo} bonnes réponses ! +5 XP`)},250)}else SFX.good();
  L.xp+=g;xpPop(g)}
 else{L.combo=0;SFX.bad();if(!L.retried.has(q)&&L.retried.size<4){const c=q.gen?q:prep(QIDX[q.key]?QIDX[q.key].q:q,q.sid);if(!q.gen)c.key=q.key;L.retried.add(c);L.queue.push(c)}}
 foot.className="l-foot "+(ok?"ok":"ko");
 foot.innerHTML=`<div class="fb-h pop"><span class="badge"><svg class="ic"><use href="#${ok?"i-check":"i-x"}"/></svg></span>${ok?PRAISE[R(0,PRAISE.length-1)]:"Pas tout à fait"}</div>
  <div class="fb-x">${ok?"":`<div class="sol">Réponse : ${sol}</div>`}${q.expl?`<div>${q.expl}</div>`:""}</div>
  <button class="btn ${ok?"ok":"bad"} block" id="go" data-next="1">Continuer</button>`;
 const cb=$("#cb");if(cb){cb.innerHTML=`<svg class="ic"><use href="#i-flame"/></svg>${L.combo}`;cb.style.visibility=L.combo>=2?"visible":"hidden";if(ok)cb.classList.add("pop")}
 $("#go").onclick=next;$("#go").focus({preventScroll:true})}
function next(){L.i++;drawQ()}
function timeUp(){toast("Temps écoulé !");for(let j=L.i;j<L.queue.length;j++)L.wrong.push({q:L.queue[j],given:null});L.i=L.queue.length;finish()}

function finish(){
 clearInterval(L.tick);L.over=true;
 const total=L.exam?L.queue.length:L.total;const acc=Math.round(100*(L.exam?L.good:L.firstTry)/Math.max(1,total));
 if(L.exam){L.xp=L.good*10}
 let bonus=10+(acc===100?10:0);L.xp+=bonus;addXP(L.xp);
 if(L.unit){const k=unitKey(L.sid,L.unit),st=S.units[k]||{lv:0,best:0};if(acc>=70)st.lv=Math.min(5,st.lv+1);st.best=Math.max(st.best,acc);S.units[k]=st}
 const before=S.streak.last===dkey();const bumped=bumpStreak();save();renderTop();
 const secs=Math.round((Date.now()-L.t0)/1000);const tstr=Math.floor(secs/60)+":"+String(secs%60).padStart(2,"0");
 const el=$("#lesson");SFX.end();confetti();
 const showEnd=()=>{el.innerHTML=`<div class="end">
   <div class="big">${acc===100?"Parfait !":acc>=70?"Leçon terminée !":"Continue comme ça"}</div>
   <div class="muted">${L.exam?`${L.good}/${total} bonnes réponses${acc>=70?" : ça passe !":""}`:L.best>=5?`Meilleure série : ${L.best} d'affilée`:esc(L.title||"")}</div>
   <div class="end-stats"><div><small>XP</small><b>+${L.xp}</b></div><div><small>Précision</small><b>${acc} %</b></div><div><small>Temps</small><b>${tstr}</b></div></div>
   ${L.exam&&L.wrong.length?`<div class="review"><div class="eyebrow">À revoir (${L.wrong.length})</div>${L.wrong.map(w=>`<div class="it"><div class="q">${w.q.q}</div><div><b>Réponse :</b> ${w.q.type==="mcq"?w.q.choices[w.q.answer]:esc(w.q.answers[0])}</div>${w.q.expl?`<div class="muted">${w.q.expl}</div>`:""}</div>`).join("")}</div>`:""}
  </div><div class="l-foot"><button class="btn c block" id="done">Continuer</button>${L.unit?`<button class="btn ghost block" id="again">Encore une</button>`:""}</div>`;
  $("#done").onclick=()=>{L=null;closeLesson()};
  const ag=$("#again");if(ag){const sid=L.sid,ui=L.ui;ag.onclick=()=>{L=null;startUnit(sid,ui)}}};
 if(bumped&&!before){el.innerHTML=`<div class="end"><div class="streak-big pop"><svg class="ic"><use href="#i-flame"/></svg><b>${S.streak.n}</b></div><div class="big">jour${S.streak.n>1?"s":""} de série !</div><div class="muted">${S.streak.n===1?"C'est parti. Reviens demain pour la garder allumée.":"Reviens demain pour ne pas la casser."}${S.streak.n%7===0?" Tu gagnes un gel de série.":""}</div></div><div class="l-foot"><button class="btn c block" id="sk">Continuer</button></div>`;
  setTimeout(()=>SFX.streak(),500);$("#sk").onclick=showEnd}
 else showEnd()}

/* ---------- Agenda ---------- */
function viewAgenda(){
 const v=$("#view"),all=exams(),now=new Date();const up=all.filter(e=>e.d>now-60*60e3),past=all.filter(e=>e.d<=now-60*60e3);
 const start=dayStart(now);start.setDate(start.getDate()-((start.getDay()+6)%7));
 const days=Array.from({length:28},(_,i)=>{const d=new Date(start);d.setDate(d.getDate()+i);return d});
 const nx=up[0];
 v.innerHTML=`<div class="stack">
  <h1>Agenda des évals</h1>
  ${nx?`<section class="hero next-exam" id="hero"><div class="eyebrow">Prochaine · ${SUBJ[nx.subj]?SUBJ[nx.subj].code:""} · ${jx(nx.d)}</div><h2>${esc(nx.title)}</h2><div class="cd" id="cd">${countdownHTML(nx.d)}</div></section>`:""}
  <div class="card"><div class="eyebrow">4 semaines</div><div class="strip">${["L","M","M","J","V","S","D"].map(x=>`<span class="dow">${x}</span>`).join("")}
   ${days.map(d=>{const e=all.find(e=>dkey(e.d)===dkey(d));return `<div class="d ${d<dayStart(now)?"past":""} ${dkey(d)===dkey(now)?"today":""} ${e?"has":""}" ${e?`style="--ec:${col(e.subj)}"`:""}>${d.getDate()}${e?`<small>${SUBJ[e.subj]?SUBJ[e.subj].code.replace("R1.","R"):""}</small>`:""}</div>`}).join("")}</div></div>
  ${up.map(e=>exCard(e)).join("")}
  ${past.length?`<details class="card"><summary class="eyebrow" style="cursor:pointer">Évals passées (${past.length})</summary>${past.map(e=>`<div style="font-size:14px;padding:4px 0"><b>${SUBJ[e.subj]?SUBJ[e.subj].code:""}</b> · ${esc(e.title)} · ${e.d.getDate()}/${e.d.getMonth()+1}</div>`).join("")}</details>`:""}
 </div>`;
 if(nx){setC($("#hero"),nx.subj);ticker=setInterval(()=>{const cd=$("#cd");if(cd)cd.innerHTML=countdownHTML(nx.d)},1000)}
 v.querySelectorAll("[data-rev]").forEach(b=>b.onclick=()=>{S.subj=b.dataset.rev;save();go("home")})}
function exCard(e){const s=SUBJ[e.subj]||{code:"",name:""};const n=daysBetween(new Date(),e.d);const has=(UNITS[e.subj]||[]).length;const m=Math.round(subjMastery(e.subj)*100);
 return `<article class="ex ${n<=1?"soon":""}" style="--ec:${col(e.subj)}">
  <div class="date"><small>${DOW[e.d.getDay()]}</small><b>${e.d.getDate()}</b><small>${MON[e.d.getMonth()]}</small></div>
  <div class="body"><div class="when"><span class="jx ${n<=1?"hot":n<=4?"warm":""}">${jx(e.d)}</span>${e.kind==="deadline"?"avant "+hm(e.d):hm(e.d)+(e.end?" – "+e.end.replace(/^0/,"").replace(":00"," h").replace(":"," h "):"")}</div>
   <span class="tag"><i></i>${s.code} · ${esc(s.name)}</span>
   <h3>${esc(e.title)}</h3><p>${esc(e.scope)}</p>${e.rules?`<p class="rules">${esc(e.rules)}</p>`:""}
   ${has?`<div class="row"><div class="meter" style="flex:1;--c:${col(e.subj)}"><i style="width:${m}%"></i></div><small style="font:700 12px var(--f-m)">${m} %</small></div><button class="btn ghost" data-rev="${e.subj}">Réviser ${s.code}</button>`:""}
  </div></article>`}

/* ---------- Cours ---------- */
function viewCours(){const v=$("#view");const ids=Object.keys(COURS);let sid=ids.includes(S.coursSubj)?S.coursSubj:ids.includes(curSubj())?curSubj():ids[0];
 v.innerHTML=`<div class="stack"><h1>L'essentiel du cours</h1>
  <div class="subjs">${ids.map(id=>`<button class="subj" data-s="${id}" aria-pressed="${id===sid}" style="--sc:${col(id)}"><b><i></i>${SUBJ[id].code}</b><small>${esc(SUBJ[id].name)}</small></button>`).join("")}</div>
  <div class="stack" id="cl">${COURS[sid].map(fcHTML).join("")}</div>
  ${(window.CHAPTERS[sid]||[]).length?`<div class="eyebrow">Cours complet</div>${window.CHAPTERS[sid].map((c,i)=>`<details class="card chap"><summary><b>${esc(c.title)}</b></summary><div class="chap-b">${c.html}</div></details>`).join("")}`:""}
  <a class="btn ghost block" href="${window.FULL_COURSE_URL}" target="_blank" rel="noopener">Cours complets et fiches (toutes les matières)</a>
 </div>`;setC($("#cl"),sid);
 v.querySelectorAll(".subj").forEach(b=>b.onclick=()=>{S.coursSubj=b.dataset.s;save();viewCours()})}

/* ---------- Profil ---------- */
function viewProfil(){const v=$("#view");const now=new Date();
 const week=Array.from({length:7},(_,i)=>{const d=new Date(now);d.setDate(d.getDate()-6+i);return {d,x:S.days[dkey(d)]||0}});const mx=Math.max(S.set.goal,...week.map(w=>w.x));
 const acc=S.answered?Math.round(100*S.good/S.answered):0;
 v.innerHTML=`<div class="stack"><h1>Ta progression</h1>
  <div class="kpis">
   <div class="kpi"><svg class="ic" style="color:var(--flame)"><use href="#i-flame"/></svg><div><b>${streakNow()}</b><small>jours de série (record ${S.streak.best})</small></div></div>
   <div class="kpi"><svg class="ic" style="color:var(--warn)"><use href="#i-bolt"/></svg><div><b>${S.xp}</b><small>XP au total</small></div></div>
   <div class="kpi"><svg class="ic" style="color:var(--ok)"><use href="#i-check"/></svg><div><b>${S.answered}</b><small>réponses, ${acc} % justes</small></div></div>
   <div class="kpi"><svg class="ic" style="color:#38bdf8"><use href="#i-star"/></svg><div><b>${S.freeze}</b><small>gel${S.freeze>1?"s":""} de série (1 par 7 jours)</small></div></div>
  </div>
  <div class="card"><div class="eyebrow">XP des 7 derniers jours · objectif ${S.set.goal}</div><div class="bars">${week.map((w,i)=>`<div class="bar ${i===6?"today":""}"><i class="${w.x>=S.set.goal?"met":""}" style="height:${Math.max(4,100*w.x/mx)}%"></i><small>${DOW[w.d.getDay()].slice(0,1).toUpperCase()}</small></div>`).join("")}</div></div>
  <div class="card"><div class="eyebrow">Maîtrise par matière</div>${window.SUBJECTS.filter(s=>(UNITS[s.id]||[]).length).map(s=>{const m=Math.round(subjMastery(s.id)*100);return `<div class="mrow" style="--c:${col(s.id)}"><div class="row"><b>${s.code} ${esc(s.name)}</b><span style="font:700 13px var(--f-m)">${m} %</span></div><div class="meter"><i style="width:${m}%"></i></div></div>`}).join("")}</div>
  <div class="card"><div class="eyebrow">Réglages</div>
   <div class="set"><span>Vibrations</span><button class="sw" data-k="vib" aria-pressed="${S.set.vib}" aria-label="Vibrations"></button></div>
   <div class="set"><span>Sons</span><button class="sw" data-k="sound" aria-pressed="${S.set.sound}" aria-label="Sons"></button></div>
   <div class="set"><span>Objectif par jour</span><div class="seg" data-k="goal">${[20,50,100,150].map(g=>`<button data-v="${g}" aria-pressed="${S.set.goal===g}">${g}</button>`).join("")}</div></div>
   <div class="set"><span>Thème</span><div class="seg" data-k="theme">${[["auto","Auto"],["light","Clair"],["dark","Sombre"]].map(([k,l])=>`<button data-v="${k}" aria-pressed="${S.set.theme===k}">${l}</button>`).join("")}</div></div>
   <div class="set"><span>Rappel quotidien</span><span class="row"><input type="time" class="time" id="rt" value="${S.set.remind}"><button class="btn ghost" id="ics" style="padding:8px 12px;font-size:14px">Ajouter</button></span></div>
   <p class="muted" style="font-size:13px;margin:0">« Ajouter » crée un rappel quotidien dans l'agenda de ton téléphone. ${navigator.vibrate?"":"Ton navigateur ne gère pas les vibrations (iPhone) : les sons prennent le relais."}</p>
  </div>
  <div class="card"><div class="eyebrow">Sauvegarde</div><p class="muted" style="font-size:14px;margin:0">Ta progression reste sur ce téléphone. Copie-la pour la transférer.</p>
   <div class="row"><button class="btn ghost" id="exp" style="flex:1">Copier</button><button class="btn ghost" id="imp" style="flex:1">Coller</button></div>
   <button class="btn ghost" id="rst" style="color:var(--bad)">Tout remettre à zéro</button></div>
 </div>`;
 v.querySelectorAll(".sw").forEach(b=>b.onclick=()=>{S.set[b.dataset.k]=!S.set[b.dataset.k];save();b.setAttribute("aria-pressed",S.set[b.dataset.k]);SFX.tap()});
 v.querySelectorAll(".seg").forEach(g=>g.querySelectorAll("button").forEach(b=>b.onclick=()=>{const k=g.dataset.k;S.set[k]=k==="goal"?+b.dataset.v:b.dataset.v;save();applyTheme();renderTop();viewProfil()}));
 $("#rt").onchange=e=>{S.set.remind=e.target.value;save()};
 $("#ics").onclick=()=>downloadICS(S.set.remind);
 $("#exp").onclick=async()=>{try{await navigator.clipboard.writeText(btoa(unescape(encodeURIComponent(JSON.stringify(S)))));toast("Progression copiée")}catch(e){toast("Copie impossible ici")}};
 $("#imp").onclick=()=>{const t=prompt("Colle ici ta progression copiée :");if(!t)return;try{const o=JSON.parse(decodeURIComponent(escape(atob(t.trim()))));if(typeof o.xp!=="number")throw 0;S=Object.assign({},DEF,o);save();toast("Progression importée");go("profil")}catch(e){toast("Ce code n'est pas valide")}};
 $("#rst").onclick=()=>{if(confirm("Effacer toute ta progression ?")){S=structuredClone(DEF);save();go("profil")}}}
function downloadICS(t){const [h,m]=t.split(":");const d=new Date();const ds=dkey(d).replace(/-/g,"")+"T"+h+m+"00";
 const ics=["BEGIN:VCALENDAR","VERSION:2.0","PRODID:-//Revise BUT1//FR","BEGIN:VEVENT","UID:revise-but1-rappel@local","DTSTAMP:"+ds,"DTSTART:"+ds,"DURATION:PT10M","RRULE:FREQ=DAILY","SUMMARY:Révise : garde ta série !","DESCRIPTION:3 minutes suffisent. Ouvre l'appli Révise.","BEGIN:VALARM","ACTION:DISPLAY","DESCRIPTION:Révise : garde ta série !","TRIGGER:PT0M","END:VALARM","END:VEVENT","END:VCALENDAR"].join("\r\n");
 const a=document.createElement("a");a.href=URL.createObjectURL(new Blob([ics],{type:"text/calendar"}));a.download="rappel-revise.ics";document.body.appendChild(a);a.click();setTimeout(()=>{URL.revokeObjectURL(a.href);a.remove()},1000)}

/* ---------- Démarrage ---------- */
applyTheme();
matchMedia("(prefers-color-scheme: dark)").addEventListener("change",()=>{if(S.set.theme==="auto")go(TAB)});
document.addEventListener("visibilitychange",()=>{if(!document.hidden&&!L)go(TAB)});
document.addEventListener("keydown",e=>{if(!L||$("#lesson").hidden)return;if(/^[1-9]$/.test(e.key)&&document.activeElement.id!=="ans"){const b=document.querySelector(`.choice[data-i="${+e.key-1}"]`);if(b&&!b.disabled)b.click()}else if(e.key==="Enter"&&document.activeElement.id!=="ans"){const g=$("#go");if(g&&!g.disabled){e.preventDefault();g.click()}}});
go("home");
if("serviceWorker" in navigator&&location.protocol==="https:")navigator.serviceWorker.register("sw.js").catch(()=>{});
window.__S=()=>S;
})();
