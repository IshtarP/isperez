

<!DOCTYPE html>
<html>
    <head>
        <meta chartset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url(css/styles.css);
        </style>
        
        <title>Home</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><strong id="test">The Car Shop</strong></a>
                </div>
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">Filter b..</a></li>-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SELECT MAKE
                        <span class="caret"></span></a>
                        <!-- Might use the database to display all the MAKES available-->
                        <!-- or might use a function-->
                        <ul class="dropdown-menu">
                            <li><a href="#">SELECT MAKE</a></li>
                            <li><a href="#">SELECT MODEL</a></li>
                            <li><a href="#">SELECT NEW/USED</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">Filter b..</a></li>-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SELECT MODEL
                        <span class="caret"></span></a>
                        <!-- Might use the database to display all the MAKES available-->
                        <!-- or might use a function-->
                        <ul class="dropdown-menu">
                            <li><a href="#">SELECT MAKE</a></li>
                            <li><a href="#">SELECT MODEL</a></li>
                            <li><a href="#">SELECT NEW/USED</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav">
                    <!--<li class="active"><a href="#">Filter b..</a></li>-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SELECT NEW/USED
                        <span class="caret"></span></a>
                        <!-- Might use the database to display all the MAKES available-->
                        <!-- or might use a function-->
                        <ul class="dropdown-menu">
                            <li><a href="#">SELECT MAKE</a></li>
                            <li><a href="#">SELECT MODEL</a></li>
                            <li><a href="#">SELECT NEW/USED</a></li>
                        </ul>
                    </li>
                </ul>
                
                
                
            
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="buttonColor"href="#"><span class="glyphicon glyphicon-log-in</a>"></span>Login</a></li>
                    
                </ul>
                <form class="navbar-form navbar-left" action="/action.php">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </nav>
        
        <!-- Creating a carousel -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/theNissanGTR.png" alt="nissanGTR">
                </div>
                
                <div class="item">
                    <img src="img/bmwM3.png" alt="bmwM3">
                </div>
                
                <div class="item">
                    <img src="img/honda.png" alt="honda">
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
    
    </body>
</html>