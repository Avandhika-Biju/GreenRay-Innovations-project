 <?php
session_start();

			include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Complaint</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>


 <?php
 ob_start();
include("Head.php");
?>
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
                        <th scope="col">Name Of Company</th>
                        <th scope="col">Complaint Subject</th>
                        <th scope="col">Complaint Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selectQry = "select * from tbl_complaint c inner join tbl_company u on c.company_id=u.company_id where complaint_status='0' and c.company_id!='0' and c.user_id='0'";
                        $row = $con->query($selectQry);
                        $i = 0;
                        while ($data = $row->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["company_name"] ?></td>
                        <td><?php echo $data["complaint_subject"] ?></td>
                        <td><?php echo $data["complaint_details"] ?></td>
                        <td><a href="ComplaintReply.php?compID=<?php echo $data["complaint_id"] ?>" class="btn btn-primary">Reply</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    
 <?php
include("Foot.php");
ob_flush();
?>
  
<p>&nbsp;</p>
</body>
</html>