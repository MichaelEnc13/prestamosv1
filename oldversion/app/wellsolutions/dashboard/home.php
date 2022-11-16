<?php include 'mods/navbar.php' ?>
<?php include 'core/extract_active.php'; ?>

<?php include "res/user-status-styles.php" ?>
<div class="container">
<span class="toggleL "><i class="fas fa-bars"></i></span>

    <div class="client_status">
        <a href="home">
            <div class="status activo" style="border:1px solid #22bb33 ;">
                <span class="count"><?php echo $count_actives ?></span>
                <i style="font-size:40px;color:#22bb33;" class="far fa-check-circle"></i>
                <h2>Activos</h2>
            </div>
        </a>

        <a href="home?p">
            <div class="status pendiente" style="border:1px solid #f0ad4e ;">
            <span class="count"><?php echo $count_pendient ?></span>
                <i style="font-size:40px;color:#f0ad4e;" class="fas fa-exclamation-circle"></i>
                <h2>Pendientes</h2>
            </div>
        </a>

        <a href="home?s">
            <div class="status suspendido" style="border:1px solid #bb2124 ;">
            <span class="count"><?php echo $count_suspended ?></span>
                <i style="font-size:40px;color:#bb2124;" class="far fa-times-circle"></i>
                <h2>Suspendidos</h2>
            </div>
        </a>
       
    </div>

    <p class="all">Hay <?php echo $all; ?> usuario(s) Registrado(s)  </p>
    <form action="" method="get" class="buscar_usuario">
        <a href="home"><div style="margin-right:10px;"  ><i class="fas fa-sync-alt"></i></div></a>
        <input type="text" placeholder="Buscar..." name="q" id="">
        <button name="search"><i class="fas fa-search"></i></button>
    </form>

    <div class="app_users">
        <?php if($actives && !isset($_GET['q'])):?>
        
            <?php  foreach($actives as $actives):?>
                <div class="users">
                    <div class="user_data_container">
                            <span>Estado: <?php echo $actives['user_status']?></span>
                            <?php if($actives['user_status_value']=='1'): ?>
                                <span style="color:#22bb33;">Pago realizado</span>
                            <?php else: ?>

                                <span style="color:#c4001d;">Pago pendiente</span>
                            <?php endif; ?>
                            <p class="userData"> Nombre: <?php echo $actives['fname']." ".  $actives['lname']?></p>
                            <p class="userData"> Usuario: <?php echo $actives['user']?></p>
                            <p class="userData"> Correo: <?php echo $actives['mail']?></p>
                            <p class="userData"> Cédula: <?php echo $actives['cedula']?></p>
                            <p class="userData"> Celular: <?php echo $actives['celular']?></p>
                            <p class="userData"> Ubicación: <?php echo $actives['ubicacion']?></p>
                            <p class="userData"> Fecha de registro: <?php echo $actives['dia']." / ".$actives['mes']." / ".$actives['ano']?></p>
                    </div>

                    <div class="actions">
                            
                                <?php if(isset($_GET['p']) || !isset($_GET['s'])): ?><a href="?suspender&id=<?php echo $actives['id'] ?>"><button class="suspendido">Suspender</button></a><?php  endif;?>
                                <?php if(!isset($_GET['p']) || isset($_GET['s'])): ?><a href="?pendiente&id=<?php echo $actives['id'] ?>"><button class="pendiente" >Pendiente</button></a><?php  endif;?>
                                <?php if(isset($_GET['p'])|| isset($_GET['s'])): ?><a href="?activar&id=<?php echo $actives['id'] ?>"><button class="activo">Activar</button></a><?php  endif;?>
                                    <a href="edit-user?id=<?php echo base64_encode($actives['id'])."&name=".base64_encode($actives['fname'])."&lname=".base64_encode($actives['lname']) ."&dir=".base64_encode($actives['ubicacion'])."&ced=".base64_encode($actives['cedula']) ."&cel=".base64_encode($actives['celular'])?>"><button name="activar" style="background-color:unset;color:#3d3d3d;border:1px solid #3d3d3d;">Editar</button></a>
                                <a href="delete?will-delete&id=<?php echo base64_encode($actives['id'])."&name=".base64_encode($actives['fname']." ".$actives['lname']) ?>"><button name="activar" style="background-color:unset;color:#3d3d3d;border:1px solid #3d3d3d;">Eliminar</button></a>
                    </div>
                    
                </div>
    
            <?php  endforeach;?>

            <!-- cuando no hay Usuarios por estado -->
            <?php  else:?>
                <?php if(isset($_GET['q'])) :var_dump(unserialize($_GET['q'])) ?>
                
                    <?php  $actives = unserialize($_GET['q']); foreach($actives as $actives):?>
                 
                 
                  
                    <div class="users">
                        <div class="user_data_container">
                                <span>Estado: <?php echo $actives['user_status']?></span>
                                <?php if($actives['user_status_value']=='1'): ?>
                                    <span style="color:#22bb33;">Pago realizado</span>
                                <?php else: ?>

                                    <span style="color:#c4001d;">Pago pendiente</span>
                                <?php endif; ?>
                                <p class="userData"> Nombre: <?php echo $actives['fname']." ".  $actives['lname']?></p>
                                <p class="userData"> Usuario: <?php echo $actives['user']?></p>
                                <p class="userData"> Correo: <?php echo $actives['mail']?></p>
                                <p class="userData"> Cédula: <?php echo $actives['cedula']?></p>
                                <p class="userData"> Celular: <?php echo $actives['celular']?></p>
                                <p class="userData"> Ubicación: <?php echo $actives['ubicacion']?></p>
                                <p class="userData"> Fecha de registro: <?php echo $actives['dia']." / ".$actives['mes']." / ".$actives['ano']?></p>
                        </div>

                        <div class="actions">
                                
                                    <?php if(isset($_GET['p']) || !isset($_GET['s'])): ?><a href="?suspender&id=<?php echo $actives['id'] ?>"><button class="suspendido">Suspender</button></a><?php  endif;?>
                                    <?php if(!isset($_GET['p']) || isset($_GET['s'])): ?><a href="?pendiente&id=<?php echo $actives['id'] ?>"><button class="pendiente" >Pendiente</button></a><?php  endif;?>
                                    <?php if(isset($_GET['p'])|| isset($_GET['s'])): ?><a href="?activar&id=<?php echo $actives['id'] ?>"><button class="activo">Activar</button></a><?php  endif;?>
                                        <a href="delete?will-delete&id=<?php echo base64_encode($actives['id'])."&name=".base64_encode($actives['fname']." ".$actives['lname']) ?>"><button name="activar" style="background-color:unset;color:#3d3d3d;border:1px solid #3d3d3d;">Eliminar</button></a>
                        </div>
                        
                    </div>

                    <?php  endforeach;?>
                <?php else: ?>
                <?php   if(isset($_GET['q'])=='0' && !isset($_GET['s'])  && !isset($_GET['p'])):?>
                    <p class="nothing"><i class="fas fa-search"></i> Nada encontrado</p>
                    <?php endif; ?>  
                <?php endif; ?>  
    
            
            

                <?php if(!isset($_GET['p']) && !isset($_GET['s'])&& !isset($_GET['q'])): ?>
                    <p class="nothing"><i class="fas fa-exclamation-triangle"></i> No tienes usuarios activos</p>   
                <?php endif; ?>  

                <?php if(isset($_GET['p'])&& !isset($_GET['q'])): ?>
                    <p class="nothing"><i class="fas fa-exclamation-triangle"></i> No tienes usuarios pendientes</p>   
                <?php endif; ?>    

                <?php if(isset($_GET['s'])&& !isset($_GET['q'])): ?>
                    <p class="nothing"><i class="fas fa-exclamation-triangle"></i> No tienes usuarios suspendidos</p>   
                <?php endif; ?> 

        <?php endif; ?>    
    </div>  

</div>

 

<?php include 'mods/footer.php' ?>