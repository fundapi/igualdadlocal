<?php
$host = "localhost"; /* Host name */
$user = "genero";
$password = "";
$dbname = "genero";

$canton = $_POST["canton"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
$dignidad = $_POST["dignidad"];

$i = 0;
if ($canton == "")
{
    echo "Error canton<br>";
    $i++;
}
if ($nombres == "")
{
    echo "Error nombres<br>";
    $i++;
}
if ($apellidos == "")
{
    echo "Error apellidos<br>";
    $i++;
}
if ($sexo == "")
{
    echo "Error sexo<br>";
    $i++;
}
if ($dignidad == "")
{
    echo "Error dignidad<br>";
    $i++;
}

if ($i == 0)
{
    $conexion = mysqli_connect($host, $user, $password, $dbname);
    mysqli_query($conexion,"SET CHARACTER SET 'utf8'");    

    $SQL_insertar = "INSERT INTO cantones set canton='$canton', nombres='$nombres', apellidos='$apellidos', sexo='$sexo', dignidad='$dignidad'";
    $resultado_insertar = mysqli_query($conexion,$SQL_insertar);
    //$contenido_insertar = mysqli_fetch_array($resultado_insertar);
    
    echo "Insertado<br>$SQL_insertar";
}
 


?>

