"""Assemble l'appli en une seule page HTML (aperçu sans service worker)."""
import re,sys,os
root=os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
h=open(os.path.join(root,"index.html"),encoding="utf8").read()
body=h.split("<body>")[1].split("</body>")[0]
css=open(os.path.join(root,"style.css"),encoding="utf8").read()
def inl(m):
    src=m.group(1);js=open(os.path.join(root,src),encoding="utf8").read().replace("</script","<\\/script")
    return "<script>\n"+js+"\n</script>"
body=re.sub(r'<script src="([^"]+)"></script>',inl,body)
fonts=re.search(r'<link rel="stylesheet" href="(https://fonts[^"]+)">',h).group(1)
out=f'''<title>Révise BUT1</title>
<meta name="theme-color" content="#121212">
<link rel="stylesheet" href="{fonts}">
<style>{css}</style>
<script>window.IN_ARTIFACT=true</script>
{body}'''
open(sys.argv[1],"w",encoding="utf8").write(out)
print(len(out))
