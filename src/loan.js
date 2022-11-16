function clientPrestCards(id = "") {

    var elemt = document.getElementById(`loan_${id}`);
    if (id != "") {
        elemt.scrollIntoView();

    }
    // console.log(elemt)

};
//agregar prestamo a cliente
alertify.set('notifier', 'position', 'top-right');
var cid; //client id, variable global
$(document).on("click", "#client_container", function(e) {
    if (e.target.classList == 'addDebtInner') {
        $(".global_overlay").addClass("global_overlay_show");
        $(".add_prest").addClass("show_window");
        $("#newPrestName").text(e.target.title);
        cid = e.target.id; //variable global declarada apra luego ser usada par añadir el préstamo. 
    }
});

//boton para insertar el nuevo prestamo   
$(document).on("click", "#add_prestamo", function(e) {


    var data = {
        add_prest: true,
        amount: $("#monto").val(),
        interest: $("#interes").val(),
        month: $("#meses").val(),
        paymode: $("#paymode").val(),
        int_generated: $("#int_generado").val(),
        sumatory: $("#sumatoria").val(),
        dues: $("#cuotas").val(),
        total: $("#total").val(),
        client_id: cid
    }
    var countEmpty = 0;
    $("#add_prestamo_form input").each(function(index, element) {

        if ($(element).val() == "") {
            countEmpty++
        }

    });
    if (countEmpty == 0) {
        $.post("controller/prestamos.actions.php", data,

            function(data) {
                if (data == true) {
                    alertify.success('Prestamo agregado con exito');
                    $("#add_prestamo_form input, #add_prestamo_form select").each(function(index, element) {
                        $(this).val("");

                    });

                } else {
                    alertify.error('Ha ocurrido un error al crear el prestamo');

                }
                $(".add_prest").removeClass("show_window");


            }
        ); // end post
    } else {
        swal("Falta información!", "Debes llenar todos los campos.", "warning")
    }

});

$("#add_prestamo_form input, #add_prestamo_form select").each(function() {
    $(this).keyup((e) => {
        if (e.keyCode == 27) {
            $(".add_prest").toggleClass("show_window");
        }
    });

});

$(document).on("click", ".ticketData", function(e) {
    if (e.target.id === "pdfBtn") {

        var element = document.querySelector(".pdfContainer");
        var opt = {
            margin: 2,
            filename: 'recibo.pdf',
            image: { type: 'jpeg', quality: 0.98 },

        }
        html2pdf().from(element).set(opt).save();

    }

});

$(document).on("click", ".loans_data_container", function(e) {

    var id = e.target.id;
    var localName = e.target.localName

    if (id !== "" && localName == "div") {
        $(`#${id} .loan_controls`).toggleClass("show")
        $(".loan").each(function(index, element) {
            var attr = $(element).attr("id");
            if (attr !== id) {
                $(`#${attr} .loan_controls`).removeClass("show")
            }
        });
    }



});

function overlay(action) {
    $(".overlay").css("display", action);
}


$(document).on("click", ".overlay", () => {
    overlay("none")
    $(".applyPayment,.applyPay").removeClass("show");
    $("edit_prest ").removeClass("show_window");

})


$(document).on("click", "#returnBack", function(e) {

    window.history.go(-1)
});




$(document).on("click", ".loans_data_container", function(e) {
    /*  console.log(e.target.classList); */

    if (e.target.classList == 'closeThis') {
        $(".actions_loans_forms ").removeClass("show_window");
        $(".overlay ").css("display", "none");
    } else if (e.target.classList == 'overlay') {
        $(".actions_loans_forms ").removeClass("show_window");
        $(".overlay ").css("display", "none");
    }

});

function closeApplyPay() {
    $(".applyPay,.applyPayment").removeClass("show");
    overlay("none")
}


function addPayForm(pid) {

    $(`#applyPay_${pid}`).addClass("show");

    overlay("block");

} //end addpay function



$(document).on("click", ".applyPay", function(e) {
    var inputId = e.target.id;
    if (inputId == "amount") {
        var inputClass = e.target.classList;
        var val = $(`.${inputClass}`).val();
        if (val == 0) e.target.select();
    }




});

