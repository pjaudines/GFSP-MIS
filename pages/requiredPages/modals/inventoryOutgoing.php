<div class="modal fade" id="itemAddOutgoing" role="dialog" style="width: 100%:">
    <div class="modal-dialog" style="max-width: 450px;">
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Outgoing products</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <label>Product Type</label>
            <select class="form-control" id="selectProdTypeOutgoing" required name="prodType">
            <option value="none">Select Item</option>
                <?php
                    $query = $conn->query("SELECT DISTINCT prodType FROM `inventory`") or die(mysqli_error());
                    while($fetch = $query->fetch_array()){
                ?>
                    <option value="<?php echo $fetch['prodType']?>"><?php echo $fetch['prodType']?></option>
                <?php
                    }
                ?>
            </select>
                <label>Product Description</label>
                <select class="form-control" id="selectProdDescOutgoing" name="prodDesc" required>
                    <option value="none">Select Item Type First</option>
                </select>
                <label>Quantity</label><label id="addErorItemQuantity" class="input-error"></label>
                <input type="number" class="form-control" name="itmQuantity" id="outgoingQuantity" requried>
               <!--  <label>Outgoing date</label>
                <input type="date" class="form-control" id="outgoingDate"> -->
            </div>
            <div class="modal-footer">                
                <input type="button" class="btn btn-default" style="width: 90px;" value="Add" id="btnAddOutgoing">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>        