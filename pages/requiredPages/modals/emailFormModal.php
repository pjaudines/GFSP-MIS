<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("select * from `clients`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <div class="modal fade" id="emailTo<?php echo $fetch['clientControlNo']?>Modal" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 600px;">
            <!-- Modal content-->
            <form method="POST" action="../../php/notifications/email/PHPMailer/sendEmail.php">
            <div class="modal-content">
            <div class="modal-header">
                Send email to <?php echo $fetch['clientEmail'] ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label>Send to</label>
                <input type="text" value='<?php echo $fetch['clientEmail']?>' disabled id="txtClientEMail" class="form-control" name="txtClientEMail">
                <label>Subject</label>
                <input type="text" id="txtSubject" class="form-control" name="txtSubject" required>
                <label>Body</label>
                <textarea class="form-control" style="height: 200px;" id="txtBody" name="txtBody" required></textarea>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?php echo $fetch['clientEmail']?>" name="clientEmail">
                <button type="submit" class="btn btn-default" style="width: 90px;" id="sendEmail" name="sendEmail">Send</button>
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
    </div>
</div>
    </form>
<?php
    }
?>