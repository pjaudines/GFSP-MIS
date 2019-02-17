<table class="table datatable" id="itemsTable" content-editable>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Type</th>
            <th>Available stocks</th>
            <th>Incoming</th>
            <th>Outgoing</th>
            <th>Re-Order Point</th>
            <th>Action</th>
        </tr>
    </thead>                                    
        <tbody id="itemsTbody">
<?php
    require '../../php/databaseConn.php';
    $query = $conn->query("select * from `inventory`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>
    <tr>
        <td><?php echo $fetch['prodDesc']?></td>
        <td><?php echo $fetch['prodType']?></td>
        
        <td style="color: 
        <?php if($fetch['prodStocks'] < $fetch['reorderPoint'])
         { echo "red;";}
         else{
            if($fetch['prodStocks'] <= $fetch['reorderPoint'] + $fetch['reorderPoint']/2)
            {
                echo "orange;";
            }else{
                echo "green;";
            }
         }
         ?>">
         
         <?php echo $fetch['prodStocks']?></td>

        <td><?php echo $fetch['prodIncoming']?></td>
        <td><?php echo $fetch['prodOutgoing']?></td>
        <td><?php echo $fetch['reorderPoint']?>
        <td style="padding: 0;">
        <button type="button" class="btn btn-primary btn-rounded btn-icons" data-toggle="modal" data-target="#itemEditStocks"><i class="menu-icon mdi mdi-pencil"></i></button>
        <?php
            if($fetch['prodStocks'] <= $fetch['reorderPoint']){
        ?>
        <button type="button" class="btn btn-rounded btn-success btn-icons"><i class="menu-icon mdi mdi-plus-circle"></i></button>
        <script>
            $(document).ready(function(){
                $("#reorderPointReached").fadeIn();
            });
        </script>
        <?php  
            }
        ?>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>