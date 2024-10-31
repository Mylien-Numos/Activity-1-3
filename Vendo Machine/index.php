<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>
    <h2>Vendo Machine</h2>
    <form method="post">
        <fieldset class="fset">
            <legend>Products:</legend>
            <label><input type="checkbox" name="product[]" value="Coke"> Coke - ₱15</label><br>
            <label><input type="checkbox" name="product[]" value="Sprite"> Sprite - ₱20</label><br>
            <label><input type="checkbox" name="product[]" value="Royal"> Royal - ₱20</label><br>
            <label><input type="checkbox" name="product[]" value="Pepsi"> Pepsi - ₱15</label><br>
            <label><input type="checkbox" name="product[]" value="Mountain Dew"> Mountain Dew - ₱20</label><br>
        </fieldset>

        <fieldset class="fset">
            <legend>Options:</legend>
            <label for="size">Size:</label>
            <select name="size">
                <option value="regular">Regular</option>
                <option value="upsize">Up-Size (add ₱5)</option>
                <option value="jumbo">Jumbo (add ₱10)</option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" min="1" value="1" id="qntty-sec">
            <button name="checkout" id="checkout">Checkout</button>
        </fieldset>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['product']) && isset($_POST['checkout'])) {
        $selectedProducts = $_POST['product'];
        $quantity = max(1, (int)$_POST['quantity']);
        $size = $_POST['size'] ?? 'regular';

        $productPrices = ["Coke" => 15, "Sprite" => 20, "Royal" => 20, "Pepsi" => 15, "Mountain Dew" => 20];
        $sizeAdjustments = ["regular" => 0, "upsize" => 5, "jumbo" => 10];

        $totalItems = 0;
        $totalPrice = 0;

        echo "<hr><b>Purchase Summary:</b><br><ul>";
        foreach ($selectedProducts as $product) {
            $itemPrice = ($productPrices[$product] + $sizeAdjustments[$size]) * $quantity;
            $totalItems += $quantity;
            $totalPrice += $itemPrice;
            echo "<li>{$quantity} " . ($quantity > 1 ? "pieces" : "piece") . " of {$size} {$product} amounting to ₱{$itemPrice}</li>";
        }
        echo "</ul><hr><b>Total Items:</b> {$totalItems}<br><b>Total Price:</b> ₱{$totalPrice}";
    } else {
        echo "<hr>Please select at least one product.";
    }
}
?>
