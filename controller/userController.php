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
        public function __contruct(){
            
        }
     
        public function login(): void {}
         public function logout(): void {}
          public function register(): void {}
    }
?>