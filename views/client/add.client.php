<div class="addClient actions_loans_forms">
    <span class="close_window" >
        <img src="src/icons/close.svg" class="close_window">
    </span>
    <h2>Añadir nuevo cliente</h2>

    <form action="POST" id="add_client_form" enctype="multipart/form-data" >

        <label for="">Nombre:</label>
         <input type="text" name="name" placeholder="...">

        <label for="">Apellido:</label>
         <input type="text" name="lName" placeholder="...">

        <label for="">Celular:</label>
         <input type="text" name="cel" id="nPhone" placeholder="...">

        <label for="">Documento de Identidad:</label>
         <input type="text" name="id_doc" placeholder="...">

        <label for="">Dirección:</label>
         <input type="text" name="dir" placeholder="...">

         <button class="btn" id="add_client" onclick=" addClient()">Añadir</button>


    </form>
</div>

 