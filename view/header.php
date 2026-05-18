<link rel="stylesheet" href="/HiloRojo/view/header.css" />
<header id="cabecera">
    <div class="logo">
        <a href="/HiloRojo/view/index.php">
            <img src="/HiloRojo/view/assets/logo_cabecera_nombre_logo.png" id="logo_completo" alt="Logo_completo">
            <img src="/HiloRojo/view/assets/logo en blanco.png" id="logo_solo" alt="Logo_solo"></a>
    </div>
    <div class="opciones">
        <form class="buscador">
            <input class="barra_buscador" type="search" placeholder="Buscar...">
            <button type="submit" class="btn-buscar">
                <img src="/HiloRojo/view/assets/icono_lupa.png" alt="Buscar">
            </button>
        </form>

        <div class="usuario">
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true): ?>
                    <span class="user-name" style="margin-right: 15px; font-weight: bold; color: white;">
                        <?php 
                        if(isset($_SESSION['email'])) {
                            echo htmlspecialchars(explode('@', $_SESSION['email'])[0]);
                        } else {
                            echo 'Usuario';
                        }
                        ?>
                    </span>
                    <a href="/HiloRojo/view/VerPerfil.php" class="btn-registro">
                        Mi Perfil
                    </a>
                    <form action="/HiloRojo/controller/userController.php" method="POST" style="display:inline;">
                        <button type="submit" name="logout" class="btn-login" style="cursor:pointer; background:none; border:1px solid white; color:white; padding:5px 10px; border-radius:5px;">
                            Salir
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/HiloRojo/view/formularios/formulario_crear_usuario.php" class="btn-registro">
                        Registro
                    </a>

                    <a href="/HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php" class="btn-login">
                        Iniciar sesión
                    </a>
                    <!-- Botón único para móvil -->
                    <a href="/HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php" class="btn-usuario">
                    </a>
                <?php endif; ?>
            </div>
    </div>
</header>