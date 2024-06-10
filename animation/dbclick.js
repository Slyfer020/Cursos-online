document.addEventListener("DOMContentLoaded", function() {
  // Seleccionar todas las imágenes con la clase double_clickable_image
  const images = document.querySelectorAll(".double_clickable_image");

  // Iterar sobre cada imagen y agregar un event listener para el doble clic
  images.forEach(function(image) {
    image.addEventListener("dblclick", function() {
      // Aplicar una clase para la animación de parpadeo
      image.classList.add("double_clicked_animation");

      // Eliminar la clase después de un cierto tiempo para permitir repetir la animación
      setTimeout(function() {
        image.classList.remove("double_clicked_animation");
      }, 1000); // ajusta el tiempo de acuerdo a tu preferencia
    });
  });
});