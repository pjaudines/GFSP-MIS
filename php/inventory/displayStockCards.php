<table class="table datatable" id="stockCardsTable" content-editable>
    <thead>
        <tr>
            <th>Incoming ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>ArrivalDate</th>
            <th>Purchase ID</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">
<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("select * from `inventory_prodincoming`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['prodIncomingID']?></td>
        <td><?php echo $fetch['prodID']?></td>
        <td><?php echo $fetch['prodDesc']?></td>
        <td><?php echo $fetch['prodType']?></td>
        <td><?php echo $fetch['arrivalDate']?></td>
        <td><button class="btn btn-link"><?php echo $fetch['purchaseID']?></button></td>
        <td><?php echo $fetch['itemQty']?></td>
        <td style="padding: 0;">
            <button type="button" class="btn btn-primary btn-rounded btn-icons" data-toggle="modal" data-target="#arrivalDate<?php echo $fetch['prodIncomingID']?>"><i class="menu-icon mdi mdi-calendar"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>