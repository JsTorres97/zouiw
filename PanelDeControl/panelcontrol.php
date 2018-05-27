<!DOCTYPE HTML>
<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Vortex-Zoui</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		 <!-- Latest compiled and minified CSS -->

	<body>
		<?php
		session_start();
		?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Vortex - Zoui</h1>
								<h2>Hola <?php echo $_SESSION['NOMBRE']; ?></h2>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#productos">Productos</a></li>
								<li><a href="#TipoVenta">Nueva Venta</a></li>
								<li><a href="#Extracciones">Reimprimir</a></li>
								<li><a href="#Ediciones">Conciliación</a></li>
								<li><a href="#Reportes">Reportes</a></li>
								
							</ul>
							<ul>
								<li><a href="#Ediciones">Eliminar Venta</a></li>
								<li><a hre="#productos">Clientes</a></li>
								<li><a href="#ProdSuc">Usuarios</a></li>
								<li><a href="#Extracciones">Caja</a></li>
								<li><a href="#Ediciones">Apartados</a></li>
							</ul>
							
								<div align="center">
							<li><a href="#Ediciones">Cerrar Sesión</a></li>
								</div>
							
						</nav>
					</header>

				<!-- Main -->
					<div id="main">
						<!--Productos-->
						
						<article id="productos">
						<div class="container">
							<table class=".table-condensed">
							<h2 class="major">Producto</h2>
							
								<tbody>
								
								<tr>
									
									<td><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-plus"> Agregar producto</i></button></a></td>
									<td><a href="#OpcionEditar"><button type="button" class=".btn-primary"><i class= "fa fa-pencil"> Editar Producto</i></button></a></td>
									
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-trash-o"> Eliminar producto</i></button></td>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-plus"> Crear campaña</i></button></td>
									
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-plus"> Registrar marca</i></button></td>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-pencil"> Editar Marca</i></button></td>
								</tr>
							
								
								<tr>
									<!--Queda pendiente poner el reporte de extracciones en la seccion de reportes-->
									<td><button type="button" class=".btn-primary"><i class= "fa fa-plus"> Crear sucursal</i></button></td>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart"> Extracciones</i></button></td>
								</tr>
								</tbody>
								
							</table>
						
							</div>
						</article>
					
						
						<article id="TipoProducto">
									<table class=".table-condensed">
										<tbody>
											<tr>
												<td><a href="#ConCodigo"><button type="button" class=".btn-primary">Con código</button></a></td>
												<td><button type="button" class=".btn-primary">Sin código</button></td>
											</tr>
										</tbody>
									</table>
						</article>
						<article id="ConCodigo">
						<h2 class="major">Nuevo Producto</h2>
									Marcas:<br>
									<select class="select" name="marcas">
										
									<?php
											include("../PHP/conexion.php");
											

											
                                            $res=mysqli_query($con,"SELECT * FROM  marcas");
                                            while($row = mysqli_fetch_array($res)){
											echo '<option value="'.$row['MARKUP'].'">'.$row['MARCA'].'</option>'; 
										}
										?>
									</select><br>
									Campaña:<br>
									<select class="select" name="campaña">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM campaña;";
    
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
													
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
									Sucursal:<br>
									<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
									Línea: <input type="text" name="linea"><br>
									Temporada: <input type="text" name="temporada"><br>
									Código de barras: <input type="text" name="codigobarras"><br>
									Color: <input type="text" name="color"><br>
									Referencia: <input type="text" name="ref"><br>
									Talla: <input type="text" name="talla"><br>
									Producto: <input type="text">

						</article>

						<article id="OpcionEditar">
						<h2 class="major">Buscar por:</h2>
						<table class=".table-condensed">

										<tbody>
											<tr>
												<td><a href="#EditarPorCodigo"><button type="button" class=".btn-primary">Por códgo de barras</button></a></td>
												<td><a href="#EditarPorReferencia"><button type="button" class=".btn-primary">Por referencia</button></a></td>
											</tr>
										</tbody>
									</table>
						</article>
						
						<article id="EditarPorCodigo">
						<h2 class="major">Editar por código de barras:</h2>
						
						
										
											
											<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

											<?php
											$dia = date("j"); 
											$mes = date("m");
											$year = date("Y");
											?>

											<table>
											<tr>
											<td>Día: <input type="hidden" name="dia"	value="<?php echo $dia; ?>"><?php echo $dia; ?></td>
											<td>Mes: <input type="hidden" name="mes"	value="<?php echo $mes; ?>"><?php echo $mes; ?></td>
											<td>Año: <input type="hidden" name="year"	value="<?php echo $year; ?>"><?php echo $year; ?></td>
											</tr>
											<tr>

											
											<?php
												if(isset($_POST['buscarprod'])){

													$sucursal = $_POST['sucursal'];
													$codigo = $_POST['cod'];
													$infoprod = mysqli_query($con, "SELECT * FROM producto WHERE CODIGO_BARRAS = '$codigo' AND SUCURSAL = '$sucursal'");
													$prod = mysqli_fetch_array($infoprod);
													$_SESSION['IDPROD'] = $prod['ID'];
													$nom = $prod['PRODUCTO'];
													$color = $prod['COLOR'];
													$talla = $prod['TALLA'];
													$cantidad = $prod['CANTIDAD'];
													$pcz = $prod['PCZ'];
													$pcziva = $prod['PCZIVA'];
													$ppz = $prod['PPZ'];
													$mayorista = $prod['PRECIO_MAYORISTA'];
													$socios = $prod['PRECIO_SOCIOS'];
													$empleados = $prod['PRECIO_EMPLEADOS'];
													$referencia = $prod['REFERENCIA'];

												}
												
											?>
											<?php
											$control=0;
											 if(isset($_POST['actualizarprod'])){

												$id = $_SESSION['IDPROD'];
												$sucursal = $_POST['sucursal'];
												$codigo = $_POST['cod'];
											
												
												$nom = $_POST['producto'];
												$color = $_POST['color'];
												$cantidad  = $_POST['cantidad'];
												$pcz = $_POST['pcz'];
												$pcziva = $_POST['pcziva'];
												$ppz = $_POST['ppz'];
												$mayorista = $_POST['mayorista'];
												$socios = $_POST['socios'];
												$empleados = $_POST['empleados'];
												$referencia = $_POST['referencia'];
												
												if(!empty($nom) ){

												
												$actualizar = mysqli_query($con,"UPDATE Producto SET CODIGO_BARRAS = '$codigo', REFERENCIA='$referencia', PRODUCTO = '$nom', COLOR = '$color', CANTIDAD = '$cantidad', PCZ = '$pcz', PCZIVA = '$pcziva', PPZ = '$ppz', PRECIO_MAYORISTA = '$mayorista', PRECIO_SOCIOS = '$socios', PRECIO_EMPLEADOS = '$empleados' WHERE ID= '$id'");
												$control=1;
												}else{
													$control=2;
												}
											}
											?>
										
										<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
											<td>Sucursal: <select class="select" name="sucursal">
											<?php
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
											}	
										
											?>

											</select></td>
											<td>Código de barras <input type="text" name="cod" value="<?php echo $codigo ?? ""; ?>"></td>
											<td><br><button type="submit" name="buscarprod">Buscar</button></td>

											</tr>
											
										</form>
										
										
									

											</table>
											
											Producto:<input type="text" name="producto" value="<?php echo $nom ?? ""; ?>"><br>
											Referencia:<input type="text" name="referencia" value="<?php echo $referencia ?? ""; ?>"><br>
											Color:<input type="text" name="color" value="<?php echo $color ?? ""; ?>"><br>
											Cantidad:<input type="text" name="cantidad" value="<?php echo $cantidad ?? ""; ?>"><br>
											PCZ $:<input type="text" name="pcz" value="<?php echo $pcz ?? ""; ?>"><br>
											PCZ+I.V.A. $: <input type="text" name="pcziva" value="<?php echo $pcziva ?? ""; ?>"><br>
											PPZ $:<input type="text" name="ppz" value="<?php echo $ppz ?? ""; ?>"><br>
											Precio mayorista $: <input type="text" name="mayorista" value="<?php echo $mayorista ?? ""; ?>"><br>
											Precio socios $: <input type="text" name="socios" value="<?php echo $socios ?? ""; ?>"><br>
											Precio empleados $: <input type="text" name="empleados" value="<?php echo $empleados ?? ""; ?>"><br>
											<div align="center"><button type="submit" name="actualizarprod">Actualizar</button></div><br>
											</form>
											<?php
                        if($control==0){
                            echo "";
                        }else if($control==1){
                            echo "<div style='background-color:lightgreen' align='center'>
                            <strong>Producto actualizado!</strong>
                          </div>";
                          $control=0;
                        }else if($control==2){
                            echo "<div  style='background-color:red' align='center'>
                            <strong>Hay un error, intente de nuevo</strong> 
                          </div>";
                          $control=0;
                        }

                 ?>
											
											
										
						</article>
						<article id="EditarPorReferencia">
						<h2 class="major">Editar por código de barras:</h2>
						
						
										
											
						<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

						<?php
						$dia = date("j"); 
						$mes = date("m");
						$year = date("Y");
						?>

						<table>
						<tr>
						<td>Día: <input type="hidden" name="dia"	value="<?php echo $dia; ?>"><?php echo $dia; ?></td>
						<td>Mes: <input type="hidden" name="mes"	value="<?php echo $mes; ?>"><?php echo $mes; ?></td>
						<td>Año: <input type="hidden" name="year"	value="<?php echo $year; ?>"><?php echo $year; ?></td>
						</tr>
						<tr>

						
										<?php
											if(isset($_POST['buscarprod'])){

												$sucursal = $_POST['sucursal'];
												$codigo = $_POST['cod'];
												$infoprod = mysqli_query($con, "SELECT * FROM producto WHERE REFERENCIA = '$referencia' AND SUCURSAL = '$sucursal'");
												$prod = mysqli_fetch_array($infoprod);
												$_SESSION['IDPROD'] = $prod['ID'];
												$nom = $prod['PRODUCTO'];
												$color = $prod['COLOR'];
												$talla = $prod['TALLA'];
												$cantidad = $prod['CANTIDAD'];
												$pcz = $prod['PCZ'];
												$pcziva = $prod['PCZIVA'];
												$ppz = $prod['PPZ'];
												$mayorista = $prod['PRECIO_MAYORISTA'];
												$socios = $prod['PRECIO_SOCIOS'];
												$empleados = $prod['PRECIO_EMPLEADOS'];
												$referencia = $prod['REFERENCIA'];

											}
											
										?>
										<?php
										$control=0;
										if(isset($_POST['actualizarprod'])){

											$id = $_SESSION['IDPROD'];
											$sucursal = $_POST['sucursal'];
											$codigo = $_POST['cod'];
										
											
											$nom = $_POST['producto'];
											$color = $_POST['color'];
											$cantidad  = $_POST['cantidad'];
											$pcz = $_POST['pcz'];
											$pcziva = $_POST['pcziva'];
											$ppz = $_POST['ppz'];
											$mayorista = $_POST['mayorista'];
											$socios = $_POST['socios'];
											$empleados = $_POST['empleados'];
											$referencia = $_POST['referencia'];
											
											if(!empty($nom) ){

											
											$actualizar = mysqli_query($con,"UPDATE Producto SET CODIGO_BARRAS = '$codigo', REFERENCIA='$referencia', PRODUCTO = '$nom', COLOR = '$color', CANTIDAD = '$cantidad', PCZ = '$pcz', PCZIVA = '$pcziva', PPZ = '$ppz', PRECIO_MAYORISTA = '$mayorista', PRECIO_SOCIOS = '$socios', PRECIO_EMPLEADOS = '$empleados' WHERE ID= '$id'");
											
											$control=1;
											}else{
												$control=2;
											}
										}
										?>
									
									<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
										<td>Sucursal: <select class="select" name="sucursal">
										<?php
										$sql = "SELECT * FROM sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
									
										?>

										</select></td>
										<td>Referencia:<input type="text" name="referencia" value="<?php echo $referencia ?? ""; ?>"></td>
										<td><br><button type="submit" name="buscarprod">Buscar</button></td>

										</tr>
										
									</form>
									
									
								

										</table>
										
										Producto:<input type="text" name="producto" value="<?php echo $nom ?? ""; ?>"><br>
										Código de barras <input type="text" name="cod" value="<?php echo $codigo ?? ""; ?>"><br>
										Color:<input type="text" name="color" value="<?php echo $color ?? ""; ?>"><br>
										Cantidad:<input type="text" name="cantidad" value="<?php echo $cantidad ?? ""; ?>"><br>
										PCZ $:<input type="text" name="pcz" value="<?php echo $pcz ?? ""; ?>"><br>
										PCZ+I.V.A. $: <input type="text" name="pcziva" value="<?php echo $pcziva ?? ""; ?>"><br>
										PPZ $:<input type="text" name="ppz" value="<?php echo $ppz ?? ""; ?>"><br>
										Precio mayorista $: <input type="text" name="mayorista" value="<?php echo $mayorista ?? ""; ?>"><br>
										Precio socios $: <input type="text" name="socios" value="<?php echo $socios ?? ""; ?>"><br>
										Precio empleados $: <input type="text" name="empleados" value="<?php echo $empleados ?? ""; ?>"><br>
										<div align="center"><button type="submit" name="actualizarprod">Actualizar</button></div><br>
										</form>
										<?php
					if($control==0){
						echo "";
					}else if($control==1){
						echo "<div style='background-color:lightgreen' align='center'>
						<strong>Producto actualizado!</strong>
					</div>";
					$control=0;
					}else if($control==2){
						echo "<div  style='background-color:red' align='center'>
						<strong>Hay un error, intente de nuevo</strong> 
					</div>";
					$control=0;
					}
						
											
											
					?>					
					</article>
					<!--REPORTES-->
					<article id="Reportes">
					<table class=".table-condensed">
							<h2 class="major">Reportes</h2>
							
								<tbody>
								<tr>
									<td><a href="#OpcionVentaFecha"><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart"> Reporte de ventas</i></button></a></td>
								</tr>
								<tr>
									<td><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de utilidad</i></button></a></td>
								</tr>
								<tr>
									<td><a href="#OpcionEditar"><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de ventas Producto/Sucursal</i></button></a></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Comisiones</i></button></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte por forma de pago</i></button></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de productos vendidos</i></button></td>
								</tr>
								<tr>
								<td><a href="#ProdSuc"><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de producto por sucursal</i></button></a></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de budget</i></button></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de ticket promedio</i></button></td>
								</tr>
								<tr>
								<td><a href="#Extracciones"><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de extracciones</i></button></a></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de valor de prenda promedio</i></button></td>
								</tr>
								<tr>
									<td><button type="button" class=".btn-primary"><i class= "fa fa-bar-chart">Reporte de unidades promedio por tikcet</i></button></td>
								</tr>
								</tbody>
								
							</table>
						
					</article>
					<!--Reportedeventas-->

						<article id="OpcionVentaFecha">
						<h2 class="major">Reporte de ventas</h2>
						<table class=".table-condensed">

										<tbody>
											<tr>
												<td><a href="#VentaPorDia"><button type="button" class=".btn-primary">Por día</button></a></td>
												<td><a href="#VentaPorMes"><button type="button" class=".btn-primary">Por mes</button></a></td>
											</tr>
										</tbody>
									</table>
						</article>
						<!--VentaPorDía-->
						
						<article id="VentaPorDia">
							<?php
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
							
							
							<h2 class="major">Reporte de ventas por día</h2>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
								Día:<input type="number" name="dia" value="<?php echo $dia ?? ""; ?>">
								Mes:<input type="number" name="mes" value="<?php echo $mes ?? ""; ?>">
								Año:<input type="number" name="year" value="<?php echo $year ?? ""; ?>">
								Sucursal: <select class="select" name="sucursal">
										<?php
										$sql = "SELECT * FROM sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
										</select><br>
										<div align="center"><button type="submit" name="ventadia">Buscar</button></div>
							</form>
							<table>
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
							<form method="POST" action="PHP/reporte_venta_dia.php">
							<input type="hidden" name="sucursal" value="<?php echo $sucursal ?? ""; ?>">
							<input type="hidden" name="dia" value="<?php echo $dia ?? ""; ?>">
							<input type="hidden" name="mes" value="<?php echo $mes ?? ""; ?>">
							<input type="hidden" name="year" value="<?php echo $year ?? ""; ?>">
							<div align="center"><button type="submit" name="ventadiaexcel"><i class="fa fa-file-excel-o">Reporte excel</i></button></div>
							</form>
							<?php
							require "ticket/ticket/autoload.php"; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
								
							use Mike42\Escpos\Printer;
							use Mike42\Escpos\EscposImage;
							use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

							if(isset($_POST['imprimirventadia'])){
							

								$dia = $_POST['dia'];
								$mes = $_POST['mes'];
								$year = $_POST['year'];
								$suc=$_POST['sucursal']; 

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
								$printer->text("Reporte de venta\n \n Fecha".$dia."/".$mes."/".$year."\n".
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
							<div align="center"><button type="submit" name="imprimirventadia"><i class="fa fa-print">Imprimir</i></button></div>
							</form>
						
						
						
						</article>
						<!--VentasMes-->
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

							<article id="VentaPorMes">
							
							
							<h2 class="major">Reporte de ventas por mes</h2>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
								
								Mes:<input type="number" name="mes" value="<?php echo $mes ?? ""; ?>">
								Año:<input type="number" name="year" value="<?php echo $year ?? ""; ?>">
								Sucursal: <select class="select" name="sucursal">
										<?php
										$sql = "SELECT * FROM sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
										</select><br>
										<div align="center"><button type="submit" name="ventames">Buscar</button></div>
							</form>
							<table>
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
							<form method="POST" action="PHP/reporte_venta_mes.php">
							<input type="hidden" name="sucursal" value="<?php echo $sucursal ?? ""; ?>">
							<input type="hidden" name="mes" value="<?php echo $mes ?? ""; ?>">
							<input type="hidden" name="year" value="<?php echo $year ?? ""; ?>">
							<div align="center"><button type="submit" name="ventadiaexcel"><i class="fa fa-file-excel-o">Reporte excel</i></button></div>
							</form>
							<?php
							require "ticket/ticket/autoload.php"; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
								
							

							if(isset($_POST['imprimirventames'])){
							

								$mes = $_POST['mes'];
								$year = $_POST['year'];
								$suc=$_POST['sucursal']; 

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
								$printer->text("Reporte de venta del mes ".$mes."/".$year."\n \n".
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
							<div align="center"><button type="submit" name="imprimirventames"><i class="fa fa-print">Imprimir</i></button></div>
							</form>
						
						
						
						</article>

						<!-- Intro -->
							<article id="ProdSuc">
								<h2 class="major">Reportes de producto<bR> por sucursal</h2>
								<div align="center">
									<a href="#Todo"><input type="button" value="Todos los productos"></a>
									<br><br>
									<a href="#instock"><input type="button" value="Productos en stock"></a>
									<br><br>
									<a href="#outstock"><input type="button" value="Productos sin stock"></a>
									<br><br>
								</div>
							</article>
									
									<!--<span class="image main"><img src="images/pic01.jpg" alt="" /></span>-->
							<article id="Todo">
							<h2 class="major">Reportes de producto<br> por sucursal.</h2>
								<form action="PHP/reporte_producto_sucursal.php" method="POST"> 
								<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select>
								  <br>
								  <div align="center"><input type="submit" value="Reporte"> </div>
								  </form>
							</article>
							<article id="instock">
							<h2 class="major">Reportes de producto<bR> por sucursal en stock</h2>
								<form action="PHP/reporte_producto_sucursal_en_stock.php" method="POST"> 
								<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
								  <div align="center"><input type="submit" value="Reporte"> </div>
								  </form>
							</article>
							<article id="outstock">
							<h2 class="major">Reportes de producto<bR> por sucursal sin stock</h2>
								<form action="PHP/reporte_producto_sucursal_sin_stock.php" method="POST"> 
								<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
								  <div align="center"><input type="submit" value="Reporte"> </div>
								  </form>
							</article>
						
						<!--Extracciones-->
							<article id="Extracciones">
								<h2 class="major">Extracciones</h2>
								<form action="PHP/reporte_producto_de_extracciones.php" method="POST">
									Día:	<input type="text" name="dia"><br>
									Mes:	<input type="text" name="mes"><br>
									Año:	<input type="text" name="year"><br>
									Sucursal:<br>
									<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
									  <div align="center"><input type="submit" value="Reporte"> </div>
								</form>
							</article>

						<!--Ediciones-->
						<article id="Ediciones">
							<h2 class="major">Ediciones</h2>
							<form action="PHP/reporte_producto_de_ediciones.php" method="POST">
								Día:	<input type="text" name="dia"><br>
								Mes:	<input type="text" name="mes"><br>
								Año:	<input type="text" name="year"><br>
								Sucursal:<br>
								<select class="select" name="sucursal">
									<?php
									mysqli_query($con,"SET NAMES 'utf8'");
											$sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
											echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}
										
										?>
									</select><br>
								  <div align="center"><input type="submit" value="Reporte"> </div>

							</form>
						</article>


						<!--NuevaVenta-->
						<article id="TipoVenta">
						<h2 class="major">Tipo de venta</h2>
						<div align="center">
							<table>
								
								<tbody>
									<tr>
									<div align="center"><a href="#VentaPublico"><button type="button" class=".btn-primary"><i class= "fa fa-shopping-bag">Venta público</i></button></a></div><br>
									</tr>
									<tr>
									<div align="center"><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-shopping-bag">Venta mayoreo</i></button></a></div><br>
									</tr>
									<tr>
									<div align="center"><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-shopping-bag">Venta socios</i></button></a></div><br>
									</tr>
									<tr>
									<div align="center"><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-shopping-bag">Venta empleados</i></button></a></div><br>
									</tr>
									<tr>
									<div align="center"><a href="#TipoProducto"><button type="button" class=".btn-primary"><i class= "fa fa-shopping-bag">Apartados</i></button></a></div><br>
									</tr>
								</tbody>
									
							</table>
							</div>
						</article>
						<!--VentaPublico-->
					
						<article id="VentaPublico" > 
						<h2 class="major">Venta Público</h2>
						
						
						<?php
						$dia = date("j"); 
						$mes = date("m");
						$year = date("Y");
						?>
						<?php
							if(isset($_POST['buscarproductoventa'])){
								$suc = $_POST['sucursal'];
								$codigo_barras = $_POST['codigo_barras'];
								$qencontrar = mysqli_query($con, "SELECT * FROM producto WHERE CODIGO_BARRAS='$codigo_barras' AND SUCURSAL='$suc'");
								$datos_producto = mysqli_fetch_array($qencontrar);
								$marca = $datos_producto['MARCA'];
								$producto = $datos_producto['PRODUCTO'];
								$linea = $datos_producto['LINEA'];
								$temporada = $datos_producto['LINEA'];
								$talla = $datos_producto['TALLA'];
								$color = $datos_producto['COLOR'];
								$precio = $datos_producto['PPZ'];
								$cantidad_en_stock = $datos_producto['CANTIDAD'];
							}
						?>

						<table>
						<tr>
						<td>Día: <input type="hidden" name="dia"	value="<?php echo $dia; ?>"><?php echo $dia; ?></td>
						<td>Mes: <input type="hidden" name="mes"	value="<?php echo $mes; ?>"><?php echo $mes; ?></td>
						<td>Año: <input type="hidden" name="year"	value="<?php echo $year; ?>"><?php echo $year; ?></td>
						</tr>
						</table>
						<table>
							<tr>
								<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
								<input type="hidden" name="sucursal" value="<?php echo $_SESSION['SUCURSAL'] ?? "";?>">
								<td>Código de barras: <input type="text" name="codigo_barras" value="<?php echo $codigo_barras ?? "";?>"></td>
								<td><br><button type="submit" class="fa fa-search" name="buscarproductoventa">Buscar</button></td>
								</form>
							</tr>
							<tr>
								<td>Sucursal: <strong><?php echo $_SESSION['SUCURSAL']; ?></strong></td>
								<td>Vendedor: <strong><?php echo $_SESSION['NOMBRE']; ?></strong></td>
							</tr>
						</table>
						<table>
							<tr>
								<td>Marca: <strong><?php echo $marca ?? "";?></strong></td>
								<td>Producto: <strong><?php echo $producto ?? "";?></strong></td>
								<td>Línea: <strong><?php echo $linea ?? "";?></strong></td>
							</tr>
							<tr>
								<td>Temporada: <strong><?php echo $temporada ?? "";?></strong></td>
								<td>Talla: <strong><?php echo $talla ?? "";?></strong></td>
								<td>Color: <strong><?php echo $color ?? "";?></strong></td>
							</tr>
							<tr>
								<td>Precio $: <input type="text" value="<?php echo $precio ?? "";?>"></td>
								<td>Cantidad: <input type="text" value="<?php echo $cantidad ?? "";?>"></td>
								<td>Descuento %: <select name="porcentajedesc"><option>No</option><option>Si</option></select><input type="text" name="descuento"></td>
							</tr>
						</table>
						
						<div align="center"><button type="button" class="fa fa-cart-plus">Agregar producto</button></div>
				
						</article>
					


						<!-- Work -->
							<article id="work">
								<h2 class="major">Work</h2>
								<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
								<p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p>
								<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
							</article>

						<!-- About -->
							<article id="about">
								<h2 class="major">About</h2>
								<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
								<p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices. Aliquam libero et malesuada fames ac ante ipsum primis in faucibus. Cras viverra ligula sit amet ex mollis mattis lorem ipsum dolor sit amet.</p>
							</article>

						<!-- Contact -->
							<article id="contact">
								<h2 class="major">Contact</h2>
								<form method="post" action="#">
									<div class="field half first">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="special" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</article>

						<!-- Elements -->
							<article id="elements">
								<h2 class="major">Elements</h2>

								<section>
									<h3 class="major">Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<h5>Heading Level 5</h5>
									<h6>Heading Level 6</h6>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
    print 'Iteration ' + i;
    deck.shuffle();
    i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>
								

								<section>
									<h3 class="major">Lists</h3>

									<h4>Unordered</h4>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Alternate</h4>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Ordered</h4>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h4>Icons</h4>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>

									<h4>Actions</h4>
									<ul class="actions">
										<li><a href="#" class="button special">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions vertical">
										<li><a href="#" class="button special">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3 class="major">Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button special">Special</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button special icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button special disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Form</h3>
									<form method="post" action="#">
										<div class="field half first">
											<label for="demo-name">Name</label>
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
										</div>
										<div class="field half">
											<label for="demo-email">Email</label>
											<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
										</div>
										<div class="field">
											<label for="demo-category">Category</label>
											<div class="select-wrapper">
												<select name="demo-category" id="demo-category">
													<option value="">-</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
										</div>
										<div class="field half first">
											<input type="radio" id="demo-priority-low" name="demo-priority" checked>
											<label for="demo-priority-low">Low</label>
										</div>
										<div class="field half">
											<input type="radio" id="demo-priority-high" name="demo-priority">
											<label for="demo-priority-high">High</label>
										</div>
										<div class="field half first">
											<input type="checkbox" id="demo-copy" name="demo-copy">
											<label for="demo-copy">Email me a copy</label>
										</div>
										<div class="field half">
											<input type="checkbox" id="demo-human" name="demo-human" checked>
											<label for="demo-human">Not a robot</label>
										</div>
										<div class="field">
											<label for="demo-message">Message</label>
											<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="special" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</section>

							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Vortex Solutions <a href="http://vortex-solutions.com.mx/">Vortex</a>.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
