<?php
    require '../../php/databaseConn.php';
    $test = 3;
?>
    <div class="modal fade" id="addItem" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 500px;">
            <!-- Modal content-->
            <form onsubmit="return confirm('Save the changes?');">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Items</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
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
                </div>
                    <div class="row">
                    <div class="col-sm-12">
                    <label>Item Name</label><label id="addErrorItemName" class="input-error"></label>
                    <select class="form-control" id="products" name="prodDesc" required>
                    <option value="none">Select Item Type First</option>
                    </select>
                </div>
                </div>
                <label>Quantity</label><label id="addErorItemQuantity" class="input-error"></label>
                <input type="number" class="form-control" name="itmQuantity" id="itmQty" requried>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo "".$_POST['deliveryID']?>" name="deliveryID" id="deliveryID">                                
                <input type="button" class="btn btn-default" style="width: 90px;" value="Add" id="btnAddItem">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
        </form> 
    </div>
</div>