<?php
session_start();
require_once("../../conexion.php");
require_once("../../paginacion.inc.php");
require_once("../../libreria_menu.php");
//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
         <script type='text/javascript' src='../../ajax.js'></script>
         <script type='text/javascript' src='js/buscar_clientes.js'></script>
       </head>
       <body>
       <p> &nbsp;</p>";

       echo"
<!-------INICIO BUSCADOR ------------>
    <center>
    <h1>LISTADO DE CLIENTES</h1>
    <b><a href='clientes_nuevo.php'>Nuevo Cliente>>></a></b>
        <form action='#'' method='post' name='formu'>
            <table border='1' class='listado'>
                <tr>
                    <th>
                        <b>Nombre</b><br />
                        <input type='text' name='nombre' value='' placeholder='NOMBRE'  size='10' onKeyUp='buscar_clientes()'>
                    </th>
                    <th>
                        <b>Apellido</b><br />
                        <input type='text' name='apellido' value='' placeholder='APELLIDO' size='10' onKeyUp='buscar_clientes()'>
                    </th>
                    <th>
                        <b>Telefono</b><br />
                        <input type='text' name='telefono' value=''placeholder='TELEFONO'  size='10' onKeyUp='buscar_clientes()'>
                    </th>
                    
                </tr>
            </table>
        </form>
    </center>
<!--FIN BUSCADOR --------------->
";
      
echo "<div id='clientes1'>";

contarRegistros($db,"clientes");   
 
paginacion("clientes.php?") ; 
       
$sql = $db->Prepare("SELECT *
                     FROM clientes 
                     WHERE estado <> 'X'
                     ORDER BY cod_cliente DESC 
                     LIMIT ? OFFSET ?                       
                        ");
$rs = $db->GetAll($sql, array($nElem, $regIni));
   if ($rs) {
        echo"<center>
              <table class='listado'>
                <tr>                                   
                  <th>Nro</th><th>NOMBRE</th><th>APELLIDO</th><th>TELEFONO</th><th>FECHA_NACI</th><th>GERNERO</th>
                  <th><img src='../../imagenes/modificar.gif'></th><th><img src='../../imagenes/borrar.jpeg'></th>
                </tr>";
                $b=0;
                $total= $pag-1;
                $a = $nElem*$total;
                $b=$b+1+$a;
            foreach ($rs as $k => $fila) {                                       
                echo"<tr>
                        <td align='center'>".$b."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellido']."</td>
                        <td>".$fila['telefono']."</td>
                        <td>".$fila['fecha_naci']."</td>
                        <td>".$fila['genero']."</td>
                        <td align='center'>
                          <form name='formModif".$fila["cod_cliente"]."' method='post' action='cliente_modificar.php'>
                            <input type='hidden' name='cod_cliente' value='".$fila['cod_cliente']."'>
                            <a href='javascript:document.formModif".$fila['cod_cliente'].".submit();' title='Modificar cliente Sistema'>
                              Modificar>>
                            </a>
                          </form>
                        </td>
                        <td align='center'>  
                          <form name='formElimi".$fila["cod_cliente"]."' method='post' action='clientes_eliminar.php'>
                            <input type='hidden' name='cod_cliente' value='".$fila["cod_cliente"]."'>
                            <a href='javascript:document.formElimi".$fila['cod_cliente'].".submit();' title='Eliminar cliente Sistema' onclick='javascript:return(confirm(\"Desea realmente Eliminar el cliente ".$fila["nombre"]." ".$fila["apellido"]." ".$fila["telefono"]." ".$fila["fecha_naci"]." ".$fila["genero"]." ?\"))'; location.href='cliente_eliminar.php''> 
                              Eliminar>>
                            </a>
                          </form>                        
                        </td>
                     </tr>";
                     $b=$b+1;
            }
             echo"</table>
          </center>";
    }
    mostrar_paginacion();
echo "</body>
      </html> ";

 ?>