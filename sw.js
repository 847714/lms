const CACHE_NAME = 'hybrid-app-cache-v1';
const urlsToCache = [
  '/',
  '/index.php',
  '/leaderboard.php',
  '/teacher-dashboard.php',
  '/teacher-profile.php',
  '/app.js',
  '/manifest.json'
];

self.addEventListener('install', event => {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Opened cache');
        // Ignore caching errors for non-existent files right now
        return cache.addAll(urlsToCache).catch(err => console.log('Cache addAll failed:', err));
      })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        // Cache hit - return response
        if (response) {
          return response;
        }
        return fetch(event.request);
      })
  );
});

self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
