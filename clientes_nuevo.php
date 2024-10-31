<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");

//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <script type='text/javascript' src='../js/expresiones_regulares.js'></script>
         <script type='text/javascript' src='js/validacion_clientes.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";
              
       echo"<h1>INSERTAR CLIENTE</h1>";
       
 /*  if ($rs) {*/
        echo"<form action='clientes_nuevo1.php' method='post' name='formu'>";
        echo"<center>
                <table class='listado'>
                <tr>
                    <th><b>(*)Nombres</b></th>
                    <td><input type='text' name='nombre' placeholder='NOMBRE (*)' maxlength='30' onkeyup='this.value=this.value.toUpperCase()' ></td>
                </tr>
                <tr>
                    <th><b>Apellido</b></th>
                    <td><input type='text' name='apellido' placeholder='APELLIDO' maxlength='20' onkeyup='this.value=this.value.toUpperCase()' ></td>
                </tr>
                <tr>
                   <th><b>Telefono</b></th>
                   <td><input type='text' name='telefono' placeholder='TELEFONO' maxlength='20' onkeyup='this.value=this.value.toUpperCase()' ></td>
                </tr>
                <tr>
                   <th><b>(*)Fecha Nacimiento</b></th>
                   <td><input type='date' name='fecha_naci' placeholder='FECHA NACIMIENTO (*)' maxlength='20' onkeyup='this.value=this.value.toUpperCase()'></td>
                </tr>
                <tr>
                <th><b>(*)Género</b></th>
                <td>
                <label>
                <input type='radio' name='genero' value='m'> Masculino
                </label>
                <br>
                <label>
                    <input type='radio' name='genero' value='f'> Femenino
                </label>
                <br>
                </td>
                <br>
                </tr>
                <td align='center' colspan='2'>
                <input type='button' value='ADICIONAR CLIENTE' onclick='validar();'>
                <input type='reset' value='BORRAR' onclick='validar();'>  
	            </td>
                <br><br>
                (*)DATO OBLIGATORIO
               
                </table>
                </center>";
          echo"</form>" ;     
    /*}*/

echo "</body>
      </html> ";

 ?>