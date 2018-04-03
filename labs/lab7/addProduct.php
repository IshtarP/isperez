<?php
    include "../../dbConnnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories() {
        global $conn;
        
        $sql = "SELECT catId, catName from om_category";
        
        $statement = $conn->prepare($aql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option>". $record['catName'] . "</option>";
        
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add a Product </title>
    </head>
    <body>
        <h1> Add a Product </h1>
        <form>
            Product name: <input type="text" name="productName">
            Description: <textarea name ="description" cols= 50 rows= 4></textarea><br>
            Price: <input type="text" name="price">
            Category: <select name="catId">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select>
            set Image Url: <input type="text" name="productImage"><br>
            <input type="submit" name="submitProduct">
        </form>

    </body>
</html>