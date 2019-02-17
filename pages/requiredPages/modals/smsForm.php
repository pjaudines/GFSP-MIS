<?php
    if(isset($_POST['send'])){
    
    include('smsgateway.php');
    $smsGateway = new SmsGateway("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0NzcxNzYzNSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY2ODMxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.9cx4a0w9foffMfjvB0a7uSxt4lLWkVTYhBNqAUCyqPs","dmidster001@gmail.com","community1120");
    $deviceID = 108333;
    $txtBody =$_POST['txtBody'] ;
    $clientContactNo = $_POST['clientContactNo'];
    $options = [
        'send_at' => strtotime('+30 seconds'), // Send the message in 10 minutes
        'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
    ];

    $result = $smsGateway->sendMessageToNumber($clientContactNo, $txtBody, $deviceID, $options);
    if ($result) {
        echo json_encode($result);
    }
    else {
        echo "Something went wrong";
    }

}
?>
<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("select * from `clients`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <form method="POST" action="sms.php">
    <div class="modal fade" id="emailTo<?php echo $fetch['clientControlNo']?>Modal" role="dialog" style="width: 100%:">
        <div class="modal-dialog" style="max-width: 600px;">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                Send message to <?php echo $fetch['clientContactNo'] ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <label>Send to</label>
                <input type="text" value='<?php echo $fetch['clientContactNo']?>' disabled id="txtClientContactNo" class="form-control">
                <label>Body</label>
                <textarea class="form-control" style="height: 200px;" id="txtBody" name="txtBody"></textarea>
            </div>

            <div class="modal-footer">
            <form method="post">
            <input type="hidden" value="<?php echo $fetch['clientContactNo']?>" name="clientContactNo">
            <input type="submit" class="btn btn-default" id="txtBody" style="width: 90px;" name="send" value="Send">  
                <a href="#" class="btn btn-default" style="width: 90px;" data-dismiss="modal">Cancel</a>
            </form>
            </div>
            </div>
    </div>
</div>
</form>
<?php
    }
?>