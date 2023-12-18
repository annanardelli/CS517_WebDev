<?php
class Choice
{

    public $choices=[];
    public $db;

    function __construct() {

   
        $this->db = new PDO('mysql:host=localhost;dbname=surveysystem;charset=utf8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       
      }

      public function getChoices(PDO $pdo, $question_id)
      {
        try {
            #$survey_id = (int)$survey_id;
            $sql = "SELECT * FROM choice c JOIN question q ON c.question_id = q.survey_id WHERE q.question_id = :question_id";
            $stmt = $this->db->prepare($sql);
            // Bind the parameter as integer
            $stmt->bindParam(':question_id', $question_id, PDO::PARAM_INT);
            // Execute the statement
            $stmt->execute();
            // Fetch the result
            $this->choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            var_dump($ex->getMessage());  // Output the error message for debugging
        }
        return $this->choices;
      }
    
    public static function deleteChoices(PDO $pdo, $choice_ids)
    {
        if (! empty($choice_ids)) {
            $sql = 'delete from choice where choice_id in (' . implode(',', array_fill(0, count($choice_ids), '?')) . ')';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array_values($choice_ids));
        }
    }
}
?>