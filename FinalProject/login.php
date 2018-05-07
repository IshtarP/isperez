<?php
session_start();

include './dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $conn = getdatabaseConnection("final_project");

  $username = $_POST['username'];
  $password = $_POST['password'];




  // This sql prevents sql injection using single qoutes
  $sql = "SELECT *
          FROM car_admin
          WHERE username = :username
          AND password = :password";

   $np = array();
   $np[":username"] = $username;
   $np[":password"] = $password;

   $stmt = $conn->prepare($sql);
   $stmt->execute($np);
   $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting one single record

   if(empty($record)) {

       echo "Wrong username or password";

   } else {
       $_SESSION['login'] = $record['userName'];
       header ("Location: carlotadmin.php");
   }
}

?>

<!DOCTYPE html>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>


<body>

  <div class="page-header">
     <h1>Admin Login</h1>
   </div>

<form action="login.php" method="post">
 <div class="form-group">
   <label for="exampleInputUsername">Username</label>
   <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Enter username">
  </div>
 <div class="form-group">
   <label for="exampleInputPassword1">Enter password</label>
   <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
 </div>

 <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>
</html>
