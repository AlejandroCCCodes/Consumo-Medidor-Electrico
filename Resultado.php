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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo Medidor Eléctrico</title>
    <link rel="stylesheet" href="/facturastyle.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table{
    align: center;
    width: 95%;
    margin-left: 25px;
    margin-top: 30px;
    border-collapse: collapse;
    }
    table td, table th {
  border: 1px solid #ddd;
  padding: 0px;
  text-align: center;
    } 
    table th {
  padding-top: 5px;
  padding-bottom: 0px;
  text-align: center;
  background-color: #29668b;
  color: white;
    } 
    .electro{
    width: 300px;
    margin-left: 100px;
    margin-bottom: 10px;
    margin-top: 20px;
    }
    .nombre{
        text-align: left;
    }
    input{
        align: center;
    }
</style>
</head>
<body>
<div style="text-align:center;">
<a href="/index.php" id="Anyadir-Rutina-btn" target="_blank"> Volver</a>
</div>
<div style="text-align:center;">
<input type="button" value="Imprimir Recibos" onclick="window.print()">
</div>

<table class="default" align="center" width="100%">
		<tr>
			<td align="left" colspan="2"><img class="electro" width="150px" src="img/ElectroCalude.png"></td>
            <td align="left" colspan="1"><img width="70px" align="right" src="img/Recuerda.png"></td>
            <td align="left" colspan="3"><p class="frase" size="2" face="Arial">Nada desmotiva tanto como los clientes morosos. <br> Hacen que sea difícil disfrutar de los negocios.</p></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td class="nombre" colspan="3"><font size="5" face="Arial Black">CALZADA COLLAZOS, Catylee Daysi</font><br>Jr. Tarapaca 00S/N<br>Pblo PILCOMAYO<br>Pilcomayo, Huancayo - Junin<br><br></td>
			<td align= "center "colspan="2">TOTAL A PAGAR:<br><font size="6" face="Arial Black"><?php echo $truncardecimal1 ?></font></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td class="nombre" colspan="3"><font size="2" face="Arial Black">RECIBO Nº  :</font> 811920400327<br><font size="2" face="Arial Black"></font>20129646099</td>
			<td colspan="2"><font size="2" face="Arial Black">Recibo por Consumo del:  </font>26/11/2022 - 26/12/2022 </td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td><font size="2" face="Arial Black">Consumo Total:</font> <?php echo $khwtotal ?> </td> 
			<td><font size="2" face="Arial Black">Suministro:</font> 69038870 </td>
			<td><font size="2" face="Arial Black">Inicio Contrato: </font>04/11/2022</td>
			<td><font size="2" face="Arial Black">Fecha de Vencimiento: 14/01/2023 </font></td>
			<td><font size="2" face="Arial Black">Corte del Servicio:<br>15/01/2023 </font></td>
		</tr>
	</table>

    <?php 

echo "<table>";
echo "<tr>";
echo "<th><h5>Departamento</th></h5>";
echo "<th><h5>Lectura Anterior</th></h5>";
echo "<th><h5>Lectura Actual</th></h5>";
echo "<th><h5>Consumo</th></h5>";
echo "<th><h5>Precio Total</th></h5>";
echo "</tr>";
$c=1;
$p=2;
while ($c==1)
 {
    echo "<tr>";    
    echo "<td><h6>" . "PISO Nº 0". $p-1 . "</td></h6>";
    echo "<td><h6>" . $lectanterior1. "</td></h6>";
    echo "<td><h6>" . $lectactual1. "</td></h6>";    
    echo "<td><h6>" . $consumo1. "</td></h6>";
    echo "<td><h6>" . $truncardecimal1. "</td></h6>";
    echo "</tr>";
    $c=2;
    
}
echo "</table>";
    
    ?>

<table class="default" align="center" width="50%">
        <tr>
			<td align="left" colspan="2"><img class="electro" width="150px" src="img/ElectroCalude.png"></td>
            <td align="left" colspan="1"><img width="70px" align="right" src="img/Recuerda.png"></td>
            <td align="center" colspan="3"><p class="frase" size="2" face="Arial">Nada desmotiva tanto como los clientes morosos. <br> Hacen que sea difícil disfrutar de los negocios.</p></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td class="nombre" colspan="3"><font size="5" face="Arial Black">CALZADA COLLAZOS, Leslie Lucero</font><br>Jr. Tarapaca 00S/N<br>Pblo PILCOMAYO<br>Pilcomayo, Huancayo - Junin<br><br></td>
			<td align= "center "colspan="2">TOTAL A PAGAR:<br><font size="6" face="Arial Black"><?php echo $truncardecimal2 ?></font></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td colspan="3"><font size="2" face="Arial Black">RECIBO Nº  :</font> 811920400327<br><font size="2" face="Arial Black"></font>20129646099</td>
			<td colspan="2"><font size="2" face="Arial Black">Recibo por Consumo del:  </font>26/11/2022 - 26/12/2022 </td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td><font size="2" face="Arial Black">Consumo Total:</font> <?php echo $khwtotal ?> </td> 
			<td><font size="2" face="Arial Black">Suministro:</font> 69038870 </td>
			<td><font size="2" face="Arial Black">Inicio Contrato: </font>04/11/2022</td>
			<td><font size="2" face="Arial Black">Fecha de Vencimiento: 14/01/2023 </font></td>
			<td><font size="2" face="Arial Black">Corte del Servicio:<br>15/01/2023 </font></td>
		</tr>
	</table>

    <?php 

