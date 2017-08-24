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
            <i class="fa fa-laptop"></i>
            <span>Archive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<?php
    
    $query=mysqli_query($con,"select * from event where event_status<>'active' order by event_date desc")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $sid=$row['event_id'];
?>          
            <li><a href="archive.php?event_id=<?php echo $sid;?>"><i class="fa fa-circle-o"></i> <?php echo $row['event_name'];?></a></li>
<?php }?>          
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
