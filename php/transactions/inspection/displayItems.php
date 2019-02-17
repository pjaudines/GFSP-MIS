<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">

<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `transactions_inspection-items` where `inspectionID` =".$_POST['inspectionID']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['itemName']?></td>
        <td><?php echo $fetch['itemType']?></td>
        <td><?php echo $fetch['itemQuantity']?></td>
        <td><?php echo $fetch['itemStatus']?></td>
        <td><?php echo $fetch['itemLocation']?></td>
        <td style="padding: 0; text-align:center;">
            <input type="hidden" value="<?php echo $fetch['inspectionItemID']?>" name="inspectionItemID" id="inspectionItemID">
            <button onclick="deleteInspection(<?php echo $fetch['inspectionItemID']?>,<?php echo $fetch['inspectionID']?>);" type="button" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteItem" name="btnDeleteItem"><i class="menu-icon mdi mdi-delete"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>