<?php
require_once '../models/survey_model.php';

session_start();

if (!isset($_SESSION['id'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_user_id = $_SESSION['id'];

$survey = new Survey();
$surveys=$survey->getSurveys();

var_dump($surveys);
include '../views/surveys_view.php'

?>