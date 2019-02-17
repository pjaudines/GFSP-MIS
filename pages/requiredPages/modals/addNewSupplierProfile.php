<div class="modal fade" id="addNewSupplier" role="dialog">
        <div class="modal-dialog" style="max-width: 800px;">
            <!-- Modal content-->
            <form action="../../php/masterfiles/supplier/addSupplier.php" method="post" onsubmit="return confirm('Are you sure you want to add this New Supplier?');" >
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Supplier</h4>           
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>                                           
            <div class="modal-body">                                         
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">     
                    <tr>
                    <td>
                        Supplier Name
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" aria-controls="dataTables-example" name="supplierName" required>
                    </td>    
                    </tr>
                    <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" class="form-control input-sm" name="supplierEmail" required>
                    </td>    
                    </tr>                                           
                    <tr>
                    <td>
                        Contact No.
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" name="supplierContactNo" required>
                    </td>    
                    </tr>                                            
                    <tr>
                    <td>
                        Supplier Address
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" name="supplierAddress" required>
                    </td>    
                    </tr>                                             
                    <tr>
                    <td>
                        Contact Person
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" name="supplierContactPerson" required>
                    </td>    
                    </tr>                                                
            </table>
            </div>
            <div class="modal-footer">     
                <input type="submit" class="btn btn-default" style="width: 90px;" value="Add">
                
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>                                          
            </div>   
            </form>
    </div>
</div>