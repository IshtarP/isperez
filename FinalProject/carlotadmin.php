<?php
session_start();
include './helper_functions.php';

if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
  header ("Location: login.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  session_destroy();
  header("location: action.php");
}


 ?>

 <html>
<body>
  <head>
    <head>
<link rel="stylesheet" type="text/css" href="./css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
  </head>
  <form action="carlotadmin.php" method="post">
    <input type="submit" value="Logout">

  </form>
  <div id="carlotdisplay"><?php echo adminDisplay(); ?> </div>
</body>
<script>
function deleteCar (car_id) {
    if (confirm("Are you sure you want to delete this car? ")) {

      $.ajax({url: "./deleteCar.php?car_id=" + car_id, success: function(result){

        alert(result);

        $.ajax({url: "./getCarLot.php", success: function(result){

                    $("#carlotdisplay").empty();
                    $("#carlotdisplay").append(result);

         }});


       }});



    } else {
        console.log("no delete");
    }
}
</script>
 </html>
