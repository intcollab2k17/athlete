<?php include('session.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php include('title.php');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include('head.php');?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include('header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('aside.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Settings List
                  
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Semester</th>
                        <th>School Year</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    <form method="post" action="forward.php">
<?php
    
    $query=mysqli_query($con,"select * from settings")or die(mysqli_error($con));
        $i=1;
        while($row=mysqli_fetch_array($query)){
          $sid=$row['settings_id'];
          $status=$row['status'];
    
?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['sem'];?></td>
                        <td><?php echo $row['sy'];?></td>
                        <td>
                          <?php 
                            if ($status<>"active")
                            {
                              echo "<a href='set.php?id=$sid' class='small-box-footer btn btn-primary'>Set Active</a>";

                            }
                            else
                            {
                              
                              echo "<button type='button' class='btn btn-default btn-sm active'><i class='fa fa-square text-green'></i> $status
                  </button>";
                            }
                          ?>
                        </td>
                      </tr>
                      
<div id="update<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Athlete Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="athlete_update.php" enctype='multipart/form-data'>
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Athlete Name</label>
                <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
                    <select class="form-control select2" style="width: 100%;" name="name" required>
                    <?php
                      $query2=mysqli_query($con,"select * from member where member_type='Student' order by member_last,member_first")or die(mysqli_error($con));
                          while($row2=mysqli_fetch_array($query2)){
                    ?>
                          <option value="<?php echo $row2['member_id'];?>"><?php echo $row2['member_last'].", ".$row2['member_first'];?></option>
                    <?php }?>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Sport</label>
                <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%;" name="sport" required>
                    <?php
                      $query2=mysqli_query($con,"select * from sports order by sports_name")or die(mysqli_error($con));
                          while($row2=mysqli_fetch_array($query2)){
                    ?>
                          <option value="<?php echo $row2['sports_id'];?>"><?php echo $row2['sports_name'];?></option>
                    <?php }?>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
        
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
               
<?php $i++; }?>           
                    </tbody>
                  </table>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    <form method="post" action="forward.php">
<?php
    $query=mysqli_query($con,"select * from event order by event_date")or die(mysqli_error($con));
        $i=1;
        while($row=mysqli_fetch_array($query)){
          $event_id=$row['event_id'];
          $status=$row['event_status'];
    
?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['event_name'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row['event_date']));?></td>
                        <td>
                          <?php 
                            if ($status<>"active")
                            {
                              echo "<a href='setevent.php?id=$event_id' class='small-box-footer btn btn-primary'>Set Active</a>";
                            }
                            else
                            {
                              echo "<button type='button' class='btn btn-default btn-sm active'><i class='fa fa-square text-green'></i> $status
                  </button>";
                            }
                          ?>
                      </tr>
                      
<div id="update<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Athlete Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="athlete_update.php" enctype='multipart/form-data'>
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Athlete Name</label>
                <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
                    <select class="form-control select2" style="width: 100%;" name="name" required>
                    <?php
                      $query2=mysqli_query($con,"select * from member where member_type='Student' order by member_last,member_first")or die(mysqli_error($con));
                          while($row2=mysqli_fetch_array($query2)){
                    ?>
                          <option value="<?php echo $row2['member_id'];?>"><?php echo $row2['member_last'].", ".$row2['member_first'];?></option>
                    <?php }?>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Sport</label>
                <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%;" name="sport" required>
                    <?php
                      $query2=mysqli_query($con,"select * from sports order by sports_name")or die(mysqli_error($con));
                          while($row2=mysqli_fetch_array($query2)){
                    ?>
                          <option value="<?php echo $row2['sports_id'];?>"><?php echo $row2['sports_name'];?></option>
                    <?php }?>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
        
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
               
<?php $i++; }?>           
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                </form>
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Add Settings</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="settings_add.php" enctype="multipart/form-data">
                 <?php
                          $query=mysqli_query($con,"select * from settings order by sy,sem desc")or die(mysqli_error($con));
                              $row=mysqli_fetch_array($query);
                        ?>
                  <div class="form-group">
                      <label for="date">Semester</label>
                      <div class="input-group col-md-12">
                          <select class="form-control" style="width: 100%;" name="sem" required>
                               <option>1st</option>
                               <option>2nd</option>
                          </select>
                      </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">School Year</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="sy" placeholder="School Year" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Set
                      </button>
                       <button class="btn btn-lg" id="daterange-btn">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
        </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

</div>
<!-- ./wrapper -->

<?php include('script.php');?>
</body>
</html>
