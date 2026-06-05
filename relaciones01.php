<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Fuentes -->
<link href="https://fonts.cdnfonts.com/css/black-hoops" rel="stylesheet">

<!-- Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<title>Joselin Garcia De Luna</title>

<style>
:root{
    --color-fondo:#0b132b;
    --color-secundario:#1c2541;
    --color-texto:#ffffff;
    --color-acento:#5bc0eb;
    --color-extra:#ff69b4;
}

body{
    background-color: var(--color-fondo);
    color: var(--color-texto);
}

/* TITULOS */
h1{
    font-family: 'Georgia', serif;
    color: var(--color-extra);
    text-align: center;
    font-size: 50px;
    letter-spacing: 2px;
    text-shadow: 2px 2px 5px rgba(255,105,180,0.5);
}

h2{
    font-family: 'Arial', sans-serif;
    color: var(--color-acento);
    text-align: center;
}

/* TABLA */
table{
    width: 80%;
    margin: auto;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: var(--color-secundario);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 15px rgba(255,105,180,0.3);
}

th{
    background-color: var(--color-extra);
    color: white;
}

th, td{
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid var(--color-texto);
}

tr:hover{
    background-color: var(--color-acento);
    color: black;
}

/* NAVBAR */
.navbar{
    background-color: var(--color-extra);
}
.navbar a{
    color: white !important;
}
</style>

</head>

<body>

<nav class="navbar">
<div class="container">

<a class="navbar-brand" href="index.html">Inicio</a>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">

<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">Datos</a>
<ul class="dropdown-menu">
<li><a href="bootstrap.php">Bootstrap Datos</a></li>
<li><a href="meterdatos.php">Meter Datos</a></li>
</ul>
</li>

<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">Relaciones</a>
<ul class="dropdown-menu">
<li><a href="relaciones1.php">Relaciones 1</a></li>
<li><a href="relaciones2.php">Relaciones 2</a></li>
<li><a href="relaciones3.php">Relaciones 3</a></li>

</ul>
</li>

<li class="dropdown">
<a class="dropdown-toggle" href="#" data-toggle="dropdown">Extras</a>
<ul class="dropdown-menu">
<li><a href="#">Perfil</a></li>
<li><a href="#">Calculadora</a></li>
<li><a href="#">Tienda parte 1</a></li>
</ul>
</li>

</ul>
</div>
</div>
</nav>

<h1>Personajes de Marvel</h1>
<h2>Personajes</h2>

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Alias</th>
<th>Fecha de Creación</th>
<th>Descripción</th>
<th>Título del cómic</th>
<th>Superpoder</th>
</tr>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "root";
$password = "";
$server = "localhost";
$database = "joselin";

$conexion = new mysqli($server, $username, $password, $database);

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
}

$sql ="SELECT
p.personajeID,
p.nombre,
p.alias,
p.descripcion,
p.fechacreacion,
c.titulo,
s.nombre AS nombre_superpoder
FROM personajes p
LEFT JOIN personajecomic pc ON p.personajeID = pc.personajeID
LEFT JOIN comics c ON pc.comicID = c.comicID
LEFT JOIN personajesuperpoder ps ON p.personajeID = ps.personajeID
LEFT JOIN superpoderes s ON ps.superpoderID = s.superpoderID";

$result = $conexion->query($sql);

if($result && $result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['personajeID'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['alias'] . "</td>";
        echo "<td>" . $row['fechacreacion'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['nombre_superpoder'] . "</td>";
        echo "</tr>";
    }
}else{
    echo "<tr><td colspan='7'>No se encontraron personajes.</td></tr>";
}

$conexion->close();
?>

</table>

</body>
</html>