<div class="modal fade" id="addNewProductMasterfile" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 500px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Product Masterfile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <label>Product Code</label><label id="errorNewProductBarcode" class="input-error"></label>
                <input type="text" class="form-control" name="textBarcode" id="textBarcode" requried>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Item Type</label><label id="errorNewProductType" class="input-error"></label>
                        <select class="form-control" id="prodTypeMasterfile" required name="prodTypeMasterfile">
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
                </div>
                    <div class="row">
                    <div class="col-sm-12">
                    <label>Item Name</label><label id="errorNewProductName" class="input-error"></label>
                    <select id="products" class="form-control">
                        <option value="none">Select product type first</option>
                    </select>
                </div>
                </div>
                
                <!-- <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-6">
                        <label>Sold To</label>
                        <select class="form-control" id="selectClient">
                            <option value="none">Select client</option>
                            <?php
                                $query = $conn->query("SELECT * FROM `clients`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>
                                <option value="<?php echo $fetch['clientName']?>"><?php echo $fetch['clientName']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Bought from</label>
                        <select class="form-control" id="selectSupplier">
                            <option value="none">Select Supplier</option>
                            <?php
                                $query = $conn->query("SELECT * FROM `suppliers`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>
                                <option value="<?php echo $fetch['supplierName']?>"><?php echo $fetch['supplierName']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div> -->
                <br>
                <div class="alert alert-danger" style="display:none; text-align: center;" id="requiredFieldsError">
                    <p>All fields are required!</p>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" style="width: 90px;" value="Add" id="btnAddProductMasterfile">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
    </div>
</div>