<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesion Usuario</title>
    <link rel="stylesheet" href="formulario_inicio_sesion_usuario.css" />
</head>

<body>
    <form action="../../controller/userController.php" method="POST"></form>

    <div id="contenedor">

        <?php include_once("../header.php"); ?>
        <style>
            #cookies {
                background-color: #777777;
                color: white;
                opacity: 50%;
                padding: 15px;
                margin: 50px;
                border-radius: 5px;
            }

            #cookies button {
                background-color: #050505;
                color: white;
                border: none;
                padding: 10px 20px;
                margin: 5px;
                cursor: pointer;
                border-radius: 3px;
            }

            #cookies button:hover {
                background-color: #333333;
            }
        </style>
        <main>
            <div id="cookies">


                <p>Este sitio web utiliza cookies para mejorar tu experiencia. Al continuar navegando, aceptas el uso de cookies.</p>
                <button type="button" id="btn-aceptar" name="cookiesAccepted" value="true">Aceptar</button>
                <button type="button" id="btn-rechazar" name="cookiesAccepted" value="false">Rechazar</button>

            </div>
            <section id="formularioclass=" formulario"> <!-- contenido con formulario -->
                <div id=cabecera_titulo> <!-- cabecera con titulo del apartado -->
                    <h2> INICIAR SESIÓN </h2>
                    <button type="button" id="btn-reabrir-cookies" style="display:none;">Ver aviso de cookies de nuevo</button>

                </div>
                <form action="../../controller/userController.php" autocomplete="on" method="post">

                    <div class="form-grid">

                        <div class="col-izq">

                            <div class="preview-foto"><img src="../assets/registro_img.png" alt="Imagen ilustrativa de una pareja conectándose en la aplicación El Hilo Rojo"></div>
                        </div>

                        <!-- COLUMNA DERECHA -->
                        <div class="col-der">


                            <!-- forms email -->
                            <label for="email">Escribe tu email:</label>
                            <input type="email" name="email" id="email" required placeholder="ejemplo@correo.com"
                                title="Debe tener un formato valido" /><!-- placeholder nos sirve para que se vea en gris el ejemplo -->
                            <span>⚠️ Introduce un email válido.</span>

                            <!-- forms pasword -->
                            <label for="password">Escribe tu contraseña:</label>
                            <input type="password" name="contrasena" id="password" required
                                placeholder=""
                                title=" Minimo 8 caracteres, debe incluir numeros, mayusculas y minusculas" />

                            <div class="fila-aux">
                                <a href="#" class="link-olvido">HAS OLVIDADO TU CONTRASEÑA?</a>
                            </div>

                            <div class="fila-recordar">
                                <input type="checkbox" id="recordarme" name="recordarme" />
                                <label for="recordarme">RECUÉRDAME</label>
                            </div>

                            <!-- BOTÓN SUBMIT -->
                            <button type="submit" name="login" class="btn-submit">
                                ENTRAR
                            </button>

                            <?php
                            if (isset($_GET['error'])) {
                                $e = $_GET['error'];
                                if ($e === 'contrasena_incorrecta') {
                                    echo "<p style='color:red; text-align:center;'>contraseña incorrecta</p>";
                                } elseif ($e === 'email_no_registrado') {
                                    echo "<p style='color:red; text-align:center;'>email no registrado</p>";
                                } else {
                                    echo "<p style='color:red; text-align:center;'>datos incorrectos</p>";
                                }
                            }
                            ?>

                            <p class="sin-cuenta">NO TIENES UNA CUENTA? <a href="formulario_crear_usuario.php"
                                    class="link-crear">CREAR UNA</a></p>

                        </div>
                    </div>
                </form>
            </section>
        </main>

    </div>
    <footer>
        <img src="../assets/logo en blanco.png" alt="Logo en blanco de El Hilo Rojo">
        <nav class="footer-nav">
            <a href="#sobre-nosotros">Sobre nosotros</a>
            <a href="#ayuda">Ayuda</a>
            <a href="#contacto">Contacto</a>
            <a href="../index.php">Home</a>
        </nav>

    </footer>
    <!-- 1. La librería (el motor) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- 2. Tu lógica (el conductor) -->
    <script src="/HiloRojo/view/logica_jquery_cookies.js"></script>
</body>

</html>