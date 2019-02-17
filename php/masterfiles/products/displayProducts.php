<table class="table datatable" id="productsTable" content-editable>
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Sold To</th>
            <th>Bought From</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">
<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `products_masterfile`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['itemID']?></td>
        <td><?php echo $fetch['prodCode']?></td>
        <td><?php echo $fetch['prodName']?></td>
        <td><?php echo $fetch['prodType']?></td>
        <td><?php echo $fetch['soldTo']?></td>
        <td><?php echo $fetch['boughtFrom']?></td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>