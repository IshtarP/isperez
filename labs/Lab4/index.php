
<?php

 //print_r($_GET); //displaying all content submitted in the form using the GET method

  $backgroundImage = "img/sea.jpg";
    
  if (isset($_GET['keyword'])) { //if form was submitted
      
      include 'api/pixabayAPI.php';
      
      /*echo "<h3>You searched for " . $_GET['keyword'] . "</h3>";*/
      
      $orientation = "horizontal";
      $keyword = $_GET['keyword'];
      
      if (isset($_GET['layout'])) {  //user checked a layout
        
        $orientation = $_GET['layout'];
        
      }
      
      if (!empty($_GET['category'])) { //user selected a category
        $keyword = $_GET['category'];
      }
      
      $imageURLs = getImageURLs($keyword, $orientation);
      
      $backgroundImage = $imageURLs[array_rand($imageURLs)];
      
      
  }      
 
 function checkCategory($category){
   
    if ($category == $_GET['category']) {
       echo " selected";
    }
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Carousel </title>
        <meta charset="utf-8">
    </head>
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
        body {
            background-image: url(<?=$backgroundImage?>);
            background-size: cover;
        }
        
        #carouselExampleIndicators {
            width: 500px;
            margin: 0 auto; /*centers a div container*/
        }
        #theButton {
        
            float:inline;
            padding-top:25px;
        }
        #one {
            border-radius:20px;
            height:50px;
            font-size:25px;
            background-color:silver;
        
        }
        #box {
            height:40px;
            font-size:25px;
            border-radius:15px;
        }
        
         
    </style>
    <body>

        <?php
        
            if (isset($_GET['keyword'])) {
        
              echo "<h2><strong>You must type a keyword or select a category</strong> </h2>";
            
            }  
        ?>

     
        <form method="GET">
            
            
            <input id="box" type="text" size="15" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            
            <input type="radio" name="layout" value="horizontal" id="hlayout" 
            
            <?php
               if ($_GET['layout'] == "horizontal") {
                 echo "checked";
               }
            ?>
            
            >
            
            <label for="hlayout"><strong> Horizontal<strong></label>
            
            <input type="radio" name="layout" value="vertical" id="vlayout" <?= ($_GET['layout']=="vertical")?"checked":"" ?>>
            <label for="vlayout"><strong> Vertical</strong> </label>
            
            <div class="try">
            <select name="category">
              <option value="" >  Select One </option> 
              <option value="sea" <?=checkCategory('sea')?>> Sea </option>
              <option <?=checkCategory('Forest')?>>  Forest </option>
              <option <?=checkCategory('Sky')?>> Mountain </option>
              <option <?=checkCategory('snow')?>> Snow </option>
            </select>
            
           <div id="theButton">
            <input id="one" type="submit" value="Submit!"/>
            </div>
            
                    
        </form>
        </div>
        
        <?php
          
           if (isset($_GET['keyword'])) {
        ?>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for ($i=1; $i < 7; $i++) { ?>
                  <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>"></li>
                <?php } //endFor ?> 
            
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
                </div>
                 <div class="carousel-item" >
                    <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide"> 
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Sixth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Seventh slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
        
        <?php
            }//endIf
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>