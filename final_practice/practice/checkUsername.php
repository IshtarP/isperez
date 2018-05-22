<?php
      
        include '../../dbConnection.php';


    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
        $conn = getdatabaseConnection("Final");
        
        $username = $_POST['username'];
        
        
        // This sql prevents sql injection using single qoutes
        $sql = "SELECT username,lastLogin,lastLoginStatus
                FROM fp_login
                WHERE username = :username";
                
        $np = array();
        $np[":username"] = $username;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting a single record
        
        header('Content-type: application/json');
        echo json_encode($record);
        
     
        
    }
    

    



?>