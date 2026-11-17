/* Convertit les fichiers contenu/<matière>.json (thread « Mettre à jour Révisions BUT1 ») en data/ext.js
   Usage : node tools/import-contenu.js /chemin/vers/contenu */
const fs=require("fs"),path=require("path");
const dir=process.argv[2]||"/mnt/project-files/revisions-but1/contenu";
const out={};
for(const f of fs.readdirSync(dir).filter(f=>/^r\d+\.json$/.test(f))){
  const j=JSON.parse(fs.readFileSync(path.join(dir,f),"utf8"));const sid=f.replace(".json","");
  out[sid]={chapters:(j.chapters||[]).map(c=>({id:c.id,title:c.title,html:c.html})),
    questions:(j.questions||[]).filter(q=>q&&q.q&&(q.type==="mcq"?Array.isArray(q.choices):Array.isArray(q.answers)))
      .map(q=>{const o={id:"x-"+q.id,type:q.type,q:q.q,expl:q.expl||"",kind:q.kind||"",ch:q.ch};if(q.type==="mcq"){o.choices=q.choices;o.answer=q.answer}else o.answers=q.answers.map(String);return o})};
  console.log(sid,out[sid].chapters.length,"chapitres,",out[sid].questions.length,"questions");
}
fs.writeFileSync(path.join(__dirname,"..","data","ext.js"),"/* Généré par tools/import-contenu.js : ne pas modifier à la main */\nwindow.EXT="+JSON.stringify(out)+";\n");
