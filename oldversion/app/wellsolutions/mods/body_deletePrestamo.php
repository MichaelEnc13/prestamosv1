
<style>
.sureDelete
{
    width:60%;
    margin:auto;
    box-shadow:1px 1px 3px #3d3d3d;
}

form
{
    width:80%;
}

.btn
{
    display:block;
    width:40%;
    margin:auto;
    color:#fff;
    background-color:#c21111;
    border:none;
    padding:10px 8px;
    font-size:18px;
    border-radius:5px;
    cursor:pointer;
    margin-top:20px;
}
    
    @media  only screen and (max-width:720px) 
{
    .sureDelete
    {
        width:85%;
    }
}
    
</style>


<div class="sureDelete"> 
    
    <h2>Seguro que quieres eliminar este prestamo?</h2>
    <form action="" method="POST">
          
          <button name="dp" class="btn">Eliminar</button>  
          <br>
          <a href="prestamosClientes?c=<?php echo $_GET['c']?>">Regresar</a>
        
    </form>

</div>
