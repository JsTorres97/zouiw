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
                        <h1>Registrar usuario</h1>
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
                $tipo=$_POST['tipo'];
                $sucursal=$_POST['sucursal'];
                $usuario=$_POST['usuario'];
                $passwd=$_POST['passwd'];
                $nombre=$_POST['nombre'];
                $direccion=$_POST['direccion'];
                $telefono=$_POST['telefono'];
                $celular=$_POST['celular'];
                $correo=$_POST['correo'];
                $comision=$_POST['comision'];
                $imagenid = $_FILES['imagenID']['tmp_name'];
                $imgContenidoID = addslashes(file_get_contents($imagenid));
                $imagencom = $_FILES['comprobantedomicilio']['tmp_name'];
                $imgContenidocom = addslashes(file_get_contents($imagencom));
                $imagensol = $_FILES['solicitud']['tmp_name'];
                $imgContenidosol = addslashes(file_get_contents($imagensol));
                mysqli_query($con,"SET NAMES 'utf8'");                
                if( $insertar = mysqli_query($con, "INSERT INTO Usuario (TIPO_USUARIO, SUCURSAL, USUARIO, CONTRASEÑA, NOMBRE, DIRECCION, TELEFONO, CELULAR, CORREO, COMISION, IMG_ID, IMG_COMPRODOM, IMG_SOLICITUD) VALUES ('$tipo', '$sucursal', '$usuario', '$passwd', '$nombre', '$direccion', '$telefono', '$celular', '$correo', '$comision', '$imgContenidoID', '$imgContenidocom', '$imgContenidosol')")){
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
                            <strong class="card-title">Usuarios</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Registrar usuario</h3>
                                  </div>
                                  <hr>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="sucursal" class="control-label mb-1">Tipo de usuario</label>
                                          <select class="form-control" name="tipo">
                                            <option value="Administración General">Administración General</option>
                                            <option value="Administración Sucursal">Administración Sucursal</option>
                                            <option value="Vendedor">Vendedor</option>
                                           </select> 
                                      </div>
                                      <div class="form-group">
                                          <label for="usuario" class="control-label mb-1">Usuario</label>
                                          <input id="usuario" name="usuario" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div class="form-group has-success">
                                          <label for="passwd" class="control-label mb-1">Contraseña</label>
                                          <input id="passwd" name="passwd" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="nombre" class="control-label mb-1">Nombre</label>
                                          <input id="nombre" name="nombre" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="direccion" class="control-label mb-1">Dirección</label>
                                          <input id="direccion" name="direccion" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Teléfono</label>
                                          <input id="telefono" name="telefono" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="celular" class="control-label mb-1">Celular</label>
                                          <input id="celular" name="celular" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="correo" class="control-label mb-1">Correo</label>
                                          <input id="correo" name="correo" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="sucursal" class="control-label mb-1">Sucursal</label>
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
                                      </div>
                                      <div class="form-group">
                                          <label for="sucursal" class="control-label mb-1">Comisión</label>
                                          <select class="form-control" name="comision">
                                            <option value="1.5">1.5</option>
                                            <option value="1">1</option>
                                            <option value="0.8">0.8</option>
                                           </select> 
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Imagen ID</label>
                                          <input type="file" class="form-control" id="image" name="imagenID" multiple>
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Comprobante de domicilio</label>
                                          <input type="file" class="form-control" id="image" name="comprobantedomicilio" multiple>
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Solicitud de empleo</label>
                                          <input type="file" class="form-control" id="image" name="solicitud" multiple>
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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
                          <strong>Usuario registrado con exito</strong>
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