echo "<table>";
echo "<tr>";
echo "<th><h5>Departamento</th></h5>";
echo "<th><h5>Lectura Anterior</th></h5>";
echo "<th><h5>Lectura Actual</th></h5>";
echo "<th><h5>Consumo</th></h5>";
echo "<th><h5>Precio Total</th></h5>";
echo "</tr>";
$c=1;
$p=2;
while ($c==1)
 {
    echo "<tr>";    
    echo "<td><h6>" . "PISO Nº 0". $p . "</td></h6>";
    echo "<td><h6>" . $lectanterior2. "</td></h6>";
    echo "<td><h6>" . $lectactual2. "</td></h6>";    
    echo "<td><h6>" . $consumo2. "</td></h6>";
    echo "<td><h6>" . $truncardecimal2. "</td></h6>";
    echo "</tr>";
    $c=2;
    
}
echo "</table>";
    ?>

<table class="default" align="center" width="50%">
        <tr>
			<td align="left" colspan="2"><img class="electro" width="150px" src="img/ElectroCalude.png"></td>
            <td align="left" colspan="1"><img width="70px" align="right" src="img/Recuerda.png"></td>
            <td align="center" colspan="3"><p class="frase" size="2" face="Arial">Nada desmotiva tanto como los clientes morosos. <br> Hacen que sea difícil disfrutar de los negocios.</p></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td class="nombre" colspan="3"><font size="5" face="Arial Black">CALZADA COLLAZOS, Deyvid Alejandro</font><br>Jr. Tarapaca 00S/N<br>Pblo PILCOMAYO<br>Pilcomayo, Huancayo - Junin<br><br></td>
			<td align= "center "colspan="2">TOTAL A PAGAR:<br><font size="6" face="Arial Black"><?php echo $truncardecimal3 ?></font></td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td colspan="3"><font size="2" face="Arial Black">RECIBO Nº  :</font> 811920400327<br><font size="2" face="Arial Black"></font>20129646099</td>
			<td colspan="2"><font size="2" face="Arial Black">Recibo por Consumo del:  </font>26/11/2022 - 26/12/2022 </td>
		</tr>
		<tr bgcolor="#EEEEEE">
			<td><font size="2" face="Arial Black">Consumo Total:</font> <?php echo $khwtotal ?> </td> 
			<td><font size="2" face="Arial Black">Suministro:</font> 69038870 </td>
			<td><font size="2" face="Arial Black">Inicio Contrato: </font>04/11/2022</td>
			<td><font size="2" face="Arial Black">Fecha de Vencimiento: 14/01/2023 </font></td>
			<td><font size="2" face="Arial Black">Corte del Servicio:<br>15/01/2023 </font></td>
		</tr>
	</table>
    
    <?php


///////////////////////////////////////////////////////////////

echo "<table>";
echo "<tr>";
echo "<th><h5>Departamentos</th></h5>";
echo "<th><h5>Lectura Anterior</th></h5>";
echo "<th><h5>Lectura Actual</th></h5>";
echo "<th><h5>Consumo</th></h5>";
echo "<th><h5>Precio</th></h5>";
echo "</tr>";
$c=1;
$p=1;
while ($c==1 && $p<=3)
 {
    echo "<tr>";    
    echo "<td><h6>" . "PISO Nº 0". $p . "</td></h6>";
    $p+=1;
    echo "<td><h6>" . $lectanterior1. "</td></h6>";
    echo "<td><h6>" . $lectactual1. "</td></h6>";    
    echo "<td><h6>" . $consumo1. "</td></h6>";
    echo "<td><h6>" . $truncardecimal1. "</td></h6>";
    echo "</tr>";

    echo "<td><h6>" . "PISO Nº 0". $p . "</td></h6>";
    $p+=1;
    echo "<td><h6>" . $lectanterior2. "</td></h6>";
    echo "<td><h6>" . $lectactual2. "</td></h6>";    
    echo "<td><h6>" . $consumo2. "</td></h6>";
    echo "<td><h6>" . $truncardecimal2. "</td></h6>";
    echo "</tr>";

    echo "<td><h6>" . "PISO Nº 0". $p . "</td></h6>";
    $p+=1;
    echo "<td><h6>" . "No medido". "</td></h6>";
    echo "<td><h6>" . "No medido". "</td></h6>";    
    echo "<td><h6>" . "No medido". "</td></h6>";
    echo "<td><h6>" . $truncardecimal3. "</td></h6>";
    echo "</tr>";
    $c=5;
    
}
echo "</table>";
?>
</body>
</html>




