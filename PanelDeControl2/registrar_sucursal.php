<?php session_start(); ?>
<!doctype html>

<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vortex Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include("formatos/links.html"); ?>

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
                        <h1>Registrar sucursal</h1>
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
                $nombre=$_POST['nombre'];
                $calle=$_POST['calle'];
                $numero=$_POST['numero'];
                $municipio=$_POST['municipio'];
                $estado=$_POST['estado'];
                $cod_postal=$_POST['cod_postal'];
                $tel=$_POST['telefono'];
                $tipo_tienda=$_POST['tienda'];
               

                
                if( $insertar = mysqli_query($con, "INSERT INTO Sucursal (NOMBRE, CALLE, NUMERO, MUNICIPIO, ESTADO, CP, TELEFONO, CONCEPTO) VALUES ('$nombre', '$calle', '$numero', '$municipio', '$estado', '$cod_postal', '$tel', '$tipo_tienda')")){
                    $control=1;
                }else{
                    $control=0;
                }
            }
        ?>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sucursal</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Registrar sucursal</h3>
                                  </div>
                                  <hr>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="nombre" class="control-label mb-1">Nombre</label>
                                          <input id="nombre" name="nombre" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div class="form-group has-success">
                                          <label for="calle" class="control-label mb-1">Calle</label>
                                          <input id="calle" name="calle" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="num" class="control-label mb-1">Número #</label>
                                          <input id="numero" name="numero" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="municipio" class="control-label mb-1">Municipio</label>
                                          <input id="municipio" name="municipio" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="estado" class="control-label mb-1">Estado</label>
                                          <input id="estado" name="estado" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cod_postal" class="control-label mb-1">Código Postal</label>
                                          <input id="cod_postal" name="cod_postal" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Teléfono</label>
                                          <input id="telefono" name="telefono" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cod_postal" class="control-label mb-1">Tipo de tienda</label>
                                          <select  class="form-control" name="tienda">
                                            <option value="Zoui">Zoui</option>
                                            <option value="Zandia">Zandia</option>
                                           </select> 
                                      </div>
                                     
                                     
                                     
                                      <div>
                                          <button id="payment-button" type="submit" name="registrar" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-group"></i>&nbsp;
                                              <span id="payment-button-amount">Registrar</span>
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header"><?php
                      if($control==1){
                          echo '<div class="alert alert-success">
                          <strong>Sucursal registrada con exito</strong>
                        </div>';
                      }else{
                          echo'';
                      }
                      ?></div>
                      
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
