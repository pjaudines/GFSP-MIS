<table class="table datatable" id="inspectionOrdersDataTable">
    <thead>
            <tr>
                <th>Inspection No.</th>
                <th>Client Name </th>
                <!-- <th>Item Name</th>
                <th>Item Type</th>     -->                            
                <th>Address</th>                      
                <th>Date Created</th>
                <th>Inspection Date</th>
                <!-- <th>Status</th> -->
                <th>Action</th>                                       
            </tr>
    </thead>
    <tbody>    
    <?php
            require '../../databaseConn.php';
            $query = $conn->query("select * from `transactions_inspection` ORDER BY `inspectionID` DESC") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
        ?>                                      
            <tr>
                <td><?php echo $fetch['inspectionID']?></td>
                <td><?php echo $fetch['inspectionClientName']?></td>
                <td><?php echo $fetch['inspectionAddress']?></td>
                <td><?php echo $fetch['creationDate']?></td>
                <td><?php echo $fetch['inspectionStartDate']?></td>
                <!-- <td><?php echo $fetch['transactionStatus']?></td> -->
                <td style="padding: 0;">
                    <div class="row">
                        <form action="inspection-addItems.php" method="POST">
                        <input type="hidden" value="<?php echo $fetch['inspectionID']?>" name="inspectionID">                                            
                        <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-cart'></i></button>
                        </form>
                        <form style="margin:0;" action="../../php/transactions/Inspection/deleteInspection.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');" >
                        <input type="hidden" value="<?php echo $fetch['inspectionID']?>" name="inspectionID">                                               
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