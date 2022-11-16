 
// var on = document.querySelector('.toggleOn');
// var off = document.querySelector('.toggleOff');         
// var stt = document.querySelector('.status'); 
// var btn = document.querySelector('.modeToggle');
// var body = document.querySelector('body');
// var all = document.getElementsByTagName('DIV'); 

// document.querySelector('.toggleOn').addEventListener('click',()=>{
 
//         on.classList.add('on');
//         off.classList.add('off');
//         stt.innerHTML ="Modo oscuro!";
//         btn.style.boxShadow ="0px 0px 1px #2d2d2d";
//         body.style.backgroundColor="#121212"
//         btn.style.backgroundColor="#fff";
        
//         for (let index = 0; index < all.length; index++) {
      
//             all[index].style.backgroundColor ="#1f1b24";
//             all[index].style.color ="#fff";
//             all[index].style.boxShadow ="unset";

//         }
       
   
// });

// document.querySelector('.toggleOff').addEventListener('click',()=>{
 
//         on.classList.remove('on');
//         off.classList.remove('off');
//         stt.innerHTML ="Modo claro!";
//         btn.style.boxShadow ="1px 1px 3px #2d2d2d";
//         body.style.backgroundColor="#fff"

   

//         for (let index = 0; index < all.length; index++) {
      
//             all[index].style.backgroundColor ="#fff";
//             all[index].style.color ="#000";
//             all[index].style.boxShadow ="0px 0px 1px #2d2d2d";
//         }

//   });



document.querySelector('.lg').addEventListener('click',()=>
{
    document.querySelector('.dropDown').classList.toggle('show');
});

// document.querySelector('.user-w').addEventListener('click',()=>
// {
//     document.querySelector('.dropDown').classList.toggle('show');
// })

