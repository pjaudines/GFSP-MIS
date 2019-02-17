<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="index.html">
          <img src="../../images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="../../images/logo-mini.svg" alt="logo" />
        </a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-divider"></div>
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                     Purhcase ordeed received.
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">            
              <span class="profile-text">Hello, <?php echo $_SESSION['userOwner']?> !</span>
              <img class="img-xs rounded-circle" src="../../images/faces/face1.jpg" alt="Profile image">              
                <button type="button" id="btnSignOut" class="btn btn-danger btn-rounded btn-icons"><i class="menu-icon mdi mdi-power"></i></button>
            </a>
          </li>
        </ul>        
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="../../images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['userOwner']?></p>
                  <div>
                  <small class="designation text-muted"><?php echo $_SESSION['userPosition']?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dataentry-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Data Entry</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dataentry-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../masterfiles/client.php">Client</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../masterfiles/employee.php">Employee</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../masterfiles/supplier.php">Suppliers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../masterfiles/products.php">Products</a>
                </li>
              </ul>
            </div>
          </li>          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaction-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-cash"></i>
              <span class="menu-title">Transactions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/sales.php">Sales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/purchases.php">Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/inspection.php">Inspection</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/delivery.php">Delivery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/maintenance.php">Maintenance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/installation.php">Installation</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../transactions/warranty_monitoring.php">Warranty Monitoring</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../inventory/inventory.php">Inventory</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#scheduling-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title">Scheduling</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="scheduling-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../scheduling/create-inspection-scheduling.php">Inspection</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../scheduling/create-delivery-scheduling.php">Delivery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../scheduling/create-maintenance-scheduling.php">Maintenance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../scheduling/create-installation-scheduling.php">Installation</a>
                </li>
            </div>
          </li> -->
          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#notifications-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-bell"></i>
              <span class="menu-title">Notification</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="notifications-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../notifications/email.php">E-MAIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../notifications/sms.php">SMS</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="../inventory/inventory.php">
              <i class="menu-icon mdi mdi-table-large"></i>
              <span class="menu-title">Inventory</span>
            </a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#reports-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-bell"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports-dropdown">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                  <a class="nav-link" href="../reports/clientPDFreport.php">Client Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../reports/salesReportPDF.php">Sales Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../reports/purchasePDFreport.php">Purchases Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../reports/inspectionPDFreport.php">Inspection Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../reports/deliveryPDF.php">Delivery Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../reports/productsReportPDF.php">Products Reports</a>
                </li>     
               <li class="nav-item">
                  <a class="nav-link" href="../reports/inventoryPDFreport.php">Inventory Reports</a>
                </li>
              </ul>
            </div>
          </li>
          <?php
              if($_SESSION['userOwner'] == "admin"){
              ?>
              <li class="nav-item">
            <a class="nav-link" href="../settings/user-accounts.php">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
              <?php
              }
          ?>
        </ul>
      </nav>
      <!-- partial -->