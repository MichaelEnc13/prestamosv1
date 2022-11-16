<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/text_font.css"  >
    <link rel="stylesheet" href="src/app.css">
    <link rel="shortcut icon" href="src/appIcon/favicon.png" type="image/x-icon">
    <title>Offline</title>
</head>
<body>
<div class="container_offline">
<img src="src/icons/no-wifi.svg" alt="">
    <h1>No hay conexion</h1>
    <p>Por favor revisa tu conexión a internet.</p>
     
    <button onclick="location.reload()">Reconectar</button>
    <p>Vamos a volver a intentarlo en 30 segundos</p>
    <script src="src/service-worker.js"></script>
</div>
</body>
</html>

<script>

 
setTimeout(
    ()=>{
        location.reload()
    },30000
)

</script>