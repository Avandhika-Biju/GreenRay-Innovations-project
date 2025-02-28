<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejectedshoplist</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<?php

 include("../Assets/Connection/Connection.php");
  
  include("Head.php");
 if(isset($_GET["aid"]))
 

 {
	 $update="update tbl_company set company_status='1' where company_id='".$_GET["aid"]."'";
	 $con->query($update);
	 header("location:AcceptedcompanyList.php");
 }
 ?>
 <div class="container mt-4">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <td>sl.no</td>
                    <td>name</td>
                    <td>contact</td>
                    <td>email</td>
                    <td>address</td>
                    <td>logo</td>
                    <td>action</td>
                </tr>
                <?php
                $selqry = "select * from tbl_company where company_status=2";
                $res = $con->query($selqry);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data['company_name'] ?></td>
                        <td><?php echo $data['company_contact'] ?></td>
                        <td><?php echo $data['company_email'] ?></td>
                        <td><?php echo $data['company_address'] ?></td>
                        <td><img src="../Assets/Files/Userlogo/<?php echo $data['company_logo'] ?>" width="150" height="150" /></td>
                        <td><a class="btn btn-success" href="AcceptedCompanyList.php?aid=<?php echo $data['company_id']?>">Accept</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>