<?php
// DATOS GENERALES
$totalrecibo=$_REQUEST['total'];
$khwtotal=$_REQUEST['totalkwh'];

// PISO N 01
$lectanterior1=$_REQUEST['anterior1'];
$lectactual1=$_REQUEST['actual1'];


$consumo1=$lectactual1-$lectanterior1;
$costo1kWh1=$totalrecibo/$khwtotal;
$totalpagar1=$consumo1*$costo1kWh1;
$truncardecimal1=bcadd(sprintf('%F', $totalpagar1), '0', 2);


// PISO N 02
$lectanterior2=$_REQUEST['anterior2'];
$lectactual2=$_REQUEST['actual2'];


$consumo2=$lectactual2-$lectanterior2;
$costo1kWh2=$totalrecibo/$khwtotal;
$totalpagar2=$consumo2*$costo1kWh2;
$truncardecimal2=bcadd(sprintf('%F', $totalpagar2), '0', 2);

// PISO N 03
$precio3=$totalrecibo-($truncardecimal1+$truncardecimal2);
$truncardecimal3=bcadd(sprintf('%F', $precio3), '0', 2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo Medidor Eléctrico</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table{
        align-items: center;
        width: 95%;
        margin-left: 50px;
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
        align-items: center;
    }
</style>
</head>
<body>

<div style="text-align:center;">
<a href="./index.php" id="Anyadir-Rutina-btn" target="_blank"> Volver</a>
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

    <table>
        <tr bgcolor="#29668b">
            <td><font size="4" face="Arial Black" color="#fff"> Departamento </font></td>
            <td><font size="4" face="Arial Black" color="#fff"> Lectura Anterior</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Lectura Actual</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Consumo</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Precio Total</font></td>
        </tr>
        <tr>
            <td> <font size="3" face="Arial Black">PISO Nº 01 </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectanterior1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectactual1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $consumo1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $truncardecimal1 ?> </font></td>
        </tr>
    </table>


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

    <table>
        <tr bgcolor="#29668b">
            <td><font size="4" face="Arial Black" color="#fff"> Departamento </font></td>
            <td><font size="4" face="Arial Black" color="#fff"> Lectura Anterior</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Lectura Actual</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Consumo</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Precio Total</font></td>
        </tr>
        <tr>
            <td> <font size="3" face="Arial Black">PISO Nº 02 </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectanterior2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectactual2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $consumo2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $truncardecimal2 ?> </font></td>
        </tr>
    </table>

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
    
    <table>
        <tr bgcolor="#29668b">
            <td><font size="4" face="Arial Black" color="#fff"> Departamento </font></td>
            <td><font size="4" face="Arial Black" color="#fff"> Lectura Anterior</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Lectura Actual</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Consumo</font></td>
            <td><font size="4" face="Arial Black" color="#fff">Precio Total</font></td>
        </tr>
        <tr>
            <td> <font size="3" face="Arial Black">PISO Nº 01 </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectanterior1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectactual1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $consumo1 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $truncardecimal1 ?> </font></td>
        </tr>
        <tr>
            <td> <font size="3" face="Arial Black">PISO Nº 02 </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectanterior2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $lectactual2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $consumo2 ?> </font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $truncardecimal2 ?> </font></td>
        </tr>
        <tr>
            <td> <font size="3" face="Arial Black">PISO Nº 03 </font></td>
            <td> <font size="3" face="Arial Black"> NO MEDIDO </font></td>
            <td> <font size="3" face="Arial Black"> NO MEDIDO </font></td>
            <td> <font size="3" face="Arial Black"> NO MEDIDO</font></td>
            <td> <font size="3" face="Arial Black"> <?php echo $truncardecimal3 ?> </font></td>
        </tr>
    </table>

</body>
</html>




