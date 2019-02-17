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
  <script src="../../js/jquery.min.js"></script>
  
  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
  ?>

  <script>  
  function displayClients(){
        $.ajax({
                url: "../../php/notifications/email/displayClients.php",
                type: "POST",
                success: function(result){
                  $("#clientsTbl").html(result);
                  $('#clientsTable').dataTable();
                }
        });
    }

    $(document).ready(function(){
        $("#clientsTable").dataTable();
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

        displayClients();
        
        //SENDING EMAIL
        $("#sendEmail").click(function(){

            var clientEmail = $('#txtClientEMail').val();
            var txtSubject = $("#txtSubject").val();
            var txtBody = $("#txtBody").val();

            $.ajax({
              url: "../../php/notifications/email/PHPMailer/sendEmail.php",
              type: "POST",
              data: {clientEmail:clientEmail, txtSubject:txtSubject, txtBody:txtBody},
              success: function(result){
                alert(result);
              }
            });

        });

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
          <div class="row purchace-popup">
          
            <div class="col-12">                            
                <!--INSERT CODE HERE -->       
                <div class="card">
                
                  <div class="card-body">      
                  <?php
                      if(isset($_POST['clientControlNo'])){
                        include "../requiredPages/modals/emailFormModal2.php";
                    ?>
                      <script>
                        $(document).ready(function(){
                            $("#emailToModal").modal("show");
                        });
                      </script>
                    <?php
                    }
                    ?>
                    <div class="table-responsive" id="clientsTbl">
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <?php
             include "../requiredPages/modals/emailFormModal.php";
            
        ?>
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