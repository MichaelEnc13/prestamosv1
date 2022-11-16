<div class="add_prest edit_prest actions_loans_forms">
 
<span class="close_window">
        <img src="src/icons/close.svg" alt="" class="closeThis">
</span>
<h2>Editar pr&eacute;stamo</h2>
<h4> </h4>
    <form method="GET" id="add_prestamo_form" onsubmit="return false">
            <label for="">Monto entregado:</label>
            <input type="number" onkeyup="cals()" id="monto" placeholder="..." value="">

            <label for="">Inter&eacute;s:</label>
            <input type="number" onkeyup="cals()" id="interes" placeholder="..." value="">

            <label for="">Meses:</label>
            <input type="number" onkeyup="checkMonth()" id="meses" placeholder="..." value="">

            <label for="">Modalidad de pagos</label>
            <select name="paymode" id="paymode" onclick="getPayMode(cals(),this.value)">
                    <option value="" id="current">...</option>
                    <option value="">-----------------------------------</option>
                    
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
            <input type="number" id="total" placeholder="..." value="">

            <button class="btn" id="edit_prestamo" >Guardar</button>
    </form>   
    
</div>

 