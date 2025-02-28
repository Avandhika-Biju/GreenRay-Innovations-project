<?php
session_start();
			include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserPostedComplaint</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<p><a href="HomePage.php"> Home</a></p>

<?php
ob_start();
 include("Head.php");
?>


<div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Complaint Subject</th>
                    <th scope="col">Complaint Description</th>
                    <th scope="col">Complaint Reply</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selectQry = "select * from tbl_complaint ";
                    $row = $con->query($selectQry);
                    $i = 0;
                    while ($data = $row->fetch_assoc()) {
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["complaint_subject"] ?></td>
                        <td><?php echo $data["complaint_details"] ?></td>
                        <td><?php echo $data["complaint_reply"] ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

 <?php
include("Foot.php");
?>

<p>&nbsp;</p>
</body>
</html>