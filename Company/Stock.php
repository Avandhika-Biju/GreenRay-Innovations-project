<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");
$stock=0;
	if(isset($_POST["btnsave"]))
	{
		$sel="select * from tbl_productstock where product_id='".$_GET['did']."'";
		$row=$con->query($sel);
		if($res=$row->fetch_assoc())
		{
			$stock=$res["stock_quantity"];
			$newstock=$stock+$_POST["txtquan"];
			$update="update tbl_productstock set stock_quantity='".$newstock."' where product_id=".$_GET['did'];
			$con->query($update);
		}
	}
		
	else
	{
		$insert="insert into tbl_productstock(stock_quantity,product_id)values('".$stock."','".$_GET['did']."')";
		$con->query($insert);
	    {
	     $message="Recored Inserted...";
	  
		}
			 $message="Insertion Failed...";
		 }
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
  </style>
<?php
include("../Assets/Connection/Connection.php");
 if(isset($_POST['btnsave']))
 {
	 $sel="select * from tbl_productstock where product_id='".$_GET["did"]."'";
	 $data=$con->query($sel);
	 if($row=$data->fetch_assoc())
	 {
		 $stock=$row["stock_quantity"];
		 $new=$stock+$_POST["txtquan"];
		 $update="update tbl_productstock set stock_quantity='".$new."' where product_id='".$_GET["did"]."'";
		 if($con->query($update))
		 {
		 ?>
		<script>
			alert("Updated");
			header("location:Product.php");
		</script>
    <?php
		 
		 
	 }
	}
	 else
	 {
		 $ins="insert into tbl_productstock(product_oid,stock_quantity)values('".$_GET["did"]."','".$_POST["txtquan"]."')";
		 $con->query($ins);
		 header("location:Product.php");
	 }
 }
 ?>
 
<form id="form1" name="form1" method="post" action="">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <label for="txtquan">Stock Quantity</label>
          <input type="text" class="form-control" name="txtquan" id="txtquan" />
        </div>
        <div class="text-center">
          <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary">Save</button>
          <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>
<br><br><br><br><br><br><br><br><br><br>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



	   </body>
	   </html>
	   <?php  
include("Foot.php");
ob_flush();
?>