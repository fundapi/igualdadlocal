<?php
$host = "localhost"; /* Host name */
$user = "genero";
$password = "";
$dbname = "genero";

if (!isset($_POST["canton"]))
{
    $canton = "TODOS";
}
else
{
    $canton = $_POST["canton"];
}

?>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">

        <form action="" name="formulario" method="post">
<div class="row">
    <div class="col">
Seleccionar:<br>
<select class="form-control form-control-lg" name="canton" id="canton" onchange="this.form.submit()">
    <option value="TODOS" <?php if (isset($canton) && $canton=="TODOS") echo "selected";?>>TODOS LOS CANTONES</option>
    <option value="AMBATO" <?php if (isset($canton) && $canton=="AMBATO") echo "selected";?>>AMBATO</option>
    <option value="AZOGUES" <?php if (isset($canton) && $canton=="AZOGUES") echo "selected";?>>AZOGUES</option>
    <option value="BABAHOYO" <?php if (isset($canton) && $canton=="BABAHOYO") echo "selected";?>>BABAHOYO</option>
    <option value="CUENCA" <?php if (isset($canton) && $canton=="CUENCA") echo "selected";?>>CUENCA</option>
    <option value="ESMERALDAS" <?php if (isset($canton) && $canton=="ESMERALDAS") echo "selected";?>>ESMERALDAS</option>
    <option value="FRANCISCO DE ORELLANA" <?php if (isset($canton) && $canton=="FRANCISCO DE ORELLANA") echo "selected";?>>FRANCISCO DE ORELLANA</option>
    <option value="GUARANDA" <?php if (isset($canton) && $canton=="GUARANDA") echo "selected";?>>GUARANDA</option>
    <option value="GUAYAQUIL" <?php if (isset($canton) && $canton=="GUAYAQUIL") echo "selected";?>>GUAYAQUIL</option>
    <option value="IBARRA" <?php if (isset($canton) && $canton=="IBARRA") echo "selected";?>>IBARRA</option>
    <option value="LATACUNGA" <?php if (isset($canton) && $canton=="LATACUNGA") echo "selected";?>>LATACUNGA</option>
    <option value="LOJA" <?php if (isset($canton) && $canton=="LOJA") echo "selected";?>>LOJA</option>
    <option value="MACAS" <?php if (isset($canton) && $canton=="MACAS") echo "selected";?>>MACAS</option>
    <option value="MACHALA" <?php if (isset($canton) && $canton=="MACHALA") echo "selected";?>>MACHALA</option>
    <option value="NUEVA LOJA" <?php if (isset($canton) && $canton=="NUEVA LOJA") echo "selected";?>>NUEVA LOJA</option>
    <option value="PORTOVIEJO" <?php if (isset($canton) && $canton=="PORTOVIEJO") echo "selected";?>>PORTOVIEJO</option>
    <option value="QUITO" <?php if (isset($canton) && $canton=="QUITO") echo "selected";?>>QUITO</option>
    <option value="RIOBAMBA" <?php if (isset($canton) && $canton=="RIOBAMBA") echo "selected";?>>RIOBAMBA</option>
    <option value="SAN CRISTOBAL" <?php if (isset($canton) && $canton=="SAN CRISTOBAL") echo "selected";?>>SAN CRISTOBAL</option>
    <option value="SANTA ELENA" <?php if (isset($canton) && $canton=="SANTA ELENA") echo "selected";?>>SANTA ELENA</option>
    <option value="SANTO DOMINGO" <?php if (isset($canton) && $canton=="SANTO DOMINGO") echo "selected";?>>SANTO DOMINGO</option>
    <option value="TENA" <?php if (isset($canton) && $canton=="TENA") echo "selected";?>>TENA</option>
    <option value="TULCAN" <?php if (isset($canton) && $canton=="TULCAN") echo "selected";?>>TULCAN</option>
    <option value="PUYO" <?php if (isset($canton) && $canton=="PUYO") echo "selected";?>>PUYO</option>
    <option value="ZAMORA" <?php if (isset($canton) && $canton=="ZAMORA") echo "selected";?>>ZAMORA</option>
</select>
        
    </div>
</div>
<?php
            
$conexion = mysqli_connect($host, $user, $password, $dbname);
mysqli_query($conexion,"SET CHARACTER SET 'utf8'");    

mysqli_query($conexion,"SET @total=0");
            
