<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");


//$db->debug=true;
$cod_cliente = $_POST["cod_cliente"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>
       <p> &nbsp;</p>
         <h1>MODIFICAR CLIENTE</h1>";

$sql = $db->Prepare("SELECT *
                     FROM clientes
                     WHERE cod_cliente = ?
                     AND estado = 'A'                        
                        ");
$rs = $db->GetAll($sql, array($cod_cliente));


        echo"<form action='cliente_modificar1.php' method='post' name='formu'>";
        echo"<center>
                <table class='listado'>
                  <tr>
                  </tr>";
                foreach ($rs as $k => $fila) {
                  $genero = htmlspecialchars($fila["genero"]);

                  $checked_masculino = ($genero === 'm') ? 'checked' : '';
                  $checked_femenino = ($genero === 'f') ? 'checked' : '';

             echo"<tr>
                    <th><b>(*)Nombre</b></th>
                    <td><input type='text' name='nombre' size='10' value='".$fila["nombre"]."'></td>
                  </tr>
                  <tr>
                    <th><b>Apellido</b></th>
                    <td><input type='text' name='apellido' size='10' value='".$fila["apellido"]."'></td>
                  </tr>
                  <tr>
                   <th><b>Telefono</b></th>
                   <td><input type='text' name='telefono' size='10' value='".$fila["telefono"]."'></td>
                </tr>
                <tr>
                   <th><b>(*)Fecha Nacimiento</b></th>
                   <td><input type='date' name='fecha_naci' size='10' value='".$fila["fecha_naci"]."'></td>
                </tr>
                <tr>
                <th><b>(*)Género</b></th>
                <td>
                <label>
                <input type='radio' name='genero' value='m' $checked_masculino> Masculino
                </label>
                <br>
                <label>
                    <input type='radio' name='genero' value='f' $checked_femenino> Femenino
                </label>
                <br>
                </td>
                <br>
                </tr>            
                  <tr>
                    <td align='center' colspan='2'>  
                      <input type='submit' value='MODIFICAR CLIENTE'><br>
                      (*)Datos Obligatorios
                      <input type='hidden' name='cod_cliente' value='".$fila["cod_cliente"]."'>
                    </td>
                  </tr>";
                }
                echo"</table>
                </center>";
          echo"</form>" ;     
    /*}*/

echo "</body>
      </html> ";

 ?>