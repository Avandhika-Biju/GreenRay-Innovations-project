 <?php
$producttypename="";
$producttypeid=0;
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
//include("Head");
 	if(isset($_GET['did']))
	{
		$delqry1="delete from tbl_product where product_id=".$_GET['did'];
		if($con->query($delqry1))
	 {
		 ?>
         <script>
		 alert('Delete')
		 window.Location="ProductType.php"
		 </script>
         <?php
	 }
	 else{
		 ?>
         <script>
		 alert('Failed')
		 </script>
         <?php
	 }
 }
 $message="";
 if(isset($_POST["btnsave"]))
 {
	 $producttypename=$_POST["txtprodtype"];
	 $producttype_id=$_POST["txtprodtypeid"];
	 if($producttype_id==0)
	 {
		 $insQry="insert into tbl_producttype(producttype_name)values('".$producttypename."')";
		 if($con->query($insQry))
		 {
			 $message="Recored Inserted...";
			 
		 }
		 else
		 {
			 $message="Insertion Failed...";
		 }
		 
	 }
 
 }

	 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container" style="background-image: url('../Assets/Template/Main/img/profile-picture.jpg');">
<div class="container mt-4 col-md-6">
<div align="right">
    <a href="HomePage.php"class="btn btn-primary">BACK TO HOMEPAGE</a>
        </div>
        <br><br>
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered" cellpadding="10" style="color:black">
                <tr>
                    <td>Product Type</td>
                    <td>
                        <input type="text" name="txtprodtype" id="txtprodtype" value="<?php echo $producttypename ?>" class="form-control" />
                        <input type="hidden" name="txtprodtypeid" id="txtprodtype" value="<?php echo $producttypeid ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsave" id="btnsave" value="Save" class="btn btn-primary" />
                        <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>
            <?php echo $message ?>
        </form>

        <table class="table mt-5">
            <tr>
                <td>SI No</td>
                <td>Type</td>
                <td>Action</td>
            </tr>
            <?php
            $select = "select * from tbl_producttype";
            $res = $con->query($select);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['producttype_name']; ?></td>
                    <td><a href="ProductType.php?did=<?php echo $row['producttype_id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
//  include("Foot.php");
?>