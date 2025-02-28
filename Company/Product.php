<?php

 include("../Assets/Connection/Connection.php");
 include("SessionValidated.php");
 include("Head.php");
 	if(isset($_GET['did']))
	{
		$delqry1="delete from tbl_product where product_id=".$_GET['did'];
		if($con->query($delqry1))
		{
		   ?>
           <script>
		   alert('deleted')
		   </script>
           <?php
         }
         else
			   {
				   ?>
                   <script>
				   alert('failed')
				   </script>
                   <?php
			   }
	}

 $message=" ";
		
		if(isset($_POST["btnsave"]))
		{
			
			$productname=$_POST["txtname"];
			$productrate=$_POST["txtrate"];
			$productdetails=$_POST["txtdetails"];
			$producttype=$_POST["seldrop"];
			$pic=$_FILES["file_photo"]["name"];
			$path=$_FILES["file_photo"]["tmp_name"];
			move_uploaded_file($path,"../Assets/Files/Company/product/".$pic);
			$insQry="insert into tbl_product(product_name,product_rate,product_details,producttype_id,product_image,company_id)
			values('".$productname."','".$productrate."','".$productdetails."','".$producttype."','".$pic."','".$_SESSION["cid"]."')";
			if($con->query($insQry))
			{
				$message="Record Inserted...";
			}
			else
			{
				$message="Insertion Failed...";
			}
			
		}
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<body style="background-image: url(../Assets/Template/Main/img/sols.jpg);">
</style>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <table width="309" height="285"  align="center" cellpadding="10">
            <div class="form-group">
                <label for="txtname"><b>Name</b></label>
                <input type="text" class="form-control" name="txtname" id="txtname" />
            </div>
            <div class="form-group">
                <label for="seldrop"><b>Producttype</b></label>
                <select class="form-control" name="seldrop" id="seldrop">
                    <option value="">----select----</option>
                    <!-- PHP code here -->
                    <?php
	$selpt = "select * from tbl_producttype";
	$respt = $con->query($selpt);
	while($rowpt=$respt->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowpt["producttype_id"]?>"><?php echo $rowpt["producttype_name"]?></option>
        <?php
	}
	?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtrate"><b>Rate</b></label>
                <input type="text" class="form-control" name="txtrate" id="txtrate" />
            </div>
            <div class="form-group">
                <label for="file_photo"><b>Image</b></label>
                <input type="file" class="form-control-file" name="file_photo" id="file_photo">
            </div>
            <div class="form-group">
                <label for="txtdetails"><b>Details</b></label>
                <input type="text" class="form-control" name="txtdetails" id="txtdetails" />
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Submit" />
                <input type="reset" class="btn btn-secondary" name="btncancel" id="btncancel" value="cancel" />
            </div>
        </form>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th>Rate</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
   $selQry="select *from tbl_product dc inner join tbl_producttype c on dc.producttype_id=c.producttype_id";
	  $res=$con->query($selQry);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['product_name'];?></td>
      <td><?php echo $row['product_rate'];?></td>
     
      <td><?php echo $row['product_details'];?></td>
      
      
       <td><a href="Product.php?did=<?php echo $row['product_id']?>">Delete</a>|<a href="Stock.php?did=<?php echo $row['product_id']?>">Stock</a> | <a href="ProductGallery.php?did=<?php echo $row['product_id']?>">Gallery</a>
      <td>&nbsp;</td>
    </tr>
	<?php
	  }
	  ?>
            </tbody>
        </table>
    </div>

    </div>
</body>
</html>


<?php  
include("Foot.php");
ob_flush();
?>