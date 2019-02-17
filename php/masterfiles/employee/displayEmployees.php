<table class="table datatable" id="employeesDataTable">
    <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Employee COntact No</th>
                    <th>Employee Address</th>
                    <th>Employee Position</th>                                        
                    <th>Action</th>
                </tr>
    </thead>
    <tbody>    
        <?php
            require '../../databaseConn.php';
            $query = $conn->query("select * from `employees` where employeeID > 1") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
        ?>                                      
            <tr>
                <td><?php echo $fetch['employeeName']?></td>                                    
                <td><?php echo $fetch['employeeEmail']?></td>
                <td><?php echo $fetch['employeeContactNo']?></td>
                <td><?php echo $fetch['employeeAddress']?></td>
                <td><?php echo $fetch['employeePosition']?></td>
                <td style="padding: 0;">
                    <div class="row">
                        <button style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-primary" href="#edit<?php echo $fetch['employeeID'];?>" data-target="#edit<?php echo $fetch['employeeID'];?>" data-toggle="modal"><i class='menu-icon mdi mdi-pencil'></i></button>                                                                
                        <form style="margin:0;" action="../../php/masterfiles/employee/deleteEmployee.php" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $fetch['employeeName']?>?');" >                                                                
                        <input type="hidden" value="<?php echo $fetch['employeeID']?>" name="employeeID">
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