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
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Clients Table</h4>
                                    <div id="alert" class="alert alert-success" style="display:none;">
                                        <center><span id="alerttext"></span></center>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="clients" class="table table-striped" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Client ID</th>
                                                    <th>Client Name</th>
                                                    <th>Client Address</th>
                                                    <th>Client Contact No</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require '../../php/databaseConn.php';
                                                $query = $conn->query("select * from `clients`") or die(mysqli_error());
                                                while($fetch = $query->fetch_array()){
                                                ?>                                      
                                                <tr>
                                                    <td><?php echo $fetch['clientControlNo']?></td>
                                                    <td><?php echo $fetch['clientName']?></td>
                                                    <td><?php echo $fetch['clientAddress']?></td>
                                                    <td><?php echo $fetch['clientContactNo']?></td>
                                                    <td>
                                                        <a href="salestransaction.php?clientControlNo=<?php echo $fetch['clientControlNo']?>&clientName=<?php echo $fetch['clientName']?>" class="btn btn-xs btn-success">Proceed</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
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
        <script type="text/javascript" src="../../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../../ajax/purchase.js"></script>
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <script src="../../vendors/js/vendor.bundle.addons.js"></script>
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/misc.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

        <script src="assets/js/custom.js"></script>
        <script>
            $(document).ready(function () {
                $('#clients').dataTable();
            });
        </script>


        <!-- AJAX Script Add Product -->

    </body>
</html>