<?php
class Survey
{
    public $questions = [];
    public $responses = [];

    public $surveys = [];

    public $ownSurveys = [];

    private $db;
    public $survey_id;

    function __construct() {

   
        $this->db = new PDO('mysql:host=localhost;dbname=surveysystem;charset=utf8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       
      }

    public function setSurveyID($id) {
        $this->survey_id = $id;
    }

    public function getSurveyID() {
        return $this->survey_id;
    }

    public function getSurveys() {
        try {
            $stmt = $this->db->query('SELECT *
            FROM survey s');

            $this->surveys = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
          catch(PDOException $ex) {
            var_dump($ex->getMessage());
          }
        
          return $this->surveys;
    }

    public function getOwnSurveys($creator_id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM survey s WHERE s.creator_id=:creator_id');
            $stmt->bindParam(':creator_id', $creator_id, PDO::PARAM_INT);
            $stmt->execute();
            $this->ownSurveys = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
          catch(PDOException $ex) {
            var_dump($ex->getMessage());
          }
        
          return $this->ownSurveys;
    }

    public function getSurveyTitle($survey_id) {
        try {
            $sql = "SELECT survey_name FROM survey s WHERE s.survey_id=:survey_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_STR);
            $stmt->execute();
            $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($return);
            $surveyName = $return[0]["survey_name"];
            return $surveyName;
    }
        catch(PDOException $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function submitSurvey($responses, $survey_id, $user_id)
    {
        var_dump($survey_id);
        try {
            $this->db->beginTransaction();
            // Insert a new survey response
            $stmt = $this->db->prepare('INSERT INTO survey_response (survey_id, responder_id) VALUES (:survey_id, :user_id)');
            $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            // Get the ID of the inserted survey response
            $surveyResponseId = $this->db->lastInsertId();

            // Insert individual responses for each question
            foreach ($responses as $questionId => $response) {
                    var_dump($response);
                    $this->insertAnswer($surveyResponseId, $questionId, $response);
            }

            // Commit the transaction
            $this->db->commit();

            return true; // Successfully submitted survey
        } catch (PDOException $ex) {
            $this->db->rollBack();
            // Log or handle the error as needed
            echo "Code: " . $ex->getCode();
            return false; // Failed to submit survey
        }
    }

    private function insertAnswer($surveyResponseId, $questionId, $answerValue)
    {
        // Insert individual answer for a question
        $stmt = $this->db->prepare('INSERT INTO survey_answer (survey_response_id, question_id, answer_text) VALUES (:survey_response_id, :question_id, :answer_value)');
        $stmt->bindParam(':survey_response_id', $surveyResponseId, PDO::PARAM_INT);
        $stmt->bindParam(':question_id', $questionId, PDO::PARAM_INT);
        $stmt->bindParam(':answer_value', $answerValue, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function createSurvey($name, $creator_id) {
        try {
        $stmt = $this->db->prepare('INSERT INTO survey (survey_name, creator_id) VALUES (:survey_name, :creator_id)');
        $stmt->bindParam(':survey_name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':creator_id', $creator_id, PDO::PARAM_INT);
        $stmt->execute();
        return $this->db->lastInsertId();
        }
        catch(PDOException $ex) {
            $this->db->rollBack();
            return false; // Failed to submit survey
        }
    }
}

?>