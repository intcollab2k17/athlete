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
        Member
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Member</li>
      </ol>
    </section>
<?php
    $id=$_REQUEST['id'];
?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-9 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">History</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sport</th>
                        <th>Event</th>
                        <th>Sem</th>
                        <th>School Year</th>
                        <th>Award</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    <form method="post" action="">
<?php
    $id=$_REQUEST['id'];
    $query=mysqli_query($con,"select * from athlete natural join member natural join sports natural join settings natural join event where member_id='$id'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];
?>
                      <tr>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['event_name'];?></td>
                        <td><?php echo $row['sem'];?></td>
                        <td><?php echo $row['sy'];?></td>
                         <td>
                          <?php
                            $aw=mysqli_query($con,"select * from award where athlete_id='$aid'")or die(mysqli_error($con));
                                while($rowaw=mysqli_fetch_array($aw)){
                                  echo $rowaw['award']." | ";
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
                          <option value="<?php echo $row2['sports_id'];?>"><?php echo $row2['sports_name']." ".$row2['sports_type']." ".$row2['sports_gender'];?></option>
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
 <div id="forward<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Athlete Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="forward.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
             
       
            <div class="form-group">
            <label class="control-label col-lg-3" for="date">Semester</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="sem" required>
                      <option>1st</option>
                      <option>2nd</option>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->

        
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">School Year</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="sy" required>
                <?php
                  $query2=mysqli_query($con,"select * from sy order by sy")or die(mysqli_error($con));
                      while($row2=mysqli_fetch_array($query2)){
                ?>
                      <option><?php echo $row['sy'];?></option>
                <?php }?>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
        
        
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Forward</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
<?php }?>           
                    </tbody>
                   
                  </table>
               
                </div><!-- /.box-body -->
                </form>
            </div><!-- /.col -->

        </section>
        <!-- right col -->
        <!-- Left col -->
        <section class="col-lg-3 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
<?php
    $query=mysqli_query($con,"select * from member where member_id='$id'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
?>          
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Athlete Profile</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="athlete_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Athlete Name</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['member_last'].", ".$row['member_first'];?></option>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Gender</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['gender'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Course</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['course'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Year & Section</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['ys'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Address</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['address'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
        </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
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
