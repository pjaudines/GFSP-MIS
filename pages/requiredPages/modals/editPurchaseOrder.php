<?php
        require '../../php/databaseConn.php';
        $poID;
        $query = $conn->query("SELECT * FROM `transactions_purchaseorders`") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
        $poID = $fetch['purchaseID'];
    ?>
    <div class="modal fade" id="edit<?php echo $fetch['purchaseID'];?>" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 800px;">
            <!-- Modal content-->
            
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Purchase Order No.</label>
                        <input type="text" disabled value="<?php echo $fetch['purchaseID']?>" class="form-control" name="purchaseOrderNo">
                    </div>
                    <div class="col-sm-3">
                        <label>Supplier Name</label>
                        <input type="text" disabled value="<?php echo $fetch['purchaseSupplier']?>" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" data-target="#addItemTo<?php echo $fetch['purchaseID'];?>" data-toggle="modal" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-plus"></i> Add Items</button>
                            <div class="table-responsive">
                                <table class="table datatable" id="walkInDataTable">
                                    <thead>
                                        <tr>                                        
                                            <th>Item Name</th>
                                            <th>Item Type</th>
                                            <th>Quantity</th>
                                            <th>Action</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>      
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>     	
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $fetch['employeeID']?>" name="employeeID">
                <input type="hidden" value="<?php echo $poID?>" name="poID">
                <input type="submit" class="btn btn-default" style="width: 90px;" value="Save">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>        
    </div>
</div>
            <?php
    }
    include "addItemsPurchaseOrder.php";
?>      

