<?php


require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$year = $_POST['year'];
$suc=$_POST['sucursal']; 

$total = $_POST['total'];
$efe = $_POST['efectivo'];
$deb = $_POST['debito'];
$cre = $_POST['credito'];
$amex = $_POST['amex'];
$msi = $_POST['meses'];

/*
	Este ejemplo imprime un hola mundo en una impresora de tickets
	en Windows.
	La impresora debe estar instalada como genérica y debe estar
	compartida
*/

/*
	Conectamos con la impresora
*/


/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "POS58"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);

/*
	Imprimimos un mensaje. Podemos usar
	el salto de línea o llamar muchas
	veces a $printer->text()
*/
$printer->text("Reporte de venta\n \n Fecha".$dia."/".$mes."/".$year."\n".
"\n \n Sucursal ".$suc.
"\n \n Efectivo $".$efe.
"\n \n Débito $".$deb.
"\n \n Crédito $".$cre.
"\n \n AMEX $".$amex.
"\n \n 6 MSI $".$msi.
"\n \n Total $".$total.
"\n \n \n \n");

/*
	Hacemos que el papel salga. Es como 
	dejar muchos saltos de línea sin escribir nada
*/
$printer->feed();

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
?>