<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select sum(cart_qty) as id from tbl_cart ca inner join  tbl_booking b  on b.booking_id=ca.booking_id inner join tbl_newuser u on u.user_id=b.user_id inner join  tbl_product p on ca.product_id=p.product_id inner join tbl_category c on c.category_id=p.category_id WHERE c.category_id='".$data["category_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Product Sales"
    }
  }
});
</script>
<?php
include("Foot.php");
ob_flush();
?>
</div>
</body>
</html>
