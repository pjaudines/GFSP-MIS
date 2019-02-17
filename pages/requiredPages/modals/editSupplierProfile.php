<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("SELECT * FROM `suppliers`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
<div class="modal fade" id="edit<?php echo $fetch['supplierID'];?>" role="dialog" style="width: 600px; top: 20%;left: 35%;">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form action="../../php/masterfiles/supplier/updateSupplier.php" method="post">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit</h4>           
                </div>                                           
                <div class="modal-body">                                         
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">     
                        <tr>
                        <td>
                                Name
                        </td>
                        <td>
                            <input type="text" class="form-control input-sm" aria-controls="dataTables-example" value="<?php echo $fetch['supplierName']?>" name="supplierNameUpdate">
                        </td>    
                        </tr>
                        <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            <input type="text" class="form-control input-sm" value="<?php echo $fetch['supplierEmail']?>" name="supplierEmailUpdate">
                        </td>    
                        </tr>                                           
                        <tr>
                        <td>
                            Contact No.
                        </td>
                        <td>
                            <input type="text" class="form-control input-sm" value="<?php echo $fetch['supplierContactNo']?>" name="supplierContactNoUpdate">
                        </td>    
                        </tr>                                            
                        <tr>
                        <td>
                            Supplier Address
                        </td>
                        <td>
                            <input type="text" class="form-control input-sm" value="<?php echo $fetch['supplierAddress']?>" name="supplierAddressUpdate">
                        </td>    
                        </tr>                                             
                        <tr>
                        <td>
                            Contact Person
                        </td>
                        <td>
                            <input type="text" class="form-control input-sm" value="<?php echo $fetch['supplierContactPerson']?>" name="supplierContactPersonUpdate">
                        </td>    
                        </tr>                                                
                </table>
                </div>
                <div class="modal-footer">     
                    <input type="hidden" value="<?php echo $fetch['supplierID']?>" name="supplierID">
                    <input type="submit" class="btn btn-default" style="width: 90px;" value="Save">
                    <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
                </div>
                </div> 
            </form>
        </div>
    </div>   
<?php
    }
?>