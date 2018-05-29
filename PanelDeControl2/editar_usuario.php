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
                        <h1>Editar usuario</h1>
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
            if(isset($_POST['actualizar'])){
                include("PHP/conexion.php");
                $direccion=$_POST['direccion'];
                $sucursal=$_POST['sucursal'];
                $telefono=$_POST['telefono'];   
                $celular=$_POST['celular'];
                $correo=$_POST['correo'];
                $id_u=$_SESSION['usr'];

                mysqli_query($con,"SET NAMES 'utf8'");

                
                if( $insertar = mysqli_query($con, "UPDATE Usuario SET DIRECCION='$direccion', SUCURSAL='$sucursal', TELEFONO='$telefono', CELULAR='$celular', CORREO='$correo' WHERE ID='$id_u'")){
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
                                      <h3 class="text-center">Editar usuario</h3>
                                  </div>
                                  <hr>
                                  <!---->
                                  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="control-label mb-1" name="usuario">
                                        <?php
                                            include("PHP/conexion.php");
                                            mysqli_query($con,"SET NAMES 'utf8'");
                                            $res=mysqli_query($con,"SELECT * FROM  Usuario");
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
                            $id = $_POST['usuario'];
                            mysqli_query($con,"SET NAMES 'utf8'");
                            $sql=mysqli_query($con, "SELECT * FROM Usuario WHERE ID = '$id'");
                            $valores = mysqli_fetch_array($sql);
                            $num_usr = $valores['ID'];
                            $_SESSION['usr'] = $num_usr;
                            $direccion = $valores['DIRECCION'];
                            $telefono = $valores['TELEFONO'];
                            $celular = $valores['CELULAR'];
                            $correo = $valores['CORREO'];
                            $sucursal = $valores['SUCURSAL'];
                           
                            
                        
                    }
                    ?>
							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="sucursal" class="control-label mb-1">Sucursal</label>
                                          <select  class="form-control" name="sucursal">
                                              <option value="<?php echo $sucursal;?>" selected><?php echo $sucursal; ?></option>
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
                                          <label for="direccion" class="control-label mb-1">Dirección</label>
                                          <input id="direccion" name="direccion" type="text" class="form-control cc-number identified visa" value="<?php echo $direccion;?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Teléfono</label>
                                          <input id="telefono" name="telefono" type="text" class="form-control cc-number identified visa" value="<?php echo $telefono;?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="celular" class="control-label mb-1">Celular</label>
                                          <input id="celular" name="celular" type="text" class="form-control cc-number identified visa" value="<?php echo $celular;?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="correo" class="control-label mb-1">Correo</label>
                                          <input id="correo" name="correo" type="text" class="form-control cc-number identified visa" value="<?php echo $correo;?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div>
                                          <button id="payment-button" type="submit" name="actualizar" class="btn btn-lg btn-info btn-block">
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
                          <strong>Usuario actualizado con exito</strong>
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
