
<?php


     include("../Assets/Connection/Connection.php");
	 include("SessionValidated.php");
	 include("Head.php");
	
	if(isset($_POST["btnsave"]))
	{
		$categoryname=$_POST["txtcategory"];
		
	        $insQry="insert into tbl_category(category_name) values('".$categoryname."')";
			if($con->query($insQry))
	        {
			      $message="Record Inserted...";
	        
			}
		    else
		    {
			      $message="Inserted Failed...";
		    }
		
	  }
	  
	  if(isset($_GET['did']))
	      {
		      $delQry="delete from tbl_category where category_id='".$_GET['did']."'";
		      if($con->query($delQry))
		      {
	?>
                 <script>
	             alert('Deleted')
		         window.location="Category.php"
	             </script>
    <?php
		}
		else
		   {
     ?>
                 <script>
		         alert('Failed')
		         </script>
      <?php
	}
	}
 


?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">

            <div class="form-group">
                <label for="txtcategory">Category Name</label>
                <input type="text" name="txtcategory" id="txtcategory" class="form-control" />
            </div>

            <div class="text-center">
                <input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary m-2" />
                <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary m-2" />
            </div>

        </form>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>CategoryName</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selQry = "select * from tbl_category";
                    $res = $con->query($selQry);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><a href="Category.php?did=<?php echo $row['category_id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Link Bootstrap JS file (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

In this modified version, the Bootstrap classes such as container, form-group, form-control, btn, btn-primary, btn-secondary, table, and mt-5 are applied to the corresponding elements to give the form a Bootstrap style. Make sure to replace the PHP code in the table body with your actual PHP code.

 <?php
  include("Foot.php");
?>






