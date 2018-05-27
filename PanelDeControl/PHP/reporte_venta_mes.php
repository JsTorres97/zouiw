<?php 

include("../../PHP/conexion.php");

mysqli_query($con,"SET NAMES 'utf8'");
/************************************************
 Recibir las variables de sucursal
 *************************************************/
$mes = $_POST['mes'];
$year = $_POST['year'];
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
$qry =mysqli_query($con,"SELECT * FROM ventas WHERE MES='$mes' AND AÑO='$year' AND SUCURSAL='$suc'"); 

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
  <td><font color=\"#ffffff\"><strong>TICKET</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>SUCURSAL</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>VENDEDOR</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>DIA</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>MES</strong></font></td> 
  <td><font color=\"#ffffff\"><strong>AÑO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>TIPO_VENTA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>FACTURA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>FORMA_DE_PAGO</strong></font></td>
  <td><font color=\"#ffffff\"><strong>DESCUENTO_AL_TOTAL</strong></font></td>
  <td><font color=\"#ffffff\"><strong>TOTAL</strong></font></td>
  <td><font color=\"#ffffff\"><strong>COMISION_BANCARIA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>COMISION_VENDEDOR</strong></font></td>
  <td><font color=\"#ffffff\"><strong>VENTA_NETA</strong></font></td>
  <td><font color=\"#ffffff\"><strong>NUMERO DE PRODUCTOS</strong></font></td>
  <td><font color=\"#ffffff\"><strong>CLIENTE</strong></strong></font></td>
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

header("Content-type: application/vnd.ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=Reporte.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0");  

echo $reporte; 


?>