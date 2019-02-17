<table class="table datatable" id="clientsTable" content-editable>
    <thead>
        <tr>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Client Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="itemsTbody">
<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `clients`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['clientControlNo']?></td>
        <td><?php echo $fetch['clientName']?></td>
        <td><?php echo $fetch['clientAddress']?></td>
        <td style="padding: 0; text-align:center;">
        <form method="POST" action="../../pages/transactions/warranty_monitoring-items.php">
            <input type="hidden" value="<?php echo $fetch['clientControlNo']?>" name="clientControlNo" id="clientControlNo">
            <button class="btn btn-success">Proceed</button>
        </form>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>