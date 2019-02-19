<table class="table datatable" id="installationDataTable">
    <thead>
            <tr>
                <th>Installation ID</th>
                <th>Client Name</th>
                <!-- <th>Item Name</th>
                <th>Item Type</th>     -->                            
                <th>Date Created</th>
                <th>Installation Date</th>
                <th>Action</th>                                
            </tr>
    </thead>
    <tbody>    
    <?php
            require '../../databaseConn.php';
            $query = $conn->query("select * from `transactions_installation`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
        ?>                                      
            <tr>
                <td><?php echo $fetch['installationID']?></td>
                <td><?php echo $fetch['installationClientName']?></td>
                <td><?php echo $fetch['creationDate']?></td>  
                <td><?php echo $fetch['installationStartDate']?></td>                                    
                <td style="padding: 0;">
                    <div class="row">
                        <!-- <button type="button" class="btn btn-icons btn-rounded btn-primary" id="changeDate" data-toggle="modal" data-target="#editInstallation"><i class="menu-icon mdi mdi-calendar"></i></button> -->
                        <form action="installation-addItems.php" method="POST">
                        <input type="hidden" value="<?php echo $fetch['installationID']?>" name="installationID">
                        <input type="hidden" id="installationDate" name="installationDate">
                        <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-cart'></i></button>
                        </form>
                        <form style="margin:0;" action="../../php/transactions/maintenance/deleteInstallation.php" method="post" onsubmit="return confirm('Are you sure you want to delete   ?');" >
                        <input type="hidden" value="<?php echo $fetch['installationID']?>" name="installationID">       
                        <button type="submit" class="btn btn-icons btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
                        </form>    
                    </div>                                                      
                </td>
            </tr>
        <?php
            }
            $conn->close();
        ?>    
    </tbody>
</table>