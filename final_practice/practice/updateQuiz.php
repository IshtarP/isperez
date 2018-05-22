<?php
include '../../dbConnection.php';
$conn = getdatabaseConnection("Final");


function isNewUser($email) {
        
        global $conn;
          // This sql prevents sql injection using single qoutes
        $sql = "SELECT *
                FROM quiz
                WHERE email = :email";
                
        $np = array();
        $np[":email"] = $email;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting a single record
        
        if(!$record) {
            return true;
        }  else {
            return false;
        }
}



function getUser($email) {
        
        global $conn;
          // This sql prevents sql injection using single qoutes
        $sql = "SELECT *
                FROM quiz
                WHERE email = :email";
                
        $np = array();
        $np[":email"] = $email;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting a single record
        
        return $record;
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    global $conn;
    $email =  $_GET['email'];

    if(isNewUser($email)) {
        
        $sql = 'INSERT INTO quiz (email, lastScore, attemps) values(:email, :lastScore, :attemps)';


        $np = array();
        $np[":email"] = $email;
        $np[":lastScore"] = -1;
        $np[":attemps"] = 1;

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
        header('Content-Type: application/json');
        echo json_encode(getUser($email));
        
    } else {
        
        if(!isset($_GET['lastScore']) && !isset($_GET['attemps'])) {
                  header('Content-Type: application/json');
        echo json_encode(getUser($email));
        }
        else {
        // update exiting user
            $sql = "UPDATE quiz SET lastScore = :lastScore, attemps = :attemps WHERE email = :email";
                    
                    
            $np = array();
            $np[":email"] = $email;
            $np[":lastScore"] = $_GET["lastScore"];
            $np[":attemps"] = $_GET["attemps"];
    
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
    
      header('Content-Type: application/json');
        echo json_encode(getUser($email));
        }
        
    }
         
}

?>