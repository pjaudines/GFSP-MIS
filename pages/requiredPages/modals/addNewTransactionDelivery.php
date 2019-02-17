<?php
     require '../../php/databaseConn.php';
?>
<script>
    $(document).ready(function(){

        $("#selectClientName").change(function(){
        var clientName = $("#selectClientName option:selected").val();
        $.post("../../php/transactions/delivery/selectSalesID.php",{clientName: clientName}, function(data, status){
            $("#selectSalesID").html(data);
        });
      });

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
<div class="modal fade" id="addNewTransactionDelivery" role="dialog" style="width: 100%;">
        <div class="modal-dialog" style="max-width: 500px;">
            <!-- Modal content-->
            <form action="../../php/transactions/delivery/createDelivery.php" method="post" method="post" onsubmit="return confirm('Create a delivery transaction?');" >
            <div class="modal-content">
            <div class="modal-header">
                <h5>New Delivery</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>                                           
            <div class="modal-body">                                         
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-3">
                        <label>Delivery ID</label>
                        <input type="text" id="txtDeliveryID" class="form-control" disabled>
                    </div>
                    <div class="col-sm-9">
                    <label>
                         Client
                    </label>
                    <select class="form-control select2" name="clientName" id="selectClientName" style="width: 100%;">
                    <option value="none">Select Client</option>
                    <?php
                        $query = $conn->query("SELECT DISTINCT `clientName` FROM `transactions_sales` WHERE `deliveryID` = 0 ORDER BY `clientName`") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                        <option value="<?php echo $fetch['clientName']?>"><?php echo $fetch['clientName']?></option>
                    <?php
                        }
                    ?>
                </select>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Schedule of Delivery</label>
                        <input type="date" class="form-control" id="deliveryDate">
                    </div>
                    <div class="col-sm-6">
                        <label>Select Sales ID</label>
                        <select class="form-control" id="selectSalesID" name="salesID">
                            <option value="none">Select Client First</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="alert alert-danger" style="display:none;" id="requireError">
                        All fields are required!
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
                <!-- <input type="hidden" value="" name="date"> -->
                <input type="hidden" id="selectedDate" name="selectedDate">
                <input type="button" class="btn btn-default" style="width: 90px;" value="Create" id="btnAddDelivery">                
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
            </form>
    </div>
</div>
<?php     
     $conn->close();
?>