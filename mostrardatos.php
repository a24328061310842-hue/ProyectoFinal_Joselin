<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Joselin García de Luna - Registrar Personaje</title>

<style>
:root{
   --color-de-fondo:#FDF6EC;
   --color-de-letras:#2C3E50;
   --color-de-barra:#6C5CE7;
   --color-de-botones:#00B894;
   --color-extra:#FF7675;
}

body {
    font-family: Arial, sans-serif;
    background-color: var(--color-de-letras);
    color: #ffffff;
    text-align: center;
}

h1 {
    color: var(--color-extra);
}

form {
    width: 50%;
    margin: auto;
}

label {
    display: block;
    margin-top: 10px;
    color: #ffffff;
}

input[type="text"],
input[type="date"],
textarea {
    width: 60%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid yellow;
    border-radius: 5px;
    background-color: #1f1f1f;
    color: #ffffff;
}

input[type="submit"] {
    background-color: yellow;
    color: #000;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover{
    background-color: orange;
}

/* Fondo de Spider-Man */
body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: url('spiderman.jpg') center/cover no-repeat;
    opacity: 0.3;
}
</style>
</head>

<body>

<h1>Registro de Superhéroes</h1>

<img src="spiderman.jpg" width="250">

<form action="procesar_formulario.php" method="POST">

<label>Nombre Real:</label>
<input type="text" name="nombrereal" required>

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
<input type="date" name="creacion" required>

<label>Biografía:</label>
<textarea name="biografia" required></textarea>

<br>
<input type="submit" value="Guardar Datos">

</form>

</body>
</html>