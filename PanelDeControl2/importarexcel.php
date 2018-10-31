<?php session_start(); ?>
<!doctype html>

<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vortex Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" href="zoomy.css" rel="stylesheet">
    
    <link type="text/css" href="zoomy.css" rel="stylesheet">
    
    <?php include("formatos/links.html"); ?>

    <style type="text/css">
        .zoom {
            transition: transform .1s; /* Animation */
            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

        }
    </style>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

        <!-- Left Panel -->
    <?php include("formatos/leftpanel.html"); ?>


    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include("formatos/header.html"); ?>
        <!-- /header -->
        <!-- Header-->

         <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Importar inventario desde excel</h1>
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

        <?php
        $control=0;
            if(isset($_POST['registrar'])){
                include("PHP/conexion.php");
                $campana=$_POST['campana'];
                mysqli_query($con,"SET NAMES 'utf8'");
                $file = $_FILES["archivo"]["tmp_name"];
                $file_open = fopen($file,"r");
                while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
                {
                $name = $csv[0];
                $age = $csv[1];
                $country = $csv[2];
                mysql_query("INSERT INTO employee VALUES ('$name','$age','country')");
                }
                

             /*   if( $insertar = mysqli_query($con, "INSERT INTO Campaña (NOMBRE) VALUES ('$campana')")){
                    $control=1;
                }else{
                    $control=0;
                }*/
            }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Instrucciones</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Subir inventario</h3>
                                  </div>
                                  <hr>
                            1-Descargar el <a href="FormatoInventarios/FormatoVortexZoui.xlsx"> formato Vortex Zoui </a><br>
                            2-Insertar la información en el archivo, únicamente insertar un número en la columna de <strong>ID</strong><br>
                            <div class="zoom">
                            <img class="zoom" src="instrucciones/imagenpaso2">
                            </div><br>
                            3-Eliminar acentos
                            4-Cambiar <strong>Ñ</strong> por <strong>N</strong> (Incluye mayusculas y minusculas)<br>
                            5-Remplazar <strong>, (coma)</strong> por <strong>_ (guion bajo)</strong><br>
                            6-Eliminar todo formato (La única columna que puede tener formato de número es la de código de barras, pero sin decimales)<br>
                            <div class="zoom">
                            <img class="zoom" src="instrucciones/imagenpaso6">
                            </div><br>
                            7-<strong>Importante, los datos de la columna sucursal deben ser exactamente como encuentra registrada en <a href="ver_sucursales.php"> sucursales </a></strong><br>
                            8-Eliminar los encabezados<br>
                            <div class="zoom">
                            <img class="zoom" src="instrucciones/imagenpaso8">
                            </div><br>
                            9-Guardar como <strong>Valores separados por comas (.csv)</strong><br>
                            <div class="zoom">
                            <img class="zoom" src="instrucciones/imagenpaso9">
                            </div><br>
                            10-Importar el archivo
                            

							
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                      <form method="POST"   action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="campana" class="control-label mb-1">Seleccione el archivo csv</label>
                                          <input type="file" name="archivo" />
                                        </div>
                                      <div>
                                          <button id="payment-button" type="submit" name="registrar" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-file-excel-o"></i>&nbsp;
                                              <span id="payment-button-amount">Importar</span>
                                          </button>
                                      </div>
                                  </form>
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
