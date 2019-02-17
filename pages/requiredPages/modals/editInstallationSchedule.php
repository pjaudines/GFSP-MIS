<?php
        require '../../php/databaseConn.php';
        $query = $conn->query("SELECT * FROM `transactions_installation`") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
    ?>
    <div class="modal fade" id="editInstallation" role="dialog" style="width: 600px; top: 20%;left: 30%;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form action="../../php/transactions/schedule/updateScheduleInstallation.php" method="post" onsubmit="return confirm('Save the changes?');">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit schedule of Installation ID No. <?php echo $fetch['installationID']?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">  
                    <tr>
                    <td>
                        End Date
                    </td>
                    <td>
                        <input type="date" class="form-control input-sm" value="<?php echo $fetch['EndDate']?>" name="EndDate">
                    </td>
                    </tr>
                    <tr>
            </table>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $fetch['installationID']?>" name="installationID">
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