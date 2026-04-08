
<?php 
    session_start();



    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new UserController();
        //Check button
        if(isset($_POST["login"])){
            echo "<p>Login button is clicked.</p>";
            $user->login();
        }
        if(isset($_POST["logout"])){
            echo "<p>Login button is clicked.</p>";
            $user->logout();
        }
        if(isset($_POST["register"])){
            echo "<p>Login button is clicked.</p>";
            $user->register();
        }

    }

    
    class UserController{
            private $conn;

        public function __contruct(){
        $servername = "sql7.freesqldatabase.com";
        $username = "sql7820251";
        $password = "1sp6gAeixt";
        $dbname = "sql7820251";
        
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        }
     
        public function login(): void {
        $_SESSION["logged"] = true;

        
        }

        public function logout(): void {
        


        }
        
        public function register(): void
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";
        $passwordRepeat = $_POST["passwordRepeat"] ?? "";

      
        // Validar que coincidan
        if ($password !== $passwordRepeat) {
            header("Location: formulario_crear_usuario.html?error=Las contraseñas no coinciden");
            exit;
        }

        // Simular registro sin base de datos
        $_SESSION["logged"] = true;
        $_SESSION["user"] = $email;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["admin"] = false;

        header("Location: home.php");
        exit;
    }
    }
?>