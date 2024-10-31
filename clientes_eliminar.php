<?php
session_start();
require_once("../../conexion.php");

$__cod_cliente = $_REQUEST["cod_cliente"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
//$db->debug=true;

/*LAS CONSULTAS SE TIENEN QUE HACER CON TODAS LAS TABLAS EN LAS QUE ID_PERSONA ESTA COMO HERENCIA*/
$sql = $db->Prepare("SELECT *
                     FROM clientes_clases
                     WHERE cod_cliente = ?
                     AND estado <> 'X'
                   ");
$rs = $db->GetAll($sql, array($__cod_cliente));

$sql2 = $db->Prepare("SELECT *
                     FROM promociones_clientes
                     WHERE cod_cliente = ?
                     AND estado <> 'X'
                   ");
$rs2 = $db->GetAll($sql2, array($__cod_cliente));


if (!$rs or !$rs2) {
    $reg = array();
    $reg["estado"] = 'X';
    $reg["usuario"] = $_SESSION["sesion_cod_usuario"];
    $rs1 = $db->AutoExecute("clientes", $reg, "UPDATE", "cod_cliente='".$__cod_cliente."'");
    header("Location:clientes.php");
    exit();
    
} else {
    require_once("../../libreria_menu.php");
     echo"<div class='mensaje'>";
        $mensage = "NO SE ELIMINARON LOS DATOS DEL CLIENTE PORQUE TIENE HERENCIA";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='clientes.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
}


echo"</body>
</html>";
?>
