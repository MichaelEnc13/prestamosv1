
$.getJSON("../changelog.json",
  function (data) {
    /* console.log(data.version); */
    const newVersion = data.version;
    var oldVersion = localStorage.getItem("version")
    
    if(oldVersion == null || oldVersion != newVersion){
        localStorage.setItem("version" ,newVersion)
        swal({
            title: `Nueva version: ${newVersion}`,
            text: `Fecha: ${data.date} \n  ${data.changes}`,
            icon: "info",
            button: "Cerrar",
          }).then(()=>{
           location.reload()
          });
    
    }    
    

});





