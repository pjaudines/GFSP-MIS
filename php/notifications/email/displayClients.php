
<table class="table datatable" id="clientsTable" content-editable>
    <thead>
        <tr>
            <th>Client Control No</th>
            <th>Client Name</th>
            <th>Client Email</th>
            <th>Action</th>
        </tr>
    </thead>                                    
    <tbody>
<?php
    require '../../databaseConn.php';
    $query = $conn->query("select * from `clients`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['clientControlNo']?></td>
        <td><?php echo $fetch['clientName']?></td>
        <td><?php echo $fetch['clientEmail']?></td>
        <td style="padding: 0; text-align:center;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#emailTo<?php echo $fetch['clientControlNo']?>Modal"><i class="menu-icon mdi mdi-email"></i>E-MAIL</button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
        </tbody>
</table>