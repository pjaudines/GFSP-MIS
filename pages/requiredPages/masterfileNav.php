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
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Maintenance finished.
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Purhcase ordeed received.
                  </p>
                </div>
              </a>
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
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user profile</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
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
                    <small class="designation text-muted">Account Executive</small>
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
            <a class="nav-link" data-toggle="collapse" href="#masterfiles-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Masterfiles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masterfiles-dropdown">
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
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../scheduling/scheduling.php">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title">Scheduling</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#notifications-dropdown" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-bell"></i>
              <span class="menu-title">Notification</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="notifications-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#">E-MAIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">SMS</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inventory/inventory.php">
              <i class="menu-icon mdi mdi-table-large"></i>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../reports/reports.php">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../settings/user-accounts.php">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->