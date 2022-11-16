document.querySelector(".r").style.display = "none";
document.querySelector(".fa-check-circle").style.display="none";
document.querySelector(".fa-times-circle").style.display="none",color="#bb2124";

 
document.querySelector("#cpass").addEventListener("keyup",()=>{
    
    var pass = document.getElementById("pass").value;
    var cpass = document.getElementById("cpass").value;
    if ( cpass.length>1 && cpass !== pass) {
        document.querySelector("#error").innerHTML = "Las contraseñas no coinciden";
        document.querySelector("#error").style.color="#bb2124";
        document.querySelector(".fa-times-circle").style.display="block";
        document.querySelector(".fa-check-circle").style.display="none";


        document.querySelector(".btn").style.display = "none";

    }else
    {
        if ( cpass == pass)
        {
            document.querySelector("#error").innerHTML = "Las contraseñas coinciden";
            document.querySelector("#error").style.color="#22bb33";

            document.querySelector(".fa-check-circle").style.display="block";
            document.querySelector(".fa-times-circle").style.display="none";

            document.querySelector(".btn").style.display = "block";


        }

    }

});
