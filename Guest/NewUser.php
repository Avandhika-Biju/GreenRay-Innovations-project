 <?php

     ob_start();
     include("../Assets/Connection/Connection.php");
	 include("Head.php");
	 use PHPMailer\PHPMailer\PHPMailer;
	 use PHPMailer\PHPMailer\Exception;
	 
	 if(isset($_POST["btnsubmit"]))
	 {
		 $name=$_POST["txt_name"];
		 $district=$_POST["sel_district"];
		 $place=$_POST["sel_place"];
		 $email=$_POST["txt_email"];
		 $gender=$_POST["btn_gender"];
		 $address=$_POST["txt_address"];
		 $password=$_POST["txt_password"];
		 $contact=$_POST["txt_contact"];
		 
		 $photo=$_FILES["file_photo"]["name"];
		 $temp1=$_FILES["file_photo"]["tmp_name"];
		 move_uploaded_file($temp1,"../Assets/Files/Userphoto/".$photo);
		 
		 
		 $proof=$_FILES["file_proof"]["name"];
		 $temp2=$_FILES["file_proof"]["tmp_name"];
		 move_uploaded_file($temp2,"../Assets/Files/Userproof/".$proof);
		 
		 
		 
		 $insQry="insert into     tbl_newuser(user_name,place_id,user_email,user_gender,user_address,user_contact,user_password,user_photo,user_proof)
		 values('".$name."','".$place."','".$email."','".$gender."','".$address."','".$contact."','".$password."',
		 '".$photo."','".$proof."')";
		 		 
    if($con->query($insQry))
	{
		$message="Record Inserted...";
		
    require '../Assets/phpMail/src/Exception.php';
    require '../Assets/phpMail/src/PHPMailer.php';
    require '../Assets/phpMail/src/SMTP.php';


        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'greenrayinnovations@gmail.com'; // Your gmail
        $mail->Password = 'cmcgtjoynfmdufmf'; // Your gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
  
        $mail->setFrom('greenrayinnovations@gmail.com'); // Your gmail
  
        $mail->addAddress($email);
  
        $mail->isHTML(true);
  
        $mail->Subject = "Successfully Registered";
        $mail->Body = "Hello ".$name.",You are successfully registered in our greenrayinnovations.From this time,your's issues are our own problem too.And also explore our products.Thank you.";
    if($mail->send())
    {
       echo "Sended";
    }
    else
    {
       echo "Failed";
    }
	
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<div class="container" style="background-image: url('../Assets/Template/Company/img/carousel-3.jpg');">
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <table class="table table-bordered" align="center" cellpadding="10" style="color:black">
                        <tr>
                            <td width="78">Name</td>
                            <td>
                                <input required type="text" class="form-control" name="txt_name" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" />
                            </td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>
                                <input type="text" class="form-control" required name="txt_contact" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaining 9 digits with 0-9" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" class="form-control" required name="txt_email" />
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" required name="btn_gender" value="Male" id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="btn_gender" value="Female" id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="btn_gender" value="Others" id="others">
                                    <label class="form-check-label" for="others">Others</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><textarea class="form-control" name="txt_address" required></textarea></td>
                        </tr>
                        <tr>
              <td>District</td>
              <td>
                <select class="form-control" name="sel_district" id="sel_district" onChange="getplace(this.value)">
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
                            <td>Photo</td>
                            <td>
                                <label>
                                    <input type="file" class="form-control-file" name="file_photo" id="file_photo">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Proof</td>
                            <td>
                                <label>
                                    <input type="file" class="form-control-file" name="file_proof" id="file_proof">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="txt_password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-primary" name="btnsubmit" id="btnsubmit">Register</button>
                                <button type="button" class="btn btn-secondary" name="btncancel" id="btncancel">Cancel</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>
<?php  
include("Foot.php");
ob_flush();
?>
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