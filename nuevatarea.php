<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'tareasServices.php';

    $crear = guardarTarea($nombre);
    if($crear) {
        header('Location: index.php');
    }else {
        echo "Algo ha ido mal";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear tarea</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <h2>Creación de tarea</h2>
    </header>
    <main>
        <div class="guardar">
        <form method="POST" action="">
            <label for="nombre"><strong>Nombre: </strong></label>
            <input id="nombre" type="text" name="nombre" required>

            <div class="centro">
                <input type="submit" value="Guardar">
            </div>
            

        </form>
            <div class="centro">
            <a href="index.php"><input type="submit" value="Volver" id="volver1"></a>
        </div>
    </main>
    </div>
    <footer>Todos los derechos reservados</footer>
</body>

</html>