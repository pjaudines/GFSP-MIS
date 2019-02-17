<table class="table datatable" id="purchasesDataTable">
    <thead>
        <tr>
            <th>Purchase ID</th>
            <th>Supplier Name</th>
            <!-- <th>Item Name</th>
            <th>Item Type</th>-->
            <th>Purchase Term</th>                                    
            <th>Date</th>
            <th>Action</th>                                       
        </tr>
    </thead>
    <tbody id="purchasesTbody">  
    <?php
        require '../../databaseConn.php';
        $query = $conn->query("select * from `transactions_purchaseorders` ORDER BY `purchaseID` DESC") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
    ?>
        <tr>
            <td><?php echo $fetch['purchaseID']?></td>
            <td><?php echo $fetch['purchaseSupplier']?></td>
            <td><?php echo $fetch['purchaseTerms']?></td>
            <td><?php echo $fetch['purchaseDate']?></td>
            <td style="padding: 0;">
                <div class="row">
                    <form action="../../pages/transactions/purchase-addItems.php" method="POST">
                    <input type="hidden" value="<?php echo $fetch['purchaseID']?>" name="purchaseID">                                            
                    <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-cart'></i></button>
                    </form>          
                    <form method="post" action="../../php/transactions/purchase/deletePurchaseOrder.php">
                    <input type="hidden" value="<?php echo $fetch['purchaseID']?>" name="purchaseID" id="purchaseID">
                    <button type="submit" class="btn btn-icons btn-rounded btn-danger" id="btnDeletePO" name="btnDeletePO"><i class="menu-icon mdi mdi-delete"></i></button>               
                    </form>
                </div>                                                      
            </td>
        </tr>
    <?php   
        }
        $conn->close();
    ?>            
    </tbody>
</table>
