<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tareas Bases</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
</head>
<header>
    <h1>Formulario Creación de Tareas</h1>
</header>

<body>
    <?php
    // Obtener el ID de la tarea y el nombre enviados desde el formulario anterior
    $idTarea = isset($_POST['id']) ? $_POST['id'] : null;
    $nombreActual = isset($_POST['nombre']) ? $_POST['nombre'] : '';

    if ($idTarea === null) {
        echo "<p>Error: No se recibió el ID de la tarea.</p>";
        exit; // Salir si no se ha recibido el ID
    }
    ?>
    <main>
    <div class="editar">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $idTarea; ?>">
        <label for="nombre"><strong>Nuevo Nombre Tarea: </strong></label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombreActual; ?>" required>
        <div class="operaciones">
            <input type="submit" value="Guardar" id="guardar">
        </div>
    </form>
    <a href="index.php"><input type="submit" value="Volver a Index" id="volver"></a>
</div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('tareasServices.php');
    
    // Verificar si se ha pulsado el botón de guardar (que tenga el valor "Guardar")
    if (isset($_POST['guardar']) && $_POST['guardar'] == "Guardar") {
        $modificar = modificarTareas(); // Llamar a la función de modificación
    }
}

    ?>
</main>

</body>

</html>