?>

<?php

$texto_alcaldia = "";
$texto_vicealcaldia = "";

if ($canton == "TODOS")
{
    $SQL_alcalde_total = "select count(*) as cantidad from cantones where dignidad='ALCALDE' and canton!='DAULE' and canton!='DURAN'";
    $resultado_alcalde_total = mysqli_query($conexion,$SQL_alcalde_total);

    $contenido_alcalde_total = mysqli_fetch_array($resultado_alcalde_total);
    //total alcaldes
    $total_alcalde = $contenido_alcalde_total["cantidad"];

    $SQL_alcalde_m_total = "select count(*) as cantidad from cantones where dignidad='ALCALDE' and sexo='MUJER' and canton!='DAULE' and canton!='DURAN'";
    $resultado_alcalde_m_total = mysqli_query($conexion,$SQL_alcalde_m_total);

    $contenido_alcalde_m_total = mysqli_fetch_array($resultado_alcalde_m_total);
    //total alcaldes mujeres
    $total_alcalde_m = $contenido_alcalde_m_total["cantidad"];

    $total_alcalde_h = (int)$total_alcalde - (int)$total_alcalde_m;
    
    //Porcentajes
    $porcentaje_hombres = round(($total_alcalde_h/$total_alcalde)*100,2)."%";
    $porcentaje_mujeres = round(($total_alcalde_m/$total_alcalde)*100,2)."%";
    
    $texto_alcaldia = "<b>Alcaldía:</b>  Mujeres: $porcentaje_mujeres - Hombres: $porcentaje_hombres<br>";



    $SQL_vicealcalde_total = "select count(*) as cantidad from cantones where dignidad='VICEALCALDE' and canton!='DAULE' and canton!='DURAN'";
    $resultado_vicealcalde_total = mysqli_query($conexion,$SQL_vicealcalde_total);
    
    $contenido_vicealcalde_total = mysqli_fetch_array($resultado_vicealcalde_total);
    $total_vicealcalde = $contenido_vicealcalde_total["cantidad"];
    
    
    $SQL_vicealcalde_m_total = "select count(*) as cantidad from cantones where dignidad='VICEALCALDE' and sexo='MUJER' and canton!='DAULE' and canton!='DURAN'";
    $resultado_vicealcalde_m_total = mysqli_query($conexion,$SQL_vicealcalde_m_total);

    $contenido_vicealcalde_m_total = mysqli_fetch_array($resultado_vicealcalde_m_total);
    //total alcaldes mujeres
    $total_vicealcalde_m = $contenido_vicealcalde_m_total["cantidad"];

    $total_vicealcalde_h = (int)$total_vicealcalde - (int)$total_vicealcalde_m;
    
    //Porcentajes
    $porcentaje_hombres_v = round(($total_vicealcalde_h/$total_vicealcalde)*100,2)."%";
    $porcentaje_mujeres_v = round(($total_vicealcalde_m/$total_vicealcalde)*100,2)."%";
    
    $texto_vicealcaldia = "<b>Vicealcaldía:</b> Mujeres: $porcentaje_mujeres_v - Hombres: $porcentaje_hombres_v<br>";
        
}
else
{
    $SQL_alcalde_canton = "select sexo from cantones where dignidad='ALCALDE' and canton='$canton'";
    $resultado_alcalde_canton = mysqli_query($conexion,$SQL_alcalde_canton);

    $contenido_alcalde_canton = mysqli_fetch_array($resultado_alcalde_canton);
    
    $sexo_alcalde = $contenido_alcalde_canton["sexo"];
    if ($sexo_alcalde == "HOMBRE")
    {
        $texto_alcaldia = "<b>Alcaldía:</b> Hombre";
    }
    else
    {
        $texto_alcaldia = "<b>Alcaldía:</b> Mujer";
    }

    $SQL_vicealcalde_canton = "select sexo from cantones where dignidad='VICEALCALDE' and canton='$canton'";
    $resultado_vicealcalde_canton = mysqli_query($conexion,$SQL_vicealcalde_canton);

    $contenido_vicealcalde_canton = mysqli_fetch_array($resultado_vicealcalde_canton);
    
    $sexo_vicealcalde = $contenido_vicealcalde_canton["sexo"];
    if ($sexo_vicealcalde == "HOMBRE")
    {
        $texto_vicealcaldia = "<b>Vicealcaldía:</b> Hombre";
    }
    else
    {
        $texto_vicealcaldia = "<b>Vicealcaldía:</b> Mujer";
    }
    
    
    
}

