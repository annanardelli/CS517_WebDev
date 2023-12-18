<?php
require_once '../models/survey_model.php';
require_once '../models/questions_model.php';

session_start();
if (!isset($_SESSION['id'])){
    //session is not set
    header('Location: login.php');
}

$survey_model = new Survey();
$question_model = new Question();

$logged_in_user_id = $_SESSION['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        $_SESSION['server_id'] = $survey_model->createSurvey($_POST['name'], $logged_in_user_id);
        if ($_SESSION['server_id'] != null) {
            $message = "Survey Created";
        } else {
            $message = "Failed";
        }
    }

    else if(isset($getvars["action"]) && $getvars["action"] == 'addQuestion') {
        if (isset($_POST["is_required"]) && $_POST["is_required"] == "yes") {
            $required = 1;
        } else {
            $required = 0;
        }
        $result = $question_model->addQuestion($_SESSION['server_id'], 'text', $_POST['question_text'], $required);
        if ($result) {
        $message = "Question Added";
        } else {
            $message = "Failed to add question.";
        }
    }
        
}

include_once '../views/newsurvey_view.php';
?>