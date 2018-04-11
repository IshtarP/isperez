<?php
session_start();
if(isset($_SESSION['adminName'])
{
    header("Location:index.php");
}
    include "../../dbConnnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories() {
        global $conn;
        
        $sql = "SELECT catId, catName from om_category";
        
        $statement = $conn->prepare($aql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option value='" .$record['catId'] ."'>". $record['catName'] . "</option>";
        
        
    }
}

if(isset($_GET['submitProduct'])) {
    $productName = $_GET['productName'];
    $productDescription = $_GET['description'];
    $productImage = $_GET['productImage'];
    $productPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    $sql = "INSERT INTO om_product
            ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
             VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    
    $namedParameters = array();
    $namedParameters[':productName'] = $productName;
    $namedParameters[':productDescription'] = $productDescription;
    $namedParameters[':productImage'] = $productImage;
    $namedParameters[':price'] = $productPrice;
    $namedParameters[':catId'] = $catId;
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
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
            </select> <br />
            set Image Url: <input type="text" name="productImage"><br>
            <input type="submit" name="submitProduct" value="Add Product">
        </form>

    </body>
</html>