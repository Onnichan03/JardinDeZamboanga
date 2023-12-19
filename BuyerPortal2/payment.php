<?php
session_start();
error_reporting(E_ALL);
include('../Includes/db.php'); // Include the database configuration file

if ($dbh) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["screenshot"]) && $_FILES["screenshot"]["error"] == UPLOAD_ERR_OK) {
        // Handle screenshot submission
        $upload_dir = "admin/screenshot/"; // Specify the subfolder
        $target_file = $upload_dir . basename($_FILES["screenshot"]["name"]);

        // Get the customer's name from the form
        $customer_name = $_POST["customer_name"];

        // Retrieve the user's full name from the database based on the session data
        $user_email = $_SESSION['login'];
        $sql = "SELECT FullName FROM tblusers WHERE EmailId = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $user_email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $full_name = $user['FullName'];

            // Handle screenshot submission
            if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target_file)) {
                // Insert data into the database
                $file_name = basename($_FILES["screenshot"]["name"]);
                $sql = "INSERT INTO screenshot_submissions (Pangalan, file_name, username) VALUES (?, ?, ?)";

                $stmt = $dbh->prepare($sql);
                $stmt->execute([$customer_name, $file_name, $full_name]);

                if ($stmt) {
                    // Payment successful, insert into the database
                    // ...

                    // Redirect to success page
                    header("Location: success.php");
                    exit; // Make sure to exit to prevent further execution
                } else {
                    echo "Error inserting data into the database: " . print_r($stmt->errorInfo(), true);
                }
            } else {
                echo "Error uploading the screenshot.";
            }
        } else {
            echo "User not found in the database.";
        }
    } else {
        echo '<p style="color: #fff; font-size: 18px;">Please Pay scan the GCASH QR Code and submit a screenshot for proof.</p>';
    }
} else {
    echo "Database connection error. Please check your database configuration.";
}

if (isset($_POST['quantity_price'], $_POST['payment_option'])) {
    $quantity_price = $_POST['quantity_price'];
    $payment_option = $_POST['payment_option'];

    // Process payment based on $quantity_price and $payment_option
    // You can add your payment processing logic here
    echo '<p style="color: #fff; font-size: 18px;">Processing PHP ' . htmlentities($quantity_price) . ' payment via ' . htmlentities($payment_option) . '...</p>';

    // Add your payment processing logic here
} else {
    echo "Missing required parameters.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    text-align: center;
    background-color: #0000FF;
    margin: 0;
    padding: 0;
}

.payment-container {
    border: 1px solid #ccc;
    padding: 20px;
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.qr-code {
    width: 200px;
    height: 200px;
    margin: 20px auto;
    border: 1px solid #000;
    border-radius: 4px;
}

p {
    font-size: 16px;
    margin-bottom: 20px;
}

button {
    padding: 10px 20px;
    background-color: #007acc;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #005fa5;
}

#screenshot-form {
    display: none;
}

form label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

form button[type="submit"] {
    margin-top: 10px;
    background-color: #007acc;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

form button[type="submit"]:hover {
    background-color: #005fa5;
}
    </style>
</head>
<body>
    <div class="payment-container">
    <h1><img src="images/gcashh.jpg" alt="sdsd" class="gcash-logo"></h1>
        <img src="images/gcash.jpg" alt="" class="qr-code">
        <p>PRICE:PHP <?php echo htmlentities($quantity_price); ?></p>

        <!-- "Next" button to toggle the screenshot submission form -->
        <button class="next-button" id="toggle-form">Next</button>

        <!-- Add a form field for customer name -->
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="screenshot-form" style="display: none;">
            <label for="customer_name">Your GCASH Name:</label>
            <input type="text" name="customer_name" id="customer_name" required>
            <label for="screenshot">Upload Screenshot For Proof:</label>
            <input type="file" name="screenshot" id="screenshot" required>
            <button type="submit">Submit</button>
        </form>

        <script>
            // Toggle the screenshot submission form when "Next" button is clicked
            document.getElementById("toggle-form").addEventListener("click", function() {
                document.getElementById("screenshot-form").style.display = "block";
            });
        </script>
        <script>
    // Toggle the screenshot submission form when "Next" button is clicked
    document.getElementById("toggle-form").addEventListener("click", function() {
        // Hide the "Next" button
        document.getElementById("toggle-form").style.display = "none";
        // Display the screenshot submission form
        document.getElementById("screenshot-form").style.display = "block";
    });
</script>
    </div>
</body>
</html>