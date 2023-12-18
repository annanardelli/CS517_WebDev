<?php

class CredentialsModel {
  public $emails = array();
  private $db;

  function __construct() {
   
    $this->db = new PDO('mysql:host=localhost;dbname=surveysystem;charset=utf8', 
               'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   
  }

  public function list_logins () {

    try {
      $stmt = $this->db->query('SELECT email FROM :login');
      $this->emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
       var_dump($ex->getMessage());
     }
   
     return $this->emails;
  }

  public function email_taken($email) {
   try {
    $stmt = $this->db->prepare('SELECT email FROM login where email=:email');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result && sizeof($result)>0) {
        return true;
    } else {
        return false;
    }
   } catch(PDOException $ex) {
        var_dump($ex->getMessage());
   }
  }

  public function authenticate($email, $password) {
    try {
     $stmt = $this->db->prepare('SELECT login_id FROM login where email=:email and password=PASSWORD(:password)');
     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     $stmt->bindParam(':password', $password, PDO::PARAM_STR);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     if ($result && sizeof($result)>0) {
         return $result[0]['login_id'];
     } else {
         return false;
     }
    } catch(PDOException $ex) {
         var_dump($ex->getMessage());
    }
   }

   public function add_new_account($first_name, $last_name, $email, $password) {
    try {
        $this->db->beginTransaction();

        // Insert into 'login' Table
        $stmtAccount = $this->db->prepare("INSERT INTO login(first_name, last_name, email, password) 
                                          VALUES(:first_name, :last_name, :email, PASSWORD(:password))");
        $stmtAccount->execute(array(
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email'=> $email,
            ':password'=> $password
        ));

        // Get the auto-generated student ID
        $userId = $this->db->lastInsertId();

        $this->db->commit();
        return true;

    } catch (PDOException $ex) {
        $this->db->rollback();
        var_dump($ex->getMessage());
        return false;
    }
}

}

?>
