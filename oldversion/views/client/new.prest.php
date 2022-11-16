<div class="add_prest actions_loans_forms">
 
<span class="close_window"  >
        <img src="src/icons/close.svg" class="close_window">
</span>
<h2>Generar nuevo prestamo</h2>
<span>Cliente: <span id="newPrestName"></span></span>
    <form method="POST" id="add_prestamo_form" onsubmit="return false">
            <label for="">Monto entregado:</label>
            <input type="number" id="monto" placeholder="..." value="">

            <label for="">Inter&eacute;s:</label>
            <input type="number" id="interes" placeholder="..." value="">

            <label for="">Meses:</label>
            <input type="number" id="meses" placeholder="..." step=".01">

            <label for="">Modalidad de pagos</label>
            <select name="paymode" id="paymode">
                    <option value="">...</option>
                    <option value="0">Diario</option>
                    <option value="4">Semanal</option>
                    <option value="2">Quincenal</option>
                    <option value="1">Mensual</option>
            </select>

            <label for="">Interes Generado:</label>
            <input type="number" id="int_generado" placeholder="..." value="" disabled>

            <label for="">Sumatoria:</label>
            <input type="number" id="sumatoria" placeholder="..." value="" disabled>

            <label for="">Cuotas:</label>
            <input type="number" id="cuotas" placeholder="..." value="0">

            <label for="">Total:</label>
            <input type="number" id="total" placeholder="..."  step=".01">

            <button class="btn" id="add_prestamo" >Añadir</button>
    </form>   
    
</div>