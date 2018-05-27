<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vortex Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/Javascript" src="JavaScript/mostrar.js"></script>

    <?php
    include("formatos/links.html");
    ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->
    <?php 
    include("formatos/leftpanel.html");
    ?>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <?php
            include("formatos/header.html");
            ?>

        </header><!-- /header -->
        <!-- Header-->

         <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Reporte de ventas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><?php echo $_SESSION['SUCURSAL']; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Reporte</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                  <div align="center">
                                  <button type="button" class="btn btn-primary" OnClick="dia()"><i class="fa fa-calendar"></i>&nbsp; Por día</button>
                                  <button type="button" class="btn btn-primary" OnClick="mes()"><i class="fa fa-calendar-o"></i>&nbsp; Por mes</button><hr>

                                

                                        

                                  </div>
                                  </div>
                                  <hr>

                            <?php
                            include("PHP/conexion.php");
						mysqli_query($con,"SET NAMES 'utf8'");
						
						if(isset($_POST['ventadia'])){
							$dia = $_POST['dia'] ?? "";
							$mes = $_POST['mes'];
							$year = $_POST['year'];
							$sucursal = $_POST['sucursal'];
							$qtotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal'");
							$qftotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Efectivo'");
							$qdtotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Debito'");
							$qctotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Crédito'");
							$qatotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='AMEX'");
							$q6total = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE DIA='$dia' AND MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='6 MSI'");
							//Total
							if($qtotal == NULL){
								$total['TOTAL']=0;
							}else{
								$total = mysqli_fetch_array($qtotal);
							}
							//Efectivo
							if(mysqli_num_rows($qftotal)==0){
								$totale['TOTAL']=0;
							}else{
								$totale = mysqli_fetch_array($qftotal);
							}
							//Debito
							if($qdtotal == NULL){
								$totald['TOTAL']=0;
							}else{
								$totald = mysqli_fetch_array($qdtotal);
							}
							//Credito
							if($qctotal == NULL){
								$totalc['TOTAL']=0;
							}else{
								$totalc = mysqli_fetch_array($qctotal);
							}
							//AMEX
							if($qatotal == NULL){
								$totala['TOTAL']=0;
							}else{
								$totala = mysqli_fetch_array($qatotal);
							}
							//MSI
							if($q6total == NULL){
								$total6['TOTAL']=0;
							}else{
								$total6 = mysqli_fetch_array($q6total);
							}

						}
                        ?>
                        <?php
						mysqli_query($con,"SET NAMES 'utf8'");
						
						if(isset($_POST['ventames'])){
							$mes = $_POST['mes'];
							$year = $_POST['year'];
							$sucursal = $_POST['sucursal'];
							$qtotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal'");
							$qftotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Efectivo'");
							$qdtotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Debito'");
							$qctotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='Crédito'");
							$qatotal = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='AMEX'");
							$q6total = mysqli_query($con,"SELECT SUM(TOTAL) AS TOTAL FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$sucursal' AND FORMA_DE_PAGO='6 MSI'");
							//Total
							if($qtotal == NULL){
								$total['TOTAL']=0;
							}else{
								$total = mysqli_fetch_array($qtotal);
							}
							//Efectivo
							if(mysqli_num_rows($qftotal)==0){
								$totale['TOTAL']=0;
							}else{
								$totale = mysqli_fetch_array($qftotal);
							}
							//Debito
							if($qdtotal == NULL){
								$totald['TOTAL']=0;
							}else{
								$totald = mysqli_fetch_array($qdtotal);
							}
							//Credito
							if($qctotal == NULL){
								$totalc['TOTAL']=0;
							}else{
								$totalc = mysqli_fetch_array($qctotal);
							}
							//AMEX
							if($qatotal == NULL){
								$totala['TOTAL']=0;
							}else{
								$totala = mysqli_fetch_array($qatotal);
							}
							//MSI
							if($q6total == NULL){
								$total6['TOTAL']=0;
							}else{
								$total6 = mysqli_fetch_array($q6total);
                            }
                            

						}
						?>


                            <div id='divventadia' style='display:block;'>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Día: <?php echo $dia ?? ""; ?></td>
                                        <td>Mes: <?php echo $mes ?? ""; ?></td>
                                        <td>Año: <?php echo $year ?? ""; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            <table class="table table-striped">
								<tbody>
                                    
									<tr>
										<td>Efectivo:</td>
										<td>$<?php 
										if(!isset($totale)){
											echo 0;
										}else{
                                            
										
										if($totale['TOTAL']>0){
											echo  $totale['TOTAL'] ?? ""; 
										}else{
											$totale['TOTAL'] =0;
											echo  $totale['TOTAL'] ?? ""; 
										}
									}
										
										?></td>
									</tr>
									<tr>
										<td>Débito:</td>
										<td>$<?php 
										if(!isset($totald)){
											echo 0;
										}else{

										if($totald['TOTAL']>0){
										echo  $totald['TOTAL'] ?? ""; 
										}else{
											$totald['TOTAL'] =0;
											echo  $totald['TOTAL'] ?? ""; 
										}
									}
										?></td>
									</tr>
									<tr>
										<td>Crédito:</td>
										<td>$<?php 
										if(!isset($totalc)){
											echo 0;
										}else{

										if($totalc['TOTAL']>0){
										echo  $totalc['TOTAL'] ?? ""; 
										}else{
											$totalc['TOTAL'] =0;
											echo  $totalc['TOTAL'] ?? ""; 
										}
									}
										?></td>
									</tr>
									<tr>
										<td>AMEX:</td>
										<td>$<?php 
										if(!isset($totala)){
											echo 0;
										}else{

										if($totala['TOTAL']>0){
										echo  $totala['TOTAL'] ?? ""; 
										}else{
											$totala['TOTAL'] =0;
											echo  $totala['TOTAL'] ?? ""; 
										}
									}
										?></td>
									</tr>
									<tr>
										<td>6 MSI:</td>
										<td>$<?php 
										if(!isset($total6)){
											echo 0;
										}else{

										if($total6['TOTAL']>0){
										echo  $total6['TOTAL'] ?? ""; 
										}else{
											$total6['TOTAL'] =0;
											echo  $total6['TOTAL'] ?? ""; 
										}
									}
										?></td>
									</tr>
									<tr>
										<td>Total:</td>
										<td>$<?php 
										if(!isset($total)){
											echo 0;
										}else{

										if($total['TOTAL']>0){
										echo  $total['TOTAL'] ?? ""; 
										}else{
											$total['TOTAL'] =0;
											echo  $total['TOTAL'] ?? ""; 
										}
									}
										?></td>
									</tr>
								</tbody>
								
                            </table>

                            <div align="center">

                              <div id="exceldia" >
                            <form method="POST" action="PHP/reporte_venta_dia.php">
                            <input type="hidden" name="sucursal" value="<?php echo $sucursal ?? ""; ?>">
                            <input type="hidden" name="dia" value="<?php echo $dia ?? "";?>">
							<input type="hidden" name="mes" value="<?php echo $mes ?? ""; ?>">
							<input type="hidden" name="year" value="<?php echo $year ?? ""; ?>">
							<button type="submit" name="ventadiaexcel" class="btn btn-success"><i class="fa-file-excel-o"> Reporte excel día</i></button>
                            </form>
                            </div><br>

                            <div id="excelmes" >
                            <form method="POST" action="PHP/reporte_venta_mes.php">
							<input type="hidden" name="sucursal" value="<?php echo $sucursal ?? ""; ?>">
							<input type="hidden" name="mes" value="<?php echo $mes ?? ""; ?>">
							<input type="hidden" name="year" value="<?php echo $year ?? ""; ?>">
							<button type="submit" name="ventadiaexcel" class="btn btn-success"><i class="fa-file-excel-o"> Reporte excel mes</i></button>
                            </form>
                            </div>
                                
                            

                            <br>

                            <?php
							require "ticket/ticket/autoload.php"; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
								
							use Mike42\Escpos\Printer;
							use Mike42\Escpos\EscposImage;
							use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

							if(isset($_POST['imprimir'])){
							

								$dia = $_POST['dia'] ?? "";
								$mes = $_POST['mes'] ?? "";
								$year = $_POST['year'] ?? "";
								$suc=$_POST['sucursal'] ?? ""; 

								$total = $_POST['total'];
								$efe = $_POST['efectivo'];
								$deb = $_POST['debito'];
								$cre = $_POST['credito'];
								$amex = $_POST['amex'];
								$msi = $_POST['meses'];

								/*
									Este ejemplo imprime un hola mundo en una impresora de tickets
									en Windows.
									La impresora debe estar instalada como genérica y debe estar
									compartida
								*/

								/*
									Conectamos con la impresora
								*/


								/*
									Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
									escribe el nombre de la tuya. Recuerda que debes compartirla
									desde el panel de control
								*/

								$nombre_impresora = "POS58"; 


								$connector = new WindowsPrintConnector($nombre_impresora);
								$printer = new Printer($connector);

								/*
									Imprimimos un mensaje. Podemos usar
									el salto de línea o llamar muchas
									veces a $printer->text()
								*/
								$printer->text("Reporte de venta\n \n Fecha ".$dia."/".$mes."/".$year."\n".
								"\n \n Sucursal ".$suc.
								"\n \n Efectivo $".$efe.
								"\n \n Débito $".$deb.
								"\n \n Crédito $".$cre.
								"\n \n AMEX $".$amex.
								"\n \n 6 MSI $".$msi.
								"\n \n Total $".$total.
								"\n \n \n \n");

								/*
									Hacemos que el papel salga. Es como 
									dejar muchos saltos de línea sin escribir nada
								*/
								$printer->feed();

								/*
									Cortamos el papel. Si nuestra impresora
									no tiene soporte para ello, no generará
									ningún error
								*/
								$printer->cut();

								/*
									Por medio de la impresora mandamos un pulso.
									Esto es útil cuando la tenemos conectada
									por ejemplo a un cajón
								*/
								$printer->pulse();

								/*
									Para imprimir realmente, tenemos que "cerrar"
									la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
								*/
								$printer->close();
							}
								?>
                            
                            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
							<input type="hidden" name="sucursal" value="<?php echo $sucursal ?? ""; ?>">
							<input type="hidden" name="dia" value="<?php echo $dia ?? ""; ?>">
							<input type="hidden" name="mes" value="<?php echo $mes ?? ""; ?>">
							<input type="hidden" name="year" value="<?php echo $year ?? ""; ?>">
							<input type="hidden" name="efectivo" value="<?php echo $totale['TOTAL'] ?? "";?>">
							<input type="hidden" name="amex" value="<?php echo $totala['TOTAL'] ?? "";?>">
							<input type="hidden" name="credito" value="<?php echo $totalc['TOTAL'] ?? "";?>">
							<input type="hidden" name="meses" value="<?php echo $total6['TOTAL'] ?? "";?>">
							<input type="hidden" name="total" value="<?php echo $total['TOTAL'] ?? "";?>">
							<input type="hidden" name="debito" value="<?php echo $totald['TOTAL'] ?? "";?>">
							<div align="center"><button type="submit" name="imprimir" class="btn btn-primary btn-lg btn-block"><i class="fa fa-print">Imprimir</i></button></div>
							</form>
                            </div>

                            </div>
                            
                              
                                  
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-6" id='divdia' style='display:none;'>
                    <div class="card">
                      <div class="card-header"><strong>Reporte de ventas por día</strong></div>
                      <div class="card-body card-block">
                      <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                        <div class="form-group"><label for="dia" class=" form-control-label">Día</label><input type="text" name="dia" placeholder="Día" class="form-control"></div>
                        <div class="form-group"><label for="mes" class=" form-control-label">Mes</label><input type="text" name="mes" placeholder="Mes" class="form-control"></div>
                        <div class="form-group"><label for="year" class=" form-control-label">Año</label><input type="text" name="year" placeholder="Año" class="form-control"></div>
                        <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                        <select class="select" name="sucursal">
                                        <?php
                                        include("PHP/conexion.php");
										$sql = "SELECT * FROM sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
                                        </select><br>
                                        <button id="payment-button" type="submit" name="ventadia" class="btn btn-lg btn-info btn-block">Buscar</button>
                        </form>
                        
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6"  id='divmes' style='display:none;'>
                    <div class="card">
                      <div class="card-header">
                        <strong>Reporte de ventas por mes</strong>
                      </div>
                      <div class="card-body card-block">
                      <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                        <div class="form-group"><label for="mes" class=" form-control-label">Mes</label><input type="text" name="mes" placeholder="Mes" class="form-control"></div>
                        <div class="form-group"><label for="year" class=" form-control-label">Año</label><input type="text" name="year" placeholder="Año" class="form-control"></div>
                        <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                        <select class="select" name="sucursal">
                                        <?php
                                        include("PHP/conexion.php");
										$sql = "SELECT * FROM sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
                                        </select><br>
                                        <button id="payment-button" type="submit" name="ventames" class="btn btn-lg btn-info btn-block">Buscar</button>
                        </form>
                        
                      </div>
                                    </div>
                      
                    </div>
                  </div>

                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
