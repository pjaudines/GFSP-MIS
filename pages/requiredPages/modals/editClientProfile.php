<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("SELECT * FROM `clients`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
            <div class="modal fade" id="edit<?php echo $fetch['clientControlNo'];?>" role="dialog" style="width: 100%; ">
                        <div class="modal-dialog" style="max-width: 700px;">
                            <!-- Modal content-->
                            <form action="../../php/masterfiles/client/updateClient.php" method="post" onsubmit="return confirm('Save the changes?');">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit</h4>    
                                <button type="button" class="close" data-dismiss="modal">&times;</button>                                    
                            </div>                                           
                            <div class="modal-body">                                         
                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">                                              
                                    <tr>
                                    <td>
                                            Name
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" aria-controls="dataTables-example" value="<?php echo $fetch['clientName']?>" name="clientNameUpdate">
                                    </td>    
                                    </tr>
                                    <tr>
                                    <td>
                                        Client Address
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['clientAddress']?>" name="clientAddressUpdate">
                                    </td>    
                                    </tr>                                                                                 
                                    <tr>
                                    <td>
                                        Contact No.
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['clientContactNo']?>" name="clientContactNoUpdate">
                                    </td>    
                                    </tr>                                            
                                    <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['clientEmail']?>" name="clientEmailUpdate">
                                    </td>    
                                    </tr>                                       
                                    <tr>
                                    <td>
                                        Contact Person
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['clientContactPerson']?>" name="clientContactPersonUpdate">
                                    </td>    
                                    </tr>                                                
                            </table>
                            </div>
                            <div class="modal-footer">     
                                <input type="hidden" value="<?php echo $fetch['clientControlNo']?>" name="clientControlNo">
                                <button type="submit" class="btn btn-success btn-fw" style="width: 90px;"><i class="mdi mdi-check"></i>Save</button>
                                <button type="button" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>  
                        </form>
                
                    </div>
                </div>  
            <?php
    }
?>      