<?php
    
    function displayResults() {
        global $items; // Necessary to get the global items array
        
        if(isset($items)) {
            echo "<table class='table'>";
            foreach ($items as $item) {
                $itemName = $item['name'];
                $itemPrice = $item['salePrice'];
                $itemImage = $item['thumbnailImage'];
                $itemId = $item['itemId'];
                
                // Display item as table row
                echo '<tr>';
                echo "<td><img src='$itemImage'><td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemPrice</h4></td>";
                
                
                // Hidden input element containing the item name
                echo "<form method='post'>";
                echo "<input type='hidden' name='itemName value='$itemName'>";
                echo "<td><button class='btn btn-warning'>Add</button></td>";
                echo "</form>";
                
                echo "</tr>";
                
            }
            echo "</table>";
        }
    }


?>