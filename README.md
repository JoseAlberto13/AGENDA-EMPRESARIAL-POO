## 🧪 Requisitos técnicos

- PHP 7.4 o superior
- Servidor MySQL (local o remoto)
- Servidor local como XAMPP, Laragon o MAMP
- Navegador web (Chrome, Firefox, etc.)
- Editor de código (VSCode, Sublime, PHPStorm, etc.)

---

## 📁 Estructura del proyecto
```
gestor-contactos-poo/
│
├── classes/ # Clases que contienen la lógica del sistema (modelo)
│ ├── Database.php # Clase para conectar con la base de datos usando PDO
│ └── Contacto.php # Clase que representa un contacto y sus métodos
│
├── public/ # Archivos accesibles por el navegador (vista y controlador)
│ ├── index.php # Página principal que lista todos los contactos
│ ├── agregar.php # Formulario para agregar contactos
│ ├── eliminar.php # Script para eliminar el contacto 
│ ├── procesar_agregar.php # Script que procesa el formulario y guarda los datos
│ └── procesar_editar.php # Script que procesa el formulario y edita los datos del contacto. 
│
└── README.md # Documentación y guía del proyecto
```
---

## ⚙️ Configuración de la base de datos

Antes de ejecutar el proyecto, debes crear la base de datos **Agenda**. Puedes hacerlo fácilmente desde phpMyAdmin:

### Instrucciones paso a paso:

1. Abre [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Ve a la pestaña "SQL"
3. Ejecuta el siguiente script:

```sql

    CREATE DATABASE IF NOT EXISTS e;

    USE agenda;

    CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    direccion VARCHAR NOT NULL

    );


```

---

## 🧠 Explicación paso a paso

### 1. `classes/Database.php`

> 🔌 Se encarga de la conexión con MySQL usando **PDO**.

- Los parámetros (`host`, `dbname`, `username`, `password`) están encapsulados como buenas prácticas.
- Se maneja la conexión dentro de un bloque `try...catch` para atrapar errores de forma controlada.
- Se retorna el objeto `$this->conn`, que puede ser reutilizado por otras clases del sistema.

---

### 2. `classes/Contacto.php`

> 📘 Representa el **modelo** de contacto en POO.

- Al crear una instancia, se conecta automáticamente a la base de datos.
- Contiene:
  - `agregar($nombre, $apellido, $telefono)`: Inserta un contacto usando consultas preparadas (previene inyección SQL).
  - `getContacts()`: Devuelve todos los contactos en forma de array asociativo.

---

### 3. `public/agregar.php`

> 📝 Página HTML con formulario para ingresar nuevos contactos.

- Usa el método `POST` para enviar los datos a `procesar_agregar.php`.
- Es una forma sencilla de mostrar la interacción frontend-backend.

---

### 4. `public/procesar_agregar.php`

> 🧠 Lógica que guarda los datos en la base de datos.

- Recibe los datos del formulario con `$_POST`.
- Instancia un objeto `contacto` y llama a `agregar()`.
- Redirige al `index.php` mostrando un mensaje si fue exitoso.

---

### 5. `public/index.php`

> 📋 Página principal que lista todos los contactos almacenados.

- Llama a `contacto::getContacts()` para cargar registros.
- Muestra los datos en una tabla HTML.
- Incluye mensaje de éxito si se agregó un contacto.

---

### 6. `public/editar.php`

> 📋 Página HTML con formulario para editar los contactos almacenados.

- Usa el método `POST` para enviar los datos nuevos a `procesar_editar.php`.
- Incluye mensaje de éxito si se editó el contacto.

---

### 7. `public/procesar_editar.php`

> 🧠 Lógica que guarda los datos en la base de datos.

- Recibe los nuevos datos del formulario con `$_POST`.
- Instancia un objeto `contacto` y llama a `actualizar()`.
- Redirige al `index.php` mostrando un mensaje si fue exitoso.

---

## 📌 Licencia

Este proyecto puede ser utilizado con fines educativos y académicos sin restricciones.

---
