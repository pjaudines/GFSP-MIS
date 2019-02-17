<tbody>
<?php
    require '../../databaseConn.php';    
    $query = $conn->query("select * from `transactions_purchaseorder-items` where `purchaseID` =".$_POST['purchaseID']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>

    <tr>
        <td><?php echo $fetch['itemName']?></td>
        <td><?php echo $fetch['itemType']?></td>
        <td><?php echo $fetch['Quantity']?></td>
        <td style="padding: 0;">
            <div class="row">
                <form action="../../pages/transactions/purchase-addItems.php" method="POST">
                    <input type="hidden" value="<?php echo $fetch['purchaseID']?>" name="purchaseID">                                            
                    <button type="submit" style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-pencil'></i></button>
                </form>
                
                    <input type="hidden" value="<?php echo $fetch['purchaseItemID']?>" name="purchaseItemID" id="purchaseItemID">
                    <button onclick="deletePO(<?php echo $fetch['purchaseItemID']?>,<?php echo $fetch['purchaseID']?>);" type="button" class="btn btn-icons btn-rounded btn-danger" id="btnDeleteItem" name="btnDeleteItem"><i class="menu-icon mdi mdi-delete"></i></button>               
                    
            </div>
        </td>
    </tr>
<?php
    }
    $conn->close();
?>
</tbody>