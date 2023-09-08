<?php
$oldPrice = filter_input(INPUT_POST, 'list_price');
$discountPercent = filter_input(INPUT_POST, 'discount_percent');
$discountCost = ($oldPrice * $discountPercent)/ 100;
$newPrice = $oldPrice - $discountCost;
$productName = filter_input(INPUT_POST, 'product_description');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
    <h1>Product Discount Calculator</h1>
    
                <label>Product Description:</label>
                <span><?php echo htmlspecialchars($productName); ?></span><br>

                <label>Old Price:</label>
                <span><?php echo htmlspecialchars($oldPrice); ?></span><br>

                <label>Discount Percent:</label>
                <span><?php echo htmlspecialchars($discountPercent).'%'; ?></span><br>

                <label>Discount Cost:</label>
                <span><?php echo htmlspecialchars($discountCost); ?></span><br>

                <label>New Price:</label>
                <span><?php echo htmlspecialchars($newPrice); ?></span>
    </main>
</body>
</html>