<table class="table datatable" id="maintenanceDataTable">
                            <thead>
                                  <tr>
                                      <th>Maintenance ID</th>
                                      <th>Client Name</th>
                                      <!-- <th>Item Name</th>
                                      <th>Item Type</th>     -->                            
                                      <th>Creation Date</th>                    
                                      <th>Maintenance Date</th>
                                      <th>Action</th>                                       
                                  </tr>
                            </thead>
                            <tbody>
                            <?php
                                    require '../../databaseConn.php';
                                    $query = $conn->query("select * from `transactions_maintenance` ORDER BY `maintenanceID` DESC") or die(mysqli_error());
                                    while($fetch = $query->fetch_array()){
                                ?>
                                    <tr>
                                        <td><?php echo $fetch['maintenanceID']?></td>
                                        <td><?php echo $fetch['maintenanceClientName']?></td>
                                        <td><?php echo $fetch['creationDate']?></td>
                                        <td><?php echo $fetch['maintenanceDate']?></td>                        
                                        <td style="padding: 0; ">
                                            <div class="row">
                                                <form action="maintenance-addItems.php" method="POST">
                                                <input type="hidden" value="<?php echo $fetch['maintenanceID']?>" name="maintenanceID">
                                                <input type="hidden" id="maintenanceDate" name="maintenanceDate">
                                                <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-cart'></i></button>
                                                </form>
                                                <form style="margin:0;" action="../../php/transactions/maintenance/deleteMaintenance.php" method="post" onsubmit="return confirm('Are you sure you want to delete record?');" >
                                                <input type="hidden" value="<?php echo $fetch['maintenanceID']?>" name="maintenanceID">       
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