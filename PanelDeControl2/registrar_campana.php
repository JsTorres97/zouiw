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
                        <h1>Registrar campaña</h1>
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
                

                if( $insertar = mysqli_query($con, "INSERT INTO Campaña (NOMBRE) VALUES ('$campana')")){
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
                            <strong class="card-title">Campañas</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Registrar campaña</h3>
                                  </div>
                                  <hr>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="campana" class="control-label mb-1">Nombre de la campaña</label>
                                          <input id="campana" name="campana" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div>
                                          <button id="payment-button" type="submit" name="registrar" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-shopping-bag"></i>&nbsp;
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
                          <strong>Marca registrada con exito</strong>
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
