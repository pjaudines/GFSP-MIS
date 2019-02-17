<?php
     require '../../php/databaseConn.php';
?>
<div class="modal fade" id="addNewTransactionSales" role="dialog" style="width: 100%;">
        <div class="modal-dialog" style="max-width: 90%;">        
            <!-- Modal content-->            
            <div class="modal-content">
            <div class="modal-header">
                <h5>New Sales</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-sm-8">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label>
                        Sales ID
                    </label>
                    <input type="text" id="txtSalesID" disabled class="form-control">
                </div>
                <div class="col-sm-10" style="margin-bottom: 20px;">                 
                    <label>
                         Client
                    </label><label id="addErrorClientName" class="input-error"></label>                         
                    <select class="select2 form-control" name="clientName" id="clientName" style="width: 100%;">
                        <option value="none">Select Client</option>
                            <?php
                                $query = $conn->query("SELECT * FROM `clients` ORDER BY `clientName`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>
                                <option value="<?php echo $fetch['clientControlNo']?>"> <?php echo $fetch['clientName']?></option>
                            <?php
                                }
                            ?>
                    </select>
                    </div>                    
                </div>
                <div class="row" >
                    <div class="col-sm-6">
                    <label>Payment Term</label><label id="addErrorPaymentTerm" class="input-error"></label>
                    <select class="form-control" name="paymentTerm" id="paymentTerm">
                            <option value="none">Select Payment Term</option>
                            <option>Cash</option>
                            <option>Cheque</option>
                        </select>                        
                    </div>
                    <div class="col-sm-6">
                        <label>Date Created</label><label id="addErrorDate" class="input-error"></label>
                        <input type="date" class="form-control" id="selectDate">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Item Type</label><label id="addErroritemType" class="input-error"></label>
                        <select class="form-control" id="prodType" required name="prodType">
                        <option value="none">Select Item Type</option>
                            <?php
                                $query = $conn->query("SELECT DISTINCT prodType FROM `products`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>
                                <option value="<?php echo $fetch['prodType']?>"><?php echo $fetch['prodType']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                    <label>Item Name</label><label id="addErrorItemName" class="input-error"></label>
                    <select class="form-control" id="products" name="prodDesc" required>
                    <option value="none">Select Item Type First</option>
                    </select>
                    </div>
                    <div class="col-sm-1">
                         <label>Quantity</label><label id="addErorItemQuantity" class="input-error"></label>
                        <input type="number" class="form-control" name="itmQuantity" id="itmQty" min="1" requried>
                    </div>
                    <div class="col-sm-2">
                    <button class="btn btn-primary" style="margin-bottom: 20px;" id="btnAddItem"><i class="menu-icon mdi mdi-plus"></i> Add Items</button>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive" id="itemsTbl">
                </div>

                <br>
                <div class="alert alert-danger" id="requireError" style="display:none;">
                    <center>All fields are required.</center>
                </div>
                <div class="alert alert-success" id="addSuccess" style="display:none;">
                    <center>Added to database!</center>
                </div>
                <div class="alert alert-info" id="confirmAdd" style="display: none;">
                    <center>
                        Do you really wanna add this entry?<br>
                        <button type="button" class="btn btn-success" id="btnConfirmAdd">Save</button>
                        <button type="button" class="btn btn-danger" id="btnCancelAdd">Cancel</button>
                    </center>
                </div>
                <div class="row">
                    <div class="col-sm-10">

                    </div>
                    <div class="col-sm-2">
                    Total: <input type="text" class="form-control" disabled id="txtTotal">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <!-- <input type="hidden" value="" name="date"> -->
                <button type="button" class="btn btn-default" style="width: 90px;" id="addTransactionBtn" name="submitCreatePO">Create</button>
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>     
    </div>
</div>
<?php     
     $conn->close();
?>