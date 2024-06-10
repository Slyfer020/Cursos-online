document.addEventListener("DOMContentLoaded", function() {
    const image = document.querySelector(".clickable_image");
  
    // Agregar un event listener al hacer clic en la imagen
    image.addEventListener("click", function() {
      // Aplicar una clase para la animación de parpadeo
      image.classList.add("clicked_animation");
  
      // Eliminar la clase después de un cierto tiempo para permitir repetir la animación
      setTimeout(function() {
        image.classList.remove("clicked_animation");
      }, 1000); // ajusta el tiempo de acuerdo a tu preferencia
    });
  });