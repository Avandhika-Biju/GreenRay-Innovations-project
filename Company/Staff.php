<?php
$name="";
$staffid=0;
$contact="";
$email="";
$address="";
$district="";
$place="";
$password="";
 include("../Assets/Connection/Connection.php");
 include("SessionValidated.php");
 ob_start();
 include("Head.php");
  if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_staff where staff_id=".$_GET['did'];
	 if($con->query($delQry))
	 {
		 ?>
         <script>
		 alert('Delete')
		 window.Location="Staff.php"
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
		 $name=$_POST["txtname"];
		 $contact=$_POST["txtcontact"];
		 $email=$_POST["txtemail"];
		 $address=$_POST["txtaddress"];
		 $district=$_POST["sel_district"];
		 $place=$_POST["sel_place"];
		 $password=$_POST["txtpassword"];
		 
	 
		 $logo=$_FILES["file_logo"]["name"];
		 $temp1=$_FILES["file_logo"]["tmp_name"];
		 move_uploaded_file($temp1,"../Assets/Files/Userlogo/".$logo);
		 $staff_id=$_POST["txtid"];		 
		
	
		 $insQry="insert into tbl_staff(staff_name,staff_contact,staff_email,staff_address,place_id,staff_logo,
		staff_password,company_id)values('".$name."','".$contact."','".$email."','".$address."','".$place."','".$logo."','".$password."','".$_SESSION["cid"]."')";
		 		 
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
</head>

<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
  </style>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">

  <input type="hidden" name="txtid" />
  <div class="container"  cellpadding="10" style="color:black">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="txtname"><b>Name</b></label>
          <input type="text" class="form-control" name="txtname" id="txtname" />
        </div>
        <div class="form-group">
          <label for="txtcontact"><b>Contact</b></label>
          <input type="text" class="form-control" name="txtcontact" id="txtcontact" />
        </div>
        <div class="form-group">
          <label for="txtemail"><b>Email</b></label>
          <input type="text" class="form-control" name="txtemail" id="txtemail" />
        </div>
        <div class="form-group">
          <label for="txtaddress"><b>Address</b></label>
          <textarea class="form-control" name="txtaddress" id="txtaddress" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="sel_district"><b>District</b></label>
          <select class="form-control" name="sel_district" id="sel_district" onChange="getplace(this.value)">
            <option><b>---Select---</b></option>
            <?php
                   $selplace="select * from tbl_district";
                   $resplace=$con->query($selplace);
                   while($rowcat=$resplace->fetch_assoc())
                   {
                     ?>
                     <option value="<?php echo $rowcat["district_id"]?>"><?php echo $rowcat["district_name"]?></option>
                     <?php
                   }
                  ?>
            <!-- PHP code for populating options goes here -->
          </select>
        </div>
        <div class="form-group">
          <label for="sel_place"><b>Place</b></label>
          <select class="form-control" name="sel_place" id="sel_place">
            <option value=""><b>---Select---</b></option>
            
          </select>
        </div>
        <div class="form-group">
          <label for="file_logo"><b>Logo</b></label>
          <input type="file" name="file_logo" class="form-control-file" id="file_logo">
        </div>
        <div class="form-group">
          <label for="txtpassword"><b>Password</b></label>
          <input type="password" class="form-control" name="txtpassword" id="txtpassword" />
        </div>
        <button type="submit" name="btnsave" id="btnsave" class="btn btn-primary">Save</button>
        <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </div>
</form>
<table class="table">
  <thead class="thead-dark"  cellpadding="10" style="color:black">
    <tr>
     <b><th scope="col">SI NO</th></b>
      <b><th scope="col">Name</th></b>
      <b><th scope="col">Action</th></b>
    </tr>
  </thead>
  <tbody>
    <?php
    $seldta="select *  from tbl_staff where company_id='".$_SESSION["cid"]."'";
    $datas=$con->query($seldta);
    $i=0;
    while($rsdata=$datas->fetch_assoc())
    {
      $i++;
    ?>
    <tr>
    
      <td><?php echo $i?></td>
      <td><?php echo $rsdata['staff_name'] ?></td>
     <td><a href="Staff.php?did=<?php echo $row['staff_id']?>"class="btn btn-danger">Delete</a></td>
     </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getplace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
</html>
<?php  
include("Foot.php");
ob_flush();
?>