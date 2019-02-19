<table class="table datatable" id="salesTable" content-editable>
    <thead>
        <tr>
            <th>Sales Order No</th>
            <th>Client Name</th>
            <th>Payment Term</th>
            <th>Sales Total</th>
            <th>Date created</th>
            <th>Action</th>
        </tr>
    </thead>
        <tbody id="itemsTbody">

<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `transactions_sales` ORDER BY `salesID` DESC") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['salesID']?></td>
        <td><?php echo $fetch['clientName']?></td>
        <td><?php echo $fetch['Terms']?></td>
        <td><?php echo $fetch['salesTotal']?></td>
        <td><?php echo $fetch['salesDate']?></td>
        <td style="padding: 0;text-align:center;">
              
                    <!-- <form action="../../pages/transactions/sales-addItems.php" method="POST"> -->
                    <!-- <input type="hidden" value="< ?php echo $fetch['salesID']?>" name="salesID">
                    <input type="hidden" value="< ?php echo $fetch['salesDate']?>" name="salesDate" id="salesDate">
                    <input type="hidden" value="< ?php echo $fetch['clientControlNo']?>" name="clientControlNo"> -->
                    <button type="button" data-toggle="tooltip" data-placement="top" title="View" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success" onclick="showSalesOrderModal(<?php echo $fetch['salesID']?>)" id="btnViewSalesOrder"><i class='menu-icon mdi mdi-eye'></i></button>
                    <!-- <button type="button" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-primary" id="editSalesOrder"><i class='menu-icon mdi mdi-pencil'></i></button> -->
                    <!-- </form>-->        
                    <!-- <form method="post" action="../../php/transactions/sales/deleteSalesOrder.php">
                    <input type="hidden" value="< ?php echo $fetch['salesID']?>" name="salesID" id="salesID">
                    <button type="submit" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteSalesID" name="btnDeleteSalesID"><i class="menu-icon mdi mdi-delete"></i></button>
                    </form> -->
               
            </td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>