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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<p><a href="HomePage.php">Home</a></p>

<?php
ob_start();
//include("Head.php");
?>


<div class="container mt-5" style="background-image: url('../Assets/Template/Main/img/sky1.jpg');">
        <form id="form1" name="form1" method="post" action="">
            <div class="text-center">
                <table class="table" width="703" height="302">
                    <tr>
                        <th width="45" scope="col">Sl No</th>
                        <th width="163" scope="col">Complaint Subject</th>
                        <th width="219" scope="col">Complaint Description</th>
                        <th width="219" scope="col">Complaint Reply</th>
                    </tr>
                    <?php
                        $selectQry = "select * from tbl_complaint where company_id!='0' and user_id='" . $_SESSION["uid"] . "'";
                        $row = $con->query($selectQry);
                        $i = 0;
                        while ($data = $row->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $data["complaint_subject"] ?></td>
                                <td><?php echo $data["complaint_details"] ?></td>
                                <td><?php 
                                if($data["complaint_reply"] == "")
                                {
                                    echo "Not Replyed";
                                }
                                else
                                {
                                    echo $data["complaint_reply"];
                                }

                                ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </form>
    </div>
 <?php
//include("Foot.php");
ob_start();
?>

<p>&nbsp;</p>
</body>
</html>