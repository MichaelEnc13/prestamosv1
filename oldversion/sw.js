 self.addEventListener('install', (event) => {
     event.waitUntil(
         caches.open('v1').then((cache) => {
             return cache.addAll(

                 [
                     "/offline.php",
                     "/src/app.css",
                     "/src/icons/no-wifi.svg",
                     "/src/appIcon/favicon.png",


                 ]

             );
         })
     );



 })




 self.addEventListener("fetch", event => {
     const request = event.request,
         url = request.url;

     // If we are requesting an HTML page.
     if (request.headers.get("Accept").includes("text/html")) {
         event.respondWith(
             // Check the cache first to see if the asset exists, and if it does, return the cached asset.
             caches.match(request)
             .then(cached_result => {
                 if (cached_result) {
                     return "offline.php";
                 }
                 // If the asset is not in the cache, fallback to a network request for the asset, and proceed to cache the result.
                 return fetch(request)
                     .then(response => {
                         const copy = response.clone();
                         // Wait until the response we received is added to the cache.
                         event.waitUntil(
                             caches.open("pages")
                             .then(cache => {
                                 if (response.redirected != false) {
                                     return cache.put(request, response);
                                 }
                                 /*   console.log(request, response); */

                             })
                         );
                         return response;
                     })
                     // If the network is unavailable to make a request, pull the offline page out of the cache.
                     .catch(() => caches.match("../offline.php"));
             })
         ); // end respondWith
     } // end if HTML
 });