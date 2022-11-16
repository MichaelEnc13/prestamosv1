$(".is").click(function() { window.location.replace("login"); return false; });
$(".ir").click(function() { window.location.replace("login?register=true"); return false; });
$(".form input").each(function() {
    $(this).attr("required", "");

});
$(".form").submit(function(e) {
    return false;

});



$("#pass,#cpass").keyup(function(e) {
    var form = document.getElementById("register");
    var exist = document.getElementById("exist");
    var in1 = $("#pass").val();
    var in2 = $("#cpass").val();

    var checked = in1 === in2 ? true : false;
    if (in1 && in2 !== "" && checked == false) { exist.innerText = "Las contraseñas no coinciden" }

    $("#reg_btn").click(function(e) {

        if (checked == true) {
            var dt = new FormData(form);
            dt.append("register", "")
            $.ajax({
                url: "controller/user.actions.php",
                data: dt,
                processData: false,
                contentType: false,
                type: "POST",
                success: (response) => {
                    if (response == true) {
                        window.location.replace("login")
                    } else {
                        if (response == "u") {
                            exist.innerText = "Ya existe ese nombre de usuario";
                        } else if (response == "m") {
                            exist.innerText = "Ya existe ese correo registrado";
                        }
                    }


                }
            });
        } else {

        }


    });
});


$(".log_btn").click(function(e) {
    let user = $("#userName").val();
    let pass = $("#uPass").val();
    $.get(`controller/user.actions.php?login&userName=${user}&uPass=${pass}`,
        function(response) {
            if (response == "u") {
                exist.innerText = "No existe ese nombre de usuario.";
            } else if (response == false) {
                exist.innerText = "La contraseña es incorrecta.";
            } else {
                window.location.replace(response)
            }

        }
    );

});
$(".recover").click(function(e) {
    let mail = $("#recoverMail").val();
    $('BODY').jLoadingOverlay('')
    $.get(`controller/user.actions.php?recover&mail=${mail}`,
        function(response) {
            if (response == "1") {

                $('BODY').jLoadingOverlay('close')
                $("#exist").text("")
                location.replace("login?sent=true")
            } else if (response == "") {
                $('BODY').jLoadingOverlay('close')
                $("#exist").text("Esta dirección de correo no existe.");
            }

        }
    );

});
$(".changePass").click(function(e) {
    let pass = $("#nPass").val();
    let rpass = $("#rPass").val();
    if (rpass !== pass) {

        $("#exist").css("color", "red");
        $("#exist").text("Las contraseñas no coinciden.");
    } else {

        $('BODY').jLoadingOverlay('')
        $.get(`controller/user.actions.php?changePass&pass=${rpass}`,
            function(response) {
                if (response == "1") {

                    $('BODY').jLoadingOverlay('close')
                    $("#exist").text("")
                    location.replace("login?newPass=done")
                } else if (response == "") {
                    $('BODY').jLoadingOverlay('close')
                    $("#exist").text("Esta dirección de correo no existe.");
                }

                // console.log(response);
            }


        );
    }




});


$("#logOut,#logOut_suspended").click(function(e) {
    $.get(`controller/user.actions.php?logout`, (res) => {
        location.replace(res)
    })

});