<?php
// Background image display before the style tag, HTML and PHP files are interpreted from top to bottom
    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    if(isset($_GET['keyboard'])) {
        //echo "You searched for: " . $_GET['keyboard'];
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyboard']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel </title>
        <meta charset="utf-8"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url("css/styles.css");
        body {
            background-image: url('<?=$backgroundImage ?>');
        }
    </style>
    </head>
    <body>
        <br/> <br/>
        <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyboard to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }else {
                //Display Carousel Here
                for ($i = 0; $i < 5; $i++) {
                    do {
                        $randomIndex = rand(0,count($imageURLs));
                    }
                    while (!isset($imageURLs[$randomIndex]));
                    
                    echo "<img src='" . $imageURLs[$randomIndex] . "' width='200'>";
                    unset($imageURLs[$randomIndex]);
                    //echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] ."' width='200'>";
                }
        ?>
        
        <!-- add 5.2 code here -->
        
        <h1> I'm a regular HTML tag inside the PHP else statement!</h1>
        
        <?php
            } // end of the else statement
        ?>
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyboard" placeholder="Keyboard">
            <input type="submit" value="Submit"/>
        </form>
        <br/> <br/>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>