function clientViewCards(id = "") {
    $("#client_container").load("views/client/client.card.php");

    var elemt = document.getElementById($(`#cid_${id}`).prev().attr("id"));
    if (id != "") {
        elemt.scrollIntoView();

    }
};


$('#nPhone').usPhoneFormat({ format: 'xxx-xxx-xxxx' });




$("#add_client_form").submit(function(e) { return false; });
//aqui se edita la informacion del cliente.

//Funcion para añadir un nuevo cliente
function addClient() {
    var data = {
        add: "",
        name: $("input[name=name]").val(),
        lName: $("input[name=lName]").val(),
        cel: $("input[name=cel]").val(),
        id_doc: $("input[name=id_doc]").val(),
        dir: $("input[name=dir]").val()
    }


    $.post("controller/client.actions.php", data,
        function(data) {
            if (data != false) {
                clientViewCards("");
                /* $("#client_container").html(data); */
                //swal("Hecho", "Nuevo cliente insertado", "success");
                $(".addClient ").removeClass("show_window");
                alertify.success("Nuevo cliente insertado")
            } else {
                swal("Error", "Ya existe un cliente", "error");
            }
        }

    );

}

function edit(id) {
    var data = {
        edit: id,
        name: $("input[name=edit_name]").val(),
        lName: $("input[name=edit_lName]").val(),
        cel: $("input[name=edit_cel]").val(),
        id_doc: $("input[name=edit_id_doc]").val(),
        dir: $("input[name=edit_dir]").val()
    }
    $.get(`controller/client.actions.php`, data,
        function(data) {
            if (data == "true") {
                swal("Hecho", `La informacion ha sido editada`, "success").then(() => {
                    $(".global_overlay").removeClass("global_overlay_show");
                    $(".edit_client_window").removeClass("show_window");
                });

                clientViewCards(id)

            } else {
                swal("Error", `La informacion no se pudo editar, intenta otra vez.`, "info");
            }


        }
    );
}

/* para añadir o  eliminar o editar clientes */
$("#client_container").click(function(e) {
    // console.log(e.target.id);
    var id = e.target.id;



    if (e.target.classList == 'delete_client') { //eliminar cliente

        swal({
                title: `Se eliminará a : ${e.target.name}`,
                text: "Deseas continuar?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.get(`controller/client.actions.php?delete=${id}`,
                        function(data) {
                            if (data) {
                                swal("Eliminado", "", "success");
                            } else {
                                swal("Error", "", "error");
                            }


                            clientViewCards(id);
                        }

                    );

                    swal("Cliente eliminado!", {
                        icon: "success",
                    });


                } else {
                    swal("accion cancelada");
                }
            })
    } else if (e.target.classList == 'edit_client') { //editar cliente

        $(".global_overlay").addClass("global_overlay_show");
        $(".edit_client_window").toggleClass("show_window");
        $(".edit_client_window").load(`views/client/editClient.form.php?id=${id}`);

    } else if (e.target.classList == 'addClient_btn') { //añadir cliente

        $(".addClient").addClass("show_window");
        $(".global_overlay").addClass("global_overlay_show");
    }

});

$(".global_overlay").click(function(e) {

    $(".actions_loans_forms").removeClass('show_window');
    $(".global_overlay").removeClass('global_overlay_show');

});
$(".actions_loans_forms").click(function(e) {
    /* console.log(e.target.classList); */
    if (e.target.classList == 'close_window') {
        $(".actions_loans_forms").removeClass('show_window');
        $(".global_overlay").removeClass('global_overlay_show');
    }




});

//buscador de clientes registrados
$("#client").keyup(function(e) {
    $.get(`controller/client.actions.php?search=${e.target.value}`,
        function(data) {

            $("#client_container").html(data);
        }
    )

});



function getNumberFormat(cant) {
    return new Intl.NumberFormat('es-DO', { style: 'currency', currency: 'DOP' }).format(cant)
}

function getMonthDays() {
    var fecha = new Date();
    var mes = fecha.getMonth();
    var dias = 0;

    if (mes == 1) {
        dias = 28;
    } else if (mes == 3 || mes == 5 || mes == 8 || mes == 10) {
        dias = 30;
    } else {
        dias = 31;
    }

    return dias;
}


function cals() {
    var monto = parseFloat($("#monto").val());
    var interes = parseFloat($("#interes").val());
    var meses = $("#meses").val();
    meses = parseFloat(meses);

    //convertir el interes a decimales para sacar el porcentaje
    interes = parseFloat(interes / 100);

    //interes generado con respecto a los meses 
    $("#int_generado").val((monto * interes) * (meses))
    var int_generado = $("#int_generado").val();
    var sumatoria = parseFloat(monto) + parseFloat(int_generado);

    $("#sumatoria").val(sumatoria);


    var cuotas = $("#cuotas").val();
    var total = $("#sumatoria").val();
    if (isFinite(cuotas) != false) {
        var calTotal = parseFloat(total) / parseFloat(cuotas);
    }

    $("#total").val(parseInt(calTotal));
    //console.log(total, cuotas, int_generado, sumatoria, interes, meses, monto)
    //console.log(total / parseFloat(cuotas))
    return meses;
}

var toPay;

function getPayMode(meses, payMode) {


    if (payMode != "") {
        if (payMode == 0) {
            toPay = getMonthDays()
        } else if (payMode == 4) {
            toPay = payMode;
        } else if (payMode == 2) {
            toPay = payMode;
        } else if (payMode == 1) {
            toPay = payMode;
        }
        $("#cuotas").val(toPay * meses);
        cals();

    }
}


//se usa para que cuando se elija la modalidad de pago 
//se pongan la cantidad de cuotas que se van a pagar

$("#paymode").change(function(e) {

    getPayMode(cals(), $("#paymode").val());
});
$("#monto").keyup(function(e) {

    cals();

});
$("#interes").keyup(function(e) {
    if ($("#meses").val() != "" && $("#meses").val() != NaN) {
        cals();
    }
});

//para ejecutar la funcion correctamente sin error.
function checkMonth() {
    if ($("#meses").val() != "" && $("#meses").val() != NaN) {;
        $("#cuotas").val(
            cals() * $("#paymode").val()
        );
    }

}
$("#meses").keyup(function(e) {

    checkMonth()

});

$("#cuotas").keyup(function(e) {
    cals();
});



$(".sendMessage").click(function(e) {
    var phone = e.target.name;

    window.open(`https://wa.me/send?phone=1${phone}&text=Buenas!`, " _blank")

});

function loadPhoto(id) {
    /*     console.log("valor cambiado " + e.target.value)
        var inId = $(".selectFile").data("photoIn"); */
    //var cid = $(`#cid_${id}`).val();
    var form = new FormData(document.getElementById(`uploadForm_${id}`));

    $.ajax({

        url: "controller/client.actions.php",
        data: form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(response) {
            //console.log(response)
            clientViewCards(id)
        }
    });
}

function deletePhoto(id) {

    swal("Seguro que quieres borrar la miniatura?", {
            buttons: ["Cancelar", "Continuar"],
            cancel: false

        }

    ).then((value) => {
        if (value == true) {
            $.get(`controller/client.actions.php?dp=${id}`,

                function(data) {
                    if (data == true) {
                        clientViewCards(id)
                        alertify.success("<i class=\"far fa-check-circle\"></i> La imagen ha sido borrada.")

                    }


                })
        }

    });
}