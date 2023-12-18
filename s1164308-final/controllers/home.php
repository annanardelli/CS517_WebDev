<?php
require_once '../models/credentials_model.php';
require_once '../models/survey_model.php';

$message = "";

session_start();

if (!isset($_SESSION['id'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_user_id = $_SESSION['id'];

include '../views/home_view.php';

?>