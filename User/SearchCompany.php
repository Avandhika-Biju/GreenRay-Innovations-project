<?php
 include("../Assets/Connection/Connection.php");
 include("SessionValidated.php");
 include("Head.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background-image: url(../Assets/Template/Main/img/img99.jpg);">
<style>
  .background{
    background-image: url("../Assets/Template/Main/img/img99.jpg");
  }

	.card {
    padding: 17px;
    background: #00FFEF;
    width: 260px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #00FFEF;
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
<div class="container mt-5" style="background-image: url('../Assets/Template/Company/img/carousel-3.jpg');">
        <form id="form1" name="form1" method="post" action="">
            <table class="table" width="520" cellpadding="10" align="center" border="1">
                <tr>
                    <td>District</td>
                    <td>
                        <select name="sel_district" id="sel_district" class="form-control" onchange="getplace(this.value)">
                            <option value="">---select---</option>
                            <?php
                            $selplace = "select * from tbl_district";
                            $resplace = $con->query($selplace);
                            while ($rowcat = $resplace->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $rowcat["district_id"] ?>"><?php echo $rowcat["district_name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>Place</td>
                    <td>
                        <select name="sel_place" id="sel_place" class="form-control" onchange="getCompany(this.value)">
                            <option value="">---select---</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
    </div>

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
	  <div class="card">
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
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getplace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
			getCompany();
		}
	});
	
}
function getCompany()
{
	var did=document.getElementById("sel_district").value;
	var pid=document.getElementById("sel_place").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxCompany.php?did="+did+"&pid="+pid,
		success: function(html){
		  $("#result").html(html);
	}
	
	});
}
</script>
<?php
include("Foot.php");
?>