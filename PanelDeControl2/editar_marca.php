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
                        <h1>Editar marca</h1>
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
            $marca=$_POST['marca'];
            $contacto=$_POST['contacto'];
            $direccion=$_POST['direccion'];
            $tel=$_POST['telefono'];
            $cel=$_POST['celular'];
            $correo=$_POST['correo'];
            $cuenta=$_POST['cuenta'];
            $markup=$_POST['markup'];
            $linea=$_POST['linea'];
            $id_m=$_SESSION['marca'];

            if( $insertar = mysqli_query($con, "UPDATE marcas SET MARCA='$marca', CONTACTO='$contacto', DIRECCION='$direccion', TELEFONO='$tel', CELULAR='$cel', CORREO='$correo', CUENTA_BANCARIA='$cuenta', MARKUP='$markup', LINEA='$linea' WHERE ID='$id_m'")){
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
                            <strong class="card-title">Marcas</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Editar marca</h3>
                                  </div>
                                  <hr>
                                  <!---->
                                  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select  class="form-control" name="marcas">
                                        <?php
                                            include("PHP/conexion.php");
                                            $res=mysqli_query($con,"SELECT * FROM  marcas");
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<option value="'.$row['ID'].'">'.$row['MARCA'].'</option>';
                                                
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
                            $id = $_POST['marcas'];
                            $sql=mysqli_query($con, "SELECT * FROM marcas WHERE ID = '$id'");
                            $valores = mysqli_fetch_array($sql);
                            $num_marca = $valores['ID'];
                            $_SESSION['marca'] = $num_marca;
                            $marcao=$valores['MARCA'];
                            $conta=$valores['CONTACTO'];
                            $dir=$valores['DIRECCION'];
                            $telefono=$valores['TELEFONO'];
                            $celular=$valores['CELULAR'];
                            $correoo=$valores['CORREO'];
                            $cuentao=$valores['CUENTA_BANCARIA'];
                            $markupo=$valores['MARKUP'];
                            $lineao=$valores['LINEA'];                        
                        
                    }
                    ?>

							<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                      <div class="form-group text-center">
                                          
                                      </div>
                                      <div class="form-group">
                                          <label for="marca" class="control-label mb-1">Marca</label>
                                          <input id="marca" name="marca" type="text" value="<?php echo $marcao ?? ""; ?>"class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div class="form-group has-success">
                                          <label for="contacto" class="control-label mb-1">Contacto</label>
                                          <input id="contacto" name="contacto" type="text" value="<?php echo $conta ?? ""; ?>"class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="direccion" class="control-label mb-1">Dirección</label>
                                          <input id="direccion" name="direccion" type="text" class="form-control cc-number identified visa" value="<?php echo $dir ?? ""; ?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="telefono" class="control-label mb-1">Teléfono</label>
                                          <input id="telefono" name="telefono" type="text" class="form-control cc-number identified visa" value="<?php echo $telefono ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="celular" class="control-label mb-1">Celular</label>
                                          <input id="celular" name="celular" type="text" class="form-control cc-number identified visa" value="<?php echo $celular ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="correo" class="control-label mb-1">Correo</label>
                                          <input id="correo" name="correo" type="text" class="form-control cc-number identified visa" value="<?php echo $correoo ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cuenta" class="control-label mb-1">Cuenta bancaria</label>
                                          <input id="cuenta" name="cuenta" type="text" class="form-control cc-number identified visa" value="<?php echo $cuentao ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="markup" class="control-label mb-1">Mark Up</label>
                                          <input id="markup" name="markup" type="text" class="form-control cc-number identified visa" value="<?php echo $markupo ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="linea" class="control-label mb-1">Línea</label>
                                          <input id="linea" name="linea" type="text" class="form-control cc-number identified visa" value="<?php echo $lineao ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                     
                                      <div>
                                          <button id="payment-button" type="submit" name="registrar" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-shopping-bag"></i>&nbsp;
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
                          <strong>Marca actualizada con exito</strong>
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
