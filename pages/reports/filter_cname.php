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
            <body>
        <div class = "btn-group pull-right">
                        <div class = "pull-left">
                            <button class = "btn btn-default btn-sm" onclick = "printContent('print')">Print</button>
                        </div>
                        
                        </div>
            
        
        <div id = "print">
            
        <div class="panel-body">
                        
            <div class="col-md-6">
                <div id="casket_name" style="width: 100%; height: 400px"></div>
                
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <?php
        $conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
        $charity1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
        $fcharity1 = $charity1->fetch_array();
        $charity2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
        $fcharity2 = $charity2->fetch_array();
        $charity3 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
        $fcharity3 = $charity3->fetch_array();
        $charity4 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
        $fcharity4 = $charity4->fetch_array();
        $charity5 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'May' && `year` = '$year'") or die(mysqli_error());
        $fcharity5 = $charity5->fetch_array();
        $charity6 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
        $fcharity6 = $charity6->fetch_array();
        $charity7 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
        $fcharity7 = $charity7->fetch_array();
        $charity8 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
        $fcharity8 = $charity8->fetch_array();
        $charity9 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Sep' && `year` = '$year'") or die(mysqli_error());
        $fcharity9 = $charity9->fetch_array();
        $charity10 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
        $fcharity10 = $charity10->fetch_array();
        $charity11 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
        $fcharity11 = $charity11->fetch_array();
        $charity12 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 1 && `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
        $fcharity12 = $charity12->fetch_array();

        $conn = new mysqli("localhost", "root", "", "alisbo") or die(mysqli_error());
        $Pioneer1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
        $fPioneer1 = $Pioneer1->fetch_array();
        $Pioneer2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
        $fPioneer2 = $Pioneer2->fetch_array();
        $Pioneer3 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
        $fPioneer3 = $Pioneer3->fetch_array();
        $Pioneer4 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
        $fPioneer4 = $Pioneer4->fetch_array();
        $Pioneer5 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'May' && `year` = '$year'") or die(mysqli_error());
        $fPioneer5 = $Pioneer5->fetch_array();
        $Pioneer6 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
        $fPioneer6 = $Pioneer6->fetch_array();
        $Pioneer7 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
        $fPioneer7 = $Pioneer7->fetch_array();
        $Pioneer8 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
        $fPioneer8 = $Pioneer8->fetch_array();
        $Pioneer9 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Sep' && `year` = '$year'") or die(mysqli_error());
        $fPioneer9 = $Pioneer9->fetch_array();
        $Pioneer10 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
        $fPioneer10 = $Pioneer10->fetch_array();
        $Pioneer11 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
        $fPioneer11 = $Pioneer11->fetch_array();
        $Pioneer12 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `clientControlNo` = 2 && `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
        $fPioneer12 = $Pioneer12->fetch_array();
                        ?>

        <script>
            $(document).ready(function(){
                $("#pyear").on('change', function(){
                    var year=$(this).val();
                    window.location = 'reports.php?year='+year;
                });
            });
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