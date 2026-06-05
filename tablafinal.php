```php
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Joselin García de Luna - Unidad 3 - Tabla Final</title>

<style>

body{
font-family: Arial, sans-serif;
background: linear-gradient(135deg,#A7C7E7,#F8C8DC);
text-align:center;
margin:0;
padding:0;
}

h1{
margin-top:30px;
color:#333;
}

form{
margin:20px;
}

input[type="text"]{
padding:10px;
border-radius:6px;
border:1px solid #ccc;
width:200px;
}

input[type="submit"]{
padding:10px 15px;
border:none;
border-radius:6px;
background:#6C8CD5;
color:white;
cursor:pointer;
}

input[type="submit"]:hover{
background:#4e6fb8;
}

table{
width:95%;
margin:auto;
border-collapse:collapse;
background:white;
table-layout:fixed;
}

th{
background:#F8C8DC;
padding:12px;
border:1px solid #ddd;
}

td{
padding:10px;
border:1px solid #ccc;
text-align:justify;
word-wrap:break-word;
}

tr:nth-child(even){
background:#f9f9f9;
}

a{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#6C8CD5;
color:white;
text-decoration:none;
border-radius:6px;
}

a:hover{
background:#4e6fb8;
}

</style>
</head>

<body>

<h1>Tabla Final de Personajes</h1>

<form method="GET" action="">
<input type="text" name="buscar" placeholder="Buscar personaje">
<input type="submit" value="Buscar">
</form>

<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "joselin";

$conexion = new mysqli($server,$username,$password,$database);

if($conexion->connect_error){
die("Error de conexión: ".$conexion->connect_error);
}

if(isset($_GET['buscar'])){
$buscar = $_GET['buscar'];
$sql = "SELECT * FROM personajes WHERE personaje LIKE '%$buscar%'";
}else{
$sql = "SELECT * FROM personajes";
}

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){

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

while($row = $resultado->fetch_assoc()){

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

}else{

echo "<p>No se encontraron personajes.</p>";

}

$conexion->close();

?>

<br>

<a href="index.html">Volver al inicio</a>

</body>
</html>
```
