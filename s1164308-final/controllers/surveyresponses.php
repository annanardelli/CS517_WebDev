<?php
require_once '../models/survey_model.php';
require_once '../models/questions_model.php';
require_once '../models/responses_model.php';
require_once '../models/choices_model.php';

session_start();
if (!isset($_SESSION['id'])){
    //session is not set
    header('Location: login.php');
}

$survey_model = new Survey();
$question_model = new Question();
$responses_model = new Response();

var_dump($survey_id);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['survey_id'] = $_GET['survey_id'];
}

$questions=$question_model->getQuestions($_SESSION['survey_id']);
$survey_title = $survey_model->getSurveyTitle($_SESSION['survey_id']);

$responses=$responses_model->getResponses($_SESSION['survey_id']);

include_once '../views/surveyresponses_view.php';

?>