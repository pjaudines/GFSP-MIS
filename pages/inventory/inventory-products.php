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
            require "../requiredPages/transactionsSideNav.php";
            ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Inventory Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="inventory">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Item No.
                                                    </th>
                                                    <th>
                                                        In-Stock
                                                    </th>
                                                    <th>
                                                        Incoming
                                                    </th>
                                                    <th>
                                                        Outgoing
                                                    </th>
                                                    <th>
                                                        Available
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        FE3132
                                                    </td>
                                                    <td>
                                                        Herman Beck
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $ 77.99
                                                    </td>
                                                    <td>
                                                        May 15, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        FE3133
                                                    </td>
                                                    <td>
                                                        Messsy Adam
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $245.30
                                                    </td>
                                                    <td>
                                                        July 1, 2015
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        FE3132
                                                    </td>
                                                    <td>
                                                        John Richards
                                                    </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        $138.00
                                                    </td>
                                                    <td>
                                                        Apr 12, 2015
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Products Table</h4>
                                    <div id="alert" class="alert alert-success" style="display:none;">
                                        <center><span id="alerttext"></span></center>
                                    </div>

                                    <a href="#newproduct" class="btn btn-sm btn-success" data-toggle="modal">New Product</a>
                                    <br><br>
                                    <div class="table-responsive">
                                        <div id="productsTable"></div>
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

        <!-- New Product -->
        <div class="modal fade addproduct" id="newproduct" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <div id="modallabel" class="alert alert-danger" style="display:none;">
                                <center><span id="checkfield"></span></center>
                            </div>
                        </center>
                        <h4 class="modal-title">New Product</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Product Type</label>
                                        <input type="text" class="form-control input-sm" id="prodType" name="prodType" placeholder="Enter Product Type" required/>
                                    </div>
                                    <div class="form-group">
                                        <label >Product Description</label>
                                        <input type="text" class="form-control input-sm" id="prodDesc" name="prodDesc" placeholder="Enter Product Description" required/>
                                    </div>
                                    <div class="form-group">
                                        <label >Unit Price</label>
                                        <input type="text" class="form-control input-sm" id="unitPrice" name="unitPrice" placeholder="Enter Unit Price" required/>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end panel -->
                    </div>
                    <div class="modal-footer">
                        <button type = "button" id="addnew" class = "btn btn-sm btn-success">Save</button>
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
 
        <script type="text/javascript" src="../../js/jquery-1.9.1.min.js"></script>
        <script src="../../vendors/js/vendor.bundle.base.js"></script>
        <script src="../../vendors/js/vendor.bundle.addons.js"></script>
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/misc.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#inventory').dataTable();

                $("#selectClientID").change(function(){
                    var clientName = $("#selectClientID option:selected").val();                
                    $('#txtClientName').val(clientName);
                });
            });
        </script>
        <script src="assets/js/custom.js"></script>


        <!-- AJAX Script Add Product -->
        <script type="text/javascript" src="../../ajax/products.js"></script>
    </body>
</html>