<table class="table datatable" id="deliveriesDataTable">
    <thead>
            <tr>
                <th>Delivery Receipt No</th>
                <th>Sales ID</th>
                <th>Delivered to</th>
                <!-- <th>Item Name</th>
                <th>Item Type</th>     -->                            
                <th>Address</th>                      
                <th>Date Created</th>
                <th>Action</th>                                       
            </tr>
    </thead>
    <tbody>    
    <?php
            require '../../databaseConn.php';
            $query = $conn->query("SELECT * FROM `transactions_delivery` ORDER BY `deliveryID` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
        ?>                                      
            <tr>
                <td><?php echo $fetch['deliveryID']?></td>
                <td><?php echo $fetch['salesID']?></td>
                <td><?php echo $fetch['deliveredTo']?></td>
                <td><?php echo $fetch['deliveryAddress']?></td>
                <td><?php echo $fetch['creationDate']?></td>
                <td style="padding: 0;">
                    <div class="row">
                        <form action="delivery-addItems.php" method="GET">
                        <input type="hidden" value="<?php echo $fetch['deliveryID']?>" name="deliveryID">
                        <input type="hidden" value="<?php echo $fetch['salesID']?>" name="salesID">
                        <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-cart'></i></button>
                        </form>
                        <form style="margin:0;" action="../../php/transactions/delivery/deleteDelivery.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');" >
                        <input type="hidden" value="<?php echo $fetch['deliveryID']?>" name="deliveryID">                                               
                        <button type="submit" class="btn btn-icons btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
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