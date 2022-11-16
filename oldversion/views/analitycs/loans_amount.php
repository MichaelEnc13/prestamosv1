<?php
    include "model/autoload.php";
    $amountThisMonth = Analitycs::getAmountMonth();
    $amountLastMonth = Analitycs::getAmountLastMonth();
    $amountToday = Analitycs::amountToday();
    $average = Analitycs::average();
    $lDate = Analitycs::lastLoan();
    $max = Analitycs::maxLoan();
    $stimated = Analitycs::stimated();
?>


<style>
    .analitycs_link{
        border-radius: 100px;
        background-color: rgba(87, 87, 87, 0.104);
    }
</style>


<h2 id="sect_title">Analiticas</h2>  
<br>
<!-- <form action="" method="get">
    <label for="">Datos: </label>
    <select name="" id="">
        <option value="">07/2021</option>
        <option value="">08/2021</option>
    </select>
</form> -->
<div class="analitycs_container">
<span class="desc">Principal</span>
<div class="data_group">
    
    <div class="loans_amount">
        <img src="src/icons/schedule.svg" alt="">
        <span>Este més</span>
        <span class="amount">
           RD $<?php echo number_format($amountThisMonth,2)?>
           
        </span>
    </div>
    <div class="loans_amount">
    <img src="src/icons/calendar.svg" alt="">
        <span>El més pasado</span>
        <span class="amount">
           RD $<?php echo number_format($amountLastMonth,2)?>
        </span>
    </div>

 
</div>

<span class="desc">Cobros</span>
<div class="data_group">

    <div class="loans_amount">
    <img src="src/icons/salary.svg" alt="">

        <span>Cobrado hoy</span>
        <span class="amount">
           RD $<?php echo number_format($amountToday,2)?>
        </span>
    </div>

    <div class="loans_amount">
    <img src="src/icons/money.svg" alt="">
        <span>Estimado de hoy</span>
        <span class="amount">
        RD $<?php echo number_format($stimated,2)?>
        </span>
    </div>

</div>
 
<span class="desc">Otras informaciones</span>
<div class="data_group data_group_2">
    <div class="loans_amount">
    <img src="src/icons/promedio.svg" alt="">
        <span>Promedio prestado</span>
      
        <span class="amount">
           RD $<?php echo number_format($average,2)?>
        </span>
    </div>

    <div class="loans_amount" >
    <img src="src/icons/max_money.svg" alt="">
        <span>Monto máximo prestado</span>
        <span class="amount">
            RD $<?php echo number_format($max,2)?>
        </span>
    </div> 
    
    <div class="loans_amount" >
    <img src="src/icons/back-in-time.svg" alt="">

        <span>Fecha de último préstamo</span>
        <span class="amount">
            <?php 

              echo $lDate?$lDate:"Sin préstamos";
              
            ?>
        </span>
    </div>

</div>






</div>