<?php	
	require_once("dbcontroller.php");
	$db_handle = new DBController();

    if (!empty($_POST["submit"])) {
        $query = "INSERT INTO monte(name, date, reading, totalcubic, totalamount, date_pay, or_number, total_amount, balance, due, remarks) VALUES ('".$_POST["name"]."', 
        '".$_POST["date"]."', '".$_POST["reading"]."', '".$_POST["totalcubic"]."', '".$_POST["totalamount"]."', '".$_POST["date_pay"]."', '".$_POST["or_number"]."', '".$_POST["total_amount"]."', '".$_POST["balance"]."', '".$_POST["due"]."', '".$_POST["remarks"]."')";
        $result = $db_handle->executeQuery($query);
        if (!$result) {
            $massage="Not found";
        }else {
            header("Location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP CRUD with Search and Pagination</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    html{
        align-content: center;
        align-items: center;
        align-self: center;
        text-align: center;
    }
</style>
<body style="align-content: center;">
    <form action="" name="frmitem" id="frmitem" onclick="return validate();" method="post">
    <div id="mail-status"></div>
    <div>
        <label style="padding: top 20px;">Name</label>
        <span id="name-info" class="demoInputBox" require>
            <input type="text" name="name" class="demoInputBox" id="name">
    </div>
    <div>
        <label style="padding: top 20px;">Date</label>
        <span id="date" class="demoInputBox" require>
            <input type="text" name="date" class="demoInputBox" id="date">
    </div>
    <div>
        <label style="padding: top 20px;">Reading</label>
        <span id="reading" class="demoInputBox" require>
            <input type="text" name="reading" class="demoInputBox" id="reading">
    </div>
    <div>
        <label style="padding: top 20px;">Total Cubic</label>
        <span id="totalcubic" class="demoInputBox" require>
            <input type="text" name="totalcubic" class="demoInputBox" id="totalcubic">
    </div>
    <div>
        <label style="padding: top 20px;">Total Amount</label>
        <span id="totalamount" class="demoInputBox" require>
        <input type="text" name="totalamount" class="demoInputBox" id="totalamount">
    </div>
     <div>
        <label style="padding: top 20px;">Date Pay</label>
        <span id="date_pay" class="demoInputBox" require>
        <input type="text" name="date_pay" class="demoInputBox" id="date_pay">
    </div>
     <div>
        <label style="padding: top 20px;">OR Number</label>
        <span id="or_number" class="demoInputBox" require>
        <input type="text" name="or_number" class="demoInputBox" id="or_number">
    </div>
     <div>
        <label style="padding: top 20px;">Total Amount</label>
        <span id="total_amount" class="demoInputBox" require>
        <input type="text" name="total_amount" class="demoInputBox" id="total_amount">
    </div>
     <div>
        <label style="padding: top 20px;">Balance</label>
        <span id="balance" class="demoInputBox" require>
        <input type="text" name="balance" class="demoInputBox" id="balance">
    </div>
     <div>
        <label style="padding: top 20px;">Due</label>
        <span id="due" class="demoInputBox" require>
        <input type="text" name="due" class="demoInputBox" id="due">
    </div>
     <div>
        <label style="padding: top 20px;">Remarks</label>
        <span id="remarks" class="demoInputBox" require>
        <input type="text" name="remarks" class="demoInputBox" id="remarks">
    </div>
    <div>
        <input type="submit" name="submit" id="btnAddAction" value="Add" />
        <a href="index.php" id="btnAddAction">Back</a>
    </div>
</form>
</body>
</html>