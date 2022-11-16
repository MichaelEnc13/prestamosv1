var img = "src/appIcon/icon-192.png";

var notify = localStorage.getItem("notify")


function notificar(title, content) {

    var notification = new Notification(title, { body: content, icon: img })
    notification.onclick = () => {
        window.open("clients");
    }
}

function checkNotificacions() {

    if (Notification.permission == 'pending' || Notification.permission == 'default' || Notification.permission == 'denied' && notify != true) {
        $(".notification").addClass("show_alert");



        $(".activate").click(function(e) {
            Notification.requestPermission().then((result) => {

                if (result == 'denied') {

                    localStorage.setItem("notify", false)

                } else if (result == 'granted') {

                    notificar("Perfecto", "Las notificaciones han sido activadas!")

                    $(".notification").removeClass("show_alert");



                } else {
                    localStorage.setItem("notify", true)
                }

            })
        });


    }

}

checkNotificacions();





window.addEventListener("online", () => {
    notificar("Online", "Se ha recuperado la conexión a internet")
})

window.addEventListener("offline", () => {
    notificar("Offline", "Has perdido la conexión a internet")
})