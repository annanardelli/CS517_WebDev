<?php

require_once ('../models/credentials_model.php');

$credentials_model = new CredentialsModel();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
      
        $result = $credentials_model->add_new_account($_POST['first_name'], $_POST['last_name'],
                                        $_POST['email'], $_POST['password'], );
        if ($result) {
            $message = "Account Created ";
        } else {
            $message = "Failed";
        }
    }
} 

include '../views/newaccount_view.php';
?>