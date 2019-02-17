<?php
     require '../../php/databaseConn.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#datepicker1").change(function(){
            format: "dd-M-yyy",
            todayHighlight: 'TRUE',
            autclose: true,
        }).on('changeDate', function(date) {
            $('#datepicker2').datepicker('setStartDate', $("#datepicker1").val());
        });
        $('#datepicker2').datepicker({
            format: "dd-M-yyy",
            todayHighlight: 'TRUE',
            autoclose: true,

        }).on('changeDate', function(date) {
            var start = $("#datepicker1").val();
            var startD = new Date(start);
            var end = $("#datepicker2".val();
            var diff = parseInt((endD.getTime() - startD.getTime()) / (24 * 3600 * 1000));
            $("#days").val(diff);
        });

    });
</script>
<div class="modal fade" id="addNewScheduleMaintenance" role="dialog" style="width: 100%;">
        <div class="modal-dialog" style="max-width: 400px;">
            <!-- Modal content-->
            <form action="../../php/transactions/schedule/createScheduleMaintenance.php" method="post" method="post" onsubmit="return confirm('Create a Maintenance transaction?');" >
            <div class="modal-content">
            <div class="modal-header">
                <h5>Schedule of Maintenance</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>                                           
            <div class="modal-body">                                         
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-12">
                    <label>
                         Client Name
                    </label>
                    <select class="form-control" name="clientName">
                    <?php
                        $query = $conn->query("SELECT * FROM `transactions_maintenance` order by `maintenanceClientName`") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                        <option value="<?php echo $fetch['maintenanceID']?>"><?php echo $fetch['maintenanceClientName']?></option>
                    <?php
                        }
                    ?>
                </select>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        <label>Transaction No.</label>
                        <select id="selectTransactionID" class="form-control">
                            <option>Select client</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">                        
                        <label>Start Date</label>
                        <input type="date" class="form-control datepicker" placeholder="Date" value = "Date" name="startDate" id="datepicker1" data-date-start-date="0d" required>
                    </div>
                    
                    <div class="col-sm-12">                        
                        <label>End Date</label>
                        <input type="date" class="form-control datepicker" placeholder="Date" value = "Date" name="EndDate" id="datepicker2" data-date-start-date="0d" required>
                    </div>
                    
                    <div class="col-sm-12">                        
                        <label>Duration</label>
                        <input type="text" class="form-control" name="duration" id="days" onkeyup="compute()" disabled>
                    </div>
                </div>       
            </div>
            <div class="modal-footer">     
                <!-- <input type="hidden" value="" name="date"> -->
                <input type="hidden" id="datepicker1" name="datepicker1">
                <input type="hidden" id="datepicker2" name="datepicker2">
                <input type="hidden" id="days" name="days">
                <input type="submit" class="btn btn-default" style="width: 90px;" value="Create">                
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>                                          
            </div>   
            </form>
    </div>
</div>
<?php     
     $conn->close();
?>