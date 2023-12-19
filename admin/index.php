<?php
	require_once("perpage.php");	
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$name = "";
	$or_number = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("name","or_number");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "name":
						$name = $v;
						$queryCondition .= "name LIKE '" . $v . "%'";
						break;
					case "or_number":
						$or_number = $v;
						$queryCondition .= "or_number LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM monte " . $queryCondition;
	$href = 'index.php';					
		
	$perPage = 10; //according to your wishes
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
	}
?>
<html>
	<head>
	<title>Admin Monte Vere</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	<style>
		html{
			height: auto;
			width: auto;
			zoom: 90%;
			text-align: center;
			align-content: center;
		}
		form{
			margin-top: 60px;
		}
		h2{
			text-align: center;
			margin-bottom: 40px;
			border: 20px;
			color: green;
			
		}
	</style>
	<body>
		
			</div>
    <div id="items-grid">      

			<form name="frmSearch" method="post" action="index.php">
				<h2>Admin Monte Verde</h2>
			<div class="search-box">
			<p>
				<input type="text" placeholder="Name" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>"	/><input type="text" placeholder="OR Number" name="search[or_number]" class="demoInputBox" value="<?php echo $or_number; ?>"	/><input type="submit" name="go" class="btnSearch" value="Search"><input type="reset" class="btnSearch" value="Reset" onclick="window.location='index.php'"><a id="btnAddAction" href="add.php">Add New</a>
				<a class="col-lg-9" style="font-size: 20px; text-decoration: none;" href="logout.php">Logout</a>
			</p>		
		</div>
			
			<table cellpadding="10" cellspacing="1">
        <thead>
					<tr>
          <th><strong>Name</strong></th>
          <th><strong>Date</strong></th>          
          <th><strong>Reading</strong></th>
					<th><strong>Total Cubic</strong></th>
					<th><strong>Total Amount</strong></th>
					<th><strong>Date Pay</strong></th>
					<th><strong>Or Number</strong></th>
					<th><strong>Total Amount</strong></th>
					<th><strong>Balance</strong></th>
					<th><strong>Due</strong></th>
					<th><strong>Remarks</strong></th>
					<th><strong>Action</strong></th>
					
					</tr>
				</thead>
				<tbody>
					<?php
					if(!empty($result)) {
						foreach($result as $k=>$v) {
						  if(is_numeric($k)) {
					?>
          <tr>
					<td><?php echo $result[$k]["name"]; ?></td>
          			<td><?php echo $result[$k]["date"]; ?></td>
					<td><?php echo $result[$k]["reading"]; ?></td>
					<td><?php echo $result[$k]["totalcubic"]; ?></td>
					<td><?php echo $result[$k]["totalamount"]; ?></td> 
					<td><?php echo $result[$k]["date_pay"]; ?></td> 
					<td><?php echo $result[$k]["or_number"]; ?></td> 
					<td><?php echo $result[$k]["total_amount"]; ?></td> 
					<td><?php echo $result[$k]["balance"]; ?></td> 
					<td><?php echo $result[$k]["due"]; ?></td> 
					<td><?php echo $result[$k]["remarks"]; ?></td> 
					<td>
					<a class="btnEditAction" href="edit.php?id=<?php echo $result[$k]["id"]; ?>">Edit</a> 
					<a  onclick="return confirm('Are you sure?')" class="btnDeleteAction" href="delete.php?action=delete&id=<?php echo $result[$k]["id"]; ?>">Delete</a>
					</td>
					</tr>
					<?php
						  }
					   }
                    }
					if(isset($result["perpage"])) {
					?>
					<tr>
					<td colspan="6" align=right> <?php echo $result["perpage"]; ?></td>
					</tr>
					<?php } ?>
				<tbody>
			</table>
			</form>	
		</div>
		
	</body>
</html>