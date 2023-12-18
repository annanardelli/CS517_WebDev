<?php

class Question
{
    public $choices = [];
    public $questions = [];

    public $db;

    function __construct() {

   
      $this->db = new PDO('mysql:host=localhost;dbname=surveysystem;charset=utf8', 
                 'root', 'root');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     
    }

    public function getQuestions($survey_id) {
        try {
            #$survey_id = (int)$survey_id;
            $sql = "SELECT * FROM question q JOIN survey s ON s.survey_id = q.survey_id WHERE q.survey_id = :survey_id";
            $stmt = $this->db->prepare($sql);
            // Bind the parameter as integer
            $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
            // Execute the statement
            $stmt->execute();
            // Fetch the result
            $this->questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            var_dump($ex->getMessage());  // Output the error message for debugging
        }
        return $this->questions;
    }

    public function addQuestion($survey_id, $question_type, $question_text, $is_required) {
        try {
            $stmt = $this->db->prepare('INSERT INTO question (survey_id, question_type, question_text, is_required) VALUES (:survey_id, :question_type, :question_text, :is_required)');
            $stmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
            $stmt->bindParam(':question_type', $question_type, PDO::PARAM_STR);
            $stmt->bindParam(':question_text', $question_text, PDO::PARAM_STR);
            $stmt->bindParam(':is_required', $is_required, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(PDOException $ex) {
            var_dump($ex->getMessage());
            return false;
        }
    }

    public static function deleteQuestions(PDO $pdo, $question_ids)
    {
        if (! empty($question_ids)) {
            $sql = 'delete from question where question_id in (' . implode(',', array_fill(0, count($question_ids), '?')) . ')';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array_values($question_ids));
        }
    }
}
?>
