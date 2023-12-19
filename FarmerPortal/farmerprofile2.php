<?php
// Include necessary files and start session
include("../Includes/db.php");
session_start();

// Fetch existing user data from the database
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "SELECT * FROM farmerregistration WHERE farmer_phone = '$sessphonenumber'";
$run_query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($run_query);

// Set variables with fetched data
$name = $row['farmer_name'];
$phone = $row['farmer_phone'];
$address = $row['farmer_address'];
$state = $row['farmer_state'];
$district = $row['farmer_district'];

// Check if the form is submitted for updating profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated values from the form
    $newName = $_POST['new_name'];
    $newAddress = $_POST['new_address'];
    $newPhone = $_POST['new_phone'];
    $newState = $_POST['new_state'];
    $newDistrict = $_POST['new_district'];

    // Update the database with new values
    $updateSql = "UPDATE farmerregistration SET farmer_name = '$newName', farmer_address = '$newAddress', farmer_state = '$newState', farmer_district = '$newDistrict' WHERE farmer_phone = '$sessphonenumber'";
    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        // Update successful
        // Redirect or display a success message
        header("Location: profile.php"); // Redirect to profile page after update
        exit();
    } else {
        // Update failed
        // Handle the error or display a failure message
        $error = "Failed to update profile. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your meta tags and CSS/JS includes) ... -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
</head>
<body><style>
     #staticEmail{
        text-align:center;
         border-style:solid;
        border-color:black;
        /* background-color:#ff5500;*/
        width:30%;
        font-size:20px; 
        color:black; 
    } 
    .text {
        background-color: Darkgreen;
        color: lightgreen;
        font-size:18px;
    }
    input{
        text-align:center;
        /* border-style:solid;
        border-color:black; */
        background-color:#ff5500;
        width:50%;
        color:red;
    }
    .text {
        min-width: 180px !important;
        display: inline-block !important
    }

    .inp {
        width: 10%;
    }

    .s {
        width: 50%;
        margin-left: 25%;
        margin-right: 25%;
        margin-top:0%;
        margin-bottom:4%;
    
    }
    
    @media only screen and (min-device-width:320px) and (max-device-width:480px) {
    .s {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
        }
        .text {
        min-width: 150px !important;
        display: inline-block !important
    }}
    </style>
    <div class="container">
        <!-- Your profile update form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form">
                <!-- Name input -->
                <div class="text-center"><h2><b>Your Profile</h2></b></div>
                <div class="input-group mt-4 s">
                    <!-- ... Your existing HTML for name input ... -->
                    <div class="input-group-prepend ">
                    <span class="input-group-text text  " id="inputGroup-sizing-default" ><i class="fas fa-user mr-2"></i>Full name</span>
                </div>
                    <input type="text" name="new_name" class="form-control-plaintext border border-dark" value="<?php echo $name; ?>">
                </div>
                <div class="input-group mt-4 s">
                    <!-- ... Your existing HTML for name input ... -->
                    <div class="input-group-prepend ">
                    <span class="input-group-text text  " id="inputGroup-sizing-default" ><i class="fas fa-user mr-2"></i>Phonenumber</span>
                </div>
                    <input type="text" name="new_phone" class="form-control-plaintext border border-dark" value="<?php echo $phone; ?>">
                </div>
                <div class="input-group mt-4 s">
                    <!-- ... Your existing HTML for name input ... -->
                    <div class="input-group-prepend ">
                    <span class="input-group-text text  " id="inputGroup-sizing-default" ><i class="fas fa-user mr-2"></i>Address</span>
                </div>
                    <input type="text" name="new_address" class="form-control-plaintext border border-dark" value="<?php echo $address; ?>">
                </div>
                <div class="input-group mt-4 s">
                    <!-- ... Your existing HTML for name input ... -->
                    <div class="input-group-prepend ">
                    <span class="input-group-text text  " id="inputGroup-sizing-default" ><i class="fas fa-user mr-2"></i>City</span>
                </div>
                    <input type="text" name="new_phone" class="form-control-plaintext border border-dark" value="<?php echo $state; ?>">
                </div>

                <!-- Other input fields (Address, State, District) -->
                <!-- ... Your existing HTML for other input fields ... -->

                <!-- Submit button -->
                <button type="submit" class="btn text-center d-flex mx-auto btn-lg" style="background-color: darkgreen; color: lightgreen">Confirm Edit Profile</button>
            </div>
        </form>
    </div>
</body>
</html>
