<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
$stock=0;
	if(isset($_POST["btnsave"]))
	{
		$sel="select * from tbl_productstock where product_id='".$_GET['did']."'";
		$row=$con->query($sel);
		if($res=$row->fetch_assoc())
		{
			$stock=$res["productstock_quantity"];
			$newstock=$stock+$_POST["txtquan"];
			$update="update tbl_productstock set productstock_quatity='".$newstock."' where product_id=".$GET['did'];
			$con->query($update);
		}
	}
		
	else
	{
		$insert="insert into tbl_productstock(stock_quantity,product_id)values('".$stock."','".$_GET['did']."')";
		
	}
		 if($con->query($insQry))
		 {
			 $message="Recored Inserted...";
			 
		 }
		 else
		 {
			 $message="Insertion Failed...";
		 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
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
		 $con->query($update);
		 header("location:Product.php");
		 
	 }
	 else
	 {
		 $ins="insert into tbl_productstock(product_oid,stock_quantity)values('".$_GET["did"]."','".$_POST["txtquan"]."')";
		 $con->query($ins);
		 header("location:Product.php");
	 }
 }
 ?>
  <div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
      <table class="table" border="1">
        <tr>
          <td>Stock Quantity</td>
          <td><label for="txtquan"></label>
            <input type="text" name="txtquan" id="txtquan" class="form-control" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btnsave" id="btnsave" value="Save" class="btn btn-primary" />
            <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary" />
          </td>
        </tr>
      </table>
    </form>
  </div>
 
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>