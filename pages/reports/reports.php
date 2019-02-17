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
  <link rel="stylesheet" href="../../css/kei.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/transactions/sales.js"></script>
  <script src="../../js/jquery.canvasjs.min.js"></script>
  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
    include "../../php/reports/clients.php";
    include "../../php/reports/sales.php";
    include "../../php/reports/purchases.php";
  ?>
  <script>

    
    
    $(document).ready(function(){

        //SIGN OUT BUTTON
        $("#btnSignOut").click(function(){
           $.ajax({
             url: "../../php/logout.php",
             type: "POST",
             success: function(){
               alert("Signed Out");
               setTimeout(function(){
          location.reload();
                }, 1000);
             }
           });
        });
        //END SIGNOUT
       
       var currentDate;

       getCurrentDate();
      
    });
  </script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      require "../requiredPages/pagesNav.php";
    ?>
    
      <div class="main-panel">
        <div class="content-wrapper">          
            <div class="col-12">

            <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="oWalkIn()>Walk In</a></li>
            <li><a href="#" onclick="oCompany()>Company</a></li>
            
          </ul>
        </div> 

              <div class="card">
                <div class="card-body"> 
                <div id="reportsClient">
                <h3>Client Reports</h3>
                  <div id="chartContainer1" style="width: 100%; height: 300px"></div>
                </div>

                <div class="btn-group pull-center">
            <div class="pull-center">
                <select id="pyear" class="validate[required] select" data-style="btn-primary" data-live-search="true">
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
                    for($y=2013; $y<=2025; $y++){
                    ?>
                    <option value="<?php echo $y ?>"><?php echo $y; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="panel-body">
            <div id="clientChart" style="width: 100%; height: 400px"></div>
        </div>
        <form method="post" action="reports.php">
            <input type="submit" class="btn btn-success" value="Back to Report Table" />

        </form>
        <script>
            $(document).ready(function(){
                $("#pyear").on('change', function(){
                    var year=$(this).val();
                    window.location = 'reports.php?year='+year;
                });
            });
        </script>
        <script>
            function oWalkIn() {
                myWindow = window.open("filter_cname.php?year=<?php echo $year?>", "", "width=1350, height=650");
            }
            
            function oCompany() {
                myWindow = window.open("filter_ctype.php?year=<?php echo $year?>", "", "width=1350, height=650");
            }
            
        </script>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>    
  <!-- End custom js for this page-->
</body>
</html>