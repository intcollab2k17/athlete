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
        <li><a href="coach.php"><i class="fa fa-circle-o"></i> Coaches</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Line Up</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<?php
    
    $query=mysqli_query($con,"select * from sports where sports_status='active' order by sports_name")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $sid=$row['sports_id'];
?>                    
            <li><a href="athlete.php"><i class="fa fa-circle-o"></i> <?php echo $row['sports_name'];?> </a></li>
<?php }?>
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
            <li><a href="archive.php"><i class="fa fa-circle-o"></i> <?php echo $row['sem']." ".$row['sy'];?></a></li>
<?php }?>          
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
