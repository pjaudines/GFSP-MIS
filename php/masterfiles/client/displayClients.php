<table class="table datatable" id="clientsDataTable">
                        <thead>
                          <tr>
                              <th>Client Control No</th>
                              <th>Client Name</th>
                              <th>Client Address</th>
                              <th>Client Contact Number</th>
                              <th>Client Email</th>
                              <th>Client Contact Person</th>
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
                                    <td><?php echo $fetch['clientAddress']?></td>
                                    <td><?php echo $fetch['clientContactNo']?></td>
                                    <td><?php echo $fetch['clientEmail']?></td>
                                    <td><?php echo $fetch['clientContactPerson']?></td>
                                    <td style="padding: 0;">
                                        <div class="row">
                                            <button style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-primary" href="#edit<?php echo $fetch['clientControlNo'];?>" data-target="#edit<?php echo $fetch['clientControlNo'];?>" data-toggle="modal"><i class='menu-icon mdi mdi-pencil'></i></button>                                                                
                                            <form style="margin:0;" action="../../php/masterfiles/client/deleteClient.php" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $fetch['clientName']?>?');" >                                                                
                                            <input type="hidden" value="<?php echo $fetch['clientControlNo']?>" name="clientControlNo">
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