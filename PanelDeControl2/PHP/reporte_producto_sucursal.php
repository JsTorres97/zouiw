<?php 

include("../PHP/conexion.php");

mysqli_query($con,"SET NAMES 'utf8'");
/************************************************
 Recibir las variables de sucursal
 *************************************************/
$suc=$_POST['sucursal']; 

//recorremos el array de cervezas seleccionadas. No olvidarse q la primera posición de un array es la 0 

/*for ($i=0;$i<count($sucursal);$i++)    
{     
$suc[$i];    
} 
echo "Sucursal".$suc;*/

/******************************************** 
Write the query, call it, and find the number of fields 
/********************************************/ 
$qry =mysqli_query($con,"SELECT * from Producto WHERE SUCURSAL='$suc'"); 

$campos = mysqli_num_fields($qry);   
$i=0;   

/******************************************** 
Extract field names and write them to the $header 
variable 
/********************************************/
ob_start(); 
echo "<div align=\"center\">";
echo "&nbsp;<center><table border=\"1\" align=\"center\">"; 
echo "<tr bgcolor=\"#336666\"> 
  <td><font color=\"#ffffff\"><strong>ID</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>MARCA</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>CAMPAÑA</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>SUCURSAL</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>LINEA</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>CODIGO_BARRAS</strong></font></td>
  <td><font color=\"#ffffff\"><strong>REFERENCIA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PRODUCTO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>TEMPORADA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>COLOR</strong></font></td>
  <td><font color=\"#ffffff\"><strong>TALLA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>CANTIDAD</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PCZ</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PCZIVA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PPZ</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PRECIO_MAYORISTA</strong></strong></font></td>
  <td><font color=\"#ffffff\"><strong>PRECIO_SOCIOS</strong></font></td>
  <td><font color=\"#ffffff\"><strong>PRECIO_EMPLEADOS</strong></font></td>
  <td><font color=\"#ffffff\"><strong>CODIGO_ZOUI</strong></font></td>
</tr>"; 

while($row=mysqli_fetch_array($qry)) 
{   
    echo "<tr>";   
     for($j=0; $j<$campos; $j++) {   
         echo "<td>".$row[$j]."</td>";   
     }   
     echo "</tr>";         
}   
echo "</table>"; 
echo "</div>";

$reporte = ob_get_clean();







/******************************************** 
Set the automatic downloadn section 
/********************************************/

header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8"); 
header("Content-Disposition: attachment; filename=Reporte.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0");

echo $reporte; 


?>