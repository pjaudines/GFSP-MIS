<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Sales ID</th>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="itemsTbody">
<?php
    require '../../databaseConn.php';
    $query = $conn->query("SELECT * FROM `transactions_sales-items` where `clientControlNo` = ".$_POST['clientControlNo']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){        
?>
    <tr>
        <td><?php echo $fetch['salesID']?></td>
        <td><?php echo $fetch['itemName']?></td>
        <td><?php echo $fetch['itemType']?></td>
        <td><?php echo $fetch['startDate']?></td>
        <td><?php echo $fetch['endDate']?></td>
        <td><?php echo $fetch['itemQuantity']?></td>
        <td style="padding: 0; text-align:center;">
        <form action="../notifications/email.php" method="POST">
        <input type="hidden" value="<?php echo $fetch['clientControlNo']?>" name="clientControlNo">
            <button type="submit" class="btn btn-rounded btn-icons btn-success" ><i class="menu-icon mdi mdi-email"></i></button>
        </form>
        <form action="../notifications/sms.php" method="POST">
            <input type="hidden" value="<?php echo $fetch['clientControlNo']?>" name="clientControlNo">
            <button class="btn btn-rounded btn-icons btn-warning"><i class="menu-icon mdi mdi-message"></i></button></td>
        </form>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>