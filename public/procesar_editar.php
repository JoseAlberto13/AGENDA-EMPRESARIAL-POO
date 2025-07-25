<?php
require_once '../classes/Contacto.php';

$contacto = new Contacto();

// Recoge los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$direccion = $_POST['direccion'];
// Validaciones simples
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Correo inválido");
}

// Actualiza el contacto
if ($contacto->actualizar($id, $nombre, $apellido, $telefono, $email, $empresa, $direccion)) {
    header("Location: index.php?msg=editado");
} else {
    echo "Error al actualizar el contacto.";
}
