/* acción para ver los préstamos de un cliente en específico. 
Mediante un POST envio el ID al controlador de sesion temporar y creo una session con el ID
al momento de recibir la respuesta redirijo a la página de destino.
*/
$(".viewContainer").click(function(e) {


    if (e.target.classList == 'viewTicketBtn') {
        var pid = e.target.id;
        var data = {
            pid: pid
        }
        $.post("controller/tmp_session.php", data, (url) => {
            location.href = url;
        });

        //console.log(e.target.classList, pid);
    }



});




$("#client_container").click(function(e) {
    if (e.target.classList == 'btnAction') {
        var cid = e.target.id;
        var data = {
            cid: cid
        };

        $.post("controller/tmp_session.php", data,
            (url) => {
                location.href = url
            }
        );
    }



});

$(".clientWithDebt").click(function(e) {
    /* console.log(e.target.classList); */
    if (e.target.classList != "clientWithDebt") {
        var cid = e.target.id;
        /*  console.log(cid); */
        var data = {
            cid: cid
        }
        $.post("controller/tmp_session.php", data, (url) => {
            location.href = url;
            /*  console.log(url); */
        });
    }

});