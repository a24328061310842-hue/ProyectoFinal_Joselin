<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Joselin García de Luna - Mostrar Personajes</title>

<style>
:root{
    --color-extra: #e018c9;
}

body{
    background-color: #1f2e72;
    color: white;
    font-family: Arial, sans-serif;
}

h1{
    color: var(--color-extra);
    text-align: center;
}

table{
    margin: auto;
    border-collapse: collapse;
    width: 90%;
}

th, td{
    border: 1px solid white;
    padding: 8px;
    text-align: center;
}

th{
    background-color: #dd4197;
}

img{
    width: 80px;
}
</style>
</head>

<body>

<h1>Personajes Guardados</h1>
<h1>Joselin Garcia De Luna</h1>

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "joselin";

$conexion = new mysqli($server, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM personajes";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre Real</th>
            <th>Personaje</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Poderes</th>
            <th>Sexo</th>
            <th>Debilidad</th>
            <th>Creación</th>
            <th>Biografía</th>
          </tr>";

    while ($row = $resultado->fetch_assoc()) {

        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nombrereal']."</td>
                <td>".$row['personaje']."</td>
                <td>".$row['altura']."</td>
                <td>".$row['peso']."</td>
                <td>".$row['poderes']."</td>
                <td>".$row['sexo']."</td>
                <td>".$row['debilidad']."</td>
                <td>".$row['creacion']."</td>
                <td>".$row['biografia']."</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center'>No hay registros</p>";
}

$conexion->close();
?>

<br>
<div style="text-align:center;">
<a href="index.html" style="color:white;">Volver al inicio</a>
</div>

</body>
</html>