<?php
require_once "tarea.php";

function conexionBD()
{
    $host = 'localhost';
    $basededatos = 'Primera Base';
    $usuario = 'root';
    $password = '';

    $conexion = new mysqli($host, $usuario, $password, $basededatos);

    if ($conexion->connect_error) {
        die("todo ha ido mal");
    }
    return $conexion;
}

function obtenerTareas()
{
    $conexion = conexionBD();

    $sql = "SELECT * from Tareas";
    $resultado = $conexion->query($sql); //Con esto obtenemos muchos datos, que tendremos que que recorrer para solo coger lo que necesitamos
    $tareas = []; //Inicializamos el array para meter aqui los nuevos objetos de tarea



    while ($fila = $resultado->fetch_assoc()) {

        $tareas[] = new Tarea($fila['id'], $fila['nombre'], $fila['fecha_finalizacion']);
    }
    $conexion->close();
    return $tareas;
}

function guardarTarea($nombre)
{
    $conexion = conexionBD();
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO Tareas (nombre) VALUES (?)";
    //Esto es para evitar inyecciones de codigo
    $queryFormateada = $conexion->prepare($sql);
    $queryFormateada->bind_param('s', $nombre);

    $todoBien = $queryFormateada->execute();

    $conexion->close();
    return $todoBien;
}

function modificarTareas()
{
    // Conexión a la base de datos
    $conexion = conexionBD();

    // Verificar que se recibieron los datos necesarios
    if (isset($_POST['id']) && isset($_POST['nombre'])) {
        $idTarea = $_POST['id'];
        $nombre = $_POST['nombre'];

        // Preparar la consulta de actualización
        $sql = "UPDATE Tareas SET nombre = ? WHERE id = ?";
        $queryFormateado = $conexion->prepare($sql);

        // Verificar si la consulta fue preparada correctamente
        if ($queryFormateado) {
            // Asignar valores a los parámetros
            $queryFormateado->bind_param("si", $nombre, $idTarea);

            // Ejecutar la consulta
            $todoBien = $queryFormateado->execute();

            if ($todoBien) {
                echo "<p>Tarea modificada con éxito</p>";
            } else {
                echo "<p>Error al modificar la tarea: " . $conexion->error . "</p>";
            }

            // Cerrar la consulta preparada
            $queryFormateado->close();
        } else {
            echo "<p>Error al preparar la consulta: " . $conexion->error . "</p>";
            $todoBien = false;
        }
    } else {
        echo "<p>Datos incompletos para modificar la tarea</p>";
        $todoBien = false;
    }

    // Cerrar la conexión
    $conexion->close();

    return $todoBien;
}
function borrarTarea($id)
{
    $conexion = conexionBD();
    $sql = "DELETE FROM Tareas WHERE id = ?";
    
    // Esto es para evitar inyecciones de código
    $queryFormateada = $conexion->prepare($sql);
    $queryFormateada->bind_param('i', $id); // Cambiamos 's' a 'i' y usamos $id en lugar de $nombre

    $todoBien = $queryFormateada->execute();

    $conexion->close();
    return $todoBien;
}
