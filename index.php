<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera Base</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h2>Mi primera Base</h2>
    </header>
<main>
    <div class="container">
<?php 
require_once 'tareasServices.php';

// Obtener las tareas
$tareas = obtenerTareas();

foreach ($tareas as $tarea) {
    echo "<article>";
    echo "<ul>";
    echo "<li>" . "<p><strong>Nombre: " . "</strong></p>" . $tarea->getNombre() . "</li>";
    
    // Formulario para enviar el ID de la tarea para editar
    echo "<li>";
    echo "<form action='editar_tarea.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $tarea->getId() . "'>";
    echo "<input type='hidden' name='nombre' value='" . htmlspecialchars($tarea->getNombre()) . "'>";
    echo "<input type='submit' value='Editar Tarea'>";
    echo "</form>";
    echo "</li>";

    // Formulario para enviar el ID de la tarea para eliminar
    echo "<li>";
    echo "<form action='eliminar_tarea.php' method='POST'>"; //onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar esta tarea?\");'>";
    echo "<input type='hidden' name='id' value='" . $tarea->getId() . "'>";
    echo "<input type='submit' value='Eliminar Tarea'>";
    echo "</form>";
    echo "</li>";

    echo "</ul>";
    echo "</article>";
}
?>
</div>
</main>
<div class="centro">
    <a href="nuevatarea.php"><input type="submit" value="Crear tarea"></a>
</div>

<footer>Todos los derechos reservados</footer>
</body>
</html>


