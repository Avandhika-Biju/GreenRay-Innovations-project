<?php


     include("../Assets/Connection/Connection.php");
     include("Head.php");
	 
	 
	 if(isset($_POST["Register"]))
	 {
		 $name=$_POST["txt_name"];
		 $email=$_POST["txtemail"];
		 $contact=$_POST["txtcontact"];
		 $address=$_POST["txtaddress"];
		 $district=$_POST["sel_district"];
		 $place=$_POST["sel_place"];
		 $password=$_POST["txt_pass"];
		 

		 
		 
		 $photo=$_FILES["file_logo"]["name"];
		 $temp1=$_FILES["file_logo"]["tmp_name"];
		 move_uploaded_file($temp1,"../Assets/Files/Userlogo/".$logo);
		 
		 
		 $proof=$_FILES["file_proof"]["name"];
		 $temp2=$_FILES["file_proof"]["tmp_name"];
		 move_uploaded_file($temp2,"../Assets/Files/Userproof/".$proof);
		 
		 
		 
		 $insQry="insert into tbl_company(company_name,company_contact,company_email,company_address,company_logo,
		 company_proof,company_password,place_id)
		 values('".$name."','".$contact."','".$email."','".$address."','".$photo."','".$proof."',
		 '".$password."','".$_POST["sel_place"]."')";
		 echo $insQry;		 
    if($con->query($insQry))
	{
		?>
        <script>
		window.location="Company.php";
        </script>
        <?php
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
<title>Company</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<div class="container" style="background-image: url('../Assets/Template/Company/img/carousel-3.jpg');">
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <table class="table table-bordered" align="center" cellpadding="10" style="color:black">
            <tr>
              <td>Name</td>
              <td><input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input type="text" class="form-control" name="txtemail" id="txtemail" /></td>
            </tr>
            <tr>
              <td>Contact</td>
              <td><input type="text" class="form-control" name="txtcontact" id="txtcontact" /></td> 
                
            </tr>
            <tr>
              <td>Address</td>
              <td><textarea class="form-control" name="txtaddress" id="txtaddress" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
              <td>District</td>
              <td>
                <select class="form-control" name="seldistrict" id="seldistrict" onChange="getplace(this.value)">
                  <option value="">---Select---</option>
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
                </select>
              </td>
            </tr>
            <tr>
              <td>Place</td>
              <td>
                <select class="form-control" name="sel_place" id="sel_place">
                  <option value="">---Select---</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Logo</td>
              <td><input type="file" name="file_logo" id="file_logo" class="form-control-file"></td>
            </tr>
            <tr>
              <td>Proof</td>
              <td><input type="file" name="file_proof" id="file_proof" class="form-control-file"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" /></td>
            </tr>
            <tr>
              <td>Confirm Password</td>
              <td><input type="password" class="form-control" name="txtconfirmpass" id="txtconfirmpass" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="Register" id="Register" value="Submit" /></td>
            </tr>
          </table>
        </div>
      </div>
    </form>
  </div>
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