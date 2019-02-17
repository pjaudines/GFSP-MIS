<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Unit Price</th>
            <th>Action</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">

<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `products`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['prodDesc']?></td>
        <td><?php echo $fetch['prodType']?></td>
        <td><?php echo $fetch['unitPrice']?></td>
        <td style="padding: 0; text-align:center;">
            <input type="hidden" value="<?php echo $fetch['prodID']?>" name="prodID" id="prodID">
            <button onclick="deleteItem(<?php echo $fetch['prodID']?>);" type="button" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteItem" name="btnDeleteItem"><i class="menu-icon mdi mdi-delete"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>