?>
    <div class="row" style="padding-top:20px;">
    
    <div class="col-6"><p align="center">
        <?php echo $texto_alcaldia; ?>
    </p></div>

    <div class="col-6"><p align="center">
        <?php echo $texto_vicealcaldia; ?>
    </p></div>

</div>
            
<?php
if ($canton == "TODOS")
{
    $SQL_traer = "SELECT sexo, count(*) as Count, count(*) / @total * 100 AS Percent FROM (SELECT sexo, @total := @total + 1 FROM cantones where canton!='DAULE' and canton!='DURAN') temp GROUP BY sexo order by sexo desc";
}
else
{
    $SQL_traer = "SELECT sexo, count(*) as Count, count(*) / @total * 100 AS Percent FROM (SELECT sexo, @total := @total + 1 FROM cantones WHERE canton='$canton') temp GROUP BY sexo order by sexo desc";   
}

$resultado_traer = mysqli_query($conexion,$SQL_traer);

$datos_mostrar = "";
if (mysqli_num_rows($resultado_traer) != 0)
{
    if (mysqli_num_rows($resultado_traer) == 2)
    {            
        while ($contenido_traer = mysqli_fetch_array($resultado_traer))
        {
            $sexo = $contenido_traer["sexo"];
            $cantidad = $contenido_traer["Count"];
            $porcentaje = $contenido_traer["Percent"];
    
            $datos_mostrar .= $cantidad.",";
            //    echo "$sexo $cantidad $porcentaje<br>";
        }
    }
    else
    {
        $contenido_traer = mysqli_fetch_array($resultado_traer);
        $sexo = $contenido_traer["sexo"];
        $cantidad = $contenido_traer["Count"];
        $porcentaje = $contenido_traer["Percent"];
    
        if ($sexo == "HOMBRE")
            $datos_mostrar .= "0,".$cantidad;
        else
            $datos_mostrar .= $cantidad.",0";
    }
}
$datos_mostrar = rtrim($datos_mostrar, ",");                
            
//echo $datos_mostrar;
?>                 

<div class="row">

    <div class="col-12">
        <div class="chart-container">
            <canvas id="pie-chart"></canvas>
        </div>

    </div>
    
</div>

<div class="row">
    
    <div class="col-6">
                    <?php 
                        if ($canton != "TODOS")
                        {
                            //echo "Mujeres<br>";
                            $SQL_mujeres = "select * from cantones where canton='$canton' and sexo='MUJER'";
                            $resultado_mujeres = mysqli_query($conexion,$SQL_mujeres);
                            $i = 1;
                            $nombres_mujeres = "";
                            while ($contenido_mujeres = mysqli_fetch_array($resultado_mujeres))
                            {
                                $nombres = $contenido_mujeres["nombres"];
                                $apellidos = $contenido_mujeres["apellidos"];
                                $nombres_mujeres.="$nombres $apellidos<br>";
                                $i++;
                            }
                            $nombres_mujeres = rtrim($nombres_mujeres, ",");
                        }
                    ?>
    </div>
        <div class="col-6">
                    <?php 
                        if ($canton != "TODOS")
                        {
                            //echo "Hombres<br>";
                            $SQL_hombres = "select * from cantones where canton='$canton' and sexo='HOMBRE'";
                            $resultado_hombres = mysqli_query($conexion,$SQL_hombres);
                            $i = 1;
                            $nombres_hombres = "";
                            while ($contenido_hombres = mysqli_fetch_array($resultado_hombres))
                            {
                                $nombres = $contenido_hombres["nombres"];
                                $apellidos = $contenido_hombres["apellidos"];
                                $nombres_hombres .= "$nombres $apellidos<br>";
                                $i++;
                            }
                            $nombres_hombres = rtrim($nombres_hombres, ",");
                        }
                    ?>
    </div>
  </div>            

<script type="text/javascript">
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Mujeres", "Hombres"],
      datasets: [{
        label: "Porcentaje",
        backgroundColor: ["#11A6E6", "#CE5C1B"],
        data: [<?php echo $datos_mostrar;?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: ''
      },
    legend: {
        display: true,
        labels: {
            fontSize: 20,
            }
        }
    }
});
</script>
