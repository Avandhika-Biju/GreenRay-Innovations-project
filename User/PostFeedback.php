<?php
   include("SessionValidation.php");
   include("../Assets/Connection/Connection.php");
   
   ob_start();
   include("Head.php");
  
         if(isset($_POST["btn_submit"]))
          {
 
             $fcontent=$_POST["txt_feedbackdetails"]; 
             $insQry="insert into tbl_feedback(feedback_content,user_id,feedback_date)values('".$fcontent."','".$_SESSION["uid"]."',curdate())";
         if($con->query($insQry))
{
 ?>
           <script>
         alert("feedback Registered");
         window.location="PostFeedback.php";
           </script>  
    
    <?php
          }
          else
              {
    ?>
     <script>
     alert("Failed to register feedback");
        window.location="PostFeedback.php";
           </script>
<?php 
             }
   }


?>
<br><br>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Feedback</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<div align="center">
<body>
<p><a href="Homepage.php">Home</a></p>

<br><br>
<div class="container mt-5" style="background-image: url('../Assets/Template/Main/img/sol-tec1.jpg');">
        <form id="form1" name="form1" method="post" action="">
            <div class="text-center">
                <table class="table" width="200" border="1" cellpadding="10" style="color:white">
                    <tr>
                        <td>Feedback</td>
                        <td><textarea name="txt_feedbackdetails" id="txt_feedbackdetails" class="form-control" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary" value="Send" />
                            <input type="submit" name="btn_cancel" id="btn_cancel" class="btn btn-secondary" value="Cancel" />
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<br><br>
<?php
include("Foot.php");
ob_flush();
?>
       
</body>
  </div>
</html>