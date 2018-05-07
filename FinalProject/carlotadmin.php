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
     <head>
  
<link rel="stylesheet" type="text/css" href="./css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>
<body>


  <h1>Admin Dashboard</h1>
  <a href="./report.php">Report</a>

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Car</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter information</h4>
        </div>
        <div class="modal-body">
<b> Make:</b>
 <?php displaySelectMake() ?> <br>



<b> Model:</b>
<select class="selectpicker" class="form-control" name="model" id="model">
<option disabled selected value> -- select an option -- </option> 

</select><br>


<b>Year:</b>
<input id='year' name="year"><br>

<b>Price:</b>
<input id='price' name="price"><br>

<b>Exterior Color:</b>
<input id='color' name="color"><br>

<b>Condition:</b>
<select class="selectpicker" id='condition' name="condition">
<option disabled selected value> -- select an option -- </option>
  <option value="new">New</option>
  <option value="used">Used</option> 

</select> <br>

<b>Picture Link:</b>
<input id='picture' name="picture"><br>



  <button  onclick="handleSubmit()" class="btn btn-primary">Add </button>
<div id="cars"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
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


 $("#make").on("change",function(){

       car_id = $('#make').val();

       // ajax call
       $.ajax({url: "./getmodels.php?make_id=" + car_id, success: function(result){

        $('#model').empty();
        $('#model').append('<option disabled selected value> -- select an option -- </option>');
        for (var i=0; i<result.length; i++) {

            car_model = result[i];

            $('#model').append($('<option>', {
                value: car_model.model_id,
                text: car_model.model_name
            }));
        }

        }});

  });


function handleSubmit() {
  
    
    model_id = $('#model').val() === null ? '' :  $('#model').val();
    year = $('#year').val() === null ? '' :  $('#year').val();
    price = $('#price').val() === null ? '' : $('#price').val() ;
    exterior_color = $('#color').val() === null ? '' : $('#color').val() ;
    used_or_new = $('#condition').val() === null ? 'used' : $('#condition').val() ;
    picture = $('#picture').val() === null ? '' : $('#picture').val() ;

    
    // console.log(model_id);
    // console.log(year);
    // console.log(price);
    // console.log(exterior_color);
    // console.log(used_or_new);
    // console.log(picture);

    var param = {
        'model_id': model_id,
        'year': year,
        'price': price,
        'exterior_color': exterior_color,
        'used_or_new' : used_or_new,
        'picture' : picture

    };
        
    

    console.log("run bitch")
     // ajax call
       $.ajax({url: "addCar.php",data: param,success: function(result){
        
        console.log("fak it")

          console.log(result);
        }});
        

}


 $("#make").on("change",function(){

       car_id = $('#make').val();

       // ajax call
       $.ajax({url: "./getmodels.php?make_id=" + car_id, success: function(result){

        $('#model').empty();
        $('#model').append('<option disabled selected value> -- select an option -- </option>');
        for (var i=0; i<result.length; i++) {

            car_model = result[i];

            $('#model').append($('<option>', {
                value: car_model.model_id,
                text: car_model.model_name
            }));
        }

        }});

  });


</script>
 </html>
