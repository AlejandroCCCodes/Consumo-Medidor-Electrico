<?php
//validamos datos del servidor
$host = "localhost";
$user = "root";
$pass = "";


//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
// DATOS GENERALES
$totalrecibo=$_POST['total'];
$khwtotal=$_POST['totalkwh'];

// PISO N 01
$lectanterior1=$_POST['anterior1'];
$lectactual1=$_POST['actual1'];


$consumo1=$lectactual1-$lectanterior1;
$costo1kWh1=$totalrecibo/$khwtotal;
$totalpagar1=$consumo1*$costo1kWh1;
$truncardecimal1=bcadd(sprintf('%F', $totalpagar1), '0', 2);


// PISO N 02
$lectanterior2=$_POST['anterior2'];
$lectactual2=$_POST['actual2'];


$consumo2=$lectactual2-$lectanterior2;
$costo1kWh2=$totalrecibo/$khwtotal;
$totalpagar2=$consumo2*$costo1kWh2;
$truncardecimal2=bcadd(sprintf('%F', $totalpagar2), '0', 2);

// PISO N 03
$precio3=$totalrecibo-($truncardecimal1+$truncardecimal2);
$truncardecimal3=bcadd(sprintf('%F', $precio3), '0', 2);

$lecturas=array();

$lecturas["PISO Nº 1"]=array(
    "LECTURA ANTERIOR"=>$lectanterior1,
    "LECTURA ACTUAL"=>$lectactual1,
    "CONSUMO"=>$consumo1,
    "PRECIO"=>$truncardecimal1,
);

$lecturas["PISO Nº 2"]=array(
    "LECTURA ANTERIOR"=>$lectanterior2,
    "LECTURA ACTUAL"=>$lectactual2,
    "CONSUMO"=>$consumo2,
    "PRECIO"=>$truncardecimal2,
);

$lecturas["PISO Nº 3"]=array(
    "LECTURA ANTERIOR"=>"GRATIS",
    "LECTURA ACTUAL"=>"GRATIS",
    "CONSUMO"=>"GRATIS",
    "PRECIO"=>$truncardecimal3,
);

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h4>Hemos conectado al servidor</h45</b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "medidor";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO datosmedidor (departamentos,lectanterior, lectactual, consumo, precio)
                             VALUES ('','$lectanterior1','$lectactual1','$consumo1','$truncardecimal1')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM datosmedidor ";//nombre de la tabla a consultar
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h5>Departamentos</th></h5>";
echo "<th><h5>Lectura Anterior</th></h5>";
echo "<th><h5>Lectura Actual</th></h5>";
echo "<th><h5>Consumo</th></h5>";
echo "<th><h5>Precio</th></h5>";
echo "</tr>";
while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";    
    echo "<td><h6>" . $colum['departamentos']. "</td></h6>";
    echo "<td><h6>" . $colum['lectanterior']. "</td></h6>";
    echo "<td><h6>" . $colum['lectactual']. "</td></h6>";    
    echo "<td><h6>" . $colum['consumo']. "</td></h6>";
    echo "<td><h6>" . $colum['precio']. "</td></h6>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.php"> Volver Atrás</a>';


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <title>Datos Registrados</title>
    <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

</body>
</html>