<?php

    include 'inc/header.php';

?>

            <style>
                #myCarousel {
                    display:inline-block;
                }
                
                
            
            </style>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Add Carousel here -->
        
        <div  id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
                <li data-target="#mycarousel" data-slide-to="3"></li>
                <li data-target="#mycarousel" data-slide-to="4"></li>
                <li data-target="#mycarousel" data-slide-to="5"></li>
                <li data-target="#mycarousel" data-slide-to="6"></li>
                <li data-target="#mycarousel" data-slide-to="7"></li>
                <li data-target="#mycarousel" data-slide-to="8"></li>
                <li data-target="#mycarousel" data-slide-to="9"></li>
                
            </ol>
            
            <!-- Wrapper for slides -->
            <div  class="carousel-inner">
                <div class="item active">
                    <img class="testing" src="img/alex.jpg" alt="alex">
                </div>
                
                <div class="item">
                    <img src="img/bob.jpg" alt="bear">
                </div> 
                
                <div class="item">
                    <img src="img/carl.jpg" alt="carl">
                </div> 
                
                
                <div class="item">
                    <img src="img/charlie.jpg" alt="charlie">
                </div> 
                
                
                <div class="item">
                    <img src="img/leo.jpg" alt="lion">
                </div> 
                
                
                <div class="item">
                    <img src="img/jerry.jpg" alt="otter">
                </div> 
                
                <div class="item">
                    <img src="img/sally.jpg" alt="sally">
                </div> 
                
                
                <div class="item">
                    <img src="img/samantha.jpg" alt="samantha">
                </div> 
                
                
                <div class="item">
                    <img src="img/ted.jpg" alt="ted">
                </div> 
                
                
                <div class="item">
                    <img src="img/fred.jpg" alt="tiger">
                </div> 
                
                
            </div>
            
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        
        <br>
        
        <a href="pets.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Adopt Now!</a>
        
        <br>
        
        
<?php

    include 'inc/footer.php';

?>
       