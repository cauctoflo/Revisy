/* Hors ligne : on met tout en cache, et on rafraîchit en arrière-plan quand le réseau revient */
const CACHE = "revise-v1";
const FILES = ["./", "index.html", "style.css", "app.js", "gens.js", "units.js",
  "data/agenda.js", "data/legacy.js", "data/r103.js", "data/r106.js", "data/ext.js",
  "manifest.webmanifest", "icons/icon.svg", "icons/icon-192.png", "icons/icon-180.png"];
self.addEventListener("install", e => {
  e.waitUntil(caches.open(CACHE).then(c => c.addAll(FILES)).then(() => self.skipWaiting()));
});
self.addEventListener("activate", e => {
  e.waitUntil(caches.keys().then(ks => Promise.all(ks.filter(k => k !== CACHE).map(k => caches.delete(k)))).then(() => self.clients.claim()));
});
self.addEventListener("fetch", e => {
  if (e.request.method !== "GET") return;
  e.respondWith(caches.open(CACHE).then(async c => {
    const hit = await c.match(e.request, {ignoreSearch: true});
    const net = fetch(e.request).then(r => {
      if (r && (r.ok || r.type === "opaque")) c.put(e.request, r.clone());
      return r;
    }).catch(() => hit);
    return hit || net;
  }));
});
