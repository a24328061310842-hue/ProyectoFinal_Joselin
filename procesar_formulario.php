<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Datos de conexión
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "joselin";

    $conexion = new mysqli($server, $username, $password, $database);

    if ($conexion->connect_error) {
        die("Conexion fallida: " . $conexion->connect_error);
    }

    // Recibir datos del formulario 
    $nombrereal = $_POST['nombrereal'];
    $personaje = $_POST['personaje'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $poderes = $_POST['poderes'];
    $sexo = $_POST['sexo'];
    $debilidad = $_POST['debilidad'];
    $creacion = $_POST['creacion'];
    $biografia = $_POST['biografia'];

    // Insertar datos
    $sql = "INSERT INTO personajes (nombrereal, personaje, altura, peso, poderes, sexo, debilidad, creacion, biografia) 
            VALUES ('$nombrereal', '$personaje', '$altura', '$peso', '$poderes', '$sexo', '$debilidad', '$creacion', '$biografia')";

    if ($conexion->query($sql) === TRUE) {
        echo "<h2>Datos guardados correctamente</h2>";
        echo "<br><a href='index.html'>Volver al inicio</a>";
    } else {
        echo "Error: " . $conexion->error;
    }

    $conexion->close();
}
?>