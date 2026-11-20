<?php require dirname(__DIR__) . "/lib/auth.php"; require_login(); ?><!doctype html><html><head><meta charset=utf8><meta name=viewport content="width=device-width,initial-scale=1,viewport-fit=cover"><style>:root{color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}html{scroll-padding-top:env(safe-area-inset-top,0px)}body{margin:0;padding:0;font:14px -apple-system,BlinkMacSystemFont,sans-serif;background:#fff;color:#000}img{max-width:100%}[hidden]:not([hidden=until-found i]){display:none!important}</style></head><body>
<title>Révisions BUT1</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Patrick+Hand&family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono:wght@400;600&display=swap">
<style>
/* Layout : carnet quadrillé — un en-tête compact, des onglets, une colonne de lecture de ~70ch, le quiz en plein cadre */
:root{
  --paper:#f4f4f2; --sheet:#ffffff; --ink:#111111; --muted:#5f5f5f; --grid:#e9e9e7; --line:#dcdcd9;
  --accent:#111111; --accent-ink:#ffffff; --accent-soft:#ececea;
  --ok:#1f8a4c; --ok-soft:#e1f5e8; --bad:#c2372f; --bad-soft:#fbe6e4; --warn:#a86a00; --warn-soft:#fff1d6;
  --f-display:"Bricolage Grotesque",ui-sans-serif,system-ui,sans-serif;
  --f-body:"Atkinson Hyperlegible",ui-sans-serif,system-ui,sans-serif;
  --f-mono:"JetBrains Mono",ui-monospace,SFMono-Regular,Menlo,monospace;
}
@media (prefers-color-scheme: dark){:root:not([data-theme="light"]){
  --paper:#0a0a0a; --sheet:#151515; --ink:#f2f2f2; --muted:#a3a3a3; --grid:#1c1c1c; --line:#2c2c2c;
  --accent:#f2f2f2; --accent-ink:#0a0a0a; --accent-soft:#232323;
  --ok:#5fd08e; --ok-soft:#173326; --bad:#ff8a80; --bad-soft:#3a1e1d; --warn:#f2bd57; --warn-soft:#352a14; color-scheme:dark}}
:root[data-theme="dark"]{
  --paper:#0a0a0a; --sheet:#151515; --ink:#f2f2f2; --muted:#a3a3a3; --grid:#1c1c1c; --line:#2c2c2c;
  --accent:#f2f2f2; --accent-ink:#0a0a0a; --accent-soft:#232323;
  --ok:#5fd08e; --ok-soft:#173326; --bad:#ff8a80; --bad-soft:#3a1e1d; --warn:#f2bd57; --warn-soft:#352a14; color-scheme:dark}
*{box-sizing:border-box}
body{background:var(--paper);color:var(--ink);font:16px/1.55 var(--f-body);
  padding-inline:16px;padding-block:0 48px}
.wrap{max-width:860px;margin:0 auto}
header.top{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:12px;padding-block:16px 12px}
.brand{display:flex;align-items:center;gap:10px;background:none;border:0;padding:0;color:var(--ink);cursor:pointer;text-align:left;font:inherit;min-width:0}
.logo{display:grid;place-items:center;width:40px;height:40px;border-radius:11px;background:var(--ink);color:var(--paper);font:800 17px var(--f-display);letter-spacing:-.02em;flex:none;box-shadow:inset 0 -3px 0 color-mix(in srgb,var(--paper) 22%,transparent)}
.brand-t{display:flex;flex-direction:column;min-width:0}.brand-t b{font:800 clamp(19px,4vw,24px)/1.1 var(--f-display);letter-spacing:-.01em}
.brand-t small{color:var(--muted);font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.stats{display:flex;gap:6px;flex-wrap:wrap;align-items:center}
.chip{display:inline-flex;align-items:center;gap:6px;background:var(--sheet);border:1px solid var(--line);border-radius:999px;padding:4px 11px;font:600 14px var(--f-mono);font-variant-numeric:tabular-nums;color:var(--ink)}
.chip b{font-family:var(--f-display);font-weight:700}
.chip.streak{color:var(--muted)}.chip.streak.lit{color:var(--warn);border-color:color-mix(in srgb,var(--warn) 40%,var(--line))}.chip.streak b{color:var(--ink)}
.chip.icon{cursor:pointer;padding:6px 9px}.chip.icon[aria-pressed="false"] .snd-on,.chip.icon[aria-pressed="true"] .snd-off{display:none}
.ring-bg{fill:none;stroke:var(--grid);stroke-width:3}.ring-fg{fill:none;stroke:var(--ok);stroke-width:3;stroke-linecap:round;transform:rotate(-90deg);transform-origin:10px 10px;transition:stroke-dashoffset .5s}
.sr{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}
.mainnav{display:flex;gap:6px;overflow-x:auto;scrollbar-width:none;padding-bottom:10px;margin-bottom:6px}
.mainnav button{flex:none;display:flex;flex-direction:column;align-items:flex-start;gap:0;min-width:96px;text-align:left;border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;padding:7px 12px;background:var(--sheet);color:var(--ink);cursor:pointer;font:inherit}
.mainnav button b{font:800 15px var(--f-display)}.mainnav button small{font:600 12px var(--f-mono);color:var(--muted);white-space:nowrap}
.mainnav button small.hot{color:var(--bad)}
.mainnav button[aria-current="page"]{border-color:var(--ink);background:var(--ink);color:var(--paper)}.mainnav button[aria-current="page"] small{color:color-mix(in srgb,var(--paper) 70%,transparent)}
.mainnav button:active,.btn:active,.choice:active,.tile:active,.deck:active{transform:translateY(2px)}
nav.tabs{display:flex;gap:4px;overflow-x:auto;border-bottom:2px solid var(--line);margin-bottom:20px;position:sticky;top:env(safe-area-inset-top,0px);background:var(--paper);z-index:5}
nav.tabs button{font:600 15px var(--f-display);background:none;border:0;color:var(--muted);padding:10px 12px;border-bottom:3px solid transparent;margin-bottom:-2px;cursor:pointer;white-space:nowrap}
nav.tabs button[aria-selected="true"]{color:var(--ink);border-bottom-color:var(--accent)}
button:focus-visible,input:focus-visible,textarea:focus-visible,.choice:focus-visible{outline:3px solid var(--accent);outline-offset:2px}
.sheet{background:var(--sheet);border:1px solid var(--line);border-radius:14px;padding:clamp(16px,4vw,32px)}
.f{font-family:var(--f-mono);font-size:.93em;white-space:nowrap}
.muted{color:var(--muted)}
h2{font:800 clamp(22px,4vw,28px)/1.15 var(--f-display);margin:0 0 6px;text-wrap:balance}
h3{font:700 19px/1.25 var(--f-display);margin:26px 0 8px;padding-top:14px;border-top:1px dashed var(--line);text-wrap:balance}
h3:first-of-type{border-top:0;padding-top:0}
.fiche p,.fiche li{max-width:70ch}
.fiche ul{padding-left:20px;margin:6px 0}
.fiche li{margin:3px 0}
.box{border-radius:10px;padding:10px 14px;margin:10px 0;border:1px solid var(--line)}
.box.def{background:var(--accent-soft);border-color:transparent}
.box.trap{background:var(--warn-soft);border-color:transparent}
.box.trap::before{content:"Piège";display:block;font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--warn);margin-bottom:2px}
.box.method{background:var(--ok-soft);border-color:transparent}
.box.method::before{content:"Méthode devoir";display:block;font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--ok);margin-bottom:2px}
.tscroll{overflow-x:auto;margin:8px 0}
table.tt{border-collapse:collapse;font:14px var(--f-mono);font-variant-numeric:tabular-nums}
table.tt th,table.tt td{border:1px solid var(--line);padding:4px 10px;text-align:center}
table.tt th{background:var(--accent-soft);font-weight:600}
table.tt td.v{color:var(--ok);font-weight:600} table.tt td.x{color:var(--bad);font-weight:600}
.grid2{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px}
.grid2>*{min-width:0}
.formula-list{display:grid;grid-template-columns:auto 1fr;gap:4px 14px;align-items:baseline}
.formula-list>*{min-width:0}
.formula-list .f{white-space:normal}
/* Quiz home */
.decks{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:12px}
.deck{display:flex;flex-direction:column;gap:8px;text-align:left;background:var(--sheet);border:1px solid var(--line);border-radius:14px;padding:16px;cursor:pointer;color:var(--ink);font:inherit;border-bottom-width:4px;transition:transform .08s}
.deck:hover{border-color:var(--accent)}
.deck:active{transform:translateY(2px)}
.deck .tag{font:700 11px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted)}
.deck .go{margin-top:auto;font:700 14px var(--f-display);color:var(--ink)}
.deck .go::after{content:" →"}
.deck:hover{border-color:var(--ink)}
.deck strong{font:700 18px/1.2 var(--f-display)}
.deck small{color:var(--muted);font-size:13px}
.meter{height:8px;border-radius:99px;background:var(--grid);overflow:hidden}
.meter i{display:block;height:100%;background:var(--ok);border-radius:99px}
.section-title{font:700 13px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted);margin:22px 0 10px}
/* Lesson */
.lesson{display:flex;flex-direction:column;gap:18px}
.lbar{display:flex;align-items:center;gap:12px}
.lbar .meter{flex:1;height:14px}
.lbar .meter i{background:var(--accent);transition:width .3s}
.xbtn{background:none;border:0;font:700 22px var(--f-display);color:var(--muted);cursor:pointer;padding:4px 8px}
.qkind{font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted)}
.howto{font-size:14px;color:var(--muted);margin:6px 0 0}
.why{font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted);margin-top:4px}
.guide{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin-bottom:8px}
.guide>div{min-width:0;background:var(--sheet);border:1px solid var(--line);border-radius:14px;padding:14px 16px}
.guide b.n{display:inline-grid;place-items:center;width:26px;height:26px;border-radius:50%;background:var(--ink);color:var(--paper);font:700 14px var(--f-display);margin-right:8px}
.guide p{margin:6px 0 0;font-size:14px;color:var(--muted)}
.linkbtn{background:none;border:0;padding:0;font:inherit;color:var(--ink);text-decoration:underline;cursor:pointer}
.qtext{font:600 clamp(19px,3.4vw,23px)/1.35 var(--f-display);margin:4px 0 0;text-wrap:pretty}
.qtext .f{font-size:.9em;white-space:normal}
.choices{display:grid;gap:10px}
.choice{display:flex;gap:12px;align-items:center;text-align:left;width:100%;background:var(--sheet);color:var(--ink);border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;padding:12px 14px;font:16px/1.35 var(--f-body);cursor:pointer}
.choice .k{flex:none;width:26px;height:26px;border:2px solid var(--line);border-radius:7px;display:grid;place-items:center;font:600 13px var(--f-mono);color:var(--muted)}
.choice[aria-pressed="true"]{border-color:var(--accent);background:var(--accent-soft)}
.choice.good{border-color:var(--ok);background:var(--ok-soft)}
.choice.wrong{border-color:var(--bad);background:var(--bad-soft)}
.choice:disabled{cursor:default}
.answer-input{width:100%;font:18px var(--f-mono);padding:12px 14px;border:2px solid var(--line);border-radius:12px;background:var(--sheet);color:var(--ink)}
.symbols{display:flex;flex-wrap:wrap;gap:6px}
.symbols button{font:16px var(--f-mono);min-width:38px;padding:6px 8px;border:1px solid var(--line);border-radius:8px;background:var(--sheet);color:var(--ink);cursor:pointer}
.hint{font-size:13px;color:var(--muted)}
.feedback{border-radius:14px;padding:14px 16px;display:flex;flex-direction:column;gap:6px}
.feedback.ok{background:var(--ok-soft)} .feedback.ko{background:var(--bad-soft)}
.feedback strong{font:800 19px var(--f-display)}
.feedback.ok strong{color:var(--ok)} .feedback.ko strong{color:var(--bad)}
.feedback .expl{max-width:70ch}
.btn{font:700 16px var(--f-display);border:0;border-radius:12px;padding:12px 22px;cursor:pointer;background:var(--accent);color:var(--accent-ink);border-bottom:4px solid color-mix(in srgb,var(--accent) 70%,var(--muted))}
.btn:disabled{opacity:.45;cursor:not-allowed}
.btn.ghost{background:var(--sheet);color:var(--ink);border:2px solid var(--line);border-bottom-width:4px}
.btn.danger{background:var(--bad);color:var(--accent-ink);border-bottom-color:color-mix(in srgb,var(--bad) 60%,black)}
.actions{display:flex;gap:10px;flex-wrap:wrap;justify-content:flex-end}
.end{text-align:center;display:flex;flex-direction:column;align-items:center;gap:14px;padding-block:20px}
.end .big{font:800 clamp(40px,10vw,64px)/1 var(--f-display);color:var(--ink)}
.endstats{display:flex;gap:10px;flex-wrap:wrap;justify-content:center}
.endstats div{background:var(--accent-soft);border-radius:12px;padding:10px 16px;min-width:110px}
.endstats b{display:block;font:800 24px var(--f-display);font-variant-numeric:tabular-nums}
/* Mes fiches */
label.lbl{display:block;font:700 14px var(--f-display);margin:12px 0 4px}
input.txt,textarea.txt{width:100%;font:15px/1.5 var(--f-body);padding:10px 12px;border:1px solid var(--line);border-radius:10px;background:var(--sheet);color:var(--ink)}
textarea.txt{min-height:180px;resize:vertical}
.status{font-size:14px;margin-top:8px;min-height:1.4em}
.status.err{color:var(--bad)} .status.ok{color:var(--ok)}
.mylist{display:flex;flex-direction:column;gap:10px;margin-top:10px}
.myitem{display:flex;flex-wrap:wrap;gap:10px;align-items:center;justify-content:space-between;border:1px solid var(--line);border-radius:12px;padding:12px 14px;background:var(--sheet)}
.myitem>div{min-width:0}
.myitem strong{font:700 16px var(--f-display)}
.myitem .actions{justify-content:flex-start}
.myitem .btn{padding:8px 14px;font-size:14px}
pre.ficheraw{white-space:pre-wrap;font:15px/1.6 var(--f-body);margin:0;max-width:75ch}
.empty{border:2px dashed var(--line);border-radius:12px;padding:16px;color:var(--muted);grid-column:1/-1}
nav.tabs{scrollbar-width:none}

/* Modules interactifs */
.mod{border:1px solid var(--line);border-radius:14px;padding:16px;margin:16px 0;background:var(--paper);display:flex;flex-direction:column;gap:10px;min-width:0}
.mod-h{display:flex;flex-wrap:wrap;align-items:center;gap:8px}
.mod-h strong{font:700 17px var(--f-display)}
.mod-tag{font:700 11px var(--f-display);letter-spacing:.08em;text-transform:uppercase;background:var(--ink);color:var(--paper);border-radius:99px;padding:3px 9px}
.mod-sub{margin:0;color:var(--muted);font-size:14px;max-width:70ch}
.mod-step{font-size:15px;max-width:72ch}
.mod-err{color:var(--bad);font-size:14px;min-height:1em}
.mod-err:empty{display:none}
.presets{display:flex;flex-wrap:wrap;gap:6px}
.pill{font:14px var(--f-mono);border:1px solid var(--line);background:var(--sheet);color:var(--ink);border-radius:99px;padding:5px 11px;cursor:pointer}
.pill:hover{border-color:var(--ink)}
.pill.active{background:var(--ink);color:var(--paper);border-color:var(--ink)}
.sw-row{display:flex;gap:10px;flex-wrap:wrap}
.sw{display:flex;align-items:center;gap:10px;border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;padding:8px 16px;cursor:pointer;font:700 18px var(--f-mono);background:var(--sheet);color:var(--ink)}
.sw b{display:inline-grid;place-items:center;width:30px;height:30px;border-radius:8px}
.sw.on b{background:var(--ok);color:var(--sheet)} .sw.off b{background:var(--bad);color:var(--sheet)}
.lamps{display:grid;grid-template-columns:repeat(auto-fit,minmax(118px,1fr));gap:8px}
.lamp{min-width:0;border-radius:12px;padding:10px 12px;display:flex;flex-direction:column;gap:2px;border:1px solid var(--line);background:var(--sheet)}
.lamp b{font:800 22px var(--f-display)}
.lamp.on b{color:var(--ok)} .lamp.off b{color:var(--bad)}
.lamp.on{background:var(--ok-soft);border-color:transparent} .lamp.off{background:var(--bad-soft);border-color:transparent}
.lamp small{font-size:13px;color:var(--muted)}
svg .t-edge{stroke:var(--muted);stroke-width:1.5}
svg .t-node{fill:var(--sheet);stroke:var(--ink);stroke-width:1.3}
svg .t-node.t-v{fill:var(--ok-soft);stroke:var(--ok)} svg .t-node.t-f{fill:var(--bad-soft);stroke:var(--bad)}
svg .t-txt{font:13px var(--f-mono);fill:var(--ink)}
svg .t-val{font:700 13px var(--f-mono)} svg .tv{fill:var(--ok)} svg .tf{fill:var(--bad)}
svg .t-dot{fill:var(--ink)} svg .t-q{font:600 13px var(--f-mono);fill:var(--muted)}
svg .t-yes{font:12px var(--f-body);fill:var(--ok)} svg .t-no{font:12px var(--f-body);fill:var(--bad)}
table.tt.clickable tr[data-r]{cursor:pointer}
table.tt tr.sel td{outline:2px solid var(--ink);outline-offset:-2px}
table.tt th.last{background:var(--ink);color:var(--paper)}
table.tt tr.diff td{background:var(--bad-soft)}
.verdict{border-radius:10px;padding:10px 14px}
.verdict.ok{background:var(--ok-soft)} .verdict.ko{background:var(--bad-soft)}
.cmp-in{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px}
.cmp-in>*{min-width:0}
.mod .answer-input{font-size:16px;padding:9px 12px}
.mod .symbols{margin-top:6px}
.venn-wrap{display:flex;flex-wrap:wrap;gap:16px;align-items:center}
.venn-wrap>*{min-width:0}
.venn-info{flex:1 1 220px}
.venn-info p{margin:4px 0}
.venn-info .big{font-size:22px;font-weight:600}
svg.venn .vr{fill:transparent;transition:fill .2s}
svg.venn .vr.on{fill:var(--ok);fill-opacity:.35}
svg.venn .v-line{fill:none;stroke:var(--ink);stroke-width:1.5}
svg.venn .v-lab{font:700 16px var(--f-display);fill:var(--ink)}
svg.venn .v-el{font:15px var(--f-mono);fill:var(--muted)}
svg.venn .v-el.in{font-weight:700;fill:var(--ink)}
svg.venn .v-num{font:700 18px var(--f-display);fill:var(--ink)}
.card-in{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:8px}
.card-in label{display:flex;flex-direction:column;gap:2px;font-size:13px;color:var(--muted);min-width:0}
.modes{display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:8px}
.mode{min-width:0;text-align:left;border:2px solid var(--line);border-radius:12px;padding:10px 12px;background:var(--sheet);color:var(--ink);cursor:pointer;display:flex;flex-direction:column;gap:2px;font:inherit}
.mode small{color:var(--muted);font-size:13px}
.mode.active{border-color:var(--ink);background:var(--accent-soft)}
.boxes{display:flex;flex-wrap:wrap;align-items:center;gap:6px}
.cbox{display:flex;flex-direction:column;align-items:center;border:2px solid var(--ink);border-radius:10px;padding:6px 12px;min-width:52px;background:var(--sheet)}
.cbox span{font-size:12px;color:var(--muted)} .cbox b{font:800 20px var(--f-display)}
.times{font:700 18px var(--f-display);color:var(--muted)}
table.tt td.fill{min-width:44px;cursor:pointer;background:var(--sheet);font-weight:700;color:var(--ink)}
table.tt td.fill:hover{background:var(--accent-soft)}
table.tt td.fill:focus-visible{outline:2px solid var(--ink);outline-offset:-2px}
table.tt td.fill.u-v{color:var(--ok);background:var(--ok-soft)} table.tt td.fill.u-f{color:var(--bad);background:var(--bad-soft)}
.tree-tools{margin-top:8px} .tree-slot{margin-top:6px}
table.tt td.fill.locked{cursor:help}
table.tt td.fill.focus{box-shadow:inset 0 0 0 3px var(--ink)}
table.tt td.fill .qm{font:700 10px var(--f-body);color:var(--muted);margin-left:2px}
.cellwhy{margin-top:8px;border-radius:10px;padding:10px 14px;background:var(--accent-soft);max-width:72ch;font-size:15px}
table.tt td.fill.locked.v{color:var(--ok)} table.tt td.fill.locked.x{color:var(--bad)}
table.tt td.fill.locked.miss{background:var(--bad-soft);outline:2px solid var(--bad);outline-offset:-2px} table.tt td.fill.locked.hit{background:var(--ok-soft)}
table.tt td.fill s{color:var(--muted);font-weight:400}
.match{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.mcol{display:flex;flex-direction:column;gap:8px;min-width:0}
.choice.mb{justify-content:center;text-align:center;min-height:52px}
.choice.picked{border-color:var(--ink);background:var(--accent-soft)}
.build-ans{min-height:60px;border-bottom:2px solid var(--line);display:flex;flex-wrap:wrap;gap:8px;padding:8px 0;align-items:center}
.tiles{display:flex;flex-wrap:wrap;gap:8px;justify-content:center;padding:6px 0}
.tile{font:600 20px var(--f-mono);min-width:48px;padding:8px 14px;border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;background:var(--sheet);color:var(--ink);cursor:pointer}
.tile.used{visibility:hidden}
svg.venn.pick [data-reg]{cursor:pointer}
svg.venn.pick .vr:hover{fill:var(--ink);fill-opacity:.08}
svg.venn.pick .vr.on:hover{fill:var(--ok);fill-opacity:.35}
svg.venn .v-line{pointer-events:none}
.tokens{display:flex;flex-wrap:wrap;gap:4px;justify-content:center;padding:8px 0}
.tok{font:600 22px var(--f-mono);padding:6px 8px;border-radius:10px;border:2px solid transparent;background:none;color:var(--muted)}
.tok.op{color:var(--ink);border-color:var(--line);cursor:pointer;background:var(--sheet);min-width:44px}
.tok.op[aria-pressed="true"]{border-color:var(--ink);background:var(--accent-soft)}
.tok.good{border-color:var(--ok)!important;background:var(--ok-soft)!important} .tok.wrong{border-color:var(--bad)!important;background:var(--bad-soft)!important}

/* Matières, planning */
.subjbar{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:8px;margin-bottom:12px}
.subj{min-width:0;text-align:left;display:flex;flex-direction:column;gap:1px;border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;padding:8px 12px;background:var(--sheet);color:var(--ink);cursor:pointer;font:inherit}
.subj b{font:800 16px var(--f-display)} .subj span{font-size:13px;color:var(--muted)} .subj small{font:600 12px var(--f-mono);color:var(--muted)}
.subj.active{border-color:var(--ink);background:var(--accent-soft)}
.plan{display:flex;flex-direction:column;gap:8px}
.planrow{display:flex;gap:12px;align-items:center;text-align:left;border:1px solid var(--line);border-radius:12px;padding:10px 14px;background:var(--sheet);color:var(--ink);cursor:pointer;font:inherit}
.planrow.cur{border-color:var(--ink)}
.planrow .pd{flex:none;min-width:84px;font:800 15px var(--f-display);text-align:center;border-radius:8px;padding:6px 8px;background:var(--accent-soft)}
.planrow .pd.hot{background:var(--bad-soft);color:var(--bad)}
.planrow .pt{display:flex;flex-direction:column;gap:2px;min-width:0} .planrow small{color:var(--muted);font-size:13px}
/* Matrices, systèmes */
.mx{display:inline-block;vertical-align:middle;margin:2px 4px;border-left:2px solid var(--ink);border-right:2px solid var(--ink);border-radius:6px;padding:0 4px}
.mx table{border-collapse:collapse} .mx td{padding:2px 8px;text-align:center;font:500 16px var(--f-mono);font-variant-numeric:tabular-nums}
.mx td.hl{background:var(--ok-soft);color:var(--ok);font-weight:700} .mx td.pick{cursor:pointer;text-decoration:underline dotted}
.sys{display:flex;width:fit-content;flex-direction:column;gap:2px;border-left:3px solid var(--ink);padding:4px 12px;margin:8px 0;font:500 16px var(--f-mono)}
.qtext .sys,.qtext .mx td{font-size:15px}
.mxg{display:inline-grid;column-gap:14px;row-gap:2px;padding:2px 4px;font:500 16px var(--f-mono);font-variant-numeric:tabular-nums;text-align:center}
.mxin{align-self:flex-start;display:inline-block;border-left:3px solid var(--ink);border-right:3px solid var(--ink);border-radius:8px;padding:4px}
.mxin input{width:64px;font:600 18px var(--f-mono);text-align:center;padding:8px 4px;border:2px solid var(--line);border-radius:8px;background:var(--sheet);color:var(--ink);margin:3px}
.mxin input.ok{border-color:var(--ok);background:var(--ok-soft)} .mxin input.ko{border-color:var(--bad);background:var(--bad-soft)}
.mp{display:flex;flex-wrap:wrap;align-items:center;gap:8px}
svg.mcd .m-ent{fill:var(--sheet);stroke:var(--ink);stroke-width:1.5} svg.mcd .m-as{fill:var(--accent-soft);stroke:var(--ink);stroke-width:1.5}
svg.mcd .m-l{stroke:var(--ink);stroke-width:1.5} svg.mcd .m-t{font:600 14px var(--f-display);fill:var(--ink)} svg.mcd .m-s{font:12px var(--f-body);fill:var(--muted)} svg.mcd .m-c{font:700 15px var(--f-mono);fill:var(--ok)}
textarea.code{font:13px/1.5 var(--f-mono);min-height:140px;white-space:pre;overflow:auto}
.preview{border:2px solid var(--line);border-radius:10px;min-height:300px;overflow:auto;background:#fff}
.bx-m{display:inline-block;background:repeating-linear-gradient(45deg,var(--warn-soft),var(--warn-soft) 6px,transparent 6px,transparent 12px);border:1px dashed var(--warn)}
.bx-b{border-style:solid;border-color:var(--ink)} .bx-p{background:var(--ok-soft)} .bx-c{background:var(--accent-soft);border:1px dashed var(--ink);text-align:center;font:12px var(--f-mono);padding:12px 0}
.pos-stage{border:1px solid var(--line);border-radius:10px;padding:10px;background:var(--sheet);overflow:hidden}
.pos-parent{position:relative;border:2px dashed var(--muted);padding:8px;font-size:12px;color:var(--muted);min-height:200px}
.pb{width:45%;padding:14px;margin:6px 0;border-radius:8px;font:700 14px var(--f-display);color:#111}
.pb1{background:#9cc3ff} .pb2{background:#ffb066} .pb3{background:#9be0a8}
.steps{margin:6px 0;padding-left:22px;display:flex;flex-direction:column;gap:8px}
.steps li{max-width:72ch}
.calc-fab{position:fixed;right:16px;bottom:calc(16px + env(safe-area-inset-bottom,0px));z-index:50;font:700 15px var(--f-display);border:2px solid var(--ink);border-bottom-width:4px;border-radius:999px;padding:10px 18px;background:var(--sheet);color:var(--ink);cursor:pointer;box-shadow:0 4px 14px rgba(0,0,0,.25)}
.calc-fab.on{background:var(--ink);color:var(--paper)}
.calc{position:fixed;right:16px;bottom:calc(72px + env(safe-area-inset-bottom,0px));z-index:50;width:min(340px,calc(100vw - 32px));max-height:calc(100vh - 100px);overflow:auto;background:var(--sheet);border:2px solid var(--ink);border-radius:16px;padding:12px;display:flex;flex-direction:column;gap:8px;box-shadow:0 10px 30px rgba(0,0,0,.35)}
.calc-top{display:flex;justify-content:space-between;align-items:center}.calc-top strong{font:700 16px var(--f-display)}
.calc-in{font:600 20px var(--f-mono);padding:10px 12px;border:2px solid var(--line);border-radius:10px;background:var(--paper);color:var(--ink);width:100%}
.calc-out{font:800 22px var(--f-display);text-align:right;min-height:1.4em;font-variant-numeric:tabular-nums}.calc-out.err{font:500 13px var(--f-body);color:var(--bad)}
.calc-keys{display:grid;grid-template-columns:repeat(4,1fr);gap:6px}
.calc-keys button{font:600 16px var(--f-mono);padding:10px 0;border:1px solid var(--line);border-bottom-width:3px;border-radius:10px;background:var(--paper);color:var(--ink);cursor:pointer}
.calc-keys button.fn{background:var(--accent-soft)}.calc-keys button.eq{grid-column:span 2;background:var(--ink);color:var(--paper);border-color:var(--ink)}
.calc-hist{display:flex;flex-direction:column;gap:4px}.calc-h{display:flex;justify-content:space-between;gap:8px;font:13px var(--f-mono);border:0;background:none;color:var(--muted);cursor:pointer;padding:2px 0;text-align:left}.calc-h b{color:var(--ink)}
body{padding-bottom:80px}

[hidden]{display:none!important}
/* Accueil : le contrôle qui arrive en bandeau noir, puis « quoi faire aujourd'hui » à gauche et « comment je me sens » à droite */
.dash{display:grid;grid-template-columns:repeat(12,minmax(0,1fr));gap:14px}
.card{background:var(--sheet);border:1px solid var(--line);border-radius:16px;padding:16px 18px;min-width:0;display:flex;flex-direction:column;gap:10px}
.card-h{display:flex;align-items:baseline;justify-content:space-between;gap:10px;flex-wrap:wrap}
.card-h h3{margin:0;padding:0;border:0;font:800 19px/1.2 var(--f-display)}
.eyebrow{font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted)}
.c-hero{grid-column:1/-1;background:var(--ink);color:var(--paper);border-color:var(--ink);padding:20px 22px;display:grid;grid-template-columns:minmax(0,1fr) auto;gap:14px 24px;align-items:center}
.c-hero .eyebrow,.c-hero .muted{color:color-mix(in srgb,var(--paper) 68%,transparent)}
.c-hero h2{font-size:clamp(24px,4.4vw,36px);margin:2px 0 4px;letter-spacing:-.01em}
.c-hero .scope{margin:0;max-width:62ch;color:color-mix(in srgb,var(--paper) 85%,transparent)}
.c-hero .btn{background:var(--paper);color:var(--ink);border-bottom-color:color-mix(in srgb,var(--paper) 55%,var(--ink))}
.c-hero .btn.ghost{background:transparent;color:var(--paper);border-color:color-mix(in srgb,var(--paper) 45%,transparent)}
.hello{font:600 15px var(--f-display);color:color-mix(in srgb,var(--paper) 80%,transparent);margin:0 0 6px}
.count{display:flex;gap:6px;align-items:flex-end}
.count div{display:flex;flex-direction:column;align-items:center;min-width:64px;padding:8px 10px;border-radius:12px;background:color-mix(in srgb,var(--paper) 10%,transparent);border:1px solid color-mix(in srgb,var(--paper) 18%,transparent)}
.count b{font:800 clamp(30px,6vw,44px)/1 var(--f-display);font-variant-numeric:tabular-nums}
.count small{font:600 11px var(--f-mono);letter-spacing:.06em;text-transform:uppercase;color:color-mix(in srgb,var(--paper) 65%,transparent)}
.ready{display:flex;align-items:center;gap:10px;flex-wrap:wrap;font-size:14px}
.ready .meter{width:160px;height:10px;background:color-mix(in srgb,var(--paper) 18%,transparent)}
.ready .meter i{background:var(--paper)}
.hero-act{grid-column:1/-1;display:flex;gap:10px;flex-wrap:wrap}
.c-plan{grid-column:span 7}.c-feel{grid-column:span 5}
.c-exams{grid-column:span 7}.c-today{grid-column:span 5}
.c-weak{grid-column:span 6}.c-stats{grid-column:span 6}
.c-notes{grid-column:span 6}.c-share{grid-column:span 6}
/* Programme du jour */
.budget{display:flex;gap:4px;flex-wrap:wrap;align-items:center;font-size:13px;color:var(--muted)}
.seg{display:inline-flex;border:1px solid var(--line);border-radius:99px;overflow:hidden}
.seg button{border:0;background:var(--sheet);color:var(--ink);font:600 13px var(--f-mono);padding:4px 10px;cursor:pointer}
.seg button+button{border-left:1px solid var(--line)}
.seg button[aria-pressed="true"]{background:var(--ink);color:var(--paper)}
.why-plan{margin:0;font-size:14px;color:var(--muted);max-width:68ch}
.tasks{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:8px}
.task{display:grid;grid-template-columns:28px minmax(0,1fr) auto;gap:10px;align-items:center;padding:10px 12px;border:2px solid var(--line);border-bottom-width:4px;border-radius:12px;background:var(--sheet)}
.task.next{border-color:var(--ink)}
.task.done{background:var(--paper);border-color:var(--line)}
.task.done .tt-t{text-decoration:line-through;color:var(--muted)}
.tick{width:26px;height:26px;border-radius:50%;border:2px solid var(--line);display:grid;place-items:center;background:var(--sheet);color:var(--paper);cursor:pointer;padding:0}
.task.done .tick{background:var(--ok);border-color:var(--ok)}
.tick svg{opacity:0}.task.done .tick svg{opacity:1}
.task .tt{display:flex;flex-direction:column;gap:1px;min-width:0}
.tt-t{font:700 16px/1.25 var(--f-display)}
.task .tt small{font-size:13px;color:var(--muted)}
.scode{display:inline-block;font:700 11px var(--f-mono);padding:1px 6px;border-radius:6px;background:var(--accent-soft);color:var(--ink);margin-right:6px;vertical-align:1px}
.task .btn{padding:8px 14px;font-size:14px}
.plan-bar{display:flex;align-items:center;gap:10px;font:600 13px var(--f-mono);color:var(--muted)}
.plan-bar .meter{flex:1}
/* Ressentis */
.feel-row{display:flex;flex-direction:column;gap:6px;padding:8px 0;border-bottom:1px dashed var(--line)}
.feel-row:last-child{border-bottom:0}
.feel-top{display:flex;justify-content:space-between;gap:8px;align-items:baseline;flex-wrap:wrap}
.feel-top b{font:800 15px var(--f-display)}.feel-top small{font-size:12px;color:var(--muted)}
.scale{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:4px}
.scale button{border:2px solid var(--line);border-bottom-width:3px;border-radius:9px;background:var(--sheet);color:var(--muted);font:600 12px var(--f-body);padding:6px 2px;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:3px;min-width:0}
.scale button i{display:block;height:6px;border-radius:3px;background:currentColor;opacity:.35}
.scale button[aria-pressed="true"]{border-color:var(--ink);color:var(--ink);background:var(--accent-soft)}
.scale button[aria-pressed="true"] i{opacity:1}
.scale button[data-v="1"][aria-pressed="true"],.scale button[data-v="2"][aria-pressed="true"]{border-color:var(--bad);color:var(--bad);background:var(--bad-soft)}
.scale button[data-v="5"][aria-pressed="true"],.scale button[data-v="4"][aria-pressed="true"]{border-color:var(--ok);color:var(--ok);background:var(--ok-soft)}
/* Contrôles */
.exlist{display:flex;flex-direction:column;gap:8px}
.ex{display:grid;grid-template-columns:76px minmax(0,1fr);gap:12px;align-items:start;padding:10px 12px;border:1px solid var(--line);border-radius:12px;background:var(--sheet);text-align:left;color:var(--ink);font:inherit}
button.ex{cursor:pointer}button.ex:hover{border-color:var(--ink)}
.ex .pd{font:800 15px var(--f-display);text-align:center;border-radius:9px;padding:8px 4px;background:var(--accent-soft);font-variant-numeric:tabular-nums}
.ex .pd.hot{background:var(--bad);color:var(--sheet)}.ex .pd.soon{background:var(--warn-soft);color:var(--warn)}
.ex .pt{display:flex;flex-direction:column;gap:3px;min-width:0}
.ex .pt b{font:700 15px/1.3 var(--f-display)}.ex .pt small{color:var(--muted);font-size:13px}
.ex .mini{display:flex;align-items:center;gap:8px;font:600 12px var(--f-mono);color:var(--muted)}.ex .mini .meter{width:110px;height:6px}
.after{border:2px dashed var(--line);border-radius:12px;padding:10px 12px;display:flex;flex-direction:column;gap:8px}
.after .presets .pill{font-family:var(--f-body)}
/* Agenda */
.agenda{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:6px}
.agenda li{display:grid;grid-template-columns:56px 1fr;gap:8px;align-items:baseline;padding:6px 8px;border-radius:8px;background:var(--paper)}
.agenda li.exam{background:var(--bad-soft)} .agenda li.slot{background:var(--accent-soft)} .agenda li span:first-child{font:600 14px var(--f-mono)}
.agenda.small li{background:none;padding:2px 0}
/* Pense-bête */
.note-add{display:flex;gap:8px}.note-add .txt{flex:1;min-width:0}.note-add .btn{padding:8px 14px;font-size:14px}
.notes{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:2px;max-height:300px;overflow:auto}
.notes li{display:flex;align-items:flex-start;gap:6px;padding:6px 4px;border-bottom:1px dashed var(--line)}
.notes li label{display:flex;gap:10px;align-items:flex-start;flex:1;cursor:pointer;min-width:0}
.notes li input{margin-top:4px;width:18px;height:18px;accent-color:var(--ink);flex:none}
.notes li.done span{text-decoration:line-through;color:var(--muted)}
.notes .nx{border:0;background:none;color:var(--muted);font:700 18px var(--f-display);cursor:pointer;padding:0 4px}
.empty-note{color:var(--muted);font-size:14px;border:0!important}
/* Points faibles, semaine */
.weak{margin:0;padding-left:20px;display:flex;flex-direction:column;gap:8px}
.weak li{display:flex;flex-wrap:wrap;gap:6px;align-items:baseline}.weak small{color:var(--bad);font-size:12px}
.kpis{display:grid;grid-template-columns:repeat(3,1fr);gap:6px}.kpis div{display:flex;flex-direction:column}.kpis b{font:800 26px var(--f-display);font-variant-numeric:tabular-nums}.kpis small{font-size:12px;color:var(--muted)}
.bars{display:grid;grid-template-columns:repeat(7,1fr);gap:6px;height:96px;align-items:end;position:relative}
.bars .goal-line{position:absolute;left:0;right:0;border-top:1px dashed var(--muted);pointer-events:none}
.bars .goal-line span{position:absolute;right:0;top:-16px;font:600 10px var(--f-mono);color:var(--muted)}
.bar{display:flex;flex-direction:column;align-items:center;gap:4px;height:100%;justify-content:flex-end;min-width:0}.bar i{display:block;width:70%;min-height:3px;background:var(--line);border-radius:4px 4px 0 0}.bar i.met{background:var(--ok)}.bar.today i{outline:2px solid var(--ink);outline-offset:1px}.bar small{font-size:11px;color:var(--muted)}
/* Partage */
.share-row{display:flex;gap:8px;flex-wrap:wrap;align-items:center}
.share-url{flex:1 1 220px;min-width:0;font:13px var(--f-mono);padding:9px 10px;border:1px solid var(--line);border-radius:10px;background:var(--paper);color:var(--ink);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;user-select:all}
.links{margin:0;padding-left:18px;display:flex;flex-direction:column;gap:4px;font-size:14px}.links a{color:var(--ink)}
.sync{font-size:13px;color:var(--muted);display:flex;gap:6px;align-items:center}.sync i{width:8px;height:8px;border-radius:50%;background:var(--muted);flex:none}.sync.on i{background:var(--ok)}
/* Leçon : série, fin, ressenti */
.combo{font:800 14px var(--f-display);color:var(--warn);background:var(--warn-soft);border-radius:99px;padding:3px 10px;white-space:nowrap}
.combo[hidden]{display:none}
.combo.pop{animation:pop .35s ease}
@keyframes pop{0%{transform:scale(.6)}60%{transform:scale(1.18)}100%{transform:scale(1)}}
.feedback.ok strong,.feedback.ko strong{animation:pop .3s ease}
.choice.wrong{animation:shake .32s ease}
@keyframes shake{0%,100%{transform:translateX(0)}25%{transform:translateX(-5px)}75%{transform:translateX(5px)}}
.lesson-feel{display:flex;flex-direction:column;gap:8px;align-items:center;margin-top:4px}
.lesson-feel .presets{justify-content:center}
.lesson-feel .pill{font:600 15px var(--f-body);padding:8px 16px}
.toast{position:fixed;left:50%;bottom:calc(84px + env(safe-area-inset-bottom,0px));transform:translateX(-50%);z-index:60;background:var(--ink);color:var(--paper);font:700 15px var(--f-display);padding:10px 18px;border-radius:99px;box-shadow:0 8px 24px rgba(0,0,0,.3);max-width:calc(100vw - 32px);text-align:center}
.confetti{position:fixed;inset:0;pointer-events:none;z-index:70}
.welcome{grid-column:1/-1;border:2px solid var(--ink)}
.welcome ol{margin:0;padding-left:20px;display:flex;flex-direction:column;gap:4px;max-width:70ch}
@media (max-width:900px){.c-plan,.c-feel,.c-exams,.c-today,.c-weak,.c-stats,.c-notes,.c-share{grid-column:1/-1}}
@media (max-width:620px){.c-hero{grid-template-columns:1fr}.count div{min-width:56px}.task{grid-template-columns:28px minmax(0,1fr)}.task .btn{grid-column:2;justify-self:start}.mainnav button{min-width:84px}}

/* R1.05 exercices */
.exo{border-left:4px solid var(--ink);padding:6px 14px;background:var(--paper);border-radius:0 10px 10px 0}
.exo h4{font:700 18px var(--f-display);margin:2px 0 6px}.exo p{margin:4px 0;max-width:75ch}
svg.mcd.big .m-assoc{cursor:pointer}svg.mcd.big .m-assoc:hover .m-as{stroke-width:2.5}
svg.mcd .m-assoc.on .m-as{fill:var(--ok-soft);stroke:var(--ok);stroke-width:2.5}svg.mcd .m-l.on{stroke:var(--ok);stroke-width:2.5}
svg.mcd .m-hl .m-ent{stroke:var(--ok);stroke-width:2.5}svg.mcd .m-s.id{text-decoration:underline;font-weight:700;fill:var(--ink)}
svg.mcd .m-c.q{fill:var(--bad)}svg.mcd .m-t.b{font-weight:700}
.mld{display:flex;flex-direction:column;gap:6px}.mldt{font:15px var(--f-mono);padding:8px 12px;border:1px solid var(--line);border-radius:8px;background:var(--sheet);overflow-wrap:anywhere}
.mldt.on{border-color:var(--ok);background:var(--ok-soft)}
.evstep{display:flex;flex-direction:column;gap:10px;border:1px solid var(--line);border-radius:12px;padding:12px 14px}
.evrow{display:flex;flex-direction:column;gap:6px;padding:6px 0;border-bottom:1px dashed var(--line)}
.evsel{display:flex;flex-wrap:wrap;gap:10px}.evsel label{display:flex;flex-direction:column;font-size:13px;color:var(--muted);gap:2px}
.evsel select,.evt select{font:15px var(--f-mono);padding:6px 8px;border:2px solid var(--line);border-radius:8px;background:var(--sheet);color:var(--ink)}
.evsel select.ok{border-color:var(--ok);background:var(--ok-soft)}.evsel select.ko{border-color:var(--bad);background:var(--bad-soft)}
.fixv{font:700 13px var(--f-mono);color:var(--ok)}
.evt{font:15px var(--f-mono);display:flex;flex-wrap:wrap;align-items:center;gap:4px;padding:6px 0}
.chip-a{font:15px var(--f-mono);border:1px dashed var(--line);background:var(--sheet);color:var(--ink);border-radius:6px;padding:2px 6px;cursor:pointer}
.chip-a.pk{text-decoration:underline;text-decoration-thickness:2px;font-weight:700;border-style:solid;border-color:var(--ink)}
.chip-a.fk{border-style:solid;background:var(--accent-soft)}
/* Fiches de révision imprimables (A4) */
.pfwrap{display:flex;flex-direction:column;gap:18px;align-items:center}
.pf{--c:#0f766e;--cs:#e6f4f2;--ink2:#1b1b1b;--mut:#5b5b5b;--red:#b42318;--reds:#fdecea;--yel:#fff4d6;
  width:100%;max-width:210mm;background:#fff;color:var(--ink2);border-radius:6px;box-shadow:0 2px 14px rgba(0,0,0,.18);
  padding:9mm 9mm 8mm;font:9.6pt/1.38 "Atkinson Hyperlegible",system-ui,sans-serif;display:flex;flex-direction:column;gap:3.2mm;color-scheme:light}
.pf.r101{--c:#1d4ed8;--cs:#e6edfd}.pf.r107{--c:#4338ca;--cs:#ecebfd}.pf.r107c0{--c:#4338ca;--cs:#ecebfd}.pf.r102{--c:#c2410c;--cs:#fdeee6}.pf.r103{--c:#0e7490;--cs:#e3f3f7}
.pf,.pf *{box-sizing:border-box}
.pf-head{display:grid;grid-template-columns:auto 1fr auto;gap:4mm;align-items:center;border-bottom:2.5px solid var(--c);padding-bottom:2.5mm}
.pf-code{background:var(--c);color:#fff;font:800 15pt/1 "Bricolage Grotesque",sans-serif;padding:2.6mm 3.2mm;border-radius:2.2mm;letter-spacing:-.01em}
.pf-title b{display:block;font:800 16.5pt/1.1 "Bricolage Grotesque",sans-serif;color:#111}
.pf-title span{font-size:9pt;color:var(--mut)}
.pf-exam{text-align:right;font:700 8.6pt/1.3 "JetBrains Mono",monospace;color:var(--c)}
.pf-key{background:var(--c);color:#fff;border-radius:2.5mm;padding:2.4mm 3.5mm;font:700 10pt/1.4 "Bricolage Grotesque",sans-serif}
.pf-key ol{margin:0;padding-left:5mm;display:grid;grid-template-columns:1fr 1fr;gap:.6mm 6mm}
.pf-cols{display:grid;grid-template-columns:1fr 1fr;gap:3.2mm;align-items:start}
.pf-col{display:flex;flex-direction:column;gap:3.2mm;min-width:0}
.pf-blk{border:1.3px solid #d9d9d9;border-radius:2.2mm;padding:2.4mm 3mm;break-inside:avoid;min-width:0}
.pf-blk h4{margin:0 0 1.4mm;font:800 10.5pt/1.2 "Bricolage Grotesque",sans-serif;color:var(--c);display:flex;align-items:center;gap:2mm}
.pf-blk h4 i{font-style:normal;display:inline-grid;place-items:center;width:5.2mm;height:5.2mm;border-radius:50%;background:var(--c);color:#fff;font-size:8pt}
.pf-blk.tint{background:var(--cs);border-color:transparent}
.pf-blk.trap{background:var(--reds);border-color:transparent}.pf-blk.trap h4{color:var(--red)}.pf-blk.trap h4 i{background:var(--red)}
.pf-blk.pfex{background:var(--yel);border-color:transparent}.pf-blk.pfex h4{color:#8a5a00}.pf-blk.pfex h4 i{background:#8a5a00}
.pf p{margin:0 0 1mm}.pf ul,.pf ol{margin:0;padding-left:4.5mm}.pf li{margin:.5mm 0}
.pf .m{font:8.8pt/1.35 "JetBrains Mono",monospace}
.pf .hl{background:var(--cs);border-radius:1mm;padding:0 1mm;font-weight:700;color:var(--c)}
.pf b{color:#111}
.pf table{border-collapse:collapse;width:100%;font-size:8.8pt}
.pf th,.pf td{border:1px solid #cfcfcf;padding:.9mm 1.6mm;text-align:left;vertical-align:top}
.pf th{background:var(--cs);color:var(--c);font-weight:700}
.pf svg{display:block;max-width:100%;height:auto}
.pf svg text{font-family:"Atkinson Hyperlegible",sans-serif}
.pf .dl{display:grid;grid-template-columns:auto 1fr;gap:.6mm 2.5mm}.pf .dl dt{font-weight:700;color:#111}.pf .dl dd{margin:0}
.pf pre{margin:0;font:8.3pt/1.4 "JetBrains Mono",monospace;background:#f5f5f4;border-radius:1.5mm;padding:1.6mm 2.2mm;white-space:pre-wrap}
.pf-foot{margin-top:auto;display:flex;justify-content:space-between;font:7.5pt "JetBrains Mono",monospace;color:#8a8a8a;border-top:1px solid #e5e5e5;padding-top:1.5mm}
@media (max-width:640px){.pf{padding:5mm;font-size:9pt}.pf-cols{grid-template-columns:1fr}.pf-key ol{grid-template-columns:1fr}.pf-head{grid-template-columns:auto 1fr}.pf-exam{grid-column:1/-1;text-align:left}}
@media print{body{background:#fff!important;padding:0!important;margin:0}.pfwrap{gap:0}.pf{box-shadow:none;border-radius:0;max-width:none;width:210mm;height:297mm;overflow:hidden;page-break-after:always}}
@page{size:A4;margin:0}

.pdfl{display:flex;flex-wrap:wrap;gap:6px;align-items:center;margin:8px 0}.pdfl .eyebrow{width:100%}
.pdfl a{font:600 13px var(--f-body);color:var(--ink);text-decoration:none;border:1px solid var(--line);background:var(--sheet);border-radius:99px;padding:5px 11px}.pdfl a:hover{border-color:var(--ink)}
/* Style « fiche manuscrite » : petits carreaux, stabilo, titres à la main */
.pf{background-color:#fffefb;background-image:linear-gradient(rgba(96,125,170,.16) 1px,transparent 1px),linear-gradient(90deg,rgba(96,125,170,.16) 1px,transparent 1px);background-size:5mm 5mm;font-family:"Patrick Hand","Atkinson Hyperlegible",system-ui,sans-serif;font-size:10.4pt;line-height:1.32}
.pf-title b{font:700 24pt/1 "Caveat",cursive;letter-spacing:.01em}
.pf-blk h4{font:700 15pt/1.05 "Caveat",cursive;text-decoration:underline;text-decoration-thickness:1.5px;text-underline-offset:3px}
.pf-blk{background:rgba(255,255,255,.55);border:1.3px dashed rgba(0,0,0,.18)}
.pf-blk.tint{background:color-mix(in srgb,var(--cs) 70%,transparent)}
.pf-blk.trap{background:rgba(253,236,234,.8)}.pf-blk.pfex{background:rgba(255,244,214,.85)}
.pf-key{font:600 11pt/1.35 "Patrick Hand",sans-serif;box-shadow:2px 2px 0 rgba(0,0,0,.15)}
.pf-blk b,.pf-key b,.pf p b,.pf li b{background:linear-gradient(transparent 52%,rgba(255,168,110,.55) 52%,rgba(255,168,110,.55) 92%,transparent 92%);padding:0 .4mm;border-radius:.6mm}
.pf-key b{background:none}
.pf .hl{background:linear-gradient(transparent 40%,rgba(255,236,120,.9) 40%,rgba(255,236,120,.9) 92%,transparent 92%);color:inherit}
.pf .dl dt{font-family:"Caveat",cursive;font-size:13pt;line-height:1.1;color:var(--c)}
.pf th{font-family:"Patrick Hand",sans-serif;font-size:10.5pt}
.pf-code{font-family:"Caveat",cursive;font-size:22pt;transform:rotate(-2deg)}

/* Fiches : outils, surlignage, annexe, plein écran */
.ftools{display:flex;flex-wrap:wrap;gap:10px;align-items:center;justify-content:center;margin:0 0 14px}.ftools .hint{max-width:62ch;text-align:center}
mark.uhl{background:linear-gradient(transparent 18%,var(--hl) 18%,var(--hl) 92%,transparent 92%);color:inherit;border-radius:2px;cursor:pointer;padding:0 1px}
mark.uhl.ask{outline:2px dashed #b42318;outline-offset:1px}
.hlbar{position:fixed;z-index:80;display:flex;align-items:center;gap:6px;background:#111;color:#fff;border-radius:99px;padding:6px 10px;box-shadow:0 6px 18px rgba(0,0,0,.35);font:600 13px var(--f-body)}
.hlbar button{width:24px;height:24px;border-radius:50%;border:2px solid #fff;cursor:pointer;padding:0}
.annex{display:flex;justify-content:center;margin-top:8px}
.annexpf .annl{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1.6mm}
.annexpf .annl li{display:grid;grid-template-columns:1fr minmax(90px,38%) auto;gap:2mm;align-items:start}
.annexpf .annt{background:linear-gradient(transparent 20%,var(--hl) 20%,var(--hl) 92%,transparent 92%);padding:0 1mm}
.annexpf .annn{font:10pt "Patrick Hand",sans-serif;border:0;border-bottom:1px dashed #999;background:transparent;color:#1b1b1b;min-width:0;padding:1px 2px}
.annexpf .annx{border:0;background:none;color:#b42318;font:700 15px sans-serif;cursor:pointer}
.fs-ov{position:fixed;inset:0;z-index:70;background:rgba(10,10,10,.92);display:flex;flex-direction:column}
.fs-bar{display:flex;flex-wrap:wrap;gap:10px;align-items:center;justify-content:space-between;padding:10px 16px;padding-top:calc(10px + env(safe-area-inset-top,0px));color:#fff;font:700 15px var(--f-display)}
.fs-z{display:flex;gap:6px;align-items:center}.fs-z button{font:700 15px var(--f-mono);min-width:36px;padding:6px 10px;border-radius:9px;border:1px solid #555;background:#222;color:#fff;cursor:pointer}.fs-z output{font:600 13px var(--f-mono);min-width:52px;text-align:center}
.fs-bar .btn{padding:8px 16px;font-size:14px;background:#fff;color:#111}
.fs-scroll{flex:1;overflow:auto;padding:12px}.fs-body{margin:0 auto;width:fit-content}
.fs-body .pfwrap{align-items:center}
@media (max-width:640px){.annexpf .annl li{grid-template-columns:1fr auto}.annexpf .annn{grid-column:1/-1}}
@media (prefers-reduced-motion:reduce){*{transition:none!important;animation:none!important}}


/* Cours façon documentation : sommaire à gauche */
.doc{--docw:min(1180px,calc(100vw - 56px));width:var(--docw);margin-left:calc((100% - var(--docw))/2);display:grid;grid-template-columns:250px minmax(0,1fr);gap:22px;align-items:start}
.doc>article{min-width:0}
.doc-toc{position:sticky;top:58px;max-height:calc(100vh - 74px);overflow:auto;scrollbar-width:thin;padding:4px 2px 12px}
.toc-d summary{list-style:none;cursor:pointer;display:flex;align-items:baseline;justify-content:space-between;gap:8px;font:800 13px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted);padding:6px 8px}
.toc-d summary::-webkit-details-marker{display:none}
.toc-d summary small{font:600 11px var(--f-mono);letter-spacing:0;text-transform:none}
.toc-t{font:700 15px/1.25 var(--f-display);padding:2px 8px 6px;color:var(--ink)}
.toc-prog{height:4px;border-radius:9px;background:var(--grid);margin:0 8px 8px;overflow:hidden}.toc-prog i{display:block;height:100%;width:0;background:var(--ok);transition:width .2s}
.doc-toc ol{list-style:none;margin:0;padding:0;counter-reset:toc;display:flex;flex-direction:column;gap:1px;border-left:2px solid var(--line);margin-left:8px}
.doc-toc li{counter-increment:toc}
.doc-toc a{display:flex;gap:8px;padding:6px 10px;margin-left:-2px;border-left:2px solid transparent;color:var(--muted);text-decoration:none;font:500 14px/1.3 var(--f-body);border-radius:0 8px 8px 0}
.doc-toc a::before{content:counter(toc);font:600 12px/1.6 var(--f-mono);color:var(--muted);min-width:16px}
.doc-toc a:hover{color:var(--ink);background:var(--accent-soft)}
.doc-toc a.on{color:var(--ink);border-left-color:var(--ink);background:var(--accent-soft);font-weight:700}
.doc article h3{scroll-margin-top:64px}
@media (max-width:900px){
  .doc{width:auto;margin-left:0;display:block}
  .doc-toc{position:sticky;top:46px;z-index:4;max-height:none;overflow:visible;padding:0;margin:-8px 0 12px}
  .toc-d{background:var(--sheet);border:1px solid var(--line);border-radius:12px;box-shadow:0 4px 14px rgba(0,0,0,.08)}
  .toc-d summary{padding:10px 14px;font-size:12px}
  .toc-d summary span::after{content:" ▾"}.toc-d[open] summary span::after{content:" ▴"}
  .toc-d[open] ol{max-height:55vh;overflow:auto;margin-bottom:8px}
  .toc-d .toc-t{display:none}
}
.doc-tools{display:flex;flex-wrap:wrap;gap:8px;align-items:center;margin:10px 0 4px}
.tbtn{font:700 14px var(--f-display);border:1px solid var(--line);border-bottom-width:3px;border-radius:10px;background:var(--sheet);color:var(--ink);padding:7px 12px;cursor:pointer}
.tbtn:hover{border-color:var(--ink)}
.edited{font-size:13px;color:var(--warn);background:var(--warn-soft);border-radius:99px;padding:4px 10px}
/* Schémas du cours */
.fig{margin:12px 0;border:1px solid var(--line);border-radius:12px;padding:10px 12px;background:var(--paper);display:flex;flex-direction:column;gap:8px;min-width:0}
.fig .fig-in{overflow-x:auto}.fig .hint{margin:0}
.gdf{margin:12px 0;border:1px solid var(--line);border-radius:12px;padding:10px;background:var(--paper);overflow-x:auto}
.gdfsvg .g-n rect,.gdfsvg .g-grp rect{fill:var(--sheet);stroke:var(--ink);stroke-width:1.4}.gdfsvg .g-grp rect{stroke-dasharray:5 3}
.gdfsvg text{font:600 14px var(--f-body);fill:var(--ink);text-anchor:middle}.gdfsvg .g-s{font:12px var(--f-body);fill:var(--muted)}
.gdfsvg .g-a{stroke:var(--ink);stroke-width:1.6;marker-end:url(#gar)}.gdfsvg .g-l{stroke:var(--ink);stroke-width:1.4}.gdfsvg .g-dot{fill:var(--ink)}.gdfsvg .g-ah{fill:var(--ink)}
.qfig{margin:10px 0 0;overflow-x:auto;font-size:15px}.qtext .qfig svg{max-height:340px}
.qtext .mld{margin:8px 0;font-size:15px}
/* Corrections empilées */
#tab-b3 article h3{font-size:22px;margin-top:34px}
.corr-d{border:1px solid var(--line);border-radius:12px;padding:8px 12px;margin:10px 0;background:var(--sheet)}
.corr-d summary{cursor:pointer;font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--muted);padding:2px 0}
.corr-d[open] summary{margin-bottom:8px}
/* Édition */
.editing{outline:3px dashed var(--warn);outline-offset:6px;border-radius:6px;caret-color:var(--bad)}
.editing:focus{outline-style:solid}
.editing [contenteditable="false"]{opacity:.75}
body.is-editing{padding-bottom:150px}body.is-editing .calc-fab{display:none}
.edbar{position:fixed;left:50%;transform:translateX(-50%);bottom:calc(12px + env(safe-area-inset-bottom,0px));z-index:66;width:min(980px,calc(100vw - 20px));background:var(--ink);color:var(--paper);border-radius:16px;padding:8px;display:flex;flex-wrap:wrap;gap:8px;align-items:center;justify-content:space-between;box-shadow:0 10px 30px rgba(0,0,0,.35)}
.edb-g{display:flex;flex-wrap:wrap;gap:4px;align-items:center}
.edbar [data-ec]{font:600 14px var(--f-body);min-width:38px;padding:7px 10px;border-radius:9px;border:1px solid color-mix(in srgb,var(--paper) 30%,transparent);background:color-mix(in srgb,var(--paper) 10%,transparent);color:var(--paper);cursor:pointer}
.edbar [data-ec]:hover{background:color-mix(in srgb,var(--paper) 22%,transparent)}
.edbar .sw-hl{background:#ffe86b;color:#111;padding:0 4px;border-radius:3px}
.edbar .hint{color:color-mix(in srgb,var(--paper) 65%,transparent)}
.edbar .btn{padding:8px 16px;font-size:14px}.edbar .btn:not(.ghost){background:var(--paper);color:var(--ink)}.edbar .btn.ghost{background:transparent;color:var(--paper);border-color:color-mix(in srgb,var(--paper) 40%,transparent)}
@media (max-width:620px){.edb-s .hint{display:none}.edbar [data-ec]{padding:6px 8px;font-size:13px}}
/* Mes fiches perso */
.myf{display:flex;flex-direction:column;gap:18px;align-items:center}
.myf-item{width:100%;display:flex;flex-direction:column;align-items:center}
.myf-host{width:100%;display:flex;justify-content:center}.myf-host .pfwrap{width:100%}
.myf-name{font:800 16px var(--f-display);margin-right:auto}
.newfiche{width:min(210mm,100%);border:2px dashed var(--line);border-radius:14px;background:var(--sheet);color:var(--ink);padding:18px;cursor:pointer;display:flex;flex-direction:column;gap:4px;align-items:center;text-align:center;font:inherit}
.newfiche b{font:800 17px var(--f-display)}.newfiche span{color:var(--muted);font-size:14px;max-width:52ch}.newfiche:hover{border-color:var(--ink)}
.ftools .btn{padding:8px 14px;font-size:14px}

html,body{overflow-x:clip}
.mod[data-k] > div:not([class]),#evMcd > div{overflow-x:auto}
@media (max-width:620px){.fig-in svg.mcd{min-width:470px}.qfig svg.mcd{min-width:520px}.mod[data-k] svg.mcd,#evMcd svg.mcd{min-width:640px}.doc-toc{top:42px}}
@media (max-width:620px){.edbar{flex-direction:column;align-items:stretch;gap:6px}.edbar>.edb-g{min-width:0;width:100%}.edbar .edb-g:first-child{flex-wrap:nowrap;overflow-x:auto;scrollbar-width:none}.edbar [data-ec]{flex:none}.edb-s{justify-content:flex-end}}

/* ===== Front v27 : carnet noir et blanc + une encre par matière (comme les stylos des fiches) ===== */
:root{--c-r103:#0e7490;--c-r106:#b4235a;--c-r105:#0f766e;--c-r107:#4338ca;--c-r102:#c2410c;--c-r101:#1d4ed8;--c-dash:#111111;--sub:var(--c-dash);--sub-ink:#ffffff;--shadow:0 1px 2px rgba(0,0,0,.06),0 6px 20px rgba(0,0,0,.06)}
@media (prefers-color-scheme: dark){:root:not([data-theme="light"]){--c-r103:#22d3ee;--c-r106:#f472b6;--c-r105:#2dd4bf;--c-r107:#a5b4fc;--c-r102:#fb923c;--c-r101:#93c5fd;--c-dash:#f2f2f2;--sub-ink:#0a0a0a;--shadow:0 1px 2px rgba(0,0,0,.4),0 8px 24px rgba(0,0,0,.35)}}
:root[data-theme="dark"]{--c-r103:#22d3ee;--c-r106:#f472b6;--c-r105:#2dd4bf;--c-r107:#a5b4fc;--c-r102:#fb923c;--c-r101:#93c5fd;--c-dash:#f2f2f2;--sub-ink:#0a0a0a;--shadow:0 1px 2px rgba(0,0,0,.4),0 8px 24px rgba(0,0,0,.35);
  --paper:#0a0a0a;--sheet:#151515;--ink:#f2f2f2;--muted:#a3a3a3;--grid:#1c1c1c;--line:#2c2c2c;--accent:#f2f2f2;--accent-ink:#0a0a0a;--accent-soft:#232323;--ok:#5fd08e;--ok-soft:#173326;--bad:#ff8a80;--bad-soft:#3a1e1d;--warn:#f2bd57;--warn-soft:#352a14;color-scheme:dark}
:root[data-theme="light"]{--paper:#f4f4f2;--sheet:#ffffff;--ink:#111111;--muted:#5f5f5f;--grid:#e9e9e7;--line:#dcdcd9;--accent:#111111;--accent-ink:#ffffff;--accent-soft:#ececea;--ok:#1f8a4c;--ok-soft:#e1f5e8;--bad:#c2372f;--bad-soft:#fbe6e4;--warn:#a86a00;--warn-soft:#fff1d6;color-scheme:light}
:root[data-subj="r103"]{--sub:var(--c-r103)}:root[data-subj="r106"]{--sub:var(--c-r106)}:root[data-subj="r105"]{--sub:var(--c-r105)}:root[data-subj="r107"]{--sub:var(--c-r107)}:root[data-subj="r102"]{--sub:var(--c-r102)}:root[data-subj="r101"]{--sub:var(--c-r101)}
:root{--sub-soft:color-mix(in srgb,var(--sub) 13%,var(--sheet));--sub-line:color-mix(in srgb,var(--sub) 40%,var(--line))}
body{padding-left:max(16px,env(safe-area-inset-left,0px));padding-right:max(16px,env(safe-area-inset-right,0px))}
/* Barre du haut */
header.top{padding-block:14px 10px}
.theme-btn .th-d{display:none}:root[data-theme="dark"] .theme-btn .th-d{display:inline}:root[data-theme="dark"] .theme-btn .th-l{display:none}
@media (prefers-color-scheme: dark){:root:not([data-theme="light"]) .theme-btn .th-d{display:inline}:root:not([data-theme="light"]) .theme-btn .th-l{display:none}}
/* Matières : chaque bouton porte sa couleur */
.mainnav{gap:8px;padding-bottom:12px}
.mainnav button{position:relative;border-width:1.5px;border-bottom-width:3px;border-radius:14px;padding:8px 14px 8px 14px;min-width:104px;transition:transform .12s,border-color .15s,background .15s}
.mainnav button[data-s]::before{content:"";position:absolute;top:10px;right:10px;width:8px;height:8px;border-radius:50%;background:var(--dot,var(--muted))}
.mainnav button[data-s="r103"]{--dot:var(--c-r103)}.mainnav button[data-s="r106"]{--dot:var(--c-r106)}.mainnav button[data-s="r105"]{--dot:var(--c-r105)}.mainnav button[data-s="r107"]{--dot:var(--c-r107)}.mainnav button[data-s="r102"]{--dot:var(--c-r102)}.mainnav button[data-s="r101"]{--dot:var(--c-r101)}.mainnav button[data-s="dash"]::before{display:none}
.mainnav button:hover{transform:translateY(-1px);border-color:var(--dot,var(--ink))}
.mainnav button[aria-current="page"]{background:var(--sub);border-color:var(--sub);color:var(--sub-ink)}
.mainnav button[aria-current="page"]::before{background:var(--sub-ink)}
.mainnav button[aria-current="page"] small{color:color-mix(in srgb,var(--sub-ink) 75%,transparent)}
.mainnav button[aria-current="page"] small.hot{color:var(--sub-ink);font-weight:800}
/* Onglets : pastilles avec icône */
nav.tabs{gap:6px;border-bottom:0;padding:8px 0;margin-bottom:18px;top:env(safe-area-inset-top,0px);background:color-mix(in srgb,var(--paper) 88%,transparent);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
nav.tabs button{display:flex;align-items:center;gap:7px;border-radius:999px;border:1.5px solid var(--line);margin:0;padding:8px 14px;background:var(--sheet);color:var(--muted);font:700 14.5px var(--f-display);transition:background .15s,color .15s,border-color .15s}
nav.tabs button:hover{color:var(--ink);border-color:var(--sub-line)}
nav.tabs button[aria-selected="true"]{background:var(--sub);border-color:var(--sub);color:var(--sub-ink)}
nav.tabs .ti{display:inline-grid;place-items:center;width:18px;height:18px;flex:none}nav.tabs .ti svg{width:18px;height:18px}
nav.tabs .ts{display:none}
/* Panneaux : apparition douce */
[role=tabpanel]:not([hidden]){animation:panelIn .22s ease-out}
@keyframes panelIn{from{opacity:.4;transform:translateY(6px)}to{opacity:1;transform:none}}
/* En-tête de matière (S'entraîner) */
.shero{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:16px 24px;align-items:center;background:var(--sub);color:var(--sub-ink);border-radius:20px;padding:20px 22px;margin-bottom:6px;box-shadow:var(--shadow);position:relative;overflow:hidden}
.shero::after{content:"";position:absolute;inset:0;background-image:linear-gradient(color-mix(in srgb,var(--sub-ink) 9%,transparent) 1px,transparent 1px),linear-gradient(90deg,color-mix(in srgb,var(--sub-ink) 9%,transparent) 1px,transparent 1px);background-size:18px 18px;pointer-events:none;mask-image:linear-gradient(90deg,transparent 30%,#000)}
.shero>*{position:relative;z-index:1;min-width:0}
.shero .eyebrow{color:color-mix(in srgb,var(--sub-ink) 72%,transparent)}
.shero h2{font:800 clamp(26px,5vw,38px)/1.05 var(--f-display);margin:4px 0 6px;letter-spacing:-.01em}
.shero p{margin:0;max-width:56ch;color:color-mix(in srgb,var(--sub-ink) 85%,transparent);font-size:15px}
.sh-count{display:flex;gap:6px}
.sh-count div{display:flex;flex-direction:column;align-items:center;min-width:62px;padding:8px 10px;border-radius:14px;background:color-mix(in srgb,var(--sub-ink) 13%,transparent);border:1px solid color-mix(in srgb,var(--sub-ink) 22%,transparent)}
.sh-count b{font:800 clamp(26px,5vw,38px)/1 var(--f-display);font-variant-numeric:tabular-nums}
.sh-count small{font:600 10.5px var(--f-mono);letter-spacing:.06em;text-transform:uppercase;opacity:.75}
.sh-row{grid-column:1/-1;display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.shero .btn{background:var(--sub-ink);color:var(--sub);border-bottom-color:color-mix(in srgb,var(--sub-ink) 60%,var(--sub))}
.shero .btn.ghost{background:transparent;color:var(--sub-ink);border:1.5px solid color-mix(in srgb,var(--sub-ink) 45%,transparent);border-bottom-width:4px}
.sh-lv{display:flex;align-items:center;gap:8px;font:700 13px var(--f-display);margin-left:auto}
.sh-lv i{display:block;width:22px;height:8px;border-radius:9px;background:color-mix(in srgb,var(--sub-ink) 25%,transparent)}
.sh-lv i.on{background:var(--sub-ink)}
@media (max-width:620px){.shero{grid-template-columns:1fr;padding:18px}.sh-lv{margin-left:0}}
/* Cartes de leçon */
.deck{border-width:1.5px;border-bottom-width:4px;border-radius:16px;transition:transform .12s,box-shadow .15s,border-color .15s;position:relative}
.deck:hover{transform:translateY(-2px);box-shadow:var(--shadow);border-color:var(--sub)}
.deck .tag{color:var(--sub);display:flex;align-items:center;gap:6px}
.deck .tag::before{content:"";width:8px;height:8px;border-radius:2px;background:var(--sub);transform:rotate(45deg)}
.deck .go{color:var(--sub)}
.deck .meter i{background:var(--sub)}
#smartdecks .deck:first-child{background:var(--sub-soft);border-color:var(--sub-line)}
.section-title{display:flex;align-items:center;gap:10px}.section-title::after{content:"";flex:1;height:1px;background:var(--line)}
/* Cours et fiches : touches de couleur de la matière */
.sheet{border-radius:18px;box-shadow:var(--shadow)}
.fiche h3{border-top-color:var(--line)}
.doc-toc a.on{border-left-color:var(--sub);color:var(--ink)}
.doc-toc a.on::before{color:var(--sub)}
.toc-prog i{background:var(--sub)}
.tbtn:hover{border-color:var(--sub)}
.lbar .meter i{background:var(--sub)}
#lesson{border-radius:20px}
/* Téléphone : barre de navigation en bas, comme une appli */
@media (max-width:700px){
  nav.tabs{position:fixed;left:0;right:0;bottom:0;top:auto;z-index:40;margin:0;display:grid;grid-auto-flow:column;grid-auto-columns:1fr;gap:0;overflow:visible;padding:6px max(6px,env(safe-area-inset-left,0px)) calc(6px + env(safe-area-inset-bottom,0px)) max(6px,env(safe-area-inset-right,0px));background:color-mix(in srgb,var(--sheet) 92%,transparent);border-top:1px solid var(--line);box-shadow:0 -6px 20px rgba(0,0,0,.08)}
  nav.tabs button{flex-direction:column;gap:2px;border:0;border-radius:12px;padding:6px 2px;background:transparent;font:700 11px var(--f-display);min-width:0}
  nav.tabs button[aria-selected="true"]{background:var(--sub-soft);color:var(--sub)}
  nav.tabs .ti,nav.tabs .ti svg{width:22px;height:22px}
  nav.tabs .tl{display:none}nav.tabs .ts{display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:100%}
  body{padding-bottom:calc(96px + env(safe-area-inset-bottom,0px))}
  .calc-fab{bottom:calc(78px + env(safe-area-inset-bottom,0px));padding:8px 14px;font-size:14px}
  .calc{bottom:calc(130px + env(safe-area-inset-bottom,0px))}
  .toast{bottom:calc(140px + env(safe-area-inset-bottom,0px))}
  .doc-toc{top:env(safe-area-inset-top,0px)}
  .edbar{bottom:calc(76px + env(safe-area-inset-bottom,0px))}
  #lesson .actions{position:sticky;bottom:calc(72px + env(safe-area-inset-bottom,0px));background:var(--sheet);padding-top:10px;margin-inline:-4px;z-index:3}
  #lesson .actions .btn{flex:1}
  .mainnav button{min-width:88px;padding:7px 10px}
}
@media (prefers-reduced-motion:reduce){[role=tabpanel]:not([hidden]){animation:none}}

/* ===== Carnet v29 : papier quadrillé, encre noire, une encre par matière, stabilo ===== */
:root{--stabilo:#ffe86b;--sheet-sunk:#ececE7;--grid-lg:color-mix(in srgb,var(--line) 55%,transparent)}
@media (prefers-color-scheme: dark){:root:not([data-theme="light"]){--sheet-sunk:#1f1f22}}
:root[data-theme="dark"]{--sheet-sunk:#1f1f22}
body{background-color:var(--paper);background-image:linear-gradient(var(--grid-lg) 1px,transparent 1px),linear-gradient(90deg,var(--grid-lg) 1px,transparent 1px);background-size:18px 18px;background-attachment:fixed}
.wrap{max-width:1080px}
/* logo : un petit carnet */
.logo{border-radius:12px;background-color:var(--ink);background-image:linear-gradient(color-mix(in srgb,var(--paper) 16%,transparent) 1px,transparent 1px),linear-gradient(90deg,color-mix(in srgb,var(--paper) 16%,transparent) 1px,transparent 1px);background-size:6px 6px;position:relative}
.logo::after{content:"";position:absolute;left:7px;right:7px;bottom:9px;height:5px;border-radius:3px;background:var(--stabilo);opacity:.9}
.chip{border-radius:999px}
/* ---------- Accueil en grille ---------- */
.dash{grid-template-columns:repeat(12,minmax(0,1fr));gap:14px}
.card{border-radius:20px;border:1.5px solid var(--line);padding:18px 20px;gap:12px}
.card-h h3{display:flex;align-items:center;gap:10px;font:800 19px/1.2 var(--f-display)}
.card-h h3 .ico{display:inline-grid;place-items:center;width:30px;height:30px;border-radius:10px;background:var(--sheet-sunk);color:var(--ink);flex:none}
.card-h h3 .ico svg{width:17px;height:17px}
.c-hero{border-radius:24px;position:relative;overflow:hidden;background-color:var(--ink);background-image:linear-gradient(color-mix(in srgb,var(--paper) 9%,transparent) 1px,transparent 1px),linear-gradient(90deg,color-mix(in srgb,var(--paper) 9%,transparent) 1px,transparent 1px);background-size:18px 18px;padding:24px 26px}
.c-hero h2{font-size:clamp(28px,5vw,46px)}
.c-hero .hello{display:flex;align-items:center;gap:8px}
.c-hero .hero-code{display:inline-flex;align-items:center;gap:6px;background:var(--encre,var(--paper));color:var(--paper);border-radius:999px;padding:3px 10px;font:700 12px var(--f-mono)}
.c-hero h2 .hlw{background:linear-gradient(transparent 10%,var(--stabilo) 10%,var(--stabilo) 94%,transparent 94%);color:#121212;padding:0 6px;border-radius:4px;-webkit-box-decoration-break:clone;box-decoration-break:clone}
.welcome{border-color:var(--ink);background:var(--sheet)}
.scode{background:color-mix(in srgb,var(--encre,var(--ink)) 14%,var(--sheet));color:var(--encre,var(--ink));border-radius:7px}
.task{border-radius:14px;border-width:1.5px;border-bottom-width:4px}
.task.next{border-color:var(--encre,var(--ink));background:color-mix(in srgb,var(--encre,var(--ink)) 6%,var(--sheet))}
.task .btn{background:var(--encre,var(--ink));color:var(--sheet);border-bottom-color:color-mix(in srgb,var(--encre,var(--ink)) 60%,var(--ink))}
.task:not(.next) .btn{background:var(--sheet);color:var(--ink);border:1.5px solid var(--line);border-bottom-width:4px}
.ex{border-radius:14px;border-width:1.5px;position:relative}
.ex::after{content:"";position:absolute;right:12px;top:12px;width:9px;height:9px;border-radius:50%;background:var(--encre,transparent)}
.ex .mini .meter i{background:var(--encre,var(--ok))}
.agenda.small li{grid-template-columns:auto 1fr;gap:6px}
.scale button{border-radius:10px}
.bars .bar i{border-radius:6px 6px 0 0}
@media (min-width:901px){.c-plan{grid-column:span 7}.c-feel{grid-column:span 5}.c-exams{grid-column:span 6}.c-today{grid-column:span 6}}
/* ---------- Mode concentration pendant une leçon ---------- */
body.in-lesson .mainnav,body.in-lesson nav.tabs,body.in-lesson header.top .stats .chip:not(.goal):not(.streak),body.in-lesson .calc-fab:not(.on){display:none!important}
body.in-lesson #lesson{max-width:780px;margin:6px auto 0}
body.in-lesson{padding-bottom:40px}
#lesson{border-radius:24px;border-width:1.5px;padding:clamp(18px,4vw,30px);gap:20px}
.lbar .meter{height:12px;background:var(--sheet-sunk)}
.lbar .meter i{border-radius:99px;background:var(--sub)}
.xbtn{border-radius:10px}.xbtn:hover{background:var(--sheet-sunk);color:var(--ink)}
.qkind{color:var(--sub)}
.qtext{font-size:clamp(20px,3.4vw,25px)}
.choice{border-width:1.5px;border-bottom-width:4px;border-radius:14px;transition:border-color .12s,background .12s,transform .08s}
.choice:hover:not(:disabled){border-color:var(--sub-line)}
.choice[aria-pressed="true"]{border-color:var(--sub);background:var(--sub-soft)}
.choice[aria-pressed="true"] .k{border-color:var(--sub);background:var(--sub);color:var(--sub-ink)}
#lesson .btn#go:not(:disabled){background:var(--sub);color:var(--sub-ink);border-bottom-color:color-mix(in srgb,var(--sub) 60%,var(--ink))}
.feedback{border-radius:16px;padding:16px 18px}
.feedback.ok{border:1.5px solid color-mix(in srgb,var(--ok) 35%,transparent)}.feedback.ko{border:1.5px solid color-mix(in srgb,var(--bad) 35%,transparent)}
.qfig svg.mcd,.tscroll svg.mcd{background:var(--sheet-sunk);border-radius:12px}
.end .big{color:var(--sub)}
.endstats div{background:var(--sub-soft);border-radius:14px}
@media (max-width:700px){body.in-lesson{padding-bottom:calc(24px + env(safe-area-inset-bottom,0px))}body.in-lesson #lesson .actions{bottom:calc(8px + env(safe-area-inset-bottom,0px))}}
/* ---------- Cours ---------- */
.sheet{border-width:1.5px}
.fiche h3{display:flex;align-items:baseline;gap:10px}
.fiche h3 .hn{flex:none;display:inline-grid;place-items:center;min-width:30px;height:30px;padding:0 6px;border-radius:9px;background:var(--sub);color:var(--sub-ink);font:800 15px/1 var(--f-mono);transform:translateY(-2px)}
.fiche b{font-weight:700}
.box{border-radius:12px;border:0;padding:12px 16px}
.box.def{background:var(--sub-soft)}
.mod{background-color:var(--sheet-sunk);border-radius:16px;border:1.5px solid var(--line)}
.mod-tag{background:var(--sub);color:var(--sub-ink)}
.fig,.gdf{background:var(--sheet-sunk);border-radius:14px}
.pill.active{background:var(--sub);border-color:var(--sub);color:var(--sub-ink)}
.mldt.on,.verdict.ok{border-color:var(--ok)}
table.tt th{background:var(--sub-soft)}
/* Fiches et ajout de fiche */
#tab-mine .sheet{max-width:780px;margin:0 auto}
input.txt,textarea.txt{border-width:1.5px;border-radius:12px;background:var(--sheet)}
input.txt:focus,textarea.txt:focus{border-color:var(--sub);outline:none;box-shadow:0 0 0 3px var(--sub-soft)}
/* Calculatrice */
.calc-fab{display:flex;align-items:center;gap:8px;background:var(--ink);color:var(--paper);border-color:var(--ink);font-size:14px;padding:9px 16px}
.calc-fab::before{content:"";width:14px;height:16px;border-radius:3px;background:linear-gradient(var(--paper),var(--paper)) 3px 3px/8px 3px no-repeat,radial-gradient(circle,var(--paper) 1.2px,transparent 1.5px) 1px 8px/4px 4px;border:1.5px solid var(--paper)}
.calc-fab.on{background:var(--sub);border-color:var(--sub);color:var(--sub-ink)}
.calc{border-radius:20px;border-width:1.5px}
.calc-keys button.eq{background:var(--sub);border-color:var(--sub);color:var(--sub-ink)}
.toast{border-radius:14px}
.box.exm{background:var(--sheet-sunk);border:1.5px dashed var(--line);line-height:2}
.box.exm::before{content:"Exemple";display:block;font:700 12px var(--f-display);letter-spacing:.08em;text-transform:uppercase;color:var(--sub);margin-bottom:2px;line-height:1.4}
.box.exm .sys{line-height:1.5;margin:6px 0}
.mxed{display:inline-block}.mxed input{width:56px;font-size:16px;padding:6px 2px}
.mpsteps{display:flex;flex-direction:column;gap:6px}
.mx.clickable td{cursor:pointer;text-decoration:underline dotted}
.mx tr.sel td{background:var(--sub-soft)}
.mx tr[data-r]{cursor:pointer}
/* ===== Disposition barre latérale (≥1000px) ===== */
.side{position:fixed;left:0;top:0;bottom:0;width:264px;z-index:30;display:flex;flex-direction:column;gap:6px;overflow-y:auto;scrollbar-width:thin;background:var(--sheet);border-right:1.5px solid var(--line);padding:calc(16px + env(safe-area-inset-top,0px)) 14px calc(14px + env(safe-area-inset-bottom,0px)) max(14px,env(safe-area-inset-left,0px))}
body.layout-side{padding-left:calc(264px + 32px);padding-right:max(32px,env(safe-area-inset-right,0px))}
body.layout-side .wrap{padding-top:22px}
.side header.top{flex-direction:column;align-items:stretch;gap:12px;padding:0 4px 8px}
.side .brand-t small{white-space:normal}
.side .stats{gap:5px}
.side .stats .chip{padding:4px 9px;font-size:13px}
.side-lbl{font:700 11px var(--f-display);letter-spacing:.09em;text-transform:uppercase;color:var(--muted);padding:12px 8px 4px}
.side .mainnav{flex-direction:column;overflow:visible;padding:0;margin:0;gap:4px}
.side .mainnav button{min-width:0;width:100%;flex-direction:row;align-items:center;justify-content:space-between;gap:8px;border:0;border-radius:12px;padding:9px 12px 9px 30px;background:transparent}
.side .mainnav button::before{left:12px;right:auto;top:50%;margin-top:-4px}
.side .mainnav button[data-s="dash"]{padding-left:12px}
.side .mainnav button b{font-size:15px}
.side .mainnav button small{font-size:11.5px}
.side .mainnav button:hover{transform:none;background:var(--sheet-sunk)}
.side .mainnav button[aria-current="page"]{background:var(--sub);color:var(--sub-ink)}
.side nav.tabs{position:static;display:flex;flex-direction:column;gap:3px;overflow:visible;padding:0;margin:0;background:none;backdrop-filter:none;-webkit-backdrop-filter:none;box-shadow:none;border:0}
.side nav.tabs button{width:100%;justify-content:flex-start;border:0;border-radius:12px;padding:9px 12px;background:transparent;font-size:14.5px;white-space:normal;text-align:left;line-height:1.25}
.side nav.tabs button:hover{background:var(--sheet-sunk);color:var(--ink)}
.side nav.tabs button[aria-selected="true"]{background:var(--sub-soft);color:var(--ink);box-shadow:inset 3px 0 0 var(--sub)}
.side nav.tabs button[aria-selected="true"] .ti{color:var(--sub)}
.side nav.tabs .tl{display:inline}.side nav.tabs .ts{display:none}
.side nav.tabs[hidden]{display:none}
body.layout-side .side .side-lbl2{display:block}
.side-foot{margin-top:auto;padding-top:12px}
.side-lay{width:100%;font:600 13px var(--f-body);color:var(--muted);background:none;border:1px dashed var(--line);border-radius:10px;padding:8px;cursor:pointer}
.side-lay:hover{color:var(--ink);border-color:var(--ink)}
body.layout-side .doc{--docw:min(1180px,calc(100vw - 264px - 72px))}
body.layout-side .doc-toc{top:16px;max-height:calc(100vh - 32px)}
body.layout-side.in-lesson{padding-left:max(16px,env(safe-area-inset-left,0px))}
body.layout-side.in-lesson .side{display:none}
body.layout-side.is-editing .edbar{left:calc(50% + 132px)}
.lay-btn[hidden]{display:none!important}
.side:has(#tabsnav[hidden]) .side-lbl2{display:none}
.fk-wrap{overflow-x:auto;padding:4px 0}
.fk-grid{display:inline-grid;gap:5px;padding:6px;align-items:center;justify-items:stretch}
.fk{min-width:46px;height:42px;display:grid;place-items:center;font:600 17px var(--f-mono);font-variant-numeric:tabular-nums;border-radius:9px;background:var(--sheet);border:1px solid var(--line);color:var(--ink);padding:0 6px}
.fk-arr{background:none;border:0;font:800 24px var(--f-display);min-width:0}
.fk-name{background:none;border:0;min-width:0}.fk-lab{font:800 20px var(--f-display);color:var(--muted)}
.fk-c{cursor:pointer;background:var(--sheet-sunk,var(--accent-soft))}.fk-c.q{color:var(--muted);font-weight:400}.fk-c:hover{border-color:var(--ink)}
.fk-calc{display:flex;flex-direction:column;gap:6px;background:var(--sheet);border:1px solid var(--line);border-radius:12px;padding:12px 14px;max-width:72ch}
.fk-eq{font:600 18px var(--f-mono);overflow-wrap:anywhere}
.fk-wrap{position:relative}.fk-svg{position:absolute;left:0;top:0;pointer-events:none;overflow:visible}.fk-term{display:inline-block;border:2.5px solid;border-radius:7px;padding:0 6px}
.fk-mini{margin:10px 0 0;background:var(--sheet)}.fk-mini .mod-h strong{color:var(--ink)!important;font:700 16px var(--f-display)!important;animation:none!important}

/* ===== Étape 2 : R1.04, matrices augmentées, accueil lisible ===== */
.pf.r104{--c:#15803d;--cs:#e3f4e8}
:root{--c-r104:#15803d}
@media (prefers-color-scheme: dark){:root:not([data-theme="light"]){--c-r104:#4ade80}}
:root[data-theme="dark"]{--c-r104:#4ade80}
:root[data-subj="r104"]{--sub:var(--c-r104)}
.mainnav button[data-s="r104"]{--dot:var(--c-r104)}
.mx.aug .mxg .sep{border-left:2px solid currentColor;padding-left:12px}
.gj-step{margin:8px 0;padding:8px 10px;border-left:3px solid var(--sub-line);background:var(--sheet-sunk);border-radius:0 10px 10px 0}
.gj-op{display:block;font:600 13px var(--f-mono);color:var(--muted);margin-bottom:4px;overflow-wrap:anywhere}
/* Agenda des contrôles */
.c-agenda{grid-column:1/-1}
.agd{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:10px}
.agd>li{display:grid;grid-template-columns:66px minmax(0,1fr) auto;gap:10px 14px;align-items:center;padding:12px 14px;border:1.5px solid var(--line);border-left:7px solid var(--encre,var(--ink));border-radius:14px;background:var(--sheet);margin:0}
.agd>li.first{border-color:var(--encre,var(--ink));background:color-mix(in srgb,var(--encre,var(--ink)) 7%,var(--sheet))}
.agd .dt{display:flex;flex-direction:column;align-items:center;gap:2px;line-height:1;padding:7px 0;border-radius:11px;background:color-mix(in srgb,var(--encre,var(--ink)) 15%,var(--sheet));color:var(--ink)}
.agd .dt small{font:700 11.5px var(--f-display);text-transform:uppercase;letter-spacing:.05em}
.agd .dt b{font:800 28px/1 var(--f-display);font-variant-numeric:tabular-nums}
.agd .info{min-width:0;display:flex;flex-direction:column;gap:4px}
.agd .top{display:flex;flex-wrap:wrap;gap:6px 8px;align-items:center}
.agd .code{font:800 13px var(--f-mono);padding:2px 9px;border-radius:999px;background:var(--encre,var(--ink));color:var(--sheet)}
.agd .hr{font:700 13.5px var(--f-mono);color:var(--ink)}
.agd .ttl{font:800 17px/1.25 var(--f-display);color:var(--ink)}
.agd .sc{font-size:14px;line-height:1.4;color:color-mix(in srgb,var(--ink) 72%,var(--sheet));display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.agd .mini{display:flex;align-items:center;gap:8px;font:600 12.5px var(--f-mono);color:var(--ink)}.agd .mini .meter{width:96px;height:7px}.agd .mini .meter i{background:var(--encre,var(--ok))}
.agd .act{display:flex;flex-direction:column;align-items:flex-end;gap:8px}
.agd .jl{font:800 19px/1 var(--f-display);padding:7px 11px;border-radius:11px;background:var(--accent-soft);color:var(--ink);white-space:nowrap;font-variant-numeric:tabular-nums}
.agd .jl.hot{background:var(--bad);color:var(--sheet)}.agd .jl.soon{background:var(--warn);color:var(--sheet)}
.agd .btn{background:var(--encre,var(--ink));color:var(--sheet);border-color:var(--encre,var(--ink));border-bottom-color:color-mix(in srgb,var(--encre,var(--ink)) 60%,#000);white-space:nowrap}
.agd .noact{font:600 12.5px var(--f-mono);color:var(--muted)}
@media (max-width:620px){.agd>li{grid-template-columns:56px minmax(0,1fr);padding:11px 12px}.agd .dt b{font-size:24px}.agd .act{grid-column:1/-1;flex-direction:row;justify-content:space-between;align-items:center}.agd .mini{display:none}}
.tj{display:inline-block;font:700 11px var(--f-mono);padding:1px 6px;border-radius:6px;margin-right:6px;vertical-align:1px;background:var(--accent-soft);color:var(--ink)}
.tj.hot{background:var(--bad);color:var(--sheet)}.tj.soon{background:var(--warn-soft);color:var(--warn)}
.c-hero .hero-act .btn.rev{background:var(--stabilo);color:#121212;border-color:var(--stabilo)}
@media (max-width:620px){.c-hero{padding:18px 18px 16px;gap:10px}.c-hero h2{font-size:30px}.c-hero .scope{font-size:14px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}.c-hero .hero-act{gap:8px}.c-hero .hero-act .btn.ghost{display:none}.c-hero .hero-act .btn{padding:9px 14px;font-size:15px}.c-hero .count div{min-width:52px;padding:6px 8px}.c-hero .count b{font-size:28px}.c-hero .ready .meter{width:110px}}
@media (min-width:901px){.c-plan{grid-column:span 7}.c-today{grid-column:span 5}.c-feel{grid-column:span 6}.c-weak{grid-column:span 6}.c-stats{grid-column:span 6}.c-notes{grid-column:span 6}.c-share{grid-column:1/-1}}
/* Matières : pastilles compactes, triées par date de contrôle */
.mainnav button{min-width:0;padding:7px 24px 7px 12px}
.mainnav button[data-s="dash"]{padding-right:14px}
.mainnav button small .nm{display:none}
.mainnav button.calm:not([aria-current]){border-style:dashed}
.side .mainnav button small .nm{display:inline}.side .mainnav button small .ne{display:none}
.side .mainnav button{padding:9px 12px 9px 30px}.side .mainnav button[data-s="dash"]{padding-left:12px}
@media (max-width:620px){.mainnav button{min-width:0;padding:6px 22px 6px 11px}.mainnav button b{font-size:14px}}

/* ===== Étape 3 : TP blanc R1.03, tableaux UTF-8 ===== */
pre.sh{display:block;white-space:pre;margin:8px 0;padding:10px 12px;border-radius:10px;font:13.5px/1.55 var(--f-mono);font-variant-ligatures:none;max-width:100%;overflow-x:auto}
pre.sh.ps{background:#012456;color:#eef2ff}pre.sh.fed{background:#2b2b2b;color:#eeeeee}
.qtext pre.sh{font-size:14px}
.tpb details.corr-d{margin:8px 0 18px}
.tpb details.corr-d>summary{font-weight:700;cursor:pointer}
.tt.utf td,.tt.utf th{text-align:center;padding:4px 10px}
.tt.utf td:nth-child(2){text-align:left}
.utfm{display:grid;grid-template-columns:auto 1fr;gap:4px 12px;margin:6px 0}
.utfm b{font:800 15px var(--f-mono);text-align:right}

.pf .fr{display:inline-flex;flex-direction:column;align-items:center;vertical-align:middle;font-size:.88em;line-height:1.08;margin:0 .4mm}.pf .fr>span:first-child{border-bottom:1px solid currentColor;padding:0 .6mm}.pf .fr>span{white-space:nowrap}
.c-print{grid-column:1/-1}
.pall{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:8px;margin:12px 0}
.pall-r{display:flex;align-items:center;gap:8px;border:1px solid var(--line);border-radius:10px;padding:8px 10px;background:var(--sheet)}
.pall-r label{display:flex;align-items:center;gap:8px;flex:1;min-width:0;cursor:pointer}
.pall-r input{width:18px;height:18px;accent-color:var(--encre,var(--ink));flex:none}
.pall-t{display:flex;flex-direction:column;min-width:0;font-weight:600;line-height:1.25}.pall-t small{font-weight:400;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.pall-n{font:600 12px var(--f-mono);color:var(--muted);white-space:nowrap}
.ftools .xa{margin-left:auto}
.pfdoc{background:#fff;color:#111;width:210mm;max-width:100%;margin:0 auto;padding:12mm 14mm;box-sizing:border-box;break-before:page;break-after:page}.pfdoc .sheet{border:0;box-shadow:none;padding:0;background:#fff;max-width:none}@media print{.pfdoc{width:auto}}
</style>

<div class="wrap">
  <header class="top">
    <button type="button" class="brand" id="brandBtn" aria-label="Revenir à l'accueil">
      <span class="logo" aria-hidden="true">B1</span>
      <span class="brand-t"><b>Révisions BUT1</b><small id="subtitle">IUT de Metz · Informatique</small></span>
    </button>
    <div class="stats" aria-label="Progression">
      <span class="chip streak" title="Jours de révision d'affilée"><svg viewBox="0 0 16 16" width="15" height="15" aria-hidden="true"><path d="M8 1c.6 2.4 3.9 4 3.9 7.6A3.9 3.9 0 0 1 8 12.5a3.9 3.9 0 0 1-3.9-3.9c0-1.6.8-2.6 1.6-3.3.1 1.2.7 2 1.4 2.2C7 5.6 7.2 3 8 1Z" fill="currentColor"/><path d="M8 15c-2 0-3.3-1.2-3.3-2.6 0 .9 1.3 1.6 3.3 1.6s3.3-.7 3.3-1.6C11.3 13.8 10 15 8 15Z" fill="currentColor" opacity=".5"/></svg><b id="streak">0</b><span class="sr">jours de série</span></span>
      <span class="chip" title="Points d'expérience"><b id="xp">0</b> XP</span>
      <span class="chip goal" title="Objectif de questions du jour"><svg viewBox="0 0 20 20" width="18" height="18" aria-hidden="true"><circle cx="10" cy="10" r="8" class="ring-bg"/><circle cx="10" cy="10" r="8" class="ring-fg" id="goalRing" stroke-dasharray="50.3" stroke-dashoffset="50.3"/></svg><b id="goalTxt">0/30</b></span>
      <button type="button" class="chip icon" id="soundBtn" aria-pressed="true" title="Couper ou remettre les sons"><svg viewBox="0 0 20 20" width="16" height="16" aria-hidden="true"><path d="M3 7.5h3l4-3.5v12l-4-3.5H3z" fill="currentColor"/><path class="snd-on" d="M13 7c1 .8 1.5 1.8 1.5 3s-.5 2.2-1.5 3M15.2 4.8C16.9 6.2 17.8 8 17.8 10s-.9 3.8-2.6 5.2" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path class="snd-off" d="M13.5 7.5l4 5m0-5l-4 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg><span class="sr">Sons</span></button>
    </div>
  </header>

  <nav class="mainnav" id="mainnav" aria-label="Sections"></nav>
  <nav class="tabs" role="tablist" id="tabsnav"></nav>

  <!-- ============ ACCUEIL ============ -->
  <section id="tab-dash" role="tabpanel" hidden><div class="dash" id="dash"></div></section>

  <!-- ============ ENTRAÎNEMENT ============ -->
  <section id="tab-learn" role="tabpanel">
    <div id="home">
      <div class="section-title">Ton prochain contrôle</div>
      <div class="plan" id="plan"></div>
      <div class="section-title">À faire aujourd’hui dans cette matière</div>
      <div class="guide" id="guide"></div>
      <div class="section-title">S'entraîner intelligemment</div>
      <div class="decks" id="smartdecks"></div>
      <div class="section-title">Leçons</div>
      <div class="decks" id="decks"></div>
      <div class="section-title">Exercices de calcul (nouveaux à chaque fois)</div>
      <div class="decks" id="gendecks"></div>
      <div class="section-title">Fiches ajoutées</div>
      <div class="decks" id="customdecks"></div>
    </div>
    <div id="lesson" class="sheet lesson" hidden></div>
  </section>

  <!-- ============ FICHE CHAPITRE 1 ============ -->
  <section id="tab-f1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="f1">
      <h2>Chapitre 1 · Logique formelle, calcul des propositions</h2>
      <p class="muted">Tout ce qu'il faut savoir pour le devoir, avec les conventions du cours de l'IUT de Metz.</p>

      <h3>1. Proposition, connecteurs, formules</h3>
      <div class="box def"><b>Proposition</b> : énoncé qui peut être vrai ou faux. « Il pleut » en est une. « Quelle heure est-il ? » et « Sortez ! » n'en sont pas.</div>
      <ul>
        <li><b>Élémentaire</b> (atomique) : une seule lettre <span class="f">p, q, r…</span></li>
        <li><b>Composée</b> : construite avec des connecteurs.</li>
      </ul>
      <div class="formula-list">
        <span class="f">¬p</span><span>NON p (négation)</span>
        <span class="f">p ∧ q</span><span>p ET q</span>
        <span class="f">p ∨ q</span><span>p OU q (ou <b>inclusif</b> : l'un, l'autre ou les deux)</span>
        <span class="f">p → q</span><span>SI p ALORS q (implication)</span>
        <span class="f">p ↔ q</span><span>p SI ET SEULEMENT SI q (biconditionnelle)</span>
      </div>

      <h3>2. Tables de vérité des connecteurs (à connaître par cœur)</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>p</th><th>q</th><th>¬p</th><th>p∧q</th><th>p∨q</th><th>p→q</th><th>p↔q</th></tr>
        <tr><td>V</td><td>V</td><td class="x">F</td><td class="v">V</td><td class="v">V</td><td class="v">V</td><td class="v">V</td></tr>
        <tr><td>V</td><td>F</td><td class="x">F</td><td class="x">F</td><td class="v">V</td><td class="x">F</td><td class="x">F</td></tr>
        <tr><td>F</td><td>V</td><td class="v">V</td><td class="x">F</td><td class="v">V</td><td class="v">V</td><td class="x">F</td></tr>
        <tr><td>F</td><td>F</td><td class="v">V</td><td class="x">F</td><td class="x">F</td><td class="v">V</td><td class="v">V</td></tr>
      </table></div>
      <ul>
        <li><span class="f">p ∧ q</span> est V <b>seulement</b> si les deux sont V.</li>
        <li><span class="f">p ∨ q</span> est F <b>seulement</b> si les deux sont F.</li>
        <li><span class="f">p → q</span> est F <b>seulement</b> pour (p = V, q = F).</li>
        <li><span class="f">p ↔ q</span> est V quand p et q ont <b>la même valeur</b>.</li>
      </ul>
      <div class="box trap">Si p est faux, <span class="f">p → q</span> est toujours vrai (« Si 3 &gt; 4 alors 1 = 0 » est vraie).</div>
      <div class="mod" data-mod="switch"></div>

      <h3>3. Arbre de décomposition</h3>
      <p>On enlève à chaque étape le <b>connecteur le plus externe</b> (celui qui s'applique en dernier), jusqu'aux lettres.</p>
      <p>Exemple du cours : <span class="f">q ∧ (r → ¬p)</span>. Le module ci-dessous dessine l'arbre, remplit la table et conclut, pour n'importe quelle formule (il sert aussi aux parties 4 et 5).</p>
      <div class="mod" data-mod="explorer"></div>

      <h3>4. Interprétations et table de vérité d'une formule</h3>
      <ul>
        <li>Une <b>interprétation</b> donne V ou F à chaque lettre. Avec <b>n</b> lettres, il y a <b>2ⁿ</b> interprétations (2 → 4 lignes, 3 → 8, 4 → 16).</li>
        <li>Convention du cours : lettres dans l'ordre alphabétique, et on met <b>V en priorité à la lettre la plus à gauche</b>.</li>
      </ul>
      <div class="tscroll"><table class="tt">
        <tr><th></th><th>p</th><th>q</th><th>r</th></tr>
        <tr><td>i1</td><td>V</td><td>V</td><td>V</td></tr><tr><td>i2</td><td>V</td><td>V</td><td>F</td></tr>
        <tr><td>i3</td><td>V</td><td>F</td><td>V</td></tr><tr><td>i4</td><td>V</td><td>F</td><td>F</td></tr>
        <tr><td>i5</td><td>F</td><td>V</td><td>V</td></tr><tr><td>i6</td><td>F</td><td>V</td><td>F</td></tr>
        <tr><td>i7</td><td>F</td><td>F</td><td>V</td></tr><tr><td>i8</td><td>F</td><td>F</td><td>F</td></tr>
      </table></div>
      <p>Pour remplir : on écrit la valeur <b>sous chaque connecteur</b>, en partant des feuilles de l'arbre vers la racine. La colonne du connecteur principal donne le résultat (à entourer / colorier, pas en rouge).</p>

      <h3>5. Modèles, contre-exemples, nature d'une formule</h3>
      <ul>
        <li><b>Modèle</b> de φ : interprétation où φ vaut V. Ensemble des modèles : <span class="f">M(φ)</span>.</li>
        <li><b>Contre-exemple</b> : interprétation où φ vaut F.</li>
        <li><b>Tautologie</b> (<span class="f">⊨ φ</span>) : que des modèles. Ex. <span class="f">p ∨ ¬p</span>, <span class="f">(p ∧ q) → p</span>, <span class="f">p → (p ∨ q)</span>.</li>
        <li><b>Contradiction</b> (<span class="f">φ ⊨</span>) : aucun modèle. Ex. <span class="f">p ∧ ¬p</span>.</li>
        <li><b>Contingente</b> : ni l'un ni l'autre.</li>
      </ul>
      <div class="box method">Rédaction attendue : « M(φ) = {i2, i5, i6}. i3 est un contre-exemple de φ donc φ n'est pas une tautologie. i2 est un modèle de φ donc φ n'est pas une contradiction. C'est donc une formule contingente. »</div>

      <h3>6. Formules équivalentes</h3>
      <p><span class="f">A éq B</span> si A et B ont <b>les mêmes modèles</b> (même table de vérité). Équivaut à <span class="f">⊨ (A ↔ B)</span>.</p>
      <div class="formula-list">
        <span class="f">¬¬p</span><span class="f">éq p</span>
        <span class="f">p → q</span><span class="f">éq ¬p ∨ q</span>
        <span class="f">p ↔ q</span><span class="f">éq (p → q) ∧ (q → p)</span>
        <span class="f">p → q</span><span class="f">éq ¬q → ¬p (contraposée)</span>
      </div>

      <div class="mod" data-mod="compare"></div>

      <h3>7. Réciproque et contraposée</h3>
      <div class="grid2">
        <div class="box"><b>Implication</b><br><span class="f">p → q</span><br><span class="muted">Si je mange, je dors.</span></div>
        <div class="box"><b>Réciproque</b><br><span class="f">q → p</span><br><span class="muted">Si je dors, c'est que j'ai mangé.</span><br><b style="color:var(--bad)">PAS équivalente</b></div>
        <div class="box"><b>Contraposée</b><br><span class="f">¬q → ¬p</span><br><span class="muted">Si je ne dors pas, c'est que je n'ai pas mangé.</span><br><b style="color:var(--ok)">Équivalente</b></div>
      </div>
      <div class="box method">« S'il y a des soldes, j'irai en ville. »<br>Je ne suis pas en ville → la contraposée est équivalente, donc <b>il n'y a pas de soldes</b>.<br>Je suis en ville → la réciproque n'est pas équivalente, donc <b>on ne peut pas conclure</b>.</div>

      <h3>8. Lois de Morgan (négations)</h3>
      <div class="formula-list">
        <span class="f">¬(p ∧ q)</span><span class="f">éq ¬p ∨ ¬q</span>
        <span class="f">¬(p ∨ q)</span><span class="f">éq ¬p ∧ ¬q</span>
      </div>
      <ul>
        <li>« Les voitures sont neuves <b>et</b> bien équipées » → « Elles ne sont pas neuves <b>ou</b> pas bien équipées ».</li>
        <li>« J'irai au restaurant <b>ou</b> au cinéma » → « Je n'irai <b>ni</b> au restaurant <b>ni</b> au cinéma ».</li>
        <li>« Elle n'est pas chaude ou est humide » → « Elle est chaude <b>et</b> n'est pas humide ».</li>
      </ul>
      <div class="box trap">La négation change le ET en OU (et inversement). La négation de <span class="f">p → q</span> est <span class="f">p ∧ ¬q</span>, pas <span class="f">¬p → ¬q</span>.</div>

      <h3>9. Traduire une phrase (les tournures piégeuses)</h3>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Phrase</th><th>Formule</th></tr>
        <tr><td style="text-align:left">Si p alors q / p implique q</td><td class="f">p → q</td></tr>
        <tr><td style="text-align:left">p <b>seulement si</b> q</td><td class="f">p → q</td></tr>
        <tr><td style="text-align:left">p <b>si</b> q (« Il ralentit s'il freine »)</td><td class="f">q → p</td></tr>
        <tr><td style="text-align:left"><b>Il suffit</b> que p pour que q</td><td class="f">p → q</td></tr>
        <tr><td style="text-align:left">Pour que p, <b>il faut</b> (est nécessaire) que q</td><td class="f">p → q</td></tr>
        <tr><td style="text-align:left">Pour que p, <b>il suffit</b> que q</td><td class="f">q → p</td></tr>
        <tr><td style="text-align:left">p <b>si et seulement si</b> q / nécessaire et suffisant</td><td class="f">p ↔ q</td></tr>
        <tr><td style="text-align:left">p <b>sauf si</b> q / p <b>à moins que</b> q</td><td class="f">p ↔ ¬q</td></tr>
        <tr><td style="text-align:left">p <b>mais</b> pas q</td><td class="f">p ∧ ¬q</td></tr>
        <tr><td style="text-align:left">Si p alors q, <b>sinon</b> r</td><td class="f">(p → q) ∧ (¬p → r)</td></tr>
        <tr><td style="text-align:left"><b>Ni</b> p <b>ni</b> q</td><td class="f">¬p ∧ ¬q</td></tr>
        <tr><td style="text-align:left"><b>Soit</b> p, <b>soit</b> q (ou inclusif dans le cours)</td><td class="f">p ∨ q</td></tr>
      </table></div>
      <div class="box method">Astuce : la condition suffisante est à gauche de la flèche, la condition nécessaire à droite. « Il faut être pour penser » : penser → être.</div>
    </article>
  </section>

  <!-- ============ FICHE CHAPITRE 2 ============ -->
  <section id="tab-f2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="f2">
      <h2>Chapitre 2 · Les ensembles</h2>
      <p class="muted">Définitions, opérations, cardinaux et dénombrement, avec la rédaction attendue.</p>

      <h3>1. Ensembles et éléments</h3>
      <ul>
        <li><span class="f">a ∈ E</span> : a appartient à E. <span class="f">a ∉ E</span> sinon.</li>
        <li><b>En extension</b> : on liste chaque élément <b>une seule fois</b>, l'ordre ne compte pas. Lettres de « ananas » : <span class="f">{a, n, s}</span>.</li>
        <li><b>En compréhension</b> : <span class="f">{x ∈ E / x vérifie P}</span>. Ex. <span class="f">{x ∈ ℕ / x² ≤ 10} = {0, 1, 2, 3}</span> mais <span class="f">{x ∈ ℤ / x² ≤ 10} = {−3, −2, −1, 0, 1, 2, 3}</span>.</li>
        <li><b>Singleton</b> : 1 élément. <b>Paire</b> : 2 éléments. <span class="f">{a, b} = {b, a}</span>.</li>
        <li><b>Cardinal</b> <span class="f">Card(A)</span> ou <span class="f">|A|</span> : nombre d'éléments.</li>
      </ul>
      <div class="box trap"><span class="f">∅</span> est vide (Card 0). <span class="f">{∅}</span> est un singleton (Card 1) dont l'élément est ∅. Et <span class="f">a ≠ {a}</span>.</div>

      <h3>2. Inclusion</h3>
      <div class="box def"><span class="f">E ⊂ F</span> ⇔ <span class="f">∀x ∈ E, x ∈ F</span> (tout élément de E est dans F).</div>
      <ul>
        <li><b>Double inclusion</b> : <span class="f">A = B ⇔ (A ⊂ B et B ⊂ A)</span>.</li>
        <li><span class="f">A ⊄ B</span> ⇔ il existe x tel que <span class="f">x ∈ A</span> et <span class="f">x ∉ B</span>.</li>
        <li>Transitivité : <span class="f">A ⊂ B</span> et <span class="f">B ⊂ C</span> ⇒ <span class="f">A ⊂ C</span>.</li>
        <li>Toujours : <span class="f">∅ ⊂ E</span> et <span class="f">E ⊂ E</span>. Partie <b>propre</b> : ni ∅ ni E.</li>
      </ul>
      <div class="box trap"><b>∈</b> relie un <b>élément</b> à un ensemble, <b>⊂</b> relie deux <b>ensembles</b>. Avec A = {b, u, t} : <span class="f">b ∈ A</span>, <span class="f">{u} ⊂ A</span>, <span class="f">{b, t} ∈ P(A)</span>, <span class="f">{∅, {u, t}} ⊂ P(A)</span>.</div>

      <h3>3. Opérations (A, B parties de E)</h3>
      <div class="formula-list">
        <span class="f">A ∪ B</span><span>réunion : x ∈ A <b>ou</b> x ∈ B</span>
        <span class="f">A ∩ B</span><span>intersection : x ∈ A <b>et</b> x ∈ B</span>
        <span class="f">∁E(A) = Ā</span><span>complémentaire : x ∈ E et x ∉ A</span>
        <span class="f">A − B</span><span>différence : x ∈ A et x ∉ B. <span class="f">A − B = A ∩ ∁E(B)</span></span>
        <span class="f">A ∆ B</span><span>différence symétrique : dans un seul des deux. <span class="f">A ∆ B = (A − B) ∪ (B − A)</span></span>
      </div>
      <div class="box method">Exemple : E = {a,…,i}, A = {a, b, d, f, g}, B = {a, c, d, e, f}.<br>
      A ∪ B = {a, b, c, d, e, f, g} · A ∩ B = {a, d, f} · ∁E(A) = {c, e, h, i}<br>
      A − B = {b, g} · A ∆ B = {b, c, e, g}</div>
      <ul>
        <li><b>Disjoints</b> : <span class="f">A ∩ B = ∅</span>. À ne pas confondre avec <b>distincts</b> (<span class="f">A ≠ B</span>).</li>
        <li><span class="f">∁E(∅) = E</span>, <span class="f">∁E(E) = ∅</span>, <span class="f">∁E(∁E(A)) = A</span>, <span class="f">A ∪ Ā = E</span>, <span class="f">A ∩ Ā = ∅</span>.</li>
        <li><span class="f">A ⊂ B ⇔ ∁E(B) ⊂ ∁E(A)</span>.</li>
      </ul>
      <div class="mod" data-mod="venn"></div>

      <h3>4. Propriétés et lois de Morgan</h3>
      <div class="formula-list">
        <span>Idempotence</span><span class="f">A ∪ A = A, A ∩ A = A</span>
        <span>Commutativité, associativité</span><span class="f">A ∪ B = B ∪ A, (A ∩ B) ∩ C = A ∩ (B ∩ C)</span>
        <span>Neutres</span><span class="f">A ∪ ∅ = A, A ∩ E = A, A ∪ E = E, A ∩ ∅ = ∅</span>
        <span>Distributivité</span><span class="f">A ∩ (B ∪ C) = (A ∩ B) ∪ (A ∩ C)</span>
        <span></span><span class="f">A ∪ (B ∩ C) = (A ∪ B) ∩ (A ∪ C)</span>
        <span>Absorption</span><span class="f">A ∪ (A ∩ B) = A, A ∩ (A ∪ B) = A</span>
        <span><b>Morgan</b></span><span class="f">∁(A ∪ B) = Ā ∩ B̄ ; ∁(A ∩ B) = Ā ∪ B̄</span>
      </div>

      <h3>5. Cardinaux (problèmes « enquête »)</h3>
      <div class="formula-list">
        <span class="f">Card(A ∪ B)</span><span class="f">= Card A + Card B − Card(A ∩ B)</span>
        <span class="f">Card(Ā)</span><span class="f">= Card E − Card A</span>
        <span class="f">Card(A − B)</span><span class="f">= Card A − Card(A ∩ B)</span>
        <span class="f">Card(A ∆ B)</span><span class="f">= Card A + Card B − 2·Card(A ∩ B)</span>
        <span class="f">Card(Ā ∩ B̄)</span><span class="f">= Card E − Card(A ∪ B) (Morgan)</span>
      </div>
      <div class="box method">100 employés, F = femmes (52), I = formation info (70), F ∩ I = 40.<br>
      1. F ou I : Card(F ∪ I) = 52 + 70 − 40 = <b>82</b>. Ainsi 82 employés sont des femmes ou ont suivi la formation.<br>
      2. Ni l'un ni l'autre : F̄ ∩ Ī = ∁(F ∪ I), Card = 100 − 82 = <b>18</b>.<br>
      3. Pas femme mais formation : Card(I − F) = 70 − 40 = <b>30</b>.<br>
      Toujours : nommer les ensembles, écrire la formule du cours, calculer, <b>phrase de conclusion</b>.</div>

      <div class="mod" data-mod="card"></div>

      <h3>6. Ensemble des parties P(E)</h3>
      <ul>
        <li><span class="f">X ∈ P(E) ⇔ X ⊂ E</span>. Ex. <span class="f">P({a, b}) = {∅, {a}, {b}, {a, b}}</span>.</li>
        <li><b>Card(P(E)) = 2^Card(E)</b> : 3 éléments → 8 parties, 4 → 16.</li>
        <li><b>Arbre des parties</b> : pour chaque élément, branche « oui » (on le prend) / « non ». Les feuilles sont les parties.</li>
      </ul>

      <div class="mod" data-mod="parts"></div>

      <h3>7. Produit cartésien, couples</h3>
      <ul>
        <li><span class="f">(a, b) = (c, d) ⇔ a = c et b = d</span> : l'ordre compte, <span class="f">(a, b) ≠ (b, a)</span> si a ≠ b.</li>
        <li><span class="f">A × B = {(a, b) / a ∈ A et b ∈ B}</span>, <span class="f">A² = A × A</span>.</li>
        <li><b>Card(A × B) = Card A × Card B</b>. Généralisation : <span class="f">Card(A₁ × … × Aₙ) = produit des Card</span>.</li>
        <li>Représentation cartésienne : tableau, A en lignes, B en colonnes, chaque case = (a, b).</li>
      </ul>

      <div class="mod" data-mod="cart"></div>

      <h3>8. Dénombrement : quelle formule ?</h3>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Situation</th><th>Ordre ?</th><th>Répétition ?</th><th>Formule</th></tr>
        <tr><td style="text-align:left">p-uplet (code, mot de passe, dés)</td><td>oui</td><td>oui</td><td class="f">nᵖ</td></tr>
        <tr><td style="text-align:left">Arrangement (éléments tous distincts)</td><td>oui</td><td>non</td><td class="f">Aₙᵖ = n!/(n−p)!</td></tr>
        <tr><td style="text-align:left">Permutation (tous, ordonnés)</td><td>oui</td><td>non</td><td class="f">n!</td></tr>
        <tr><td style="text-align:left">Combinaison (partie, tirage simultané, équipe)</td><td>non</td><td>non</td><td class="f">C(n,p) = n!/(p!(n−p)!)</td></tr>
      </table></div>
      <ul>
        <li>Code de 3 chiffres (0 à 9) : <span class="f">10³ = 1000</span>. Commençant par 5 : <span class="f">10² = 100</span>. 3 chiffres distincts non nuls commençant par 5 : <span class="f">8 × 7 = 56</span>.</li>
        <li>4 chiffres distincts parmi 10 : <span class="f">A₁₀⁴ = 10 × 9 × 8 × 7 = 5040</span>.</li>
        <li>3 jetons parmi 8 tirés ensemble : <span class="f">C(8,3) = 56</span>.</li>
        <li>4 chiffres puis 2 lettres : <span class="f">10⁴ × 26² = 6 760 000</span>.</li>
        <li><span class="f">0! = 1</span> et <span class="f">2ⁿ = C(n,0) + C(n,1) + … + C(n,n)</span>.</li>
      </ul>
      <div class="box method">Fais le schéma des cases : C1 × C2 × C3, en écrivant le nombre de choix sous chaque case. Laisse en puissance si le calcul est long.</div>
      <div class="mod" data-mod="count"></div>

      <h3>9. Partition</h3>
      <p>A₁, …, Aₙ forment une partition de E si : aucune partie n'est vide, elles sont <b>disjointes deux à deux</b>, et leur réunion vaut E. Ex. si A est une partie propre de E, A et ∁E(A) forment une partition de E.</p>
    </article>
  </section>

  <!-- ============ FICHE CHAPITRE 3 ============ -->
  <section id="tab-f3" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="f3">
      <h2>Chapitre 3 · Relations binaires</h2>
      <p class="muted">Devoir n°2 lundi 23/11 (8 h 30, 1 h) : chapitres 3 et 4. Le chapitre 3 sert aussi pour l'éval écrite SAÉ 1.04 du 25/11 (produits cartésiens et relations).</p>

      <h3>1. Définition et représentations</h3>
      <ul>
        <li>Une <b>relation binaire</b> R de A vers B est une <b>partie de A × B</b> (un élément de P(A × B)). On écrit <span class="f">x R y</span> ou <span class="f">(x, y) ∈ R</span>.</li>
        <li>Si A = B, on parle de relation <b>dans A</b>.</li>
        <li>Représentations : <b>sagittale</b> (flèches de x vers y) ou <b>cartésienne</b> (tableau, une croix dans la case (x, y)).</li>
        <li>Relation <b>n-aire</b> : partie de A₁ × … × Aₙ (arité n). Une table de BDD ADHERENT à 8 colonnes est une relation 8-aire. Relation unaire : « être pair ».</li>
      </ul>
      <div class="box def">Nombre de relations de A vers B : <b>2^(Card A × Card B)</b>, car A × B a Card A × Card B couples et chaque relation est une partie de A × B.<br>A = {a, b}, B = {1, 2} → 2⁴ = 16 · dans {1, 2, 3} → 2⁹ = 512 · dans {a, b, c, d} → 2¹⁶ = 65 536.</div>
      <p><b>Application</b> : chaque x de A est en relation avec <b>un et un seul</b> y de B. Parmi les 16 relations de {a, b} vers {1, 2}, seules 4 sont des applications (2 choix pour a, 2 pour b).</p>

      <h3>2. Propriétés d'une relation dans E</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Propriété</th><th>Définition</th><th>Sur le dessin / le tableau</th></tr>
        <tr><td><b>Réflexive</b></td><td><span class="f">∀x, x R x</span></td><td>une boucle sur chaque élément ; diagonale entièrement cochée</td></tr>
        <tr><td><b>Symétrique</b></td><td><span class="f">x R y ⇒ y R x</span></td><td>chaque flèche a sa flèche retour ; tableau symétrique par rapport à la diagonale</td></tr>
        <tr><td><b>Transitive</b></td><td><span class="f">(x R y et y R z) ⇒ x R z</span></td><td>chaque « chemin en deux flèches » a son raccourci</td></tr>
        <tr><td><b>Antisymétrique</b></td><td><span class="f">(x R y et y R x) ⇒ x = y</span></td><td>jamais d'aller-retour entre deux éléments <b>distincts</b></td></tr>
      </table></div>
      <div class="box method">Méthode du devoir : un tableau V/F par propriété. Pour la transitivité, ne liste <b>que</b> les triplets (x, y, z) où x R y <b>et</b> y R z sont vrais, puis vérifie x R z. <b>Un seul contre-exemple</b> suffit pour conclure « non ». Si la prémisse est fausse, l'implication est vraie.</div>
      <div class="box exm">A = {1, 2, 3}, R = {(1,1), (1,2), (1,3), (3,3)} :<br>
        non réflexive (2 R 2 est faux) · non symétrique (1 R 2 mais pas 2 R 1) · transitive (triplets (1,1,1), (1,1,2), (1,1,3), (1,3,3), (3,3,3) : à chaque fois x R z) · antisymétrique (aucun aller-retour entre éléments distincts).<br>
        T = {(1,1), (1,2), (2,2), (2,3)} : non réflexive (3 T 3 est faux) · non symétrique · <b>non transitive</b> (1 T 2 et 2 T 3 mais pas 1 T 3) · antisymétrique.</div>
      <div class="box trap">Symétrique et antisymétrique ne sont pas contraires : l'égalité est les deux à la fois, et une relation peut n'être ni l'une ni l'autre. ≤, ⊂ et « divise » ne sont pas symétriques ; &lt; n'est pas réflexive.</div>

      <h3>3. Relation d'équivalence</h3>
      <ul>
        <li><b>Équivalence = réflexive + symétrique + transitive</b>. Elle se reconnaît souvent à « avoir le même … que ».</li>
        <li><b>Classe</b> de x : <span class="f">Cℓ(x) = {y ∈ E / x R y}</span>.</li>
        <li>Les classes forment une <b>partition</b> de E : non vides, disjointes deux à deux, leur union est E. L'ensemble des classes est l'<b>ensemble quotient</b> E/R.</li>
      </ul>
      <div class="box exm">Anagrammes : Cℓ(chien) = {chien, niche, Chine}.<br>Sur {1, …, 8}, x R y ⇔ xy est un carré parfait : classes {1, 4}, {2, 8}, {3}, {5}, {6}, {7}.<br>Sur ℤ, « avoir le même reste dans la division par 3 » : 3 classes, celles de 0, 1 et 2.</div>

      <h3>4. Relation d'ordre</h3>
      <ul>
        <li><b>Ordre = réflexive + antisymétrique + transitive</b>.</li>
        <li><b>Total</b> si deux éléments sont toujours comparables (≤ dans ℝ), sinon <b>partiel</b> (⊂ dans P(X), divisibilité dans ℕ : 2 et 3 ne sont pas comparables).</li>
        <li>L'égalité est à la fois une équivalence et un ordre (partiel).</li>
      </ul>
      <div class="box trap">« Divise » dans ℤ est réflexive et transitive mais <b>pas antisymétrique</b> : 1 | −1 et −1 | 1 alors que 1 ≠ −1. Dans ℕ, elle est antisymétrique, donc c'est un ordre.</div>
    </article>
  </section>

  <!-- ============ FICHE CHAPITRE 4 ============ -->
  <section id="tab-f4" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="f4">
      <h2>Chapitre 4 · Divisibilité dans ℤ</h2>
      <p class="muted">Division euclidienne, diviseurs, nombres premiers, décomposition et nombre de diviseurs.</p>

      <h3>1. Division euclidienne</h3>
      <div class="box def">Pour a ∈ ℤ et b ∈ ℤ, b ≠ 0, il existe un <b>unique</b> couple (q, r) tel que <span class="f">a = bq + r</span> et <span class="f">0 ≤ r &lt; |b|</span>.</div>
      <div class="tscroll"><table class="tt">
        <tr><th>a</th><th>b</th><th>Écriture</th><th>q</th><th>r</th></tr>
        <tr><td>125</td><td>11</td><td class="f">125 = 11 × 11 + 4</td><td>11</td><td>4</td></tr>
        <tr><td>−35</td><td>12</td><td class="f">−35 = 12 × (−3) + 1</td><td>−3</td><td>1</td></tr>
        <tr><td>35</td><td>−12</td><td class="f">35 = (−12) × (−2) + 11</td><td>−2</td><td>11</td></tr>
        <tr><td>12</td><td>35</td><td class="f">12 = 35 × 0 + 12</td><td>0</td><td>12</td></tr>
        <tr><td>2013</td><td>7</td><td class="f">2013 = 7 × 287 + 4</td><td>287</td><td>4</td></tr>
        <tr><td>−2013</td><td>7</td><td class="f">−2013 = 7 × (−288) + 3</td><td>−288</td><td>3</td></tr>
        <tr><td>−7</td><td>2013</td><td class="f">−7 = 2013 × (−1) + 2006</td><td>−1</td><td>2006</td></tr>
      </table></div>
      <div class="box trap">Le reste est <b>toujours positif ou nul</b>. Pour a négatif, on descend d'un cran : −35 = 12 × (−2) + (−11) a un reste négatif, c'est interdit ; on prend q = −3 et r = −35 + 36 = 1.</div>

      <h3>2. Diviseurs et multiples</h3>
      <ul>
        <li><span class="f">b | a ⇔ ∃k ∈ ℤ, a = kb</span> : « b divise a », « a est un multiple de b ». Sinon <span class="f">b ∤ a</span>. N'écris jamais b/a pour « b divise a ».</li>
        <li>Pour b ≠ 0 : b | a ⇔ le reste de a par b est nul. 966 = 23 × 42 donc 23 | 966.</li>
      </ul>
      <div class="formula-list">
        <span class="f">1 | n, n | n, n | 0</span><span>toujours vrai</span>
        <span class="f">0 | n</span><span>seulement si n = 0</span>
        <span class="f">a | b et b | a</span><span>⇒ a = ±b</span>
        <span class="f">a | b et b | c</span><span>⇒ a | c (transitivité)</span>
        <span class="f">a | b</span><span>⇒ ac | bc ; et ac | bc avec c ≠ 0 ⇒ a | b</span>
        <span class="f">a | b et a | c</span><span>⇒ a | xb + yc pour tous x, y entiers (linéarité)</span>
        <span class="f">b | a, a ≠ 0</span><span>⇒ 1 ≤ |b| ≤ |a| (mais pas forcément b ≤ a : 5 | −10 alors que 5 &gt; −10)</span>
      </div>
      <div class="box exm">a = 2n + 7 et b = n + 1. Tout diviseur commun d de a et b divise a − 2b = 5, donc <span class="f">d ∈ {−5, −1, 1, 5}</span>.</div>

      <h3>3. Nombres premiers</h3>
      <ul>
        <li>p est <b>premier</b> s'il a exactement <b>deux</b> diviseurs dans ℕ : 1 et lui-même. 0 et 1 ne sont <b>pas</b> premiers.</li>
        <li>2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47… Il y en a une infinité.</li>
        <li>Pour tester n, on essaie les premiers p avec p² ≤ n.</li>
      </ul>

      <h3>4. Décomposition en facteurs premiers</h3>
      <p>Tout entier n ≥ 2 s'écrit de façon <b>unique</b> <span class="f">n = p₁^α₁ × … × p_r^α_r</span>.</p>
      <div class="tscroll"><table class="tt">
        <tr><th>n</th><th>Décomposition</th><th>Nombre de diviseurs positifs</th></tr>
        <tr><td>24</td><td class="f">2³ × 3</td><td>(3+1)(1+1) = 8</td></tr>
        <tr><td>120</td><td class="f">2³ × 3 × 5</td><td>4 × 2 × 2 = 16</td></tr>
        <tr><td>150</td><td class="f">2 × 3 × 5²</td><td>2 × 2 × 3 = 12</td></tr>
        <tr><td>720</td><td class="f">2⁴ × 3² × 5</td><td>5 × 3 × 2 = 30</td></tr>
        <tr><td>1 323</td><td class="f">3³ × 7²</td><td>4 × 3 = 12</td></tr>
        <tr><td>2 860</td><td class="f">2² × 5 × 11 × 13</td><td>3 × 2 × 2 × 2 = 24</td></tr>
        <tr><td>8 040</td><td class="f">2³ × 3 × 5 × 67</td><td>4 × 2 × 2 × 2 = 32</td></tr>
        <tr><td>38 808</td><td class="f">2³ × 3² × 7² × 11</td><td>4 × 3 × 3 × 2 = 72</td></tr>
        <tr><td>983 125</td><td class="f">5⁴ × 11² × 13</td><td>5 × 3 × 2 = 30</td></tr>
      </table></div>
      <div class="box def">Nombre de diviseurs positifs de <span class="f">p₁^α₁ × … × p_r^α_r</span> : <b>(1 + α₁)(1 + α₂)…(1 + α_r)</b>. Exemples : 3² × 5⁷ → 3 × 8 = 24 ; 2 × 11³ → 2 × 4 = 8.</div>
      <div class="box trap">Vérifie que chaque facteur est premier : 21 ne l'est pas. 21⁵ = 3⁵ × 7⁵ a 6 × 6 = 36 diviseurs, pas 6. Dans ℤ, il y a deux fois plus de diviseurs (les opposés).</div>

      <h3>5. Lister les diviseurs</h3>
      <p>On développe le produit sans réduire : pour 120 = 2³ × 3 × 5, <span class="f">(1 + 2 + 2² + 2³)(1 + 3)(1 + 5)</span> : chaque terme du développement est un diviseur.</p>
      <ul>
        <li>D(24) = {1, 2, 3, 4, 6, 8, 12, 24}</li>
        <li>D(150) = {1, 2, 3, 5, 6, 10, 15, 25, 30, 50, 75, 150}</li>
        <li>D(120) = {1, 2, 3, 4, 5, 6, 8, 10, 12, 15, 20, 24, 30, 40, 60, 120}</li>
        <li>D<sub>ℤ</sub>(n) contient aussi les opposés : D<sub>ℤ</sub>(6) = {−6, −3, −2, −1, 1, 2, 3, 6}.</li>
      </ul>
      <div class="box method">Un multiple de n contient tous les facteurs premiers de n avec des exposants au moins aussi grands. 8 400 = 120 × 70 = 2⁴ × 3 × 5² × 7 est bien un multiple de 120 = 2³ × 3 × 5.</div>
    </article>
  </section>

  <!-- ============ FICHE EXPRESS ============ -->
  <section id="tab-fx" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="fx">
      <h2>Fiche express · Chap. 1 à 4</h2>
      <p class="muted">L'essentiel à relire juste avant le devoir. Devoir n°2 (lun. 23/11) : chapitres 3 et 4, en premier ci-dessous.</p>
      <div class="grid2">
        <div>
          <h3>Relations (chap. 3)</h3>
          <ul>
            <li>Relation de A vers B = <b>partie de A × B</b> · nombre : <span class="f">2^(|A|·|B|)</span></li>
            <li>Application : chaque x a <b>une et une seule</b> image · nombre : <span class="f">|B|^|A|</span></li>
            <li>Réflexive : <span class="f">x R x</span> pour tout x (diagonale cochée)</li>
            <li>Symétrique : <span class="f">x R y ⇒ y R x</span></li>
            <li>Transitive : <span class="f">x R y et y R z ⇒ x R z</span> (ne lister que les triplets où les deux sont vrais)</li>
            <li>Antisymétrique : <span class="f">x R y et y R x ⇒ x = y</span></li>
            <li>« Non » : <b>un seul contre-exemple</b> suffit</li>
            <li>Équivalence = R + S + T · classes = partition de E</li>
            <li>Ordre = R + antisymétrique + T · total ou partiel</li>
            <li>« divise » dans ℤ : pas antisymétrique (1 | −1, −1 | 1)</li>
          </ul>
        </div>
        <div>
          <h3>Divisibilité (chap. 4)</h3>
          <ul>
            <li><span class="f">a = bq + r</span>, <span class="f">0 ≤ r &lt; |b|</span> : reste <b>jamais négatif</b></li>
            <li><span class="f">−35 = 12 × (−3) + 1</span> · <span class="f">35 = (−12) × (−2) + 11</span></li>
            <li><span class="f">b | a ⇔ a = kb</span> · 1 | n, n | 0, 0 | n ⇔ n = 0</li>
            <li>a | b et a | c ⇒ a | xb + yc</li>
            <li>Premier : exactement 2 diviseurs · 0 et 1 non premiers</li>
            <li>24 = <span class="f">2³ × 3</span> · 150 = <span class="f">2 × 3 × 5²</span></li>
            <li>Nombre de diviseurs : <span class="f">(1+α₁)(1+α₂)…</span></li>
            <li>Toujours redécomposer : 21⁵ = 3⁵ × 7⁵ → 36</li>
            <li>Liste : développer <span class="f">(1+2+2²+2³)(1+3)</span></li>
            <li>Dans ℤ : deux fois plus (les opposés)</li>
          </ul>
        </div>
      </div>
      <div class="grid2">
        <div>
          <h3>Logique</h3>
          <ul>
            <li><span class="f">∧</span> V ssi tout V · <span class="f">∨</span> F ssi tout F</li>
            <li><span class="f">p → q</span> F <b>uniquement</b> si V → F</li>
            <li><span class="f">p ↔ q</span> V ssi même valeur</li>
            <li>n lettres → <b>2ⁿ</b> lignes, V d'abord à gauche</li>
            <li>Modèle = V, contre-exemple = F</li>
            <li>Tautologie : tout V · Contradiction : tout F · sinon contingente (justifier avec 1 modèle + 1 contre-ex.)</li>
            <li><span class="f">p → q éq ¬p ∨ q éq ¬q → ¬p</span></li>
            <li>Réciproque <span class="f">q → p</span> : <b>pas</b> équivalente</li>
            <li>Morgan : <span class="f">¬(p∧q) éq ¬p∨¬q</span>, <span class="f">¬(p∨q) éq ¬p∧¬q</span></li>
            <li>« p seulement si q », « il suffit p pour q », « pour p il faut q » → <span class="f">p → q</span></li>
            <li>« p si q » → <span class="f">q → p</span> · « sauf si » → <span class="f">p ↔ ¬q</span></li>
            <li>« sinon » → <span class="f">(p→q) ∧ (¬p→r)</span></li>
          </ul>
        </div>
        <div>
          <h3>Ensembles</h3>
          <ul>
            <li><b>∈</b> élément · <b>⊂</b> ensemble</li>
            <li><span class="f">{∅} ≠ ∅</span>, <span class="f">{a,b} = {b,a}</span>, <span class="f">(a,b) ≠ (b,a)</span></li>
            <li>A = B ⇔ A ⊂ B et B ⊂ A</li>
            <li><span class="f">A − B = A ∩ B̄</span> · <span class="f">A∆B = (A−B) ∪ (B−A)</span></li>
            <li>Morgan : <span class="f">∁(A∪B) = Ā∩B̄</span>, <span class="f">∁(A∩B) = Ā∪B̄</span></li>
            <li><span class="f">|A∪B| = |A| + |B| − |A∩B|</span></li>
            <li><span class="f">|Ā| = |E| − |A|</span> · <span class="f">|A−B| = |A| − |A∩B|</span></li>
            <li><span class="f">|A∆B| = |A| + |B| − 2|A∩B|</span></li>
            <li><span class="f">|P(E)| = 2^|E|</span> · <span class="f">|A×B| = |A|·|B|</span></li>
            <li>Ordre + répétition : <span class="f">nᵖ</span> · ordre sans répétition : <span class="f">n!/(n−p)!</span> · sans ordre : <span class="f">C(n,p)</span></li>
            <li>Disjoints : <span class="f">A∩B = ∅</span> (≠ distincts)</li>
          </ul>
        </div>
      </div>
      <div class="box method">Au devoir : nommer les ensembles / propositions, citer le résultat du cours, calculer, puis une <b>phrase de conclusion</b>. Tables : écrire la valeur sous chaque connecteur et entourer la colonne finale.</div>
    </article>
  </section>

  <!-- ============ R1.05 : MCD ============ -->
  <section id="tab-b1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="b1">
      <h2>R1.05 · Du besoin au MCD</h2>
      <p class="muted">Tout le cours 1 du prof (158 diapos), dans l'ordre : dictionnaire des données, dépendances fonctionnelles, graphe, puis MCD et ses cas particuliers. Évaluation mi-parcours mardi 20/10 à 8 h, sans document.</p>
      <div class="box method">La démarche complète, à suivre à chaque exercice : <b>1</b> dictionnaire des données → <b>2</b> dépendances fonctionnelles → <b>3</b> GDF → <b>4</b> MCD → <b>5</b> MLD → <b>6</b> schéma relationnel. Les annales demandent surtout les étapes 4 à 6.</div>

      <h3 id="b1-bd">1. Base de données et SGBD</h3>
      <div class="formula-list">
        <b>Base de données (BD)</b><span>collection de données <b>cohérentes et structurées</b>.</span>
        <b>SGBD</b><span>logiciel qui assure la structuration, le stockage, la maintenance, la mise à jour et la consultation des données d'une BD (Oracle, PostgreSQL…).</span>
        <b>Système d'information</b><span>deux grandes parties : les <b>données</b> et les <b>traitements</b>. Il délivre la bonne information, au bon interlocuteur, au bon moment.</span>
      </div>
      <p>Pourquoi une BD : saisie uniformisée, contrôle immédiat de la validité, données partagées entre plusieurs traitements, et surtout <b>pas de redondance</b>. Une BD se conçoit <b>a priori</b>, avant de programmer.</p>

      <h3 id="b1-dico">2. Le dictionnaire des données</h3>
      <p>Un tableau qui recense toutes les données collectées. Pour chaque donnée : son <b>nom</b>, son <b>format</b>, sa <b>longueur</b>, son <b>type</b> (élémentaire ou calculée), la <b>règle de calcul</b> si elle est calculée, et le <b>document source</b>.</p>
      <div class="formula-list">
        <b>Alphabétique</b><span>que des lettres (Nom, Ville).</span>
        <b>Alphanumérique</b><span>lettres et chiffres (Code postal, Téléphone, CodeArticle).</span>
        <b>Numérique</b><span>un nombre sur lequel on calcule (Prix, Qté).</span>
        <b>Date</b><span>une date. <b>Logique</b> : 0/1, Vrai/Faux, Oui/Non.</span>
      </div>
      <p>Exemple du cours (fiche d'adhésion d'une association, 9 informations) :</p>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Nom</th><th>Format</th><th>Longueur</th><th>Type</th><th>Règle de calcul</th><th>Source</th></tr>
        <tr><td>Numéro</td><td>Numérique</td><td></td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Nom, Prénom</td><td>Alphabétique</td><td>30</td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Adresse, Ville</td><td>Alphabétique</td><td>50</td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Code postal</td><td>Alphanumérique</td><td>10</td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Téléphone</td><td>Alphanumérique</td><td>15</td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Mail</td><td>Alphanumérique</td><td>50</td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>Date d'adhésion</td><td>Date</td><td></td><td>Élémentaire</td><td></td><td>Fiche</td></tr>
        <tr><td>TotalLigne</td><td>Numérique</td><td></td><td>Calculé</td><td>PrixUnitaire × Qté</td><td>Facture</td></tr>
      </table></div>
      <div class="box trap">Le <b>code postal</b> est alphanumérique (certains pays mélangent chiffres et lettres). On ne met en numérique que les champs sur lesquels on calcule. Une donnée <b>calculée</b> (TotalLigne, TotalFacture) figure dans le dictionnaire mais <b>jamais dans le MCD</b>.</div>

      <h3 id="b1-df">3. Les dépendances fonctionnelles (DF)</h3>
      <div class="box def"><b>Définition</b> : B dépend fonctionnellement de A (on écrit <span class="f">A → B</span>) si connaître la valeur de A permet de connaître <b>une et une seule</b> valeur de B, de façon sûre et unique.</div>
      <p>La question à se poser : « quand je connais le numéro du client, est-ce que je connais de façon sûre et unique son nom ? » Si oui : <span class="f">NumClient → Nom</span>. On regroupe : <span class="f">NumClient → (Nom, Prénom, Adresse, CodePostal, Ville)</span>. À gauche la <b>source</b>, à droite le <b>but</b>. La source deviendra la <b>clé</b> (identifiant).</p>
      <div class="grid2">
        <div class="box"><b>DF composée</b><br>La source a plusieurs attributs : <span class="f">(NumCoureur, NumCourse) → Temps</span>. Il faut les deux pour connaître le temps.</div>
        <div class="box"><b>DF élémentaire</b><br>Aucune partie de la source ne suffit. <span class="f">(NumCommande, RefProduit) → Désignation</span> n'est <b>pas</b> élémentaire, car <span class="f">RefProduit → Désignation</span> suffit.</div>
        <div class="box"><b>DF directe</b><br>Pas de transitivité. <span class="f">NumClasse → NumEleve</span> et <span class="f">NumEleve → NomEleve</span> donnent <span class="f">NumClasse → NomEleve</span>, élémentaire mais <b>pas directe</b>.</div>
      </div>
      <div class="box method">Méthode : à partir du dictionnaire, chercher d'abord les DF entre deux rubriques (élémentaires et directes), puis les DF composées. Les DF sont les fondations de tout le reste.</div>

      <h3 id="b1-camping">4. Exemple fil rouge : le camping</h3>
      <p>La famille Maurice gère un camping. Les achats à l'épicerie et au bar sont notés sur une fiche par famille et payés en fin de séjour. On veut automatiser la facture à partir de la saisie journalière des achats.</p>
      <p><b>Dictionnaire</b> : NumClient, Nom, Prénom, Adresse, CodePostal, Ville, CodeArticle, Désignation, PrixUnitaire, Qté, Date, et deux données calculées : TotalLigne = PrixUnitaire × Qté, TotalFacture = somme des TotalLigne. NumClient et CodeArticle sont « à définir » : on les invente pour identifier.</p>
      <p><b>Deux groupes d'informations</b> apparaissent : les clients et les articles.</p>
      <ul>
        <li><span class="f">NumClient → (Nom, Prénom, Adresse, CodePostal, Ville)</span></li>
        <li><span class="f">CodeArticle → (Désignation, PrixUnitaire)</span></li>
        <li>Et Qté ? Connaître l'article ne donne pas la quantité, ni le client seul. Il faut le client, l'article <b>et</b> la date : <span class="f">(NumClient, CodeArticle, Date) → Qté</span>.</li>
      </ul>

      <h3 id="b1-gdf">5. Le graphe des dépendances fonctionnelles (GDF)</h3>
      <p>Chaque donnée est un nœud, une flèche va de la source vers le but. Pour une DF composée, on crée un <b>nœud intermédiaire</b> qui relie les sources, puis une flèche vers le but. On regroupe dans un rectangle les données qui ont la même source. Le GDF ne garde que les DF minimales (élémentaires et directes) et préfigure le MCD.</p>
      <div class="gdf" data-gdf="camping"></div>
      <div class="box method">Lecture : chaque <b>source simple</b> devient une entité (son identifiant), chaque <b>source composée</b> devient une association, porteuse de la donnée qu'elle détermine.</div>

      <h3 id="b1-mcd">6. Le MCD : entités, propriétés, identifiant</h3>
      <p>Le modèle conceptuel des données décrit le <b>sens</b> des données et leurs liens, avec le formalisme <b>entité-association</b>. Il est assez simple pour qu'un non-informaticien participe à son élaboration. On ne met <b>pas les types</b> (format, longueur) dans le MCD.</p>
      <div class="formula-list">
        <b>Propriété</b><span>information élémentaire (nom, prénom…), aussi appelée attribut.</span>
        <b>Entité</b><span>regroupement de propriétés qui décrivent un même type d'objet (CLIENT). Elle représente un <b>ensemble d'occurrences</b>.</span>
        <b>Occurrence</b><span>un exemplaire particulier : Odile Martin est une occurrence de PERSONNE. Une valeur est une occurrence de propriété.</span>
        <b>Identifiant</b><span>la propriété qui distingue sans ambiguïté chaque occurrence. <b>Soulignée</b>, en tête, ne change jamais. Le nom ne suffit pas (homonymes) : on invente un numéro.</span>
      </div>
      <div class="box method">Exemple : la fiche d'un adhérent de l'association contient « n° 66, Jérôme Martin, 6 rue des Prés, Metz, jerome.m@mail.fr ». On regroupe ces informations dans une <b>entité</b> ADHERENT. Le nom ne peut pas servir d'identifiant (il y a deux Martin), alors on prend le numéro d'adhérent, qu'on <b>souligne</b>.</div>
      <div class="fig" data-fig="adherent"></div>
      <p>Les <b>occurrences</b> de l'entité, rangées en tableau : une ligne par adhérent, une colonne par propriété.</p>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th><u>NumAdherent</u></th><th>NomAdh</th><th>PrenomAdh</th><th>VilleAdh</th><th>DateAdhesion</th></tr>
        <tr><td>66</td><td>Martin</td><td>Jérôme</td><td>Metz</td><td>12/09/2026</td></tr>
        <tr><td>67</td><td>Martin</td><td>Odile</td><td>Nancy</td><td>15/09/2026</td></tr>
        <tr><td>68</td><td>Benali</td><td>Sarah</td><td>Metz</td><td>03/10/2026</td></tr>
      </table></div>
      <ul>
        <li><b>Entité</b> : ADHERENT, le rectangle. <b>Propriétés</b> : NomAdh, PrenomAdh, VilleAdh, DateAdhesion (une seule valeur chacune, noms au singulier, suffixés pour ne pas réapparaître ailleurs dans le MCD).</li>
        <li><b>Identifiant</b> : NumAdherent, souligné et en tête. Connaître 67 donne une seule personne : Odile Martin, de Nancy. Connaître « Martin » en donne deux : le nom ne peut pas être identifiant.</li>
        <li><b>Occurrence</b> : la ligne 67 est une occurrence d'ADHERENT. « Nancy » est une valeur de la propriété VilleAdh.</li>
      </ul>
      <div class="box trap">Ne pas confondre entité et occurrence, propriété et valeur, association et occurrence d'association. On représente souvent les occurrences sous forme de tableau : une ligne = une occurrence, une colonne = une propriété.</div>

      <h3 id="b1-assoc">7. Associations et cardinalités</h3>
      <p>Une <b>association</b> (relation) est un lien entre deux entités ou plus, nommée par un <b>verbe</b> : « un client <b>commande</b> des articles ». Son identifiant est la concaténation des identifiants des entités liées.</p>
      <p>Les <b>cardinalités</b> disent combien de fois, au minimum et au maximum, une occurrence de l'entité participe à l'association. Pour une association binaire il y en a <b>4</b> (min et max de chaque côté). Valeurs typiques : 0, 1, n. Si le maximum est connu, on l'écrit : (1,3).</p>
      <div class="box method">Les questions à poser, de chaque côté :<br>« Combien de fois <b>au minimum</b> un client commande-t-il ? » Un client n'est client qu'après un achat → <b>1</b>.<br>« Combien de fois <b>au maximum</b> ? » Plusieurs → <b>n</b>. D'où <b>1,n</b> côté CLIENT.<br>Même chose pour l'article : un article peut ne jamais être commandé → <b>0,n</b>.</div>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Cardinalité</th><th>Se lit</th></tr>
        <tr><td class="f">0,1</td><td style="text-align:left">aucun ou un seul (au plus un)</td></tr>
        <tr><td class="f">1,1</td><td style="text-align:left">un et un seul (exactement un)</td></tr>
        <tr><td class="f">0,n</td><td style="text-align:left">aucun ou plusieurs</td></tr>
        <tr><td class="f">1,n</td><td style="text-align:left">un ou plusieurs (au moins un)</td></tr>
      </table></div>
      <p>On compare les deux <b>maximums</b> pour le type :</p>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Maximums</th><th>Type</th><th>Exemple</th></tr>
        <tr><td>1 et n</td><td class="f">1:n</td><td style="text-align:left">Mère (0,n) — Élever — (1,1) Enfant</td></tr>
        <tr><td>n et n</td><td class="f">n:n</td><td style="text-align:left">Client (1,n) — Commander — (0,n) Article</td></tr>
        <tr><td>1 et 1</td><td class="f">1:1</td><td style="text-align:left">Marin (1,1) — Piloter — (1,1) Voilier</td></tr>
      </table></div>
      <div class="fig" data-fig="mere"></div>
      <div class="mod" data-mod="mcdcard"></div>
      <div class="box trap">Les cardinalités traduisent des <b>règles de gestion</b>. Si l'énoncé ne dit rien, fais une supposition raisonnable et <b>justifie-la</b> par une phrase.</div>

      <h3 id="b1-porteuse">8. Associations porteuses, ternaires, réflexives, plurielles</h3>
      <p><b>Porteuse</b> : l'association contient des propriétés. La quantité commandée dépend du client <b>et</b> de l'article : elle va dans l'association. Une association entre deux entités est <b>binaire</b>.</p>
      <div class="fig" data-fig="commander"></div>
      <p><b>Ternaire</b> : trois entités. Pour garder la date d'achat (plusieurs achats du même article), on ajoute l'entité DATE à l'association.</p>
      <div class="fig" data-fig="acheter"></div>
      <p><b>Réflexive</b> : une entité liée à elle-même. Un employé peut diriger zéro ou plusieurs employés ; un employé est dirigé par un et un seul autre. On nomme les deux pattes par un <b>rôle</b> (chef, subordonné).</p>
      <div class="fig" data-fig="diriger"></div>
      <p><b>Plurielles</b> : deux entités liées par plusieurs associations. Une personne peut écrire un livre (auteur) et l'emprunter (abonné) : une seule entité PERSONNE, deux associations.</p>
      <div class="fig" data-fig="plurielle"></div>

      <h3 id="b1-avance">9. Entité faible, spécialisation, CIF, identifiant relatif</h3>
      <div class="formula-list">
        <b>Entité forte</b><span>a son identifiant, existe seule (MÈRE).</span>
        <b>Entité faible</b><span>n'existe qu'associée à une autre (ENFANT n'existe pas sans sa mère).</span>
        <b>Spécialisation</b><span>une entité générique (PERSONNE) et une entité spécialisée (ABONNÉ). Cardinalités <b>figées</b> : <b>0,1</b> côté générique, <b>1,1</b> côté spécialisé. Sert par exemple à représenter un abonné qui n'a encore rien emprunté.</span>
        <b>CIF</b><span>contrainte d'intégrité fonctionnelle : une association binaire avec un <b>1 en cardinalité maximale</b> (0,1 ou 1,1) sur une patte. Elle porte une DF : connaître l'ordinateur donne sa salle.</span>
        <b>Identifiant relatif</b><span>l'entité n'existe que relativement à une autre : le PC 10 de la salle 12 de l'étage 3 du bâtiment A (BA-E3-12-10). Si on vend le bâtiment, tout disparaît en cascade.</span>
      </div>
      <div class="fig" data-fig="cif"></div>
      <div class="fig" data-fig="spec"></div>

      <h3 id="b1-regles">10. Les règles de construction du MCD</h3>
      <ul>
        <li><b>Propriétés</b> : une propriété n'apparaît <b>qu'une fois</b> dans tout le MCD (Date_commande et Date_facture, pas deux fois Date). Au <b>singulier</b>, une seule valeur à un instant donné (noteBD, noteMath… plutôt que « notes »).</li>
        <li><b>Entités</b> : toute entité a un identifiant, souligné et en tête. Toutes ses propriétés dépendent de lui.</li>
        <li><b>Associations</b> : identifiant implicite = concaténation des identifiants liés. Deux occurrences ne peuvent pas avoir le même. Les propriétés sont facultatives.</li>
        <li>Les propriétés <b>calculées</b> ne figurent pas dans le MCD.</li>
      </ul>

      <h3 id="b1-gdfmcd">11. Du GDF au MCD (camping, fin)</h3>
      <p>Le GDF a trois sources : CodeArticle, Date, NumClient. Chacune devient une entité : ARTICLE, DATE, CLIENT. La source composée (NumClient, CodeArticle, Date) → Qté devient l'association ternaire <b>Acheter</b>, porteuse de Qté (voir le MCD de la partie 8).</p>
      <p>Cardinalités : au minimum il pourrait ne rien se vendre (0,n partout). Mais si on suppose qu'il se vend quelque chose chaque jour et qu'on n'est client qu'après un premier achat, on met <b>1,n</b>. Les cardinalités viennent des règles de gestion : sans information, on suppose et on justifie.</p>

      <h3 id="b1-redaction">12. Ce que le prof attend sur la copie</h3>
      <div class="box method">« Entre Client et Commande il y a une association Passer. Un client peut passer une ou plusieurs commandes, donc la cardinalité entre Client et Passer est 1,n. Une commande est passée par un et un seul client, donc 1,1. Les maximums sont 1 et n : association de type 1:n. »</div>
      <ol>
        <li>Une phrase par côté de chaque association, avec la cardinalité.</li>
        <li>Le type de l'association (1:1, 1:n, n:n).</li>
        <li>Le MCD dessiné : entités en rectangle (identifiant souligné), associations en ellipse avec leurs propriétés.</li>
        <li>Puis le schéma relationnel (voir le cours MCD → MLD).</li>
      </ol>
      <div class="pdfl"><span class="eyebrow">Diaporamas du prof</span><a href="https://arche.univ-lorraine.fr/pluginfile.php/4674686/mod_resource/content/2/Cours%201%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf" target="_blank" rel="noopener">Cours 1 (PDF, 158 diapos)</a><a href="https://arche.univ-lorraine.fr/pluginfile.php/4688255/mod_resource/content/2/2%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf" target="_blank" rel="noopener">Cours 2 (PDF, 76 diapos)</a></div>
    </article>
  </section>

  <!-- ============ R1.05 : MLD ============ -->
  <section id="tab-b2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="b2">
      <h2>R1.05 · Du MCD au MLD (schéma relationnel)</h2>
      <p class="muted">Tout le cours 2 du prof (76 diapos) : les 3 règles de passage, la contrainte d'intégrité référentielle et les 9 exemples de cas particuliers. Clique sur une association d'un MCD pour voir la règle appliquée.</p>
      <div class="box method">Les 3 règles qui suffisent dans 90 % des cas :<br><b>1.</b> Chaque entité devient une table, son identifiant devient la clé primaire.<br><b>2.</b> Association <b>1:n</b> : la table côté maximum <b>1</b> reçoit une <b>#clé étrangère</b>, l'association disparaît.<br><b>3.</b> Association <b>n:n</b> (ou porteuse de données, ou ternaire) : nouvelle table, clé primaire = les clés étrangères.</div>

      <h3 id="b2-mld">1. Le modèle relationnel</h3>
      <p>Le MCD ne peut pas être implanté tel quel dans une base. On le transforme en <b>MLD</b> (modèle logique des données), aussi appelé MRD, MLDR ou MRLD. Le MLD représente la base comme un <b>ensemble de tables</b> à deux dimensions.</p>
      <div class="formula-list">
        <b>Table (relation)</b><span>une entité devenue tableau.</span>
        <b>Ligne</b><span>un <b>enregistrement</b> (une occurrence).</span>
        <b>Colonne</b><span>un <b>champ</b> (un attribut).</span>
        <b>Contrainte d'intégrité</b><span>règle qui garantit la cohérence des données.</span>
      </div>
      <div class="box def">Notation du cours : <b>Table (<u>clé_primaire</u>, attribut, #clé_étrangère)</b>. Clé primaire <u>soulignée</u>, clé étrangère précédée de <b>#</b>.</div>

      <h3 id="b2-r1">2. Règle 1 : entité → table</h3>
      <ul>
        <li>Une entité devient une table.</li>
        <li>Son identifiant devient la <b>clé primaire</b> : valeurs <b>uniques</b> et <b>jamais nulles</b>. Le SGBD crée automatiquement un index dessus.</li>
        <li>Les autres propriétés deviennent les attributs.</li>
      </ul>
      <div class="box def">Mères (<u>NumMère</u>, Nom_Mère, Prénom_Mère)</div>

      <h3 id="b2-r2">3. Règle 2 : association 1:n → clé étrangère</h3>
      <p>Cas (0,n)–(1,1) ou (1,n)–(0,1). L'entité qui a la cardinalité <b>(1,1) ou (0,1)</b> absorbe l'identifiant de l'entité côté (0,n) ou (1,n). Cet identifiant absorbé est la <b>clé étrangère #</b>. L'association est supprimée.</p>
      <div class="fig" data-fig="mere" data-mld="1"></div>
      <div class="box def">Mères (<u>NumMère</u>, Nom_Mère, Prénom_Mère)<br>Enfants (<u>NumEnfant</u>, Nom_Enfant, Prénom_Enfant, #NumMère)</div>
      <p>Juliette LUC a trois enfants (Roméo, Tom, Maelys), Patricia ANGUY en a deux (Chiara, Matéo) :</p>
      <div class="grid2">
        <div class="tscroll"><table class="tt"><tr><th colspan="3">Mères</th></tr><tr><th><u>NumMère</u></th><th>Nom</th><th>Prénom</th></tr><tr><td>1</td><td>LUC</td><td>Juliette</td></tr><tr><td>2</td><td>ANGUY</td><td>Patricia</td></tr></table></div>
        <div class="tscroll"><table class="tt"><tr><th colspan="4">Enfants</th></tr><tr><th><u>NumEnfant</u></th><th>Nom</th><th>Prénom</th><th>#NumMère</th></tr><tr><td>1</td><td>LUC</td><td>Roméo</td><td>1</td></tr><tr><td>2</td><td>LUC</td><td>Tom</td><td>1</td></tr><tr><td>3</td><td>LUC</td><td>Maelys</td><td>1</td></tr><tr><td>4</td><td>ANGUY</td><td>Chiara</td><td>2</td></tr><tr><td>5</td><td>ANGUY</td><td>Matéo</td><td>2</td></tr></table></div>
      </div>
      <p>Pour trouver les enfants de Juliette : on cherche son numéro dans Mères (1), puis toutes les lignes de Enfants où #NumMère = 1.</p>
      <div class="box trap">On ne met <b>jamais</b> la clé côté « n » : la mère ne peut pas stocker 3 numéros d'enfants dans une seule case.</div>

      <h3 id="b2-cir">4. Contrainte d'intégrité référentielle (CIR)</h3>
      <p>Une clé étrangère doit toujours référencer une clé primaire <b>existante</b> : on ne peut pas enregistrer un enfant avec un NumMère qui n'existe pas. Si on supprime une mère, trois choix :</p>
      <ul>
        <li><b>interdire</b> la suppression (un enfant ne peut pas exister sans mère) ;</li>
        <li>supprimer aussi les enfants <b>en cascade</b> ;</li>
        <li>mettre <b>NULL</b> dans #NumMère (l'enfant n'a plus de référence, par exemple une adoption).</li>
      </ul>

      <h3 id="b2-r3">5. Règle 3 : association n:n → nouvelle table</h3>
      <p>Cas (0,n)–(0,n), (1,n)–(1,n)… L'association devient une table qui absorbe les identifiants des entités reliées. Sa clé primaire est la <b>concaténation des clés étrangères</b>. Ses propriétés deviennent des attributs. Si le nom n'est pas parlant, on renomme la table (CONCERNE devient LIGNE_DE_COMMANDE).</p>
      <div class="fig" data-fig="commander" data-mld="1"></div>
      <div class="box def">Clients (<u>NumClient</u>, Nom, Prénom, Adresse, CodePostal, Ville)<br>Articles (<u>CodeArticle</u>, Désignation, PrixAchat, PrixVente)<br>Commander (<u>#NumClient, #CodeArticle</u>, Qté)</div>
      <div class="box trap">Le couple (#NumClient, #CodeArticle) doit être <b>unique</b> : le client 1 ne peut acheter l'article 1 qu'<b>une seule fois</b>. Pour enregistrer plusieurs achats, on ajoute la DATE dans la clé (association ternaire) : Commander (<u>#NumClient, #CodeArticle, #Date</u>, Qté).</div>

      <h3 id="b2-11">6. Cas particuliers des associations 1:1</h3>
      <p><b>Exemple 1, (1,1)–(1,1)</b> : un marin, un voilier, course en solitaire. Trois solutions selon ce qui compte le plus :</p>
      <ul>
        <li>le marin est le plus important : MARIN (<u>numMarin</u>, nomMarin, #numVoilier, nomVoilier) ;</li>
        <li>le voilier est le plus important : VOILIER (<u>numVoilier</u>, nomVoilier, #numMarin, nomMarin) ;</li>
        <li>le modèle peut évoluer : deux tables, MARIN (<u>numMarin</u>, nomMarin, #numVoilier) et VOILIER (<u>numVoilier</u>, nomVoilier, #numMarin).</li>
      </ul>
      <p><b>Exemple 2, (0,1)–(1,1)</b> : un appartement a au plus une place de parking. La table côté <b>(1,1)</b> reçoit la clé.</p>
      <div class="box def">APPARTEMENT (<u>numAppartement</u>, superficie)<br>PLACE_PARKING (<u>numPlace</u>, Etage, #numAppartement)</div>
      <p><b>Exemple 3, (0,1)–(1,1)</b> : un micro est équipé de 0 ou 1 CD-ROM, un CD-ROM équipe exactement un micro.</p>
      <div class="fig" data-fig="micro1" data-mld="1"></div>
      <div class="box trap">À proscrire : échanger les clés (MICRO reçoit #Num_Cd ET CD_ROM reçoit #Num_Micro). Un micro sans CD-ROM aurait une clé étrangère <b>nulle</b>, ce qu'il faut éviter au maximum.</div>
      <p><b>Exemple 4, (0,1)–(0,1)</b> : certains CD-ROM n'équipent aucun micro. Comme une clé étrangère ne doit pas être nulle, on crée une <b>table intermédiaire</b> EQUIPER. MICRO et CD_ROM ne reçoivent rien.</p>
      <div class="fig" data-fig="micro2" data-mld="1"></div>
      <p><b>Exemple 5</b> : une activité culturelle a au plus un animateur, un animateur anime au plus une activité. Même cas (0,1)–(0,1) : ANIMER (<u>#numAnimateur, #idActivite</u>).</p>
      <div class="box trap">Les outils de génie logiciel font souvent l'échange de clés entre tables : il faut le corriger à la main.</div>

      <h3 id="b2-ex">7. Exemples 6 à 9 du prof</h3>
      <p><b>Exemple 6, (1,1)–(1,n)</b> : un livre est écrit par un et un seul auteur.</p>
      <div class="fig" data-fig="auteur" data-mld="1"></div>
      <p><b>Exemple 7, (0,1)–(0,n)</b> : une équipe est dirigée par un responsable, ou par personne.</p>
      <ul>
        <li>Solution 1 (la plus utilisée) : EQUIPE (<u>Nom_Equipe</u>, #Num_Responsable). Le cas « personne » est rare (démission), on accepte un NULL passager.</li>
        <li>Solution 2 (la plus propre) : EQUIPE (<u>Nom_Equipe</u>), RESPONSABLE (<u>Num_Responsable</u>, Nom), DIRIGER (<u>#Nom_Equipe, #Num_Responsable</u>).</li>
      </ul>
      <p><b>Exemple 8, (x,n)–(x,n)</b> : un micro est équipé de plusieurs types de périphériques, un type équipe plusieurs micros.</p>
      <div class="fig" data-fig="periph" data-mld="1"></div>
      <p><b>Exemple 9, n:n porteuse</b> : la propriété portée devient un attribut de la table issue de l'association.</p>
      <div class="fig" data-fig="lignecde" data-mld="1"></div>

      <h3 id="b2-refl">8. Associations réflexives</h3>
      <p>Elles suivent les règles 2 ou 3 selon les cardinalités, mais la même clé apparaît <b>deux fois</b> dans la même table : il faut donner deux noms <b>différents et parlants</b>, souvent tirés des rôles.</p>
      <p><b>Hiérarchique</b> (un maximum à 1) : un salarié a pour chef 0 ou 1 salarié, un salarié est chef de 0 à n salariés. Règle 2, la table reçoit une deuxième fois le matricule, renommé.</p>
      <div class="fig" data-fig="chef" data-mld="1"></div>
      <p><b>Non hiérarchique</b> (n des deux côtés) : une pièce entre dans la composition de plusieurs pièces et peut être composée de plusieurs pièces (une voiture = 4 roues, une roue = un pneu + une jante). Règle 3 :</p>
      <div class="fig" data-fig="compo" data-mld="1"></div>
      <p>Autre exemple du cours : PERSONNE (<u>Num_Personne</u>, Nom_Personne) et EPOUSER (<u>#Num_Mari, #Num_Femme</u>, Date_Mariage).</p>

      <h3 id="b2-tern">9. Associations ternaires et n-aires</h3>
      <p>L'association devient une table qui reçoit en clés étrangères les clés primaires des trois tables ; ensemble, elles forment la clé primaire. Les données portées deviennent des attributs. Une écurie engage un ou plusieurs pilotes pour une ou plusieurs saisons, avec un salaire négocié à chaque engagement :</p>
      <div class="fig" data-fig="engager" data-mld="1"></div>
      <p>Même chose pour une association à 4 entités ou plus : toute association non hiérarchique (n:n ou de dimension &gt; 2) devient une table dont la clé est la juxtaposition des identifiants.</p>

      <h3 id="b2-exc">10. Exception et spécialisation</h3>
      <p><b>Entité réduite à son identifiant</b> (DATE, SAISON…) : elle ne devient pas forcément une table, son identifiant passe comme attribut dans les tables liées.</p>
      <p><b>Généralisation / spécialisation</b> : une PERSONNE peut être un ÉTUDIANT ou un ENSEIGNANT. Trois stratégies : une table unique avec un attribut type ; une table par sous-type qui reprend les colonnes communes ; ou, le plus courant, <b>table mère + tables filles</b> :</p>
      <div class="box def">PERSONNE (<u>id_personne</u>, nom, prenom, date_naissance)<br>ETUDIANT (<u>#id_personne</u>, numero_etudiant, filiere)<br>ENSEIGNANT (<u>#id_personne</u>, matricule, discipline)</div>

      <h3 id="b2-recap">11. Récapitulatif à connaître par cœur</h3>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Cardinalités</th><th>Type</th><th>Traduction</th></tr>
        <tr><td>(0,n)/(1,n) — (1,1)</td><td class="f">1:n</td><td style="text-align:left">#clé dans la table côté (1,1)</td></tr>
        <tr><td>(0,n)/(1,n) — (0,1)</td><td class="f">1:n</td><td style="text-align:left">#clé dans la table côté (0,1) (ou table d'association si on refuse les NULL)</td></tr>
        <tr><td>(x,n) — (x,n)</td><td class="f">n:n</td><td style="text-align:left">nouvelle table, clé = les deux #clés</td></tr>
        <tr><td>porteuse de données</td><td>—</td><td style="text-align:left">toujours une table, les données deviennent des attributs</td></tr>
        <tr><td>(1,1) — (0,1)</td><td class="f">1:1</td><td style="text-align:left">#clé dans la table côté (1,1)</td></tr>
        <tr><td>(0,1) — (0,1)</td><td class="f">1:1</td><td style="text-align:left">table intermédiaire</td></tr>
        <tr><td>(1,1) — (1,1)</td><td class="f">1:1</td><td style="text-align:left">#clé dans la table la plus importante (ou fusion)</td></tr>
        <tr><td>ternaire, n-aire</td><td>—</td><td style="text-align:left">table, clé = tous les identifiants</td></tr>
        <tr><td>réflexive</td><td>—</td><td style="text-align:left">règle 2 ou 3, on renomme la clé dupliquée</td></tr>
      </table></div>
      <div class="mod" data-mod="mld"></div>

      <h3 id="b2-complet">12. L'exemple complet (camping) en 6 étapes</h3>
      <ol>
        <li><b>Dictionnaire</b> : NumClient, Nom, Prénom, Adresse, CodePostal, Ville, CodeArticle, Désignation, PrixUnitaire, Qté, Date (+ TotalLigne, TotalFacture calculés).</li>
        <li><b>DF</b> : NumClient → (Nom, Prénom, Adresse, CodePostal, Ville) ; CodeArticle → (Désignation, PrixUnitaire) ; (NumClient, CodeArticle, Date) → Qté.</li>
        <li><b>GDF</b> : trois sources simples, une source composée.</li>
        <li><b>MCD</b> : CLIENT, ARTICLE, DATE et l'association ternaire Acheter (Qté).</li>
        <li><b>MLD</b> et <b>6. schéma relationnel</b> :</li>
      </ol>
      <div class="box def">Clients (<u>NumClient</u>, NomClient, PrenomClient, AdresseClient, CPClient, VilleClient)<br>Article (<u>CodeArticle</u>, Designation, PrixUnitaire)<br>Acheter (<u>#NumClient, #CodeArticle, Date</u>, Qté)</div>
      <p class="hint">DATE n'a que son identifiant : elle ne devient pas une table, la date reste dans Acheter.</p>
      <div class="box method">Annale 2025-26 : Client (<u>IDClient</u>, NomClient, EmailClient) ; Produit (<u>IDProduit</u>, NomProduit, PrixProduit) ; Employe (<u>IDEmpl</u>, NomEmpl, PrenomEmpl) ; Commande (<u>IDCommande</u>, DateCommande, Statut, #IDEmpl, #IDClient) ; LigneCommande (<u>#IDCommande, #IDProduit</u>, Qte).</div>
      <div class="pdfl"><span class="eyebrow">Diaporama du prof</span><a href="https://arche.univ-lorraine.fr/pluginfile.php/4688255/mod_resource/content/2/2%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf" target="_blank" rel="noopener">Cours 2 (PDF, 76 diapos)</a></div>
    </article>
  </section>

  <section id="tab-b3" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="b3" data-noedit>
      <h2>R1.05 · Corrections des TD, TP et annales</h2>
      <p class="muted">Les 9 exercices corrigés, les uns sous les autres. Le sommaire à gauche te dit où tu en es. Dans chaque MCD, clique sur une association pour la lecture des cardinalités et la règle appliquée. Pour t'entraîner, cache les cardinalités et retrouve-les avant de regarder.</p>
      <div class="pdfl"><span class="eyebrow">Tous les PDF du cours sur Arche</span><a href="https://arche.univ-lorraine.fr/pluginfile.php/4674686/mod_resource/content/2/Cours%201%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf" target="_blank" rel="noopener">Cours 1</a><a href="https://arche.univ-lorraine.fr/pluginfile.php/4688255/mod_resource/content/2/2%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf" target="_blank" rel="noopener">Cours 2 (MCD → MLD)</a><a href="https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170811" target="_blank" rel="noopener">Sujet TD</a><a href="https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170813" target="_blank" rel="noopener">Corrigé TD1</a><a href="https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170814" target="_blank" rel="noopener">Corrigé TD2</a><a href="https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170824" target="_blank" rel="noopener">Sujets TP</a><a href="https://arche.univ-lorraine.fr/mod/resource/view.php?id=2249861" target="_blank" rel="noopener">Corrigé exercices TP</a><a href="https://arche.univ-lorraine.fr/pluginfile.php/5121470/mod_resource/content/1/Eval%20Mi%20Parcours%202025-2026-Correction%20-%20bareme.pdf" target="_blank" rel="noopener">Annale 2025-26</a><a href="https://arche.univ-lorraine.fr/pluginfile.php/5121471/mod_resource/content/1/Eval%20Mi%20Parcours-Correction24-25.pdf" target="_blank" rel="noopener">Annale 2024-25</a></div>
      <div class="mod" data-mod="mcdcorrall"></div>
    </article>
  </section>

  <section id="tab-bx" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r105">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. PDF à imprimer : dossier <b>Cours/BUT1/Fiches de révision</b> (« R1.05 Bases de données - fiche de révision.pdf »).</span></div>
    <div class="fiche-host" data-subj="r105"><div class="pfwrap">
<section class="pf r105">
  <div class="pf-head"><div class="pf-code">R1.05</div><div class="pf-title"><b>Du besoin au schéma relationnel</b><span>MCD · cardinalités · dépendances fonctionnelles · passage au MLD</span></div><div class="pf-exam">Mi-parcours<br>mar. 20/10 · 8 h<br>sans document</div></div>
  <div class="pf-key"><ol><li>Une phrase par côté → une cardinalité (min, max)</li><li>Les deux <u>maximums</u> → le type 1:1, 1:n, n:n</li><li>1:n → #clé étrangère dans la table côté <b style="color:#fff">1</b></li><li>n:n ou porteuse de données → nouvelle table</li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Vocabulaire du MCD</h4>
        <dl class="dl">
          <dt>Entité</dt><dd>type d'objet du système (CLIENT, COMMANDE…), devient une table.</dd>
          <dt>Propriété</dt><dd>info élémentaire, au singulier, une seule fois dans tout le MCD (Date_cde ≠ Date_fact).</dd>
          <dt>Identifiant</dt><dd><u>souligné</u>, en tête, unique, ne change jamais → clé primaire.</dd>
          <dt>Association</dt><dd>lien nommé par un <b>verbe</b> (Passer, Traiter), peut porter des propriétés (Qté).</dd>
          <dt>Cardinalité</dt><dd>(min, max) : combien de fois une occurrence participe. Min 0 ou 1, max 1 ou n.</dd>
          <dt>DF</dt><dd><span class="m">A → B</span> : connaître A donne une seule valeur de B.</dd>
          <dt>GDF</dt><dd>graphe des DF : source simple = entité, source composée = association.</dd>
        </dl>
      </div>
      <div class="pf-blk tint"><h4><i>2</i>Lire une cardinalité</h4>
        <svg viewBox="0 0 360 92" aria-label="Client 1,n Passer 1,1 Commande">
          <rect x="4" y="22" width="92" height="44" rx="5" fill="#fff" stroke="#111" stroke-width="1.4"/><text x="50" y="40" text-anchor="middle" font-size="11" font-weight="700">CLIENT</text><text x="50" y="57" text-anchor="middle" font-size="9.5" text-decoration="underline">IDClient</text>
          <ellipse cx="180" cy="44" rx="42" ry="19" fill="#e6f4f2" stroke="#111" stroke-width="1.4"/><text x="180" y="48" text-anchor="middle" font-size="11" font-weight="700">Passer</text>
          <rect x="264" y="22" width="92" height="44" rx="5" fill="#fff" stroke="#111" stroke-width="1.4"/><text x="310" y="40" text-anchor="middle" font-size="11" font-weight="700">COMMANDE</text><text x="310" y="57" text-anchor="middle" font-size="9.5" text-decoration="underline">IDCommande</text>
          <line x1="96" y1="44" x2="138" y2="44" stroke="#111" stroke-width="1.4"/><line x1="222" y1="44" x2="264" y2="44" stroke="#111" stroke-width="1.4"/>
          <text x="117" y="36" text-anchor="middle" font-size="11" font-weight="700" fill="#0f766e">1,n</text><text x="243" y="36" text-anchor="middle" font-size="11" font-weight="700" fill="#0f766e">1,1</text>
          <text x="4" y="86" font-size="9" fill="#5b5b5b">« Un client passe 1 ou plusieurs cdes »</text><text x="356" y="86" text-anchor="end" font-size="9" fill="#5b5b5b">« Une cde : 1 et 1 seul client »</text>
        </svg>
        <p>On se place sur l'entité : « <b>un</b> X participe combien de fois, au minimum et au maximum ? ». La cardinalité s'écrit <b>à côté de l'entité dont parle la phrase</b>.</p>
        <table><tr><th>Phrase</th><th>Card.</th></tr><tr><td>zéro ou un / au plus un</td><td class="m">0,1</td></tr><tr><td>un et un seul / exactement un</td><td class="m">1,1</td></tr><tr><td>aucun ou plusieurs / peut ne pas</td><td class="m">0,n</td></tr><tr><td>un ou plusieurs / au moins un</td><td class="m">1,n</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>3</i>Le type d'association</h4>
        <table><tr><th>Maximums</th><th>Type</th><th>Exemple</th></tr><tr><td>1 et n</td><td class="m">1:n</td><td>Client — Passer — Commande</td></tr><tr><td>n et n</td><td class="m">n:n</td><td>Commande — Contenir(Qté) — Produit</td></tr><tr><td>1 et 1</td><td class="m">1:1</td><td>Marin — Piloter — Voilier</td></tr></table>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>4</i>Passage au MLD : les 3 règles</h4>
        <p><b>Règle 1</b> · chaque entité → une table. Identifiant → <u>clé primaire</u>, propriétés → attributs.</p>
        <p><b>Règle 2</b> · association <b>1:n</b> → la table côté <b>(1,1) ou (0,1)</b> reçoit l'identifiant de l'autre en <b>#clé étrangère</b>. L'association disparaît.</p>
        <pre>MERE   (<u>NumMere</u>, NomMere)
ENFANT (<u>NumEnfant</u>, Prenom, #NumMere)</pre>
        <p style="margin-top:1.4mm"><b>Règle 3</b> · association <b>n:n</b> ou <b>porteuse</b> → nouvelle table, clé primaire = les #clés étrangères concaténées, + ses propriétés.</p>
        <pre>LIGNE_CDE (<u>#NumCde, #RefProduit</u>, Qte)</pre>
      </div>
      <div class="pf-blk"><h4><i>5</i>Cas particuliers</h4>
        <ul>
          <li><b>(0,1)–(1,1)</b> : la clé va côté (1,1) → CD_ROM(…, #Num_Micro).</li>
          <li><b>(0,1)–(0,1)</b> : table d'association pour éviter une clé étrangère nulle → EQUIPER(<u>#Num_Micro, #Num_Cd</u>).</li>
          <li><b>Ternaire</b> : table à 3 clés → ENGAGER(<u>#Saison, #Ecurie, #Pilote</u>, Salaire).</li>
          <li><b>Réflexive</b> : renommer la 2ᵉ clé → SALARIE(<u>Matricule</u>, Nom, #Matricule_chef).</li>
          <li><b>Entité réduite à son identifiant</b> (DATE, DIPLOME) : le prof la garde en table, Date(<u>Date</u>).</li>
          <li><b>Héritage</b> : table mère + filles → ETUDIANT(<u>#IdPersonne</u>, NumEtu).</li>
        </ul>
      </div>
      <div class="pf-blk"><h4><i>6</i>Contrainte d'intégrité référentielle</h4>
        <p>Une #clé étrangère doit toujours référencer une clé primaire <b>existante</b>. Si on supprime la mère : interdire, supprimer en CASCADE, ou mettre NULL.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges qui coûtent des points</h4>
        <ul>
          <li>Le type se lit sur les <b>maximums</b>, pas les minimums.</li>
          <li>La #clé va du côté du <b>1</b>, jamais du côté n.</li>
          <li>Pas de donnée <b>calculée</b> (total = prix × qté).</li>
          <li>Deux propriétés de même nom → les renommer.</li>
          <li>Oublier la propriété portée (Qté, Date) dans la table d'association.</li>
          <li>Oublier de préciser ce que référence chaque clé étrangère.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.05 Bases de données</span><span>1 / 3</span></div>
</section>

<section class="pf r105">
  <div class="pf-head"><div class="pf-code">R1.05</div><div class="pf-title"><b>Méthode du devoir + exemple corrigé</b><span>Comme dans les annales 2024-25 et 2025-26 (14 pts + 7 à 9 pts)</span></div><div class="pf-exam">Rédige chaque<br>étape</div></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>La méthode en 6 étapes</h4>
        <ol>
          <li><b>Repérer</b> les entités (noms) et leurs propriétés dans l'énoncé.</li>
          <li><b>Dictionnaire des données</b> : nom, format, longueur, élémentaire ou calculée.</li>
          <li><b>DF</b> : <span class="m">NumClient → Nom, Mail</span> ; sources composées → <span class="m">(NumCde, RefProd) → Qte</span>.</li>
          <li><b>Associations</b> : un verbe + une phrase par côté → cardinalités → type.</li>
          <li><b>MCD</b> : rectangles (entités, identifiant souligné), ellipses (associations), cardinalités sur les traits.</li>
          <li><b>MLD / schéma relationnel</b> : règles 1, 2, 3, clés primaires soulignées, #clés étrangères, et ce qu'elles référencent.</li>
        </ol>
      </div>
      <div class="pf-blk"><h4><i>2</i>Rédaction type (copier ce modèle)</h4>
        <p>« Entre <b>Client</b> et <b>Commande</b> il y a une association <b>Passer</b>. Un client peut passer une ou plusieurs commandes, donc la cardinalité entre Client et Passer est <b>1,n</b>. Une commande est passée par un et un seul client, donc la cardinalité entre Commande et Passer est <b>1,1</b>. Les cardinalités maximales sont 1 et n : association de type <b>1:n</b>. »</p>
        <p>Puis : « Commande reçoit la clé étrangère <b>#IDClient</b>, qui référence la clé primaire IDClient de la table Client. »</p>
      </div>
      <div class="pf-blk"><h4><i>3</i>Barème des annales</h4>
        <table><tr><th>Question</th><th>Points</th></tr><tr><td>Associations + cardinalités + types</td><td>7</td></tr><tr><td>MCD dessiné</td><td>2,5</td></tr><tr><td>Tables du MLD</td><td>2,5</td></tr><tr><td>Schéma relationnel (clés)</td><td>2</td></tr><tr><td>Exercice 2 (MCD donné → schéma)</td><td>7 à 9</td></tr></table>
        <p style="margin-top:1mm" class="m">Chaque phrase de cardinalité ≈ 0,5 pt : ne saute aucune étape.</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk pfex"><h4><i>✓</i>Annale 2025-26 · Commerce en ligne</h4>
        <svg viewBox="0 0 360 236" aria-label="MCD commerce en ligne">
          <line x1="78" y1="40" x2="142" y2="40" stroke="#111" stroke-width="1.3"/><line x1="218" y1="40" x2="282" y2="40" stroke="#111" stroke-width="1.3"/><line x1="180" y1="66" x2="180" y2="174" stroke="#111" stroke-width="1.3"/>
          <rect x="2" y="14" width="76" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="40" y="28" text-anchor="middle" font-weight="700" font-size="10">CLIENT</text><line x1="2" y1="33" x2="78" y2="33" stroke="#111"/><text x="40" y="45" text-anchor="middle" text-decoration="underline" font-size="9">IDClient</text><text x="40" y="58" text-anchor="middle" fill="#555" font-size="8.5">Nom, Email</text><rect x="142" y="14" width="76" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="180" y="28" text-anchor="middle" font-weight="700" font-size="10">COMMANDE</text><line x1="142" y1="33" x2="218" y2="33" stroke="#111"/><text x="180" y="45" text-anchor="middle" text-decoration="underline" font-size="9">IDCommande</text><text x="180" y="58" text-anchor="middle" fill="#555" font-size="8.5">Date, Statut</text><rect x="282" y="14" width="76" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="320" y="28" text-anchor="middle" font-weight="700" font-size="10">PRODUIT</text><line x1="282" y1="33" x2="358" y2="33" stroke="#111"/><text x="320" y="45" text-anchor="middle" text-decoration="underline" font-size="9">IDProduit</text><text x="320" y="58" text-anchor="middle" fill="#555" font-size="8.5">Nom, Prix</text><rect x="142" y="174" width="76" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="180" y="188" text-anchor="middle" font-weight="700" font-size="10">EMPLOYE</text><line x1="142" y1="193" x2="218" y2="193" stroke="#111"/><text x="180" y="205" text-anchor="middle" text-decoration="underline" font-size="9">IDEmpl</text><text x="180" y="218" text-anchor="middle" fill="#555" font-size="8.5">Nom, Prénom</text>
          <ellipse cx="110" cy="40" rx="27" ry="11" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="110" y="43.5" text-anchor="middle" font-weight="700" font-size="9.5">Passer</text>
          <ellipse cx="250" cy="40" rx="27" ry="15" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="250" y="38" text-anchor="middle" font-weight="700" font-size="9.5">Contenir</text><text x="250" y="49" text-anchor="middle" fill="#555" font-size="8.5">Qte</text>
          <ellipse cx="180" cy="120" rx="28" ry="11" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="180" y="123.5" text-anchor="middle" font-weight="700" font-size="9.5">Traiter</text>
          <g fill="#0f766e" font-weight="700" font-size="10.5" font-family="JetBrains Mono,monospace"><text x="81" y="64">1,n</text><text x="139" y="64" text-anchor="end">1,1</text><text x="221" y="68">1,n</text><text x="279" y="68" text-anchor="end">0,n</text><text x="186" y="82">1,1</text><text x="186" y="166">1,n</text></g>
        </svg>
        <pre>Client   (<u>IDClient</u>, NomClient, EmailClient)
Produit  (<u>IDProduit</u>, NomProduit, PrixProduit)
Employe  (<u>IDEmpl</u>, NomEmpl, PrenomEmpl)
Commande (<u>IDCommande</u>, DateCommande, Statut,
          #IDEmpl, #IDClient)
LigneCommande (<u>#IDCommande, #IDProduit</u>, Qte)</pre>
        <p style="margin-top:1mm">Passer et Traiter sont <b>1:n</b> → #clés dans Commande. Contenir est <b>n:n</b> et porte Qte → table LigneCommande.</p>
      </div>
      <div class="pf-blk"><h4><i>4</i>Exercice 2 type : MCD donné → schéma</h4>
        <pre>Medecin      (<u>Matricule</u>, Nom)
Patient      (<u>NoSS</u>, Nom)
Medicament   (<u>Code</u>, Libelle)
Consultation (<u>NoConsult</u>, Date, #Matricule, #NoSS)
Prescription (<u>#Code, #NoConsult</u>, NbPrises)</pre>
        <p style="margin-top:1mm">Indique toujours : la clé primaire, les clés étrangères (et vers quelle table), les contraintes éventuelles.</p>
      </div>
      <div class="pf-blk tint"><h4><i>✎</i>Checklist avant de rendre</h4>
        <ul><li>Chaque association a un verbe et 2 phrases → 2 cardinalités.</li><li>Chaque table a sa clé primaire soulignée.</li><li>Chaque 1:n a sa #clé du côté 1.</li><li>Chaque n:n / porteuse a sa table avec clé composée.</li><li>Stylo bleu ou noir, pas de couleur ni de crayon.</li></ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.05 Bases de données</span><span>2 / 3</span></div>
</section>
<section class="pf r105">
  <div class="pf-head"><div class="pf-code">R1.05</div><div class="pf-title"><b>Exercice type contrôle, corrigé</b><span>Fais-le d'abord seul (30 min), puis compare avec la correction</span></div><div class="pf-exam">Barème<br>sur 14 pts</div></div>
  <div class="pf-blk"><h4><i>✎</i>Énoncé : location de vélos</h4>
    <p>Une association de location de vélos veut une base de données. Pour chaque <b>adhérent</b> on enregistre son nom, son prénom et son mail ; chaque adhérent souscrit <b>un et un seul</b> type d'abonnement (libellé, prix), et un type d'abonnement peut être souscrit par <b>aucun ou plusieurs</b> adhérents. Chaque <b>vélo</b> (modèle, date d'achat) est rattaché à <b>une et une seule</b> station (adresse, capacité) ; une station accueille <b>aucun ou plusieurs</b> vélos. Un adhérent loue <b>aucun ou plusieurs</b> vélos, un vélo est loué par <b>aucun ou plusieurs</b> adhérents ; pour chaque location on note la date et la durée. Enfin, un adhérent peut être parrainé par <b>au plus un</b> autre adhérent, et un adhérent peut parrainer <b>aucun ou plusieurs</b> adhérents.</p>
    <p><b>1.</b> Décrire les associations, leurs cardinalités et leur type (6 pts). <b>2.</b> Produire le MCD (3 pts). <b>3.</b> Donner le schéma relationnel avec clés primaires et étrangères (5 pts).</p>
  </div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Associations et cardinalités</h4>
        <ul>
          <li><b>Souscrire</b> (Adhérent – Type_Abo). Un adhérent souscrit un et un seul type → <b>1,1</b> côté Adhérent. Un type est souscrit par aucun ou plusieurs adhérents → <b>0,n</b> côté Type_Abo. Maximums 1 et n : <b>1:n</b>.</li>
          <li><b>Rattacher</b> (Vélo – Station). Un vélo est rattaché à une et une seule station → <b>1,1</b>. Une station accueille aucun ou plusieurs vélos → <b>0,n</b>. Type <b>1:n</b>.</li>
          <li><b>Louer</b> (Adhérent – Vélo), porteuse de DateLoc et Duree. Un adhérent loue aucun ou plusieurs vélos → <b>0,n</b>. Un vélo est loué par aucun ou plusieurs adhérents → <b>0,n</b>. Type <b>n:n</b>.</li>
          <li><b>Parrainer</b> (Adhérent – Adhérent), réflexive. Un adhérent est parrainé par au plus un adhérent → <b>0,1</b> (rôle filleul). Un adhérent parraine aucun ou plusieurs adhérents → <b>0,n</b> (rôle parrain). Type <b>1:n</b>.</li>
        </ul>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Les points qui piègent</h4>
        <ul><li>Louer porte des données : c'est une table, même si on oublie le n:n.</li><li>Parrainer est réflexive : on renomme la clé étrangère (<span class="m">#NumAdh_parrain</span>).</li><li>Si un adhérent peut louer plusieurs fois le même vélo, la date doit faire partie de la clé (entité DATE, comme Commander dans le cours).</li></ul>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk pfex"><h4><i>2</i>MCD</h4>
        <svg viewBox="0 0 360 250" aria-label="MCD location de vélos">
          <g stroke="#111" stroke-width="1.3"><line x1="80" y1="44" x2="150" y2="44"/><line x1="236" y1="44" x2="290" y2="44"/><line x1="44" y1="74" x2="44" y2="176"/><line x1="324" y1="74" x2="324" y2="176"/><path d="M80 58 Q 150 64 156 100" fill="none"/><path d="M66 74 Q 84 122 122 116" fill="none"/></g>
          <g font-size="9"><rect x="4" y="14" width="76" height="60" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="42" y="28" text-anchor="middle" font-weight="700" font-size="10">ADHERENT</text><line x1="4" y1="33" x2="80" y2="33" stroke="#111"/><text x="42" y="45" text-anchor="middle" text-decoration="underline">NumAdh</text><text x="42" y="57" text-anchor="middle" fill="#555">Nom, Prenom</text><text x="42" y="68" text-anchor="middle" fill="#555">Mail</text>
          <rect x="290" y="14" width="68" height="60" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="324" y="28" text-anchor="middle" font-weight="700" font-size="10">VELO</text><line x1="290" y1="33" x2="358" y2="33" stroke="#111"/><text x="324" y="45" text-anchor="middle" text-decoration="underline">NumVelo</text><text x="324" y="57" text-anchor="middle" fill="#555">Modele</text><text x="324" y="68" text-anchor="middle" fill="#555">DateAchat</text>
          <rect x="4" y="176" width="80" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="44" y="190" text-anchor="middle" font-weight="700" font-size="10">TYPE_ABO</text><line x1="4" y1="195" x2="84" y2="195" stroke="#111"/><text x="44" y="207" text-anchor="middle" text-decoration="underline">CodeAbo</text><text x="44" y="219" text-anchor="middle" fill="#555">Libelle, Prix</text>
          <rect x="284" y="176" width="74" height="52" rx="4" fill="#fff" stroke="#111" stroke-width="1.3"/><text x="321" y="190" text-anchor="middle" font-weight="700" font-size="10">STATION</text><line x1="284" y1="195" x2="358" y2="195" stroke="#111"/><text x="321" y="207" text-anchor="middle" text-decoration="underline">CodeStation</text><text x="321" y="219" text-anchor="middle" fill="#555">Adresse, Capacite</text></g>
          <g font-size="9.5" font-weight="700"><ellipse cx="193" cy="44" rx="43" ry="16" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="193" y="42" text-anchor="middle">Louer</text><text x="193" y="53" text-anchor="middle" font-weight="400" fill="#555" font-size="8.5">DateLoc, Duree</text>
          <ellipse cx="44" cy="125" rx="32" ry="11" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="44" y="128.5" text-anchor="middle">Souscrire</text>
          <ellipse cx="324" cy="125" rx="31" ry="11" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="324" y="128.5" text-anchor="middle">Rattacher</text>
          <ellipse cx="156" cy="112" rx="34" ry="11" fill="#fff4d6" stroke="#111" stroke-width="1.3"/><text x="156" y="115.5" text-anchor="middle">Parrainer</text></g>
          <g fill="#0f766e" font-weight="700" font-size="10" font-family="JetBrains Mono,monospace"><text x="84" y="38">0,n</text><text x="286" y="38" text-anchor="end">0,n</text><text x="50" y="90">1,1</text><text x="50" y="170">0,n</text><text x="330" y="90">1,1</text><text x="330" y="170">0,n</text><text x="96" y="76" font-size="8.5">0,n parrain</text><text x="80" y="106" font-size="8.5">0,1 filleul</text></g>
        </svg>
      </div>
      <div class="pf-blk tint"><h4><i>3</i>Schéma relationnel</h4>
<pre>TYPE_ABO (<u>CodeAbo</u>, Libelle, Prix)
STATION  (<u>CodeStation</u>, Adresse, Capacite)
ADHERENT (<u>NumAdh</u>, Nom, Prenom, Mail,
          #CodeAbo, #NumAdh_parrain)
VELO     (<u>NumVelo</u>, Modele, DateAchat, #CodeStation)
LOUER    (<u>#NumAdh, #NumVelo</u>, DateLoc, Duree)</pre>
        <ul style="margin-top:1.2mm"><li><span class="m">#CodeAbo</span> référence TYPE_ABO, <span class="m">#NumAdh_parrain</span> référence ADHERENT.</li><li><span class="m">#CodeStation</span> dans VELO référence STATION.</li><li>Dans LOUER, <span class="m">#NumAdh</span> et <span class="m">#NumVelo</span> référencent ADHERENT et VELO.</li></ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.05 Bases de données</span><span>3 / 3</span></div>
</section>

</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r105"></div>
  </section>

  <!-- ============ R1.07 : matrices ============ -->
  <section id="tab-m1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="m1">
      <h2>R1.07 · Chapitre 1 : calcul matriciel</h2>
      <p class="muted">Programme du <b>TD noté S1.02 du jeudi 26/11, 13 h 30</b> : calcul matriciel, en binôme, <b>sans document ni calculatrice</b>. Entraîne-toi à faire les produits à la main. (Ce chapitre a aussi servi au devoir 1 du 20/10.)</p>
      <h3>1. Vocabulaire</h3>
      <ul>
        <li>Matrice de <b>type (n, p)</b> : n lignes, p colonnes. Coefficient a<sub>ij</sub> : ligne i, colonne j.</li>
        <li>Vecteur ligne (1, p), vecteur colonne (n, 1), matrice <b>carrée</b> (n, n), matrice nulle 0, <b>identité</b> I<sub>n</sub> (des 1 sur la diagonale).</li>
        <li>Égalité : même type et mêmes coefficients un par un.</li>
      </ul>
      <div class="box exm">A = <span class="mx"><table><tr><td>2</td><td>−1</td><td>3</td></tr><tr><td>0</td><td>4</td><td>1</td></tr></table></span> est de type <b>(2, 3)</b> : 2 lignes, 3 colonnes. a<sub>12</sub> = −1 (ligne 1, colonne 2), a<sub>23</sub> = 1. I<sub>3</sub> = <span class="mx"><table><tr><td>1</td><td>0</td><td>0</td></tr><tr><td>0</td><td>1</td><td>0</td></tr><tr><td>0</td><td>0</td><td>1</td></tr></table></span></div>
      <h3>2. Somme et multiplication par un réel</h3>
      <p>Même type obligatoire. On additionne case par case : (a<sub>ij</sub> + b<sub>ij</sub>). λ·A multiplie chaque coefficient. A + B = B + A, A + 0 = A, opposée −A.</p>
      <div class="box exm">A = <span class="mx"><table><tr><td>1</td><td>2</td></tr><tr><td>3</td><td>4</td></tr></table></span>, B = <span class="mx"><table><tr><td>0</td><td>−1</td></tr><tr><td>5</td><td>2</td></tr></table></span> → A + B = <span class="mx"><table><tr><td>1</td><td>1</td></tr><tr><td>8</td><td>6</td></tr></table></span> et 3A = <span class="mx"><table><tr><td>3</td><td>6</td></tr><tr><td>9</td><td>12</td></tr></table></span>. En revanche A + <span class="mx"><table><tr><td>1</td><td>2</td><td>3</td></tr></table></span> est impossible : types différents.</div>
      <h3>3. Produit A × B</h3>
      <div class="box def">Possible seulement si <b>nb de colonnes de A = nb de lignes de B</b> : (n, <b>p</b>) × (<b>p</b>, q) = (n, q).<br>c<sub>ij</sub> = ligne i de A « × » colonne j de B = a<sub>i1</sub>b<sub>1j</sub> + a<sub>i2</sub>b<sub>2j</sub> + … + a<sub>ip</sub>b<sub>pj</sub>.</div>
      <div class="mod" data-mod="falk"></div>
      <div class="mod" data-mod="matprod"></div>
      <ul>
        <li>Associatif : A(BC) = (AB)C. Distributif. I<sub>n</sub>A = A I<sub>p</sub> = A.</li>
      </ul>
      <div class="box trap">Pas commutatif : en général AB ≠ BA. AB peut valoir 0 avec A ≠ 0 et B ≠ 0. AB = AC n'implique pas B = C. (AB)<sup>p</sup> ≠ A<sup>p</sup>B<sup>p</sup>.</div>
      <div class="box exm">A = <span class="mx"><table><tr><td>1</td><td>2</td></tr><tr><td>3</td><td>4</td></tr></table></span>, B = <span class="mx"><table><tr><td>2</td><td>0</td></tr><tr><td>1</td><td>3</td></tr></table></span>. c<sub>11</sub> = 1×2 + 2×1 = 4, c<sub>12</sub> = 1×0 + 2×3 = 6, c<sub>21</sub> = 3×2 + 4×1 = 10, c<sub>22</sub> = 3×0 + 4×3 = 12, donc AB = <span class="mx"><table><tr><td>4</td><td>6</td></tr><tr><td>10</td><td>12</td></tr></table></span>.<br>Mais BA = <span class="mx"><table><tr><td>2</td><td>4</td></tr><tr><td>10</td><td>14</td></tr></table></span> : AB ≠ BA. Et <span class="mx"><table><tr><td>1</td><td>1</td></tr><tr><td>2</td><td>2</td></tr></table></span> × <span class="mx"><table><tr><td>1</td><td>−1</td></tr><tr><td>−1</td><td>1</td></tr></table></span> = <span class="mx"><table><tr><td>0</td><td>0</td></tr><tr><td>0</td><td>0</td></tr></table></span> alors qu'aucune des deux n'est nulle.<br>Types : (2, 3) × (3, 4) donne (2, 4) ; (2, 3) × (2, 3) est impossible (3 ≠ 2).</div>
      <h3>4. Puissances</h3>
      <p>Pour A carrée : A<sup>0</sup> = I<sub>n</sub>, A<sup>p</sup> = A × A × … × A (p facteurs). A<sup>p</sup>A<sup>r</sup> = A<sup>p+r</sup>, (A<sup>p</sup>)<sup>r</sup> = A<sup>pr</sup>.</p>
      <div class="box exm">A = <span class="mx"><table><tr><td>1</td><td>1</td></tr><tr><td>0</td><td>1</td></tr></table></span> → A<sup>2</sup> = A × A = <span class="mx"><table><tr><td>1</td><td>2</td></tr><tr><td>0</td><td>1</td></tr></table></span>, A<sup>3</sup> = A<sup>2</sup> × A = <span class="mx"><table><tr><td>1</td><td>3</td></tr><tr><td>0</td><td>1</td></tr></table></span>. On devine A<sup>n</sup> = <span class="mx"><table><tr><td>1</td><td>n</td></tr><tr><td>0</td><td>1</td></tr></table></span> (à démontrer par récurrence si on le demande).</div>
      <div class="mod" data-mod="matpow"></div>
      <h3>5. Inverse</h3>
      <ul>
        <li>A carrée est <b>inversible</b> s'il existe B avec AB = BA = I<sub>n</sub>. On note B = A<sup>−1</sup>. Il suffit de vérifier AB = I<sub>n</sub>.</li>
        <li>Pour montrer qu'une matrice n'est <b>pas</b> inversible : on pose B inconnue, on écrit AB = I et on trouve un système impossible (ou une ligne de AB forcément nulle, comme au DM1).</li>
        <li><b>(AB)<sup>−1</sup> = B<sup>−1</sup>A<sup>−1</sup></b> (l'ordre s'inverse).</li>
      </ul>
      <div class="box exm"><b>Vérifier un inverse</b> : A = <span class="mx"><table><tr><td>2</td><td>1</td></tr><tr><td>5</td><td>3</td></tr></table></span>, B = <span class="mx"><table><tr><td>3</td><td>−1</td></tr><tr><td>−5</td><td>2</td></tr></table></span>. AB : 2×3 + 1×(−5) = 1, 2×(−1) + 1×2 = 0, 5×3 + 3×(−5) = 0, 5×(−1) + 3×2 = 1, donc AB = I<sub>2</sub> et A<sup>−1</sup> = B.<br><b>Montrer qu'elle n'est pas inversible</b> : A = <span class="mx"><table><tr><td>1</td><td>2</td></tr><tr><td>2</td><td>4</td></tr></table></span>. On pose B = <span class="mx"><table><tr><td>x</td><td>y</td></tr><tr><td>z</td><td>t</td></tr></table></span>. AB = I donne x + 2z = 1 et 2x + 4z = 0. Or 2x + 4z = 2(x + 2z) = 2 ≠ 0 : le système est impossible, donc A n'est pas inversible.</div>
      <div class="mod" data-mod="matinv"></div>
      <h3>6. Transposée et matrices particulières</h3>
      <ul>
        <li><sup>t</sup>A : la ligne i devient la colonne i. Type (n, p) → (p, n). <sup>t</sup>(A + B) = <sup>t</sup>A + <sup>t</sup>B, <b><sup>t</sup>(AB) = <sup>t</sup>B <sup>t</sup>A</b>.</li>
        <li><b>Symétrique</b> : A = <sup>t</sup>A (forcément carrée). A + <sup>t</sup>A est toujours symétrique.</li>
        <li><b>Diagonale</b> : zéros hors de la diagonale. <b>Triangulaire supérieure</b> : zéros sous la diagonale. <b>Inférieure</b> : zéros au-dessus.</li>
      </ul>
      <div class="box exm">A = <span class="mx"><table><tr><td>1</td><td>2</td><td>3</td></tr><tr><td>4</td><td>5</td><td>6</td></tr></table></span> de type (2, 3) → <sup>t</sup>A = <span class="mx"><table><tr><td>1</td><td>4</td></tr><tr><td>2</td><td>5</td></tr><tr><td>3</td><td>6</td></tr></table></span> de type (3, 2).<br>Symétrique : <span class="mx"><table><tr><td>1</td><td>7</td></tr><tr><td>7</td><td>3</td></tr></table></span>. Avec M = <span class="mx"><table><tr><td>1</td><td>2</td></tr><tr><td>0</td><td>3</td></tr></table></span> : M + <sup>t</sup>M = <span class="mx"><table><tr><td>2</td><td>2</td></tr><tr><td>2</td><td>6</td></tr></table></span>, bien symétrique.<br>Diagonale <span class="mx"><table><tr><td>2</td><td>0</td><td>0</td></tr><tr><td>0</td><td>5</td><td>0</td></tr><tr><td>0</td><td>0</td><td>−1</td></tr></table></span>, triangulaire supérieure <span class="mx"><table><tr><td>1</td><td>4</td><td>2</td></tr><tr><td>0</td><td>3</td><td>5</td></tr><tr><td>0</td><td>0</td><td>6</td></tr></table></span>, triangulaire inférieure <span class="mx"><table><tr><td>1</td><td>0</td><td>0</td></tr><tr><td>4</td><td>3</td><td>0</td></tr><tr><td>2</td><td>5</td><td>6</td></tr></table></span>.</div>
      <div class="mod" data-mod="mattrans"></div>
    </article>
  </section>

  <section id="tab-m2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="m2">
      <h2>R1.07 · Chapitre 2 : méthode du pivot</h2>
      <h3>1. Systèmes linéaires</h3>
      <ul>
        <li>n équations, p inconnues. <b>Homogène</b> si tous les seconds membres sont nuls.</li>
        <li><b>Opérations élémentaires</b> (donnent un système équivalent) : échanger deux équations, multiplier une équation par une constante non nulle, ajouter à une équation une combinaison des autres (L<sub>2</sub> ← L<sub>2</sub> − 2L<sub>1</sub>).</li>
      </ul>
      <div class="box exm"><div class="sys"><div>x + y = 3   L1</div><div>2x − y = 0   L2</div></div>L<sub>2</sub> ← L<sub>2</sub> − 2L<sub>1</sub> : −3y = −6, donc y = 2, puis x = 3 − 2 = 1. S = {(1, 2)}.<br>Homogène : <div class="sys"><div>x + 2y = 0</div><div>3x − y = 0</div></div>(0, 0) est toujours solution d'un système homogène.</div>
      <h3>2. Échelonner</h3>
      <p>Un système est <b>échelonné</b> si le nombre de coefficients nuls en début d'équation augmente strictement d'une ligne à la suivante.</p>
      <ol>
        <li>Mettre en L<sub>1</sub> une équation dont le premier coefficient est non nul : c'est le <b>pivot</b>.</li>
        <li>Éliminer x des lignes suivantes avec L<sub>1</sub> (L<sub>i</sub> ← L<sub>i</sub> − k L<sub>1</sub>, ou a·L<sub>i</sub> − b·L<sub>1</sub> pour éviter les fractions).</li>
        <li>Recommencer avec y à partir de L<sub>2</sub>, etc. <b>Toujours écrire l'opération à droite de chaque ligne.</b></li>
      </ol>
      <div class="mod" data-mod="pivot"></div>
      <div class="box exm"><div class="sys"><div>x + y + z = 6   L1</div><div>2x + 3y + z = 11   L2</div><div>x − y + 2z = 5   L3</div></div><div class="sys"><div>x + y + z = 6</div><div>y − z = −1   L2 ← L2 − 2L1</div><div>−2y + z = −1   L3 ← L3 − L1</div></div><div class="sys"><div>x + y + z = 6</div><div>y − z = −1</div><div>−z = −3   L3 ← L3 + 2L2</div></div>Échelonné : 3 pivots pour 3 inconnues. On remonte : z = 3, y = −1 + z = 2, x = 6 − y − z = 1. S = {(1, 2, 3)}. Vérification dans L2 : 2 + 6 + 3 = 11.</div>
      <h3>3. Lire le résultat</h3>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>Ce qu'on obtient</th><th>Conclusion</th></tr>
        <tr><td style="text-align:left">une ligne <span class="f">0 = b</span> avec b ≠ 0</td><td style="text-align:left">système <b>incompatible</b>, S = ∅</td></tr>
        <tr><td style="text-align:left">une ligne <span class="f">0 = 0</span></td><td style="text-align:left">on la supprime</td></tr>
        <tr><td style="text-align:left">autant de pivots que d'inconnues</td><td style="text-align:left"><b>solution unique</b>, on remonte de la dernière ligne à la première</td></tr>
        <tr><td style="text-align:left">moins de pivots que d'inconnues</td><td style="text-align:left"><b>infinité</b> de solutions, à k paramètres (k = nb d'inconnues secondaires)</td></tr>
      </table></div>
      <ul>
        <li><b>Inconnues principales</b> : celles en tête des équations échelonnées (sous un pivot). <b>Secondaires</b> (variables libres) : toutes les autres, elles servent de paramètres.</li>
        <li>On passe les secondaires à droite, on exprime les principales en fonction d'elles, et on ne leur donne <b>aucune valeur</b>. Ex. S = {(4 − 2y + w, y, 1 + 2w, w) / y, w ∈ ℝ}.</li>
      </ul>
      <div class="box exm"><b>Incompatible</b> : <div class="sys"><div>x + y = 1</div><div>2x + 2y = 3</div></div>L<sub>2</sub> ← L<sub>2</sub> − 2L<sub>1</sub> donne 0 = 1 : impossible, S = ∅.<br><b>Infinité</b> : <div class="sys"><div>x + 2y − z = 1</div><div>y + z = 2</div></div>2 pivots (x, y) pour 3 inconnues : z est secondaire. y = 2 − z, puis x = 1 − 2y + z = 1 − 4 + 2z + z = −3 + 3z. S = {(−3 + 3z, 2 − z, z) / z ∈ ℝ}.</div>
      <h3>4. Forme matricielle</h3>
      <p>Le système s'écrit <b>AX = B</b> : A matrice des coefficients, X vecteur colonne des inconnues, B vecteur des seconds membres. On échelonne la <b>matrice augmentée</b> (A | B) avec les mêmes opérations sur les lignes entières.</p>
      <div class="box trap">Gauss-Jordan (calcul de A<sup>−1</sup> avec (A | I<sub>n</sub>)) n'était pas au devoir 1 du 20/10, mais il est <b>au programme du devoir 2 du 8/12</b> : voir l'onglet « Cours : Gauss-Jordan ».</div>
      <div class="box exm">Le système de la partie 2 s'écrit AX = B avec A = <span class="mx"><table><tr><td>1</td><td>1</td><td>1</td></tr><tr><td>2</td><td>3</td><td>1</td></tr><tr><td>1</td><td>−1</td><td>2</td></tr></table></span>, X = <span class="mx"><table><tr><td>x</td></tr><tr><td>y</td></tr><tr><td>z</td></tr></table></span>, B = <span class="mx"><table><tr><td>6</td></tr><tr><td>11</td></tr><tr><td>5</td></tr></table></span>.<br>Matrice augmentée (A | B) = <span class="mx"><table><tr><td>1</td><td>1</td><td>1</td><td>| 6</td></tr><tr><td>2</td><td>3</td><td>1</td><td>| 11</td></tr><tr><td>1</td><td>−1</td><td>2</td><td>| 5</td></tr></table></span>, qu'on échelonne avec les mêmes opérations que le système.</div>
    </article>
  </section>

  <!-- ============ R1.07 : GAUSS-JORDAN ============ -->
  <section id="tab-mg" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="mg">
      <h2>R1.07 · Gauss-Jordan : inverser une matrice</h2>
      <p class="muted">Devoir 2 mardi 8/12, 8 h 30 : Gauss-Jordan (chap. 2 § 4), dérivation (chap. 3), polynômes (chap. 4). Seule la calculatrice est autorisée.</p>
      <h3>1. Rappels de la méthode du pivot</h3>
      <ul>
        <li>Opérations élémentaires (on obtient un système équivalent) : échanger deux lignes ; multiplier une ligne par une constante <b>non nulle</b> ; ajouter à une ligne une combinaison des autres (<span class="f">L2 ← L2 − 2L1</span>).</li>
        <li>Échelonné : le nombre de zéros en début de ligne augmente <b>strictement</b> d'une ligne à l'autre. Les pivots sont les premiers coefficients non nuls.</li>
        <li>Trois issues : une ligne « 0 = b » avec b ≠ 0 → S = ∅ ; autant d'inconnues principales que d'inconnues → solution unique ; des inconnues secondaires → infinité de solutions (on ne fixe jamais la valeur d'un paramètre). Une ligne « 0 = 0 » se supprime.</li>
        <li>Écriture matricielle : le système s'écrit <b>AX = B</b>. Si A est inversible, <b>X = A<sup>−1</sup>B</b>.</li>
      </ul>
      <div class="box exm">x + 2y − z = 1, 2x + 3y + z = 2, x + 4y − 6z = 2 : L2 ← L2 − 2L1, L3 ← L3 − L1, puis L3 ← L3 + 2L2 → z = 1, y = 3, x = −4 : S = {(−4, 3, 1)}.<br>2x + y + z = 3, x − y + 3z = 8, x + 2y − z = −3 → S = {(1, −1, 2)}. Avec en plus x + y + 2z = −1 : 1 − 1 + 4 = 4 ≠ −1, donc plus de solution.</div>

      <h3>2. La méthode de Gauss-Jordan</h3>
      <div class="box def">On écrit le bloc <b>(A | I<sub>n</sub>)</b> et on fait des opérations sur les <b>lignes entières</b> (les deux blocs) jusqu'à obtenir <b>(I<sub>n</sub> | A<sup>−1</sup>)</b>.</div>
      <ol>
        <li><b>Descente</b> : des 0 sous la diagonale (comme le pivot).</li>
        <li><b>Remontée</b> : des 0 au-dessus des pivots, en partant de la dernière ligne.</li>
        <li><b>Normalisation</b> : diviser chaque ligne par son pivot pour avoir des 1 (souvent oublié).</li>
      </ol>
      <ul>
        <li>Si une ligne du bloc de gauche devient entièrement nulle, A <b>n'est pas inversible</b> : on s'arrête.</li>
        <li>Une matrice avec une ligne (ou une colonne) nulle n'est jamais inversible.</li>
        <li>Toujours <b>vérifier A × A<sup>−1</sup> = I</b> à la calculatrice.</li>
      </ul>
      <div class="box method">Cas 2 × 2 : A = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(2,auto)"><span>a</span><span>b</span><span>c</span><span>d</span></span></span> est inversible ⇔ <b>ad − bc ≠ 0</b>, et A<sup>−1</sup> = 1/(ad − bc) × <span class="mx"><span class="mxg" style="grid-template-columns:repeat(2,auto)"><span>d</span><span>−b</span><span>−c</span><span>a</span></span></span>. Exemple (DM1) : <span class="mx"><span class="mxg" style="grid-template-columns:repeat(2,auto)"><span>3</span><span>5</span><span>4</span><span>7</span></span></span> : ad − bc = 21 − 20 = 1, donc A<sup>−1</sup> = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(2,auto)"><span>7</span><span>−5</span><span>−4</span><span>3</span></span></span>.</div>

      <h3>3. Exemple 4.1 du cours</h3>
      <p>A = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>2</span><span>1</span><span>4</span><span>−1</span><span>0</span><span>1</span><span>4</span><span>1</span><span>3</span></span></span></p>
      <div class="gj-step"><span class="gj-op">Départ (A | I₃)</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>2</span><span>1</span><span>4</span><span class="sep">1</span><span>0</span><span>0</span><span>−1</span><span>0</span><span>1</span><span class="sep">0</span><span>1</span><span>0</span><span>4</span><span>1</span><span>3</span><span class="sep">0</span><span>0</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L2 ← 2L2 + L1 ; L3 ← L3 − 2L1</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>2</span><span>1</span><span>4</span><span class="sep">1</span><span>0</span><span>0</span><span>0</span><span>1</span><span>6</span><span class="sep">1</span><span>2</span><span>0</span><span>0</span><span>−1</span><span>−5</span><span class="sep">−2</span><span>0</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L3 ← L3 + L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>2</span><span>1</span><span>4</span><span class="sep">1</span><span>0</span><span>0</span><span>0</span><span>1</span><span>6</span><span class="sep">1</span><span>2</span><span>0</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>2</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L1 ← L1 − 4L3 ; L2 ← L2 − 6L3</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>2</span><span>1</span><span>0</span><span class="sep">5</span><span>−8</span><span>−4</span><span>0</span><span>1</span><span>0</span><span class="sep">7</span><span>−10</span><span>−6</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>2</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L1 ← L1 − L2, puis L1 ← ½ L1</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>0</span><span class="sep">−1</span><span>1</span><span>1</span><span>0</span><span>1</span><span>0</span><span class="sep">7</span><span>−10</span><span>−6</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>2</span><span>1</span></span></span></div></div>
      <div class="box exm">A<sup>−1</sup> = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>−1</span><span>1</span><span>1</span><span>7</span><span>−10</span><span>−6</span><span>−1</span><span>2</span><span>1</span></span></span> (vérifié : A × A<sup>−1</sup> = I<sub>3</sub>).</div>

      <h3>4. DM1 : inverser puis résoudre</h3>
      <p>x − 2y − 5z = 24, x − y − 3z = 16, −y − z = 3, donc A = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>1</span><span>−2</span><span>−5</span><span>1</span><span>−1</span><span>−3</span><span>0</span><span>−1</span><span>−1</span></span></span>.</p>
      <div class="gj-step"><span class="gj-op">L2 ← L2 − L1</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>−2</span><span>−5</span><span class="sep">1</span><span>0</span><span>0</span><span>0</span><span>1</span><span>2</span><span class="sep">−1</span><span>1</span><span>0</span><span>0</span><span>−1</span><span>−1</span><span class="sep">0</span><span>0</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L1 ← L1 + 2L2 ; L3 ← L3 + L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>−1</span><span class="sep">−1</span><span>2</span><span>0</span><span>0</span><span>1</span><span>2</span><span class="sep">−1</span><span>1</span><span>0</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>1</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L1 ← L1 + L3 ; L2 ← L2 − 2L3</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>0</span><span class="sep">−2</span><span>3</span><span>1</span><span>0</span><span>1</span><span>0</span><span class="sep">1</span><span>−1</span><span>−2</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>1</span><span>1</span></span></span></div></div>
      <div class="box exm">A<sup>−1</sup> = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>−2</span><span>3</span><span>1</span><span>1</span><span>−1</span><span>−2</span><span>−1</span><span>1</span><span>1</span></span></span>, puis X = A<sup>−1</sup>B = A<sup>−1</sup> × <span class="mx"><span class="mxg" style="grid-template-columns:repeat(1,auto)"><span>24</span><span>16</span><span>3</span></span></span> = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(1,auto)"><span>3</span><span>2</span><span>−5</span></span></span> : S = {(3, 2, −5)}.</div>

      <h3>5. Feuille 2, exercice 7 (pivot non égal à 1)</h3>
      <p>B = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>1</span><span>0</span><span>1</span><span>0</span><span>1</span><span>1</span><span>1</span><span>1</span><span>0</span></span></span></p>
      <div class="gj-step"><span class="gj-op">L3 ← L3 − L1, puis L3 ← L3 − L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>1</span><span class="sep">1</span><span>0</span><span>0</span><span>0</span><span>1</span><span>1</span><span class="sep">0</span><span>1</span><span>0</span><span>0</span><span>0</span><span>−2</span><span class="sep">−1</span><span>−1</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L3 ← −½ L3</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>1</span><span class="sep">1</span><span>0</span><span>0</span><span>0</span><span>1</span><span>1</span><span class="sep">0</span><span>1</span><span>0</span><span>0</span><span>0</span><span>1</span><span class="sep">½</span><span>½</span><span>−½</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L1 ← L1 − L3 ; L2 ← L2 − L3</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>0</span><span class="sep">½</span><span>−½</span><span>½</span><span>0</span><span>1</span><span>0</span><span class="sep">−½</span><span>½</span><span>½</span><span>0</span><span>0</span><span>1</span><span class="sep">½</span><span>½</span><span>−½</span></span></span></div></div>
      <div class="box exm">B<sup>−1</sup> = ½ × <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>1</span><span>−1</span><span>1</span><span>−1</span><span>1</span><span>1</span><span>1</span><span>1</span><span>−1</span></span></span> (det B = −2).</div>

      <h3>6. Feuille 2, exercice 8 : échange de lignes et P(A) = 0</h3>
      <p>A = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>2</span><span>5</span><span>3</span><span>1</span><span>3</span><span>2</span><span>1</span><span>2</span><span>2</span></span></span></p>
      <div class="gj-step"><span class="gj-op">L1 ↔ L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>3</span><span>2</span><span class="sep">0</span><span>1</span><span>0</span><span>2</span><span>5</span><span>3</span><span class="sep">1</span><span>0</span><span>0</span><span>1</span><span>2</span><span>2</span><span class="sep">0</span><span>0</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L2 ← L2 − 2L1 ; L3 ← L3 − L1</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>3</span><span>2</span><span class="sep">0</span><span>1</span><span>0</span><span>0</span><span>−1</span><span>−1</span><span class="sep">1</span><span>−2</span><span>0</span><span>0</span><span>−1</span><span>0</span><span class="sep">0</span><span>−1</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L3 ← L3 − L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>3</span><span>2</span><span class="sep">0</span><span>1</span><span>0</span><span>0</span><span>−1</span><span>−1</span><span class="sep">1</span><span>−2</span><span>0</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>1</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L2 ← L2 + L3 ; L1 ← L1 − 2L3</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>3</span><span>0</span><span class="sep">2</span><span>−1</span><span>−2</span><span>0</span><span>−1</span><span>0</span><span class="sep">0</span><span>−1</span><span>1</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>1</span><span>1</span></span></span></div></div>
      <div class="gj-step"><span class="gj-op">L2 ← −L2 ; L1 ← L1 − 3L2</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(6,auto)"><span>1</span><span>0</span><span>0</span><span class="sep">2</span><span>−4</span><span>1</span><span>0</span><span>1</span><span>0</span><span class="sep">0</span><span>1</span><span>−1</span><span>0</span><span>0</span><span>1</span><span class="sep">−1</span><span>1</span><span>1</span></span></span></div></div>
      <div class="box exm">A<sup>−1</sup> = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>2</span><span>−4</span><span>1</span><span>0</span><span>1</span><span>−1</span><span>−1</span><span>1</span><span>1</span></span></span> (det A = 1).<br>Autre méthode : A² = <span class="mx"><span class="mxg" style="grid-template-columns:repeat(3,auto)"><span>12</span><span>31</span><span>22</span><span>7</span><span>18</span><span>13</span><span>6</span><span>15</span><span>11</span></span></span> et A³ − 7A² + 4A − I<sub>3</sub> = 0. Donc A(A² − 7A + 4I<sub>3</sub>) = I<sub>3</sub> et <b>A<sup>−1</sup> = A² − 7A + 4I<sub>3</sub></b>.</div>
      <div class="box method">Si P(A) = 0 avec un terme constant non nul : on isole I, on factorise par A, et ce qui reste est A<sup>−1</sup>.</div>
      <div class="box trap">Q3 (ateliers) : les données sont données <b>par article</b>, pas par atelier. Le système 2x + y + z = 48, 5x + 3y + 2z = 118, 3x + 2y + 2z = 81 a pour matrice <b>ᵗA</b>, et (ᵗA)<sup>−1</sup> = ᵗ(A<sup>−1</sup>). Solution x = 15, y = 7, z = 11. Coût : 25 × 48 + 22 × 118 + 23 × 81 = 5 659 €.</div>
      <div class="box trap">Pièges : appliquer l'opération au seul bloc de gauche ; oublier la normalisation ; multiplier une ligne par 0 ; écrire « L2 ← L1 + … » (qui remplace L2 par autre chose) au lieu de « L2 ← 2L2 + L1 » ; erreurs de signe dans la remontée.</div>
    </article>
  </section>
  <!-- ============ R1.07 : DÉRIVATION ============ -->
  <section id="tab-md" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="md">
      <h2>R1.07 · Chapitre 3 : dérivation</h2>
      <p class="muted">Devoir 2 mardi 8/12 : calculatrice seule autorisée. Toujours commencer par l'ensemble de définition.</p>
      <h3>1. Nombre dérivé et tangente</h3>
      <ul>
        <li>f est dérivable en x₀ si le taux d'accroissement <span class="f">(f(x) − f(x₀)) / (x − x₀)</span> a une <b>limite finie</b> quand x → x₀ : c'est f′(x₀).</li>
        <li>f′(x₀) est le coefficient directeur de la tangente en (x₀, f(x₀)).</li>
        <li>Dérivable ⇒ continue. La réciproque est fausse : |x| est continue en 0 mais pas dérivable (taux → 1 à droite, −1 à gauche) ; √x n'est pas dérivable en 0 (taux → +∞).</li>
      </ul>
      <div class="box def">Tangente en x₀ : <b>y = f(x₀) + f′(x₀)(x − x₀)</b>.</div>
      <h3>2. Dérivées usuelles</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>f(x)</th><th>f′(x)</th><th>f(x)</th><th>f′(x)</th></tr>
        <tr><td>a (constante)</td><td>0</td><td>xⁿ</td><td>n xⁿ⁻¹</td></tr>
        <tr><td>1/x</td><td>−1/x²</td><td>1/xⁿ</td><td>−n/xⁿ⁺¹</td></tr>
        <tr><td>√x</td><td>1/(2√x), x &gt; 0</td><td>xʳ</td><td>r xʳ⁻¹</td></tr>
        <tr><td>sin x</td><td>cos x</td><td>cos x</td><td>−sin x</td></tr>
        <tr><td>tan x</td><td>1/cos²x = 1 + tan²x</td><td>eˣ</td><td>eˣ</td></tr>
        <tr><td>ln x</td><td>1/x, x &gt; 0</td><td>ln|x|</td><td>1/x, x ≠ 0</td></tr>
      </table></div>
      <h3>3. Règles de calcul</h3>
      <div class="formula-list">
        <span class="f">(uv)′</span><span>u′v + uv′</span>
        <span class="f">(u/v)′</span><span>(u′v − uv′) / v² (l'ordre compte)</span>
        <span class="f">(1/u)′</span><span>−u′ / u²</span>
        <span class="f">(g∘f)′(x)</span><span>g′(f(x)) × f′(x)</span>
        <span class="f">(uʳ)′</span><span>r uʳ⁻¹ u′</span>
        <span class="f">(√u)′</span><span>u′ / (2√u)</span>
        <span class="f">(eᵘ)′</span><span>u′ eᵘ</span>
        <span class="f">(ln|u|)′</span><span>u′ / u</span>
        <span class="f">(sin u)′, (cos u)′</span><span>u′ cos u, −u′ sin u</span>
      </div>
      <p>Astuce : aᵘ = e^(u ln a) et xˣ = e^(x ln x), donc (xˣ)′ = (ln x + 1)xˣ.</p>
      <div class="box trap">Ensemble de définition : sous une racine ≥ 0 (dérivable seulement si &gt; 0) ; dénominateur ≠ 0 ; dans ln : &gt; 0. Ne pas oublier u′ dans une composée (eᵘ, uⁿ, √u).</div>
      <h3>4. Variations et extremums</h3>
      <ul>
        <li>Sur un intervalle : f′ ≥ 0 ⇔ f croissante ; f′ ≤ 0 ⇔ f décroissante ; f′ = 0 ⇔ f constante.</li>
        <li>Extremum local en x₀ (intervalle ouvert) ⇒ f′(x₀) = 0. La réciproque est fausse : x³ en 0. Il faut que <b>f′ change de signe</b> : + puis − → maximum local ; − puis + → minimum local.</li>
        <li>Local ≠ global : regarder les limites aux bornes avant de dire « global ».</li>
        <li>Signe de ax² + bx + c : signe de a à l'extérieur des racines, signe contraire entre. Δ = b² − 4ac, x = (−b ± √Δ)/(2a).</li>
        <li>À l'infini, un polynôme se comporte comme son terme de plus haut degré, une fraction rationnelle comme le quotient des termes de plus haut degré.</li>
      </ul>
      <div class="box exm">f(x) = x³ − 3x : f′(x) = 3(x − 1)(x + 1). Maximum local f(−1) = 2, minimum local f(1) = −2, pas d'extremum global (limites −∞ et +∞).<br>f(x) = x³ − 6x² + 9x + 1 : f′(x) = 3(x − 1)(x − 3). Croissante sur ]−∞, 1], décroissante sur [1, 3], croissante sur [3, +∞[. Max local f(1) = 5, min local f(3) = 1, non globaux.</div>
      <h3>5. Exercices corrigés (feuille 3)</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Fonction</th><th>Domaine</th><th>Dérivée</th></tr>
        <tr><td>x³ + 3x² − 4x + 11</td><td>ℝ</td><td>3x² + 6x − 4</td></tr>
        <tr><td>√(3x − 2)</td><td>[2/3, +∞[, dérivable sur ]2/3, +∞[</td><td>3 / (2√(3x − 2))</td></tr>
        <tr><td>√(3x² − 4x + 1)</td><td>]−∞, 1/3] ∪ [1, +∞[</td><td>(3x − 2) / √(3x² − 4x + 1)</td></tr>
        <tr><td>12 / (4x² − 9)</td><td>ℝ \ {−3/2, 3/2}</td><td>−96x / (4x² − 9)²</td></tr>
        <tr><td>(4x + 1) / (2x − 5)</td><td>ℝ \ {5/2}</td><td>−22 / (2x − 5)²</td></tr>
        <tr><td>(x² + 3x + 1) / (2x − 5)</td><td>ℝ \ {5/2}</td><td>(2x² − 10x − 17) / (2x − 5)²</td></tr>
        <tr><td>((2x − 1) / (x + 1))³</td><td>ℝ \ {−1}</td><td>9(2x − 1)² / (x + 1)⁴</td></tr>
        <tr><td>(√x + 1)²</td><td>[0, +∞[, dérivable sur ]0, +∞[</td><td>1 + 1/√x</td></tr>
        <tr><td>e^(5x²)</td><td>ℝ</td><td>10x e^(5x²)</td></tr>
        <tr><td>e^(sin x)</td><td>ℝ</td><td>cos x e^(sin x)</td></tr>
      </table></div>
      <div class="box exm">Ex. 5 : f(x) = (x² − 12x + 27)/(x² − 4x + 5), D = ℝ (x² − 4x + 5 = (x − 2)² + 1 &gt; 0). f′(x) = 4(2x² − 11x + 12)/(x² − 4x + 5)², racines 3/2 et 4. Max global f(3/2) = 9, min global f(4) = −1, asymptote y = 1. Tangente en 3 : f(3) = 0, f′(3) = −3 → <b>y = −3x + 9</b>.</div>
      <div class="box exm">Ex. 6 : U(x) = x − 10 + 900/x sur [10, 100], U′(x) = (x − 30)(x + 30)/x², minimum U(30) = 50. B(x) = x(100 − U(x)) = −x² + 110x − 900, maximum B(55) = 2 125 € : le bénéfice maximal n'est pas au coût unitaire minimal.<br>Ex. 7 et 8 (boîtes) : S(x) = 2x² + 4/x minimale en x = 1 (S = 6 dm², un cube) ; S(x) = 2x² + 32/x minimale en x = 2 (S = 24 m²).</div>
      <div class="box trap">Pièges : (u/v)′ avec le signe dans le mauvais ordre ; conclure « extremum » seulement parce que f′(x₀) = 0 ; dire « global » sans les limites ; confondre le signe de f′ (variations) et le signe de f.</div>
    </article>
  </section>

  <!-- ============ R1.07 : POLYNÔMES ============ -->
  <section id="tab-mp" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="mp">
      <h2>R1.07 · Chapitre 4 : polynômes</h2>
      <p class="muted">Degré, opérations, division euclidienne, racines et factorisation.</p>
      <h3>1. Degré et coefficients</h3>
      <ul>
        <li>P(x) = aₙxⁿ + … + a₁x + a₀ avec aₙ ≠ 0 est de degré n. Une constante non nulle est de degré 0 ; le polynôme nul est de degré −∞.</li>
        <li><b>Développer avant</b> de lire le degré : x² + 2x + 3 − (x − 1)² = 4x + 2 est de degré 1.</li>
        <li>Les coefficients déterminent le polynôme : (1, −5, 0, 4) ↔ x³ − 5x² + 4 (ne pas oublier les coefficients nuls).</li>
        <li><b>deg(P × Q) = deg P + deg Q</b> ; deg(P + Q) ≤ max(deg P, deg Q) (deux degrés 4 peuvent donner un degré 3).</li>
      </ul>
      <div class="box exm">(2 + 3x − 5x² + 2x⁴) + (−1 + 2x − 4x² + 6x³ + x⁴ + 3x⁵) = 1 + 5x − 9x² + 6x³ + 3x⁴ + 3x⁵.<br>(5 + 2x + 3x³ + 2x⁴)(1 + 7x + 5x² + 6x³) = 5 + 37x + 39x² + 43x³ + 35x⁴ + 29x⁵ + 28x⁶ + 12x⁷.</div>
      <h3>2. Division euclidienne</h3>
      <div class="box def">Pour B ≠ 0 : il existe un unique couple (Q, R) tel que <b>A = BQ + R</b> avec <b>deg R &lt; deg B</b>.</div>
      <ol>
        <li>Diviser le terme de plus haut degré de A par celui de B : premier terme de Q.</li>
        <li>Multiplier B par ce terme, soustraire de A.</li>
        <li>Recommencer avec le reste, jusqu'à deg(reste) &lt; deg B.</li>
      </ol>
      <div class="box exm">x⁵ + 2x⁴ − x³ + 22x = (x² − 4x + 1)(x³ + 6x² + 22x + 82) + 328x − 82.<br>B = 2x³ − 3x + 1 divisé par A = −x² + 3x + 5 : <b>Q = −2x − 6, R = 25x + 31</b>. A ÷ B : Q = 0, R = A (deg A &lt; deg B).</div>
      <div class="box trap">Écrire les termes nuls (0x²…) pour aligner les colonnes ; attention aux signes en soustrayant ; s'arrêter dès que deg R &lt; deg B.</div>
      <h3>3. Racines et factorisation</h3>
      <ul>
        <li>α est racine de P ⇔ P(α) = 0 ⇔ P(x) = (x − α)Q(x) avec deg Q = n − 1 ⇔ le reste de la division par x − α est nul.</li>
        <li>Pour trouver Q : division euclidienne, ou identification de (x − α)(ax² + bx + c).</li>
        <li>Un polynôme de degré n a <b>au plus n racines</b> ; un degré impair a au moins une racine réelle.</li>
        <li>Racines évidentes à tester : 0, 1, −1, 2, −2.</li>
      </ul>
      <div class="box exm">x³ − 2x² − 5x + 6 : P(1) = 0, P = (x − 1)(x² − x − 6) = (x − 1)(x + 2)(x − 3).<br>6x³ + 7x² − 9x + 2 : P(−2) = −48 + 28 + 18 + 2 = 0, P = (x + 2)(6x² − 5x + 1) = (x + 2)(2x − 1)(3x − 1), racines −2, 1/2, 1/3.<br>x⁴ − 2x³ + 2x² − 2x + 1 = (x − 1)²(x² + 1) : seule racine réelle 1 (double).</div>
      <div class="box trap">Racine α ↔ facteur (x − α), pas (x + α). Penser à refactoriser le quotient.</div>
    </article>
  </section>

  <section id="tab-mx" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r107">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. PDF à imprimer : dossier <b>Cours/BUT1/Fiches de révision</b> (« R1.07 Outils mathématiques - fiche de révision.pdf »).</span></div>
    <div class="fiche-host" data-subj="r107"><div class="pfwrap">
<section class="pf r107">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Calcul matriciel</b><span>Chapitre 1 · types, opérations, produit, puissances, inverse, transposée</span></div><div class="pf-exam">Devoir 1<br>mar. 20/10 · 10 h 10<br>chap. 1 + 2</div></div>
  <div class="pf-key"><ol><li>(n, <u>p</u>) × (<u>p</u>, q) = (n, q) : colonnes de A = lignes de B</li><li>c<sub>ij</sub> = ligne i de A « × » colonne j de B</li><li>AB ≠ BA en général, et AB = 0 n'implique pas A = 0</li><li><sup>t</sup>(AB) = <sup>t</sup>B <sup>t</sup>A et (AB)<sup>−1</sup> = B<sup>−1</sup>A<sup>−1</sup></li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Vocabulaire</h4>
        <dl class="dl">
          <dt>Type (n, p)</dt><dd>n lignes, p colonnes ; a<sub>ij</sub> = ligne i, colonne j.</dd>
          <dt>Vecteurs</dt><dd>ligne (1, p) · colonne (n, 1).</dd>
          <dt>Carrée</dt><dd>(n, n). <b>Identité</b> I<sub>n</sub> : des 1 sur la diagonale, 0 ailleurs.</dd>
          <dt>Égalité</dt><dd>même type et mêmes coefficients un à un.</dd>
        </dl>
      </div>
      <div class="pf-blk tint"><h4><i>2</i>Somme et réel</h4>
        <p>Même type obligatoire. Case par case : <span class="m">(A + B)<sub>ij</sub> = a<sub>ij</sub> + b<sub>ij</sub></span> ; <span class="m">λA</span> multiplie chaque coefficient.</p>
        <p class="m">A + B = B + A · A + 0 = A · −A opposée<br>λ(A + B) = λA + λB · (λ + μ)A = λA + μA</p>
      </div>
      <div class="pf-blk tint"><h4><i>3</i>Le produit, case par case</h4>
        <svg viewBox="0 0 360 118" aria-label="Produit ligne par colonne">
          <g font-family="JetBrains Mono,monospace" font-size="12">
          <text x="4" y="14" font-size="9" fill="#5b5b5b">A (2, 3)</text><path d="M8 22v54M120 22v54" stroke="#111" fill="none"/><rect x="11" y="24" width="106" height="22" rx="3" fill="#ecebfd"/>
          <text x="22" y="40">2</text><text x="58" y="40">−1</text><text x="98" y="40">3</text><text x="22" y="68">0</text><text x="62" y="68">4</text><text x="98" y="68">1</text>
          <text x="130" y="52" font-size="16">×</text>
          <text x="148" y="14" font-size="9" fill="#5b5b5b">B (3, 2)</text><path d="M150 22v82M218 22v82" stroke="#111" fill="none"/><rect x="153" y="24" width="28" height="78" rx="3" fill="#ecebfd"/>
          <text x="160" y="40">1</text><text x="196" y="40">2</text><text x="157" y="68">−2</text><text x="196" y="68">0</text><text x="160" y="96">3</text><text x="196" y="96">1</text>
          <text x="228" y="52" font-size="16">=</text>
          <path d="M248 22v54M330 22v54" stroke="#111" fill="none"/><rect x="251" y="24" width="34" height="22" rx="3" fill="#4338ca"/>
          <text x="256" y="40" fill="#fff" font-weight="700">13</text><text x="304" y="40">7</text><text x="256" y="68">−5</text><text x="304" y="68">1</text></g>
          <text x="4" y="114" font-size="10" fill="#4338ca" font-weight="700">c₁₁ = 2×1 + (−1)×(−2) + 3×3 = 2 + 2 + 9 = 13</text>
        </svg>
        <p>Associatif, distributif, I<sub>n</sub>A = A I<sub>p</sub> = A. On l'écrit <b>(2,3) × (3,2) = (2,2)</b> avant de calculer.</p>
      </div>
      <div class="pf-blk"><h4><i>4</i>Puissances</h4>
        <p>A carrée : <span class="m">A⁰ = I<sub>n</sub></span>, <span class="m">Aᵖ = A × A × … × A</span>, <span class="m">AᵖA<sup>r</sup> = A<sup>p+r</sup></span>, <span class="m">(Aᵖ)<sup>r</sup> = A<sup>pr</sup></span>.</p>
        <p><b>A² = A × A</b> : on fait un vrai produit, pas le carré de chaque case.</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>5</i>Matrice inverse</h4>
        <p>A carrée est <b>inversible</b> s'il existe B telle que <span class="hl">AB = BA = I<sub>n</sub></span> ; B = A<sup>−1</sup>. Il suffit de vérifier AB = I<sub>n</sub>.</p>
        <pre>M = (2 7 ; 1 4)   N = (4 −7 ; −1 2)
M × N = (1 0 ; 0 1) = I₂  donc N = M⁻¹</pre>
        <p style="margin-top:1mm"><b>Pas inversible</b> : on pose B = (x y ; z t), on écrit AB = I et on tombe sur un système impossible (ou une ligne de AB forcément nulle, DM1).</p>
      </div>
      <div class="pf-blk"><h4><i>6</i>Transposée et matrices particulières</h4>
        <p><sup>t</sup>A : la ligne i devient la colonne i ; type (n, p) → (p, n).</p>
        <pre>A = ( 1  4 ; −2  5 ; 3  6 )  →  ᵗA = ( 1 −2  3 ; 4  5  6 )</pre>
        <table style="margin-top:1.2mm"><tr><th>Nom</th><th>Condition</th></tr><tr><td>Symétrique</td><td>A = <sup>t</sup>A (forcément carrée)</td></tr><tr><td>Diagonale</td><td>0 hors de la diagonale</td></tr><tr><td>Triangulaire sup.</td><td>0 sous la diagonale</td></tr><tr><td>Triangulaire inf.</td><td>0 au-dessus</td></tr></table>
        <p style="margin-top:1mm"><b>A + <sup>t</sup>A est toujours symétrique</b> (on peut le dire sans calculer).</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4>
        <ul>
          <li>Vérifier le type avant tout produit : (2,3) × (2,3) est <b>impossible</b>.</li>
          <li>AB ≠ BA : garder l'ordre partout.</li>
          <li>AB = AC n'implique pas B = C.</li>
          <li>(AB)<sup>p</sup> ≠ A<sup>p</sup>B<sup>p</sup>.</li>
          <li>Signes : mettre les négatifs entre parenthèses, (−1)×(−2) = +2.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 Outils mathématiques</span><span>1 / 3</span></div>
</section>

<section class="pf r107">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Méthode du pivot</b><span>Chapitre 2 · systèmes linéaires, échelonnement, inconnues principales et secondaires</span></div><div class="pf-exam">Gauss-Jordan :<br>page Devoir 2</div></div>
  <div class="pf-key"><ol><li>Pivot non nul en tête de L1, puis on annule sous lui</li><li>Écrire l'opération à droite : L2 ← L2 − 2L1</li><li>0 = b (b ≠ 0) → S = ∅ · 0 = 0 → on supprime</li><li>Pivots = inconnues → solution unique ; sinon paramètres</li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Opérations élémentaires</h4>
        <p>Elles donnent un système <b>équivalent</b> (mêmes solutions) :</p>
        <ul><li>échanger deux équations ;</li><li>multiplier une équation par une constante <b>non nulle</b> ;</li><li>ajouter à une équation un multiple d'une autre : L<sub>2</sub> ← L<sub>2</sub> − 2L<sub>1</sub>, ou 2L<sub>3</sub> − L<sub>2</sub> pour éviter les fractions.</li></ul>
        <p><b>Échelonné</b> : le nombre de zéros en début de ligne augmente strictement.</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Exemple du cours (1.8), pas à pas</h4>
<pre> x + 2y −  z = 1   L1
2x + 3y +  z = 2   L2
 x + 4y − 6z = 2   L3
<b>Étape 1 : éliminer x avec L1</b>
 x + 2y −  z = 1   L1
   − y + 3z = 0   L2 ← L2 − 2L1
    2y − 5z = 1   L3 ← L3 − L1
<b>Étape 2 : éliminer y avec L2</b>
          z = 1   L3 ← L3 + 2L2
<b>Remonter</b> : z = 1 ; y = 3z = 3 ;
x = 1 − 2y + z = −4
S = {(−4, 3, 1)}</pre>
        <p style="margin-top:1mm">Vérifie dans L2 : 2(−4) + 3×3 + 1 = 2 ✓</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>2</i>Lire le système échelonné</h4>
        <table><tr><th>On obtient</th><th>Conclusion</th></tr><tr><td class="m">0 = b, b ≠ 0</td><td><b>incompatible</b>, S = ∅</td></tr><tr><td class="m">0 = 0</td><td>on supprime la ligne</td></tr><tr><td>pivots = nb d'inconnues</td><td><b>solution unique</b> (on remonte)</td></tr><tr><td>pivots &lt; nb d'inconnues</td><td><b>infinité</b> de solutions, k paramètres</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>3</i>Principales et secondaires</h4>
        <p><b>Principales</b> : les inconnues en tête des lignes (sous un pivot). <b>Secondaires</b> (libres) : toutes les autres, elles deviennent des paramètres.</p>
        <pre>x + 2y − 2z + 3w = 2
         z − 2w = 1
principales : x, z   secondaires : y, w
z = 1 + 2w ;  x = 4 − 2y + w
S = {(4 − 2y + w, y, 1 + 2w, w) / y, w ∈ ℝ}</pre>
        <p style="margin-top:1mm">On ne donne <b>aucune valeur</b> aux variables libres.</p>
      </div>
      <div class="pf-blk"><h4><i>4</i>Forme matricielle</h4>
        <p>Le système s'écrit <span class="hl">AX = B</span> : A coefficients, X inconnues, B seconds membres. On échelonne la matrice augmentée <span class="m">(A | B)</span> en appliquant chaque opération à la <b>ligne entière</b>.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4>
        <ul><li>Oublier d'écrire les opérations L<sub>i</sub> ← … (points perdus).</li><li>Fixer un paramètre à 0 alors qu'il doit rester libre.</li><li>Ne pas appliquer l'opération au second membre.</li><li>Ne pas vérifier la solution dans une équation de départ.</li></ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 Outils mathématiques</span><span>2 / 3</span></div>
</section>
<section class="pf r107">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Devoir type, corrigé</b><span>Fais chaque exercice seul, puis compare. Écris toujours tes opérations.</span></div><div class="pf-exam">Devoir 1 (20/10)<br>chap. 1 + 2</div></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Énoncé · matrices</h4><p>Soient <span class="m">A = (1 2 ; 0 −1)</span> et <span class="m">B = (3 1 ; 2 0)</span>. Calculer A + B, 2A, AB, BA, <sup>t</sup>A et A². A est-elle inversible ?</p></div>
      <div class="pf-blk pfex"><h4><i>✓</i>Correction</h4>
<pre>A + B = ( 4  3 ;  2 −1 )      2A = ( 2  4 ; 0 −2 )

AB : (2,2) × (2,2) = (2,2)
c11 = 1×3 + 2×2      = 7
c12 = 1×1 + 2×0      = 1
c21 = 0×3 + (−1)×2   = −2
c22 = 0×1 + (−1)×0   = 0      AB = ( 7  1 ; −2  0 )

BA = ( 3×1+1×0   3×2+1×(−1) ; 2×1+0×0   2×2+0×(−1) )
   = ( 3  5 ;  2  4 )         donc AB ≠ BA

ᵗA = ( 1  0 ;  2 −1 )

A² = A × A = ( 1×1+2×0   1×2+2×(−1) ; 0   (−1)×(−1) )
   = ( 1  0 ;  0  1 ) = I₂</pre>
        <p style="margin-top:1mm"><b>Conclusion</b> : A × A = I₂, donc A est inversible et <b>A<sup>−1</sup> = A</b> (il suffit de vérifier AB = I).</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Ce qui coûte des points</h4><ul><li>Écrire le type du produit avant de calculer.</li><li>A² ≠ carré de chaque case.</li><li>Oublier de conclure « AB ≠ BA, le produit n'est pas commutatif ».</li></ul></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>2</i>Énoncé · système (solution unique)</h4><p class="m">x + y + z = 6 (L1) · 2x + y − z = 1 (L2) · x − y + 2z = 5 (L3)</p></div>
      <div class="pf-blk pfex"><h4><i>✓</i>Correction</h4>
<pre>x +  y +  z =   6   L1
   − y − 3z = −11   L2 ← L2 − 2L1
   −2y +  z =  −1   L3 ← L3 − L1
          7z =  21   L3 ← L3 − 2L2
z = 3 ;  −y − 9 = −11 → y = 2 ;  x = 6 − 2 − 3 = 1
S = {(1, 2, 3)}     vérif L3 : 1 − 2 + 6 = 5 ✓</pre></div>
      <div class="pf-blk"><h4><i>3</i>Énoncé · infinité de solutions</h4><p class="m">x + 2y − z = 1 (L1) · 2x + 4y + z = 8 (L2)</p></div>
      <div class="pf-blk pfex"><h4><i>✓</i>Correction</h4>
<pre>x + 2y − z = 1   L1
         3z = 6   L2 ← L2 − 2L1
principales : x, z    secondaire : y
z = 2 ;  x = 1 − 2y + z = 3 − 2y
S = {(3 − 2y, y, 2) / y ∈ ℝ}</pre></div>
      <div class="pf-blk"><h4><i>4</i>Énoncé · aucune solution</h4><p class="m">x + y = 2 (L1) · 2x + 2y = 5 (L2)</p></div>
      <div class="pf-blk pfex"><h4><i>✓</i>Correction</h4><pre>0 = 1   L2 ← L2 − 2L1   →  incompatible, S = ∅</pre></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 Outils mathématiques</span><span>3 / 3</span></div>
</section>

<section class="pf r107" aria-label="Fiche Devoir 2">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Devoir 2 : Gauss-Jordan, dérivées, polynômes</b><span>Chap. 2 § 4, chap. 3 et chap. 4 · calculatrice seule autorisée</span></div><div class="pf-exam">Devoir 2<br>mar. 8/12 · 8 h 30</div></div>
  <div class="pf-key"><ol>
    <li>(A | I) → (I | A⁻¹), lignes <b>entières</b>.</li>
    <li>Vérifier <b>A × A⁻¹ = I</b> à la calculatrice.</li>
    <li>(u/v)′ = (u′v − uv′)/v².</li>
    <li>Division : arrêter quand <b>deg R &lt; deg B</b>.</li>
  </ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Gauss-Jordan</h4>
        <ul><li>Descente : des 0 sous la diagonale.</li><li>Remontée : des 0 au-dessus, depuis la dernière ligne.</li><li>Normalisation : diviser chaque ligne par son pivot.</li><li>Ligne nulle à gauche → pas inversible.</li></ul>
        <p>2 × 2 : ad − bc ≠ 0, A⁻¹ = 1/(ad − bc) × (d −b ; −c a).</p>
        <p class="m">(2 1 4 ; −1 0 1 ; 4 1 3)⁻¹<br>= (−1 1 1 ; 7 −10 −6 ; −1 2 1)</p>
        <p>AX = B ⇒ <b>X = A⁻¹B</b>. P(A) = 0 : isoler I, factoriser par A.</p>
      </div>
      <div class="pf-blk"><h4><i>2</i>Dérivées usuelles</h4>
        <table><tr><th>f</th><th>f′</th></tr><tr><td>xⁿ</td><td>n xⁿ⁻¹</td></tr><tr><td>1/x</td><td>−1/x²</td></tr><tr><td>√x</td><td>1/(2√x)</td></tr><tr><td>eˣ</td><td>eˣ</td></tr><tr><td>ln x</td><td>1/x</td></tr><tr><td>sin x / cos x</td><td>cos x / −sin x</td></tr></table>
      </div>
      <div class="pf-blk tint"><h4><i>3</i>Règles</h4>
        <p class="m">(uv)′ = u′v + uv′<br>(u/v)′ = (u′v − uv′)/v²<br>(uⁿ)′ = n uⁿ⁻¹ u′<br>(√u)′ = u′/(2√u)<br>(eᵘ)′ = u′eᵘ · (ln u)′ = u′/u</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>4</i>Tangente et variations</h4>
        <p><span class="hl">y = f(a) + f′(a)(x − a)</span></p>
        <p>f′ &gt; 0 croissante, f′ &lt; 0 décroissante. Extremum : f′ s'annule <b>et change de signe</b>. Global : comparer aux limites.</p>
        <p class="m">x³ − 6x² + 9x + 1 : f′ = 3(x − 1)(x − 3)<br>max local f(1) = 5, min local f(3) = 1</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Polynômes</h4>
        <p>deg(PQ) = deg P + deg Q. Développer avant de lire le degré.</p>
        <p class="m">2x³ − 3x + 1 = (−x² + 3x + 5)(−2x − 6) + 25x + 31</p>
        <p>α racine ⇔ P(α) = 0 ⇔ (x − α) divise P. Tester 0, ±1, ±2.</p>
        <p class="m">6x³ + 7x² − 9x + 2 = (x + 2)(2x − 1)(3x − 1)</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4>
        <ul><li>Opération sur le seul bloc de gauche.</li><li>Oublier la normalisation finale.</li><li>Oublier le domaine (racine, dénominateur, ln).</li><li>Oublier u′ dans une composée.</li><li>Racine α ↔ facteur (x − α).</li></ul>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 Devoir 2</span><span>Fiche Devoir 2</span></div>
</section>

</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r107"></div>
  </section>

  <!-- ============ R1.07 : fiches des tests du chapitre 0 ============ -->
  <section id="tab-c0" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r107c0">Agrandir la fiche</button><span class="hint">4 pages A4, une colonne par test Arche du chapitre 0. Rappel : 10 essais par test avant le <b>mar. 1/12 à 23 h 59</b> (c'est la moyenne qui compte).</span></div>
    <div class="fiche-host" data-subj="r107c0"><div class="pfwrap">
<section class="pf r107" aria-label="Fiche tests 1 et 2">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Fractions et puissances</b><span>Chapitre 0 · tests Arche n° 1 et n° 2</span></div><div class="pf-exam">Tests Arche<br>10 essais chacun<br>avant mar. 1/12</div></div>
  <div class="pf-key"><ol><li>+ et − : toujours le même dénominateur d'abord</li><li>Diviser par une fraction = multiplier par son inverse</li><li>Même base : on ajoute (×) ou on soustrait (÷) les exposants</li><li>a<sup>0</sup> = 1 et a<sup>−n</sup> = <span class="fr"><span>1</span><span>a<sup>n</sup></span></span></li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Les 4 opérations</h4>
        <table><tr><th>Opération</th><th>Règle</th></tr>
        <tr><td>Somme</td><td><span class="fr"><span>a</span><span>b</span></span> + <span class="fr"><span>c</span><span>d</span></span> = <span class="fr"><span>ad + bc</span><span>bd</span></span></td></tr>
        <tr><td>Produit</td><td><span class="fr"><span>a</span><span>b</span></span> × <span class="fr"><span>c</span><span>d</span></span> = <span class="fr"><span>a × c</span><span>b × d</span></span></td></tr>
        <tr><td>Quotient</td><td><span class="fr"><span>a</span><span>b</span></span> ÷ <span class="fr"><span>c</span><span>d</span></span> = <span class="fr"><span>a</span><span>b</span></span> × <span class="fr"><span>d</span><span>c</span></span></td></tr>
        <tr><td>Entier</td><td>k × <span class="fr"><span>a</span><span>b</span></span> = <span class="fr"><span>ka</span><span>b</span></span> · k = <span class="fr"><span>k</span><span>1</span></span></td></tr></table>
        <p>Pour additionner, prends le <b>plus petit dénominateur commun</b> (PPCM) : les calculs restent petits.</p>
      </div>
      <div class="pf-blk"><h4><i>2</i>Simplifier (fraction irréductible)</h4>
        <p>On décompose en produits et on barre les <b>facteurs</b> communs :</p>
        <p class="m"><span class="fr"><span>33</span><span>30</span></span> = <span class="fr"><span>3 × 11</span><span>3 × 10</span></span> = <span class="fr"><span>11</span><span>10</span></span> · <span class="fr"><span>15</span><span>6</span></span> = <span class="fr"><span>3 × 5</span><span>3 × 2</span></span> = <span class="fr"><span>5</span><span>2</span></span></p>
        <p>Signe : <span class="fr"><span>−a</span><span>b</span></span> = <span class="fr"><span>a</span><span>−b</span></span> = −<span class="fr"><span>a</span><span>b</span></span> et <span class="fr"><span>−a</span><span>−b</span></span> = <span class="fr"><span>a</span><span>b</span></span>.</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Exemples (feuille 0, ex. 3)</h4>
        <p class="m"><span class="fr"><span>2</span><span>3</span></span> + <span class="fr"><span>11</span><span>6</span></span> = <span class="fr"><span>4</span><span>6</span></span> + <span class="fr"><span>11</span><span>6</span></span> = <span class="fr"><span>15</span><span>6</span></span> = <span class="fr"><span>5</span><span>2</span></span></p>
        <p class="m">−<span class="fr"><span>4</span><span>15</span></span> + <span class="fr"><span>57</span><span>18</span></span> = −<span class="fr"><span>4</span><span>15</span></span> + <span class="fr"><span>19</span><span>6</span></span> = <span class="fr"><span>−8 + 95</span><span>30</span></span> = <span class="fr"><span>29</span><span>10</span></span></p>
        <p class="m">1 + <span class="fr"><span>1</span><span>2</span></span> + <span class="fr"><span>1</span><span>4</span></span> + <span class="fr"><span>1</span><span>8</span></span> = <span class="fr"><span>8 + 4 + 2 + 1</span><span>8</span></span> = <span class="fr"><span>15</span><span>8</span></span></p>
        <p class="m"><span class="fr"><span>2</span><span>3</span></span> ÷ <span class="fr"><span>4</span><span>9</span></span> = <span class="fr"><span>2</span><span>3</span></span> × <span class="fr"><span>9</span><span>4</span></span> = <span class="fr"><span>18</span><span>12</span></span> = <span class="fr"><span>3</span><span>2</span></span></p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li><span class="fr"><span>a</span><span>b</span></span> + <span class="fr"><span>c</span><span>d</span></span> ≠ <span class="fr"><span>a + c</span><span>b + d</span></span> : <span class="fr"><span>1</span><span>2</span></span> + <span class="fr"><span>1</span><span>2</span></span> = 1, pas <span class="fr"><span>2</span><span>4</span></span>.</li>
        <li>On ne simplifie que des facteurs : <span class="fr"><span>2 + 3</span><span>2</span></span> ≠ 3.</li>
        <li>Priorités : × et ÷ avant + et −.</li></ul></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>3</i>Règles des puissances</h4>
        <table><tr><th>Règle</th><th>Exemple</th></tr>
        <tr><td>a<sup>n</sup> × a<sup>m</sup> = a<sup>n+m</sup></td><td>2<sup>3</sup> × 2<sup>4</sup> = 2<sup>7</sup></td></tr>
        <tr><td><span class="fr"><span>a<sup>n</sup></span><span>a<sup>m</sup></span></span> = a<sup>n−m</sup></td><td><span class="fr"><span>5<sup>2</sup></span><span>5<sup>6</sup></span></span> = 5<sup>−4</sup></td></tr>
        <tr><td>(a<sup>n</sup>)<sup>m</sup> = a<sup>n×m</sup></td><td>(3<sup>2</sup>)<sup>3</sup> = 3<sup>6</sup></td></tr>
        <tr><td>(ab)<sup>n</sup> = a<sup>n</sup>b<sup>n</sup></td><td>(2x)<sup>3</sup> = 8x<sup>3</sup></td></tr>
        <tr><td>(<span class="fr"><span>a</span><span>b</span></span>)<sup>n</sup> = <span class="fr"><span>a<sup>n</sup></span><span>b<sup>n</sup></span></span></td><td>(<span class="fr"><span>2</span><span>3</span></span>)<sup>2</sup> = <span class="fr"><span>4</span><span>9</span></span></td></tr>
        <tr><td>a<sup>0</sup> = 1 · a<sup>1</sup> = a</td><td>7<sup>0</sup> = 1</td></tr>
        <tr><td>a<sup>−n</sup> = <span class="fr"><span>1</span><span>a<sup>n</sup></span></span></td><td>2<sup>−3</sup> = <span class="fr"><span>1</span><span>8</span></span></td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>4</i>Méthode : tout écrire dans la même base</h4>
        <p>4 = 2<sup>2</sup>, 8 = 2<sup>3</sup>, 16 = 2<sup>4</sup>, 9 = 3<sup>2</sup>, 27 = 3<sup>3</sup>, 25 = 5<sup>2</sup>, 0,01 = 10<sup>−2</sup>.</p>
        <p class="m"><span class="fr"><span>2<sup>3</sup> × 4<sup>2</sup></span><span>8<sup>2</sup></span></span> = <span class="fr"><span>2<sup>3</sup> × 2<sup>4</sup></span><span>2<sup>6</sup></span></span> = 2<sup>3+4−6</sup> = 2</p>
        <p class="m"><span class="fr"><span>3<sup>−2</sup> × 9<sup>3</sup></span><span>27</span></span> = <span class="fr"><span>3<sup>−2</sup> × 3<sup>6</sup></span><span>3<sup>3</sup></span></span> = 3<sup>1</sup> = 3</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Signes et puissances de 10</h4>
        <p>(−2)<sup>4</sup> = 16 mais −2<sup>4</sup> = −16 (la puissance passe avant le −).</p>
        <p>(−a)<sup>n</sup> est positif si n est pair, négatif si n est impair.</p>
        <p>10<sup>3</sup> = 1 000 · 10<sup>−2</sup> = 0,01 · 3,2 × 10<sup>4</sup> = 32 000.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>a<sup>n</sup> + a<sup>m</sup> ne se simplifie pas : 2<sup>3</sup> + 2<sup>2</sup> = 12, pas 2<sup>5</sup>.</li>
        <li>Bases différentes : 2<sup>3</sup> × 3<sup>2</sup> ≠ 6<sup>5</sup>.</li>
        <li>(a + b)<sup>2</sup> ≠ a<sup>2</sup> + b<sup>2</sup>.</li>
        <li>2<sup>−1</sup> = <span class="fr"><span>1</span><span>2</span></span> : un exposant négatif ne rend pas le nombre négatif.</li></ul></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 chapitre 0</span><span>Tests 1 et 2</span></div>
</section>

<section class="pf r107" aria-label="Fiche tests 3 et 4">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Calcul littéral et proportionnalité</b><span>Chapitre 0 · tests Arche n° 3 et n° 4</span></div><div class="pf-exam">Tests Arche<br>10 essais chacun<br>avant mar. 1/12</div></div>
  <div class="pf-key"><ol><li>(a + b)<sup>2</sup> = a<sup>2</sup> + 2ab + b<sup>2</sup> et (a − b)(a + b) = a<sup>2</sup> − b<sup>2</sup></li><li>Factoriser : facteur commun d'abord, puis identité</li><li>Proportionnel ⇔ y = k × x (droite par l'origine)</li><li>Hausse de t % = × (1 + <span class="fr"><span>t</span><span>100</span></span>), on multiplie les coefficients</li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Développer</h4>
        <p class="m">k(a + b) = ka + kb<br>(a + b)(c + d) = ac + ad + bc + bd<br>−(a − b + c) = −a + b − c</p>
        <p>Puis on <b>réduit</b> (on regroupe les termes de même puissance) et on <b>ordonne</b> du plus grand exposant au plus petit.</p>
      </div>
      <div class="pf-blk tint"><h4><i>2</i>Identités remarquables</h4>
        <p class="m">(a + b)<sup>2</sup> = a<sup>2</sup> + 2ab + b<sup>2</sup><br>(a − b)<sup>2</sup> = a<sup>2</sup> − 2ab + b<sup>2</sup><br>(a − b)(a + b) = a<sup>2</sup> − b<sup>2</sup></p>
        <p class="m">Bonus : (a + b)<sup>3</sup> = a<sup>3</sup> + 3a<sup>2</sup>b + 3ab<sup>2</sup> + b<sup>3</sup></p>
      </div>
      <div class="pf-blk"><h4><i>3</i>Factoriser, dans cet ordre</h4>
        <ol><li><b>Facteur commun</b> : 2x + 6 + 3x(x + 3) = 2(x + 3) + 3x(x + 3) = (x + 3)(3x + 2)</li>
        <li><b>Identité</b> : 81x<sup>2</sup> − 64 = (9x − 8)(9x + 8) ; 9x<sup>2</sup> + 12x + 4 = (3x + 2)<sup>2</sup></li>
        <li><b>Début de carré</b> : x<sup>2</sup> + 2x − 8 = (x + 1)<sup>2</sup> − 9 = (x − 2)(x + 4)</li></ol>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Exemples (feuille 0)</h4>
        <p class="m">(a − 1)(a + 3) = a<sup>2</sup> + 2a − 3</p>
        <p class="m">−(a + 7)(a − 11) = −a<sup>2</sup> + 4a + 77</p>
        <p class="m">(4a − 1)<sup>2</sup> − (7a + 2)<sup>2</sup> = −33a<sup>2</sup> − 36a − 3</p>
        <p class="m">2x<sup>2</sup> − 12x + 18 = 2(x − 3)<sup>2</sup></p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>Un − devant une parenthèse change <b>tous</b> les signes : −(3a − 4) = −3a + 4.</li>
        <li>(x − 3)<sup>2</sup> ≠ x<sup>2</sup> − 9.</li>
        <li>Vérifie en remplaçant x par 1 des deux côtés.</li></ul></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>4</i>Reconnaître la proportionnalité</h4>
        <p>y est proportionnel à x si <b>y = k × x</b> : on passe d'une ligne du tableau à l'autre en multipliant toujours par le même k. Le graphique est une <b>droite qui passe par l'origine</b>.</p>
        <table><tr><th>x (kg)</th><td>2</td><td>3</td><td>5</td></tr><tr><th>y (€)</th><td>3</td><td>4,5</td><td>7,5</td></tr></table>
        <p>k = <span class="fr"><span>3</span><span>2</span></span> = 1,5 € par kg. Produits en croix : <span class="fr"><span>a</span><span>b</span></span> = <span class="fr"><span>c</span><span>d</span></span> ⇔ ad = bc.</p>
      </div>
      <div class="pf-blk"><h4><i>5</i>Quatrième proportionnelle</h4>
        <p>3 kg coûtent 4,50 €. Combien coûtent 7 kg ?</p>
        <p class="m">prix = <span class="fr"><span>7 × 4,50</span><span>3</span></span> = 10,50 €</p>
      </div>
      <div class="pf-blk tint"><h4><i>6</i>Pourcentages</h4>
        <p>t % de x = x × <span class="fr"><span>t</span><span>100</span></span> · hausse de t % : × (1 + <span class="fr"><span>t</span><span>100</span></span>) · baisse : × (1 − <span class="fr"><span>t</span><span>100</span></span>).</p>
        <p class="m">+20 % puis −20 % : × 1,2 × 0,8 = × 0,96, soit −4 %</p>
        <p>Taux d'évolution = <span class="fr"><span>arrivée − départ</span><span>départ</span></span>. Valeur de départ = arrivée ÷ coefficient.</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Vitesses, échelles</h4>
        <p>v = <span class="fr"><span>d</span><span>t</span></span> · 90 km/h = 1,5 km/min = 25 m/s (÷ 3,6 pour passer en m/s).</p>
        <p>Échelle 1/25 000 : 4 cm sur la carte = 100 000 cm = 1 km.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>+20 % puis −20 % ne ramène pas au prix de départ.</li>
        <li>Taxi à 3 € + 1,50 €/km : pas proportionnel (0 km coûte déjà 3 €).</li>
        <li>Mets les grandeurs dans la même unité avant de calculer.</li></ul></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 chapitre 0</span><span>Tests 3 et 4</span></div>
</section>

<section class="pf r107" aria-label="Fiche tests 5 et 6">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>Vocabulaire et équations du 1<sup>er</sup> degré</b><span>Chapitre 0 · tests Arche n° 5 et n° 6</span></div><div class="pf-exam">Tests Arche<br>10 essais chacun<br>avant mar. 1/12</div></div>
  <div class="pf-key"><ol><li>Résoudre = donner l'ensemble S de <b>toutes</b> les solutions</li><li>⇔ : même opération des deux côtés (÷ par un nombre ≠ 0)</li><li>ax + b = 0 ⇔ x = −<span class="fr"><span>b</span><span>a</span></span> (si a ≠ 0)</li><li>Produit nul : AB = 0 ⇔ A = 0 ou B = 0</li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Le vocabulaire</h4>
        <dl class="dl">
          <dt>Équation</dt><dd>égalité qui contient une inconnue (souvent x).</dd>
          <dt>Membres</dt><dd>ce qui est à gauche et à droite du signe =.</dd>
          <dt>Solution</dt><dd>valeur de x qui rend l'égalité vraie.</dd>
          <dt>Résoudre</dt><dd>trouver toutes les solutions et les donner dans S.</dd>
          <dt>Équivalentes</dt><dd>deux équations qui ont le même S, notées ⇔.</dd>
          <dt>Inéquation</dt><dd>inégalité (&lt;, ≤, &gt;, ≥) avec une inconnue ; S est souvent un intervalle.</dd>
          <dt>Degré</dt><dd>plus grande puissance de x : 3x − 1 (1<sup>er</sup>), x<sup>2</sup> + 1 (2<sup>nd</sup>).</dd>
          <dt>Cas extrêmes</dt><dd>toujours vraie : S = ℝ ; jamais vraie : S = ∅.</dd>
        </dl>
      </div>
      <div class="pf-blk tint"><h4><i>2</i>Tester une valeur</h4>
        <p>On remplace x dans <b>chaque membre</b> et on compare.</p>
        <p class="m">x<sup>2</sup> − 2x = 3 avec x = 3 : 9 − 6 = 3 ✓<br>avec x = −1 : 1 + 2 = 3 ✓ · avec x = 0 : 0 ≠ 3 ✗</p>
      </div>
      <div class="pf-blk"><h4><i>3</i>Intervalles</h4>
        <table><tr><th>Inégalité</th><th>Intervalle</th></tr>
        <tr><td>x ≥ 2</td><td>[2 ; +∞[</td></tr><tr><td>x &lt; 5</td><td>]−∞ ; 5[</td></tr><tr><td>−1 &lt; x ≤ 3</td><td>]−1 ; 3]</td></tr></table>
        <p>Crochet tourné vers l'extérieur = valeur exclue. Toujours ouvert du côté de ∞.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>{2 ; 5} = deux nombres, [2 ; 5] = tous les nombres entre 2 et 5.</li>
        <li>On écrit « x = 2 <b>ou</b> x = −2 », jamais « et ».</li>
        <li>∈ : « appartient à » (2 ∈ [0 ; 3]).</li></ul></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>4</i>ax + b = 0</h4>
        <p>Si a ≠ 0 : x = −<span class="fr"><span>b</span><span>a</span></span>, donc S = {−<span class="fr"><span>b</span><span>a</span></span>}.</p>
        <p>Si a = 0 : 0 = −b. Si b = 0, S = ℝ ; sinon S = ∅.</p>
      </div>
      <div class="pf-blk"><h4><i>5</i>Méthode en 4 étapes</h4>
        <ol><li>Développer et réduire chaque membre.</li><li>Termes en x à gauche, nombres à droite (on ajoute ou retire la même chose des deux côtés).</li><li>Diviser par le coefficient de x (≠ 0).</li><li>Conclure : S = { … }.</li></ol>
        <p class="m">5(x − 2) = 3x + 4 ⇔ 5x − 10 = 3x + 4<br>⇔ 2x = 14 ⇔ x = 7 · S = {7}</p>
        <p class="m"><span class="fr"><span>x</span><span>2</span></span> + <span class="fr"><span>1</span><span>3</span></span> = <span class="fr"><span>x</span><span>3</span></span> ⇔ (× 6) 3x + 2 = 2x ⇔ x = −2</p>
      </div>
      <div class="pf-blk tint"><h4><i>6</i>Équation produit nul</h4>
        <p>A × B = 0 ⇔ A = 0 ou B = 0.</p>
        <p class="m">(3x + 2)(5x + 2) − (6x + 1)(3x + 2) = 0<br>⇔ (3x + 2)(−x + 1) = 0<br>⇔ x = −<span class="fr"><span>2</span><span>3</span></span> ou x = 1 · S = {−<span class="fr"><span>2</span><span>3</span></span> ; 1}</p>
        <p>Quotient : <span class="fr"><span>A</span><span>B</span></span> = 0 ⇔ A = 0 et B ≠ 0.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>Ne divise jamais par x : x<sup>2</sup> = 3x ⇔ x(x − 3) = 0 ⇔ S = {0 ; 3}.</li>
        <li>Un terme qui change de membre change de signe.</li>
        <li>Facteur commun visible ? Factorise au lieu de développer.</li></ul></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 chapitre 0</span><span>Tests 5 et 6</span></div>
</section>

<section class="pf r107" aria-label="Fiche tests 7 et 8">
  <div class="pf-head"><div class="pf-code">R1.07</div><div class="pf-title"><b>2<sup>nd</sup> degré et inéquations</b><span>Chapitre 0 · tests Arche n° 7 et n° 8</span></div><div class="pf-exam">Tests Arche<br>10 essais chacun<br>avant mar. 1/12</div></div>
  <div class="pf-key"><ol><li>Δ = b<sup>2</sup> − 4ac, puis x = <span class="fr"><span>−b ± √Δ</span><span>2a</span></span></li><li>Δ &lt; 0 : aucune solution réelle, S = ∅</li><li>× ou ÷ par un négatif : on retourne le signe de l'inégalité</li><li>Trinôme : signe de a à l'extérieur des racines</li></ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>ax² + bx + c = 0 (a ≠ 0)</h4>
        <p>On ramène tout à « = 0 », puis <b>Δ = b<sup>2</sup> − 4ac</b>.</p>
        <table><tr><th>Δ</th><th>Solutions</th><th>Factorisation</th></tr>
        <tr><td>Δ &gt; 0</td><td>x<sub>1,2</sub> = <span class="fr"><span>−b ∓ √Δ</span><span>2a</span></span></td><td>a(x − x<sub>1</sub>)(x − x<sub>2</sub>)</td></tr>
        <tr><td>Δ = 0</td><td>x<sub>0</sub> = −<span class="fr"><span>b</span><span>2a</span></span></td><td>a(x − x<sub>0</sub>)<sup>2</sup></td></tr>
        <tr><td>Δ &lt; 0</td><td>S = ∅</td><td>impossible</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>2</i>Cas rapides, sans Δ</h4>
        <p><b>c = 0</b> : x(ax + b) = 0 ⇔ x = 0 ou x = −<span class="fr"><span>b</span><span>a</span></span>.</p>
        <p><b>b = 0</b> : x<sup>2</sup> = k. Si k &gt; 0, x = ±√k ; si k &lt; 0, S = ∅.</p>
        <p class="m">81x<sup>2</sup> − 121 = 0 ⇔ (9x)<sup>2</sup> = 11<sup>2</sup> ⇔ S = {−<span class="fr"><span>11</span><span>9</span></span> ; <span class="fr"><span>11</span><span>9</span></span>}</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Exemples (feuille 0, ex. 4)</h4>
        <p class="m">2x<sup>2</sup> + x − 10 = 0 : Δ = 1 + 80 = 81, √Δ = 9<br>x = <span class="fr"><span>−1 − 9</span><span>4</span></span> = −<span class="fr"><span>5</span><span>2</span></span> ou x = <span class="fr"><span>−1 + 9</span><span>4</span></span> = 2</p>
        <p class="m">x<sup>2</sup> + 2x − 8 = 0 : Δ = 36 · S = {−4 ; 2}</p>
        <p class="m">3x<sup>2</sup> − 15x − 2 = 0 : Δ = 225 + 24 = 249<br>S = {<span class="fr"><span>15 − √249</span><span>6</span></span> ; <span class="fr"><span>15 + √249</span><span>6</span></span>}</p>
        <p>Vérification : x<sub>1</sub> + x<sub>2</sub> = −<span class="fr"><span>b</span><span>a</span></span> et x<sub>1</sub> × x<sub>2</sub> = <span class="fr"><span>c</span><span>a</span></span>.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>b<sup>2</sup> est toujours positif : (−15)<sup>2</sup> = 225.</li>
        <li>On divise par 2a, pas seulement par 2.</li>
        <li>−4ac avec c négatif devient une addition.</li></ul></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>3</i>Les règles</h4>
        <ul><li>+ ou − le même nombre des deux côtés : le sens ne change pas.</li>
        <li>× ou ÷ par un nombre <b>positif</b> : le sens ne change pas.</li>
        <li>× ou ÷ par un nombre <b>négatif</b> : on <b>retourne</b> le sens (&lt; devient &gt;).</li></ul>
        <p class="m">−2x + 5 ≥ 11 ⇔ −2x ≥ 6 ⇔ x ≤ −3<br>S = ]−∞ ; −3]</p>
      </div>
      <div class="pf-blk"><h4><i>4</i>Tableau de signes d'un produit</h4>
        <p>ax + b a le signe de a à droite de sa racine −<span class="fr"><span>b</span><span>a</span></span>. Exemple : (x − 2)(x + 4) ≤ 0.</p>
        <table><tr><th>x</th><td>−∞</td><td>−4</td><td></td><td>2</td><td>+∞</td></tr>
        <tr><th>x + 4</th><td>−</td><td>0</td><td>+</td><td>+</td><td>+</td></tr>
        <tr><th>x − 2</th><td>−</td><td>−</td><td>−</td><td>0</td><td>+</td></tr>
        <tr><th>produit</th><td>+</td><td>0</td><td>−</td><td>0</td><td>+</td></tr></table>
        <p>On veut ≤ 0 : S = [−4 ; 2] (crochets fermés car « ou égal »).</p>
      </div>
      <div class="pf-blk tint"><h4><i>5</i>Signe du trinôme ax² + bx + c</h4>
        <p>Δ &gt; 0 : signe de a <b>à l'extérieur</b> des racines, signe contraire entre elles.</p>
        <p>Δ = 0 ou Δ &lt; 0 : toujours du signe de a (nul en x<sub>0</sub>).</p>
        <p class="m">x<sup>2</sup> − x − 6 &gt; 0 : racines −2 et 3, a = 1 &gt; 0<br>S = ]−∞ ; −2[ ∪ ]3 ; +∞[</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4><ul>
        <li>Ne multiplie pas par x : son signe est inconnu.</li>
        <li>Quotient : la valeur interdite a toujours un crochet ouvert.</li>
        <li>&lt; ou &gt; : crochets ouverts sur les racines ; ≤ ou ≥ : fermés.</li></ul></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.07 chapitre 0</span><span>Tests 7 et 8</span></div>
</section>
</div></div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r107c0"></div>
  </section>

  <!-- ============ R1.02 : HTML ============ -->
  <section id="tab-w1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="w1">
      <h2>R1.02 · HTML 5</h2>
      <p class="muted">TP noté mercredi 21/10 (groupe 3 : 8 h – 10 h), 1 h 30, sur HTML et CSS jusqu'au TD4, positionnement inclus. Documents papier autorisés, pas d'Internet ni d'IA. Ne pas reprendre le code de tes exercices.</p>
      <h3>Squelette d'une page</h3>
<div class="tscroll"><pre class="f" style="margin:0;line-height:1.5">&lt;!DOCTYPE html&gt;
&lt;html lang="fr"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;title&gt;Titre&lt;/title&gt;
    &lt;link rel="stylesheet" href="style.css"&gt;
  &lt;/head&gt;
  &lt;body&gt; … &lt;/body&gt;
&lt;/html&gt;</pre></div>
      <h3>Structure</h3>
      <div class="formula-list">
        <span class="f">header / nav / footer</span><span>entête, menu de navigation, pied de page</span>
        <span class="f">section / article</span><span>section thématique, contenu autonome. Chacun a sa propre hiérarchie de titres h1…h6</span>
        <span class="f">div / span</span><span>conteneur bloc / conteneur en ligne, sans sens particulier</span>
        <span class="f">p, h1…h6</span><span>paragraphe, titres</span>
      </div>
      <h3>Listes, images, liens, tableaux</h3>
      <ul>
        <li><span class="f">ul</span> (puces), <span class="f">ol</span> (numérotée), <span class="f">li</span>, liste de définitions <span class="f">dl / dt / dd</span>. Une liste imbriquée se met <b>dans</b> un li.</li>
        <li><span class="f">&lt;img src="…" alt="…"&gt;</span> (alt obligatoire). Légende : <span class="f">&lt;figure&gt;&lt;img&gt;&lt;figcaption&gt;…&lt;/figcaption&gt;&lt;/figure&gt;</span>, une seule figcaption pour plusieurs images.</li>
        <li><span class="f">&lt;a href="https://…" target="_blank"&gt;</span> ouvre un nouvel onglet. Lien interne : <span class="f">href="#id"</span> vers un élément <span class="f">id="id"</span>. <span class="f">href="#"</span> remonte en haut.</li>
        <li>Tableau : <span class="f">table, caption, tr, th, td</span>. Fusion : <span class="f">colspan="2"</span> (colonnes), <span class="f">rowspan="2"</span> (lignes).</li>
        <li>Médias : <span class="f">&lt;video controls&gt;</span> / <span class="f">&lt;audio controls&gt;</span> avec plusieurs <span class="f">&lt;source src="…" type="…"&gt;</span> pour les 2 formats.</li>
      </ul>
      <div class="box method">Valide toujours tes fichiers (validator.w3.org et jigsaw pour le CSS) : une balise mal fermée casse souvent tout le style.</div>
      <div class="mod" data-mod="sandbox"></div>
    </article>
  </section>

  <section id="tab-w2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="w2">
      <h2>R1.02 · CSS 3 (TD2 à TD4)</h2>
      <h3>Sélecteurs</h3>
      <div class="formula-list">
        <span class="f">h2</span><span>toutes les balises h2</span>
        <span class="f">.rouge</span><span>les éléments avec class="rouge" (réutilisable)</span>
        <span class="f">#eau</span><span>l'élément avec id="eau" (unique dans la page)</span>
        <span class="f">section p</span><span>les p <b>descendants</b> d'une section (sélecteur contextuel)</span>
        <span class="f">figure.rouge figcaption</span><span>la légende d'une figure qui a la classe rouge</span>
        <span class="f">a:hover</span><span>pseudo-classe : au survol de la souris</span>
        <span class="f">h1, h2</span><span>les h1 <b>et</b> les h2</span>
      </div>
      <div class="box trap">Priorité : id &gt; classe &gt; balise. À priorité égale, la dernière règle écrite gagne.</div>
      <h3>Texte, couleurs, fonds</h3>
      <p><span class="f">color, font-family, font-size, font-weight, font-style, text-align (justify), text-decoration, font-variant: small-caps, line-height</span>. Fond : <span class="f">background-color, background-image: url('x.png'), background-repeat: no-repeat, background-size: contain / cover, background-position</span>.</p>
      <h3>Modèle de boîte</h3>
      <div class="mod" data-mod="boxmodel"></div>
      <ul>
        <li><span class="f">margin: 10px 20px 5px 0</span> : haut, droite, bas, gauche (sens des aiguilles d'une montre). 2 valeurs : haut/bas puis gauche/droite.</li>
        <li>Centrer un bloc : <span class="f">max-width: 960px; margin: 0 auto;</span>. Coller à la fenêtre : <span class="f">body { margin: 0; }</span>.</li>
        <li><span class="f">border: 5px ridge black; border-radius: 10px; box-shadow: 3px 3px 3px rgba(0,0,0,0.3);</span></li>
      </ul>
      <h3>Display</h3>
      <ul>
        <li><b>block</b> : prend toute la largeur, passe à la ligne (div, p, h1, section). <b>inline</b> : dans le texte, pas de largeur (a, span, img). <b>inline-block</b> : côte à côte mais accepte width/height. <b>none</b> : caché.</li>
        <li>Deux blocs côte à côte alignés en haut : <span class="f">display: inline-block; vertical-align: top; width: 45%;</span></li>
      </ul>
      <h3>Positionnement (TD4)</h3>
      <div class="mod" data-mod="position"></div>
      <div class="tscroll"><table class="tt" style="font-family:var(--f-body)">
        <tr><th>position</th><th>Repère</th><th>Effet</th></tr>
        <tr><td class="f">static</td><td>—</td><td style="text-align:left">valeur par défaut, flux normal, top/left ignorés</td></tr>
        <tr><td class="f">relative</td><td>sa propre place</td><td style="text-align:left">décalé de top/left, garde sa place dans le flux (les autres ne bougent pas)</td></tr>
        <tr><td class="f">absolute</td><td>le 1er parent positionné (sinon la page)</td><td style="text-align:left">sort du flux, peut se superposer</td></tr>
        <tr><td class="f">fixed</td><td>la fenêtre</td><td style="text-align:left">reste en place au défilement (entête fixe, bouton « haut de page » en bas à droite)</td></tr>
      </table></div>
      <ul>
        <li><span class="f">z-index</span> : la plus grande valeur passe au premier plan (bloc Feu par-dessus).</li>
        <li>Entête fixe : <span class="f">header { position: fixed; top: 0; width: 100%; }</span> + une marge en haut du contenu pour qu'il « glisse » dessous.</li>
        <li>Bouton en bas à droite : <span class="f">position: fixed; right: 20px; bottom: 20px;</span></li>
      </ul>
      <h3>Listes, tableaux, mobile</h3>
      <p><span class="f">list-style-type: none / square, list-style-image: url('icone.png')</span> (puces = icônes des Pokémon). <span class="f">border-collapse: collapse</span>. Version mobile : un 2e fichier CSS (mobileq02.css) chargé pour les petits écrans.</p>
    </article>
  </section>

  <section id="tab-wx" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r102">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. PDF à imprimer : dossier <b>Cours/BUT1/Fiches de révision</b> (« R1.02 Web HTML-CSS - mémento TP noté.pdf »).</span></div>
    <div class="fiche-host" data-subj="r102"><div class="pfwrap">
<section class="pf r102">
  <div class="pf-head"><div class="pf-code">R1.02</div><div class="pf-title"><b>Mémento HTML 5 + CSS 3</b><span>TD1 à TD4 · à imprimer : les documents papier sont autorisés au TP noté</span></div><div class="pf-exam">TP noté<br>mer. 21/10 · 8 h<br>1 h 30</div></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk"><h4><i>1</i>Squelette</h4>
<pre>&lt;!DOCTYPE html&gt;
&lt;html lang="fr"&gt;
&lt;head&gt;
  &lt;meta charset="utf-8"&gt;
  &lt;title&gt;Titre&lt;/title&gt;
  &lt;link rel="stylesheet" href="styleq01.css"&gt;
&lt;/head&gt;
&lt;body&gt; … &lt;/body&gt;
&lt;/html&gt;</pre></div>
      <div class="pf-blk tint"><h4><i>2</i>Balises utiles</h4>
        <table><tr><th>Balise</th><th>Rôle</th></tr>
        <tr><td class="m">header nav footer</td><td>entête, menu, pied de page</td></tr>
        <tr><td class="m">section article</td><td>chacun a ses titres h1…h6</td></tr>
        <tr><td class="m">div / span</td><td>bloc / en ligne, sans sens</td></tr>
        <tr><td class="m">ul ol li · dl dt dd</td><td>listes ; sous-liste DANS le li</td></tr>
        <tr><td class="m">figure + figcaption</td><td>images + 1 légende commune</td></tr>
        <tr><td class="m">table tr th td caption</td><td>tableau ; colspan / rowspan</td></tr>
        <tr><td class="m">video / audio controls</td><td>+ 2 &lt;source&gt; (2 formats)</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>3</i>Liens et images</h4>
<pre>&lt;a href="https://www.pokepedia.fr" target="_blank"&gt;…&lt;/a&gt;
&lt;a href="#feu"&gt;1.1 Type Feu&lt;/a&gt;   → id="feu"
&lt;a href="#"&gt;Retour en haut&lt;/a&gt;
&lt;img src="images/pikachu.png" alt="Pikachu"&gt;</pre></div>
      <div class="pf-blk tint"><h4><i>4</i>Sélecteurs et priorité</h4>
        <table><tr><td class="m">h2</td><td>toutes les balises h2</td></tr><tr><td class="m">.rouge</td><td>class="rouge" (réutilisable)</td></tr><tr><td class="m">#eau</td><td>id="eau" (unique)</td></tr><tr><td class="m">section p</td><td>p descendants d'une section</td></tr><tr><td class="m">h1, h2</td><td>les h1 ET les h2</td></tr><tr><td class="m">a:hover</td><td>au survol</td></tr><tr><td class="m">figure.rouge figcaption</td><td>légende d'une figure .rouge</td></tr></table>
        <p style="margin-top:1mm"><b>id &gt; classe &gt; balise</b> ; à égalité, la dernière règle gagne.</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>5</i>Modèle de boîte</h4>
        <svg viewBox="0 0 330 120" aria-label="Modèle de boîte">
          <rect x="2" y="2" width="326" height="116" fill="#fff4d6" stroke="#c2410c" stroke-dasharray="4 3"/><text x="10" y="16" font-size="10" fill="#8a5a00">margin (extérieure)</text>
          <rect x="34" y="24" width="262" height="78" fill="#fff" stroke="#111" stroke-width="5"/><text x="300" y="36" font-size="10">border</text>
          <rect x="40" y="30" width="250" height="66" fill="#fdeee6"/><text x="46" y="44" font-size="10" fill="#c2410c">padding (intérieure)</text>
          <rect x="80" y="50" width="170" height="36" fill="#fff" stroke="#111" stroke-dasharray="3 2"/><text x="165" y="72" text-anchor="middle" font-size="11" font-weight="700">contenu (width)</text>
        </svg>
        <p><b>Largeur visible</b> = width + 2 padding + 2 border. <span class="m">margin: 10px 20px 5px 0;</span> = haut, droite, bas, gauche. 2 valeurs : haut/bas puis gauche/droite.</p>
      </div>
      <div class="pf-blk tint"><h4><i>6</i>Display et position</h4>
        <table><tr><th>Valeur</th><th>Effet</th></tr>
        <tr><td class="m">block</td><td>toute la largeur, passe à la ligne</td></tr>
        <tr><td class="m">inline</td><td>dans le texte, pas de largeur</td></tr>
        <tr><td class="m">inline-block</td><td>côte à côte + width/height</td></tr>
        <tr><td class="m">none</td><td>caché</td></tr>
        <tr><td class="m">relative</td><td>décalé de sa place, qui reste réservée</td></tr>
        <tr><td class="m">absolute</td><td>sort du flux, repère = parent positionné</td></tr>
        <tr><td class="m">fixed</td><td>repère = fenêtre, ne bouge pas au défilement</td></tr>
        <tr><td class="m">z-index</td><td>le plus grand passe devant</td></tr></table>
      </div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.02 Développement web</span><span>1 / 2</span></div>
</section>
<section class="pf r102">
  <div class="pf-head"><div class="pf-code">R1.02</div><div class="pf-title"><b>Recettes CSS des TD + check-list</b><span>Les solutions types des TD2, TD3 et TD4, prêtes à recopier</span></div><div class="pf-exam">Documents<br>papier OK</div></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk pfex"><h4><i>✓</i>Recettes des TD</h4>
<pre>body { margin: 0; font-family: Verdana, Arial, sans-serif; }
section, nav { max-width: 960px; margin: 0 auto; }
div { display: inline-block; vertical-align: top; width: 45%; }
nav ul ul { display: none; }           /* sous-menus */
nav li { display: inline-block; }
figure:hover { position: relative; top: 20px; }
#carapuce { list-style-image: url('carapuce.png'); }
header { position: fixed; top: 0; width: 100%; }
section { margin-top: 120px; }         /* glisse dessous */
#haut { position: fixed; right: 20px; bottom: 20px; }
.feu { position: relative; z-index: 2; }
img { box-shadow: 3px 3px 3px rgba(0,0,0,0.3); }
h2 { border-radius: 10px; font-weight: normal; }
table { border-collapse: collapse; }</pre></div>
    </div>
    <div class="pf-col">
      <div class="pf-blk trap"><h4><i>!</i>Le jour J</h4>
        <ul><li>Dossier <b>TPNomPrenom</b>, bon nom de fichier CSS dans &lt;link&gt;.</li><li>HTML d'abord, puis une règle CSS à la fois, en rechargeant.</li><li>Valider (validator.w3.org / jigsaw) : une balise mal fermée casse le style.</li><li>Bloqué ? Passe à la suite, reviens après.</li><li>Pas d'Internet, pas d'IA, pas tes anciens fichiers.</li></ul>
      </div>
      <div class="pf-blk tint"><h4><i>7</i>Listes, tableaux, mobile</h4>
<pre>ul { list-style-type: square; }      /* none, disc, decimal */
li { list-style-position: inside; }
table { border-collapse: collapse; }
td, th { border: 1px solid black; padding: 5px; }
caption { caption-side: bottom; }
&lt;td colspan="2"&gt; · &lt;td rowspan="3"&gt;
/* version mobile : mobileq02.css */
div { width: 100%; margin: 0; }</pre></div>
      <div class="pf-blk"><h4><i>8</i>Texte, couleurs, fonds</h4>
<pre>color: #CF1A20; color: rgba(0,0,0,0.5);
font-size: 1.3em; font-weight: bold;
font-style: italic; font-variant: small-caps;
text-align: center | justify;
text-decoration: none | underline;
line-height: 2.5em;
background-color: purple;
background-image: url('pokeball2.png');
background-repeat: no-repeat;
background-size: contain | cover | 1em;
background-position: center;</pre></div>
    </div>
  </div>
  <div class="pf-foot"><span>Révisions BUT1 · R1.02 Développement web</span><span>2 / 2</span></div>
</section>
</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r102"></div>
  </section>


  <!-- ============ R1.01 : Init Dev ============ -->
  <section id="tab-a1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="a1">
      <h2>R1.01 · Algorithmique, chapitres 1 à 8</h2>
      <p class="muted">Le cours de L. Zertal résumé chapitre par chapitre, avec sa notation (Ord, Lexique, ←, fsi, fpour, ftq, jqa). Éval lundi 9/11 à 8 h 30 : documents papier Cours/TD/TP autorisés, rien de numérique.</p>
      <h3>1. Du problème au programme</h3>
      <p class="muted">Analyse, lexique, affectation, lire/écrire, si, cas parmi</p>
<p>Un algorithme se rédige dans un <b>langage algorithmique</b>, pas dans un langage de programmation. On l'écrit en deux parties côte à côte : <b>Ord</b> (les instructions, dans l'ordre) et <b>Lexique</b> (chaque objet utilisé, avec son type et un commentaire).</p>
<div class="box def"><b>Les 5 propriétés de Knuth :</b> finitude (se termine), définition précise (pas d'ambiguïté), entrées, sorties, rendement (opérations faisables à la main).</div>
<h4 class="sub">Deux façons d'analyser</h4>
<ul><li><b>Par le résultat</b> : on part de ce qu'il faut produire et on décompose jusqu'aux données. L'<b>ordonnancement</b> est obligatoire (on numérote l'ordre d'exécution).</li>
<li><b>Par les données</b> : on compose les données jusqu'au résultat. Les actions sont déjà dans l'ordre.</li></ul>
<h4 class="sub">Variables, constantes, affectation</h4>
<p>Un nom de variable : lettres, chiffres, <span class="f">_</span>, sans espace ni accent. <span class="f">a ← b</span> : a prend la valeur de b (réceptrice ← émettrice). Une constante se déclare <span class="f">pi (cste/réel = 3,14)</span> et ne change plus.</p>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Facture_Telephone</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir le montant de l'abonnement : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(mt_abt)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir le prix d'une unité et le nombre d'unités : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(px_unite, nb_unites)</span></div><div class="a-ln" style="--d:0"><span class="a-c">px_conso <span class="a-op">←</span> px_unite * nb_unites</span></div><div class="a-ln" style="--d:0"><span class="a-c">montant <span class="a-op">←</span> px_conso + mt_abt</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Montant facture = &quot;</span>, montant)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">mt_abt</td><td class="a-ty">réel</td><td class="a-rl">montant de l'abonnement</td></tr><tr><td class="a-nm">px_unite</td><td class="a-ty">réel</td><td class="a-rl">prix d'une unité</td></tr><tr><td class="a-nm">nb_unites</td><td class="a-ty">entier</td><td class="a-rl">nombre d'unités consommées</td></tr><tr><td class="a-nm">px_conso</td><td class="a-ty">réel</td><td class="a-rl">prix de la consommation</td></tr><tr><td class="a-nm">montant</td><td class="a-ty">réel</td><td class="a-rl">somme facturée</td></tr></table></div></div></div></div>
<p><span class="f">lire</span> et <span class="f">←</span> modifient le contenu d'une variable. <span class="f">ecrire</span> l'affiche sans le modifier. Déclarer une variable ne lui donne pas de valeur.</p>
<h4 class="sub">Conditionnelles</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> salbrut ≤ plafond <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">rss <span class="a-op">←</span> salbrut * taux1</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">rss <span class="a-op">←</span> (salbrut - plafond) * taux2 + plafond * taux1</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div></div>
<p>Plusieurs cas : <span class="f">si … alors … sinonsi … alors … sinon … fsi</span>.</p>
<h4 class="sub">Choix multiple</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">cas</span> a <span class="a-kw">parmi</span></span></div><div class="a-ln" style="--d:1"><span class="a-case">2</span><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;ok&quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-case">3, 4</span><span class="a-c">b <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:1"><span class="a-case">6..20</span><span class="a-c"><span class="a-kw">lire</span>(b)</span></div><div class="a-ln" style="--d:1"><span class="a-case"><span class="a-kw">autres</span></span><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;pas ok&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fcas</span></span></div></div></div></div>
<div class="box trap">La variable d'un <span class="f">cas … parmi</span> doit être <b>scalaire</b> : entier, caractère, booléen ou énuméré. Pas de réel, pas de chaîne.</div>
      <h3>2. Types simples et opérations</h3>
      <p class="muted">Booléen, entier (div, mod), réel, caractère, chaîne, scalaire</p>
<p>Types simples : <b>entier</b>, <b>réel</b>, <b>caractère</b>, <b>chaîne</b> et <b>booléen</b>. Chaque type a ses opérations. Les comparaisons <span class="f">= ≠ &lt; &gt; ≤ ≥</span> marchent pour tous et donnent un booléen.</p>
<div class="tscroll"><table class="tt"><tr><th>Type</th><th>Opérations</th><th>Exemple</th></tr>
<tr><td>entier</td><td class="f">+ - * / div mod</td><td class="f">17 div 5 = 3, 17 mod 5 = 2, 17 / 5 = 3,4 (réel)</td></tr>
<tr><td>réel</td><td class="f">+ - * /</td><td>virgule flottante, précision limitée</td></tr>
<tr><td>caractère</td><td>comparaison par rang ASCII, <span class="f">|</span></td><td class="f">'a' | 'e' = "ae"</td></tr>
<tr><td>chaîne</td><td><span class="f">|</span> concaténation, <span class="f">longueur</span>, <span class="f">ch[i]</span></td><td class="f">longueur("Titi") = 4</td></tr>
<tr><td>booléen</td><td class="f">et ou non</td><td class="f">ancien ← nbannees &gt; 3</td></tr></table></div>
<h4 class="sub">Booléens</h4>
<p>Valeurs <span class="f">vrai</span> et <span class="f">faux</span> (des symboles, pas des chaînes). <span class="f">si cadre</span> ⇔ <span class="f">si cadre = vrai</span> ; <span class="f">si non cadre</span> ⇔ <span class="f">si cadre = faux</span>. On a <span class="f">faux &lt; vrai</span>.</p>
<div class="box def"><b>De Morgan :</b> <span class="hl">non (a et b) ⇔ non a ou non b</span> et <span class="hl">non (a ou b) ⇔ non a et non b</span>. Aussi : et/ou sont commutatifs, associatifs et distributifs l'un sur l'autre.</div>
<h4 class="sub">Chaînes</h4>
<p>Une chaîne a une taille : <span class="f">longueur(ch)</span>. Ses cases vont de <span class="f">ch[1]</span> à <span class="f">ch[longueur(ch)]</span>, et on peut les modifier : <span class="f">message[2] ← 'L'</span>. La chaîne vide <span class="f">""</span> a une longueur 0. Comparaison dans l'ordre du dictionnaire : <span class="f">"AABC" &gt; "AABBZ"</span>.</p>
<div class="box trap"><span class="f">'a'</span> est un caractère, <span class="f">"a"</span> est une chaîne : deux types différents.</div>
<h4 class="sub">Type scalaire</h4>
<p>Ensemble de valeurs <b>ordonné</b> et <b>discret</b> : entier, caractère, booléen. Réel et chaîne ne sont pas scalaires. Fonctions <span class="f">pred</span> et <span class="f">succ</span> : <span class="f">succ('B') = 'C'</span>, <span class="f">pred(2) = 1</span>, <span class="f">succ(faux) = vrai</span>.</p>
      <h3>3. Itérations, modules, fonctions</h3>
      <p class="muted">pour, tantque, répéter, variables récurrentes, paramètres ↓ ↑ ↕</p>
<h4 class="sub">Itération simple : pour</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(i)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln a-gap"></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> c <span class="a-op">←</span> <span class="a-st">'Z'</span> <span class="a-kw">à</span> <span class="a-st">'A'</span> [<span class="a-kw">pas</span> -1] <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(c)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
<p>L'indice est scalaire et varie d'une borne à l'autre, avec un pas de +1 par défaut. Si la borne de départ dépasse déjà l'autre, on fait <b>0 tour</b>.</p>
<h4 class="sub">Itérations conditionnelles</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> i ≤ N <span class="a-kw">faire</span>              <span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(i)                 | <span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir un entier &gt; 0&quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c">i <span class="a-op">←</span> succ(i)               | <span class="a-kw">lire</span>(n)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span>                         <span class="a-kw">jqa</span> n &gt; 0</span></div></div></div></div>
<ul><li><b>tq</b> (tantque) : la condition est testée <b>avant</b>, on peut faire 0 tour.</li>
<li><b>repeter … jqa</b> : le corps s'exécute <b>au moins une fois</b>, puis on teste la condition d'arrêt. Idéal pour une saisie contrôlée.</li>
<li>Un pour peut toujours s'écrire avec un tq. L'inverse n'est pas toujours possible.</li></ul>
<h4 class="sub">Variable récurrente</h4>
<p>Sa valeur à l'étape i dépend de l'étape i − 1 : <span class="f">somme ← somme + i</span>. Elle s'<b>initialise avant</b> la boucle.</p>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Somme_N</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln" style="--d:0"><span class="a-c">somme <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">somme <span class="a-op">←</span> somme + i</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(somme)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">n, i</td><td class="a-ty">entier</td><td class="a-rl"></td></tr><tr><td class="a-nm">somme</td><td class="a-ty">entier</td><td class="a-rl">résultat (variable récurrente)</td></tr></table></div></div></div></div>
<h4 class="sub">Modules</h4>
<p>Un module est un sous-algorithme nommé, avec son Ord et son Lexique, appelé autant de fois qu'on veut. Tout objet de l'algo principal est accessible dans ses modules.</p>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Calculsomme(<span class="a-md">↓</span> a, b : entier ; <span class="a-md">↑</span> s : entier)</span></div><div class="a-grid a-solo"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">s <span class="a-op">←</span> a + b</span></div></div></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Principal</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(n1, n2)</span></div><div class="a-ln" style="--d:0"><span class="a-c">Calculsomme(n1, n2, somme)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(somme)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">n1, n2, somme</td><td class="a-ty">entier</td><td class="a-rl"></td></tr><tr><td class="a-nm">Calculsomme</td><td class="a-ty"><span class="a-kw">module</span></td><td class="a-rl">somme de 2 entiers</td></tr></table></div></div></div></div>
<div class="tscroll"><table class="tt"><tr><th>Mode</th><th>Signe</th><th>Dans le module</th></tr>
<tr><td>entrée</td><td class="f">↓</td><td>lu seulement, jamais affecté</td></tr>
<tr><td>sortie</td><td class="f">↑</td><td>reçoit une valeur</td></tr>
<tr><td>entrée/sortie</td><td class="f">↕</td><td>lu et modifié</td></tr></table></div>
<ul><li>Paramètres <b>formels</b> (dans l'en-tête) : séparés par <span class="f">;</span>, avec mode et type, absents du Lexique du module.</li>
<li>Paramètres <b>effectifs</b> (à l'appel) : séparés par <span class="f">,</span>, sans mode ni type, même nombre, même ordre, mêmes types.</li>
<li>Un effectif qui correspond à un ↓ ou ↕ doit avoir une valeur au moment de l'appel.</li></ul>
<h4 class="sub">Fonctions</h4>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Moyenne(nM, nF, nA : réel) : réel</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">m <span class="a-op">←</span> (coefF * nF + coefM * nM + coefA * nA) / (coefF + coefM + coefA)</span></div><div class="a-ln" style="--d:0"><span class="a-c">Moyenne <span class="a-op">⇐</span> m</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">m</td><td class="a-ty">réel</td><td class="a-rl">moyenne d'un étudiant</td></tr></table></div></div></div></div>
<ul><li>Une fonction calcule <b>un seul</b> résultat. Son type est celui du résultat.</li>
<li>Tous ses paramètres sont des paramètres <b>d'entrée</b>.</li>
<li><span class="f">Moyenne ⇐ m</span> associe le résultat au nom de la fonction (ce n'est pas une affectation).</li>
<li>Un appel de fonction <b>n'est pas une instruction</b> : il se remplace par sa valeur (<span class="f">moy ← Moyenne(a, b, c)</span>, <span class="f">si Moyenne(…) &gt; 10</span>, <span class="f">ecrire(Moyenne(…))</span>). Dans le Lexique : <span class="f">Moyenne (fonction/réel)</span>.</li></ul>
<div class="box trap">Le nom d'une fonction n'est pas une variable : pas de <span class="f">Moyenne ← Moyenne + 1</span>. Et on ne modifie pas un paramètre de fonction : copie-le dans une variable locale.</div>
      <h3>4. Tables à une dimension</h3>
      <p class="muted">Type table, taille physique, parcours, recherche</p>
<p>Une table range plusieurs valeurs du même type sous un seul nom. On crée d'abord un <b>type</b>, puis une variable de ce type.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Taille (<span class="a-kw">cste</span>/entier = 150) : taille physique</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Tabmoy (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..Taille] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c">Tabmoy (T_Tabmoy) : <span class="a-kw">table</span> des moyennes</span></div><div class="a-ln" style="--d:0"><span class="a-c">nbe (entier) : nombre de valeurs effectives</span></div></div></div></div>
<p>Par convention, un nom de type commence par <span class="f">T_</span>. L'intervalle peut être pris dans n'importe quel type scalaire : <span class="f">table ['A'..'Z'] entier</span>.</p>
<div class="box def"><b>Taille physique</b> (cases réservées) ≠ <b>nombre de valeurs stockées</b>. Si i est hors de [a, b], <span class="f">Tab[i]</span> est inaccessible. Si i est hors des cases remplies, <span class="f">Tab[i]</span> est indéterminé.</div>
<h4 class="sub">Accès</h4>
<ul><li><b>Direct</b> : <span class="f">Tab[3]</span>, <span class="f">lire(T[i])</span>, <span class="f">T[i] ← T[i-1] + 2</span>.</li>
<li><b>Séquentiel</b> : <span class="f">pour i ← 1 à n faire … Tab[i] … fpour</span>.</li>
<li><b>Associatif</b> : chercher l'élément qui a une propriété, ou associer deux tables (noms et moyennes).</li></ul>
<h4 class="sub">La recherche, à savoir par cœur</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">i <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">faux</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> (i ≤ nbe) <span class="a-kw">et</span> <span class="a-kw">non</span> trouve <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> Tabnom[i] = nom <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">vrai</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">moy <span class="a-op">←</span> Tabmoy[i]</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">i <span class="a-op">←</span> i + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> trouve <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;moyenne de &quot;</span>, nom, <span class="a-st">&quot; = &quot;</span>, moy)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(nom, <span class="a-st">&quot; n'existe pas&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div></div>
<div class="box trap">Pour une recherche, on n'utilise pas un <span class="f">pour</span> : il ne s'arrête pas quand on a trouvé. Et on n'affecte pas une table à une autre d'un coup : case par case.</div>
      <h3>5. Tables à plusieurs dimensions</h3>
      <p class="muted">Lignes, colonnes, double boucle</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Nbemax (<span class="a-kw">cste</span>/entier = 1000)</span></div><div class="a-ln" style="--d:0"><span class="a-c">Nbnotemax (<span class="a-kw">cste</span>/entier = 10)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Tabnotes (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..Nbemax, 1..Nbnotemax] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c">Tabnotes (T_Tabnotes) : note de l'étudiant i dans la matière j</span></div></div></div></div>
<p>Une case se désigne par autant d'indices que de dimensions : <span class="f">Tabnotes[i, j]</span>. On parcourt avec une boucle par dimension.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> nbe <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">somnotes <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> 1 <span class="a-kw">à</span> nbmat <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">somnotes <span class="a-op">←</span> somnotes + Tabnotes[i, j] * Tabcoef[j]</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">Tabmoy[i] <span class="a-op">←</span> somnotes / somcoef</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
<div class="box trap">La somme d'une ligne se remet à 0 <b>dans</b> la première boucle, juste avant la deuxième. À l'extérieur, elle cumulerait toutes les lignes.</div>
<p>Min et max de toute la table : on part de <span class="f">T[1, 1]</span> et on compare chaque case avec deux boucles imbriquées (module <span class="f">MinMax(↓ nbe, nbm : entier ; ↓ T : T_Tabnotes ; ↑ notmin, notmax : réel)</span>).</p>
      <h3>6. Types scalaires et intervalles</h3>
      <p class="muted">Types énumérés, intervalles, tables indexées par un type</p>
<p>Quand une information ne prend que quelques valeurs connues, on crée un <b>type énuméré</b> qui les liste.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Jour (<span class="a-kw">type</span>) = (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche)</span></div><div class="a-ln" style="--d:0"><span class="a-c">jour (T_Jour)</span></div><div class="a-ln" style="--d:0"><span class="a-c">ouvrable <span class="a-op">←</span> (jour ≠ samedi) <span class="a-kw">et</span> (jour ≠ dimanche)</span></div></div></div></div>
<ul><li>Les valeurs sont des <b>symboles</b>, sans guillemets.</li>
<li>Elles sont ordonnées par leur position : <span class="f">lundi &lt; mardi &lt; … &lt; dimanche</span>.</li>
<li><span class="f">succ(lundi) = mardi</span>, <span class="f">pred(mardi) = lundi</span>. Pas de succ pour la dernière valeur.</li></ul>
<h4 class="sub">Intervalles</h4>
<p>Un sous-ensemble borné d'un type scalaire, qui hérite de ses opérations.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_We (<span class="a-kw">type</span>) = samedi..dimanche</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Maj (<span class="a-kw">type</span>) = <span class="a-st">'A'</span>..<span class="a-st">'Z'</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Etud (<span class="a-kw">type</span>) = 1..Nbemax</span></div></div></div></div>
<h4 class="sub">Indexer une table par ces types</h4>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Mat (<span class="a-kw">type</span>) = (NoteM, NoteF, NoteA)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Tabnote (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [T_Etud, T_Mat] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Tabcoef (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [T_Mat] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> NoteM <span class="a-kw">à</span> NoteA <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">somcoef <span class="a-op">←</span> somcoef + Tabcoef[j]</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
      <h3>7. Structures et construction d'un type</h3>
      <p class="muted">Champs, notation pointée, tables de structures</p>
<p>Une <b>structure</b> regroupe des informations de types différents.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Etudiant (<span class="a-kw">type</span>) = <span class="a-kw">structure</span> (nom (chaine) ; prenom (chaine) ; Tabnote (T_Tabnote))</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Promo (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [T_Nbetud] T_Etudiant</span></div><div class="a-ln" style="--d:0"><span class="a-c">Promo (T_Promo)</span></div></div></div></div>
<p>On accède à un champ avec un point : <span class="f">Promo[i].nom</span> (une chaîne), <span class="f">Promo[i].Tabnote[NoteF]</span> (un réel).</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> e <span class="a-op">←</span> 1 <span class="a-kw">à</span> Nbe <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">moy <span class="a-op">←</span> Moyenne(Promo[e].Tabnote, Tabcoef)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(Promo[e].nom, Promo[e].prenom, moy)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
<div class="box def">On peut affecter une structure entière à une autre du même type : <span class="f">E1 ← E2</span> copie tous les champs, y compris une table qui en est un champ.</div>
<h4 class="sub">Quel type choisir ?</h4>
<div class="tscroll"><table class="tt"><tr><th>L'information est…</th><th>Type</th></tr>
<tr><td>un ensemble de valeurs connues et ordonnées</td><td>énuméré</td></tr>
<tr><td>une partie finie d'un type scalaire</td><td>intervalle</td></tr>
<tr><td>un nombre, un texte, vrai/faux</td><td>simple</td></tr>
<tr><td>plusieurs valeurs du même type</td><td>table</td></tr>
<tr><td>plusieurs informations de types différents</td><td>structure</td></tr></table></div>
<p>Exemple du cours : <span class="f">Info.Lesforms[B1][4].Notes[NoteF]</span> lit la note de français du 4e étudiant de 1re année.</p>
      <h3>8. Portée et visibilité</h3>
      <p class="muted">Variables globales, locales, masquage</p>
<div class="box def"><b>Portée</b> d'un objet : l'algorithme (ou le module) où il est déclaré, plus tous les sous-modules déclarés dedans. <b>Visibilité</b> : un objet est visible à un endroit s'il y a sa portée et qu'aucun objet du même nom n'y est déclaré.</div>
<ul><li><b>Globale</b> : déclarée dans l'algorithme principal.</li>
<li><b>Locale</b> : déclarée dans un module. Les <b>paramètres formels</b> ont le même statut que les locales.</li></ul>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Principal</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">M1(a)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(a)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">a, n, i</td><td class="a-ty">entier</td><td class="a-rl">globales</td></tr><tr><td class="a-nm">M1</td><td class="a-ty"><span class="a-kw">module</span></td><td class="a-rl"></td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">M1(<span class="a-md">↑</span> c : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(i)</span></div><div class="a-ln" style="--d:0"><span class="a-c">c <span class="a-op">←</span> i + 1</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">locale à M1</td></tr></table></div></div></div></div>
<p>Dans M1, <span class="f">i</span> désigne la <b>locale</b> : elle masque la globale. Le <span class="f">lire(i)</span> du module ne change donc pas le compteur de la boucle du principal.</p>
<div class="box trap">Si un module modifie une globale qu'il ne masque pas, la modification se voit dans l'algorithme principal.</div>
      <div class="pdfl"><span class="eyebrow">Le cours complet sur Arche</span><a href="https://arche.univ-lorraine.fr/course/view.php?id=38159" target="_blank" rel="noopener">But1_Initiation_Developpement (chapitres 1 à 8 en PDF)</a></div>
    </article>
  </section>

  <section id="tab-a2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="a2" data-noedit>
      <h2>R1.01 · Exercices corrigés</h2>
      <p class="muted">19 exercices tirés du cours, des TD et de l'interro d'octobre. Fais-les sur papier avec Ord et Lexique, puis ouvre le corrigé. L'indice est là si tu bloques.</p>
      <h3>1. Du problème au programme</h3>
      <div class="exo"><div class="eyebrow">Ch. 1 · si / sinonsi</div><h4>1. Mention d'un étudiant</h4><p>Écris un algorithme qui lit une note sur 20 et affiche la mention : Très bien (≥ 16), Bien (≥ 14), Assez bien (≥ 12), Passable (≥ 10), sinon Ajourné.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Teste les seuils du plus grand au plus petit : chaque sinonsi sait déjà que les tests d'avant sont faux.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Mention</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir la note : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(note)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> note ≥ 16 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Très bien&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinonsi</span> note ≥ 14 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Bien&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinonsi</span> note ≥ 12 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Assez bien&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinonsi</span> note ≥ 10 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Passable&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Ajourné&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">note</td><td class="a-ty">réel</td><td class="a-rl">note saisie</td></tr></table></div></div></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 1 · cas parmi</div><h4>2. Nombre de jours d'un mois</h4><p>Écris un algorithme qui lit un numéro de mois (1 à 12) et affiche son nombre de jours (février : 28). Si le numéro est invalide, affiche « Mois invalide ».</p>
        <details class="corr-d"><summary>Un indice</summary><p>Un cas … parmi sur un entier, avec une liste de valeurs par branche et la branche autres.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">NbJours</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Numéro du mois (1 à 12) : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(m)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">cas</span> m <span class="a-kw">parmi</span></span></div><div class="a-ln" style="--d:1"><span class="a-case">2</span><span class="a-c">nbj <span class="a-op">←</span> 28</span></div><div class="a-ln" style="--d:1"><span class="a-case">4, 6, 9, 11</span><span class="a-c">nbj <span class="a-op">←</span> 30</span></div><div class="a-ln" style="--d:1"><span class="a-case">1, 3, 5, 7, 8, 10, 12</span><span class="a-c">nbj <span class="a-op">←</span> 31</span></div><div class="a-ln" style="--d:1"><span class="a-case"><span class="a-kw">autres</span></span><span class="a-c">nbj <span class="a-op">←</span> 0</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fcas</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> nbj = 0 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Mois invalide&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Ce mois a &quot;</span>, nbj, <span class="a-st">&quot; jours&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">m</td><td class="a-ty">entier</td><td class="a-rl">numéro du mois</td></tr><tr><td class="a-nm">nbj</td><td class="a-ty">entier</td><td class="a-rl">nombre de jours, 0 si le mois est invalide</td></tr></table></div></div></div></div></details></div>
      <h3>2. Types simples et opérations</h3>
      <div class="exo"><div class="eyebrow">Ch. 2 · booléens, mod</div><h4>3. Année bissextile</h4><p>Écris la fonction <span class='f'>Bissextile(a : entier) : booléen</span>. Une année est bissextile si elle est divisible par 4 mais pas par 100, ou si elle est divisible par 400.</p>
        <details class="corr-d"><summary>Un indice</summary><p>« divisible par 4 » s'écrit a mod 4 = 0. Pas besoin de si : le résultat est directement une condition.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Bissextile(a : entier) : booléen</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Bissextile <span class="a-op">⇐</span> ((a <span class="a-kw">mod</span> 4 = 0) <span class="a-kw">et</span> (a <span class="a-kw">mod</span> 100 ≠ 0)) <span class="a-kw">ou</span> (a <span class="a-kw">mod</span> 400 = 0)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td colspan="3" class="a-raw">(rien : a est un paramètre)</td></tr></table></div></div><p class="a-note">Exemples : 2024 → vrai, 1900 → faux, 2000 → vrai.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 2-3 · chaînes</div><h4>4. Compter les voyelles</h4><p>Écris la fonction <span class='f'>NbVoyelles(ch : chaine) : entier</span> qui compte les voyelles minuscules (a, e, i, o, u, y) d'une chaîne.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Parcours ch[1] à ch[longueur(ch)]. Un caractère est scalaire : un cas … parmi marche.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">NbVoyelles(ch : chaine) : entier</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">nb <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> longueur(ch) <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">cas</span> ch[i] <span class="a-kw">parmi</span></span></div><div class="a-ln" style="--d:2"><span class="a-case"><span class="a-st">'a'</span>, <span class="a-st">'e'</span>, <span class="a-st">'i'</span>, <span class="a-st">'o'</span>, <span class="a-st">'u'</span>, <span class="a-st">'y'</span></span><span class="a-c">nb <span class="a-op">←</span> nb + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fcas</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">NbVoyelles <span class="a-op">⇐</span> nb</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">nb</td><td class="a-ty">entier</td><td class="a-rl">compteur de voyelles (variable récurrente)</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours de la chaîne</td></tr></table></div></div></div></div></details></div>
      <h3>3. Itérations, modules, fonctions</h3>
      <div class="exo"><div class="eyebrow">Interro d'octobre · exercice 1</div><h4>5. Triangle de nombres</h4><p>Écris un algo AFFICHE_TRIANGLE qui affiche un triangle de ce type (le nombre de lignes est saisi) :<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">1</span></div><div class="a-ln" style="--d:0"><span class="a-c">1 2</span></div><div class="a-ln" style="--d:0"><span class="a-c">1 2 3</span></div><div class="a-ln" style="--d:0"><span class="a-c">1 2 3 4</span></div></div></div></div></p>
        <details class="corr-d"><summary>Un indice</summary><p>Deux boucles imbriquées : la ligne i affiche les nombres de 1 à i.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Triangle</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Combien de lignes à afficher ? &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(nb)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> nb <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> 1 <span class="a-kw">à</span> i <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">ecrire</span>(j, <span class="a-st">' '</span>)</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">(retour <span class="a-kw">à</span> la ligne)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">nb</td><td class="a-ty">entier</td><td class="a-rl">nombre de lignes à afficher</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">compteur de lignes</td></tr><tr><td class="a-nm">j</td><td class="a-ty">entier</td><td class="a-rl">compteur de valeurs à afficher sur la ligne</td></tr></table></div></div><p class="a-note">Corrigé du prof : les étapes sont données dans l'ordre d'exécution.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Interro d'octobre · exercice 2</div><h4>6. Texte bien parenthésé</h4><p>1) Écris <span class='f'>fonction VerifPar(ch : chaine) : booléen</span> qui renvoie vrai si la chaîne contient autant de parenthèses ouvrantes que fermantes. 2) Écris un algorithme qui saisit un texte et affiche s'il est bien parenthésé.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Un seul compteur : +1 pour '(' et −1 pour ')'. À la fin, il doit valoir 0.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">VerifPar(ch : chaine) : booléen</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">nb <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> longueur(ch) <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> ch[i] = <span class="a-st">'('</span> <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">nb <span class="a-op">←</span> nb + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinonsi</span> ch[i] = <span class="a-st">')'</span> <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">nb <span class="a-op">←</span> nb - 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">VerifPar <span class="a-op">⇐</span> nb = 0</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">nb</td><td class="a-ty">entier</td><td class="a-rl">compteur de parenthèses</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours de la chaîne</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Parentheses</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir un texte parenthésé : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(texte)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> VerifPar(texte) <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Texte correctement parenthésé&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Mauvais parenthésage&quot;</span>)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">texte</td><td class="a-ty">chaine</td><td class="a-rl"></td></tr><tr><td class="a-nm">VerifPar</td><td class="a-ty"><span class="a-kw">fonction</span>/booléen</td><td class="a-rl"></td></tr></table></div></div><p class="a-note">Version 1 du prof : deux compteurs co et cf, et VerifPar ⇐ co = cf.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Interro d'octobre · exercice 3</div><h4>7. Suite de Syracuse</h4><p>On part d'un entier n > 0. S'il est pair, on le divise par 2, sinon on le remplace par 3n + 1, jusqu'à obtenir 1. 1) Écris <span class='f'>fonction NombreValide(n : entier) : booléen</span> (n strictement positif). 2) Écris l'algo Syracuse qui saisit un nombre valide, affiche la suite jusqu'à 1 et le nombre de transformations. Exemple : 12 6 3 10 5 16 8 4 2 1 → 9 transformations. Sans tableau.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Saisie contrôlée avec repeter … jqa NombreValide(nbre). Puis tq nbre ≠ 1, avec un compteur.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">NombreValide(n : entier) : booléen</span></div><div class="a-grid a-solo"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">NombreValide <span class="a-op">⇐</span> n &gt; 0</span></div></div></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Syracuse</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Saisir un entier &gt; 0&quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(nbre)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> NombreValide(nbre)</span></div><div class="a-ln" style="--d:0"><span class="a-c">cpt <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(nbre, <span class="a-st">' '</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> nbre ≠ 1 <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> nbre <span class="a-kw">mod</span> 2 = 0 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">nbre <span class="a-op">←</span> nbre <span class="a-kw">div</span> 2</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">nbre <span class="a-op">←</span> 3 * nbre + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(nbre, <span class="a-st">' '</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c">cpt <span class="a-op">←</span> cpt + 1</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Nombre de transformations : &quot;</span>, cpt)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">nbre</td><td class="a-ty">entier</td><td class="a-rl">valeur de départ puis valeur courante</td></tr><tr><td class="a-nm">cpt</td><td class="a-ty">entier</td><td class="a-rl">nombre de transformations</td></tr><tr><td class="a-nm">NombreValide</td><td class="a-ty"><span class="a-kw">fonction</span>/booléen</td><td class="a-rl"></td></tr></table></div></div><p class="a-note">Avec cette version, si on saisit 1, on obtient 0 transformation.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 3 · fonction, repeter</div><h4>8. Factorielle avec saisie contrôlée</h4><p>Écris <span class='f'>fonction Fact(n : entier) : entier</span> (n! = 1 × 2 × … × n, et 0! = 1), puis un algo qui fait saisir un entier entre 0 et 12 (redemander sinon) et affiche sa factorielle.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Variable récurrente f initialisée à 1. Saisie : repeter … jqa (n ≥ 0) et (n ≤ 12).</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Fact(n : entier) : entier</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">f <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 2 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">f <span class="a-op">←</span> f * i</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">Fact <span class="a-op">⇐</span> f</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">f</td><td class="a-ty">entier</td><td class="a-rl">produit partiel (variable récurrente)</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">compteur</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Factorielle</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Entier entre 0 et 12 : &quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> (n ≥ 0) <span class="a-kw">et</span> (n ≤ 12)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(n, <span class="a-st">&quot;! = &quot;</span>, Fact(n))</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">n</td><td class="a-ty">entier</td><td class="a-rl"></td></tr><tr><td class="a-nm">Fact</td><td class="a-ty"><span class="a-kw">fonction</span>/entier</td><td class="a-rl"></td></tr></table></div></div><p class="a-note">Pour n = 0 ou 1, la boucle de 2 à n ne fait aucun tour : Fact vaut 1.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 3 · piège des paramètres</div><h4>9. PGCD d'Euclide</h4><p>Écris <span class='f'>fonction Pgcd(a, b : entier) : entier</span> avec l'algorithme d'Euclide : tant que b ≠ 0, on remplace (a, b) par (b, a mod b). Le PGCD est le dernier a.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Attention : a et b sont des paramètres d'entrée de la fonction. Tu n'as pas le droit de les modifier.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Pgcd(a, b : entier) : entier</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">x <span class="a-op">←</span> a</span></div><div class="a-ln" style="--d:0"><span class="a-c">y <span class="a-op">←</span> b</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> y ≠ 0 <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">r <span class="a-op">←</span> x <span class="a-kw">mod</span> y</span></div><div class="a-ln" style="--d:1"><span class="a-c">x <span class="a-op">←</span> y</span></div><div class="a-ln" style="--d:1"><span class="a-c">y <span class="a-op">←</span> r</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">Pgcd <span class="a-op">⇐</span> x</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">x, y</td><td class="a-ty">entier</td><td class="a-rl">copies de a et b, qu'on peut modifier</td></tr><tr><td class="a-nm">r</td><td class="a-ty">entier</td><td class="a-rl">reste</td></tr></table></div></div><p class="a-note">Trace avec 48 et 18 : (48, 18) → (18, 12) → (12, 6) → (6, 0), donc Pgcd = 6.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 3 · modes ↓ ↑ ↕</div><h4>10. Modules Echange et MinMax</h4><p>1) Écris <span class='f'>module Echange(↕ a, b : entier)</span> qui échange deux valeurs. 2) Écris <span class='f'>module MinMax(↓ x, y : entier ; ↑ mini, maxi : entier)</span>. 3) Écris l'appel qui range dans p et g le plus petit et le plus grand de n1 et n2.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Pour échanger, il faut une variable temporaire. L'appel d'un module est une instruction.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Echange(<span class="a-md">↕</span> a, b : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">aux <span class="a-op">←</span> a</span></div><div class="a-ln" style="--d:0"><span class="a-c">a <span class="a-op">←</span> b</span></div><div class="a-ln" style="--d:0"><span class="a-c">b <span class="a-op">←</span> aux</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">aux</td><td class="a-ty">entier</td><td class="a-rl">variable temporaire</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">MinMax(<span class="a-md">↓</span> x, y : entier ; <span class="a-md">↑</span> mini, maxi : entier)</span></div><div class="a-grid a-solo"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> x &lt; y <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">mini <span class="a-op">←</span> x</span></div><div class="a-ln" style="--d:2"><span class="a-c">maxi <span class="a-op">←</span> y</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">mini <span class="a-op">←</span> y</span></div><div class="a-ln" style="--d:2"><span class="a-c">maxi <span class="a-op">←</span> x</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-gap"></div><div class="a-ln" style="--d:0"><span class="a-c">Appel : MinMax(n1, n2, p, g)</span></div><div class="a-ln a-gap"></div><div class="a-ln" style="--d:0"><span class="a-c">Sans aux, a <span class="a-op">←</span> b puis b <span class="a-op">←</span> a donnerait deux fois la valeur de b.</span></div></div></div></div></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 3 · variable récurrente</div><h4>11. Suite récurrente</h4><p>On définit u₀ = 2 et uₙ = 3 × uₙ₋₁ − 1. Écris un algo qui lit n et affiche u₀, u₁, …, uₙ.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Une seule variable u, qu'on recalcule à partir d'elle-même à chaque tour.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Suite</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln" style="--d:0"><span class="a-c">u <span class="a-op">←</span> 2</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(u)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">u <span class="a-op">←</span> 3 * u - 1</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(u)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">n</td><td class="a-ty">entier</td><td class="a-rl">rang du dernier terme</td></tr><tr><td class="a-nm">u</td><td class="a-ty">entier</td><td class="a-rl">terme courant (variable récurrente)</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">rang du terme calculé</td></tr></table></div></div><p class="a-note">Pour n = 4 : 2 5 14 41 122.</p></div></div></details></div>
      <h3>4. Tables à une dimension</h3>
      <div class="exo"><div class="eyebrow">Ch. 4 · parcours de table</div><h4>12. Notes : moyenne et au-dessus</h4><p>Écris un algo qui fait saisir le nombre de notes n (entre 1 et 50), les n notes dans une table, puis affiche la moyenne et le nombre de notes strictement au-dessus de la moyenne.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Il faut garder les notes : on ne connaît la moyenne qu'après les avoir toutes lues. Deux parcours.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Notes</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Nombre de notes (1 à &quot;</span>, Nmax, <span class="a-st">&quot;) : &quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> (n ≥ 1) <span class="a-kw">et</span> (n ≤ Nmax)</span></div><div class="a-ln" style="--d:0"><span class="a-c">som <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(TabN[i])</span></div><div class="a-ln" style="--d:1"><span class="a-c">som <span class="a-op">←</span> som + TabN[i]</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">moy <span class="a-op">←</span> som / n</span></div><div class="a-ln" style="--d:0"><span class="a-c">cpt <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> TabN[i] &gt; moy <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">cpt <span class="a-op">←</span> cpt + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Moyenne : &quot;</span>, moy, <span class="a-st">&quot; ; au-dessus : &quot;</span>, cpt)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">Nmax</td><td class="a-ty"><span class="a-kw">cste</span>/entier = 50</td><td class="a-rl">taille physique</td></tr><tr><td class="a-nm">T_Notes</td><td class="a-ty"><span class="a-kw">type</span> = <span class="a-kw">table</span> [1..Nmax] réel</td><td class="a-rl"></td></tr><tr><td class="a-nm">TabN</td><td class="a-ty">T_Notes</td><td class="a-rl">les notes</td></tr><tr><td class="a-nm">n</td><td class="a-ty">entier</td><td class="a-rl">nombre de notes effectives</td></tr><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours</td></tr><tr><td class="a-nm">som, moy</td><td class="a-ty">réel</td><td class="a-rl"></td></tr><tr><td class="a-nm">cpt</td><td class="a-ty">entier</td><td class="a-rl">notes au-dessus de la moyenne</td></tr></table></div></div></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 4 · module à 2 résultats</div><h4>13. Maximum et sa position</h4><p>Écris <span class='f'>module MaxPos(↓ T : T_Notes ; ↓ n : entier ; ↑ vmax : réel ; ↑ pos : entier)</span> qui donne la plus grande valeur et sa première position.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Deux résultats : ce ne peut pas être une fonction. Pars de T[1] et compare à partir de 2.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">MaxPos(<span class="a-md">↓</span> T : T_Notes ; <span class="a-md">↓</span> n : entier ; <span class="a-md">↑</span> vmax : réel ; <span class="a-md">↑</span> pos : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">vmax <span class="a-op">←</span> T[1]</span></div><div class="a-ln" style="--d:0"><span class="a-c">pos <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 2 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> T[i] &gt; vmax <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">vmax <span class="a-op">←</span> T[i]</span></div><div class="a-ln" style="--d:2"><span class="a-c">pos <span class="a-op">←</span> i</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours</td></tr></table></div></div><p class="a-note">Le &gt; strict garde la première position en cas d'égalité.</p></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 4 · tq et trouve</div><h4>14. Recherche dans une table</h4><p>Écris <span class='f'>fonction Position(T : T_Notes ; n : entier ; x : réel) : entier</span> qui renvoie la position de la première case égale à x, ou 0 si x n'est pas dans la table.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Le schéma du cours : tq (i ≤ n) et non trouve. Après la boucle, trouve dit si i est la bonne position.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Position(T : T_Notes ; n : entier ; x : réel) : entier</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">i <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">faux</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> (i ≤ n) <span class="a-kw">et</span> <span class="a-kw">non</span> trouve <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> T[i] = x <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">vrai</span></span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">i <span class="a-op">←</span> i + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> trouve <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">res <span class="a-op">←</span> i</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">res <span class="a-op">←</span> 0</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">Position <span class="a-op">⇐</span> res</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours</td></tr><tr><td class="a-nm">trouve</td><td class="a-ty">booléen</td><td class="a-rl"></td></tr><tr><td class="a-nm">res</td><td class="a-ty">entier</td><td class="a-rl">position trouvée ou 0</td></tr></table></div></div></div></div></details></div>
      <div class="exo"><div class="eyebrow">Ch. 4 · paramètre ↕</div><h4>15. Inverser une table</h4><p>Écris <span class='f'>module Inverser(↕ T : T_Notes ; ↓ n : entier)</span> qui met la table à l'envers (la 1re case devient la dernière…).</p>
        <details class="corr-d"><summary>Un indice</summary><p>On échange T[i] et T[n − i + 1], seulement jusqu'à la moitié, sinon on remet tout à l'endroit.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Inverser(<span class="a-md">↕</span> T : T_Notes ; <span class="a-md">↓</span> n : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">div</span> 2 <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">aux <span class="a-op">←</span> T[i]</span></div><div class="a-ln" style="--d:1"><span class="a-c">T[i] <span class="a-op">←</span> T[n - i + 1]</span></div><div class="a-ln" style="--d:1"><span class="a-c">T[n - i + 1] <span class="a-op">←</span> aux</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de la moitié gauche</td></tr><tr><td class="a-nm">aux</td><td class="a-ty">réel</td><td class="a-rl">variable temporaire</td></tr></table></div></div><p class="a-note">Avec n impair, la case du milieu ne bouge pas.</p></div></div></details></div>
      <h3>5. Tables à plusieurs dimensions</h3>
      <div class="exo"><div class="eyebrow">Ch. 5 · table à 2 dimensions</div><h4>16. Somme de chaque ligne</h4><p>Écris un algo qui lit nl et nc, remplit une table d'entiers nl × nc, puis affiche la somme de chaque ligne et le plus grand élément de toute la table.</p>
        <details class="corr-d"><summary>Un indice</summary><p>Double boucle. s ← 0 au début de chaque ligne. Le max démarre à M[1, 1].</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">SommesLignes</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(nl, nc)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> l <span class="a-op">←</span> 1 <span class="a-kw">à</span> nl <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">pour</span> c <span class="a-op">←</span> 1 <span class="a-kw">à</span> nc <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">lire</span>(M[l, c])</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">vmax <span class="a-op">←</span> M[1, 1]</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> l <span class="a-op">←</span> 1 <span class="a-kw">à</span> nl <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">s <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">pour</span> c <span class="a-op">←</span> 1 <span class="a-kw">à</span> nc <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">s <span class="a-op">←</span> s + M[l, c]</span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">si</span> M[l, c] &gt; vmax <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:3"><span class="a-c">vmax <span class="a-op">←</span> M[l, c]</span></div><div class="a-ln a-end" style="--d:2"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Ligne &quot;</span>, l, <span class="a-st">&quot; : &quot;</span>, s)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Plus grand élément : &quot;</span>, vmax)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">Lmax</td><td class="a-ty"><span class="a-kw">cste</span>/entier = 20</td><td class="a-rl"></td></tr><tr><td class="a-nm">Cmax</td><td class="a-ty"><span class="a-kw">cste</span>/entier = 20</td><td class="a-rl"></td></tr><tr><td class="a-nm">T_Mat</td><td class="a-ty"><span class="a-kw">type</span> = <span class="a-kw">table</span> [1..Lmax, 1..Cmax] entier</td><td class="a-rl"></td></tr><tr><td class="a-nm">M</td><td class="a-ty">T_Mat</td><td class="a-rl"></td></tr><tr><td class="a-nm">nl, nc</td><td class="a-ty">entier</td><td class="a-rl">nombre effectif de lignes et de colonnes</td></tr><tr><td class="a-nm">l, c</td><td class="a-ty">entier</td><td class="a-rl">indices</td></tr><tr><td class="a-nm">s</td><td class="a-ty">entier</td><td class="a-rl">somme de la ligne courante</td></tr><tr><td class="a-nm">vmax</td><td class="a-ty">entier</td><td class="a-rl">plus grand élément</td></tr></table></div></div></div></div></details></div>
      <h3>6. Types scalaires et intervalles</h3>
      <div class="exo"><div class="eyebrow">Ch. 6 · énuméré, intervalle</div><h4>17. Jours de la semaine</h4><p>Avec <span class='f'>T_Jour (type) = (lundi, …, dimanche)</span> : 1) écris <span class='f'>fonction JourSuivant(j : T_Jour) : T_Jour</span> (après dimanche, lundi). 2) Avec <span class='f'>T_Heures (type) = table [T_Jour] réel</span>, écris une fonction qui renvoie le total des heures du lundi au vendredi.</p>
        <details class="corr-d"><summary>Un indice</summary><p>succ(dimanche) n'existe pas : cas à part. Pour les jours ouvrables, crée l'intervalle lundi..vendredi ou boucle de lundi à vendredi.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">JourSuivant(j : T_Jour) : T_Jour</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> j = dimanche <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">res <span class="a-op">←</span> lundi</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">res <span class="a-op">←</span> succ(j)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">JourSuivant <span class="a-op">⇐</span> res</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">res</td><td class="a-ty">T_Jour</td><td class="a-rl"></td></tr></table></div></div><p class="a-note">T_Ouvrable (type) = lundi..vendredi</p></div><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">HeuresSemaine(H : T_Heures) : réel</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">tot <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> lundi <span class="a-kw">à</span> vendredi <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">tot <span class="a-op">←</span> tot + H[j]</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">HeuresSemaine <span class="a-op">⇐</span> tot</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">j</td><td class="a-ty">T_Ouvrable</td><td class="a-rl">jour courant</td></tr><tr><td class="a-nm">tot</td><td class="a-ty">réel</td><td class="a-rl">total des heures</td></tr></table></div></div></div></div></details></div>
      <h3>7. Structures et construction d'un type</h3>
      <div class="exo"><div class="eyebrow">Ch. 7 · structures</div><h4>18. Promo : major et admis</h4><p><div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Etudiant (<span class="a-kw">type</span>) = <span class="a-kw">structure</span> (nom, prenom (chaine) ; moy (réel))</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Promo (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..Nbemax] T_Etudiant</span></div></div></div></div>1) Écris un module qui affiche le nom de chaque étudiant admis (moy ≥ 10). 2) Écris une fonction qui renvoie l'indice du major (meilleure moyenne).</p>
        <details class="corr-d"><summary>Un indice</summary><p>Notation pointée : Promo[i].moy. Pour le major, garde l'indice, pas la moyenne.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Admis(<span class="a-md">↓</span> P : T_Promo ; <span class="a-md">↓</span> nbe : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> nbe <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> P[i].moy ≥ 10 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">ecrire</span>(P[i].prenom, <span class="a-st">&quot; &quot;</span>, P[i].nom)</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl"></td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Major(P : T_Promo ; nbe : entier) : entier</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">imax <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 2 <span class="a-kw">à</span> nbe <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> P[i].moy &gt; P[imax].moy <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">imax <span class="a-op">←</span> i</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">Major <span class="a-op">⇐</span> imax</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i, imax</td><td class="a-ty">entier</td><td class="a-rl"></td></tr></table></div></div><p class="a-note">Dans le principal : m ← Major(Promo, nbe)<br>ecrire(&quot;Major : &quot;, Promo[m].nom)</p></div></div></details></div>
      <h3>8. Portée et visibilité</h3>
      <div class="exo"><div class="eyebrow">Ch. 8 · portée et visibilité</div><h4>19. Qu'affiche l'algorithme ?</h4><p><div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Principal</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">a <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c">b <span class="a-op">←</span> 2</span></div><div class="a-ln" style="--d:0"><span class="a-c">M1(a)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(a, b)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">a, b</td><td class="a-ty">entier</td><td class="a-rl">globales</td></tr><tr><td class="a-nm">M1</td><td class="a-ty"><span class="a-kw">module</span></td><td class="a-rl"></td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">M1(<span class="a-md">↕</span> x : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">b <span class="a-op">←</span> 10</span></div><div class="a-ln" style="--d:0"><span class="a-c">x <span class="a-op">←</span> x + b</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">b</td><td class="a-ty">entier</td><td class="a-rl">locale à M1</td></tr></table></div></div></div></div>1) Qu'affiche l'algorithme ? 2) Et si on enlève la déclaration de b dans le Lexique de M1 ?</p>
        <details class="corr-d"><summary>Un indice</summary><p>Dans M1, quel b est visible ? x est relié à a par le mode ↕.</p></details>
        <details class="corr-d"><summary>Le corrigé</summary><div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">1) Affichage : 11 2</span></div><div class="a-ln" style="--d:1"><span class="a-c">Dans M1, b désigne la locale (elle masque la globale) : b local = 10.</span></div><div class="a-ln" style="--d:1"><span class="a-c">x est lié <span class="a-kw">à</span> a (<span class="a-md">↕</span>) : x <span class="a-op">←</span> 1 + 10 = 11, donc a = 11.</span></div><div class="a-ln" style="--d:1"><span class="a-c">Le b global n'a <span class="a-kw">pas</span> été touché : il vaut toujours 2.</span></div><div class="a-ln a-gap"></div><div class="a-ln" style="--d:0"><span class="a-c">2) Affichage : 11 10</span></div><div class="a-ln" style="--d:1"><span class="a-c">Sans locale, le b visible dans M1 est le b global :</span></div><div class="a-ln" style="--d:1"><span class="a-c">b <span class="a-op">←</span> 10 modifie la globale, <span class="a-kw">et</span> a = 1 + 10 = 11.</span></div></div></div></div></details></div>
    </article>
  </section>

  <section id="tab-a3" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="a3" data-noedit>
      <h2>R1.01 · Examen blanc</h2>
      <p class="muted">À faire sur papier en 1 h 20, comme le jour J. Lance le chrono, ne regarde le corrigé qu'à la fin. Version PDF à imprimer : dossier <b>Fiches de révision</b> (« R1.01 Init Dev - examen blanc + corrigé.pdf »).</p>
      <div class="atimer"><output id="a3t" aria-live="off">1:20:00</output><button type="button" class="btn" id="a3go">Lancer le chrono</button><button type="button" class="btn ghost" id="a3reset">Remettre à 1 h 20</button></div>
<div class="ex-sujet">
<p class="ex-meta">Durée 1 h 20 · comme au contrôle 1 : documents papier Cours/TD/TP autorisés, rien de numérique · barème sur 20, indicatif · écris chaque algorithme avec son <b>Ord</b> et son <b>Lexique</b>.</p>

<h3>Exercice 1 · Cours et traces <span class="pts">4 pts</span></h3>
<p>1) Qu'affiche cet algorithme ? Donne la valeur de chaque variable à la fin.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">a <span class="a-op">←</span> 17</span></div><div class="a-ln" style="--d:0"><span class="a-c">b <span class="a-op">←</span> 5</span></div><div class="a-ln" style="--d:0"><span class="a-c">q <span class="a-op">←</span> a <span class="a-kw">div</span> b</span></div><div class="a-ln" style="--d:0"><span class="a-c">r <span class="a-op">←</span> a <span class="a-kw">mod</span> b</span></div><div class="a-ln" style="--d:0"><span class="a-c">c <span class="a-op">←</span> (r = 2) <span class="a-kw">ou</span> (q &gt; 4)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> q <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">a <span class="a-op">←</span> a - b</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(q, r, c, a)</span></div></div></div></div>
<p>2) Écris la négation de la condition <span class="f">(x &gt; 0) et (y ≠ 5)</span> sans utiliser <span class="f">non</span>.</p>
<p>3) Combien de fois « ok » est-il affiché par chacun des deux morceaux ? Justifie.</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">i <span class="a-op">←</span> 10                      i <span class="a-op">←</span> 10</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span>                     <span class="a-kw">tq</span> i &lt; 10 <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;ok&quot;</span>)              | <span class="a-kw">ecrire</span>(<span class="a-st">&quot;ok&quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c">i <span class="a-op">←</span> i + 1                 | i <span class="a-op">←</span> i + 1</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> i ≥ 10                  <span class="a-kw">ftq</span></span></div></div></div></div>
<p>4) Peut-on écrire <span class="f">cas moyenne parmi</span> avec <span class="f">moyenne (réel)</span> ? Pourquoi ?</p>

<h3>Exercice 2 · Chaînes et fonction <span class="pts">5 pts</span></h3>
<p>Un palindrome se lit pareil dans les deux sens : « radar », « kayak », « elle ».</p>
<p>1) Écris la fonction <span class="f">fonction Palindrome(ch : chaine) : booléen</span>. Elle doit s'arrêter dès qu'elle trouve deux caractères différents.</p>
<p>2) Écris un algorithme <span class="f">Mots</span> qui fait saisir des mots jusqu'à ce que l'utilisateur tape <span class="f">fin</span> (le mot « fin » n'est pas compté), puis affiche combien de palindromes ont été saisis.</p>

<h3>Exercice 3 · Températures de la semaine <span class="pts">6 pts</span></h3>
<p>On utilise les types suivants :</p>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Jour (<span class="a-kw">type</span>) = (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Temp (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [T_Jour] réel</span></div></div></div></div>
<p>1) Écris le module <span class="f">Saisie(↑ T : T_Temp)</span> qui fait saisir la température de chaque jour.</p>
<p>2) Écris la fonction <span class="f">MoyenneSemaine(T : T_Temp) : réel</span>.</p>
<p>3) Écris le module <span class="f">PlusChaud(↓ T : T_Temp ; ↑ jmax : T_Jour)</span> qui donne le jour le plus chaud (le premier en cas d'égalité).</p>
<p>4) Écris l'algorithme principal qui saisit les températures, affiche la moyenne, le jour le plus chaud et le nombre de jours où il a fait plus chaud que la moyenne.</p>

<h3>Exercice 4 · Stock d'un magasin <span class="pts">5 pts</span></h3>
<div class="algo"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Nmax (<span class="a-kw">cste</span>/entier = 100)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Article (<span class="a-kw">type</span>) = <span class="a-kw">structure</span> (ref (chaine) ; prix (réel) ; qte (entier))</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Stock (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..Nmax] T_Article</span></div></div></div></div>
<p>1) Écris la fonction <span class="f">ValeurStock(S : T_Stock ; n : entier) : réel</span> qui renvoie la somme des prix × quantités des n articles.</p>
<p>2) Écris le module <span class="f">Ruptures(↓ S : T_Stock ; ↓ n : entier ; ↑ nb : entier)</span> qui affiche la référence de chaque article en rupture (quantité 0) et renvoie leur nombre.</p>
<p>3) Dans le module Ruptures, on déclare <span class="f">n (entier)</span> dans le Lexique en plus du paramètre n. Que se passe-t-il ? (portée et visibilité)</p>
</div>
      <h3>Corrigé</h3>
      <details class="corr-d"><summary>Afficher le corrigé (après le chrono)</summary>
<div class="ex-corrige">
<h4 class="sub">Exercice 1</h4>
<p>1) q = 17 div 5 = <b>3</b>, r = 17 mod 5 = <b>2</b>, c = (2 = 2) ou (3 &gt; 4) = vrai ou faux = <b>vrai</b>. La boucle fait 3 tours : a passe de 17 à 12, 7, puis <b>2</b>. Affichage : <span class="f">3 2 vrai 2</span>. À la fin b = 5 et i = 3.</p>
<p>2) Par De Morgan : non ((x &gt; 0) et (y ≠ 5)) ⇔ <b>(x ≤ 0) ou (y = 5)</b>.</p>
<p>3) Avec <span class="f">repeter</span> : <b>1 fois</b>. Le corps s'exécute avant le test, puis i = 11 ≥ 10 donc on s'arrête. Avec <span class="f">tq</span> : <b>0 fois</b>, car 10 &lt; 10 est faux dès le premier test.</p>
<p>4) <b>Non.</b> La variable d'un <span class="f">cas … parmi</span> doit être de type scalaire (entier, caractère, booléen, énuméré). Un réel n'est pas discret : il faut des <span class="f">si … sinonsi</span>.</p>

<h4 class="sub">Exercice 2</h4>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Palindrome(ch : chaine) : booléen</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">i <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c">j <span class="a-op">←</span> longueur(ch)</span></div><div class="a-ln" style="--d:0"><span class="a-c">ok <span class="a-op">←</span> <span class="a-kw">vrai</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> (i &lt; j) <span class="a-kw">et</span> ok <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> ch[i] ≠ ch[j] <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">ok <span class="a-op">←</span> <span class="a-kw">faux</span></span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">i <span class="a-op">←</span> i + 1</span></div><div class="a-ln" style="--d:2"><span class="a-c">j <span class="a-op">←</span> j - 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">Palindrome <span class="a-op">⇐</span> ok</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i, j</td><td class="a-ty">entier</td><td class="a-rl">indices qui avancent de chaque côté</td></tr><tr><td class="a-nm">ok</td><td class="a-ty">booléen</td><td class="a-rl">vrai tant qu'on n'a pas trouvé de différence</td></tr></table></div></div></div></div>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Mots</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">nb <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Mot (fin pour arrêter) : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(mot)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> mot ≠ <span class="a-st">&quot;fin&quot;</span> <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> Palindrome(mot) <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">nb <span class="a-op">←</span> nb + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Mot (fin pour arrêter) : &quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(mot)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(nb, <span class="a-st">&quot; palindrome(s)&quot;</span>)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">mot</td><td class="a-ty">chaine</td><td class="a-rl">mot saisi</td></tr><tr><td class="a-nm">nb</td><td class="a-ty">entier</td><td class="a-rl">nombre de palindromes</td></tr><tr><td class="a-nm">Palindrome</td><td class="a-ty"><span class="a-kw">fonction</span>/booléen</td><td class="a-rl"></td></tr></table></div></div></div></div>
<p>Points clés : <b>tq</b> et pas pour (on s'arrête au premier écart), lecture <b>avant</b> la boucle puis à la fin de chaque tour pour ne pas compter « fin ».</p>

<h4 class="sub">Exercice 3</h4>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Saisie(<span class="a-md">↑</span> T : T_Temp)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> lundi <span class="a-kw">à</span> dimanche <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Température de &quot;</span>, j, <span class="a-st">&quot; : &quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(T[j])</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">j</td><td class="a-ty">T_Jour</td><td class="a-rl">jour courant</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">MoyenneSemaine(T : T_Temp) : réel</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">som <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> lundi <span class="a-kw">à</span> dimanche <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">som <span class="a-op">←</span> som + T[j]</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">MoyenneSemaine <span class="a-op">⇐</span> som / 7</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">j</td><td class="a-ty">T_Jour</td><td class="a-rl"></td></tr><tr><td class="a-nm">som</td><td class="a-ty">réel</td><td class="a-rl">somme des températures (variable récurrente)</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">PlusChaud(<span class="a-md">↓</span> T : T_Temp ; <span class="a-md">↑</span> jmax : T_Jour)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">jmax <span class="a-op">←</span> lundi</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> mardi <span class="a-kw">à</span> dimanche <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> T[j] &gt; T[jmax] <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">jmax <span class="a-op">←</span> j</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">j</td><td class="a-ty">T_Jour</td><td class="a-rl"></td></tr></table></div></div></div></div>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Meteo</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Saisie(Temp)</span></div><div class="a-ln" style="--d:0"><span class="a-c">moy <span class="a-op">←</span> MoyenneSemaine(Temp)</span></div><div class="a-ln" style="--d:0"><span class="a-c">PlusChaud(Temp, jchaud)</span></div><div class="a-ln" style="--d:0"><span class="a-c">cpt <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> lundi <span class="a-kw">à</span> dimanche <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> Temp[j] &gt; moy <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">cpt <span class="a-op">←</span> cpt + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Moyenne : &quot;</span>, moy)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Jour le plus chaud : &quot;</span>, jchaud)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Jours au-dessus de la moyenne : &quot;</span>, cpt)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">T_Jour</td><td class="a-ty"><span class="a-kw">type</span> = (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche)</td><td class="a-rl"></td></tr><tr><td class="a-nm">T_Temp</td><td class="a-ty"><span class="a-kw">type</span> = <span class="a-kw">table</span> [T_Jour] réel</td><td class="a-rl"></td></tr><tr><td class="a-nm">Temp</td><td class="a-ty">T_Temp</td><td class="a-rl">températures de la semaine</td></tr><tr><td class="a-nm">moy (réel) ; cpt (entier) ; j, jchaud</td><td class="a-ty">T_Jour</td><td class="a-rl"></td></tr><tr><td class="a-nm">Saisie, PlusChaud (<span class="a-kw">module</span>) ; MoyenneSemaine</td><td class="a-ty"><span class="a-kw">fonction</span>/réel</td><td class="a-rl"></td></tr></table></div></div></div></div>
<p>Le strict <span class="f">&gt;</span> garde le premier jour en cas d'égalité. L'appel de module est une instruction, l'appel de fonction est utilisé dans une affectation.</p>

<h4 class="sub">Exercice 4</h4>
<div class="algo"><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">ValeurStock(S : T_Stock ; n : entier) : réel</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">v <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">v <span class="a-op">←</span> v + S[i].prix * S[i].qte</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln" style="--d:0"><span class="a-c">ValeurStock <span class="a-op">⇐</span> v</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i (entier) ; v</td><td class="a-ty">réel</td><td class="a-rl">valeur cumulée</td></tr></table></div></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Ruptures(<span class="a-md">↓</span> S : T_Stock ; <span class="a-md">↓</span> n : entier ; <span class="a-md">↑</span> nb : entier)</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">nb <span class="a-op">←</span> 0</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> S[i].qte = 0 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">ecrire</span>(S[i].ref)</span></div><div class="a-ln" style="--d:2"><span class="a-c">nb <span class="a-op">←</span> nb + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">i</td><td class="a-ty">entier</td><td class="a-rl">indice de parcours</td></tr></table></div></div></div></div>
<p>3) Un paramètre formel a le statut d'une variable locale du module et <b>ne figure pas dans son Lexique</b>. Déclarer aussi <span class="f">n</span> dans le Lexique, c'est définir deux objets du même nom au même endroit : c'est une <b>erreur</b>. On ne saurait plus quel n est visible.</p>
</div>
      </details>
    </article>
  </section>

  <section id="tab-ax" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r101">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. PDF à imprimer : dossier <b>Fiches de révision</b> (« R1.01 Init Dev - fiche mémento.pdf »). Les documents papier sont autorisés à l'éval.</span></div>
    <div class="fiche-host" data-subj="r101"><div class="pfwrap">
<section class="pf r101" aria-label="Fiche page 1">
  <header class="pf-head">
    <span class="pf-code">R1.01</span>
    <div class="pf-title"><b>Algo : le mémento</b><span>Init Dev · cours de L. Zertal, chapitres 1 à 3</span></div>
    <span class="pf-exam">Éval lun. 9/11<br>8 h 30</span>
  </header>
  <div class="pf-key"><ol>
    <li>Toujours <b>Ord</b> (les instructions) + <b>Lexique</b> (chaque objet avec son type).</li>
    <li>Une variable récurrente s'<b>initialise avant</b> la boucle.</li>
    <li>Paramètres d'une fonction : <b>entrée seulement</b>, jamais modifiés.</li>
    <li>Recherche : <b>tq (i ≤ n) et non trouve</b>, jamais un pour.</li>
  </ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Écrire un algo</h4>
<div class="algo small"><div class="a-unit"><div class="a-head"><span class="a-tag">algo</span><span class="a-sig">Facture</span></div><div class="a-grid"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Abonnement : &quot;</span>)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(mt_abt)</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">lire</span>(px_unite, nb_unites)</span></div><div class="a-ln" style="--d:0"><span class="a-c">px_conso <span class="a-op">←</span> px_unite * nb_unites</span></div><div class="a-ln" style="--d:0"><span class="a-c">montant <span class="a-op">←</span> px_conso + mt_abt</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Montant = &quot;</span>, montant)</span></div></div></div><div class="a-lexw"><div class="a-lbl">Lexique</div><table class="a-lex"><tr><td class="a-nm">mt_abt, px_unite</td><td class="a-ty">réel</td><td class="a-rl"></td></tr><tr><td class="a-nm">nb_unites</td><td class="a-ty">entier</td><td class="a-rl"></td></tr><tr><td class="a-nm">px_conso, montant</td><td class="a-ty">réel</td><td class="a-rl"></td></tr></table></div></div></div></div>
        <p><b>←</b> affectation : la variable de gauche prend la valeur de droite. <span class="m">lire</span> et <span class="m">←</span> modifient la variable, <span class="m">ecrire</span> non.</p>
        <p>Analyse par le résultat : on part du résultat → ordonnancement <b>obligatoire</b>.</p>
      </div>
      <div class="pf-blk"><h4><i>2</i>Conditions</h4>
<div class="a-pair"><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">si</span> cond <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinonsi</span> cond2 <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fsi</span></span></div></div></div></div><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">cas</span> x <span class="a-kw">parmi</span></span></div><div class="a-ln" style="--d:1"><span class="a-case">2</span><span class="a-c">…</span></div><div class="a-ln" style="--d:1"><span class="a-case">3, 4</span><span class="a-c">…</span></div><div class="a-ln" style="--d:1"><span class="a-case">6..20</span><span class="a-c">…</span></div><div class="a-ln" style="--d:1"><span class="a-case"><span class="a-kw">autres</span></span><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fcas</span></span></div></div></div></div></div>
        <p><span class="m">cas … parmi</span> : la variable doit être <b>scalaire</b> (entier, caractère, booléen). Jamais un réel ou une chaîne.</p>
      </div>
      <div class="pf-blk"><h4><i>3</i>Types et opérateurs</h4>
        <table><tr><th>Type</th><th>Opérations</th></tr>
          <tr><td>entier</td><td class="m">+ - * / div mod</td></tr>
          <tr><td>réel</td><td class="m">+ - * /</td></tr>
          <tr><td>caractère 'a'</td><td>comparaison (rang ASCII), <span class="m">|</span></td></tr>
          <tr><td>chaîne "ab"</td><td><span class="m">|</span> concat, <span class="m">longueur(ch)</span>, <span class="m">ch[i]</span></td></tr>
          <tr><td>booléen</td><td class="m">et ou non</td></tr>
        </table>
        <p class="m">17 div 5 = 3 · 17 mod 5 = 2 · 17 / 5 = 3,4</p>
        <p><span class="m">n mod 2 = 0</span> ⇔ n pair.</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>4</i>Booléens</h4>
        <p><span class="hl">non (a et b) ⇔ non a ou non b</span><br><span class="hl">non (a ou b) ⇔ non a et non b</span></p>
        <p><span class="m">si ok</span> ⇔ <span class="m">si ok = vrai</span> · <span class="m">ancien ← nbannees &gt; 3</span> range directement vrai/faux. faux &lt; vrai.</p>
        <p>Scalaire = ordonné et discret : entier, caractère, booléen. <span class="m">succ('B') = 'C'</span>, <span class="m">pred(vrai) = faux</span>.</p>
      </div>
      <div class="pf-blk tint"><h4><i>5</i>Boucles</h4>
<div class="a-pair"><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> cond <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div></div></div></div><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> n <span class="a-kw">à</span> 1 [<span class="a-kw">pas</span> -1]</span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">…</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> cond</span></div></div></div></div></div>
        <ul>
          <li><b>pour</b> : nombre de tours connu.</li>
          <li><b>tq</b> : 0 tour possible, on teste avant.</li>
          <li><b>repeter</b> : <b>au moins 1 tour</b> (saisie contrôlée).</li>
        </ul>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">repeter</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">ecrire</span>(<span class="a-st">&quot;Entier &gt; 0 : &quot;</span>)</span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(n)</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">jqa</span> n &gt; 0</span></div></div></div></div>
      </div>
      <div class="pf-blk"><h4><i>6</i>Modules et fonctions</h4>
<div class="algo small"><div class="a-unit"><div class="a-head"><span class="a-tag">module</span><span class="a-sig">Moyenne(<span class="a-md">↓</span> a, b : réel ; <span class="a-md">↑</span> m : réel)</span></div></div><div class="a-unit"><div class="a-head"><span class="a-tag">fonction</span><span class="a-sig">Carre(x : entier) : entier</span></div><div class="a-grid a-solo"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Carre <span class="a-op">⇐</span> x * x</span></div></div></div></div></div></div>
        <ul>
          <li><span class="m">↓</span> entrée (lu seulement), <span class="m">↑</span> sortie, <span class="m">↕</span> entrée/sortie.</li>
          <li>Formels : séparés par <b>;</b>, mode + type. Effectifs à l'appel : séparés par <b>,</b>, même nombre, même ordre, mêmes types.</li>
          <li>Appel de module = une <b>instruction</b>. Appel de fonction = une <b>valeur</b> (dans un calcul, un si, un ecrire).</li>
          <li>Fonction : un seul résultat, <span class="m">Nom ⇐ valeur</span>. Son nom n'est pas une variable.</li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="pf-foot"><span>R1.01 Init Dev · page 1/2</span><span>Ch. 1 Problème → algo · Ch. 2 Types · Ch. 3 Itérations, modules, fonctions</span></footer>
</section>

<section class="pf r101" aria-label="Fiche page 2">
  <header class="pf-head">
    <span class="pf-code">R1.01</span>
    <div class="pf-title"><b>Tables, types, portée</b><span>Init Dev · chapitres 4 à 8</span></div>
    <span class="pf-exam">Docs papier<br>à vérifier</span>
  </header>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>4</i>Tables à 1 dimension</h4>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">Nmax (<span class="a-kw">cste</span>/entier = 100)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Tab (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..Nmax] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c">Tab (T_Tab)</span></div><div class="a-ln" style="--d:0"><span class="a-c">n (entier) : nb de valeurs effectives</span></div></div></div></div>
        <p>Taille physique (Nmax) ≠ nombre de valeurs stockées (n). Hors de <span class="m">[1..Nmax]</span> : inaccessible. Hors de <span class="m">[1..n]</span> : indéterminé.</p>
<p class="a-cap">Parcours</p><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">lire</span>(Tab[i])</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div><p class="a-cap">Recherche</p><div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">i <span class="a-op">←</span> 1</span></div><div class="a-ln" style="--d:0"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">faux</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">tq</span> (i ≤ n) <span class="a-kw">et</span> <span class="a-kw">non</span> trouve <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">si</span> Tab[i] = x <span class="a-kw">alors</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">trouve <span class="a-op">←</span> <span class="a-kw">vrai</span></span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">sinon</span></span></div><div class="a-ln" style="--d:2"><span class="a-c">i <span class="a-op">←</span> i + 1</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fsi</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">ftq</span></span></div></div></div></div>
        <p>Max : <span class="m">vmax ← Tab[1]</span>, puis <span class="m">pour i ← 2 à n</span>. On n'affecte pas une table à une autre : case par case.</p>
      </div>
      <div class="pf-blk"><h4><i>5</i>Tables à 2 dimensions</h4>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Mat (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..L, 1..C] entier</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> l <span class="a-op">←</span> 1 <span class="a-kw">à</span> nl <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c"><span class="a-kw">pour</span> c <span class="a-op">←</span> 1 <span class="a-kw">à</span> nc <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:2"><span class="a-c"><span class="a-kw">lire</span>(M[l, c])</span></div><div class="a-ln a-end" style="--d:1"><span class="a-c"><span class="a-kw">fpour</span></span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
        <p>Une somme par ligne : <span class="m">s ← 0</span> <b>dans</b> la 1re boucle, avant la 2e.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Variable récurrente</h4>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">somme <span class="a-op">←</span> 0   <span class="a-cm">// avant la boucle</span></span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> i <span class="a-op">←</span> 1 <span class="a-kw">à</span> n <span class="a-kw">faire</span></span></div><div class="a-ln" style="--d:1"><span class="a-c">somme <span class="a-op">←</span> somme + i</span></div><div class="a-ln a-end" style="--d:0"><span class="a-c"><span class="a-kw">fpour</span></span></div></div></div></div>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>6</i>Énumérés et intervalles</h4>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Jour (<span class="a-kw">type</span>) = (lundi, mardi, mercredi,</span></div><div class="a-ln" style="--d:1"><span class="a-c">jeudi, vendredi, samedi, dimanche)</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_We (<span class="a-kw">type</span>) = samedi..dimanche</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Etud (<span class="a-kw">type</span>) = 1..Nbemax</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Heures (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [T_Jour] réel</span></div><div class="a-ln" style="--d:0"><span class="a-c"><span class="a-kw">pour</span> j <span class="a-op">←</span> lundi <span class="a-kw">à</span> dimanche <span class="a-kw">faire</span> …</span></div></div></div></div>
        <p>Les valeurs sont des <b>symboles</b> (pas de guillemets), ordonnées par position : lundi &lt; mardi. <span class="m">succ(lundi) = mardi</span>, <span class="m">succ(dimanche)</span> n'existe pas.</p>
      </div>
      <div class="pf-blk tint"><h4><i>7</i>Structures</h4>
<div class="algo small"><div class="a-unit"><div class="a-lines"><div class="a-ln" style="--d:0"><span class="a-c">T_Etudiant (<span class="a-kw">type</span>) = <span class="a-kw">structure</span> (</span></div><div class="a-ln" style="--d:1"><span class="a-c">nom, prenom (chaine) ;</span></div><div class="a-ln" style="--d:1"><span class="a-c">moy (réel) )</span></div><div class="a-ln" style="--d:0"><span class="a-c">T_Promo (<span class="a-kw">type</span>) = <span class="a-kw">table</span> [1..N] T_Etudiant</span></div><div class="a-ln" style="--d:0"><span class="a-c">Promo (T_Promo)</span></div><div class="a-ln a-gap"></div><div class="a-ln" style="--d:0"><span class="a-c">Promo[i].nom      Promo[i].moy</span></div></div></div></div>
        <p>Notation pointée. <span class="m">E1 ← E2</span> copie toute la structure (même type).</p>
      </div>
      <div class="pf-blk"><h4><i>8</i>Portée et visibilité</h4>
        <ul>
          <li>Globale : déclarée dans l'algo principal, utilisable dans tous ses modules.</li>
          <li>Locale : déclarée dans un module, utilisable dans ce module et ses sous-modules. Un paramètre formel est local.</li>
          <li>Une locale <b>masque</b> une globale du même nom : dans le module, le nom désigne la locale.</li>
        </ul>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges qui coûtent des points</h4>
        <ul>
          <li>Oublier le <b>Lexique</b> ou le type d'une variable.</li>
          <li>Modifier un paramètre de fonction (copie-le d'abord).</li>
          <li><span class="m">'a'</span> caractère ≠ <span class="m">"a"</span> chaîne.</li>
          <li>Compteur pas remis à 0, ou remis à 0 au mauvais endroit.</li>
          <li><span class="m">pour</span> pour une recherche : on ne peut pas s'arrêter.</li>
          <li>Boucle <span class="m">tq</span> dont la condition ne change jamais.</li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="pf-foot"><span>R1.01 Init Dev · page 2/2</span><span>Ch. 4-5 Tables · Ch. 6 Énumérés · Ch. 7 Structures · Ch. 8 Portée</span></footer>
</section>
</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r101"></div>
  </section>

  <!-- ============ R1.03 : COURS CODAGE & ARITHMÉTIQUE ============ -->
  <section id="tab-k1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="k1">
      <h2>R1.03 · Codage et arithmétique des processeurs</h2>
      <p class="muted">Éval mercredi 18/11, 13 h 30 – 15 h 20 : 1 h de pratique sous Windows / PowerShell 7 (sujets TP1 et TP2 et tes comptes rendus autorisés, pas d'Internet ni d'IA), puis un QCM Moodle de 15 min (15 questions à choix unique, sans document, une seule tentative).</p>
      <div class="box method"><b>Méthode : compter les octets UTF-8</b>
        <div class="utfm"><b>1</b><span>ASCII : lettres sans accent, chiffres, ponctuation et <b>espace</b></span><b>2</b><span>lettres accentuées : é è à ç ë Ç ô…</span><b>3</b><span>symboles : € ☕ ✓</span><b>4</b><span>emojis : 😊 👋</span></div>
        On additionne caractère par caractère : « Allô 😊 » = A 1 + l 1 + l 1 + ô 2 + espace 1 + 😊 4 = <b>10 octets</b> pour 6 caractères. Si c'est un <b>fichier</b> créé par echo, on ajoute la fin de ligne : <b>+1</b> (LF, Fedora) ou <b>+2</b> (CRLF, PowerShell 7 sous Windows), soit 11 ou 12 octets.</div>

      <h3>1. Notation positionnelle</h3>
      <p>Chaque position vaut une puissance de la base, en partant de 0 à droite.</p>
      <div class="formula-list">
        <span class="f">101011₂</span><span>= 32 + 8 + 2 + 1 = <b>43</b></span>
        <span class="f">B0A₁₆</span><span>= 11 × 256 + 0 × 16 + 10 = <b>2 826</b></span>
        <span class="f">n bits</span><span>2ⁿ combinaisons. Non signé : de 0 à 2ⁿ − 1 (8 bits : 0 à 255).</span>
      </div>
      <ul>
        <li><b>Hexadécimal</b> : chiffres 0 à 9 puis A = 10 … F = 15, préfixe <span class="f">0x</span>.</li>
        <li><b>1 chiffre hexa = 4 bits</b>, donc <b>1 octet = 2 chiffres hexa</b> : <span class="f">1101 0110₂ = 0xD6</span>.</li>
        <li>Décimal vers binaire : divisions successives par 2 (on lit les restes de bas en haut), ou on retire les puissances de 2 : 200 = 128 + 64 + 8 → <span class="f">1100 1000</span>.</li>
      </ul>
      <div class="box method">Binaire ↔ hexa : on coupe en paquets de 4 bits <b>en partant de la droite</b>, chaque paquet donne un chiffre hexa. <span class="f">0x3F = 0011 1111</span>.</div>

      <h3>2. Entiers signés : complément à deux</h3>
      <ul>
        <li>Opposé d'un nombre : <b>inverser tous les bits, puis ajouter 1</b>. 5 = <span class="f">0000 0101</span> → <span class="f">1111 1010</span> + 1 = <span class="f">1111 1011</span> = −5.</li>
        <li>Plage sur n bits : <b>−2ⁿ⁻¹ à 2ⁿ⁻¹ − 1</b>. 8 bits : −128 à 127 ; 4 bits : −8 à 7 ; 5 bits : −16 à 15.</li>
        <li>Le bit de gauche vaut 1 pour un négatif. Un seul zéro (<span class="f">0000 0000</span>).</li>
      </ul>
      <div class="tscroll"><table class="tt">
        <tr><th>Mot de 8 bits</th><th>Non signé</th><th>Signé (complément à deux)</th></tr>
        <tr><td class="f">0111 1111</td><td>127</td><td>127</td></tr>
        <tr><td class="f">1000 0000</td><td>128</td><td>−128</td></tr>
        <tr><td class="f">1111 0000</td><td>240</td><td>−16</td></tr>
        <tr><td class="f">1111 1111</td><td>255</td><td>−1</td></tr>
      </table></div>
      <div class="box trap">Un même mot a deux lectures : <b>précise toujours signé ou non signé</b>. Lire <span class="f">1111 1111</span> « 255 » sans le dire est une erreur classique. Valeur signée d'un mot qui commence par 1 : valeur non signée − 256 (sur 8 bits).</div>

      <h3>3. Addition, carry et overflow</h3>
      <ul>
        <li><b>Carry</b> (retenue) : le 9ᵉ bit qui sort d'une addition sur 8 bits. Il signale un dépassement <b>en non signé</b>. Le résultat garde seulement les 8 bits de droite.</li>
        <li><b>Overflow</b> (dépassement signé) : deux positifs donnent un négatif, ou deux négatifs donnent un positif. Deux nombres de signes différents ne font <b>jamais</b> d'overflow.</li>
        <li>Carry et overflow sont <b>indépendants</b> : on peut avoir l'un sans l'autre.</li>
      </ul>
      <div class="tscroll"><table class="tt">
        <tr><th>Calcul</th><th>Résultat</th><th>Carry</th><th>Overflow</th><th>Pourquoi</th></tr>
        <tr><td class="f">0101 + 0011</td><td class="f">1000</td><td>0</td><td>oui</td><td>5 + 3 = 8 &gt; 7 (4 bits signés)</td></tr>
        <tr><td class="f">1011 + 0110</td><td class="f">0001</td><td>1</td><td>non</td><td>signes différents</td></tr>
        <tr><td class="f">1111 + 1111</td><td class="f">1110</td><td>1</td><td>non</td><td>−1 + −1 = −2</td></tr>
        <tr><td class="f">0111 0110 + 0100 0011</td><td class="f">1011 1001</td><td>0</td><td>oui</td><td>118 + 67 = 185 &gt; 127</td></tr>
        <tr><td class="f">1111 1111 + 0000 0001</td><td class="f">0000 0000</td><td>1</td><td>non</td><td>255 + 1 = 256 en non signé ; −1 + 1 = 0 en signé</td></tr>
        <tr><td class="f">0111 1111 + 0000 0001</td><td class="f">1000 0000</td><td>0</td><td>oui</td><td>127 + 1 sort de [−128 ; 127]</td></tr>
      </table></div>
      <p><b>Soustraction</b> = addition du complément à deux : <span class="f">0101 − 0011</span> → <span class="f">0101 + 1101 = 0010</span> (2, on jette le carry). <span class="f">0010 1010 − 0011 1100 = 1110 1110</span> (−18). <span class="f">0000 1111 − 0001 0000 = 1111 1111</span> (−1).</p>
      <div class="box trap">Erreurs typiques : garder un 9ᵉ bit sur un mot de 8 bits ; dire « overflow » dès qu'il y a un carry ; oublier de dire si on lit en signé ou non signé.</div>

      <h3>4. Virgule flottante IEEE 754</h3>
      <div class="formula-list">
        <span class="f">simple (32 bits)</span><span>1 bit de signe + 8 bits d'exposant + 23 bits de fraction, biais <b>127</b></span>
        <span class="f">double (64 bits)</span><span>1 + 11 + 52, biais <b>1023</b></span>
        <span class="f">valeur</span><span>(−1)<sup>s</sup> × 1,F × 2<sup>E</sup> avec <b>E = e − 127</b> ; le 1 avant la virgule est <b>implicite</b> (pas stocké)</span>
      </div>
      <ul>
        <li>Fractions binaires : <span class="f">10,1₂ = 2,5</span> · <span class="f">0,011₂ = 0,375</span> · <span class="f">101,101₂ = 5,625</span> · <span class="f">0,0001₂ = 0,0625</span>.</li>
        <li>Partie décimale → binaire : multiplier par 2 et garder la partie entière à chaque étape. 0,625 → 1,25 (1) → 0,5 (0) → 1 (1) : <span class="f">0,101₂</span>.</li>
        <li>Normaliser : <span class="f">101,101₂ = 1,01101 × 2²</span> ; <span class="f">0,00101₂ = 1,01 × 2⁻³</span>.</li>
      </ul>
      <div class="box method"><b>Encoder</b> x : signe → binaire → normaliser 1,F × 2<sup>E</sup> → e = E + 127 sur 8 bits → F complétée par des 0 sur 23 bits → regrouper en hexa.<br>5,75 = 101,11₂ = 1,0111 × 2² → s = 0, e = 129 = <span class="f">1000 0001</span>, F = <span class="f">0111 0…</span> → <span class="f">0 10000001 0111000…</span> = <b>0x40B80000</b>.</div>
      <div class="box exm"><b>Décoder</b> <span class="f">0 | 10000001 | 0110…</span> : e = 129 donc E = 2, 1,011₂ = 1,375, 1,375 × 4 = <b>5,5</b>.<br>
        <span class="f">1 | 10000010 | 0100…</span> → −1,25 × 8 = <b>−10</b> · <span class="f">0 | 01111101 | 0110…</span> → 1,375 × 2⁻² = <b>0,34375</b> · <span class="f">1 | 01111110 | 1000…</span> → −1,5 × 2⁻¹ = <b>−0,75</b> · <span class="f">0 | 10000000 | 1000…</span> → 1,5 × 2 = <b>3</b>.<br>
        Autres codages : 12,375 = <span class="f">0x41460000</span> · −0,15625 = <span class="f">0xBE200000</span> · −7,5 = <span class="f">0xC0F00000</span>.</div>
      <div class="tscroll"><table class="tt">
        <tr><th>Exposant</th><th>Fraction</th><th>Valeur</th></tr>
        <tr><td class="f">0000 0000</td><td>0</td><td>±0</td></tr>
        <tr><td class="f">0000 0000</td><td>≠ 0</td><td>dénormalisé (très petit, pas de 1 implicite)</td></tr>
        <tr><td class="f">1111 1111</td><td>0</td><td>±∞</td></tr>
        <tr><td class="f">1111 1111</td><td>≠ 0</td><td>NaN (ex. 0/0)</td></tr>
      </table></div>
      <div class="box trap">0,1 = <span class="f">0,000110011001100…₂</span> : le motif 0011 se répète à l'infini, la valeur stockée est arrondie (en simple : 0,10000000149011612). 0,5 = <span class="f">0,1₂</span> est exact. Un décimal fini n'a pas toujours une écriture binaire finie. On compare des flottants avec une tolérance <span class="f">|x − y| &lt; ε</span>, jamais avec ==.<br>Autres pièges : confondre e (stocké) et E (réel) ; mettre le 1 implicite dans F ; oublier le bit de signe.</div>
    </article>
  </section>

  <!-- ============ R1.03 : TP1 & TP2, COMMANDES ============ -->
  <section id="tab-k2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="k2">
      <h2>R1.03 · TP1 et TP2 : les commandes</h2>
      <p class="muted">La partie pratique se fait sous Windows avec PowerShell 7. Le QCM interroge aussi sur Fedora : connais les deux colonnes.</p>
      <div class="box method"><b>Méthode : compter les octets UTF-8</b>
        <div class="utfm"><b>1</b><span>ASCII : lettres sans accent, chiffres, ponctuation et <b>espace</b></span><b>2</b><span>lettres accentuées : é è à ç ë Ç ô…</span><b>3</b><span>symboles : € ☕ ✓</span><b>4</b><span>emojis : 😊 👋</span></div>
        On additionne caractère par caractère : « Allô 😊 » = A 1 + l 1 + l 1 + ô 2 + espace 1 + 😊 4 = <b>10 octets</b> pour 6 caractères. Si c'est un <b>fichier</b> créé par echo, on ajoute la fin de ligne : <b>+1</b> (LF, Fedora) ou <b>+2</b> (CRLF, PowerShell 7 sous Windows), soit 11 ou 12 octets.</div>

      <h3>1. TP1 : anatomie d'un ordinateur</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Info</th><th>PowerShell (Windows 11)</th><th>Fedora (Bash)</th></tr>
        <tr><td>Date, machine, utilisateur, dossier</td><td class="f">Get-Date, hostname, whoami, Get-Location</td><td class="f">date, hostname, whoami, pwd</td></tr>
        <tr><td>Système, architecture</td><td><span class="f">Get-ComputerInfo | Select-Object</span> WindowsProductName, WindowsVersion, OsArchitecture, CsSystemType</td><td><span class="f">cat /etc/os-release</span> ; <span class="f">uname -m</span> (architecture, ex. x86_64) ; <span class="f">uname -r</span> (noyau)</td></tr>
        <tr><td>Processeur</td><td><span class="f">Get-CimInstance Win32_Processor</span> (Name, NumberOfCores, NumberOfLogicalProcessors, MaxClockSpeed)</td><td class="f">lscpu</td></tr>
        <tr><td>RAM</td><td><span class="f">Get-CimInstance Win32_ComputerSystem</span> : TotalPhysicalMemory en octets (÷ 1GB → Gio)</td><td class="f">free -h</td></tr>
        <tr><td>Disque physique</td><td><span class="f">Get-PhysicalDisk</span> (FriendlyName, MediaType, Size, HealthStatus)</td><td class="f">lsblk -o NAME,SIZE,TYPE,FSTYPE,MOUNTPOINTS,MODEL</td></tr>
        <tr><td>Volumes, systèmes de fichiers</td><td><span class="f">Get-Volume</span> (DriveLetter, FileSystem, Size, SizeRemaining)</td><td class="f">lsblk -f</td></tr>
        <tr><td>Périphériques</td><td class="f">Get-PnpDevice -PresentOnly (-Class Display, -Class Net)</td><td class="f">lspci</td></tr>
        <tr><td>Réseau</td><td><span class="f">Get-NetAdapter</span> (Name, InterfaceDescription, Status, LinkSpeed)</td><td class="f">ip -br link</td></tr>
      </table></div>
      <p>Outils graphiques Windows : Gestionnaire des tâches, <span class="f">msinfo32</span>, Gestionnaire de périphériques.</p>
      <ul>
        <li><b>Cœurs physiques ≠ processeurs logiques</b> : avec l'hyperthreading, chaque cœur offre 2 processeurs logiques (8 cœurs → 16 logiques).</li>
        <li><b>x86_64 = AMD64 = 64 bits</b>.</li>
        <li><b>Go ≠ Gio</b> : 1 Go = 10⁹ octets, 1 Gio = 2³⁰ octets. Un disque vendu « 512 Go » s'affiche environ 476 Gio.</li>
        <li>Disque physique &gt; partition &gt; volume &gt; système de fichiers (NTFS, ext4, btrfs, FAT32…).</li>
        <li>Hiérarchie mémoire, du plus rapide au plus lent : <b>registres &gt; cache &gt; RAM &gt; SSD</b>. Pour lancer plusieurs machines virtuelles, c'est la RAM qui limite en premier.</li>
        <li>Modèle de <b>von Neumann</b> : processeur (UAL + unité de commande + registres), mémoire, stockage, périphériques d'entrée-sortie, reliés par des bus.</li>
      </ul>

      <h3>2. TP2 : créer un fichier texte et mesurer sa taille</h3>
      <ul>
        <li><span class="f">echo "Café" &gt; accent.txt</span> marche sur les deux systèmes. <span class="f">&gt;</span> crée <b>ou remplace</b> le fichier. Les guillemets ne sont pas écrits dans le fichier.</li>
        <li><b>Fin de ligne</b> : Fedora (Bash) ajoute <b>LF</b> = <span class="f">0a</span> (1 octet). PowerShell 7 sous Windows ajoute <b>CRLF</b> = <span class="f">0D 0A</span> (2 octets). <span class="f">echo -n</span> (Bash) n'ajoute pas de fin de ligne.</li>
        <li>PowerShell 7 écrit en UTF-8 sans BOM. Windows PowerShell 5.1 utilise un autre codage : à éviter. Vérifier la version : <span class="f">$PSVersionTable.PSVersion</span>. Sous Fedora : <span class="f">locale charmap</span> → UTF-8.</li>
      </ul>
      <div class="tscroll"><table class="tt">
        <tr><th>Pour…</th><th>PowerShell</th><th>Fedora</th></tr>
        <tr><td>Taille en octets</td><td><span class="f">Get-Item f | Select-Object Name, Length</span> (Length = octets)</td><td class="f">wc -c fichier</td></tr>
        <tr><td>Voir les octets en hexa</td><td><span class="f">Format-Hex -Path fichier</span> (colonne texte de droite pas fiable en UTF-8)</td><td><span class="f">od -An -tx1 -v fichier</span> (-An sans adresses, -tx1 hexa octet par octet, -v toutes les lignes)</td></tr>
        <tr><td>Dossiers et rendu</td><td class="f">New-Item -ItemType Directory, Copy-Item, Get-ChildItem -Recurse, Compress-Archive</td><td class="f">mkdir -p, cd, pwd</td></tr>
      </table></div>

      <h3>3. UTF-8 : 1 caractère n'est pas toujours 1 octet</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Caractère</th><th>Point de code</th><th>Octets UTF-8</th><th>Nombre</th></tr>
        <tr><td>ASCII (a, Z, 7, espace…)</td><td>U+0000 à U+007F</td><td class="f">00 à 7F</td><td>1</td></tr>
        <tr><td>é</td><td>U+00E9</td><td class="f">C3 A9</td><td>2</td></tr>
        <tr><td>☕</td><td>U+2615</td><td class="f">E2 98 95</td><td>3</td></tr>
        <tr><td>😊</td><td>U+1F60A</td><td class="f">F0 9F 98 8A</td><td>4</td></tr>
      </table></div>
      <div class="box exm">« Bonjour » : 7 octets de texte → <b>8</b> octets sous Fedora (LF), <b>9</b> sous Windows (CRLF).<br>
        « Café » = <span class="f">43 61 66 C3 A9</span> : 5 octets → 5 sans fin de ligne, 6 avec LF, 7 avec CRLF.<br>
        « Fusée 😊 » (avec un espace final) : F u s é(2) e espace 😊(4) espace = 11 octets → 12 / 13.<br>
        « Café ☕ 😊 » (espace final) : 5 + 1 + 3 + 1 + 4 + 1 = 15 octets → 16 / 17.</div>
      <div class="box method">Taille d'un fichier = octets du texte + fin de ligne (0, 1 ou 2). Les octets du texte sont <b>les mêmes</b> sur les deux systèmes : seule la fin de ligne change. ASCII (128 codes) ne peut coder ni é ni 😊.</div>

      <h3>4. Ordre des octets (endianness)</h3>
      <p>L'entier 0x12345678 sur 4 octets, adresses 0 → 3 :</p>
      <div class="formula-list">
        <span class="f">big-endian</span><span><span class="f">12 34 56 78</span> : poids fort à la plus petite adresse</span>
        <span class="f">little-endian</span><span><span class="f">78 56 34 12</span> : poids faible d'abord (processeurs x86)</span>
      </div>
      <div class="box trap">Chaque octet garde sa valeur (12 = <span class="f">0001 0010</span>), seule sa position change. Inverser l'ordre des octets n'est pas inverser les bits. Lire <span class="f">78 56 34 12</span> en big-endian donne 0x78563412, un autre entier.</div>

      <h3>5. Calculs sur 8 bits avec PowerShell</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Commande</th><th>Affiche</th><th>Ce qu'il faut comprendre</th></tr>
        <tr><td class="f">$somme = 250 + 10</td><td>260</td><td>PowerShell calcule sans limite de 8 bits</td></tr>
        <tr><td class="f">[Convert]::ToString($somme, 2)</td><td class="f">100000100</td><td>9 bits : il y a un carry</td></tr>
        <tr><td class="f">$somme.ToString("X")</td><td class="f">104</td><td>3 chiffres hexa : ne tient pas dans un octet</td></tr>
        <tr><td class="f">$resultat = $somme -band 255</td><td>4</td><td>on garde les 8 bits de droite (masque 0xFF)</td></tr>
        <tr><td class="f">[Convert]::ToString($resultat, 2).PadLeft(8, "0")</td><td class="f">00000100</td><td>écrit sur 8 bits</td></tr>
        <tr><td class="f">$resultat.ToString("X2")</td><td class="f">04</td><td>hexa sur 2 chiffres</td></tr>
        <tr><td class="f">(0 - 1) -band 255</td><td>255</td><td><span class="f">1111 1111 = FF</span> : 255 non signé = −1 signé</td></tr>
      </table></div>
      <p>255 + 1 = 256 = 0x100 → 8 bits gardés <span class="f">00000000</span>, carry 1.</p>

      <h3>6. Flottants dans PowerShell</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Commande</th><th>Résultat</th></tr>
        <tr><td class="f">$a = [single]0.5 ; ([double]$a) -eq 0.5</td><td>True (0,5 est exact en binaire)</td></tr>
        <tr><td class="f">$b = [single]0.1 ; ([double]$b).ToString("G17")</td><td class="f">0.10000000149011612</td></tr>
        <tr><td class="f">([double]$b) -eq 0.1</td><td>False</td></tr>
      </table></div>
      <div class="box trap">[single] = 32 bits. Passer en [double] élargit le nombre mais <b>n'annule pas</b> l'arrondi déjà fait. Valeur demandée ≠ valeur stockée ≠ valeur affichée.</div>
      <div class="box method">Le jour J : un journal de session, tes réponses et 2 fichiers texte, dans un ZIP (<span class="f">Compress-Archive -Path Rendu -DestinationPath R103_Nom.zip</span>). Vérifie le dossier avec <span class="f">Get-Location</span> avant de créer les fichiers.</div>
    </article>
  </section>

  <!-- ============ R1.03 : FICHE MÉMENTO ============ -->
  <!-- ============ R1.03 : TP BLANC ============ -->
  <section id="tab-kt" role="tabpanel" hidden>
    <article class="sheet fiche tpb" data-doc="kt">
      <h2>R1.03 · TP blanc : l'épreuve pratique</h2>
      <p class="muted">1 h · Windows + PowerShell 7 · sujets TP1/TP2 et tes comptes rendus autorisés · ni Internet ni IA. À faire sur ton PC Windows, dans PowerShell 7 (pwsh).</p>
      <div class="box method"><b>Règles du jeu.</b> Chronomètre 1 h. Pour chaque question, <b>prévois le résultat au brouillon avant de taper la commande</b>, puis vérifie. Réponds dans un fichier <span class="f">reponses.txt</span>. Le jour J, tu rendras un seul ZIP avec le journal de session, tes réponses et deux fichiers texte : on s'entraîne à exactement ça. Les résultats attendus sont repliés sous chaque partie : ouvre-les seulement après avoir fini.</div>

      <h3>0. Préparer (5 min)</h3>
      <div class="tscroll"><pre class="f sh ps">pwsh                                  # PowerShell 7, pas 5.1
$PSVersionTable.PSVersion
New-Item -ItemType Directory -Path R103_Eval -Force
Set-Location R103_Eval
Start-Transcript -Path journal.txt    # journal</pre></div>
      <p><span class="f">Start-Transcript</span> enregistre tout ce que tu tapes et tout ce qui s'affiche. C'est très probablement « le journal de votre session » demandé. On l'arrête à la fin avec <span class="f">Stop-Transcript</span>.</p>

      <h3>1. Identité du poste (10 min)</h3>
      <ol>
        <li>Donne le nom du processeur, le nombre de cœurs, le nombre de processeurs logiques et la fréquence max.</li>
        <li>Ton processeur fait-il de l'hyperthreading ? Justifie avec les deux nombres.</li>
        <li>Donne l'architecture du système (32 ou 64 bits) et la commande utilisée.</li>
        <li>Donne la RAM totale en Gio, arrondie à 2 décimales.</li>
        <li>Cite la commande Fedora équivalente pour chacune des questions 1, 3 et 4.</li>
      </ol>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <p class="muted">Les valeurs dépendent de ta machine ; voici les commandes et comment lire leur sortie.</p>
        <div class="tscroll"><pre class="f sh ps">Get-CimInstance Win32_Processor | Select-Object Name, NumberOfCores, NumberOfLogicalProcessors, MaxClockSpeed
Get-ComputerInfo | Select-Object OsArchitecture, CsSystemType
Get-CimInstance Win32_ComputerSystem | Select-Object @{Name='RAM_Gio'; Expression={[math]::Round($_.TotalPhysicalMemory / 1GB, 2)}}</pre></div>
        <ul>
          <li>Hyperthreading si <b>logiques = 2 × cœurs</b> (ex. 8 cœurs, 16 logiques).</li>
          <li>OsArchitecture « 64 bits » et CsSystemType « x64-based PC ».</li>
          <li>MaxClockSpeed est en <b>MHz</b> (3600 = 3,6 GHz).</li>
          <li>Fedora : <span class="f">lscpu</span>, <span class="f">uname -m</span> (x86_64), <span class="f">free -h</span>.</li>
        </ul>
      </details>

      <h3>2. Fichiers texte (10 min)</h3>
      <p>Prévois le nombre de caractères, puis les octets du texte seul, puis la taille du fichier sous Windows (CRLF) et sous Fedora (LF). Vérifie ensuite avec <span class="f">Get-Item … | Select-Object Name, Length</span>.</p>
      <div class="tscroll"><pre class="f sh ps">echo "Noël" &gt; noel.txt
echo "Ça va ?" &gt; cava.txt
echo "Hé 👋" &gt; salut.txt
echo "Prix: 5€" &gt; prix.txt</pre></div>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <div class="tscroll"><table class="tt">
          <tr><th>Fichier</th><th>Caractères</th><th>Octets texte</th><th>Windows (CRLF)</th><th>Fedora (LF)</th></tr>
          <tr><td>Noël</td><td>4</td><td>5</td><td>7</td><td>6</td></tr>
          <tr><td>Ça va ?</td><td>7</td><td>8</td><td>10</td><td>9</td></tr>
          <tr><td>Hé 👋</td><td>4</td><td>8</td><td>10</td><td>9</td></tr>
          <tr><td>Prix: 5€</td><td>8</td><td>10</td><td>12</td><td>11</td></tr>
        </table></div>
        <p>Ç, é et ë prennent 2 octets, € en prend 3, 👋 en prend 4. CRLF ajoute +2, LF +1.</p>
      </details>

      <h3>3. Lire les octets (10 min)</h3>
      <div class="tscroll"><pre class="f sh ps">Format-Hex -Path noel.txt
Format-Hex -Path prix.txt</pre></div>
      <ol>
        <li>Recopie les octets de <span class="f">noel.txt</span>. Repère ceux de « ë » et ceux de la fin de ligne.</li>
        <li>Combien d'octets pour « € » ? Lesquels ?</li>
        <li>Quelle commande Fedora affiche les mêmes octets ? Quelle serait la dernière paire ?</li>
      </ol>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <ul>
          <li>noel.txt : <span class="f">4E 6F <b>C3 AB</b> 6C <b>0D 0A</b></span> (ë = C3 AB, fin de ligne CRLF = 0D 0A).</li>
          <li>€ = <span class="f">E2 82 AC</span> (3 octets).</li>
          <li>prix.txt : <span class="f">50 72 69 78 3A 20 35 E2 82 AC 0D 0A</span>.</li>
          <li>Fedora : <span class="f">od -An -tx1 -v noel.txt</span>, qui se termine par <span class="f">0a</span> (LF).</li>
        </ul>
      </details>

      <h3>4. Calculs sur 8 bits (15 min)</h3>
      <p>Pour chaque calcul, <b>pose l'addition en binaire au brouillon</b>. Donne la somme exacte (décimal + hexa), les 8 bits conservés (binaire + hexa) et le carry. Calculs : <b>200 + 100</b>, <b>128 + 128</b>, <b>99 + 27</b>, <b>127 + 1</b>. Vérifie avec :</p>
      <div class="tscroll"><pre class="f sh ps">$s = 200 + 100
$s ; $s.ToString("X") ; [Convert]::ToString($s, 2)
$r = $s -band 255
[Convert]::ToString($r, 2).PadLeft(8, "0") ; $r.ToString("X2")</pre></div>
      <p>Ensuite : <span class="f">(5 - 10) -band 255</span>. Donne le résultat, le binaire, l'hexa et la valeur signée. Pour <b>127 + 1</b>, y a-t-il un carry ? Un overflow en signé ?</p>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <div class="tscroll"><table class="tt">
          <tr><th>Calcul</th><th>Exacte</th><th>Hexa</th><th>8 bits</th><th>X2</th><th>Carry</th></tr>
          <tr><td>200 + 100</td><td>300</td><td>12C</td><td class="f">00101100</td><td>2C</td><td>1</td></tr>
          <tr><td>128 + 128</td><td>256</td><td>100</td><td class="f">00000000</td><td>00</td><td>1</td></tr>
          <tr><td>99 + 27</td><td>126</td><td>7E</td><td class="f">01111110</td><td>7E</td><td>0</td></tr>
          <tr><td>127 + 1</td><td>128</td><td>80</td><td class="f">10000000</td><td>80</td><td>0</td></tr>
        </table></div>
        <p>127 + 1 : <b>pas de carry</b>, mais <b>overflow signé</b>. 10000000 vaut −128 en signé : deux positifs ont donné un négatif.</p>
        <p><span class="f">(5 - 10) -band 255</span> = 251 = <span class="f">11111011</span> = FB → −5 en signé.</p>
        <p>Attention : la somme exacte en hexa s'écrit sur <b>3 chiffres</b> (12C, 100). Les 8 bits conservés tiennent sur <b>2 chiffres</b> (2C, 00).</p>
      </details>

      <h3>5. Flottants (5 min)</h3>
      <p>Prévois d'abord lesquels sont exacts en simple précision, puis vérifie :</p>
      <div class="tscroll"><pre class="f sh ps">foreach ($v in 0.25, 0.2, 0.75, 0.3) {
  $s = [single]$v
  "$v -&gt; " + ([double]$s).ToString("G17") + "  " + (([double]$s) -eq $v)
}</pre></div>
      <p>Explique en une phrase pourquoi 0,2 n'est pas exact.</p>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <div class="tscroll"><pre class="f sh ps">0.25 -&gt; 0.25  True
0.2 -&gt; 0.20000000298023224  False
0.75 -&gt; 0.75  True
0.3 -&gt; 0.30000001192092896  False</pre></div>
        <p>0,25 = 0,01₂ et 0,75 = 0,11₂ sont des fractions binaires <b>finies</b>. 0,2 = 0,00110011…₂ est <b>infini</b> : il est arrondi à 23 bits de fraction, donc la valeur stockée ≠ 0,2.</p>
      </details>

      <h3>6. Rendre (5 min)</h3>
      <div class="tscroll"><pre class="f sh ps">Stop-Transcript
New-Item -ItemType Directory -Path Rendu -Force
Copy-Item journal.txt, reponses.txt, noel.txt, prix.txt -Destination Rendu
Get-ChildItem Rendu
Compress-Archive -Path Rendu -DestinationPath R103_Eval_NOM.zip</pre></div>
      <p>Remplace NOM par ton nom. Vérifie que le ZIP contient bien les 4 fichiers, et n'y mets ni PDF ni capture.</p>
      <details class="corr-d"><summary>Voir le résultat</summary>
        <p><span class="f">Get-ChildItem Rendu</span> doit lister journal.txt, noel.txt, prix.txt et reponses.txt. Pour vérifier le ZIP sans le décompresser ailleurs : <span class="f">Expand-Archive R103_Eval_NOM.zip -DestinationPath verif</span> puis <span class="f">Get-ChildItem verif -Recurse</span>.</p>
      </details>

      <div class="box trap"><b>Pièges du jour J</b>
        <ul>
          <li>Ouvre bien <b>PowerShell 7</b> (pwsh), pas Windows PowerShell 5.1 : son codage de redirection est différent.</li>
          <li>Copie les caractères spéciaux depuis le fichier fourni sur Arche, ne les tape pas.</li>
          <li>Lance <span class="f">Start-Transcript</span> <b>avant</b> la première commande.</li>
          <li>Pour l'hexa, utilise <span class="f">"X2"</span>, et <span class="f">PadLeft(8,"0")</span> pour le binaire.</li>
          <li>Distingue toujours le <b>texte seul</b> de la <b>fin de ligne</b>.</li>
        </ul>
      </div>

      <h3>Ton CR du TP2 : à corriger</h3>
      <p class="muted">Relu à partir du ZIP du TP2 déposé sur Arche le 9/11. Tu as droit à ton CR demain : corrige-le avant de l'enregistrer.</p>
      <div class="box exm">Tes fichiers sont corrects (octets vérifiés : <span class="f">accent.txt = 43 61 66 C3 A9 0A</span>, etc.). Tes réponses aux questions 7, 10, 12 et 14 sont justes. Mais si tu recopies demain les 4 erreurs ci-dessous, tu perds des points.</div>
      <div class="box trap"><b>Erreur 1 · Q11 : sommes en hexa.</b> Tu as écrit « somme exacte hexa = 260 » et « hexa conservé = 104 ».
        <div class="tscroll"><table class="tt">
          <tr><th>Calcul</th><th>Exacte</th><th>Hexa exacte</th><th>8 bits</th><th>Hexa conservé</th><th>Carry</th></tr>
          <tr><td>250 + 10</td><td>260</td><td><b>104</b></td><td class="f">00000100</td><td><b>04</b></td><td>1</td></tr>
          <tr><td>255 + 1</td><td>256</td><td><b>100</b></td><td class="f">00000000</td><td><b>00</b></td><td>1</td></tr>
        </table></div>
        260 en décimal s'écrit 104 en hexa (1 × 256 + 0 × 16 + 4). Le « 104 » est la somme exacte ; ce qui est conservé, c'est seulement <b>04</b>.</div>
      <div class="box trap"><b>Erreur 2 · Q5 : 😊 fait 4 octets.</b> Ton tableau dit « 😊 : F0 9F 98 8A : 3 ». Il y a <b>4</b> paires, donc 4 octets. Les emojis prennent 4 octets en UTF-8.</div>
      <div class="box trap"><b>Erreur 3 · Q2 : la conclusion est inversée.</b> La question était : « Peut-on affirmer qu'un caractère occupe toujours un octet ? » La réponse attendue est <b>non</b>. « Fusée 😊 » a 7 caractères mais 11 octets : é en prend 2 et 😊 en prend 4. En UTF-8, un caractère occupe de 1 à 4 octets.</div>
      <div class="box trap"><b>Erreur 4 · Q9 : il manque une case.</b> Il y a 4 octets, donc 4 adresses, de <b>0 à 3</b> :
        <div class="tscroll"><table class="tt">
          <tr><th></th><th>@0</th><th>@1</th><th>@2</th><th>@3</th></tr>
          <tr><td>big-endian</td><td>12</td><td>34</td><td>56</td><td>78</td></tr>
          <tr><td>little-endian</td><td>78</td><td>56</td><td>34</td><td>12</td></tr>
        </table></div>
        Ajoute aussi la réponse à Q9 : 78 56 34 12 lu en big-endian donne <b>0x78563412</b>, ce n'est pas l'entier initial.</div>
      <h4>À améliorer</h4>
      <ul>
        <li>Q6 : justifie avec la plage ASCII. Les lettres de « Bonjour » ont des codes entre <b>00 et 7F</b>, et UTF-8 garde ces codes tels quels sur 1 octet.</li>
        <li>Ton <span class="f">mixte.txt</span> n'a pas d'espace après 😊 : 14 octets de texte, donc 15 sous Fedora et 16 sous Windows. C'est cohérent avec tes fichiers. Le sujet comptait un espace final (15 → 16 / 17).</li>
        <li>Ton dépôt du <b>TP1</b> n'apparaît pas sur Arche de ton côté. Vérifie que ton binôme l'a bien déposé.</li>
      </ul>
      <div class="box method"><b>Ce soir, dans l'ordre</b>
        <ol>
          <li>Corrige ton CR TP2 (les 4 erreurs) et enregistre-le en PDF avec les sujets TP1 et TP2, prêts à copier sur le poste.</li>
          <li>Fais ce TP blanc en 1 h, sur ton PC, dans PowerShell 7.</li>
          <li>Fais 2 fois le deck « Comme au QCM » R1.03, puis « Pratique : prévois le résultat ».</li>
          <li>Relis la fiche mémento au lit.</li>
        </ol>
      </div>
    </article>
  </section>

  <section id="tab-kx" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r103">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. Tes comptes rendus enregistrés sont autorisés pour la partie pratique : imprime ou enregistre cette fiche avec eux.</span></div>
    <div class="fiche-host" data-subj="r103"><div class="pfwrap">
<section class="pf r103" aria-label="Fiche page 1">
  <header class="pf-head">
    <span class="pf-code">R1.03</span>
    <div class="pf-title"><b>Codage, arithmétique, flottants</b><span>Architecture des ordinateurs · cours + TD2</span></div>
    <span class="pf-exam">Éval mer. 18/11<br>13 h 30</span>
  </header>
  <div class="pf-key"><ol>
    <li>1 chiffre hexa = <b>4 bits</b>, 1 octet = 2 chiffres.</li>
    <li>−x : <b>inverser les bits puis +1</b>.</li>
    <li>Carry = non signé. Overflow = <b>signé</b>.</li>
    <li>Flottant : <b>E = e − 127</b>, 1 implicite.</li>
  </ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Bases</h4>
        <p class="m">101011₂ = 32+8+2+1 = 43<br>B0A₁₆ = 11×256 + 10 = 2826<br>1101 0110₂ = 0xD6 = 214</p>
        <p>n bits : 2ⁿ valeurs. Non signé 0 à 2ⁿ−1 (8 bits : 0–255).</p>
        <table><tr><th>hexa</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th></tr><tr><td>déc.</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>2</i>Complément à deux</h4>
        <p>Plage : <span class="hl">−2ⁿ⁻¹ à 2ⁿ⁻¹ − 1</span> (8 bits −128..127, 4 bits −8..7).</p>
        <p class="m">5 = 0000 0101 → 1111 1010 + 1 = 1111 1011 = −5</p>
        <table><tr><th>mot</th><th>non signé</th><th>signé</th></tr>
          <tr><td class="m">0111 1111</td><td>127</td><td>127</td></tr>
          <tr><td class="m">1000 0000</td><td>128</td><td>−128</td></tr>
          <tr><td class="m">1111 0000</td><td>240</td><td>−16</td></tr>
          <tr><td class="m">1111 1111</td><td>255</td><td>−1</td></tr></table>
      </div>
      <div class="pf-blk tint"><h4><i>3</i>Addition sur 8 bits</h4>
        <ul>
          <li><b>Carry</b> : 9ᵉ bit qui sort → dépassement non signé. On garde 8 bits.</li>
          <li><b>Overflow</b> : + et + donnent −, ou − et − donnent +. Signes différents : jamais.</li>
        </ul>
        <p class="m">0111 0110 + 0100 0011 = 1011 1001 · C0 V1<br>1111 1111 + 0000 0001 = 0000 0000 · C1 V0<br>0111 1111 + 0000 0001 = 1000 0000 · C0 V1</p>
        <p>a − b = a + (complément à deux de b), on jette le carry.</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk"><h4><i>4</i>IEEE 754 simple</h4>
        <p><b>32 bits</b> = 1 signe + 8 exposant + 23 fraction, biais 127. Double : 1 + 11 + 52, biais 1023.</p>
        <p class="m">x = (−1)ˢ × 1,F × 2^(e − 127)</p>
        <p><b>Encoder</b> : binaire → 1,F × 2ᴱ → e = E + 127 → F sur 23 bits → hexa.</p>
        <p class="m">5,75 = 101,11₂ = 1,0111 × 2²<br>0 10000001 0111000… = 0x40B80000</p>
        <p class="m">12,375 = 0x41460000 · −7,5 = 0xC0F00000<br>−0,15625 = 0xBE200000</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Décoder</h4>
        <p class="m">0|10000001|0110… → 1,375 × 2² = 5,5<br>1|10000010|0100… → −1,25 × 2³ = −10<br>0|01111101|0110… → 1,375 × 2⁻² = 0,34375<br>1|01111110|1000… → −1,5 × 2⁻¹ = −0,75</p>
        <p>Fractions : 0,1₂ = 0,5 · 0,01₂ = 0,25 · 0,001₂ = 0,125 · 0,0001₂ = 0,0625.</p>
      </div>
      <div class="pf-blk"><h4><i>5</i>Cas spéciaux</h4>
        <table><tr><th>exposant</th><th>fraction</th><th>valeur</th></tr>
          <tr><td class="m">0000 0000</td><td>0</td><td>±0</td></tr>
          <tr><td class="m">0000 0000</td><td>≠ 0</td><td>dénormalisé</td></tr>
          <tr><td class="m">1111 1111</td><td>0</td><td>±∞</td></tr>
          <tr><td class="m">1111 1111</td><td>≠ 0</td><td>NaN (0/0)</td></tr></table>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Pièges</h4>
        <ul>
          <li>Garder un 9ᵉ bit sur un mot de 8 bits.</li>
          <li>« Overflow » dès qu'il y a un carry : faux.</li>
          <li>Lire 1111 1111 sans dire signé / non signé.</li>
          <li>Confondre e et E, mettre le 1 implicite dans F, oublier le signe.</li>
          <li>0,1 n'est pas exact en binaire (motif 0011 infini). Comparer avec |x − y| &lt; ε.</li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="pf-foot"><span>R1.03 Architecture · page 1/2</span><span>Codage binaire et hexa · complément à deux · carry / overflow · IEEE 754</span></footer>
</section>

<section class="pf r103" aria-label="Fiche page 2">
  <header class="pf-head">
    <span class="pf-code">R1.03</span>
    <div class="pf-title"><b>TP1 + TP2 : commandes et octets</b><span>PowerShell 7 (Windows) et Bash (Fedora)</span></div>
    <span class="pf-exam">Partie pratique<br>sous Windows</span>
  </header>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>6</i>TP1 : le poste</h4>
        <table><tr><th>Info</th><th>PowerShell</th><th>Fedora</th></tr>
          <tr><td>Système</td><td class="m">Get-ComputerInfo</td><td class="m">cat /etc/os-release</td></tr>
          <tr><td>Architecture</td><td class="m">OsArchitecture</td><td class="m">uname -m</td></tr>
          <tr><td>Processeur</td><td class="m">Get-CimInstance Win32_Processor</td><td class="m">lscpu</td></tr>
          <tr><td>RAM</td><td class="m">Win32_ComputerSystem</td><td class="m">free -h</td></tr>
          <tr><td>Disques</td><td class="m">Get-PhysicalDisk</td><td class="m">lsblk</td></tr>
          <tr><td>Volumes</td><td class="m">Get-Volume</td><td class="m">lsblk -f</td></tr>
          <tr><td>Périph.</td><td class="m">Get-PnpDevice -PresentOnly</td><td class="m">lspci</td></tr>
          <tr><td>Réseau</td><td class="m">Get-NetAdapter</td><td class="m">ip -br link</td></tr>
          <tr><td>Dossier</td><td class="m">Get-Location</td><td class="m">pwd</td></tr></table>
        <p>Processeur : <b>NumberOfCores</b> (cœurs) ≠ <b>NumberOfLogicalProcessors</b> (2 par cœur avec hyperthreading). TotalPhysicalMemory est en octets : <span class="m">/1GB</span> → Gio.</p>
      </div>
      <div class="pf-blk"><h4><i>7</i>Notions TP1</h4>
        <ul>
          <li>x86_64 = AMD64 = 64 bits.</li>
          <li>1 Go = 10⁹ o, 1 Gio = 2³⁰ o : « 512 Go » ≈ 476 Gio.</li>
          <li>Disque &gt; partition &gt; volume &gt; système de fichiers (NTFS, ext4, btrfs, FAT32).</li>
          <li>Registres &gt; cache &gt; RAM &gt; SSD (du plus rapide au plus lent).</li>
          <li>Von Neumann : CPU (UAL + unité de commande + registres), mémoire, stockage, E/S, bus.</li>
        </ul>
      </div>
      <div class="pf-blk"><h4><i>8</i>PowerShell sur 8 bits</h4>
        <p class="m">$s = 250 + 10            # 260<br>[Convert]::ToString($s, 2)   # 100000100<br>$s.ToString("X")         # 104<br>$r = $s -band 255         # 4<br>[Convert]::ToString($r,2).PadLeft(8,"0")<br>$r.ToString("X2")         # 04<br>(0 - 1) -band 255         # 255 = FF</p>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>9</i>TP2 : fichiers texte</h4>
        <p class="m">echo "Café" &gt; accent.txt</p>
        <p><b>&gt;</b> crée ou remplace. Guillemets non écrits. Fin de ligne : <span class="hl">Fedora LF 0a (1 octet)</span>, <span class="hl">PowerShell 7 CRLF 0D 0A (2 octets)</span>, <span class="m">echo -n</span> : rien.</p>
        <table><tr><th></th><th>PowerShell</th><th>Fedora</th></tr>
          <tr><td>Taille</td><td class="m">Get-Item f | Select-Object Name, Length</td><td class="m">wc -c f</td></tr>
          <tr><td>Octets</td><td class="m">Format-Hex -Path f</td><td class="m">od -An -tx1 -v f</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>10</i>UTF-8</h4>
        <table><tr><th>car.</th><th>octets</th><th>nb</th></tr>
          <tr><td>ASCII</td><td class="m">00–7F</td><td>1</td></tr>
          <tr><td>é</td><td class="m">C3 A9</td><td>2</td></tr>
          <tr><td>☕</td><td class="m">E2 98 95</td><td>3</td></tr>
          <tr><td>😊</td><td class="m">F0 9F 98 8A</td><td>4</td></tr></table>
        <p>Bonjour : 7 → <b>8</b> (LF) / <b>9</b> (CRLF). Café : 5 → 6 / 7. Fusée 😊 + espace : 11 → 12 / 13.</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Endianness</h4>
        <p>0x12345678 : big-endian <span class="m">12 34 56 78</span>, little-endian <span class="m">78 56 34 12</span>. L'octet garde sa valeur, seule sa place change.</p>
      </div>
      <div class="pf-blk trap"><h4><i>!</i>Flottants en PowerShell</h4>
        <p class="m">([double][single]0.1).ToString("G17")<br>→ 0.10000000149011612</p>
        <p>[single]0.5 vaut exactement 0,5 (True), [single]0.1 n'est pas 0,1 (False). [double] n'annule pas l'arrondi.</p>
      </div>
    </div>
  </div>
  <footer class="pf-foot"><span>R1.03 Architecture · page 2/2</span><span>TP1 anatomie d'un ordinateur · TP2 codage du texte et des nombres</span></footer>
</section>
</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r103"></div>
  </section>

  <!-- ============ R1.04 : SE & LINUX ============ -->
  <section id="tab-s1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="s1">
      <h2>R1.04 · Système d'exploitation et Linux</h2>
      <p class="muted">Devoir jeudi 3/12, 8 h – 9 h 50. Format non annoncé ; probablement comme l'éval 1 : un quiz de 15 min puis 1 h de pratique, tout dans le terminal.</p>
      <h3>1. Rôle du système d'exploitation</h3>
      <ul>
        <li>Le SE sert d'<b>interface</b> entre le matériel et les applications, gère les ressources et offre une plateforme d'exécution.</li>
        <li>Couches : applications → shell (CLI ou GUI) → <b>noyau</b> → matériel.</li>
        <li>Le noyau gère la mémoire, les processus (ordonnancement), les périphériques via les <b>pilotes</b>, le système de fichiers et la sécurité. C'est la 1ʳᵉ couche chargée au démarrage.</li>
        <li>Historique : années 60 traitement par lots ; 70 Unix (multi-utilisateur, multitâche) ; 80 MS-DOS, MacOS ; 90 Windows NT et Linux ; 2000+ Android, iOS, virtualisation, conteneurs.</li>
      </ul>
      <h3>2. Linux, distributions, POSIX</h3>
      <ul>
        <li><b>Linux = le noyau</b>. Une <b>distribution</b> (Fedora, Ubuntu, Debian…) = noyau + outils GNU + logiciels + gestionnaire de paquets + interface graphique (GNOME, KDE Plasma, XFCE) + pilotes.</li>
        <li>Linux : multitâche, multi-utilisateur (UID / GID), conforme <b>POSIX</b>. macOS et BSD sont conformes ; <b>Windows ne l'est pas</b> (WSL permet d'y lancer un environnement GNU/Linux).</li>
        <li>Android est basé sur Linux (plus de 70 % des smartphones).</li>
      </ul>
      <h3>3. Tout est fichier</h3>
      <ul>
        <li>Types (1ᵉʳ caractère de <span class="f">ls -l</span>) : <span class="f">-</span> fichier régulier, <span class="f">d</span> répertoire, <span class="f">l</span> lien, <span class="f">b</span> / <span class="f">c</span> périphérique bloc / caractère.</li>
        <li>Une seule arborescence à partir de la racine <span class="f">/</span> (pas de C:, D:) ; les disques et clés USB sont <b>montés</b> dans un répertoire.</li>
        <li>L'<b>inode</b> décrit un fichier (numéro, taille, propriétaire, groupe, type et droits, dates) mais <b>ne contient pas son nom</b> ni ses données.</li>
        <li>Noms : <span class="f">/</span> interdit ; <b>sensibles à la casse</b> (Metz.txt ≠ metz.txt) ; fichier <b>caché</b> = nom qui commence par <span class="f">.</span> (visible avec <span class="f">ls -a</span>) ; 255 caractères au plus.</li>
      </ul>
      <h3>4. Chemins et jokers</h3>
      <div class="formula-list">
        <span class="f">/home/alice/doc.pdf</span><span>chemin <b>absolu</b> (commence par /)</span>
        <span class="f">./image.jpg, ../rapports/a.txt</span><span>chemins <b>relatifs</b> au dossier courant</span>
        <span class="f">.  ..  ~  /</span><span>courant, parent, dossier personnel, racine</span>
        <span class="f">?</span><span>exactement 1 caractère : ch?t → chat, chut (pas cht ni chaat)</span>
        <span class="f">*</span><span>0, 1 ou plusieurs caractères : a*e → ae, arbre, allée</span>
      </div>
      <div class="box trap">Les jokers du shell ne sont pas des regex : en regex, <span class="f">*</span> répète le caractère précédent et <span class="f">.</span> remplace n'importe quel caractère.</div>
      <h3>5. Utilisateurs et droits</h3>
      <ul>
        <li><b>root</b> = administrateur. Chaque utilisateur a un login et un dossier <span class="f">/home/nom</span> ; il appartient à des groupes (<span class="f">id</span>, <span class="f">groups</span>).</li>
        <li>3 catégories <b>u</b> (propriétaire), <b>g</b> (groupe), <b>o</b> (autres) ; 3 droits <b>r = 4</b>, <b>w = 2</b>, <b>x = 1</b>. <span class="f">-rwxr-x---</span> = 750.</li>
        <li>Invite <span class="f">alice@pc:~$</span> : utilisateur (<span class="f">whoami</span>) @ machine (<span class="f">hostname</span>). Tab complète, double Tab liste les possibilités.</li>
      </ul>
    </article>
  </section>

  <!-- ============ R1.04 : COMMANDES ============ -->
  <section id="tab-s2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="s2">
      <h2>R1.04 · Commandes et redirections</h2>
      <p class="muted">Le tableau à connaître pour le quiz et la pratique.</p>
      <h3>1. Se repérer et manipuler des fichiers</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Commande</th><th>Rôle et options</th></tr>
        <tr><td class="f">pwd, whoami, hostname, id</td><td>dossier courant, utilisateur, machine, UID / GID / groupes</td></tr>
        <tr><td class="f">cd rep, cd .., cd, cd -</td><td>changer de dossier ; <span class="f">cd</span> seul = ~ ; <span class="f">cd -</span> revient au précédent</td></tr>
        <tr><td class="f">ls -l -a -h -R -t -r -d</td><td>détails, cachés, tailles lisibles, récursif, tri par date, ordre inverse, le dossier lui-même (<span class="f">ls -ld d</span>)</td></tr>
        <tr><td class="f">mkdir -p a/b/c</td><td>crée aussi les parents, pas d'erreur s'il existe ; <span class="f">mkdir -p tp/{preuves,travail}</span></td></tr>
        <tr><td class="f">touch f</td><td>crée un fichier vide ou met à jour sa date</td></tr>
        <tr><td class="f">cp src dest, cp -r</td><td>copie (la copie appartient à celui qui copie) ; <span class="f">-r</span> pour un dossier</td></tr>
        <tr><td class="f">mv src dest</td><td>déplace <b>ou renomme</b> (pas de -r pour un dossier)</td></tr>
        <tr><td class="f">rm f, rm -r d, rmdir d</td><td>suppression <b>définitive</b> ; rmdir seulement un dossier <b>vide</b></td></tr>
        <tr><td class="f">cat, less, head, tail</td><td>afficher ; page par page ; 10 premières / dernières lignes par défaut (<span class="f">-n 5</span>, <span class="f">tail -f</span>)</td></tr>
        <tr><td class="f">wc -l -w -c</td><td>lignes, mots, octets ; <span class="f">wc -l &lt; f</span> sans le nom</td></tr>
        <tr><td class="f">find . -name "*.txt" -type f</td><td>recherche récursive ; <span class="f">-iname</span>, <span class="f">-size +1M</span>, <span class="f">-mtime -7</span>, <span class="f">-exec … {} \;</span></td></tr>
        <tr><td class="f">tar -czf a.tar.gz d, tar -tzf</td><td>archiver compressé ; lister le contenu</td></tr>
      </table></div>
      <h3>2. Filtres</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Commande</th><th>Rôle et options</th></tr>
        <tr><td class="f">sort -r -n -f -h -u</td><td>tri alphabétique (10 avant 9 !) ; inverse ; numérique ; sans casse ; tailles K/M/G ; uniques</td></tr>
        <tr><td class="f">grep -i -v -c -n -x -q -r -E</td><td>sans casse ; inverser ; compter ; numéros ; ligne entière ; silencieux (seul <span class="f">$?</span> compte) ; récursif ; regex étendues</td></tr>
        <tr><td class="f">cut -d ':' -f 1</td><td>un champ selon un délimiteur (TAB par défaut) ; <span class="f">-f 2-</span> du 2ᵉ à la fin ; <span class="f">-f 2,5</span> ; <span class="f">-c 1-5</span></td></tr>
        <tr><td class="f">sed 's/a/b/g'</td><td>remplacer (g = toutes les occurrences de la ligne) ; <span class="f">sed 's/"//g'</span> supprime les guillemets</td></tr>
        <tr><td class="f">uniq</td><td>retire les doublons <b>consécutifs</b> (après un sort)</td></tr>
      </table></div>
      <h3>3. Redirections et tubes</h3>
      <div class="formula-list">
        <span class="f">0 1 2</span><span>stdin (clavier), stdout (écran), stderr (écran, séparé)</span>
        <span class="f">cmd &gt; f</span><span>crée <b>ou écrase</b> f</span>
        <span class="f">cmd &gt;&gt; f</span><span><b>ajoute</b> à la fin</span>
        <span class="f">cmd 2&gt; err.txt</span><span>les erreurs seules</span>
        <span class="f">cmd &gt; f 2&gt;&amp;1</span><span>sortie et erreurs dans le même fichier (2&gt;&amp;1 <b>après</b> &gt;)</span>
        <span class="f">cmd &lt; f</span><span>lit l'entrée dans f</span>
        <span class="f">cmd1 | cmd2</span><span>la sortie de cmd1 devient l'entrée de cmd2</span>
      </div>
      <div class="box exm"><span class="f">echo "Ligne 1" &gt; f ; echo "Ligne 2" &gt; f</span> → f contient seulement « Ligne 2 ». Avec <span class="f">&gt;&gt;</span> pour la 2ᵉ : les deux lignes.<br>Nombres 1 à 20, un par ligne : <span class="f">grep '2' nombres.txt | tail -n 5</span> → 2, 12, 20.<br><span class="f">{ echo 'Utilisateur :'; whoami; } &gt; preuve.txt</span> regroupe plusieurs sorties.</div>
      <h3>4. Autres outils</h3>
      <ul>
        <li><span class="f">nano f</span> : Ctrl+O enregistrer, Ctrl+X quitter, Ctrl+W chercher.</li>
        <li><span class="f">wget URL</span> télécharge ; <span class="f">curl URL</span> affiche le corps, <span class="f">curl -I</span> les en-têtes (200 trouvé, 404 absent).</li>
        <li><span class="f">alias ll='ls -l'</span>, permanent dans <span class="f">~/.bashrc</span> puis <span class="f">source ~/.bashrc</span>.</li>
        <li>Infos système : <span class="f">lscpu</span>, <span class="f">free -m</span>, <span class="f">df -h .</span>, <span class="f">uname -m</span>, <span class="f">cat /etc/os-release</span>.</li>
      </ul>
    </article>
  </section>

  <!-- ============ R1.04 : TP3 PERMISSIONS ============ -->
  <section id="tab-s3" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="s3">
      <h2>R1.04 · TP3 : les permissions</h2>
      <p class="muted">Préparer et protéger un site web : droits octaux et symboliques, umask, droit x sur les dossiers.</p>
      <h3>1. Lire et écrire les droits</h3>
      <p><span class="f">-rw-r--r--</span> : type, puis u (rw-), g (r--), o (r--). r = 4, w = 2, x = 1.</p>
      <div class="tscroll"><table class="tt">
        <tr><th>Octal</th><th>Droits</th><th>Usage</th></tr>
        <tr><td>755</td><td class="f">rwxr-xr-x</td><td>dossier public, script</td></tr>
        <tr><td>644</td><td class="f">rw-r--r--</td><td>fichier public</td></tr>
        <tr><td>700</td><td class="f">rwx------</td><td>dossier privé</td></tr>
        <tr><td>600</td><td class="f">rw-------</td><td>fichier privé</td></tr>
        <tr><td>640</td><td class="f">rw-r-----</td><td>lisible par le groupe</td></tr>
        <tr><td>750</td><td class="f">rwxr-x---</td><td>dossier pour le groupe</td></tr>
        <tr><td>651</td><td class="f">rw-r-x--x</td><td>exemple du TP1</td></tr>
      </table></div>
      <h3>2. chmod symbolique</h3>
      <ul>
        <li>Qui : <b>u g o a</b> ; opérateur <b>+ − =</b> ; droits <b>r w x</b>.</li>
        <li><span class="f">chmod u+x script.sh</span>, <span class="f">chmod ug-r f</span>, <span class="f">chmod o-r f</span>, <span class="f">chmod -R</span> récursif.</li>
        <li><span class="f">chmod a=rw f</span> <b>remplace</b> tout : 666 (le x disparaît).</li>
        <li>Plusieurs à la fois : <span class="f">chmod u+x,g-r,o=r f</span> : 640 → 704.</li>
        <li><span class="f">chown user:groupe f</span> change le propriétaire : réservé à root (sudo).</li>
        <li><span class="f">stat -c '%a %U %G %n' f</span> affiche droits octaux, propriétaire, groupe, nom.</li>
      </ul>
      <h3>3. umask</h3>
      <div class="box def">Un programme crée un fichier avec au plus <b>666</b> et un dossier avec au plus <b>777</b> ; l'umask <b>retire</b> des droits.</div>
      <div class="tscroll"><table class="tt">
        <tr><th>umask</th><th>Fichier</th><th>Dossier</th></tr>
        <tr><td>022</td><td>644</td><td>755</td></tr>
        <tr><td>027</td><td>640</td><td>750</td></tr>
        <tr><td>077</td><td>600</td><td>700</td></tr>
      </table></div>
      <p>On n'obtient jamais x sur un fichier à sa création.</p>
      <h3>4. Les droits sur un dossier</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Droit</th><th>Sur un fichier</th><th>Sur un dossier</th></tr>
        <tr><td>r</td><td>lire</td><td>lister les noms</td></tr>
        <tr><td>w</td><td>modifier</td><td>créer, supprimer, renommer dedans</td></tr>
        <tr><td>x</td><td>exécuter</td><td><b>traverser</b> (entrer, accéder aux fichiers)</td></tr>
      </table></div>
      <div class="box trap">Pour lire un fichier, il faut <b>x sur tous les dossiers parents</b> et r sur le fichier. Un membre du groupe ne peut pas lire <span class="f">brouillons/nouvelle_page.html</span> si <span class="f">brouillons</span> est en 700, même s'il connaît le nom.<br>Après <span class="f">chmod u-x brouillons</span> : <span class="f">ls brouillons</span> peut encore afficher les noms (r), mais <span class="f">cat brouillons/nouvelle_page.html</span> donne Permission denied.</div>
      <div class="box method">Politique du TP : <span class="f">chmod 755</span> sur les dossiers publics, <span class="f">644</span> sur les fichiers publics, <span class="f">700</span> sur <span class="f">brouillons</span>, <span class="f">600</span> sur la page privée. Preuves : <span class="f">id &gt; preuves/01_droits.txt</span> puis <span class="f">ls -ld … &gt;&gt; preuves/01_droits.txt</span>.</div>
      <p><span class="f">test -r f &amp;&amp; echo OK</span> ne teste que <b>ton</b> compte. Serveur local : <span class="f">python3 -m http.server 8000 --bind 127.0.0.1 --directory publication</span>, puis <span class="f">curl -I http://127.0.0.1:8000/</span> (200 ou 404).</p>
    </article>
  </section>

  <!-- ============ R1.04 : TP4 REGEX ============ -->
  <section id="tab-s4" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="s4">
      <h2>R1.04 · TP4 : expressions régulières</h2>
      <p class="muted">grep -E, ancres, classes, quantificateurs, et chaînes de filtres grep | cut | sed.</p>
      <h3>1. La syntaxe de grep -E</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Écriture</th><th>Sens</th></tr>
        <tr><td class="f">^  $</td><td>début, fin de ligne (les deux : la ligne entière doit correspondre)</td></tr>
        <tr><td class="f">[01] [0-9] [0-9A-Fa-f] [^…]</td><td>un caractère parmi ; plage ; hexadécimal ; tout sauf</td></tr>
        <tr><td class="f">{8} {1,3} * + ?</td><td>exactement 8 ; de 1 à 3 ; 0 ou plus ; 1 ou plus ; 0 ou 1</td></tr>
        <tr><td class="f">( … )  |</td><td>groupe ; alternative</td></tr>
        <tr><td class="f">\.  .</td><td>point littéral ; <b>n'importe quel caractère</b></td></tr>
        <tr><td class="f">[[:space:]]</td><td>un blanc (espace, tabulation)</td></tr>
      </table></div>
      <p>Apostrophes autour du motif (<span class="f">'…'</span>) pour que le shell ne le touche pas ; guillemets doubles quand on y met une variable (<span class="f">"$regex"</span>).</p>
      <h3>2. Exemples du TP</h3>
      <ul>
        <li><span class="f">grep -E '[01]{8}'</span> accepte aussi 101010101 et x10101010y (8 bits <b>quelque part</b>) ; <span class="f">'^[01]{8}$'</span> ne garde que les lignes de exactement 8 bits.</li>
        <li>Adresse MAC : <span class="f">'^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$'</span> accepte A4:5E:60:12:AB:09 ; refuse AG (G n'est pas hexa), 5 groupes, des tirets, 009. 6 × 8 = <b>48 bits</b>.</li>
        <li>IPv4 naïve <span class="f">'^([0-9]{1,3}\.){3}[0-9]{1,3}$'</span> laisse passer 256.1.2.3 et 999.10.20.30 ({1,3} ne limite pas la valeur). Sans <span class="f">\</span> devant le point, 192x168x1x2 passe aussi.</li>
        <li>Octet strict : <span class="f">(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]|[0-9])</span> : refuse 256 et 001.</li>
      </ul>
      <div class="box def">Code retour : <span class="f">echo "$bits" | grep -Eq '^[01]{8}$' ; echo $?</span> → <b>0</b> correspond, <b>1</b> aucune correspondance, <b>2</b> erreur. Lire <span class="f">$?</span> juste après.</div>
      <h3>3. Chaînes de filtres</h3>
      <div class="box exm"><span class="f">grep '^PRETTY_NAME=' /etc/os-release | cut -d '=' -f 2- | sed 's/"//g'</span> → Fedora Linux …<br><span class="f">cut -d: -f1 /etc/passwd</span> → les logins.</div>
      <ul>
        <li><span class="f">-f 2-</span> (et pas <span class="f">-f 2</span>) garde la suite si la valeur contient le séparateur.</li>
        <li><span class="f">cut -d ' '</span> fonctionne mal si les colonnes sont séparées par un nombre variable d'espaces.</li>
        <li><span class="f">grep -E '^CPU\(s\):'</span> : parenthèses échappées = littérales. CPU(s) = processeurs <b>logiques</b>. <span class="f">LC_ALL=C</span> fixe la langue des libellés.</li>
      </ul>
      <div class="box trap">Format ≠ usage : une MAC ou une IPv4 bien formée n'est pas forcément attribuée.</div>
    </article>
  </section>

  <!-- ============ R1.04 : TP5 BASH ============ -->
  <section id="tab-s5" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="s5">
      <h2>R1.04 · TP5 : premiers scripts Bash</h2>
      <p class="muted">Shebang, variables, read, substitution de commande, if sur un code retour.</p>
      <h3>1. Un script complet</h3>
<div class="tscroll"><pre class="f" style="margin:0;line-height:1.5">#!/usr/bin/env bash
# Verifier une saisie de huit bits
read -r -p "Saisir exactement huit bits : " bits
regex='^[01]{8}$'
if printf '%s\n' "$bits" | grep -Eq "$regex"
then
    echo "Conforme : huit bits"
else
    echo "Non conforme : huit caracteres 0 ou 1 attendus"
fi</pre></div>
      <h3>2. Lancer un script</h3>
      <ul>
        <li><b>Shebang</b> <span class="f">#!/usr/bin/env bash</span> en 1ʳᵉ ligne : choisit l'interpréteur. <span class="f">#</span> = commentaire.</li>
        <li><span class="f">bash -n s.sh</span> vérifie la syntaxe sans exécuter ; <span class="f">bash s.sh</span> exécute (r suffit) ; <span class="f">bash -x</span> trace.</li>
        <li><span class="f">chmod u+x s.sh</span> puis <span class="f">./s.sh</span> : le <span class="f">./</span> est nécessaire car le dossier courant n'est pas dans le PATH.</li>
      </ul>
      <h3>3. Variables et lecture</h3>
      <ul>
        <li><span class="f">nom="Alice Martin"</span> : <b>aucun espace</b> autour de =, pas de $ à gauche. <span class="f">bits = "0101"</span> → command not found.</li>
        <li><span class="f">"$nom"</span> donne la valeur ; <span class="f">'$nom'</span> affiche $nom tel quel ; <span class="f">${octet}</span> délimite le nom.</li>
        <li><span class="f">read -r -p "Question : " var</span> : -r garde les antislashs, -p affiche la question, pas de $ devant var.</li>
        <li><span class="f">$(whoami)</span> : substitution de commande (le résultat de la commande). À ne pas confondre avec <span class="f">${var}</span>.</li>
      </ul>
      <h3>4. if teste un code retour</h3>
      <ul>
        <li><span class="f">if commande ; then … else … fi</span> : la branche then s'exécute si le code retour vaut <b>0</b>. then et fi obligatoires, else facultatif.</li>
        <li><span class="f">exit 0</span> / <span class="f">exit 1</span> fixent le code du script ; afficher « Non conforme » ne le fait pas échouer.</li>
        <li>Fiche système : 1ʳᵉ ligne avec <span class="f">&gt;</span>, les suivantes avec <span class="f">&gt;&gt;</span> : pas de doublon si on relance.</li>
      </ul>
      <div class="box trap">Erreurs fréquentes : Permission denied → <span class="f">chmod u+x</span> ; No such file → vérifier <span class="f">pwd</span> et la casse ; unexpected end of file → fi ou guillemet manquant ; <span class="f">bash\r</span> ou <span class="f">^M</span> → fins de ligne CRLF au lieu de LF.</div>
      <p>Git : <span class="f">git add R104_TP5</span>, <span class="f">git commit -m "message"</span>, <span class="f">git push</span> ; <span class="f">git status</span>.</p>
    </article>
  </section>

  <!-- ============ R1.04 : FICHE ============ -->
  <section id="tab-sx" role="tabpanel" hidden>
    <div class="ftools"><button type="button" class="btn" data-fs="r104">Agrandir la fiche</button><span class="hint">Sélectionne un passage pour le <mark class="uhl" style="--hl:#ffe86b">surligner</mark> : il est gardé dans ta fiche annexe, en bas de page. Les documents autorisés au devoir ne sont pas annoncés : imprime-la au cas où.</span></div>
    <div class="fiche-host" data-subj="r104"><div class="pfwrap">
<section class="pf r104" aria-label="Fiche page 1">
  <header class="pf-head">
    <span class="pf-code">R1.04</span>
    <div class="pf-title"><b>Linux : commandes, droits, regex, Bash</b><span>Systèmes · CM + TP1 à TP5</span></div>
    <span class="pf-exam">Devoir jeu. 3/12<br>8 h</span>
  </header>
  <div class="pf-key"><ol>
    <li><b>&gt;</b> écrase, <b>&gt;&gt;</b> ajoute.</li>
    <li>r = 4, w = 2, x = 1 · x sur dossier = <b>traverser</b>.</li>
    <li>grep sans <b>^…$</b> accepte une sous-chaîne.</li>
    <li>if teste un code retour : <b>0 = vrai</b>.</li>
  </ol></div>
  <div class="pf-cols">
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>1</i>Fichiers</h4>
        <table><tr><td class="m">ls -la, ls -ld d</td><td>détails, cachés, le dossier</td></tr><tr><td class="m">mkdir -p a/b</td><td>avec les parents</td></tr><tr><td class="m">cp -r, mv</td><td>copier ; déplacer ou renommer</td></tr><tr><td class="m">rm -r, rmdir</td><td>sans corbeille ; rmdir = vide</td></tr><tr><td class="m">head / tail -n 5</td><td>10 lignes par défaut</td></tr><tr><td class="m">wc -l -w -c</td><td>lignes, mots, octets</td></tr><tr><td class="m">find . -name "*.txt"</td><td>recherche récursive</td></tr></table>
      </div>
      <div class="pf-blk"><h4><i>2</i>Redirections</h4>
        <p class="m">cmd &gt; f        crée ou écrase<br>cmd &gt;&gt; f       ajoute<br>cmd 2&gt; err     erreurs<br>cmd &gt; f 2&gt;&amp;1   tout<br>cmd1 | cmd2    tube</p>
      </div>
      <div class="pf-blk tint"><h4><i>3</i>Filtres</h4>
        <p class="m">sort -n -r -u · uniq<br>grep -i -v -c -n -x -q -E<br>cut -d ':' -f 1 · -f 2-<br>sed 's/a/b/g'</p>
        <p>sort sans -n : 10 avant 9. grep -q n'affiche rien : regarder $?.</p>
      </div>
      <div class="pf-blk"><h4><i>4</i>Notions</h4>
        <ul><li>Linux = noyau ; distribution = noyau + GNU + logiciels.</li><li>Windows non POSIX.</li><li>Inode : pas de nom.</li><li>Caché = commence par « . ». Casse respectée.</li><li>Jokers ? (1 car.) * (0 ou plus) ≠ regex.</li></ul>
      </div>
    </div>
    <div class="pf-col">
      <div class="pf-blk tint"><h4><i>5</i>Droits</h4>
        <table><tr><th>octal</th><th>droits</th></tr><tr><td>755</td><td class="m">rwxr-xr-x</td></tr><tr><td>644</td><td class="m">rw-r--r--</td></tr><tr><td>700</td><td class="m">rwx------</td></tr><tr><td>600</td><td class="m">rw-------</td></tr><tr><td>640</td><td class="m">rw-r-----</td></tr></table>
        <p class="m">chmod u+x,g-r,o=r f   (640 → 704)<br>chmod a=rw f          (666)</p>
        <p>umask 022 → 644 / 755 ; 027 → 640 / 750 ; 077 → 600 / 700 (fichier / dossier).</p>
        <p>Dossier : r lister, w créer/supprimer, <b>x traverser</b>. Il faut x sur tous les parents.</p>
      </div>
      <div class="pf-blk"><h4><i>6</i>Regex (grep -E)</h4>
        <p class="m">^ $ · [0-9] [^…] · {2} {1,3} * + ? · ( | ) · \. littéral</p>
        <p class="m">^[01]{8}$<br>^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$</p>
        <p>$? : 0 trouvé, 1 rien, 2 erreur.</p>
      </div>
      <div class="pf-blk pfex"><h4><i>✓</i>Script Bash</h4>
        <p class="m">#!/usr/bin/env bash<br>read -r -p "Bits : " bits<br>if printf '%s\n' "$bits" | grep -Eq '^[01]{8}$'<br>then echo "Conforme"<br>else echo "Non conforme"<br>fi</p>
        <p>nom="x" sans espace. ./s.sh après chmod u+x. bash -n vérifie.</p>
      </div>
    </div>
  </div>
  <footer class="pf-foot"><span>R1.04 Systèmes · fiche mémento</span><span>CM · TP1 à TP5</span></footer>
</section>
</div>
</div>
    <div class="section-title" style="text-align:center">Ma fiche annexe</div>
    <div class="annex" data-subj="r104"></div>
  </section>

  <!-- ============ R1.01 : LANGAGE C ============ -->
  <section id="tab-c1" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="c1">
      <h2>R1.01 · C : bases et structures de contrôle</h2>
      <p class="muted">Programmation en C, chapitres 1 à 3.</p>
      <div class="box trap"><b>Périmètre du devoir du 7/12 non confirmé.</b> Rien n'est annoncé sur Arche au 17/11 : l'hypothèse est la partie 2 Programmation (langage C, chapitres 1 à 9). À confirmer en CM. Jusqu'ici, cours, TD et TP papier étaient autorisés, aucun support numérique.</div>
      <h3>1. Du programme à l'exécutable</h3>
      <ul>
        <li>C : créé par <b>Dennis Ritchie</b> (Bell Labs, début des années 70) pour écrire <b>UNIX</b> ; successeur du langage B ; peu d'instructions, beaucoup d'opérateurs, <b>faiblement typé</b>.</li>
        <li>Fonction <span class="f">int main()</span> obligatoire : le point d'entrée (0 = succès).</li>
        <li><span class="f">gcc prog.c</span> → <span class="f">a.out</span> ; <span class="f">gcc -o prog prog.c</span>. Trois étapes : <b>préprocesseur</b> (directives #), <b>compilation</b> (→ .o), <b>édition de liens</b> (→ exécutable). Options <span class="f">-c</span>, <span class="f">-E</span>, <span class="f">-Wall</span> (un warning n'empêche pas l'exécutable), <span class="f">-lm</span>.</li>
        <li>Identificateurs : lettres non accentuées, chiffres, _, commencent par une lettre, casse respectée. Commentaires <span class="f">/* … */</span> ou <span class="f">//</span>.</li>
      </ul>
<div class="tscroll"><pre class="f" style="margin:0;line-height:1.5">#include &lt;stdio.h&gt;
int main()
{
    float noteM, noteF, moy;
    printf("Saisir la note de Math : \n");
    scanf("%f", &amp;noteM);
    printf("Saisir la note de Français : \n");
    scanf("%f", &amp;noteF);
    moy = (noteM + noteF) / 2.0;
    printf("moyenne est de : %f", moy);
}</pre></div>
      <h3>2. Types et opérateurs</h3>
      <div class="tscroll"><table class="tt">
        <tr><th>Type</th><th>Taille</th><th>Format</th></tr>
        <tr><td class="f">int</td><td>2 ou 4 octets</td><td class="f">%d</td></tr>
        <tr><td class="f">long, unsigned</td><td></td><td class="f">%ld, %u</td></tr>
        <tr><td class="f">float</td><td>4 octets (1 + 8 + 23)</td><td class="f">%f</td></tr>
        <tr><td class="f">double</td><td>8 octets (1 + 11 + 52)</td><td class="f">%lf</td></tr>
        <tr><td class="f">char</td><td>1 octet (−128 à 127)</td><td class="f">%c</td></tr>
      </table></div>
      <ul>
        <li>Pas de booléen : vrai = non nul, une comparaison vaut 1 ou 0. Pas de type chaîne : tableau de char terminé par <span class="f">'\0'</span> (<span class="f">%s</span>).</li>
        <li><span class="f">#define PI 3.14159</span> : remplacement textuel, sans ; ni =.</li>
        <li><span class="f">5 / 2</span> = 2 (division entière) ; <span class="f">5 / 2.</span> = 2.5 ; <span class="f">%</span> seulement sur des entiers ; <span class="f">-7 % 3</span> = −1 (signe du dividende).</li>
        <li>Conversion vers le type de gauche : <span class="f">int i, j = 4; float x = 2.5; i = j + x;</span> → i = 6.</li>
        <li><span class="f">++i</span> incrémente puis utilise ; <span class="f">i++</span> utilise puis incrémente. <span class="f">x = 2; y = ++x;</span> → x = y = 3 ; puis <span class="f">z = x--;</span> → z = 3, x = 2.</li>
        <li><span class="f">&amp;&amp;</span>, <span class="f">||</span> : évaluation de gauche à droite, arrêt dès que le résultat est connu.</li>
        <li>Ternaire : <span class="f">min = (x &lt; y) ? x : y;</span> ; virgule : <span class="f">a = ((x = 8), (x + 3));</span> → a = 11.</li>
      </ul>
      <div class="box trap">Avec a = 5 et b = 2 entiers : <span class="f">(float) a / b</span> = <b>2.5</b> (le cast porte sur a, puis division réelle) mais <span class="f">(float)(a / b)</span> = 2.0. Le poly annonce 2.0 pour la première écriture : c'est 2.5 à l'exécution (vérifié avec gcc).</div>
      <h3>3. Structures de contrôle</h3>
      <ul>
        <li><span class="f">if (cond) … else …</span> : condition <b>entre parenthèses</b> ; un else se rattache au <b>dernier if</b> sans else (mettre des accolades).</li>
        <li><span class="f">switch (c) { case 'a' : … break; default : … }</span> : sans break, on enchaîne sur les case suivants.</li>
        <li><span class="f">while</span> : 0 à n tours ; <span class="f">do … while (cond);</span> : au moins 1 tour ; <span class="f">for (init; cond; suite)</span>.</li>
        <li><span class="f">break</span> sort de la boucle la plus interne ; <span class="f">continue</span> passe au tour suivant.</li>
      </ul>
      <div class="box exm">a = 0 ; <span class="f">for (i = 4; i &gt; 0; i--) { if (i == 2) continue; a = a + 2*i; }</span> → <b>a = 16, i = 0</b>.<br>a = 0 ; <span class="f">for (i = 4; i &gt; 0; i--) { a = a + 2*i; if (i == 2) break; }</span> → <b>a = 18, i = 2</b> (le poly annonce 14 : a est augmenté de 4 avant le test).</div>
      <h3>4. Entrées-sorties</h3>
      <ul>
        <li><span class="f">%5d</span> largeur 5 à droite ; <span class="f">%-5d</span> à gauche ; <span class="f">%5.2f</span> 5 caractères dont 2 décimales (6 par défaut) ; <span class="f">%.3s</span> 3 premiers caractères. <span class="f">%5.2f</span> de 3.14159 → « ␣3.14 » ; <span class="f">%8.4s</span> de "bonjour" → « ␣␣␣␣bonj ».</li>
        <li><span class="f">scanf("%d", &amp;n)</span> : toujours <b>l'adresse</b>, sauf pour une chaîne ; pas de \n dans le format.</li>
        <li><span class="f">c = getchar(); putchar(c);</span></li>
      </ul>
    </article>
  </section>

  <section id="tab-c2" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="c2">
      <h2>R1.01 · C : fonctions et pointeurs</h2>
      <p class="muted">Chapitres 4 et 5.</p>
      <div class="box trap"><b>Périmètre du devoir du 7/12 non confirmé.</b> Rien n'est annoncé sur Arche au 17/11 : l'hypothèse est la partie 2 Programmation (langage C, chapitres 1 à 9). À confirmer en CM. Jusqu'ici, cours, TD et TP papier étaient autorisés, aucun support numérique.</div>
      <h3>1. Fonctions</h3>
      <ul>
        <li><span class="f">type nom(type p1, type p2) { … return expr; }</span>, définie avant main ou annoncée par un <b>prototype</b> (<span class="f">int Max2(int a, int b);</span>). Le premier return exécuté termine la fonction.</li>
        <li><span class="f">void</span> = procédure : pas de valeur renvoyée.</li>
        <li><span class="f">int Max3(int a, int b, int c) { return Max2(a, Max2(b, c)); }</span> : Max3(4, 7, −3) = 7.</li>
      </ul>
      <div class="box def"><b>Passage par valeur</b> uniquement : la fonction travaille sur une copie. <span class="f">void Permut(int a, int b)</span> n'échange rien. Pour modifier une variable de l'appelant, on passe son <b>adresse</b>.</div>
<div class="tscroll"><pre class="f" style="margin:0;line-height:1.5">void Permut(int *a, int *b)
{
    int mem = *a;
    *a = *b;
    *b = mem;
}
/* x = 3, y = 6 ; Permut(&amp;x, &amp;y);  ->  x = 6, y = 3 */</pre></div>
      <h3>2. Pointeurs</h3>
      <ul>
        <li><span class="f">int *p;</span> pointeur sur entier ; <span class="f">p = &amp;i;</span> ; <span class="f">*p</span> = la valeur pointée (modifier *p modifie i). <span class="f">NULL</span> = ne pointe sur rien.</li>
        <li>Si p pointe sur un élément d'un tableau, <span class="f">p + j</span> pointe j cases plus loin (p + 1 avance de sizeof(type) octets).</li>
        <li><span class="f">p = (int *) malloc(n * sizeof(int));</span> réserve n entiers ; <span class="f">calloc</span> les met à 0 ; <span class="f">free(p);</span> libère.</li>
        <li>Procédure à résultat : <span class="f">void Maximum(int a, int b, int *m)</span>, appel <span class="f">Maximum(x, y, &amp;max);</span>.</li>
      </ul>
      <div class="box trap">Passage par valeur : modifier un paramètre ne change rien chez l'appelant. Oublier le &amp; à l'appel ou l'étoile dans la fonction est l'erreur classique.</div>
    </article>
  </section>

  <section id="tab-c3" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="c3">
      <h2>R1.01 · C : tableaux, chaînes, structures</h2>
      <p class="muted">Chapitre 6.</p>
      <div class="box trap"><b>Périmètre du devoir du 7/12 non confirmé.</b> Rien n'est annoncé sur Arche au 17/11 : l'hypothèse est la partie 2 Programmation (langage C, chapitres 1 à 9). À confirmer en CM. Jusqu'ici, cours, TD et TP papier étaient autorisés, aucun support numérique.</div>
      <h3>1. Tableaux</h3>
      <ul>
        <li><span class="f">int tab[5] = {4, 6, 8, 1, 2};</span> : indices <b>0 à n − 1</b>. <span class="f">int t[] = {6, 3, 18};</span> a 3 cases ; un agrégat plus court est complété par des 0.</li>
        <li>Le nom du tableau est l'adresse constante du 1ᵉʳ élément : <span class="f">tab</span> ≡ <span class="f">&amp;tab[0]</span>, <span class="f">tab[i]</span> ≡ <span class="f">*(tab + i)</span>. On peut écrire <span class="f">p = tab;</span> mais pas <span class="f">tab = p;</span> ni <span class="f">tab++</span>.</li>
        <li>Aucune vérification des débordements.</li>
        <li>2D : <span class="f">int t[2][3] = {{1,2,3},{5,6,7}};</span>, parcours <span class="f">t[l][c]</span> avec deux for.</li>
      </ul>
      <h3>2. Chaînes</h3>
      <ul>
        <li><span class="f">char ch[8] = "bonjour";</span> : 7 caractères + <span class="f">'\0'</span>, donc 8 cases (sizeof = 8).</li>
        <li><span class="f">scanf("%s", ch)</span> sans &amp;, s'arrête à l'espace ; <span class="f">fgets(ch, sizeof(ch), stdin)</span> lit au plus taille − 1 caractères et garde le \n s'il tient ; <span class="f">strlen</span> dans string.h.</li>
      </ul>
      <h3>3. Structures, énumérations, unions</h3>
      <ul>
        <li><span class="f">struct personne { char nom[20]; int age; };</span> accès <span class="f">p1.age</span> ; <span class="f">typedef struct { … } Personne;</span>.</li>
        <li>Pointeur sur structure : <span class="f">(*p).age</span> ou <span class="f">p-&gt;age</span> (parenthèses obligatoires : . est prioritaire sur *).</li>
        <li><span class="f">enum couleur { bleu, rouge, blanc, jaune };</span> → codées 0, 1, 2, 3.</li>
        <li><span class="f">union nombre { int i; float f; };</span> : un seul champ valide à la fois.</li>
      </ul>
      <div class="box trap">Tableau indicé de 0 à n − 1 ; prévoir une case pour '\0' ; = (affectation) ≠ == (comparaison).</div>
    </article>
  </section>

  <section id="tab-c4" role="tabpanel" hidden>
    <article class="sheet fiche" data-doc="c4">
      <h2>R1.01 · C : compléments, structures de données, arbres</h2>
      <p class="muted">Chapitres 7 à 9.</p>
      <div class="box trap"><b>Périmètre du devoir du 7/12 non confirmé.</b> Rien n'est annoncé sur Arche au 17/11 : l'hypothèse est la partie 2 Programmation (langage C, chapitres 1 à 9). À confirmer en CM. Jusqu'ici, cours, TD et TP papier étaient autorisés, aucun support numérique.</div>
      <h3>1. Compléments</h3>
      <ul>
        <li><span class="f">#include &lt;stdio.h&gt;</span> (dossiers système) ≠ <span class="f">#include "fraction.h"</span> (dossier courant). Macro <span class="f">#define MAX(a,b) (a &gt; b ? a : b)</span>, sans espace avant la parenthèse.</li>
        <li><span class="f">FILE *f = fopen("titi.txt", "r");</span> modes "r" (doit exister), "w" (crée ou écrase), "a" (ajoute) ; <span class="f">fclose(f);</span> ; fin de fichier <span class="f">EOF</span> (−1). stdin, stdout, stderr sont toujours ouverts.</li>
        <li>Compilation séparée : <span class="f">x.h</span> (prototypes, types, protégé par <span class="f">#ifndef X_H</span>) + <span class="f">x.c</span> ; chaque .c → .o, puis édition de liens ; un seul main.</li>
      </ul>
      <h3>2. Listes, piles, files</h3>
      <ul>
        <li>Liste : chaque élément connaît son successeur ; accès par la tête.</li>
        <li><b>Pile = LIFO</b> (dernier entré, premier sorti) : Empiler, Depiler, Sommet. Gère les appels de sous-programmes.</li>
        <li><b>File = FIFO</b> (premier entré, premier sorti) : Enfiler en queue, Defiler en tête. Gère l'accès des processus au processeur.</li>
      </ul>
      <h3>3. Arbres</h3>
      <ul>
        <li>Racine, fils, feuilles (sans fils), nœuds internes. Degré = nombre de fils ; taille = nombre de nœuds ; hauteur (arbre vide 0, racine seule 1).</li>
        <li>Arbre binaire : 0, 1 ou 2 fils (gauche, droit).</li>
      </ul>
      <div class="box exm">Expression ((a − b) × 3) + (c × d) :<br><b>préfixé</b> (racine, G, D) : <span class="f">+ * - a b 3 * c d</span><br><b>postfixé</b> (G, D, racine) : <span class="f">a b - 3 * c d * +</span><br><b>infixé</b> (G, racine, D) : <span class="f">a - b * 3 + c * d</span></div>
      <div class="box def">Arbre binaire de recherche : plus petit à gauche, plus grand à droite ; le parcours <b>infixé</b> donne les valeurs triées. Insertion de 15, 0, 7, −3, 20, 2 → racine 15 ; infixé : −3 0 2 7 15 20.</div>
    </article>
  </section>

  <!-- ============ MES FICHES ============ -->
  <section id="tab-mine" role="tabpanel" hidden>
    <div class="sheet">
      <h2>Ajouter une fiche</h2>
      <p class="muted" style="max-width:70ch">Colle une fiche de révision ou un extrait de cours (n'importe quelle matière). Claude en tire une série de questions que tu retrouves dans « S'entraîner ». Tu peux aussi demander à Claude dans le fil du projet d'ajouter une fiche pour toi.</p>
      <label class="lbl" for="newTitle">Titre</label>
      <input class="txt" id="newTitle" placeholder="Ex. R1.07 · Chapitre 3 Suites">
      <label class="lbl" for="newText">Contenu de la fiche</label>
      <textarea class="txt" id="newText" placeholder="Colle ici ta fiche, ton cours ou tes notes…"></textarea>
      <div class="actions" style="justify-content:flex-start;margin-top:12px">
        <button class="btn" id="genBtn">Créer les questions</button>
        <button class="btn ghost" id="stopBtn" hidden>Arrêter</button>
      </div>
      <div class="status" id="genStatus" role="status"></div>
    </div>
    <div class="section-title">Mes fiches</div>
    <div class="mylist" id="mylist"></div>
    <div id="ficheView" class="sheet" style="margin-top:14px" hidden></div>
  </section>
</div>

<script>
/* ===================== Banque de questions ===================== */
const VF = ["Vrai","Faux"];
const BANK = {
logique: [
 {id:"l1",type:"mcq",q:"Lequel de ces énoncés n'est PAS une proposition ?",choices:["Il pleut.","Quelle heure est-il ?","2 + 2 = 5","Si la sonnerie retentit, le cours s'arrête."],answer:1,expl:"Une proposition peut être vraie ou fausse. Une question ou un ordre ne l'est pas. « 2 + 2 = 5 » est une proposition (fausse)."},
 {id:"l2",type:"mcq",q:"Pour quelle interprétation <span class='f'>p → q</span> est-elle fausse ?",choices:["p = V, q = V","p = V, q = F","p = F, q = V","p = F, q = F"],answer:1,expl:"L'implication n'est fausse que dans un seul cas : p vrai et q faux."},
 {id:"l3",type:"mcq",q:"<span class='f'>p ↔ q</span> est vraie quand…",choices:["p et q sont vraies","au moins une est vraie","p et q ont la même valeur de vérité","p et q ont des valeurs différentes"],answer:2,expl:"La biconditionnelle vaut V quand p et q sont toutes deux V ou toutes deux F."},
 {id:"l4",type:"input",q:"Combien y a-t-il d'interprétations pour 3 propositions élémentaires p, q, r ?",answers:["8"],expl:"2ⁿ interprétations avec n lettres : 2³ = 8."},
 {id:"l5",type:"input",q:"Combien de lignes a la table de vérité d'une formule construite sur p, q, r, s ?",answers:["16"],expl:"2⁴ = 16 interprétations."},
 {id:"l6",type:"mcq",q:"Quelle est la <b>contraposée</b> de <span class='f'>p → q</span> ?",choices:["q → p","¬p → ¬q","¬q → ¬p","p ∧ ¬q"],answer:2,expl:"Contraposée : ¬q → ¬p. Elle est équivalente à p → q. (q → p est la réciproque.)"},
 {id:"l7",type:"mcq",q:"Quelle est la <b>réciproque</b> de <span class='f'>p → q</span> ?",choices:["q → p","¬q → ¬p","¬p → ¬q","¬p ∨ q"],answer:0,expl:"Réciproque : q → p. Elle n'est PAS équivalente à p → q (i3 : p=F, q=V est un modèle de p→q mais un contre-exemple de q→p)."},
 {id:"l8",type:"mcq",q:"Quelle formule est équivalente à <span class='f'>p → q</span> ?",choices:["q → p","¬p ∨ q","p ∨ ¬q","¬p → ¬q"],answer:1,expl:"p → q éq ¬p ∨ q (même table : seule la ligne V,F donne F). À retenir (TD1 ex. 6)."},
 {id:"l9",type:"mcq",q:"Loi de Morgan : <span class='f'>¬(p ∧ q)</span> éq …",choices:["¬p ∧ ¬q","¬p ∨ ¬q","p ∨ q","¬p → q"],answer:1,expl:"¬(p ∧ q) éq ¬p ∨ ¬q : la négation transforme le ET en OU."},
 {id:"l10",type:"mcq",q:"Loi de Morgan : <span class='f'>¬(p ∨ q)</span> éq …",choices:["¬p ∨ ¬q","¬p ∧ ¬q","p ∧ q","¬p ↔ ¬q"],answer:1,expl:"¬(p ∨ q) éq ¬p ∧ ¬q (« ni p ni q »)."},
 {id:"l11",type:"mcq",q:"Nature de <span class='f'>p ∨ ¬p</span> ?",choices:["Tautologie","Contradiction","Contingente"],answer:0,expl:"Elle vaut V pour p = V et pour p = F : que des modèles."},
 {id:"l12",type:"mcq",q:"Nature de <span class='f'>p ∧ ¬p</span> ?",choices:["Tautologie","Contradiction","Contingente"],answer:1,expl:"Aucun modèle : c'est une contradiction, notée p ∧ ¬p ⊨."},
 {id:"l13",type:"mcq",q:"Nature de <span class='f'>(p ∧ q) → p</span> ?",choices:["Tautologie","Contradiction","Contingente"],answer:0,expl:"Pour être F il faudrait p ∧ q = V et p = F, impossible. C'est une tautologie."},
 {id:"l14",type:"mcq",q:"Nature de <span class='f'>p → q</span> ?",choices:["Tautologie","Contradiction","Contingente"],answer:2,expl:"i1 (V,V) est un modèle et i2 (V,F) un contre-exemple : formule contingente."},
 {id:"l15",type:"mcq",q:"« Il réussira <b>seulement s'il</b> travaille. » (p : il réussit, q : il travaille)",choices:["p → q","q → p","p ↔ q","p ∧ q"],answer:0,expl:"« p seulement si q » se traduit par p → q (TD1 ex. 10.5)."},
 {id:"l16",type:"mcq",q:"« Il ralentit <b>s'il</b> freine. » (p : il ralentit, q : il freine)",choices:["p → q","q → p","p ↔ q","¬q → p"],answer:1,expl:"« p si q » = « si q alors p » : q → p."},
 {id:"l17",type:"mcq",q:"« Pour penser, <b>il faut</b> être. » (p : penser, q : être)",choices:["p → q","q → p","p ↔ q","¬p → ¬q"],answer:0,expl:"« Pour p il faut q » : q est une condition nécessaire de p, donc p → q."},
 {id:"l18",type:"mcq",q:"« <b>Il suffit</b> que je chante pour qu'il pleuve. » (p : je chante, q : il pleut)",choices:["p → q","q → p","p ↔ q","p ∧ q"],answer:0,expl:"Condition suffisante à gauche de la flèche : p → q."},
 {id:"l19",type:"mcq",q:"« Pour qu'il vienne, <b>il suffit</b> que je l'appelle. » (p : il vient, q : je l'appelle)",choices:["p → q","q → p","p ↔ q","¬q → ¬p"],answer:1,expl:"La condition suffisante est « je l'appelle » (q) : q → p."},
 {id:"l20",type:"mcq",q:"« Je viendrai <b>sauf s'il</b> est là. » (p : je viens, q : il est là)",choices:["p → ¬q","¬q → p","p ↔ ¬q","p ∧ ¬q"],answer:2,expl:"Convention du cours (TD1 ex. 9.4 et 10.2) : « sauf si » / « à moins que » se traduit par p ↔ ¬q."},
 {id:"l21",type:"mcq",q:"« S'il pleut je joue aux cartes, <b>sinon</b> je me promène. » (p, q, r dans l'ordre)",choices:["p → (q ∨ r)","(p → q) ∧ (¬p → r)","(p → q) ∨ r","(p ∧ q) ∨ r"],answer:1,expl:"« sinon » = « si non p alors r » : (p → q) ∧ (¬p → r)."},
 {id:"l22",type:"mcq",q:"« Je suis riche <b>mais</b> je ne suis pas heureux. » (p : riche, q : heureux)",choices:["p ∨ ¬q","p → ¬q","p ∧ ¬q","¬(p ∧ q)"],answer:2,expl:"« mais » se traduit par un ET : p ∧ ¬q."},
 {id:"l23",type:"mcq",q:"Négation de « Elle lit ou se promène en forêt » :",choices:["Elle ne lit pas ou ne se promène pas en forêt.","Elle ne lit pas et ne se promène pas en forêt.","Elle lit et se promène en forêt.","Si elle lit, elle ne se promène pas."],answer:1,expl:"¬(p ∨ q) éq ¬p ∧ ¬q : elle ne lit pas ET ne se promène pas."},
 {id:"l24",type:"mcq",q:"Négation de « Les voitures de ce garage sont neuves et bien équipées » :",choices:["Elles ne sont ni neuves ni bien équipées.","Elles ne sont pas neuves ou pas bien équipées.","Elles sont neuves mais pas bien équipées.","Elles ne sont pas neuves et sont bien équipées."],answer:1,expl:"¬(p ∧ q) éq ¬p ∨ ¬q (exemple du polycopié)."},
 {id:"l25",type:"mcq",q:"« Si son cheval chute, Marie sera disqualifiée. » Marie <b>est</b> disqualifiée. Son cheval a-t-il chuté ?",choices:["Oui, forcément","Non, forcément","On ne peut pas conclure"],answer:2,expl:"Il faudrait utiliser la réciproque (« si disqualifiée alors chute »), qui n'est pas équivalente à l'implication."},
 {id:"l26",type:"mcq",q:"« Si son cheval chute, Marie sera disqualifiée. » Marie <b>n'est pas</b> disqualifiée. Son cheval a-t-il chuté ?",choices:["Oui","Non","On ne peut pas conclure"],answer:1,expl:"La contraposée « si elle n'est pas disqualifiée, son cheval n'a pas chuté » est équivalente à l'implication."},
 {id:"l27",type:"mcq",q:"Connecteur principal (le plus externe) de <span class='f'>((p ∨ r) → ¬q) ∨ r</span> ?",choices:["→","∨ (celui de droite)","¬","∨ (celui de p ∨ r)"],answer:1,expl:"La formule est de la forme (…) ∨ r : on enlève d'abord ce ∨, puis le →, etc."},
 {id:"l28",type:"mcq",q:"<span class='f'>A éq B</span> si et seulement si…",choices:["⊨ (A → B)","⊨ (A ↔ B)","A ∧ B est une tautologie","A et B ont un modèle commun"],answer:1,expl:"Théorème 10.1 : A éq B ⇔ A ↔ B est une tautologie, c'est-à-dire que A et B ont les mêmes modèles."},
 {id:"l29",type:"mcq",q:"Un <b>modèle</b> d'une formule φ, c'est…",choices:["une interprétation où φ vaut V","une interprétation où φ vaut F","une formule équivalente à φ","une tautologie"],answer:0,expl:"Modèle : interprétation pour laquelle φ est interprétée à V. Contre-exemple : à F."},
 {id:"l30",type:"mcq",q:"La notation <span class='f'>⊨ φ</span> signifie…",choices:["φ est une contradiction","φ est une tautologie","φ a un modèle","φ est contingente"],answer:1,expl:"⊨ φ : φ est une tautologie. φ ⊨ : φ est une contradiction."},
 {id:"l31",noInterp:true,fillVars:true,type:"mcq",q:"Avec les conventions du cours, que vaut l'interprétation <b>i5</b> pour (p, q, r) ?",choices:["V F V","F V V","F V F","V F F"],answer:1,expl:"i1 VVV, i2 VVF, i3 VFV, i4 VFF, i5 FVV, i6 FVF, i7 FFV, i8 FFF."},
 {id:"l32",type:"mcq",q:"Valeur de <span class='f'>(p ∨ q) → p</span> pour p = F, q = V ?",choices:VF,answer:1,expl:"p ∨ q = V et p = F, donc V → F = F. C'est un contre-exemple (exemple du cours, i3)."},
 {id:"l33",type:"mcq",q:"Modèles de <span class='f'>p → (q ∧ r)</span> ?",choices:["{i1, i5, i6, i7, i8}","{i1}","{i2, i3, i4}","{i1, i2, i3, i4}"],answer:0,expl:"Si p = V il faut q ∧ r = V (seulement i1). Si p = F l'implication est vraie (i5 à i8)."},
 {id:"l34",type:"mcq",q:"Pour justifier qu'une formule est <b>contingente</b>, on donne…",choices:["sa table de vérité seulement","un modèle et un contre-exemple","deux modèles","une formule équivalente"],answer:1,expl:"Un contre-exemple prouve qu'elle n'est pas une tautologie, un modèle qu'elle n'est pas une contradiction."},
 {id:"l35",type:"mcq",q:"Le « ou » du calcul des propositions (∨) est…",choices:["exclusif","inclusif"],answer:1,expl:"∨ est inclusif : p ∨ q est vrai si p, si q, ou si les deux sont vrais."},
 {id:"l36",type:"mcq",q:"Négation de <span class='f'>p → q</span> ?",choices:["¬p → ¬q","q → p","p ∧ ¬q","¬p ∧ q"],answer:2,expl:"p → q éq ¬p ∨ q, donc sa négation est ¬(¬p ∨ q) éq p ∧ ¬q (Morgan)."},
 {id:"l37",type:"mcq",q:"Négation de « Cette région n'est pas chaude ou est humide » :",choices:["Elle est chaude et n'est pas humide.","Elle est chaude ou n'est pas humide.","Elle n'est ni chaude ni humide.","Elle n'est pas chaude et est humide."],answer:0,expl:"¬(¬p ∨ q) éq ¬¬p ∧ ¬q éq p ∧ ¬q."},
 {id:"l38",type:"mcq",q:"« Il ira au cinéma seulement si le concert est annulé. » (p : cinéma, q : concert annulé)",choices:["p → q","q → p","p ↔ q","p ∧ q"],answer:0,expl:"« seulement si » : p → q (exercices corrigés, ex. 3.1)."},
 {id:"l39",type:"mcq",q:"« Pour faire connaître ce restaurant, il suffit d'en faire de la publicité. » (p : connaître, q : publicité)",choices:["p → q","q → p","p ↔ q","¬p → q"],answer:1,expl:"La condition suffisante (publicité, q) est à gauche : q → p."},
 {id:"l40",type:"mcq",q:"<span class='f'>p ↔ q</span> est équivalente à…",choices:["(p → q) ∨ (q → p)","(p → q) ∧ (q → p)","p ∧ q","¬p ∨ q"],answer:1,expl:"La biconditionnelle, c'est l'implication dans les deux sens (TD1 ex. 6.3)."}
],
ensembles: [
 {id:"e1",type:"mcq",q:"<span class='f'>{∅}</span>, c'est…",choices:["l'ensemble vide","un singleton dont l'élément est ∅","un ensemble à 0 élément","une paire"],answer:1,expl:"{∅} contient un élément (l'ensemble vide) : Card({∅}) = 1."},
 {id:"e2",type:"input",q:"Écris en extension l'ensemble des lettres du mot « ananas ».",answers:["{a,n,s}"],set:true,expl:"Chaque élément une seule fois, l'ordre ne compte pas : {a, n, s}."},
 {id:"e3",type:"input",q:"Écris en extension <span class='f'>A = {x ∈ ℕ / x² ≤ 10}</span>.",answers:["{0,1,2,3}"],set:true,expl:"0, 1, 4, 9 ≤ 10 mais 16 > 10 : A = {0, 1, 2, 3}."},
 {id:"e4",type:"input",q:"Écris en extension <span class='f'>D = {x ∈ ℤ / x² ≤ 10}</span>.",answers:["{-3,-2,-1,0,1,2,3}"],set:true,expl:"Dans ℤ on prend aussi les négatifs : D = {−3, −2, −1, 0, 1, 2, 3}."},
 {id:"e5",type:"input",q:"Si Card(E) = 3, combien vaut Card(P(E)) ?",answers:["8"],expl:"Card(P(E)) = 2^Card(E) = 2³ = 8."},
 {id:"e6",type:"input",q:"Si Card(E) = 5, combien vaut Card(P(E)) ?",answers:["32"],expl:"2⁵ = 32."},
 {id:"e7",type:"mcq",q:"A = {b, u, t}. Compléter : <span class='f'>{u} … A</span>",choices:["∈","⊂"],answer:1,expl:"{u} est un ensemble (une partie de A) : {u} ⊂ A."},
 {id:"e8",type:"mcq",q:"A = {b, u, t}. Compléter : <span class='f'>{b, t} … P(A)</span>",choices:["∈","⊂"],answer:0,expl:"{b, t} est une partie de A, donc un élément de P(A) : {b, t} ∈ P(A)."},
 {id:"e9",type:"mcq",q:"A = {b, u, t}. Compléter : <span class='f'>b … A</span>",choices:["∈","⊂"],answer:0,expl:"b est un élément : b ∈ A."},
 {id:"e10",type:"mcq",q:"A = {b, u, t}. Compléter : <span class='f'>{∅, {u, t}} … P(A)</span>",choices:["∈","⊂"],answer:1,expl:"∅ et {u, t} sont deux éléments de P(A), donc l'ensemble qu'ils forment est inclus dans P(A)."},
 {id:"e11",type:"mcq",q:"Card(A ∪ B) = …",choices:["Card A + Card B","Card A + Card B − Card(A ∩ B)","Card A × Card B","Card A + Card B − 2 Card(A ∩ B)"],answer:1,expl:"On enlève une fois les éléments communs, comptés deux fois."},
 {id:"e12",type:"input",q:"Classe de 25 élèves : 18 font du sport, 10 de la musique, 7 les deux. Combien pratiquent l'une <b>ou</b> l'autre activité ?",answers:["21"],expl:"Card(S ∪ M) = 18 + 10 − 7 = 21."},
 {id:"e13",type:"input",q:"Classe de 25 élèves : 18 font du sport, 10 de la musique, 7 les deux. Combien ne pratiquent <b>aucune</b> des deux activités ?",answers:["4"],expl:"Card(S̄ ∩ M̄) = Card(∁(S ∪ M)) = 25 − 21 = 4."},
 {id:"e14",type:"input",q:"Classe de 25 élèves : 18 font du sport, 10 de la musique, 7 les deux. Combien font du sport <b>sans</b> faire de musique ?",answers:["11"],expl:"Card(S − M) = 18 − 7 = 11."},
 {id:"e15",type:"input",q:"Classe de 25 élèves : 18 font du sport, 10 de la musique, 7 les deux. Combien pratiquent <b>une et une seule</b> des deux activités ?",answers:["14"],expl:"Card(S ∆ M) = 18 + 10 − 2 × 7 = 14."},
 {id:"e16",type:"input",q:"100 employés : 52 femmes, 70 formés en info, 40 femmes formées. Combien ne sont <b>ni</b> femmes <b>ni</b> formés ?",answers:["18"],expl:"Card(F ∪ I) = 52 + 70 − 40 = 82, puis Card(F̄ ∩ Ī) = 100 − 82 = 18 (Morgan)."},
 {id:"e17",type:"input",q:"100 employés : 52 femmes, 70 formés en info, 40 femmes formées. Combien ne sont <b>pas</b> des femmes mais ont suivi la formation ?",answers:["30"],expl:"Card(I − F) = Card I − Card(I ∩ F) = 70 − 40 = 30."},
 {id:"e18",type:"mcq",q:"A et B sont <b>disjoints</b> signifie…",choices:["A ≠ B","A ∩ B = ∅","A ∪ B = E","A ⊄ B"],answer:1,expl:"Disjoints : aucun élément commun. Ne pas confondre avec distincts (A ≠ B)."},
 {id:"e19",type:"mcq",q:"Loi de Morgan : <span class='f'>∁E(A ∪ B)</span> = …",choices:["Ā ∪ B̄","Ā ∩ B̄","A ∩ B","∁E(A) − B"],answer:1,expl:"∁(A ∪ B) = Ā ∩ B̄ : « ni dans A ni dans B »."},
 {id:"e20",type:"mcq",q:"<span class='f'>A − B</span> = …",choices:["A ∩ ∁E(B)","A ∪ ∁E(B)","∁E(A) ∩ B","(A ∪ B) − A"],answer:0,expl:"Éléments de A qui ne sont pas dans B : A ∩ B̄."},
 {id:"e21",type:"mcq",q:"<span class='f'>A ∆ B</span> = …",choices:["(A − B) ∩ (B − A)","(A − B) ∪ (B − A)","A ∪ B","∁(A ∩ B)"],answer:1,expl:"Différence symétrique : dans A seulement ou dans B seulement."},
 {id:"e22",type:"mcq",q:"Card(A ∆ B) = …",choices:["Card A + Card B − Card(A ∩ B)","Card A + Card B − 2 Card(A ∩ B)","Card A − Card B","Card(A ∪ B) + Card(A ∩ B)"],answer:1,expl:"Card(A − B) + Card(B − A) = Card A + Card B − 2 Card(A ∩ B)."},
 {id:"e23",type:"input",q:"A = {a, b, c} et B = {1, 2}. Combien vaut Card(A × B) ?",answers:["6"],expl:"Card(A × B) = Card A × Card B = 3 × 2 = 6."},
 {id:"e24",type:"mcq",q:"Lequel est vrai (a ≠ b) ?",choices:["(a, b) = (b, a)","{a, b} = {b, a}","{a, b} = (a, b)","{a} = a"],answer:1,expl:"Dans un ensemble l'ordre ne compte pas, dans un couple si. Et a ≠ {a}."},
 {id:"e25",type:"input",q:"Combien de codes de 4 chiffres <b>tous distincts</b> peut-on former avec les chiffres 0 à 9 ?",answers:["5040"],expl:"Arrangement : A₁₀⁴ = 10 × 9 × 8 × 7 = 5040."},
 {id:"e26",type:"input",q:"Combien de codes de cadenas à 3 chiffres (0 à 9) ?",answers:["1000"],expl:"Élément de E³ avec Card E = 10 : 10³ = 1000."},
 {id:"e27",type:"input",q:"Code de 3 chiffres (0 à 9) dont on sait qu'il commence par 5 : combien de codes à tester ?",answers:["100"],expl:"La 1re case est fixée : 1 × 10 × 10 = 100."},
 {id:"e28",type:"input",q:"Code de 3 chiffres <b>distincts non nuls</b> commençant par 5 : combien de codes ?",answers:["56"],expl:"Après le 5, il reste 8 chiffres non nuls, puis 7 : 1 × 8 × 7 = 56."},
 {id:"e29",type:"input",q:"Urne de 8 jetons, on en tire 3 <b>simultanément</b>. Combien de tirages ?",answers:["56"],expl:"Combinaison : C(8, 3) = 8!/(3! 5!) = 56."},
 {id:"e30",type:"mcq",q:"A₁, …, Aₙ forment une <b>partition</b> de E si…",choices:["leur réunion est E","elles sont non vides, disjointes deux à deux et de réunion E","elles sont disjointes deux à deux","elles ont toutes le même cardinal"],answer:1,expl:"Trois conditions : aucune vide, disjointes deux à deux, réunion = E."},
 {id:"e31",type:"mcq",q:"Théorème de la double inclusion : A = B ⇔ …",choices:["A ⊂ B ou B ⊂ A","A ⊂ B et B ⊂ A","A ∩ B ≠ ∅","Card A = Card B"],answer:1,expl:"Il faut les deux inclusions."},
 {id:"e32",type:"mcq",q:"Pour tout ensemble E, <span class='f'>∅ ⊂ E</span>.",choices:VF,answer:0,expl:"Théorème 2.3 : l'ensemble vide est une partie de tout ensemble, et E ⊂ E."},
 {id:"e33",type:"input",q:"Mot de passe : 4 chiffres (0 à 9) suivis de 2 lettres majuscules. Combien de possibilités ?",answers:["6760000"],expl:"10⁴ × 26² = 10 000 × 676 = 6 760 000."},
 {id:"e34",type:"input",q:"On lance 3 dés (faces 1 à 6). Combien de résultats possibles ?",answers:["216"],expl:"Les dés sont distincts, l'ordre compte : 6³ = 216."},
 {id:"e35",type:"mcq",q:"Choisir une équipe de 11 joueurs parmi 21 : c'est…",choices:["un arrangement","une combinaison","un p-uplet avec répétition","une permutation"],answer:1,expl:"Pas d'ordre, pas de répétition : combinaison C(21, 11)."},
 {id:"e36",type:"input",q:"Combien vaut 0! ?",answers:["1"],expl:"Par convention 0! = 1."},
 {id:"e37",type:"mcq",q:"<span class='f'>A ∪ (A ∩ B)</span> = …",choices:["A ∩ B","B","A","A ∪ B"],answer:2,expl:"Loi d'absorption : A ∪ (A ∩ B) = A."},
 {id:"e38",type:"input",q:"A = {a, b, d, f, g}, B = {a, c, d, e, f}. Écris A ∩ B.",answers:["{a,d,f}"],set:true,expl:"Éléments communs : a, d, f."},
 {id:"e39",type:"input",q:"A = {a, b, d, f, g}, B = {a, c, d, e, f}. Écris A ∆ B.",answers:["{b,c,e,g}"],set:true,expl:"A − B = {b, g} et B − A = {c, e} : A ∆ B = {b, c, e, g}."},
 {id:"e40",type:"input",q:"E = {a, b, c, d, e, f, g, h, i}, A = {a, b, d, f, g}. Écris ∁E(A).",answers:["{c,e,h,i}"],set:true,expl:"Éléments de E qui ne sont pas dans A."},
 {id:"e41",type:"mcq",q:"P({a, b}) = …",choices:["{a, b}","{{a}, {b}}","{∅, {a}, {b}, {a, b}}","{∅, a, b, {a, b}}"],answer:2,expl:"Toutes les parties : ∅, {a}, {b}, {a, b} (2² = 4)."},
 {id:"e42",type:"mcq",q:"<span class='f'>X ∈ P(E)</span> ⇔ …",choices:["X ∈ E","X ⊂ E","E ⊂ X","X ∩ E = ∅"],answer:1,expl:"Les éléments de P(E) sont les parties de E."},
 {id:"e43",type:"mcq",q:"Si Card(E) = 9 et Card(A) = 5 (A ⊂ E), Card(∁E(A)) = ?",choices:["4","5","9","14"],answer:0,expl:"Card(∁E(A)) = Card E − Card A = 9 − 5 = 4."}
]};

/* ---------- Corrections détaillées des problèmes de cardinaux ---------- */
function cardExp(o){
  const {N,A,B,AB,la,lb,pop,ask}=o;const oA=A-AB,oB=B-AB,U=A+B-AB,O=N-U;
  const reg={union:["A","AB","B"],none:["O"],onlyA:["A"],onlyB:["B"],sym:["A","B"],notA:["B","O"]}[ask];
  const res={union:U,none:O,onlyA:oA,onlyB:oB,sym:oA+oB,notA:N-A}[ask];
  const labels=`<text x="88" y="126" text-anchor="middle" class="v-num">${oA}</text><text x="180" y="126" text-anchor="middle" class="v-num">${AB}</text><text x="272" y="126" text-anchor="middle" class="v-num">${oB}</text><text x="40" y="216" text-anchor="middle" class="v-num">${O}</text>`;
  const step3={
    union:`« ${la} <b>ou</b> ${lb} » = A ∪ B. Formule du cours : <span class="f">Card(A ∪ B) = Card A + Card B − Card(A ∩ B) = ${A} + ${B} − ${AB} = ${U}</span>. On retire ${AB} car ces ${pop} sont comptés deux fois : une fois dans A et une fois dans B.`,
    none:`« <b>ni</b> ${la} <b>ni</b> ${lb} » = hors de A <b>et</b> hors de B = <span class="f">Ā ∩ B̄</span>. Loi de Morgan : <span class="f">Ā ∩ B̄ = ∁(A ∪ B)</span>, c'est la zone à l'extérieur des deux cercles. On calcule d'abord <span class="f">Card(A ∪ B) = ${A} + ${B} − ${AB} = ${U}</span>, puis <span class="f">Card(∁(A ∪ B)) = Card E − Card(A ∪ B) = ${N} − ${U} = ${O}</span>.`,
    onlyA:`« ${la} <b>mais pas</b> ${lb} » = A − B (la partie de A hors du cercle B). Formule : <span class="f">Card(A − B) = Card A − Card(A ∩ B) = ${A} − ${AB} = ${oA}</span>.`,
    onlyB:`« ${lb} <b>mais pas</b> ${la} » = B − A (la partie de B hors du cercle A). Formule : <span class="f">Card(B − A) = Card B − Card(A ∩ B) = ${B} − ${AB} = ${oB}</span>.`,
    sym:`« <b>une seule</b> des deux » = dans A ou dans B mais pas dans les deux = A ∆ B = (A − B) ∪ (B − A). Donc <span class="f">${oA} + ${oB} = ${oA+oB}</span>, ou directement <span class="f">Card A + Card B − 2 Card(A ∩ B) = ${A} + ${B} − 2 × ${AB} = ${oA+oB}</span> (on enlève 2 fois le milieu).`,
    notA:`« pas ${la} » = Ā. <span class="f">Card(Ā) = Card E − Card A = ${N} − ${A} = ${N-A}</span>.`}[ask];
  return `<ol class="steps">
  <li><b>Nommer les ensembles.</b> E = les ${N} ${pop}, A = ${la} (${A}), B = ${lb} (${B}), A ∩ B = les deux à la fois (${AB}).</li>
  <li><b>Remplir le diagramme en partant du milieu.</b> Milieu : ${AB}. A seulement : ${A} − ${AB} = ${oA}. B seulement : ${B} − ${AB} = ${oB}. Dehors : ${N} − (${oA} + ${AB} + ${oB}) = ${O}.
  <div class="tscroll">${vennSVG(Math.floor(Math.random()*1e6),reg,labels)}</div><span class="hint">La zone demandée est en vert.</span></li>
  <li><b>Traduire la question en ensemble, puis appliquer la formule.</b> ${step3}</li>
  <li><b>Conclure par une phrase</b> (exigé au devoir) : « Ainsi ${res} ${pop} … ». Vérification : ${oA} + ${AB} + ${oB} + ${O} = ${N}.</li></ol>`;
}
const CARDQ={e12:{N:25,A:18,B:10,AB:7,la:"font du sport",lb:"de la musique",pop:"élèves",ask:"union"},e13:{N:25,A:18,B:10,AB:7,la:"sport",lb:"musique",pop:"élèves",ask:"none"},e14:{N:25,A:18,B:10,AB:7,la:"sport",lb:"musique",pop:"élèves",ask:"onlyA"},e15:{N:25,A:18,B:10,AB:7,la:"sport",lb:"musique",pop:"élèves",ask:"sym"},e16:{N:100,A:52,B:70,AB:40,la:"femme",lb:"formé en info",pop:"employés",ask:"none"},e17:{N:100,A:52,B:70,AB:40,la:"femme",lb:"formé en info",pop:"employés",ask:"onlyB"}};
for(const q of BANK.ensembles)if(CARDQ[q.id])q.expl=cardExp(CARDQ[q.id]);

/* ===================== Générateurs ===================== */
const rnd=n=>Math.floor(Math.random()*n);
const pick=a=>a[rnd(a.length)];
const shuffle=a=>{a=a.slice();for(let i=a.length-1;i>0;i--){const j=rnd(i+1);[a[i],a[j]]=[a[j],a[i]]}return a};
const SYM={and:"∧",or:"∨",imp:"→",iff:"↔"};
function genFormula(vars,depth){
  if(depth<=0||Math.random()<0.25){const v={op:"var",n:pick(vars)};return Math.random()<0.25?{op:"not",a:v}:v}
  const op=pick(["and","or","imp","imp","iff"]);
  return {op,a:genFormula(vars,depth-1),b:genFormula(vars,depth-1)};
}
function show(f,top=true){
  if(f.op==="var")return f.n;
  if(f.op==="not")return "¬"+show(f.a,false);
  const s=show(f.a,false)+" "+SYM[f.op]+" "+show(f.b,false);
  return top?s:"("+s+")";
}
function evalF(f,i){
  switch(f.op){case"var":return i[f.n];case"not":return !evalF(f.a,i);
  case"and":return evalF(f.a,i)&&evalF(f.b,i);case"or":return evalF(f.a,i)||evalF(f.b,i);
  case"imp":return !evalF(f.a,i)||evalF(f.b,i);case"iff":return evalF(f.a,i)===evalF(f.b,i)}
}
function steps(f,i,out){if(f.op==="var")return;if(f.op==="not"){steps(f.a,i,out)}else{steps(f.a,i,out);steps(f.b,i,out)}
  out.push(show(f)+" = "+(evalF(f,i)?"V":"F"))}
function varsOf(f,s=new Set()){if(f.op==="var")s.add(f.n);else{varsOf(f.a,s);if(f.b)varsOf(f.b,s)}return [...s].sort()}
function dup(f){if(f.op==="var")return false;if(f.op==="not")return dup(f.a);return show(f.a)===show(f.b)||show(f.a).replace("¬","")===show(f.b).replace("¬","")||dup(f.a)||dup(f.b)}
function goodFormula(vars){let f;do{f=genFormula(vars,2)}while(f.op==="var"||f.op==="not"||varsOf(f).length<vars.length||dup(f));return f}
function interps(vs){const rows=[];const n=vs.length;for(let k=0;k<(1<<n);k++){const i={};vs.forEach((v,j)=>{i[v]=!((k>>(n-1-j))&1)});rows.push(i)}return rows}
const vf=b=>b?"V":"F";
function subs(f,out=[]){if(f.op==="var")return out;subs(f.a,out);if(f.b)subs(f.b,out);const t=show(f);if(!out.includes(t))out.push(t);return out}
function nodes(f,out=[]){if(f.op==="var")return out;nodes(f.a,out);if(f.b)nodes(f.b,out);if(!out.some(n=>show(n)===show(f)))out.push(f);return out}
function fullTable(f,vs){const ns=nodes(f);const rows=interps(vs);
  return `<div class="tscroll"><table class="tt"><tr><th></th>${vs.map(v=>`<th>${v}</th>`).join("")}${ns.map((n,k)=>`<th${k===ns.length-1?' style="background:var(--accent);color:var(--accent-ink)"':""}>${show(n)}</th>`).join("")}</tr>${rows.map((i,r)=>`<tr><td>i${r+1}</td>${vs.map(v=>`<td>${vf(i[v])}</td>`).join("")}${ns.map(n=>{const x=evalF(n,i);return `<td class="${x?"v":"x"}">${vf(x)}</td>`}).join("")}</tr>`).join("")}</table></div>`}
const TRAD=[
 ["Il réussira seulement s'il travaille.","p : il réussit, q : il travaille","p → q","« p seulement si q » se traduit par p → q."],
 ["Il ralentit s'il freine.","p : il ralentit, q : il freine","q → p","« p si q » veut dire « si q alors p »."],
 ["Pour penser, il faut être.","p : penser, q : être","p → q","« Pour p il faut q » : q est nécessaire, il va à droite de la flèche."],
 ["Il suffit que je chante pour qu'il pleuve.","p : je chante, q : il pleut","p → q","La condition suffisante va à gauche de la flèche."],
 ["Pour qu'il vienne, il suffit que je l'appelle.","p : il vient, q : je l'appelle","q → p","La condition suffisante (je l'appelle) va à gauche."],
 ["Je viendrai sauf s'il est là.","p : je viens, q : il est là","p ↔ ¬q","Dans le cours, « sauf si » se traduit par p ↔ ¬q."],
 ["S'il pleut je joue aux cartes, sinon je me promène.","p : il pleut, q : je joue aux cartes, r : je me promène","(p → q) ∧ (¬p → r)","« sinon » veut dire « si non p alors r »."],
 ["Je suis riche mais je ne suis pas heureux.","p : je suis riche, q : je suis heureux","p ∧ ¬q","« mais » se traduit par un ET."],
 ["Cette personne n'aime ni le sport ni la musique.","p : elle aime le sport, q : elle aime la musique","¬p ∧ ¬q","« ni p ni q » = non p ET non q."],
 ["Si le drapeau est rouge alors je suis raisonnable et je ne me baigne pas.","p : le drapeau est rouge, q : je suis raisonnable, r : je me baigne","p → (q ∧ ¬r)","Tout ce qui suit « alors » est à droite de la flèche, entre parenthèses."],
 ["J'achèterai une Ferrari si et seulement si je gagne au loto.","p : j'achète une Ferrari, q : je gagne au loto","p ↔ q","« si et seulement si » se traduit par ↔."],
 ["S'il neige ou s'il vente, je fais mon jogging.","p : il neige, q : il vente, r : je fais mon jogging","(p ∨ q) → r","La condition « il neige ou il vente » est entre parenthèses, à gauche."],
 ["Si j'ai cet emploi, je devrai acheter une voiture et déménager.","p : j'ai cet emploi, q : j'achète une voiture, r : je déménage","p → (q ∧ r)","Les deux conséquences sont reliées par ET, à droite de la flèche."],
 ["Il ira au cinéma seulement si le concert est annulé.","p : il va au cinéma, q : le concert est annulé","p → q","« seulement si » : p → q."],
 ["Paul est malade et va à l'école.","p : Paul est malade, q : Paul va à l'école","p ∧ q","« et » se traduit par ∧."],
 ["Jean n'est pas fier de lui.","p : Jean est fier de lui","¬p","La négation se traduit par ¬."]
];
const MATCH={
 tournures:[["p seulement si q","p → q"],["p si q","q → p"],["p sauf si q","p ↔ ¬q"],["ni p ni q","¬p ∧ ¬q"],["p mais pas q","p ∧ ¬q"],["p si et seulement si q","p ↔ q"],["soit p, soit q","p ∨ q"]],
 equiv:[["¬(p ∧ q)","¬p ∨ ¬q"],["¬(p ∨ q)","¬p ∧ ¬q"],["p → q","¬q → ¬p"],["¬¬p","p"],["p ↔ q","(p → q) ∧ (q → p)"],["¬(p → q)","p ∧ ¬q"]],
 vocab:[["Modèle","interprétation où φ vaut V"],["Contre-exemple","interprétation où φ vaut F"],["Tautologie","φ vaut V sur toutes les lignes"],["Contradiction","φ vaut F sur toutes les lignes"],["Contingente","ni tautologie ni contradiction"],["Réciproque de p → q","q → p"],["Contraposée de p → q","¬q → ¬p"]],
 ops:[["A ∪ B","x ∈ A ou x ∈ B"],["A ∩ B","x ∈ A et x ∈ B"],["A − B","x ∈ A et x ∉ B"],["∁E(A)","x ∈ E et x ∉ A"],["A ∆ B","dans A ou dans B, pas les deux"],["A × B","couples (a, b) avec a ∈ A, b ∈ B"],["P(E)","ensemble des parties de E"]],
 card:[["Card(A ∪ B)","Card A + Card B − Card(A ∩ B)"],["Card(Ā)","Card E − Card A"],["Card(A − B)","Card A − Card(A ∩ B)"],["Card(A ∆ B)","Card A + Card B − 2 Card(A ∩ B)"],["Card(P(E))","2^Card(E)"],["Card(A × B)","Card A × Card B"]],
 denomb:[["Code avec répétitions (p cases, n choix)","nᵖ"],["Code à symboles tous distincts","n!/(n−p)!"],["Groupe de p parmi n, sans ordre","C(n, p)"],["Ranger n éléments dans un ordre","n!"],["Nombre de parties d'un ensemble à n éléments","2ⁿ"]]
};
function mkMatch(pool,kind){const pairs=shuffle(pool).slice(0,4);return {id:"g-match",type:"match",kind,q:"Associe chaque élément de gauche à son équivalent de droite.",pairs}}
const VENNQ=[["A ∪ B",["A","AB","B"],"les éléments de A ou de B"],["A ∩ B",["AB"],"les éléments communs à A et B"],["A − B",["A"],"les éléments de A qui ne sont pas dans B"],["B − A",["B"],"les éléments de B qui ne sont pas dans A"],["A ∆ B",["A","B"],"dans A ou dans B, mais pas dans les deux"],["∁E(A)",["B","O"],"tout E sauf A"],["∁E(B)",["A","O"],"tout E sauf B"],["∁E(A ∪ B)",["O"],"ni dans A ni dans B, c'est Ā ∩ B̄ (Morgan)"],["∁E(A ∩ B)",["A","B","O"],"pas dans les deux à la fois, c'est Ā ∪ B̄ (Morgan)"],["Ā ∩ B",["B"],"dans B mais pas dans A, c'est B − A"],["A ∪ ∁E(B)",["A","AB","O"],"dans A, ou hors de B"]];
const GEN={
 truth(){
  const vs=Math.random()<0.5?["p","q"]:["p","q","r"];const f=goodFormula(vs);const rows=interps(vs);const k=rnd(rows.length);const i=rows[k];
  const val=evalF(f,i);const st=[];steps(f,i,st);
  return {id:"g-truth",formula:f,type:"mcq",kind:"Table de vérité",q:`Pour ${vs.map(v=>v+" = "+vf(i[v])).join(", ")} (i${k+1}), que vaut <span class='f'>φ : ${show(f)}</span> ?`,choices:VF,answer:val?0:1,expl:"On remonte l'arbre, des lettres vers φ : "+st.join(" ; ")+"."+treeSVG(f,i)};
 },
 models(){
  const vs=["p","q"].concat(Math.random()<0.5?["r"]:[]);const f=goodFormula(vs);const rows=interps(vs);
  const m=rows.map((i,k)=>evalF(f,i)?"i"+(k+1):null).filter(Boolean);
  return {id:"g-models",formula:f,type:"input",kind:"Modèles",q:`Combien de modèles a <span class='f'>φ : ${show(f)}</span> ?`,answers:[String(m.length)],expl:`On calcule φ ligne par ligne, des petites sous-formules vers la formule entière (dernière colonne) :${fullTable(f,vs)}Les lignes où φ vaut V sont les modèles : M(φ) = {${m.join(", ")}}, soit ${m.length} modèle${m.length>1?"s":""}.`};
 },
 nature(){
  const vs=["p","q"];let f,m,tries=0;
  do{f=goodFormula(vs);m=interps(vs).filter(i=>evalF(f,i)).length;tries++}while(tries<40&&m!==0&&m!==4&&Math.random()<0.6);
  const rows=interps(vs);const ans=m===4?0:m===0?1:2;
  const tbl=fullTable(f,vs);
  return {id:"g-nature",formula:f,type:"mcq",kind:"Nature d'une formule",q:`Nature de <span class='f'>${show(f)}</span> ?`,choices:["Tautologie","Contradiction","Contingente"],answer:ans,expl:`Table de vérité (dernière colonne = φ) :${tbl}`+(ans===0?"Que des modèles.":ans===1?"Aucun modèle.":"Au moins un modèle et un contre-exemple.")};
 },
 fill(){
  const vs=Math.random()<0.55?["p","q"]:["p","q","r"];const f=goodFormula(vs);
  return {id:"g-fill",formula:f,type:"table",kind:"Compléter une table",q:`Complète la table de vérité de <span class='f'>φ : ${show(f)}</span>.`,expl:natureText(f,vs)};
 },
 build(){
  const [s,map,t,rule]=pick(TRAD);
  const toks=[...t.replace(/\s/g,"")];
  const extra=shuffle(["¬","∧","∨","→","↔","p","q","(",")"]).slice(0,3);
  return {id:"g-build",type:"build",kind:"Traduire en tuiles",q:`Traduis : « ${s} »<br><span class="hint">${map}</span>`,target:t,tiles:shuffle(toks.concat(extra)),expl:`${rule} Donc : <span class='f'>${t}</span>. (Une formule équivalente est aussi acceptée.)`};
 },
 matchL(){const pool=pick([MATCH.tournures,MATCH.equiv,MATCH.vocab]);return mkMatch(pool,"Associer (logique)")},
 matchE(){const pool=pick([MATCH.ops,MATCH.card,MATCH.denomb]);return mkMatch(pool,"Associer (ensembles)")},
 vennq(){const [name,regions,def]=pick(VENNQ);
  return {id:"g-venn",type:"venn",kind:"Venn à colorier",q:`Colorie sur le diagramme la zone qui représente <span class='f'>${name}</span>.`,regions,expl:`${name} : ${def}.`};
 },
 mainop(){const vs=Math.random()<0.5?["p","q"]:["p","q","r"];const f=goodFormula(vs);const tokens=mainTokens(f);const answer=tokens.findIndex(t=>t.main);
  return {id:"g-mainop",type:"mainop",formula:f,kind:"Connecteur principal",q:`Quel est le connecteur principal de <span class='f'>φ : ${show(f)}</span> ?`,tokens,answer,
   expl:`C'est le connecteur qui relie les deux plus gros morceaux : <span class='f'>${show(f.a,false)}</span> et <span class='f'>${show(f.b,false)}</span>. C'est la racine de l'arbre :${treeSVG(f)}`};
 },
 sets(){
  const U="abcdefghij".split("");const A=shuffle(U).slice(0,3+rnd(3)).sort(),B=shuffle(U).slice(0,3+rnd(3)).sort();
  const inA=x=>A.includes(x),inB=x=>B.includes(x);
  const ops=[["A ∪ B",x=>inA(x)||inB(x)],["A ∩ B",x=>inA(x)&&inB(x)],["A − B",x=>inA(x)&&!inB(x)],["B − A",x=>inB(x)&&!inA(x)],["A ∆ B",x=>inA(x)!==inB(x)],["∁E(A)",x=>!inA(x)],["∁E(A ∪ B)",x=>!(inA(x)||inB(x))]];
  const [name,fn]=pick(ops);const r=U.filter(fn);const s=r.length?"{"+r.join(", ")+"}":"∅";
  return {id:"g-sets",type:"input",set:true,kind:"Opérations",q:`E = {a, …, j}, A = {${A.join(", ")}}, B = {${B.join(", ")}}. Écris <span class='f'>${name}</span> en extension.`,answers:[s],expl:`${name} = ${s}.`};
 },
 card(){
  const N=pick([30,40,50,60,80,100,120,150,200]);const a=Math.round(N*(0.3+Math.random()*0.4)),b=Math.round(N*(0.2+Math.random()*0.4));
  const both=Math.max(1,Math.min(a,b,Math.round(Math.min(a,b)*(0.2+Math.random()*0.5))));
  if(a+b-both>N)return GEN.card();
  const ctx=pick([["personnes interrogées","jouent au foot","font de la natation","foot","natation"],["étudiants","codent en Python","codent en Java","Python","Java"],["clients","achètent du café","achètent du thé","café","thé"]]);
  const qs=[["l'une <b>ou</b> l'autre","union"],["<b>aucune</b> des deux","none"],["la 1re <b>seulement</b>","onlyA"],["<b>une seule</b> des deux","sym"],["la 2e <b>seulement</b>","onlyB"]];
  const [lab,ask]=pick(qs);const res={union:a+b-both,none:N-(a+b-both),onlyA:a-both,onlyB:b-both,sym:a+b-2*both}[ask];
  return {id:"g-card",type:"input",kind:"Problème de cardinaux",q:`Parmi ${N} ${ctx[0]}, ${a} ${ctx[1]} (A), ${b} ${ctx[2]} (B) et ${both} font les deux. Combien pratiquent ${lab} ?`,answers:[String(res)],expl:cardExp({N,A:a,B:b,AB:both,la:ctx[3],lb:ctx[4],pop:ctx[0],ask})};
 },
 count(){
  const t=rnd(3);
  if(t===0){const n=pick([4,5,6,9,10]),p=pick([2,3,4]);return {id:"g-count",type:"input",kind:"Dénombrement",q:`Combien de codes de ${p} symboles (répétitions permises) avec ${n} symboles possibles ?`,answers:[String(n**p)],expl:`p-uplet : ${n}^${p} = ${n**p}.`}}
  if(t===1){const n=pick([5,6,7,8,9,10]),p=pick([2,3]);let r=1;for(let k=0;k<p;k++)r*=n-k;return {id:"g-count",type:"input",kind:"Dénombrement",q:`Combien de codes de ${p} chiffres <b>tous distincts</b> parmi ${n} chiffres ?`,answers:[String(r)],expl:`Arrangement : ${Array.from({length:p},(_,k)=>n-k).join(" × ")} = ${r}.`}}
  const n=pick([5,6,7,8,10]),p=pick([2,3]);let num=1,den=1;for(let k=0;k<p;k++){num*=n-k;den*=k+1}
  return {id:"g-count",type:"input",kind:"Dénombrement",q:`On choisit ${p} personnes parmi ${n} pour former un groupe (sans ordre). Combien de groupes ?`,answers:[String(num/den)],expl:`Combinaison C(${n}, ${p}) = ${num}/${den} = ${num/den}.`};
 }
};

/* ===================== État & stockage ===================== */
const LS="r106-progress";
let state={xp:0,streak:0,lastDay:null,mastery:{},miss:{},daily:{}};
let db=null,uid=null,progRef=null,customDecks=[];
function ymd(d){return d.getFullYear()+"-"+String(d.getMonth()+1).padStart(2,"0")+"-"+String(d.getDate()).padStart(2,"0")}
function today(){return ymd(new Date())}
function loadLocal(){try{const s=JSON.parse(localStorage.getItem(LS)||"null");if(s)state=Object.assign(state,s)}catch(e){}}
function saveLocal(){try{localStorage.setItem(LS,JSON.stringify(state))}catch(e){}}
let saveT=null;
function save(){saveLocal();clearTimeout(saveT);saveT=setTimeout(()=>{if(progRef)progRef.set(state).then(()=>{if(!ME.sync){ME.sync=true;if(VIEW==="dash")renderDash()}},()=>{if(ME.sync){ME.sync=false;if(VIEW==="dash")renderDash()}})},800)}
function lvl(id){return state.mastery[id]||0}
function curStreak(){const yd=ymd(new Date(Date.now()-864e5));return (state.lastDay===today()||state.lastDay===yd)?state.streak:0}
function renderStats(){
  document.getElementById("xp").textContent=state.xp;
  document.getElementById("streak").textContent=curStreak();
  document.querySelector(".chip.streak").classList.toggle("lit",state.lastDay===today());
  const n=(state.daily||{})[today()]||0,g=state.goal||30;
  document.getElementById("goalTxt").textContent=`${Math.min(n,999)}/${g}`;
  document.getElementById("goalRing").setAttribute("stroke-dashoffset",String(50.3*(1-Math.min(1,n/g))));
}

/* ===================== Decks ===================== */
const DECKS=[
 {key:"logique",tag:"Chapitre 1",title:"Logique",desc:"Chapitre 1 : connecteurs, tables de vérité, traductions, réciproque et contraposée, Morgan",bank:()=>BANK.logique,gens:["fill","build","matchL","mainop","truth","nature"]},
 {key:"ensembles",tag:"Chapitre 2",title:"Ensembles",desc:"Chapitre 2 : ∈ ou ⊂, opérations, cardinaux, parties, dénombrement",bank:()=>BANK.ensembles,gens:["vennq","matchE","sets","card","count"]},
 {key:"mix",tag:"Spécial devoir",title:"Mix chapitres 1 + 2",desc:"12 questions des deux chapitres mélangés, comme le contrôle",bank:()=>BANK.logique.concat(BANK.ensembles),gens:["fill","build","vennq","matchL","matchE","mainop","truth","sets","card","count"],n:12}
];
const GENDECKS=[
 {key:"g-logic",tag:"Générées",title:"Tables de vérité",desc:"Remplir des tables, compter les modèles, dire si c'est une tautologie",gens:["fill","truth","fill","models","nature"]},
 {key:"g-trad",tag:"Générées",title:"Traductions en tuiles",desc:"Construis la formule d'une phrase avec des tuiles, comme sur Duolingo",gens:["build"]},
 {key:"g-venn",tag:"Générées",title:"Venn à colorier",desc:"Colorie la zone de A ∪ B, A ∆ B, ∁(A ∩ B)…",gens:["vennq"]},
 {key:"g-match",tag:"Générées",title:"Associer les paires",desc:"Relie tournures, formules, définitions et formules de Card",gens:["matchL","matchE"]},
 {key:"g-main",tag:"Générées",title:"Connecteur principal",desc:"Trouve le connecteur qui s'applique en dernier",gens:["mainop"]},
 {key:"g-sets",tag:"Générées",title:"Calculs d'ensembles",desc:"Écrire A ∪ B, A ∩ B, A − B, A ∆ B ou le complémentaire",gens:["sets"]},
 {key:"g-count",tag:"Générées",title:"Cardinaux et dénombrement",desc:"Problèmes d'enquête (Card) et nombres de codes ou de groupes",gens:["card","count"]}
];
function mastery(list){if(!list.length)return 0;return Math.round(100*list.reduce((s,q)=>s+Math.min(lvl(q.id),4),0)/(4*list.length))}
function deckBtn(d,pct,onclick){
  const b=document.createElement("button");b.className="deck";
  b.innerHTML=`<span class="tag"></span><strong></strong><small></small>`+(pct==null?"":`<div class="meter" aria-label="Maîtrise ${pct}%"><i style="width:${pct}%"></i></div><small>${pct}% maîtrisé</small>`)+`<span class="go">${pct?"Continuer":"Commencer"}</span>`;
  b.querySelector(".tag").textContent=d.tag;b.querySelector("strong").textContent=d.title;b.querySelector("small").textContent=d.desc;
  b.onclick=onclick;return b;
}
function renderHome(){
  const a=document.getElementById("decks");a.innerHTML="";
  curDecks().forEach(d=>a.appendChild(deckBtn(d,mastery(d.bank()),()=>startLesson(d))));
  const sm=document.getElementById("smartdecks");if(sm){sm.innerHTML="";if(typeof curSmart==="function")curSmart().forEach(d=>sm.appendChild(deckBtn(d,null,()=>startLesson(d))))}
  renderPlan();renderGuide();
  const g=document.getElementById("gendecks");g.innerHTML="";
  curGen().forEach(d=>g.appendChild(deckBtn(d,null,()=>startLesson(d))));
  const c=document.getElementById("customdecks");c.innerHTML="";
  if(!customDecks.length){c.innerHTML=`<div class="empty">Aucune fiche ajoutée pour l'instant. Va dans « Mes fiches » pour en coller une : les questions apparaîtront ici.</div>`}
  customDecks.forEach(d=>c.appendChild(deckBtn({tag:"Ma fiche",title:d.title,desc:d.questions.length+" questions"},mastery(d.questions),()=>startLesson({key:"c-"+d.id,title:d.title,bank:()=>d.questions,gens:[]}))));
  renderStats();
}

/* ===================== Leçon ===================== */
let L=null;
function buildQueue(deck){
  if(deck.ordered)return deck.bank().map(x=>Object.assign({},x));
  if(deck.adaptive)return [adaptGen(deck.subj||SUBJ)];
  const n=deck.n||10;const bank=deck.bank?deck.bank():[];const gens=deck.gens||[];
  let nGen=bank.length?Math.min(gens.length?4:0,n):n;let nBank=n-nGen;
  const sorted=shuffle(bank).sort((x,y)=>lvl(x.id)-lvl(y.id));
  const q=sorted.slice(0,nBank).map(x=>Object.assign({},x));
  const gs=shuffle(gens);for(let k=0;k<nGen&&gs.length;k++)q.push(GEN[gs[k%gs.length]]());
  return shuffle(q);
}
function startLesson(deck,taskKey){
  if(deck.ia&&!deck._ready)return iaLesson(deck,taskKey);
  L={deck,task:taskKey||null,subj:SUBJ,queue:buildQueue(deck),done:0,total:0,correct:0,firstTry:0,xp:0,combo:0,best:0,missed:new Set()};
  L.total=deck.adaptive?(deck.n||12):L.queue.length;L.served=L.queue.length;
  document.getElementById("home").hidden=true;
  const el=document.getElementById("lesson");el.hidden=false;
  nextQ();
}
function endLesson(){
  const el=document.getElementById("lesson");
  const acc=L.total?Math.round(100*L.firstTry/L.total):0;
  bumpDay();
  state.xp+=L.xp;if(L.task)markTask(L.task);save();renderStats();
  SND.done();if(acc>=80)confetti();
  const subjOk=!!SUBJECTS[L.subj];const lsn=L;
  const nextT=(()=>{try{const t=planFor().tasks.find(x=>!taskDone(x));return t||null}catch(e){return null}})();
  el.innerHTML=`<div class="end"><div class="qkind">Leçon terminée${L.task?" · tâche cochée":""}</div><div class="big" id="xpCount">+0 XP</div>
  <div class="endstats"><div><b>${acc}%</b>du premier coup</div><div><b>${L.firstTry}/${L.total}</b>justes</div><div><b>${L.best}</b>meilleure série</div><div><b>${curStreak()}</b>j d'affilée</div></div>
  <p class="muted" style="max-width:50ch;margin:0">${acc>=80?"Très solide.":acc>=50?"Pas mal. Les questions ratées reviendront en priorité.":"Les erreurs reviendront en priorité : relis le cours puis réessaie."}</p>
  ${subjOk?`<div class="lesson-feel"><b>Comment tu l'as vécue ?</b><div class="presets"><button type="button" class="pill" data-lf="-1">Difficile</button><button type="button" class="pill" data-lf="0">Correct</button><button type="button" class="pill" data-lf="1">Facile</button></div><span class="hint" id="lfMsg">Ta réponse ajuste ton ressenti en ${SUBJECTS[L.subj].code} et ton programme.</span></div>`:""}
  <div class="actions" style="justify-content:center"><button class="btn ghost" id="backHome">Accueil</button><button class="btn ghost" id="again">Refaire</button>${nextT?`<button class="btn" id="nextTask">Tâche suivante</button>`:""}</div></div>`;
  let x=0;const target=L.xp;const iv=setInterval(()=>{x=Math.min(target,x+Math.max(1,Math.ceil(target/18)));const c=document.getElementById("xpCount");if(!c){clearInterval(iv);return}c.textContent=`+${x} XP`;if(x>=target)clearInterval(iv)},40);
  const f0=subjOk?feelOf(L.subj):3;
  el.querySelectorAll("[data-lf]").forEach(b=>b.onclick=()=>{const d=+b.dataset.lf;const auto=acc>=85?1:acc<50?-1:0;setFeel(lsn.subj,d!==0?f0+d:f0+(auto>0&&f0<4?1:auto<0&&f0>2?-1:0));
    el.querySelectorAll("[data-lf]").forEach(x=>x.classList.toggle("active",x===b));document.getElementById("lfMsg").textContent=`Ressenti ${SUBJECTS[lsn.subj].code} : « ${FEEL[feelOf(lsn.subj)]} ». Le programme du jour est à jour.`});
  document.getElementById("backHome").onclick=()=>{L=null;showDash()};document.getElementById("again").onclick=()=>startLesson(lsn.deck);
  if(nextT)document.getElementById("nextTask").onclick=()=>runTask(nextT);
  checkPlanDone();
  (document.getElementById("nextTask")||document.getElementById("again")).focus();
}
function bumpDay(){if(state.lastDay!==today()){const yd=ymd(new Date(Date.now()-864e5));state.streak=state.lastDay===yd?state.streak+1:1;state.lastDay=today();renderStats()}}
function quit(){document.getElementById("lesson").hidden=true;document.getElementById("home").hidden=false;L=null;renderHome();buildTabs()}
function normSet(s){s=s.replace(/[{}\s]/g,"").replace(/∅/g,"").replace(/−/g,"-");return s.split(/[,;]/).filter(Boolean).sort().join(",")}
function norm(s){return s.toLowerCase().normalize("NFD").replace(/[̀-ͯ]/g,"").replace(/[\s  .]/g,"").replace(/−/g,"-")}
function check(q,v){
  if(q.type==="mcq")return v===q.answer;
  const raw=String(v||"");
  return q.answers.some(a=>q.set||/^\s*[{∅]/.test(a)?normSet(raw)===normSet(a):norm(raw)===norm(a));
}
function extractFormula(q){
  const spans=q.q.match(/<span class='f'>[^<]*<\/span>/g)||[];
  for(const sp of spans){const t=sp.replace(/<[^>]+>/g,"").replace(/^[^:]*:\s*/,"");if(!/[∧∨→↔¬]/.test(t))continue;try{return parseFormula(t)}catch(e){}}
  return null;
}
function interpTable(q){
  if(q.fillVars){const vs=["p","q","r"],ns=vs.map(n=>({op:"var",n})),rows=interps(vs);q._fill={f:ns[0],vs,ns};
    return `<div class="tscroll" style="margin-top:10px"><table class="tt fillable" aria-label="Table des interprétations"><tr><th></th>${vs.map(v=>`<th>${v}</th>`).join("")}</tr>${rows.map((r,k)=>`<tr><td>i${k+1}</td>${ns.map((n,c)=>`<td class="fill" tabindex="0" data-r="${k}" data-c="${c}" aria-label="i${k+1}, ${n.n}"></td>`).join("")}</tr>`).join("")}</table></div><div class="cellwhy" hidden></div>
    <div class="hint">Brouillon : reconstruis la table des 8 interprétations (clic ou touches V / F), puis lis la ligne i5. La correction s'affiche après Vérifier.</div>`}
  if(q.noInterp)return "";
  const all=[q.q,...(q.choices||[]),q.expl||""].join(" ");
  if(q.type!=="table"&&!/\bi[1-9]\b/.test(all)&&!/^(Nature|Modèles|Combien de modèles|Valeur)/.test(q.q))return "";
  const f=q.formula||extractFormula(q);
  let vs;
  if(f)vs=varsOf(f);
  else{const formulas=(q.q.match(/<span class='f'>[^<]*<\/span>/g)||[]).join(" ");vs=(/\bi[5-8]\b/.test(all)||/\br\b/.test(formulas))?["p","q","r"]:["p","q"]}
  const rows=interps(vs);const ns=f?nodes(f):[];
  q._fill={f,vs,ns};
  return `<div class="tscroll" style="margin-top:10px"><table class="tt fillable" aria-label="Table de vérité"><tr><th></th>${vs.map(v=>`<th>${v}</th>`).join("")}${ns.map((n,k)=>`<th class="${k===ns.length-1?"last":""}">${esc(show(n))}</th>`).join("")}</tr>${rows.map((r,k)=>`<tr><td>i${k+1}</td>${vs.map(v=>`<td class="${r[v]?"v":"x"}">${vf(r[v])}</td>`).join("")}${ns.map((n,c)=>`<td class="fill" tabindex="0" data-r="${k}" data-c="${c}" aria-label="i${k+1}, ${esc(show(n))}"></td>`).join("")}</tr>`).join("")}</table></div><div class="cellwhy" hidden></div>
  ${f?`<div class="tree-tools"><button type="button" class="pill tree-btn" aria-expanded="false">Voir l'arbre de décomposition</button></div><div class="tree-slot" hidden>${treeSVG(f)}<p class="hint">Chaque case de l'arbre est une colonne de la table : remplis-les du bas (les lettres) vers le haut (φ).</p></div>`:""}
  <div class="hint">${ns.length?(q.type==="table"?"Clique sur chaque case pour mettre V ou F (ou tape V / F au clavier). Commence par les petites colonnes, finis par la colonne noire (φ).":"Brouillon : clique sur les cases pour remplir la table comme sur ta copie (V / F). La correction s'affiche après Vérifier."):"Les interprétations dans l'ordre du cours, une par ligne."}</div>`;
}
function fillCells(el){return [...el.querySelectorAll("td.fill")]}
const RULE={not:"¬ inverse la valeur.",and:"∧ vaut V seulement si les deux côtés sont V.",or:"∨ vaut F seulement si les deux côtés sont F.",imp:"→ vaut F seulement si la gauche est V et la droite est F.",iff:"↔ vaut V quand les deux côtés ont la même valeur."};
function cellWhy(n,r,k){
  const x=vf(evalF(n,r));
  if(n.op==="var")return `<b>Ligne i${k+1}, colonne ${n.n}</b> = <b>${x}</b>. Convention du cours : on met V en priorité à gauche. ${n.n==="p"?"p vaut V sur la 1re moitié (i1 à i4), puis F (i5 à i8).":n.n==="q"?"q alterne par blocs de 2 : V V F F V V F F.":"r alterne à chaque ligne : V F V F V F V F."}`;
  if(n.op==="not")return `<b>Ligne i${k+1}, colonne ${esc(show(n))}</b> : ${esc(show(n.a))} = ${vf(evalF(n.a,r))}, donc ${esc(show(n))} = <b>${x}</b>. ${RULE.not}`;
  const a=vf(evalF(n.a,r)),b=vf(evalF(n.b,r));
  return `<b>Ligne i${k+1}, colonne ${esc(show(n))}</b> : on lit ${esc(show(n.a,false))} = ${a} et ${esc(show(n.b,false))} = ${b} (dans les colonnes à gauche), donc ${a} ${SYM[n.op]} ${b} = <b>${x}</b>. ${RULE[n.op]}`;
}
function showWhy(td){const q=L&&L.queue[0];if(!q||!q._fill||!q._fill.f)return;const {vs,ns}=q._fill;const k=+td.dataset.r;
  const box=td.closest(".tscroll").parentElement.querySelector(".cellwhy");if(!box)return;
  box.hidden=false;box.innerHTML=`<div class="why">Pourquoi</div>${cellWhy(ns[+td.dataset.c],interps(vs)[k],k)}`;
  td.closest("table").querySelectorAll("td.fill.focus").forEach(c=>c.classList.remove("focus"));td.classList.add("focus")}
function revealTable(el,q){
  if(!q._fill||!q._fill.f)return 0;const {f,vs,ns}=q._fill;const rows=interps(vs);let err=0;
  fillCells(el).forEach(td=>{const x=evalF(ns[+td.dataset.c],rows[+td.dataset.r]);const u=td.dataset.v||"";
    td.classList.add("locked",x?"v":"x");if(u&&u!==vf(x)){td.classList.add("miss");err++}else if(!u)err++;else td.classList.add("hit");
    td.innerHTML=u&&u!==vf(x)?`<s>${u}</s> ${vf(x)}<sup class="qm">?</sup>`:!u?`${vf(x)}<sup class="qm">?</sup>`:vf(x);td.title="Clique pour voir pourquoi"});
  const first=el.querySelector("td.fill.miss")||[...fillCells(el)].find(td=>!td.classList.contains("hit"));
  if(first)showWhy(first);
  const tip=el.querySelector(".cellwhy");if(tip&&!tip.hidden)tip.insertAdjacentHTML("beforeend",`<div class="hint">Clique sur n'importe quelle case corrigée pour voir son explication.</div>`);
  return err;
}
function esc(s){return String(s).replace(/[&<>"]/g,c=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"}[c]))}
/* ---------- Types de questions ---------- */
function mainTokens(f,top=true){
  if(f.op==="var")return [{t:f.n}];
  if(f.op==="not")return [{t:"¬"},...mainTokens(f.a,false)];
  const mid=[...mainTokens(f.a,false),{t:SYM[f.op],main:top},...mainTokens(f.b,false)];
  return top?mid:[{t:"("},...mid,{t:")"}];
}
const QT={
 mcq:{howto:"Choisis une réponse puis clique sur Vérifier.",
  body:q=>`<div class="choices" role="group">${q.choices.map((c,i)=>`<button class="choice" data-i="${i}" aria-pressed="false"><span class="k">${i+1}</span><span>${c}</span></button>`).join("")}</div>`,
  init(el,q,ready){let sel=null;el.querySelectorAll(".choice").forEach(b=>b.onclick=()=>{if(b.disabled)return;el.querySelectorAll(".choice").forEach(x=>x.setAttribute("aria-pressed","false"));b.setAttribute("aria-pressed","true");sel=+b.dataset.i;SND.tap();ready(true)});return ()=>sel},
  grade:(q,v)=>v===q.answer,
  lock(el,q,v){el.querySelectorAll(".choice").forEach(b=>{b.disabled=true;const i=+b.dataset.i;if(i===q.answer)b.classList.add("good");else if(i===v)b.classList.add("wrong")})},
  good:q=>`Bonne réponse : <b>${q.choices[q.answer]}</b>`},
 input:{howto:"Tape ta réponse puis clique sur Vérifier (ou appuie sur Entrée).",
  body(q){const syms=q.set?["{","}",",","∅","−"]:[];return `<input class="answer-input" id="ans" autocomplete="off" spellcheck="false" placeholder="${q.set?"Ex. {a, b, c}":"Ta réponse"}">
    ${syms.length?`<div class="symbols">${syms.map(s=>`<button type="button" data-s="${s}">${s}</button>`).join("")}</div>`:""}
    <div class="hint">${q.set?"Écris les éléments entre accolades, séparés par des virgules. L'ordre ne compte pas.":"Écris un nombre ou un mot, sans unité."}</div>`},
  init(el,q,ready){const inp=el.querySelector("#ans");inp.oninput=()=>ready(!!inp.value.trim());inp.focus();
    el.querySelectorAll(".symbols button").forEach(b=>b.onclick=()=>{const p=inp.selectionStart??inp.value.length;inp.value=inp.value.slice(0,p)+b.dataset.s+inp.value.slice(p);inp.focus();inp.setSelectionRange(p+1,p+1);ready(!!inp.value.trim())});
    return ()=>inp.value},
  grade:(q,v)=>check(q,v),
  lock(el){el.querySelector("#ans").disabled=true},
  good:q=>`Bonne réponse : <b>${q.answers[0]}</b>`},
 table:{howto:"Remplis la table puis clique sur Vérifier.",body:()=>"",init:()=>()=>null,
  grade:(q,v,errs)=>errs===0,lock(){},
  good:(q,v,errs)=>`${errs} case${errs>1?"s":""} fausse${errs>1?"s":""} ou vide${errs>1?"s":""}, corrigée${errs>1?"s":""} dans la table.`},
 match:{howto:"Clique sur un élément à gauche, puis sur celui qui lui correspond à droite.",
  body(q){const L=shuffle(q.pairs.map((_,i)=>i)),R=shuffle(q.pairs.map((_,i)=>i));
    return `<div class="match"><div class="mcol">${L.map(i=>`<button class="choice mb" data-l="${i}">${q.pairs[i][0]}</button>`).join("")}</div><div class="mcol">${R.map(i=>`<button class="choice mb" data-r="${i}">${q.pairs[i][1]}</button>`).join("")}</div></div>`},
  init(el,q,ready){let selL=null,errors=0,done=0;
    el.querySelectorAll("[data-l]").forEach(b=>b.onclick=()=>{if(b.disabled)return;el.querySelectorAll("[data-l]").forEach(x=>x.classList.remove("picked"));b.classList.add("picked");selL=+b.dataset.l});
    el.querySelectorAll("[data-r]").forEach(b=>b.onclick=()=>{if(b.disabled||selL===null)return;const lb=el.querySelector(`[data-l="${selL}"]`);
      if(+b.dataset.r===selL){[lb,b].forEach(x=>{x.classList.remove("picked");x.classList.add("good");x.disabled=true});done++;SND.match();if(done===q.pairs.length)ready(true)}
      else{errors++;SND.bad();b.classList.add("wrong");lb.classList.add("wrong");setTimeout(()=>{b.classList.remove("wrong");lb.classList.remove("wrong","picked")},600)}
      selL=null});
    return ()=>errors},
  grade:(q,v)=>v===0,lock(){},
  good:q=>`Tu as fait des erreurs en chemin. Les bonnes paires :<ul>${q.pairs.map(p=>`<li>${p[0]} ↔ ${p[1]}</li>`).join("")}</ul>`},
 build:{howto:"Touche les tuiles dans l'ordre pour écrire la formule. Touche une tuile de ta réponse pour la retirer.",
  body:q=>`<div class="build-ans" id="bAns"></div><div class="tiles" id="bTiles">${q.tiles.map((t,i)=>`<button type="button" class="tile" data-t="${i}">${t}</button>`).join("")}</div>`,
  init(el,q,ready){const ans=[];const A=el.querySelector("#bAns");
    function draw(){A.innerHTML=ans.length?ans.map((i,k)=>`<button type="button" class="tile" data-a="${k}">${q.tiles[i]}</button>`).join(""):`<span class="hint">Ta formule apparaîtra ici</span>`;
      el.querySelectorAll("#bTiles .tile").forEach(b=>b.classList.toggle("used",ans.includes(+b.dataset.t)));
      A.querySelectorAll("[data-a]").forEach(b=>b.onclick=()=>{if(q._locked)return;ans.splice(+b.dataset.a,1);draw()});ready(ans.length>0)}
    el.querySelectorAll("#bTiles .tile").forEach(b=>b.onclick=()=>{if(q._locked||ans.includes(+b.dataset.t))return;ans.push(+b.dataset.t);SND.tap();draw()});
    draw();return ()=>ans.map(i=>q.tiles[i]).join(" ")},
  grade(q,v){try{const a=parseFormula(v),b=parseFormula(q.target);if(varsOf(a).join()!==varsOf(b).join())return false;return interps(varsOf(b)).every(i=>evalF(a,i)===evalF(b,i))}catch(e){return false}},
  lock(el,q){q._locked=true},
  good:q=>`Bonne réponse : <b class="f">${q.target}</b>`},
 venn:{howto:"Clique sur les zones qui forment l'ensemble demandé (clique à nouveau pour enlever), puis Vérifier.",
  body:()=>`<div class="tscroll venn-pick" id="vp"></div>`,
  init(el,q,ready){const sel=new Set();const uid=rnd(1e6);const box=el.querySelector("#vp");
    function draw(){box.innerHTML=vennSVG(uid,[...sel],"");box.querySelector("svg").classList.add("pick");ready(true)}
    box.onclick=e=>{if(q._locked)return;const r=e.target.closest("[data-reg]");if(!r)return;const k=r.dataset.reg;sel.has(k)?sel.delete(k):sel.add(k);draw()};
    draw();return ()=>[...sel].sort().join()},
  grade:(q,v)=>v===q.regions.slice().sort().join(),
  lock(el,q){q._locked=true},
  good:q=>`La bonne zone :<div class="tscroll">${vennSVG(rnd(1e6),q.regions,"")}</div>`},
 mainop:{howto:"Clique sur le connecteur principal : celui qui s'applique en dernier, qu'on enlève en premier dans l'arbre.",
  body:q=>`<div class="tokens">${q.tokens.map((t,i)=>"¬∧∨→↔".includes(t.t)?`<button type="button" class="tok op" data-k="${i}" aria-pressed="false">${t.t}</button>`:`<span class="tok">${t.t}</span>`).join("")}</div>`,
  init(el,q,ready){let sel=null;el.querySelectorAll(".tok.op").forEach(b=>b.onclick=()=>{if(q._locked)return;el.querySelectorAll(".tok.op").forEach(x=>x.setAttribute("aria-pressed","false"));b.setAttribute("aria-pressed","true");sel=+b.dataset.k;ready(true)});return ()=>sel},
  grade:(q,v)=>v===q.answer,
  lock(el,q,v){q._locked=true;el.querySelectorAll(".tok.op").forEach(b=>{const k=+b.dataset.k;if(k===q.answer)b.classList.add("good");else if(k===v)b.classList.add("wrong")})},
  good:q=>`Le connecteur principal est le <b>${q.tokens[q.answer].t}</b> surligné en vert.`}
};
function nextQ(){
  if(L.deck.adaptive&&L.served<L.total&&(!L.queue.length||L.missed.has(L.queue[0]))){L.queue.unshift(adaptGen(L.subj));L.served++}
  if(!L.queue.length)return endLesson();
  const q=L.queue[0];const el=document.getElementById("lesson");q._locked=false;
  const T=QT[q.type]||QT.input;
  const pct=Math.round(100*L.done/L.total);
  el.innerHTML=`<div class="lbar"><button class="xbtn" id="quit" aria-label="Quitter la leçon">×</button><div class="meter"><i style="width:${pct}%"></i></div><span class="combo" id="combo" ${L.combo>=3?"":"hidden"}>Série ×${L.combo}</span>${L.deck.adaptive?`<span class="chip" title="Niveau de difficulté">Niv. ${adaptLv(L.subj)}/4</span>`:""}<span class="chip">${L.done}/${L.total}</span></div>
  <div><div class="qkind">${esc(q.kind||L.deck.title)}</div><p class="qtext">${q.q}</p>${q.mcd?`<div class="tscroll">${mcdSVG(...q.mcd)}</div>`:""}${q.fig&&typeof FIG!=="undefined"&&FIG[q.fig]?figHTML(q.fig,q.figHide):""}${interpTable(q)}<p class="howto">${T.howto}</p></div>
  ${T.body(q)}<div id="fb"></div>
  <div class="actions"><button class="btn" id="go" disabled>Vérifier</button></div>`;
  document.getElementById("quit").onclick=quit;
  const go=document.getElementById("go");let answered=false;
  const getV=T.init(el,q,ok=>{if(!answered)go.disabled=!ok});
  go.onclick=()=>{
    if(answered){L.queue.shift();if(L.lastOk)L.done++;nextQ();return}
    const v=getV();const errs=revealTable(el,q);
    const ok=T.grade(q,v,errs);answered=true;L.lastOk=ok;T.lock(el,q,v);
    const first=!L.missed.has(q);
    if(ok){L.combo++;L.best=Math.max(L.best,L.combo);if(first){L.firstTry++;L.xp+=10+Math.min(5,Math.max(0,L.combo-2));state.mastery[q.id]=Math.min(lvl(q.id)+1,5)}else L.xp+=3}
    else{L.combo=0;L.missed.add(q);state.mastery[q.id]=Math.max(lvl(q.id)-1,0);L.queue.push(q);if(first){state.miss=state.miss||{};state.miss[q.id]=(state.miss[q.id]||0)+1}}
    if(L.deck.adaptive&&first)adaptUpdate(L.subj,ok,q);
    if(ok){SND.good(L.combo-1);if(L.combo>=3&&L.combo%5===0)setTimeout(()=>SND.combo(),260)}else SND.bad();
    const cb=document.getElementById("combo");if(cb){cb.hidden=L.combo<3;cb.textContent=`Série ×${L.combo}`;cb.classList.remove("pop");void cb.offsetWidth;if(ok&&L.combo>=3)cb.classList.add("pop")}
    state.daily=state.daily||{};const before=state.daily[today()]||0;state.daily[today()]=before+1;
    if(before+1===goalN()){setTimeout(()=>{SND.goal();toast(`Objectif du jour atteint : ${goalN()} questions !`)},500)}
    bumpDay();save();renderStats();
    document.getElementById("fb").innerHTML=`<div class="feedback ${ok?"ok":"ko"}"><strong>${ok?pick(["Correct !","Exact !","Bien joué !","Parfait !"]):"Pas tout à fait"}</strong>${ok?"":`<div>${T.good(q,v,errs)}</div>`}${q.expl?`<div class="why">Pourquoi</div><div class="expl">${q.expl}</div>`:""}${ok?"":`<div class="hint">Cette question reviendra à la fin de la leçon.</div>`}</div>`;
    {const fkEl=document.querySelector("#fb [data-fk]");if(fkEl&&q.fk&&MODS.falk){fkEl._mats=q.fk;try{MODS.falk(fkEl)}catch(e){console.error(e)}}}
    go.textContent="Continuer";go.disabled=false;go.focus();
  };
}
document.addEventListener("click",e=>{const b=e.target.closest(".tree-btn");if(!b)return;const slot=b.parentElement.nextElementSibling;slot.hidden=!slot.hidden;b.setAttribute("aria-expanded",String(!slot.hidden));b.textContent=slot.hidden?"Voir l'arbre de décomposition":"Cacher l'arbre"});
function setCell(td,v){if(td.classList.contains("locked"))return;td.dataset.v=v;td.textContent=v;td.classList.toggle("u-v",v==="V");td.classList.toggle("u-f",v==="F");
  const go=document.getElementById("go");if(go&&L&&L.queue[0]&&L.queue[0].type==="table"&&go.textContent==="Vérifier")go.disabled=!fillCells(document.getElementById("lesson")).some(c=>c.dataset.v)}
document.addEventListener("click",e=>{const td=e.target.closest("td.fill");if(!td)return;if(td.classList.contains("locked")){showWhy(td);const t=td.closest(".tscroll").parentElement.querySelector(".cellwhy .hint");return}const v=td.dataset.v;setCell(td,v==="V"?"F":v==="F"?"":"V")});
document.addEventListener("keydown",e=>{const td=e.target.closest&&e.target.closest("td.fill");if(!td)return;const k=e.key.toLowerCase();
  if(k==="v"||k==="f"){e.preventDefault();e.stopPropagation();setCell(td,k.toUpperCase());const cells=fillCells(document.getElementById("lesson"));
    const order=cells.slice().sort((a,b)=>(+a.dataset.c-+b.dataset.c)||(+a.dataset.r-+b.dataset.r));const nx=order[order.indexOf(td)+1];if(nx)nx.focus()}
  else if(k==="backspace"||k==="delete"){e.preventDefault();setCell(td,"")}},true);
document.addEventListener("keydown",e=>{
  if(e.target.closest&&e.target.closest(".calc"))return;
  if(!L||document.getElementById("lesson").hidden)return;
  const go=document.getElementById("go");if(!go)return;
  if(e.key==="Enter"&&!go.disabled){e.preventDefault();go.click();return}
  if(/^[1-9]$/.test(e.key)&&document.activeElement?.id!=="ans"){const b=document.querySelector(`.choice[data-i="${+e.key-1}"]`);if(b&&!b.disabled)b.click()}
});

/* ===================== Autres matières : banques ===================== */
BANK.bdd=[
 {id:"b1",type:"mcq",q:"Dans un MCD, l'identifiant d'une entité est…",choices:["souligné et placé en tête","précédé de #","écrit en majuscules","facultatif"],answer:0,expl:"L'identifiant est souligné, en tête des propriétés, et ne change jamais."},
 {id:"b2",type:"mcq",q:"« Un client passe une ou plusieurs commandes. » Cardinalité côté CLIENT ?",choices:["0,1","1,1","1,n","0,n"],answer:2,expl:"Au minimum 1, au maximum plusieurs : 1,n."},
 {id:"b3",type:"mcq",q:"« Une commande est passée par un et un seul client. » Cardinalité côté COMMANDE ?",choices:["1,1","0,1","1,n","0,n"],answer:0,expl:"Exactement un : 1,1."},
 {id:"b4",type:"mcq",mcd:["CLIENT","COMMANDE","Passer","1,n","1,1","","IDClient","IDCommande"],q:"Regarde les cardinalités du MCD ci-dessous. Quel est le type de l'association Passer ?",choices:["1:1","1:n","n:n"],answer:1,expl:typeExpl("CLIENT","COMMANDE","1,n","1,1")},
 {id:"b5",type:"mcq",mcd:["COMMANDE","PRODUIT","Contenir","1,n","0,n","","IDCommande","IDProduit"],q:"Regarde les cardinalités du MCD ci-dessous. Quel est le type de l'association Contenir ?",choices:["1:1","1:n","n:n"],answer:2,expl:typeExpl("COMMANDE","PRODUIT","1,n","0,n")},
 {id:"b6",type:"mcq",q:"Une association 1:n se traduit dans le MLD par…",choices:["une nouvelle table","une clé étrangère dans la table côté (1,1)","une clé étrangère dans la table côté (1,n)","rien"],answer:1,expl:"Règle 2 : l'entité qui a le maximum à 1 absorbe l'identifiant de l'autre comme #clé étrangère."},
 {id:"b7",type:"mcq",q:"Une association n:n se traduit dans le MLD par…",choices:["une clé étrangère d'un côté","une nouvelle table dont la clé primaire est composée des deux clés étrangères","la fusion des deux tables","un attribut calculé"],answer:1,expl:"Règle 3 : nouvelle table, clé primaire = concaténation des clés étrangères, plus les propriétés de l'association."},
 {id:"b8",type:"mcq",q:"Dans la notation du cours, une clé étrangère s'écrit…",choices:["soulignée","précédée de #","en gras","entre parenthèses"],answer:1,expl:"Clé primaire soulignée, clé étrangère précédée de #."},
 {id:"b9",type:"mcq",q:"La quantité commandée d'un produit dans une commande est une propriété…",choices:["de COMMANDE","de PRODUIT","de l'association entre COMMANDE et PRODUIT","calculée, on ne la stocke pas"],answer:2,expl:"Elle dépend du couple (commande, produit) : l'association est porteuse (LigneCommande avec Qte)."},
 {id:"b10",type:"mcq",q:"Peut-on stocker « TotalLigne = PrixUnitaire × Qté » dans le MCD ?",choices:["Oui, comme propriété de l'association","Non, c'est une donnée calculée","Oui, dans PRODUIT","Oui, comme identifiant"],answer:1,expl:"Une donnée calculée ne se stocke pas, elle se recalcule."},
 {id:"b11",type:"mcq",q:"Une propriété Date apparaît dans COMMANDE et dans FACTURE. Que faire ?",choices:["Rien","La renommer Date_commande et Date_facture","Créer une entité DATE obligatoirement","La supprimer"],answer:1,expl:"Une propriété n'apparaît qu'une fois dans un MCD : on les distingue par leur nom."},
 {id:"b12",type:"mcq",q:"La notation NumClient → Nom, Prénom signifie…",choices:["NumClient est une clé étrangère","connaître NumClient permet de connaître un seul Nom et un seul Prénom","Nom détermine NumClient","NumClient est calculé"],answer:1,expl:"C'est une dépendance fonctionnelle : la source détermine une seule valeur de la cible."},
 {id:"b13",type:"mcq",q:"(NumClient, CodeArticle, Date) → Qté. Cette DF à source composée donne dans le MCD…",choices:["une entité QTE","une association porteuse de Qté entre Client, Article (et Date)","une clé étrangère dans Client","rien"],answer:1,expl:"Source composée = association entre les entités correspondantes, qui porte Qté."},
 {id:"b14",type:"mcq",q:"La contrainte d'intégrité référentielle impose que…",choices:["la clé primaire soit unique","toute clé étrangère référence une clé primaire existante","chaque table ait 2 clés","les données calculées soient stockées"],answer:1,expl:"Pas d'enfant avec un NumMère qui n'existe pas dans MERE."},
 {id:"b15",type:"mcq",q:"On supprime une mère qui a des enfants. Quelle réaction n'est PAS une option de la CIR ?",choices:["Interdire la suppression","Supprimer aussi les enfants (CASCADE)","Mettre la clé étrangère des enfants à NULL","Garder des enfants avec un NumMère inexistant"],answer:3,expl:"La CIR interdit justement une clé étrangère qui ne référence rien."},
 {id:"b16",type:"mcq",fig:"chef",q:"« Un salarié a pour chef aucun ou un seul autre salarié ; un salarié est chef de aucun ou plusieurs salariés. » On connaît le matricule, le nom et la fonction (MCD ci-dessous). Quelle table obtient-on ?",choices:["SALARIE (<u>Matricule</u>, Nom, Fonction, #Matricule)","SALARIE (<u>Matricule</u>, Nom, Fonction, #Matricule_chef)","CHEF (<u>#Matricule, #Matricule</u>)","SALARIE (<u>Matricule</u>, Nom, Fonction) seulement"],answer:1,expl:"Réflexive hiérarchique (un maximum à 1, côté subordonné) : règle 2, la table SALARIE reçoit une deuxième fois le matricule comme clé étrangère. On le <b>renomme</b> (#Matricule_chef), sinon on aurait deux colonnes Matricule."},
 {id:"b17",type:"mcq",fig:"engager",q:"« Une écurie engage un ou plusieurs pilotes pour une ou plusieurs saisons, avec un salaire négocié à chaque engagement. » Le MCD est ci-dessous (association ternaire Engager, porteuse de Salaire). Quelle table donne l'association Engager dans le schéma relationnel ?",choices:["ENGAGER (<u>#Id_Saison, #Num_Ecurie, #Num_Pilote</u>, Salaire)","PILOTE (<u>Num_Pilote</u>, Nom_Pilote, #Num_Ecurie, Salaire)","ENGAGER (<u>Num_Engagement</u>, Salaire)","Aucune table : Salaire va dans ECURIE"],answer:0,expl:"Une association ternaire devient toujours une table. Elle reçoit les 3 identifiants (Id_Saison, Num_Ecurie, Num_Pilote) en clés étrangères, qui forment ensemble la clé primaire. Salaire, porté par l'association, devient un attribut (hors clé)."},
 {id:"b18",type:"mcq",q:"Une clé primaire peut-elle être nulle ?",choices:["Oui","Non"],answer:1,expl:"Elle est unique et obligatoirement non nulle."},
 {id:"b19",type:"mcq",mcd:["MICRO","CD_ROM","Equiper","0,1","1,1","","Num_Micro","Num_Cd"],q:"Dans ce MCD (association 1:1), dans quelle table met-on la clé étrangère ?",choices:["MICRO reçoit #Num_Cd","CD_ROM reçoit #Num_Micro","Table EQUIPER","Les deux s'échangent leurs clés"],answer:1,expl:"Le côté (1,1) reçoit la clé, ce qui évite une clé étrangère nulle côté MICRO."},
 {id:"b20",type:"mcq",mcd:["MICRO","CD_ROM","Equiper","0,1","0,1","","Num_Micro","Num_Cd"],q:"Dans ce MCD, les deux côtés sont (0,1). Quelle est la meilleure traduction dans le MLD ?",choices:["#Num_Cd dans MICRO","#Num_Micro dans CD_ROM","EQUIPER (#Num_Micro, #Num_Cd)","Fusionner les tables"],answer:2,expl:"Avec 0 des deux côtés, une clé étrangère pourrait être nulle : on crée une table d'association."},
 {id:"b21",type:"mcq",q:"Combien de cardinalités faut-il indiquer pour une association entre 2 entités ?",choices:["2","4","1","3"],answer:1,expl:"Un couple (mini, maxi) de chaque côté : 4 valeurs."},
 {id:"b22",type:"mcq",q:"Annale : un scientifique écrit un ou plusieurs articles, un article est écrit par un ou plusieurs scientifiques. Type ?",choices:["1:1","1:n","n:n"],answer:2,expl:"Maximums n et n : n:n, d'où la table ECRIT (#IDS, #IDA)."},
 {id:"b23",type:"mcq",mcd:["EMPLOYE","COMMANDE","Traiter","1,n","1,1","","IDEmpl","IDCommande"],q:"Annale 2025-26. « Une commande est traitée par un et un seul employé ; un employé traite une ou plusieurs commandes. » Comment se traduit l'association Traiter dans le schéma relationnel ?",choices:["EMPLOYE (<u>IDEmpl</u>, …, #IDCommande)","COMMANDE (<u>IDCommande</u>, …, #IDEmpl)","TRAITER (<u>#IDEmpl, #IDCommande</u>)","Elle ne laisse aucune trace"],answer:1,expl:"Maximums 1 (côté COMMANDE) et n (côté EMPLOYE) : association 1:n. Règle 2 : la table du côté du maximum 1, COMMANDE, reçoit la clé étrangère #IDEmpl. Chaque commande « pointe » vers son unique employé."},
 {id:"b24",type:"mcq",q:"Une association…",choices:["a toujours ses propres propriétés","peut avoir des propriétés, ce n'est pas obligatoire","n'a jamais de propriété","a un identifiant souligné à elle"],answer:1,expl:"Son identifiant est la concaténation de ceux des entités liées. Elle peut porter des propriétés."},
 {id:"b25",type:"input",mcd:["COMMANDE","PRODUIT","Contenir","1,n","0,n","Qte","IDCommande","IDProduit"],q:"Annale 2025-26 : une commande contient un ou plusieurs produits, un produit est dans aucune ou plusieurs commandes, avec une quantité Qte (MCD ci-dessous, identifiants IDCommande et IDProduit). Écris la table issue de l'association, sous la forme NOM(#a, #b, c), en l'appelant LigneCommande.",answers:["LigneCommande(#IDCommande,#IDProduit,Qte)","LigneCommande(#IDProduit,#IDCommande,Qte)"],expl:"Type n:n porteuse de Qte : règle 3, nouvelle table dont la clé primaire est (#IDCommande, #IDProduit), et Qte en attribut : LigneCommande (<u>#IDCommande, #IDProduit</u>, Qte)."}
];
BANK.maths=[
 {id:"m1",type:"mcq",q:"Une matrice de type (2, 3) a…",choices:["2 colonnes et 3 lignes","2 lignes et 3 colonnes","6 lignes","3 lignes et 3 colonnes"],answer:1,expl:"Type (n, p) : n lignes, p colonnes."},
 {id:"m2",type:"mcq",q:"Le produit A × B avec A de type (2, 3) et B de type (3, 4) est de type…",choices:["(3, 3)","(2, 4)","(4, 2)","impossible"],answer:1,expl:"(n, p) × (p, q) = (n, q) : (2, 4)."},
 {id:"m3",type:"mcq",q:"A de type (2, 3) et B de type (2, 3) : le produit A × B est…",choices:["de type (2, 3)","de type (2, 2)","impossible","de type (3, 3)"],answer:2,expl:"Il faut nb de colonnes de A (3) = nb de lignes de B (2). Ce n'est pas le cas."},
 {id:"m4",type:"mcq",q:"En général, pour deux matrices carrées A et B…",choices:["AB = BA","AB ≠ BA","AB = 0","AB = I"],answer:1,expl:"La multiplication des matrices n'est pas commutative."},
 {id:"m5",type:"mcq",q:"<sup>t</sup>(AB) = …",choices:["<sup>t</sup>A <sup>t</sup>B","<sup>t</sup>B <sup>t</sup>A","AB","BA"],answer:1,expl:"La transposée d'un produit inverse l'ordre."},
 {id:"m6",type:"mcq",q:"(AB)<sup>−1</sup> = …",choices:["A<sup>−1</sup>B<sup>−1</sup>","B<sup>−1</sup>A<sup>−1</sup>","BA","−AB"],answer:1,expl:"Attention à l'ordre : B<sup>−1</sup>A<sup>−1</sup>."},
 {id:"m7",type:"mcq",q:"Une matrice symétrique est forcément…",choices:["diagonale","carrée","inversible","nulle"],answer:1,expl:"A = <sup>t</sup>A impose n = p."},
 {id:"m8",type:"mcq",q:"A + <sup>t</sup>A est toujours…",choices:["nulle","symétrique","diagonale","inversible"],answer:1,expl:"<sup>t</sup>(A + <sup>t</sup>A) = <sup>t</sup>A + A. Question du DM1 : on pouvait le deviner sans calculer."},
 {id:"m9",type:"mcq",q:"Pour montrer que B est l'inverse de A (carrées), il suffit de vérifier…",choices:["A + B = I","AB = I<sub>n</sub>","A = B","AB = 0"],answer:1,expl:"Remarque 4.3 : AB = I<sub>n</sub> suffit."},
 {id:"m10",type:"mcq",q:"Peut-on avoir AB = 0 avec A ≠ 0 et B ≠ 0 ?",choices:["Oui","Non"],answer:0,expl:"Oui, par exemple E = (0 0 ; 1 0) et F = (0 0 ; 0 1)."},
 {id:"m11",type:"mcq",q:"A<sup>0</sup> vaut, pour A carrée d'ordre n…",choices:["0","A","I<sub>n</sub>","1"],answer:2,expl:"Convention : A<sup>0</sup> = I<sub>n</sub>."},
 {id:"m12",type:"mcq",q:"Une matrice triangulaire supérieure a…",choices:["des zéros au-dessus de la diagonale","des zéros sous la diagonale","des zéros sur la diagonale","que des 1"],answer:1,expl:"Supérieure : les coefficients non nuls sont sur et au-dessus de la diagonale."},
 {id:"m13",type:"mcq",q:"Quelle opération n'est PAS une opération élémentaire sur un système ?",choices:["Échanger deux équations","Multiplier une équation par 0","Ajouter à L2 un multiple de L1","Multiplier une équation par −3"],answer:1,expl:"On multiplie par une constante non nulle uniquement."},
 {id:"m14",type:"mcq",q:"Après échelonnement on obtient la ligne 0 = 4. Le système…",choices:["a une infinité de solutions","n'a pas de solution (S = ∅)","a une solution unique","est homogène"],answer:1,expl:"0 = b avec b ≠ 0 : système incompatible."},
 {id:"m15",type:"mcq",q:"Après échelonnement on obtient la ligne 0 = 0. Que faire ?",choices:["Conclure S = ∅","La supprimer et continuer","Recommencer","La diviser par 0"],answer:1,expl:"Elle est toujours vraie, on l'enlève."},
 {id:"m16",type:"mcq",q:"Système échelonné : x + 2y − 2z + 3w = 2 ; z − 2w = 1. Inconnues secondaires (libres) ?",choices:["x et z","y et w","w seulement","aucune"],answer:1,expl:"Principales : celles en tête des lignes (x, z). Les autres (y, w) sont secondaires."},
 {id:"m17",type:"mcq",q:"Un système échelonné a 3 équations utiles et 4 inconnues. Ses solutions…",choices:["une seule","aucune","une infinité à 1 paramètre","une infinité à 4 paramètres"],answer:2,expl:"4 inconnues − 3 pivots = 1 inconnue secondaire, donc 1 paramètre (s'il n'y a pas de 0 = b)."},
 {id:"m18",type:"mcq",q:"Un système est homogène quand…",choices:["il a autant d'équations que d'inconnues","tous les seconds membres sont nuls","il est échelonné","il n'a pas de solution"],answer:1,expl:"b<sub>i</sub> = 0 pour tout i. Il a toujours au moins la solution nulle."},
 {id:"m19",type:"mcq",q:"Le système AX = B : A est…",choices:["le vecteur des inconnues","la matrice des coefficients des premiers membres","le vecteur des seconds membres","l'inverse"],answer:1,expl:"X : inconnues, B : seconds membres."},
 {id:"m20",type:"mcq",q:"Échelonné signifie que…",choices:["les pivots valent 1","le nombre de zéros en début de ligne augmente strictement","la matrice est diagonale","toutes les lignes ont la même longueur"],answer:1,expl:"Définition 2.1 du cours."},
 {id:"m21",type:"input",q:"Combien de coefficients a une matrice de type (3, 4) ?",answers:["12"],expl:"3 × 4 = 12."},
 {id:"m22",type:"mcq",q:"Si l'on trouve une solution avec un paramètre w, on…",choices:["fixe w = 0","laisse w arbitraire : S = {(…, w) / w ∈ ℝ}","choisit w = 1","élimine w"],answer:1,expl:"On ne donne aucune valeur aux variables libres."}
];
BANK.web=[
 {id:"w1",type:"mcq",q:"Quelle balise contient le menu de navigation ?",choices:["&lt;menu&gt;","&lt;nav&gt;","&lt;header&gt;","&lt;aside&gt;"],answer:1,expl:"nav, souvent placé dans header avec le titre principal."},
 {id:"w2",type:"mcq",q:"Comment ouvrir un lien dans un nouvel onglet ?",choices:["target=\"_blank\"","rel=\"new\"","href=\"_blank\"","new=\"true\""],answer:0,expl:"&lt;a href=\"…\" target=\"_blank\"&gt;"},
 {id:"w3",type:"mcq",q:"Quel lien remonte en haut de la page sans ancre explicite ?",choices:["href=\"top\"","href=\"#\"","href=\"/\"","href=\"#haut\" sans id"],answer:1,expl:"href=\"#\" renvoie en haut de la page."},
 {id:"w4",type:"mcq",q:"Pour une légende commune à deux images :",choices:["deux figcaption","une figure avec les 2 img et une seule figcaption","un attribut title","un p sous chaque image"],answer:1,expl:"&lt;figure&gt;&lt;img&gt;&lt;img&gt;&lt;figcaption&gt;…&lt;/figcaption&gt;&lt;/figure&gt;"},
 {id:"w5",type:"mcq",q:"Fusionner deux cellules d'un tableau sur deux colonnes :",choices:["rowspan=\"2\"","colspan=\"2\"","merge=\"2\"","span=\"2\""],answer:1,expl:"colspan fusionne des colonnes, rowspan des lignes."},
 {id:"w6",type:"mcq",q:"Une liste imbriquée se place…",choices:["après le &lt;/ul&gt;","à l'intérieur d'un &lt;li&gt;","dans un &lt;p&gt;","dans le &lt;head&gt;"],answer:1,expl:"La sous-liste est un enfant du li."},
 {id:"w7",type:"mcq",q:"Le sélecteur <span class='f'>#eau</span> cible…",choices:["les éléments de classe eau","l'élément d'id eau","toutes les balises eau","les liens vers eau"],answer:1,expl:"# = id (unique), . = classe."},
 {id:"w8",type:"mcq",q:"Le sélecteur <span class='f'>section p</span> cible…",choices:["les section et les p","les p descendants d'une section","les section dans un p","le premier p"],answer:1,expl:"Sélecteur contextuel parent-descendant. La virgule (section, p) ciblerait les deux."},
 {id:"w9",type:"mcq",q:"Quel sélecteur est le plus prioritaire ?",choices:["p","p.rouge","#intro","section p"],answer:2,expl:"id > classe > balise."},
 {id:"w10",type:"mcq",q:"<span class='f'>margin: 10px 20px 30px 40px;</span> La marge de gauche vaut…",choices:["10px","20px","30px","40px"],answer:3,expl:"Ordre : haut, droite, bas, gauche (sens des aiguilles d'une montre)."},
 {id:"w11",type:"mcq",q:"<span class='f'>padding</span> est…",choices:["la marge extérieure","la marge intérieure (entre le contenu et la bordure)","la bordure","l'espace entre deux lignes"],answer:1,expl:"margin = extérieure, padding = intérieure."},
 {id:"w12",type:"mcq",q:"Centrer horizontalement un bloc de 960px max :",choices:["text-align: center","margin: 0 auto","float: center","position: center"],answer:1,expl:"max-width: 960px; margin: 0 auto;"},
 {id:"w13",type:"mcq",q:"Mettre deux div côte à côte, alignés en haut :",choices:["display: block","display: inline-block; vertical-align: top","display: none","position: fixed"],answer:1,expl:"inline-block les place sur la même ligne tout en gardant une largeur."},
 {id:"w14",type:"mcq",q:"Cacher les sous-menus :",choices:["visibility: 0","display: none","opacity: none","hidden: true"],answer:1,expl:"display: none retire l'élément de l'affichage."},
 {id:"w15",type:"mcq",q:"position: relative; top: 20px; …",choices:["fixe l'élément à la fenêtre","décale l'élément de 20px vers le bas, sa place reste réservée","sort l'élément du flux","ne fait rien"],answer:1,expl:"Relatif : décalé par rapport à sa position normale."},
 {id:"w16",type:"mcq",q:"Un entête qui reste visible quand on fait défiler la page :",choices:["position: absolute","position: fixed; top: 0","position: relative","float: top"],answer:1,expl:"fixed : positionné par rapport à la fenêtre."},
 {id:"w17",type:"mcq",q:"Deux blocs se superposent. Lequel est devant ?",choices:["celui avec le plus petit z-index","celui avec le plus grand z-index","le premier dans le HTML","le plus large"],answer:1,expl:"La plus grande valeur de z-index est affichée par-dessus."},
 {id:"w18",type:"mcq",q:"Remplacer les puces d'une liste par une icône :",choices:["list-style-image: url('icone.png')","background: icone.png","list-type: image","bullet: url()"],answer:0,expl:"list-style-image (ou list-style-type: none + background)."},
 {id:"w19",type:"mcq",q:"Image de fond qui tient entière dans l'élément :",choices:["background-size: contain","background-size: cover","background-repeat: fit","background: full"],answer:0,expl:"contain : l'image entière est visible. cover : elle remplit tout quitte à être coupée."},
 {id:"w20",type:"mcq",q:"Écrire en petites capitales :",choices:["text-transform: small","font-variant: small-caps","font-size: small","text-decoration: caps"],answer:1,expl:"font-variant: small-caps."},
 {id:"w21",type:"mcq",q:"Au survol d'une figure, la décaler de 20px vers le bas :",choices:["figure:hover { position: relative; top: 20px; }","figure:active { top: 20px; }","figure.hover { margin: 20px; }","hover figure { top: 20px; }"],answer:0,expl:"Pseudo-classe :hover + position relative."},
 {id:"w22",type:"mcq",q:"Faire coller le contenu à la fenêtre (pas de bandeau autour) :",choices:["body { margin: 0; }","html { border: 0; }","body { padding: auto; }","* { width: 100%; }"],answer:0,expl:"Le body a une marge par défaut."},
 {id:"w23",type:"mcq",q:"Un élément inline (a, span, img)…",choices:["prend toute la largeur","s'insère dans le texte sans passer à la ligne","est caché","est toujours positionné"],answer:1,expl:"block passe à la ligne, inline reste dans le texte."},
 {id:"w24",type:"mcq",q:"Ombre de 3px de couleur noire à 30 % :",choices:["box-shadow: 3px 3px 3px rgba(0,0,0,0.3)","shadow: 3px black","text-shadow: 30%","border-shadow: 3px"],answer:0,expl:"box-shadow : décalage horizontal, vertical, flou, couleur."},
 {id:"w25",type:"mcq",q:"Où place-t-on &lt;link rel=\"stylesheet\" href=\"style.css\"&gt; ?",choices:["dans le body","dans le head","après &lt;/html&gt;","dans le footer"],answer:1,expl:"Dans le head."},
 {id:"w26",type:"mcq",q:"position: absolute se positionne par rapport…",choices:["à la fenêtre toujours","au premier parent positionné (sinon la page)","à sa place normale","au body uniquement"],answer:1,expl:"Il sort du flux et se repère sur le premier ancêtre non static."}
];

/* ===================== Générateurs des autres matières ===================== */
const ri=(a,b)=>a+rnd(b-a+1);
function mat(n,p,lo=-4,hi=5){return Array.from({length:n},()=>Array.from({length:p},()=>ri(lo,hi)))}
function M(a){return `<span class="mx"><span class="mxg" style="grid-template-columns:repeat(${a[0].length},auto)">${a.map(r=>r.map(x=>`<span>${x<0?"−"+(-x):x}</span>`).join("")).join("")}</span></span>`}
const pn=x=>x<0?`(${sg(x)})`:sg(x);
function mul(A,B){return A.map(r=>B[0].map((_,j)=>r.reduce((s,x,k)=>s+x*B[k][j],0)))}
function tr(A){return A[0].map((_,j)=>A.map(r=>r[j]))}
const sg=x=>x<0?"−"+(-x):""+x;
const ENT=[["CLIENT","COMMANDE","passer","IDClient","IDCommande"],["AUTEUR","LIVRE","écrire","Num_Auteur","Num_Livre"],["EQUIPE","JOUEUR","employer","IdEquipe","IdJoueur"],["SERVICE","EMPLOYE","affecter","CodeService","Matricule"],["ETUDIANT","COURS","suivre","NumEtu","CodeCours"],["MEDECIN","CONSULTATION","assurer","Matricule","NoConsult"],["FILM","ACTEUR","jouer","IdFilm","IdActeur"],["CLUB","ADHERENT","inscrire","IdClub","IdAdherent"]];
Object.assign(GEN,{
 matSum(){const n=ri(2,3),p=ri(2,3);const A=mat(n,p),B=mat(n,p);const op=rnd(2);const k=pick([2,3,-1,-2]);
  const R=op?A.map((r,i)=>r.map((x,j)=>x+B[i][j])):A.map(r=>r.map(x=>k*x));
  return {id:"g-msum",type:"matrix",kind:op?"Somme de matrices":"Multiplication par un réel",q:op?`Calcule A + B avec A = ${M(A)} et B = ${M(B)}`:`Calcule ${sg(k)}·A avec A = ${M(A)}`,answer:R,expl:op?"On additionne case par case.":`On multiplie chaque coefficient par ${sg(k)}.`}},
 matProd(){const n=2,p=ri(2,3),q=2;const A=mat(n,p,-3,4),B=mat(p,q,-3,4);const C=mul(A,B);
  const ex=`c<sub>11</sub> = ${A[0].map((x,k)=>`${pn(x)}×${pn(B[k][0])}`).join(" + ")} = ${sg(C[0][0])}. On fait pareil pour chaque case : ligne i de A × colonne j de B.`;
  return {id:"g-mprod",type:"matrix",kind:"Produit de matrices",q:`Calcule A × B avec A = ${M(A)} et B = ${M(B)}`,answer:C,fk:[A,B],expl:`(2, ${p}) × (${p}, 2) = (2, 2). ${ex}<div class="mod fk-mini" data-fk></div>`}},
 matType(){const n=ri(1,4),p=ri(1,4),q=ri(1,4);const ok=rnd(3)>0;const p2=ok?p:(p%4)+1;
  const ans=ok?`(${n}, ${q})`:"impossible";const ch=shuffle([...new Set([ans,`(${p}, ${q})`,`(${n}, ${p2})`,`(${q}, ${n})`,"impossible"])]).slice(0,4);if(!ch.includes(ans))ch[0]=ans;
  return {id:"g-mtype",type:"mcq",kind:"Type d'un produit",q:`A est de type (${n}, ${p}) et B de type (${p2}, ${q}). Type de A × B ?`,choices:ch,answer:ch.indexOf(ans),expl:ok?`Colonnes de A = lignes de B = ${p}, donc (${n}, ${q}).`:`Il faudrait colonnes de A (${p}) = lignes de B (${p2}) : produit impossible.`}},
 matTrans(){const A=mat(2,3);return {id:"g-mtr",type:"matrix",kind:"Transposée",q:`Donne la transposée <sup>t</sup>A de A = ${M(A)}`,answer:tr(A),expl:"La ligne i de A devient la colonne i de <sup>t</sup>A : type (2, 3) → (3, 2)."}},
 matPow(){const A=mat(2,2,-2,3);return {id:"g-mpow",type:"matrix",kind:"Puissance",q:`Calcule A² avec A = ${M(A)}`,answer:mul(A,A),fk:[A,A],expl:`A² = A × A : on fait un produit ligne × colonne, pas le carré de chaque coefficient. Le schéma en croix ci-dessous montre chaque case.<div class="mod fk-mini" data-fk></div>`}},
 matInv(){let a,b,c,d;do{a=ri(1,5);b=ri(-3,4);c=ri(-3,4);d=ri(1,5)}while(a*d-b*c!==1);const real=rnd(2)===0;
  const N=real?[[d,-b],[-c,a]]:[[d,-b+ri(1,2)],[-c,a]];const P=mul([[a,b],[c,d]],N);const ok=P[0][0]===1&&P[0][1]===0&&P[1][0]===0&&P[1][1]===1;
  return {id:"g-minv",type:"mcq",kind:"Matrice inverse",q:`N est-elle l'inverse de M ? M = ${M([[a,b],[c,d]])}, N = ${M(N)}`,choices:["Oui","Non"],answer:ok?0:1,fk:[[[a,b],[c,d]],N],expl:`M × N = ${M(P)} ${ok?"= I<sub>2</sub>, donc N = M<sup>−1</sup>.":"≠ I<sub>2</sub>, donc N n'est pas l'inverse."}<div class="mod fk-mini" data-fk></div>`}},
 system(){const n=rnd(2)?2:3;let A,sol;do{A=mat(n,n,-3,4);A[0][0]=pick([1,1,2,-1])}while(Math.abs(det(A))<1);sol=Array.from({length:n},()=>ri(-3,4));
  const B=A.map(r=>r.reduce((s,x,k)=>s+x*sol[k],0));const V=["x","y","z"];
  const eq=A.map((r,i)=>r.map((x,k)=>termS(x,V[k],k===0)).join(" ")+" = "+sg(B[i]));
  return {id:"g-sys",type:"input",kind:"Méthode du pivot",q:`Résous le système :<div class="sys">${eq.map((e,i)=>`<div>${e}<span class="hint"> L${i+1}</span></div>`).join("")}</div>Réponds sous la forme (${V.slice(0,n).join(", ")}).`,answers:["("+sol.join(",")+")",sol.join(",")],expl:`Échelonne avec L<sub>i</sub> ← a·L<sub>i</sub> − b·L<sub>1</sub>, puis remonte. Solution unique : (${sol.join(", ")}). Vérifie dans L1 : ${A[0].map((x,k)=>sg(x)+"×"+sg(sol[k])).join(" + ")} = ${sg(B[0])}.`}},
 echelon(){const vars=["x","y","z","t"];const pat=pick([[0,1,2],[0,2],[0,1,3],[0,2,3],[0,1],[0,3]]);
  const lines=pat.map((st,i)=>{let s=[];for(let k=st;k<4;k++){const c=k===st?ri(1,4):ri(-3,4);if(c)s.push(termS(c,vars[k],s.length===0))}return s.join(" ")+" = "+ri(-5,6)});
  const free=vars.filter((_,k)=>!pat.includes(k));const ans=free.join(", ");const opts=shuffle([...new Set([ans,pat.map(k=>vars[k]).join(", "),"aucune",vars.filter(v=>v!==free[0]).slice(0,2).join(", ")])]).slice(0,4);if(!opts.includes(ans))opts[0]=ans;
  return {id:"g-ech",type:"mcq",kind:"Inconnues principales et secondaires",q:`Système échelonné :<div class="sys">${lines.map(l=>`<div>${l}</div>`).join("")}</div>Quelles sont les inconnues <b>secondaires</b> (libres) ?`,choices:opts,answer:opts.indexOf(ans),expl:`Principales (en tête de ligne) : ${pat.map(k=>vars[k]).join(", ")}. Secondaires : ${ans}. Il y a donc une infinité de solutions à ${free.length} paramètre${free.length>1?"s":""}.`}},
 sysNature(){const t=rnd(3);const b=ri(1,6);const rows=[`x + ${ri(1,3)}y − z = ${ri(-3,4)}`,`${ri(1,3)}y + ${ri(1,4)}z = ${ri(-3,5)}`,t===0?`0 = ${b}`:t===1?`0 = 0`:`${ri(2,5)}z = ${ri(-6,7)}`];
  const ans=t===0?2:t===1?1:0;return {id:"g-snat",type:"mcq",kind:"Lire un système échelonné",q:`Après échelonnement d'un système à 3 inconnues :<div class="sys">${rows.map(r=>`<div>${r}</div>`).join("")}</div>Combien de solutions ?`,choices:["Une seule","Une infinité (1 paramètre)","Aucune"],answer:ans,expl:t===0?"0 = b avec b ≠ 0 : système incompatible, S = ∅.":t===1?"On supprime 0 = 0 : 2 pivots pour 3 inconnues, z est libre.":"3 pivots pour 3 inconnues : solution unique."}},
 matchMaths(){return mkMatch(pick([MATCH.maths1,MATCH.maths2]),"Associer (matrices et systèmes)")},
 assoc(){const [E1,E2,verb,id1,id2]=pick(ENT);const t=rnd(3);let c1,c2;
  if(t===0){c1=pick(["0,n","1,n"]);c2=pick(["1,1","0,1"])}else if(t===1){c1=pick(["0,n","1,n"]);c2=pick(["0,n","1,n"])}else{c1="1,1";c2=pick(["1,1","0,1"])}
  const ans=t===0?"1:n":t===1?"n:n":"1:1";
  return {id:"g-assoc",type:"mcq",kind:"Type d'association",mcd:[E1,E2,verb[0].toUpperCase()+verb.slice(1),c1,c2,"",id1,id2],q:`Quel est le type de l'association « ${verb} » entre ${E1} et ${E2} ?`,choices:["1:1","1:n","n:n"],answer:["1:1","1:n","n:n"].indexOf(ans),expl:typeExpl(E1,E2,c1,c2)}},
 mldFK(){const [E1,E2,verb,id1,id2]=pick(ENT);const t=rnd(2);const c1=pick(["0,n","1,n"]);const c2=t?pick(["1,1","0,1"]):pick(["0,n","1,n"]);
  const opts=[`${E2} reçoit #${id1}`,`${E1} reçoit #${id2}`,`nouvelle table ${verb.toUpperCase()} (#${id1}, #${id2})`,"aucune clé étrangère"];
  const ans=t?0:2;return {id:"g-mld",type:"mcq",kind:"Passage au MLD",mcd:[E1,E2,verb[0].toUpperCase()+verb.slice(1),c1,c2,"",id1,id2],q:`D'après ce MCD, comment se traduit l'association « ${verb} » dans le schéma relationnel ?`,choices:opts,answer:ans,expl:mldExpl(E1,E2,verb,id1,id2,c1,c2,t)}},
 matchBDD(){return mkMatch(pick([MATCH.bdd1,MATCH.bdd2]),"Associer (bases de données)")},
 cssMargin(){const v=Array.from({length:ri(1,4)},()=>pick([0,5,10,15,20,25,30,40]));const sides=["haut","droite","bas","gauche"];
  const full=v.length===1?[v[0],v[0],v[0],v[0]]:v.length===2?[v[0],v[1],v[0],v[1]]:v.length===3?[v[0],v[1],v[2],v[1]]:v;const s=rnd(4);
  return {id:"g-margin",type:"input",kind:"Raccourci margin",q:`<span class='f'>margin: ${v.map(x=>x?x+"px":"0").join(" ")};</span> Combien vaut la marge <b>${sides[s]}</b> (en px) ?`,answers:[String(full[s])],expl:`Avec ${v.length} valeur${v.length>1?"s":""} : haut ${full[0]}, droite ${full[1]}, bas ${full[2]}, gauche ${full[3]}. Ordre : haut, droite, bas, gauche ; s'il manque des valeurs, gauche = droite et bas = haut.`}},
 cssBox(){const w=pick([100,150,200,250,300]),p=pick([5,10,15,20]),b=pick([1,2,3,5]),m=pick([0,10,20]);
  return {id:"g-box",type:"input",kind:"Modèle de boîte",q:`<span class='f'>width: ${w}px; padding: ${p}px; border: ${b}px solid; margin: ${m}px;</span> Largeur totale visible de la boîte (bordures comprises, sans les marges) ?`,answers:[String(w+2*p+2*b)],expl:`width + 2 × padding + 2 × border = ${w} + ${2*p} + ${2*b} = ${w+2*p+2*b}px (les marges ajoutent ${2*m}px d'espace autour, en dehors de la boîte).`}},
 cssBuild(){const [goal,target]=pick(CSSRULES);return {id:"g-cssb",type:"build",exact:true,kind:"Écrire une règle CSS",q:`Construis la règle CSS : ${goal}`,target,tiles:shuffle(target.split(" ").concat(shuffle(["margin","color","#","auto","0","block","inline-block","20px","none"]).slice(0,3))),expl:`Règle attendue : <span class='f'>${target}</span>`}},
 matchWeb(){return mkMatch(pick([MATCH.css1,MATCH.css2,MATCH.html1]),"Associer (HTML / CSS)")}
});
function det(A){return A.length===2?A[0][0]*A[1][1]-A[0][1]*A[1][0]:A[0][0]*(A[1][1]*A[2][2]-A[1][2]*A[2][1])-A[0][1]*(A[1][0]*A[2][2]-A[1][2]*A[2][0])+A[0][2]*(A[1][0]*A[2][1]-A[1][1]*A[2][0])}
function termS(c,v,first){if(c===0)return "";const a=Math.abs(c);const co=a===1?"":a;return first?(c<0?"−":"")+co+v:(c<0?"− ":"+ ")+co+v}
const CSSRULES=[["les titres h2 en bleu","h2 { color : blue ; }"],["cacher les éléments de classe menu",".menu { display : none ; }"],["centrer la section (marges automatiques à gauche et à droite)","section { margin : 0 auto ; }"],["fixer l'entête en haut de la fenêtre","header { position : fixed ; top : 0 ; }"],["l'élément d'id eau en bleu","#eau { color : blue ; }"],["au survol des liens, les souligner","a:hover { text-decoration : underline ; }"],["les paragraphes des sections en vert","section p { color : green ; }"],["supprimer la marge du body","body { margin : 0 ; }"]];
Object.assign(MATCH,{
 maths1:[["(2, 3) × (3, 4)","(2, 4)"],["<sup>t</sup>(AB)","<sup>t</sup>B <sup>t</sup>A"],["(AB)<sup>−1</sup>","B<sup>−1</sup>A<sup>−1</sup>"],["A<sup>0</sup>","I<sub>n</sub>"],["A symétrique","A = <sup>t</sup>A"],["A inversible","AB = I<sub>n</sub> pour une B"]],
 maths2:[["0 = 5 après échelonnement","aucune solution"],["autant de pivots que d'inconnues","solution unique"],["moins de pivots que d'inconnues","infinité de solutions"],["0 = 0","ligne à supprimer"],["inconnue sans pivot","variable libre (paramètre)"],["seconds membres tous nuls","système homogène"]],
 bdd1:[["Entité","devient une table"],["Identifiant","devient la clé primaire"],["Association 1:n","#clé étrangère côté 1"],["Association n:n","nouvelle table"],["Propriété d'association","attribut de la table d'association"],["Réflexive","clé étrangère renommée (#matricule_chef)"]],
 bdd2:[["MCD","modèle conceptuel (entités, associations)"],["MLD","schéma relationnel (tables, clés)"],["DF","A → B : A détermine B"],["GDF","graphe des dépendances fonctionnelles"],["CIR","une clé étrangère référence une clé existante"],["Cardinalité","(mini, maxi) de participation"]],
 css1:[["margin","marge extérieure"],["padding","marge intérieure"],["border-radius","coins arrondis"],["z-index","ordre de superposition"],["display: none","cacher l'élément"],["line-height","hauteur de ligne"]],
 css2:[["position: relative","décalé par rapport à sa place normale"],["position: absolute","sort du flux, repère le parent positionné"],["position: fixed","fixé à la fenêtre au défilement"],["position: static","flux normal (défaut)"],["display: inline-block","côte à côte avec une largeur"],["float: left","flottant à gauche"]],
 html1:[["&lt;nav&gt;","menu de navigation"],["&lt;figcaption&gt;","légende d'une figure"],["colspan","fusion de colonnes"],["rowspan","fusion de lignes"],["target=\"_blank\"","nouvel onglet"],["&lt;dl&gt;","liste de définitions"]]
});

function typeExpl(E1,E2,c1,c2){const m1=c1.split(",")[1],m2=c2.split(",")[1];const t=m1==="n"&&m2==="n"?"n:n":m1==="1"&&m2==="1"?"1:1":"1:n";
  return `<b>Méthode :</b> dans chaque couple (min, max), seul le <b>2ᵉ nombre, le maximum</b>, compte pour le type.<br>• Côté ${E1} : (${c1}) → maximum <b>${m1}</b>.<br>• Côté ${E2} : (${c2}) → maximum <b>${m2}</b>.<br>Les deux maximums sont <b>${m1}</b> et <b>${m2}</b> → association <b>${t}</b>. ${t==="n:n"?"Concrètement : plusieurs "+E1+" peuvent être liés à plusieurs "+E2+" (et inversement), donc une seule clé étrangère d'un côté ne suffit pas : il faudra une nouvelle table.":t==="1:n"?"Concrètement : chaque "+(m1==="1"?E1:E2)+" est lié à un seul "+(m1==="1"?E2:E1)+", donc c'est lui qui recevra la clé étrangère.":"Concrètement : chaque occurrence est liée à une seule de l'autre côté."} Le minimum (0 ou 1) dit seulement si le lien est obligatoire.`}
function mldExpl(E1,E2,verb,id1,id2,c1,c2,t){return typeExpl(E1,E2,c1,c2)+"<br><br>"+(t?`<b>Règle 2 (1:n) :</b> la table du côté du maximum 1, ${E2}, reçoit l'identifiant de ${E1} comme clé étrangère : <span class="f">${E2} (<u>${id2}</u>, …, #${id1})</span>. L'association disparaît.`:`<b>Règle 3 (n:n) :</b> nouvelle table <span class="f">${verb.toUpperCase()} (<u>#${id1}, #${id2}</u>)</span>, dont la clé primaire est faite des deux clés étrangères.`)}
/* ===================== Type de question « matrice » ===================== */
QT.matrix={howto:"Remplis chaque case de la matrice résultat, puis clique sur Vérifier. (Tab pour passer à la case suivante.)",
 body:q=>`<div class="mxin"><table>${q.answer.map((r,i)=>`<tr>${r.map((_,j)=>`<td><input inputmode="numeric" data-i="${i}" data-j="${j}" aria-label="ligne ${i+1} colonne ${j+1}"></td>`).join("")}</tr>`).join("")}</table></div>`,
 init(el,q,ready){const ins=[...el.querySelectorAll(".mxin input")];ins.forEach(i=>i.oninput=()=>ready(ins.every(x=>x.value.trim()!=="")));ins[0]&&ins[0].focus();
  return ()=>q.answer.map((r,i)=>r.map((_,j)=>el.querySelector(`.mxin input[data-i="${i}"][data-j="${j}"]`).value.trim().replace("−","-")))},
 grade:(q,v)=>q.answer.every((r,i)=>r.every((x,j)=>Number(v[i][j])===x)),
 lock(el,q,v){el.querySelectorAll(".mxin input").forEach(inp=>{inp.disabled=true;const x=q.answer[+inp.dataset.i][+inp.dataset.j];inp.classList.add(Number(inp.value.replace("−","-"))===x?"ok":"ko");if(Number(inp.value.replace("−","-"))!==x)inp.title="Attendu : "+x})},
 good:q=>`Bonne réponse : ${M(q.answer)}`};
/* build exact (règle CSS) */
{const g=QT.build.grade;QT.build.grade=(q,v)=>q.exact?v.replace(/\s+/g," ").trim()===q.target:g(q,v)}


/* ===================== R1.01 : banque, paires, générateurs ===================== */
BANK.algo=[{"id":"a1","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Laquelle de ces propriétés ne fait PAS partie des 5 propriétés de Knuth ?","type":"mcq","choices":["Finitude","Rendement","Rapidité","Définition précise"],"answer":2,"expl":"Les 5 propriétés : finitude, définition précise, entrées, sorties, rendement. La rapidité n'en fait pas partie."},{"id":"a2","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Dans quel type d'analyse l'ordonnancement est-il obligatoire ?","type":"mcq","choices":["Analyse guidée par le résultat","Analyse guidée par les données","Les deux","Aucune"],"answer":0,"expl":"Par le résultat, on décompose dans l'ordre inverse de l'exécution : il faut indiquer l'ordre d'exécution."},{"id":"a3","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Quelles instructions modifient le contenu d'une variable ?","type":"mcq","choices":["lire et ecrire","lire et ←","ecrire et ←","Seulement ←"],"answer":1,"expl":"lire et l'affectation modifient la variable. ecrire l'affiche sans la changer."},{"id":"a4","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Après <span class='f'>a ← 3 ; b ← a ; a ← 5</span>, que vaut b ?","type":"input","answers":["3"],"expl":"b a pris la valeur de a au moment de l'affectation (3). Changer a ensuite ne change pas b."},{"id":"a5","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Quel identifiant de variable est accepté ?","type":"mcq","choices":["prix conso","prix_conso","prixé","2-prix"],"answer":1,"expl":"Lettres, chiffres et _, sans espace ni accent."},{"id":"a6","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Peut-on écrire <span class='f'>cas nom parmi</span> avec <span class='f'>nom (chaine)</span> ?","type":"mcq","choices":["Oui","Non, la variable doit être scalaire","Oui si on ajoute autres","Seulement avec des intervalles"],"answer":1,"expl":"cas … parmi exige un type scalaire : entier, caractère, booléen, énuméré."},{"id":"a7","ch":1,"kind":"Chapitre 1 · Du problème au programme","noInterp":true,"q":"Avec <span class='f'>a = 5</span>, quelle branche s'exécute ? <span class='f'>cas a parmi | 2 : … | 3, 4 : … | 6..20 : … | autres : … fcas</span>","type":"mcq","choices":["| 2","| 3, 4","| 6..20","| autres"],"answer":3,"expl":"5 n'est ni 2, ni 3 ou 4, ni dans 6..20 : c'est la branche autres."},{"id":"a8","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Combien vaut <span class='f'>23 div 4</span> ?","type":"input","answers":["5"],"expl":"div donne le quotient entier : 23 = 4 × 5 + 3."},{"id":"a9","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Combien vaut <span class='f'>23 mod 4</span> ?","type":"input","answers":["3"],"expl":"mod donne le reste : 23 = 4 × 5 + 3."},{"id":"a10","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Quel est le type de <span class='f'>7 / 2</span> ?","type":"mcq","choices":["entier (3)","réel (3,5)","booléen","Erreur"],"answer":1,"expl":"/ est la division réelle, même entre deux entiers. Pour le quotient entier, c'est div."},{"id":"a11","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Comment tester qu'un entier n est pair ?","type":"mcq","choices":["n div 2 = 0","n mod 2 = 0","n / 2 = 0","n mod 2 = 1"],"answer":1,"expl":"n est pair si le reste de sa division par 2 est nul."},{"id":"a12","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"<span class='f'>non (a et b)</span> est équivalent à :","type":"mcq","choices":["non a et non b","non a ou non b","a ou b","non a ou b"],"answer":1,"expl":"De Morgan : le non transforme et en ou, et nie chaque terme."},{"id":"a13","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"La négation de <span class='f'>(x &gt; 0) ou (y = 5)</span> est :","type":"mcq","choices":["(x &lt; 0) et (y ≠ 5)","(x ≤ 0) et (y ≠ 5)","(x ≤ 0) ou (y ≠ 5)","(x &lt; 0) ou (y ≠ 5)"],"answer":1,"expl":"De Morgan : ou devient et. Et la négation de x > 0 est x ≤ 0, pas x < 0."},{"id":"a14","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Que vaut <span class='f'>longueur(\"il fait beau!\")</span> ?","type":"input","answers":["13"],"expl":"Les espaces et le point d'exclamation comptent : 13 caractères."},{"id":"a15","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Avec <span class='f'>ch ← \"Titi\"</span>, que vaut <span class='f'>ch[1]</span> ?","type":"mcq","choices":["'i'","'T'","\"Ti\"","Erreur"],"answer":1,"expl":"Les caractères d'une chaîne sont numérotés à partir de 1."},{"id":"a16","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"<span class='f'>'a'</span> et <span class='f'>\"a\"</span> sont…","type":"mcq","choices":["la même valeur","un caractère et une chaîne","deux chaînes","deux caractères"],"answer":1,"expl":"Simples guillemets : caractère. Doubles guillemets : chaîne."},{"id":"a17","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Quel type n'est PAS scalaire ?","type":"mcq","choices":["entier","caractère","réel","booléen"],"answer":2,"expl":"Le réel n'est pas discret : entre deux réels, il y en a une infinité. Même chose pour la chaîne."},{"id":"a18","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Que vaut <span class='f'>succ('B')</span> ?","type":"mcq","choices":["'A'","'C'","66","\"BC\""],"answer":1,"expl":"succ donne la valeur suivante dans l'ordre du type."},{"id":"a19","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"<span class='f'>\"AABC\" &gt; \"AABBZ\"</span> est…","type":"mcq","choices":["vrai","faux"],"answer":0,"expl":"Ordre du dictionnaire : on compare caractère par caractère. Au 4e, 'C' > 'B'. La longueur ne compte pas."},{"id":"a20","ch":2,"kind":"Chapitre 2 · Types simples et opérations","noInterp":true,"q":"Que range <span class='f'>ancien ← nbannees &gt; 3</span> si nbannees = 3 ?","type":"mcq","choices":["vrai","faux","3","Erreur de type"],"answer":1,"expl":"3 > 3 est faux. On peut affecter directement le résultat d'une comparaison à un booléen."},{"id":"a21","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Que vaut s après <span class='f'>s ← 0 ; pour i ← 1 à 4 faire s ← s + i fpour</span> ?","type":"input","answers":["10"],"expl":"0 + 1 + 2 + 3 + 4 = 10."},{"id":"a22","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Combien de tours fait <span class='f'>pour i ← 5 à 2 faire … fpour</span> (pas +1) ?","type":"input","answers":["0"],"expl":"La borne de départ dépasse déjà la borne d'arrivée : 0 tour. Pour descendre, il faut [pas -1]."},{"id":"a23","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Avec <span class='f'>i ← 1 ; tq i ≤ 10 faire i ← i + 3 ftq</span>, combien de tours ?","type":"input","answers":["4"],"expl":"i vaut 1, 4, 7, 10 au début des tours : 4 tours. À la fin, i = 13."},{"id":"a24","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Quelle boucle exécute toujours son corps au moins une fois ?","type":"mcq","choices":["pour","tq","repeter … jqa","Aucune"],"answer":2,"expl":"repeter teste la condition d'arrêt après le corps."},{"id":"a25","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Pour une saisie contrôlée (redemander tant que c'est faux), on prend plutôt :","type":"mcq","choices":["pour","repeter … jqa","cas parmi","si"],"answer":1,"expl":"On doit saisir au moins une fois, puis redemander si la valeur est invalide."},{"id":"a26","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Où initialiser une variable récurrente comme <span class='f'>somme</span> ?","type":"mcq","choices":["Dans la boucle","Avant la boucle","Après la boucle","Dans le Lexique"],"answer":1,"expl":"Elle doit avoir sa valeur de départ avant le premier tour (somme ← 0, produit ← 1)."},{"id":"a27","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Un paramètre en mode <span class='f'>↓</span> (entrée)…","type":"mcq","choices":["peut être modifié","est seulement consulté","sert à renvoyer un résultat","n'a pas besoin de valeur à l'appel"],"answer":1,"expl":"Entrée : accès en consultation, pas d'affectation."},{"id":"a28","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Quel mode pour un paramètre qu'un module doit lire PUIS modifier (ex. Echange) ?","type":"mcq","choices":["↓","↑","↕","Aucun"],"answer":2,"expl":"↕ (ou ↓↑) : entrée/sortie, consultable et modifiable."},{"id":"a29","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Les paramètres effectifs (à l'appel) sont séparés par…","type":"mcq","choices":["des ;","des ,","des :","des espaces"],"answer":1,"expl":"Formels séparés par ; avec mode et type. Effectifs séparés par , sans mode ni type."},{"id":"a30","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Laquelle est vraie pour une fonction ?","type":"mcq","choices":["Son appel est une instruction","Elle peut avoir des paramètres ↑","Elle renvoie un seul résultat","Son nom peut servir de variable récurrente"],"answer":2,"expl":"Une fonction calcule un seul résultat, tous ses paramètres sont d'entrée, et son appel est une valeur, pas une instruction."},{"id":"a31","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Comment une fonction renvoie-t-elle son résultat ?","type":"mcq","choices":["ecrire(res)","Nom ← res","Nom ⇐ res","retourner res"],"answer":2,"expl":"Dans le cours : Nom_fonction ⇐ résultat."},{"id":"a32","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Lequel est un appel de module correct ?","type":"mcq","choices":["x ← Calculsomme(a, b, s)","Calculsomme(a, b, s)","ecrire(Calculsomme(a, b, s))","si Calculsomme(a, b, s) alors"],"answer":1,"expl":"Un appel de module est une instruction à part entière."},{"id":"a33","ch":3,"kind":"Chapitre 3 · Itérations, modules, fonctions","noInterp":true,"q":"Dans Syracuse, à partir de 6, que donne une transformation (n/2 si pair, 3n+1 sinon) ? Puis la suivante ? Réponds « a b ».","type":"input","answers":["3 10","3,10"],"expl":"6 est pair → 3. 3 est impair → 10."},{"id":"a34","ch":4,"kind":"Chapitre 4 · Tables à une dimension","noInterp":true,"q":"<span class='f'>T_Tab (type) = table [1..150] réel</span>. Que vaut la taille physique ?","type":"input","answers":["150"],"expl":"Taille physique = nombre de cases réservées. Le nombre de valeurs effectives peut être plus petit."},{"id":"a35","ch":4,"kind":"Chapitre 4 · Tables à une dimension","noInterp":true,"q":"La table a 150 cases, 45 sont remplies. Que dire de <span class='f'>Tab[100]</span> ?","type":"mcq","choices":["Inaccessible","Indéterminée","Vaut 0","Erreur de type"],"answer":1,"expl":"100 est dans [1..150] mais hors des cases remplies : la valeur est indéterminée. Tab[200] serait inaccessible."},{"id":"a36","ch":4,"kind":"Chapitre 4 · Tables à une dimension","noInterp":true,"q":"Pour chercher un nom dans une table, la bonne boucle est :","type":"mcq","choices":["pour i ← 1 à n","tq (i ≤ n) et non trouve","repeter … jqa i = n","cas … parmi"],"answer":1,"expl":"On s'arrête dès qu'on a trouvé ou quand on a tout parcouru."},{"id":"a37","ch":4,"kind":"Chapitre 4 · Tables à une dimension","noInterp":true,"q":"Pour trouver le maximum d'une table de n valeurs, on part de…","type":"mcq","choices":["vmax ← 0","vmax ← Tab[1] puis i de 2 à n","vmax ← Tab[n]","vmax ← n"],"answer":1,"expl":"Partir de 0 est faux si toutes les valeurs sont négatives. On part de la première case."},{"id":"a38","ch":4,"kind":"Chapitre 4 · Tables à une dimension","noInterp":true,"q":"Peut-on écrire <span class='f'>T1 ← T2</span> pour deux tables du même type (hors structure) ?","type":"mcq","choices":["Oui","Non, on copie case par case"],"answer":1,"expl":"En algorithmique, l'affectation d'une table se fait case par case (sauf si la table est un champ d'une structure)."},{"id":"a39","ch":5,"kind":"Chapitre 5 · Tables à plusieurs dimensions","noInterp":true,"q":"Comment désigne-t-on la case ligne 2, colonne 5 de <span class='f'>Tabnotes</span> ?","type":"mcq","choices":["Tabnotes[2][5] seulement","Tabnotes[2, 5]","Tabnotes(2, 5)","Tabnotes.2.5"],"answer":1,"expl":"Autant d'indices que de dimensions, entre crochets : Tabnotes[i, j]."},{"id":"a40","ch":5,"kind":"Chapitre 5 · Tables à plusieurs dimensions","noInterp":true,"q":"Pour afficher la somme de chaque ligne, où remettre <span class='f'>s ← 0</span> ?","type":"mcq","choices":["Avant les deux boucles","Dans la boucle des lignes, avant celle des colonnes","Dans la boucle des colonnes","Après les deux boucles"],"answer":1,"expl":"Une nouvelle somme pour chaque ligne : on la remet à 0 à chaque tour de la boucle extérieure."},{"id":"a41","ch":6,"kind":"Chapitre 6 · Types scalaires et intervalles","noInterp":true,"q":"Avec <span class='f'>T_Jour (type) = (lundi, …, dimanche)</span>, que vaut <span class='f'>mardi &lt; jeudi</span> ?","type":"mcq","choices":["vrai","faux","Erreur : ce ne sont pas des nombres"],"answer":0,"expl":"Les valeurs d'un énuméré sont ordonnées par leur position."},{"id":"a42","ch":6,"kind":"Chapitre 6 · Types scalaires et intervalles","noInterp":true,"q":"Comment s'écrit une valeur d'un type énuméré ?","type":"mcq","choices":["\"lundi\"","'lundi'","lundi","T_Jour.lundi"],"answer":2,"expl":"Ce sont des symboles, sans guillemets."},{"id":"a43","ch":6,"kind":"Chapitre 6 · Types scalaires et intervalles","noInterp":true,"q":"<span class='f'>T_We (type) = samedi..dimanche</span> est…","type":"mcq","choices":["une table","un intervalle de T_Jour","une structure","une chaîne"],"answer":1,"expl":"Un intervalle est un sous-ensemble borné d'un type scalaire. Il hérite de ses opérations."},{"id":"a44","ch":6,"kind":"Chapitre 6 · Types scalaires et intervalles","noInterp":true,"q":"Que vaut <span class='f'>succ(vendredi)</span> ?","type":"mcq","choices":["jeudi","samedi","dimanche","Erreur"],"answer":1,"expl":"succ donne la valeur suivante dans l'énumération."},{"id":"a45","ch":7,"kind":"Chapitre 7 · Structures et construction d'un type","noInterp":true,"q":"Comment lire le nom du 3e étudiant de <span class='f'>Promo</span> (table de T_Etudiant) ?","type":"mcq","choices":["Promo.nom[3]","Promo[3].nom","nom(Promo[3])","Promo[3, nom]"],"answer":1,"expl":"On prend la case 3 de la table, puis le champ nom avec la notation pointée."},{"id":"a46","ch":7,"kind":"Chapitre 7 · Structures et construction d'un type","noInterp":true,"q":"Quand utiliser une structure plutôt qu'une table ?","type":"mcq","choices":["Pour des valeurs du même type","Pour des informations de types différents","Pour des valeurs ordonnées","Jamais"],"answer":1,"expl":"Table : même type. Structure : types différents (nom, prénom, notes…)."},{"id":"a47","ch":8,"kind":"Chapitre 8 · Portée et visibilité","noInterp":true,"q":"Une variable déclarée dans le Lexique d'un module est…","type":"mcq","choices":["globale","locale à ce module (et ses sous-modules)","visible partout","un paramètre"],"answer":1,"expl":"Elle a pour portée le module où elle est déclarée et ses sous-modules."},{"id":"a48","ch":8,"kind":"Chapitre 8 · Portée et visibilité","noInterp":true,"q":"Le principal déclare i, un module M1 déclare aussi i. Dans M1, i désigne…","type":"mcq","choices":["la globale","la locale de M1","les deux","rien, c'est une erreur"],"answer":1,"expl":"La locale masque la globale : la globale n'est pas visible dans M1."},{"id":"a49","ch":8,"kind":"Chapitre 8 · Portée et visibilité","noInterp":true,"q":"Un paramètre formel a le statut…","type":"mcq","choices":["d'une variable globale","d'une variable locale","d'une constante","d'un type"],"answer":1,"expl":"Les paramètres formels ont le même statut que les variables locales du module."}];
Object.assign(MATCH,{
 algo1:[["↓ devant un paramètre","entrée : lu seulement"],["↑ devant un paramètre","sortie : rempli par le module"],["↕ devant un paramètre","entrée et sortie"],["Nom ⇐ valeur","résultat d'une fonction"],["repeter … jqa","au moins un tour"],["tq … ftq","zéro tour possible"],["pour … fpour","nombre de tours connu"]],
 algo2:[["17 div 5","3"],["17 mod 5","2"],["17 / 5","3,4"],["'a'","un caractère"],["\"a\"","une chaîne"],["succ(lundi)","mardi"],["Promo[i].nom","champ d'une structure rangée dans une table"]]
});
const AKW=/(^|[\s(|\[,])(algo|module|fonction|Ord|Lexique|si|alors|sinonsi|sinon|fsi|pour|à|faire|fpour|tq|ftq|repeter|jqa|cas|parmi|autres|fcas|et|ou|non|div|mod|vrai|faux|lire|ecrire|structure|table|type|cste)(?=$|[\s:),(\]/=])/gm;
function hlAlgo(c){return c.split(/("[^"\n]*")/).map((p,i)=>i%2?'<span class="st">'+esc(p)+"</span>":esc(p).replace(AKW,'$1<span class="kw">$2</span>')).join("")}
// Rendu « propre » d'un algorithme en notation du cours (Ord / Lexique, |, fsi, fpour…)
// Ce fichier est utilisé tel quel côté Node (build) ET injecté dans la page (générateurs).
function renderAlgo(src, opt) {
  opt = opt || {};
  var E = function (s) { return String(s).replace(/[&<>"]/g, function (c) { return { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;" }[c]; }); };
  var KWR = /(^|[\s(\[,])(algo|module|fonction|Ord|Lexique|si|alors|sinonsi|sinon|fsi|pour|à|faire|fpour|tq|ftq|repeter|jqa|cas|parmi|autres|fcas|et|ou|non|div|mod|vrai|faux|lire|ecrire|structure|table|type|cste|pas|retourner)(?=$|[\s:),(\]\/=;])/g;
  function code(t) {
    return t.split(/("[^"\n]*"|'[^'\n]')/).map(function (p, i) {
      if (i % 2) return '<span class="a-st">' + E(p) + "</span>";
      return E(p)
        .replace(KWR, '$1<span class="a-kw">$2</span>')
        .replace(/(←|⇐)/g, '<span class="a-op">$1</span>')
        .replace(/(↓|↑|↕)/g, '<span class="a-md">$1</span>')
        .replace(/(\(\*[\s\S]*?\*\)|\/\/.*$)/g, '<span class="a-cm">$1</span>');
    }).join("");
  }
  var lines = String(src).replace(/\t/g, "  ").replace(/\s+$/, "").split("\n");
  // découpe en unités : en-tête (algo/module/fonction), Ord, Lexique, note
  var units = [], u = null;
  function newUnit(head) { u = { head: head, ord: [], lex: [], note: [], mode: head ? "pre" : "ord" }; units.push(u); }
  lines.forEach(function (raw) {
    var t = raw.trim();
    if (/^(algo|module|fonction)\b/.test(t) && !/^\s/.test(raw)) { newUnit(t); return; }
    if (!u) newUnit(null);
    if (/^Ord\b/.test(t) && t.length <= 4) { u.mode = "ord"; return; }
    if (/^Lexique\b/.test(t)) { u.mode = "lex"; var rest = t.replace(/^Lexique\s*:?\s*/, ""); if (rest) u.lex.push(rest); return; }
    if (u.mode === "pre") u.mode = "ord";
    if (u.mode === "lex") { if (!t) { u.mode = "note"; return; } u.lex.push(t); return; }
    if (u.mode === "note") { if (t) u.note.push(t); return; }
    u.ord.push(raw);
  });
  function body(rows) {
    // retire les lignes vides de début/fin, calcule l'indentation de base
    while (rows.length && !rows[0].trim()) rows.shift();
    while (rows.length && !rows[rows.length - 1].trim()) rows.pop();
    var base = Infinity;
    rows.forEach(function (r) { if (r.trim()) base = Math.min(base, r.match(/^ */)[0].length); });
    if (base === Infinity) base = 0;
    var out = [], casDepth = [];
    rows.forEach(function (r) {
      if (!r.trim()) { out.push('<div class="a-ln a-gap"></div>'); return; }
      var s = r.slice(base), sp = s.match(/^ */)[0].length; s = s.slice(sp);
      var d = Math.floor(sp / 2), bars = 0;
      while (/^\|( |$)/.test(s)) { bars++; s = s.slice(1).replace(/^ /, ""); }
      // une indentation « à l'espace » sans barres compte aussi comme un niveau
      d = Math.max(d, 0) + bars;
      var t = s.trim(), lab = "";
      if (casDepth.length && /^fcas\b/.test(t)) casDepth.pop();
      if (casDepth.length && d === casDepth[casDepth.length - 1] + 1) {
        var m = t.match(/^((?:autres|[^:←"]+?))\s*:\s*(.*)$/);
        if (m && !/←/.test(m[1])) { lab = '<span class="a-case">' + code(m[1]) + "</span>"; t = m[2]; }
      }
      var cls = "a-ln";
      if (/^(fsi|fpour|ftq|fcas|jqa|sinon|sinonsi)\b/.test(t)) cls += " a-end";
      out.push('<div class="' + cls + '" style="--d:' + d + '">' + lab + (t ? '<span class="a-c">' + code(t) + "</span>" : "") + "</div>");
      if (/^cas\b.*\bparmi\b/.test(t)) casDepth.push(d);
    });
    return out.join("");
  }
  function lex(rows) {
    return '<table class="a-lex">' + rows.map(function (r) {
      var m = r.match(/^(.+?)\s*\(([^()]*(?:\([^()]*\)[^()]*)*)\)\s*(=\s*[^:]+?)?\s*(?::\s*(.*))?$/);
      if (m && !/^\(/.test(r)) return "<tr><td class=\"a-nm\">" + code(m[1]) + "</td><td class=\"a-ty\">" + code(m[2] + (m[3] ? " " + m[3].trim() : "")) + "</td><td class=\"a-rl\">" + (m[4] ? E(m[4]) : "") + "</td></tr>";
      return '<tr><td colspan="3" class="a-raw">' + code(r) + "</td></tr>";
    }).join("") + "</table>";
  }
  var html = units.map(function (x) {
    var h = "";
    if (x.head) {
      var mh = x.head.match(/^(algo|module|fonction)\s+(.*)$/);
      h = '<div class="a-head"><span class="a-tag">' + mh[1] + '</span><span class="a-sig">' + code(mh[2]) + "</span></div>";
    }
    var hasSec = x.head || x.lex.length;
    var ord = body(x.ord.slice());
    var empty = !x.ord.some(function (r) { return r.trim(); }) && !x.lex.length;
    var parts = empty ? "" : hasSec
      ? '<div class="a-grid' + (x.lex.length ? "" : " a-solo") + '"><div class="a-ord"><div class="a-lbl">Ord</div><div class="a-lines">' + ord + "</div></div>" +
        (x.lex.length ? '<div class="a-lexw"><div class="a-lbl">Lexique</div>' + lex(x.lex) + "</div>" : "") + "</div>"
      : '<div class="a-lines">' + ord + "</div>";
    var note = x.note.length ? '<p class="a-note">' + x.note.map(E).join("<br>") + "</p>" : "";
    return '<div class="a-unit">' + h + parts + note + "</div>";
  }).join("");
  return '<div class="algo' + (opt.small ? " small" : "") + '">' + html + "</div>";
}


function algoPre(c){return renderAlgo(c)}
const MORGAN=[["(x > 0) et (y ≠ 5)","(x ≤ 0) ou (y = 5)",["(x ≤ 0) et (y = 5)","(x < 0) ou (y = 5)","(x ≤ 0) ou (y ≠ 5)"]],
 ["(i ≤ n) et non trouve","(i > n) ou trouve",["(i > n) et trouve","(i ≥ n) ou trouve","(i > n) ou non trouve"]],
 ["(a = 0) ou (b < 3)","(a ≠ 0) et (b ≥ 3)",["(a ≠ 0) ou (b ≥ 3)","(a ≠ 0) et (b > 3)","(a = 0) et (b ≥ 3)"]],
 ["(n ≥ 1) et (n ≤ 12)","(n < 1) ou (n > 12)",["(n < 1) et (n > 12)","(n ≤ 1) ou (n ≥ 12)","(n < 1) ou (n ≤ 12)"]],
 ["(c = 'o') ou (c = 'O')","(c ≠ 'o') et (c ≠ 'O')",["(c ≠ 'o') ou (c ≠ 'O')","(c = 'o') et (c = 'O')","non (c = 'o') ou (c = 'O')"]],
 ["(note ≥ 10) et (absences < 3)","(note < 10) ou (absences ≥ 3)",["(note < 10) et (absences ≥ 3)","(note ≤ 10) ou (absences > 3)","(note < 10) ou (absences > 3)"]]];
Object.assign(GEN,{
 algoDivMod(){const a=ri(7,60),b=ri(2,9),t=rnd(2),q=Math.floor(a/b),r=a%b;
  return {id:"g-adm",type:"input",noInterp:true,kind:"div et mod",q:`a ← ${a} ; b ← ${b}. Que vaut <span class='f'>a ${t?"mod":"div"} b</span> ?`,answers:[String(t?r:q)],expl:`${a} = ${b} × ${q} + ${r}. <b>div</b> donne le quotient entier (${q}), <b>mod</b> le reste (${r}).`}},
 algoCas(){const T=[["entier",1],["caractère",1],["booléen",1],["T_Jour (énuméré)",1],["réel",0],["chaine",0]];const [t,ok]=pick(T);
  return {id:"g-acas",type:"mcq",noInterp:true,kind:"cas … parmi",q:`La variable x est de type <b>${t}</b>. Peut-on écrire <span class='f'>cas x parmi</span> ?`,choices:["Oui","Non"],answer:ok?0:1,expl:"La variable d'un cas … parmi doit être <b>scalaire</b> (ordonnée et discrète) : entier, caractère, booléen, énuméré ou intervalle. Un réel ou une chaîne : il faut des si … sinonsi."}},
 algoLoop(){const t=rnd(3);
  if(t===0){const a=ri(0,5),b=a+ri(2,9);return {id:"g-aloop",type:"input",noInterp:true,kind:"Compter les tours",q:`Combien de fois le corps de cette boucle est-il exécuté ?${algoPre(`pour i ← ${a} à ${b} faire\n| ecrire(i)\nfpour`)}`,answers:[String(b-a+1)],expl:`De ${a} à ${b} <b>inclus</b> : ${b} − ${a} + 1 = ${b-a+1} tours.`}}
  if(t===1){const a=ri(6,15),b=ri(1,a-2);return {id:"g-aloop",type:"input",noInterp:true,kind:"Compter les tours",q:`Combien de fois le corps de cette boucle est-il exécuté ?${algoPre(`pour i ← ${a} à ${b} [pas -1] faire\n| ecrire(i)\nfpour`)}`,answers:[String(a-b+1)],expl:`On descend de ${a} à ${b} inclus : ${a} − ${b} + 1 = ${a-b+1} tours.`}}
  const s=ri(0,5),k=pick([2,3,5]),lim=s+k*ri(1,5)+rnd(k);const vals=[];for(let i=s;i<lim;i+=k)vals.push(i);
  return {id:"g-aloop",type:"input",noInterp:true,kind:"Compter les tours",q:`Combien de fois « ecrire(i) » est-il exécuté ?${algoPre(`i ← ${s}\ntq i < ${lim} faire\n| ecrire(i)\n| i ← i + ${k}\nftq`)}`,answers:[String(vals.length)],expl:`i prend les valeurs ${vals.join(", ")||"aucune"}, puis ${s+k*vals.length} qui n'est plus < ${lim} : ${vals.length} tour${vals.length>1?"s":""}.`}},
 algoRepeat(){const s=ri(3,12),lim=ri(3,12),rep=rnd(2);const n=rep?(s>=lim?1:lim-s):Math.max(0,lim-s);
  const code=rep?`i ← ${s}\nrepeter\n| ecrire("ok")\n| i ← i + 1\njqa i ≥ ${lim}`:`i ← ${s}\ntq i < ${lim} faire\n| ecrire("ok")\n| i ← i + 1\nftq`;
  return {id:"g-arep",type:"input",noInterp:true,kind:rep?"repeter … jqa":"tq … ftq",q:`Combien de fois « ok » est-il affiché ?${algoPre(code)}`,answers:[String(n)],expl:rep?(s>=lim?`Avec repeter, le corps passe <b>au moins une fois</b> avant le test : 1 affichage, puis i = ${s+1} ≥ ${lim} arrête.`:`i va de ${s} à ${lim-1} dans la boucle : ${n} affichages. Le test jqa est fait après chaque tour.`):(s>=lim?`${s} < ${lim} est faux dès le premier test : tq peut faire <b>0 tour</b>.`:`i vaut ${s}, …, ${lim-1} pendant la boucle : ${n} affichages.`)}},
 algoSum(){const t=rnd(3);
  if(t===0){const a=ri(1,3),n=ri(4,8);let s=0;const st=[];for(let i=a;i<=n;i++){s+=i;st.push(s)}
   return {id:"g-asum",type:"input",noInterp:true,kind:"Variable récurrente",q:`Que vaut s à la fin ?${algoPre(`s ← 0\npour i ← ${a} à ${n} faire\n| s ← s + i\nfpour`)}`,answers:[String(s)],expl:`s vaut successivement ${st.join(", ")}. La variable récurrente s'initialise <b>avant</b> la boucle.`}}
  if(t===1){const n=ri(3,6);let p=1;const st=[];for(let i=1;i<=n;i++){p*=i;st.push(p)}
   return {id:"g-asum",type:"input",noInterp:true,kind:"Variable récurrente",q:`Que vaut p à la fin ?${algoPre(`p ← 1\npour i ← 1 à ${n} faire\n| p ← p * i\nfpour`)}`,answers:[String(p)],expl:`p vaut successivement ${st.join(", ")} : c'est ${n}!. Pour un produit on initialise à 1, pas à 0.`}}
  const n=ri(10,30),k=pick([2,3,4,5]);const c=Math.floor(n/k);
  return {id:"g-asum",type:"input",noInterp:true,kind:"Compteur",q:`Que vaut c à la fin ?${algoPre(`c ← 0\npour i ← 1 à ${n} faire\n| si i mod ${k} = 0 alors\n| | c ← c + 1\n| fsi\nfpour`)}`,answers:[String(c)],expl:`On compte les multiples de ${k} entre 1 et ${n} : ${Array.from({length:c},(_,j)=>(j+1)*k).join(", ")}, soit ${c}.`}},
 algoTrace(){const a=ri(1,9);let b=ri(1,9);if(b===a)b=a%9+1;
  if(rnd(2))return {id:"g-atr",type:"input",noInterp:true,kind:"Trace",q:`Que valent a et b à la fin ? Réponds sous la forme a, b.${algoPre(`a ← ${a}\nb ← ${b}\na ← a + b\nb ← a - b\na ← a - b`)}`,answers:[`${b},${a}`,`(${b},${a})`],expl:`a = ${a+b}, puis b = ${a+b} − ${b} = ${a}, puis a = ${a+b} − ${a} = ${b}. Les deux valeurs sont échangées sans variable auxiliaire.`};
  return {id:"g-atr",type:"input",noInterp:true,kind:"Trace",q:`Que valent a et b à la fin ? Réponds sous la forme a, b.${algoPre(`a ← ${a}\nb ← ${b}\na ← b\nb ← a`)}`,answers:[`${b},${b}`,`(${b},${b})`],expl:`a ← b met ${b} dans a, et l'ancien ${a} est perdu. Puis b ← a remet ${b}. Pour échanger, il faut une variable auxiliaire : aux ← a ; a ← b ; b ← aux.`}},
 algoBool(){const x=ri(0,9),y=ri(0,9);const c1=ri(1,8),c2=ri(1,8);
  const at=[[`x > ${c1}`,x>c1],[`y ≤ ${c2}`,y<=c2],["x mod 2 = 0",x%2===0],["x ≠ y",x!==y],[`x + y ≥ ${c1+c2}`,x+y>=c1+c2]];
  const [p,q]=shuffle(at).slice(0,2);const op=pick(["et","ou"]);const ng=rnd(3)===0;const pv=ng?!p[1]:p[1];const v=op==="et"?pv&&q[1]:pv||q[1];
  const ex=`${ng?"non ":""}(${p[0]}) ${op} (${q[0]})`;
  return {id:"g-abool",type:"mcq",noInterp:true,kind:"Booléens",q:`Avec x = ${x} et y = ${y}, que vaut <span class='f'>${esc(ex)}</span> ?`,choices:["vrai","faux"],answer:v?0:1,expl:`${esc(p[0])} vaut ${p[1]?"vrai":"faux"}${ng?`, donc non (…) vaut ${pv?"vrai":"faux"}`:""} ; ${esc(q[0])} vaut ${q[1]?"vrai":"faux"}. ${op==="et"?"et : vrai seulement si les deux sont vrais":"ou : vrai dès qu'un des deux est vrai"}, donc <b>${v?"vrai":"faux"}</b>.`}},
 algoMorgan(){const [e,n,d]=pick(MORGAN);const r=q4([n,...d],n);
  return {id:"g-amorg",type:"mcq",noInterp:true,kind:"Négation (De Morgan)",q:`Quelle est la négation de <span class='f'>${esc(e)}</span> ?`,...{choices:r.choices.map(esc),answer:r.answer},expl:`De Morgan : <span class='f'>non (A et B) ⇔ non A ou non B</span>, <span class='f'>non (A ou B) ⇔ non A et non B</span>. Chaque comparaison s'inverse (> devient ≤, = devient ≠). Réponse : <span class='f'>${esc(n)}</span>.`}},
 algoSearch(){const n=ri(5,8);const T=Array.from({length:n},()=>ri(1,20));const found=rnd(3)>0;const x=found?pick(T):ri(21,30);const i=found?T.indexOf(x)+1:n+1;
  return {id:"g-asearch",type:"input",noInterp:true,kind:"Recherche dans une table",q:`T = [${T.join(", ")}], n = ${n}, x = ${x}. Que vaut i à la fin ?${algoPre(`i ← 1\ntrouve ← faux\ntq (i ≤ n) et non trouve faire\n| si T[i] = x alors\n| | trouve ← vrai\n| sinon\n| | i ← i + 1\n| fsi\nftq`)}`,answers:[String(i)],expl:found?`T[${i}] = ${x} est la première case égale à x : trouve passe à vrai et i reste à ${i}. La boucle s'arrête dès qu'on trouve.`:`${x} n'est pas dans T : i avance jusqu'à n + 1 = ${n+1}, et la condition i ≤ n devient fausse.`}},
 matchAlgo(){return mkMatch(pick([MATCH.algo1,MATCH.algo2]),"Associer (algo)")}
});


/* ===================== R1.03 Architecture + R1.06 chapitres 3 et 4 : banques et générateurs ===================== */
function chs(ans,cands){const o=[ans];for(const c of cands){if(o.length>=4)break;if(c!=null&&c!==""&&!o.includes(c))o.push(c)}const s=shuffle(o);return {choices:s,answer:s.indexOf(ans)}}
const SUPC="⁰¹²³⁴⁵⁶⁷⁸⁹";function supN(n){return String(n).replace("-","⁻").replace(/\d/g,d=>SUPC[d])}
function bin8(n,w=8){return (n>>>0).toString(2).padStart(w,"0").slice(-w).replace(/(.{4})(?=.)/g,"$1 ")}
function hx2(n){return n.toString(16).toUpperCase().padStart(2,"0")}
function frn(x){return String(x).replace("-","−").replace(".",",")}
function fmtN(x){return x.toLocaleString("fr-FR").replace(/ /g," ")}
function setStr(a){return "{"+a.join(", ")+"}"}
function hashS(s){let h=0;for(const c of s)h=(h*31+c.charCodeAt(0))>>>0;return h}
/* QCM à choix unique : la bonne réponse est écrite en premier, puis placée à une position fixe qui dépend de l'id */
function AQ(id,part,kind,q,ch,expl){const k=hashS(id)%ch.length;const c=ch.slice(k).concat(ch.slice(0,k));return {id,type:"mcq",noInterp:true,part,kind,q,choices:c,answer:(ch.length-k)%ch.length,expl}}

BANK.archi=[
 AQ("ar-pos1","c","Cours · Bases",`Combien vaut <span class='f'>101011₂</span> en décimal ?`,["43","53","107","41"],`Positions 5, 3, 1 et 0 : 32 + 8 + 2 + 1 = 43. On compte les positions à partir de 0, à droite.`),
 AQ("ar-hex1","c","Cours · Bases",`Combien de bits code un chiffre hexadécimal ?`,["4","8","2","16"],`16 = 2⁴ : un chiffre hexa correspond à 4 bits, donc un octet s'écrit avec 2 chiffres hexa.`),
 AQ("ar-hex2","c","Cours · Bases",`Combien vaut <span class='f'>0xB0A</span> en décimal ?`,["2826","2816","2570","186"],`B0A₁₆ = 11 × 256 + 0 × 16 + 10 = 2 826. Le 0 du milieu compte : il occupe la position des « 16 ».`),
 AQ("ar-oct","c","Cours · Bases",`Combien de valeurs différentes peut-on coder sur 8 bits ?`,["256","255","128","512"],`n bits donnent 2ⁿ combinaisons : 2⁸ = 256 (de 0 à 255 en non signé).`),
 AQ("ar-uns","c","Cours · Bases",`Quelle est la plage d'un entier <b>non signé</b> sur 8 bits ?`,["0 à 255","0 à 256","−128 à 127","1 à 256"],`Non signé sur n bits : 0 à 2ⁿ − 1, soit 0 à 255 sur 8 bits.`),
 AQ("ar-c2r","c","Cours · Complément à deux",`Quelle est la plage d'un entier <b>signé</b> sur 8 bits (complément à deux) ?`,["−128 à 127","−127 à 127","−127 à 128","−256 à 255"],`Plage −2ⁿ⁻¹ à 2ⁿ⁻¹ − 1 : −128 à 127. Il y a un négatif de plus que de positifs, car 0 n'a qu'un codage.`),
 AQ("ar-c2r5","c","Cours · Complément à deux",`Quelle est la plage d'un entier signé sur <b>5 bits</b> (complément à deux) ?`,["−16 à 15","−15 à 15","−32 à 31","0 à 31"],`−2⁴ à 2⁴ − 1 = −16 à 15. 0 à 31 serait la plage non signée.`),
 AQ("ar-neg5","c","Cours · Complément à deux",`Comment s'écrit −5 sur 8 bits en complément à deux ?`,["1111 1011","1000 0101","1111 1010","0000 0101"],`5 = 0000 0101 → on inverse les bits : 1111 1010 → on ajoute 1 : 1111 1011. 1000 0101 est le codage « signe + valeur absolue », pas le complément à deux ; 1111 1010 oublie le +1.`),
 AQ("ar-opp","c","Cours · Complément à deux",`Pour obtenir l'opposé d'un entier en complément à deux, on…`,["inverse tous les bits puis ajoute 1","inverse tous les bits","met le bit de gauche à 1","ajoute 1 puis garde les mêmes bits"],`Méthode du cours : inverser chaque bit puis ajouter 1. Inverser seulement donne le complément à un (il manque 1).`),
 AQ("ar-ff","c","Cours · Complément à deux",`Lu comme un entier <b>signé</b> sur 8 bits, <span class='f'>1111 1111</span> vaut…`,["−1","−127","255","−128"],`On inverse : 0000 0000, puis +1 : 0000 0001 = 1, donc le mot vaut −1. 255 est sa lecture non signée (255 − 256 = −1).`),
 AQ("ar-80","c","Cours · Complément à deux",`Lu comme un entier signé sur 8 bits, <span class='f'>1000 0000</span> vaut…`,["−128","−0","128","−1"],`C'est le plus petit nombre signé sur 8 bits : 128 − 256 = −128. Il n'existe pas de « −0 » en complément à deux.`),
 AQ("ar-f0","c","Cours · Complément à deux",`Que vaut <span class='f'>1111 0000</span> en non signé, puis en signé ?`,["240 et −16","240 et −112","240 et 240","15 et −15"],`Non signé : 128 + 64 + 32 + 16 = 240. Signé : 240 − 256 = −16. −112 serait la lecture « signe + valeur absolue » (−(64 + 32 + 16)).`),
 AQ("ar-zero","c","Cours · Complément à deux",`Combien de codages du zéro y a-t-il en complément à deux ?`,["Un seul","Deux (+0 et −0)","Aucun","Cela dépend du nombre de bits"],`0000 0000 est le seul zéro : l'opposé de 0 redonne 0 (1111 1111 + 1 = 0000 0000, carry jeté).`),
 AQ("ar-carry","c","Cours · Carry et overflow",`Le <b>carry</b> (retenue sortante) d'une addition sur 8 bits signale…`,["un dépassement en non signé","un dépassement en signé","un résultat négatif","une erreur de codage"],`Le carry est le 9ᵉ bit qui sort : le vrai résultat non signé dépasse 255. Il ne dit rien du résultat signé.`),
 AQ("ar-ovf","c","Cours · Carry et overflow",`Il y a <b>overflow</b> (dépassement signé) quand…`,["deux nombres de même signe donnent un résultat de signe opposé","il y a une retenue sortante","le résultat est négatif","les deux nombres sont de signes différents"],`Overflow : + et + donnent −, ou − et − donnent +. Le résultat signé exact sort de [−128 ; 127].`),
 AQ("ar-ovf2","c","Cours · Carry et overflow",`Peut-on avoir un overflow en additionnant un nombre positif et un nombre négatif ?`,["Non, jamais","Oui, s'il y a un carry","Oui, si le résultat est négatif","Seulement sur 4 bits"],`La somme d'un positif et d'un négatif est toujours entre les deux : elle reste dans la plage. L'overflow ne vient que de deux nombres de même signe.`),
 AQ("ar-add1","c","Cours · Carry et overflow",`Sur 8 bits : <span class='f'>0111 0110 + 0100 0011</span> = ?`,["1011 1001, carry 0, overflow oui","1011 1001, carry 1, overflow non","1011 1001, carry 0, overflow non","1 1011 1001, carry 1, overflow oui"],`118 + 67 = 185 ≤ 255 : pas de carry. Mais deux positifs donnent un mot qui commence par 1 (négatif en signé) : 185 &gt; 127, overflow.`),
 AQ("ar-add2","c","Cours · Carry et overflow",`Sur 8 bits : <span class='f'>1111 1111 + 0000 0001</span> = ?`,["0000 0000, carry 1, pas d'overflow","1 0000 0000","0000 0000, carry 1, overflow","0000 0001, carry 0"],`Non signé : 255 + 1 = 256, on garde 8 bits (0000 0000) et le carry vaut 1. Signé : −1 + 1 = 0, résultat juste, pas d'overflow. On ne garde jamais de 9ᵉ bit.`),
 AQ("ar-add3","c","Cours · Carry et overflow",`Sur 8 bits : <span class='f'>0111 1111 + 0000 0001</span> = ?`,["1000 0000, carry 0, overflow oui","1000 0000, carry 1, overflow oui","1000 0000, carry 0, overflow non","1000 0000, carry 1, overflow non"],`127 + 1 = 128 ≤ 255 : pas de carry. En signé, 127 + 1 sort de [−128 ; 127] : le mot 1000 0000 se lit −128, overflow.`),
 AQ("ar-sub","c","Cours · Carry et overflow",`Comment le processeur calcule-t-il a − b ?`,["a + (complément à deux de b)","b − a, puis il change le signe","a + (b avec ses bits inversés, sans +1)","il compare a et b bit à bit"],`Soustraire, c'est ajouter l'opposé : a − b = a + (−b), et −b s'obtient par le complément à deux. On jette le carry final.`),
 AQ("ar-sub2","c","Cours · Carry et overflow",`Sur 8 bits : <span class='f'>0000 1111 − 0001 0000</span> = ?`,["1111 1111 (−1)","0000 0001 (1)","1000 0001 (−1)","1111 1110 (−2)"],`15 − 16 = −1. −16 = 1111 0000, et 0000 1111 + 1111 0000 = 1111 1111, qui vaut −1 en signé.`),
 AQ("ar-ieee1","c","Cours · Flottants",`En IEEE 754 <b>simple</b> précision, comment sont répartis les 32 bits ?`,["1 signe, 8 exposant, 23 fraction","1 signe, 11 exposant, 52 fraction","1 signe, 7 exposant, 24 fraction","8 exposant, 1 signe, 23 fraction"],`Simple : 1 + 8 + 23 = 32 bits (biais 127). Double : 1 + 11 + 52 = 64 bits (biais 1023).`),
 AQ("ar-bias","c","Cours · Flottants",`Quel est le biais de l'exposant en simple précision ?`,["127","128","1023","255"],`On stocke e = E + 127. 1023 est le biais de la double précision.`),
 AQ("ar-impl","c","Cours · Flottants",`Dans un flottant normalisé, le 1 avant la virgule de 1,F…`,["n'est pas stocké (implicite)","est le premier bit de la fraction","est le bit de signe","est stocké dans l'exposant"],`Comme il vaut toujours 1, on ne le stocke pas : les 23 bits de fraction sont ceux après la virgule. Le mettre dans F est une erreur classique.`),
 AQ("ar-dec55","c","Cours · Flottants",`Que vaut le flottant <span class='f'>0 | 10000001 | 0110 0…0</span> ?`,["5,5","2,75","11","−5,5"],`Signe 0 : positif. e = 129 donc E = 129 − 127 = 2. 1,011₂ = 1,375. 1,375 × 2² = 5,5.`),
 AQ("ar-enc575","c","Cours · Flottants",`Quel est le codage IEEE 754 simple de 5,75 ?`,["0x40B80000","0xC0B80000","0x40380000","0x41B80000"],`5,75 = 101,11₂ = 1,0111 × 2². s = 0, e = 2 + 127 = 129 = 1000 0001, F = 0111 0…0. Bits : 0100 0000 1011 1000 0…0 = 0x40B80000. 0xC0B80000 a le bit de signe à 1 (−5,75).`),
 AQ("ar-01","c","Cours · Flottants",`Pourquoi 0,1 n'est-il pas stocké exactement dans un flottant ?`,["Son écriture binaire est infinie (0,000110011…₂)","Il est plus petit que le biais","La fraction ne peut stocker que des entiers","Il est stocké exactement : c'est l'affichage qui se trompe"],`En binaire, 0,1 = 0,0001100110011…₂ : le motif 0011 se répète sans fin. Avec 23 bits de fraction, il faut arrondir : en simple, la valeur stockée est 0,10000000149011612.`),
 AQ("ar-05","c","Cours · Flottants",`Lequel de ces nombres est stocké <b>exactement</b> en IEEE 754 ?`,["0,5","0,1","0,2","0,3"],`0,5 = 0,1₂ = 2⁻¹ : écriture binaire finie. 0,1, 0,2 et 0,3 ont une écriture binaire infinie.`),
 AQ("ar-nan","c","Cours · Flottants",`Un flottant a l'exposant <span class='f'>1111 1111</span> et une fraction non nulle. C'est…`,["NaN","±∞","±0","un dénormalisé"],`Exposant tout à 1 : fraction nulle → ±∞, fraction non nulle → NaN (Not a Number, par exemple 0/0).`),
 AQ("ar-inf","c","Cours · Flottants",`Un flottant a l'exposant <span class='f'>1111 1111</span> et une fraction nulle. C'est…`,["±∞ selon le signe","NaN","±0","le plus grand nombre normalisé"],`Exposant tout à 1 avec fraction 0 : l'infini. Exposant 0000 0000 avec fraction 0 : zéro.`),
 AQ("ar-cmp","c","Cours · Flottants",`Pour tester si deux flottants x et y sont « égaux », on écrit plutôt…`,["|x − y| &lt; ε","x == y","x − y == 0","round(x) == round(y)"],`Les arrondis rendent == peu fiable (0,1 + 0,2 ≠ 0,3). On compare avec une tolérance ε.`),
 AQ("ar-frac","c","Cours · Flottants",`Combien vaut <span class='f'>101,101₂</span> ?`,["5,625","5,5","5,101","45"],`101₂ = 5 et 0,101₂ = 0,5 + 0,125 = 0,625. Après la virgule, les positions valent 2⁻¹, 2⁻², 2⁻³…`),
 AQ("ar-norm","c","Cours · Flottants",`Quelle est la forme normalisée de <span class='f'>0,00101₂</span> ?`,["1,01 × 2⁻³","1,01 × 2³","0,101 × 2⁻²","101 × 2⁻⁵"],`On décale la virgule de 3 rangs vers la droite pour avoir 1,… : il faut multiplier par 2⁻³ pour compenser.`),
 AQ("ar-cpu","t","TP1 · Commandes",`Sous PowerShell, quelle commande donne le nombre de cœurs et de processeurs logiques ?`,["Get-CimInstance Win32_Processor","Get-PhysicalDisk","Get-NetAdapter","Get-Volume"],`Get-CimInstance Win32_Processor donne Name, NumberOfCores, NumberOfLogicalProcessors et MaxClockSpeed. Sous Fedora : lscpu.`),
 AQ("ar-lscpu","t","TP1 · Commandes",`Sous Fedora, quelle commande décrit le processeur ?`,["lscpu","lsblk","lspci","free -h"],`lscpu = processeur. lsblk = disques et partitions, lspci = périphériques PCI, free -h = mémoire vive.`),
 AQ("ar-ram","t","TP1 · Commandes",`Sous Fedora, quelle commande affiche la RAM en unités lisibles ?`,["free -h","lsblk -f","uname -m","lscpu -h"],`free -h : mémoire totale, utilisée et libre, -h pour des unités lisibles (Gi, Mi). Sous Windows : Get-CimInstance Win32_ComputerSystem (TotalPhysicalMemory en octets).`),
 AQ("ar-uname","t","TP1 · Commandes",`<span class='f'>uname -m</span> affiche <span class='f'>x86_64</span>. Cela signifie…`,["une architecture 64 bits (comme AMD64)","une architecture 32 bits","la version du noyau","le nom de la machine"],`x86_64 = AMD64 = 64 bits. La version du noyau, c'est uname -r ; le nom de la machine, hostname.`),
 AQ("ar-osrel","t","TP1 · Commandes",`Sous Fedora, quelle commande affiche le nom et la version du système ?`,["cat /etc/os-release","uname -m","lscpu","ip -br link"],`Le fichier /etc/os-release décrit la distribution. Sous Windows : Get-ComputerInfo (WindowsProductName, WindowsVersion).`),
 AQ("ar-lsblk","t","TP1 · Commandes",`Quel est l'équivalent Fedora de <span class='f'>Get-PhysicalDisk</span> ?`,["lsblk","lspci","free -h","ip -br link"],`lsblk liste les disques (TYPE disk) et leurs partitions ; avec -o NAME,SIZE,TYPE,FSTYPE,MOUNTPOINTS,MODEL on choisit les colonnes.`),
 AQ("ar-vol","t","TP1 · Commandes",`Quel est l'équivalent PowerShell de <span class='f'>lsblk -f</span> (systèmes de fichiers des volumes) ?`,["Get-Volume","Get-PhysicalDisk","Get-PnpDevice","Get-Location"],`Get-Volume donne DriveLetter, FileSystem (NTFS…), Size et SizeRemaining. Get-PhysicalDisk décrit le disque matériel, pas les volumes.`),
 AQ("ar-net","t","TP1 · Commandes",`<span class='f'>ip -br link</span> (Fedora) correspond sous PowerShell à…`,["Get-NetAdapter","Get-Volume","Get-CimInstance Win32_ComputerSystem","Get-ComputerInfo"],`Get-NetAdapter liste les interfaces réseau (Name, InterfaceDescription, Status, LinkSpeed).`),
 AQ("ar-pwd","t","TP1 · Commandes",`Quelle cmdlet PowerShell correspond à <span class='f'>pwd</span> ?`,["Get-Location","Get-Date","Get-Item","Set-Location"],`Get-Location affiche le dossier courant ; Set-Location change de dossier (comme cd).`),
 AQ("ar-lspci","t","TP1 · Commandes",`Sous Fedora, quelle commande liste les périphériques PCI (carte graphique, carte réseau…) ?`,["lspci","lsblk","lscpu","free -h"],`lspci. Sous Windows : Get-PnpDevice -PresentOnly, avec -Class Display ou -Class Net pour filtrer.`),
 AQ("ar-logic","t","TP1 · Matériel",`Un processeur a 8 cœurs avec hyperthreading. Combien de processeurs logiques affiche Windows ?`,["16","8","4","32"],`Avec l'hyperthreading, chaque cœur physique offre 2 processeurs logiques : 8 × 2 = 16. C'est NumberOfLogicalProcessors.`),
 AQ("ar-gio","t","TP1 · Matériel",`Un disque vendu « 512 Go » s'affiche environ…`,["476 Gio","512 Gio","549 Gio","500 Gio"],`512 Go = 512 × 10⁹ octets ; 1 Gio = 2³⁰ ≈ 1,074 × 10⁹ octets. 512 × 10⁹ / 2³⁰ ≈ 476 Gio.`),
 AQ("ar-hier","t","TP1 · Matériel",`Quel ordre va du plus rapide au plus lent ?`,["registres, cache, RAM, SSD","cache, registres, RAM, SSD","RAM, cache, registres, SSD","SSD, RAM, cache, registres"],`Les registres sont dans le processeur, puis le cache, la RAM, et enfin le stockage (SSD).`),
 AQ("ar-vm","t","TP1 · Matériel",`Pour lancer plusieurs machines virtuelles en même temps, quelle ressource limite en premier ?`,["La RAM","La carte réseau","Le cache du processeur","La taille de l'écran"],`Chaque machine virtuelle réserve sa propre mémoire : la RAM est épuisée en premier.`),
 AQ("ar-vn","t","TP1 · Matériel",`Dans le modèle de von Neumann, l'UAL (unité arithmétique et logique) fait partie…`,["du processeur","de la mémoire vive","du stockage","des périphériques d'entrée-sortie"],`Processeur = UAL + unité de commande + registres. Autour : mémoire, stockage, périphériques d'E/S, reliés par des bus.`),
 AQ("ar-lf","t","TP2 · Fichiers texte",`Sous Fedora, <span class='f'>echo "Bonjour" &gt; f.txt</span> crée un fichier de…`,["8 octets","7 octets","9 octets","10 octets"],`7 octets de texte (ASCII) + LF (0a, 1 octet) ajouté par Bash = 8 octets.`),
 AQ("ar-crlf","t","TP2 · Fichiers texte",`Sous Windows avec PowerShell 7, <span class='f'>echo "Bonjour" &gt; f.txt</span> crée un fichier de…`,["9 octets","8 octets","7 octets","10 octets"],`7 octets de texte + CRLF (0D 0A, 2 octets) = 9 octets.`),
 AQ("ar-eol","t","TP2 · Fichiers texte",`Quels octets terminent une ligne écrite par PowerShell 7 sous Windows ?`,["0D 0A (CRLF)","0A (LF)","00","0D (CR)"],`Windows : CR LF = 0D 0A. Linux (Fedora) : LF seul = 0a.`),
 AQ("ar-gt","t","TP2 · Fichiers texte",`Que fait <span class='f'>&gt;</span> dans <span class='f'>echo "x" &gt; f.txt</span> ?`,["Il crée le fichier ou remplace son contenu","Il ajoute à la fin du fichier","Il affiche le fichier","Il compare deux fichiers"],`&gt; redirige la sortie vers le fichier en l'écrasant. Pour ajouter à la fin, c'est &gt;&gt;.`),
 AQ("ar-quote","t","TP2 · Fichiers texte",`<span class='f'>echo "Café" &gt; accent.txt</span> : les guillemets sont-ils écrits dans le fichier ?`,["Non","Oui, les deux","Oui, seulement sous Windows","Seulement le premier"],`Les guillemets délimitent le texte pour le shell, ils ne sont pas écrits : le fichier contient Café et la fin de ligne.`),
 AQ("ar-wc","t","TP2 · Fichiers texte",`Quelle commande Fedora donne la taille d'un fichier en octets ?`,["wc -c fichier","wc -l fichier","od -An -tx1 fichier","lsblk fichier"],`wc -c compte les octets (-l compte les lignes). Sous PowerShell : la propriété Length de Get-Item.`),
 AQ("ar-len","t","TP2 · Fichiers texte",`Sous PowerShell, quelle propriété de <span class='f'>Get-Item f</span> donne la taille en octets ?`,["Length","Size","Count","Bytes"],`Get-Item f | Select-Object Name, Length : Length est la taille en octets.`),
 AQ("ar-od","t","TP2 · Fichiers texte",`Sous Fedora, <span class='f'>od -An -tx1 -v fichier</span> affiche…`,["les octets du fichier en hexa, un par un, sans adresses","le nombre de lignes du fichier","les octets en binaire","l'encodage du fichier"],`-An : pas d'adresses ; -tx1 : hexadécimal, 1 octet à la fois ; -v : toutes les lignes, même répétées.`),
 AQ("ar-fhex","t","TP2 · Fichiers texte",`Quel est l'équivalent PowerShell de <span class='f'>od -An -tx1 -v fichier</span> ?`,["Format-Hex -Path fichier","Get-Content fichier","Get-Item fichier","Select-String fichier"],`Format-Hex affiche les octets en hexa. Sa colonne texte de droite n'est pas fiable pour les caractères UTF-8 sur plusieurs octets.`),
 AQ("ar-e","t","TP2 · UTF-8",`En UTF-8, « é » s'écrit…`,["C3 A9 (2 octets)","E9 (1 octet)","00 E9","E2 98 95"],`é est U+00E9, hors ASCII : 2 octets C3 A9. E2 98 95 code ☕.`),
 AQ("ar-smile","t","TP2 · UTF-8",`Combien d'octets faut-il pour 😊 en UTF-8 ?`,["4","1","2","3"],`😊 (U+1F60A) = F0 9F 98 8A : 4 octets. ASCII 1 octet, é 2, ☕ 3.`),
 AQ("ar-cafe","t","TP2 · UTF-8",`Combien d'octets dans le texte « Café » en UTF-8, sans fin de ligne ?`,["5","4","6","8"],`C a f : 1 octet chacun, é : 2 octets (C3 A9). 43 61 66 C3 A9 = 5 octets pour 4 caractères.`),
 AQ("ar-ascii","t","TP2 · UTF-8",`Pourquoi ne peut-on pas écrire « é » en ASCII ?`,["ASCII ne code que 128 caractères (00 à 7F), sans lettres accentuées","ASCII n'a pas de minuscules","é prendrait 4 octets","ASCII n'existe que sous Windows"],`ASCII : 7 bits, 128 codes (lettres non accentuées, chiffres, ponctuation). Ni é ni 😊 n'y sont.`),
 AQ("ar-same","t","TP2 · UTF-8",`Le texte « Café » est écrit par echo sous Fedora puis sous Windows (PowerShell 7). Qu'est-ce qui change entre les deux fichiers ?`,["Seulement la fin de ligne","Les octets de é","Tous les octets","Rien du tout"],`Les deux écrivent en UTF-8 : 43 61 66 C3 A9 des deux côtés. Fedora ajoute 0a, Windows 0D 0A.`),
 AQ("ar-end","t","TP2 · Endianness",`L'entier 0x12345678 est stocké en <b>little-endian</b>. Quels octets trouve-t-on aux adresses 0 à 3 ?`,["78 56 34 12","12 34 56 78","87 65 43 21","56 78 12 34"],`Little-endian : l'octet de poids faible (78) à la plus petite adresse. Chaque octet garde ses chiffres : 87 65 43 21 inverserait l'intérieur des octets, c'est faux.`),
 AQ("ar-band","t","TP2 · PowerShell",`En PowerShell : <span class='f'>$s = 250 + 10</span> puis <span class='f'>$s -band 255</span> donne…`,["4","260","255","104"],`260 = 1 0000 0100 en binaire. -band 255 garde les 8 bits de droite : 0000 0100 = 4. Le 9ᵉ bit perdu est le carry.`),
 AQ("ar-x2","t","TP2 · PowerShell",`<span class='f'>$r = 4</span> ; <span class='f'>$r.ToString("X2")</span> affiche…`,["04","4","0x4","00000100"],`X = hexadécimal, 2 = au moins 2 chiffres : 04. Le binaire s'obtient avec [Convert]::ToString($r, 2).`),
 AQ("ar-m1","t","TP2 · PowerShell",`<span class='f'>(0 - 1) -band 255</span> donne 255. Que représente ce mot de 8 bits 1111 1111 ?`,["255 en non signé et −1 en signé","seulement 255","une erreur de calcul","−255"],`Même configuration de bits, deux lectures : 255 non signé, −1 en complément à deux. C'est pour cela que $bits8 ≠ la différence mathématique.`),
 AQ("ar-single","t","TP2 · PowerShell",`En PowerShell, <span class='f'>([double][single]0.1) -eq 0.1</span> renvoie…`,["False","True","une erreur","0.1"],`[single]0.1 est arrondi sur 32 bits : 0.10000000149011612. Le passer en [double] n'annule pas l'arrondi, donc ce n'est pas égal au double 0.1.`),
 AQ("ar-ps7","t","TP2 · PowerShell",`Pourquoi utiliser PowerShell 7 plutôt que Windows PowerShell 5.1 au TP2 ?`,["PowerShell 7 écrit en UTF-8 sans BOM, 5.1 utilise un autre codage","PowerShell 7 met des fins de ligne LF comme Fedora","5.1 ne connaît pas echo","PowerShell 7 n'ajoute pas de fin de ligne"],`Le TP compare des octets UTF-8 : PowerShell 7 écrit en UTF-8 sans BOM, Windows PowerShell 5.1 utilise un autre codage par défaut. Il ajoute quand même CRLF.`),
 AQ("ar-ver","t","TP2 · PowerShell",`Quelle commande vérifie la version de PowerShell ?`,["$PSVersionTable.PSVersion","Get-ComputerInfo","uname -r","Get-PSVersion"],`$PSVersionTable.PSVersion doit afficher 7.x. uname -r donne la version du noyau Linux.`),
 AQ("ar-zip","t","TP2 · PowerShell",`Quelle cmdlet crée l'archive ZIP du rendu ?`,["Compress-Archive","New-Item -ItemType Zip","Copy-Item -Zip","Format-Hex"],`Compress-Archive -Path Rendu_TP2 -DestinationPath R103_TP2_Nom1_Nom2.zip.`)
];

BANK.relations=[
 AQ("rel-def","r","Chap. 3 · Définition",`Une relation binaire de A vers B est…`,["une partie de A × B","un élément de A × B","une application de A dans B","une partie de A ∪ B"],`R ⊂ A × B : un ensemble de couples (x, y). C'est donc un élément de P(A × B).`),
 AQ("rel-nb","r","Chap. 3 · Compter",`Combien y a-t-il de relations de A = {a, b} vers B = {1, 2} ?`,["16","4","8","2"],`A × B a 2 × 2 = 4 couples ; une relation est une partie de A × B, il y en a 2⁴ = 16.`),
 AQ("rel-nb3","r","Chap. 3 · Compter",`Combien y a-t-il de relations dans E = {1, 2, 3} ?`,["512","9","64","8"],`E × E a 3 × 3 = 9 couples, donc 2⁹ = 512 relations.`),
 AQ("rel-app","r","Chap. 3 · Compter",`Parmi les 16 relations de {a, b} vers {1, 2}, combien sont des applications ?`,["4","2","8","16"],`Une application associe à chaque élément de A un et un seul élément de B : 2 choix pour a, 2 pour b, soit 4.`),
 AQ("rel-nary","r","Chap. 3 · Définition",`Une table ADHERENT de base de données à 8 colonnes est une relation…`,["8-aire","binaire","unaire","à 8 couples"],`Une ligne est un 8-uplet : la table est une partie de A₁ × … × A₈, une relation d'arité 8.`),
 AQ("rel-refl","r","Chap. 3 · Propriétés",`Sur le tableau cartésien d'une relation dans E, la réflexivité se voit…`,["à la diagonale entièrement cochée","au tableau symétrique par rapport à la diagonale","à une diagonale vide","à une seule croix par ligne"],`Réflexive : x R x pour tout x, donc toutes les cases (x, x) de la diagonale sont cochées.`),
 AQ("rel-sym","r","Chap. 3 · Propriétés",`R, relation dans E, est symétrique si…`,["x R y ⇒ y R x","(x R y et y R x) ⇒ x = y","x R x pour tout x","(x R y et y R z) ⇒ x R z"],`Symétrique : chaque flèche a sa flèche retour. Les autres définitions sont l'antisymétrie, la réflexivité et la transitivité.`),
 AQ("rel-anti","r","Chap. 3 · Propriétés",`Antisymétrique signifie…`,["(x R y et y R x) ⇒ x = y","x R y ⇒ non (y R x), même si x = y","x R y ⇒ y R x","la relation n'est pas symétrique"],`Pas d'aller-retour entre deux éléments distincts. Les boucles x R x sont permises. « Non symétrique » n'est pas la même chose.`),
 AQ("rel-ex1","r","Chap. 3 · Propriétés",`A = {1, 2, 3}, R = {(1,1), (1,2), (1,3), (3,3)}. R est…`,["transitive et antisymétrique, ni réflexive ni symétrique","réflexive et transitive","symétrique et transitive","une relation d'ordre"],`Non réflexive : 2 R 2 est faux. Non symétrique : 1 R 2 mais pas 2 R 1. Transitive : chaque triplet x R y, y R z donne x R z. Antisymétrique : aucun aller-retour entre éléments distincts. Pas un ordre car non réflexive.`),
 AQ("rel-ex2","r","Chap. 3 · Propriétés",`T = {(1,1), (1,2), (2,2), (2,3)} dans {1, 2, 3} n'est pas transitive. Quel contre-exemple ?`,["1 T 2 et 2 T 3, mais pas 1 T 3","3 T 3 est faux","1 T 2 mais pas 2 T 1","1 T 1 et 1 T 2 donnent 1 T 2"],`Il faut x T y et y T z vrais avec x T z faux : (1, 2, 3). « 3 T 3 faux » montre la non-réflexivité, « 1 T 2 sans 2 T 1 » la non-symétrie.`),
 AQ("rel-cex","r","Chap. 3 · Propriétés",`Pour montrer qu'une relation n'est <b>pas</b> transitive, il faut…`,["un seul contre-exemple","vérifier tous les triplets","au moins deux contre-exemples","montrer qu'elle n'est pas symétrique"],`« Non transitive » veut dire qu'il existe un triplet qui ne marche pas : un seul suffit. Pour prouver « transitive », il faut au contraire vérifier tous les triplets utiles.`),
 AQ("rel-eq","r","Chap. 3 · Équivalence et ordre",`Une relation d'équivalence est…`,["réflexive, symétrique et transitive","réflexive, antisymétrique et transitive","symétrique et antisymétrique","réflexive et transitive seulement"],`Équivalence : R + S + T (« avoir le même … que »). Ordre : R + antisymétrique + T.`),
 AQ("rel-ord","r","Chap. 3 · Équivalence et ordre",`Une relation d'ordre est…`,["réflexive, antisymétrique et transitive","réflexive, symétrique et transitive","antisymétrique et transitive seulement","forcément totale"],`Ordre = réflexive + antisymétrique + transitive. Il peut être partiel (⊂, divisibilité dans ℕ).`),
 AQ("rel-part","r","Chap. 3 · Équivalence et ordre",`Les classes d'une relation d'équivalence sur E…`,["forment une partition de E","peuvent se chevaucher","peuvent être vides","ont toujours le même nombre d'éléments"],`Partition : classes non vides (x ∈ Cℓ(x)), disjointes deux à deux, et leur union est E.`),
 AQ("rel-ana","r","Chap. 3 · Équivalence et ordre",`Avec « être l'anagramme de », Cℓ(chien) = …`,["{chien, niche, Chine}","{chien}","{niche, Chine}","tous les mots de 5 lettres"],`La classe contient chien lui-même (réflexivité) et tous ses anagrammes.`),
 AQ("rel-carre","r","Chap. 3 · Équivalence et ordre",`Sur {1, …, 8}, x R y ⇔ xy est un carré parfait. Cℓ(2) = …`,["{2, 8}","{2, 4, 8}","{2}","{1, 2, 4, 8}"],`2 × 2 = 4 et 2 × 8 = 16 sont des carrés ; 2 × 4 = 8 et 2 × 1 = 2 non. Classes : {1, 4}, {2, 8}, {3}, {5}, {6}, {7}.`),
 AQ("rel-div","r","Chap. 3 · Équivalence et ordre",`« divise » dans ℤ n'est pas une relation d'ordre, car…`,["elle n'est pas antisymétrique : 1 | −1 et −1 | 1","elle n'est pas réflexive","elle n'est pas transitive","0 ne divise rien"],`Réflexive et transitive, mais 1 | −1 et −1 | 1 avec 1 ≠ −1. Dans ℕ, elle est antisymétrique : c'est un ordre (partiel).`),
 AQ("rel-incl","r","Chap. 3 · Équivalence et ordre",`L'inclusion ⊂ dans P(X), avec X = {a, b}, est un ordre…`,["partiel","total","symétrique","qui n'en est pas un"],`{a} et {b} ne sont pas comparables (aucun n'est inclus dans l'autre) : ordre partiel.`),
 AQ("rel-lt","r","Chap. 3 · Équivalence et ordre",`&lt; dans ℝ n'est pas une relation d'ordre au sens du cours, car…`,["elle n'est pas réflexive","elle n'est pas transitive","elle n'est pas antisymétrique","elle n'est pas totale"],`x &lt; x est faux : pas réflexive. ≤ est l'ordre (total) de ℝ.`),
 AQ("rel-egal","r","Chap. 3 · Équivalence et ordre",`L'égalité dans un ensemble E est…`,["à la fois une équivalence et un ordre","seulement une équivalence","seulement un ordre","ni une équivalence ni un ordre"],`Elle est réflexive, symétrique, antisymétrique et transitive : les deux à la fois (ordre partiel dès que E a 2 éléments).`)
];

BANK.divis=[
 AQ("div-def","d","Chap. 4 · Division euclidienne",`Division euclidienne de a par b (b ≠ 0) : a = bq + r avec…`,["0 ≤ r &lt; |b|","0 ≤ r ≤ |b|","−|b| &lt; r &lt; |b|","0 &lt; r &lt; b"],`Le reste est positif ou nul et strictement plus petit que |b|. C'est ce qui rend (q, r) unique.`),
 AQ("div-neg","d","Chap. 4 · Division euclidienne",`Division euclidienne de −35 par 12 :`,["−35 = 12 × (−3) + 1","−35 = 12 × (−2) − 11","−35 = 12 × (−2) + 11","−35 = 12 × 3 + 1"],`Le reste doit être entre 0 et 11. 12 × (−3) = −36 et −35 − (−36) = 1. La 2ᵉ écriture est juste mais le reste −11 est interdit.`),
 AQ("div-neg2","d","Chap. 4 · Division euclidienne",`Division euclidienne de 35 par −12 :`,["35 = (−12) × (−2) + 11","35 = (−12) × (−3) − 1","35 = (−12) × 3 + 71","35 = 12 × 2 + 11"],`b = −12, |b| = 12 : on veut 0 ≤ r &lt; 12. (−12) × (−2) = 24 et 35 − 24 = 11.`),
 AQ("div-2013","d","Chap. 4 · Division euclidienne",`Quel est le reste de −2013 dans la division euclidienne par 7 ?`,["3","4","−4","6"],`2013 = 7 × 287 + 4, donc −2013 = 7 × (−287) − 4 : reste négatif interdit. On descend : 7 × (−288) = −2016 et −2013 + 2016 = 3.`),
 AQ("div-small","d","Chap. 4 · Division euclidienne",`Division euclidienne de 12 par 35 :`,["q = 0 et r = 12","q = 1 et r = −23","impossible car 12 &lt; 35","q = 0 et r = 35"],`12 = 35 × 0 + 12 et 0 ≤ 12 &lt; 35. De même −7 = 2013 × (−1) + 2006.`),
 AQ("div-not","d","Chap. 4 · Divisibilité",`Comment écrit-on « 3 divise 12 » ?`,["3 | 12","12 | 3","3/12","12/3"],`b | a se lit « b divise a ». On n'écrit jamais une fraction pour dire « divise ».`),
 AQ("div-zero","d","Chap. 4 · Divisibilité",`Laquelle de ces affirmations est <b>fausse</b> ?`,["0 divise 5","5 divise 0","1 divise 5","5 divise 5"],`0 | n seulement si n = 0 (il faudrait 5 = 0 × k). En revanche n | 0 (0 = n × 0), 1 | n et n | n sont toujours vrais.`),
 AQ("div-lin","d","Chap. 4 · Divisibilité",`a = 2n + 7 et b = n + 1. Tout diviseur commun de a et b divise…`,["5","7","n","9"],`Linéarité : d | a et d | b ⇒ d | a − 2b = 2n + 7 − 2n − 2 = 5. Donc d ∈ {−5, −1, 1, 5}.`),
 AQ("div-abs","d","Chap. 4 · Divisibilité",`Si b | a avec a ≠ 0, alors…`,["1 ≤ |b| ≤ |a|","b ≤ a","b &lt; a","|a| ≤ |b|"],`Les valeurs absolues sont ordonnées, pas forcément les nombres : 5 | −10 alors que 5 &gt; −10.`),
 AQ("div-prem","d","Chap. 4 · Nombres premiers",`Lequel de ces nombres est premier ?`,["29","1","21","51"],`29 n'est divisible ni par 2, 3 ni 5 (5² &gt; 29 suffit). 1 n'est pas premier, 21 = 3 × 7, 51 = 3 × 17.`),
 AQ("div-01","d","Chap. 4 · Nombres premiers",`0 et 1 sont-ils premiers ?`,["Aucun des deux","Les deux","Seulement 1","Seulement 0"],`Un premier a exactement deux diviseurs dans ℕ. 1 n'en a qu'un, 0 en a une infinité.`),
 AQ("div-24","d","Chap. 4 · Décomposition",`Quelle est la décomposition en facteurs premiers de 24 ?`,["2³ × 3","2² × 6","4 × 6","2 × 3 × 4"],`24 = 2 × 12 = 2 × 2 × 6 = 2 × 2 × 2 × 3. 6 et 4 ne sont pas premiers : les autres écritures ne sont pas des décompositions en facteurs premiers.`),
 AQ("div-150","d","Chap. 4 · Nombre de diviseurs",`Combien de diviseurs positifs a 150 = 2 × 3 × 5² ?`,["12","4","8","10"],`(1 + 1)(1 + 1)(2 + 1) = 12.`),
 AQ("div-form","d","Chap. 4 · Nombre de diviseurs",`Nombre de diviseurs positifs de p₁^α₁ × … × p_r^α_r :`,["(1 + α₁)(1 + α₂)…(1 + α_r)","α₁ × α₂ × … × α_r","α₁ + α₂ + … + α_r","2^r"],`Un diviseur est p₁^β₁ × … × p_r^β_r avec 0 ≤ βᵢ ≤ αᵢ : (1 + αᵢ) choix pour chaque exposant.`),
 AQ("div-21","d","Chap. 4 · Nombre de diviseurs",`Combien de diviseurs positifs a 21⁵ ?`,["36","6","10","25"],`21 n'est pas premier : 21⁵ = 3⁵ × 7⁵, donc (5 + 1)(5 + 1) = 36. Le piège donne 6.`),
 AQ("div-d24","d","Chap. 4 · Liste des diviseurs",`D(24) = …`,["{1, 2, 3, 4, 6, 8, 12, 24}","{2, 3, 4, 6, 8, 12}","{1, 2, 3, 4, 6, 8, 12}","{1, 2, 3, 4, 6, 12, 24}"],`24 = 2³ × 3 : (1 + 2 + 4 + 8)(1 + 3) développé donne 8 diviseurs, 1 et 24 compris.`),
 AQ("div-mult","d","Chap. 4 · Décomposition",`8 400 = 2⁴ × 3 × 5² × 7. Est-ce un multiple de 120 = 2³ × 3 × 5 ?`,["Oui : chaque facteur de 120 y est, avec un exposant au moins aussi grand","Non, car 7 ne divise pas 120","Non, car les exposants sont différents","On ne peut pas savoir sans poser la division"],`2⁴ ≥ 2³, 3 ≥ 3, 5² ≥ 5 : 8 400 = 120 × 70. Le 7 en plus ne gêne pas.`),
 AQ("div-966","d","Chap. 4 · Divisibilité",`966 = 23 × 42. On peut en déduire…`,["23 | 966 et 42 | 966","966 | 23","966 est premier","23 et 42 sont premiers"],`a = kb ⇒ b | a : ici 966 = 23 × 42, donc 23 et 42 divisent 966.`),
 AQ("div-dz","d","Chap. 4 · Liste des diviseurs",`Combien de diviseurs a 6 dans ℤ ?`,["8","4","6","12"],`D(6) = {1, 2, 3, 6} dans ℕ ; dans ℤ on ajoute les opposés : {−6, −3, −2, −1, 1, 2, 3, 6}, soit 8.`)
];

const ARCMD=[["Get-Date","date"],["Get-Location","pwd"],["Get-CimInstance Win32_Processor","lscpu"],["Get-CimInstance Win32_ComputerSystem","free -h"],["Get-PhysicalDisk","lsblk"],["Get-Volume","lsblk -f"],["Get-PnpDevice -PresentOnly","lspci"],["Get-NetAdapter","ip -br link"],["Get-Item f | Select-Object Name, Length","wc -c f"],["Format-Hex -Path f","od -An -tx1 -v f"],["Get-ComputerInfo (OsArchitecture)","uname -m"],["New-Item -ItemType Directory","mkdir -p"]];
const ARCMDW=["la date","le dossier courant","le processeur","la RAM","les disques physiques","les volumes et systèmes de fichiers","les périphériques","les interfaces réseau","la taille d'un fichier en octets","les octets d'un fichier en hexa","l'architecture","créer un dossier"];
const UTFW=["Bonjour","Café","Fusée","Noël","été","Hôtel","naïve","Ça va","Fusée 😊","Café ☕","Thé ☕","Prix : 5 €","Crème brûlée","Merci 😊","Maïs","Ok ☕😊","Tâche","Garçon","Où ?","Allô 😊"];
const UTFC=["é","è","à","ç","ê","ô","€","☕","😊","ñ"];
function u8(s){return [...new TextEncoder().encode(s)]}
function pw2(n){const p=[];for(let b=128;b>=1;b>>=1)if(n&b)p.push(b);return p.join(" + ")||"0"}
function binFrac(x){let ip=Math.floor(x),fp=x-ip,s=ip.toString(2);if(fp>0){s+=",";let k=0;while(fp>0&&k<30){fp*=2;const b=Math.floor(fp);s+=b;fp-=b;k++}}return s}
function f32(v){const dv=new DataView(new ArrayBuffer(4));dv.setFloat32(0,v);return dv.getUint32(0)}
function f32v(u){const dv=new DataView(new ArrayBuffer(4));dv.setUint32(0,u>>>0);return dv.getFloat32(0)}
function hx8(u){return "0x"+(u>>>0).toString(16).toUpperCase().padStart(8,"0")}
function ieeeVal(){for(;;){const k=2*ri(0,15)+1,j=ri(-6,3),v=k*Math.pow(2,j);if(v>=0.03&&v<=160)return rnd(2)?-v:v}}
function ieeeParts(u){return {s:u>>>31,e:(u>>>23)&255,f:u&0x7FFFFF}}
function fracBits(f){return f.toString(2).padStart(23,"0")}

Object.assign(GEN,{
 arConv(){const n=ri(18,255),t=rnd(5),B=bin8(n),H="0x"+hx2(n),hi=n>>4,lo=n&15;
  const near=shuffle([n+1,n-1,n+16,n-16,n^1,n^16,n^128,n+2,n^8].filter(x=>x>=0&&x<=255&&x!==n));
  const base={type:"mcq",noInterp:true};
  if(t===0){const r=chs(String(n),near.map(String));return {...base,id:"g-ar-conv",kind:"Binaire → décimal",q:`Combien vaut <span class='f'>${B}₂</span> en décimal (non signé) ?`,...r,expl:`On additionne les poids des bits à 1 : ${pw2(n)} = <b>${n}</b>.`}}
  if(t===1){const r=chs(B,near.map(x=>bin8(x)));return {...base,id:"g-ar-conv",kind:"Décimal → binaire",q:`Comment s'écrit ${n} en binaire sur 8 bits ?`,...r,expl:`${n} = ${pw2(n)}, donc les bits de ces poids sont à 1 : <span class='f'>${B}</span>.`}}
  if(t===2){const r=chs(String(n),near.map(String).concat([String(lo*16+hi)]));return {...base,id:"g-ar-conv",kind:"Hexadécimal → décimal",q:`Combien vaut <span class='f'>${H}</span> en décimal ?`,...r,expl:`${H} = ${hi} × 16 + ${lo} = <b>${n}</b> (A = 10 … F = 15).`}}
  if(t===3){const r=chs(H,["0x"+hx2(lo*16+hi)].concat(near.map(x=>"0x"+hx2(x))));return {...base,id:"g-ar-conv",kind:"Décimal → hexadécimal",q:`Comment s'écrit ${n} en hexadécimal ?`,...r,expl:`${n} = ${hi} × 16 + ${lo} : chiffres ${hx2(hi)[1]} et ${hx2(lo)[1]}, donc <b>${H}</b>.`}}
  const r=chs(H,["0x"+hx2(lo*16+hi)].concat(near.map(x=>"0x"+hx2(x))));return {...base,id:"g-ar-conv",kind:"Binaire → hexadécimal",q:`Comment s'écrit <span class='f'>${B}₂</span> en hexadécimal ?`,...r,expl:`On coupe en paquets de 4 bits : <span class='f'>${B.slice(0,4)}</span> = ${hi} → ${hx2(hi)[1]}, <span class='f'>${B.slice(5)}</span> = ${lo} → ${hx2(lo)[1]}. Donc <b>${H}</b>.`}},
 arC2(){const t=rnd(3);
  if(t===0){const v=ri(128,255),sv=v-256;const r=chs(frn(sv),[String(v),frn(-(v-128)),frn(-(255-v)),frn(sv-1)]);
   return {id:"g-ar-c2",type:"mcq",noInterp:true,kind:"Complément à deux",q:`Lu comme un entier <b>signé</b> sur 8 bits (complément à deux), <span class='f'>${bin8(v)}</span> vaut…`,...r,expl:`Le bit de gauche est 1 : le nombre est négatif. On inverse (<span class='f'>${bin8(255-v)}</span>) et on ajoute 1 (<span class='f'>${bin8(256-v)}</span> = ${256-v}) : il vaut <b>${frn(sv)}</b>. Raccourci : ${v} (lecture non signée) − 256 = ${frn(sv)}.`}}
  if(t===1){const n=ri(1,127);const good=bin8(256-n);const r=chs(good,[bin8(128+n),bin8(255-n),bin8(n),bin8((257-n)&255)]);
   return {id:"g-ar-c2",type:"mcq",noInterp:true,kind:"Complément à deux",q:`Comment s'écrit <b>−${n}</b> sur 8 bits en complément à deux ?`,...r,expl:`${n} = <span class='f'>${bin8(n)}</span>. On inverse tous les bits : <span class='f'>${bin8(255-n)}</span>, puis on ajoute 1 : <span class='f'>${good}</span>. Vérification : ${256-n} − 256 = −${n}.`}}
  const b=pick([4,5,6,8,10,16]),h=Math.pow(2,b-1);const good=`−${fmtN(h)} à ${fmtN(h-1)}`;
  const r=chs(good,[`0 à ${fmtN(2*h-1)}`,`−${fmtN(h-1)} à ${fmtN(h-1)}`,`−${fmtN(2*h)} à ${fmtN(2*h-1)}`,`−${fmtN(h-1)} à ${fmtN(h)}`]);
  return {id:"g-ar-c2r",type:"mcq",noInterp:true,kind:"Plages",q:`Quelle est la plage des entiers <b>signés</b> sur ${b} bits (complément à deux) ?`,...r,expl:`Sur n bits : −2ⁿ⁻¹ à 2ⁿ⁻¹ − 1. Avec n = ${b} : 2${supN(b-1)} = ${fmtN(h)}, donc <b>${good}</b>. En non signé ce serait 0 à ${fmtN(2*h-1)}.`}},
 arAdd8(){const m=rnd(4);let a,b;
  if(m===0){a=ri(0,255);b=ri(0,255)}else if(m===1){a=ri(40,127);b=ri(40,127)}else if(m===2){a=ri(128,215);b=ri(128,215)}else{a=ri(1,127);b=ri(128,255)}
  if(rnd(2))[a,b]=[b,a];
  const s=a+b,res=s&255,c=s>255?1:0,sa=a>=128,sb=b>=128,sr=res>=128,v=(sa===sb&&sr!==sa)?1:0;
  const sg=x=>x>=128?x-256:x,on=x=>x?"oui":"non",lab=(R,C,V)=>`${bin8(R)}, carry ${C}, overflow ${on(V)}`;
  const good=lab(res,c,v);const r=chs(good,shuffle([lab(res,1-c,v),lab(res,c,1-v),lab(res,1-c,1-v)]));
  const ssum=sg(a)+sg(b);
  return {id:"g-ar-add",type:"mcq",noInterp:true,kind:"Addition sur 8 bits",q:`Sur 8 bits : <span class='f'>${bin8(a)} + ${bin8(b)}</span> = ?`,...r,
   expl:`Non signé : ${a} + ${b} = ${s} ${c?`&gt; 255 : on garde les 8 bits de droite (<span class='f'>${bin8(res)}</span> = ${res}) et <b>carry = 1</b>`:`≤ 255 : <b>pas de carry</b>`}.<br>Signé : ${frn(sg(a))} + ${frn(sg(b))} = ${frn(ssum)} ${v?`sort de [−128 ; 127] : <b>overflow</b> (${sa?"deux négatifs donnent un positif":"deux positifs donnent un négatif"})`:sa!==sb?`: signes différents, <b>jamais d'overflow</b>`:`reste dans [−128 ; 127] : <b>pas d'overflow</b>`}.`}},
 arUtf8(){const t=rnd(3);
  if(t===2){const ch=pick(UTFC),by=u8(ch).map(hx2),cp=ch.codePointAt(0).toString(16).toUpperCase();const other=u8(pick(UTFC.filter(x=>x!==ch))).map(hx2);
   const good=by.join(" ");const cpb=(cp.length%2?"0"+cp:cp).replace(/(..)(?=.)/g,"$1 ");
   const r=chs(good,[cpb,by.slice().reverse().join(" "),other.join(" "),"00 "+cpb,u8(pick(UTFC.filter(x=>x!==ch))).map(hx2).join(" ")]);
   return {id:"g-ar-utfc",type:"mcq",noInterp:true,kind:"Octets UTF-8",q:`Quels octets codent « ${ch} » en UTF-8 ?`,...r,expl:`« ${ch} » est U+${cp.padStart(4,"0")} : hors ASCII, il prend ${by.length} octets en UTF-8 : <b>${good}</b>. Le point de code (${cp}) n'est pas l'octet écrit dans le fichier. Repères : é = C3 A9, ☕ = E2 98 95, 😊 = F0 9F 98 8A.`}}
  const w=pick(UTFW),chars=[...w],nb=u8(w).length,nc=chars.length;
  const det=chars.map(c=>{const k=u8(c).length;return `${c===" "?"espace":c} ${k}`}).join(" + ");
  if(t===0){const r=chs(String(nb),[String(nc),String(nb+1),String(nb-1),String(nb+2),String(nb+3),String(2*nc)]);
   return {id:"g-ar-utf",type:"mcq",noInterp:true,kind:"Octets UTF-8",q:`Combien d'octets fait le texte « ${esc(w)} » en UTF-8 (sans fin de ligne) ?`,...r,expl:`Caractère par caractère : ${esc(det)} = <b>${nb}</b> octets pour ${nc} caractères. ASCII = 1 octet, é = 2, ☕ et € = 3, 😊 = 4.`}}
  const sys=pick([["sous Fedora : <span class='f'>echo \"W\" &gt; f.txt</span>",1,"Bash ajoute LF (0a), 1 octet"],["sous Windows avec PowerShell 7 : <span class='f'>echo \"W\" &gt; f.txt</span>",2,"PowerShell 7 ajoute CRLF (0D 0A), 2 octets"],["sous Fedora : <span class='f'>echo -n \"W\" &gt; f.txt</span>",0,"echo -n n'ajoute pas de fin de ligne"]]);
  const good=nb+sys[1];const r=chs(String(good),shuffle([nb,nb+1,nb+2,nc+sys[1],good+1].filter(x=>x!==good)).concat([good+2,nb+3]).map(String));
  return {id:"g-ar-size",type:"mcq",noInterp:true,kind:"Taille d'un fichier",q:`Quelle taille (en octets) a le fichier créé ${sys[0].replace('"W"','"'+esc(w)+'"')} ?`,...r,expl:`Texte : ${esc(det)} = ${nb} octets. Fin de ligne : ${sys[2]}. Total : <b>${good}</b> octets (wc -c sous Fedora, Length sous PowerShell).`}},
 arEndian(){const by=shuffle([...Array(254).keys()].map(x=>x+1)).slice(0,4).map(hx2);const be=by.join(" "),le=by.slice().reverse().join(" ");const nib=by.join("").split("").reverse().join("").replace(/(..)(?=.)/g,"$1 ");
  const half=[by[2],by[3],by[0],by[1]].join(" "),V="0x"+by.join("");const t=rnd(3);
  if(t===0){const r=chs(le,[be,nib,half]);return {id:"g-ar-end",type:"mcq",noInterp:true,kind:"Endianness",q:`L'entier <span class='f'>${V}</span> est rangé en mémoire par un processeur <b>little-endian</b>. Quels octets trouve-t-on aux adresses 0, 1, 2, 3 ?`,...r,expl:`Little-endian : l'octet de poids faible (${by[3]}) à la plus petite adresse : <b>${le}</b>. Chaque octet garde ses deux chiffres hexa : on inverse l'ordre des octets, pas les chiffres.`}}
  if(t===1){const r=chs(be,[le,nib,half]);return {id:"g-ar-end",type:"mcq",noInterp:true,kind:"Endianness",q:`L'entier <span class='f'>${V}</span> est rangé en <b>big-endian</b>. Quels octets trouve-t-on aux adresses 0, 1, 2, 3 ?`,...r,expl:`Big-endian : l'octet de poids fort (${by[0]}) à la plus petite adresse, dans l'ordre de lecture : <b>${be}</b>.`}}
  const good="0x"+by.slice().reverse().join("");const r=chs(good,["0x"+by.join(""),"0x"+nib.replace(/ /g,""),"0x"+half.replace(/ /g,"")]);
  return {id:"g-ar-end",type:"mcq",noInterp:true,kind:"Endianness",q:`Aux adresses 0 à 3, la mémoire contient <span class='f'>${be}</span>. Le processeur est <b>little-endian</b>. Quel entier de 32 bits est stocké ?`,...r,expl:`En little-endian, l'adresse 0 contient l'octet de poids faible. On relit donc de l'adresse 3 à l'adresse 0 : <b>${good}</b>. Lire ${V} serait une lecture big-endian.`}},
 arIeeeDec(){const v=ieeeVal(),u=f32(v),{s,e,f}=ieeeParts(u),E=e-127,M=1+f/8388608;
  const bits=`${s} | ${bin8(e).replace(" ","")} | ${fracBits(f).replace(/(.{4})(?=.)/g,"$1 ")}`;
  const noImpl=(s?-1:1)*(M-1)*Math.pow(2,E);
  const r=chs(frn(v),[frn(-v),frn(v*2),frn(v/2),frn(noImpl)]);
  return {id:"g-ar-ieeed",type:"mcq",noInterp:true,kind:"IEEE 754 · décoder",q:`Quel nombre code ce flottant simple précision (signe | exposant | fraction) ?<div class="tscroll"><span class='f'>${bits}</span></div>`,...r,
   expl:`Signe ${s} : ${s?"négatif":"positif"}. Exposant e = <span class='f'>${bin8(e).replace(" ","")}</span> = ${e}, donc E = ${e} − 127 = ${frn(E)}. Mantisse 1,F = <span class='f'>${binFrac(M)}₂</span> = ${frn(M)} (le 1 est implicite). Valeur : ${s?"−":""}${frn(M)} × 2${supN(E)} = <b>${frn(v)}</b>.`}},
 arIeeeEnc(){const v=ieeeVal(),u=f32(v),{s,e,f}=ieeeParts(u),E=e-127,av=Math.abs(v),M=1+f/8388608;
  const fImpl=(0x400000|(f>>>1))>>>0,wrongImpl=((u&0xFF800000)|fImpl)>>>0;
  const r=chs(hx8(u),[hx8(u^0x80000000),hx8(u+0x00800000),hx8(u-0x00800000),hx8(wrongImpl)]);
  const full=(u>>>0).toString(2).padStart(32,"0");
  return {id:"g-ar-ieeee",type:"mcq",noInterp:true,kind:"IEEE 754 · encoder",q:`Quel est le codage IEEE 754 simple précision de <b>${frn(v)}</b> ?`,...r,
   expl:`${frn(av)} = <span class='f'>${binFrac(av)}₂</span> = <span class='f'>${binFrac(M)} × 2${supN(E)}</span>. Signe s = ${s} ; e = ${frn(E)} + 127 = ${e} = <span class='f'>${bin8(e).replace(" ","")}</span> ; F = les bits après la virgule, complétés par des 0. Les 32 bits <span class='f'>${full.replace(/(.{4})(?=.)/g,"$1 ")}</span> donnent <b>${hx8(u)}</b>.`}},
 arCmd(){const i=rnd(ARCMD.length),[w,l]=ARCMD[i],toF=rnd(2);const good=toF?l:w;const first=x=>x.split(" ")[0];
  const pool=shuffle(ARCMD.filter((_,k)=>k!==i).map(p=>toF?p[1]:p[0]).filter(x=>first(x)!==first(good)));const r=chs(good,pool);
  return {id:"g-ar-cmd",type:"mcq",noInterp:true,kind:"Windows ↔ Fedora",q:toF?`Sous PowerShell, <span class='f'>${esc(w)}</span> donne ${ARCMDW[i]}. Quelle commande donne la même information sous <b>Fedora</b> ?`:`Sous Fedora, <span class='f'>${esc(l)}</span> donne ${ARCMDW[i]}. Quelle commande utiliser sous <b>PowerShell</b> ?`,...r,choices:r.choices.map(esc),
   expl:`${ARCMDW[i][0].toUpperCase()+ARCMDW[i].slice(1)} : <span class='f'>${esc(w)}</span> sous PowerShell, <span class='f'>${esc(l)}</span> sous Fedora.`}},

 relProps(){const n=rnd(3)?3:4,E=[...Array(n).keys()].map(x=>x+1);let P;
  for(let tries=0;tries<50;tries++){const set=new Set();const add=(x,y)=>set.add(x+","+y);const md=rnd(5);
   for(const x of E)for(const y of E)if(Math.random()<(md===0?.3:.22))add(x,y);
   if(md===1||md===3||md===4)E.forEach(x=>add(x,x));
   if(md===2||md===3)[...set].forEach(p=>{const [x,y]=p.split(",");add(y,x)});
   if(md===4){E.forEach(x=>E.forEach(y=>{if(x<y&&set.has(y+","+x))set.delete(y+","+x)}))}
   for(let k=0;k<3&&rnd(2);k++)[...set].forEach(p=>{const [x,y]=p.split(",");[...set].forEach(q=>{const [y2,z]=q.split(",");if(y===y2&&md>=3)add(x,z)})});
   if(set.size>=3&&set.size<=9){P=set;break}}
  if(!P){P=new Set(["1,1","1,2","1,3","3,3"])}
  const has=(x,y)=>P.has(x+","+y);const pairs=[...P].map(p=>p.split(",").map(Number)).sort((a,b)=>a[0]-b[0]||a[1]-b[1]);
  let cR=null,cS=null,cT=null,cA=null;
  for(const x of E)if(!cR&&!has(x,x))cR=`${x} R ${x} est faux`;
  for(const [x,y] of pairs)if(!cS&&!has(y,x))cS=`${x} R ${y} mais pas ${y} R ${x}`;
  for(const [x,y] of pairs)for(const [y2,z] of pairs)if(!cT&&y===y2&&!has(x,z))cT=`${x} R ${y} et ${y} R ${z}, mais pas ${x} R ${z}`;
  for(const [x,y] of pairs)if(!cA&&x!==y&&has(y,x))cA=`${x} R ${y} et ${y} R ${x} avec ${x} ≠ ${y}`;
  const f=[!cR,!cS,!cT,!cA],on=b=>b?"oui":"non",lab=a=>`réflexive ${on(a[0])} · symétrique ${on(a[1])} · transitive ${on(a[2])} · antisymétrique ${on(a[3])}`;
  const good=lab(f);const r=chs(good,shuffle([0,1,2,3].map(i=>lab(f.map((b,k)=>k===i?!b:b)))));
  const nat=f[0]&&f[1]&&f[2]?" C'est une relation d'<b>équivalence</b>.":f[0]&&f[2]&&f[3]?" C'est une relation d'<b>ordre</b>.":"";
  return {id:"g-rel-prop",type:"mcq",noInterp:true,kind:"Propriétés d'une relation",q:`Dans E = ${setStr(E)}, R = ${setStr(pairs.map(p=>`(${p[0]},${p[1]})`))}. Quelles sont les propriétés de R ?`,...r,
   expl:`Réflexive : ${cR?"<b>non</b>, "+cR:"<b>oui</b>, toutes les boucles (x, x) sont là"}. Symétrique : ${cS?"<b>non</b>, "+cS:"<b>oui</b>, chaque couple a son retour"}. Transitive : ${cT?"<b>non</b>, "+cT:"<b>oui</b>, chaque fois que x R y et y R z, on a x R z"}. Antisymétrique : ${cA?"<b>non</b>, "+cA:"<b>oui</b>, aucun aller-retour entre éléments distincts"}.${nat} Un seul contre-exemple suffit pour dire « non ».`}},
 relCount(){const n=ri(2,5),same=rnd(2),m=same?n:ri(1,5);const nm=n*m,ap=rnd(3)===0&&!same;
  if(ap){const good=fmtN(Math.pow(m,n));const r=chs(good,[fmtN(Math.pow(2,nm)),fmtN(Math.pow(n,m)),fmtN(nm),fmtN(Math.pow(m,n)+1),fmtN(n*m+1),fmtN(Math.pow(m,n)*2)]);
   return {id:"g-rel-app",type:"mcq",noInterp:true,kind:"Compter",q:`Card A = ${n} et Card B = ${m}. Combien y a-t-il d'<b>applications</b> de A vers B ?`,...r,expl:`Chaque élément de A a exactement une image, à choisir parmi ${m} : ${m}${supN(n)} = <b>${good}</b>. Ne pas confondre avec le nombre de relations, 2${supN(nm)}.`}}
  const good=fmtN(Math.pow(2,nm));const r=chs(good,[fmtN(Math.pow(2,n+m)),fmtN(nm),fmtN(nm*nm),fmtN(Math.pow(2,nm-1)),fmtN(Math.pow(m,n)),fmtN(Math.pow(2,nm+1)),fmtN(2*nm),fmtN(nm+1)]);
  const E=same?`dans un ensemble E de cardinal ${n}`:`d'un ensemble A de cardinal ${n} vers un ensemble B de cardinal ${m}`;
  return {id:"g-rel-nb",type:"mcq",noInterp:true,kind:"Compter",q:`Combien y a-t-il de relations ${E} ?`,...r,expl:`Une relation est une partie de ${same?"E × E":"A × B"}, qui a ${n} × ${m} = ${nm} couples. Nombre de parties : 2${supN(nm)} = <b>${good}</b>.`}},
 eqClasses(){if(rnd(3)===0){const W=pick([["la même première lettre",["lune","loup","lac","mer","miel","nuit","noir","mot"],w=>w[0]],["le même nombre de lettres",["chat","loup","rat","lion","ours","cerf","pie","oie"],w=>w.length],["la même dernière lettre",["vélo","auto","moto","train","avion","bateau","métro","tram"],w=>w[w.length-1]]]);
   const [txt,ws,key]=W;const x=pick(ws);const cls=ws.filter(w=>key(w)===key(x));const others=ws.filter(w=>key(w)!==key(x));
   const good=setStr(cls);const r=chs(good,[setStr(cls.filter(w=>w!==x).length?cls.filter(w=>w!==x):cls.concat([others[0]])),setStr(cls.concat([pick(others)])),setStr([x]),setStr(ws.filter(w=>key(w)===key(others[0]))),setStr(cls.concat(others.slice(0,2))),setStr(others.slice(-Math.max(1,cls.length)))]);
   return {id:"g-rel-cl",type:"mcq",noInterp:true,kind:"Classes d'équivalence",q:`E = ${setStr(ws)}. x R y ⇔ x et y ont ${txt}. Quelle est la classe de <b>${x}</b> ?`,...r,expl:`Cℓ(${x}) = {y ∈ E / ${x} R y} : tous les mots qui ont ${txt} que ${x}, <b>${x} compris</b> (réflexivité) : ${good}.`}}
  const N=ri(9,14),k=ri(2,5),E=[...Array(N+1).keys()];const cl=v=>E.filter(y=>y%k===v%k);
  if(rnd(3)===0){const r=chs(String(k),[String(k-1),String(k+1),String(N+1),String(2*k)].filter(x=>x!=="0"));
   return {id:"g-rel-ncl",type:"mcq",noInterp:true,kind:"Classes d'équivalence",q:`E = {0, 1, …, ${N}}. x R y ⇔ x et y ont le même reste dans la division par ${k}. Combien y a-t-il de classes d'équivalence ?`,...r,expl:`Une classe par reste possible (0 à ${k-1}) : ${[...Array(k).keys()].map(v=>setStr(cl(v))).join(", ")}. Soit <b>${k}</b> classes, qui forment une partition de E.`}}
  const x=ri(0,N),c=cl(x);const good=setStr(c);const alt=cl(x+1);
  const r=chs(good,[setStr(alt),setStr(c.concat([x+1<=N?x+1:x-1]).sort((a,b)=>a-b)),setStr(c.length>1?c.filter(y=>y!==c[c.length-1]):c.concat([x+k+1])),setStr(E.filter(y=>y%k===x%k&&y>=x))]);
  return {id:"g-rel-cl",type:"mcq",noInterp:true,kind:"Classes d'équivalence",q:`E = {0, 1, …, ${N}}. x R y ⇔ x et y ont le même reste dans la division par ${k}. Que vaut Cℓ(${x}) ?`,...r,expl:`${x} = ${k} × ${Math.floor(x/k)} + ${x%k} : reste ${x%k}. Cℓ(${x}) regroupe tous les éléments de E de reste ${x%k}, y compris ceux plus petits que ${x} : <b>${good}</b>.`}},
 divEucl(){let b=ri(2,25);if(rnd(4)===0)b=-b;let a=ri(7,300);if(rnd(2))a=-a;const B=Math.abs(b),r=((a%B)+B)%B,q=(a-r)/b,sb=Math.sign(b);
  const L=(Q,R)=>`q = ${frn(Q)} et r = ${frn(R)}`;const qt=Math.trunc(a/b),rt=a-b*qt;
  const res=chs(L(q,r),[L(qt,rt),L(q+sb,r-B),L(q-sb,r+B),L(-q,r),L(q,B-r)]);
  const par=x=>x<0?`(${frn(x)})`:frn(x);
  return {id:"g-div-eu",type:"mcq",noInterp:true,kind:"Division euclidienne",q:`Division euclidienne de <b>${frn(a)}</b> par <b>${frn(b)}</b> : a = bq + r avec 0 ≤ r &lt; |b|. Que valent q et r ?`,...res,
   expl:`${frn(a)} = ${par(b)} × ${par(q)} + ${r}, et 0 ≤ ${r} &lt; ${B}. ${a<0&&rt!==0?`Piège : ${par(b)} × ${par(qt)} + ${par(rt)} est une égalité vraie, mais le reste ${frn(rt)} est négatif : on change q d'un cran pour avoir un reste positif.`:`Le reste est toujours positif ou nul et plus petit que |b|.`}`}},
 primeFact(){const {n,fs}=mkFact(20000);const good=factStr(fs);const ds=[];
  fs.forEach((x,i)=>{ds.push(factStr(fs.map((y,k)=>k===i?[y[0],y[1]+1]:y)));if(x[1]>1)ds.push(factStr(fs.map((y,k)=>k===i?[y[0],y[1]-1]:y)))});
  if(fs.length>1)ds.push(factStr([[fs[0][0],fs[1][1]],[fs[1][0],fs[0][1]]].concat(fs.slice(2))));
  const tw=fs.find(x=>x[0]===2&&x[1]>=2);if(tw)ds.push(factStr(fs.map(y=>y[0]===2?[4,1]:y).concat(tw[1]>2?[[2,tw[1]-2]]:[]).sort((a,b)=>a[0]-b[0])));
  ds.push(factStr(fs.map((y,k)=>k===fs.length-1?[y[0],y[1]+2]:y)),factStr(fs.slice(0,-1).concat([[fs[fs.length-1][0]*2,1]]).sort((a,b)=>a[0]-b[0])),factStr(fs.map(y=>[y[0],y[1]+1])));const r=chs(good,shuffle(ds));const steps=[];let m=n;for(const [p,a] of fs)for(let k=0;k<a;k++){steps.push(`${fmtN(m)} ÷ ${p} = ${fmtN(m/p)}`);m/=p}
  return {id:"g-div-fact",type:"mcq",noInterp:true,kind:"Décomposition en facteurs premiers",q:`Quelle est la décomposition en facteurs premiers de <b>${fmtN(n)}</b> ?`,...r,expl:`On divise par les premiers dans l'ordre : ${steps.join(" ; ")}. Donc ${fmtN(n)} = <b>${good}</b>. Tous les facteurs doivent être premiers (4, 6, 9… ne le sont pas).`}},
 nbDiv(){const t=rnd(3);
  if(t===0){const c=pick([[6,[2,3]],[10,[2,5]],[15,[3,5]],[21,[3,7]],[14,[2,7]]]),a=ri(2,5),p=pick([5,7,11,13].filter(x=>!c[1].includes(x))),b=ri(1,3);const good=(a+1)*(a+1)*(b+1),naive=(a+1)*(b+1);
   const r=chs(String(good),[String(naive),String(a*b),String(a+b+1),String(good-1)]);
   return {id:"g-div-nb",type:"mcq",noInterp:true,kind:"Nombre de diviseurs",q:`Combien de diviseurs positifs a n = ${c[0]}${supN(a)} × ${p}${b>1?supN(b):""} ?`,...r,expl:`Piège : ${c[0]} n'est pas premier, ${c[0]} = ${c[1][0]} × ${c[1][1]}. Donc n = ${c[1][0]}${supN(a)} × ${c[1][1]}${supN(a)} × ${p}${b>1?supN(b):""}, et le nombre de diviseurs est (${a} + 1)(${a} + 1)(${b} + 1) = <b>${good}</b>, pas ${naive}.`}}
  const {n,fs}=mkFact(t===1?2000:60000);const good=fs.reduce((s,x)=>s*(x[1]+1),1);const prodA=fs.reduce((s,x)=>s*x[1],1),sumA=fs.reduce((s,x)=>s+x[1],0);
  const r=chs(String(good),[String(prodA),String(sumA+1),String(good*2),String(good-1),String(Math.pow(2,fs.length))]);
  return {id:"g-div-nb",type:"mcq",noInterp:true,kind:"Nombre de diviseurs",q:`Combien de diviseurs <b>positifs</b> a ${fmtN(n)}${t===2?` = ${factStr(fs)}`:""} ?`,...r,expl:`${fmtN(n)} = ${factStr(fs)}. Formule (1 + α₁)(1 + α₂)… : ${fs.map(x=>`(${x[1]} + 1)`).join("")} = <b>${good}</b>. Dans ℤ, il y en aurait ${good*2} (avec les opposés).`}},
 listDiv(){let n,D;for(;;){n=ri(12,200);D=[];for(let d=1;d<=n;d++)if(n%d===0)D.push(d);if(D.length>=6)break}
  const good=setStr(D);const mid=D.slice(1,-1);const miss=pick(mid);let extra;for(;;){extra=ri(2,n-1);if(n%extra)break}
  const r=chs(good,[setStr(D.filter(d=>d!==miss)),setStr(D.concat([extra]).sort((a,b)=>a-b)),setStr(mid),setStr(D.filter(d=>d!==n))]);
  const fs=factOf(n);
  return {id:"g-div-list",type:"mcq",noInterp:true,kind:"Liste des diviseurs",q:`Quelle est la liste D(${n}) des diviseurs positifs de ${n} ?`,...r,expl:`${n} = ${factStr(fs)} : ${fs.reduce((s,x)=>s*(x[1]+1),1)} diviseurs. On développe ${fs.map(([p,a])=>"("+[...Array(a+1).keys()].map(k=>k===0?"1":k===1?String(p):p+supN(k)).join(" + ")+")").join("")} : <b>${good}</b>. 1 et ${n} en font partie.`}}
});
function factStr(fs){return fs.map(([p,a])=>a===1?String(p):p+supN(a)).join(" × ")}
function factOf(n){const fs=[];for(let p=2;p*p<=n;p++){let a=0;while(n%p===0){n/=p;a++}if(a)fs.push([p,a])}if(n>1)fs.push([n,1]);return fs}
function mkFact(max){for(;;){const ps=shuffle([2,3,5,7,11,13]).slice(0,ri(2,3)).sort((a,b)=>a-b);const fs=ps.map(p=>[p,ri(1,p<=3?4:2)]);const n=fs.reduce((s,[p,a])=>s*Math.pow(p,a),1);if(n>=30&&n<=max)return {n,fs}}}

const DECKS2=[
 {key:"devoir2c",tag:"Chap. 3 + 4",title:"Relations et divisibilité",desc:"Questions de cours des chapitres 3 et 4, avec des calculs générés",bank:()=>BANK.relations.concat(BANK.divis),gens:["relProps","relCount","eqClasses","divEucl","primeFact","nbDiv","listDiv"]},
 {key:"relations",tag:"Chapitre 3",title:"Relations binaires",desc:"Définition, nombre de relations, propriétés, équivalence, ordre",bank:()=>BANK.relations,gens:["relProps","relCount","eqClasses"]},
 {key:"divis",tag:"Chapitre 4",title:"Divisibilité dans ℤ",desc:"Division euclidienne, diviseurs, nombres premiers, décomposition",bank:()=>BANK.divis,gens:["divEucl","primeFact","nbDiv","listDiv"]}];
const DEVOIR2={key:"devoir2",tag:"Spécial devoir 2",title:"Devoir 2 : relations & divisibilité",desc:"12 questions des chapitres 3 et 4 mélangés, comme au devoir",bank:()=>BANK.relations.concat(BANK.divis),gens:["relProps","relProps","eqClasses","divEucl","primeFact","nbDiv","listDiv","relCount"],n:12};
const GENDECKS2=[
 {key:"g-relp",tag:"Générées",title:"Propriétés d'une relation",desc:"Réflexive, symétrique, transitive, antisymétrique, avec le contre-exemple",gens:["relProps"]},
 {key:"g-relc",tag:"Générées",title:"Compter les relations",desc:"2 puissance (Card A × Card B), et les applications",gens:["relCount"]},
 {key:"g-eqc",tag:"Générées",title:"Classes d'équivalence",desc:"Même reste, même première lettre…",gens:["eqClasses"]},
 {key:"g-diveu",tag:"Générées",title:"Division euclidienne",desc:"Avec a ou b négatif : le reste reste positif",gens:["divEucl"]},
 {key:"g-fact",tag:"Générées",title:"Facteurs premiers et diviseurs",desc:"Décomposer, compter et lister les diviseurs",gens:["primeFact","nbDiv","listDiv"]}];


/* ===================== Étape 2 : R1.07 Devoir 2, R1.04 Systèmes, R1.01 langage C ===================== */
BANK.gauss=[
 AQ("gj-prin","g","Gauss-Jordan",`Pour calculer A<sup>−1</sup> par Gauss-Jordan, on part de…`,["(A | I<sub>n</sub>) et on vise (I<sub>n</sub> | A<sup>−1</sup>)","(I<sub>n</sub> | A) et on vise (A<sup>−1</sup> | I<sub>n</sub>)","(A | B) et on vise (I<sub>n</sub> | X)","A seule, qu'on rend triangulaire"],`On écrit A à gauche et la matrice identité à droite, et chaque opération porte sur les lignes entières. Quand la gauche est devenue I<sub>n</sub>, la droite est A<sup>−1</sup>.`),
 AQ("gj-op","g","Gauss-Jordan",`Laquelle de ces opérations est <b>interdite</b> sur une ligne ?`,["L2 ← 0 × L2","L2 ← 2L2 + L1","L1 ↔ L3","L3 ← L3 − 4L1"],`Multiplier une ligne par 0 détruit l'information : le coefficient doit être non nul. Échanger et ajouter une combinaison des autres lignes sont permis.`),
 AQ("gj-norm","g","Gauss-Jordan",`À la fin de la remontée on a (2 0 0 | −2 2 2) en 1ʳᵉ ligne. Que reste-t-il à faire ?`,["Diviser la ligne par 2 (normalisation)","Rien, c'est fini","Échanger avec L2","Soustraire L2"],`Il faut des 1 sur la diagonale à gauche : L1 ← ½ L1 donne (1 0 0 | −1 1 1). Cette normalisation est souvent oubliée.`),
 AQ("gj-nul","g","Gauss-Jordan",`Pendant Gauss-Jordan, une ligne du bloc de gauche devient entièrement nulle. On conclut que…`,["A n'est pas inversible","A⁻¹ a une ligne nulle","il faut échanger deux lignes et continuer","A est égale à I"],`Une ligne nulle à gauche ne pourra jamais devenir une ligne de I : A n'est pas inversible, on s'arrête.`),
 AQ("gj-22","g","Gauss-Jordan",`A = (3 5 ; 4 7). Que vaut A<sup>−1</sup> ?`,["(7 −5 ; −4 3)","(7 5 ; 4 3)","(−7 5 ; 4 −3)","(3 −4 ; −5 7)"],`ad − bc = 21 − 20 = 1. On échange a et d et on change le signe de b et c : (7 −5 ; −4 3). Vérification : A × A<sup>−1</sup> = I.`),
 AQ("gj-det","g","Gauss-Jordan",`Une matrice 2 × 2 (a b ; c d) est inversible si et seulement si…`,["ad − bc ≠ 0","ad + bc ≠ 0","a ≠ 0 et d ≠ 0","a + d ≠ 0"],`Si ad − bc ≠ 0, A<sup>−1</sup> = 1/(ad − bc) × (d −b ; −c a). Sinon A n'est pas inversible.`),
 AQ("gj-axb","g","Gauss-Jordan",`Le système s'écrit AX = B avec A inversible. Alors…`,["X = A<sup>−1</sup>B","X = BA<sup>−1</sup>","X = B / A","X = AB"],`On multiplie à gauche par A<sup>−1</sup> : A<sup>−1</sup>AX = A<sup>−1</sup>B, donc X = A<sup>−1</sup>B. L'ordre compte : BA<sup>−1</sup> n'a même pas toujours de sens.`),
 AQ("gj-pa","g","Gauss-Jordan",`On sait que A³ − 7A² + 4A − I<sub>3</sub> = 0. Alors A<sup>−1</sup> = …`,["A² − 7A + 4I<sub>3</sub>","A² − 7A + 4","−A² + 7A − 4I<sub>3</sub>","A³ − 7A²"],`A³ − 7A² + 4A = I<sub>3</sub>, donc A(A² − 7A + 4I<sub>3</sub>) = I<sub>3</sub> : l'inverse est A² − 7A + 4I<sub>3</sub> (avec I<sub>3</sub>, pas le nombre 4).`),
 AQ("gj-ver","g","Gauss-Jordan",`Comment vérifier un inverse le jour du devoir ?`,["Calculer A × A<sup>−1</sup> à la calculatrice et trouver I","Vérifier que A<sup>−1</sup> n'a que des entiers","Vérifier que la diagonale de A<sup>−1</sup> est non nulle","Recommencer Gauss-Jordan dans le même ordre"],`La calculatrice est autorisée : A × A<sup>−1</sup> = I prouve le résultat. Un inverse peut avoir des fractions (ex. ½ dans la feuille 2).`)
];
BANK.deriv=[
 AQ("dv-tan","d","Dérivation",`L'équation de la tangente à la courbe de f au point d'abscisse a est…`,["y = f(a) + f′(a)(x − a)","y = f′(a) + f(a)(x − a)","y = f′(a)x + f(a)","y = f(a)(x − a)"],`Le coefficient directeur est f′(a) et la droite passe par (a, f(a)).`),
 AQ("dv-quot","d","Dérivation",`(u / v)′ = …`,["(u′v − uv′) / v²","(uv′ − u′v) / v²","u′ / v′","(u′v + uv′) / v²"],`L'ordre compte : u′v d'abord, puis − uv′. Le signe + est celui du produit.`),
 AQ("dv-prod","d","Dérivation",`(uv)′ = …`,["u′v + uv′","u′v′","u′v − uv′","(u′v + uv′) / v²"],`Règle du produit : on dérive un facteur à la fois.`),
 AQ("dv-sqrt","d","Dérivation",`La dérivée de √(3x − 2) est…`,["3 / (2√(3x − 2))","1 / (2√(3x − 2))","3 / √(3x − 2)","3√(3x − 2) / 2"],`(√u)′ = u′/(2√u) avec u′ = 3. Elle existe pour x &gt; 2/3.`),
 AQ("dv-exp","d","Dérivation",`La dérivée de e^(5x²) est…`,["10x e^(5x²)","e^(5x²)","5x² e^(5x²)","10x e^(10x)"],`(eᵘ)′ = u′ eᵘ avec u = 5x², u′ = 10x.`),
 AQ("dv-ln","d","Dérivation",`Sur quel ensemble ln(2x − 6) est-elle définie ?`,["]3, +∞[","[3, +∞[","ℝ \\ {3}","]−∞, 3["],`ln exige un argument strictement positif : 2x − 6 &gt; 0 ⇔ x &gt; 3.`),
 AQ("dv-abs","d","Dérivation",`f(x) = |x| en 0 est…`,["continue mais pas dérivable","dérivable mais pas continue","dérivable et continue","ni continue ni dérivable"],`Le taux d'accroissement vaut 1 à droite et −1 à gauche : pas de limite unique. Dérivable ⇒ continue, mais pas l'inverse.`),
 AQ("dv-x3","d","Dérivation",`f′(x₀) = 0. Peut-on conclure que f a un extremum en x₀ ?`,["Non, il faut que f′ change de signe en x₀","Oui, toujours","Oui, si f est un polynôme","Non, jamais"],`Contre-exemple : f(x) = x³ en 0, f′(0) = 0 mais f est croissante. Il faut un changement de signe de f′.`),
 AQ("dv-glob","d","Dérivation",`f(x) = x³ − 3x a un maximum local f(−1) = 2. Est-il global ?`,["Non, car f tend vers +∞ en +∞","Oui, car f′(−1) = 0","Oui, car c'est le seul maximum","On ne peut pas savoir"],`Les limites aux bornes comptent : x³ − 3x → +∞, donc f dépasse 2 (par exemple f(3) = 18).`),
 AQ("dv-var","d","Dérivation",`f′(x) = 3(x − 1)(x − 3). Sur quel intervalle f est-elle décroissante ?`,["[1, 3]","]−∞, 1]","[3, +∞[","]−∞, 1] ∪ [3, +∞["],`Trinôme de coefficient 3 &gt; 0 : négatif entre les racines 1 et 3, donc f décroît sur [1, 3].`),
 AQ("dv-quot2","d","Dérivation",`La dérivée de (4x + 1) / (2x − 5) est…`,["−22 / (2x − 5)²","22 / (2x − 5)²","2 / (2x − 5)²","4 / 2"],`(4(2x − 5) − (4x + 1) × 2) / (2x − 5)² = (8x − 20 − 8x − 2) / (2x − 5)² = −22 / (2x − 5)².`),
 AQ("dv-comp","d","Dérivation",`(uⁿ)′ = …`,["n uⁿ⁻¹ u′","n uⁿ⁻¹","uⁿ⁻¹ u′","n u′ⁿ⁻¹"],`Dérivée d'une composée : on n'oublie pas le facteur u′.`),
 AQ("dv-tan5","d","Dérivation",`f(3) = 0 et f′(3) = −3. Quelle est la tangente en 3 ?`,["y = −3x + 9","y = −3x","y = −3x − 9","y = 3x − 9"],`y = f(3) + f′(3)(x − 3) = 0 − 3(x − 3) = −3x + 9 (feuille 3, ex. 5).`),
 AQ("dv-xx","d","Dérivation",`La dérivée de xˣ (x &gt; 0) est…`,["(ln x + 1) xˣ","x · xˣ⁻¹","xˣ ln x","xˣ"],`xˣ = e^(x ln x) ; (x ln x)′ = ln x + 1, donc (xˣ)′ = (ln x + 1) xˣ.`)
];
BANK.poly=[
 AQ("po-deg","p","Polynômes",`Quel est le degré de x² + 2x + 3 − (x − 1)² ?`,["1","2","0","3"],`On développe d'abord : x² + 2x + 3 − x² + 2x − 1 = 4x + 2, de degré 1.`),
 AQ("po-prod","p","Polynômes",`deg(P × Q) = …`,["deg P + deg Q","deg P × deg Q","max(deg P, deg Q)","deg P − deg Q"],`Les termes de plus haut degré se multiplient : aₙxⁿ × bₘxᵐ = aₙbₘxⁿ⁺ᵐ, avec aₙbₘ ≠ 0.`),
 AQ("po-sum","p","Polynômes",`P et Q sont de degré 4. Le degré de P + Q est…`,["au plus 4","toujours 4","toujours 8","au moins 4"],`Les termes en x⁴ peuvent s'annuler : (x⁴ + x) + (−x⁴ + x³) = x³ + x est de degré 3.`),
 AQ("po-nul","p","Polynômes",`Le degré du polynôme nul est, par convention…`,["−∞","0","1","non défini et sans convention"],`Une constante non nulle est de degré 0 ; le polynôme nul est de degré −∞.`),
 AQ("po-div","p","Polynômes",`Dans la division euclidienne A = BQ + R, on s'arrête quand…`,["deg R &lt; deg B","R = 0","deg R &lt; deg A","deg Q = deg B"],`Le reste doit être de degré strictement inférieur à celui du diviseur. Il n'est pas forcément nul.`),
 AQ("po-div2","p","Polynômes",`Division de 2x³ − 3x + 1 par −x² + 3x + 5 : quotient et reste ?`,["Q = −2x − 6, R = 25x + 31","Q = 2x + 6, R = 25x + 31","Q = −2x − 6, R = 0","Q = −2x, R = 6x² − 3x + 1"],`−x² × (−2x) = 2x³ ; on soustrait, puis −6 pour le terme en x². Vérification : (−x² + 3x + 5)(−2x − 6) + 25x + 31 = 2x³ − 3x + 1.`),
 AQ("po-rac","p","Polynômes",`α est racine de P. Alors P(x) est divisible par…`,["x − α","x + α","α","x² − α"],`P(α) = 0 ⇔ P(x) = (x − α)Q(x). Racine −2 ↔ facteur (x + 2).`),
 AQ("po-fac","p","Polynômes",`Quelle est la factorisation de 6x³ + 7x² − 9x + 2 ?`,["(x + 2)(2x − 1)(3x − 1)","(x − 2)(2x + 1)(3x + 1)","(x + 2)(6x² + 5x + 1)","(x + 1)(2x − 1)(3x − 2)"],`P(−2) = −48 + 28 + 18 + 2 = 0, donc P = (x + 2)(6x² − 5x + 1), et 6x² − 5x + 1 = (2x − 1)(3x − 1). Racines −2, 1/2, 1/3.`),
 AQ("po-nbr","p","Polynômes",`Un polynôme de degré 5 a…`,["au plus 5 racines, et au moins une","exactement 5 racines réelles","au plus 4 racines","aucune racine forcément"],`Degré n : au plus n racines. Un degré impair a au moins une racine réelle.`),
 AQ("po-x21","p","Polynômes",`Combien de racines réelles a x⁴ − 2x³ + 2x² − 2x + 1 = (x − 1)²(x² + 1) ?`,["Une seule : 1 (double)","Deux : 1 et −1","Quatre","Aucune"],`x² + 1 &gt; 0 n'a pas de racine réelle ; (x − 1)² donne la racine 1, double.`),
 AQ("po-coef","p","Polynômes",`Quel polynôme a pour coefficients (1, −5, 0, 4), du degré 3 au degré 0 ?`,["x³ − 5x² + 4","x³ − 5x² + 4x","x³ − 5x + 4","x² − 5x + 4"],`Le 0 correspond au terme en x : il n'y a pas de terme en x.`)
];

BANK.sys=[
 AQ("sy-se","cm","CM · Système",`Le noyau (kernel) d'un système d'exploitation…`,["gère la mémoire, les processus et les périphériques","est l'interface graphique","est un logiciel de traitement de texte","est le shell"],`Le noyau est la couche la plus proche du matériel : mémoire, ordonnancement des processus, pilotes, système de fichiers, droits.`),
 AQ("sy-linux","cm","CM · Système",`« Linux », au sens strict, désigne…`,["le noyau","une distribution complète","l'interface graphique","le shell Bash"],`Linux est le noyau. Fedora, Ubuntu, Debian sont des distributions : noyau + outils GNU + logiciels + interface graphique.`),
 AQ("sy-posix","cm","CM · Système",`Lequel de ces systèmes n'est <b>pas</b> conforme POSIX ?`,["Windows","macOS","GNU/Linux","FreeBSD"],`Windows n'est pas POSIX ; WSL permet d'y lancer un environnement GNU/Linux.`),
 AQ("sy-inode","cm","CM · Système",`Que ne contient <b>pas</b> l'inode d'un fichier ?`,["Son nom","Sa taille","Ses droits","Son propriétaire"],`L'inode décrit le fichier (taille, propriétaire, droits, dates) ; le nom est stocké dans le répertoire.`),
 AQ("sy-cache","cm","CM · Système",`Comment reconnaît-on un fichier caché sous Linux ?`,["Son nom commence par un point","Il a le droit h","Son nom finit par ~","Il est dans /hidden"],`.bashrc est caché : ls ne l'affiche pas, ls -a si.`),
 AQ("sy-casse","cm","CM · Système",`Metz.txt et metz.txt dans le même dossier…`,["sont deux fichiers différents","sont le même fichier","ne peuvent pas coexister","sont des liens"],`Les noms de fichiers Linux sont sensibles à la casse.`),
 AQ("sy-abs","cm","CM · Chemins",`Lequel est un chemin <b>absolu</b> ?`,["/home/alice/doc.txt","./doc.txt","../alice/doc.txt","doc.txt"],`Un chemin absolu commence par / (la racine). Les autres partent du dossier courant.`),
 AQ("sy-tilde","cm","CM · Chemins",`Dans un chemin, ~ désigne…`,["le dossier personnel de l'utilisateur","la racine","le dossier parent","le dossier courant"],`~ = /home/utilisateur. La racine est /, le parent .., le courant .`),
 AQ("sy-joker","cm","CM · Jokers",`Quels noms correspondent au joker shell <span class='f'>ch?t</span> ?`,["chat et chut","chat, chut et cht","chaat seulement","tous les noms qui commencent par ch"],`? remplace exactement un caractère : ni cht (0) ni chaat (2).`),
 AQ("sy-jok2","cm","CM · Jokers",`Dans le shell, <span class='f'>*</span> veut dire…`,["0, 1 ou plusieurs caractères quelconques","répéter le caractère précédent","exactement un caractère","un chiffre"],`C'est le joker du shell. En regex, * répète ce qui précède : ne pas confondre.`),
 AQ("sy-cd","cmd","Commandes",`Que fait <span class='f'>cd</span> tapé seul ?`,["Il ramène au dossier personnel","Il affiche le dossier courant","Il remonte à la racine","Il ne fait rien"],`cd sans argument = cd ~. pwd affiche le dossier courant.`),
 AQ("sy-mv","cmd","Commandes",`<span class='f'>mv rapport.txt bilan.txt</span> dans le même dossier…`,["renomme le fichier","crée une copie","supprime bilan.txt seulement","affiche une erreur"],`mv déplace ou renomme. Si bilan.txt existait, il est remplacé.`),
 AQ("sy-rmdir","cmd","Commandes",`<span class='f'>rmdir projet</span> échoue. Pourquoi, le plus probablement ?`,["Le dossier n'est pas vide","Il faut -p","rmdir supprime les fichiers seulement","Il faut être root"],`rmdir ne supprime qu'un dossier vide. Pour un dossier plein : rm -r (sans corbeille).`),
 AQ("sy-rm","cmd","Commandes",`Après <span class='f'>rm notes.txt</span>, le fichier…`,["est supprimé définitivement","va dans la corbeille","est caché","est vidé mais garde son nom"],`Le terminal n'a pas de corbeille : rm est définitif.`),
 AQ("sy-mkp","cmd","Commandes",`Quelle commande crée a/b/c même si a n'existe pas ?`,["mkdir -p a/b/c","mkdir a/b/c","touch a/b/c","mkdir -r a/b/c"],`-p crée les parents manquants et ne signale pas d'erreur si le dossier existe déjà.`),
 AQ("sy-head","cmd","Commandes",`Combien de lignes affiche <span class='f'>head fichier</span> par défaut ?`,["10","5","20","toutes"],`head et tail affichent 10 lignes par défaut ; -n 5 pour en avoir 5.`),
 AQ("sy-sort","cmd","Commandes",`Le fichier contient 9, 10 et 100, un par ligne. Que donne <span class='f'>sort</span> sans option ?`,["10, 100, 9","9, 10, 100","100, 10, 9","9, 100, 10"],`Sans -n, le tri est alphabétique : « 1 » avant « 9 ». sort -n trie numériquement.`),
 AQ("sy-uniq","cmd","Commandes",`Pourquoi écrit-on <span class='f'>sort f | uniq</span> ?`,["uniq ne retire que les doublons consécutifs","uniq trie aussi","sort ne marche pas seul","pour compter les lignes"],`Après le tri, les doublons sont côte à côte et uniq peut les retirer. sort -u fait les deux.`),
 AQ("sy-wc","cmd","Commandes",`<span class='f'>wc -l &lt; f</span> affiche…`,["le nombre de lignes, sans le nom du fichier","le nombre de mots","le nombre d'octets","les lignes de f"],`-l compte les lignes ; avec &lt;, wc lit l'entrée standard et n'affiche pas de nom.`),
 AQ("sy-find","cmd","Commandes",`Quelle commande cherche tous les .txt sous le dossier courant ?`,["find . -name \"*.txt\"","grep *.txt","ls *.txt -R","find *.txt"],`find parcourt récursivement ; -name prend un motif à protéger par des guillemets.`),
 AQ("sy-red1","cmd","Redirections",`<span class='f'>echo "A" &gt; f ; echo "B" &gt; f</span>. Que contient f ?`,["B","A puis B","A","rien"],`&gt; écrase le fichier à chaque fois. Avec &gt;&gt; pour le 2ᵉ echo, on aurait A puis B.`),
 AQ("sy-red2","cmd","Redirections",`Comment envoyer la sortie <b>et</b> les erreurs dans tout.txt ?`,["cmd &gt; tout.txt 2&gt;&amp;1","cmd 2&gt;&amp;1 tout.txt","cmd &gt;&gt; 2 tout.txt","cmd | tout.txt"],`On redirige d'abord stdout vers le fichier, puis 2&gt;&amp;1 envoie stderr au même endroit.`),
 AQ("sy-red3","cmd","Redirections",`Le numéro du flux d'erreur standard (stderr) est…`,["2","1","0","3"],`0 = stdin, 1 = stdout, 2 = stderr.`),
 AQ("sy-pipe","cmd","Redirections",`Que fait le tube dans <span class='f'>ls | grep ".txt"</span> ?`,["Il envoie la sortie de ls en entrée de grep","Il écrit dans un fichier grep","Il lance les deux commandes l'une après l'autre sans lien","Il compare leurs sorties"],`Le tube relie stdout de la 1ʳᵉ commande à stdin de la 2ᵉ.`),
 AQ("sy-oct","perm","Permissions",`Que vaut <span class='f'>rwxr-x---</span> en octal ?`,["750","751","640","570"],`rwx = 4 + 2 + 1 = 7, r-x = 4 + 1 = 5, --- = 0.`),
 AQ("sy-644","perm","Permissions",`<span class='f'>chmod 644 index.html</span> donne…`,["rw-r--r--","rwxr--r--","rw-rw-r--","r--r--r--"],`6 = rw-, 4 = r--. C'est la règle pour un fichier public.`),
 AQ("sy-arw","perm","Permissions",`Un fichier est en 755. Après <span class='f'>chmod a=rw f</span>, il est en…`,["666","755","777","644"],`= remplace les droits de tous (a) par rw : le x disparaît.`),
 AQ("sy-dirx","perm","Permissions",`Sur un <b>dossier</b>, le droit x permet de…`,["le traverser (entrer, accéder aux fichiers)","exécuter les scripts qu'il contient","lister les noms","créer des fichiers"],`r = lister les noms, w = créer ou supprimer dedans, x = traverser.`),
 AQ("sy-rnox","perm","Permissions",`Tu as r mais pas x sur un dossier. Tu peux…`,["voir les noms des fichiers, mais pas les ouvrir","ouvrir les fichiers, mais pas voir les noms","tout faire","rien du tout"],`C'est l'expérience du TP3 : ls affiche les noms, cat dossier/fichier donne Permission denied.`),
 AQ("sy-par","perm","Permissions",`Pour lire /home/alice/site/index.html, un autre utilisateur a besoin…`,["de x sur chaque dossier du chemin et de r sur le fichier","seulement de r sur le fichier","de w sur le dossier site","d'être dans le groupe root"],`Il faut traverser tous les dossiers parents (x), y compris /home/alice, puis lire le fichier (r).`),
 AQ("sy-umask","perm","Permissions",`Avec <span class='f'>umask 022</span>, un nouveau fichier est créé en…`,["644","755","022","666"],`Un fichier part de 666 au plus ; on retire 022 : 644. Un dossier part de 777 : 755.`),
 AQ("sy-um77","perm","Permissions",`Avec <span class='f'>umask 077</span>, un nouveau dossier est créé en…`,["700","600","077","777"],`777 moins 077 = 700 : seul le propriétaire y accède. Un fichier serait en 600.`),
 AQ("sy-chown","perm","Permissions",`Qui peut exécuter <span class='f'>chown bob f.txt</span> ?`,["root (ou via sudo)","le propriétaire de f.txt","tout membre du groupe","n'importe qui"],`Changer le propriétaire d'un fichier est réservé à l'administrateur.`),
 AQ("sy-test","perm","Permissions",`<span class='f'>test -r f &amp;&amp; echo OK</span> affiche OK. Qu'est-ce que cela prouve ?`,["Que <b>ton</b> compte peut lire f","Que tout le monde peut lire f","Que le groupe peut lire f","Que f est un script"],`test vérifie les droits du compte qui lance la commande, pas ceux des autres.`),
 AQ("sy-ux","perm","Permissions",`Quelle commande ajoute le droit d'exécution au seul propriétaire ?`,["chmod u+x script.sh","chmod +r script.sh","chmod o+x script.sh","chmod 444 script.sh"],`u = propriétaire, + = ajouter, x = exécution. Ensuite : ./script.sh.`),
 AQ("sy-anc","regex","Regex",`Quelle ligne est retenue par <span class='f'>grep -E '[01]{8}'</span> mais pas par <span class='f'>grep -E '^[01]{8}$'</span> ?`,["101010101","10101010","00000000","11111111"],`Sans ancres, 8 bits « quelque part » suffisent : 101010101 en contient. Avec ^…$, la ligne entière doit faire exactement 8 bits.`),
 AQ("sy-dot","regex","Regex",`En regex, un point non échappé <span class='f'>.</span> signifie…`,["n'importe quel caractère","un point","la fin de ligne","rien"],`Pour un point littéral, on écrit \\. ; sinon 192x168x1x2 passe pour une adresse IP.`),
 AQ("sy-quant","regex","Regex",`<span class='f'>{1,3}</span> dans une regex veut dire…`,["de 1 à 3 fois ce qui précède","exactement 13 fois","1 ou 3 fois seulement","les caractères 1 et 3"],`{n} = exactement n, {n,m} = de n à m. Attention : [0-9]{1,3} accepte 999.`),
 AQ("sy-ret","regex","Regex",`<span class='f'>echo "0101" | grep -Eq '^[01]{8}$' ; echo $?</span> affiche…`,["1","0","2","0101"],`4 bits seulement : aucune correspondance, code 1. 0 = trouvé, 2 = erreur. -q n'affiche rien d'autre.`),
 AQ("sy-mac","regex","Regex",`Une adresse MAC (6 paires hexa) code combien de bits ?`,["48","32","24","64"],`Une paire hexa = 2 chiffres de 4 bits = 8 bits ; 6 × 8 = 48.`),
 AQ("sy-cut","regex","Regex",`<span class='f'>echo 'PRETTY_NAME="Fedora Linux 41"' | cut -d '=' -f 2-</span> affiche…`,["\"Fedora Linux 41\"","Fedora Linux 41","PRETTY_NAME","=\"Fedora Linux 41\""],`cut garde le 2ᵉ champ et la suite, guillemets compris ; sed 's/"//g' les retire ensuite.`),
 AQ("sy-shebang","bash","Scripts Bash",`À quoi sert la 1ʳᵉ ligne <span class='f'>#!/usr/bin/env bash</span> ?`,["À choisir l'interpréteur quand on lance ./script.sh","C'est un commentaire sans effet","À rendre le script exécutable","À vérifier la syntaxe"],`C'est le shebang. Le droit x se donne avec chmod u+x ; la syntaxe se vérifie avec bash -n.`),
 AQ("sy-var","bash","Scripts Bash",`Laquelle de ces affectations est correcte en Bash ?`,["nom=\"Alice\"","nom = \"Alice\"","$nom=\"Alice\"","set nom \"Alice\""],`Aucun espace autour de = et pas de $ à gauche. Avec des espaces, Bash cherche une commande nom.`),
 AQ("sy-quote","bash","Scripts Bash",`Avec nom="Alice", <span class='f'>echo 'Bonjour $nom'</span> affiche…`,["Bonjour $nom","Bonjour Alice","Bonjour","une erreur"],`Les apostrophes empêchent le remplacement des variables. Avec des guillemets : Bonjour Alice.`),
 AQ("sy-subst","bash","Scripts Bash",`Que vaut <span class='f'>$(whoami)</span> dans un script ?`,["Le résultat de la commande whoami","La variable whoami","Le texte whoami","Le code retour de whoami"],`$( … ) est une substitution de commande. \${var} délimite seulement le nom d'une variable.`),
 AQ("sy-if","bash","Scripts Bash",`<span class='f'>if commande ; then … fi</span> exécute la branche then quand…`,["le code retour de la commande vaut 0","la commande affiche quelque chose","le code retour vaut 1","la commande échoue"],`En shell, 0 = succès = vrai. grep -q renvoie 0 s'il a trouvé une ligne.`),
 AQ("sy-dot2","bash","Scripts Bash",`Pourquoi tape-t-on <span class='f'>./script.sh</span> et pas <span class='f'>script.sh</span> ?`,["Le dossier courant n'est pas dans le PATH","Le point rend le script exécutable","C'est obligatoire pour Bash","Pour l'exécuter en root"],`Sans chemin, le shell cherche la commande dans les dossiers du PATH, qui ne contient pas le dossier courant.`),
 AQ("sy-crlf","bash","Scripts Bash",`Le script affiche <span class='f'>bash\r: No such file or directory</span>. La cause ?`,["Des fins de ligne Windows (CRLF) dans le script","Le droit x manquant","Une faute dans le nom du script","Bash n'est pas installé"],`Le \r (^M) vient d'un fichier enregistré avec CRLF. Il faut des fins de ligne LF.`),
 AQ("sy-n","bash","Scripts Bash",`Que fait <span class='f'>bash -n script.sh</span> ?`,["Il vérifie la syntaxe sans exécuter","Il exécute sans afficher","Il trace chaque ligne","Il rend le script exécutable"],`-n = vérification de syntaxe. -x trace l'exécution.`)
];
BANK.sysprat=[
 AQ("pt-arbo","prat","Pratique terminal",`Énoncé : « crée tp/preuves et tp/travail en une commande ». Laquelle ?`,["mkdir -p tp/{preuves,travail}","mkdir tp/preuves tp/travail -r","touch tp/{preuves,travail}","mkdir tp && preuves travail"],`Les accolades produisent tp/preuves et tp/travail ; -p crée tp au passage.`),
 AQ("pt-preuve","prat","Pratique terminal",`Énoncé : « enregistre la sortie de id puis celle de ls -ld site dans preuves/droits.txt ». Quelle suite ?`,["id &gt; preuves/droits.txt puis ls -ld site &gt;&gt; preuves/droits.txt","id &gt;&gt; preuves/droits.txt puis ls -ld site &gt; preuves/droits.txt","id | ls -ld site &gt; preuves/droits.txt","id &gt; preuves/droits.txt puis ls -ld site &gt; preuves/droits.txt"],`La 1ʳᵉ redirection repart de zéro (&gt;), les suivantes ajoutent (&gt;&gt;). Sinon la 2ᵉ écrase la 1ʳᵉ.`),
 AQ("pt-site","prat","Pratique terminal",`Énoncé : « le dossier site doit être traversable et lisible par tous, modifiable par toi seul ». Quel chmod ?`,["chmod 755 site","chmod 644 site","chmod 700 site","chmod 777 site"],`rwx pour toi, r-x pour groupe et autres. 644 retirerait x : personne ne pourrait entrer dans le dossier.`),
 AQ("pt-priv","prat","Pratique terminal",`Énoncé : « brouillon.html ne doit être lisible et modifiable que par toi ». Quel chmod ?`,["chmod 600 brouillon.html","chmod 700 brouillon.html","chmod 644 brouillon.html","chmod 400 brouillon.html"],`rw------- = 600. 700 ajouterait x (inutile pour une page), 400 empêcherait de modifier.`),
 AQ("pt-err","prat","Pratique terminal",`Énoncé : « garde la sortie et les erreurs de ls /root dans log.txt ». Quelle commande ?`,["ls /root &gt; log.txt 2&gt;&amp;1","ls /root 2&gt; log.txt","ls /root | log.txt","ls /root &gt; log.txt"],`2&gt;&amp;1 après &gt; envoie aussi les erreurs (Permission denied) dans le fichier.`),
 AQ("pt-grep","prat","Pratique terminal",`Énoncé : « affiche les lignes de bits.txt qui contiennent exactement 8 bits et rien d'autre ». Quelle commande ?`,["grep -E '^[01]{8}$' bits.txt","grep -E '[01]{8}' bits.txt","grep '01{8}' bits.txt","grep -E '^[0-1]+$' bits.txt"],`Les ancres ^ et $ imposent la ligne entière ; {8} impose 8 caractères 0 ou 1.`),
 AQ("pt-logins","prat","Pratique terminal",`Énoncé : « liste les logins de /etc/passwd, triés ». Quelle commande ?`,["cut -d: -f1 /etc/passwd | sort","cut -f1 /etc/passwd | sort","grep -f1 /etc/passwd","sort /etc/passwd | cut -d: -f2"],`Les champs de /etc/passwd sont séparés par « : » ; le login est le 1ᵉʳ.`),
 AQ("pt-count","prat","Pratique terminal",`Énoncé : « compte les lignes contenant INFO dans system.log ». Quelle commande ?`,["grep -c 'INFO' system.log","grep -n 'INFO' system.log","wc -c system.log","grep -v 'INFO' system.log | wc -l"],`-c compte les lignes qui correspondent. -v | wc -l compterait les autres.`)
];

BANK.clang=[
 AQ("c-ritchie","1","C · chap. 1",`Qui a créé le langage C, et pour écrire quel système ?`,["Dennis Ritchie, pour UNIX","Linus Torvalds, pour Linux","Ken Thompson, pour Windows","Bjarne Stroustrup, pour MS-DOS"],`Dennis Ritchie, Bell Labs, début des années 70, pour UNIX (avec Ken Thompson). C succède au langage B.`),
 AQ("c-main","1","C · chap. 1",`Quelle fonction tout programme C doit-il contenir ?`,["main","start","init","program"],`main est le point d'entrée, de type int (0 = succès).`),
 AQ("c-gcc","1","C · chap. 1",`Dans quel ordre gcc travaille-t-il ?`,["préprocesseur, compilation, édition de liens","compilation, préprocesseur, édition de liens","édition de liens, compilation, préprocesseur","compilation seulement"],`Le préprocesseur traite les #, la compilation produit des .o, l'édition de liens fabrique l'exécutable.`),
 AQ("c-wall","1","C · chap. 1",`Avec <span class='f'>gcc -Wall</span>, un warning…`,["n'empêche pas de produire l'exécutable","empêche la compilation","supprime le fichier source","est une erreur de syntaxe"],`-Wall affiche tous les avertissements ; seules les erreurs bloquent la compilation.`),
 AQ("c-div","2","C · chap. 2",`Que vaut <span class='f'>7 / 2</span> en C (deux int) ?`,["3","3.5","4","3.0 en float"],`Entre deux entiers, / est la division entière. 7 / 2. ou (float)7 / 2 donnent 3.5.`),
 AQ("c-mod","2","C · chap. 2",`Que vaut <span class='f'>-7 % 3</span> en C ?`,["−1","2","1","−2"],`En C, le reste a le signe du dividende : −7 = 3 × (−2) − 1.`),
 AQ("c-cast","2","C · chap. 2",`a = 5 et b = 2 sont des int. Que vaut <span class='f'>(float) a / b</span> ?`,["2.5","2.0","2","3"],`Le cast porte sur a seul (il est prioritaire), puis la division est réelle. (float)(a / b) vaudrait 2.0.`),
 AQ("c-conv","2","C · chap. 2",`<span class='f'>int i, j = 4; float x = 2.5; i = j + x;</span> Que vaut i ?`,["6","6.5","7","4"],`j + x = 6.5 est converti vers le type de gauche (int) : la partie décimale est perdue.`),
 AQ("c-pp","2","C · chap. 2",`<span class='f'>x = 2; y = ++x;</span> Que valent x et y ?`,["x = 3, y = 3","x = 3, y = 2","x = 2, y = 3","x = 2, y = 2"],`++x incrémente d'abord, puis la valeur 3 est affectée à y.`),
 AQ("c-pp2","2","C · chap. 2",`<span class='f'>x = 3; z = x--;</span> Que valent z et x ?`,["z = 3, x = 2","z = 2, x = 2","z = 3, x = 3","z = 2, x = 3"],`x-- donne d'abord la valeur 3 à z, puis x passe à 2.`),
 AQ("c-bool","2","C · chap. 2",`En C, que vaut l'expression <span class='f'>(5 &gt; 3)</span> ?`,["1","vrai","true","0"],`Pas de type booléen : une comparaison vraie vaut 1, fausse vaut 0, et toute valeur non nulle est « vraie ».`),
 AQ("c-define","2","C · chap. 2",`Quelle écriture de constante est correcte ?`,["#define PI 3.14159","#define PI = 3.14159;","#define PI 3.14159;","define PI 3.14159"],`#define fait un remplacement textuel : pas de = ni de ;.`),
 AQ("c-pow","2","C · chap. 2",`Comment calcule-t-on 2 puissance 10 en C ?`,["pow(2, 10) avec math.h","2 ^ 10","2 ** 10","2 ^^ 10"],`C n'a pas d'opérateur puissance ; ^ est le ou exclusif bit à bit. On compile avec -lm.`),
 AQ("c-else","3","C · chap. 3",`Dans <span class='f'>if (a) if (b) x = 1; else x = 2;</span>, à quel if se rattache le else ?`,["au 2ᵉ if (le plus proche sans else)","au 1ᵉʳ if","aux deux","c'est une erreur de compilation"],`Un else se rattache au dernier if sans else. Mettre des accolades pour être clair.`),
 AQ("c-switch","3","C · chap. 3",`Que se passe-t-il si on oublie <span class='f'>break</span> dans un case de switch ?`,["On exécute aussi les case suivants","Le programme ne compile pas","Le switch recommence","Rien de spécial"],`Sans break, l'exécution continue en cascade dans les case suivants.`),
 AQ("c-dowhile","3","C · chap. 3",`Quelle boucle exécute toujours son corps au moins une fois ?`,["do … while (cond);","while (cond) …","for (;;) …","aucune"],`do … while teste la condition après le corps. Ne pas oublier le ; final.`),
 AQ("c-cont","3","C · chap. 3",`<span class='f'>a = 0; for (i = 4; i &gt; 0; i--) { if (i == 2) continue; a = a + 2*i; }</span> Que vaut a ?`,["16","20","14","18"],`On ajoute 8, 6, puis on saute i = 2, puis 2 : 8 + 6 + 2 = 16. À la fin i = 0.`),
 AQ("c-break","3","C · chap. 3",`<span class='f'>a = 0; for (i = 4; i &gt; 0; i--) { a = a + 2*i; if (i == 2) break; }</span> Que vaut a ?`,["18","14","20","16"],`8 + 6 + 4 = 18 : a est augmenté de 4 avant le test i == 2. Le poly annonce 14, l'exécution donne 18.`),
 AQ("c-pf","3","C · chap. 3",`Qu'affiche <span class='f'>printf("[%5.2f]", 3.14159)</span> ?`,["[ 3.14]","[3.14159]","[3.14 ]","[03.14]"],`5 caractères au total dont 2 décimales, calé à droite : un espace puis 3.14.`),
 AQ("c-scanf","3","C · chap. 3",`Quelle lecture d'un entier n est correcte ?`,["scanf(\"%d\", &amp;n);","scanf(\"%d\", n);","scanf(\"%d\\n\", &amp;n);","scanf(n);"],`scanf a besoin de l'adresse de la variable (&amp;n), sauf pour une chaîne. Pas de \\n dans le format.`),
 AQ("c-valeur","4","C · chap. 4",`<span class='f'>void Permut(int a, int b)</span> échange a et b. Après <span class='f'>x = 3; y = 6; Permut(x, y);</span>…`,["x = 3 et y = 6 (rien n'a changé)","x = 6 et y = 3","erreur de compilation","x = y = 6"],`Passage par valeur : la fonction échange des copies. Il faut Permut(&amp;x, &amp;y) avec des paramètres int *.`),
 AQ("c-void","4","C · chap. 4",`Une fonction de type <span class='f'>void</span>…`,["ne renvoie pas de valeur","renvoie 0","renvoie un pointeur","ne peut pas avoir de paramètres"],`void correspond au module de l'algorithmique : une procédure.`),
 AQ("c-proto","4","C · chap. 4",`À quoi sert un prototype comme <span class='f'>int Max2(int a, int b);</span> ?`,["À déclarer la fonction avant de l'utiliser","À l'exécuter","À la rendre récursive","À la mettre dans main"],`Le compilateur connaît alors son type et ses paramètres, même si elle est définie plus bas.`),
 AQ("c-ptr","5","C · chap. 5",`<span class='f'>int i = 5; int *p = &amp;i; *p = 8;</span> Que vaut i ?`,["8","5","l'adresse de i","13"],`p contient l'adresse de i ; *p désigne i lui-même.`),
 AQ("c-malloc","5","C · chap. 5",`Quelle instruction réserve n entiers ?`,["p = (int *) malloc(n * sizeof(int));","p = malloc(n);","p = (int *) malloc(sizeof(n));","p = new int[n];"],`malloc prend un nombre d'octets : n × sizeof(int). On libère ensuite avec free(p). new est du C++.`),
 AQ("c-tab","6","C · chap. 6",`<span class='f'>int tab[5];</span> Quels indices sont valides ?`,["0 à 4","1 à 5","0 à 5","1 à 4"],`Les indices vont de 0 à n − 1. C ne vérifie pas les débordements.`),
 AQ("c-chaine","6","C · chap. 6",`Combien de cases faut-il pour stocker "bonjour" ?`,["8","7","6","9"],`7 caractères plus le '\\0' de fin.`),
 AQ("c-tabptr","6","C · chap. 6",`<span class='f'>tab[i]</span> est équivalent à…`,["*(tab + i)","*tab + i","&amp;tab + i","tab + i"],`Le nom du tableau est l'adresse du 1ᵉʳ élément ; tab + i pointe la case i.`),
 AQ("c-arrow","6","C · chap. 6",`p est un pointeur sur une structure personne. Comment lire son âge ?`,["p-&gt;age","p.age","*p.age","&amp;p.age"],`p-&gt;age ≡ (*p).age. *p.age est faux car . est prioritaire sur *.`),
 AQ("c-enum","6","C · chap. 6",`<span class='f'>enum couleur { bleu, rouge, blanc };</span> Quelle valeur a blanc ?`,["2","3","1","0"],`Les valeurs sont numérotées à partir de 0.`),
 AQ("c-fopen","7","C · chap. 7",`<span class='f'>fopen("f.txt", "w")</span>…`,["crée le fichier ou l'écrase","ajoute à la fin","échoue si le fichier existe","lit le fichier"],`"r" lit (le fichier doit exister), "w" crée ou écrase, "a" ajoute à la fin.`),
 AQ("c-pile","8","C · chap. 8",`Une pile fonctionne en…`,["LIFO : dernier entré, premier sorti","FIFO : premier entré, premier sorti","accès direct par indice","ordre trié"],`On dépile toujours le sommet, le dernier empilé. La file est FIFO.`),
 AQ("c-file","8","C · chap. 8",`On enfile 1, 2, 3 dans une file, puis on défile une fois. Quel élément sort ?`,["1","3","2","aucun"],`File = FIFO : le premier entré sort en premier.`),
 AQ("c-abr","9","C · chap. 9",`Quel parcours d'un arbre binaire de recherche donne les valeurs triées ?`,["infixé (gauche, racine, droite)","préfixé","postfixé","en largeur"],`Tout le sous-arbre gauche est plus petit que la racine, tout le droit plus grand.`),
 AQ("c-post","9","C · chap. 9",`Parcours postfixé de l'arbre de ((a − b) × 3) + (c × d) :`,["a b - 3 * c d * +","+ * - a b 3 * c d","a - b * 3 + c * d","a b 3 - * c d * +"],`Postfixé : gauche, droite, puis racine. Préfixé : + * - a b 3 * c d.`)
];

/* ---------- Outils ---------- */
function chsP(ans,cands,fb){const c=cands.slice();for(let t=0;t<60&&new Set([ans,...c].filter(x=>x!=null&&x!=="")).size<4;t++)c.push(fb(t));return chs(ans,c)}
function gcd(a,b){a=Math.abs(a);b=Math.abs(b);while(b){[a,b]=[b,a%b]}return a}
function Fr(n,d=1){if(d<0){n=-n;d=-d}const g=gcd(n,d)||1;return {n:n/g,d:d/g}}
const fadd=(a,b)=>Fr(a.n*b.d+b.n*a.d,a.d*b.d),fmul=(a,b)=>Fr(a.n*b.n,a.d*b.d),fdiv=(a,b)=>Fr(a.n*b.d,a.d*b.n),fneg=a=>Fr(-a.n,a.d);
function fstr(a){return (a.d===1?String(a.n):a.n+"/"+a.d).replace(/-/g,"−")}
function mmul(A,B){return A.map(r=>B[0].map((_,j)=>r.reduce((s,x,k)=>s+x*B[k][j],0)))}
function mkey(M){return JSON.stringify(M)}
function mhtml(M){return `<span class="mx"><span class="mxg" style="grid-template-columns:repeat(${M[0].length},auto)">${M.map(r=>r.map(x=>`<span>${typeof x==="object"?fstr(x):String(x).replace("-","−")}</span>`).join("")).join("")}</span></span>`}
function unimod(n,maxAbs){for(;;){let M=[...Array(n)].map((_,i)=>[...Array(n)].map((_,j)=>i===j?1:0));
  for(let k=0;k<n+3;k++){const i=rnd(n);let j=rnd(n);if(i===j)j=(i+1)%n;const c=pick([-2,-1,1,2]);M=M.map((r,ri)=>ri===i?r.map((x,ci)=>x+c*M[j][ci]):r)}
  if(rnd(3)===0){const i=rnd(n),j=(i+1)%n;[M[i],M[j]]=[M[j],M[i]]}
  if(M.flat().every(x=>Math.abs(x)<=maxAbs)&&M.flat().filter(x=>x===0).length<=n)return M}}
function gjSteps(A){const n=A.length;let R=A.map((r,i)=>r.map(x=>Fr(x)).concat([...Array(n)].map((_,j)=>Fr(i===j?1:0))));const st=[];
  const snap=op=>st.push(`<div class="gj-step"><span class="gj-op">${op}</span><div class="tscroll"><span class="mx aug"><span class="mxg" style="grid-template-columns:repeat(${2*n},auto)">${R.map(r=>r.map((x,j)=>`<span${j===n?' class="sep"':""}>${fstr(x)}</span>`).join("")).join("")}</span></span></div></div>`);
  snap("Départ (A | I)");
  for(let c=0;c<n;c++){let p=c;while(p<n&&R[p][c].n===0)p++;if(p===n)return {steps:st,inv:null};if(p!==c){[R[p],R[c]]=[R[c],R[p]];snap(`L${c+1} ↔ L${p+1}`)}
    const ops=[];for(let r=c+1;r<n;r++){if(R[r][c].n===0)continue;const f=fdiv(R[r][c],R[c][c]);R[r]=R[r].map((x,j)=>fadd(x,fneg(fmul(f,R[c][j]))));ops.push(`L${r+1} ← L${r+1} ${f.n>0?"−":"+"} ${fstr(Fr(Math.abs(f.n),f.d))==="1"?"":fstr(Fr(Math.abs(f.n),f.d))}L${c+1}`)}if(ops.length)snap(ops.join(" ; "))}
  for(let c=n-1;c>=0;c--){const ops=[];for(let r=c-1;r>=0;r--){if(R[r][c].n===0)continue;const f=fdiv(R[r][c],R[c][c]);R[r]=R[r].map((x,j)=>fadd(x,fneg(fmul(f,R[c][j]))));ops.push(`L${r+1} ← L${r+1} ${f.n>0?"−":"+"} ${fstr(Fr(Math.abs(f.n),f.d))==="1"?"":fstr(Fr(Math.abs(f.n),f.d))}L${c+1}`)}if(ops.length)snap(ops.join(" ; "))}
  const ops=[];for(let r=0;r<n;r++){const p=R[r][r];if(p.n===p.d)continue;R[r]=R[r].map(x=>fdiv(x,p));ops.push(`L${r+1} ← ${p.n===-p.d?"−":"(1/"+fstr(p)+") × "}L${r+1}`)}if(ops.length)snap(ops.join(" ; "));
  return {steps:st,inv:R.map(r=>r.slice(n))}}
const SUPX=n=>n===1?"":supN(n);
function pstr(c){/* c[k] = coefficient de x^k */const t=[];for(let k=c.length-1;k>=0;k--){const a=c[k];if(!a)continue;const ab=Math.abs(a);const m=k===0?String(ab):(ab===1?"":String(ab))+"x"+SUPX(k);t.push((a<0?"− ":"+ ")+m)}if(!t.length)return "0";let s=t.join(" ");return s.startsWith("+ ")?s.slice(2):"−"+s.slice(2)}
function pmul(a,b){const r=Array(a.length+b.length-1).fill(0);a.forEach((x,i)=>b.forEach((y,j)=>r[i+j]+=x*y));return r}
function padd(a,b){const r=Array(Math.max(a.length,b.length)).fill(0);a.forEach((x,i)=>r[i]+=x);b.forEach((x,i)=>r[i]+=x);while(r.length>1&&!r[r.length-1])r.pop();return r}
function pder(c){return c.length<2?[0]:c.slice(1).map((x,i)=>x*(i+1))}
function psym(c){return c.map((a,k)=>`(${a})*x**${k}`).join("+")||"0"}
function pval(c,x){return c.reduce((s,a,k)=>s+a*Math.pow(x,k),0)}
function lin(a,b){return pstr([b,a])}

Object.assign(GEN,{
 gjInv2(){let A;do{A=unimod(2,7)}while(A.flat().filter(x=>x===0).length>1);const det=A[0][0]*A[1][1]-A[0][1]*A[1][0];const inv=[[A[1][1]*det,-A[0][1]*det],[-A[1][0]*det,A[0][0]*det]];
  const c=[inv,[[A[1][1],A[0][1]],[A[1][0],A[0][0]]],[[-inv[0][0],-inv[0][1]],[-inv[1][0],-inv[1][1]]],[[inv[0][0],inv[1][0]],[inv[0][1],inv[1][1]]],[[A[0][0],-A[0][1]],[-A[1][0],A[1][1]]]];
  const keys=[];const opts=[];c.forEach(M=>{const k=mkey(M);if(!keys.includes(k)){keys.push(k);opts.push(M)}});const r=chsP(mkey(inv),keys.slice(1),t=>mkey(inv.map((r,i)=>r.map((x,j)=>i*2+j===t%4?x+(t%8<4?1:-1)*(1+(t>>3)):x))));
  return {id:"g-gj2",type:"mcq",noInterp:true,kind:"Inverse 2 × 2",q:`Quelle est l'inverse de A = ${mhtml(A)} ?`,choices:r.choices.map(k=>mhtml(JSON.parse(k))),answer:r.answer,_sym:{A,inv},
   expl:`ad − bc = ${frn(A[0][0]*A[1][1])} − ${frn(A[0][1]*A[1][0]).replace(/^(−.*)$/,"($1)")} = ${frn(det)} ≠ 0. On échange a et d, on change le signe de b et c, et on divise par ${frn(det)} : A<sup>−1</sup> = ${mhtml(inv)}. Vérification : A × A<sup>−1</sup> = ${mhtml(mmul(A,inv))}.`}},
 gjInv3(){const A=unimod(3,5);const {steps,inv}=gjSteps(A);const I=inv.map(r=>r.map(x=>x.n/x.d));
  const T=I[0].map((_,j)=>I.map(r=>r[j]));const N=I.map(r=>r.map(x=>-x));const S=I.map((r,i)=>r.map((x,j)=>i===1&&j===1?-x||1:x));const W=[I[1],I[0],I[2]];
  const keys=[mkey(I)];for(const M of [T,S,N,W])if(!keys.includes(mkey(M)))keys.push(mkey(M));const r=chs(keys[0],keys.slice(1));
  return {id:"g-gj3",type:"mcq",noInterp:true,kind:"Gauss-Jordan 3 × 3",q:`Calcule l'inverse de A = ${mhtml(A)} par Gauss-Jordan. Quel résultat trouves-tu ?`,choices:r.choices.map(k=>mhtml(JSON.parse(k))),answer:r.answer,_sym:{A,inv:I},
   expl:`Étapes (une façon de faire ; d'autres opérations mènent au même résultat) :${steps.join("")}A<sup>−1</sup> = ${mhtml(I)}. Vérification : A × A<sup>−1</sup> = ${mhtml(mmul(A,I))}.`}},
 gjSolve(){const A=unimod(3,4);const {inv}=gjSteps(A);const I=inv.map(r=>r.map(x=>x.n/x.d));const X=[[ri(-4,4)],[ri(-4,4)],[ri(-4,4)]];const B=mmul(A,X);
  const col=M=>`(${M.map(r=>frn(r[0])).join(" ; ")})`;const good=col(X);const r=chsP(good,[col(mmul(A,B)),col(X.map(r=>[-r[0]])),col([X[1],X[0],X[2]]),col(B)],t=>col(X.map((r,i)=>[i===t%3?r[0]+(t%6<3?1:-1)*(1+(t>>3)):r[0]])));
  return {id:"g-gjx",type:"mcq",noInterp:true,kind:"AX = B avec A⁻¹",q:`On a A = ${mhtml(A)}, A<sup>−1</sup> = ${mhtml(I)} et B = ${mhtml(B)}. Quelle est la solution X de AX = B ?`,...r,_sym:{A,inv:I,X,B},
   expl:`X = A<sup>−1</sup>B (A<sup>−1</sup> à gauche) : ${mhtml(I)} × ${mhtml(B)} = ${mhtml(X)}. Vérification : A × X = ${mhtml(mmul(A,X))} = B.`}},
 derivPoly(){const d=ri(3,4);const c=[...Array(d+1)].map(()=>ri(-6,6));c[d]=pick([-3,-2,1,2,3,4]);const dc=pder(c);
  const good=pstr(dc);const w1=pstr(c.slice(1));const w2=pstr(padd(dc,[c[0]]));const w3=pstr(c.map((a,k)=>k===0?0:a*k));const w4=pstr(dc.map((a,k)=>k===0?a:-a));
  const r=chs(good,[w1,w2,w3,w4]);
  return {id:"g-dpoly",type:"mcq",noInterp:true,kind:"Dériver un polynôme",q:`Quelle est la dérivée de f(x) = ${pstr(c)} ?`,...r,_sym:{f:psym(c),d:psym(dc)},
   expl:`(xⁿ)′ = n xⁿ⁻¹ terme par terme, et la constante disparaît : f′(x) = <b>${good}</b>.`}},
 derivRule(){const t=rnd(5);let a=pick([1,2,3,4,5,-2,-3]),b=ri(-6,6)||1,cc=pick([1,2,3,-1,-2]),dd=ri(-5,5)||2;
  if(t===0){while(a*dd-b*cc===0)dd++;const N=a*dd-b*cc;const den=`(${lin(cc,dd)})²`;const good=`${frn(N)} / ${den}`;const r=chs(good,[`${frn(-N)} / ${den}`,`${frn(N)} / (${lin(cc,dd)})`,`${frn(a)} / ${frn(cc)}`,`${frn(a*dd+b*cc)} / ${den}`]);
   return {id:"g-drule",type:"mcq",noInterp:true,kind:"Dérivée d'un quotient",q:`Quelle est la dérivée de f(x) = (${lin(a,b)}) / (${lin(cc,dd)}), pour x ≠ ${fstr(Fr(-dd,cc))} ?`,...r,_sym:{f:`(${a}*x+${b})/(${cc}*x+${dd})`,d:`(${N})/(${cc}*x+${dd})**2`},
    expl:`(u/v)′ = (u′v − uv′)/v² avec u′ = ${frn(a)}, v′ = ${frn(cc)} : ${frn(a)}(${lin(cc,dd)}) − ${frn(cc)}(${lin(a,b)}) = ${frn(a*dd)} − (${frn(b*cc)}) = ${frn(N)}. Donc f′(x) = <b>${good}</b>.`}}
  if(t===1){a=Math.abs(a);if(a<2)a=ri(2,4);const good=`${frn(a)} / (2√(${lin(a,b)}))`;const D=`x &gt; ${fstr(Fr(-b,a))}`;const r=chs(good,[`1 / (2√(${lin(a,b)}))`,`${frn(a)} / √(${lin(a,b)})`,`${frn(a)}√(${lin(a,b)}) / 2`]);
   return {id:"g-drule",type:"mcq",noInterp:true,kind:"Dérivée de √u",q:`Quelle est la dérivée de f(x) = √(${lin(a,b)}) ?`,...r,_sym:{f:`sqrt(${a}*x+${b})`,d:`${a}/(2*sqrt(${a}*x+${b}))`},
    expl:`(√u)′ = u′/(2√u) avec u′ = ${frn(a)}. f est définie pour ${lin(a,b)} ≥ 0 et dérivable pour ${D}. f′(x) = <b>${good}</b>.`}}
  if(t===2){const k=ri(1,4);const u=pstr([b,0,k]);const good=`${frn(2*k)}x e^(${u})`.replace(/^1x/,"x");const r=chs(good,[`e^(${u})`,`${frn(k)}x² e^(${u})`,`${frn(2*k)}x e^(${frn(2*k)}x)`.replace(/^1x/,"x")]);
   return {id:"g-drule",type:"mcq",noInterp:true,kind:"Dérivée de eᵘ",q:`Quelle est la dérivée de f(x) = e^(${u}) ?`,...r,_sym:{f:`exp(${k}*x**2+${b})`,d:`${2*k}*x*exp(${k}*x**2+${b})`},
    expl:`(eᵘ)′ = u′ eᵘ avec u = ${u}, u′ = ${frn(2*k)}x. f′(x) = <b>${good}</b> (définie sur ℝ).`}}
  if(t===3){const n=ri(2,5);const good=`${frn(n*a)}(${lin(a,b)})${SUPX(n-1)}`;const r=chs(good,[`${n}(${lin(a,b)})${SUPX(n-1)}`,`${frn(n*a)}(${lin(a,b)})${SUPX(n)}`,`${frn(a)}(${lin(a,b)})${SUPX(n-1)}`,`${frn(n*a)}x${SUPX(n-1)}`]);
   return {id:"g-drule",type:"mcq",noInterp:true,kind:"Dérivée de uⁿ",q:`Quelle est la dérivée de f(x) = (${lin(a,b)})${supN(n)} ?`,...r,_sym:{f:`(${a}*x+${b})**${n}`,d:`${n*a}*(${a}*x+${b})**${n-1}`},
    expl:`(uⁿ)′ = n uⁿ⁻¹ u′ avec u′ = ${frn(a)} : ${n} × ${frn(a)} = ${frn(n*a)}, donc f′(x) = <b>${good}</b>. Ne pas oublier u′.`}}
  a=Math.abs(a);if(a<2)a=ri(2,4);const good=`${frn(a)} / (${lin(a,b)})`;const r=chs(good,[`1 / (${lin(a,b)})`,`${frn(a)} ln(${lin(a,b)})`,`${frn(-a)} / (${lin(a,b)})²`]);
  return {id:"g-drule",type:"mcq",noInterp:true,kind:"Dérivée de ln u",q:`Sur ]${fstr(Fr(-b,a))}, +∞[, quelle est la dérivée de f(x) = ln(${lin(a,b)}) ?`,...r,_sym:{f:`log(${a}*x+${b})`,d:`${a}/(${a}*x+${b})`},
   expl:`(ln u)′ = u′/u avec u′ = ${frn(a)}. f est définie quand ${lin(a,b)} &gt; 0, c'est-à-dire x &gt; ${fstr(Fr(-b,a))}. f′(x) = <b>${good}</b>.`}},
 tangent(){const c=[ri(-5,5),ri(-4,4),pick([-2,-1,1,2,3])];if(rnd(2))c.push(pick([-1,1]));const x0=ri(-2,2);const f0=pval(c,x0),m=pval(pder(c),x0),p=f0-m*x0;
  const ln=(m,p)=>`y = ${pstr([p,m])}`;const good=ln(m,p);const r=chsP(good,[ln(m,f0),ln(f0,m),ln(m,f0+m*x0),ln(-m,f0+m*x0),ln(m,p+1)],t=>[ln(m,p-1-t),ln(m+1+t,p),ln(-m,p),ln(2*m,p),ln(m,-p)][t%5]);
  return {id:"g-tan",type:"mcq",noInterp:true,kind:"Équation de tangente",q:`f(x) = ${pstr(c)}. Quelle est l'équation de la tangente à la courbe de f au point d'abscisse ${frn(x0)} ?`,...r,_sym:{f:psym(c),x0,m,p},
   expl:`f(${frn(x0)}) = ${frn(f0)}, f′(x) = ${pstr(pder(c))} donc f′(${frn(x0)}) = ${frn(m)}. y = f(${frn(x0)}) + f′(${frn(x0)})(x − ${frn(x0)}) = ${frn(f0)} ${m<0?"−":"+"} ${Math.abs(m)}(x ${x0<0?"+":"−"} ${Math.abs(x0)}) : <b>${good}</b>.`}},
 variations(){let r1,r2;do{r1=ri(-4,3);r2=ri(r1+1,5)}while((r1+r2)%2);const d=ri(-5,5);const c=[d,3*r1*r2,-3*(r1+r2)/2,1];const f1=pval(c,r1),f2=pval(c,r2);const t=rnd(2);
  if(t===0){const good=`[${frn(r1)}, ${frn(r2)}]`;const r=chs(good,[`]−∞, ${frn(r1)}]`,`[${frn(r2)}, +∞[`,`]−∞, ${frn(r1)}] ∪ [${frn(r2)}, +∞[`]);
   return {id:"g-var",type:"mcq",noInterp:true,kind:"Variations",q:`f(x) = ${pstr(c)}. Sur quel intervalle f est-elle <b>décroissante</b> ?`,...r,_sym:{f:psym(c),r1,r2},
    expl:`f′(x) = ${pstr(pder(c))} = 3(x ${r1<0?"+":"−"} ${Math.abs(r1)})(x ${r2<0?"+":"−"} ${Math.abs(r2)}). Trinôme de coefficient 3 &gt; 0 : négatif entre les racines. f décroît sur <b>${good}</b> et croît ailleurs.`}}
  const good=`maximum local ${frn(f1)} en x = ${frn(r1)}`;const r=chs(good,[`maximum local ${frn(f2)} en x = ${frn(r2)}`,`minimum local ${frn(f1)} en x = ${frn(r1)}`,`maximum global ${frn(f1)} en x = ${frn(r1)}`]);
  return {id:"g-var",type:"mcq",noInterp:true,kind:"Extremums",q:`f(x) = ${pstr(c)}, définie sur ℝ. Quelle affirmation est vraie ?`,...r,_sym:{f:psym(c),r1,r2,f1,f2},
   expl:`f′(x) = 3(x ${r1<0?"+":"−"} ${Math.abs(r1)})(x ${r2<0?"+":"−"} ${Math.abs(r2)}) : + puis − en ${frn(r1)} (maximum local f(${frn(r1)}) = ${frn(f1)}), − puis + en ${frn(r2)} (minimum local f(${frn(r2)}) = ${frn(f2)}). Aucun n'est global : f → −∞ en −∞ et +∞ en +∞.`}},
 polyDiv(){const db=rnd(2)?1:2;const B=db===1?[ri(-4,4)||1,1]:[ri(-3,3),ri(-3,3),1];const Q=[ri(-5,5),ri(-4,4),pick([1,2,-1,3])];const R=db===1?[ri(-6,6)]:[ri(-6,6),ri(-5,5)];const A=padd(pmul(B,Q),R);
  const L=(q,r)=>`Q = ${pstr(q)}, R = ${pstr(r)}`;const good=L(Q,R);const Q2=Q.slice();Q2[0]+=1;const R2=padd(R,[-B[0]]);
  const res=chsP(good,[L(Q.map(x=>-x),R),L(Q2,R2.map(x=>x)),L(Q,R.map(x=>-x)),L(Q,[0])],t=>L(Q.map((x,i)=>i===t%2?x+(t%4<2?1:-1)*(1+(t>>2)):x),R));
  return {id:"g-pdiv",type:"mcq",noInterp:true,kind:"Division euclidienne de polynômes",q:`Division euclidienne de A(x) = ${pstr(A)} par B(x) = ${pstr(B)} : quel est le couple (Q, R) ?`,...res,_sym:{A:psym(A),B:psym(B),Q:psym(Q),R:psym(R)},
   expl:`On vérifie A = BQ + R avec deg R &lt; deg B = ${db} : (${pstr(B)})(${pstr(Q)}) = ${pstr(pmul(B,Q))}, plus ${pstr(R)} donne ${pstr(A)}. Donc <b>${good}</b>. Méthode : diviser le terme de plus haut degré de A par celui de B, multiplier, soustraire, recommencer.`}},
 polyFactor(){const r1=pick([-3,-2,-1,1,2,3]);let r2=pick([-3,-2,-1,1,2,3]);while(r2===r1)r2=pick([-3,-2,-1,1,2,3]);const half=rnd(2);const k=half?pick([1,-1,3,-3]):ri(-4,4);
  const f3=half?[-k,2]:[-k,1];/* (2x − k) ou (x − k) */const P=pmul(pmul([-r1,1],[-r2,1]),f3);
  const root3=half?Fr(k,2):Fr(k,1);const roots=[Fr(r1),Fr(r2),root3].filter((v,i,a)=>a.findIndex(w=>w.n===v.n&&w.d===v.d)===i).sort((a,b)=>a.n/a.d-b.n/b.d);
  const S=rs=>"{"+rs.map(fstr).join(" ; ")+"}";const good=S(roots);const opp=S(roots.map(fneg).sort((a,b)=>a.n/a.d-b.n/b.d));
  const res=chs(good,[opp,S(roots.slice(0,-1)),S(roots.map((v,i)=>i===0?fneg(v):v).sort((a,b)=>a.n/a.d-b.n/b.d)),S(roots.concat([Fr(0)]).sort((a,b)=>a.n/a.d-b.n/b.d))]);
  const fac=`(x ${r1<0?"+":"−"} ${Math.abs(r1)})(x ${r2<0?"+":"−"} ${Math.abs(r2)})(${half?lin(2,-k):lin(1,-k)})`;const P2=P.map(x=>-x);const Pn=P[P.length-1]<0?P2:P;
  return {id:"g-pfac",type:"mcq",noInterp:true,kind:"Racines et factorisation",q:`P(x) = ${pstr(Pn)}. ${frn(r1)} est une racine évidente. Quelles sont toutes les racines de P ?`,...res,_sym:{P:psym(Pn),roots:roots.map(fstr)},
   expl:`P(${frn(r1)}) = 0, donc on divise par (x ${r1<0?"+":"−"} ${Math.abs(r1)}) puis on factorise le quotient (Δ ou racine évidente) : P(x) = ${P[P.length-1]<0?"−":""}${fac}. Racines : <b>${good}</b>. Une racine α correspond au facteur (x − α).`}},
 polyDeg(){const t=rnd(3);let e,c;
  if(t===0){const a=ri(1,4),b=ri(1,5),d=ri(-5,5)||1;e=`(${lin(a,b)})² − ${a*a===1?"":a*a}x²`;c=padd(pmul([b,a],[b,a]),[0,0,-a*a])}
  else if(t===1){const a=ri(1,3),b=ri(-4,4)||1;e=`(${pstr([0,b,1])})(x − ${a}) − x³`;c=padd(pmul([0,b,1],[-a,1]),[0,0,0,-1])}
  else{const a=ri(2,4);e=`(x${supN(a)} + 1)(x − 1) − x${supN(a+1)}`;c=padd(pmul([1,...Array(a-1).fill(0),1],[-1,1]),[...Array(a+1).fill(0),-1])}
  while(c.length>1&&!c[c.length-1])c.pop();const deg=c.length===1&&!c[0]?"−∞":String(c.length-1);const naive=String(Math.max(...[2,3,5].filter(x=>x>=c.length)));
  const r=chs(deg,[String(Number(deg)+1),String(Number(deg)+2),naive,String(Math.max(0,Number(deg)-1))]);
  return {id:"g-pdeg",type:"mcq",noInterp:true,kind:"Degré d'un polynôme",q:`Quel est le degré de ${e} ?`,...r,_sym:{e:psym(c),deg},
   expl:`On développe d'abord : ${e} = ${pstr(c)}. Le terme de plus haut degré qui reste est de degré <b>${deg}</b> ; les termes de plus haut degré se sont annulés.`}}
});

/* ---------- R1.04 ---------- */
const RWX=d=>(d&4?"r":"-")+(d&2?"w":"-")+(d&1?"x":"-");
const permS=o=>o.map(RWX).join("");
const permO=o=>o.join("");
function applySym(o,spec){const r=o.slice();spec.split(",").forEach(p=>{const m=/^([ugoa]+)([+\-=])([rwx]+)$/.exec(p);const who=m[1].replace("a","ugo");const bits=[...m[3]].reduce((s,c)=>s|({r:4,w:2,x:1})[c],0);
  for(const w of who){const i="ugo".indexOf(w);r[i]=m[2]==="+"?r[i]|bits:m[2]==="-"?r[i]&~bits:bits}});return r}
Object.assign(GEN,{
 permOct(){const o=[pick([7,6,5,4]),pick([7,5,4,6,0]),pick([5,4,1,0,7])];const s=permS(o),n=permO(o);const t=rnd(2);
  const near=[[o[0],o[2],o[1]],[o[0]^1,o[1],o[2]],[o[0],o[1]^1,o[2]],[o[0],o[1],o[2]^4],[o[2],o[1],o[0]]].map(x=>x.map(v=>v&7));
  if(t===0){const r=chs(n,near.map(permO));return {id:"g-perm",type:"mcq",noInterp:true,kind:"rwx → octal",q:`Quels droits octaux correspondent à <span class='f'>-${s}</span> ?`,...r,_chk:{s,n},expl:`Par triplet : r = 4, w = 2, x = 1. ${s.slice(0,3)} = ${o[0]}, ${s.slice(3,6)} = ${o[1]}, ${s.slice(6)} = ${o[2]} → <b>${n}</b>.`}}
  const r=chs(s,near.map(permS));return {id:"g-perm",type:"mcq",noInterp:true,kind:"octal → rwx",q:`Après <span class='f'>chmod ${n} f</span>, que montre <span class='f'>ls -l f</span> ?`,...r,choices:r.choices.map(x=>"-"+x),_chk:{s,n},expl:`${o[0]} = ${RWX(o[0])} (propriétaire), ${o[1]} = ${RWX(o[1])} (groupe), ${o[2]} = ${RWX(o[2])} (autres) : <b>-${s}</b>.`}},
 chmodSym(){const o=[pick([7,6,5,4]),pick([7,5,4,6,0]),pick([5,4,1,0])];const parts=shuffle([`u${pick(["+","-"])}${pick(["x","w","r"])}`,`g${pick(["+","-","="])}${pick(["r","w","rx","x"])}`,`o${pick(["+","-","="])}${pick(["r","x","rw",""])||"r"}`]).slice(0,ri(1,3));
  const spec=pick([parts.join(","),pick(["a=rw","a+x","ug-w","go-rwx","u=rwx,go=rx"])]);const res=applySym(o,spec);const n=permO(res);
  const wrong=[permO(applySym(o,spec.replace(/\+/g,"#").replace(/-/g,"+").replace(/#/g,"-"))),permO(o),permO(res.map((v,i)=>i===2?v^4:v)),permO(res.map((v,i)=>i===0?v^1:v))];const r=chsP(n,wrong,t=>permO(res.map((v,i)=>i===t%3?v^[1,2,4][(t>>1)%3]:v)));
  return {id:"g-chsym",type:"mcq",noInterp:true,kind:"chmod symbolique",q:`Le fichier est en <span class='f'>${permO(o)}</span> (${permS(o)}). Quels droits octaux après <span class='f'>chmod ${spec} f</span> ?`,...r,_chk:{o:permO(o),spec,n},
   expl:`${spec.split(",").map(p=>`<span class='f'>${p}</span>`).join(", ")} : + ajoute, − retire, = remplace exactement (a = u, g et o). On passe de ${permS(o)} à ${permS(res)}, soit <b>${n}</b>.`}},
 umaskQ(){const m=[0,pick([0,2,7,2]),pick([2,7,5,7,0])];const dir=rnd(2);const base=dir?7:6;const res=m.map(x=>base&~x);const n=permO(res);
  const wrong=[permO(m),permO(m.map(x=>(dir?6:7)&~x)),permO(m.map(x=>(base-x+8)%8)),permO(m.map(x=>7&~x).map((v,i)=>i===0?v:v))];const r=chsP(n,wrong,t=>permO(res.map((v,i)=>i===1+t%2?v^[1,2,4][(t>>1)%3]:v)));
  return {id:"g-umask",type:"mcq",noInterp:true,kind:"umask",q:`Avec <span class='f'>umask ${permO(m).padStart(3,"0")}</span>, quels droits a un nouveau <b>${dir?"dossier (mkdir)":"fichier (touch)"}</b> ?`,...r,_chk:{m:permO(m),dir,n},
   expl:`${dir?"Un dossier":"Un fichier"} part de ${dir?"777":"666"} ; l'umask retire ses bits : ${dir?"777":"666"} − ${permO(m)} → <b>${n}</b> (${permS(res)}).${dir?"":" Un fichier n'a jamais x à sa création."}`}},
 canAccess(){const t=rnd(2);const who=pick([["Toi (alice, la propriétaire), peux-tu",0,"toi"],["Bob, membre du groupe projet, peut-il",1,"Bob"],["Carla, qui n'est pas dans le groupe, peut-elle",2,"Carla"]]);
  if(t===0){const o=[pick([7,6,4]),pick([6,4,0,5]),pick([4,0,1])];const act=pick([["lire",4],["modifier",2]]);const ok=!!(o[who[1]]&act[1]);
   const good=ok?"Oui":`Non : il manque le droit ${act[1]===4?"r":"w"}`;const r=chs(good,["Oui","Non : il manque le droit r","Non : il manque le droit w","Non : seul root peut"]);
   return {id:"g-acc",type:"mcq",noInterp:true,kind:"Qui peut faire quoi ?",q:`<span class='f'>-${permS(o)} 1 alice projet 120 notes.txt</span>. ${who[0]} <b>${act[0]}</b> notes.txt (le dossier est traversable) ?`,...r,
    expl:`Le triplet qui compte pour ${who[2]} est celui ${["du propriétaire","du groupe","des autres"][who[1]]} : <span class='f'>${permS(o).slice(3*who[1],3*who[1]+3)}</span>. ${act[0]==="lire"?"Lire demande r":"Modifier demande w"} : <b>${good}</b>.`}}
  const dp=[7,pick([5,0,4,1]),pick([5,0,1,4])],fp=[6,pick([4,0,6]),pick([4,0])];const k=who[1];const hasX=!!(dp[k]&1),hasR=!!(fp[k]&4);
  const good=hasX&&hasR?"Oui":!hasX?"Non : pas de x sur le dossier brouillons":"Non : pas de r sur le fichier";const r=chs(good,["Oui","Non : pas de x sur le dossier brouillons","Non : pas de r sur le fichier","Non : il faut w sur le dossier"]);
  return {id:"g-acc",type:"mcq",noInterp:true,kind:"Traverser un dossier",q:`<span class='f'>d${permS(dp)} alice projet brouillons</span> et dans ce dossier <span class='f'>-${permS(fp)} alice projet page.html</span>. ${who[0]} lire brouillons/page.html ?`,...r,
   expl:`Il faut x sur le dossier (traverser) <b>et</b> r sur le fichier. Triplet ${["propriétaire","groupe","autres"][k]} : dossier <span class='f'>${permS(dp).slice(3*k,3*k+3)}</span>, fichier <span class='f'>${permS(fp).slice(3*k,3*k+3)}</span>. Donc <b>${good}</b>.`}},
 grepLines(){const S=pick([
   {re:"[01]{8}",lines:["10101010","101010101","x10101010y","1010101","00000000"]},
   {re:"^[01]{8}$",lines:["10101010","101010101","x10101010y","1010101","11111111"]},
   {re:"^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$",lines:["A4:5E:60:12:AB:09","a4:5e:60:12:ab:09","A4:5E:60:12:AB","A4-5E-60-12-AB-09","AG:5E:60:12:AB:09"]},
   {re:"^([0-9]{1,3}\\.){3}[0-9]{1,3}$",lines:["192.168.1.2","256.1.2.3","192.168.1","192x168x1x2","10.0.0.1"]},
   {re:"^([0-9]{1,3}.){3}[0-9]{1,3}$",lines:["192.168.1.2","192x168x1x2","192.168.1","1.2.3.4.5","10.0.0.1"]},
   {re:"^chat",lines:["chat noir","le chat","chaton","Chat","chat"]},
   {re:"[0-9]+$",lines:["port 8080","8080 port","version 2","v2.0","aucun"]},
   {re:"^(oui|non)$",lines:["oui","non","ouinon","Oui","non merci"]}]);
  const R=new RegExp(S.re);const m=S.lines.filter(l=>R.test(l));const sl=a=>a.length?a.join(" · "):"aucune ligne";const good=sl(m);
  const anch=new RegExp("^(?:"+S.re.replace(/^\^/,"").replace(/\$$/,"")+")$");const alt=[sl(S.lines.filter(l=>!R.test(l))),sl(S.lines),sl(S.lines.filter(l=>anch.test(l))),sl(m.slice(1)),sl(S.lines.filter(l=>new RegExp(S.re,"i").test(l)))];
  const r=chs(good,alt);
  return {id:"g-grep",type:"mcq",noInterp:true,kind:"Quelles lignes ?",q:`Le fichier contient les lignes :<div class="tscroll"><pre class="f" style="margin:6px 0">${S.lines.map(esc).join("\n")}</pre></div>Lesquelles affiche <span class='f'>grep -E '${esc(S.re)}' f</span> ?`,...r,choices:r.choices.map(esc),_chk:{re:S.re,lines:S.lines,ans:m},
   expl:`Retenues : <b>${esc(good)}</b>. ${/^\^/.test(S.re)&&/\$$/.test(S.re)?"Avec ^ et $, la ligne entière doit correspondre.":"Sans ^…$, il suffit que le motif apparaisse quelque part dans la ligne."}${/\{1,3\}/.test(S.re)?" {1,3} compte les chiffres, il ne limite pas la valeur à 255.":""}${/\)\.\{|[^\\]\./.test(S.re)&&!/\\\./.test(S.re)?" Le point non échappé accepte n'importe quel caractère.":""} grep est sensible à la casse sans -i.`}},
 cutField(){const u=pick([["alice","x","1001","1001","Alice Martin","/home/alice","/bin/bash"],["bob","x","1002","100","Bob Durand","/home/bob","/bin/zsh"],["www-data","x","33","33","www-data","/var/www","/usr/sbin/nologin"]]);const line=u.join(":");
  const t=rnd(3);let f,ans;if(t===0){const k=ri(1,7);f=String(k);ans=u[k-1]}else if(t===1){const k=ri(5,6);f=k+"-";ans=u.slice(k-1).join(":")}else{const a=ri(1,3),b=ri(5,7);f=a+","+b;ans=u[a-1]+":"+u[b-1]}
  const r=chs(ans,[u[0],u.slice(0,2).join(":"),u[(parseInt(f)||1)%7],u[(parseInt(f)||1)-2>=0?(parseInt(f)||1)-2:6],line]);
  return {id:"g-cut",type:"mcq",noInterp:true,kind:"cut",q:`Qu'affiche <span class='f'>echo '${line}' | cut -d ':' -f ${f}</span> ?`,...r,choices:r.choices.map(esc),_chk:{line,f,ans},
   expl:`Les champs séparés par « : » sont numérotés à partir de 1. <span class='f'>-f ${f}</span> ${t===1?"garde le champ "+parseInt(f)+" et tous les suivants (avec leurs séparateurs)":t===2?"garde les champs "+f.replace(","," et ")+", rejoints par le délimiteur":"garde le champ "+f} : <b>${esc(ans)}</b>.`}},
 redirSeq(){const words=shuffle(["alpha","bravo","charlie","delta"]).slice(0,3);const ops=words.map((w,i)=>i===0?pick([">",">>"]):pick([">",">>"]));let content=[];
  const lines=words.map((w,i)=>{if(ops[i]===">")content=[w];else content.push(w);return `echo "${w}" ${ops[i]} f.txt`});
  const sl=a=>a.join(" puis ");const good=sl(content);const r=chs(good,[sl(words),sl([words[2]]),sl(words.slice().reverse()),sl([words[0]]),sl(words.slice(1))]);
  return {id:"g-redir",type:"mcq",noInterp:true,kind:"&gt; et &gt;&gt;",q:`f.txt n'existe pas. On tape :<div class="tscroll"><pre class="f" style="margin:6px 0">${esc(lines.join("\n"))}</pre></div>Que contient f.txt (ligne par ligne) ?`,...r,_sh:lines.join("\n")+"\ncat f.txt",_ans:content,
   expl:`&gt; crée ou <b>écrase</b>, &gt;&gt; <b>ajoute</b> à la fin. ${ops.map((o,i)=>`${words[i]} avec ${o==">"?"&gt;":"&gt;&gt;"}`).join(", ")} : il reste <b>${good}</b>.`}},
 grepRet(){const S=pick([["^[01]{8}$",["10101010","1010101","101010102","00000000"]],["^[0-9]{1,3}$",["42","1234","007","4a"]],["^(oui|non)$",["oui","Oui","non","ouinon"]]]);const v=pick(S[1]);const code=new RegExp(S[0]).test(v)?0:1;
  const r=chs(String(code),[String(1-code),"2",v]);
  return {id:"g-ret",type:"mcq",noInterp:true,kind:"Code retour $?",q:`Qu'affiche <span class='f'>echo "${esc(v)}" | grep -Eq '${esc(S[0])}' ; echo $?</span> ?`,...r,_sh:`echo "${v}" | grep -Eq '${S[0]}' ; echo $?`,_ans:[String(code)],
   expl:`grep -q n'affiche rien ; seul le code retour compte : 0 si une ligne correspond, 1 sinon, 2 en cas d'erreur. « ${esc(v)} » ${code?"ne correspond pas":"correspond"} à ${esc(S[0])} : <b>${code}</b>.`}},
 scriptOut(){const t=rnd(2);
  if(t===0){const v=pick(["01010101","00000000","1010101","101010101","01020101",""]);const ok=/^[01]{8}$/.test(v);const sh=`bits="${v}"\nif printf '%s\\n' "$bits" | grep -Eq '^[01]{8}$'\nthen\n    echo "Conforme"\nelse\n    echo "Non conforme"\nfi`;
   const good=ok?"Conforme":"Non conforme";const r=chs(good,[ok?"Non conforme":"Conforme","rien","une erreur de syntaxe"]);
   return {id:"g-sh",type:"mcq",noInterp:true,kind:"Sortie d'un script",q:`Qu'affiche ce script ?<div class="tscroll"><pre class="f" style="margin:6px 0">${esc(sh)}</pre></div>`,...r,_sh:sh,_ans:[good],
    expl:`« ${esc(v)||"(vide)"} » ${ok?"fait exactement 8 caractères 0 ou 1":"n'est pas une ligne de exactement 8 caractères 0 ou 1"} : grep -Eq renvoie ${ok?0:1}, donc le script affiche <b>${good}</b>.`}}
  const nom=pick(["Alice","Bob","Chloé"]);const q=pick(['"','\'']);const sh=`nom="${nom}"\necho ${q}Bonjour $nom${q}`;const good=q==='"'?`Bonjour ${nom}`:"Bonjour $nom";
  const r=chs(good,[q==='"'?"Bonjour $nom":`Bonjour ${nom}`,"Bonjour","nom"]);
  return {id:"g-sh",type:"mcq",noInterp:true,kind:"Sortie d'un script",q:`Qu'affiche ce script ?<div class="tscroll"><pre class="f" style="margin:6px 0">${esc(sh)}</pre></div>`,...r,choices:r.choices.map(esc),_sh:sh,_ans:[good],
   expl:`Entre guillemets doubles, $nom est remplacé par sa valeur ; entre apostrophes, il est affiché tel quel. Ici : <b>${esc(good)}</b>.`}}
});

/* ---------- R1.01 : langage C ---------- */
function cTrunc(a,b){return Math.trunc(a/b)}
Object.assign(GEN,{
 cExpr(){const x0=ri(1,9),y0=ri(1,9);let x=x0,y=y0,z;const prog=[`int x = ${x0}, y = ${y0}, z;`];const t=rnd(3);
  if(t===0){prog.push("z = x++ + ++y;");z=x+(y+1);x++;y++}else if(t===1){prog.push("z = --x * y--;");x--;z=x*y;y--}else{prog.push("x += y;","y = x - y;","z = x++ - y;");x+=y;y=x-y;z=x-y;x++}
  const v=pick(["x","y","z"]);const val={x,y,z}[v];const r=chs(String(val),[String(val+1),String(val-1),String(val+2),String(-val)]);
  return {id:"g-cexpr",type:"mcq",noInterp:true,kind:"Valeur après des instructions",q:`Que vaut <b>${v}</b> après ces instructions ?<div class="tscroll"><pre class="f" style="margin:6px 0">${prog.join("\n")}</pre></div>`,...r,_c:`int x=${x0},y=${y0},z;${prog.slice(1).join("")}printf("%d",${v});`,_ans:String(val),
   expl:`++x et --x modifient avant l'usage ; x++ et y-- après. À la fin : x = ${x}, y = ${y}, z = ${z}. Donc ${v} = <b>${val}</b>.`}},
 cDiv(){const a=ri(5,23),b=ri(2,6);const E=pick([[`a / b`,"%d",cTrunc(a,b)],[`a % b`,"%d",a%b],[`(float) a / b`,"%.2f",a/b],[`(float)(a / b)`,"%.2f",cTrunc(a,b)],[`a / (float) b`,"%.2f",a/b],[`a / b * 1.0`,"%.2f",cTrunc(a,b)],[`-a % b`,"%d",-(a%b)],[`1.0 * a / b`,"%.2f",a/b]]);
  const fmt=v=>E[1]==="%d"?String(v):v.toFixed(2);const good=fmt(E[2]);const wrong=[fmt(a/b),fmt(cTrunc(a,b)),fmt(a%b),fmt(E[2]+1),E[1]==="%d"?(a/b).toFixed(2):String(cTrunc(a,b))];const r=chsP(good,wrong,t=>fmt(E[2]+[-1,2,-2,3][t%4]*(1+(t>>2))));
  return {id:"g-cdiv",type:"mcq",noInterp:true,kind:"Division et cast",q:`<span class='f'>int a = ${a}, b = ${b};</span> Qu'affiche <span class='f'>printf("${E[1]}", ${E[0]});</span> ?`,...r,_c:`int a=${a},b=${b};printf("${E[1]}",${E[0]});`,_ans:good,
   expl:`Entre deux int, / est la division entière (${a} / ${b} = ${cTrunc(a,b)}) et % le reste (${a%b}, du signe du dividende). Le cast (float) s'applique à ce qui le suit immédiatement : (float) a / b est une division réelle, (float)(a / b) convertit un résultat déjà tronqué. Résultat : <b>${good}</b>.`}},
 cLoop(){const n=ri(3,6),k=ri(1,n-1),m=pick([1,2,3]),br=rnd(2);let a=0,i;
  for(i=n;i>0;i--){if(br){a=a+m*i;if(i===k)break}else{if(i===k)continue;a=a+m*i}}
  const body=br?`{ a = a + ${m}*i; if (i == ${k}) break; }`:`{ if (i == ${k}) continue; a = a + ${m}*i; }`;const v=rnd(2)?"a":"i";const val=v==="a"?a:i;
  const r=chs(String(val),[String(val+m*k),String(val-m*k),String(v==="a"?a+1:k-1),String(v==="a"?m*n*(n+1)/2:0),String(val+1)]);const r2=chsP(String(val),r.choices.filter((x,i)=>i!==r.answer),t=>String(val+[2,-1,-2,3][t%4]*(1+(t>>2))));Object.assign(r,r2);
  return {id:"g-cloop",type:"mcq",noInterp:true,kind:"break et continue",q:`Que vaut <b>${v}</b> après cette boucle ?<div class="tscroll"><pre class="f" style="margin:6px 0">a = 0;\nfor (i = ${n}; i &gt; 0; i--) ${body}</pre></div>`,...r,_c:`int a=0,i;for(i=${n};i>0;i--)${body}printf("%d",${v});`,_ans:String(val),
   expl:`${br?`break sort de la boucle juste après avoir ajouté ${m}×${k} : i reste à ${k}.`:`continue saute l'ajout quand i = ${k}, puis la boucle va jusqu'à i = 0.`} Au final a = ${a}, i = ${i} : ${v} = <b>${val}</b>.`}},
 cPrintf(){const t=rnd(4);const vis=s=>s.replace(/ /g,"␣");let fmt,arg,out,carg;
  if(t===0){const n=ri(1,999);const w=ri(4,6);const left=rnd(2);fmt=`%${left?"-":""}${w}d`;arg=String(n);out=left?String(n).padEnd(w):String(n).padStart(w);carg=arg}
  else if(t===1){const xs=pick(["3.14159","2.71828","9.8765","12.0","0.4567"]);const x=parseFloat(xs);const w=ri(5,7),p=ri(1,3);fmt=`%${w}.${p}f`;arg=xs;out=x.toFixed(p).padStart(w);carg=arg}
  else if(t===2){const s=pick(["bonjour","informatique","Metz","clavier"]);const p=ri(2,4);fmt=`%.${p}s`;arg=`"${s}"`;out=s.slice(0,p);carg=arg}
  else{const s=pick(["bonjour","systeme","algorithme"]);const w=ri(6,9),p=ri(2,4);fmt=`%${w}.${p}s`;arg=`"${s}"`;out=s.slice(0,p).padStart(w);carg=arg}
  const good=`[${vis(out)}]`;const alt=[`[${vis(out.trim())}]`,`[${vis(out.trim().padEnd(out.length))}]`,`[${vis(" "+out)}]`,`[${vis(out.trim()+"0")}]`];const r=chsP(good,alt,t=>[`[${vis(out.trim()+out.trim().slice(-1))}]`,`[${vis(out.trim().slice(0,-1))}]`,`[${vis("  "+out.trim())}]`,`[${vis(out.trim()+"  ")}]`][t%4]);
  return {id:"g-cpf",type:"mcq",noInterp:true,kind:"Formats de printf",q:`Qu'affiche <span class='f'>printf("[${fmt}]", ${esc(arg)});</span> ? (␣ = un espace)`,...r,_c:`printf("[${fmt}]",${carg});`,_ans:`[${out}]`,
   expl:`Largeur = nombre minimal de caractères (calé à droite, ou à gauche avec −) ; .p = nombre de décimales pour %f, nombre de caractères gardés pour %s. Résultat : <b>${good}</b>.`}},
 cPtr(){const a0=ri(1,9),b0=ri(1,9),k=ri(2,5);let a=a0,b=b0;const t=rnd(2);let code;
  if(t===0){code=[`int a = ${a0}, b = ${b0};`,`int *p = &amp;a;`,`*p = *p + b;`,`p = &amp;b;`,`*p = *p * ${k};`];a=a0+b0;b=b0*k}else{code=[`int a = ${a0}, b = ${b0};`,`int *p = &amp;a, *q = &amp;b;`,`*q = *p;`,`*p = ${k};`];b=a0;a=k}
  const good=`a = ${a}, b = ${b}`;const r=chsP(good,[`a = ${a0}, b = ${b0}`,`a = ${b}, b = ${a}`,`a = ${a0}, b = ${b}`,`a = ${a}, b = ${b0}`],t=>`a = ${a+1+t%3}, b = ${b+(t>>2)%3}`);
  return {id:"g-cptr",type:"mcq",noInterp:true,kind:"Pointeurs",q:`Que valent a et b à la fin ?<div class="tscroll"><pre class="f" style="margin:6px 0">${code.join("\n")}</pre></div>`,...r,_c:code.join("").replace(/&amp;/g,"&")+`printf("a = %d, b = %d",a,b);`,_ans:good,
   expl:`p = &amp;a fait de *p un autre nom pour a. Modifier *p modifie la variable pointée. Résultat : <b>${good}</b>.`}},
 cTree(){const v=shuffle(["a","b","c","d"]),o=[pick(["+","-","*"]),pick(["+","*"]),pick(["-","*","+"])];const shape=rnd(2);
  const T=shape?{o:o[0],l:{o:o[1],l:v[0],r:v[1]},r:{o:o[2],l:v[2],r:v[3]}}:{o:o[0],l:{o:o[1],l:{o:o[2],l:v[0],r:v[1]},r:v[2]},r:v[3]};
  const pre=n=>typeof n==="string"?[n]:[n.o,...pre(n.l),...pre(n.r)],post=n=>typeof n==="string"?[n]:[...post(n.l),...post(n.r),n.o],inf=n=>typeof n==="string"?[n]:[...inf(n.l),n.o,...inf(n.r)];
  const par=n=>typeof n==="string"?n:`(${par(n.l)} ${n.o.replace("*","×")} ${par(n.r)})`;const kind=pick(["préfixé","postfixé"]);const good=(kind==="préfixé"?pre(T):post(T)).join(" ");
  const r=chs(good,[(kind==="préfixé"?post(T):pre(T)).join(" "),inf(T).join(" "),post(T).slice().reverse().join(" "),pre(T).slice().reverse().join(" ")]);
  return {id:"g-ctree",type:"mcq",noInterp:true,kind:"Parcours d'arbre",q:`Quel est le parcours <b>${kind}</b> de l'arbre de l'expression ${par(T).slice(1,-1)} ?`,...r,
   expl:`Préfixé = racine, gauche, droite : ${pre(T).join(" ")}. Postfixé = gauche, droite, racine : ${post(T).join(" ")}. Infixé = gauche, racine, droite : ${inf(T).join(" ")}. Réponse : <b>${good}</b>.`}},
 cBst(){const vals=shuffle([...Array(30).keys()].map(x=>x-5)).slice(0,6);let root=null;const ins=(n,x)=>n?(x<n.v?{...n,l:ins(n.l,x)}:{...n,r:ins(n.r,x)}):{v:x,l:null,r:null};vals.forEach(x=>root=ins(root,x));
  const pre=n=>n?[n.v,...pre(n.l),...pre(n.r)]:[],inf=n=>n?[...inf(n.l),n.v,...inf(n.r)]:[],post=n=>n?[...post(n.l),...post(n.r),n.v]:[];const kind=pick(["préfixé","infixé"]);
  const f=a=>a.map(frn).join(" ");const good=f(kind==="préfixé"?pre(root):inf(root));const r=chsP(good,[f(vals),f(kind==="préfixé"?inf(root):pre(root)),f(post(root)),f(inf(root).slice().reverse())],t=>f(shuffle(vals)));
  return {id:"g-cbst",type:"mcq",noInterp:true,kind:"Arbre binaire de recherche",q:`On insère dans cet ordre, dans un arbre binaire de recherche vide : ${vals.map(frn).join(", ")}. Quel est le parcours <b>${kind}</b> ?`,...r,
   expl:`Racine ${frn(vals[0])} ; chaque valeur va à gauche si elle est plus petite, à droite sinon. ${kind==="infixé"?"Le parcours infixé donne toujours les valeurs triées":"Préfixé = racine, puis sous-arbre gauche, puis droit"} : <b>${good}</b>.`}},
 cStack(){const file=rnd(2);const ops=[];const st=[];let out=[];const vals=shuffle([1,2,3,4,5,6,7,8,9]);let vi=0;
  for(let k=0;k<6;k++){if(st.length&&rnd(3)===0){ops.push(file?"Defiler":"Depiler");out.push(file?st.shift():st.pop())}else{const v=vals[vi++];ops.push(`${file?"Enfiler":"Empiler"}(${v})`);st.push(v)}}
  const desc=file?`tête → queue : ${st.join(", ")||"vide"}`:`du fond au sommet : ${st.join(", ")||"vide"}`;const good=st.length?st.join(", "):"vide";
  const r=chsP(good,[st.slice().reverse().join(", ")||"vide",out.join(", ")||"0",vals.slice(0,vi).join(", "),st.slice(1).join(", ")||"vide"],t=>t%3===2?"vide":shuffle(vals.slice(0,Math.max(1,vi))).slice(0,1+t%3).join(", "));
  return {id:"g-cstack",type:"mcq",noInterp:true,kind:file?"File (FIFO)":"Pile (LIFO)",q:`${file?"File":"Pile"} vide au départ : ${ops.join(" ; ")}. Que contient-elle à la fin (${file?"de la tête à la queue":"du fond au sommet"}) ?`,...r,
   expl:`${file?"File = FIFO : on enfile en queue, on défile en tête (le plus ancien sort).":"Pile = LIFO : on dépile toujours le sommet (le dernier empilé)."} Sortis dans l'ordre : ${out.join(", ")||"aucun"}. Il reste ${desc}.`}}
});

/* ===================== Étape 3 : R1.03 « Pratique : prévois le résultat » (valeurs calculées par gen/r103prat.py) ===================== */
BANK.archiprat=[
 {id:"ap-x300",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">$s = 200 + 100\n$s.ToString(\"X\")</pre></div>",answers:["12C"],expl:"300 = 1×256 + 2×16 + 12 = 0x<b>12C</b>. \"X\" écrit l'hexa en majuscules, sans zéros devant : la somme exacte prend 3 chiffres."},
 {id:"ap-band",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">(5 - 10) -band 255</pre></div>",answers:["251"],expl:"−5 en complément à deux sur 8 bits = 11111011. -band 255 garde les 8 bits de poids faible, lus en non signé : <b>251</b> (= 256 − 5)."},
 {id:"ap-pad",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[Convert]::ToString(4, 2).PadLeft(8, \"0\")</pre></div>",answers:["00000100"],expl:"[Convert]::ToString(4, 2) donne « 100 » (base 2). PadLeft(8, \"0\") complète à gauche avec des 0 jusqu'à 8 caractères : <b>00000100</b>."},
 {id:"ap-x2",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">$r = (200 + 100) -band 255\n$r.ToString(\"X2\")</pre></div>",answers:["2C"],expl:"300 = 0x12C ; -band 255 garde l'octet de poids faible 0x2C = 44. \"X2\" écrit 2 chiffres hexa : <b>2C</b>. Ce sont les 8 bits conservés, la retenue (le 1 de 12C) est perdue."},
 AQ("ap-bin300","p","Calcul PowerShell","PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[Convert]::ToString(300 -band 255, 2).PadLeft(8, \"0\")</pre></div>",["00101100", "100101100", "11111111", "101100"],"300 = 1 0010 1100 (9 bits). -band 255 garde les 8 derniers : 0010 1100, et PadLeft rajoute le 0 de tête : <b>00101100</b>."),
 {id:"ap-toint",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[Convert]::ToInt32(\"11111011\", 2)</pre></div>",answers:["251"],expl:"Lecture non signée : 128 + 64 + 32 + 16 + 8 + 2 + 1 = <b>251</b>. Lu en signé sur 8 bits, le même octet vaudrait 251 − 256 = −5."},
 {id:"ap-tohex",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[Convert]::ToString((5 - 10) -band 255, 16)</pre></div>",answers:["fb"],expl:"(5 − 10) -band 255 = 251 = 15×16 + 11. [Convert]::ToString(…, 16) écrit l'hexa en minuscules : <b>fb</b>. Avec .ToString(\"X2\") on aurait FB."},
 AQ("ap-x256","p","Calcul PowerShell","PowerShell 7 (Windows). Qu'affichent ces deux lignes ?<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">$s = 128 + 128\n$s.ToString(\"X\") ; ($s -band 255).ToString(\"X2\")</pre></div>",["100 puis 00", "00 puis 100", "80 puis 80", "FF puis 00"],"128 + 128 = 256 = 0x100 (somme exacte, 3 chiffres). Les 8 bits conservés valent 0x00 : il y a une retenue. Réponse : <b>100 puis 00</b>."),
 {id:"ap-noelps",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"PowerShell 7 (Windows). Quel nombre affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">echo \"Noël\" &gt; noel.txt\n(Get-Item noel.txt).Length</pre></div>",answers:["7"],expl:"Texte : N 1 + o 1 + ë 2 + l 1 = 5 octets (4 caractères). PowerShell 7 ajoute CRLF (0D 0A) : +2. Total : <b>7</b> octets."},
 {id:"ap-cavaps",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"PowerShell 7 (Windows). Quel nombre affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">echo \"Ça va ?\" &gt; cava.txt\n(Get-Item cava.txt).Length</pre></div>",answers:["10"],expl:"Texte : Ç 2 + a 1 + espace 1 + v 1 + a 1 + espace 1 + ? 1 = 8 octets (7 caractères). PowerShell 7 ajoute CRLF (0D 0A) : +2. Total : <b>10</b> octets."},
 {id:"ap-salutfed",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"Fedora (Bash). Quel nombre affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh fed\" style=\"margin:6px 0\">echo \"Hé 👋\" &gt; salut.txt\nwc -c &lt; salut.txt</pre></div>",answers:["9"],expl:"Texte : H 1 + é 2 + espace 1 + 👋 4 = 8 octets (4 caractères). echo de Bash ajoute LF (0a) : +1. Total : <b>9</b> octets."},
 {id:"ap-prixfed",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"Fedora (Bash). Quel nombre affiche la dernière commande ?<div class=\"tscroll\"><pre class=\"f sh fed\" style=\"margin:6px 0\">echo \"Prix: 5€\" &gt; prix.txt\nwc -c &lt; prix.txt</pre></div>",answers:["11"],expl:"Texte : P 1 + r 1 + i 1 + x 1 + : 1 + espace 1 + 5 1 + € 3 = 10 octets (8 caractères). echo de Bash ajoute LF (0a) : +1. Total : <b>11</b> octets."},
 {id:"ap-printf",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"Fedora (Bash). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh fed\" style=\"margin:6px 0\">printf 'Ça va ?' | wc -c</pre></div>",answers:["8"],expl:"printf n'ajoute pas de fin de ligne. Ç = 2 octets, les 6 autres caractères (a, espace, v, a, espace, ?) = 1 chacun : <b>8</b>."},
 {id:"ap-echon",type:"input",noInterp:true,part:"p",kind:"Taille d'un fichier",q:"Fedora (Bash). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh fed\" style=\"margin:6px 0\">echo -n \"Hé 👋\" | wc -c</pre></div>",answers:["8"],expl:"-n supprime la fin de ligne. H 1 + é 2 + espace 1 + 👋 4 = <b>8</b> octets pour 4 caractères."},
 AQ("ap-fhex","p","Lire les octets","PowerShell 7 (Windows). Après <span class='f'>echo \"Noël\" &gt; noel.txt</span>, quels octets montre <span class='f'>Format-Hex -Path noel.txt</span> ?",["4E 6F C3 AB 6C 0D 0A", "4E 6F EB 6C 0D 0A", "4E 6F C3 AB 6C 0A", "4E 6F C3 AB 6C"],"N = 4E, o = 6F, ë = <b>C3 AB</b> (2 octets en UTF-8 ; EB est son point de code, pas ses octets), l = 6C, puis CRLF = <b>0D 0A</b> : <b>4E 6F C3 AB 6C 0D 0A</b>."),
 AQ("ap-od","p","Lire les octets","Fedora (Bash). Après <span class='f'>echo \"Prix: 5€\" &gt; prix.txt</span>, quelle est la <b>dernière</b> paire affichée par <span class='f'>od -An -tx1 prix.txt</span> ?",["0a", "0d", "ac", "0d 0a"],"Les octets sont 50 72 69 78 3a 20 35 e2 82 ac 0a. € = e2 82 ac, puis echo de Bash ajoute seulement LF : la dernière paire est <b>0a</b>. CRLF (0d 0a) n'apparaît qu'avec PowerShell sous Windows."),
 AQ("ap-euro","p","Lire les octets","Dans <span class='f'>Format-Hex</span>, quels octets codent « € » en UTF-8 ?",["E2 82 AC", "20 AC", "E2 82", "C3 A9"],"€ est U+20AC : hors ASCII et au-delà de U+07FF, il prend 3 octets : <b>E2 82 AC</b>. 20AC est son point de code, C3 A9 est « é »."),
 AQ("ap-len","p","Caractères et octets","PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">\"Fusée 😊\".Length</pre></div>",["8", "7", "11", "6"],"Piège : .Length compte des unités UTF-16, pas des caractères ni des octets. F u s é e espace = 6, et 😊 (hors du plan de base) compte pour 2 : <b>8</b>. Il y a 7 caractères et 11 octets UTF-8."),
 {id:"ap-bytecount",type:"input",noInterp:true,part:"p",kind:"Caractères et octets",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[Text.Encoding]::UTF8.GetByteCount(\"Fusée 😊\")</pre></div>",answers:["11"],expl:"F 1 + u 1 + s 1 + é 2 + e 1 + espace 1 + 😊 4 = <b>11</b> octets UTF-8 (sans fin de ligne)."},
 {id:"ap-g17",type:"input",noInterp:true,part:"p",kind:"Flottants",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">([double][single]0.2).ToString(\"G17\")</pre></div>",answers:["0.20000000298023224"],expl:"0,2 = 0,0011 0011…₂ est infini en binaire : en simple précision il est arrondi à 23 bits de fraction. Converti en double et écrit avec 17 chiffres : <b>0.20000000298023224</b>."},
 AQ("ap-eq075","p","Flottants","PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">([double][single]0.75) -eq 0.75</pre></div>",["True", "False", "0.75", "0.75000000000000000"],"0,75 = 0,11₂ : fraction binaire finie, stockée exactement en simple précision. La comparaison donne <b>True</b>."),
 AQ("ap-eq02","p","Flottants","PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">([double][single]0.2) -eq 0.2</pre></div>",["False", "True", "0.2", "Erreur"],"0,2 n'est pas représentable exactement : [single]0.2 vaut 0.20000000298023224 une fois converti en double, différent du double 0.2. Réponse : <b>False</b>."),
 AQ("ap-g17b","p","Flottants","PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">([double][single]0.3).ToString(\"G17\")</pre></div>",["0.30000001192092896", "0.3", "0.29999999999999999", "0.30000000000000004"],"0,3 est infini en binaire. Arrondi en simple précision puis écrit avec 17 chiffres : <b>0.30000001192092896</b>. 0.29999999999999999 serait le double 0.3, et 0.30000000000000004 est le célèbre 0.1 + 0.2."),
 AQ("ap-transcript","p","Commandes","Quelle commande enregistre tout ce que tu tapes et tout ce qui s'affiche (le « journal de ta session ») ?",["Start-Transcript -Path journal.txt", "Get-History &gt; journal.txt", "Out-File journal.txt", "Set-Content journal.txt"],"Start-Transcript démarre l'enregistrement des commandes <b>et</b> de leurs sorties ; on l'arrête avec Stop-Transcript. Get-History ne garde que les commandes."),
 AQ("ap-zip","p","Commandes","Quelle commande crée le ZIP à rendre à partir du dossier Rendu ?",["Compress-Archive -Path Rendu -DestinationPath R103.zip", "Expand-Archive -Path Rendu -DestinationPath R103.zip", "New-Item -ItemType Zip Rendu", "Copy-Item Rendu R103.zip"],"Compress-Archive crée l'archive ; Expand-Archive fait l'inverse (décompresser)."),
 AQ("ap-logical","p","Commandes","Dans <span class='f'>Get-CimInstance Win32_Processor</span>, quelle propriété donne le nombre de processeurs logiques ?",["NumberOfLogicalProcessors", "NumberOfCores", "MaxClockSpeed", "NumberOfProcessors"],"NumberOfCores = cœurs physiques, <b>NumberOfLogicalProcessors</b> = processeurs logiques (2 × cœurs avec l'hyperthreading), MaxClockSpeed = fréquence en MHz."),
 AQ("ap-mhz","p","Commandes","<span class='f'>Get-CimInstance Win32_Processor</span> affiche MaxClockSpeed : 3600. Que vaut la fréquence ?",["3,6 GHz", "3600 GHz", "36 GHz", "3,6 MHz"],"MaxClockSpeed est en <b>MHz</b> : 3600 MHz = <b>3,6 GHz</b>."),
 {id:"ap-ram16",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). TotalPhysicalMemory vaut 17179869184. Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[math]::Round(17179869184 / 1GB, 2)</pre></div>",answers:["16"],expl:"En PowerShell, 1GB = 2³⁰ = 1 073 741 824 octets (c'est un Gio). 17 179 869 184 / 2³⁰ = <b>16</b>."},
 {id:"ap-ram149",type:"input",noInterp:true,part:"p",kind:"Calcul PowerShell",q:"PowerShell 7 (Windows). Qu'affiche :<div class=\"tscroll\"><pre class=\"f sh ps\" style=\"margin:6px 0\">[math]::Round(16000000000 / 1GB, 2)</pre></div>",answers:["14.9", "14,9", "14.90"],expl:"16 000 000 000 / 1 073 741 824 = 14,901… arrondi à 2 décimales : 14,90, que PowerShell affiche <b>14.9</b> (zéro final non écrit). « 16 Go » vendus = environ 14,9 Gio."},
 AQ("ap-unamem","p","Commandes","Fedora (Bash). Sur un PC 64 bits Intel ou AMD, qu'affiche <span class='f'>uname -m</span> ?",["x86_64", "amd64 bits", "64", "x64-based PC"],"<b>x86_64</b> (aussi appelé AMD64). « x64-based PC » est ce qu'affiche CsSystemType sous PowerShell."),
 AQ("ap-psver","p","Commandes","Dans le bon terminal pour l'éval (pwsh), qu'affiche <span class='f'>$PSVersionTable.PSVersion.Major</span> ?",["7", "5", "1", "11"],"PowerShell 7 (pwsh) affiche <b>7</b>. Windows PowerShell 5.1 afficherait 5 : il redirige en UTF-16, et les tailles de fichiers ne correspondraient plus."),
 AQ("ap-arch","p","Commandes","Quelle commande PowerShell donne l'architecture (OsArchitecture, CsSystemType) ?",["Get-ComputerInfo", "Get-PhysicalDisk", "Get-Volume", "Get-NetAdapter"],"<b>Get-ComputerInfo</b> | Select-Object OsArchitecture, CsSystemType → « 64 bits », « x64-based PC »."),
];
/* Tableau caractère par caractère pour compter les octets UTF-8 */
function utfCat(c){const k=u8(c).length;return k===1?(c===" "?"espace":"ASCII"):k===2?"lettre accentuée":k===3?"symbole (€ ☕ ✓…)":"emoji"}
function utfTab(w,eol){const chars=[...w];const nb=u8(w).length;
  const rows=chars.map(c=>`<tr><td class="f">${c===" "?"␣":esc(c)}</td><td>${utfCat(c)}</td><td>${u8(c).length}</td></tr>`).join("");
  const e=eol?`<tr><td colspan="2">Fin de ligne ${eol[0]}</td><td>+${eol[1]}</td></tr><tr><th colspan="2">Taille du fichier</th><th>${nb+eol[1]}</th></tr>`:"";
  return `<div class="tscroll"><table class="tt utf"><tr><th>Caractère</th><th>Catégorie</th><th>Octets</th></tr>${rows}<tr><th colspan="2">Texte : ${chars.length} caractères</th><th>${nb}</th></tr>${e}</table></div>`}
const UTFRAPPEL="Repères : ASCII et espace = 1 octet, lettre accentuée = 2, symbole (€ ☕ ✓) = 3, emoji = 4. Dans un fichier créé par echo, ajoute la fin de ligne : +1 (LF, Fedora) ou +2 (CRLF, PowerShell 7 sous Windows).";
{const base=GEN.arUtf8;GEN.arUtf8=function(){const q=base.apply(this,arguments);const m=/« (.*) »/.exec(strip(q.q))||/echo (?:-n )?"(.*?)"/.exec(strip(q.q));if(!m||q.id==="g-ar-utfc")return q;const w=m[1];
  if(q.id==="g-ar-utf"){q.expl=`On compte caractère par caractère :${utfTab(w)}Total : <b>${u8(w).length}</b> octets pour ${[...w].length} caractères (sans fin de ligne). ${UTFRAPPEL}`}
  else if(q.id==="g-ar-size"){const t=strip(q.q);const eol=/PowerShell/.test(t)?["CRLF (0D 0A)",2]:/-n/.test(t)?["aucune (echo -n)",0]:["LF (0a)",1];
    q.expl=`On compte caractère par caractère, puis on ajoute la fin de ligne :${utfTab(w,eol)}Total : <b>${u8(w).length+eol[1]}</b> octets (Length sous PowerShell, wc -c sous Fedora). ${UTFRAPPEL}`}
  return q}}
/* Générateur : prévois la sortie d'une commande PowerShell 7 */
GEN.arPrat=function(){const t=rnd(5);const H=n=>n.toString(16).toUpperCase();const B8=n=>n.toString(2).padStart(8,"0");
  const C=c=>`<div class="tscroll"><pre class="f sh ps" style="margin:6px 0">${esc(c)}</pre></div>`;const pre="PowerShell 7 (Windows). Qu'affiche la dernière commande ?";
  if(t===0){const a=ri(100,255),b=ri(60,255),s=a+b;const good=H(s);const r=chsP(good,[H(s&255).padStart(2,"0"),String(s),H(s+1),H(s-16)],k=>H(s+2+k));
    return {id:"g-ar-px",type:"mcq",noInterp:true,kind:"Prévois le résultat",q:pre+C(`$s = ${a} + ${b}\n$s.ToString("X")`),...r,_ps:{t,a,b},
     expl:`${a} + ${b} = ${s} = 0x<b>${good}</b>. "X" écrit l'hexa en majuscules, sans zéros devant${s>255?" ; la somme exacte dépasse 255, elle prend 3 chiffres":""}.`}}
  if(t===1){const a=ri(0,20),b=ri(a+1,60),r0=(a-b)&255;const good=String(r0);const r=chsP(good,[String(a-b),String(b-a),String(255-(b-a)),String(256+b-a)],k=>String(r0+1+k));
    return {id:"g-ar-pband",type:"mcq",noInterp:true,kind:"Prévois le résultat",q:pre+C(`(${a} - ${b}) -band 255`),...r,_ps:{t,a,b},
     expl:`${a} − ${b} = ${a-b}. En complément à deux sur 8 bits : ${B8(r0)}. -band 255 garde ces 8 bits lus en non signé : 256 − ${b-a} = <b>${good}</b>.`}}
  if(t===2){const n=ri(1,127);const good=B8(n);const r=chsP(good,[n.toString(2),B8(n).split("").reverse().join(""),B8(n+1),B8(n^128)],k=>B8((n+2+k)&255));
    return {id:"g-ar-ppad",type:"mcq",noInterp:true,kind:"Prévois le résultat",q:pre+C(`[Convert]::ToString(${n}, 2).PadLeft(8, "0")`),...r,_ps:{t,n},
     expl:`${n} en base 2 = ${n.toString(2)} ; PadLeft(8, "0") ajoute des 0 à gauche jusqu'à 8 caractères : <b>${good}</b>.`}}
  if(t===3){const a=ri(130,255),b=ri(130,255),s=a+b,lo=s&255;const good=H(lo).padStart(2,"0");const r=chsP(good,[H(s),H(lo),String(lo),H(255-lo).padStart(2,"0")].filter(x=>x!==good),k=>H((lo+1+k)&255).padStart(2,"0"));
    return {id:"g-ar-px2",type:"mcq",noInterp:true,kind:"Prévois le résultat",q:pre+C(`$r = (${a} + ${b}) -band 255\n$r.ToString("X2")`),...r,_ps:{t,a,b},
     expl:`${a} + ${b} = ${s} = 0x${H(s)} : la retenue est perdue, il reste l'octet 0x${good} = ${lo}. "X2" écrit toujours 2 chiffres : <b>${good}</b>.`}}
  const w=pick(UTFW),ps=rnd(2),nb=u8(w).length,size=nb+(ps?2:1);const good=String(size);const r=chsP(good,[String(nb),String([...w].length+(ps?2:1)),String(nb+(ps?1:2)),String(size+1)],k=>String(size+2+k));
  return {id:"g-ar-pfile",type:"mcq",noInterp:true,kind:"Prévois le résultat",q:`${ps?"PowerShell 7 (Windows)":"Fedora (Bash)"}. Quel nombre affiche la dernière commande ?`+C(ps?`echo "${w}" > f.txt\n(Get-Item f.txt).Length`:`echo "${w}" > f.txt\nwc -c < f.txt`),...r,_ps:{t,w,ps},
   expl:`On compte caractère par caractère :${utfTab(w,ps?["CRLF (0D 0A)",2]:["LF (0a)",1])}Total : <b>${good}</b> octets.`}};

/* R1.07 : avant le TD noté du 26/11, les matrices passent en premier ; ensuite le devoir 2 du 8/12. */
function r107TD(){return Date.now()<Date.parse("2026-11-26T16:00")}
const R107D={
 maths:{key:"maths",tag:"Chap. 1 + 2",title:"Matrices et pivot",desc:"Cours + calculs générés : produits, transposées, systèmes",bank:()=>BANK.maths,gens:["matProd","matSum","matType","system","echelon","sysNature"]},
 mathsmix:{key:"mathsmix",tag:"TD noté 26/11",title:"Comme au TD noté du 26/11",desc:"12 questions de calcul matriciel, à faire sans calculatrice",bank:()=>BANK.maths,gens:["matProd","matPow","matTrans","system","system","echelon","matInv","sysNature"],n:12},
 gj:{key:"gj",tag:"Chap. 2 § 4",title:"Gauss-Jordan",desc:"Inverse 2 × 2 et 3 × 3, AX = B, P(A) = 0",bank:()=>BANK.gauss,gens:["gjInv2","gjInv3","gjSolve"]},
 deriv:{key:"deriv",tag:"Chap. 3",title:"Dérivation",desc:"Dérivées usuelles, règles, tangente, variations et extremums",bank:()=>BANK.deriv,gens:["derivPoly","derivRule","tangent","variations"]},
 poly:{key:"poly",tag:"Chap. 4",title:"Polynômes",desc:"Degré, division euclidienne, racines, factorisation",bank:()=>BANK.poly,gens:["polyDiv","polyFactor","polyDeg"]},
 dev2c:{key:"dev2c",tag:"Devoir 2",title:"Questions de cours Devoir 2",desc:"Dérivées usuelles, règles, conditions d'existence, extremums, Gauss-Jordan, polynômes",bank:()=>BANK.gauss.concat(BANK.deriv,BANK.poly),gens:["derivRule","gjInv2","polyDiv","tangent"]},
 dev2mix:{key:"dev2mix",tag:"Spécial devoir",title:"Devoir 2 du 8/12",desc:"12 exercices comme au devoir : inverse 3 × 3, 3 dérivées, variations, tangente, division, factorisation…",bank:()=>[],gens:["gjInv3","derivRule","derivRule","derivPoly","variations","tangent","polyDiv","polyFactor","gjSolve","gjInv2","polyDeg","derivRule"],n:12}};
/* ===================== Matières ===================== */
const SUBJECTS={
 r103:{code:"R1.03",name:"Architecture",exam:"2026-11-18T13:30",exlabel:"Éval mer. 18/11 · 13 h 30",scope:"TP1 + TP2 : codage, arithmétique 8 bits, flottants, commandes Windows et Fedora",tabs:[["k1","Cours : Codage & arithmétique"],["k2","TP1 & TP2 : commandes"],["kt","TP blanc (pratique)"],["kx","Fiche mémento"]],
  decks:[{key:"archiqcm",mix:true,tag:"Spécial éval",title:"Comme au QCM",desc:"15 questions à choix unique, cours et commandes mélangés, comme le QCM Moodle",bank:()=>BANK.archi,gens:["arConv","arC2","arAdd8","arUtf8","arEndian","arIeeeDec","arIeeeEnc","arCmd"],n:15},
   {key:"archiprat",tag:"Pratique",title:"Pratique : prévois le résultat",desc:"Une commande PowerShell 7 ou Fedora et son contexte : écris ou choisis ce qu'elle affiche",bank:()=>BANK.archiprat,gens:["arPrat","arPrat","arUtf8","arAdd8"],n:12},
   {key:"archi",tag:"Cours",title:"Questions de cours",desc:"QCM à choix unique : codage, complément à deux, flottants, commandes Windows et Fedora",bank:()=>BANK.archi,gens:["arConv","arC2","arAdd8","arIeeeDec","arCmd"]},
   {key:"archic",tag:"Cours",title:"Codage et arithmétique",desc:"Bases, complément à deux, carry et overflow, IEEE 754",bank:()=>BANK.archi.filter(q=>q.part==="c"),gens:["arConv","arC2","arAdd8","arIeeeDec","arIeeeEnc"]},
   {key:"archit",tag:"TP1 + TP2",title:"Commandes et fichiers texte",desc:"PowerShell et Fedora, UTF-8, fins de ligne, endianness, calculs en PowerShell",bank:()=>BANK.archi.filter(q=>q.part==="t"),gens:["arCmd","arUtf8","arEndian"]}],
  gendecks:[{key:"g-arprat",tag:"Générées",title:"Prévois le résultat",desc:"Commandes PowerShell : hexa, -band, binaire, taille de fichier",gens:["arPrat"]},{key:"g-arconv",tag:"Générées",title:"Conversions",desc:"Binaire, hexadécimal, décimal",gens:["arConv"]},{key:"g-arc2",tag:"Générées",title:"Complément à deux",desc:"Lire un octet signé, écrire −n, plages",gens:["arC2"]},{key:"g-aradd",tag:"Générées",title:"Addition sur 8 bits",desc:"Résultat, carry et overflow",gens:["arAdd8"]},{key:"g-arutf",tag:"Générées",title:"UTF-8 et taille des fichiers",desc:"Octets d'un mot, fin de ligne LF ou CRLF",gens:["arUtf8"]},{key:"g-arend",tag:"Générées",title:"Endianness",desc:"Ordre des octets en mémoire",gens:["arEndian"]},{key:"g-arieee",tag:"Générées",title:"IEEE 754",desc:"Décoder et encoder en simple précision",gens:["arIeeeDec","arIeeeEnc"]},{key:"g-arcmd",tag:"Générées",title:"Windows ↔ Fedora",desc:"La commande équivalente sur l'autre système",gens:["arCmd"]}]},
 r104:{code:"R1.04",name:"Systèmes",exam:"2026-12-03T08:00",exlabel:"Devoir jeu. 3/12 · 8 h (QCM + pratique terminal, à confirmer)",scope:"TP3 permissions, TP4 regex, TP5 scripts Bash, notions du CM",tabs:[["s1","Cours : SE & Linux"],["s2","Commandes & redirections"],["s3","TP3 Permissions"],["s4","TP4 Regex"],["s5","TP5 Scripts Bash"],["sx","Fiche mémento"]],
  decks:[{key:"sys",tag:"QCM",title:"Questions de cours",desc:"Droits, umask, redirections, jokers et regex, options des commandes, noyau, inode, chemins",bank:()=>BANK.sys,gens:["permOct","chmodSym","umaskQ","canAccess"]},
   {key:"sysperm",tag:"TP3",title:"Permissions",desc:"rwx et octal, chmod, umask, x sur un dossier, chown",bank:()=>BANK.sys.filter(q=>q.part==="perm"),gens:["permOct","chmodSym","umaskQ","canAccess"]},
   {key:"sysregex",tag:"TP4 + TP5",title:"Regex, grep et scripts",desc:"grep -E, ancres, classes, quantificateurs, $?, if, read",bank:()=>BANK.sys.filter(q=>q.part==="regex"||q.part==="bash"),gens:["grepLines","grepRet","scriptOut","cutField"]},
   {key:"sysprat",tag:"Pratique",title:"Pratique terminal",desc:"Énoncés type : arborescence, droits 755/644/700/600, preuves avec > et >>, grep -E, script if/read",bank:()=>BANK.sysprat,gens:["redirSeq","cutField","grepLines","scriptOut"]},
   {key:"sysqcm",tag:"Spécial devoir",title:"Comme au QCM",desc:"15 questions à choix unique, comme le quiz de 15 min",bank:()=>BANK.sys,gens:["permOct","chmodSym","umaskQ","canAccess","grepLines","cutField","redirSeq","grepRet","scriptOut"],n:15}],
  gendecks:[{key:"g-perm",tag:"Générées",title:"Droits rwx ↔ octal",desc:"ls -l, chmod octal et symbolique",gens:["permOct","chmodSym"]},{key:"g-umask",tag:"Générées",title:"umask et accès",desc:"Droits à la création, qui peut lire, écrire, traverser",gens:["umaskQ","canAccess"]},{key:"g-grep",tag:"Générées",title:"grep -E",desc:"Quelles lignes sont retenues, code retour $?",gens:["grepLines","grepRet"]},{key:"g-redir",tag:"Générées",title:"cut et redirections",desc:"Champs, > et >>",gens:["cutField","redirSeq"]},{key:"g-sh",tag:"Générées",title:"Sortie d'un script",desc:"if, test, guillemets",gens:["scriptOut"]}]},
 r101:{code:"R1.01",name:"Init Dev",exam:"2026-12-07T08:30",exlabel:"Devoir lun. 7/12 · 8 h 30 (contenu à confirmer)",scope:"Contenu non annoncé ; hypothèse : langage C chap. 1 à 9",tabs:[["c1","C : bases & contrôle"],["c2","C : fonctions & pointeurs"],["c3","C : tableaux, chaînes, structures"],["c4","C : compléments, SD & arbres"],["a1","Cours : Algorithmique"],["a2","Corrections des exercices"],["a3","Examen blanc"],["ax","Fiche mémento"]],
  decks:[{key:"clang",tag:"Langage C",title:"Questions de cours C",desc:"Chapitres 1 à 9 : types, opérateurs, boucles, fonctions, pointeurs, tableaux, chaînes, structures, SD",bank:()=>BANK.clang,gens:["cExpr","cDiv","cLoop","cPtr"]},
   {key:"cprog",tag:"Langage C",title:"Qu'affiche ce programme ?",desc:"++ et −−, division entière, cast, break et continue, printf, pointeurs",bank:()=>[],gens:["cExpr","cDiv","cLoop","cPrintf","cPtr"],n:10},
   {key:"csd",tag:"C · chap. 7 à 9",title:"Piles, files et arbres",desc:"Pile, file, parcours d'arbres, arbre binaire de recherche",bank:()=>BANK.clang.filter(q=>+q.part>=7),gens:["cTree","cBst","cStack"]},
   {key:"algo",tag:"Algorithmique",title:"Questions de cours (algo)",desc:"Les 8 chapitres : syntaxe, types, boucles, modules, tables, structures, portée",bank:()=>BANK.algo,gens:["algoDivMod","algoLoop","algoBool","algoMorgan","algoTrace"]},
   {key:"algo13",tag:"Chapitres 1 à 3",title:"Bases, conditions, boucles",desc:"Affectation, si, cas, types, booléens, pour / tq / repeter, modules et fonctions",bank:()=>BANK.algo.filter(q=>q.ch<=3),gens:["algoDivMod","algoLoop","algoRepeat","algoSum","algoCas"]},
   {key:"algo48",tag:"Chapitres 4 à 8",title:"Tables, types, portée",desc:"Tables 1D et 2D, recherche, énumérés, structures, portée et visibilité",bank:()=>BANK.algo.filter(q=>q.ch>=4),gens:["algoSearch","matchAlgo"]},
   {key:"algomix",tag:"Algorithmique",title:"Comme à l'éval du 9/11",desc:"12 questions mélangées, avec des traces d'algorithmes",bank:()=>BANK.algo,gens:["algoSearch","algoSum","algoRepeat","algoTrace","algoBool","algoMorgan"],n:12},
   {key:"cmix",tag:"Spécial devoir",title:"Comme au devoir (hypothèse C)",desc:"12 questions : cours de C et programmes à exécuter de tête",bank:()=>BANK.clang,gens:["cExpr","cDiv","cLoop","cPrintf","cPtr","cTree","cBst","cStack"],n:12}],
  gendecks:[{key:"g-cexpr",tag:"Générées",title:"C : expressions",desc:"++, −−, +=, division entière, %, cast",gens:["cExpr","cDiv"]},{key:"g-cloop",tag:"Générées",title:"C : boucles et printf",desc:"break, continue, largeur et précision",gens:["cLoop","cPrintf"]},{key:"g-cptr",tag:"Générées",title:"C : pointeurs",desc:"*p, &a, que valent les variables ?",gens:["cPtr"]},{key:"g-csd",tag:"Générées",title:"Piles, files, arbres",desc:"Contenu final, parcours, ABR",gens:["cStack","cTree","cBst"]},{key:"g-atrace",tag:"Générées",title:"Traces d'exécution",desc:"Que vaut la variable à la fin ?",gens:["algoTrace","algoSum","algoSearch"]},{key:"g-aloop",tag:"Générées",title:"Compter les tours",desc:"pour, tq, repeter",gens:["algoLoop","algoRepeat"]},{key:"g-abool",tag:"Générées",title:"Booléens et De Morgan",desc:"Évaluer une condition, écrire sa négation",gens:["algoBool","algoMorgan"]},{key:"g-amatch",tag:"Générées",title:"Associer les paires",desc:"Paramètres, boucles, opérateurs, cas parmi",gens:["matchAlgo","algoDivMod","algoCas"]}]},
 r106:{code:"R1.06",name:"Maths discrètes",exam:"2026-11-23T08:30",exlabel:"Devoir 2 lun. 23/11 · 8 h 30",scope:"Chap. 3 Relations & Chap. 4 Divisibilité",tabs:[["f3","Cours : Relations"],["f4","Cours : Divisibilité"],["f1","Cours : Logique"],["f2","Cours : Ensembles"],["fx","Résumé express"]],decks:DECKS2.concat(DECKS,[DEVOIR2]),gendecks:GENDECKS2.concat(GENDECKS)},
 r105:{code:"R1.05",name:"Bases de données",exam:"2026-10-20T08:00",exlabel:"Pas d'éval prévue pour l'instant",scope:"MCD, cardinalités, DF, passage au MLD (sans document)",tabs:[["b1","Cours : MCD"],["b2","Cours : MCD → MLD"],["b3","Corrections TD / TP / annales"],["bx","Fiche de révision"]],
  decks:[{key:"bdd",tag:"Cours",title:"Cardinalités et règles",desc:"Lire les cardinalités, type d'association, où va la clé étrangère",bank:()=>BANK.bdd,gens:["assoc","mldFK","matchBDD"]},
   {key:"bddeval",tag:"Comme à l'évaluation",title:"Exercices complets",desc:"Énoncé → cardinalités → schéma relationnel, corrigé comme les annales (3 exercices)",bank:()=>[],gens:["evalBDD"],n:3},
   {key:"bddmix",tag:"Spécial devoir",title:"Révision complète",desc:"2 exercices complets + questions de cours",bank:()=>BANK.bdd,gens:["evalBDD","evalBDD","assoc","mldFK"],n:10}],
  gendecks:[{key:"g-assoc",tag:"Générées",title:"Lire les cardinalités",desc:"Type 1:1, 1:n ou n:n",gens:["assoc"]},{key:"g-mld",tag:"Générées",title:"Où va la clé étrangère ?",desc:"Passage MCD → MLD",gens:["mldFK"]},{key:"g-mbdd",tag:"Générées",title:"Associer les paires",desc:"Vocabulaire et règles",gens:["matchBDD"]}]},
 r107:{code:"R1.07",name:"Outils mathématiques",exam:"2026-11-26T13:30",exlabel:"TD noté S1.02 jeu. 26/11 · 13 h 30 (matrices, sans calculatrice)",scope:"Chap. 1 Calcul matriciel, en binôme, sans document ni calculatrice",
  get tabs(){return r107TD()?[["m1","Cours : Matrices"],["mg","Cours : Gauss-Jordan"],["md","Cours : Dérivation"],["mp","Cours : Polynômes"],["m2","Cours : Pivot"],["mx","Fiche de révision"],["c0","Fiches tests ch. 0"]]:[["mg","Cours : Gauss-Jordan"],["md","Cours : Dérivation"],["mp","Cours : Polynômes"],["m1","Cours : Matrices"],["m2","Cours : Pivot"],["mx","Fiche de révision"],["c0","Fiches tests ch. 0"]]},
  get decks(){const D=R107D;return r107TD()?[D.maths,D.gj,D.deriv,D.poly,D.dev2c,D.dev2mix,D.mathsmix]:[D.dev2c,D.gj,D.deriv,D.poly,D.maths,D.mathsmix,D.dev2mix]},
  gendecks:[{key:"g-mprod",tag:"Générées",title:"Produits de matrices",desc:"Remplis la matrice résultat",gens:["matProd","matPow"]},{key:"g-msum",tag:"Générées",title:"Somme, réel, transposée",desc:"Calculs de base",gens:["matSum","matTrans","matType"]},{key:"g-sys",tag:"Générées",title:"Systèmes (pivot)",desc:"Résoudre, lire un système échelonné",gens:["system","echelon","sysNature"]},{key:"g-minv",tag:"Générées",title:"Inverse et associations",desc:"Vérifier une inverse, relier les règles",gens:["matInv","matchMaths"]},{key:"g-gj",tag:"Générées",title:"Gauss-Jordan",desc:"Inverse 2 × 2 et 3 × 3 avec les étapes, AX = B",gens:["gjInv2","gjInv3","gjSolve"]},{key:"g-deriv",tag:"Générées",title:"Dérivées",desc:"Polynômes, quotients, √u, uⁿ, eᵘ, ln u",gens:["derivPoly","derivRule"]},{key:"g-tanvar",tag:"Générées",title:"Tangente et variations",desc:"Équation de tangente, extremums d'un degré 3",gens:["tangent","variations"]},{key:"g-poly",tag:"Générées",title:"Polynômes",desc:"Division euclidienne, racines, degré",gens:["polyDiv","polyFactor","polyDeg"]}]},
 r102:{code:"R1.02",name:"Web (HTML / CSS)",exam:"2026-10-21T08:00",exlabel:"Pas d'éval prévue pour l'instant",scope:"HTML + CSS jusqu'au TD4, positionnement inclus",tabs:[["w1","Cours : HTML"],["w2","Cours : CSS"],["wx","Mémento TP (à imprimer)"]],
  decks:[{key:"web",tag:"TP noté",title:"HTML et CSS",desc:"Balises, sélecteurs, boîtes, display, position",bank:()=>BANK.web,gens:["cssMargin","cssBox","cssBuild","matchWeb"]},{key:"webmix",tag:"Spécial TP",title:"Révision TP noté",desc:"12 questions dont des règles à écrire",bank:()=>BANK.web,gens:["cssBuild","cssBuild","cssMargin","cssBox","matchWeb"],n:12}],
  gendecks:[{key:"g-cssb",tag:"Générées",title:"Écrire des règles CSS",desc:"En tuiles, comme sur Duolingo",gens:["cssBuild"]},{key:"g-box",tag:"Générées",title:"Marges et boîtes",desc:"Raccourci margin, taille d'une boîte",gens:["cssMargin","cssBox"]},{key:"g-mweb",tag:"Générées",title:"Associer les paires",desc:"Propriétés, positions, balises",gens:["matchWeb"]}]}
};
let SUBJ="r106";
try{const s=localStorage.getItem("r106-subj");if(s&&SUBJECTS[s])SUBJ=s}catch(e){}
function curDecks(){return SUBJECTS[SUBJ].decks} function curGen(){return SUBJECTS[SUBJ].gendecks}

let PLAN=null;
function renderPlan(){const el=document.getElementById("plan");if(!el)return;
  const S=SUBJECTS[SUBJ];const e=examOf(SUBJ);const f=feelOf(SUBJ);const m=subjMastery(SUBJ);
  const slots=(PLAN&&Array.isArray(PLAN.slots)?PLAN.slots:[]).filter(x=>x.subj===SUBJ&&new Date(x.start)>new Date(Date.now()-3*3600e3));
  el.innerHTML=`<div class="ex">${e?`<span class="pd ${daysTo(e.date)<=1?"hot":daysTo(e.date)<=3?"soon":""}">${dayLabel(daysTo(e.date))}</span><span class="pt"><b>${esc(e.code)} · ${esc(e.title)}</b><small>${esc(e.scope||"programme non précisé")}</small>${slots.length?`<small>Révision prévue : ${slots.map(x=>esc(x.label)).join(" · ")}</small>`:""}<span class="mini"><span class="meter"><i style="width:${m}%"></i></span>${m} % maîtrisé</span></span>`
    :`<span class="pd">—</span><span class="pt"><b>Pas de contrôle prévu en ${esc(S.code)}</b><small>Le planning se met à jour chaque jour. Tu peux continuer à t'entraîner.</small><span class="mini"><span class="meter"><i style="width:${m}%"></i></span>${m} % maîtrisé</span></span>`}</div>
  <div class="feel-row"><div class="feel-top"><b>Ton ressenti en ${esc(S.code)}</b><small>il adapte ton programme</small></div><div class="scale" role="group" aria-label="Ressenti">${[1,2,3,4,5].map(v=>`<button type="button" data-feel="${SUBJ}" data-v="${v}" aria-pressed="${f===v}"><i style="width:${v*20}%"></i>${FEEL[v]}</button>`).join("")}</div></div>`;
  el.querySelectorAll("[data-feel]").forEach(b=>b.onclick=()=>{setFeel(SUBJ,+b.dataset.v);renderPlan();renderGuide();buildTabs();showTab("learn");toast(`${S.code} : « ${FEEL[+b.dataset.v]} ». Programme mis à jour.`)})}
function renderGuide(){const S=SUBJECTS[SUBJ];const g=document.getElementById("guide");
  const ts=planFor().tasks.filter(t=>t.subj===SUBJ);
  if(ts.length){g.innerHTML=`<ul class="tasks" style="grid-column:1/-1">${ts.map(t=>{const d=taskDone(t);return `<li class="task ${d?"done":""}"><span class="tick" aria-hidden="true">${CHECK}</span><div class="tt"><span class="tt-t">${esc(t.title)}</span><small>≈ ${t.min} min · ${esc(t.why)}</small></div>${d?"":`<button class="btn ghost" data-task="${esc(t.key)}">${t.kind==="read"?"Lire":"Go"}</button>`}</li>`}).join("")}</ul>`;
    g.querySelectorAll("[data-task]").forEach(b=>b.onclick=()=>{const t=planFor().tasks.find(x=>x.key===b.dataset.task);if(t)runTask(t)});return}
  const x=S.tabs[S.tabs.length-1];const d=S.decks;
  g.innerHTML=`<div><b class="n">1</b><strong>Relis le résumé</strong><p>Le <button class="linkbtn" data-goto="${x[0]}">${x[1].toLowerCase()}</button> tient en un écran. Les onglets de cours contiennent les schémas interactifs.</p></div>
  <div><b class="n">2</b><strong>Fais « ${esc(d[0].title)} »</strong><p>10 questions, la correction s'affiche après chaque réponse.</p></div>
  <div><b class="n">3</b><strong>Finis par « ${esc(d[mixIdx(S)].title)} »</strong><p>L'entraînement le plus proche du contrôle.</p></div>`}

/* ===================== Sons (Web Audio, générés, aucun fichier) ===================== */
const SND=(()=>{let ctx=null,on=true;
  try{on=localStorage.getItem("r106-sound")!=="off"}catch(e){}
  function ac(){if(!on)return null;try{if(!ctx)ctx=new (window.AudioContext||window.webkitAudioContext)();if(ctx.state==="suspended")ctx.resume();return ctx}catch(e){return null}}
  function tone(f,t0,d,type="sine",g=.18,f2){const c=ac();if(!c)return;const o=c.createOscillator(),v=c.createGain();o.type=type;const t=c.currentTime+t0;
    o.frequency.setValueAtTime(f,t);if(f2)o.frequency.exponentialRampToValueAtTime(f2,t+d);
    v.gain.setValueAtTime(0.0001,t);v.gain.exponentialRampToValueAtTime(g,t+.012);v.gain.exponentialRampToValueAtTime(0.0001,t+d);
    o.connect(v);v.connect(c.destination);o.start(t);o.stop(t+d+.02)}
  const st=n=>Math.pow(2,n/12);
  return {
    get on(){return on},
    set(v){on=v;try{localStorage.setItem("r106-sound",v?"on":"off")}catch(e){}if(v)this.tap()},
    tap(){tone(1400,0,.035,"triangle",.05)},
    good(combo=0){const k=st(Math.min(combo,8));tone(784*k,0,.11,"triangle",.16);tone(1175*k,.08,.22,"triangle",.16);tone(2350*k,.08,.18,"sine",.03)},
    bad(){tone(196,0,.18,"square",.045,150);tone(147,.12,.24,"square",.04,110)},
    match(){tone(988,0,.07,"triangle",.1);tone(1319,.05,.1,"triangle",.1)},
    combo(){[0,4,7,12].forEach((n,i)=>tone(880*st(n),i*.05,.12,"triangle",.09))},
    done(){[0,4,7,12,16].forEach((n,i)=>tone(523*st(n),i*.09,.28,"triangle",.14));tone(1046,.5,.6,"sine",.06)},
    goal(){[0,7,12].forEach((n,i)=>tone(659*st(n),i*.11,.32,"square",.05));[0,4,7,12].forEach((n,i)=>tone(1318*st(n),.36+i*.06,.25,"triangle",.07))},
    feel(v){tone(440*st((v-1)*3),0,.09,"sine",.09)}
  }})();
function confetti(){try{if(matchMedia("(prefers-reduced-motion: reduce)").matches)return;const c=document.createElement("canvas");c.className="confetti";c.width=innerWidth;c.height=innerHeight;document.body.appendChild(c);const g=c.getContext("2d");
  const cs=getComputedStyle(document.documentElement);const cols=["--ok","--warn","--ink","--bad"].map(v=>cs.getPropertyValue(v).trim()||"#888");
  const P=Array.from({length:90},()=>({x:innerWidth/2+(Math.random()-.5)*120,y:innerHeight*.45,vx:(Math.random()-.5)*11,vy:-Math.random()*12-4,r:Math.random()*6+3,c:cols[rnd(cols.length)],a:Math.random()*6}));
  let n=0;(function f(){g.clearRect(0,0,c.width,c.height);P.forEach(p=>{p.x+=p.vx;p.y+=p.vy;p.vy+=.38;p.a+=.2;g.save();g.translate(p.x,p.y);g.rotate(p.a);g.fillStyle=p.c;g.fillRect(-p.r/2,-p.r/4,p.r,p.r/2);g.restore()});if(++n<110)requestAnimationFrame(f);else c.remove()})()}catch(e){}}
let toastT=null;
function toast(msg){let t=document.querySelector(".toast");if(!t){t=document.createElement("div");t.className="toast";t.setAttribute("role","status");document.body.appendChild(t)}t.textContent=msg;t.hidden=false;clearTimeout(toastT);toastT=setTimeout(()=>{t.hidden=true},2600)}

/* ===================== Accueil ===================== */
let VIEW="dash";
const BANKSUBJ={archiprat:"r103",gauss:"r107",deriv:"r107",poly:"r107",sys:"r104",sysprat:"r104",clang:"r101",archi:"r103",relations:"r106",divis:"r106",algo:"r101",logique:"r106",ensembles:"r106",bdd:"r105",maths:"r107",web:"r102"};
const FEEL=["","Perdu","Fragile","Moyen","Bien","Prêt"];
const APP_URL="https://claude.ai/artifact/1omxbHNTZ135Boo6oxkCYC";
let ME={name:"",sync:false};
function allQ(){const out=[];for(const [k,arr] of Object.entries(BANK))for(const q of arr)out.push(Object.assign({subj:BANKSUBJ[k]||""},q));return out}
function subjBank(k){return SUBJECTS[k].decks[0].bank()}
function subjMastery(k){return mastery(subjBank(k))}
function feelOf(k){return (state.feel||{})[k]||3}
function setFeel(k,v,silent){state.feel=state.feel||{};state.feel[k]=Math.max(1,Math.min(5,v));save();if(!silent)SND.feel(v)}
function examList(){return (PLAN&&Array.isArray(PLAN.exams)&&PLAN.exams.length?PLAN.exams:Object.entries(SUBJECTS).map(([k,x])=>({subj:k,code:x.code,title:x.exlabel,date:x.exam,scope:x.scope}))).slice().sort((a,b)=>a.date<b.date?-1:1)}
function nextExams(){return examList().filter(e=>new Date(e.date)>new Date(Date.now()-2*3600e3))}
function recentExams(){const now=Date.now();return examList().filter(e=>{const t=new Date(e.date).getTime();return t<now-2*3600e3&&t>now-5*864e5})}
function examOf(k){return nextExams().find(e=>e.subj===k)||null}
function fmtLeft(iso){const ms=new Date(iso)-new Date();if(ms<=0)return "en cours";const h=Math.floor(ms/3600e3),m=Math.floor(ms%3600e3/60e3);return h>=48?`dans ${Math.round(h/24)} jours`:h>=1?`dans ${h} h ${String(m).padStart(2,"0")}`:`dans ${m} min`}
function strip(h){const d=document.createElement("div");d.innerHTML=h;return d.textContent.replace(/\s+/g," ").trim()}
function sameDay(a,b){return a.getFullYear()===b.getFullYear()&&a.getMonth()===b.getMonth()&&a.getDate()===b.getDate()}
function dayLabel(d){return d===0?"Aujourd'hui":d===1?"Demain":d<0?"passé":"J−"+d}
function fmtDate(iso){const d=new Date(iso);return d.toLocaleDateString("fr-FR",{weekday:"short",day:"numeric",month:"short"})+" · "+d.toLocaleTimeString("fr-FR",{hour:"2-digit",minute:"2-digit"}).replace(":"," h ")}
function goalN(){return state.goal||30}
function todayCount(){return (state.daily||{})[today()]||0}

/* ---------- Programme adaptatif ---------- */
/* Priorité = urgence du contrôle × besoin. Le besoin mélange la maîtrise mesurée par les quiz et le ressenti déclaré.
   Le ressenti fixe aussi le type de travail : se sentir perdu → on reprend le cours ; se sentir prêt → mix et erreurs. */
function subjWeak(k){const ids=new Set(subjBank(k).map(q=>q.id));return weakList().filter(q=>ids.has(q.id))}
function mixIdx(S){const i=S.decks.findIndex(d=>d.mix);return i>=0?i:S.decks.length-1}
function planFor(){
  const budget=state.budget||45;const now=new Date();
  const subs=Object.keys(SUBJECTS).map(k=>{const e=examOf(k);const days=e?Math.max(0,daysTo(e.date)):99;const m=subjMastery(k)/100;const f=feelOf(k);
    const need=.55*(1-m)+.45*((5-f)/4);const urg=e&&days<=14?1/(1+days*.55):.04;return {k,e,days,m,f,need,prio:urg*(.35+need)}}).sort((a,b)=>b.prio-a.prio);
  const tasks=[];let left=budget,cap=budget,used=0;
  const add=t=>{if((left<=0||used>=cap)&&used>0)return;t.key=today()+":"+t.subj+":"+t.id;tasks.push(t);left-=t.min;used+=t.min};
  const lessonOf=(k,i)=>{const S=SUBJECTS[k];return S.decks[Math.min(i,S.decks.length-1)]};
  const focus=subs.filter(s=>s.e&&s.days<=10).slice(0,3);
  const list=focus.length?focus:subs.slice().sort((a,b)=>a.m-b.m).slice(0,2);
  const tot=list.reduce((a,s)=>a+s.prio,0)||1;
  list.forEach((s,idx)=>{const S=SUBJECTS[s.k];const k=s.k;const weak=subjWeak(k).length;const last=S.tabs[S.tabs.length-1];
    if(idx>0&&left<8)return;
    used=0;cap=idx===list.length-1?left:Math.max(10,Math.round(budget*s.prio/tot));
    if(s.e&&s.days<=1&&idx===0)add({subj:k,id:"express",kind:"read",tab:last[0],title:`Relire « ${last[1]} »`,min:5,why:"Le contrôle approche : on refait le tour de l'essentiel."});
    if(s.f<=2||s.m<.25){
      add({subj:k,id:"cours",kind:"read",tab:S.tabs[0][0],title:`Reprendre « ${S.tabs[0][1]} »`,min:12,why:s.f<=2?"Tu te sens "+FEEL[s.f].toLowerCase()+" : on repart du cours, avec les schémas interactifs.":"Peu de questions réussies pour l'instant : on commence par le cours."});
      add({subj:k,id:"l0",kind:"deck",deck:0,title:`Leçon « ${lessonOf(k,0).title} »`,min:8,why:"10 questions corrigées une par une."});
      if(S.gendecks[0])add({subj:k,id:"g0",kind:"gen",deck:0,title:`Exercices « ${S.gendecks[0].title} »`,min:8,why:"Des exercices nouveaux à chaque fois pour automatiser."});
    }else if(s.f===3){
      add({subj:k,id:"l0",kind:"deck",deck:0,title:`Leçon « ${lessonOf(k,0).title} »`,min:8,why:"Pour consolider les bases."});
      if(weak>=2)add({subj:k,id:"weak",kind:"weak",title:`Refaire tes ${Math.min(weak,10)} erreurs`,min:6,why:"Les questions ratées sont celles qui rapportent le plus de points à revoir."});
      add({subj:k,id:"mix",kind:"deck",deck:mixIdx(S),title:`« ${S.decks[mixIdx(S)].title} »`,min:10,why:"Un entraînement dans les conditions du contrôle."});
    }else{
      add({subj:k,id:"mix",kind:"deck",deck:mixIdx(S),title:`« ${S.decks[mixIdx(S)].title} »`,min:10,why:s.f===5?"Tu te sens prêt : on vérifie avec un entraînement type contrôle.":"Tu te sens bien : on passe en conditions de contrôle."});
      if(weak)add({subj:k,id:"weak",kind:"weak",title:`Refaire tes ${Math.min(weak,10)} erreurs`,min:5,why:"Pour ne pas laisser de trou."});
      const g=S.gendecks[(new Date().getDate())%S.gendecks.length];if(g&&idx===0)add({subj:k,id:"gx",kind:"gen",deck:S.gendecks.indexOf(g),title:`Exercices « ${g.title} »`,min:6,why:"Un format différent pour varier."});
    }
  });
  const top=list[0];
  let why="";
  if(top){const S=SUBJECTS[top.k];why=top.e&&top.days<=10?`Priorité ${S.code} : contrôle ${top.days===0?"aujourd'hui":top.days===1?"demain":"dans "+top.days+" jours"}, ressenti « ${FEEL[top.f]} », ${Math.round(top.m*100)} % maîtrisé.`:`Pas de contrôle proche : on entretient la matière la moins maîtrisée (${S.code}).`}
  return {tasks,why,budget,subs};
}
function taskDone(t){return !!(state.tasks||{})[t.key]}
function markTask(key,v=true){if(!key)return;state.tasks=state.tasks||{};if(v)state.tasks[key]=1;else delete state.tasks[key];
  const keep=today();for(const k of Object.keys(state.tasks))if(!k.startsWith(keep))delete state.tasks[k];save()}
function runTask(t){
  const S=SUBJECTS[t.subj];setSubject(t.subj,true);
  if(t.kind==="read"){markTask(t.key);showTab(t.tab);window.scrollTo(0,0);toast("Bonne lecture. La tâche est cochée.");return}
  showTab("learn");
  if(t.kind==="deck")startLesson(S.decks[t.deck]||S.decks[0],t.key);
  else if(t.kind==="gen")startLesson(S.gendecks[t.deck]||S.gendecks[0],t.key);
  else if(t.kind==="weak"){const qs=subjWeak(t.subj).slice(0,10);if(qs.length)startLesson({key:"weak",title:"Mes erreurs",bank:()=>qs,gens:[],n:qs.length},t.key);else startLesson(S.decks[0],t.key)}
}
function weakList(){const all=allQ();return all.filter(q=>(state.miss||{})[q.id]>0&&lvl(q.id)<3).sort((a,b)=>(state.miss[b.id]-state.miss[a.id])||(lvl(a.id)-lvl(b.id)))}

const CHECK=`<svg viewBox="0 0 16 16" width="14" height="14" aria-hidden="true"><path d="M3.5 8.5l3 3 6-7" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
let CURPLAN=null;
function examDeck(e){const S=SUBJECTS[e.subj];if(!S)return null;const ds=S.decks;return (e.deck&&ds.find(d=>d.key===e.deck))||ds[mixIdx(S)]}
function examType(e){return String(e.title||"").split(/ (?:lun|mar|mer|jeu|ven|sam|dim)\. /)[0]||"Contrôle"}
function renderDash(){
  const el=document.getElementById("dash");if(!el)return;const now=new Date();
  const ex=nextExams();const nx=ex[0];const NS=nx&&SUBJECTS[nx.subj];
  const slots=(PLAN&&Array.isArray(PLAN.slots)?PLAN.slots:[]);
  const P=CURPLAN=planFor();const nDone=P.tasks.filter(taskDone).length;const nextT=P.tasks.find(t=>!taskDone(t));
  const todayItems=[...ex.filter(e=>sameDay(new Date(e.date),now)).map(e=>({t:new Date(e.date),txt:`<b>${esc(e.code)}</b> · ${esc(e.title)}`,cls:"exam"})),...slots.filter(s=>sameDay(new Date(s.start),now)&&new Date(s.start)>new Date(now-3*3600e3)).map(s=>({t:new Date(s.start),txt:`Révision ${esc(SUBJECTS[s.subj]?.code||"")} · ${esc(s.label)}`,cls:"slot"}))].sort((a,b)=>a.t-b.t);
  const tom=new Date(now.getTime()+864e5);
  const tomorrow=[...ex.filter(e=>sameDay(new Date(e.date),tom)).map(e=>`<b>${esc(e.code)}</b> · ${esc(e.title)}`),...slots.filter(s=>sameDay(new Date(s.start),tom)).map(s=>`Révision ${esc(SUBJECTS[s.subj]?.code||"")} · ${esc(s.label)}`)];
  const weak=weakList();
  const days=[...Array(7)].map((_,i)=>{const d=new Date(now.getTime()-(6-i)*864e5);return {k:ymd(d),l:["di","lu","ma","me","je","ve","sa"][d.getDay()]}});
  const counts=days.map(d=>(state.daily||{})[d.k]||0);const mx=Math.max(goalN()*1.2,...counts);
  const week=counts.reduce((a,b)=>a+b,0);
  let cd="";if(nx){const ms=Math.max(0,new Date(nx.date)-now);const d=Math.floor(ms/864e5),h=Math.floor(ms%864e5/3600e3),m=Math.floor(ms%3600e3/60e3);
    cd=`<div class="count" aria-label="Temps restant">${d?`<div><b>${d}</b><small>jour${d>1?"s":""}</small></div>`:""}<div><b>${h}</b><small>h</small></div>${d?"":`<div><b>${String(m).padStart(2,"0")}</b><small>min</small></div>`}</div>`}
  const hour=now.getHours();const hi=(hour<5?"Encore debout":hour<18?"Salut":"Bonsoir")+(ME.name?" "+esc(ME.name.split(" ")[0]):"");
  const recent=recentExams().filter(e=>!(state.examFeel||{})[e.subj+e.date]);
  el.innerHTML=`
  ${!state.seenIntro?`<div class="card welcome"><div class="card-h"><h3>Bienvenue dans tes révisions</h3><button class="linkbtn" id="introOk">J'ai compris</button></div>
    <ol><li><b>En haut</b>, le prochain contrôle et le temps qu'il reste.</li><li><b>Ton programme du jour</b> se construit tout seul à partir des dates de contrôle, de tes résultats aux quiz et de ce que tu ressens.</li><li><b>Dis comment tu te sens</b> dans chaque matière : le programme s'adapte tout de suite.</li><li><b>Mes contrôles</b> liste les évaluations à venir ; le bouton « Réviser » ouvre l'entraînement qui correspond.</li><li>Les cours, fiches et quiz sont dans les boutons de matière (R1.01 à R1.07), rangés par date du prochain contrôle.</li></ol></div>`:""}
  <div class="card c-hero">${nx?`<div><p class="hello">${hi}, prochain contrôle :</p><div class="eyebrow">${esc(nx.code)} · ${esc(fmtDate(nx.date))}</div><h2>${esc(NS?NS.name:nx.title)}</h2><p class="scope">${esc(nx.title)} — ${esc(nx.scope||"programme non précisé")}</p></div>${cd}
    ${NS?`<div class="ready"><span>Prêt à</span><div class="meter"><i style="width:${subjMastery(nx.subj)}%"></i></div><b>${subjMastery(nx.subj)} %</b><span class="muted">· ressenti : ${FEEL[feelOf(nx.subj)].toLowerCase()}</span></div>`:"<div></div>"}
    <div class="hero-act">${NS?`<button class="btn rev" data-rev="0">Réviser : ${esc(examDeck(nx).title)}</button>`:""}${nextT?`<button class="btn" id="heroGo">${nDone?"Continuer le programme":"Lancer le programme du jour"}</button>`:""}${NS?`<button class="btn ghost" data-open="${nx.subj}" data-tab="${NS.tabs[NS.tabs.length-1][0]}">${esc(NS.tabs[NS.tabs.length-1][1])}</button>`:""}</div>`
    :`<div><p class="hello">${hi}</p><h2>Aucun contrôle à venir</h2><p class="scope">Le planning se met à jour automatiquement chaque jour depuis l'emploi du temps. En attendant, entretiens tes acquis avec le programme ci-dessous.</p></div>`}</div>

  <div class="card c-agenda"><div class="card-h"><h3>Mes contrôles</h3><span class="eyebrow">${ex.length} à venir · TD 3 · TP 3.2</span></div>
    ${recent.map(e=>`<div class="after"><b>Comment s'est passé ${esc(e.code)} (${esc(e.title)}) ?</b><div class="presets">${[["Très bien",5],["Plutôt bien",4],["Moyen",3],["Mal",2]].map(([l,v])=>`<button type="button" class="pill" data-after="${esc(e.subj+e.date)}" data-v="${v}">${l}</button>`).join("")}</div></div>`).join("")}
    ${ex.length?`<ol class="agd">${ex.map((e,i)=>{const d=daysTo(e.date);const S=SUBJECTS[e.subj];const dt=new Date(e.date);const dk=S?examDeck(e):null;const sl=slots.filter(x=>x.subj===e.subj&&new Date(x.start)>new Date(now-3*3600e3)&&x.start<e.date);
      return `<li class="${i===0?"first":""}" style="--encre:${ENC[e.code]||"var(--ink)"}"><div class="dt" aria-hidden="true"><small>${dt.toLocaleDateString("fr-FR",{weekday:"short"}).replace(".","")}</small><b>${dt.getDate()}</b><small>${dt.toLocaleDateString("fr-FR",{month:"short"}).replace(".","")}</small></div>
      <div class="info"><div class="top"><span class="code">${esc(e.code)}</span><span class="hr">${esc(fmtDate(e.date).split(" · ").pop())}</span></div><span class="ttl">${esc(S?S.name:e.code)} · ${esc(examType(e))}</span><span class="sc">${esc(e.scope||"programme non précisé")}</span>${sl.length?`<span class="sc">Révision prévue : ${sl.map(x=>esc(x.label)).join(" · ")}</span>`:""}${S?`<span class="mini"><span class="meter"><i style="width:${subjMastery(e.subj)}%"></i></span>${subjMastery(e.subj)} % maîtrisé · ${FEEL[feelOf(e.subj)].toLowerCase()}</span>`:""}</div>
      <div class="act"><span class="jl ${d<=1?"hot":d<=3?"soon":""}">${dayLabel(d)}</span>${dk?`<button type="button" class="btn" data-rev="${i}" title="${esc(dk.title)}">Réviser</button>`:`<span class="noact">pas de quiz</span>`}</div></li>`}).join("")}</ol>`:`<p class="muted">Aucun contrôle à venir n'est enregistré.</p>`}</div>

  <div class="card c-plan"><div class="card-h"><h3>Ton programme du jour</h3><div class="budget"><span>Temps dispo</span><span class="seg" role="group" aria-label="Temps disponible">${[20,45,90].map(m=>`<button type="button" data-budget="${m}" aria-pressed="${P.budget===m}">${m<60?m+" min":"1 h 30"}</button>`).join("")}</span></div></div>
    <p class="why-plan">${esc(P.why)}</p>
    <ul class="tasks">${P.tasks.map(t=>{const d=taskDone(t);return `<li class="task ${d?"done":""} ${t===nextT?"next":""}"><button type="button" class="tick" data-tick="${esc(t.key)}" aria-pressed="${d}" aria-label="${d?"Décocher":"Cocher"} la tâche">${CHECK}</button><div class="tt"><span class="tt-t"><span class="scode">${SUBJECTS[t.subj].code}</span>${(x=>x?`<span class="tj ${daysTo(x.date)<=1?"hot":daysTo(x.date)<=3?"soon":""}">${dayLabel(daysTo(x.date))}</span>`:"")(examOf(t.subj))}${esc(t.title)}</span><small>≈ ${t.min} min · ${esc(t.why)}</small></div>${d?"":`<button class="btn ${t===nextT?"":"ghost"}" data-task="${esc(t.key)}">${t.kind==="read"?"Lire":"Go"}</button>`}</li>`}).join("")}</ul>
    <div class="plan-bar"><div class="meter"><i style="width:${P.tasks.length?Math.round(100*nDone/P.tasks.length):0}%"></i></div><span>${nDone}/${P.tasks.length} fait${nDone>1?"s":""}</span></div></div>

  <div class="card c-today"><div class="card-h"><h3>Aujourd'hui</h3><span class="eyebrow">${now.toLocaleDateString("fr-FR",{weekday:"long",day:"numeric",month:"long"})}</span></div>
    ${todayItems.length?`<ul class="agenda">${todayItems.map(t=>`<li class="${t.cls}"><span>${t.t.toLocaleTimeString("fr-FR",{hour:"2-digit",minute:"2-digit"})}</span><span>${t.txt}</span></li>`).join("")}</ul>`:`<p class="muted">Pas de contrôle ni de créneau de révision prévu aujourd'hui.</p>`}
    ${tomorrow.length?`<div class="eyebrow">Demain</div><ul class="agenda small">${tomorrow.map(t=>`<li><span>·</span><span>${t}</span></li>`).join("")}</ul>`:""}</div>

  <div class="card c-feel"><div class="card-h"><h3>Comment tu te sens ?</h3><span class="eyebrow">ça adapte le programme</span></div>
    ${Object.entries(SUBJECTS).map(([k,x])=>{const e=examOf(k);const f=feelOf(k);return `<div class="feel-row"><div class="feel-top"><b>${x.code} · ${x.name}</b><small>${e?dayLabel(daysTo(e.date))+" · ":""}${subjMastery(k)} % maîtrisé</small></div>
    <div class="scale" role="group" aria-label="Ressenti ${x.code}">${[1,2,3,4,5].map(v=>`<button type="button" data-feel="${k}" data-v="${v}" aria-pressed="${f===v}"><i style="width:${v*20}%"></i>${FEEL[v]}</button>`).join("")}</div></div>`}).join("")}</div>

  <div class="card c-weak"><div class="card-h"><h3>Mes points faibles</h3>${weak.length?`<span class="eyebrow">${weak.length} question${weak.length>1?"s":""}</span>`:""}</div>
    ${weak.length?`<ol class="weak">${weak.slice(0,5).map(q=>`<li><span class="scode">${SUBJECTS[q.subj]?.code||""}</span><span>${esc(strip(q.q).slice(0,100))}${strip(q.q).length>100?"…":""}</span><small>${state.miss[q.id]}× ratée</small></li>`).join("")}</ol><div><button class="btn" id="redoWeak">Refaire mes ${Math.min(weak.length,10)} erreurs</button></div>`:`<p class="muted">Aucune erreur à revoir. Les questions ratées apparaîtront ici et disparaîtront quand tu les auras réussies plusieurs fois.</p>`}</div>

  <div class="card c-stats"><div class="card-h"><h3>Ma semaine</h3><div class="budget"><span>Objectif</span><span class="seg" role="group" aria-label="Objectif de questions par jour">${[20,30,50].map(n=>`<button type="button" data-goal="${n}" aria-pressed="${goalN()===n}">${n}</button>`).join("")}</span></div></div>
    <div class="kpis"><div><b>${todayCount()}</b><small>questions aujourd'hui</small></div><div><b>${week}</b><small>sur 7 jours</small></div><div><b>${curStreak()}</b><small>jour${curStreak()>1?"s":""} de série</small></div></div>
    <div class="bars" role="img" aria-label="Questions par jour sur 7 jours, objectif ${goalN()}"><div class="goal-line" style="bottom:${Math.round(100*goalN()/mx)}%"><span>${goalN()}</span></div>${days.map((d,i)=>`<div class="bar ${i===6?"today":""}"><i class="${counts[i]>=goalN()?"met":""}" style="height:${Math.round(100*counts[i]/mx)}%" title="${counts[i]} questions"></i><small>${d.l}</small></div>`).join("")}</div></div>

  <div class="card c-notes"><div class="card-h"><h3>Pense-bête</h3></div>
    <form id="noteForm" class="note-add"><input class="txt" id="noteIn" placeholder="Ex. apporter le mémento CSS mercredi" autocomplete="off" aria-label="Nouvelle note"><button class="btn" type="submit">Ajouter</button></form>
    <ul class="notes" id="notes"></ul><button type="button" class="linkbtn" id="notesClear" hidden>Retirer les éléments cochés</button></div>

  <div class="card c-share"><div class="card-h"><h3>Partager avec ta promo</h3></div>
    <p class="muted" style="margin:0">Envoie ce lien à tes potes de BUT1. Chacun a sa propre progression, ses ressentis et son programme : personne ne voit tes résultats.</p>
    <div class="share-row"><span class="share-url" id="shareUrl">${APP_URL}</span><button class="btn" id="copyLink" type="button">Copier le lien</button></div>
    <div class="sync ${ME.sync?"on":""}"><i></i>${ME.sync?"Ta progression est sauvegardée sur ton compte Claude.":"Ta progression est enregistrée sur cet appareil."}</div>
    <ul class="links">${[["Arche · R1.01 Init Dev","https://arche.univ-lorraine.fr/course/view.php?id=38159"],["Arche · R1.06 Maths discrètes","https://arche.univ-lorraine.fr/course/view.php?id=49573"],["Arche · R1.05 Bases de données","https://arche.univ-lorraine.fr/course/view.php?id=72695"],["Arche · R1.07 Outils maths","https://arche.univ-lorraine.fr/course/view.php?id=18999"],["Arche · R1.02 Web","https://arche.univ-lorraine.fr/course/view.php?id=89245"],["Mails de l'université (ENT)","https://mail.etu.univ-lorraine.fr/"]].map(([t,u])=>`<li><a href="${u}" target="_blank" rel="noopener">${t}</a></li>`).join("")}</ul></div>`;
  renderNotes();
  const $=id=>document.getElementById(id);
  if($("introOk"))$("introOk").onclick=()=>{state.seenIntro=1;save();SND.tap();renderDash()};
  $("noteForm").onsubmit=e=>{e.preventDefault();const i=$("noteIn");const t=i.value.trim();if(!t)return;NOTES.unshift({text:t.slice(0,300),done:false,at:Date.now()});i.value="";saveNotes();renderNotes();SND.tap()};
  $("notesClear").onclick=()=>{NOTES=NOTES.filter(n=>!n.done);saveNotes();renderNotes()};
  if($("heroGo"))$("heroGo").onclick=()=>{const t=CURPLAN.tasks.find(x=>!taskDone(x));if(t)runTask(t)};
  el.querySelectorAll("[data-task]").forEach(b=>b.onclick=()=>{const t=CURPLAN.tasks.find(x=>x.key===b.dataset.task);if(t)runTask(t)});
  el.querySelectorAll("[data-tick]").forEach(b=>b.onclick=()=>{const k=b.dataset.tick;const was=!!(state.tasks||{})[k];markTask(k,!was);if(!was){SND.good();checkPlanDone()}else SND.tap();renderDash()});
  el.querySelectorAll("[data-budget]").forEach(b=>b.onclick=()=>{state.budget=+b.dataset.budget;save();SND.tap();renderDash()});
  el.querySelectorAll("[data-goal]").forEach(b=>b.onclick=()=>{state.goal=+b.dataset.goal;save();SND.tap();renderStats();renderDash()});
  el.querySelectorAll("[data-feel]").forEach(b=>b.onclick=()=>{const k=b.dataset.feel,v=+b.dataset.v;setFeel(k,v);renderDash();toast(`${SUBJECTS[k].code} : « ${FEEL[v]} ». Programme mis à jour.`)});
  el.querySelectorAll("[data-after]").forEach(b=>b.onclick=()=>{state.examFeel=state.examFeel||{};const v=+b.dataset.v;state.examFeel[b.dataset.after]=v;save();
    if(v>=4){SND.goal();confetti();toast("Bien joué ! Garde ce rythme pour le prochain.")}else{SND.feel(3);toast(v===3?"Note dans le pense-bête ce qui t'a bloqué, on le retravaillera.":"Ça arrive. Note ce qui t'a bloqué : on le reprendra calmement.")}renderDash()});
  el.querySelectorAll("[data-rev]").forEach(b=>b.onclick=()=>{const e=ex[+b.dataset.rev];const dk=e&&examDeck(e);if(!dk)return;SND.tap();setSubject(e.subj,true);showTab("learn");startLesson(dk)});
  el.querySelectorAll("[data-open]").forEach(b=>b.onclick=()=>{setSubject(b.dataset.open);showTab(b.dataset.tab)});
  if($("redoWeak"))$("redoWeak").onclick=()=>{const qs=weak.slice(0,10);const k=qs[0].subj||SUBJ;setSubject(k,true);showTab("learn");startLesson({key:"weak",title:"Mes erreurs",bank:()=>qs,gens:[],n:qs.length})};
  $("copyLink").onclick=()=>{const done=()=>{toast("Lien copié. Colle-le dans ta conversation de promo.");SND.match()};
    try{navigator.clipboard.writeText(APP_URL).then(done,()=>{selectShare();toast("Lien sélectionné : fais Copier.")})}catch(e){selectShare();toast("Lien sélectionné : fais Copier.")}};
}
function selectShare(){const n=document.getElementById("shareUrl");const r=document.createRange();r.selectNodeContents(n);const s=getSelection();s.removeAllRanges();s.addRange(r)}
function checkPlanDone(){if(!CURPLAN)CURPLAN=planFor();const P=CURPLAN;if(P.tasks.length&&P.tasks.every(taskDone)&&state.planCheered!==today()){state.planCheered=today();save();setTimeout(()=>{SND.goal();confetti();toast("Programme du jour terminé. Bravo !")},250)}}

/* Pense-bête */
let NOTES=[],notesRef=null,notesT=null;
function loadNotesLocal(){try{const n=JSON.parse(localStorage.getItem("r106-notes")||"null");if(Array.isArray(n))NOTES=n}catch(e){}}
function saveNotes(){try{localStorage.setItem("r106-notes",JSON.stringify(NOTES))}catch(e){}clearTimeout(notesT);notesT=setTimeout(()=>{if(notesRef)notesRef.set({items:NOTES,updatedAt:Date.now()}).catch(()=>{})},600)}
function renderNotes(){const el=document.getElementById("notes");if(!el)return;
  el.innerHTML=NOTES.length?NOTES.map((n,i)=>`<li class="${n.done?"done":""}"><label><input type="checkbox" data-n="${i}" ${n.done?"checked":""}><span>${esc(n.text)}</span></label><button type="button" class="nx" data-del="${i}" aria-label="Supprimer">×</button></li>`).join(""):`<li class="empty-note">Rien à retenir pour l'instant. Ajoute une chose à ne pas oublier.</li>`;
  el.querySelectorAll("[data-n]").forEach(c=>c.onchange=()=>{NOTES[+c.dataset.n].done=c.checked;saveNotes();renderNotes();if(c.checked)SND.tap()});
  el.querySelectorAll("[data-del]").forEach(b=>b.onclick=()=>{NOTES.splice(+b.dataset.del,1);saveNotes();renderNotes()});
  const cl=document.getElementById("notesClear");if(cl)cl.hidden=!NOTES.some(n=>n.done);}

function showDash(){VIEW="dash";try{localStorage.setItem("r106-view","dash")}catch(e){}
  if(L){document.getElementById("lesson").hidden=true;document.getElementById("home").hidden=false;L=null}
  buildTabs();document.querySelectorAll("[role=tabpanel]").forEach(p=>p.hidden=p.id!=="tab-dash");renderDash();window.scrollTo(0,0)}

/* ===================== Navigation ===================== */
let CURTAB="learn";
function buildTabs(){const S=SUBJECTS[SUBJ];const nav=document.getElementById("tabsnav");
  nav.innerHTML=[["learn","S'entraîner"],...S.tabs,["mine","Ajouter une fiche"]].map(([k,l])=>`<button role="tab" data-tab="${k}" aria-selected="false">${l}</button>`).join("");
  nav.querySelectorAll("button").forEach(t=>t.onclick=()=>{SND.tap();showTab(t.dataset.tab)});
  const P=planFor();const left=P.tasks.filter(t=>!taskDone(t)).length;
  document.getElementById("mainnav").innerHTML=`<button type="button" data-s="dash" ${VIEW==="dash"?'aria-current="page"':""}><b>Accueil</b><small>${left?left+" tâche"+(left>1?"s":"")+" à faire":"programme fait"}</small></button>`+Object.entries(SUBJECTS).map(([k,x])=>{const e=examOf(k);return [k,x,e?e.date:"9999"]}).sort((a,b)=>a[2]<b[2]?-1:a[2]>b[2]?1:0).map(([k,x])=>{const e=examOf(k);const d=e?daysTo(e.date):null;return `<button type="button" data-s="${k}" class="${d===null?"calm":""}" title="${esc(x.code+" "+x.name+(e?" · "+e.title:""))}" ${VIEW!=="dash"&&k===SUBJ?'aria-current="page"':""}><b>${x.code}</b><small class="${d!==null&&d<=1?"hot":""}">${d===null?`<span class="ne">pas d'éval</span><span class="nm">${esc(x.name)}</span>`:dayLabel(d)}</small></button>`}).join("");
  document.querySelectorAll("#mainnav [data-s]").forEach(b=>b.onclick=()=>{SND.tap();b.dataset.s==="dash"?showDash():setSubject(b.dataset.s)});
  nav.hidden=VIEW==="dash";
  const e=examOf(SUBJ);
  document.getElementById("subtitle").textContent=VIEW==="dash"?"IUT de Metz · Informatique · ton programme du jour":`${S.code} ${S.name}${e?" · "+e.title:""}`;
}
function showTab(k){const valid=["learn","mine",...SUBJECTS[SUBJ].tabs.map(t=>t[0])];if(!valid.includes(k))k="learn";CURTAB=k;
  document.querySelectorAll("#tabsnav button").forEach(t=>t.setAttribute("aria-selected",t.dataset.tab===k));
  document.querySelectorAll("[role=tabpanel]").forEach(p=>p.hidden=p.id!=="tab-"+k);try{localStorage.setItem("r106-tab",k)}catch(e){}}
function setSubject(k,keepTab){if(!SUBJECTS[k])return;SUBJ=k;VIEW="subj";try{localStorage.setItem("r106-subj",k);localStorage.setItem("r106-view","subj")}catch(e){}
  if(L){document.getElementById("lesson").hidden=true;document.getElementById("home").hidden=false;L=null}
  buildTabs();showTab(CURTAB==="mine"?"mine":"learn");renderHome();window.scrollTo(0,0)}
function daysTo(iso){const a=new Date(iso),b=new Date();a.setHours(0,0,0,0);b.setHours(0,0,0,0);return Math.round((a-b)/864e5)}
document.addEventListener("click",e=>{const b=e.target.closest("[data-goto]");if(!b)return;showTab(b.dataset.goto);window.scrollTo(0,0)});
document.getElementById("brandBtn").onclick=()=>{SND.tap();showDash()};
document.getElementById("soundBtn").onclick=e=>{const v=!SND.on;SND.set(v);e.currentTarget.setAttribute("aria-pressed",String(v));toast(v?"Sons activés":"Sons coupés")};
document.getElementById("soundBtn").setAttribute("aria-pressed",String(SND.on));

/* ===================== Mes fiches ===================== */
function validQuestions(arr){
  if(!Array.isArray(arr))return [];
  return arr.map((q,i)=>{
    if(!q||typeof q.q!=="string")return null;
    const base={id:"",q:esc(q.q),expl:esc(q.expl||"")};
    if(q.type==="mcq"&&Array.isArray(q.choices)&&q.choices.length>=2&&Number.isInteger(q.answer)&&q.answer>=0&&q.answer<q.choices.length)
      return Object.assign(base,{type:"mcq",choices:q.choices.map(c=>esc(c)),answer:q.answer});
    if(q.type==="input"&&Array.isArray(q.answers)&&q.answers.length)
      return Object.assign(base,{type:"input",answers:q.answers.map(String),set:!!q.set});
    return null;
  }).filter(Boolean);
}
function renderMine(){
  const l=document.getElementById("mylist");l.innerHTML="";
  if(!customDecks.length){l.innerHTML=`<div class="empty">Pas encore de fiche ajoutée. Colle-en une ci-dessus pour générer tes premières questions.</div>`;return}
  customDecks.forEach(d=>{
    const it=document.createElement("div");it.className="myitem";
    it.innerHTML=`<div><strong></strong><div class="hint"></div></div><div class="actions"><button class="btn" data-a="play">Réviser</button><button class="btn ghost" data-a="view">Voir la fiche</button><button class="btn ghost" data-a="del">Supprimer</button></div>`;
    it.querySelector("strong").textContent=d.title;it.querySelector(".hint").textContent=d.questions.length+" questions · "+mastery(d.questions)+"% maîtrisé";
    it.querySelector('[data-a="play"]').onclick=()=>{showTab("learn");startLesson({key:"c-"+d.id,title:d.title,bank:()=>d.questions,gens:[]})};
    it.querySelector('[data-a="view"]').onclick=()=>{const v=document.getElementById("ficheView");v.hidden=false;v.innerHTML=`<h2></h2><pre class="ficheraw"></pre>`;v.querySelector("h2").textContent=d.title;v.querySelector("pre").textContent=d.fiche||"(Pas de texte enregistré pour cette fiche.)";v.scrollIntoView({behavior:"smooth"})};
    const del=it.querySelector('[data-a="del"]');
    if(!String(d.id).startsWith("local")&&!CAN_SHARED)del.hidden=true;
    del.onclick=async()=>{
      if(del.dataset.confirm!=="1"){del.dataset.confirm="1";del.textContent="Confirmer la suppression";del.className="btn danger";setTimeout(()=>{if(del.isConnected){del.dataset.confirm="";del.textContent="Supprimer";del.className="btn ghost"}},4000);return}
      try{if(String(d.id).startsWith("local")){LOCAL=LOCAL.filter(x=>x.id!==d.id);saveLocalDecks();refreshDecks()}else if(db&&CAN_SHARED)await db.collection("decks").doc(d.id).delete()}catch(e){}
    };
    l.appendChild(it);
  });
}
let CAN_SHARED=false,LOCAL=[],SHARED=[];
function saveLocalDecks(){try{localStorage.setItem("r106-decks",JSON.stringify(LOCAL))}catch(e){}}
function localDecks(){try{const ld=JSON.parse(localStorage.getItem("r106-decks")||"[]");return Array.isArray(ld)?ld.filter(d=>d&&String(d.id).startsWith("local")):[]}catch(e){return []}}
function refreshDecks(){setDecks(SHARED.concat(LOCAL))}
function setDecks(list){customDecks=list.map(d=>{const qs=validQuestions(d.questions||[]);qs.forEach((q,i)=>q.id="c-"+d.id+"-"+i);return {id:d.id,title:String(d.title||"Fiche"),fiche:String(d.fiche||""),questions:qs,createdAt:d.createdAt||0}}).filter(d=>d.questions.length).sort((a,b)=>(b.createdAt||0)-(a.createdAt||0));renderHome();renderMine()}

let sample=null,ctl=null;
const genBtn=document.getElementById("genBtn"),stopBtn=document.getElementById("stopBtn"),st=document.getElementById("genStatus");
function setStatus(t,cls){st.textContent=t;st.className="status"+(cls?" "+cls:"")}
const ERR={not_granted:"Tu n'as pas autorisé Claude pour cette page. Demande plutôt à Claude dans le fil du projet d'ajouter ta fiche.",rate_limited:"Trop de demandes d'un coup. Attends un peu avant de réessayer.",cancelled:"Génération arrêtée.",invalid_json:"La réponse de Claude n'était pas lisible. Réessaie, éventuellement avec une fiche plus courte."};
genBtn.onclick=async()=>{
  const title=document.getElementById("newTitle").value.trim()||"Ma fiche";
  const text=document.getElementById("newText").value.trim();
  if(text.length<40){setStatus("Colle au moins quelques lignes de fiche ou de cours.","err");return}
  if(!sample){setStatus("La génération automatique n'est pas disponible ici. Demande à Claude dans le fil du projet d'ajouter cette fiche pour toi.","err");return}
  genBtn.disabled=true;stopBtn.hidden=false;ctl=new AbortController();
  setStatus("Claude lit ta fiche et prépare les questions…");
  const prompt=`Tu prépares un quiz de révision façon Duolingo pour un étudiant de BUT Informatique (1re année, France).
À partir UNIQUEMENT de la fiche ci-dessous, écris entre 15 et 25 questions en français qui couvrent toutes ses notions (définitions, propriétés, formules, pièges, exemples d'application calculables).
Varie les formats : environ 2/3 de QCM (4 choix plausibles, une seule bonne réponse) et 1/3 de réponses courtes (un nombre, un mot, ou un ensemble).
Chaque question a une explication courte (1 à 2 phrases) qui justifie la bonne réponse.
Utilise les symboles Unicode (¬ ∧ ∨ → ↔ ∈ ⊂ ∪ ∩ ∅ ∁ ∆ ×, exposants ²), pas de LaTeX, pas de HTML.
Réponds avec UNIQUEMENT ce JSON :
{"questions":[{"type":"mcq","q":"...","choices":["...","...","...","..."],"answer":0,"expl":"..."},{"type":"input","q":"...","answers":["réponse acceptée","autre forme acceptée"],"set":false,"expl":"..."}]}
"answer" est l'index (0 à 3) de la bonne réponse. Pour une réponse qui est un ensemble, mets "set":true et écris-le entre accolades, ex. "{a,b,c}".

FICHE « ${title} » :
${text}`;
  try{
    const out=await sample.json(prompt,{signal:ctl.signal,onText:()=>setStatus("Claude écrit les questions…")});
    const qs=validQuestions(out&&out.questions);
    if(!qs.length){setStatus("Claude n'a pas produit de questions exploitables. Réessaie avec une fiche plus détaillée.","err");return}
    const raw=(out.questions||[]).filter(q=>validQuestions([q]).length);
    const doc={title,fiche:text.slice(0,60000),questions:raw,createdAt:Date.now()};
    if(db&&CAN_SHARED){await db.collection("decks").add(doc)}else{LOCAL.unshift(Object.assign({id:"local"+Date.now()},doc));saveLocalDecks();refreshDecks()}
    setStatus(`${qs.length} questions créées pour « ${title} ». Elles sont dans S'entraîner.`,"ok");
    document.getElementById("newText").value="";document.getElementById("newTitle").value="";
  }catch(e){setStatus(ERR[e&&e.code]||"La génération a échoué. Réessaie dans un moment.","err")}
  finally{genBtn.disabled=false;stopBtn.hidden=true}
};
stopBtn.onclick=()=>ctl&&ctl.abort();

/* ===================== Modules interactifs du cours ===================== */
function modHead(title,sub){return `<div class="mod-h"><span class="mod-tag">Schéma interactif</span><strong>${title}</strong></div>${sub?`<p class="mod-sub">${sub}</p>`:""}`}
function nf(n){return Number(n).toLocaleString("fr-FR")}

/* ---------- Parseur de formules ---------- */
function parseFormula(src){
  const s=src.replace(/<->|<=>|⇔/g,"↔").replace(/->|=>|⇒/g,"→").replace(/[!~]/g,"¬").replace(/[&^]/g,"∧").replace(/\|/g,"∨").replace(/\bv\b/g,"∨");
  const toks=[];for(const ch of s){if(/\s/.test(ch))continue;if(/[pqrs]/.test(ch)||"¬∧∨→↔()".includes(ch))toks.push(ch);else throw new Error(`Caractère « ${ch} » inconnu. Utilise p, q, r, s et ¬ ∧ ∨ → ↔ ( ).`)}
  let i=0;const peek=()=>toks[i],eat=t=>{if(toks[i]!==t)throw new Error(t===")"?"Il manque une parenthèse fermante.":"Formule incomplète.");i++};
  function atom(){const t=peek();if(t===undefined)throw new Error("Formule incomplète.");
    if(t==="¬"){i++;return {op:"not",a:atom()}}
    if(t==="("){i++;const f=iff();eat(")");return f}
    if(/[pqrs]/.test(t)){i++;return {op:"var",n:t}}
    throw new Error(`« ${t} » mal placé.`)}
  function and(){let f=atom();while(peek()==="∧"){i++;f={op:"and",a:f,b:atom()}}return f}
  function or(){let f=and();while(peek()==="∨"){i++;f={op:"or",a:f,b:and()}}return f}
  function imp(){const f=or();if(peek()==="→"){i++;return {op:"imp",a:f,b:imp()}}return f}
  function iff(){let f=imp();while(peek()==="↔"){i++;f={op:"iff",a:f,b:imp()}}return f}
  if(!toks.length)throw new Error("Écris une formule.");
  const f=iff();if(i<toks.length)throw new Error(`« ${toks[i]} » en trop ou mal placé.`);return f;
}
function symbolBar(inputId){return `<div class="symbols">${["¬","∧","∨","→","↔","(",")","p","q","r"].map(s=>`<button type="button" data-ins="${s}" data-for="${inputId}">${s}</button>`).join("")}</div>`}
document.addEventListener("click",e=>{const b=e.target.closest("[data-ins]");if(!b)return;const inp=document.getElementById(b.dataset.for);const p=inp.selectionStart??inp.value.length;inp.value=inp.value.slice(0,p)+b.dataset.ins+inp.value.slice(p);inp.focus();inp.setSelectionRange(p+1,p+1);inp.dispatchEvent(new Event("input"))});

/* ---------- 1. Interrupteurs des connecteurs ---------- */
function modSwitch(el){
  let p=true,q=false;
  const conns=[["¬p",()=>!p,()=>`¬p est l'inverse de p.`],["p ∧ q",()=>p&&q,()=>`ET : V seulement si p et q sont V tous les deux.`],["p ∨ q",()=>p||q,()=>`OU : V dès qu'au moins un des deux est V.`],["p → q",()=>!p||q,()=>p&&!q?`Le seul cas faux : p est V et q est F.`:!p?`p est F, donc l'implication est V quoi que vaille q.`:`p et q sont V : promesse tenue.`],["p ↔ q",()=>p===q,()=>p===q?`p et q ont la même valeur.`:`p et q ont des valeurs différentes.`]];
  function draw(){
    el.innerHTML=modHead("Joue avec p et q","Clique sur p ou q pour changer leur valeur : chaque connecteur se recalcule.")+
    `<div class="sw-row"><button class="sw ${p?"on":"off"}" data-v="p"><span>p</span><b>${vf(p)}</b></button><button class="sw ${q?"on":"off"}" data-v="q"><span>q</span><b>${vf(q)}</b></button></div>
    <div class="lamps">${conns.map(([n,f,why])=>{const v=f();return `<div class="lamp ${v?"on":"off"}"><span class="f">${n}</span><b>${vf(v)}</b><small>${why()}</small></div>`}).join("")}</div>`;
    el.querySelectorAll(".sw").forEach(b=>b.onclick=()=>{if(b.dataset.v==="p")p=!p;else q=!q;draw()});
  }
  draw();
}

/* ---------- 2. Explorateur : arbre + table ---------- */
const CW=7.6;
function treeSVG(f,interp){
  const GAP=14,V=64;
  (function measure(n){n.w=Math.max(34,show(n).length*CW+18);if(n.op==="var")n.sw=n.w;else if(n.op==="not"){measure(n.a);n.sw=Math.max(n.w,n.a.sw)}else{measure(n.a);measure(n.b);n.sw=Math.max(n.w,n.a.sw+GAP+n.b.sw)}})(f);
  let maxD=0;
  (function place(n,x0,d){n.y=d*V+24;maxD=Math.max(maxD,d);n.x=x0+n.sw/2;
    if(n.op==="not")place(n.a,x0+(n.sw-n.a.sw)/2,d+1);
    else if(n.op!=="var"){const tot=n.a.sw+GAP+n.b.sw,st=x0+(n.sw-tot)/2;place(n.a,st,d+1);place(n.b,st+n.a.sw+GAP,d+1)}})(f,8,0);
  const W=f.sw+16+(interp?20:0),H=maxD*V+50;let edges="",nodes="";
  (function draw(n){const kids=n.op==="var"?[]:n.op==="not"?[n.a]:[n.a,n.b];
    kids.forEach(k=>{edges+=`<line x1="${n.x}" y1="${n.y+13}" x2="${k.x}" y2="${k.y-13}" class="t-edge"/>`;draw(k)});
    const v=interp?evalF(n,interp):null;const cls=v===null?"t-node":v?"t-node t-v":"t-node t-f";
    nodes+=`<g><rect x="${n.x-n.w/2}" y="${n.y-13}" width="${n.w}" height="26" rx="7" class="${cls}"/><text x="${n.x}" y="${n.y+4.5}" text-anchor="middle" class="t-txt">${esc(show(n))}</text>${v===null?"":`<text x="${n.x+n.w/2+4}" y="${n.y+4.5}" class="t-val ${v?"tv":"tf"}">${vf(v)}</text>`}</g>`})(f);
  return `<div class="tscroll"><svg viewBox="0 0 ${W} ${H}" width="${W}" height="${H}" role="img" aria-label="Arbre de décomposition">${edges}${nodes}</svg></div>`;
}
function natureText(f,vs){
  const rows=interps(vs);const m=[],c=[];rows.forEach((i,k)=>(evalF(f,i)?m:c).push("i"+(k+1)));
  let t=`<b>M(φ) = {${m.join(", ")}}</b>. `;
  if(!c.length)t+=`Aucun contre-exemple : φ est une <b>tautologie</b>.`;
  else if(!m.length)t+=`Aucun modèle : φ est une <b>contradiction</b>.`;
  else t+=`${c[0]} est un contre-exemple, donc φ n'est pas une tautologie. ${m[0]} est un modèle, donc φ n'est pas une contradiction. φ est <b>contingente</b>.`;
  return t;
}
function modExplorer(el){
  const id="exp"+rnd(1e6);let f=null,vs=[],sel=0;
  const presets=["q ∧ (r → ¬p)","¬q → (r ∧ p)","(¬p ∨ r) → (q ∧ r)","(p ∨ q) → p","p ∨ ¬p","p ∧ ¬p"];
  el.innerHTML=modHead("Décompose et calcule une formule","Tape une formule (ou choisis un exemple du cours). Clique sur une ligne de la table : l'arbre se colorie avec les valeurs de cette interprétation.")+
  `<div class="presets">${presets.map(p=>`<button type="button" class="pill" data-p="${p}">${p}</button>`).join("")}</div>
  <input class="answer-input" id="${id}" value="${presets[0]}" spellcheck="false" autocomplete="off" aria-label="Formule">${symbolBar(id)}
  <div class="mod-err" role="status"></div><div class="mod-out"></div>`;
  const inp=el.querySelector("#"+id),out=el.querySelector(".mod-out"),err=el.querySelector(".mod-err");
  function render(){
    if(!f){out.innerHTML="";return}
    const rows=interps(vs),ns=nodes(f),i=rows[sel];
    out.innerHTML=`<div class="mod-step"><b>1. L'arbre</b> : on enlève à chaque étage le connecteur le plus externe. Valeurs pour <b>i${sel+1}</b> (${vs.map(v=>v+" = "+vf(i[v])).join(", ")}).</div>${treeSVG(f,i)}
    <div class="mod-step"><b>2. La table</b> : une colonne par sous-formule, de la plus petite à φ (colonne noire).</div>
    <div class="tscroll"><table class="tt clickable"><tr><th></th>${vs.map(v=>`<th>${v}</th>`).join("")}${ns.map((n,k)=>`<th class="${k===ns.length-1?"last":""}">${esc(show(n))}</th>`).join("")}</tr>
    ${rows.map((r,k)=>`<tr data-r="${k}" class="${k===sel?"sel":""}" tabindex="0"><td>i${k+1}</td>${vs.map(v=>`<td>${vf(r[v])}</td>`).join("")}${ns.map(n=>{const x=evalF(n,r);return `<td class="${x?"v":"x"}">${vf(x)}</td>`}).join("")}</tr>`).join("")}</table></div>
    <div class="mod-step"><b>3. Conclusion</b> : ${natureText(f,vs)}</div>`;
    out.querySelectorAll("tr[data-r]").forEach(tr=>{tr.onclick=()=>{sel=+tr.dataset.r;render()};tr.onkeydown=e=>{if(e.key==="Enter"){sel=+tr.dataset.r;render()}}});
  }
  function update(){try{f=parseFormula(inp.value);vs=varsOf(f);if(vs.length>4)throw new Error("4 lettres au maximum (16 lignes).");sel=Math.min(sel,(1<<vs.length)-1);err.textContent=""}catch(e){f=null;err.textContent=e.message}render()}
  inp.addEventListener("input",update);
  el.querySelectorAll("[data-p]").forEach(b=>b.onclick=()=>{inp.value=b.dataset.p;sel=0;update()});
  update();
}

/* ---------- 3. Comparateur d'équivalence ---------- */
function modCompare(el){
  const ia="ca"+rnd(1e6),ib="cb"+rnd(1e6);
  const presets=[["Contraposée","p → q","¬q → ¬p"],["Réciproque","p → q","q → p"],["Morgan (ET)","¬(p ∧ q)","¬p ∨ ¬q"],["Morgan (OU)","¬(p ∨ q)","¬p ∧ ¬q"],["Faux Morgan","¬(p ∧ q)","¬p ∧ ¬q"],["→ en ∨","p → q","¬p ∨ q"],["↔ en →","p ↔ q","(p → q) ∧ (q → p)"],["Négation de →","¬(p → q)","p ∧ ¬q"]];
  el.innerHTML=modHead("Ces deux formules sont-elles équivalentes ?","Deux formules sont équivalentes si elles ont exactement la même colonne finale (les mêmes modèles). Essaie les exemples.")+
  `<div class="presets">${presets.map((p,k)=>`<button type="button" class="pill" data-k="${k}">${p[0]}</button>`).join("")}</div>
  <div class="cmp-in"><div><label class="lbl" for="${ia}">Formule A</label><input class="answer-input" id="${ia}" value="p → q" spellcheck="false" autocomplete="off">${symbolBar(ia)}</div>
  <div><label class="lbl" for="${ib}">Formule B</label><input class="answer-input" id="${ib}" value="¬q → ¬p" spellcheck="false" autocomplete="off">${symbolBar(ib)}</div></div>
  <div class="mod-out"></div>`;
  const A=el.querySelector("#"+ia),B=el.querySelector("#"+ib),out=el.querySelector(".mod-out");
  function render(){
    let fa,fb;try{fa=parseFormula(A.value);fb=parseFormula(B.value)}catch(e){out.innerHTML=`<div class="mod-err">${esc(e.message)}</div>`;return}
    const vs=[...new Set(varsOf(fa).concat(varsOf(fb)))].sort();const rows=interps(vs);
    const diff=rows.map((r,k)=>evalF(fa,r)!==evalF(fb,r)?k:-1).filter(k=>k>=0);
    out.innerHTML=`<div class="tscroll"><table class="tt"><tr><th></th>${vs.map(v=>`<th>${v}</th>`).join("")}<th class="last">A : ${esc(show(fa))}</th><th class="last">B : ${esc(show(fb))}</th></tr>
    ${rows.map((r,k)=>{const a=evalF(fa,r),b=evalF(fb,r);return `<tr class="${a!==b?"diff":""}"><td>i${k+1}</td>${vs.map(v=>`<td>${vf(r[v])}</td>`).join("")}<td class="${a?"v":"x"}">${vf(a)}</td><td class="${b?"v":"x"}">${vf(b)}</td></tr>`}).join("")}</table></div>
    <div class="verdict ${diff.length?"ko":"ok"}">${diff.length?`<b>Pas équivalentes.</b> À la ligne i${diff[0]+1}, A vaut ${vf(evalF(fa,rows[diff[0]]))} mais B vaut ${vf(evalF(fb,rows[diff[0]]))} (ligne surlignée).`:`<b>Équivalentes</b> : les deux colonnes sont identiques, donc A éq B.`}</div>`;
  }
  A.addEventListener("input",render);B.addEventListener("input",render);
  el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{const p=presets[+b.dataset.k];A.value=p[1];B.value=p[2];render()});
  render();
}

/* ---------- 4. Venn des opérations ---------- */
const VENN_PTS={b:[88,92],g:[92,150],a:[180,88],d:[180,120],f:[180,152],c:[268,92],e:[270,150],h:[330,36],i:[30,212]};
function regionOf(x){const inA="abdfg".includes(x),inB="acdef".includes(x);return inA&&inB?"AB":inA?"A":inB?"B":"O"}
function vennSVG(uid,on,labels){
  const r=(k)=>on.includes(k)?"vr on":"vr";
  return `<svg viewBox="0 0 360 240" width="360" height="240" class="venn" role="img" aria-label="Diagramme de Venn">
  <defs><clipPath id="cA${uid}"><circle cx="135" cy="120" r="82"/></clipPath>
  <mask id="mNotB${uid}"><rect width="360" height="240" fill="white"/><circle cx="225" cy="120" r="82" fill="black"/></mask>
  <mask id="mNotA${uid}"><rect width="360" height="240" fill="white"/><circle cx="135" cy="120" r="82" fill="black"/></mask>
  <mask id="mOut${uid}"><rect width="360" height="240" fill="white"/><circle cx="135" cy="120" r="82" fill="black"/><circle cx="225" cy="120" r="82" fill="black"/></mask></defs>
  <rect x="6" y="6" width="348" height="228" rx="10" class="${r("O")}" data-reg="O" mask="url(#mOut${uid})"/>
  <circle cx="135" cy="120" r="82" class="${r("A")}" data-reg="A" mask="url(#mNotB${uid})"/>
  <circle cx="225" cy="120" r="82" class="${r("B")}" data-reg="B" mask="url(#mNotA${uid})"/>
  <circle cx="225" cy="120" r="82" class="${r("AB")}" data-reg="AB" clip-path="url(#cA${uid})"/>
  <rect x="6" y="6" width="348" height="228" rx="10" class="v-line"/><circle cx="135" cy="120" r="82" class="v-line"/><circle cx="225" cy="120" r="82" class="v-line"/>
  <text x="18" y="28" class="v-lab">E</text><text x="70" y="52" class="v-lab">A</text><text x="282" y="52" class="v-lab">B</text>
  ${labels}</svg>`;
}
function modVenn(el){
  const uid=rnd(1e6);
  const ops=[["A ∪ B",["A","AB","B"],"x ∈ A <b>ou</b> x ∈ B"],["A ∩ B",["AB"],"x ∈ A <b>et</b> x ∈ B"],["A − B",["A"],"x ∈ A et x ∉ B"],["B − A",["B"],"x ∈ B et x ∉ A"],["A ∆ B",["A","B"],"dans A ou dans B, <b>mais pas les deux</b> : (A − B) ∪ (B − A)"],["∁E(A)",["B","O"],"x ∈ E et x ∉ A"],["∁E(A ∪ B)",["O"],"ni dans A ni dans B. Morgan : = Ā ∩ B̄"],["∁E(A ∩ B)",["A","B","O"],"pas dans les deux à la fois. Morgan : = Ā ∪ B̄"]];
  let cur=0;
  function draw(){
    const [name,on,def]=ops[cur];
    const labels=Object.entries(VENN_PTS).map(([x,[px,py]])=>`<text x="${px}" y="${py}" text-anchor="middle" class="v-el ${on.includes(regionOf(x))?"in":""}">${x}</text>`).join("");
    const res=Object.keys(VENN_PTS).sort().filter(x=>on.includes(regionOf(x)));
    el.innerHTML=modHead("Les opérations sur un diagramme de Venn","E = {a, …, i}, A = {a, b, d, f, g}, B = {a, c, d, e, f}. Choisis une opération : la zone concernée se colorie.")+
    `<div class="presets">${ops.map((o,k)=>`<button type="button" class="pill ${k===cur?"active":""}" data-o="${k}">${o[0]}</button>`).join("")}</div>
    <div class="venn-wrap"><div class="tscroll">${vennSVG(uid,on,labels)}</div>
    <div class="venn-info"><div class="f big">${name}</div><p>${def}</p><p>${name} = <span class="f">{${res.join(", ")}}</span></p><p class="hint">Card = ${res.length}</p></div></div>`;
    el.querySelectorAll("[data-o]").forEach(b=>b.onclick=()=>{cur=+b.dataset.o;draw()});
  }
  draw();
}

/* ---------- 5. Venn des cardinaux ---------- */
function modCard(el){
  const uid=rnd(1e6);
  const presets=[["Classe (TD2)",25,18,10,7,"sport","musique"],["Employés (DM1)",100,52,70,40,"femmes","formation"],["Casino (exos corrigés)",1500,1182,310,190,"loterie","casino"]];
  let st={E:25,A:18,B:10,AB:7};
  el.innerHTML=modHead("Résoudre un problème « enquête » avec un Venn","Rentre l'effectif total et les trois nombres de l'énoncé : le schéma remplit chaque zone et donne toutes les réponses classiques.")+
  `<div class="presets">${presets.map((p,k)=>`<button type="button" class="pill" data-k="${k}">${p[0]}</button>`).join("")}</div>
  <div class="card-in">${[["E","Card E (total)"],["A","Card A"],["B","Card B"],["AB","Card(A ∩ B)"]].map(([k,l])=>`<label><span>${l}</span><input type="number" min="0" class="txt" data-c="${k}" value="${st[k]}"></label>`).join("")}</div><div class="mod-out"></div>`;
  const out=el.querySelector(".mod-out");
  function render(){
    const {E,A,B,AB}=st;const oA=A-AB,oB=B-AB,U=A+B-AB,O=E-U;
    if([E,A,B,AB].some(x=>!(x>=0))||oA<0||oB<0||O<0){out.innerHTML=`<div class="mod-err">Nombres incohérents : il faut Card(A ∩ B) ≤ Card A et Card B, et Card(A ∪ B) ≤ Card E.</div>`;return}
    const labels=`<text x="88" y="126" text-anchor="middle" class="v-num">${nf(oA)}</text><text x="180" y="126" text-anchor="middle" class="v-num">${nf(AB)}</text><text x="272" y="126" text-anchor="middle" class="v-num">${nf(oB)}</text><text x="40" y="216" text-anchor="middle" class="v-num">${nf(O)}</text>`;
    out.innerHTML=`<div class="venn-wrap"><div class="tscroll">${vennSVG(uid,[],labels)}</div><div class="venn-info">
    <p><b>Au centre</b> : Card(A ∩ B) = ${nf(AB)}</p>
    <p><b>A seulement</b> : Card(A − B) = ${nf(A)} − ${nf(AB)} = <b>${nf(oA)}</b></p>
    <p><b>B seulement</b> : Card(B − A) = ${nf(B)} − ${nf(AB)} = <b>${nf(oB)}</b></p></div></div>
    <div class="tscroll"><table class="tt" style="font-family:var(--f-body)"><tr><th>Question</th><th>Ensemble</th><th>Calcul</th></tr>
    <tr><td style="text-align:left">l'un <b>ou</b> l'autre</td><td class="f">A ∪ B</td><td class="f">${nf(A)} + ${nf(B)} − ${nf(AB)} = ${nf(U)}</td></tr>
    <tr><td style="text-align:left"><b>ni</b> l'un <b>ni</b> l'autre</td><td class="f">Ā ∩ B̄ = ∁(A ∪ B)</td><td class="f">${nf(E)} − ${nf(U)} = ${nf(O)}</td></tr>
    <tr><td style="text-align:left">A <b>mais pas</b> B</td><td class="f">A − B</td><td class="f">${nf(A)} − ${nf(AB)} = ${nf(oA)}</td></tr>
    <tr><td style="text-align:left"><b>un seul</b> des deux</td><td class="f">A ∆ B</td><td class="f">${nf(A)} + ${nf(B)} − 2 × ${nf(AB)} = ${nf(oA+oB)}</td></tr>
    <tr><td style="text-align:left"><b>pas</b> A</td><td class="f">Ā</td><td class="f">${nf(E)} − ${nf(A)} = ${nf(E-A)}</td></tr></table></div>
    <p class="hint">Vérification : ${nf(oA)} + ${nf(AB)} + ${nf(oB)} + ${nf(O)} = ${nf(E)}, tout le monde est compté une seule fois.</p>`;
  }
  el.querySelectorAll("[data-c]").forEach(i=>i.oninput=()=>{st[i.dataset.c]=parseInt(i.value,10);render()});
  el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{const p=presets[+b.dataset.k];st={E:p[1],A:p[2],B:p[3],AB:p[4]};el.querySelectorAll("[data-c]").forEach(i=>i.value=st[i.dataset.c]);render()});
  render();
}

/* ---------- 6. Arbre des parties ---------- */
function modParts(el){
  const id="pt"+rnd(1e6);
  el.innerHTML=modHead("L'arbre des parties","Pour chaque élément on décide : on le prend (oui) ou pas (non). Chaque chemin donne une partie. Change les éléments (2 à 4).")+
  `<input class="answer-input" id="${id}" value="a, b, c" spellcheck="false" autocomplete="off" aria-label="Éléments"><div class="mod-out"></div>`;
  const inp=el.querySelector("#"+id),out=el.querySelector(".mod-out");
  function render(){
    const els=[...new Set(inp.value.split(/[,;\s]+/).map(x=>x.trim()).filter(Boolean))].slice(0,4);
    if(els.length<1){out.innerHTML=`<div class="mod-err">Écris au moins un élément.</div>`;return}
    const n=els.length,L=1<<n,LW=Math.max(70,(n*3+2)*CW+18),W=L*LW+20,LV=58,H=n*LV+80;let g="";
    (function rec(d,x0,x1,pick,px,py){
      const x=(x0+x1)/2,y=d*LV+30;
      if(px!=null)g+=`<line x1="${px}" y1="${py}" x2="${x}" y2="${y-8}" class="t-edge"/>`;
      if(d===n){const s=pick.length?"{"+pick.join(", ")+"}":"∅";g+=`<rect x="${x-LW/2+4}" y="${y-10}" width="${LW-8}" height="26" rx="7" class="t-node t-v"/><text x="${x}" y="${y+7}" text-anchor="middle" class="t-txt">${esc(s)}</text>`;return}
      g+=`<circle cx="${x}" cy="${y}" r="5" class="t-dot"/>`;if(d<n)g+=`<text x="${x+10}" y="${y+4}" class="t-q">${esc(els[d])} ?</text>`;
      const m=(x0+x1)/2;
      g+=`<text x="${(x+(x0+m)/2)/2-14}" y="${y+LV/2+2}" class="t-yes">oui</text><text x="${(x+(m+x1)/2)/2+4}" y="${y+LV/2+2}" class="t-no">non</text>`;
      rec(d+1,x0,m,pick.concat(els[d]),x,y+5);rec(d+1,m,x1,pick,x,y+5);
    })(0,10,W-10,[],null,null);
    out.innerHTML=`<div class="tscroll"><svg viewBox="0 0 ${W} ${H}" width="${W}" height="${H}" role="img" aria-label="Arbre des parties">${g}</svg></div>
    <p>E = {${els.join(", ")}} a ${n} élément${n>1?"s":""}, donc <b>Card(P(E)) = 2<sup>${n}</sup> = ${L}</b> parties (les ${L} feuilles).</p>`;
  }
  inp.addEventListener("input",render);render();
}

/* ---------- 7. Produit cartésien ---------- */
function modCart(el){
  const ia="xa"+rnd(1e6),ib="xb"+rnd(1e6);
  el.innerHTML=modHead("Construire A × B","Chaque case du tableau est un couple (a, b) : a vient de la ligne (A), b de la colonne (B).")+
  `<div class="cmp-in"><div><label class="lbl" for="${ia}">A</label><input class="answer-input" id="${ia}" value="a, b, c"></div><div><label class="lbl" for="${ib}">B</label><input class="answer-input" id="${ib}" value="1, 2"></div></div><div class="mod-out"></div>`;
  const A=el.querySelector("#"+ia),B=el.querySelector("#"+ib),out=el.querySelector(".mod-out");
  const list=s=>[...new Set(s.split(/[,;\s]+/).map(x=>x.trim()).filter(Boolean))].slice(0,8);
  function render(){const a=list(A.value),b=list(B.value);
    if(!a.length||!b.length){out.innerHTML=`<div class="mod-err">Écris au moins un élément dans A et dans B.</div>`;return}
    out.innerHTML=`<div class="tscroll"><table class="tt"><tr><th>A \\ B</th>${b.map(x=>`<th>${esc(x)}</th>`).join("")}</tr>${a.map(x=>`<tr><th>${esc(x)}</th>${b.map(y=>`<td>(${esc(x)}, ${esc(y)})</td>`).join("")}</tr>`).join("")}</table></div>
    <p><b>Card(A × B) = Card A × Card B = ${a.length} × ${b.length} = ${a.length*b.length}</b>. Attention, (${esc(a[0])}, ${esc(b[0])}) ≠ (${esc(b[0])}, ${esc(a[0])}) : dans un couple l'ordre compte, donc A × B ≠ B × A.</p>`}
  A.addEventListener("input",render);B.addEventListener("input",render);render();
}

/* ---------- 8. Cases de dénombrement ---------- */
function modCount(el){
  const presets=[["Cadenas 3 chiffres",10,3,"rep"],["4 chiffres distincts",10,4,"arr"],["3 jetons parmi 8",8,3,"comb"],["Équipe de 11 parmi 21",21,11,"comb"],["3 dés",6,3,"rep"]];
  let st={n:10,p:3,m:"rep"};
  const modes={rep:["Ordre compte, répétitions permises","p-uplet : code, mot de passe, dés"],arr:["Ordre compte, sans répétition","arrangement : éléments tous distincts"],comb:["Ordre ne compte pas, sans répétition","combinaison : partie, groupe, tirage simultané"]};
  el.innerHTML=modHead("Le schéma des cases","Choisis la situation : chaque case montre combien de choix il reste, et on multiplie.")+
  `<div class="presets">${presets.map((p,k)=>`<button type="button" class="pill" data-k="${k}">${p[0]}</button>`).join("")}</div>
  <div class="card-in"><label><span>n (choix possibles)</span><input type="number" min="1" max="30" class="txt" data-c="n" value="10"></label><label><span>p (nombre de cases)</span><input type="number" min="1" max="12" class="txt" data-c="p" value="3"></label></div>
  <div class="modes">${Object.entries(modes).map(([k,[t,s]])=>`<button type="button" class="mode" data-m="${k}"><b>${t}</b><small>${s}</small></button>`).join("")}</div><div class="mod-out"></div>`;
  const out=el.querySelector(".mod-out");
  function fact(k){let r=1;for(let i=2;i<=k;i++)r*=i;return r}
  function render(){
    el.querySelectorAll("[data-m]").forEach(b=>b.classList.toggle("active",b.dataset.m===st.m));
    const {n,p,m}=st;if(!(n>=1&&p>=1&&p<=12&&n<=30)){out.innerHTML=`<div class="mod-err">Choisis n entre 1 et 30 et p entre 1 et 12.</div>`;return}
    if(m!=="rep"&&p>n){out.innerHTML=`<div class="mod-err">Sans répétition, il faut p ≤ n.</div>`;return}
    const ch=Array.from({length:p},(_,k)=>m==="rep"?n:n-k);const prod=ch.reduce((a,b)=>a*b,1);
    let res=prod,txt;
    if(m==="rep")txt=`${ch.join(" × ")} = ${n}<sup>${p}</sup> = <b>${nf(prod)}</b>`;
    else if(m==="arr")txt=`${ch.join(" × ")} = n!/(n−p)! = <b>${nf(prod)}</b>`;
    else{res=Math.round(prod/fact(p));txt=`On compte d'abord comme si l'ordre comptait : ${ch.join(" × ")} = ${nf(prod)}. Mais chaque groupe a été compté ${p}! = ${nf(fact(p))} fois (toutes ses façons de l'ordonner), donc C(${n}, ${p}) = ${nf(prod)} ÷ ${nf(fact(p))} = <b>${nf(res)}</b>`}
    out.innerHTML=`<div class="boxes">${ch.map((c,k)=>`<div class="cbox"><span>C${k+1}</span><b>${c}</b></div>${k<ch.length-1?'<span class="times">×</span>':""}`).join("")}</div><p>${txt}</p>
    ${m==="arr"?`<p class="hint">Après chaque case, un choix de moins puisqu'on ne peut pas réutiliser un élément.</p>`:m==="rep"?`<p class="hint">Chaque case a les mêmes ${n} choix, puisqu'on peut répéter.</p>`:""}`;
  }
  el.querySelectorAll("[data-c]").forEach(i=>i.oninput=()=>{st[i.dataset.c]=parseInt(i.value,10);render()});
  el.querySelectorAll("[data-m]").forEach(b=>b.onclick=()=>{st.m=b.dataset.m;render()});
  el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{const p=presets[+b.dataset.k];st={n:p[1],p:p[2],m:p[3]};el.querySelector('[data-c="n"]').value=st.n;el.querySelector('[data-c="p"]').value=st.p;render()});
  render();
}

const MODS={switch:modSwitch,explorer:modExplorer,compare:modCompare,venn:modVenn,card:modCard,parts:modParts,cart:modCart,count:modCount};
/* ---------- Modules des autres matières ---------- */
function mcdSVG(E1,E2,verb,c1,c2,prop,id1,id2){
  return `<svg viewBox="0 0 520 120" width="520" height="120" style="width:100%;max-width:520px;height:auto" class="mcd" role="img" aria-label="MCD"><rect x="10" y="30" width="130" height="60" rx="6" class="m-ent"/><text x="75" y="55" text-anchor="middle" class="m-t b">${E1}</text><line x1="10" y1="64" x2="140" y2="64" class="m-l"/><text x="75" y="82" text-anchor="middle" class="m-s ${id1?"id":""}">${id1||"identifiant…"}</text>
  <ellipse cx="260" cy="60" rx="70" ry="${prop?34:26}" class="m-as"/><text x="260" y="${prop?55:65}" text-anchor="middle" class="m-t b">${verb}</text>${prop?`<text x="260" y="75" text-anchor="middle" class="m-s">${prop}</text>`:""}
  <rect x="380" y="30" width="130" height="60" rx="6" class="m-ent"/><text x="445" y="55" text-anchor="middle" class="m-t b">${E2}</text><line x1="380" y1="64" x2="510" y2="64" class="m-l"/><text x="445" y="82" text-anchor="middle" class="m-s ${id2?"id":""}">${id2||"identifiant…"}</text>
  <line x1="140" y1="60" x2="190" y2="60" class="m-l"/><line x1="330" y1="60" x2="380" y2="60" class="m-l"/><text x="165" y="50" text-anchor="middle" class="m-c">${c1}</text><text x="355" y="50" text-anchor="middle" class="m-c">${c2}</text></svg>`;
}
function mldOf(E1,E2,verb,id1,id2,c1,c2,prop){
  const m1=c1.split(",")[1],m2=c2.split(",")[1];
  if(prop||(m1==="n"&&m2==="n"))return {type:"n:n",rule:"Règle 3 : association n:n (ou porteuse) → nouvelle table, clé primaire = les deux clés étrangères.",tables:[`${E1} (<u>${id1}</u>, …)`,`${E2} (<u>${id2}</u>, …)`,`${verb.toUpperCase()} (<u>#${id1}, #${id2}</u>${prop?", "+prop:""})`]};
  if(m1==="1"&&m2==="1"){if(c1==="0,1"&&c2==="0,1")return {type:"1:1",rule:"1:1 avec (0,1) des deux côtés : table d'association pour éviter une clé étrangère nulle.",tables:[`${E1} (<u>${id1}</u>, …)`,`${E2} (<u>${id2}</u>, …)`,`${verb.toUpperCase()} (<u>#${id1}, #${id2}</u>)`]};
    const side=c2==="1,1"?2:1;return {type:"1:1",rule:`1:1 : la table côté (1,1) reçoit la clé étrangère.`,tables:side===2?[`${E1} (<u>${id1}</u>, …)`,`${E2} (<u>${id2}</u>, …, #${id1})`]:[`${E1} (<u>${id1}</u>, …, #${id2})`,`${E2} (<u>${id2}</u>, …)`]}}
  if(m2==="1")return {type:"1:n",rule:`Règle 2 : 1:n → ${E2} (maximum 1) reçoit #${id1}.`,tables:[`${E1} (<u>${id1}</u>, …)`,`${E2} (<u>${id2}</u>, …, #${id1})`]};
  return {type:"1:n",rule:`Règle 2 : 1:n → ${E1} (maximum 1) reçoit #${id2}.`,tables:[`${E1} (<u>${id1}</u>, …, #${id2})`,`${E2} (<u>${id2}</u>, …)`]};
}
function modMcdCard(el){
  const ex=[["CLIENT","COMMANDE","Passer","Un client passe une ou plusieurs commandes.","Une commande est passée par un et un seul client.","1,n","1,1"],["SCIENTIFIQUE","ARTICLE","Écrire","Un scientifique écrit un ou plusieurs articles.","Un article est écrit par un ou plusieurs scientifiques.","1,n","1,n"],["MARIN","VOILIER","Piloter","Un marin pilote un et un seul voilier.","Un voilier est piloté par un et un seul marin.","1,1","1,1"],["APPARTEMENT","PARKING","Disposer","Un appartement dispose de zéro ou une place.","Une place appartient à un et un seul appartement.","0,1","1,1"],["EMPLOYE","COMMANDE","Traiter","Un employé traite une ou plusieurs commandes.","Une commande est traitée par un et un seul employé.","1,n","1,1"]];
  let k=0;
  function draw(){const [E1,E2,v,s1,s2,c1,c2]=ex[k];const t=(c1.endsWith("n")&&c2.endsWith("n"))?"n:n":(c1.endsWith("1")&&c2.endsWith("1"))?"1:1":"1:n";
    el.innerHTML=modHead("Des phrases aux cardinalités","Choisis un exemple : chaque phrase donne la cardinalité écrite à côté de l'entité dont elle parle.")+
    `<div class="presets">${ex.map((e,i)=>`<button type="button" class="pill ${i===k?"active":""}" data-k="${i}">${e[0]} / ${e[1]}</button>`).join("")}</div>
    <div class="tscroll">${mcdSVG(E1,E2,v,c1,c2)}</div>
    <p>« ${s1} » → à côté de <b>${E1}</b> : <b>${c1}</b><br>« ${s2} » → à côté de <b>${E2}</b> : <b>${c2}</b><br>Maximums ${c1.split(",")[1]} et ${c2.split(",")[1]} → association <b>${t}</b>.</p>`;
    el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{k=+b.dataset.k;draw()})}
  draw();
}
function modMld(el){
  let st={c1:"1,n",c2:"1,1",prop:false};const C=["0,1","1,1","0,n","1,n"];
  function draw(){const prop=st.prop?"Qté":"";const r=mldOf("COMMANDE","PRODUIT","Contenir","IDCommande","IDProduit",st.c1,st.c2,prop);
    el.innerHTML=modHead("Convertisseur MCD → MLD","Change les cardinalités (et la propriété portée) : le schéma relationnel se met à jour avec la règle appliquée.")+
    `<div class="card-in"><label><span>côté COMMANDE</span><select class="txt" data-c="c1">${C.map(c=>`<option ${c===st.c1?"selected":""}>${c}</option>`).join("")}</select></label>
    <label><span>côté PRODUIT</span><select class="txt" data-c="c2">${C.map(c=>`<option ${c===st.c2?"selected":""}>${c}</option>`).join("")}</select></label>
    <label><span>propriété portée</span><select class="txt" data-c="prop"><option value="">aucune</option><option value="1" ${st.prop?"selected":""}>Qté</option></select></label></div>
    <div class="tscroll">${mcdSVG("COMMANDE","PRODUIT","Contenir",st.c1,st.c2,prop)}</div>
    <div class="verdict ok"><b>Type ${r.type}.</b> ${r.rule}</div><div class="box def">${r.tables.join("<br>")}</div>`;
    el.querySelectorAll("[data-c]").forEach(s=>s.onchange=()=>{if(s.dataset.c==="prop")st.prop=!!s.value;else st[s.dataset.c]=s.value;draw()})}
  draw();
}
function modMatProd(el){
  let A=[[2,-1,3],[0,4,1]],B=[[1,2],[-2,0],[3,1]],hi=[0,0];
  function draw(){const C=mul(A,B);const [i,j]=hi;
    const cell=(m,r,c,on)=>`<td class="${on?"hl":""}">${sg(m[r][c])}</td>`;
    el.innerHTML=modHead("Voir le calcul d'un produit","Clique sur une case du résultat : la ligne de A et la colonne de B utilisées s'allument, avec le calcul.")+
    `<div class="mp"><div><div class="hint">A (2, 3)</div><span class="mx"><table>${A.map((r,ri2)=>`<tr>${r.map((_,c)=>cell(A,ri2,c,ri2===i)).join("")}</tr>`).join("")}</table></span></div><span class="times">×</span>
    <div><div class="hint">B (3, 2)</div><span class="mx"><table>${B.map((r,ri2)=>`<tr>${r.map((_,c)=>cell(B,ri2,c,c===j)).join("")}</tr>`).join("")}</table></span></div><span class="times">=</span>
    <div><div class="hint">A × B (2, 2)</div><span class="mx"><table>${C.map((r,ri2)=>`<tr>${r.map((x,c)=>`<td class="pick ${ri2===i&&c===j?"hl":""}" data-i="${ri2}" data-j="${c}" tabindex="0">${sg(x)}</td>`).join("")}</tr>`).join("")}</table></span></div></div>
    <p class="f" style="white-space:normal">c<sub>${i+1}${j+1}</sub> = ${A[i].map((x,k)=>`${sg(x)}×${sg(B[k][j])}`).join(" + ")} = <b>${sg(C[i][j])}</b></p>
    <div class="actions" style="justify-content:flex-start"><button type="button" class="pill" data-new>Nouvel exemple</button></div>`;
    el.querySelectorAll("td.pick").forEach(td=>{const f=()=>{hi=[+td.dataset.i,+td.dataset.j];draw()};td.onclick=f;td.onkeydown=e=>{if(e.key==="Enter")f()}});
    el.querySelector("[data-new]").onclick=()=>{A=mat(2,3,-3,4);B=mat(3,2,-3,4);hi=[0,0];draw()}}
  draw();
}
function fr(n,d=1){if(d<0){n=-n;d=-d}const g=(a,b)=>b?g(b,a%b):Math.abs(a);const k=g(n,d)||1;return {n:n/k,d:d/k}}
function fstr(f){return f.d===1?sg(f.n):`${sg(f.n)}/${f.d}`}
function modPivot(el){
  const presets=[["Cours 1.8","1 2 -1 1\n2 3 1 2\n1 4 -6 2"],["Cours 1.9 (4 inconnues)","1 -3 4 -2 5\n1 -1 9 -1 7\n1 -2 7 -2 9"],["Incompatible (3.2)","1 2 -3 -1\n3 -1 2 7\n8 2 -2 9"],["Exercice 3","2 1 1 3\n1 -1 3 8\n1 2 -1 -3"]];
  const id="pv"+rnd(1e6);
  el.innerHTML=modHead("Échelonner pas à pas","Écris la matrice augmentée (A | B) : une ligne par équation, les nombres séparés par des espaces, le second membre en dernier. Le module affiche chaque opération comme sur ta copie.")+
  `<div class="presets">${presets.map((p,k)=>`<button type="button" class="pill" data-k="${k}">${p[0]}</button>`).join("")}</div>
  <textarea class="txt" id="${id}" rows="4" style="min-height:0;font-family:var(--f-mono)">${presets[0][1]}</textarea><div class="mod-out"></div>`;
  const ta=el.querySelector("#"+id),out=el.querySelector(".mod-out");const V=["x","y","z","w","t","u"];
  function eqs(Mx){return `<div class="sys">${Mx.map((r,i)=>{const p=r.length-1;let s=[];r.slice(0,p).forEach((c,k)=>{if(c.n!==0){const a=Math.abs(c.n),cs=(c.d===1?(a===1?"":a):`${a}/${c.d}`);s.push((s.length?(c.n<0?" − ":" + "):(c.n<0?"−":""))+cs+V[k])}});return `<div>${s.length?s.join(""):"0"} = ${fstr(r[p])}</div>`}).join("")}</div>`}
  function run(){
    let rows;try{rows=ta.value.trim().split(/\n+/).map(l=>l.trim().split(/[\s;]+/).map(x=>{const t=x.replace("−","-");const m=t.match(/^(-?\d+)(?:\/(\d+))?$/);if(!m)throw 0;return fr(+m[1],m[2]?+m[2]:1)}));if(rows.some(r=>r.length!==rows[0].length)||rows[0].length<2)throw 0}catch(e){out.innerHTML=`<div class="mod-err">Chaque ligne doit contenir le même nombre de nombres (coefficients puis second membre).</div>`;return}
    const n=rows.length,p=rows[0].length-1;let steps=[`<div class="mod-step"><b>Système de départ</b></div>${eqs(rows)}`];let r=0;const piv=[];
    const sub=(a,b)=>fr(a.n*b.d-b.n*a.d,a.d*b.d),mulf=(a,b)=>fr(a.n*b.n,a.d*b.d);
    for(let c=0;c<p&&r<n;c++){let s=rows.findIndex((row,i)=>i>=r&&row[c].n!==0);if(s<0)continue;
      if(s!==r){[rows[r],rows[s]]=[rows[s],rows[r]];steps.push(`<div class="mod-step">On échange L${r+1} et L${s+1} pour avoir un pivot non nul.</div>`)}
      const ops=[];
      for(let i=r+1;i<n;i++){if(rows[i][c].n===0)continue;const a=rows[r][c],b=rows[i][c];
        if(a.d===1&&b.d===1&&b.n%a.n===0){const k=b.n/a.n;rows[i]=rows[i].map((x,j)=>sub(x,mulf(fr(k),rows[r][j])));ops.push(`L${i+1} ← L${i+1} ${k<0?"+ "+(-k===1?"":-k):"− "+(k===1?"":k)}L${r+1}`)}
        else{const A2=a,B2=b;rows[i]=rows[i].map((x,j)=>sub(mulf(A2,x),mulf(B2,rows[r][j])));{const ab=fstr(fr(Math.abs(B2.n),B2.d));ops.push(`L${i+1} ← ${fstr(A2)==="1"?"":fstr(A2)}L${i+1} ${B2.n<0?"+":"−"} ${ab==="1"?"":ab}L${r+1}`)}}}
      piv.push(c);if(ops.length)steps.push(`<div class="mod-step">Pivot <b>${fstr(rows[r][c])}</b> (inconnue ${V[c]}) : ${ops.join(", ")}</div>${eqs(rows)}`);r++}
    const bad=rows.find(row=>row.slice(0,p).every(x=>x.n===0)&&row[p].n!==0);
    const zero=rows.filter(row=>row.every(x=>x.n===0)).length;
    let concl;
    if(bad)concl=`Une ligne donne <b>0 = ${fstr(bad[p])}</b> : le système est <b>incompatible</b>, S = ∅.`;
    else if(piv.length===p){const sol=Array(p);const R=rows.filter(row=>!row.every(x=>x.n===0));for(let i=p-1;i>=0;i--){let s=R[i][p];for(let j=i+1;j<p;j++)s=sub(s,mulf(R[i][j],sol[j]));sol[i]=fr(s.n*R[i][i].d,s.d*R[i][i].n)}
      concl=`${zero?`On supprime ${zero} ligne(s) 0 = 0. `:""}Autant de pivots que d'inconnues : <b>solution unique</b> (on remonte de la dernière ligne) : S = {(${sol.map(fstr).join(", ")})}.`}
    else{const free=[...Array(p).keys()].filter(k=>!piv.includes(k)).map(k=>V[k]);concl=`${zero?`On supprime ${zero} ligne(s) 0 = 0. `:""}Inconnues principales : ${piv.map(k=>V[k]).join(", ")}. Secondaires : <b>${free.join(", ")}</b>. Infinité de solutions à ${free.length} paramètre${free.length>1?"s":""} : on passe ${free.join(", ")} à droite et on exprime les principales en fonction d'elles.`}
    out.innerHTML=steps.join("")+`<div class="verdict ${bad?"ko":"ok"}">${concl}</div>`;
  }
  ta.addEventListener("input",run);el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{ta.value=presets[+b.dataset.k][1];run()});run();
}
function modSandbox(el){
  const ex={html:`<header><h1>Les Pokémon</h1></header>\n<section>\n  <h2 id="feu">Type Feu</h2>\n  <ul><li>Salamèche</li><li>Ponyta</li></ul>\n  <div class="bloc">Bloc A</div><div class="bloc">Bloc B</div>\n</section>`,css:`header { background: #6a3fb5; color: white; padding: 10px; }\n#feu { color: orange; }\n.bloc { display: inline-block; width: 40%; border: 5px ridge gray; margin: 10px; padding: 10px; }\n.bloc:hover { position: relative; top: 20px; }`};
  const ih="sh"+rnd(1e6),ic="sc"+rnd(1e6);
  el.innerHTML=modHead("Bac à sable HTML / CSS","Tape du HTML et du CSS : le rendu s'affiche en direct à droite. Idéal pour t'entraîner avant le TP noté (sans Internet, comme le jour J).")+
  `<div class="cmp-in"><div><label class="lbl" for="${ih}">HTML</label><textarea class="txt code" id="${ih}" spellcheck="false">${esc(ex.html)}</textarea><label class="lbl" for="${ic}">CSS</label><textarea class="txt code" id="${ic}" spellcheck="false">${esc(ex.css)}</textarea></div><div><div class="lbl">Rendu</div><div class="preview"></div></div></div>`;
  const pv=el.querySelector(".preview");const root=pv.attachShadow?pv.attachShadow({mode:"open"}):pv;
  const H=el.querySelector("#"+ih),C=el.querySelector("#"+ic);
  function run(){root.innerHTML=`<style>:host{display:block;all:initial;font-family:Verdana,Arial,sans-serif;color:#111;background:#fff}*{box-sizing:content-box}${C.value.replace(/<\/?style/gi,"")}</style><div class="page">${H.value.replace(/<script[\s\S]*?<\/script>/gi,"").replace(/\son\w+\s*=/gi," data-x=")}</div>`}
  H.oninput=run;C.oninput=run;run();
}
function modBox(el){
  let s={w:200,p:20,b:5,m:20};const sc=0.6;
  el.innerHTML=modHead("Le modèle de boîte","Bouge les curseurs : marge extérieure (margin), bordure, marge intérieure (padding) et contenu (width).")+
  `<div class="card-in">${[["w","width",50,300],["p","padding",0,50],["b","border",0,20],["m","margin",0,50]].map(([k,l,a,b])=>`<label><span>${l} : <b data-v="${k}">${s[k]}</b>px</span><input type="range" min="${a}" max="${b}" value="${s[k]}" data-k="${k}"></label>`).join("")}</div><div class="bx-out"></div>`;
  const out=el.querySelector(".bx-out");
  function draw(){const W=s.w,tot=W+2*s.p+2*s.b;
    out.innerHTML=`<div class="tscroll"><div class="bx-m" style="padding:${s.m*sc}px"><div class="bx-b" style="border-width:${Math.max(1,s.b*sc)}px"><div class="bx-p" style="padding:${s.p*sc}px"><div class="bx-c" style="width:${W*sc}px">contenu ${W}px</div></div></div></div></div>
    <p>Largeur de la boîte (bordure comprise) = ${W} + 2×${s.p} + 2×${s.b} = <b>${tot}px</b>. Avec les marges, elle occupe ${tot+2*s.m}px. <span class="hint">Code : <span class="f">width: ${W}px; padding: ${s.p}px; border: ${s.b}px solid; margin: ${s.m}px;</span></span></p>`}
  el.querySelectorAll("input[type=range]").forEach(r=>r.oninput=()=>{s[r.dataset.k]=+r.value;el.querySelector(`[data-v="${r.dataset.k}"]`).textContent=r.value;draw()});
  draw();
}
function modPosition(el){
  let mode="static",z=false;
  function draw(){
    const off=mode==="static"?"":"top:30px;left:40px;";
    el.innerHTML=modHead("Tester position","Choisis une valeur de position pour le bloc orange (top: 30px; left: 40px) et observe : garde-t-il sa place ? par rapport à quoi se décale-t-il ?")+
    `<div class="presets">${["static","relative","absolute","fixed"].map(m=>`<button type="button" class="pill ${m===mode?"active":""}" data-m="${m}">${m}</button>`).join("")}<button type="button" class="pill ${z?"active":""}" data-z>z-index: 2 sur le bleu</button></div>
    <div class="pos-stage"><div class="pos-parent">parent (position: relative)<div class="pb pb1" style="${z?"position:relative;z-index:2;":""}">bloc bleu</div><div class="pb pb2" style="position:${mode==="fixed"?"absolute":mode};${off}${mode==="fixed"?"outline:2px dashed var(--ink);":""}">bloc orange</div><div class="pb pb3">bloc vert</div></div></div>
    <p>${{static:"<b>static</b> : flux normal, top et left sont ignorés.",relative:"<b>relative</b> : décalé par rapport à sa place normale, qui reste réservée (le vert ne remonte pas).",absolute:"<b>absolute</b> : sort du flux (le vert remonte) et se place par rapport au parent positionné.",fixed:"<b>fixed</b> : sort du flux et se place par rapport à la <b>fenêtre</b> ; il ne bouge plus quand on fait défiler (simulé ici dans le cadre)."}[mode]}${z?" Le bleu a z-index: 2 : il passe devant.":""}</p>`;
    el.querySelectorAll("[data-m]").forEach(b=>b.onclick=()=>{mode=b.dataset.m;draw()});el.querySelector("[data-z]").onclick=()=>{z=!z;draw()}}
  draw();
}
Object.assign(MODS,{mcdcard:modMcdCard,mld:modMld,matprod:modMatProd,pivot:modPivot,sandbox:modSandbox,boxmodel:modBox,position:modPosition});

/* ===================== R1.05 : exercices complets (TD, TP, annales) ===================== */
const EXOS_BDD=[
 {id:"resto",title:"Restaurant (TD1)",src:"TD1 · exercice 1, conception pas à pas (corrigé du prof)",h:770,
  enonce:["Un restaurateur veut gérer ses commandes de repas : ses employés (nom, prénom, adresse, téléphone, diplômes), le service (midi ou soir) et la date de chaque commande, la table qui l'a passée et le serveur qui l'a prise.","La carte propose des plats (entrées, plats, desserts) ; les menus sont un assemblage de plats. La carte des vins correspond à des bouteilles en cave (date et prix d'achat), chacune fournie par un viticulteur (nom, prénom, adresse, téléphone). Les autres boissons sont gérées par libellé et prix de vente.","Une commande peut contenir des plats, des menus, des vins et des boissons, chacun avec une quantité."],
  df:["NumEmploye → NomEmpl, PrenomEmpl, AdresseEmpl, TelEmpl","NumViticulteur → NomViti, PrenomViti, AdresseViti, TelViti","NumBoisson → DesignationBoisson, PrixBoisson","NumVin → NomVin, Millesime, PrixVin","NumBouteille → DateAchat, PrixAchat","NumMenu → LibelleMenu, PrixMenu","NumPlat → LibellePlat, PrixPlat, NumType","NumType → DesignationType","NumTable → Capacite","NumEmploye, Diplome → DateObtention","NumCommande → Date, TypeService, NumEmploye, NumTable","NumCommande, NumBoisson → Quantite (idem avec NumVin, NumPlat, NumMenu)"],
  entities:[{n:"EMPLOYE",id:"NumEmploye",props:["NomEmpl","PrenomEmpl","TelEmpl"],x:90,y:70},{n:"DIPLOME",id:"Diplome",props:[],x:90,y:265},{n:"TABLE",id:"NumTable",props:["Capacite"],x:330,y:60},{n:"SERVICE",id:"TypeService",props:["DesignationServ"],x:570,y:60},{n:"COMMANDE",id:"NumCommande",props:[],x:330,y:260},{n:"BOISSON",id:"NumBoisson",props:["DesignBoisson","PrixBoisson"],x:570,y:260},{n:"DATE",id:"Date",props:[],x:90,y:400},{n:"MENU",id:"NumMenu",props:["LibelleMenu","PrixMenu"],x:330,y:470},{n:"PLAT",id:"NumPlat",props:["LibellePlat","PrixPlat"],x:570,y:470},{n:"TYPE_PLAT",id:"NumType",props:["DesignType"],x:570,y:640},{n:"VIN",id:"NumVin",props:["NomVin","Millesime","PrixVin"],x:90,y:560},{n:"BOUTEILLE",id:"NumBouteille",props:["DateAchat","PrixAchat"],x:330,y:640},{n:"VITICULTEUR",id:"NumViticulteur",props:["NomViti","PrenomViti"],x:90,y:720}],
  assocs:[{n:"Posseder",table:"POSSEDE",x:90,y:170,props:["DateObtention"],links:[["EMPLOYE","0,n"],["DIPLOME","1,n"]],ph:["Un employé possède zéro ou plusieurs diplômes","Un diplôme est possédé par un ou plusieurs employés"]},
   {n:"Prendre",x:210,y:165,links:[["EMPLOYE","0,n"],["COMMANDE","1,1"]],ph:["Un employé prend zéro (cuisinier) ou plusieurs commandes","Une commande est prise par un et un seul employé"]},
   {n:"Concerner",x:330,y:160,links:[["TABLE","1,n"],["COMMANDE","1,1"]],ph:["Une table passe une ou plusieurs commandes","Une commande concerne une et une seule table"]},
   {n:"Dependre",x:450,y:160,links:[["SERVICE","1,n"],["COMMANDE","1,1"]],ph:["Durant un service, une ou plusieurs commandes sont passées","Une commande dépend d'un seul service"]},
   {n:"Contenir",x:450,y:260,props:["Quantite"],links:[["COMMANDE","0,n"],["BOISSON","0,n"]],ph:["Une commande contient zéro ou plusieurs boissons","Une boisson fait partie de zéro ou plusieurs commandes"]},
   {n:"Dater",x:210,y:330,links:[["DATE","1,n"],["COMMANDE","1,1"]],ph:["À une date, une ou plusieurs commandes sont passées","Une commande est passée à une et une seule date"]},
   {n:"Comprendre",x:330,y:365,props:["QuantiteMenu"],links:[["COMMANDE","0,n"],["MENU","0,n"]],ph:["Une commande contient zéro ou plusieurs menus","Un menu fait partie de zéro ou plusieurs commandes"]},
   {n:"Constituer",x:470,y:365,props:["Quantite"],links:[["COMMANDE","0,n"],["PLAT","0,n"]],ph:["Une commande contient zéro ou plusieurs plats","Un plat fait partie de zéro ou plusieurs commandes"]},
   {n:"Selectionner",x:190,y:470,props:["Quantite"],links:[["COMMANDE","0,n"],["VIN","0,n"]],ph:["Une commande contient zéro ou plusieurs vins","Un vin fait partie de zéro ou plusieurs commandes"]},
   {n:"Composer",table:"CONSTITUE",x:450,y:540,links:[["MENU","1,n"],["PLAT","0,n"]],ph:["Un menu est constitué d'au moins un plat","Un plat peut ne faire partie d'aucun menu"]},
   {n:"Typer",x:640,y:555,links:[["PLAT","1,1"],["TYPE_PLAT","1,n"]],ph:["Un plat correspond à un et un seul type","Un type regroupe un ou plusieurs plats"]},
   {n:"Decrire",x:210,y:610,links:[["BOUTEILLE","1,1"],["VIN","1,n"]],ph:["Une bouteille correspond à une et une seule description de vin","Un vin de la carte correspond à une ou plusieurs bouteilles"]},
   {n:"Fournir",x:210,y:700,links:[["BOUTEILLE","1,1"],["VITICULTEUR","1,n"]],ph:["Une bouteille est fournie par un et un seul viticulteur","Un viticulteur fournit une ou plusieurs bouteilles"]}],
  note:"Corrigé du prof : DIPLOME et DATE n'ont que leur identifiant, il les garde quand même en tables (Diplôme(Diplome), Date(Date)). Les noms de tables du corrigé : Possède, Contenir, Comprend, Constitué, Constituer, Sélectionner."},
 {id:"a2526",title:"Commerce en ligne",src:"Annale mi-parcours 2025-26 · exercice 1 (14 pts)",h:330,
  enonce:["On souhaite créer une base de données pour un site de commerce en ligne qui enregistre les clients, les produits, les commandes et les employés chargés de les traiter.","Un client peut passer une ou plusieurs commandes. Une commande est passée par un et un seul client. Chaque commande contient un ou plusieurs produits, tandis qu'un produit peut apparaître dans aucune ou plusieurs commandes. Les commandes sont toujours traitées par un et un seul employé, et chaque employé gère une ou plusieurs commandes.","On enregistre : le client (nom, adresse mail), le produit (nom, prix), l'employé (nom, prénom), la commande (date, statut), et la quantité commandée pour chaque produit d'une commande."],
  entities:[{n:"CLIENT",id:"IDClient",props:["NomClient","EmailClient"],x:90,y:80},{n:"COMMANDE",id:"IDCommande",props:["DateCommande","Statut"],x:330,y:80},{n:"PRODUIT",id:"IDProduit",props:["NomProduit","PrixProduit"],x:570,y:80},{n:"EMPLOYE",id:"IDEmpl",props:["NomEmpl","PrenomEmpl"],x:330,y:270}],
  assocs:[{n:"Passer",x:210,y:80,links:[["CLIENT","1,n"],["COMMANDE","1,1"]],ph:["Un client peut passer une ou plusieurs commandes","Une commande est passée par un et un seul client"]},
   {n:"Contenir",table:"LigneCommande",x:450,y:80,props:["Qte"],links:[["COMMANDE","1,n"],["PRODUIT","0,n"]],ph:["Une commande contient un ou plusieurs produits","Un produit apparaît dans aucune ou plusieurs commandes"]},
   {n:"Traiter",x:330,y:180,links:[["EMPLOYE","1,n"],["COMMANDE","1,1"]],ph:["Un employé traite une ou plusieurs commandes","Une commande est traitée par un et un seul employé"]}]},
 {id:"a2425",title:"Publications scientifiques",src:"Annale mi-parcours 2024-25 · exercice 1",h:200,
  enonce:["Une base de données concernant des publications scientifiques doit être constituée avec trois types d'entités : Scientifique, Article et Revue.","Un scientifique écrit un ou plusieurs articles. Un article est écrit par un ou plusieurs scientifiques et paraît dans une ou plusieurs revues. Une revue publie un ou plusieurs articles.","On enregistre le nom, le prénom et la date de naissance du scientifique, le titre et la date d'envoi de l'article, le nom de la revue, et la date de parution d'un article dans une revue."],
  entities:[{n:"SCIENTIFIQUE",id:"IDS",props:["Nom","Prenom","DateNaissance"],x:90,y:90},{n:"ARTICLE",id:"IDA",props:["Titre","DateEnvoi"],x:330,y:90},{n:"REVUE",id:"IDR",props:["NomRevue"],x:570,y:90}],
  assocs:[{n:"Ecrire",table:"ECRIT",x:210,y:90,links:[["SCIENTIFIQUE","1,n"],["ARTICLE","1,n"]],ph:["Un scientifique écrit un ou plusieurs articles","Un article est écrit par un ou plusieurs scientifiques"]},
   {n:"Paraitre",table:"PARUTION",x:450,y:90,props:["DateParution"],links:[["ARTICLE","1,n"],["REVUE","1,n"]],ph:["Un article paraît dans une ou plusieurs revues","Une revue publie un ou plusieurs articles"]}]},
 {id:"a2526b",title:"Cabinet médical",src:"Annale mi-parcours 2025-26 · exercice 2 (7 pts)",h:300,
  enonce:["Un médecin assure aucune ou plusieurs consultations ; une consultation est assurée par un et un seul médecin.","Un patient passe aucune ou plusieurs consultations ; une consultation concerne un et un seul patient.","Lors d'une consultation, le médecin prescrit aucun ou plusieurs médicaments, avec un nombre de prises ; un médicament est prescrit dans aucune ou plusieurs consultations.","On connaît le matricule et le nom du médecin, le numéro de sécurité sociale et le nom du patient, la date de la consultation, le code et le libellé du médicament."],
  entities:[{n:"MEDECIN",id:"Matricule",props:["NomMedecin"],x:90,y:80},{n:"CONSULTATION",id:"NoConsultation",props:["DateConsult"],x:330,y:80},{n:"PATIENT",id:"NoSS",props:["NomPatient"],x:330,y:260},{n:"MEDICAMENT",id:"CodeMedicament",props:["Libelle"],x:570,y:80}],
  assocs:[{n:"Assurer",x:210,y:80,links:[["MEDECIN","0,n"],["CONSULTATION","1,1"]],ph:["Un médecin assure aucune ou plusieurs consultations","Une consultation est assurée par un et un seul médecin"]},
   {n:"Concerner",x:330,y:170,links:[["PATIENT","0,n"],["CONSULTATION","1,1"]],ph:["Un patient passe aucune ou plusieurs consultations","Une consultation concerne un et un seul patient"]},
   {n:"Prescrire",table:"PRESCRIPTION",x:450,y:80,props:["NbPrises"],links:[["CONSULTATION","0,n"],["MEDICAMENT","0,n"]],ph:["Une consultation prescrit aucun ou plusieurs médicaments","Un médicament est prescrit dans aucune ou plusieurs consultations"]}]},
 {id:"agri",title:"Agriculteur",src:"TP · exercice 2 (Looping)",h:280,
  enonce:["Un agriculteur fait de la vente directe d'animaux, de fruits et de légumes, tout vendu au kilo. Il veut saisir ses ventes journalières et éditer un récapitulatif mensuel par type de produit (animaux, fruits, légumes) et par produit.","Un produit est d'un et un seul type ; un type regroupe un ou plusieurs produits.","Un produit peut être vendu à aucune ou plusieurs dates ; à une date de vente, un ou plusieurs produits sont vendus, avec un poids."],
  entities:[{n:"TYPE_PRODUIT",id:"CodeType",props:["Designation"],x:90,y:80},{n:"PRODUIT",id:"CodeProduit",props:["NomProduit","PrixKilo"],x:330,y:80},{n:"DATE",id:"DateVente",props:[],x:330,y:250}],
  assocs:[{n:"Appartenir",x:210,y:80,links:[["TYPE_PRODUIT","1,n"],["PRODUIT","1,1"]],ph:["Un type regroupe un ou plusieurs produits","Un produit est d'un et un seul type"]},
   {n:"Vendre",x:330,y:165,props:["Poids"],links:[["PRODUIT","0,n"],["DATE","1,n"]],ph:["Un produit est vendu à aucune ou plusieurs dates","À une date, un ou plusieurs produits sont vendus"]}],
  note:"Le prof garde une table Date(DateVente). Séparer animaux, fruits et légumes en 3 entités serait une erreur : la table Vendre aurait des colonnes vides (NULL) et on ne saurait plus à quel produit correspond le poids."},
 {id:"inter",title:"Gestion d'interventions",src:"TP · exercice 3",h:330,
  enonce:["Vous dépannez les ordinateurs des habitants de votre village. Un client possède un ou plusieurs matériels ; un matériel appartient à un et un seul client.","Un matériel peut avoir aucune ou plusieurs interventions ; une intervention concerne un et un seul matériel.","Une intervention est d'un et un seul type (qui fixe le prix horaire) ; un type correspond à aucune ou plusieurs interventions.","Une intervention utilise aucun ou plusieurs composants (avec une quantité) ; un composant est utilisé dans aucune ou plusieurs interventions."],
  entities:[{n:"CLIENT",id:"ID_Client",props:["Nom","Prenom","Adresse","Telephone"],x:90,y:90},{n:"MATERIEL",id:"ID_Materiel",props:["Designation","Fabricant","DateAchat"],x:330,y:90},{n:"INTERVENTION",id:"Num_Intervention",props:["DescriptionPanne","DateInterv","TempsPasse"],x:330,y:265},{n:"TYPE_INTERV",id:"Code_Type",props:["Libelle","PrixHoraire"],x:90,y:265},{n:"COMPOSANT",id:"Ref_Composant",props:["DesignationComp","PrixAchat"],x:570,y:265}],
  assocs:[{n:"Posseder",x:210,y:90,links:[["CLIENT","1,n"],["MATERIEL","1,1"]],ph:["Un client possède un ou plusieurs matériels","Un matériel appartient à un et un seul client"]},
   {n:"Concerner",x:330,y:178,links:[["MATERIEL","0,n"],["INTERVENTION","1,1"]],ph:["Un matériel a aucune ou plusieurs interventions","Une intervention concerne un et un seul matériel"]},
   {n:"Classer",x:210,y:265,links:[["TYPE_INTERV","0,n"],["INTERVENTION","1,1"]],ph:["Un type correspond à aucune ou plusieurs interventions","Une intervention est d'un et un seul type"]},
   {n:"Utiliser",x:450,y:265,props:["Qte"],links:[["INTERVENTION","0,n"],["COMPOSANT","0,n"]],ph:["Une intervention utilise aucun ou plusieurs composants","Un composant est utilisé dans aucune ou plusieurs interventions"]}]},
 {id:"immo",title:"Agent immobilier",src:"TP · exercice 4",h:230,
  enonce:["Un agent immobilier gère son fichier des maisons, des propriétaires et des locataires.","Une maison appartient à une ou plusieurs personnes ; une personne peut posséder aucune ou plusieurs maisons.","Une personne peut louer au plus une maison (0 ou 1) ; une maison est louée par aucune ou plusieurs personnes."],
  entities:[{n:"PERSONNE",id:"ID_Personne",props:["Nom","Prenom"],x:110,y:110},{n:"MAISON",id:"ID_Maison",props:["Adresse","CP","Ville"],x:550,y:110}],
  assocs:[{n:"Posseder",x:330,y:55,links:[["PERSONNE","0,n"],["MAISON","1,n"]],ph:["Une personne possède aucune ou plusieurs maisons","Une maison appartient à une ou plusieurs personnes"]},
   {n:"Louer",x:330,y:170,links:[["PERSONNE","0,1",null,"ID_Maison_louee"],["MAISON","0,n"]],ph:["Une personne loue au plus une maison","Une maison est louée par aucune ou plusieurs personnes"]}]},
 {id:"journal",title:"Journal et journalistes",src:"Annale mi-parcours 2024-25 · exercice 2 (9 pts)",h:340,
  enonce:["Un journaliste travaille pour un ou plusieurs journaux ; un journal emploie un ou plusieurs journalistes.","Un journaliste interviewe aucune ou plusieurs personnalités ; une personnalité est interviewée par aucun ou plusieurs journalistes.","Un journaliste écrit aucun ou plusieurs articles ; un article est écrit par un et un seul journaliste. Un article traite d'un et un seul sujet ; un sujet est traité par aucun ou plusieurs articles.","Un article paraît dans un ou plusieurs numéros ; un numéro contient aucun ou plusieurs articles."],
  entities:[{n:"JOURNAL",id:"IDJournal",props:["Titre","Adresse"],x:90,y:70},{n:"JOURNALISTE",id:"IDJournaliste",props:["NomJ","DateNaiss"],x:330,y:70},{n:"PERSONNALITE",id:"IDPersonnalite",props:["NomP","Nationalite"],x:570,y:70},{n:"ARTICLE",id:"IDArticle",props:["Contenu"],x:330,y:270},{n:"SUJET",id:"IDSujet",props:["Libelle"],x:90,y:270},{n:"NUMERO",id:"IDNumero",props:["DateNumero"],x:570,y:270}],
  assocs:[{n:"Travailler",table:"TRAVAIL",x:210,y:70,links:[["JOURNALISTE","1,n"],["JOURNAL","1,n"]],ph:["Un journaliste travaille pour un ou plusieurs journaux","Un journal emploie un ou plusieurs journalistes"]},
   {n:"Interviewer",table:"INTERVIEW",x:450,y:70,links:[["JOURNALISTE","0,n"],["PERSONNALITE","0,n"]],ph:["Un journaliste interviewe aucune ou plusieurs personnalités","Une personnalité est interviewée par aucun ou plusieurs journalistes"]},
   {n:"Ecrire",x:330,y:170,links:[["JOURNALISTE","0,n"],["ARTICLE","1,1"]],ph:["Un journaliste écrit aucun ou plusieurs articles","Un article est écrit par un et un seul journaliste"]},
   {n:"Traiter",x:210,y:270,links:[["SUJET","0,n"],["ARTICLE","1,1"]],ph:["Un sujet est traité par aucun ou plusieurs articles","Un article traite d'un et un seul sujet"]},
   {n:"Paraitre",table:"PARAITDANS",x:450,y:270,links:[["ARTICLE","1,n"],["NUMERO","0,n"]],ph:["Un article paraît dans un ou plusieurs numéros","Un numéro contient aucun ou plusieurs articles"]}]},
 {id:"chef",title:"Salariés et chefs (réflexive)",src:"Cours · cas particulier",h:230,
  enonce:["Un salarié a pour chef aucun ou un seul autre salarié. Un salarié est chef de aucun ou plusieurs autres salariés.","On connaît le matricule, le nom et la fonction de chaque salarié."],
  entities:[{n:"SALARIE",id:"Matricule",props:["Nom","Fonction"],x:200,y:110}],
  assocs:[{n:"Encadrer",x:470,y:110,links:[["SALARIE","0,n","chef",null,-28],["SALARIE","0,1","subordonné","Matricule_chef",28]],ph:["Un salarié est chef de aucun ou plusieurs salariés","Un salarié a pour chef aucun ou un seul salarié"]}],
  note:"Réflexive : la même clé apparaît deux fois. On renomme la clé étrangère (#Matricule_chef) pour ne pas la confondre avec la clé primaire."}
];
const cmax=c=>c.split(",")[1],cmin=c=>c.split(",")[0];
function entOf(ex,n){return ex.entities.find(e=>e.n===n)}
function assocType(a){if(a.links.length>2)return "n-aire";const m=a.links.map(l=>cmax(l[1]));return m[0]==="n"&&m[1]==="n"?"n:n":m[0]==="1"&&m[1]==="1"?"1:1":"1:n"}
function mcdToMld(ex){
  const T={};ex.entities.forEach(e=>T[e.n]={name:e.n,from:[e.n],attrs:[{n:e.id,pk:true},...e.props.map(p=>({n:p}))]});
  const steps=[],assocTables=[];
  for(const a of ex.assocs){const type=assocType(a),props=a.props||[];const L=a.links;
    let into=null;
    if(L.length===2&&!props.length){
      if(type==="1:n")into=cmax(L[0][1])==="1"?0:1;
      else if(type==="1:1"){if(L[0][1]==="1,1")into=0;else if(L[1][1]==="1,1")into=1}}
    if(into!==null){const side=L[into],other=L[1-into];const oe=entOf(ex,other[0]);const fk=side[3]||oe.id;
      T[side[0]].attrs.push({n:fk,fk:true,ref:oe.n});T[side[0]].from.push(a.n);
      steps.push({a,type,into:side[0],fk,rule:type==="1:n"?`Règle 2 (1:n) : la table ${side[0]}, côté maximum 1 (${side[1]}), reçoit la clé étrangère #${fk} qui référence ${oe.n}. L'association ${a.n} disparaît.`:`1:1 : la table côté (1,1), ${side[0]}, reçoit la clé étrangère #${fk}.`});}
    else{const name=a.table||a.n.toUpperCase();const attrs=L.map(l=>({n:l[3]||entOf(ex,l[0]).id,pk:true,fk:true,ref:l[0]})).concat(props.map(p=>({n:p})));
      const t={name,from:[a.n],attrs,assoc:true};assocTables.push(t);
      steps.push({a,type,table:name,rule:props.length&&type!=="n:n"?`Association porteuse de données (${props.join(", ")}) : elle devient une table ${name}, clé primaire = les clés étrangères des entités liées.`:type==="n-aire"?`Association n-aire : table ${name} dont la clé primaire regroupe tous les identifiants.`:type==="1:1"?`1:1 avec (0,1) des deux côtés : table ${name} pour éviter une clé étrangère nulle.`:`Règle 3 (n:n) : nouvelle table ${name}, clé primaire = (#${attrs.filter(x=>x.fk).map(x=>x.n).join(", #")})${props.length?`, plus ${props.join(", ")}`:""}.`})}}
  return {tables:[...Object.values(T),...assocTables],steps};
}
function mldText(t){return `${esc(t.name)} (${t.attrs.map(x=>{const s=(x.fk?"#":"")+esc(x.n);return x.pk?`<u>${s}</u>`:s}).join(", ")})`}
function boxDims(e){const lines=1+e.props.length;return {w:Math.max(130,...[e.n,e.id,...e.props].map(s=>s.length*7.4+22)),h:28+lines*17+8}}
function edgePoint(cx,cy,w,h,tx,ty){const dx=tx-cx,dy=ty-cy;if(!dx&&!dy)return [cx,cy];const sx=dx?(w/2)/Math.abs(dx):1e9,sy=dy?(h/2)/Math.abs(dy):1e9;const s=Math.min(sx,sy);return [cx+dx*s,cy+dy*s]}
function mcdDiagram(ex0,opt={}){
  const SX=opt.fit?1.02:1.45,SY=1.2;const ex={...ex0,h:Math.round(ex0.h*SY)+10,entities:ex0.entities.map(e=>({...e,x:e.x*SX,y:e.y*SY})),assocs:ex0.assocs.map(a=>({...a,x:a.x*SX,y:a.y*SY}))};
  const uid="d"+Math.floor(Math.random()*1e6);let lines="",labels="",boxes="",ells="";const sel=opt.sel;
  for(const a of ex.assocs){const on=sel===a.n;const props=a.props||[];
    a.links.forEach((l,li)=>{const e=entOf(ex,l[0]);const d=boxDims(e);const off=l[4]||0;const ex2=e.x+off;
      let [px,py]=edgePoint(e.x,e.y,d.w,d.h,a.x,a.y+off);if(off&&Math.abs(a.x-e.x)>Math.abs(a.y-e.y))py=e.y+Math.max(-d.h/2+6,Math.min(d.h/2-6,off));const ang=Math.atan2(a.y+off-py,a.x-px);
      const lx=px+Math.cos(ang)*26-Math.sin(ang)*12,ly=py+Math.sin(ang)*26+Math.cos(ang)*12+4;
      lines+=`<line x1="${px+(off&&Math.abs(Math.cos(ang))<.5?off:0)}" y1="${py}" x2="${a.x}" y2="${a.y}" class="m-l ${on?"on":""}"/>`;
      const c=opt.hide?(opt.answers&&opt.answers[a.n+"|"+li])||"?":l[1];
      labels+=`<text x="${lx}" y="${ly}" text-anchor="middle" class="m-c ${opt.hide&&!(opt.answers&&opt.answers[a.n+"|"+li])?"q":""}">${esc(c)}</text>${l[2]?`<text x="${lx}" y="${ly+14}" text-anchor="middle" class="m-s">${esc(l[2])}</text>`:""}`});
    const rx=Math.max(46,a.n.length*5.2+20,...props.map(p=>p.length*4+18)),ry=props.length?28:20;
    ells+=`<g class="m-assoc ${on?"on":""}" data-a="${esc(a.n)}" tabindex="0" role="button" aria-label="Association ${esc(a.n)}"><ellipse cx="${a.x}" cy="${a.y}" rx="${rx}" ry="${ry}" class="m-as"/><text x="${a.x}" y="${a.y+(props.length?-3:5)}" text-anchor="middle" class="m-t b">${esc(a.n)}</text>${props.length?`<text x="${a.x}" y="${a.y+15}" text-anchor="middle" class="m-s">${props.map(esc).join(", ")}</text>`:""}</g>`}
  const rel=sel?ex.assocs.find(a=>a.n===sel).links.map(l=>l[0]):[];
  for(const e of ex.entities){const d=boxDims(e);const x0=e.x-d.w/2,y0=e.y-d.h/2;
    boxes+=`<g class="${rel.includes(e.n)?"m-hl":""}"><rect x="${x0}" y="${y0}" width="${d.w}" height="${d.h}" rx="6" class="m-ent"/><text x="${e.x}" y="${y0+18}" text-anchor="middle" class="m-t b">${esc(e.n)}</text><line x1="${x0}" y1="${y0+26}" x2="${x0+d.w}" y2="${y0+26}" class="m-l"/>
    <text x="${x0+10}" y="${y0+43}" class="m-s id">${esc(e.id)}</text>${e.props.map((p,i)=>`<text x="${x0+10}" y="${y0+60+i*17}" class="m-s">${esc(p)}</text>`).join("")}</g>`}
  const W=(opt.fit||opt.tight)?Math.round(Math.max(...ex.entities.map(e=>e.x+boxDims(e).w/2),...ex.assocs.map(a=>a.x+70))+24):960;
  return `<div><svg viewBox="0 0 ${W} ${ex.h}" width="${W}" height="${ex.h}" style="width:100%;max-width:${W}px;height:auto" class="mcd big" role="img" aria-label="MCD ${esc(ex.title)}">${lines}${boxes}${ells}${labels}</svg></div>`;
}
function redaction(ex){return ex.assocs.map(a=>{const t=assocType(a);const L=a.links;
  const parts=L.map((l,i)=>`${a.ph&&a.ph[i]?esc(a.ph[i]):""}, donc la cardinalité entre ${l[0]} et ${esc(a.n)} est <b>${l[1]}</b>.`).join(" ");
  return `<li>Entre ${L.map(l=>l[0]).filter((v,i,s)=>s.indexOf(v)===i).join(" et ")} il y a une association <b>${esc(a.n)}</b>${(a.props||[]).length?` porteuse de ${a.props.join(", ")}`:""}. ${parts} Les cardinalités maximales sont ${L.map(l=>cmax(l[1])).join(" et ")} : association de type <b>${t}</b>.</li>`}).join("")}

const PDFS_BDD={"resto": [["Sujet du TD1", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170811"], ["Corrigé TD1 (dictionnaire, DF)", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170813"], ["Corrigé TD1 (MCD, MLD, schéma)", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170814"]], "a2526": [["Annale 2025-26 corrigée (barème)", "https://arche.univ-lorraine.fr/pluginfile.php/5121470/mod_resource/content/1/Eval%20Mi%20Parcours%202025-2026-Correction%20-%20bareme.pdf"]], "a2526b": [["Annale 2025-26 corrigée (barème)", "https://arche.univ-lorraine.fr/pluginfile.php/5121470/mod_resource/content/1/Eval%20Mi%20Parcours%202025-2026-Correction%20-%20bareme.pdf"]], "a2425": [["Annale 2024-25 corrigée", "https://arche.univ-lorraine.fr/pluginfile.php/5121471/mod_resource/content/1/Eval%20Mi%20Parcours-Correction24-25.pdf"]], "journal": [["Annale 2024-25 corrigée", "https://arche.univ-lorraine.fr/pluginfile.php/5121471/mod_resource/content/1/Eval%20Mi%20Parcours-Correction24-25.pdf"]], "agri": [["Sujets des TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170824"], ["Corrigé des exercices TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2249861"]], "inter": [["Sujets des TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170824"], ["Corrigé des exercices TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2249861"]], "immo": [["Sujets des TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2170824"], ["Corrigé des exercices TP", "https://arche.univ-lorraine.fr/mod/resource/view.php?id=2249861"]], "chef": [["Cours 2 : passage MCD → MLD", "https://arche.univ-lorraine.fr/pluginfile.php/4688255/mod_resource/content/2/2%20-%20Cours%20Principal-R105-%20Intro%20BD%20MCD%20MLD.pdf"]]};
function pdfLinks(ex){const L=PDFS_BDD[ex.id]||[];return L.length?`<div class="pdfl"><span class="eyebrow">PDF sur Arche</span>${L.map(([t,u])=>`<a href="${u}" target="_blank" rel="noopener">${esc(t)}</a>`).join("")}</div>`:""}
/* ---------- Module : corrections interactives ---------- */
function modMcdCorr(el){
  let k=0,sel=null,hide=false;
  function draw(){const ex=EXOS_BDD[k];const M=mcdToMld(ex);const st=sel&&M.steps.find(s=>s.a.n===sel);
    el.innerHTML=modHead("Corrections détaillées","Choisis un exercice. Clique sur une association (ellipse) du MCD : tu vois la lecture des cardinalités, la règle appliquée et la table obtenue.")+
    `<div class="presets">${EXOS_BDD.map((e,i)=>`<button type="button" class="pill ${i===k?"active":""}" data-k="${i}">${esc(e.title)}</button>`).join("")}</div>
    <div class="exo"><div class="eyebrow">${esc(ex.src)}</div><h4>${esc(ex.title)}</h4>${ex.enonce.map(p=>`<p>${esc(p)}</p>`).join("")}${pdfLinks(ex)}</div>
    <div class="actions" style="justify-content:flex-start"><button type="button" class="pill ${hide?"active":""}" data-hide>${hide?"Afficher les cardinalités":"Cacher les cardinalités (pour t'entraîner)"}</button></div>
    <div class="eyebrow">1. MCD</div>${mcdDiagram(ex,{sel,hide})}
    ${st?`<div class="verdict ok"><b>${esc(st.a.n)}</b> · ${st.a.links.map((l,i)=>`« ${esc(st.a.ph?st.a.ph[i]:"")} » → <b>${l[1]}</b> à côté de ${l[0]}`).join(" ; ")}.<br>Maximums ${st.a.links.map(l=>cmax(l[1])).join(" et ")} → type <b>${st.type}</b>. ${esc(st.rule)}</div>`:`<p class="hint">Astuce : clique sur « ${esc(ex.assocs[0].n)} » pour commencer.</p>`}
    <div class="eyebrow">2. Rédaction attendue (associations et cardinalités)</div><ol class="steps">${redaction(ex)}</ol>
    <div class="eyebrow">3. Schéma relationnel (MLD)</div>
    <div class="mld">${M.tables.map(t=>`<div class="mldt ${sel&&t.from.includes(sel)?"on":""}">${mldText(t)}</div>`).join("")}</div>
    <p class="hint">Clé primaire soulignée, clé étrangère précédée de #.</p>
    <div class="eyebrow">4. Clés étrangères à préciser</div><ul>${M.tables.flatMap(t=>t.attrs.filter(a=>a.fk).map(a=>`<li><span class="f">#${esc(a.n)}</span> dans ${esc(t.name)} référence la clé primaire de ${esc(a.ref)}.</li>`)).join("")}</ul>
    ${ex.df?`<div class="eyebrow">Dépendances fonctionnelles (corrigé)</div><ul>${ex.df.map(d=>`<li class="f" style="white-space:normal">${esc(d)}</li>`).join("")}</ul>`:""}
    ${ex.note?`<div class="box trap">${esc(ex.note)}</div>`:""}`;
    el.querySelectorAll("[data-k]").forEach(b=>b.onclick=()=>{k=+b.dataset.k;sel=null;draw()});
    el.querySelector("[data-hide]").onclick=()=>{hide=!hide;draw()};
    el.querySelectorAll("[data-a]").forEach(g=>{const f=()=>{sel=sel===g.dataset.a?null:g.dataset.a;draw()};g.onclick=f;g.onkeydown=e=>{if(e.key==="Enter")f()}})}
  draw();
}
MODS.mcdcorr=modMcdCorr;

/* ---------- Type de question : exercice d'évaluation ---------- */
const CARDS=["0,1","1,1","0,n","1,n"];
QT.eval={howto:"Fais l'exercice comme sur ta copie : étape 1 les cardinalités, étape 2 le schéma relationnel. Puis clique sur Vérifier pour voir la correction rédigée.",
 body(q){const ex=q.ex;return `<div class="exo"><div class="eyebrow">${esc(ex.src)}</div>${ex.enonce.map(p=>`<p>${esc(p)}</p>`).join("")}</div>
  <div id="evMcd">${mcdDiagram(ex,{hide:true})}</div>
  <div class="evstep" id="evA"><div class="eyebrow">Étape 1 · Cardinalités et type de chaque association</div>
  ${ex.assocs.map(a=>`<div class="evrow"><b>${esc(a.n)}</b>${(a.props||[]).length?` <span class="hint">(porte ${a.props.map(esc).join(", ")})</span>`:""}<div class="evsel">${a.links.map((l,i)=>`<label>côté ${esc(l[0])}${l[2]?` (${esc(l[2])})`:""}<select data-c="${esc(a.n)}|${i}"><option value="">—</option>${CARDS.map(c=>`<option>${c}</option>`).join("")}</select></label>`).join("")}<label>type<select data-t="${esc(a.n)}"><option value="">—</option><option>1:1</option><option>1:n</option><option>n:n</option></select></label></div></div>`).join("")}
  <button type="button" class="btn ghost" id="evAok" disabled>Valider l'étape 1</button><div id="evAfb"></div></div>
  <div class="evstep" id="evB" hidden><div class="eyebrow">Étape 2 · Schéma relationnel</div>
  <p class="hint">Pour chaque table : clique sur l'attribut qui est la clé primaire (il se souligne), puis ajoute les clés étrangères (#). Coche les associations qui deviennent une table.</p>
  <div id="evTables"></div><div id="evAssoc"></div></div>`},
 init(el,q,ready){const ex=q.ex;const M=mcdToMld(ex);q._M=M;const sels=[...el.querySelectorAll("#evA select")];
  const upd=()=>{el.querySelector("#evAok").disabled=!sels.every(s=>s.value)};sels.forEach(s=>s.onchange=upd);
  const st={pk:{},fk:{},at:{},atpk:{}};ex.entities.forEach(e=>{st.pk[e.n]=null;st.fk[e.n]=[]});ex.assocs.forEach(a=>{st.at[a.n]=false;st.atpk[a.n]=new Set()});q._st=st;q._aok=null;
  function drawB(){
    el.querySelector("#evTables").innerHTML=ex.entities.map(e=>`<div class="evt"><b>${esc(e.n)}</b> (${[e.id,...e.props].map(p=>`<button type="button" class="chip-a ${st.pk[e.n]===p?"pk":""}" data-pk="${esc(e.n)}|${esc(p)}">${esc(p)}</button>`).join(", ")}${st.fk[e.n].map((f,i)=>`, <button type="button" class="chip-a fk" data-rmfk="${esc(e.n)}|${i}" title="Retirer">#${esc(f)} ×</button>`).join("")})
      <select data-addfk="${esc(e.n)}" aria-label="Ajouter une clé étrangère à ${esc(e.n)}"><option value="">+ clé étrangère…</option>${ex.entities.filter(o=>o.n!==e.n||ex.assocs.some(a=>a.links.every(l=>l[0]===e.n))).map(o=>`<option value="${esc(o.id)}">#${esc(o.id)} (vers ${esc(o.n)})</option>`).join("")}${ex.assocs.flatMap(a=>a.links.filter(l=>l[3]).map(l=>`<option value="${esc(l[3])}">#${esc(l[3])}</option>`)).join("")}</select></div>`).join("");
    el.querySelector("#evAssoc").innerHTML=`<div class="eyebrow" style="margin-top:8px">Associations qui deviennent une table</div>`+ex.assocs.map(a=>{const ids=a.links.map(l=>l[3]||entOf(ex,l[0]).id);return `<div class="evt"><label><input type="checkbox" data-at="${esc(a.n)}" ${st.at[a.n]?"checked":""}> <b>${esc(a.table||a.n.toUpperCase())}</b></label>${st.at[a.n]?` (${ids.map(i=>`<button type="button" class="chip-a fkc ${st.atpk[a.n].has(i)?"pk":""}" data-atpk="${esc(a.n)}|${esc(i)}">#${esc(i)}</button>`).join(", ")}${(a.props||[]).map(p=>`, ${esc(p)}`).join("")})<span class="hint"> · clique sur les attributs de la clé primaire</span>`:""}</div>`}).join("");
    el.querySelectorAll("[data-pk]").forEach(b=>b.onclick=()=>{if(q._locked)return;const [t,p]=b.dataset.pk.split("|");st.pk[t]=st.pk[t]===p?null:p;drawB()});
    el.querySelectorAll("[data-rmfk]").forEach(b=>b.onclick=()=>{if(q._locked)return;const [t,i]=b.dataset.rmfk.split("|");st.fk[t].splice(+i,1);drawB()});
    el.querySelectorAll("[data-addfk]").forEach(s=>s.onchange=()=>{if(q._locked||!s.value)return;const t=s.dataset.addfk;if(!st.fk[t].includes(s.value))st.fk[t].push(s.value);drawB()});
    el.querySelectorAll("[data-at]").forEach(c=>c.onchange=()=>{if(q._locked)return;st.at[c.dataset.at]=c.checked;drawB()});
    el.querySelectorAll("[data-atpk]").forEach(b=>b.onclick=()=>{if(q._locked)return;const [a,i]=b.dataset.atpk.split("|");st.atpk[a].has(i)?st.atpk[a].delete(i):st.atpk[a].add(i);drawB()});
  }
  el.querySelector("#evAok").onclick=()=>{let ok=true;const ans={};
    sels.forEach(s=>{let good;if(s.dataset.c){const [an,i]=s.dataset.c.split("|");good=ex.assocs.find(a=>a.n===an).links[+i][1];ans[an+"|"+i]=good}else good=assocType(ex.assocs.find(a=>a.n===s.dataset.t));
      const g=s.value===good;if(!g)ok=false;s.classList.add(g?"ok":"ko");s.disabled=true;if(!g){s.insertAdjacentHTML("afterend",`<span class="fixv">→ ${good}</span>`)}});
    q._aok=ok;el.querySelector("#evAok").hidden=true;
    el.querySelector("#evAfb").innerHTML=`<div class="verdict ${ok?"ok":"ko"}">${ok?"Étape 1 juste !":"Quelques erreurs : les bonnes valeurs sont écrites à côté et sur le MCD."} Rédaction attendue :<ol class="steps">${redaction(ex)}</ol></div>`;
    el.querySelector("#evMcd").innerHTML=mcdDiagram(ex);el.querySelector("#evB").hidden=false;drawB();ready(true)};
  return ()=>st},
 grade(q){const st=q._st,M=q._M,ex=q.ex;if(!q._aok)return false;
  for(const e of ex.entities){const t=M.tables.find(x=>x.name===e.n);if(st.pk[e.n]!==e.id)return false;
    const exp=t.attrs.filter(a=>a.fk).map(a=>a.n).sort().join();if(st.fk[e.n].slice().sort().join()!==exp)return false}
  for(const a of ex.assocs){const should=M.tables.some(t=>t.assoc&&t.from.includes(a.n));if(st.at[a.n]!==should)return false;
    if(should){const ids=a.links.map(l=>l[3]||entOf(ex,l[0]).id).sort().join();if([...st.atpk[a.n]].sort().join()!==ids)return false}}
  return true},
 lock(el,q){q._locked=true;el.querySelectorAll("#evB select, #evB input").forEach(x=>x.disabled=true)},
 good(q){const M=q._M;return `Les règles appliquées :<ol class="steps">${M.steps.map(s=>`<li><b>${esc(s.a.n)}</b> (${s.type}) : ${esc(s.rule)}</li>`).join("")}</ol>`}};
GEN.evalBDD=function(){const ex=pick(EXOS_BDD);return {id:"g-eval-"+ex.id,type:"eval",kind:"Exercice type évaluation",q:`${esc(ex.title)} : fais le MCD puis le schéma relationnel.`,ex,expl:`<div class="eyebrow">Correction rédigée</div><ol class="steps">${redaction(ex)}</ol><div class="eyebrow">Schéma relationnel</div><div class="mld">${mcdToMld(ex).tables.map(t=>`<div class="mldt">${mldText(t)}</div>`).join("")}</div><p class="hint">Méthode : une phrase par côté → cardinalité ; les deux maximums → type ; 1:n → #clé dans la table côté 1 ; n:n ou porteuse → nouvelle table.</p>`}};

/* ===================== Cours : figures MCD, GDF, versions modifiées ===================== */
const FIG={
 mere:{title:"Mères et enfants",h:110,entities:[{n:"MERE",id:"NumMere",props:["Nom_Mere","Prenom_Mere"],x:110,y:55},{n:"ENFANT",id:"NumEnfant",props:["Nom_Enfant","Prenom_Enfant"],x:520,y:55}],
  assocs:[{n:"Elever",x:315,y:55,links:[["MERE","0,n"],["ENFANT","1,1"]],ph:["Une mère élève aucun ou plusieurs enfants","Un enfant est élevé par une et une seule mère"]}]},
 commander:{title:"Clients et articles",h:110,entities:[{n:"CLIENT",id:"NumClient",props:["Nom","Prenom"],x:110,y:55},{n:"ARTICLE",id:"CodeArticle",props:["Designation","PrixUnitaire"],x:520,y:55}],
  assocs:[{n:"Commander",x:315,y:55,props:["Qte"],links:[["CLIENT","1,n"],["ARTICLE","0,n"]],ph:["Un client commande un ou plusieurs articles","Un article est commandé par aucun ou plusieurs clients"]}]},
 acheter:{title:"Camping : association ternaire",h:240,entities:[{n:"CLIENT",id:"NumClient",props:["Nom","Prenom","Ville"],x:110,y:60},{n:"ARTICLE",id:"CodeArticle",props:["Designation","PrixUnitaire"],x:520,y:60},{n:"DATE",id:"Date",props:[],x:315,y:200}],
  assocs:[{n:"Acheter",x:315,y:60,props:["Qte"],links:[["CLIENT","1,n"],["ARTICLE","1,n"],["DATE","1,n"]],ph:["Un client achète au moins une fois","Un article est acheté au moins une fois","Chaque jour il se vend au moins un article"]}]},
 diriger:{title:"Réflexive : diriger",h:150,entities:[{n:"EMPLOYE",id:"NumEmploye",props:["Nom","Prenom"],x:130,y:75}],
  assocs:[{n:"Diriger",x:470,y:75,links:[["EMPLOYE","0,n","chef",null,-38],["EMPLOYE","1,1","dirigé","NumEmploye_chef",38]],ph:["Un employé dirige zéro ou plusieurs employés","Un employé est dirigé par un et un seul autre employé"]}]},
 plurielle:{title:"Associations plurielles",h:190,entities:[{n:"PERSONNE",id:"NumPersonne",props:["Nom","Prenom"],x:110,y:90},{n:"LIVRE",id:"NumLivre",props:["Titre"],x:520,y:90}],
  assocs:[{n:"Ecrire",x:315,y:30,links:[["PERSONNE","0,n"],["LIVRE","1,n"]],ph:["Une personne écrit aucun ou plusieurs livres","Un livre est écrit par une ou plusieurs personnes"]},
   {n:"Emprunter",x:315,y:155,props:["DatePret"],links:[["PERSONNE","0,n"],["LIVRE","0,n"]],ph:["Une personne emprunte aucun ou plusieurs livres","Un livre est emprunté par aucune ou plusieurs personnes"]}]},
 cif:{title:"CIF",h:110,entities:[{n:"SALLE",id:"NumSalle",props:["Batiment"],x:110,y:55},{n:"ORDINATEUR",id:"NumOrdi",props:["Marque"],x:520,y:55}],
  assocs:[{n:"Contenir",x:315,y:55,links:[["SALLE","0,n"],["ORDINATEUR","1,1"]],ph:["Une salle contient zéro ou plusieurs ordinateurs","Un ordinateur est dans une et une seule salle"]}]},
 spec:{title:"Spécialisation",h:110,entities:[{n:"PERSONNE",id:"NumPersonne",props:["Nom","Prenom"],x:110,y:55},{n:"ABONNE",id:"NumAbonne",props:["DateAbonnement"],x:520,y:55}],
  assocs:[{n:"Etre",x:315,y:55,links:[["PERSONNE","0,1"],["ABONNE","1,1"]],ph:["Une personne est au plus un abonné (côté générique : 0,1)","Un abonné est exactement une personne (côté spécialisé : 1,1)"]}]},
 micro1:{title:"Micro et CD-ROM (0,1)-(1,1)",h:110,entities:[{n:"MICRO",id:"Num_Micro",props:["Marque_Micro"],x:110,y:55},{n:"CD_ROM",id:"Num_Cd",props:["Marque_Cd"],x:520,y:55}],
  assocs:[{n:"Equiper",x:315,y:55,links:[["MICRO","0,1"],["CD_ROM","1,1"]],ph:["Un micro est équipé de 0 ou 1 CD-ROM","Un CD-ROM équipe un et un seul micro"]}]},
 micro2:{title:"Micro et CD-ROM (0,1)-(0,1)",h:110,entities:[{n:"MICRO",id:"Num_Micro",props:["Marque_Micro"],x:110,y:55},{n:"CD_ROM",id:"Num_Cd",props:["Marque_Cd"],x:520,y:55}],
  assocs:[{n:"Equiper",x:315,y:55,links:[["MICRO","0,1"],["CD_ROM","0,1"]],ph:["Un micro est équipé de 0 ou 1 CD-ROM","Un CD-ROM équipe 0 ou 1 micro"]}]},
 auteur:{title:"Auteur et livre",h:110,entities:[{n:"AUTEUR",id:"Num_Auteur",props:["Nom_Auteur","Date_Naissance"],x:110,y:55},{n:"LIVRE",id:"Num_Livre",props:["Titre_Livre"],x:520,y:55}],
  assocs:[{n:"Ecrire",x:315,y:55,links:[["AUTEUR","1,n"],["LIVRE","1,1"]],ph:["Un auteur écrit un ou plusieurs livres","Un livre est écrit par un et un seul auteur"]}]},
 periph:{title:"Micro et périphériques",h:110,entities:[{n:"MICRO",id:"Num_Micro",props:["Marque_Micro"],x:110,y:55},{n:"PERIPHERIQUE",id:"Type_Periph",props:["Marque_Periph"],x:520,y:55}],
  assocs:[{n:"Equiper",x:315,y:55,links:[["MICRO","1,n"],["PERIPHERIQUE","1,n"]],ph:["Un micro est équipé d'un ou plusieurs types de périphériques","Un type de périphérique équipe un ou plusieurs micros"]}]},
 lignecde:{title:"Commande et produits",h:110,entities:[{n:"COMMANDE",id:"Num_Cde",props:["Date_Cde"],x:110,y:55},{n:"PRODUIT",id:"Num_Produit",props:["Nom_Produit"],x:520,y:55}],
  assocs:[{n:"Contenir",table:"LIGNE_CDE",x:315,y:55,props:["Qte_Cde"],links:[["COMMANDE","1,n"],["PRODUIT","0,n"]],ph:["Une commande contient un ou plusieurs produits","Un produit est dans aucune ou plusieurs commandes"]}]},
 chef:{title:"Salariés et chefs",h:150,entities:[{n:"SALARIE",id:"Matricule",props:["Nom","Fonction"],x:130,y:75}],
  assocs:[{n:"Encadrer",x:470,y:75,links:[["SALARIE","0,n","chef",null,-38],["SALARIE","0,1","subordonné","Matricule_chef",38]],ph:["Un salarié est chef de aucun ou plusieurs salariés","Un salarié a pour chef aucun ou un seul salarié"]}]},
 compo:{title:"Composition de pièces",h:150,entities:[{n:"PIECE",id:"Reference",props:["Libelle"],x:130,y:75}],
  assocs:[{n:"Composer",table:"COMPOSITION",x:470,y:75,props:["Nombre"],links:[["PIECE","0,n","composé","Ref_compose",-38],["PIECE","0,n","composant","Ref_composant",38]],ph:["Une pièce est composée de zéro ou plusieurs pièces","Une pièce entre dans la composition de zéro ou plusieurs pièces"]}]},
 appart:{title:"Appartement et parking",h:110,entities:[{n:"APPARTEMENT",id:"numAppartement",props:["superficie"],x:110,y:55},{n:"PLACE_PARKING",id:"numPlace",props:["Etage"],x:520,y:55}],
  assocs:[{n:"Avoir",x:315,y:55,links:[["APPARTEMENT","0,1"],["PLACE_PARKING","1,1"]],ph:["Un appartement a au plus une place de parking","Une place appartient à exactement un appartement"]}]},
 animer:{title:"Animateur et activité",h:110,entities:[{n:"ANIMATEUR",id:"numAnimateur",props:["nom"],x:110,y:55},{n:"ACTIVITE",id:"idActivite",props:["nomActivite"],x:520,y:55}],
  assocs:[{n:"Animer",x:315,y:55,links:[["ANIMATEUR","0,1"],["ACTIVITE","0,1"]],ph:["Un animateur anime au plus une activité","Une activité a au plus un animateur"]}]},
 adherent:{title:"Entité ADHERENT",h:120,entities:[{n:"ADHERENT",id:"NumAdherent",props:["NomAdh","PrenomAdh","VilleAdh","DateAdhesion"],x:150,y:60}],assocs:[]},
 engager:{title:"Écuries, pilotes, saisons",h:240,entities:[{n:"SAISON",id:"Id_Saison",props:[],x:110,y:60},{n:"ECURIE",id:"Num_Ecurie",props:["Nom_Ecurie"],x:520,y:60},{n:"PILOTE",id:"Num_Pilote",props:["Nom_Pilote"],x:315,y:200}],
  assocs:[{n:"Engager",x:315,y:60,props:["Salaire"],links:[["SAISON","1,n"],["ECURIE","1,n"],["PILOTE","1,n"]],ph:["Une saison voit un ou plusieurs engagements","Une écurie engage pour une ou plusieurs saisons","Un pilote est engagé une ou plusieurs fois"]}]}
};
function renderFig(el){const ex=FIG[el.dataset.fig];if(!ex)return;const sel=el._sel||null;const M=mcdToMld(ex);const st=sel&&M.steps.find(s=>s.a.n===sel);
  el.innerHTML=`<div class="fig-in">${mcdDiagram(ex,{fit:true,sel})}</div>${st?`<div class="verdict ok"><b>${esc(st.a.n)}</b> : ${st.a.links.map((l,i)=>`${st.a.ph&&st.a.ph[i]?"« "+esc(st.a.ph[i])+" » → ":""}<b>${l[1]}</b> côté ${l[0]}`).join(" ; ")}. Type <b>${st.type}</b>. ${esc(st.rule)}</div>`:!ex.assocs.length?"":`<p class="hint fig-hint">Clique sur l'ellipse « ${esc(ex.assocs[0].n)} » : lecture des cardinalités${el.dataset.mld?" et règle de passage au MLD":""}.</p>`}${el.dataset.mld?`<div class="mld">${M.tables.map(t=>`<div class="mldt ${sel&&t.from.includes(sel)?"on":""}">${mldText(t)}</div>`).join("")}</div>`:""}`;
  el.querySelectorAll("[data-a]").forEach(g=>{const f=()=>{el._sel=el._sel===g.dataset.a?null:g.dataset.a;renderFig(el)};g.onclick=f;g.onkeydown=e=>{if(e.key==="Enter")f()}})}
const GDF={camping:`<svg viewBox="0 0 600 330" class="gdfsvg" role="img" aria-label="Graphe des dépendances fonctionnelles du camping" style="width:100%;max-width:600px;height:auto">
<defs><marker id="gar" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path d="M0 0L10 5L0 10z" class="g-ah"/></marker></defs>
<g class="g-n"><rect x="10" y="40" width="120" height="34" rx="6"/><text x="70" y="62">NumClient</text></g>
<g class="g-n"><rect x="10" y="160" width="120" height="34" rx="6"/><text x="70" y="182">CodeArticle</text></g>
<g class="g-n"><rect x="10" y="270" width="120" height="34" rx="6"/><text x="70" y="292">Date</text></g>
<g class="g-grp"><rect x="300" y="8" width="160" height="104" rx="8"/><text x="380" y="30">Nom</text><text x="380" y="48">Prénom</text><text x="380" y="66">Adresse</text><text x="380" y="84">CodePostal</text><text x="380" y="102">Ville</text></g>
<g class="g-grp"><rect x="300" y="146" width="160" height="58" rx="8"/><text x="380" y="170">Désignation</text><text x="380" y="190">PrixUnitaire</text></g>
<g class="g-n"><rect x="470" y="250" width="100" height="34" rx="6"/><text x="520" y="272">Qté</text></g>
<line x1="130" y1="57" x2="298" y2="57" class="g-a"/><line x1="130" y1="177" x2="298" y2="177" class="g-a"/>
<line x1="110" y1="74" x2="352" y2="258" class="g-l"/><line x1="130" y1="190" x2="352" y2="262" class="g-l"/><line x1="130" y1="287" x2="352" y2="270" class="g-l"/>
<circle cx="360" cy="266" r="9" class="g-dot"/><line x1="369" y1="266" x2="468" y2="266" class="g-a"/>
<text x="360" y="300" class="g-s">nœud de la DF composée</text></svg>`};
let EDITS={};try{EDITS=JSON.parse(localStorage.getItem("r106-edits")||"{}")||{}}catch(e){EDITS={}}
const ORIG={};
function edTargets(){return [...document.querySelectorAll("article[data-doc]:not([data-noedit]),.fiche-host")]}
function edKey(el){return el.matches(".fiche-host")?"f-"+el.dataset.subj:"c-"+el.dataset.doc}
function paintFigs(root){root.querySelectorAll(".fig[data-fig]").forEach(el=>{try{renderFig(el)}catch(e){console.error(e)}});root.querySelectorAll(".gdf[data-gdf]").forEach(el=>el.innerHTML=GDF[el.dataset.gdf]||"")}
edTargets().forEach(el=>{const k=edKey(el);ORIG[k]=el.innerHTML;if(EDITS[k]&&typeof EDITS[k].html==="string")el.innerHTML=EDITS[k].html});
paintFigs(document);

/* Corrections : tous les exercices les uns sous les autres */
MODS.mcdcorrall=function(el){el.classList.remove("mod");el.innerHTML=EXOS_BDD.map((ex,i)=>`<h3 id="b3-${ex.id}">${esc(ex.title)}</h3><div class="mod" data-mod="mcdcorr" data-k="${i}"></div>`).join("");el.querySelectorAll(".mod[data-mod]").forEach(m=>MODS.mcdcorr(m))};
{const base=MODS.mcdcorr;MODS.mcdcorr=function(el){if(el.dataset.k==null)return base(el);const k=+el.dataset.k;let sel=null,hide=false;
  function draw(){const ex=EXOS_BDD[k];const M=mcdToMld(ex);const st=sel&&M.steps.find(s=>s.a.n===sel);
    el.innerHTML=`<div class="exo"><div class="eyebrow">${esc(ex.src)}</div>${ex.enonce.map(p=>`<p>${esc(p)}</p>`).join("")}${pdfLinks(ex)}</div>
    <div class="actions" style="justify-content:flex-start"><button type="button" class="pill ${hide?"active":""}" data-hide>${hide?"Afficher les cardinalités":"Cacher les cardinalités (pour t'entraîner)"}</button></div>
    <div class="eyebrow">1. MCD · clique sur une association</div>${mcdDiagram(ex,{sel,hide,tight:true})}
    ${st?`<div class="verdict ok"><b>${esc(st.a.n)}</b> · ${st.a.links.map((l,i)=>`« ${esc(st.a.ph?st.a.ph[i]:"")} » → <b>${l[1]}</b> à côté de ${l[0]}`).join(" ; ")}.<br>Maximums ${st.a.links.map(l=>cmax(l[1])).join(" et ")} → type <b>${st.type}</b>. ${esc(st.rule)}</div>`:`<p class="hint">Clique sur « ${esc(ex.assocs[0].n)} » pour voir la lecture des cardinalités et la règle appliquée.</p>`}
    <details class="corr-d" open><summary>2. Rédaction attendue (associations et cardinalités)</summary><ol class="steps">${redaction(ex)}</ol></details>
    <details class="corr-d" open><summary>3. Schéma relationnel (MLD)</summary><div class="mld">${M.tables.map(t=>`<div class="mldt ${sel&&t.from.includes(sel)?"on":""}">${mldText(t)}</div>`).join("")}</div><p class="hint">Clé primaire soulignée, clé étrangère précédée de #.</p>
    <div class="eyebrow">Clés étrangères à préciser</div><ul>${M.tables.flatMap(t=>t.attrs.filter(a=>a.fk).map(a=>`<li><span class="f">#${esc(a.n)}</span> dans ${esc(t.name)} référence la clé primaire de ${esc(a.ref)}.</li>`)).join("")}</ul></details>
    ${ex.df?`<details class="corr-d"><summary>Dépendances fonctionnelles (corrigé)</summary><ul>${ex.df.map(d=>`<li class="f" style="white-space:normal">${esc(d)}</li>`).join("")}</ul></details>`:""}
    ${ex.note?`<div class="box trap">${esc(ex.note)}</div>`:""}`;
    el.querySelector("[data-hide]").onclick=()=>{hide=!hide;draw()};
    el.querySelectorAll("[data-a]").forEach(g=>{const f=()=>{sel=sel===g.dataset.a?null:g.dataset.a;draw()};g.onclick=f;g.onkeydown=e=>{if(e.key==="Enter")f()}})}
  draw()}}


/* ===================== R1.07 : modules interactifs (puissances, inverse, transposée) ===================== */
function mxm(A,B){return A.map((r,i)=>B[0].map((_,j)=>r.reduce((s,x,k)=>s+x*B[k][j],0)))}
function mxt(A){return A[0].map((_,j)=>A.map(r=>r[j]))}
function mxs(x){return String(x).replace("-","−")}
function mxHTML(A,o={}){return `<span class="mx"><table>${A.map((r,i)=>`<tr>${r.map((x,j)=>`<td class="${o.hl&&o.hl(i,j)?"hl":""}" ${o.data?`data-i="${i}" data-j="${j}"`:""}>${mxs(x)}</td>`).join("")}</tr>`).join("")}</table></span>`}
function mxIn(A,key){return `<span class="mxin mxed"><span class="mxg" style="grid-template-columns:repeat(${A[0].length},auto)">${A.map((r,i)=>r.map((x,j)=>`<input type="number" inputmode="numeric" step="1" value="${x}" data-m="${key}" data-i="${i}" data-j="${j}" aria-label="${key} ligne ${i+1} colonne ${j+1}">`).join("")).join("")}</span></span>`}
function mxRead(el,key,A){el.querySelectorAll(`input[data-m="${key}"]`).forEach(inp=>{const v=parseInt(inp.value,10);A[+inp.dataset.i][+inp.dataset.j]=isNaN(v)?0:v});return A}
/* Puissances */
MODS.matpow=function(el){const P={"Triangulaire":[[1,1],[0,1]],"Diagonale":[[2,0],[0,3]],"Nilpotente":[[0,1],[0,0]],"Rotation":[[0,-1],[1,0]]};let A=P.Triangulaire.map(r=>r.slice()),n=3;
  el.innerHTML=modHead("Calculer A<sup>n</sup> pas à pas","Change les coefficients de A ou choisis un exemple, puis fais varier n : chaque puissance est le produit de la précédente par A.")+
  `<div class="presets">${Object.keys(P).map(k=>`<button type="button" class="pill" data-p="${k}">${k}</button>`).join("")}</div>
  <div class="mp"><span class="hint">A =</span>${mxIn(A,"A")}<label class="hint" style="display:flex;align-items:center;gap:8px">n = <input type="range" min="0" max="6" value="${n}" data-n style="width:140px"><b data-nv>${n}</b></label></div><div data-out></div>`;
  const out=el.querySelector("[data-out]");
  function draw(){mxRead(el,"A",A);const SUP="⁰¹²³⁴⁵⁶";let cur=[[1,0],[0,1]];const steps=[`<span class="f">A⁰ = I₂ =</span> ${mxHTML(cur)}`];
    for(let k=1;k<=n;k++){cur=mxm(cur,A);steps.push(`<span class="f">A${SUP[k]} = A${SUP[k-1]} × A =</span> ${mxHTML(cur)}`)}
    const zero=cur.every(r=>r.every(x=>x===0))&&n>0;
    out.innerHTML=`<div class="mpsteps">${steps.map(s=>`<div class="mp">${s}</div>`).join("")}</div>${zero?`<div class="verdict ko">A<sup>${n}</sup> = 0 alors que A ≠ 0 : c'est possible avec les matrices.</div>`:""}<p class="hint">Astuce devoir : calcule A², A³, devine la forme de A<sup>n</sup>, puis vérifie avec une valeur.</p>`}
  el.querySelectorAll("[data-p]").forEach(b=>b.onclick=()=>{A=P[b.dataset.p].map(r=>r.slice());el.querySelectorAll('input[data-m="A"]').forEach(i=>i.value=A[+i.dataset.i][+i.dataset.j]);draw()});
  el.querySelector("[data-n]").oninput=e=>{n=+e.target.value;el.querySelector("[data-nv]").textContent=n;draw()};
  el.addEventListener("input",e=>{if(e.target.matches('input[data-m]'))draw()});draw()};
/* Inverse */
MODS.matinv=function(el){const P={"Inversible":[[[2,1],[5,3]],[[3,-1],[-5,2]]],"Mauvais candidat":[[[2,1],[5,3]],[[3,1],[-5,2]]],"Pas inversible":[[[1,2],[2,4]],[[1,0],[0,1]]],"Diagonale":[[[2,0],[0,4]],[[1,0],[0,1]]]};let A=[[2,1],[5,3]],B=[[3,-1],[-5,2]],sel=null;
  el.innerHTML=modHead("B est-elle l'inverse de A ?","Tape A et une matrice B candidate. On calcule AB case par case : si AB = I<sub>2</sub>, alors B = A<sup>−1</sup>. Clique sur une case de AB pour voir son calcul.")+
  `<div class="presets">${Object.keys(P).map(k=>`<button type="button" class="pill" data-p="${k}">${k}</button>`).join("")}</div>
  <div class="mp"><span class="hint">A =</span>${mxIn(A,"A")}<span class="hint">B =</span>${mxIn(B,"B")}</div><div data-out></div>`;
  const out=el.querySelector("[data-out]");
  function draw(){mxRead(el,"A",A);mxRead(el,"B",B);const C=mxm(A,B);const isI=C[0][0]===1&&C[0][1]===0&&C[1][0]===0&&C[1][1]===1;const det=A[0][0]*A[1][1]-A[0][1]*A[1][0];
    let calc="";if(sel){const [i,j]=sel;calc=`<div class="cellwhy">c<sub>${i+1}${j+1}</sub> = ligne ${i+1} de A × colonne ${j+1} de B = ${mxs(A[i][0])}×${mxs(B[0][j])} + ${mxs(A[i][1])}×${mxs(B[1][j])} = <b>${mxs(C[i][j])}</b>${(i===j?1:0)===C[i][j]?" ✓":` (il faudrait ${i===j?1:0})`}</div>`}
    let why="";if(!isI&&det===0){why=`<div class="verdict ko"><b>A n'est pas inversible.</b> Avec B = ${mxHTML([["x","y"],["z","t"]])}, AB = I donne ${mxs(A[0][0])}x + ${mxs(A[0][1])}z = 1 et ${mxs(A[1][0])}x + ${mxs(A[1][1])}z = 0. Ces deux équations ont le même membre de gauche à un facteur près (les lignes de A sont proportionnelles) : le système est impossible, aucune B ne marche.</div>`}
    else if(!isI){const inv=det===1||det===-1?[[A[1][1]*det,-A[0][1]*det],[-A[1][0]*det,A[0][0]*det]]:null;why=`<div class="verdict ko"><b>Non</b> : AB ≠ I<sub>2</sub>, donc B n'est pas l'inverse de A.${inv?` L'inverse de A existe : essaie B = ${mxHTML(inv)}.`:" A est bien inversible, mais avec une autre B (coefficients non entiers)."}</div>`}
    else why=`<div class="verdict ok"><b>Oui</b> : AB = I<sub>2</sub>, donc A est inversible et A<sup>−1</sup> = B. Sur la copie : « AB = I<sub>2</sub> donc A est inversible et A<sup>−1</sup> = B ».</div>`;
    out.innerHTML=`<div class="mp"><span class="hint">AB =</span><span class="mx clickable">${mxHTML(C,{data:true,hl:(i,j)=>C[i][j]===(i===j?1:0)}).replace('<span class="mx">','').replace(/<\/span>$/,'')}</span><span class="hint">${isI?"= I<sub>2</sub>":"≠ I<sub>2</sub>"}</span></div>${calc}${why}`;
    out.querySelectorAll("td[data-i]").forEach(td=>{td.classList.add("pick");td.onclick=()=>{sel=[+td.dataset.i,+td.dataset.j];draw()}})}
  el.querySelectorAll("[data-p]").forEach(b=>b.onclick=()=>{[A,B]=P[b.dataset.p].map(m=>m.map(r=>r.slice()));["A","B"].forEach(k=>el.querySelectorAll(`input[data-m="${k}"]`).forEach(i=>i.value=(k==="A"?A:B)[+i.dataset.i][+i.dataset.j]));sel=null;draw()});
  el.addEventListener("input",e=>{if(e.target.matches('input[data-m]'))draw()});draw()};
/* Transposée et matrices particulières */
MODS.mattrans=function(el){const P={"(2, 3)":[[1,2,3],[4,5,6]],"Symétrique":[[1,7,0],[7,3,2],[0,2,5]],"Diagonale":[[2,0,0],[0,5,0],[0,0,-1]],"Triangulaire sup.":[[1,4,2],[0,3,5],[0,0,6]],"Identité":[[1,0,0],[0,1,0],[0,0,1]]};let A=P["(2, 3)"].map(r=>r.slice()),hov=null;
  el.innerHTML=modHead("Transposer et reconnaître une matrice","Choisis une matrice (ou change ses coefficients). Survole ou touche une ligne de A : elle devient la colonne de même numéro dans <sup>t</sup>A. Les étiquettes disent quelles propriétés A vérifie.")+
  `<div class="presets">${Object.keys(P).map(k=>`<button type="button" class="pill" data-p="${k}">${k}</button>`).join("")}</div><div data-in></div><div data-out></div>`;
  const inEl=el.querySelector("[data-in]"),out=el.querySelector("[data-out]");
  function drawIn(){inEl.innerHTML=`<div class="mp"><span class="hint">A =</span>${mxIn(A,"A")}</div>`}
  function draw(){mxRead(el,"A",A);const T=mxt(A),n=A.length,p=A[0].length,sq=n===p;
    const sym=sq&&A.every((r,i)=>r.every((x,j)=>x===A[j][i])),diag=sq&&A.every((r,i)=>r.every((x,j)=>i===j||x===0)),sup=sq&&A.every((r,i)=>r.every((x,j)=>j>=i||x===0)),inf=sq&&A.every((r,i)=>r.every((x,j)=>j<=i||x===0)),id=diag&&A.every((r,i)=>r[i]===1);
    const tags=[["carrée",sq],["symétrique (A = ᵗA)",sym],["diagonale",diag],["triangulaire supérieure",sup],["triangulaire inférieure",inf],["identité",id]];
    out.innerHTML=`<div class="mp"><span class="hint">A (${n}, ${p}) =</span><span class="mx"><table>${A.map((r,i)=>`<tr data-r="${i}" class="${hov===i?"sel":""}">${r.map(x=>`<td class="${hov===i?"hl":""}">${mxs(x)}</td>`).join("")}</tr>`).join("")}</table></span><span class="hint">→ ᵗA (${p}, ${n}) =</span>${mxHTML(T,{hl:(i,j)=>hov===j})}</div>
    <div class="presets">${tags.map(([l,v])=>`<span class="pill ${v?"active":""}" style="cursor:default">${v?"✓":"✗"} ${l}</span>`).join("")}</div>
    <p class="hint">${hov!==null?`Ligne ${hov+1} de A = (${A[hov].map(mxs).join(", ")}) → colonne ${hov+1} de ᵗA.`:"Survole une ligne de A."} ${sq&&!sym?"A + ᵗA est toujours symétrique : essaie de taper des coefficients égaux de part et d'autre de la diagonale.":""}</p>`;
    out.querySelectorAll("tr[data-r]").forEach(tr=>{const f=()=>{hov=+tr.dataset.r;draw()};tr.onmouseenter=f;tr.onclick=f})}
  el.querySelectorAll("[data-p]").forEach(b=>b.onclick=()=>{A=P[b.dataset.p].map(r=>r.slice());hov=null;drawIn();draw()});
  el.addEventListener("input",e=>{if(e.target.matches('input[data-m]'))draw()});drawIn();draw()};

/* ===================== Produit A × B : schéma en croix (A à gauche, B au-dessus) ===================== */

function fkArrows(gw,si,sj,p,TK){gw.querySelectorAll("svg.fk-svg").forEach(x=>x.remove());const W=gw.getBoundingClientRect();if(!W.width)return;
  const ns="http://www.w3.org/2000/svg";const svg=document.createElementNS(ns,"svg");svg.setAttribute("class","fk-svg");svg.setAttribute("width",gw.scrollWidth);svg.setAttribute("height",gw.scrollHeight);
  let defs="",paths="";
  for(let k=0;k<p;k++){const ca=gw.querySelector(`[data-a="${si}-${k}"]`),cb=gw.querySelector(`[data-b="${k}-${sj}"]`);if(!ca||!cb)continue;
    const ra=ca.getBoundingClientRect(),rb=cb.getBoundingClientRect(),ox=-W.left+gw.scrollLeft,oy=-W.top+gw.scrollTop;
    const x1=ra.left+ra.width/2+ox,y1=ra.top+oy-2,x2=rb.left+ox-5,y2=rb.top+rb.height/2+oy;const col=TK[k%3];
    defs+=`<marker id="fkm${k}" viewBox="0 0 10 10" refX="8" refY="5" markerWidth="7" markerHeight="7" orient="auto"><path d="M0 0L10 5L0 10z" fill="${col}"/></marker>`;
    paths+=`<path d="M${x1} ${y1} C ${x1} ${y1-70}, ${x2-70} ${y2}, ${x2} ${y2}" fill="none" stroke="${col}" stroke-width="2.5" stroke-linecap="round" marker-end="url(#fkm${k})"/>`}
  svg.innerHTML=`<defs>${defs}</defs>${paths}`;gw.appendChild(svg)}
MODS.falk=function(el){
  const P=el._mats?{"Cette question":el._mats}:{"M × N (inverse)":[[[1,1],[4,5]],[[5,-1],[-4,1]]],"A² = A × A":[[[2,-2],[0,1]],[[2,-2],[0,1]]],"A² nul":[[[-2,-2],[2,2]],[[-2,-2],[2,2]]],"(2, 3) × (3, 2)":[[[1,2,0],[-1,3,2]],[[2,1],[0,-1],[4,3]]]};
  const RC=["var(--c-r107)","var(--c-r102)","var(--c-r106)"],CC=["var(--c-r105)","var(--warn)","var(--bad)"],RN=["violet","orange","rose"],CN=["vert","jaune","rouge"];
  let key=Object.keys(P)[0],A,B,si=0,sj=0,shown=new Set();
  const load=k=>{key=k;[A,B]=P[k].map(m=>m.map(r=>r.slice()));si=0;sj=0;shown=new Set(["0,0"])};load(key);
  const f=x=>String(x).replace("-","−"),par=x=>x<0?`(${f(x)})`:f(x);
  function draw(){const n=A.length,p=A[0].length,q=B[0].length;const C=A.map(r=>B[0].map((_,j)=>r.reduce((s,x,k)=>s+x*B[k][j],0)));
    const rc=RC[si%3],cc=CC[sj%3];let g="";
    const cell=(r,c,html,st="",cls="")=>`<div class="fk ${cls}" style="grid-row:${r};grid-column:${c};${st}">${html}</div>`;
    g+=cell(1,p+1,`<span class="fk-lab">B</span>`,`grid-row:1/${p+1};align-self:center`,"fk-name");
    for(let k=0;k<p;k++)for(let j=0;j<q;j++){const on=j===sj;g+=cell(k+1,p+2+j,f(B[k][j]),on?`background:color-mix(in srgb,${CC[j%3]} 22%,var(--sheet));color:var(--ink);box-shadow:inset 0 0 0 2px ${CC[j%3]}`:"",`fk-b ${on?"on":""}" data-b="${k}-${j}`)}
    for(let i=0;i<n;i++)for(let k=0;k<p;k++){const on=i===si;g+=cell(p+2+i,1+k,f(A[i][k]),on?`background:color-mix(in srgb,${RC[i%3]} 22%,var(--sheet));color:var(--ink);box-shadow:inset 0 0 0 2px ${RC[i%3]}`:"",`fk-a ${on?"on":""}" data-a="${i}-${k}`)}
    g+=cell(p+1,1,`<span class="fk-lab">A</span>`,`grid-column:1/${p+1};justify-self:center`,"fk-name");
    g+=cell(p+2+si,p+1,"→",`color:${rc}`,"fk-arr");
    g+=cell(p+1,p+2+sj,"↓",`color:${cc}`,"fk-arr");
    for(let i=0;i<n;i++)for(let j=0;j<q;j++){const isSel=i===si&&j===sj,vis=shown.has(i+","+j);
      g+=cell(p+2+i,p+2+j,vis?f(C[i][j]):"?",isSel?`box-shadow:inset 3px 0 0 ${RC[i%3]},inset 0 3px 0 ${CC[j%3]},inset -3px 0 0 ${RC[i%3]},inset 0 -3px 0 ${CC[j%3]};font-weight:800`:"",`fk-c ${vis?"":"q"}" data-i="${i}" data-j="${j}" role="button" tabindex="0" aria-label="Case ligne ${i+1} colonne ${j+1}`)}
    const TK=["#e5484d","#30a46c","#3e63dd"];const terms=A[si].map((a,k)=>`<span class="fk-term" style="border-color:${TK[k%3]}"><span style="color:${rc};font-weight:700">${par(a)}</span>×<span style="color:${cc};font-weight:700">${par(B[k][sj])}</span></span>`).join(" + ");
    const prods=A[si].map((a,k)=>f(a*B[k][sj])).join(" + ").replace(/\+ −/g,"− ");
    const isId=n===q&&C.every((r,i)=>r.every((x,j)=>x===(i===j?1:0))),isZero=C.every(r=>r.every(x=>x===0));
    const gw=el.querySelector("[data-g]");gw.innerHTML=`<div class="fk-grid" style="grid-template-columns:repeat(${p},auto) 30px repeat(${q},auto);grid-template-rows:repeat(${p},auto) 26px repeat(${n},auto)">${g}</div>`;
    el.querySelector("[data-c]").innerHTML=`<div class="fk-calc"><div><b>Case ligne ${si+1}, colonne ${sj+1}</b> : la <span style="color:${rc};font-weight:700">ligne ${si+1} de A (${RN[si%3]})</span> part vers la droite →, la <span style="color:${cc};font-weight:700">colonne ${sj+1} de B (${CN[sj%3]})</span> descend ↓. Elles se croisent sur cette case.</div>
      <div class="fk-eq">c<sub>${si+1}${sj+1}</sub> = ${terms} = ${prods} = <b>${f(C[si][sj])}</b></div>
      <div class="hint">On multiplie le 1er de la ligne par le 1er de la colonne, le 2e par le 2e${p>2?", le 3e par le 3e":""}, puis on additionne.</div></div>
      ${shown.size===n*q?`<div class="verdict ${isId||!isZero?"ok":"ko"}">A × B = ${mxHTML(C)}${isId?" = I<sub>"+n+"</sub> : B est l'inverse de A.":isZero?" : la matrice nulle, alors que A et B ne sont pas nulles.":"."}</div>`:""}`;
    requestAnimationFrame(()=>fkArrows(gw,si,sj,p,TK));el.querySelectorAll(".fk-c").forEach(c=>{const go=()=>{si=+c.dataset.i;sj=+c.dataset.j;shown.add(si+","+sj);draw()};c.onclick=go;c.onkeydown=e=>{if(e.key==="Enter"||e.key===" "){e.preventDefault();go()}}});
    el.querySelectorAll("[data-p]").forEach(b=>b.classList.toggle("active",b.dataset.p===key))}
  el.innerHTML=(el._mats?`<div class="mod-h"><span class="mod-tag">Correction en croix</span><strong>Chaque case = une ligne × une colonne</strong></div><p class="mod-sub">Avance case par case avec les flèches, ou clique sur « Tout calculer ».</p>`:modHead("Le produit en croix : A à gauche, B au-dessus","La méthode à faire sur ta copie : écris B en haut à droite et A en bas à gauche. Chaque case de A × B est au croisement d'une ligne de A et d'une colonne de B. Clique sur une case « ? » ou avance case par case."))+
    `<div class="presets" ${el._mats?"hidden":""}>${Object.keys(P).map(k=>`<button type="button" class="pill" data-p="${k}">${k}</button>`).join("")}</div>
    <div class="fk-wrap" data-g></div><div data-c></div>
    <div class="actions" style="justify-content:flex-start"><button type="button" class="btn ghost" data-prev>← Case précédente</button><button type="button" class="btn" data-next>Case suivante →</button><button type="button" class="btn ghost" data-all>Tout calculer</button></div>`;
  el.querySelectorAll("[data-p]").forEach(b=>b.onclick=()=>{load(b.dataset.p);draw()});
  const step=d=>{const q=B[0].length,N=A.length*q;let idx=(si*q+sj+d+N)%N;si=Math.floor(idx/q);sj=idx%q;shown.add(si+","+sj);draw()};
  el.querySelector("[data-next]").onclick=()=>step(1);el.querySelector("[data-prev]").onclick=()=>step(-1);
  el.querySelector("[data-all]").onclick=()=>{A.forEach((_,i)=>B[0].forEach((_,j)=>shown.add(i+","+j)));draw()};
  let lastW=0;try{new ResizeObserver(()=>{const w=el.offsetWidth;if(w&&w!==lastW){lastW=w;draw()}}).observe(el)}catch(e){}
  draw()};

document.querySelectorAll(".mod[data-mod]").forEach(el=>{try{MODS[el.dataset.mod](el)}catch(e){console.error(e);el.innerHTML=`<div class="mod-err">Ce schéma n'a pas pu s'afficher.</div>`}});

/* ===================== Calculatrice ===================== */
function calcEval(src){
  const s=src.replace(/×/g,"*").replace(/÷/g,"/").replace(/−/g,"-").replace(/√/g,"sqrt").replace(/,/g,";").replace(/\s+/g,"");
  let i=0;const peek=()=>s[i];
  const fact=n=>{if(n<0||!Number.isInteger(n))throw new Error("n! demande un entier positif");if(n>170)throw new Error("n trop grand");let r=1;for(let k=2;k<=n;k++)r*=k;return r};
  const C=(n,p)=>{if(!Number.isInteger(n)||!Number.isInteger(p)||p<0||n<0)throw new Error("C(n, p) demande des entiers positifs");if(p>n)return 0;p=Math.min(p,n-p);let r=1;for(let k=1;k<=p;k++)r=r*(n-p+k)/k;return Math.round(r)};
  const A=(n,p)=>{if(!Number.isInteger(n)||!Number.isInteger(p)||p<0||n<0)throw new Error("A(n, p) demande des entiers positifs");if(p>n)return 0;let r=1;for(let k=0;k<p;k++)r*=n-k;return r};
  function num(){let m=s.slice(i).match(/^\d+(\.\d+)?/);if(m){i+=m[0].length;return parseFloat(m[0])}
    m=s.slice(i).match(/^(sqrt|C|A|ans)/i);if(m){const f=m[0].toLowerCase();i+=m[0].length;if(f==="ans")return calcEval.ans||0;
      if(peek()!=="(")throw new Error("Il manque une parenthèse après "+m[0]);i++;const a=expr();let b;if(peek()===";"){i++;b=expr()}if(peek()!==")")throw new Error("Il manque une parenthèse fermante");i++;
      if(f==="sqrt")return Math.sqrt(a);if(b===undefined)throw new Error(m[0]+"(n, p) demande deux nombres séparés par une virgule");return f==="c"?C(a,b):A(a,b)}
    if(peek()==="("){i++;const v=expr();if(peek()!==")")throw new Error("Il manque une parenthèse fermante");i++;return v}
    throw new Error(peek()?`« ${peek()} » mal placé`:"Expression incomplète")}
  function post(){let v=num();while(peek()==="!"){i++;v=fact(v)}return v}
  function pow(){const b=post();if(peek()==="^"){i++;return Math.pow(b,unary())}return b}
  function unary(){if(peek()==="-"){i++;return -unary()}if(peek()==="+"){i++;return unary()}return pow()}
  function term(){let v=unary();while(peek()==="*"||peek()==="/"||(peek()&&/[\d(sCAa√]/.test(peek()))){const o=peek();if(o==="*"||o==="/"){i++;const r=unary();if(o==="/"&&r===0)throw new Error("Division par 0");v=o==="*"?v*r:v/r}else v*=unary()}return v}
  function expr(){let v=term();while(peek()==="+"||peek()==="-"){const o=s[i++];const r=term();v=o==="+"?v+r:v-r}return v}
  if(!s)throw new Error("Tape un calcul");const v=expr();if(i<s.length)throw new Error(`« ${s[i]} » mal placé`);return v;
}
function calcFmt(v){if(!isFinite(v))return "∞";if(Math.abs(v)>=1e15)return v.toExponential(6).replace("e+"," × 10^");const r=Math.round(v*1e10)/1e10;return r.toLocaleString("fr-FR",{maximumFractionDigits:10})}
(function(){
  const btn=document.createElement("button");btn.type="button";btn.className="calc-fab";btn.textContent="Calculatrice";btn.setAttribute("aria-expanded","false");
  const pan=document.createElement("div");pan.className="calc";pan.hidden=true;pan.setAttribute("role","dialog");pan.setAttribute("aria-label","Calculatrice");
  const keys=[["C(n,p)","C(","parmi"],["A(n,p)","A(","arrangement"],["n!","!","factorielle"],["xʸ","^","puissance"],["√","√(",""],["(","(",""],[")",")",""],[",",",","séparateur"],
    ["7","7"],["8","8"],["9","9"],["÷","÷"],["4","4"],["5","5"],["6","6"],["×","×"],["1","1"],["2","2"],["3","3"],["−","−"],["0","0"],[".","."],["ans","ans"],["+","+"]];
  pan.innerHTML=`<div class="calc-top"><strong>Calculatrice</strong><button type="button" class="xbtn" data-close aria-label="Fermer">×</button></div>
  <input class="calc-in" id="calcIn" spellcheck="false" autocomplete="off" placeholder="ex. C(8,3) ou 10^4*26^2">
  <div class="calc-out" id="calcOut" aria-live="polite">&nbsp;</div>
  <div class="calc-keys">${keys.map(([l,v,t])=>`<button type="button" data-v="${v}" ${t?`title="${t}"`:""} class="${/[0-9.]/.test(v)&&v.length===1?"num":"fn"}">${l}</button>`).join("")}
  <button type="button" data-del class="fn">⌫</button><button type="button" data-clear class="fn">Effacer</button><button type="button" data-eq class="eq">=</button></div>
  <div class="calc-hist" id="calcHist"></div>
  <p class="hint">C(n,p) = « p parmi n » = n!/(p!(n−p)!) · A(n,p) = n!/(n−p)! · Entrée pour calculer.</p>`;
  document.body.append(btn,pan);
  const inp=pan.querySelector("#calcIn"),out=pan.querySelector("#calcOut"),hist=pan.querySelector("#calcHist");
  function live(){try{const v=calcEval(inp.value);out.textContent="= "+calcFmt(v);out.classList.remove("err")}catch(e){out.textContent=inp.value.trim()?e.message:" ";out.classList.add("err")}}
  function go(){try{const v=calcEval(inp.value);calcEval.ans=v;hist.insertAdjacentHTML("afterbegin",`<button type="button" class="calc-h" data-h="${esc(inp.value)}"><span>${esc(inp.value)}</span><b>= ${calcFmt(v)}</b></button>`);
      while(hist.children.length>6)hist.lastChild.remove();inp.value=String(Math.round(v*1e10)/1e10).replace(/e\+/,"e");live()}catch(e){live()}}
  inp.addEventListener("input",live);inp.addEventListener("keydown",e=>{if(e.key==="Enter"){e.preventDefault();e.stopPropagation();go()}if(e.key==="Escape")toggle(false)});
  pan.addEventListener("click",e=>{const b=e.target.closest("button");if(!b)return;
    if(b.dataset.close!==undefined)return toggle(false);
    if(b.dataset.h!==undefined){inp.value=b.dataset.h;live();return}
    if(b.dataset.eq!==undefined)return go();
    if(b.dataset.clear!==undefined){inp.value="";live();inp.focus();return}
    if(b.dataset.del!==undefined){inp.value=inp.value.slice(0,-1);live();inp.focus();return}
    if(b.dataset.v){const p=inp.selectionStart??inp.value.length,q=inp.selectionEnd??p;inp.value=inp.value.slice(0,p)+b.dataset.v+inp.value.slice(q);const np=p+b.dataset.v.length;inp.focus();inp.setSelectionRange(np,np);live()}});
  function toggle(on){pan.hidden=!on;btn.setAttribute("aria-expanded",String(on));btn.classList.toggle("on",on);if(on)inp.focus()}
  btn.onclick=()=>toggle(pan.hidden);
})();

/* ===================== Fiches : agrandir, surligner, fiche annexe ===================== */
const HLC={jaune:"#ffe86b",vert:"#9be7a6",rose:"#ffb3c7",bleu:"#a9d4ff"};
let HL=[];try{HL=JSON.parse(localStorage.getItem("r106-hl")||"[]")}catch(e){HL=[]}
let hlRef=null,hlT=null;
function hlSave(){try{localStorage.setItem("r106-hl",JSON.stringify(HL))}catch(e){}clearTimeout(hlT);hlT=setTimeout(()=>{if(hlRef)hlRef.set({items:HL,updatedAt:Date.now()}).catch(()=>{})},600)}
async function hlInitDb(){for(let k=0;k<40&&!(typeof db!=="undefined"&&db&&typeof uid!=="undefined"&&uid);k++)await new Promise(r=>setTimeout(r,500));
  if(typeof db==="undefined"||!db||!uid)return;hlRef=db.collection("data/users/"+uid).doc("highlights");
  try{hlRef.onSnapshot(d=>{if(d.exists&&Array.isArray(d.data().items)){const remote=d.data().items;const ids=new Set(remote.map(x=>x.id));HL=remote.concat(HL.filter(x=>!ids.has(x.id)&&x.at>Date.now()-5000));try{localStorage.setItem("r106-hl",JSON.stringify(HL))}catch(e){}hlRefresh()}else if(HL.length)hlSave()},()=>{})}catch(e){}}
function hnorm(s){return s.replace(/\s+/g," ").trim()}
function unwrapMarks(root){root.querySelectorAll("mark.uhl").forEach(m=>{const p=m.parentNode;while(m.firstChild)p.insertBefore(m.firstChild,m);p.removeChild(m);p.normalize()})}
function applyHL(root,subj){if(!root)return;unwrapMarks(root);
  for(const h of HL.filter(x=>x.subj===subj)){
    const tw=document.createTreeWalker(root,NodeFilter.SHOW_TEXT,{acceptNode:n=>n.parentNode.closest("svg,mark.uhl")?NodeFilter.FILTER_REJECT:NodeFilter.FILTER_ACCEPT});
    const map=[];let comb="";let n;let prevSpace=true;
    while((n=tw.nextNode())){const t=n.nodeValue;for(let i=0;i<t.length;i++){const sp=/\s/.test(t[i]);if(sp){if(prevSpace)continue;comb+=" ";prevSpace=true}else{comb+=t[i];prevSpace=false}map.push([n,i])}}
    const target=hnorm(h.text);if(target.length<2)continue;const idx=comb.indexOf(target);if(idx<0)continue;
    const segs=new Map();for(let k=idx;k<idx+target.length;k++){const [node,off]=map[k];const s=segs.get(node);if(s)s[1]=off+1;else segs.set(node,[off,off+1])}
    for(const [node,[a,b]] of [...segs.entries()].reverse()){const r=document.createRange();r.setStart(node,a);r.setEnd(node,b);const m=document.createElement("mark");m.className="uhl";m.style.setProperty("--hl",HLC[h.color]||HLC.jaune);m.dataset.hid=h.id;m.title="Surligné · clique pour retirer";try{r.surroundContents(m)}catch(e){}}
  }
}
function hlRefresh(){document.querySelectorAll(".fiche-host").forEach(h=>applyHL(h,h.dataset.subj));const fs=document.querySelector(".fs-body");if(fs)applyHL(fs,fs.dataset.subj);document.querySelectorAll(".annex").forEach(renderAnnex)}
function renderAnnex(el){const subj=el.dataset.subj;const items=HL.filter(x=>x.subj===subj);
  el.innerHTML=`<section class="pf annexpf ${subj}"><div class="pf-head"><div class="pf-code">${esc(subjCode(subj))}</div><div class="pf-title"><b>Ma fiche annexe</b><span>Ce que tu as surligné, rangé par partie. Ajoute une note à côté si tu veux.</span></div><div class="pf-exam">${items.length} élément${items.length>1?"s":""}</div></div>
  ${items.length?Object.entries(items.reduce((g,x)=>{(g[x.ctx||"Divers"]=g[x.ctx||"Divers"]||[]).push(x);return g},{})).map(([ctx,arr])=>`<div class="pf-blk"><h4>${esc(ctx)}</h4><ul class="annl">${arr.map(x=>`<li><span class="annt" style="--hl:${HLC[x.color]||HLC.jaune}">${esc(x.text)}</span><input class="annn" data-note="${x.id}" placeholder="+ ma note" value="${esc(x.note||"")}"><button type="button" class="annx" data-rm="${x.id}" aria-label="Retirer">×</button></li>`).join("")}</ul></div>`).join(""):`<p class="muted" style="margin:2mm 0">Rien pour l'instant. Sélectionne un passage de la fiche au-dessus avec la souris (ou le doigt), puis choisis une couleur : il apparaîtra ici.</p>`}
  <div class="pf-foot"><span>Révisions BUT1 · fiche annexe</span><span>${items.length?`<button type="button" class="linkbtn" data-clear="${subj}">Tout retirer</button>`:""}</span></div></section>`;
  el.querySelectorAll("[data-rm]").forEach(b=>b.onclick=()=>{HL=HL.filter(x=>x.id!==b.dataset.rm);hlSave();hlRefresh()});
  el.querySelectorAll("[data-note]").forEach(i=>i.onchange=()=>{const h=HL.find(x=>x.id===i.dataset.note);if(h){h.note=i.value.slice(0,300);hlSave()}});
  const c=el.querySelector("[data-clear]");if(c)c.onclick=()=>{if(c.dataset.ok!=="1"){c.dataset.ok="1";c.textContent="Confirmer : tout retirer";setTimeout(()=>{if(c.isConnected){c.dataset.ok="";c.textContent="Tout retirer"}},4000);return}HL=HL.filter(x=>x.subj!==subj);hlSave();hlRefresh()};
}
/* barre flottante de surlignage */
const hlBar=document.createElement("div");hlBar.className="hlbar";hlBar.hidden=true;
hlBar.innerHTML=`<span>Surligner</span>${Object.entries(HLC).map(([k,v])=>`<button type="button" data-c="${k}" style="background:${v}" aria-label="Surligner en ${k}"></button>`).join("")}`;
document.body.appendChild(hlBar);let hlPending=null;
function hostOf(node){const e=node&&(node.nodeType===1?node:node.parentElement);return e&&e.closest(".fiche-host,.fs-body")}
function onSel(){const s=getSelection();if(!s||s.isCollapsed||s.rangeCount===0){hlBar.hidden=true;return}
  const host=hostOf(s.anchorNode);const t=s.toString();if(!host||host!==hostOf(s.focusNode)||hnorm(t).length<2){hlBar.hidden=true;return}
  const r=s.getRangeAt(0).getBoundingClientRect();const blk=(s.anchorNode.nodeType===1?s.anchorNode:s.anchorNode.parentElement).closest(".pf-blk");const pg=(s.anchorNode.nodeType===1?s.anchorNode:s.anchorNode.parentElement).closest(".pf");
  hlPending={text:hnorm(t).slice(0,600),subj:host.dataset.subj,ctx:blk?hnorm(blk.querySelector("h4")?.textContent||"").replace(/^[0-9!✓✎]\s*/,""):(pg?hnorm(pg.querySelector(".pf-title b")?.textContent||""):"")};
  hlBar.hidden=false;const bw=hlBar.offsetWidth||200;hlBar.style.left=Math.max(8,Math.min(innerWidth-bw-8,r.left+r.width/2-bw/2))+"px";hlBar.style.top=Math.max(8,r.top-48)+"px"}
document.addEventListener("mouseup",()=>setTimeout(onSel,10));document.addEventListener("touchend",()=>setTimeout(onSel,250));document.addEventListener("keyup",e=>{if(e.shiftKey)onSel()});
document.addEventListener("scroll",()=>{hlBar.hidden=true},true);
hlBar.addEventListener("mousedown",e=>e.preventDefault());
hlBar.querySelectorAll("[data-c]").forEach(b=>b.onclick=()=>{if(!hlPending)return;HL.push({id:"h"+Date.now().toString(36)+Math.random().toString(36).slice(2,6),...hlPending,color:b.dataset.c,at:Date.now()});hlPending=null;hlBar.hidden=true;getSelection().removeAllRanges();hlSave();hlRefresh();if(typeof toast==="function")toast("Ajouté à ta fiche annexe")});
document.addEventListener("click",e=>{const m=e.target.closest("mark.uhl");if(!m||getSelection().toString())return;if(m.dataset.confirm!=="1"){m.dataset.confirm="1";m.classList.add("ask");m.title="Clique encore pour retirer";setTimeout(()=>{m.dataset.confirm="";m.classList.remove("ask")},2500);return}HL=HL.filter(x=>x.id!==m.dataset.hid);hlSave();hlRefresh()});
/* plein écran avec zoom */
function openFs(subj){const src=document.querySelector(`.fiche-host[data-subj="${subj}"]`);if(!src)return;let z=1.25;
  const ov=document.createElement("div");ov.className="fs-ov";ov.setAttribute("role","dialog");ov.setAttribute("aria-label","Fiche en grand");
  ov.innerHTML=`<div class="fs-bar"><b>${esc(subjCode(subj))} · fiche en grand</b><span class="fs-z"><button type="button" data-z="-">−</button><output>125 %</output><button type="button" data-z="+">+</button><button type="button" data-z="w">Largeur écran</button></span><button type="button" class="btn" data-close>Fermer</button></div><div class="fs-scroll"><div class="fs-body" data-subj="${subj}"></div></div>`;
  document.body.appendChild(ov);document.body.style.overflow="hidden";const body=ov.querySelector(".fs-body");body.innerHTML=src.innerHTML;unwrapMarks(body);applyHL(body,subj);
  const out=ov.querySelector("output");const setZ=v=>{z=Math.max(.6,Math.min(3,v));body.style.zoom=z;out.textContent=Math.round(z*100)+" %"};setZ(z);
  ov.querySelectorAll("[data-z]").forEach(b=>b.onclick=()=>{const k=b.dataset.z;if(k==="+")setZ(z+.15);else if(k==="-")setZ(z-.15);else setZ((ov.querySelector(".fs-scroll").clientWidth-24)/body.querySelector(".pf").offsetWidth)});
  const close=()=>{ov.remove();document.body.style.overflow="";hlBar.hidden=true;hlRefresh()};ov.querySelector("[data-close]").onclick=close;
  ov.addEventListener("keydown",e=>{if(e.key==="Escape")close()});ov.tabIndex=-1;ov.focus();
}
document.addEventListener("click",e=>{const b=e.target.closest("[data-fs]");if(b)openFs(b.dataset.fs)});
hlRefresh();hlInitDb();

/* ===================== Cours façon documentation : sommaire, modifier, imprimer ===================== */
function mountMods(root){root.querySelectorAll(".mod[data-mod]").forEach(el=>{if(el.childElementCount)return;try{MODS[el.dataset.mod](el)}catch(e){console.error(e);el.innerHTML=`<div class="mod-err">Ce schéma n'a pas pu s'afficher.</div>`}})}
function tocOf(art){const d=art.closest(".doc");return d&&d.querySelector(".doc-toc")}
function docify(art){if(!art.closest(".doc")){const w=document.createElement("div");w.className="doc";art.parentNode.insertBefore(w,art);const t=document.createElement("nav");t.className="doc-toc";t.setAttribute("aria-label","Sommaire");w.append(t,art)}buildToc(art)}
function numberHeads(art){art.querySelectorAll("h3").forEach(h=>{if(h.querySelector(".hn"))return;const f=h.firstChild;if(f&&f.nodeType===3){const m=/^\s*(\d+)\.\s*/.exec(f.nodeValue);if(m){f.nodeValue=f.nodeValue.slice(m[0].length);const sp=document.createElement("span");sp.className="hn";sp.setAttribute("contenteditable","false");sp.textContent=m[1];h.prepend(sp)}}})}
function headLabel(h){return [...h.childNodes].filter(n=>!(n.nodeType===1&&n.classList.contains("hn"))).map(n=>n.textContent).join("").replace(/^\s*\d+\.\s*/,"").trim()}
function buildToc(art){const t=tocOf(art);if(!t)return;numberHeads(art);const hs=[...art.querySelectorAll("h3")];hs.forEach((h,i)=>{if(!h.id)h.id=(art.dataset.doc||"d")+"-s"+i});
  const title=(art.querySelector("h2")||{}).textContent||"";const wasOpen=t.querySelector("details")?t.querySelector("details").open:innerWidth>900;
  t.innerHTML=`<details class="toc-d" ${wasOpen?"open":""}><summary><span>Sommaire</span><small>${hs.length} parties</small></summary><div class="toc-t">${esc(title.replace(/^R1\.\d+\s*·\s*/,""))}</div><div class="toc-prog" aria-hidden="true"><i></i></div><ol>${hs.map(h=>`<li><a href="#${h.id}" data-to="${h.id}">${esc(headLabel(h))}</a></li>`).join("")}</ol></details>`;
  t.querySelectorAll("[data-to]").forEach(a=>a.onclick=e=>{e.preventDefault();const h=document.getElementById(a.dataset.to);if(h){h.scrollIntoView({behavior:"smooth",block:"start"});if(innerWidth<=900)t.querySelector("details").open=false}});spy()}
let spyRaf=0;function spy(){const p=document.querySelector("[role=tabpanel]:not([hidden]) .doc");if(!p)return;const art=p.querySelector("article");const hs=[...art.querySelectorAll("h3")];let cur=null;for(const h of hs){if(h.getBoundingClientRect().top<140)cur=h;else break}
  p.querySelectorAll(".doc-toc a").forEach(a=>{const on=!!cur&&a.dataset.to===cur.id;a.classList.toggle("on",on);a.toggleAttribute("aria-current",on)});
  const r=art.getBoundingClientRect();const pr=Math.max(0,Math.min(1,(innerHeight*.4-r.top)/Math.max(1,r.height-innerHeight*.5)));const bar=p.querySelector(".toc-prog i");if(bar)bar.style.width=Math.round(pr*100)+"%"}
addEventListener("scroll",()=>{if(spyRaf)return;spyRaf=requestAnimationFrame(()=>{spyRaf=0;spy()})},{passive:true});
document.addEventListener("click",e=>{if(e.target.closest("#tabsnav button"))setTimeout(spy,30)});

/* Barre d'outils des cours et des fiches */
function isEdited(k){return !!(EDITS[k]&&typeof EDITS[k].html==="string")}
function addDocTools(art){art.querySelectorAll(":scope > .doc-tools").forEach(x=>x.remove());const k=edKey(art);const d=document.createElement("div");d.className="doc-tools";d.setAttribute("contenteditable","false");
  d.innerHTML=`<button type="button" class="tbtn" data-ed>✎ Modifier le cours</button><button type="button" class="tbtn" data-pr>⎙ Imprimer</button>${isEdited(k)?`<span class="edited">Ta version modifiée · <button type="button" class="linkbtn" data-orig>revenir à l'original</button></span>`:""}`;
  const h2=art.querySelector("h2");if(h2&&h2.nextElementSibling)h2.nextElementSibling.after(d);else art.prepend(d);
  d.querySelector("[data-ed]").onclick=()=>startEdit(art);d.querySelector("[data-pr]").onclick=()=>printEl(art,"cours");
  const o=d.querySelector("[data-orig]");if(o)o.onclick=()=>restoreOrig(art,o)}
function addFicheTools(host){const ft=host.parentElement.querySelector(".ftools");if(!ft)return;ft.querySelectorAll(".xt").forEach(x=>x.remove());const k=edKey(host);
  ft.insertAdjacentHTML("afterbegin",`<button type="button" class="btn ghost xt" data-fed>✎ Modifier la fiche</button><button type="button" class="btn ghost xt" data-fpr>⎙ Imprimer</button><button type="button" class="btn ghost xt" data-fnew>+ Créer ma fiche</button>`);
  if(isEdited(k))ft.insertAdjacentHTML("beforeend",`<span class="edited xt">Ta version modifiée · <button type="button" class="linkbtn" data-forig>revenir à l'original</button></span>`);
  ft.querySelector("[data-fed]").onclick=()=>startEdit(host);ft.querySelector("[data-fpr]").onclick=()=>printEl(host,"fiche");
  ft.querySelector("[data-fnew]").onclick=()=>newMyFiche(host.dataset.subj);const o=ft.querySelector("[data-forig]");if(o)o.onclick=()=>restoreOrig(host,o)}
function cleanHTML(el){const c=el.cloneNode(true);c.querySelectorAll(".doc-tools").forEach(x=>x.remove());unwrapMarks(c);
  c.querySelectorAll(".mod[data-mod]").forEach(m=>m.innerHTML="");c.querySelectorAll(".fig,.gdf").forEach(m=>{m.innerHTML="";delete m._sel});
  c.querySelectorAll("h3 > .hn").forEach(x=>x.replaceWith(x.textContent+". "));c.querySelectorAll("[contenteditable]").forEach(x=>x.removeAttribute("contenteditable"));c.removeAttribute("contenteditable");return c.innerHTML.trim()}
function renderHost(el,html){el.innerHTML=html;paintFigs(el);mountMods(el);if(el.matches("article[data-doc]")){addDocTools(el);buildToc(el)}else if(el.matches(".fiche-host"))addFicheTools(el);if(typeof hlRefresh==="function")hlRefresh()}
function restoreOrig(el,btn){if(btn.dataset.ok!=="1"){btn.dataset.ok="1";btn.textContent="confirmer : tout remettre comme avant";setTimeout(()=>{if(btn.isConnected){btn.dataset.ok="";btn.textContent="revenir à l'original"}},4000);return}
  const k=edKey(el);delete EDITS[k];saveEdits(k,null);renderHost(el,ORIG[k]);toast("Version d'origine remise")}
let edRefs={};function edRef(k){return db&&uid?db.collection("data/users/"+uid).doc("edit-"+k):null}
function saveEdits(k,val){try{localStorage.setItem("r106-edits",JSON.stringify(EDITS))}catch(e){}const r=edRef(k);if(!r)return;(val?r.set(val):r.delete()).catch(()=>{})}

/* Éditeur (cours, fiches, fiches perso) */
let ED=null;
const edBar=document.createElement("div");edBar.className="edbar";edBar.hidden=true;edBar.setAttribute("role","toolbar");edBar.setAttribute("aria-label","Mise en forme");document.body.appendChild(edBar);
edBar.addEventListener("mousedown",e=>{if(e.target.closest("button"))e.preventDefault()});
function edButtons(pf){const b=[["bold","<b>G</b>","Gras"],["italic","<i>I</i>","Italique"],["hl","<span class='sw-hl'>Stabilo</span>","Surligner"],["title","Titre","Titre"],["ul","• Liste","Liste à puces"]];
  return b.concat(pf?[["blk","+ Bloc","Nouveau bloc"],["blkc","+ Bloc couleur","Bloc coloré"],["trap","+ Piège","Bloc piège"],["exb","+ Exemple","Bloc exemple"],["tbl","+ Tableau","Tableau"],["page","+ Page","Nouvelle page A4"]]:[["box","+ À retenir","Encadré"],["trap","+ Piège","Encadré piège"],["meth","+ Méthode","Encadré méthode"],["tbl","+ Tableau","Tableau"]]).concat([["undo","↶","Annuler la dernière action"],["redo","↷","Rétablir"]])}
function startEdit(el,opts={}){if(ED)finishEdit(false);unwrapMarks(el);const pf=!!el.querySelector(".pf")||opts.pf;
  ED={el,opts,pf,before:el.innerHTML};el.querySelectorAll(".mod,.fig,.gdf,svg,.doc-tools,.pdfl,.annex,.ftools").forEach(x=>x.setAttribute("contenteditable","false"));
  el.setAttribute("contenteditable","true");el.classList.add("editing");el.setAttribute("spellcheck","true");
  try{document.execCommand("styleWithCSS",false,false)}catch(e){}
  edBar.innerHTML=`<div class="edb-g">${edButtons(pf).map(([c,l,t])=>`<button type="button" data-ec="${c}" title="${t}" aria-label="${t}">${l}</button>`).join("")}</div><div class="edb-g edb-s"><span class="hint">Tu écris directement dans la page</span><button type="button" class="btn ghost" data-es="0">Annuler</button><button type="button" class="btn" data-es="1">Enregistrer</button></div>`;
  edBar.hidden=false;document.body.classList.add("is-editing");
  edBar.querySelectorAll("[data-ec]").forEach(b=>b.onclick=()=>edCmd(b.dataset.ec));edBar.querySelectorAll("[data-es]").forEach(b=>b.onclick=()=>finishEdit(b.dataset.es==="1"));
  const first=el.querySelector(pf?".pf-title b, .pf-blk p":"p, li");if(first){const r=document.createRange();r.selectNodeContents(first);r.collapse(false);const s=getSelection();s.removeAllRanges();s.addRange(r)}el.focus({preventScroll:true});
  toast(opts.toast||"Mode édition : clique dans le texte pour écrire")}
function edInside(){const s=getSelection();if(!ED||!s.rangeCount)return false;const n=s.anchorNode;return !!n&&ED.el.contains(n)}
function edAnchorBlock(sel){const s=getSelection();if(!s.rangeCount)return null;let n=s.anchorNode;n=n&&(n.nodeType===1?n:n.parentElement);return n&&n.closest(sel)}
function edInsert(html,afterSel){if(!edInside()){const last=ED.el.querySelector(afterSel||"article > :last-child, .pf-col:last-of-type")||ED.el;last.insertAdjacentHTML(afterSel?"afterend":"beforeend",html);return}
  if(afterSel){const b=edAnchorBlock(afterSel);if(b&&ED.el.contains(b)){b.insertAdjacentHTML("afterend",html);return}}
  document.execCommand("insertHTML",false,html)}
function edCmd(c){if(!ED)return;const pf=ED.pf;const selTxt=esc(getSelection().toString())||"";
  if(c==="bold")document.execCommand("bold");else if(c==="italic")document.execCommand("italic");
  else if(c==="hl"){try{document.execCommand("hiliteColor",false,"#ffe86b")}catch(e){document.execCommand("backColor",false,"#ffe86b")}}
  else if(c==="title"){const b=edAnchorBlock(pf?"h4":"h3");if(b)document.execCommand("formatBlock",false,"p");else if(pf)edInsert(`<h4><i>✎</i>${selTxt||"Titre"}</h4>`,null);else document.execCommand("formatBlock",false,"h3")}
  else if(c==="ul")document.execCommand("insertUnorderedList");
  else if(c==="undo")document.execCommand("undo");else if(c==="redo")document.execCommand("redo");
  else if(c==="box")edInsert(`<div class="box def">${selTxt||"À retenir : …"}</div>`,".box, p, ul, ol, table, .tscroll");
  else if(c==="meth")edInsert(`<div class="box method">${selTxt||"Méthode : …"}</div>`,".box, p, ul, ol, table, .tscroll");
  else if(c==="trap")edInsert(pf?`<div class="pf-blk trap"><h4><i>!</i>Piège</h4><p>${selTxt||"…"}</p></div>`:`<div class="box trap">${selTxt||"Attention : …"}</div>`,pf?".pf-blk":".box, p, ul, ol, table, .tscroll");
  else if(c==="blk")edInsert(`<div class="pf-blk"><h4><i>✎</i>Titre du bloc</h4><p>${selTxt||"Écris ici…"}</p></div>`,".pf-blk");
  else if(c==="blkc")edInsert(`<div class="pf-blk tint"><h4><i>★</i>À retenir</h4><p>${selTxt||"…"}</p></div>`,".pf-blk");
  else if(c==="exb")edInsert(`<div class="pf-blk pfex"><h4><i>✓</i>Exemple</h4><p>${selTxt||"…"}</p></div>`,".pf-blk");
  else if(c==="tbl"){const t=`<table${pf?"":` class="tt" style="font-family:var(--f-body)"`}><tr><th>Colonne 1</th><th>Colonne 2</th></tr><tr><td>…</td><td>…</td></tr><tr><td>…</td><td>…</td></tr></table>`;edInsert(pf?t:`<div class="tscroll">${t}</div>`,pf?".pf-blk":".box, p, ul, ol, .tscroll")}
  else if(c==="page"){const wrap=ED.el.querySelector(".pfwrap")||ED.el;const subj=ED.el.dataset.subj||SUBJ;wrap.insertAdjacentHTML("beforeend",pfBlank(subj,"Suite"));wrap.lastElementChild.scrollIntoView({behavior:"smooth"})}}
function finishEdit(save){if(!ED)return;const {el,opts,before}=ED;ED=null;edBar.hidden=true;document.body.classList.remove("is-editing");el.removeAttribute("contenteditable");el.classList.remove("editing");
  if(save){const html=cleanHTML(el);if(opts.onSave)opts.onSave(html);else{const k=edKey(el);EDITS[k]={html,at:Date.now()};saveEdits(k,EDITS[k]);renderHost(el,html)}toast("Enregistré")}
  else{if(opts.onCancel)opts.onCancel();else{const k=edKey(el);renderHost(el,isEdited(k)?EDITS[k].html:ORIG[k])}}}
addEventListener("keydown",e=>{if(!ED)return;if(e.key==="Escape"){finishEdit(false)}else if((e.ctrlKey||e.metaKey)&&e.key.toLowerCase()==="s"){e.preventDefault();finishEdit(true)}});

/* Mes fiches perso */
let MYF=[];try{MYF=JSON.parse(localStorage.getItem("r106-myf")||"[]");if(!Array.isArray(MYF))MYF=[]}catch(e){MYF=[]}
let myfRef=null;
function pfBlank(subj,title){const code=subjCode(subj);return `<section class="pf ${subj}"><div class="pf-head"><div class="pf-code">${esc(code)}</div><div class="pf-title"><b>${esc(title||"Ma fiche")}</b><span>Ma fiche de révision</span></div><div class="pf-exam">${new Date().toLocaleDateString("fr-FR")}</div></div>
<div class="pf-cols"><div class="pf-col"><div class="pf-blk"><h4><i>1</i>Titre du bloc</h4><p>Écris ici. Utilise les boutons en bas pour ajouter des blocs, un tableau ou un piège.</p></div></div><div class="pf-col"><div class="pf-blk tint"><h4><i>2</i>À retenir</h4><p>…</p></div></div></div>
<div class="pf-foot"><span>Révisions BUT1 · ma fiche</span><span></span></div></section>`}
function saveMyf(){try{localStorage.setItem("r106-myf",JSON.stringify(MYF))}catch(e){}if(myfRef)myfRef.set({items:MYF,updatedAt:Date.now()}).catch(()=>{})}
function newMyFiche(subj){const it={id:"m"+Date.now().toString(36),subj,title:"Ma fiche",html:`<div class="pfwrap">${pfBlank(subj)}</div>`,at:Date.now()};MYF.push(it);saveMyf();renderMyfAll();
  const host=document.querySelector(`.myf-host[data-myf="${it.id}"]`);if(host)editMyf(it.id)}
function editMyf(id){const it=MYF.find(x=>x.id===id);const host=document.querySelector(`.myf-host[data-myf="${id}"]`);if(!it||!host)return;
  startEdit(host,{pf:true,toast:"Écris ta fiche : clique sur un texte pour le remplacer",onSave(html){it.html=html;it.at=Date.now();const t=host.querySelector(".pf-title b");it.title=t?t.textContent.trim().slice(0,80)||"Ma fiche":"Ma fiche";saveMyf();renderMyfAll()},onCancel(){renderMyfAll()}});setTimeout(()=>{const r=host.getBoundingClientRect();scrollTo(0,scrollY+r.top-70)},60)}
function renderMyf(c){const subj=c.dataset.subj;const items=MYF.filter(x=>x.subj===subj);
  c.innerHTML=`${items.map(x=>`<div class="myf-item"><div class="ftools"><b class="myf-name">${esc(x.title||"Ma fiche")}</b><button type="button" class="btn ghost" data-me="${x.id}">✎ Modifier</button><button type="button" class="btn ghost" data-mp="${x.id}">⎙ Imprimer</button><button type="button" class="btn ghost" data-md="${x.id}">Supprimer</button></div><div class="myf-host" data-subj="${subj}" data-myf="${x.id}">${x.html}</div></div>`).join("")}
  <button type="button" class="newfiche" data-mn="${subj}"><b>+ Créer une nouvelle fiche</b><span>Une page A4 vierge au même style, que tu remplis toi-même. Elle est enregistrée sur ton compte.</span></button>`;
  c.querySelectorAll("[data-me]").forEach(b=>b.onclick=()=>editMyf(b.dataset.me));
  c.querySelectorAll("[data-mp]").forEach(b=>b.onclick=()=>{const h=c.querySelector(`.myf-host[data-myf="${b.dataset.mp}"]`);printEl(h,"fiche",(MYF.find(x=>x.id===b.dataset.mp)||{}).title)});
  c.querySelectorAll("[data-md]").forEach(b=>b.onclick=()=>{if(b.dataset.ok!=="1"){b.dataset.ok="1";b.textContent="Confirmer la suppression";b.className="btn danger";setTimeout(()=>{if(b.isConnected){b.dataset.ok="";b.textContent="Supprimer";b.className="btn ghost"}},4000);return}MYF=MYF.filter(x=>x.id!==b.dataset.md);saveMyf();renderMyfAll()});
  c.querySelector("[data-mn]").onclick=()=>newMyFiche(subj)}
function renderMyfAll(){if(ED&&ED.el.closest(".myf"))return;document.querySelectorAll(".myf[data-subj]").forEach(renderMyf)}
document.querySelectorAll(".annex[data-subj]").forEach(a=>a.insertAdjacentHTML("afterend",`<div class="section-title">Mes fiches perso</div><div class="myf" data-subj="${a.dataset.subj}"></div>`));
{const fx=document.querySelector("#tab-fx");if(fx&&!fx.querySelector(".myf"))fx.insertAdjacentHTML("beforeend",`<div class="section-title">Mes fiches perso</div><div class="myf" data-subj="r106"></div>`)}

/* Impression : un fichier HTML prêt à imprimer (ou à enregistrer en PDF) */
let DLNS;function dlns(){if(DLNS===undefined)DLNS=window.claude&&claude.use?claude.use("downloads").catch(()=>null):Promise.resolve(null);return DLNS}
function subjCode(s){return (SUBJECTS[s]||SUBJECTS[String(s).slice(0,4)]||{}).code||""}
async function printEl(el,mode,title){const S=SUBJECTS[el.dataset.subj||SUBJ]||SUBJECTS[String(el.dataset.subj).slice(0,4)]||{};
  const t=title||(mode==="fiche"?`${S.code||""} fiche de révision`:((el.querySelector("h2")||{}).textContent||"Cours"));
  const c=el.cloneNode(true);c.querySelectorAll(".doc-tools,.mod,.fig-hint,.ftools").forEach(x=>x.remove());unwrapMarks(c);c.querySelectorAll("[contenteditable]").forEach(x=>x.removeAttribute("contenteditable"));
  c.querySelectorAll("details").forEach(d=>d.setAttribute("open",""));
  const css=[...document.querySelectorAll("style")].map(s=>s.textContent).join("\n");
  const pcss=mode==="fiche"?`body{background:#e9e9e7;margin:0;padding:16px}.pfwrap{gap:16px}@media print{body{background:#fff;padding:0}.pfwrap{gap:0}}`
   :`body{background:#fff;color:#111;max-width:860px;margin:0 auto;padding:16px}.sheet{border:0;padding:0;background:#fff}h3{break-after:avoid}.box,table,.fig,.mldt,svg{break-inside:avoid}@page{size:A4;margin:14mm}@media print{body{padding:0;font-size:13px}}`;
  const doc=`<!doctype html><html lang="fr" data-theme="light"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>${esc(t)}</title><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Patrick+Hand&family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono:wght@400;600&display=swap"><style>${css}
${pcss}.pbar{position:sticky;top:0;z-index:9;display:flex;gap:12px;align-items:center;justify-content:center;flex-wrap:wrap;padding:10px;background:#111;color:#fff;font:600 15px sans-serif;margin:-16px -16px 16px}.pbar button{font:700 15px sans-serif;padding:8px 16px;border-radius:8px;border:0;cursor:pointer;background:#fff;color:#111}@media print{.pbar{display:none!important}}</style></head>
<body><div class="pbar"><span>${esc(t)}</span><button type="button" onclick="print()">Imprimer ou enregistrer en PDF</button></div>${mode==="fiche"?c.innerHTML:`<article class="sheet fiche">${c.innerHTML}</article>`}<script>addEventListener("load",function(){setTimeout(function(){print()},900)})<\/script></body></html>`;
  const name=t.replace(/[\\/:*?"<>|]+/g," ").replace(/\s+/g," ").trim().slice(0,80)+".html";
  const dl=await dlns();
  if(dl){try{await dl.save({filename:name,data:doc});toast("Fichier enregistré : ouvre-le, l'impression se lance toute seule");return}catch(e){if(e&&e.code==="declined")return;}}
  try{const w=window.open(URL.createObjectURL(new Blob([doc],{type:"text/html"})),"_blank");if(w)return}catch(e){}
  toast("Impression indisponible ici. Les PDF sont dans Cours/BUT1/Fiches de révision.")}

/* Mise en place */
document.querySelectorAll("article[data-doc]").forEach(a=>{if(!a.hasAttribute("data-noedit"))addDocTools(a);docify(a)});
document.querySelectorAll(".fiche-host").forEach(addFicheTools);
renderMyfAll();
(async()=>{for(let k=0;k<40&&!(db&&uid);k++)await new Promise(r=>setTimeout(r,500));if(!db||!uid)return;
  for(const el of edTargets()){const k=edKey(el);const r=edRef(k);try{const g=await r.get();const loc=EDITS[k];
    if(g.exists&&typeof g.data().html==="string"){const rem=g.data();if(!loc||(rem.at||0)>(loc.at||0)){EDITS[k]=rem;try{localStorage.setItem("r106-edits",JSON.stringify(EDITS))}catch(e){}if(!(ED&&ED.el===el))renderHost(el,rem.html)}}
    else if(loc)r.set(loc).catch(()=>{})}catch(e){}}
  myfRef=db.collection("data/users/"+uid).doc("myfiches");
  try{myfRef.onSnapshot(d=>{if(d.exists&&Array.isArray(d.data().items)){const rem=d.data().items;const ids=new Set(rem.map(x=>x.id));MYF=rem.concat(MYF.filter(x=>!ids.has(x.id)&&x.at>Date.now()-8000));try{localStorage.setItem("r106-myf",JSON.stringify(MYF))}catch(e){}renderMyfAll()}else if(MYF.length)saveMyf()},()=>{})}catch(e){}})();

/* ===================== S'entraîner : questions adaptatives ===================== */
const PHRASEQ=[["Une commande est passée par un et un seul client","COMMANDE","1,1"],["Un client peut ne passer aucune commande, ou en passer plusieurs","CLIENT","0,n"],["Un livre est écrit par au moins un auteur, parfois plusieurs","LIVRE","1,n"],["Un salarié a au plus une voiture de fonction","SALARIE","0,1"],["Un étudiant suit au moins un cours, souvent plusieurs","ETUDIANT","1,n"],["Un appartement peut avoir une place de parking, mais jamais plusieurs","APPARTEMENT","0,1"],["Une place de parking appartient à exactement un appartement","PLACE_PARKING","1,1"],["Un produit peut n'avoir jamais été commandé","PRODUIT","0,n"],["Un joueur appartient à une seule équipe, toujours une","JOUEUR","1,1"],["Un médecin assure zéro, une ou plusieurs consultations","MEDECIN","0,n"],["Chaque consultation est assurée par un médecin, et un seul","CONSULTATION","1,1"],["Un film a au moins un acteur","FILM","1,n"],["Une personne loue au plus une maison","PERSONNE","0,1"],["Un article traite d'un et un seul sujet","ARTICLE","1,1"],["Un numéro du journal contient aucun ou plusieurs articles","NUMERO","0,n"],["Une table du restaurant passe une ou plusieurs commandes","TABLE","1,n"],["Un animateur anime au plus une activité","ANIMATEUR","0,1"],["Un enfant est élevé par une seule mère","ENFANT","1,1"],["Un client n'est client qu'après son premier achat, et il peut en faire plusieurs","CLIENT","1,n"]];
const CARDTXT={"0,1":"au minimum 0, au maximum 1 : « au plus un »","1,1":"au minimum 1, au maximum 1 : « un et un seul »","0,n":"au minimum 0, au maximum plusieurs : « aucun ou plusieurs »","1,n":"au minimum 1, au maximum plusieurs : « au moins un »"};
const VOCAB=[["Comment note-t-on une clé étrangère dans le schéma relationnel ?","précédée de #",["soulignée","en majuscules","entre crochets"],"Clé primaire soulignée, clé étrangère précédée de #."],
 ["Dans une table, une ligne s'appelle…","un enregistrement",["un champ","une clé","un attribut"],"Une ligne = un enregistrement (une occurrence), une colonne = un champ."],
 ["Dans une table, une colonne s'appelle…","un champ",["un enregistrement","une occurrence","une relation"],"Une colonne = un champ, une ligne = un enregistrement."],
 ["Combien de cardinalités faut-il écrire pour une association binaire ?","4",["2","1","8"],"Un minimum et un maximum de chaque côté : 2 × 2 = 4."],
 ["Une association qui relie trois entités est dite…","ternaire",["réflexive","plurielle","porteuse"],"Binaire = 2 entités, ternaire = 3, n-aire au-delà."],
 ["Une association d'une entité sur elle-même est dite…","réflexive",["ternaire","plurielle","faible"],"Exemple du cours : un employé dirige d'autres employés."],
 ["Une association qui contient des propriétés (Qté, Date…) est dite…","porteuse",["réflexive","faible","plurielle"],"La propriété dépend de toutes les entités liées, elle va dans l'association."],
 ["Une clé primaire peut-elle contenir une valeur nulle ?","Non, jamais",["Oui","Seulement si c'est une clé étrangère","Seulement dans une table d'association"],"Les valeurs de la clé primaire sont uniques et obligatoirement non nulles."],
 ["« Odile Martin » est, pour l'entité PERSONNE…","une occurrence",["une propriété","un identifiant","une association"],"L'entité est l'ensemble, Odile est un élément : une occurrence."],
 ["Les cardinalités d'une spécialisation sont figées à…","0,1 côté générique et 1,1 côté spécialisé",["1,1 des deux côtés","0,n côté générique et 1,1 côté spécialisé","1,n côté générique et 0,1 côté spécialisé"],"Chaque occurrence générique a au plus une occurrence spécialisée, chaque spécialisée exactement une générique."],
 ["Une CIF (contrainte d'intégrité fonctionnelle) se reconnaît à…","un 1 en cardinalité maximale sur une patte",["un n des deux côtés","une association ternaire","une propriété dans l'association"],"0,1 ou 1,1 sur une patte : l'association porte une dépendance fonctionnelle."],
 ["Que signifie SGBD ?","Système de Gestion de Bases de Données",["Schéma Général de Base de Données","Structure Graphique des Bases de Données","Système Global de Bases Distribuées"],"Le logiciel qui stocke, met à jour et permet de consulter les données (Oracle, PostgreSQL…)."],
 ["Où met-on les formats et longueurs des données ?","dans le dictionnaire des données",["dans le MCD","dans les associations","nulle part"],"Le MCD ne décrit pas les types : ils sont dans le dictionnaire des données."],
 ["L'identifiant d'une association est…","la concaténation des identifiants des entités liées",["un numéro qu'on invente","sa première propriété","toujours souligné dans l'ellipse"],"Règle du cours : l'identifiant d'une association est implicite."],
 ["Une entité faible est une entité qui…","n'existe qu'associée à une autre entité",["n'a pas de propriétés","a une cardinalité 0,n","est réflexive"],"Exemple : ENFANT n'existe pas sans MÈRE (entité forte)."],
 ["MLD, MRD, MLDR désignent…","le même modèle relationnel",["trois étapes différentes","le dictionnaire des données","le graphe des DF"],"Modèle logique = modèle relationnel, plusieurs abréviations pour la même chose."]];
const FMT=[["Code postal","Alphanumérique","Certains pays mélangent chiffres et lettres : alphanumérique, longueur 10."],["Téléphone","Alphanumérique","On ne calcule pas avec un numéro de téléphone, et il peut contenir + ou des espaces."],["Nom du client","Alphabétique","Que des lettres."],["Prix unitaire","Numérique","On calcule avec (prix × quantité)."],["Quantité","Numérique","On calcule avec."],["Date de naissance","Date","C'est une date."],["Facture payée (oui / non)","Logique","Vrai/Faux, 0/1, Oui/Non : format logique."],["Ville","Alphabétique","Que des lettres."],["Code article « 567Nut »","Alphanumérique","Lettres et chiffres mélangés."],["Immatriculation","Alphanumérique","AB-123-CD : lettres et chiffres."],["Moyenne de l'étudiant","Numérique","Résultat d'un calcul, c'est un nombre."],["Adresse mail","Alphanumérique","Lettres, chiffres et symboles."]];
const CALC=[["TotalLigne (= PrixUnitaire × Qté)","PrixUnitaire","Qté","Désignation"],["Âge (calculé depuis la date de naissance)","DateNaissance","Nom","Ville"],["MontantTTC (= MontantHT × 1,2)","MontantHT","DateFacture","NumFacture"],["TotalFacture (= somme des lignes)","DateCommande","NumClient","Qté"],["NbEnfants (on compte les enfants)","NomMère","PrénomMère","NumMère"],["Moyenne (calculée à partir des notes)","Note","CodeCours","NumEtu"]];
const DFK=[["RéférenceProduit → Désignation","","élémentaire et directe","Une seule rubrique à gauche, et aucun intermédiaire."],
 ["(NumCommande, RéférenceProduit) → Désignation","On sait que RéférenceProduit → Désignation.","non élémentaire","Une partie de la source (RéférenceProduit) suffit : NumCommande est superflu."],
 ["(NumCommande, RéférenceProduit) → Quantité","","élémentaire et directe","Il faut les deux pour connaître la quantité : aucune partie ne suffit."],
 ["NumClasse → NomEleve","On sait que NumClasse → NumEleve et NumEleve → NomEleve.","élémentaire mais pas directe","On l'obtient par transitivité : NumClasse → NumEleve → NomEleve."],
 ["(NumCoureur, NumCourse) → Temps","","élémentaire et directe","Le temps dépend du coureur ET de la course."],
 ["(NumEtudiant, CodeCours) → NomEtudiant","On sait que NumEtudiant → NomEtudiant.","non élémentaire","NumEtudiant seul suffit : CodeCours est superflu."],
 ["NumCommande → NomClient","On sait que NumCommande → NumClient et NumClient → NomClient.","élémentaire mais pas directe","Transitivité par NumClient."],
 ["(CodeAthlete, CodeSport) → NbAnneesPratique","","élémentaire et directe","Il faut l'athlète ET le sport."]];
const DFOK=["NumClient → Nom","CodeArticle → PrixUnitaire","NumCommande → DateCommande","(NumClient, CodeArticle, Date) → Qté","Matricule → NomSalarie","ISBN → Titre","NumAdherent → DateAdhesion"];
const DFKO=[["Nom → NumClient","deux clients peuvent avoir le même nom (homonymes)"],["CodeArticle → Qté","la quantité dépend aussi du client et de la date"],["Date → Qté","à une date, plusieurs achats différents"],["NumClient → CodeArticle","un client achète plusieurs articles"],["Ville → NomClient","plusieurs clients habitent la même ville"],["Titre → ISBN","deux livres peuvent avoir le même titre"],["PrixUnitaire → CodeArticle","plusieurs articles peuvent avoir le même prix"]];
const GDFS=[{dfs:["NumEtu → Nom, Prénom","CodeCours → Intitulé","(NumEtu, CodeCours) → Note"],ent:2,ents:"ETUDIANT et COURS",prop:"Note",a:"NumEtu, CodeCours"},
 {dfs:["NumClient → Nom, Ville","CodeArticle → Désignation, PrixUnitaire","(NumClient, CodeArticle, Date) → Qté"],ent:3,ents:"CLIENT, ARTICLE et DATE",prop:"Qté",a:"NumClient, CodeArticle, Date"},
 {dfs:["NumCoureur → Nom","NumCourse → Lieu","(NumCoureur, NumCourse) → Temps"],ent:2,ents:"COUREUR et COURSE",prop:"Temps",a:"NumCoureur, NumCourse"},
 {dfs:["CodeAthlete → NomAthlete","CodeSport → LibelleSport","(CodeAthlete, CodeSport) → NbAnnees"],ent:2,ents:"ATHLETE et SPORT",prop:"NbAnnees",a:"CodeAthlete, CodeSport"}];
const RULES=["une propriété n'apparaît qu'une seule fois dans le MCD","une propriété a une seule valeur à un instant donné (nom au singulier)","toute entité a un identifiant","pas de propriété calculée dans le MCD","l'identifiant distingue chaque occurrence sans ambiguïté","toutes les propriétés d'une entité dépendent de son identifiant"];
const RULEQ=[["L'entité COMMANDE a une propriété Date, et l'entité FACTURE aussi une propriété Date.",0,"Il faut deux noms différents : Date_commande et Date_facture."],["L'entité ELEVE a une propriété Notes qui contient toutes ses notes.",1,"Une valeur à la fois : noteBD, noteMath… ou une association avec MATIERE."],["L'entité CLIENT n'a que Nom, Prénom et Ville, rien de souligné.",2,"Il faut inventer un identifiant (NumClient)."],["L'entité LIGNE contient TotalLigne = PrixUnitaire × Qté.",3,"Une donnée calculée reste dans le dictionnaire, pas dans le MCD."],["L'identifiant de PERSONNE est son Nom.",4,"Deux personnes peuvent porter le même nom : on invente un numéro."],["L'entité PRODUIT contient la propriété NomClient.",5,"NumProduit ne permet pas de connaître un seul nom de client : NomClient va dans CLIENT."]];
const MLD11=[{t:"Un micro est équipé de 0 ou 1 CD-ROM ; un CD-ROM équipe un et un seul micro.",fig:"micro1",ans:"CD_ROM reçoit #Num_Micro",opts:["CD_ROM reçoit #Num_Micro","MICRO reçoit #Num_Cd","les deux tables reçoivent la clé de l'autre","table EQUIPER (#Num_Micro, #Num_Cd)"],e:"La table côté (1,1), CD_ROM, reçoit la clé : jamais de NULL. Échanger les clés est à proscrire (un micro sans CD aurait #Num_Cd nul)."},
 {t:"Un micro est équipé de 0 ou 1 CD-ROM ; certains CD-ROM n'équipent aucun micro (0 ou 1).",fig:"micro2",ans:"table EQUIPER (#Num_Micro, #Num_Cd)",opts:["table EQUIPER (#Num_Micro, #Num_Cd)","CD_ROM reçoit #Num_Micro","MICRO reçoit #Num_Cd","les deux tables reçoivent la clé de l'autre"],e:"(0,1)-(0,1) : une clé étrangère serait parfois nulle des deux côtés. On crée une table intermédiaire, MICRO et CD_ROM ne reçoivent rien."},
 {t:"Un appartement a au plus une place de parking ; une place appartient à exactement un appartement.",fig:"appart",ans:"PLACE_PARKING reçoit #numAppartement",opts:["PLACE_PARKING reçoit #numAppartement","APPARTEMENT reçoit #numPlace","table AVOIR (#numAppartement, #numPlace)","aucune clé étrangère"],e:"Le côté (1,1) est la place : PLACE_PARKING (numPlace, Etage, #numAppartement)."},
 {t:"Une activité culturelle a au plus un animateur ; un animateur anime au plus une activité.",fig:"animer",ans:"table ANIMER (#numAnimateur, #idActivite)",opts:["table ANIMER (#numAnimateur, #idActivite)","ACTIVITE reçoit #numAnimateur","ANIMATEUR reçoit #idActivite","les deux tables reçoivent la clé de l'autre"],e:"(0,1)-(0,1), exemple 5 du cours : table ANIMER, clé primaire numAnimateur + idActivite."},
 {t:"Un livre est écrit par un et un seul auteur ; un auteur écrit un ou plusieurs livres.",fig:"auteur",ans:"LIVRE reçoit #Num_Auteur",opts:["LIVRE reçoit #Num_Auteur","AUTEUR reçoit #Num_Livre","table ECRIRE (#Num_Auteur, #Num_Livre)","les deux tables reçoivent la clé de l'autre"],e:"1:n : la clé va côté maximum 1, donc dans LIVRE (exemple 6 du cours)."}];
const NPROP={COMMANDE:"DateCommande",LIVRE:"Titre",JOUEUR:"NomJoueur",EMPLOYE:"NomEmploye",CONSULTATION:"DateConsult",ADHERENT:"NomAdherent"};
const ENT1N=ENT.filter(e=>NPROP[e[1]]);
function q4(opts,ans){const o=shuffle(opts.slice(0,4));if(!o.includes(ans))o[0]=ans;return {choices:o,answer:o.indexOf(ans)}}
function figHTML(k,hide){const f=FIG[k];const big=f.entities.length>2&&f.h>200||f.entities.length>3;return `<div class="qfig">${mcdDiagram(f,big?{tight:true,hide:!!hide}:{fit:true,hide:!!hide})}</div>`}
Object.assign(GEN,{
 cardPhrase(){const [s,E,c]=pick(PHRASEQ);return {id:"g-cphr",type:"mcq",kind:"Phrase → cardinalité",q:`« ${s}. » Quelle cardinalité écris-tu à côté de <b>${E}</b> ?`,choices:["0,1","1,1","0,n","1,n"],answer:["0,1","1,1","0,n","1,n"].indexOf(c),expl:`${c} = ${CARDTXT[c]}. Mots-clés : « au plus » → max 1, « un et un seul / exactement » → 1,1, « peut ne pas / aucun » → min 0, « au moins / un ou plusieurs » → 1,n.`}},
 cardPair(){const ex=pick(EXOS_BDD.filter(e=>e.assocs.some(a=>a.links.length===2&&a.ph&&a.links[0][0]!==a.links[1][0])));const a=pick(ex.assocs.filter(a=>a.links.length===2&&a.ph&&a.links[0][0]!==a.links[1][0]));const [l0,l1]=a.links;
  const good=`${l0[1]} côté ${l0[0]}, ${l1[1]} côté ${l1[0]}`;const alt=CARDS.filter(c=>c!==l0[1]);const opts=[good,`${l1[1]} côté ${l0[0]}, ${l0[1]} côté ${l1[0]}`,`${pick(alt)} côté ${l0[0]}, ${l1[1]} côté ${l1[0]}`,`${l0[1]} côté ${l0[0]}, ${pick(CARDS.filter(c=>c!==l1[1]))} côté ${l1[0]}`];
  const u=[...new Set(opts)];while(u.length<4)u.push(`${pick(CARDS)} côté ${l0[0]}, ${pick(CARDS)} côté ${l1[0]}`);const r=q4([...new Set(u)],good);
  const e0=entOf(ex,l0[0]),e1=entOf(ex,l1[0]),np=Math.max(e0.props.length,e1.props.length);const mini={title:a.n,h:Math.max(110,60+np*15),entities:[{...e0,x:110,y:Math.max(55,30+np*8)},{...e1,x:520,y:Math.max(55,30+np*8)}],assocs:[{...a,x:315,y:Math.max(55,30+np*8),links:[[l0[0],l0[1]],[l1[0],l1[1]]]}]};
  return {id:"g-cpair",type:"mcq",kind:"Lire un énoncé d'annale",q:`${esc(ex.title)} : « ${esc(a.ph[0])} » et « ${esc(a.ph[1])} ». Quelles cardinalités pour l'association <b>${esc(a.n)}</b> ?<div class="qfig">${mcdDiagram(mini,{fit:true,hide:true})}</div><span class="hint" style="font:400 14px var(--f-body)">Sur le schéma, les « ? » sont les cardinalités à trouver : chacune s'écrit à côté de l'entité dont parle la phrase.</span>`,...r,expl:`Chaque phrase part d'une entité et donne la cardinalité <b>à côté de cette entité</b> : « ${esc(a.ph[0])} » → ${l0[1]} côté ${l0[0]} ; « ${esc(a.ph[1])} » → ${l1[1]} côté ${l1[0]}. Type ${assocType(a)}.<div class="qfig">${mcdDiagram(mini,{fit:true})}</div>`}},
 vocabBDD(){const [q,a,d,e]=pick(VOCAB);const r=q4([a,...d],a);return {id:"g-voc",type:"mcq",kind:"Vocabulaire du cours",q,...r,expl:e}},
 dicoFormat(){const [n,f,e]=pick(FMT);const o=["Alphabétique","Alphanumérique","Numérique","Date","Logique"];return {id:"g-fmt",type:"mcq",kind:"Dictionnaire des données",q:`Dans le dictionnaire des données, quel format pour « ${n} » ?`,choices:o,answer:o.indexOf(f),expl:e+" Règle du cours : numérique seulement si on fait des calculs dessus."}},
 calcInMcd(){const [c,...ok]=pick(CALC);const r=q4([c,...ok],c);return {id:"g-calc",type:"mcq",kind:"Ce qui va dans le MCD",q:"Laquelle de ces données ne doit <b>pas</b> apparaître dans le MCD ?",...r,expl:`${c} est une donnée <b>calculée</b> : elle figure dans le dictionnaire des données (avec sa règle de calcul) mais jamais dans le MCD.`}},
 dfKind(){const [df,ctx,a,e]=pick(DFK);const o=["élémentaire et directe","non élémentaire","élémentaire mais pas directe"];return {id:"g-dfk",type:"mcq",kind:"Dépendances fonctionnelles",q:`${ctx?ctx+" ":""}La DF <span class='f'>${df}</span> est…`,choices:o,answer:o.indexOf(a),expl:`${e} Élémentaire : aucune partie de la source ne suffit. Directe : pas obtenue par transitivité.`}},
 dfTrue(){const ok=pick(DFOK);const ko=shuffle(DFKO).slice(0,3);const r=q4([ok,...ko.map(x=>x[0])],ok);return {id:"g-dft",type:"mcq",kind:"Dépendances fonctionnelles",q:"Laquelle de ces dépendances fonctionnelles est vraie ?",...r,expl:`<span class='f'>${ok}</span> : connaître la source donne une seule valeur du but. Les autres sont fausses : ${ko.map(x=>`<span class='f'>${x[0]}</span> (${x[1]})`).join(" ; ")}.`}},
 gdfRead(){const g=pick(GDFS);const dl=`<ul>${g.dfs.map(d=>`<li class="f" style="white-space:normal">${d}</li>`).join("")}</ul>`;
  if(rnd(2))return {id:"g-gdfn",type:"input",kind:"Du GDF au MCD",q:`Dépendances fonctionnelles :${dl}Combien d'<b>entités</b> aura le MCD ?`,answers:[String(g.ent)],expl:`Chaque source simple devient une entité : ${g.ents}.${g.ent===3?" La date, qui fait partie d'une source composée, devient aussi une entité (DATE).":""} La source composée (${g.a}) devient une association.`};
  const good=`une association entre les entités, porteuse de ${g.prop}`;const r=q4([good,`une entité ${g.prop.toUpperCase()}`,`une propriété de la première entité`,`rien : on la supprime`],good);
  return {id:"g-gdfa",type:"mcq",kind:"Du GDF au MCD",q:`Dépendances fonctionnelles :${dl}Que devient la DF composée <span class='f'>(${g.a}) → ${g.prop}</span> dans le MCD ?`,...r,expl:`Une source composée devient une association reliant les entités de la source, et ${g.prop} (qui dépend de toutes) devient sa propriété : association porteuse.`}},
 ruleMcd(){const [s,k,e]=pick(RULEQ);const r=q4([RULES[k],...shuffle(RULES.filter((_,i)=>i!==k)).slice(0,3)],RULES[k]);return {id:"g-rule",type:"mcq",kind:"Règles du MCD",q:`${s} Quelle règle n'est pas respectée ?`,...r,expl:e}},
 cirDelete(){const t=rnd(3);
  if(t===0){const a="une clé étrangère référence toujours une clé primaire existante";const r=q4([a,"une clé primaire n'est jamais nulle","une propriété n'apparaît qu'une fois","une table a toujours une clé étrangère"],a);return {id:"g-cir",type:"mcq",kind:"Intégrité référentielle",q:"Que garantit la contrainte d'intégrité référentielle (CIR) ?",...r,expl:"La CIR : un enfant ne peut pas exister avec un #NumMère qui ne correspond à aucune mère."}}
  if(t===1){const a="laisser les enfants avec un #NumMère qui n'existe plus";const r=q4([a,"interdire la suppression de la mère","supprimer aussi ses enfants (CASCADE)","mettre NULL dans #NumMère des enfants"],a);return {id:"g-cir2",type:"mcq",kind:"Intégrité référentielle",q:"Enfants (<u>NumEnfant</u>, Nom, #NumMère). On veut supprimer une mère qui a des enfants. Quelle option est <b>interdite</b> par la CIR ?",...r,expl:"Les trois options possibles : interdire, cascade, ou NULL. Laisser une référence vers une mère inexistante viole la CIR."}}
  const a="le SGBD refuse l'insertion";const r=q4([a,"l'enfant est ajouté sans mère","la mère n°9 est créée automatiquement","l'enfant reçoit la mère n°1"],a);return {id:"g-cir3",type:"mcq",kind:"Intégrité référentielle",q:"La table Mères contient les mères n°1 et n°2. On insère l'enfant (6, DUPONT, Léa, #NumMère = 9). Que se passe-t-il ?",...r,expl:"On ne peut pas enregistrer un enfant avec un NumMère qui n'existe pas : la CIR bloque l'insertion."}},
 case11(){const c=pick(MLD11);const r=q4(c.opts,c.ans);return {id:"g-c11",type:"mcq",kind:"Cas particuliers 1:1",q:`${c.t} Comment se traduit l'association dans le schéma relationnel ?${c.fig?figHTML(c.fig):""}`,...r,expl:c.e}},
 reflexMLD(){if(rnd(2)){const a="SALARIE (Matricule, Nom, Fonction, #Matricule_chef)";const r=q4([a,"SALARIE (Matricule, Nom, Fonction, #Matricule)","ENCADRER (#Matricule, #Matricule)","SALARIE (Matricule, Nom, Fonction) et CHEF (#Matricule)"],a);
   return {id:"g-refl",type:"mcq",kind:"Association réflexive",q:`Quel schéma relationnel pour ce MCD ?${figHTML("chef")}`,...r,expl:"Hiérarchique (un maximum à 1) : règle 2, la table reçoit une deuxième fois le matricule. On le <b>renomme</b> (#Matricule_chef) pour ne pas le confondre avec la clé primaire."}}
  const a="COMPOSITION (#Ref_compose, #Ref_composant, Nombre)";const r=q4([a,"PIECE (Reference, Libelle, #Reference, Nombre)","COMPOSITION (#Reference, #Reference, Nombre)","PIECE (Reference, Libelle, #Ref_composant)"],a);
  return {id:"g-refl2",type:"mcq",kind:"Association réflexive",q:`Quel schéma relationnel pour l'association de ce MCD ?${figHTML("compo")}`,...r,expl:"Non hiérarchique (n des deux côtés) : règle 3, une table COMPOSITION dont la clé regroupe les deux références, renommées par leur rôle (composé, composant). Nombre devient un attribut."}},
 ternMLD(){const a="(#Id_Saison, #Num_Ecurie, #Num_Pilote)";const r=q4([a,"(#Num_Ecurie, #Num_Pilote)","(#Id_Saison, #Num_Ecurie, #Num_Pilote, Salaire)","(Salaire)"],a);
  return {id:"g-tern",type:"mcq",kind:"Association ternaire",q:`Quelle est la clé primaire de la table ENGAGER issue de ce MCD ?${figHTML("engager")}`,...r,expl:"Ternaire : une table qui reçoit les trois identifiants en clés étrangères ; ensemble, ils forment la clé primaire. Salaire est un attribut, jamais dans la clé."}},
 mldBuild(){if(rnd(3)===0){const target="SUIVRE ( #NumEtu , #CodeCours , Note )";return {id:"g-mldb2",type:"build",exact:true,kind:"Écrire une table",mcd:["ETUDIANT","COURS","Suivre","1,n","0,n","Note","NumEtu","CodeCours"],q:"Écris la table issue de l'association <b>Suivre</b> (clés d'abord, puis l'attribut).",target,tiles:shuffle(target.split(" ").concat(["NumEtu","CodeCours","#Note"])),expl:`n:n porteuse : nouvelle table, clé primaire = les deux clés étrangères, Note en attribut : <span class='f'>SUIVRE (<u>#NumEtu, #CodeCours</u>, Note)</span>.`}}
  const [E1,E2,verb,id1,id2]=pick(ENT1N);const p=NPROP[E2];const target=`${E2} ( ${id2} , ${p} , #${id1} )`;
  return {id:"g-mldb",type:"build",exact:true,kind:"Écrire une table",mcd:[E1,E2,verb[0].toUpperCase()+verb.slice(1),pick(["0,n","1,n"]),"1,1","",id1,id2],q:`${E2} a pour propriétés ${id2} (identifiant) et ${p}. Écris la table ${E2} du schéma relationnel (clé primaire, attribut, puis clé étrangère).`,target,tiles:shuffle(target.split(" ").concat([`#${id2}`,id1,`#${E1}`])),expl:`1:n : ${E2} est côté maximum 1, elle reçoit la clé de ${E1}. <span class='f'>${E2} (<u>${id2}</u>, ${p}, #${id1})</span>.`}},
 spotMld(){const [E1,E2,verb,id1,id2]=pick(ENT1N);const nn=rnd(2)===1;const c1=pick(["0,n","1,n"]),c2=nn?pick(["0,n","1,n"]):pick(["1,1","0,1"]);const V=verb.toUpperCase();
  const right=nn?[`${E1} (${id1}, …)`,`${E2} (${id2}, …)`,`${V} (#${id1}, #${id2})`]:[`${E1} (${id1}, …)`,`${E2} (${id2}, …, #${id1})`];
  const errs=nn?[["Non : il fallait une table pour l'association",[`${E1} (${id1}, …)`,`${E2} (${id2}, …, #${id1})`]],["Non : la clé étrangère est du mauvais côté",[`${E1} (${id1}, …, #${id2})`,`${E2} (${id2}, …)`]]]:[["Non : la clé étrangère est du mauvais côté",[`${E1} (${id1}, …, #${id2})`,`${E2} (${id2}, …)`]],["Non : il ne fallait pas de table pour l'association",[`${E1} (${id1}, …)`,`${E2} (${id2}, …)`,`${V} (#${id1}, #${id2})`]]];
  const ok=rnd(3)===0;const [lab,shown]=ok?["Oui, il est correct",right]:pick(errs);const o=["Oui, il est correct","Non : la clé étrangère est du mauvais côté","Non : il fallait une table pour l'association","Non : il ne fallait pas de table pour l'association"];
  return {id:"g-spot",type:"mcq",kind:"Trouver l'erreur",mcd:[E1,E2,verb[0].toUpperCase()+verb.slice(1),c1,c2,"",id1,id2],q:`Un étudiant propose ce schéma relationnel :<div class="mld">${shown.map(t=>`<div class="mldt">${esc(t)}</div>`).join("")}</div>Est-il correct ?`,choices:o,answer:o.indexOf(lab),expl:`Maximums ${cmax(c1)} et ${cmax(c2)} : type ${nn?"n:n":"1:n"}. Correct : ${right.map(esc).join(" ; ")}. ${nn?"n:n → nouvelle table, clé = les deux clés étrangères.":`1:n → la clé étrangère va dans ${E2}, côté maximum 1.`}`}},
 annaleTable(){const ex=pick(EXOS_BDD.filter(e=>e.entities.length>=3&&e.entities.length<=7));const M=mcdToMld(ex);const cand=M.tables.filter(t=>t.attrs.some(a=>a.fk));const T=pick(cand.length?cand:M.tables);
  const good=mldText(T);const mut=[];const fks=T.attrs.filter(a=>a.fk);const others=ex.entities.filter(e=>!T.attrs.some(a=>a.n===e.id));
  if(fks.length)mut.push({...T,attrs:T.attrs.filter(a=>a!==fks[0]).map(a=>T.assoc&&a.pk&&fks.length===1?a:a)});
  if(others.length)mut.push({...T,attrs:T.attrs.concat([{n:pick(others).id,fk:true}])});
  mut.push({...T,attrs:T.attrs.map(a=>a.fk?{...a,fk:false}:a)});
  mut.push({...T,attrs:T.attrs.map((a,i)=>({...a,pk:T.assoc?i===0:!a.pk&&i===1?true:a.pk&&T.attrs.length>1?false:a.pk}))});
  const d=[...new Set(mut.map(mldText))].filter(x=>x!==good).slice(0,3);while(d.length<3)d.push(mldText({...T,attrs:shuffle(T.attrs).map(a=>({...a,pk:!a.pk}))}));const r=q4([good,...d],good);
  return {id:"g-annt",type:"mcq",kind:"Lire un MCD d'annale",q:`${esc(ex.title)} : quelle est la bonne table <b>${esc(T.name)}</b> ?<div class="qfig">${mcdDiagram(ex,{tight:true})}</div>`,...r,expl:`${M.steps.filter(s=>T.from.includes(s.a.n)).map(s=>esc(s.rule)).join(" ")||"Règle 1 : l'identifiant devient la clé primaire."}<br>Bonne réponse : ${good}`}}
});
const ADAPT={r101:[["cExpr","algoDivMod","matchAlgo","cDiv"],["cDiv","cLoop","algoBool","algoTrace","cStack"],["cPrintf","cPtr","cLoop","cTree","algoSum"],["cPtr","cBst","cTree","cLoop","cPrintf","algoSearch"]],
 r104:[["permOct","redirSeq","cutField"],["chmodSym","canAccess","grepRet","permOct"],["umaskQ","grepLines","canAccess","scriptOut"],["grepLines","scriptOut","chmodSym","umaskQ","grepRet","cutField"]],
 r105:[["cardPhrase","vocabBDD","dicoFormat","calcInMcd","assoc"],["mldFK","dfKind","dfTrue","gdfRead","ruleMcd","cirDelete","cardPair","matchBDD"],["case11","reflexMLD","ternMLD","mldBuild","spotMld","cardPair"],["annaleTable","spotMld","evalBDD"]],
 r107:[["matType","matTrans","matchMaths","derivPoly","polyDeg"],["matSum","matProd","sysNature","gjInv2","derivRule"],["matPow","matInv","echelon","tangent","polyDiv","derivRule"],["system","matInv","gjInv3","variations","polyFactor","gjSolve"]],
 r102:[["matchWeb","cssMargin"],["cssBox","cssMargin","matchWeb"],["cssBuild","cssBox"],["cssBuild","cssMargin"]],
 r106:[["relCount","divEucl","truth","matchE"],["relProps","primeFact","nbDiv","eqClasses"],["relProps","eqClasses","listDiv","nbDiv","divEucl"],["relProps","eqClasses","divEucl","listDiv","nbDiv","primeFact"]],
 r103:[["arConv","arCmd","arC2"],["arC2","arAdd8","arUtf8","arCmd","arPrat"],["arAdd8","arEndian","arUtf8","arIeeeDec","arPrat"],["arIeeeEnc","arIeeeDec","arAdd8","arUtf8","arEndian","arPrat"]]};
const LVLN=["","découverte","bases","exercices","type contrôle"];
function adaptR(s){state.adapt=state.adapt||{};return state.adapt[s]||1.2}
function adaptLv(s){return Math.max(1,Math.min(4,Math.floor(adaptR(s))))}
function adaptGen(s){const P=ADAPT[s]||ADAPT.r105;let lv=adaptLv(s);const roll=Math.random();if(roll<.18&&lv>1)lv--;else if(roll>.88&&lv<4)lv++;
  let pool=P[lv-1].filter(k=>GEN[k]&&k!==(L&&L.lastGen));if(!pool.length)pool=P[lv-1].filter(k=>GEN[k]);
  const miss=state.miss||{};const w=pool.map(k=>1+Math.min(3,(miss["g-"+k]||0)*.5));let x=Math.random()*w.reduce((a,b)=>a+b,0),k=pool[0];for(let i=0;i<pool.length;i++){x-=w[i];if(x<=0){k=pool[i];break}}
  const q=GEN[k]();q._g=k;q._lv=lv;q.kind=`${q.kind||""} · niveau ${lv}`;if(L)L.lastGen=k;return q}
function adaptUpdate(s,ok,q){state.adapt=state.adapt||{};const before=adaptLv(s);let r=adaptR(s);const lv=q._lv||before;
  r=ok?r+(lv>=before?.3:.15):r-(lv<=before?.45:.25);r=Math.max(1,Math.min(4.6,r));state.adapt[s]=Math.round(r*100)/100;const after=adaptLv(s);
  if(after>before)setTimeout(()=>toast(`Niveau ${after} (${LVLN[after]}) : les questions deviennent plus dures`),600);else if(after<before)setTimeout(()=>toast(`On consolide au niveau ${after} (${LVLN[after]})`),600)}
Object.entries(SUBJECTS).forEach(([k,S])=>{S.smart=[{key:"adapt-"+k,tag:"S'adapte à toi",title:"Entraînement adaptatif",desc:"Des questions variées, plus dures quand tu réussis, plus simples quand tu bloques",adaptive:true,subj:k,n:12},
   {key:"ia-"+k,tag:"Nouveau à chaque fois",title:"Questions inédites",desc:"Claude invente de nouvelles questions sur tout le cours, à ton niveau",ia:true,subj:k}]});
function curSmart(){return (SUBJECTS[SUBJ].smart||[]).map(d=>d.adaptive?{...d,tag:`S'adapte à toi · niveau ${adaptLv(d.subj)}/4`}:d)}
async function iaLesson(deck,taskKey){const el=document.getElementById("lesson");document.getElementById("home").hidden=true;el.hidden=false;
  const s=deck.subj||SUBJ;const S=SUBJECTS[s];const lv=adaptLv(s);
  el.innerHTML=`<div class="lbar"><button class="xbtn" id="quit" aria-label="Quitter">×</button><div class="meter"><i style="width:0"></i></div></div><div class="end"><div class="qkind">Questions inédites · ${esc(S.code)} · niveau ${lv}</div><p class="muted" id="iaMsg">Claude lit ton cours et invente des questions…</p></div>`;
  document.getElementById("quit").onclick=()=>{ctrlIA&&ctrlIA.abort();quit()};
  if(!sample){document.getElementById("iaMsg").textContent="Cette fonction n'est pas disponible ici. Prends plutôt l'entraînement adaptatif.";return}
  const txt=S.tabs.map(t=>{const p=document.getElementById("tab-"+t[0]);return p?p.innerText:""}).join("\n").replace(/\n{2,}/g,"\n").slice(0,16000);
  const weak=Object.entries(state.miss||{}).sort((a,b)=>b[1]-a[1]).slice(0,6).map(x=>x[0]).join(", ");
  const prompt=`Tu es professeur en BUT Informatique (IUT de Metz). Prépare 8 questions de révision NOUVELLES pour le contrôle de ${S.code} ${S.name} (${S.scope}).
Niveau de l'étudiant : ${lv}/4 (${LVLN[lv]}). Niveau 1 = définitions et lecture simple ; 2 = appliquer une règle ; 3 = petits exercices avec un piège ; 4 = comme au contrôle, mise en situation complète.
Varie VRAIMENT les formes : mise en situation inventée (entreprise, club, hôpital…), « trouve l'erreur », « que se passe-t-il si… », vrai/faux justifié, compléter une phrase, choisir la bonne table, ordre des étapes. Pas deux questions sur la même notion.
Chaque question doit contenir toutes les informations nécessaires pour répondre (énoncé complet).
${weak?`Insiste un peu sur ses points faibles (identifiants de questions ratées) : ${weak}.`:""}
Format : QCM à 4 choix (une seule bonne réponse) ou réponse courte (un mot ou un nombre). Explication de 1 à 3 phrases, claire, qui dit pourquoi. Pas de HTML, pas de LaTeX.
Réponds avec UNIQUEMENT ce JSON :
{"questions":[{"type":"mcq","q":"...","choices":["...","...","...","..."],"answer":0,"expl":"..."},{"type":"input","q":"...","answers":["..."],"expl":"..."}]}

COURS (extraits de l'application) :
${txt}`;
  ctrlIA=new AbortController();
  try{const out=await sample.json(prompt,{signal:ctrlIA.signal,modelTier:"default",cache:false,onText:()=>{const m=document.getElementById("iaMsg");if(m)m.textContent="Claude écrit les questions…"}});
    const qs=validQuestions(out&&out.questions);if(!qs.length)throw {code:"invalid_json"};qs.forEach((q,i)=>{q.id="ia-"+s+"-"+Date.now()+"-"+i;q.kind="Question inédite · niveau "+lv});
    if(document.getElementById("lesson").hidden)return;startLesson({key:deck.key,title:deck.title,bank:()=>qs,gens:[],n:qs.length,_ready:true},taskKey)}
  catch(e){const m=document.getElementById("iaMsg");if(m)m.textContent=(ERR[e&&e.code]||"La génération a échoué.")+" L'entraînement adaptatif marche sans Claude."}}
let ctrlIA=null;

/* ===================== Front v27 : couleur par matière, onglets à icônes, en-tête de matière, thème ===================== */
const TICON={
 learn:'<path d="M13 2 4 14h7l-1 8 9-12h-7z"/>',
 cours:'<path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v17H6.5A2.5 2.5 0 0 0 4 21.5z"/><path d="M4 19.5V21.5"/><path d="M8 7h8M8 11h6"/>',
 corr:'<path d="M9 11l3 3 8-8"/><path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9"/>',
 fiche:'<rect x="5" y="2.5" width="14" height="19" rx="2"/><path d="M9 7h6M9 11h6M9 15h4"/>',
 mine:'<path d="M12 5v14M5 12h14"/>'};
function tabKind(k,l){if(/blanc/i.test(l))return ["corr","Blanc"];if(k==="learn")return ["learn","Entraîner"];if(k==="mine")return ["mine","Ajouter"];if(/^Correction/i.test(l))return ["corr","Corrigés"];if(/fiche|mémento|résumé/i.test(l))return ["fiche","Fiche"];return ["cours",null]}
function decorateTabs(){const nav=document.getElementById("tabsnav");let n=0;const btns=[...nav.querySelectorAll("button")];const nC=btns.filter(b=>tabKind(b.dataset.tab,b.textContent)[0]==="cours").length;
  btns.forEach(b=>{if(b.querySelector(".ti"))return;const l=b.textContent;const [kind,short0]=tabKind(b.dataset.tab,l);let short=short0;if(kind==="cours"){n++;short=nC>1?"Cours "+n:"Cours"}
    b.innerHTML=`<span class="ti" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${TICON[kind]}</svg></span><span class="tl">${esc(l)}</span><span class="ts" aria-hidden="true">${esc(short)}</span>`;b.title=l})}
{const base=buildTabs;buildTabs=function(){base.apply(this,arguments);document.documentElement.dataset.subj=VIEW==="dash"?"dash":SUBJ;decorateTabs();const mn=document.getElementById("mainnav"),a=mn&&mn.querySelector("[aria-current]");if(a)mn.scrollLeft=a.offsetLeft-mn.clientWidth/2+a.offsetWidth/2}}
/* Thème clair / sombre */
function applyTheme(t){if(t==="dark"||t==="light")document.documentElement.dataset.theme=t;else delete document.documentElement.dataset.theme}
try{applyTheme(localStorage.getItem("r106-theme"))}catch(e){}
{const st=document.querySelector("header.top .stats");if(st){const b=document.createElement("button");b.type="button";b.className="chip icon theme-btn";b.title="Passer en thème clair ou sombre";b.setAttribute("aria-label","Changer de thème");
  b.innerHTML=`<svg class="th-l" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></svg><svg class="th-d" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>`;
  b.onclick=()=>{const dark=document.documentElement.dataset.theme?document.documentElement.dataset.theme==="dark":matchMedia("(prefers-color-scheme: dark)").matches;const t=dark?"light":"dark";applyTheme(t);try{localStorage.setItem("r106-theme",t)}catch(e){}toast(t==="dark"?"Thème sombre":"Thème clair")};st.appendChild(b)}}
/* En-tête de la matière dans S'entraîner */
{const home=document.getElementById("home");if(home&&!document.getElementById("subhero"))home.insertAdjacentHTML("afterbegin",`<div id="subhero"></div>`)}
function renderSubHero(){const el=document.getElementById("subhero");if(!el||!SUBJECTS[SUBJ])return;const S=SUBJECTS[SUBJ];const e=examOf(SUBJ);
  let cd="";if(e){const ms=new Date(e.date)-Date.now();if(ms>0){const d=Math.floor(ms/864e5),h=Math.floor(ms%864e5/36e5),m=Math.floor(ms%36e5/6e4);cd=`<div class="sh-count" aria-label="Temps restant avant le contrôle">${d?`<div><b>${d}</b><small>jour${d>1?"s":""}</small></div>`:""}<div><b>${h}</b><small>heure${h>1?"s":""}</small></div>${d?"":`<div><b>${m}</b><small>min</small></div>`}</div>`}}
  let pct=0;try{pct=mastery(subjBank(SUBJ))}catch(x){}const lv=typeof adaptLv==="function"?adaptLv(SUBJ):1;
  const course=S.tabs.find(t=>tabKind(t[0],t[1])[0]==="cours"),fiche=S.tabs.find(t=>tabKind(t[0],t[1])[0]==="fiche");
  el.innerHTML=`<section class="shero" aria-label="${esc(S.code)}"><div><div class="eyebrow">${esc(S.code)} · ${e?esc(e.title||S.exlabel||""):esc(S.exlabel||"")}</div><h2>${esc(S.name)}</h2><p>${esc(S.scope||"")} · ${pct}% des questions de cours maîtrisées.</p></div>${cd}
  <div class="sh-row"><button type="button" class="btn" data-sh="go">S'entraîner · niveau ${lv}</button>${course?`<button type="button" class="btn ghost" data-goto="${course[0]}">Lire le cours</button>`:""}${fiche?`<button type="button" class="btn ghost" data-goto="${fiche[0]}">Ma fiche</button>`:""}
  <span class="sh-lv" title="Niveau de l'entraînement adaptatif">${[1,2,3,4].map(i=>`<i class="${i<=lv?"on":""}"></i>`).join("")} Niveau ${lv}/4</span></div></section>`;
  el.querySelector('[data-sh="go"]').onclick=()=>{const d=(typeof curSmart==="function"&&curSmart()[0]);if(d)startLesson(d)}}
{const base=renderHome;renderHome=function(){base.apply(this,arguments);renderSubHero()}}
setInterval(()=>{if(VIEW!=="dash"&&CURTAB==="learn"&&!L)renderSubHero()},60000);

/* ===================== Carnet v29 : accueil en grille, mode concentration ===================== */
const ENC={"R1.03":"var(--c-r103)","R1.04":"var(--c-r104)","R1.01":"var(--c-r101)","R1.06":"var(--c-r106)","R1.05":"var(--c-r105)","R1.07":"var(--c-r107)","R1.02":"var(--c-r102)"};
const CICO={"c-agenda":'<rect x="3" y="4.5" width="18" height="17" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/>',"c-plan":'<path d="M9 11l3 3 8-8"/><path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h9"/>',"c-feel":'<path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"/><path d="M8.5 14.5s1.3 1.8 3.5 1.8 3.5-1.8 3.5-1.8M9 9.5h.01M15 9.5h.01"/>',"c-exams":'<rect x="3" y="4.5" width="18" height="17" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/>',"c-today":'<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',"c-weak":'<path d="M12 3 2 21h20z"/><path d="M12 10v5M12 18h.01"/>',"c-stats":'<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>',"c-notes":'<path d="M5 3h10l4 4v14H5z"/><path d="M9 9h6M9 13h6M9 17h3"/>',"c-share":'<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/>'};
function codeIn(t){const m=/R1\.0\d/.exec(t||"");return m&&ENC[m[0]]?m[0]:null}
function decorateDash(){const el=document.getElementById("dash");if(!el)return;
  for(const [cls,ico] of Object.entries(CICO)){const h=el.querySelector(`.${cls} .card-h h3`);if(h&&!h.querySelector(".ico"))h.insertAdjacentHTML("afterbegin",`<span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${ico}</svg></span>`)}
  el.querySelectorAll(".scode").forEach(s=>{const c=codeIn(s.textContent);if(c)s.style.setProperty("--encre",ENC[c])});
  el.querySelectorAll(".task").forEach(t=>{const s=t.querySelector(".scode");const c=s&&codeIn(s.textContent);if(c)t.style.setProperty("--encre",ENC[c])});
  el.querySelectorAll(".ex").forEach(x=>{const b=x.querySelector(".pt b");const c=b&&codeIn(b.textContent);if(c)x.style.setProperty("--encre",ENC[c])});
  const hero=el.querySelector(".c-hero");if(hero){const eb=hero.querySelector(".eyebrow");const c=eb&&codeIn(eb.textContent);if(c&&!eb.querySelector(".hero-code")){hero.style.setProperty("--encre",ENC[c]);eb.innerHTML=eb.innerHTML.replace(c,`<span class="hero-code">${c}</span>`)}
    const h2=hero.querySelector("h2");if(h2&&!h2.querySelector(".hlw"))h2.innerHTML=`<span class="hlw">${h2.innerHTML}</span>`}}
{const base=renderDash;renderDash=function(){base.apply(this,arguments);try{decorateDash()}catch(e){}}}
function focusMode(on){document.body.classList.toggle("in-lesson",!!on)}
{const bS=startLesson;startLesson=function(){const r=bS.apply(this,arguments);focusMode(!!L);if(L)scrollTo(0,0);return r}}
{const bE=endLesson;endLesson=function(){focusMode(false);return bE.apply(this,arguments)}}
{const bQ=quit;quit=function(){focusMode(false);return bQ.apply(this,arguments)}}
{const bD=showDash;showDash=function(){focusMode(false);return bD.apply(this,arguments)}}
{const bSS=setSubject;setSubject=function(){focusMode(false);return bSS.apply(this,arguments)}}
{const bI=iaLesson;iaLesson=function(){focusMode(true);return bI.apply(this,arguments)}}
document.querySelectorAll("article[data-doc]").forEach(a=>{try{numberHeads(a);buildToc(a)}catch(e){}});

/* ===================== Disposition : barre latérale (ordinateur) ou onglets en haut ===================== */
const SIDE={aside:null,marks:{},on:false};
function sidePref(){try{return localStorage.getItem("r106-layout")||"side"}catch(e){return "side"}}
function sideBuild(){if(SIDE.aside)return;const a=document.createElement("aside");a.className="side";a.setAttribute("aria-label","Navigation");
  a.innerHTML=`<div class="side-top"></div><div class="side-lbl">Matières</div><div class="side-subj"></div><div class="side-lbl side-lbl2">Dans cette matière</div><div class="side-tabs"></div><div class="side-foot"><button type="button" class="side-lay" data-lay="top">Onglets en haut</button></div>`;
  document.body.prepend(a);SIDE.aside=a;a.querySelector("[data-lay]").onclick=()=>setLayout("top");
  ["header.top","#mainnav","#tabsnav"].forEach(sel=>{const el=document.querySelector(sel);const m=document.createComment("pos "+sel);el.parentNode.insertBefore(m,el);SIDE.marks[sel]=m})}
function applyLayout(){const want=sidePref()==="side"&&innerWidth>=1000;if(want===SIDE.on)return;sideBuild();const a=SIDE.aside;
  const hd=document.querySelector("header.top"),mn=document.getElementById("mainnav"),tb=document.getElementById("tabsnav");
  if(want){a.querySelector(".side-top").appendChild(hd);a.querySelector(".side-subj").appendChild(mn);a.querySelector(".side-tabs").appendChild(tb)}
  else{for(const [sel,el] of [["header.top",hd],["#mainnav",mn],["#tabsnav",tb]])SIDE.marks[sel].after(el)}
  SIDE.on=want;document.body.classList.toggle("layout-side",want);a.hidden=!want;layBtn()}
function setLayout(v){try{localStorage.setItem("r106-layout",v)}catch(e){}applyLayout();toast(v==="side"?"Barre latérale à gauche":"Onglets en haut");if(v==="top"&&innerWidth>=1000)layBtn()}
function layBtn(){const st=document.querySelector("header.top .stats");if(!st)return;let b=st.querySelector(".lay-btn");const show=innerWidth>=1000&&!SIDE.on;
  if(!b){b=document.createElement("button");b.type="button";b.className="chip icon lay-btn";b.title="Mettre la navigation dans une barre à gauche";b.setAttribute("aria-label","Barre latérale");
    b.innerHTML=`<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M9 4v16"/></svg>`;b.onclick=()=>setLayout("side");st.appendChild(b)}
  b.hidden=!show}
addEventListener("resize",()=>{clearTimeout(SIDE.t);SIDE.t=setTimeout(applyLayout,150)});
applyLayout();layBtn();

/* ===================== Annale 2025-26 guidée, question par question ===================== */
FIG.a2526=EXOS_BDD.find(e=>e.id==="a2526");FIG.a2526b=EXOS_BDD.find(e=>e.id==="a2526b");
const AN1=`<div class="exo"><div class="eyebrow">Annale mi-parcours 2025-26 · exercice 1 (14 pts)</div><p>Un client peut passer une ou plusieurs commandes. Une commande est passée par un et un seul client. Chaque commande contient un ou plusieurs produits, tandis qu'un produit peut apparaître dans aucune ou plusieurs commandes. Les commandes sont toujours traitées par un et un seul employé, et chaque employé gère une ou plusieurs commandes.</p><p>On enregistre : le client (nom, mail), le produit (nom, prix), l'employé (nom, prénom), la commande (date, statut) et la quantité de chaque produit dans une commande.</p></div>`;
const AN2=`<div class="exo"><div class="eyebrow">Annale mi-parcours 2025-26 · exercice 2 (7 pts)</div><p>Un médecin assure aucune ou plusieurs consultations ; une consultation est assurée par un et un seul médecin. Un patient passe aucune ou plusieurs consultations ; une consultation concerne un et un seul patient. Lors d'une consultation, le médecin prescrit aucun ou plusieurs médicaments, avec un nombre de prises ; un médicament est prescrit dans aucune ou plusieurs consultations.</p><p>On connaît le matricule et le nom du médecin, le n° de sécurité sociale et le nom du patient, la date de la consultation, le code et le libellé du médicament.</p></div>`;
const CC=["0,1","1,1","0,n","1,n"],TY=["1:1","1:n","n:n"];
function anCard(id,ctx,E,phrase,ans,why){return {id,type:"mcq",kind:ctx,fig:ctx.startsWith("Exercice 2")?"a2526b":"a2526",figHide:true,q:`${ctx.startsWith("Exercice 2")?AN2:AN1}« ${phrase} » Quelle cardinalité écris-tu à côté de <b>${E}</b> ?`,choices:CC,answer:CC.indexOf(ans),expl:`${ans} : ${why} Sur la copie : « ${phrase}, donc la cardinalité entre ${E} et l'association est ${ans}. »`}}
const ANNALE=[
 {id:"an1-ent",type:"input",kind:"Exercice 1 · étape 1 : les entités",q:`${AN1}Combien d'<b>entités</b> faut-il dans le MCD ?`,answers:["4","quatre"],expl:"4 entités : CLIENT, PRODUIT, COMMANDE, EMPLOYE. Chacune a des propriétés à elle et un identifiant qu'on invente (IDClient, IDProduit, IDCommande, IDEmpl). La quantité n'est pas une entité."},
 {id:"an1-id",type:"mcq",kind:"Exercice 1 · étape 1 : les entités",q:`${AN1}Quel est le bon contenu de l'entité COMMANDE ?`,choices:["COMMANDE (<u>IDCommande</u>, DateCommande, Statut)","COMMANDE (<u>IDCommande</u>, DateCommande, Statut, Qte)","COMMANDE (<u>DateCommande</u>, Statut)","COMMANDE (<u>IDCommande</u>, DateCommande, Statut, IDClient)"],answer:0,expl:"Un identifiant inventé, souligné, puis la date et le statut. Pas de Qte (elle dépend aussi du produit) et pas d'IDClient : au niveau du MCD, le lien avec le client est l'association Passer, pas une propriété."},
 {id:"an1-qte",type:"mcq",kind:"Exercice 1 · étape 1 : les entités",q:`${AN1}Où va la propriété <b>Qte</b> (quantité d'un produit dans une commande) ?`,choices:["Dans l'association entre COMMANDE et PRODUIT","Dans COMMANDE","Dans PRODUIT","Nulle part, elle se calcule"],answer:0,expl:"Elle dépend du couple (commande, produit) : (IDCommande, IDProduit) → Qte. Elle va donc dans l'association Contenir, qui devient porteuse."},
 anCard("an1-c1","Exercice 1 · étape 2 : cardinalités","CLIENT","Un client peut passer une ou plusieurs commandes.","1,n","au moins une (« une ») et au plus plusieurs."),
 anCard("an1-c2","Exercice 1 · étape 2 : cardinalités","COMMANDE","Une commande est passée par un et un seul client.","1,1","« un et un seul » : exactement un."),
 {id:"an1-t1",type:"mcq",kind:"Exercice 1 · étape 2 : cardinalités",fig:"a2526",figHide:true,q:`${AN1}Passer : 1,n côté CLIENT et 1,1 côté COMMANDE. Quel est le <b>type</b> de l'association Passer ?`,choices:TY,answer:1,expl:"On compare les maximums : n côté CLIENT, 1 côté COMMANDE. Type 1:n."},
 anCard("an1-c3","Exercice 1 · étape 2 : cardinalités","COMMANDE","Chaque commande contient un ou plusieurs produits.","1,n","au moins un produit, et plusieurs possibles."),
 anCard("an1-c4","Exercice 1 · étape 2 : cardinalités","PRODUIT","Un produit peut apparaître dans aucune ou plusieurs commandes.","0,n","« aucune » donne le minimum 0, « plusieurs » le maximum n."),
 {id:"an1-t2",type:"mcq",kind:"Exercice 1 · étape 2 : cardinalités",fig:"a2526",figHide:true,q:`${AN1}Contenir : 1,n côté COMMANDE et 0,n côté PRODUIT. Quel est le <b>type</b> de Contenir ?`,choices:TY,answer:2,expl:"Maximums n et n : type n:n. Elle porte en plus la propriété Qte."},
 anCard("an1-c5","Exercice 1 · étape 2 : cardinalités","COMMANDE","Les commandes sont toujours traitées par un et un seul employé.","1,1","« toujours » et « un et un seul » : exactement un."),
 anCard("an1-c6","Exercice 1 · étape 2 : cardinalités","EMPLOYE","Chaque employé gère une ou plusieurs commandes.","1,n","au moins une, plusieurs possibles."),
 {id:"an1-t3",type:"mcq",kind:"Exercice 1 · étape 2 : cardinalités",fig:"a2526",q:`${AN1}Voici le MCD complet. Quel est le type de l'association <b>Traiter</b> ?`,choices:TY,answer:1,expl:"1,n côté EMPLOYE, 1,1 côté COMMANDE : maximums n et 1, type 1:n. Le MCD est complet : 4 entités, 3 associations dont une porteuse (Contenir, Qte)."},
 {id:"an1-m1",type:"mcq",kind:"Exercice 1 · étape 3 : schéma relationnel",fig:"a2526",q:`${AN1}Règle 2 (1:n). Quelle table reçoit des clés étrangères pour Passer et Traiter ?`,choices:["COMMANDE reçoit #IDClient et #IDEmpl","CLIENT reçoit #IDCommande et EMPLOYE reçoit #IDCommande","On crée les tables PASSER et TRAITER","COMMANDE reçoit #IDProduit"],answer:0,expl:"Dans les deux associations, COMMANDE est du côté maximum 1 (1,1) : elle absorbe l'identifiant de l'autre entité comme clé étrangère. Passer et Traiter disparaissent."},
 {id:"an1-m2",type:"mcq",kind:"Exercice 1 · étape 3 : schéma relationnel",fig:"a2526",q:`${AN1}Quelle est la bonne table <b>Commande</b> ?`,choices:["Commande (<u>IDCommande</u>, DateCommande, Statut, #IDEmpl, #IDClient)","Commande (<u>IDCommande</u>, DateCommande, Statut)","Commande (<u>IDCommande, #IDClient</u>, DateCommande, Statut, #IDEmpl)","Commande (<u>IDCommande</u>, DateCommande, Statut, Qte, #IDProduit)"],answer:0,expl:"Clé primaire IDCommande seule, soulignée. Les deux clés étrangères #IDEmpl et #IDClient sont des attributs normaux, pas dans la clé primaire."},
 {id:"an1-m3",type:"build",exact:true,kind:"Exercice 1 · étape 3 : schéma relationnel",fig:"a2526",q:`${AN1}Écris la table issue de l'association Contenir (nom LigneCommande), clés d'abord puis la quantité.`,target:"LigneCommande ( #IDCommande , #IDProduit , Qte )",tiles:shuffle("LigneCommande ( #IDCommande , #IDProduit , Qte )".split(" ").concat(["IDCommande","#Qte","#IDClient"])),expl:"n:n porteuse : règle 3, nouvelle table dont la clé primaire est le couple (#IDCommande, #IDProduit), soulignée. Qte devient un attribut : LigneCommande (<u>#IDCommande, #IDProduit</u>, Qte)."},
 {id:"an1-m4",type:"input",kind:"Exercice 1 · étape 3 : schéma relationnel",q:`${AN1}Combien de <b>tables</b> contient le schéma relationnel complet ?`,answers:["5","cinq"],expl:"5 tables : Client (<u>IDClient</u>, NomClient, EmailClient) ; Produit (<u>IDProduit</u>, NomProduit, PrixProduit) ; Employe (<u>IDEmpl</u>, NomEmpl, PrenomEmpl) ; Commande (<u>IDCommande</u>, DateCommande, Statut, #IDEmpl, #IDClient) ; LigneCommande (<u>#IDCommande, #IDProduit</u>, Qte)."},
 {id:"an1-m5",type:"mcq",kind:"Exercice 1 · étape 3 : clés étrangères",q:`${AN1}Sur la copie, il faut préciser les clés étrangères. #IDProduit dans LigneCommande…`,choices:["référence la clé primaire IDProduit de la table Produit","référence la table Commande","est la clé primaire de LigneCommande à elle seule","peut contenir un produit qui n'existe pas"],answer:0,expl:"Une clé étrangère référence toujours la clé primaire d'une autre table (et la CIR interdit de pointer vers un produit inexistant). On écrit une ligne par clé étrangère."},
 anCard("an2-c1","Exercice 2 · cardinalités","MEDECIN","Un médecin assure aucune ou plusieurs consultations.","0,n","« aucune » → 0, « plusieurs » → n."),
 anCard("an2-c2","Exercice 2 · cardinalités","CONSULTATION","Une consultation est assurée par un et un seul médecin.","1,1","exactement un."),
 anCard("an2-c3","Exercice 2 · cardinalités","CONSULTATION","Le médecin prescrit aucun ou plusieurs médicaments lors d'une consultation.","0,n","une consultation peut ne rien prescrire."),
 {id:"an2-t",type:"mcq",kind:"Exercice 2 · cardinalités",fig:"a2526b",q:`${AN2}Où va le <b>nombre de prises</b> ?`,choices:["Dans l'association Prescrire (entre CONSULTATION et MEDICAMENT)","Dans MEDICAMENT","Dans CONSULTATION","Dans PATIENT"],answer:0,expl:"Le nombre de prises dépend de la consultation ET du médicament : il va dans l'association Prescrire (0,n – 0,n, type n:n, porteuse)."},
 {id:"an2-m1",type:"mcq",kind:"Exercice 2 · schéma relationnel",fig:"a2526b",q:`${AN2}Quelle est la bonne table <b>Consultation</b> ?`,choices:["Consultation (<u>NoConsultation</u>, DateConsult, #Matricule, #NoSS)","Consultation (<u>NoConsultation</u>, DateConsult)","Consultation (<u>#Matricule, #NoSS</u>, DateConsult)","Consultation (<u>NoConsultation</u>, DateConsult, #CodeMedicament)"],answer:0,expl:"Assurer et Concerner sont des 1:n où CONSULTATION est côté 1,1 : elle reçoit #Matricule (médecin) et #NoSS (patient). Prescrire est n:n : pas de clé médicament ici."},
 {id:"an2-m2",type:"build",exact:true,kind:"Exercice 2 · schéma relationnel",fig:"a2526b",q:`${AN2}Écris la table issue de Prescrire (nom Prescription), clés d'abord.`,target:"Prescription ( #NoConsultation , #CodeMedicament , NbPrises )",tiles:shuffle("Prescription ( #NoConsultation , #CodeMedicament , NbPrises )".split(" ").concat(["#Matricule","#NbPrises","CodeMedicament"])),expl:"n:n porteuse : Prescription (<u>#NoConsultation, #CodeMedicament</u>, NbPrises). Schéma complet : Medecin (<u>Matricule</u>, NomMedecin) ; Patient (<u>NoSS</u>, NomPatient) ; Medicament (<u>CodeMedicament</u>, Libelle) ; Consultation (<u>NoConsultation</u>, DateConsult, #Matricule, #NoSS) ; Prescription."}
];
SUBJECTS.r105.smart=SUBJECTS.r105.smart||[];
if(!SUBJECTS.r105.smart.some(d=>d.key==="annale2526"))SUBJECTS.r105.smart.splice(1,0,{key:"annale2526",tag:"Annale pas à pas",title:"Annale 2025-26 guidée",desc:"Le vrai sujet, question par question, dans l'ordre de la copie : entités, cardinalités, MCD, tables",bank:()=>ANNALE,ordered:true,subj:"r105"});


/* ===================== R1.01 : chrono de l'examen blanc ===================== */
{const o=document.getElementById("a3t"),go=document.getElementById("a3go"),rs=document.getElementById("a3reset");
 if(o&&go&&rs){const TOT=80*60;let left=TOT,run=null;try{const raw=localStorage.getItem("r101-tleft");if(raw!==null&&!isNaN(+raw))left=+raw}catch(e){}
  const fmt=s=>{const n=s<0;s=Math.abs(s);return (n?"−":"")+Math.floor(s/3600)+":"+String(Math.floor(s%3600/60)).padStart(2,"0")+":"+String(s%60).padStart(2,"0")};
  const paintT=()=>{o.textContent=fmt(left);o.classList.toggle("late",left<=0)};
  const keep=()=>{try{localStorage.setItem("r101-tleft",String(left))}catch(e){}};
  go.onclick=()=>{if(run){clearInterval(run);run=null;go.textContent="Reprendre";return}go.textContent="Pause";run=setInterval(()=>{left--;keep();paintT();if(left===0){SND.goal();toast("1 h 20 écoulée : pose le stylo et corrige-toi.")}},1000)};
  rs.onclick=()=>{clearInterval(run);run=null;left=TOT;keep();go.textContent="Lancer le chrono";paintT()};
  if(left!==TOT)go.textContent="Reprendre";paintT()}}

/* ===================== Toutes les fiches : imprimer ou télécharger d'un coup ===================== */
function ficheList(){const order=Object.keys(SUBJECTS);
  const R=[...document.querySelectorAll(".fiche-host")].map(h=>{const s=h.dataset.subj,base=String(s).slice(0,4);const pan=h.closest("[role=tabpanel]");const tid=pan?pan.id.replace(/^tab-/,""):"";
    const S=SUBJECTS[s]||SUBJECTS[base]||{};const t=(S.tabs||[]).find(x=>x[0]===tid);const pfs=()=>[...h.querySelectorAll(".pf")];
    return {subj:s,code:S.code||"",name:S.name||"",lab:t?t[1]:((h.querySelector(".pf-title b")||{}).textContent||"Fiche"),pages:pfs().length,pfs,o:Math.max(0,order.indexOf(base))*10+(s===base?0:1)}}).filter(x=>x.pages).sort((a,b)=>a.o-b.o);
  Object.entries(SUBJECTS).forEach(([k,S],si)=>{if(R.some(r=>r.subj===k))return;(S.tabs||[]).filter(t=>tabKind(t[0],t[1])[0]==="fiche").forEach(t=>{const art=document.querySelector(`#tab-${t[0]} article[data-doc]`);if(!art)return;
    const pfs=()=>{const d=document.createElement("div");d.className="pfdoc";const a=art.cloneNode(true);a.querySelectorAll(".doc-tools").forEach(x=>x.remove());d.appendChild(a);return [d]};
    R.push({subj:k,code:S.code,name:S.name,lab:t[1],pages:Math.max(1,Math.round(art.scrollHeight/1100))||1,approx:true,pfs,o:si*10})})});R.sort((a,b)=>a.o-b.o);
  const mine=()=>[...document.querySelectorAll(".myf-host .pf")];if(mine().length)R.push({subj:"",code:"Perso",name:"Les fiches que tu as créées",lab:"Mes fiches perso",pages:mine().length,pfs:mine,o:999});
  return R}
function printFiches(rows,title){if(!rows.length){toast("Coche au moins une fiche");return}const box=document.createElement("div");const w=document.createElement("div");w.className="pfwrap";box.appendChild(w);
  rows.forEach(r=>r.pfs().forEach(p=>w.appendChild(p.cloneNode(true))));if(rows.length===1&&rows[0].subj)box.dataset.subj=rows[0].subj;printEl(box,"fiche",title)}
function renderPrintCard(){const el=document.getElementById("dash");if(!el)return;const old=el.querySelector(".c-print");if(old)old.remove();
  const R=ficheList();const tot=R.reduce((a,r)=>a+r.pages,0);const card=document.createElement("div");card.className="card c-print";card.id="toutes-fiches";
  card.innerHTML=`<div class="card-h"><h3><span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V3h12v6"/><rect x="3" y="9" width="18" height="8" rx="2"/><path d="M6 14h12v7H6z"/></svg></span>Toutes les fiches</h3></div>
  <p class="muted" style="margin:0">Toutes tes fiches de révision au même endroit. Coche ce que tu veux, puis imprime. Le fichier qui s'ouvre lance l'impression : choisis ton imprimante, ou « Enregistrer en PDF » pour tout télécharger d'un coup.</p>
  <div class="pall">${R.map((r,i)=>`<div class="pall-r" style="--encre:${ENC[r.code]||"var(--ink)"}"><label><input type="checkbox" data-pi="${i}" checked><span class="scode">${esc(r.code)}</span><span class="pall-t">${esc(r.lab)}<small>${esc(r.name)}</small></span></label><span class="pall-n">${r.approx?"≈ ":""}${r.pages} p.</span><button type="button" class="linkbtn" data-p1="${i}">imprimer</button></div>`).join("")}</div>
  <div class="actions" style="justify-content:flex-start"><button type="button" class="btn" data-pall>⎙ Tout imprimer · ${tot} pages</button><button type="button" class="btn ghost" data-psel>Imprimer la sélection</button><button type="button" class="linkbtn" data-ptog>Tout décocher</button></div>`;
  el.appendChild(card);
  const boxes=[...card.querySelectorAll("[data-pi]")];const sel=()=>boxes.filter(b=>b.checked).map(b=>R[+b.dataset.pi]);
  const upd=()=>{const n=sel().reduce((a,r)=>a+r.pages,0);card.querySelector("[data-psel]").textContent=`Imprimer la sélection · ${n} page${n>1?"s":""}`;card.querySelector("[data-ptog]").textContent=boxes.every(b=>b.checked)?"Tout décocher":"Tout cocher"};
  boxes.forEach(b=>b.onchange=upd);upd();
  card.querySelector("[data-ptog]").onclick=()=>{const on=!boxes.every(b=>b.checked);boxes.forEach(b=>b.checked=on);upd()};
  card.querySelector("[data-pall]").onclick=()=>printFiches(R,"Révisions BUT1 - toutes les fiches");
  card.querySelector("[data-psel]").onclick=()=>printFiches(sel(),"Révisions BUT1 - fiches choisies");
  card.querySelectorAll("[data-p1]").forEach(b=>b.onclick=()=>{const r=R[+b.dataset.p1];printFiches([r],`${r.code} ${r.lab}`)})}
{const b=renderDash;renderDash=function(){b.apply(this,arguments);try{renderPrintCard()}catch(e){console.error(e)}}}
document.querySelectorAll(".ftools").forEach(ft=>{if(ft.closest(".myf-item")||ft.querySelector(".xa"))return;ft.insertAdjacentHTML("beforeend",`<button type="button" class="linkbtn xa" data-allp>Toutes les fiches, tout imprimer →</button>`)});
document.addEventListener("click",e=>{if(!e.target.closest("[data-allp]"))return;showDash();setTimeout(()=>{const c=document.getElementById("toutes-fiches");if(c)c.scrollIntoView({behavior:"smooth",block:"start"})},80)});

/* ===================== Démarrage ===================== */
loadLocal();
loadNotesLocal();
LOCAL=localDecks();
{let v="dash";try{v=localStorage.getItem("r106-view")||"dash"}catch(e){}
 const h=location.hash.slice(1);
 if(SUBJECTS[h])setSubject(h);else if(h==="dash"||v==="dash")showDash();else{VIEW="subj";buildTabs();let t="learn";try{t=localStorage.getItem("r106-tab")||"learn"}catch(e){}showTab(t)}}
refreshDecks();
renderHome();renderMine();renderStats();
function refreshAll(){renderStats();buildTabs();if(VIEW==="dash")renderDash();else if(!L){renderHome()}}
(async()=>{
  if(!window.claude)return;
  try{
    const [d,u,s]=await Promise.all([claude.use("db"),claude.use("user"),claude.use("sample")]);
    sample=s;
    if(u){try{const me=await u.me();ME.name=me&&me.name||""}catch(e){}
      try{CAN_SHARED=(await u.canEdit())===true}catch(e){}
      if(VIEW==="dash")renderDash()}
    if(d){
      db=d;
      db.collection("decks").onSnapshot(snap=>{SHARED=snap.docs.map(x=>Object.assign({id:x.id},x.data()));refreshDecks()},()=>{});
      db.doc("meta/plan").onSnapshot(d=>{PLAN=d.exists?d.data():null;refreshAll()},()=>{});
      if(u){uid=await u.id();
        if(uid){progRef=db.collection("data/users/"+uid).doc("progress");
          try{const g=await progRef.get();if(g.exists){const r=g.data();ME.sync=true;
            state.xp=Math.max(state.xp,r.xp||0);state.streak=Math.max(state.streak,r.streak||0);
            if(!state.lastDay||(r.lastDay&&r.lastDay>state.lastDay))state.lastDay=r.lastDay;
            state.mastery=Object.assign({},r.mastery||{},state.mastery);state.miss=Object.assign({},r.miss||{},state.miss||{});
            state.feel=Object.assign({},r.feel||{},state.feel||{});state.tasks=Object.assign({},r.tasks||{},state.tasks||{});state.examFeel=Object.assign({},r.examFeel||{},state.examFeel||{});
            for(const k of ["goal","budget","seenIntro","planCheered"])if(state[k]==null&&r[k]!=null)state[k]=r[k];
            const dd=Object.assign({},r.daily||{});for(const [k,v] of Object.entries(state.daily||{}))dd[k]=Math.max(dd[k]||0,v);state.daily=dd;saveLocal();refreshAll()}
            else save()}catch(e){}
          notesRef=db.collection("data/users/"+uid).doc("notes");
          notesRef.onSnapshot(d=>{if(d.exists&&Array.isArray(d.data().items)){NOTES=d.data().items;try{localStorage.setItem("r106-notes",JSON.stringify(NOTES))}catch(e){}renderNotes()}else if(NOTES.length){saveNotes()}},()=>{});}}
    }
  }catch(e){}
})();
</script>



</body></html>