function addPay(pid, cid, p, paid_dues, arrier) {
    function addPay_get(data) {
        $.get("controller/prestamos.actions.php", data,
            function(data) {
                //console.log(data);
                if (data == true) {

                    overlay("none");
                    $(".applyPayment").removeClass("show");

                    $(`#applyPay_${pid} #amount`).val("")
                    $(".loans_data_container").load(`views/loan/loans.client.php?cid=${cid}`);
                    clientPrestCards(pid)
                    alertify.success("<i class=\"far fa-check-circle\"></i> Pago aplicado correctamente")
                } else {
                    alertify.error("<i class=\"fas fa-exclamation-triangle\"></i>  Ha ocurrido un error")

                }
            }


        ); // end get
    }

    var amount = $(`#applyPay_${pid} #amount`).val();
    var payment = p;
    if ($(`#applyPay_${pid} input:checked`).val() == "1") {
        amount = parseFloat(amount) + parseFloat(payment);
        payment = payment - p;
    }

    var data = {
        addPay: true,
        prest_id: pid,
        client_id: cid,
        amount: amount,
        apply_payment: payment,
        payMethod: $(`#payMethod_${pid}`).val(),
        lastPayment: p,
        dues: $(`#applyPay_${pid} #dues_cant`).val(),
        paid_dues: parseInt(paid_dues) + parseInt($(`#applyPay_${pid} #dues_cant`).val()),
        arriers: arrier
    }

    /*     var countEmpty = 0;
        $("#applyPaid_form input").each(function (index, element) {
    
            if ($(element).val() == "") {
                countEmpty++
            }
            console.log($(element).val());
        });
     */



    if (amount != 0) {
        var estimated = $("#estimated").val();
        if (parseInt(estimated) != parseInt(amount)) {

            swal({
                    title: "Atencion",
                    text: "Al parecer el monto ingresado no es igual al monto estimado a cobrar",
                    icon: "warning",
                    buttons: ["Revisar", "Aplicar de todos modos"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        addPay_get(data)
                    }
                });


        } else {
            addPay_get(data)
        }


    } else {
        swal("Pago no aplicado", "El monto es igual a cero", "warning")
    }





};


function applyPayment(id, cid) { // para aplicar abono

}

$(document).on("click", ".deposit", function(e) {
    var prestId = e.target.dataset.prestid
    var cid = e.target.dataset.cid
    overlay("block");
    $(".applyPayment").addClass("show");

    $("#apply_payment_btn").attr("data-prestId", prestId);
    $("#apply_payment_btn").attr("data-cid", cid);

});

$(document).on("click", "#apply_payment_btn", function(e) {
    var prestId = e.target.dataset.prestid
    var cid = e.target.dataset.cid
    var data = {
        payment: true,
        prest_id: prestId, // in del prestamo
        cid: cid, // id  del cliente
        amount: $(".applyPayment #amount").val() // monto a abonar
    }

    if ($(".applyPayment #amount").val() != "") {
        $.get("controller/prestamos.actions.php", data,
            function(data) {

                if (data == true) {
                    overlay("none");
                    $(".applyPayment").removeClass("show");
                    //    console.log(data);
                    $("#amount").val("")
                    $(".viewContainer").load(`views/loan/loan.data.php?cid=${cid}`);
                    alertify.success("<i class=\"far fa-check-circle\"></i> Abono aplicado correctamente")
                } else {
                    alertify.error("<i class=\"fas fa-exclamation-triangle\"></i>  Ha ocurrido un error")
                }

            }
        ); // end of GET
    } else {
        swal("No realizado", "Debes ingresar un monto", "info");
    }



});

function editPrestWindow(data) {
    overlay("block");
    $(".add_prest").toggleClass("show_window");
    $("#monto").val(data.amount);
    $("#interes").val(data.interest);
    $("#meses").val(data.month);
    var paymode = "";
    if (data.paymode == 4) {
        paymode = "Semanal";
    } else if (data.paymode == 2) {
        paymode = "Quincenal";
    } else if (data.paymode == 1) {
        paymode = "Mensual";
    } else {
        paymode = "Diario";
    }
    $("#paymode #current").text(paymode + "  (actual)");
    $("#paymode #current").val(data.paymode);

    $("#int_generado").val(data.int_generated);
    $("#sumatoria").val(data.sumatory);
    $("#cuotas").val(data.dues);
    $("#total").val(data.total);

    $("#edit_prestamo").click(function(e) {
        e.preventDefault();
        var dataToEdit = {
            edit_prest: true,
            amount: $("#monto").val(),
            interest: $("#interes").val(),
            month: $("#meses").val(),
            paymode: $("#paymode").val(),
            int_generated: $("#int_generado").val(),
            sumatory: $("#sumatoria").val(),
            dues: $("#cuotas").val(),
            total: $("#total").val(),
            client_id: data.client_id,
            prest_id: data.prest_id
        }

        $.get("controller/prestamos.actions.php", dataToEdit,
            function(done) {
                if (done == true) {

                    $(".add_prest").toggleClass("show_window");
                    $(".viewContainer").load(`views/loan/loan.data.php?cid=${data.client_id}`);
                    alertify.success("<i class=\"far fa-check-circle\"></i> Préstamo editado")
                } else {
                    alertify.error("<i class=\"fas fa-exclamation-triangle\"></i>  Ha ocurrido un error")
                }
            }

        );
    });


}


function deletePrest(id, cid) {
    overlay("block");
    swal({
            title: "Seguro que quieres borrar el préstamo?",
            text: "Si contunuas, también serán borrados sus recibos...",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.get(`controller/prestamos.actions.php?delete=${id}`,
                    function(done) {
                        if (done == true) {
                            overlay("none");
                            $(".viewContainer").load(`views/loan/loan.data.php?cid=${cid}`);

                        } else {
                            alertify.error("<i class=\"fas fa-exclamation-triangle\"></i>  El préstamo no se ha podido borrar")

                        }
                    }
                );


                swal("El préstamo ha sido borrado", {
                    icon: "success",
                });
            } else {
                overlay("none");
                swal("Acción cancelada...");
            }
        });
}