<?php

   include '../../../../dbConnection.php';

      $conn = getDatabaseConnection('challenge');
      
      $sql = "SELECT * FROM poll WHERE 1";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      print_r($record);  
    
    
     echo json_encode($record);
?>