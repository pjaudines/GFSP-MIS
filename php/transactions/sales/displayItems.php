<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
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
        
        <td><?php echo $fetch['itemTotalPrice']?></td>
        <td style="padding: 0; text-align:center;">
            <input type="hidden" value="<?php echo $fetch['salesItemID']?>" name="salesItemID" id="salesItemID">
            <button onclick="deleteItem(<?php echo $fetch['salesItemID']?>,<?php echo $fetch['salesID']?>, <?php echo $fetch['itemQuantity']?>, '<?php echo $fetch['itemName']?>');" type="button" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteItem" name="btnDeleteItem"><i class="menu-icon mdi mdi-delete"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>