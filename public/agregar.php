<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Estilo personalizado -->
  <link rel="stylesheet" href="css/style.css">

  <title>Agregar Contacto</title>
</head>
<body class="bg-light">

  <div class="container py-4">
    <h2 class="text-center mb-4" id="titulo-principal">📘 Agregar Nuevo Contacto</h2>

    <form action="procesar_agregar.php" method="POST" class="shadow p-4 bg-white rounded">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="telefono" required>
      </div>
      <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="empresa" class="form-label">Empresa</label>
        <input type="text" class="form-control" name="empresa" required>
      </div>
      <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="index.php" class="btn btn-secondary ms-2">Volver</a>
    </form>
  </div>

</body>
</html>
