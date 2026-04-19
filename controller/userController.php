<?php
session_start();
$user = new UserController();

// A) Lógica para los eventos (GET)
if (isset($_GET["action"]) && $_GET["action"] == "ver_evento") {
    $paginaSolicitada = $_GET["pagina"] ?? "";
    $user->verificarAcceso($paginaSolicitada);
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
        $username = "sql7823505";
        $contrasena = "JJqbGjIaYI";
        $dbname = "sql7823505";

        $this->conn = new mysqli($servername, $username, $contrasena, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function verificarAcceso($pagina): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.html");
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
            header("Location: /HiloRojo/view/formularios/formulario_crear_usuario.html");
        }
        exit;
    } // Aquí termina verificarAcceso correctamente

    public function login(): void
    {
        $email = $_POST["email"] ?? "";
        $contrasena = $_POST["contrasena"] ?? "";

        $sql = "SELECT * FROM usuarios WHERE email = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($fila = $result->fetch_assoc()) {
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

            header("Location: /HiloRojo/view/index.html");
            exit;
        } else {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=email_no_registrado");
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
        $password = $_POST["password"] ?? "";

        
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
            header("Location: formulario_crear_usuario.html?error=Las contraseñas no coinciden");
            exit;
        }

        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $resultado = $this->conn->query($sql);
        if ($resultado->num_rows > 0) {
            header("Location: formulario_crear_usuario.html?error=El email ya está registrado");
            exit;
        }

        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $contrasena);

        if ($stmt->execute()) {
            $insertId = $this->conn->insert_id;
            $_SESSION['logged'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $insertId;
            $_SESSION['role'] = 'user';
            header("Location: /HiloRojo/view/VerPerfil.php");
        } else {
            header("Location: formulario_crear_usuario.html?error=error_db");
        }
        exit;
    }
} }
