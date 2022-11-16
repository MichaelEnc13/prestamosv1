$(".op,.dropDown_overlay").click(function(e) {
    $(".dropDown_overlay").toggleClass("dropDown_overlay_show");
    $(".dropDown").toggleClass("more_opt");
});

$("#settings").submit(function(e) {
    return false;
});



$("#save").click(function(e) {

    var amnt = $("#arrier").val();
    /* var dayArrier = $("#dayArrier").val(); */
    var noti = $("#settings input[type=radio]:checked").val();
    var notiCheck = document.querySelector('#settings input[type=radio]');

    var data = {
        changeSetting: true,
        amount_arriers: amnt,
        daysToArriers: 0,
        notification: noti
    }

    $.get("controller/user.actions.php", data,
        function(res) {
            if (res == 1) alertify.success('Success message');
            else alertify.error('Error message');

        }

    )
});




$("#selectImg").change(function(e) {
    var dt = new FormData(document.getElementById("editLogo"));
    dt.append("editLogo", "")
    console.log("Imagen obtenida");
    console.log($("#selectImg").val());
    $.ajax({
        type: "POST",
        url: "controller/user.actions.php",
        data: dt,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
        }
    });
});