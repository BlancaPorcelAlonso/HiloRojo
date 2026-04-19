<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new UserController();
    //Check button
    if (isset($_POST["login"])) {
        echo "<p>Login button is clicked.</p>";
        $user->login();
    }
    if (isset($_POST["logout"])) {
        echo "<p>Login button is clicked.</p>";
        $user->logout();
    }
    if (isset($_POST["register"])) {
        echo "<p>Login button is clicked.</p>";
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
        } else {
            
        }
    }

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
            $_SESSION["contrasena"] = $fila["contrasena"];
            $_SESSION["user_id"] = $fila["id"] ?? null;

            // Determinar rol: usar columna 'role' si existe, si no aplicar heurística simple
            $role = 'user';
            if (isset($fila['role']) && !empty($fila['role'])) {
                $role = $fila['role'];
            } else {
                $nombreLower = strtolower($fila['nombre'] ?? '');
                $emailLower = strtolower($fila['email'] ?? '');
                if (strpos($nombreLower, 'empresa') !== false || strpos($emailLower, 'empresa') !== false || strpos($emailLower, 'company') !== false) {
                    $role = 'company';
                }
            }

            $_SESSION['role'] = $role;

            // Login correcto: redirigir a la página principal.
            header("Location: /HiloRojo/view/index.html");
            exit;
        } else {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php?error=1");
            exit;
        }
    }

    public function logout(): void
    {
        session_unset();   // Vacía variables de sesión
        session_destroy(); // Destruye la sesión

        header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
        exit;
    }

    public function register(): void
    {

        // recoger datos form
        $nombre = trim($_POST["nombre"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $contrasena = $_POST["contrasena"] ?? "";
        $passwordRepeat = $_POST["passwordRepeat"] ?? "";


        // Validar que coincidan
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








        // insertar datos table
        // INSERT con prepared statement
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sss", $nombre, $email, $contrasena);

        if ($stmt->execute()) {
            echo "Registro insertado correctamente<br>";
            echo "ID del nuevo registro: " . $this->conn->insert_id;
        } else {
            echo "Error: " . $stmt->error;
        }

        $insertId = $this->conn->insert_id ?? null;
        $stmt->close();
        $this->conn->close();


        // return o redirect header
        // Tras registro, iniciar sesión como usuario por defecto y redirigir al perfil
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $insertId;
        $_SESSION['role'] = 'user';

        header("Location: /HiloRojo/view/VerPerfil.php");
        exit;
    }
}
