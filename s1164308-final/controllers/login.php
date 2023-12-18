<?php
require_once '../models/credentials_model.php';

$message = "Please enter your login credentials";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $credentials_model = new CredentialsModel();
        $validLogin = $credentials_model->authenticate($_POST["email"], $_POST["password"]);
        // echo $validLogin;
        if ($validLogin) {
            session_start();
            $_SESSION['id'] = $validLogin;
            header ('Location: home.php');
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'logout') {
        session_start();
        $_SESSION = array();
        session_destroy();
        $message = "Logged out - Thank you!!";
        
    }
}

include '../views/login_view.php'

?>