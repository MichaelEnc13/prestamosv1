/*  function installPromt() {
     var session = sessionStorage.getItem("installPromt");
     if (session == null) {
         sessionStorage.setItem("installPromt", true)
         installPromt()
     }

     if (session == "true") {
         $("#installPrompt").css("left", "50%");
     }


     $("#installPrompt .close ").click(function(e) {
         e.preventDefault();
         $("#installPrompt").css("left", "-50%");
         sessionStorage.setItem("installPromt", false)
     });
 }

 var c = 0;
 var count = setInterval(() => {
     c++;
     if (c == 10) {
         clearInterval(count);
         installPromt()

     }



 }, 1000);


 let deferredPrompt;


 window.addEventListener('beforeinstallprompt', (event) => {
     event.preventDefault();
     deferredPrompt = event;
     installPromt()
     console.log("evento before ejecutado")

 })

 $("#installButton").click(async function(e) {
     console.log('👍', 'butInstall-clicked');
     const promptEvent = window.deferredPrompt;
     console.log(window.deferredPrompt);

 }); */