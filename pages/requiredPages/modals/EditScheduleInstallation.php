<?php
        require '../../php/databaseConn.php';
        $query = $conn->query("SELECT * FROM `schedinstallation`") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
    ?>
    <div class="modal fade" id="edit<?php echo $fetch['installationID'];?>" role="dialog" style="width: 600px; top: 20%;left: 35%;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form action="../../php/transactions/schedule/updateScheduleInstallation.php" method="post" onsubmit="return confirm('Save the changes?');">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                    <td>                
                            Client
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" aria-controls="dataTables-example" value="<?php echo $fetch['clientName']?>" name="clientName">
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Start Date
                    </td>
                    <td>
                        <input type="date" class="form-control input-sm" value="<?php echo $fetch['startDate']?>" name="startDate">
                    </td>
                    </tr>
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