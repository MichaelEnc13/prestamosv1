/* acción para ver los préstamos de un cliente en específico. 
Mediante un POST envio el ID al controlador de sesion temporar y creo una session con el ID
al momento de recibir la respuesta redirijo a la página de destino.
*/
$(".loans_data_container").click(function (e) {

    var target = e.target.classList;
    var target_id = e.target.id;


    if (target == "viewTicketBtn") {
        var pid = $(`#${target_id} #pid`).val();
       var data = {
            pid: pid
        }
        $.post("controller/tmp_session.php", data, (url) => {
            location.href = url;
        });

       
    }
  



});




$("#client_container").click(function (e) {
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

$(".clientWithDebt").click(function (e) {
    var cid = e.target.id
   
    var data = {
        cid: cid
    }
    $.post("controller/tmp_session.php", data, (url) => {
        location.href = url;
    });

  

/*     console.log(cid); */
});