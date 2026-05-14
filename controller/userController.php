<?php
session_start();
$user = new UserController();

// A) Lógica para los eventos (GET)
if (isset($_GET["action"]) && $_GET["action"] == "ver_evento") {
    $paginaSolicitada = $_GET["pagina"] ?? "";
    $user->verificarAcceso($paginaSolicitada);
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "apuntarse") {
        $user->apuntarse();
    }
}

// B) Lógica para formularios (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $user->login();
    }
    if (isset($_POST["logout"])) {
        $user->logout();
    }
    if (isset($_POST["register"])) {
        $user->register();
    }
}
class UserController
{
    public $conn;

    public function __construct()
    {
        $servername = "sql7.freesqldatabase.com";
        $username = "sql7824380";
        $contrasena = "66E6mahs6E";
        $dbname = "sql7824380";
        

        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Modo de errores
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Modo de fetch
                PDO::ATTR_EMULATE_PREPARES => false  // No emular prepared statements
            ];
            $pdo = new PDO($dsn, $username, $contrasena, $opciones);
            $this->conn = $pdo;

        } catch (PDOException $e) {
            // Bypass para Demo: No matamos el proceso, guardamos null y seguimos
            $this->conn = null;
        }
    }

    public function verificarAcceso($pagina): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.php");
            exit;
        }

        // Selección de página
        if ($pagina == "evento_ejemplo1") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo1.html");
        } elseif ($pagina == "evento_ejemplo2") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo2.html");
        } elseif ($pagina == "evento_ejemplo3") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo3.html");
        } elseif ($pagina == "evento_ejemplo4") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo4.html");
        } elseif ($pagina == "evento_ejemplo5") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo5.html");
        } elseif ($pagina == "evento_ejemplo6") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo6.html");
        } elseif ($pagina == "evento_ejemplo7") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo7.html");
        } elseif ($pagina == "evento_ejemplo8") {
            header("Location: /HiloRojo/view/eventos/evento_ejemplo8.html");
        } else {
            header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.php");
        }
        exit;
    } // Aquí termina verificarAcceso correctamente

    public function apuntarse(): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
            exit;
        }

        // Aquí luego guardarías en BD que el usuario se apunta
        header("Location: /HiloRojo/view/VerPerfil.php?message=apuntado");
    }

    public function login(): void
    {
        $email = $_POST["email"] ?? "";
        $contrasena = $_POST["contrasena"] ?? "";

        // Bypass para Demo: Si no hay conexión, entramos directos
        if ($this->conn === null) {
            $_SESSION["logged"] = true;
            $_SESSION["email"] = $email ?: "usuario.demo@example.com";
            $_SESSION["user_id"] = 999;
            $_SESSION['role'] = 'user';
            header("Location: /HiloRojo/view/index.php");
            exit;
        }

        try {
            $sql = "SELECT * FROM usuarios WHERE email = ? AND contrasena = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email, $contrasena]);

            if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $fila["email"];
                $_SESSION["user_id"] = $fila["id"] ?? null;

                $role = 'user';
                if (isset($fila['role']) && !empty($fila['role'])) {
                    $role = $fila['role'];
                } else {
                    $nombreLower = strtolower($fila['nombre'] ?? '');
                    $emailLower = strtolower($fila['email'] ?? '');
                    if (strpos($nombreLower, 'empresa') !== false || strpos($emailLower, 'empresa') !== false) {
                        $role = 'company';
                    }
                }
                $_SESSION['role'] = $role;

                header("Location: /HiloRojo/view/index.php");
                exit;
            } else {
                header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=email_no_registrado");
                exit;
            }
        } catch (PDOException $e) {
            // Si la conexión falló a mitad de camino, bypass de nuevo
            $_SESSION["logged"] = true;
            $_SESSION["email"] = $email;
            $_SESSION['role'] = 'user';
            header("Location: /HiloRojo/view/index.php");
            exit;
        }
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
        exit;
    }

    public function register(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"] ?? "";
            $password = $_POST["contrasena"] ?? "";


            if (strpos($email, "@") === false) {
                header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.php?error=mail_sin_arroba");
                exit;
            }

            if (strlen($password) <= 4) {
                header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.php?error=pass_corta");
                exit;
            }

            $nombre = trim($_POST["nombre"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $contrasena = $_POST["contrasena"] ?? "";
            $passwordRepeat = $_POST["passwordRepeat"] ?? "";

            if ($contrasena !== $passwordRepeat) {
                header("Location: formulario_crear_usuario.php?error=Las contraseñas no coinciden");
                exit;
            }

            $sql = "SELECT email FROM usuarios WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                header("Location: formulario_crear_usuario.php?error=El email ya está registrado");
                exit;
            }

            $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            if ($stmt->execute([$nombre, $email, $contrasena])) {
                $insertId = $this->conn->lastInsertId();
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $insertId;
                $_SESSION['role'] = 'user';
                header("Location: /HiloRojo/view/VerPerfil.php");
            } else {
                header("Location: formulario_crear_usuario.php?error=error_db");
            }
            exit;
        }
    }
}
