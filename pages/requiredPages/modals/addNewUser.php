<?php
     require '../../php/databaseConn.php';
?>
<div class="modal fade" id="addNewUser" role="dialog" style="width:100%;">
    <div class="modal-dialog" style="max-width: 600px;">
            <!-- Modal content-->
            
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            <div class="row">
                <div class="col-sm-12">
                    <label>Username</label>
                    <input type="text" class="form-control input-sm" aria-controls="dataTables-example" name="username" id="txtUsername">
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-12">
                <label>Password</label>
                <input type="password" class="form-control input-sm" name="password" id="txtPass1">
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-12">
                <label>Confirm Password</label>
                <input type="password" class="form-control input-sm" name="password" id="txtPass2">
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-sm-12">
                <label>Owner</label>
                <select class="form-control" name="userOwner" id="selectUserOwner">
                    <option value="none">Select Employee</option>
                    <?php
                        $query = $conn->query("SELECT * FROM `employees` WHERE `hasAccount` = 0") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                        <option value="<?php echo $fetch['employeeID']?>"> <?php echo $fetch['employeeName']?></option>
                    <?php
                        }
                    ?>
                </select>
                </div>
            </div>
            </table>
            <br>
            <div class="alert alert-danger" style="display: none;" id="requiredFieldsError">
                <p>All fields are required!</p>
            </div>
            <div class="alert alert-danger" style="display: none;" id="passwordDoesNotMatch">
                <p>Password does not match.</p>
            </div>
            <div class="alert alert-success" style="display: none;" id="accountCreationSuccess">
                <p>Account created!</p>
            </div>
            </div>
            <div class="modal-footer">     
                <button type="button" class="btn btn-default" style="width: 90px;" id="btnAddNewUser">Add</button>
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
    </div>
</div>
<?php
     $conn->close();
?>