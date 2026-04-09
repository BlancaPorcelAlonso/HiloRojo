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
        echo "<p>Register button is clicked.</p>";
        $user->register();
    }

}


class UserController
{
    private $conn;

    public function __contruct()
    {
        // $servername = "sql7.freesqldatabase.com";
        // $username = "sql7822561";
        // $password = "fj9PPKRGnp";
        // $dbname = "sql7822561";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sql7822561";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            // die("Connection failed: " . $this->conn->connect_error);
            echo "Connected error";
        } else {
            echo "Connected successfully";
        }
    }

    public function login(): void
    {
        $_SESSION["logged"] = true;


    }

    public function logout(): void
    {



    }

    public function register(): void
    {



        // recoger datos form
        $nombre = trim($_POST["nombre"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";
        $passwordRepeat = $_POST["passwordRepeat"] ?? "";


        // Validar que coincidan
        if ($password !== $passwordRepeat) {
            header("Location: formulario_crear_usuario.html?error=Las contraseñas no coinciden");
            exit;
        }

        
        
        // insertar datos table
        // INSERT con prepared statement
        $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sss", $nombre, $email, $password);

        if ($stmt->execute()) {
            echo "Registro insertado correctamente<br>";
            echo "ID del nuevo registro: " . $this->conn->insert_id;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $this->conn->close();


        // Simular registro sin base de datos
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $email;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["admin"] = false;

        // return o redirect header
        // header("Location: ../view/VerPerfil.html");
        exit;
    }
}
?>