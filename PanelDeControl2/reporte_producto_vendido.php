<?php session_start(); ?>
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
    <script type="text/Javascript" src="JavaScript/reporteprod.js"></script>

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
                        <h1>Reporte de productos vendidos</h1>
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
                                  <form action="PHP/reporte_producto_vendido_sucursal.php" method="POST">
                                  <div class="form-group"><label for="mes" class=" form-control-label">Mes</label><input type="text" name="mes" placeholder="Mes" class="form-control"></div>
                                  <div class="form-group"><label for="year" class=" form-control-label">Año</label><input type="text" name="year" placeholder="Año" class="form-control"></div>
                                  <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                                  <select class="control-label mb-1" name="sucursal">
                                        <?php
                                        include("PHP/conexion.php");
										$sql = "SELECT * FROM Sucursal;"; 
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
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-6" id='todosprod' style='display:none;'>
                    <div class="card">
                      <div class="card-header"><strong>Todos los productos por sucursal</strong></div>
                      <div class="card-body card-block">
                      <form method="POST" action="PHP/reporte_producto_sucursal.php">
                      <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                        <selectclass="control-label mb-1" name="sucursal">
                            <?php
                            include("PHP/conexion.php");
                            $sql = "SELECT * FROM Sucursal;"; 
                            $res1=mysqli_query($con,$sql);
                            while($row1 = mysqli_fetch_array($res1)){
                            echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
                            }	
                            ?>
                            </select><br>
                            <button id="payment-button" type="submit" name="reportetodo" class="btn btn-lg btn-info btn-block"><i class="fa fa-file-excel-o"> Reporte</i></button><br>
                        </form>
                        
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6"  id='enstock' style='display:none;'>
                    <div class="card">
                      <div class="card-header">
                        <strong>Productos en stock</strong>
                      </div>
                      <div class="card-body card-block">
                      <form method="POST" action="PHP/reporte_producto_sucursal_en_stock.php">
                        <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                        <select class="control-label mb-1" name="sucursal">
                                        <?php
										$sql = "SELECT * FROM Sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
                                        </select><br>
                                        <button id="payment-button" type="submit" name="reportestock" class="btn btn-lg btn-info btn-block"><i class="fa fa-file-excel-o"> Reporte</i></button><br>
                        </form>
                        
                      </div>
                                    </div>
                      
                    </div>
                  </div>

                   <div class="col-lg-6"  id='sinstock' style='display:none;'>
                    <div class="card">
                      <div class="card-header">
                        <strong>Productos sin stock</strong>
                      </div>
                      <div class="card-body card-block">
                      <form method="POST" action="PHP/reporte_producto_sucursal_sin_stock.php">
                        <div class="form-group"><label for="sucursal" class=" form-control-label">Sucursal</label>
                        <select class="form-control" name="sucursal">
                                        <?php
										$sql = "SELECT * FROM Sucursal;"; 
										$res1=mysqli_query($con,$sql);
										while($row1 = mysqli_fetch_array($res1)){
										echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
										}	
										?>
										
                                        </select><br>
                                        <button id="payment-button" type="submit" name="reportesinstock" class="btn btn-lg btn-info btn-block"><i class="fa fa-file-excel-o"> Reporte</i></button><br>
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
