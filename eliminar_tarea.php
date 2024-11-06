<?php
require_once 'tareasServices.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if (borrarTarea($id)) {
        echo "Tarea eliminada con éxito.";
    } else {
        echo "Error al eliminar la tarea.";
    }
}

// Redirigir de vuelta al index.php
header("Location: index.php");
exit;
?>
