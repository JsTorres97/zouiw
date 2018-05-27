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
                        <h1>Editar sucursal</h1>
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
                $id_t=$_SESSION['tienda'];
               

                
                if( $insertar = mysqli_query($con, "UPDATE sucursal SET NOMBRE='$nombre', CALLE='$calle', NUMERO='$numero', MUNICIPIO='$municipio', ESTADO='$estado', CP='$cod_postal', TELEFONO='$tel', CONCEPTO='$tipo_tienda' WHERE ID='$id_t'")){
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
                            <!---->
                            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="control-label mb-1" name="clientes">
                                        <?php
                                            include("PHP/conexion.php");
                                            $res=mysqli_query($con,"SELECT * FROM  sucursal");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['ID'].'">'.$row['NOMBRE'].'</option>';
                                                
                                            }

                                        ?>
                                         </select>
                                            
                                    </div>
                                </div>
                            </div>
                            
                            <!-- /.row -->
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="obtener" class="btn btn-primary"><i class="fa fa-save"></i> Buscar información</button>
                            </div>
                        </form>
                        <?php
                        
                            
                       
                        if(isset($_POST['obtener'])){
                            $id = $_POST['clientes'];
                            $sql=mysqli_query($con, "SELECT * FROM sucursal WHERE ID = '$id'");
                            $valores = mysqli_fetch_array($sql);
                            $num_tienda = $valores['ID'];
                            $_SESSION['tienda'] = $num_tienda;
                            $nombre = $valores['NOMBRE'];
                            $calle = $valores['CALLE'];
                            $numero = $valores['NUMERO'];
                            $municipio = $valores['MUNICIPIO'];
                            $estado = $valores['ESTADO'];
                            $cp = $valores['CP'];
                            $tel = $valores['TELEFONO'];
                            $concepto = $valores['CONCEPTO'];                            
                        
                    }
                    ?>


							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="nombre" class="control-label mb-1">Nombre</label>
                                          <input id="nombre" name="nombre" type="text" value="<?php echo $nombre ?? "";?>" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div class="form-group has-success">
                                          <label for="calle" class="control-label mb-1">Calle</label>
                                          <input id="calle" name="calle" type="text" value="<?php echo $calle ?? "";?>" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="num" class="control-label mb-1">Número #</label>
                                          <input id="numero" name="numero" type="text" value="<?php echo $numero ?? "";?>" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="municipio" class="control-label mb-1">Municipio</label>
                                          <input id="municipio" name="municipio" type="text" value="<?php echo $municipio ?? "";?>" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="estado" class="control-label mb-1">Estado</label>
                                          <input id="estado" name="estado" type="text" value="<?php echo $estado ?? "";?>" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cod_postal" class="control-label mb-1">Código Postal</label>
                                          <input id="cod_postal" name="cod_postal" type="text" value="<?php echo $cp ?? "";?>" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Teléfono</label>
                                          <input id="telefono" name="telefono" type="text" value="<?php echo $tel ?? "";?>" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cod_postal" class="control-label mb-1">Tipo de tienda</label>
                                          <select  class="form-control" name="tienda">
                                            <option value="<?php echo $concepto ?? "";?>" selected><?php echo $concepto ?? "";?></option>
                                            <option value="Zoui">Zoui</option>
                                            <option value="Zandia">Zandia</option>
                                           </select> 
                                      </div>
                                     
                                     
                                     
                                      <div>
                                          <button id="payment-button" type="submit" name="registrar" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-edit"></i>&nbsp;
                                              <span id="payment-button-amount">Actualizar</span>
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
                          <strong>Sucursal actualizada con exito</strong>
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
