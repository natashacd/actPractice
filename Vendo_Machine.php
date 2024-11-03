<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>
    <h1>Vendo Machine</h1>
    <form method="post">
        <fieldset style="width: 500px;">
            <legend>Products</legend>
            <input type="checkbox" name="chkDrink[]" id="chkCoke" value="Coke">
            <label for="chkCoke">Coke - ₱15</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkSprite" value="Sprite">
            <label for="chkSprite">Sprite - ₱20</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkRoyal" value="Royal">
            <label for="chkRoyal">Royal - ₱20</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkPepsi" value="Pepsi">
            <label for="chkPepsi">Pepsi - ₱15</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkMountain" value="Mountain Dew">
            <label for="chkMountain">Mountain Dew - ₱20</label><br>
        </fieldset>  

        <fieldset style="width: 500px;">
            <legend>Options</legend>
            <label for="size">Size:</label>
            <select name="size" id="size">
                <option value="Regular">Regular</option>
                <option value="Up-Size">Up-Size (add ₱5)</option>
                <option value="Jumbo">Jumbo (add ₱10)</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1">
            <input type="submit" name="btnprocess" value="Check Out">
        </fieldset>
    </form>

    <hr>

    <?php
    if (isset($_POST['btnprocess'])) {
        $prods = $_POST['chkDrink'] ?? [];
        $size = $_POST['size'];
        $qty = (int)$_POST['quantity'];
        $prices = [
            "Coke" => 15,
            "Sprite" => 20,
            "Royal" => 20,
            "Pepsi" => 15,
            "Mountain Dew" => 20
        ];

        if (empty($prods)) {
            echo "<p><b>No product selected. Please try again.</b></p>";
        } else {
            echo "<p style='font-size: 18px;'><b>Purchase Summary:</b></p>";
            $tCost = 0;
            $tItems = 0;
        
            echo "<ul>";
            foreach ($prods as $product) {
                if (array_key_exists($product, $prices)) {
                    $price = $prices[$product];
                    $pCost = $price * $qty;

                    if ($size === "Up-Size") {
                        $pCost += 5 * $qty;
                    } elseif ($size === "Jumbo") {
                        $pCost += 10 * $qty;
                    }
        
                    $tCost += $pCost;
                    $tItems += $qty;
        
                    $pcs = $qty > 1 ? "pieces" : "piece";
                    echo "<li>$qty $pcs of $size $product amounting to ₱$pCost</li>";
                }
            }
            echo "</ul>";
        
            echo "<b>Total Number of Items:</b> $tItems<br>";
            echo "<b>Total Amount:</b> ₱$tCost";
        }
    }        
    ?>
</body>
</html>
