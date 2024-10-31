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
         <script type='text/javascript'>
         var ventanacalendario=false
         function imprimir(){
             ventanacalendario= window.open('instructores_personas.php','caledario','width=600,height=550, top=100; scrollbars=yes,menubars=no,statusbar=NO,Status=NO,resizable=YES,location=NO')
         }
         </script>
     
         <script type='text/javascript'>
         var ventanacalendario=false
         function generar_pdf(){
             ventanacalendario= window.open('instructores_personas_pdf.php','caledario','width=600,height=550, top=100; scrollbars=yes,menubars=no,statusbar=NO,Status=NO,resizable=YES,location=NO')
         }
         </script>
       </head>
       <body>
       <p> &nbsp;</p>";
              
       echo"<h1>GIMNASIO DE CLIENTES CON PROMOCIONES</h1>";

       $sql = $db->Prepare("SELECT * FROM vista_clientes_promociones");
       $rs = $db->GetAll($sql);
       if ($rs) {
           echo "<center>
           <table class='listado'>
               <tr>
                   <th>Nro</th>
                   <th>CLIENTES</th>
                   <th>PROMOCIONES</th>
               </tr>";
           $b = 1;
           foreach ($rs as $k => $fila) {
               echo "<tr>
                   <td align='center'>" . $b . "</td>
                   <td>" . $fila['cliente'] . "</td>
                   <td>" . $fila['nombre'] . "</td>
                            </tr>";
               $b = $b + 1;
           }
           echo "</table>
           <h2>
           <input type='radio' name='seleccionar' onclick='javascript:imprimir()'>imprimir
           </h2>
           <h2>
           <input type='radio' name='seleccionar' onclick='javascript:generrar_pdf()'>generar pdf
           </h2>
           </center>";
       }
       echo "</body>
               </html>"
       ?>