<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=login_required");
    exit;
}

// Solo accesible a cuentas que NO sean de tipo user.
if (!isset($_SESSION['role']) || $_SESSION['role'] === 'user') {
    echo '<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><title>Acceso restringido</title></head><body>';
    echo '<p>Esta sección está reservada a empresas. Si tienes una cuenta de usuario, accede a tu perfil.</p>';
    echo '<p><a href="/HiloRojo/index.php">Volver al inicio</a></p>';
    echo '</body></html>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear evento</title>
    <link rel="stylesheet" href="formulario_crear_eventos.css" />
</head>

<body>
    <div id="contenedor">

       <header id="cabecera">
            <div class="logo">
                <a href="../index.php">
                    <img src="../assets/logo_cabecera_nombre_logo.png" id="logo_completo" alt="Logo_completo">
                    <img src="../assets/logo_en_blanco.png" id="logo_solo" alt="Logo_solo"></a>
            </div>
            <div class="opciones">
                <form class="buscador">
                    <input class="barra_buscador" type="search" placeholder="Buscar...">
                    <button type="submit" class="btn-buscar">
                        <img src="../assets/icono_lupa.png" alt="Buscar">
                    </button>
                </form>

                <div class="usuario">
                    <a href="formulario_crear_usuario.php" class="btn-registro">
                        Registro
                    </a>

                    <a href="formulario_inicio_sesion_usuario.php" class="btn-login">
                        Iniciar sesión
                    </a>
                    <!-- Botón único para móvil -->
                    <a href="formulario_inicio_sesion_usuario.php" class="btn-usuario">
                    </a>
                </div>
            </div>
        </header>
        <main>
        <section class="formulario"> <!-- contenido con formulario -->
            <div id=cabecera_titulo> <!-- cabecera con titulo del apartado -->
                <h2> CREAR EVENTO </h2>
            </div>
            <form action="accio.php" autocomplete="on" method="get">

                <div class="form-grid">

                    <div class="col-izq">
                        <h3>Fotografías subidas</h3>
                        <div class="preview-foto">Vista previa</div>
                        <button type="button">Agregar fotos</button>
                    </div>

                    <!-- COLUMNA DERECHA -->
                    <div class="col-der">

                        <!-- forms nombre -->
                        <label for="nombre"> NOMBRE DEL EVENTO </label>
                        <input type="text" name="nombre" id="nombre" required pattern="[A-Za-z]{3,}" placeholder=""
                            title="Debe tener al menos 3 caracteres y solo letras" /> <!-- si son letras y minimo 3 -->
                        <span>⚠️ Formato no valido, deben ser solo letras.</span>

                        <!-- forms cuidad -->
                        <label for="descripcion"> DESCRIPCIÓN</label>
                        <input type="text" name="descripcion" id="descripcion" required 
                            placeholder=""
                            title="Descripcion del evento" /><!-- placeholder nos sirve para que se vea en gris el ejemplo -->

                        <!-- forms direccion -->
                        <label for="direccion">Escribe la dirección:</label>
                        <input type="text" name="direccion" id="direccion" required required pattern="[A-Za-z]{3,}"
                            placeholder=""
                            title="Debe tener al menos 3 caracteres y solo letras" /><!-- placeholder nos sirve para que se vea en gris el ejemplo -->
                        <span>⚠️ Formato no valido, deben ser solo letras.</span>

                        <!--  forms fecha de nacimiento  -->
                        <label for="fecha_nacimiento">Escribe la fecha:</label>
                        <input type="date" name="fecha" id="fecha" max="2008-12-31" />

                        <!-- BOTÓN SUBMIT -->
                        <button type="submit" class="btn-submit">
                            CREAR
                        </button>
                    </div>
                </div>
            </form>
        </section>
        </main>

    </div>
    <footer>
        <img src="../assets/logo en blanco.png" alt="logo">
        <nav class="footer-nav">
            <a href="#sobre-nosotros">Sobre nosotros</a>
            <a href="#ayuda">Ayuda</a>
            <a href="#contacto">Contacto</a>
            <a href="../index.php">Home</a>
        </nav>

    </footer>
</body>

</html>
