<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gibrosen Fire Safety Products MIS</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../images/favicon.png" />

    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <?php
            require "../requiredPages/pagesNav.php";
            ?>
            <div class="main-s">
                <div class="content-wrapper">
                    <div class="row">
                        <?php
                        require '../../php_scripts/databaseConn.php';
                        $query = $conn->query("SELECT * FROM `clients` WHERE `clientControlNo` = '$_GET[clientControlNo]'") or die(mysqli_error());
                        $fetch = $query->fetch_array();
                        ?>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Sales Transaction - <?php echo $fetch['clientName']?></h4>
                                    <div id="alert" class="alert alert-success" style="display:none;">
                                        <center><span id="alerttext"></span></center>
                                    </div>
                                    <a href="#newitem" class="btn btn-sm btn-success" data-toggle="modal">New Product</a>
                                    <a href="#newitem" class="btn btn-sm btn-primary" data-toggle="modal">Complete Sales Transaction</a>
                                    <br><br>
                                    <div class="table-responsive">
                                        <div id="purchaseorderTable"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->
            </div>
        </div>

        <!-- New Purchase Order -->
        <div class="modal fade newitem" id="newitem" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <div id="modallabel" class="alert alert-danger" style="display:none;">
                                <center><span id="checkfield"></span></center>
                            </div>
                        </center>
                        <h4 class="modal-title">Purchase Order</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Client Name</label>
                                        <input type="hidden" id="client_id" name="client_id" value="<?php echo $fetch['clientControlNo']?>" >
                                        <input type="text" class="form-control input-sm" id="client_name" name="client_name" value="<?php echo $fetch['clientName']?>" readonly required/>
                                    </div>
                                    <div class="form-group">
                                        <label >Terms</label>
                                        <select class="form-control" name="terms" id="terms">
                                            <option>Select</option>
                                            <option>Cash</option>
                                            <option>Cheque</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label >Product</label>
                                        <select class="form-control" id="product" name="product">
                                            <option>
                                                Select Product
                                            </option>
                                            <?php
    require '../../php_scripts/databaseConn.php';
                                        $query = $conn->query("select * from `products`") or die(mysqli_error());
                                        while($fetch = $query->fetch_array()){
                                            ?>  
                                            <option value="<?php echo $fetch['prodType']?>">
                                                <?php 
                                                echo $fetch['prodType']
                                                ?>
                                            </option>
                                            <?php 
                                        }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label >Quantity</label>
                                        <input type="text" class="form-control input-sm" id="quantity" name="quantity" placeholder="Enter Product Description" required/>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end panel -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" value="<?php echo $_GET['clientControlNo']; ?>" id="addnew" class="btn btn-sm btn-success m-r-5">Add Item</button>
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../../ajax/purchase.js"></script>
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <script src="../../vendors/js/vendor.bundle.addons.js"></script>
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/misc.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

        <script src="assets/js/custom.js"></script>


        <!-- AJAX Script Add Product -->

    </body>
</html>