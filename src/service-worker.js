if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register("sw.js").then((reg) => {
        /* console.log(reg.scope);
         */
    }).catch((err) => {
        console.log(err);
    })

}