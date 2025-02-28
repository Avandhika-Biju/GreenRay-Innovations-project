
<?php
session_start();
ob_start();
//include("Head.php");

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
<style>
	.body{
		background-color:#E0FFFF;
	}
	</style>
<body>
<div class="container mt-4 col-md-6">
<div align="right">
    <a href="HomePage.php"class="btn btn-primary">BACK TO HOMEPAGE</a>
        </div>
        <br><br>


<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Feedback date</th>
                        <th scope="col">User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selectQry = "select * from tbl_feedback f inner join tbl_newuser u on f.user_id=u.user_id";
                        $row = $con->query($selectQry);
                        $i = 0;
                        while ($data = $row->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["feedback_content"] ?></td>
                        <td><?php echo $data["feedback_date"] ?></td>
                        <td><?php echo $data["user_name"] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
  
<p>&nbsp;</p>
</body>
</html>
<?php
//include("Foot.php");
//ob_flush();
?>
  