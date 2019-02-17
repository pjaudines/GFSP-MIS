<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("SELECT * FROM `clients` where `clientControlNo` = ".$_POST['clientControlNo']."") or die(mysqli_error());   
    $fetch = $query->fetch_array();
?>

<div class="modal fade" id="emailToModal" role="dialog" style="width: 100%:">
    <div class="modal-dialog" style="max-width: 600px;">
        <!-- Modal content-->
        <form method="POST" action="../../php/notifications/email/PHPMailer/sendEmail.php">
        <div class="modal-content">
            <div class="modal-header">
                Send email to <?php echo $fetch['clientName'] ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label>Send to</label>
                <input type="text" value='<?php echo $fetch['clientEmail']?>' disabled id="txtClientEMail" class="form-control" name="txtClientEMail">
                <label>Subject</label>
                <input type="text" id="txtSubject" class="form-control" name="txtSubject" required value="Fire Safety Products Expiring">
                <label>Body</label>
                <textarea class="form-control" style="height: 200px;" id="txtBody" name="txtBody" required>Good day <?php echo $fetch['clientName']?>, you have items expiring.
Please contact us now.</textarea>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="kurtdelatorre10@gmail.com" name="clientEmail">
                <button type="submit" class="btn btn-default" style="width: 90px;" id="sendEmail" name="sendEmail">Send</button>
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </div>
            </div>
    </div>
</div>
</form>
