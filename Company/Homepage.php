<?php
session_start();
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<h1 align="center" ><b>Welcome</b></h1>
<h2 align="center"><?php echo $_SESSION["cname"] ?></h2>
<body style="background-image: url(../Assets/Template/Main/img/sol-tec111.jpg);">
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php  
include("Foot.php");
ob_flush();
?>
