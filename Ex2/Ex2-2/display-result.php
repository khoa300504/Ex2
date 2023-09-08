<?php
$deposit = filter_input(INPUT_POST, 'investment');
$interestRate = filter_input(INPUT_POST, 'interest_rate');
$numberOfYear = filter_input(INPUT_POST, 'years');
$error_message = '';

if (is_numeric($deposit) || is_numeric($interestRate) || is_numeric($numberOfYear)) {
    $error_message = 'Must be a valid number.'; 
}

if ($error_message != '') {
    include('index.php');
    exit();
}

$futureValue = $deposit;
$interest = ($interestRate * $deposit)/100;
for ($x = 1; $x <= $numberOfYear; $x++) {
    $futureValue = $futureValue + $interest;
    $interest = ($interestRate * $futureValue)/100;
}
$temp = number_format($futureValue, 2);
$temp2 = number_format($deposit, 2);
$currentDateTime = date("d/m/Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Value Calculator</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
    <h1>Future Value Calculator</h1>

    <label for="">Investment Amount:</label>
    <span><?php echo '$'.htmlspecialchars($temp2); ?></span><br>

    <label for="">Yearly Interest Rate:</label>
    <span><?php echo htmlspecialchars($interestRate).'%'; ?></span><br>

    <label for="">Number of Years:</label>
    <span><?php echo htmlspecialchars($numberOfYear); ?></span><br>

    <label for="">Future Value:</label>
    <span><?php echo '$'.htmlspecialchars($temp) ?></span><br>

    <p>This calculation was done on <?php echo $currentDateTime; ?></p>
    </main>
</body>
</html>