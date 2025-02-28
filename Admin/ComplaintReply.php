<?php
   session_start();
   include("../Assets/Connection/Connection.php");
   include("Head.php");
   if(isset($_POST["btn_submit"]))
   {
     $msg=$_POST["txtreply"];
     $upQry="update tbl_complaint set complaint_reply='".$msg."',complaint_replydate=curdate(),complaint_status='1' where complaint_id='".$_GET["compID"]."'";
     if($con->query($upQry))
     {
   ?>
     <script>
      alert("Updated");
      window.location("UserComplaint.php");
     </script>
       <?php
       }
       else
       {
       ?>
     <script>
      alert("Failed");
      window.location("UserComplaint.php");
      </script>
            
        <?php
          }
   }
?>
 <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtreply">Reply Message</label>
                        <textarea name="txtreply" id="txtreply" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="btn btn-primary m-2" />
                    <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="btn btn-secondary m-2" />
                </div>
            </div>
        </form>
    </div>
  <?php
include("Foot.php");
ob_flush();
?>

  
 </body>
</html>