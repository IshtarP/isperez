<?php
session_start();

include '../../dbConnection.php';
$conn = getdatabaseConnection("Final");

// Checks if the username is valid
    function validUserName($username) {
        
        global $conn;
           // This sql prevents sql injection using single qoutes
        $sql = "SELECT *
                FROM fp_login
                WHERE username = :username";
                
        $np = array();
        $np[":username"] = $username;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting a single record
        
        // invald username reeturn to login
        if(!$record) {
            return false;
        }  else {
            return true;
        }
    }

        
    function validUsernameAndPassword($username,$password) {
            global $conn;
            // This sql prevents sql injection using single qoutes
            $sql = "SELECT *
                    FROM fp_login
                    WHERE username = :username
                    AND password = :password";
                    
            $np = array();
            $np[":username"] = $username;
            $np[":password"] = $password;
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
            $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting a single record
            
            
            
            if(!$record) {
           
            // This sql prevents sql injection using single qoutes
            // Now() returns the current date and time
            $sql = "UPDATE fp_login SET
                    lastLogin=NOW(), lastLoginStatus='U' 
                    WHERE username = :username";
                    
            $np = array();
            $np[":username"] = $username;
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
            
            return false;
            } else {
                return true;
            }
           
    }    


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    
    if(!validUserName($username)) {
        header("Location: program1.php");
    }
    
    else {
        
        if(validUsernameAndPassword($username,$password)) {
            // This sql prevents sql injection using single qoutes
            $sql = "UPDATE fp_login SET
                    lastLogin=NOW(), lastLoginStatus='S'
                    WHERE username = :username";
                    
            $np = array();
            $np[":username"] = $username;
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
            $_SESSION['username'] = $_POST["username"];
            header('Location: Welcome.php');
            
        } else {
            
            header("Location: program1.php");

        }
    }
    
    

    
   
        
            
}





?>


<!DOCTYPE html>

<html>
<head>
 <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>


<body>

  <div class="page-header">
     <h1>Admin Login</h1>
   </div>

<form action="program1.php" method="post">
 <div class="form-group">
   <label for="exampleInputUsername">Username</label>
   <input id= "username" type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Enter username"><span id="theUsername"></span>
  </div>
 <div class="form-group">
   <label for="exampleInputPassword1">Enter password</label>
   <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
 </div>

 <button type="submit" class="btn btn-primary">Login</button>
</form>
<div id="status"></div> <!-- #status used for ajax call -->



<script>

// Ajax call goes here

$("#username").change(function() {
    $("#status").empty();
   $.post({url:"checkUsername.php", data : {username : $("#username").val()}, success: function(result) {
       if(result != false) {
               var outcome = result.lastLoginStatus === 'S' ? 'Successful' : 'Unsuccessful';
           
               $("#status").append(result.lastLogin + " " + outcome);

       }
    }});
}
);


 
            
</script>



  
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>There is a Login form with all appropriate HTML elements</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>When changing the username, an AJAX call is executed, displaying the last date/time the user logged in and the last login status (Successful, Unsuccessful)</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>When submitting the Login form, the last date/time is updated correctly </td>
      <td align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td> When submitting the Login form, the Login Status is updated accordingly, whether it was Successulf (S) or Unsuccessful (U) </td>
       <td align="center">20</td>
     </tr> 
 <tr style="background-color:#FFC0C0">
       <td>5</td>
       <td>When submitting the Login form, if the credentials are wrong, the user is taking back to the login screen. </td>
       <td align="center">5</td>
     </tr> 
      <tr style="background-color:#FFC0C0">
       <td>6</td>
       <td>When submitting the Login form, if the credentials are correct, a "username" session variable is set and it is displayed in a new page called <strong>"welcome.php"</strong> </td>
       <td align="center">10</td>
     </tr> 
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>






</body>
</html>
