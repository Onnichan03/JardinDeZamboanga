<?php
include("../Functions/functions.php");

// Check if the 'ref' parameter is set in the URL
if (isset($_GET['ref'])) {
    $referenceNumber = $_GET['ref'];

    // Retrieve order details from the database using the reference number
    $query = "SELECT * FROM orders WHERE referencenumber = '$referenceNumber'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Fetch and display order details
        $orderDetails = mysqli_fetch_assoc($result);
        // You can customize the display of order details as per your database schema
        $product_title = $orderDetails['product_title'];
        $quantity = $orderDetails['qty'];
        $totalAmount = $orderDetails['total'];
        $deliveryMethod = $orderDetails['delivery'];
        // Add other details as needed

        // Display the confirmation message
        echo "<h2>Order Confirmation</h2>";
        echo "<p>Thank you for your order! Your reference number is: $referenceNumber</p>";
        echo "<p>Product Name: $product_title</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Total Amount: $totalAmount</p>";
        echo "<p>Delivery Method: $deliveryMethod</p>";
        // Add other order details as needed
    } else {
        // Handle the case where the query fails
        echo "<p>Error retrieving order details. Please contact support.</p>";
    }
} else {
    // Handle the case where the 'ref' parameter is not set
    echo "<p>Invalid reference number. Please check your order confirmation link.</p>";
}
?>

<!-- Add HTML, styling, and other content for your confirmation page as needed -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Add your CSS styles or include a stylesheet here -->
</head>

<body>
    <!-- Add your HTML content here -->
    <p>This is the order confirmation page content.</p>
</body>

</html>