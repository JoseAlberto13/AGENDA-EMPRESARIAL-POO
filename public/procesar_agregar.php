<?php
require_once '../classes/Contacto.php';

$contacto = new Contacto();

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

if($contacto->add($nombre, $apellido, $telefono, $email, $empresa, $direccion)) {
    header('Location: index.php?msg=ok');

} else {
    echo 'Error al agregar el contacto.';
}

?>