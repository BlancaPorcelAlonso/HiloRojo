<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=login_required");
    exit;
}

// Solo accesible a cuentas que NO sean usuarios.
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
    <title>Editar evento</title>
    <link rel="stylesheet" href="formulario_crear_eventos.css" />
</head>

<body>
    <div id="contenedor">

        <div id="cabecera_superior"> 
                <div class="cojunto_cabezera">
                <img src="../assets/logo en blanco.png" alt="logo">
                <h1>EL HILO ROJO</h1>
            </div>
        </div>
        <main>
        <section class="formulario"> 
            <div id=cabecera_titulo> 
                <h2> EDITAR EVENTO </h2>
            </div>
            <form action="accio.php" autocomplete="on" method="get">

                <div class="form-grid">

                    <div class="col-izq">
                        <h3>Fotografías subidas</h3>

                        <div class="preview-foto">Vista previa</div>

                        <button type="button">Agregar fotos</button>
                    </div>

                    <div class="col-der">

                        <label for="nombre"> NOMBRE DEL EVENTO </label>
                        <input type="text" name="nombre" id="nombre" required pattern="[A-Za-z]{3,}" placeholder=""
                            title="Debe tener al menos 3 caracteres y solo letras" /> <!-- si son letras y minimo 3 -->


                        <label for="descripcion"> DESCRIPCIÓN</label>
                        <input type="text" name="descripcion" id="descripcion" required required pattern="[A-Za-z]{3,}"
                            placeholder=""
                            title="Debe tener al menos 3 caracteres y solo letras" /><!-- placeholder nos sirve para que se vea en gris el ejemplo -->

                        <label for="direccion">Escribe la dirección:</label>
                        <input type="text" name="direccion" id="direccion" required required pattern="[A-Za-z]{3,}"
                            placeholder=""
                            title="Debe tener al menos 3 caracteres y solo letras" /><!-- placeholder nos sirve para que se vea en gris el ejemplo -->


                        <label for="fecha_nacimiento">Escribe la fecha:</label>
                        <input type="date" name="fecha" id="fecha" max="2008-12-31" />

                        <div class="botones-form">
                            <button type="submit" class="btn-submit">
                                ACTUALIZAR
                            </button>

                            <button type="button" class="btn-submit btn-delete">
                                ELIMINAR
                            </button>
                        </div>

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
