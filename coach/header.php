<?php 
 include('../dist/includes/dbcon.php');
  $query=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
    $settings=$row['settings_id'];  
    $sem=$row['sem'];
    $sy=$row['sy'];
?> 
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
<?php 
                      
                      $query=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error());
                          $row=mysqli_fetch_array($query);
                            $event_id=$row['event_id'];
                       ?>           
          <li class="dropdown tasks-menu">
            <a href="#">
              <i class="glyphicon glyphicon-calendar"></i>
              <span class="label label-danger"></span>
              <?php echo $row['event_name'];?>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo $_SESSION['name'];?></span>
            </a>
            <ul class="dropdown-menu">
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat">Sign out</a>
                </div>
                <div class="pull-right">
                  <a href="account_settings.php" class="btn btn-default btn-flat">Account Settings</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>