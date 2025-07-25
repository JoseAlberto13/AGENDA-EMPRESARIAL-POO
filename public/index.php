<?php
require_once '../classes/Contacto.php';

$contacto = new Contacto();
$contactos = $contacto->getContacts();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="text-center mb-4" id="titulo-principal">📚 Lista de Contactos Empresarial 📈</h2>

    <div class="text-end mb-3">
        <a href="agregar.php" class="btn btn-primary">Agregar nuevo Contacto</a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success" role="alert">
            Contacto agregado correctamente.
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm">
            <thead class="table-primary ">
                <tr>
                    <th >ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $con): ?>
                    <tr>
                        <td><?= $con['id'] ?></td>
                        <td><?= $con['nombre'] ?></td>
                        <td><?= $con['apellido'] ?></td>
                        <td><?= $con['telefono'] ?></td>
                        <td><?= $con['email'] ?></td>
                        <td><?= $con['empresa'] ?></td>
                        <td><?= $con['direccion'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $con['id'] ?>" class="btn btn-primary">Editar</a> |
                            <a href="eliminar.php?id=<?= $con['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este contacto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
