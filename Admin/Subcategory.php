<?php
         include("../Assets/Connection/Connection.php");
		     include("SessionValidated.php");
         include("Head.php");
          if(isset($_POST["btnsave"]))
          {
              $subcategory=$_POST["txtname"];
              $category=$_POST["sel_category"];
                                                                    
                                                                    
              $insQry="insert into tbl_subcategory(subcat_name,category_id)values('".$subcategory."','".$category."')";
               if($con->query($insQry))
                {
                         $message="Record inserted";
                 }
                else
                                                                    
                    {
                          $message="Insertion failed";
                    }
 
 
 
                     }
                                                         
                                                         
                                                         
                        if(isset($_GET['did']))
                         {
                            $delQry="delete from tbl_subcategory where subcat_id=".$_GET['did'];
                             if($con->query($delQry))
                              {
								  
								  
               include("../Assets/Connection/Connection.php");
           
          if(isset($_POST["btnsave"]))
          {
              $subcategory=$_POST["txtname"];
              $category=$_POST["sel_category"];
                                                                    
                                                                    
              $insQry="insert into tbl_subcategory(subcat_name,category_id)values('".$subcategory."','".$category."')";
               if($con->query($insQry))
                {
                         $message="Record inserted";
                 }
                else
                                                                    
                    {
                          $message="Insertion failed";
                    }
		  }
					  ?>                                                   

                     <script>
		            alert('Deleted')
					</script>
            <?php
			 }
			 else{
				 ?>
             <script>
			      
				     alert('Failed')
					</script>
	 
  <?php
  }
   }
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>         
<body>
<div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <td>Category Name</td>
                    <td>
                        <select name="sel_category" id="sel_category" class="form-control">
                            <option value="">---select---</option>
                            <?php
                                $selQry = "select * from tbl_category";
                                $res = $con->query($selQry);
                                while ($row = $res->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Subcategory Name</td>
                    <td><input type="text" name="txtname" id="txtname" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsave" id="btnsave" value="Submit" class="btn btn-primary" />
                        <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
<table border="1">
 
<tr>
<td>Sl No.</td>
<td>Subcategory Name</td>
<td>Category Name</td>
<td>Action</td>
</tr>
<?php
              $selQry="select  * from tbl_subcategory sc inner join tbl_category c on sc.category_id=c.category_id";
              $res=$con->query($selQry) ;
               $i=0;
               while($row=$res->fetch_assoc())
                { 
               $i++;           
 ?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['subcat_name'];?></td>
    <td><?php echo $row['category_name'];?></td>
    <td><a href="Subcategory.php?did=<?php echo $row ['subcat_id'] ?>">Delete</a></td></tr>
         
 <?php
				}
                           
   ?>
 </table> 
</body>
</html>
<?php
  include("Foot.php");
?>

