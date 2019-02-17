<?php
        require '../../php/databaseConn.php';
        $query = $conn->query("select * from `inventory`") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
        $inventoryItemID = $fetch['inventoryItemID'];
    ?>
    <div class="modal fade" id="itemStockCard<?php echo $fetch['inventoryItemID']?>" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 800px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <strong><h4 class="modal-title"><?php echo $fetch['prodDesc']?> </strong> - Stock Card</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                    <div class="table-responsive">
                    <table class="table datatable" id="walkInDataTable">
                        <thead>
                          <tr>
                              <th>Client Control No</th>
                              <th>Client Name</th>
                              <th>Client Address</th>
                              <th>Client Contact Number</th>
                              <th>Client Email</th>
                              <th>Client Contact Person</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>    
                            <?php
                                require '../../php/databaseConn.php';
                                $query2 = $conn->query("select * from `clients`") or die(mysqli_error());
                                while($fetch2 = $query2->fetch_array()){
                            ?>                                      
                                <tr>
                                    <td><?php echo $fetch2['clientControlNo']?></td>
                                    <td><?php echo $fetch2['clientName']?></td>
                                    <td><?php echo $fetch2['clientAddress']?></td>
                                    <td><?php echo $fetch2['clientContactNo']?></td>
                                    <td><?php echo $fetch2['clientEmail']?></td>
                                    <td><?php echo $fetch2['clientContactPerson']?></td>
                                    <td style="padding: 0;">
                                        <div class="row">
                                            <button style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-primary" href="#edit<?php echo $fetch2['clientControlNo'];?>" data-target="#edit<?php echo $fetch2['clientControlNo'];?>" data-toggle="modal"><i class='menu-icon mdi mdi-pencil'></i></button>                                                                
                                            <form style="margin:0;" action="../../php/masterfiles/client/deleteClient.php" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $fetch2['clientName']?>?');" >
                                           
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
                </div>
                    </div>
                </div>     	
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default" style="width: 90px;" value="Save">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>        
    </div>
</div>
<?php
    }
?>      

