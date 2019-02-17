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
        <button type="button" class="btn btn-success btn-rounded btn-icons" data-toggle="modal" data-target="#itemStockCard<?php echo $fetch['inventoryItemID']?>"><i class="menu-icon mdi mdi-eye"></i></button>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
    </tbody>
</table>