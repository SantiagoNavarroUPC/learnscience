(function() {
    emailjs.init({
        privateKey: 'Xm33ktwrT7xOeJSTagcC0',
        blockHeadless: true,
        blockList: {
          list: [],
        },
        limitRate: {
          id: 'app',
          throttle: 10000,
        },
      });
})();

window.onload = function() {
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Mostrar la carga
        this.querySelector('.loading').style.display = 'block';

        // Ocultar mensajes de error y éxito
        this.querySelector('.sent-message').style.display = 'none';

        // Enviar el formulario
        emailjs.send('service_learnscience', 'template_learn', this)
            .then(function() {
                // Mensaje de éxito
                document.querySelector('.loading').style.display = 'none';
                document.querySelector('.sent-message').style.display = 'block';
                document.getElementById('contact-form').reset();
            }, function(error) {
                // Manejo del error
                document.querySelector('.loading').style.display = 'none';
                document.querySelector('.error-message').textContent = 'Error al enviar el mensaje. Por favor, inténtelo de nuevo.';
                document.querySelector('.error-message').style.display = 'block';
                console.error('Error:', error);
            });
    });
};
