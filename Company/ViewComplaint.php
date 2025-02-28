<?php
session_start();
			include("../Assets/Connection/Connection.php");
            include("Head.php");

?>





<div class="container mt-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Complaint Subject</th>
                    <th scope="col">Complaint Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selectQry = "select * from tbl_complaint where user_id!='0' and complaint_status='0' and company_id=".$_SESSION["cid"];
                    $row = $con->query($selectQry);
                    $i = 0;
                    while ($data = $row->fetch_assoc()) {
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $data["complaint_subject"] ?></td>
                        <td><?php echo $data["complaint_details"] ?></td>
                        <td><a href="ComplaintRply.php?did=<?php echo $data['complaint_id']?>">Reply</a></td>
    

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


</body>
</html>