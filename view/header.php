<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css" />
</head>

<body>

    <header id="cabecera">
        <div class="logo">
            <a href="index.php">
                <img src="assets/logo_cabecera_nombre_logo.png" id="logo_completo" alt="Logo_completo">
                <img src="assets/logo en blanco.png" id="logo_solo" alt="Logo_solo"></a>
        </div>
        <div class="opciones">
            <form class="buscador">
                <input class="barra_buscador" type="search" placeholder="Buscar...">
                <button type="submit" class="btn-buscar">
                    <img src="assets/icono_lupa.png" alt="Buscar">
                </button>
            </form>

            <div class="usuario">
                <a href="formularios/formulario_crear_usuario.php" class="btn-registro">
                    Registro
                </a>

                <a href="formularios/formulario_inicio_sesion_usuario.php" class="btn-login">
                    Iniciar sesión
                </a>
                <!-- Botón único para móvil -->
                <a href="formularios/formulario_inicio_sesion_usuario.php" class="btn-usuario">
                </a>
            </div>
        </div>
    </header>


</body>

</html>