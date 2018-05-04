<?php
if (!empty($_GET)) {
echo $_GET["make"]. "<br/>";
echo $_GET["model"] . "<br/>";
echo $_GET["condition"] . "<br/>";

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



<a href="login.php">Login</a></br>
<a href="home.php">Home</a></br>

<?php

 include('./helper_functions.php');


?>

 Make:
 <?php displaySelectMake() ?>



 Model:
<select class="selectpicker" class="form-control" name="model" id="model">
<option disabled selected value> -- select an option -- </option>


</select>

Condition:
<select class="selectpicker" id='condition' name="condition">
<option disabled selected value> -- select an option -- </option>
  <option value="new">New</option>
  <option value="used">Used</option>

</select>

Sort by:
<select  class="selectpicker" id='sortBy' name="sortBy">
<option disabled selected value> -- select an option -- </option>
  <option value="price">Price</option>
  <option value="used_or_new">Condition</option>
  <option value="year">Year</option>

</select>

  <button  onclick="handleSubmit()" class="btn btn-primary">Search</button>
<div id="cars"></div>

</body>
<script>

function handleSubmit() {
    make = $('#make').val() === null ? '' :  $('#make').val();
    model = $('#model').val() === null ? '' :  $('#model').val();
    condition = $('#condition').val() === null ? '' : $('#condition').val() ;
    sortBy = $('#sortBy').val() === null ? '' : $('#sortBy').val() ;

    var param = {
        'make_id': make,
        'model_id': model,
        'condition': condition,
        'sortBy' : sortBy

    };
     // ajax call
       $.ajax({url: "./getcars.php",data: param,success: function(result){


        $('#cars').empty();
        $('#cars').append(result);

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

  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>
</html>
