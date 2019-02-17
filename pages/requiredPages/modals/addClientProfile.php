<div class="modal fade" id="addNewClient" role="dialog" style="width: 100%;">
    <div class="modal-dialog" style="max-width: 700px;">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Client</h4>    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>                                           
                <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-2">
                            <label>Control No.</label>
                            <input disabled type="text" class="form-control" id="clientControlNo">
                        </div>
                        <div class="col-sm-10">
                        <label>
                            Business Name
                        </label>
                        <input type="text" class="form-control input-sm" aria-controls="dataTables-example" name="clientName" id="clientName" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Client Address</label>
                            <input type="text" class="form-control input-sm" name="clientAddress" id="clientAddress" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Client Type</label>
                            <select class="form-control" name="clientType" id="clientType">
                                    <option value="none">Select Client Type</option>
                                    <option value="Walk In">Walk In</option>
                                <option value="Company">Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Contact No.</label>
                            <input type="text" class="form-control input-sm" name="clientContactNo" id="clientContactNo" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Email</label>
                            <input type="text" class="form-control input-sm" name="clientEmail" id="clientEmail" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Contact Person</label>
                            <input type="text" class="form-control input-sm" name="clientContactPerson" id="clientContactPerson" required>
                        </div>
                    </div>
                    <br>
                    <div class="alert alert-danger" id="requireError" style="display: none;">
                        <center><p>All fields are required!</p></center>
                    </div>
                    <div class="alert alert-danger" id="invalidEmail" style="display: none;">
                        <center><p>Email not valid!</p></center>
                    </div>
                    <div class="alert alert-danger" id="invalidContactNo" style="display: none;">
                        <center><p>Contact number not valid!</p></center>
                    </div>
                    <div class="alert alert-danger" id="addFail" style="display: none;">
                        <center><p>Record exists in database!</p></center>
                    </div>
                    <div class="alert alert-success" style="display:none;" id="addSuccess">
                      <center>Added to database!</center>
                    </div>
                    <div class="alert alert-info" id="confirmAdd" style="display: none;">
                        <center>
                            Do you really wanna add this entry?<br>
                            <button type="button" class="btn btn-success" id="btnConfirmAdd">Save</button>
                            <button type="button" class="btn btn-danger" id="btnCancelAdd">Cancel</button>
                        </center>
                    </div>
                </div>
                <div class="modal-footer">     
                    <button type="button" class="btn btn-success btn-fw" style="width: 90px;" id="btnAddClient"><i class="mdi mdi-plus"></i>Add</button>
                    <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
                </div>
            </div>  
    </div>
</div>