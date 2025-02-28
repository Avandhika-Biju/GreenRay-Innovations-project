<?php

  include("../Assets/Connection/connection.php");
  
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<body>
<form id="form1" name="form1" method="post" action="">
    <table width="200" border="1">
    <tr>
      <td> District</td>
      <td><label for=  "sel_district"></label>
      <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
      <option value="">--select--</option>
    
     <?php
  $selplace="select * from tbl_district";
  $resplace=$con->query($selplace);
  while($rowcat=$resplace->fetch_assoc())
  {
   ?>
         <option value="<?php echo $rowcat['district_id']?>"><?php echo $rowcat['district_name']?></option>
        
         <?php
  }
  ?>
     
     </select></td>
     </tr>
    
    <tr>
      <td>Place</td>
      <td><label for= "sel_place"></label>
      <select name="sel_place" id="sel_place">
      <option value-"">---select---</option>
      </select>
    
 
      </td>
      </tr>
    
      
   
   
     <table align="center" cellpadding="10" cellspacing="60" id="result">
<?php
$selQry="select * from tbl_company";
?>



<a href="Company.php">Company</a>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
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

</html>