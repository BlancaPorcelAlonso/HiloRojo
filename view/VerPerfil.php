<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=login_required");
    exit;
}

// Solo accesible a usuarios
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    echo '<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><title>Acceso restringido</title></head><body>';
    echo '<p>Esta sección está reservada a perfiles de usuario. Si has accedido como empresa, usa el panel de empresas.</p>';
    echo '<p><a href="/HiloRojo/index.html">Volver al inicio</a></p>';
    echo '</body></html>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil – El Hilo Rojo</title>
    <link rel="stylesheet" href="VerPerfil.css">
</head>

<body>
    <div id="contenedor">

        <header id="cabecera">
            <div class="logo">
                <a href="index.html">
                    <img src="assets/logo_cabecera_nombre_logo.png" id="logo_completo" alt="Logo_completo">
                    <img src="assets/logo_en_blanco.png" id="logo_solo" alt="Logo_solo">
                </a>
            </div>

            <div class="opciones">
                <form class="buscador">
                    <input class="barra_buscador" type="search" placeholder="Buscar...">
                    <button type="submit" class="btn-buscar">
                        <img src="assets/icono_lupa.png" alt="Buscar">
                    </button>
                </form>

                <div class="usuario">
                    <a href="formularios/formulario_crear_usuario.html" class="btn-registro">Registro</a>
                    <a href="formularios/formulario_inicio_sesion_usuario.html" class="btn-login">Iniciar sesión</a>
                    <a href="formularios/formulario_inicio_sesion_usuario.html" class="btn-usuario"></a>
                </div>
            </div>
        </header>

        <main id="contenido_perfil">

            <section id="perfil_usuario">
                <div class="perfil_foto"></div>

                <h2 class="perfil_nombre">Daniel Labrada</h2>
                <p class="perfil_info">12/04/1996 · Barcelona</p>

                <p class="perfil_bio">
                    Apasionado por la creatividad, la tecnología y las historias que conectan a las personas.
                    Disfruto de los pequeños detalles, las conversaciones profundas y los planes improvisados.
                    Me encanta descubrir nuevos lugares, aprender de los demás y compartir experiencias auténticas.
                    Creo en las conexiones reales, en la empatía y en la magia de los encuentros inesperados.
                    Siempre abierto a nuevas aventuras y a conocer gente interesante.
                </p>

                <p class="perfil_intereses">
                    Intereses: <span>****</span>
                </p>
                <section class="me-apunto-wrapper">
                    <a href="./formularios/formulario_editar_usuario.php" class="me-apunto-box" id="meApuntoBtn">
                        Editar perfil
                    </a>
                </section>

            </section>

            <section id="eventos_destacados">

                <article class="card">
                    <img src="assets/Ejemplo_evento_6.jpg" alt="imagen evento">
                    <div class="card__body">
                        <h3 class="card__title">EXPERIENCIA SOCIAL</h3>
                        <p class="card__meta">Una cena dinámica para conocer gente nueva de forma natural.</p>
                        <a href="eventos/evento_ejemplo6.html" class="card__btn">IR AL EVENTO</a>
                    </div>
                </article>

                <article class="card">
                    <img src="assets/ejemplo_evento_7.jpg" alt="imagen evento">
                    <div class="card__body">
                        <h3 class="card__title">CITAS A CIEGAS</h3>
                        <p class="card__meta">Atrévete a vivir una experiencia diferente sin distracciones visuales.</p>
                        <a href="eventos/evento_ejemplo7.html" class="card__btn">IR AL EVENTO</a>
                    </div>
                </article>

                <article class="card">
                    <img src="assets/ejemplo_evento_8.png" alt="imagen evento">
                    <div class="card__body">
                        <h3 class="card__title">DATING CON MASCOTAS</h3>
                        <p class="card__meta">Conecta con otras personas amantes de los animales en un entorno
                            divertido.</p>
                        <a href="eventos/evento_ejemplo8.html" class="card__btn">IR AL EVENTO</a>
                    </div>
                </article>

            </section>

        </main>

    </div>

    <footer>
        <img src="assets/logo_en_blanco.png" alt="logo del footer">
        <nav class="footer-nav">
            <a href="#sobre-nosotros">Sobre nosotros</a>
            <a href="#ayuda">Ayuda</a>
            <a href="#contacto">Contacto</a>
            <a href="#index">Home</a>
        </nav>
    </footer>

</body>

</html>
