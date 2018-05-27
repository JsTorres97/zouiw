<?php

include("conexion.php");
mysqli_query($con,"SET NAMES 'utf8'");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = mysqli_real_escape_string($con,$_POST['usuario']);
    $mypassword = mysqli_real_escape_string($con,$_POST['passwd']); 
    
    $sql = "SELECT * FROM Usuario WHERE USUARIO = '$myusername';";
    $result = mysqli_query($con,$sql) or die(mysqli_error());


    if($row = mysqli_fetch_array($result)){
        if($row['CONTRASEÑA'] == $mypassword){

        session_start();

        $_SESSION['ID'] = $row['ID'];
        $_SESSION['TIPO_USUARIO'] = $row['TIPO_USUARIO'];
        $_SESSION['SUCURSAL'] = $row['SUCURSAL'];
        $_SESSION['USUARIO'] = $row['USUARIO'];
        $_SESSION['CONTRASEÑA'] = $row['CONTRASEÑA'];
        $_SESSION['NOMBRE'] = $row['NOMBRE'];
        $_SESSION['COMISION'] = $row['COMISION'];
        
        header("Location: ../PanelDeControl2/index.php");
   
        
        
        }else{
        echo "Contraseña incorrecta";
        //header("Location: index.html");
        exit();
        }
    }else{
        echo "Usuario no encontrado";
       //header("Location: index.html");
        exit();
        }

    }

?>