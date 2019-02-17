<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="itemsTbody">
<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `transactions_purchaseorder-items` where `purchaseID` =".$_POST['purchaseID']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['itemName']?></td>
        <td><?php echo $fetch['itemType']?></td>
        <td><?php echo $fetch['Quantity']?></td>
        <td style="padding: 0; text-align:center;">
            <input type="hidden" value="<?php echo $fetch['purchaseItemID']?>" name="purchaseItemID" id="purchaseItemID">
            <button onclick="deletePO(<?php echo $fetch['purchaseItemID']?>,<?php echo $fetch['purchaseID']?>, <?php echo $fetch['Quantity']?>, '<?php echo $fetch['itemName']?>');" type="button" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteItem" name="btnDeleteItem"><i class="menu-icon mdi mdi-delete"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>