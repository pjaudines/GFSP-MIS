<div class="modal fade" id="addNewProductType" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 500px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label>Item Type</label><label id="addErrorProductType" class="input-error"></label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                    <div class="row">
                    <div class="col-sm-12">
                    <label>Item Name</label><label id="addErrorProductName" class="input-error"></label>
                    <input type="text" placeholder="Enter Product Name" class="form-control" required name="productName" id="productName">
                </div>
                </div>
                <label>Unit Price</label><label id="addErrorUnitPrice" class="input-error"></label>
                <input type="number" class="form-control" name="unitPrice" id="unitPrice" min="1" requried>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" style="width: 90px;" value="Add" id="btnAddItem">
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
    </div>
</div>