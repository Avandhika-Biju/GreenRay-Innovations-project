<?php
ob_start();
$districtname="";
$districtid="0";
     include("../Assets/Connection/Connection.php");
	 include("Head.php");
	 include("SessionValidated.php");
           
          if(isset($_GET['did']))
          {
             $delQry="delete from tbl_district where district_id=".$_GET['did'];
             if($con->query($delQry))                                                       
             {                                                       
                   ?>
          <script>
		            alert('Deleted')
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
		$districtname=$_POST["txtdist"];
		$district_id=$_POST["txtid"];
		if($district_id==0)
		{
			$insQry="insert into tbl_district (district_name)value('".$districtname."')";
			if($con->query($insQry))
	{
			$message="Record Inserted...";
		}
		else
		{
			$message="Inserted Failed...";
		}
		
	}
	else
	{
	$upQry="update tbl_district set district_name='".$districtname."' where district_id=".$district_id;
		if($con->query($upQry))
		{
			?>
            <script>
			alert("updated")
            window.location="district.php"
           </script> 
		   <?php
		}
		else
		{
			?>
            <script>
			alert("Failed")
			</script>
			<?php
		}
	}
	
	}
	if(isset($_GET['eid']))
	{
		$SelQry="select*from tbl_district where district_id=".$_GET['eid'];
		$resEdit=$con->query($SelQry);
		$rowEdit=$resEdit->fetch_assoc();
		$districtid=$rowEdit['district_id'];
		$districtname=$rowEdit['district_name'];
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<style>
	.text-box {
		padding:10px;
		border:1px white solid;
		border-radius:10px;
		background:transparent;
		color:white;
	}
	tr:hover {
		background:#E6E6E6;
		transition:0.5s;
	}
</style>
<div class="body">
<body>
<br><br><br>
<div class="container mt-4 col-md-6">
<div align="right">
                            <a href="HomePage.php"class="btn btn-primary">BACK TO HOMEPAGE</a>
                                             </div>
        <br>
        

<div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <form id="form1" name="form1" method="post" action="">
                    <input type="hidden" name="txtid" value="<?php echo $districtid ?>" />
                    <table class="table table-bordered" align="center" cellpadding="10"  style="color:white">
                        <tr>
                            <td>District</td>
                            <td><input type="text" value="<?php echo $districtname ?>" class="form-control" name="txtdist" id="txtdist" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="btnsave" id="btnsave" value="save" class="btn btn-primary" />
                                <input type="reset" name="btncancel" id="btncancel" value="cancel" class="btn btn-secondary" />
                            </td>
                        </tr>
                    </table>
                </form>

                <br>

                <table class="table table-bordered" align="center" cellpadding="10" style="color:white">
                    <tr>
                        <td>Sl no</td>
                        <td>Districtname</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    $selQry = "select * from tbl_district";
                    $res = $con->query($selQry);
                    $i = 0;
                    while ($row = $res->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['district_name'] ?></td>
                            <td>
                                <a href="District.php?did=<?php echo $row['district_id'] ?>" class="btn btn-danger">Delete</a>
                                <a href="District.php?eid=<?php echo $row['district_id'] ?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
include("Foot.php");
?>