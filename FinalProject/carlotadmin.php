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
  <a href="./report.php">Report</a><br>
 Make:
 <?php displaySelectMakeSecond() ?>



 Model:
<select class="selectpicker" class="form-control" name="modelSearch" id="modelSearch">
<option disabled selected value> -- select an option -- </option>


</select>

Condition:
<select class="selectpicker" id='conditionSearch' name="conditionSearch">
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

  <button  onclick="queryCars()" class="btn btn-primary">Search</button>
<div id="cars"></div>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Car</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enter information</h4>
        </div>
        <div class="modal-body">
<b> Make:</b>
 <?php displaySelectMakeThird() ?> <br>



<b> Model:</b>
<select class="selectpicker" class="form-control" name="addModel" id="addModel">
<option disabled selected value> -- select an option -- </option> 

</select><br>


<b>Year:</b>
<input id='addYear' name="addYear"><br>

<b>Price:</b>
<input id='addPrice' name="addPrice"><br>

<b>Exterior Color:</b>
<input id='addColor' name="addColor"><br>

<b>Condition:</b>
<select class="selectpicker" id='addCondition' name="addCondition">
<option disabled selected value> -- select an option -- </option>
  <option value="new">New</option>
  <option value="used">Used</option> 

</select> <br>

<b>Picture Link:</b>
<input id='addPicture' name="addPicture"><br>



  <button  onclick="handleSubmit()" class="btn btn-primary">Add </button>
  <div id="addMessage"></div>
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
  
  <div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="editCarModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter information</h4>
        </div>
        <div class="modal-body">
           

<p style="display: none;" id="theCar_id"></p>
<b> Make:</b><span id="editMake"></span> <br>

<b> Model:</b><span id="editModel"></span><br>


<b>Year:</b>
<input id='editYear' name="editYear"><br>

<b>Price:</b>
<input id='editPrice' name="editPrice"><br>

<b>Exterior Color:</b>
<input id='editColor' name="editColor"><br>

<b>Condition:</b>
<select class="selectpicker" id='editCondition' name="editCondition">
<option> -- select an option -- </option>
  <option value="new" >New</option>
  <option value="used">Used</option> 

</select> <br>

<b>Picture Link:</b>
<input id='editPicture' name="editPicture"><br>

  <button  onclick="updateCar()" class="btn btn-primary">Submit</button><br>
  <div id="message"></div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
</div>
  
</body>
<script>
function deleteCar (car_id) {
    if (confirm("Are you sure you want to delete this car? ")) {

      $.ajax({url: "./deleteCar.php?car_id=" + car_id, success: function(result){

        alert(result);

        queryCars()


       }});



    } else {
        console.log("no delete");
    }
}


$("#conditionSearch").on("change", function(){
    queryCars()
})

$("#sortBy").on("change", function(){
    queryCars()
})

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
  
  
 $("#makeSearch").on("change",function(){

       car_id = $('#makeSearch').val();

       // ajax call
       $.ajax({url: "./getmodels.php?make_id=" + car_id, success: function(result){

        $('#modelSearch').empty();
        $('#modelSearch').append('<option disabled selected value> -- select an option -- </option>');
        for (var i=0; i<result.length; i++) {

            car_model = result[i];

            $('#modelSearch').append($('<option>', {
                value: car_model.model_id,
                text: car_model.model_name
            }));
        }

        }});
        queryCars()

  });

 $("#modelSearch").on("change",function(){

       
        queryCars()

  });

function handleSubmit() {
  
   $("#addMessage").empty();
    model_id = $('#addModel').val() === null ? '' :  $('#addModel').val();
    year = $('#addYear').val() === null ? '' :  $('#addYear').val();
    price = $('#addPrice').val() === null ? '' : $('#addPrice').val() ;
    exterior_color = $('#addColor').val() === null ? '' : $('#addColor').val() ;
    used_or_new = $('#addCondition').val() === null ? 'used' : $('#addCondition').val() ;
    picture = $('#addPicture').val() === null ? '' : $('#addPicture').val() ;

    
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
    
    
        

    
     // ajax call
       $.ajax({url: "addCar.php",data: param,success: function(result){
        
            $("#addMessage").append("<b>Successfully added car</b>")
            queryCars();

        }});
 

       
    
}

function queryCars() {
    
    
    make = $('#makeSearch').val() === null ? '' :  $('#makeSearch').val();

    model = $('#modelSearch').val() === null ? '' :  $('#modelSearch').val();
    console.log($('#modelSearch').val())
    condition = $('#conditionSearch').val() === null ? '' : $('#conditionSearch').val() ;
    sortBy = $('#sortBy').val() === null ? '' : $('#sortBy').val() ;

    var param = {
        'make_id': make,
        'model_id': model,
        'condition': condition,
        'sortBy' : sortBy

    };
     // ajax call
       $.ajax({url: "./getAdminCarLot.php",data: param,success: function(result){


        $('#carlotdisplay').empty();
        $('#carlotdisplay').append(result);

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

 $("#addMake").on("change",function(){

       car_id = $('#addMake').val();

       // ajax call
       $.ajax({url: "./getmodels.php?make_id=" + car_id, success: function(result){

        $('#addModel').empty();
        $('#addModel').append('<option disabled selected value> -- select an option -- </option>');
        for (var i=0; i<result.length; i++) {

            car_model = result[i];

            $('#addModel').append($('<option>', {
                value: car_model.model_id,
                text: car_model.model_name
            }));
        }

        }});

  });



function editCar(car_id) {
       $.ajax({url: "./getCarInfo.php?car_id=" + car_id, success: function(result){


      $("#theCar_id").text(car_id)
    
            
      $("#editMake").text(result.make_name);
               
     $("#editModel").text(result.model_name);
     $('#editYear').val(result.year);
     $('#editPrice').val(result.price);
     $('#editPicture').val(result.picture);
     $('#editColor').val(result.exterior_color);
      $('[name=editCondition]').val( result.used_or_new );//To select Blue
      
      queryCars()
        }});




        
        $('#editCarModal').modal('toggle');

}

function updateCar() {
    


     year = $('#editYear').val();
     price =  $('#editPrice').val();
     picture = $('#editPicture').val();
     color = $('#editColor').val();
     condition =  $('[name=editCondition]').val(  );
     car_id = $("#theCar_id").text()
  
     $("#message").empty();
  
     var param = {
        'year': year,
        'price': price,
        'picture': picture,
        'color' : color,
        'condition' :  condition,
        'car_id' :  car_id

    };
  
      // ajax call
       $.ajax({url: "./updateCar.php",data: param,success: function(result){

                $('#message').append("<b>Success</b>")
            
        }});
        
        queryCars()
}

$("#myModal").on("hidden.bs.modal", function () {

  $('#addYear').val('') 
  $('#addPrice').val('') 
    $('#addColor').val('') 
     $('#addPicture').val('') 
     $('#addMessage').empty() 

});


$('#editCarModal').on("hidden.bs.modal", function () {
 $('#message').empty()   
})



</script>
 </html>
