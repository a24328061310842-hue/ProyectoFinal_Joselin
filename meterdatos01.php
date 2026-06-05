<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Joselin García de Luna - Registro de Superhéroes</title>

<style>
:root {
    --azul-pastel: #A7C7E7;
    --rosa-pastel: #F8C8DC;
}

body {
    font-family: Arial, sans-serif;
    background-color: var(--azul-pastel);
    color: #635f5ffe;
}

h1 {
    text-align: center;
    color: #ff69b4;
}

form {
    width: 50%;
    margin: auto;
    background-color: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background-color: var(--rosa-pastel);
    color: #333;
    border: none;
    cursor: pointer;
    margin-top: 15px;
    font-weight: bold;
}

input[type="submit"]:hover {
    background-color: #f4a6c1;
}

/* TABLA */
table{
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: white;
    color: black;
    font-size: 12px;
    border-radius: 10px;
    overflow: hidden;
}

th{
    background-color: var(--rosa-pastel);
    color: #333;
    padding: 10px;
}

td{
    padding: 8px;
    text-align: center;
}

tr:nth-child(even){
    background-color: #fce4ec;
}

tr:hover{
    background-color: #e3f2fd;
}
</style>
</head>

<body>

<h1>Registro de Superhéroes</h1>

<form method="post">

<label>Nombre Real:</label>
<input type="text" name="nombre" required>

<label>Nombre del Personaje:</label>
<input type="text" name="personaje" required>

<label>Altura:</label>
<input type="text" name="altura" required>

<label>Peso:</label>
<input type="text" name="peso" required>

<label>Poderes:</label>
<input type="text" name="poderes" required>

<label>Sexo:</label>
<input type="text" name="sexo" required>

<label>Debilidad:</label>
<input type="text" name="debilidad" required>

<label>Fecha de Creación:</label>
<input type="date" name="fecha_creacion" required>

<label>Biografía:</label>
<textarea name="descripcion" required></textarea>

<input type="submit" value="Guardar Datos">
</form>

<?php
// 🔹 CONEXIÓN A LA BASE joselin
$conexion = new mysqli("localhost", "root", "", "joselin");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 🔹 INSERTAR DATOS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $personaje = $_POST['personaje'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $poderes = $_POST['poderes'];
    $sexo = $_POST['sexo'];
    $debilidad = $_POST['debilidad'];
    $creacion = $_POST['fecha_creacion'];
    $biografia = $_POST['descripcion'];

    $sql = "INSERT INTO personajes 
    (nombrereal, personaje, altura, peso, poderes, sexo, debilidad, creacion, biografia)
    VALUES 
    ('$nombre','$personaje','$altura','$peso','$poderes','$sexo','$debilidad','$creacion','$biografia')";

    if ($conexion->query($sql) === TRUE) {
        echo "<p style='text-align:center;color:green;font-weight:bold;'>✅ Personaje agregado correctamente</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $conexion->error . "</p>";
    }
}

// 🔹 MOSTRAR DATOS
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

    while($row = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nombrereal"]."</td>";
        echo "<td>".$row["personaje"]."</td>";
        echo "<td>".$row["altura"]."</td>";
        echo "<td>".$row["peso"]."</td>";
        echo "<td>".$row["poderes"]."</td>";
        echo "<td>".$row["sexo"]."</td>";
        echo "<td>".$row["debilidad"]."</td>";
        echo "<td>".$row["creacion"]."</td>";
        echo "<td>".$row["biografia"]."</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center;'>No hay datos</p>";
}

$conexion->close();
?>

</body>
</html>