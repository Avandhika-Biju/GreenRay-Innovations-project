<?php
 include("../Assets/Connection/Connection.php");
 include("SessionValidated.php");
 //include("Head");
 	if(isset($_GET['did']))
	{
		$delqry1="delete from tbl_place where place_id=".$_GET['did'];
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
		
		if(isset($_POST["btnsub"]))
		{
			
			$placename=$_POST["txtname"];
			$placepincode=$_POST["txtpin"];
			$district=$_POST["sel_district"];
			$insQry="insert into tbl_place(place_name,place_pincode,district_id)values('".$placename."','".$placepincode."','".$district."')";
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
<div class="container mt-4 col-md-6">
<div align="right">
                <a href="HomePage.php"class="btn btn-primary">BACK TO HOMEPAGE</a>
                                             </div>
        <br>
</style>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1" align="center">
	<tr>
    <td>District</td>
    <td><select name="sel_district">
    <option value="">----select----</option>
    <?php
	$selDis = "select * from tbl_district";
	$resDis = $con->query($selDis);
	while($rowDis=$resDis->fetch_assoc())
	{
		?>
		<option value="<?php echo $rowDis["district_id"]?>"><?php echo $rowDis["district_name"]?></option>
        <?php
	}
	?>
    </select>
    </td>
    </tr>
  <tr>
    <td>Placename:</td>
    <td><label for="txtname"></label>
    <input type="text" name="txtname" id="txtname" /></td>
  </tr>
  <tr>
    <td>Pincode:</td>
    <td><label for="txtpin"></label>
    <input type="text" name="txtpin" id="txtpin" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsub" id="btnsub" value="Submit" />
      <input type="reset" name="btncanc" id="btncanc" value="cancel" /></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><?php echo $message ?><td>
  </tr>
</table>

<br /><br /><br />
<table width="200" border="1" align="center">
  <tr>
    <td>SI.no</td>
    <td>Placename</td>
    <td>Pincode</td>
    <td>district name</td>
    <td>Action</td>
  </tr>
  <?php
   $selQry="select *from tbl_place fc inner join tbl_district c on fc.district_id=c.district_id";
	  $res=$con->query($selQry);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
    
    <tr>
      <td height="65"><?php echo $i?></td>
      <td><?php echo $row['place_name'];?></td>
      <td><?php echo $row['place_pincode'];?></td>
      <td><?php echo $row['district_name'];?></td>
      
       <td><a href="place.php?did=<?php echo $row['place_id']?>">Delete</a>
      <td>&nbsp;</td>
    </tr>
	<?php
	  }
	  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </form>
<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
  </div>
</html>
<?php
//  include("Foot.php");
?>

