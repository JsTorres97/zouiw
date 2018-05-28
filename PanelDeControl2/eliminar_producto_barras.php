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
                        <h1>Eliminar producto por código de barras</h1>
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
                            <strong class="card-title">Productos</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Eliminar producto por código de barras</h3>
                                  </div>
                                  <hr>
                                  <!---->
                                  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="barras" class="control-label mb-1">Sucursal</label>
                                        <select  class="form-control" name="sucursal">
                                        <?php
                                            include("PHP/conexion.php");
                                            mysqli_query($con,"SET NAMES 'utf8'");
                                            $res=mysqli_query($con,"SELECT * FROM  Sucursal");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['NOMBRE'].'">'.$row['NOMBRE'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                         <div class="form-group">
                                          <label for="barras" class="control-label mb-1">Código de barras</label>
                                          <input id="barras" name="barras" type="text" class="form-control cc-number identified visa" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="eliminar" class="btn btn-primary"><i class="fa fa-save"></i> Eliminar producto</button>
                            </div>
                        </form>
                        <?php
                        $control=0;
                            
                       
                        if(isset($_POST['eliminar'])){
                            $sucursal = $_POST['sucursal'];
                            $cod = $_POST['barras'];
                            mysqli_query($con,"SET NAMES 'utf8'");
                            if($sql=mysqli_query($con, "DELETE  FROM Producto WHERE SUCURSAL='$sucursal' AND CODIGO_BARRAS='$cod'")){
                                $control=1;
                            }else{
                                $control=0;
                            }
                           
                            
                        
                    }
                    ?>
							
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
                          <strong>Producto eliminado con exito</strong>
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
