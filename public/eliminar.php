<?php
require_once '../classes/Contacto.php';

if (!isset($_GET['id'])) {
    die("ID no proporcionado.");
}

$contacto = new Contacto();
$id = $_GET['id'];

// Elimina el contacto
if ($contacto->eliminar($id)) {
    header("Location: index.php?msg=eliminado");
} else {
    echo "Error al eliminar el contacto.";
}
