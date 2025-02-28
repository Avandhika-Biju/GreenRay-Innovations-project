<?php
include("../Assets/Connection/Connection.php");
include("SessionValidated.php");
include("Head.php");	

	 if(isset($_POST["btnsave"]))
          {
              $productgallery=$_FILES['file_photo']['name'];
			  $path = $_FILES['file_photo']['tmp_name'];
			  move_uploaded_file($path,"../Assets/Files/Company/Product/".$productgallery);
               $product=$_GET["did"];
                                                                    
                                                                    
              $insQry="insert into tbl_productgallery(product_id,gallery_image)values('".$product."','".$productgallery."')";
               if($con->query($insQry))
                {
                         $message="Record inserted";
                 }
                else
                                                                    
                    {
                          $message="Insertion failed";
                    }
 
 
 
                     }
                           
 

	 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
</style>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <div class="container">
    <table class="table" border="1"  cellpadding="10" style="color:black">
      <tr>
        <td><b>Image</b></td>
        <td>
          <label>
            <input type="file" name="file_photo" id="file_photo" class="form-control-file">
          </label>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="text-center">
          <input type="submit" name="btnsave" id="btnsave" value="Save" class="btn btn-primary">
          <input type="submit" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary">
        </td>
      </tr>
    </table>
  </div>
</form>
<br><br><br><br><br><br><br><br><br><br><br>
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