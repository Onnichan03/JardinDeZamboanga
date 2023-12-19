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
    background-color: #b6b6c4;
    margin: 0;
    padding: 0;
}

.payment-container {
    border: 1px solid #ccc;
    padding: 20px;
    max-width: 700px;
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
    width: 380px;
    height: 350px;
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
.next-button {
    display: block;
    width: 230px; /* Set the desired width */
    height: 50px; /* Set the desired height */
    margin: 20px auto; /* Center the button */
}

        .gcash-logo {
    max-width: 200px; /* Adjust the max-width as needed */
    margin: 20px auto;
}

    </style>
</head>
<body>
    <div class="payment-container">
    <h1><img src="gcashlogo.png" alt="sdsd" class="gcash-logo"></h1>
    <p>SCAN THIS QR CODE AND MAKE PAYMENT</p>
        <img src="gcash.jpg" alt="" class="qr-code">

        <!-- "Next" button to toggle the screenshot submission form -->
        <button class="next-button" id="toggle-form">Done</button>


        <script>
            document.getElementById("toggle-form").addEventListener("click", function() {
                window.location.href = 'bhome.php';
            });
        </script>
    </div>
</body>
</html>