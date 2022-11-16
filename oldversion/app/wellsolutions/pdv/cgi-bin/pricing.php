<?php include 'modulos/head.php' ?>

    <section class="planes">
        <p class="p_1">Planes adaptados a tus necesidades</p><br><hr><br><br>

        <div class="plan_container">
            <div class="plan">
                <div class="plan_miniatura">
                    <img src="iconos/ejercicio.svg" alt="">
                    <div class="desc">-20%</div>
                </div>

                <div class="plan_body">
                    <span>Plan b&aacute;sico</span><hr>
                        <p class="price">$17/ <small>mensual</small> </p></p>
                      
                    <ul class="plan_cat">
                       
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Copias de seguridad Diarias</li>
                        <li><span class="incluido"><i class="fas fa-times"></i></span> Cuentas de usuario ilimitadas <br> (limite: solo 3)</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Dominio gratis</li>
                        <li><span class="incluido"><i class="fas fa-times"></i></span>Catálogo web auto-actualizable</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Acceso desde cualquier ordenador</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Soporte los 7 días de la semana</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Impresión de reportes</li> 
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Actualizaciones constantes</li> 
                    </ul>
                    <a href="contact?p=<?php echo base64_encode('Plan básico')."&t=".base64_encode("b")?>"> <button class="activar">Solicitar activación</button></a>

                </div>
            </div>

            <div class="plan">
                <div class="plan_miniatura">
                    <img src="iconos/pesa.svg" alt="">
                    <div class="desc">-20%</div>
                </div>

                <div class="plan_body">
                <span>Plan avanzado</span><hr>
                <p class="price">$27/ <small>mensual</small> </p></p>
                <ul class="plan_cat">
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Copias de seguridad Diarias</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span> Cuentas de usuario ilimitadas</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Dominio gratis</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Catálogo web auto-actualizable</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Acceso desde cualquier ordenador</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Soporte los 7 días de la semana</li>
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Impresión de reportes</li> 
                        <li><span class="incluido"><i class="fas fa-check"></i></span>Actualizaciones constantes</li> 
                    </ul>

                       <a href="contact?p=<?php echo base64_encode('Plan avanzado')."&t=".base64_encode("a")?>"> <button class="activar">Solicitar activación</button></a>
                </div>
            </div>




        </div>

    </section>


<?php include 'modulos/footer.php' ?>