<div class="col-md-2">
    <div class="form-group">
        Select Year:
        <select  class="form-control selectpicker input-sm" data-style="btn-primary" id="pyear">
            <option value="month" selected disabled>Select Year</option>
            <option value="<?php 
                           if(isset($_GET['year'])){
                               $value=$_GET['year']; 
                               echo $value;
                           }
                           else{
                               echo date('Y');
                           }
                           ?>">
                <?php 
                if(isset($_GET['year'])){
                    $value=$_GET['year']; 
                    echo $value;
                }
                else{
                    echo date('Y');
                }
                ?></option>

            <?php
            require '../databaseConn.php';
            $query = $conn->query("SELECT * FROM `clients` group by year") or die(mysqli_error());

            while($fetch = $query->fetch_array()){
            ?>
            <option value="<?php echo $fetch['year'];?>"><?php echo $fetch['year']?></option>
            <?php
            }
            ?> 
        </select>
    </div>
</div>