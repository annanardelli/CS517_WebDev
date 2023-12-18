<?php

class Response
{
    public $answers = [];
    public $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=surveysystem;charset=utf8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       
      }

    public function getResponses($survey_id) {
        try {
            // Fetch all question IDs for the specified survey
            $questionIdsStmt = $this->db->prepare("
                SELECT question_id
                FROM question
                WHERE survey_id = :survey_id
            ");
        
            $questionIdsStmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
            $questionIdsStmt->execute();
        
            // Fetch responses for each question
            while ($questionIdRow = $questionIdsStmt->fetch(PDO::FETCH_ASSOC)) {
                $question_id = $questionIdRow['question_id'];
        
                // Fetch responses for the current question
                $responsesStmt = $this->db->prepare("
                    SELECT sa.answer_text
                    FROM survey_answer sa
                    JOIN survey_response sr ON sa.survey_response_id = sr.survey_response_id
                    JOIN question q ON sa.question_id = q.question_id
                    WHERE q.question_id = :question_id
                    AND sr.survey_id = :survey_id
                ");
        
                $responsesStmt->bindParam(':question_id', $question_id, PDO::PARAM_INT);
                $responsesStmt->bindParam(':survey_id', $survey_id, PDO::PARAM_INT);
                $responsesStmt->execute();
        
                // Organize responses into an array for the current question
                $responses[$question_id] = array();
        
                while ($row = $responsesStmt->fetch(PDO::FETCH_ASSOC)) {
                    $responses[$question_id][] = $row['answer_text'];
                }
            }
            print_r($responses);
        
        } catch (PDOException $ex) {
            echo "An error occurred: " . $ex->getMessage();
        }
        return $responses;
    }
        



    public function getSurveyResponseCounts(PDO $pdo)
    {
        foreach ($this->questions as $i => $question) {
            if (! in_array($question->question_type, ['radio', 'checkbox'])) {
                unset($this->questions[$i]);
            }
        }

        foreach ($this->questions as $i => $question) {
            $sql = 'select count(*) from survey_answer sa
                    left outer join survey_response sr on sr.survey_response_id = sa.survey_response_id
                    where sr.survey_id = :survey_id
                    and sa.question_id = :question_id
                    and sa.answer_value = :answer_value';
            $stmt = $pdo->prepare($sql);

            $question->max_answer_count = 0;

            foreach ($question->choices as $choice) {
                $params = [
                    'survey_id' => $this->survey_id,
                    'question_id' => $question->question_id,
                    'answer_value' => $choice->choice_text,
                ];
                $stmt->execute($params);
                $stmt->setFetchMode(PDO::FETCH_NUM);
                if ($row = $stmt->fetch()) {
                    $choice->answer_count = $row[0];
                    if ($choice->answer_count > $question->max_answer_count) {
                        $question->max_answer_count = $choice->answer_count;
                    }
                }
            }

            $question->choice_counts = [];
            foreach ($question->choices as $choice) {
                $question->choice_counts[] = [$choice->choice_text, $choice->answer_count];
            }
        }
    }

}
?>