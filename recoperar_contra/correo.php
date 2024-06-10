<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Incio de sesión</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    /* Estilos para el formulario flotante */
    .floating-form {
      position: fixed;
      top: 50%;
      left: 50%;
      width: 25%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      display: none;
      z-index: 999; /* Asegura que esté sobre el contenido principal */
    }

    .floating-form h2 {
      text-align: center;
      color: #333;
    }

    .floating-form label {
      display: block;
      margin-bottom: 8px;
    }

    .floating-form input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    .floating-form button {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    /* Cubierta del fondo para cerrar el formulario */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      z-index: 998; /* Debe ser inferior al formulario flotante */
    }
  </style>
</head>
<body>

<!-- Cubierta de fondo para cerrar el formulario -->
<div class="overlay" id="overlay" onclick="closeFloatingFormAndRedirect()"></div>

<!-- Formulario Flotante -->
<div class="floating-form" id="floatingForm">
  <h2>Recuperación de contraseña</h2>
  <form>
    <label for="c">Correo electrónico:</label>
    <input type="email" id="c" name="c" required>
    <button id="btnEnviarEmail">Aceptar</button>
  </form>
</div>



<script>
  // Mostrar el formulario flotante al cargar la página
  document.addEventListener("DOMContentLoaded", function() {
    var floatingForm = document.getElementById("floatingForm");
    var overlay = document.getElementById("overlay");
    floatingForm.style.display = "block";
    overlay.style.display = "block";
  });

  // Cerrar el formulario flotante y redirigir al hacer clic fuera del formulario
  function closeFloatingFormAndRedirect() {
    var floatingForm = document.getElementById("floatingForm");
    var overlay = document.getElementById("overlay");
    floatingForm.style.display = "none";
    overlay.style.display = "none";

    // Redirigir a la página principal (index.html)
    window.location.href = "../index.html";
  }
  /* Boton para enviar email, se llama desde la vista index con el id="btnEnviarEmail" */
  
</script>


</body>
</html>
