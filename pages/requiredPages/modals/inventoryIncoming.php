<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("SELECT * FROM `inventory_prodincoming`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
<div class="modal fade" id="arrivalDate<?php echo $fetch['prodIncomingID']?>" role="dialog" style="width: 100%:">
    <div class="modal-dialog" style="max-width: 350px;">
                <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label>Date</label>
                <input type="date" class="form-control" id="arrivalDate">
            </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" style="width: 90px;" value="Add" onclick="addIncomingProdSched(<?php echo $fetch['prodIncomingID']?>)">
                    <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
                </div>
                </div>
        </div>
</div>
<?php
    }
?>