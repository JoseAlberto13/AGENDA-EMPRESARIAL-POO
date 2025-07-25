<?php
require_once '../classes/Contacto.php';

$contacto = new Contacto();

// Validar si se pasa el ID
if (!isset($_GET['id'])) {
    die("ID no proporcionado.");
}

// Obtener el libro desde la base de datos
$datosContacto = $contacto->obtenerPorId($_GET['id']);
if (!$datosContacto) {
    die("Contacto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
  <div class="container py-4">
    <h2 class="text-center mb-4" id="titulo-principal">🖊️ Editar Contacto</h2>

    <form action="procesar_editar.php" method="POST" class="shadow p-4 bg-white rounded">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datosContacto['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?= $datosContacto['apellido'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" value="<?= $datosContacto['telefono'] ?>" required>
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $datosContacto['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" class="form-control" name="empresa" value="<?= $datosContacto['empresa'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="<?= $datosContacto['direccion'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $datosContacto['id'] ?>">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br><a href="index.php" class="btn btn-secondary">Volver</a>
  </div>
</body>
</html>
