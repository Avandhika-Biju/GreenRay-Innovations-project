<?php
   include("SessionValidated.php");
   include("../Assets/Connection/Connection.php");
   
   ob_start();
   include("Head.php");
  
         if(isset($_POST["btn_submit"]))
          {
 
             $fcontent=$_POST["txt_feedbackdetails"]; 
             $insQry="insert into tbl_feedback(feedback_content,company_id,feedback_date)values('".$fcontent."','".$_SESSION["cid"]."',curdate())";
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<div align="center">
<body>
<p><a href="Homepage.php">Home</a></p>

<br><br>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <center>
                <table class="table" style="width: 200px;" border="1">
                    <tr>
                        <td>Feedback</td>
                        <td><textarea class="form-control" name="txt_feedbackdetails" id="txt_feedbackdetails" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input class="btn btn-primary" type="submit" name="btn_submit" id="btn_submit" value="Send" />
                            <input class="btn btn-secondary" type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
                        </td>
                    </tr>
                </table>
            </center>
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