<?php
session_start();
require_once("../../conexion.php");
//$db->debug=true;
echo"<html> 
       <head>
       <script type='text/javascript'>
       var ventanacalendario=false
       function imprimir(){
          if(confirm('desea imprimir ?')){
            window.print();
          }
        }
       </script>
       </head>
       <body style='cursor:pointer;cursor:hand' onclick=imprimir();'>";

$sql = $db->Prepare("SELECT * FROM vista_instructores_promociones");
$rs = $db->GetAll($sql);

$sql1 = $db->Prepare("SELECT * FROM vista_clientes");
$rs1 = $db->GetAll($sql1);
        $nombre = $rs1[0]["nombre"];
     	$logo_gimnasio = $rs1[0]["logo_gimnasio"];
        $fecha=date("Y-m-d H:i:s");

if($rs){
    echo"
    <table width='100%'border='0'>
    <tr>
    <td align='center' width='80%'><h1>GIMNASIO DE CLIENTES PROMOCIONES/h1></td>
    </tr>
    </table>
    ";
    echo "
    <center>
    <table border='1' cellspacing='0'>
    <tr>
            <th>Nro</th>
            <th>CLIENTE</th>
            <th>PROMOCION</th>
        </tr>";
        $b = 1;
    foreach ($rs as $k => $fila) {
        echo "<tr>
            <td align='center'>" . $b . "</td>
            <td>" . $fila['cliente'] . "</td>
            <td>" . $fila['promocion'] . "</td>
                     </tr>";
        $b = $b + 1;
    }
        echo "</table>
        <b>fecha:</b>".$fecha."
        </center>";
    }
    echo "</body>
            </html>";
?>