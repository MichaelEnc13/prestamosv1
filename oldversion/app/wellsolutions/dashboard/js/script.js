window.onload = function()
{
//   var absoluta = self.location.pathname;
//   var barra = absoluta.lastIndexOf("/");

//     var relativa = absoluta.substring(barra+"/".length , absoluta.length)

//     var enlace  = document.querySelectorAll('.nav_collapse li a');

//     for (let index = 0; index < enlace.length; index++) {
        
//         if (enlace[index].getAttribute('href') == relativa  ) {
            
//             enlace[index].style.backgroundColor = '#c4001d';
//             enlace[index].style.color = '#fff';
//         }
//     }
     


    var toggle  = document.querySelector('.toggle');
    var toggleL  = document.querySelector('.toggleL');
    var nav  = document.querySelector('.side_nav');
    var container  = document.querySelector('.container');

    

    toggle.addEventListener('click',function(){

            nav.classList.remove('show');
            container.classList.remove('hidden');
            toggle.style.display="none";
            toggleL.style.display="block";
            
    });

    toggleL.addEventListener('click',function(){

             nav.classList.add('show');
            container.classList.add('hidden');
            toggleL.style.display="none";
            toggle.style.display="block";
        
})
 
    
}