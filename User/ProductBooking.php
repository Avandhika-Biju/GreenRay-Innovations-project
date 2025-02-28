<?php
 include("../Assets/Connection/connection.php");
 include("Sessionvalidated.php");
 include("Head.php");
 
   if(isset($_POST["btnbook"]))
    {
    echo $insQry="insert into tbl_productbooking(package_id,user_id,no_of_days,booked_date,booking_date)values('".$_GET["did"]."','".$_SESSION["uid"]."','".$_POST["txtday"]."',curdate(),'".$_POST["txtdate"]."')";
    
     if($con->query($insQry))
     {
    // $message="Record Inserted...";
    ?>
             <script>
    alert("Inserted");
    // window.location="HomePage.php";
    </script>
             <?php
     }
     else{
      ?>
             <script>
    
    alert(" Error in Inserting..try again");
    </script>
             <?php 
     }
    }
  
 
 
 
  $selQry="select * from tbl_product sc inner join tbl_producttype c on sc.producttype_id=c.producttype_id where sc.product_id='".$_GET['did']."'";
     
    $res=$con->query($selQry);
    $row=$res->fetch_assoc();
      
      
        
    ?> 
                
       
                
               
                  


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bookproduct</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <table class="table" width="200" border="1" align="center">
                <tr>
                    <td>Name</td>
                    <td><?php echo $row["product_name"]?></td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td><?php echo $row["product_details"]?></td>
                </tr>
                <tr>
                    <td>Rate</td>
                    <td><?php echo $row["product_rate"]?></td>
                </tr>
                <tr>
                    <td>no.of.days</td>
                    <td><input type="number" name="txtday" id="txtday" class="form-control" /></td>
                </tr>
                <tr>
                    <td>From date</td>
                    <td><input type="date" name="txtdate" id="txtday" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnbook" id="btnbook" class="btn btn-primary" value="BOOK" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>