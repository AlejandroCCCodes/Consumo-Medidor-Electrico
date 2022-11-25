<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo Medidor Eléctrico</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>Consumo Medidor Eléctrico</header>
        <form action="./calcular.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Departamento Piso Nº 1</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Ingrese Lectura Anterior</label>
                            <input type="number" name="anterior1" step="any" required>
                        </div>
                        <div class="input-field">
                            <label>Ingrese Lectura Actual</label>
                            <input type="number" name="actual1" step="any" required>
                        </div>
                    </div>
                </div>
                <div class="details ID">
                    <span class="title">Departamento Piso Nº 2</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Ingrese Lectura Anterior</label>
                            <input type="number" name="anterior2" step="any" required>
                        </div>
                        <div class="input-field">
                            <label>Ingrese Lectura Actual</label>
                            <input type="number" name="actual2" step="any" required>
                        </div>
                    </div>
                </div> 
                <div class="details personal">
                    <span class="title">Datos Generales</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Ingrese el total a pagar</label>
                            <input type="number" name="total" step="any" required>
                        </div>
                        <div class="input-field">
                            <label>Ingrese el consumo total (kwh)</label>
                            <input type="number" name="totalkwh" step="any" required>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Calcular">
            </div>
            
        </form>
    </div>
    
</body>
</html>