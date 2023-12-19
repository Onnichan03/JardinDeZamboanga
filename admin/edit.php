<?php	
	require_once("dbcontroller.php");
	$db_handle = new DBController();

    if (!empty($_POST["submit"])) {
        $query = "UPDATE monte set name = '".$_POST["name"]."', date = '".$_POST["date"]."', date = '".$_POST["reading"]."', totalcubic ='".$_POST["totalcubic"]."', totalamount = '".$_POST["totalamount"]."',
        date_pay = '".$_POST["date_pay"]."', or_number = '".$_POST["or_number"]."' , total_amount = '".$_POST["total_amount"]."', balance = '".$_POST["balance"]."', due = '".$_POST["due"]."' , remarks = '".$_POST["remarks"]."' WHERE id=".$_GET["id"];
        $result = $db_handle->executeQuery($query);
        if (!$result) {
            $massage="Not found";
        }else {
            header("Location:index.php");
        }
    }
    $result = $db_handle->runQuery("SELECT * FROM monte WHERE id='". $_GET["id"]."'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html{
            text-align: center;
        }
    </style>
<title>PHP CRUD with Search and Pagination</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="" name="frmitem" id="frmitem" onclick="return validate();" method="post">
    <div id="mail-status"></div>
    <div>
        <label style="padding: top 20px;">Name</label>
        <span id="name" class="demoInputBox" >
            <input type="text" name="name" class="demoInputBox" id="name" value="<?php echo $result[0]["name"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Date</label>
        <span id="date" class="demoInputBox" >
            <input type="text" name="date" class="demoInputBox" id="date" value="<?php echo $result[0]["date"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Reading</label>
        <span id="reading" class="demoInputBox" >
            <input type="text" name="reading" class="demoInputBox" id="reading" value="<?php echo $result[0]["reading"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Total Cubic</label>
        <span id="totalcubic" class="demoInputBox" >
            <input type="text" name="totalcubic" class="demoInputBox" id="totalcubic" value="<?php echo $result[0]["totalcubic"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Total Amount</label>
        <span id="totalamount" class="demoInputBox" >
            <input type="text" name="totalamount" class="demoInputBox" id="totalamount" value="<?php echo $result[0]["totalamount"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Date Pay</label>
        <span id="date_pay" class="demoInputBox" >
            <input type="text" name="date_pay" class="demoInputBox" id="date_pay" value="<?php echo $result[0]["date_pay"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">OR Number</label>
        <span id="or_number" class="demoInputBox" >
            <input type="text" name="or_number" class="demoInputBox" id="or_number" value="<?php echo $result[0]["or_number"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Total Amount</label>
        <span id="total_amount" class="demoInputBox" >
            <input type="text" name="total_amount" class="demoInputBox" id="total_amount" value="<?php echo $result[0]["total_amount"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Balance</label>
        <span id="balance" class="demoInputBox" >
            <input type="text" name="balance" class="demoInputBox" id="balance " value="<?php echo $result[0]["balance"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Due</label>
        <span id="due" class="demoInputBox" >
        <input type="text" name="due" class="demoInputBox" id="due" value="<?php echo $result[0]["due"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">Remarks</label>
        <span id="remarks" class="demoInputBox" >
            <input type="text" name="remarks" class="demoInputBox" id="remarks" value="<?php echo $result[0]["remarks"]; ?>">
    </div>
    <div>
        <input type="submit" name="submit" id="btnAddAction" value="Save" />
        <a href="index.php" id="btnAddAction">Back</a>
    </div>
</form>
</body>
</html>