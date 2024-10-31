<?php
session_start();
require_once("../../conexion.php");

//$db->debug=true;
echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>";
       
$cod_cliente = $_POST["cod_cliente"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$fecha_naci = $_POST["fecha_naci"];
$genero = $_POST["genero"];

if(($nombre!="") and  ($apellido!="") and ($telefono!="")){
   $reg = array();
   $reg["cod_gimnasio"] = 1;
   $reg["nombre"] = $nombre;
   $reg["apellido"] = $apellido;
   $reg["telefono"] = $telefono;
   $reg["fecha_naci"] = $fecha_naci;
   $reg["genero"] = $genero;

   $reg["usuario"] = $_SESSION["sesion_cod_usuario"];   
   $rs1 = $db->AutoExecute("clientes", $reg, "UPDATE", "cod_cliente='".$cod_cliente."'");
   header("Location: clientes.php");
   exit();
} else {
   require_once("../../libreria_menu.php");
           echo"<div class='mensaje'>";
        $mensage = "NO SE MODIFICARON LOS DATOS DEL CLIENTE";
        echo"<h1>".$mensage."</h1>";
        
        echo"<a href='clientes.php'>
                  <input type='button'style='cursor:pointer;border-radius:10px;font-weight:bold;height: 25px;' value='VOLVER>>>>'></input>
             </a>     
            ";
       echo"</div>" ;
   }
echo "</body>
      </html> ";
?> 