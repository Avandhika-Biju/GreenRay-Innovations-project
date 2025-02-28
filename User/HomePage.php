<?php
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="background-image: url(../Assets/Template/Main/img/blue.jpg);">
</style>
<style>
	.card {
    padding: 17px;
    background: #FFEF00;
    width: 260px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #FFEF00;
  }

  .main {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    margin-top:60px;
    gap: 3rem;
  }
</style>

<body>
    
<h1 align="center" >Welcome</h1>
<h2 align="center"><?php echo $_SESSION["uname"] ?></h2>
<div class="main" id="result">
	  <?php
   $selQry="select * from tbl_company c inner join tbl_place p on p.place_id=c.place_id inner join tbl_district d on d.district_id
   =p.district_id";
	  $res=$con->query($selQry);
	  $i=0;
	  while($row=$res->fetch_assoc())
	  {
		  $i++;
	?>
	  <div class="card" style="color:black">
      <div><img src="../Assets/Files/Userlogo/<?php echo $row ['company_logo']; ?>"width="150" height="150" style="border-radius:10px;" /></div>
      <div>Name: &nbsp;<?php echo $row['company_name'];?></div>
      <div>Contact: &nbsp;<?php echo $row['company_contact'];?></div>
      <div>Email: &nbsp;<?php echo $row['company_email'];?></div>
      <div>Address: &nbsp;<?php echo $row['company_address'];?></div>
      <div><a href="ViewProduct.php?did=<?php echo $row['company_id']?>">ViewProduct</a></div>
	  <div><a href="PostFeedback.php?did=<?php echo $row['company_id']?>">FeedBack</a></div>
	  <div><a href="PostComplaint.php?cmid=<?php echo $row['company_id']?>">Complaint</a></div>
    </div>
	<?php
	  }
	?>
	  </div>


<br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>