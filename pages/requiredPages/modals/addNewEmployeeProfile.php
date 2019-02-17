<div class="modal fade" id="addNewEmployee" role="dialog">
    <div class="modal-dialog" style="max-width: 800px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Employee</h4>               
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>                                       
            <div class="modal-body">   
            <div class="row">
                <div class="col-sm-2">
                    <label>
                        Employee No.
                    </label>
                    <input type="text" id="employeeNo" class="form-control" disabled>
                </div>
                <div class="col-sm-10">
                    <label>
                        Employee Name
                    </label>
                    <input type="text" class="form-control input-sm" aria-controls="dataTables-example" name="employeeName" id="employeeName">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>
                        Email
                    </label>
                    <input type="email" class="form-control input-sm" name="employeeEmail" id="employeeEmail">
                </div>
                <div class="col-sm-4">
                    <label>
                        Contact No.
                    </label>
                    <input type="tel" class="form-control input-sm" name="employeeContactNo" id="employeeContactNo">
                </div>
                <div class="col-sm-4">
                    <label>
                        Position
                    </label>
                    <select style="padding: 3px;" class="form-control" name="employeePosition" id="employeePosition">
                            <option value="none">Select Position</option>
                            <option value="Account Executive">ACCOUNT EXECUTIVE</option>
                            <option value="Secretary">SECRETARY</option>
                            <option value="Technician">TECHNICIAN</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>
                        Address
                    </label>
                    <input type="text" class="form-control input-sm" name="employeeAddress" required id="employeeAddress">
                </div>                
            </div>
                <br>
                <div class="alert alert-danger" id="requireError" style="display: none;">
                    <center><p>All fields are required!</p></center>
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
                            <button type="button" class="btn btn-danger" id="btbCancelAdd">Cancel</button>
                        </center>
                </div>
            </div>
            <div class="modal-footer">     
            <button type="button" class="btn btn-success btn-fw" style="width: 90px;" id="btnAddEmployee"><i class="mdi mdi-plus"></i>Add</button>
            <button class="btn btn-danger btn-fw" style="width: 90px;" data-dismiss="modal"><i class="mdi mdi-cancel"></i>Cancel</button>
            </div>
            </div>                                        
    </div>
</div>