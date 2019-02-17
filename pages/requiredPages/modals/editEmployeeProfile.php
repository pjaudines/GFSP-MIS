<?php
        require '../../php/databaseConn.php';
        $query = $conn->query("SELECT * FROM `employees`") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
    ?>
    <div class="modal fade" id="edit<?php echo $fetch['employeeID'];?>" role="dialog" style="width: 600px; top: 20%;left: 35%;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form action="../../php/masterfiles/employee/updateEmployee.php" method="post" onsubmit="return confirm('Save the changes?');">
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
                        <input type="text" class="form-control input-sm" aria-controls="dataTables-example" value="<?php echo $fetch['employeeName']?>" name="employeeNameUpdate">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['employeeEmail']?>" name="employeeEmailUpdate">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Contact No.
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['employeeContactNo']?>" name="employeeContactNoUpdate">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Employee Address
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" value="<?php echo $fetch['employeeAddress']?>" name="employeeAddressUpdate">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Position
                    </td>
                    <td>
                        <select style="padding: 3px;" class="form-control" name="employeePositionUpdate">
                            <?php
                                $pos = $fetch['employeePosition']
                            ?>
                            <option value="Account Executive" <?php if($pos == 'Account Executive'){echo "selected";}?>>ACCOUNT EXECUTIVE</option>
                            <option value="Secretary" <?php if($pos == 'Secretary'){echo "selected";}?>>SECRETARY</option>
                            <option value="Technician" <?php if($pos == 'Technician'){echo "selected";}?>>TECHNICIAN</option>
                        </select>
                    </td>    
                    </tr>
            </table>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $fetch['employeeID']?>" name="employeeID">
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