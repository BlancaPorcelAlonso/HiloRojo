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

            header("Location: /HiloRojo/View/VerPerfil.html");
            exit;
        } else {
            header("Location: /HiloRojo/View/formularios/formulario_inicio_sesion_usuario.php?error=1");
            exit;
        }
    }

    public function logout(): void
    {
        session_unset();   // Vacía variables de sesión
        session_destroy(); // Destruye la sesión

        header("Location: /HiloRojo/View/formularios/formulario_inicio_sesion_usuario.php");
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

        $stmt->close();
        $this->conn->close();


        // return o redirect header
        // header("Location: ../view/VerPerfil.html");
        exit;
    }
}
