<?php
session_start();
require_once("../../conexion.php");

$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$fecha_naci = $_POST["fecha_naci"];
$genero = $_POST["genero"];


if(($nombre!="") and  ($apellido!="")){
   $reg = array();
   $reg["cod_gimnasio"] = 1;
   $reg["nombre"] = $nombre;
   $reg["apellido"] = $apellido;
   $reg["telefono"] = $telefono;
   $reg["fecha_naci"] = $fecha_naci;
   $reg["genero"] = $genero;
   
   $reg["fec_insercion"] = date("Y-m-d H:i:s");
   $reg["estado"] = 'A';
   $reg["usuario"] = $_SESSION["sesion_cod_usuario"];   
   $rs1 = $db->AutoExecute("clientes", $reg, "INSERT"); 
   header("Location: clientes.php");
   exit();
} else {
           echo"<div class='mensaje'>";
        $mensage = "NO SE INSERTARON LOS DATOS DEL CLIENTE";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='clientes_nuevo.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }


echo "</body>
      </html> ";
?> 