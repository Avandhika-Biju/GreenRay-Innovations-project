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
<title>Feedbacks</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<a href="HomePage.php">Home</a>


<div class="container mt-5">
  <form id="form1" name="form1" method="post" action="">
      <div class="table-responsive">
      <table class="table table-bordered" align="center" cellpadding="10"  style="color:white">
              <tr>
                  <th width="45" scope="col">Sl No</th>
                  <th width="163" scope="col">Feedback</th>
                  <th width="163" scope="col">Feedback Date</th>
                  <th width="219" scope="col">Company Name</th>
              </tr>
              <?php
              $selectQry = "SELECT * FROM tbl_feedback f INNER JOIN tbl_company u ON f.company_id = u.company_id";
              $row = $con->query($selectQry);
              $i = 0;
              while ($data = $row->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $data["feedback_content"] ?></td>
                      <td><?php echo $data["feedback_date"] ?></td>
                      <td><?php echo $data["company_name"] ?></td>
                  </tr>
              <?php
              }
              ?>
          </table>
      </div>
  </form>
</div>
  
<p>&nbsp;</p>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
  