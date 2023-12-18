<?php
require_once '../models/survey_model.php';
require_once '../models/questions_model.php';

session_start();
if (!isset($_SESSION['id'])){
    //session is not set
    header('Location: login.php');
}

$logged_in_user_id = $_SESSION['id'];

$survey_model = new Survey();
$question_model = new Question();
$message='';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['survey_id'] = $_GET['survey_id'];
}

$questions=$question_model->getQuestions($_SESSION['survey_id']);
$survey_title = $survey_model->getSurveyTitle($_SESSION['survey_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a function to sanitize input (you should customize this function)
    function sanitizeInput($input) {
        // Implement your sanitization logic here
        return htmlspecialchars(trim($input));
    }

    // Get the submitted responses from the form data
    $responses = $_POST['responses'] ?? [];

    $success = $survey_model->submitSurvey($responses, $_SESSION['survey_id'], $logged_in_user_id);

    if ($success) {
        $message = 'Survey submitted successfully!';
    } else {
        $message = 'Failed to submit the survey.';
    }
} else {
    // Handle cases where the form is not submitted using POST method
    echo 'Invalid request method.';
}

include_once '../views/survey_view.php';

?>