$(document).ready(function () {

    // 1. Esta función lee el "archivador" y decide qué mostrar y qué ocultar
    function verificarEstado() {
        const cookies = localStorage.getItem('cookiesAceptadas');

        if (cookies === 'true') {
            // CASO: ACEPTADAS -> Formulario usable
            $('#cookies').css('visibility', 'hidden'); $('#formulario').removeClass('login-inactivo'); // Quitamos el bloqueo
            $('#btn-reabrir-cookies').hide();

            // Habilitamos los inputs y botones dentro del login
            $('#formulario').find('input, button').prop('disabled', false);

        } else {
            // CASO: RECHAZADAS o PRIMERA VEZ -> Formulario inactivo
            $('#cookies').show();
            $('#formulario').addClass('login-inactivo'); // Aplicamos el bloqueo visual

            // Deshabilitamos los inputs y botones para que no se puedan usar
            $('#formulario').find('input, button').prop('disabled', true);

            // Si rechazó, mostramos el botón de reabrir
            if (cookies === 'false') {
                $('#cookies').css('visibility', 'hidden'); $('#btn-reabrir-cookies').show();
            }
        }
    }

    // 2. Ejecutamos la función nada más cargar la página
    verificarEstado();

    // 3. EVENTO CLIC: Aceptar
    $('#btn-aceptar').click(function () {
        localStorage.setItem('cookiesAceptadas', 'true');
        verificarEstado();
    });

    // 4. EVENTO CLIC: Rechazar
    $('#btn-rechazar').click(function () {
        localStorage.setItem('cookiesAceptadas', 'false');
        verificarEstado();
    });

    // 5. EVENTO CLIC: Volver a mostrar el aviso (si rechazó anteriormente)
    $('#btn-reabrir-cookies').click(function () {
        $('#cookies').fadeIn(); // Mostramos el aviso con efecto
        $(this).hide();         // Ocultamos este botón mientras el usuario decide
    });
});