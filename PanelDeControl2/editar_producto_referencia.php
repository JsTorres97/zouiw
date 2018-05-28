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
                        <h1>Editar producto por código referencia</h1>
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
     
            if(isset($_POST['buscar'])){
                include("PHP/conexion.php");
                $sucursal = $_POST['sucursal'];
                $codigo = $_POST['referencia'];
                $infoprod = mysqli_query($con, "SELECT * FROM producto WHERE REFERENCIA = '$codigo' AND SUCURSAL = '$sucursal'");
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
                $referencia = $prod['CODIGO_BARRAS'];

                /*if( $insertar = mysqli_query($con, "INSERT INTO marcas (MARCA, CONTACTO, DIRECCION, TELEFONO, CELULAR, CORREO, CUENTA_BANCARIA, MARKUP, LINEA) VALUES ('$marca', '$contacto', '$direccion', '$tel', '$cel', '$correo', '$cuenta', '$markup', '$linea')")){
                    $control=1;
                }else{
                    $control=0;
                }*/
            }
        ?>
        <?php
           $control=0;
            if(isset($_POST['actualizarprod'])){
                include("PHP/conexion.php");

                $id = $_SESSION['IDPROD'];
                $codigoa = $_POST['referencia'];
            
                
                $noma = $_POST['producto'];
                $colora = $_POST['color'];
                $cantidada  = $_POST['cantidad'];
                $pcza = $_POST['pcz'];
                $pczivaa = $_POST['pcziva'];
                $ppza = $_POST['ppz'];
                $mayoristaa = $_POST['mayorista'];
                $sociosa = $_POST['socios'];
                $empleadosa = $_POST['empleados'];
                $referenciaa = $_POST['barras'];
                
               

                
                if($actualizar = mysqli_query($con,"UPDATE Producto SET REFERENCIA = '$codigoa', CODIGO_BARRAS='$referenciaa', PRODUCTO = '$noma', COLOR = '$colora', CANTIDAD = '$cantidada', PCZ = '$pcza', PCZIVA = '$pczivaa', PPZ = '$ppza', PRECIO_MAYORISTA = '$mayoristaa', PRECIO_SOCIOS = '$sociosa', PRECIO_EMPLEADOS = '$empleadosa' WHERE ID= '$id'")){
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
                            <strong class="card-title">Productos</strong>
                        </div>
                        <div class="card-body">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                             
                                  <div class="card-title">
                                      <h3 class="text-center">Editar producto</h3>
                                  </div>
                                  <hr>

                                      <div class="form-group text-center">
                                      </div>
                                      <div class="form-group">
                                    

                                          <label for="referencia" class="control-label mb-1">Referencia</label>
                                         
                                          <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                                        
                                            <input id="referencia" name="referencia" type="text" value="<?php echo $codigo ?? "";?>" class="form-control" aria-required="true" aria-invalid="false">
                                            <label for="barras" class="control-label mb-1">Sucursal</label>
                                            <select class="form-control" name="sucursal">
                                            <?php
                                            include("PHP/conexion.php");
                                            $sql = "SELECT * FROM sucursal;"; 
                                            $res1=mysqli_query($con,$sql);
                                            while($row1 = mysqli_fetch_array($res1)){
                                            echo '<option value="'.$row1['NOMBRE'].'">'.$row1['NOMBRE'].'</option>'; 
                                            }	
                                            ?>
                                            </select><br>
                                            <button type="submit" name="buscar" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Buscar</button>
                                          </form>
                                      </div>
                                      
                                      <div class="form-group has-success">
                                          <label for="producto" class="control-label mb-1">Producto</label>
                                          <input id="producto" name="producto" type="text" value="<?php echo $nom ?? "";?>"class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="barras" class="control-label mb-1">Código de barras</label>
                                          <input id="barras" name="barras" type="text" class="form-control cc-number identified visa" value="<?php echo $referencia ?? ""; ?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="color" class="control-label mb-1">Color</label>
                                          <input id="color" name="color" type="text" class="form-control cc-number identified visa" value="<?php echo $color ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="cantidad" class="control-label mb-1">Cantidad</label>
                                          <input id="cantidad" name="cantidad" type="text" class="form-control cc-number identified visa" value="<?php echo $cantidad ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="pcz" class="control-label mb-1">PCZ $</label>
                                          <input id="pcz" name="pcz" type="text" class="form-control cc-number identified visa" value="<?php echo $pcz ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="pcziva" class="control-label mb-1">PCZ+I.V.A. $</label>
                                          <input id="pcziva" name="pcziva" type="text" class="form-control cc-number identified visa" value="<?php echo $pcziva ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="ppz" class="control-label mb-1">PPZ $</label>
                                          <input id="ppz" name="ppz" type="text" class="form-control cc-number identified visa" value="<?php echo $ppz ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="mayorista" class="control-label mb-1">Precio Embajadores $</label>
                                          <input id="mayorista" name="mayorista" type="text" class="form-control cc-number identified visa" value="<?php echo $mayorista ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="socios" class="control-label mb-1">Precio Asociados $</label>
                                          <input id="socios" name="socios" type="text" class="form-control cc-number identified visa" value="<?php echo $socios ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="empleados" class="control-label mb-1">Precio Equipo Zoui $</label>
                                          <input id="empleados" name="empleados" type="text" class="form-control cc-number identified visa" value="<?php echo $empleados ?? "";?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                          <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                      </div>
                                     
                                      <div>
                                          <button id="payment-button" type="submit" name="actualizarprod" class="btn btn-lg btn-info btn-block">
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
                          <strong>Producto actualizado con exito</strong>
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
