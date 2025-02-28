<?php
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
        </form>
        <table class="table table-bordered">
            <tr>
                <td>Type</td>
                <td>
                    <form id="form2" name="form2" method="post" action="">
                        <input type="text" name="txttype" id="txttype" class="form-control" />
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <form id="form3" name="form3" method="post" action="">
                        <input type="submit" name="btnsave" id="btnsave" value="Save" class="btn btn-primary m-2" />
                        <input type="submit" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary m-2" />
                    </form>
                </td>
            </tr>
        </table>
    </div>
</table>
<p>&nbsp;</p>
<table width="200" border="1">
  <tr>
    <td>SI no</td>
    <td>Type Name</td>
    <td>Action</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</html>
<?php
  include("Foot.php");
?>
