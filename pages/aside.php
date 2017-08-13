<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="course.php"><i class="fa fa-circle-o"></i> Course</a></li>
            <li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
            <li><a href="event.php"><i class="fa fa-circle-o"></i> Event</a></li>
            <li><a href="gallery.php"><i class="fa fa-circle-o"></i> Gallery</a></li>
            <li><a href="member.php"><i class="fa fa-circle-o"></i> Members</a></li>
            <li><a href="sports.php"><i class="fa fa-circle-o"></i> Sports</a></li>
            <li><a href="user.php"><i class="fa fa-circle-o"></i> User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="athlete.php"><i class="fa fa-circle-o"></i> Athlete </a></li>
            <li><a href="borrow.php"><i class="fa fa-circle-o"></i> Borrow</a></li>
            <li><a href="coach.php"><i class="fa fa-circle-o"></i> Coach </a></li>
            <li><a href="documents.php"><i class="fa fa-circle-o"></i> Documents</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="coach.php"><i class="fa fa-circle-o"></i> Coaches</a></li>
            <li><a href="inventory.php"><i class="fa fa-circle-o"></i> Inventory</a></li>
            <li><a href="lineup_report.php"><i class="fa fa-circle-o"></i> Lineups</a></li>
            <li><a href="statistics.php"><i class="fa fa-circle-o"></i> Statistics</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Archive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<?php
    
    $query=mysqli_query($con,"select * from settings where status<>'active' order by sy,sem desc")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $sid=$row['settings_id'];
?>          
            <li><a href="archive.php?sid=<?php echo $sid;?>"><i class="fa fa-circle-o"></i> <?php echo $row['sem']." ".$row['sy'];?></a></li>
<?php }?>          
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
