<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Quantity</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">

<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `transactions_sales-items` where `salesID` =".$_POST['salesID']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['itemName']?></td>
        <td><?php echo $fetch['itemType']?></td>
        <td><?php echo $fetch['itemQuantity']?></td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>