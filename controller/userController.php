
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
        
        
      public function register(): void {}
    }
?>