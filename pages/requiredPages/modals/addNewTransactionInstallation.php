<?php
     require '../../php/databaseConn.php';
?>
<script>
    $(document).ready(function(){
        var k = new Date();
            var month = k.getMonth()+1;
            var year = k.getFullYear();
            var day = k.getDate();
            if(month < 10){
                month = "0"+month;
            }
            if(day < 10){
                day = "0"+day;
            }
            $("#selectedDate").val(year+"-"+day+"-"+month);
    });
</script>
<div class="modal fade" id="addNewTransactionInstallation" role="dialog" style="width: 100%;">
        <div class="modal-dialog" style="max-width: 500px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h5>New Installation</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>                                           
            <div class="modal-body">                                         
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-4">
                        <label>Installation ID</label>
                        <input type="text" class="form-control" id="txtInstallationID" disabled>
                    </div>
                    <div class="col-sm-8">
                    <label>
                         Client
                    </label>
                    <select class="form-control select2" name="clientName" style="width: 100%;" id="selectClientName">
                    <option value="none">Select client</option>
                    <?php
                        $query = $conn->query("SELECT * FROM `transactions_sales` ORDER BY `clientName`") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                        <option value="<?php echo $fetch['clientName']?>"> <?php echo $fetch['clientName']?></option>
                       
                    <?php
                        }
                    ?>
                </select>
                    </div>                    
                </div>       
                <div class="row">
                    <div class="col-sm-6">
                        <label>Installation Date</label>
                        <input type="date" class="form-control" id="installationStartDate">
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-sm-12">                        
                        <label>Date</label>
                        <input type="date" class="form-control" id="selectDate" required>
                    </div>
                </div> -->
                <br>
                <div class="alert alert-danger" id="requireError" style="display:none;">
                    <center>All fields are required!</center>
                </div>
                <div class="alert alert-success" id="addSuccess" style="display:none;">
                    <center>Add success!</center>
                </div>
                <div class="alert alert-info" id="confirmAdd" style="display:none;">
                    <center>
                        Do you really wanna add this entry?<br>
                        <button type="button" class="btn btn-success" id="btnConfirmAdd">Save</button>
                        <button type="button" class="btn btn-danger" id="btnCancelAdd">Cancel</button>
                    </center>
                </div>
            </div>
            <div class="modal-footer">                    
                <!-- <input type="hidden" value="" name="date"> -->
                <input type="hidden" id="selectedDate" name="selectedDate">
                <input type="button" class="btn btn-default" style="width: 90px;" value="Create" id="btnCreateInstallation">                
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>                                          
            </div>
    </div>
</div>
<?php     
     $conn->close();
?>