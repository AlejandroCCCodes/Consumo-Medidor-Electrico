<?php
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


echo " DEPARTAMENTOS";
echo "<br>";
echo "<br>";

// Recorrer el arreglo asociativo con un bucle foreach
foreach ($lecturas as $clave => $valor) {
    echo $clave . "<br>";
    foreach ($valor as $sub_clave => $sub_valor) {
        echo $sub_clave. " = " . $sub_valor . "<br>";
    }
    echo "<br>";
}

echo "<table border=1>";
$c=1; // Inicializamos una variable para el ciclo foreach
foreach ($lecturas as $clave => $valor) {
    if ($c==1) { // Solo para imprimir el encabezado una sola vez
        echo "<tr>";
        echo "<th>DEPARTAMENTOS</th>";
        // Recorre el arreglo asociativo con un bucle foreach
        foreach ($valor as $sub_clave => $sub_valor) {
            echo "<th>".$sub_clave."</th>";
        }
        echo "</tr>";
        $c=10; 
    }
    echo "<tr>";
    echo "<td>".$clave ."</td>";
    // Imprimir los datos con el bucle foreach
    foreach ($valor as $sub_clave => $sub_valor) {
        echo "<td>". $sub_valor . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>