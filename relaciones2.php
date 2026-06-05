<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joselin Garcia De Luna</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">

    <style>
        /* Fondo azul rey oscuro y textos claros */
        body { background-color:#102A43; color:#F0F4F8; font-family: 'Freckle Face', cursive; }
        h1, h2 { font-family:'Freckle Face', cursive; color:#EBF8FF; text-align:center; }
        
        /* Barra de navegación en azul rey intenso */
        .navbar { background-color:#0B409C; }
        .navbar-brand, .nav-link { color:#FFFFFF !important; font-family:'Freckle Face', cursive; }
        .nav-link:hover { color:#93C5FD !important; }
        
        /* Estilos de las tablas */
        table { margin: auto; border-collapse: collapse; width: 90%; background-color:#1E3A8A; margin-bottom: 30px; }
        th, td { border: 1px solid #FFFFFF; padding: 8px; text-align: center; }
        th { background-color:#02529C; color:#FFFFFF; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Inicio</a>
            <div class="navbar-nav">
                <a class="nav-link" href="bootstrap.php">Bootstrap Datos</a>
                <a class="nav-link" href="relaciones2.php">Relaciones 2</a>
            </div>
        </div>
    </nav>

    <h1>Cine</h1>
    <h2>Peliculas</h2>
    <table>
        <tr>
            <th>ID</th><th>Titulo</th><th>Año</th><th>Director</th><th>Actores</th><th>Personajes</th>
        </tr>
        <?php
        $conexion = new mysqli("localhost", "root", "", "peliculas");
        if(!$conexion->connect_error){
            $sql = "SELECT p.PeliculaID, p.Titulo, p.AnioLanzamiento, d.Nombre AS Director, 
                    GROUP_CONCAT(DISTINCT a.Nombre SEPARATOR ', ') AS Actores, 
                    GROUP_CONCAT(DISTINCT pa.Personaje SEPARATOR ', ') AS Personajes 
                    FROM Peliculas p 
                    LEFT JOIN Directores d ON p.DirectorID = d.DirectorID 
                    LEFT JOIN PeliculaActor pa ON p.PeliculaID = pa.PeliculaID 
                    LEFT JOIN Actores a ON pa.ActorID = a.ActorID 
                    GROUP BY p.PeliculaID";
            $result = $conexion->query($sql);
            if($result){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>{$row['PeliculaID']}</td>
                            <td>{$row['Titulo']}</td>
                            <td>{$row['AnioLanzamiento']}</td>
                            <td>{$row['Director']}</td>
                            <td>{$row['Actores']}</td>
                            <td>{$row['Personajes']}</td>
                          </tr>";
                }
            }
            $conexion->close();
        }
        ?>
    </table>

    <h1>Personajes de Marvel</h1>
    <h2>Personajes</h2>
    <table>
        <tr>
            <th>ID</th><th>Nombre</th><th>Alias</th><th>Fecha de Creación</th><th>Descripción</th><th>Título del cómic</th><th>Superpoder</th>
        </tr>
        <?php
        $conexion = new mysqli("localhost", "root", "", "joselin");
        if(!$conexion->connect_error){
            $sql = "SELECT 
                    p.id AS personajeID, 
                    p.nombrereal AS nombre, 
                    p.personaje AS alias, 
                    p.descripcion, 
                    p.creacion AS fechacreacion, 
                    c.titulo, 
                    s.nombre AS nombre_superpoder 
                    FROM personajes p 
                    LEFT JOIN personajecomic pc ON p.id = pc.personajeID 
                    LEFT JOIN comics c ON pc.comicID = c.comicID 
                    LEFT JOIN personajesuperpoder ps ON p.id = ps.personajeID 
                    LEFT JOIN superpoderes s ON ps.superpoderID = s.superpoderID";
            
            $result = $conexion->query($sql);
            if($result){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>{$row['personajeID']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['alias']}</td>
                            <td>{$row['fechacreacion']}</td>
                            <td>{$row['descripcion']}</td>
                            <td>{$row['titulo']}</td>
                            <td>{$row['nombre_superpoder']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Error en la consulta de datos.</td></tr>";
            }
            $conexion->close();
        }
        ?>
    </table>

</body>
</html>