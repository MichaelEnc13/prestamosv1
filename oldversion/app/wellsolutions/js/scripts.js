// window.onload = function(){

//     document.querySelector(".swal-button").classList.add("return"); 
//     document.querySelector(".return").addEventListener("click",function(){
//         history.back(-1);
//     });
// }


 

//  var form = document.querySelector(".saldar-prestamo");
// form.onsubmit = function(e)
// {
//     var respuesta = confirm("Se saldará este préstamo, Deseas continuar?    ");

//     if (respuesta) {
        
//     }else{
//         e.preventDefault();
//     }

   

   
// }

    function captura()
    {

        window.print();


    }


// añadir monto a pagar automaticamente.

function returnBack()
{
    window.history.back();
}

function cntCuotas()
{

    var monto = document.getElementById('montoPrestado').value;
    var interes = document.getElementById('interes').value;

    interes  = interes/100;

    var meses = document.getElementById('meses').value;
    meses = parseFloat(meses);
    
    var totalCuotas =  monto * interes;


    var  InteresGenerado = document.getElementById('InteresGenerado').value = parseFloat(totalCuotas) * meses; 

    var total = document.getElementById('sumatoria').value =  parseFloat(monto) + parseFloat(InteresGenerado);

    var cuotas = document.getElementById('cuotas').value;

     document.getElementById('total').value = parseInt( total / parseFloat(cuotas));
 
   
    
  
}

