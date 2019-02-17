<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gibrosen Fire Safety Products MIS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/kei.css">
  <script src="js/jquery.min.js"></script>
  <script>

    $(document).ready(function(){

      $("#btnLogin").click(function(){
        var username = $("#txtUsername").val();
        var password = $("#txtPassword").val();
        if(username == "" || password == ""){
          if(username == ""){

            $("#errorMessage").html("<span class='fa fa-exclamation-circle'>Password is requried!");//SETS ERROR WHEN PASSWORD IS 
          }else{
            $("#errorMessage").html("");
          }

          if(password == ""){
            $("#errorMessage").html("<span class='fa fa-exclamation-circle'>Password is requried!");//SETS ERROR
          }else{
            $("#errorMessage").html("");
          }
          
          if(username == "" && password == ""){
            $("#errorMessage").html("<span class='fa fa-exclamation-circle'>Username and Password is requried!");//SETS ERROR
          }
          $("#errorFieldRequired").show();
        }else{
          $.ajax({
                url: "php/login.php",
                type: "POST",
                data: {username:username,password:password},
                success: function(result, status){
                  if(result == "success"){
                    $("#errorFieldRequired").hide();
                    $("#loginSucess").show();
                    setTimeout(function(){
                      window.location.replace("index.php");
                    }, 2000);
                  }else{
                    $("#errorMessage").html("<span class='fa fa-exclamation-circle'>Wrong username and password");//SETS ERROR
                    $("#errorFieldRequired").show();
                  }
                }
        });
        }
      });
    });
  </script>
</head>

<body>  
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <div class="form-group">
                  <div class="alert alert-danger" id="errorFieldRequired" style="display: none;">
                  <p id="errorMessage"></p>
                </div>
        <div class="alert alert-success" id="loginSucess" style="display: none;">
                <p id="successMessage">Login Sucess!</p>
                <label>You will be redirected shortly after.</label>
        </div>
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" required name="username" id="txtUsername">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" required name="password" id="txtPassword">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block" id="btnLogin">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div> -->
                <!-- <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div> -->
            </div>
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>

</html>