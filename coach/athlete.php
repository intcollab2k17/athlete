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
        Line Up
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Line Up</li>
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
                  <h3 class="box-title">Line Up for <?php $sports=$_REQUEST['sports'];echo $sports;?>
                  
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                        <th>Sport</th>
                        <th>Award/s</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    <form method="post" action="forward.php">
<?php
    $query=mysqli_query($con,"select * from athlete natural join member natural join sports where sports_name='$sports'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];
    
?>
                      <tr>
                        <td><?php echo $row['member_last'];?></td>
                        <td><?php echo $row['member_first'];?></td>
                        <td><?php echo $row['sports_name'];?></td>
                        <td>
                          <?php
                            $aw=mysqli_query($con,"select * from award where athlete_id='$aid'")or die(mysqli_error($con));
                                while($rowaw=mysqli_fetch_array($aw)){
                                  echo $rowaw['award']." | ";
                                }
                          ?>
                        <a href="#award<?php echo $row['athlete_id'];?>" data-target="#award<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-orange"></i></a>
                        </td>
                        <td>
                          <a href="#forward<?php echo $row['athlete_id'];?>" data-target="#forward<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-forward text-blue"></i></a>
                          <a href="profile.php?id=<?php echo $row['member_id'];?>" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-eye-open text-green"></i></a>
                        </td>
                      </tr>
                      

 <div id="forward<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Forward Athlete To Next Sem</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="forward.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
             
       
            <div class="form-group">
            <label class="control-label col-lg-3" for="date">Sem & SY</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="settings" required>
                <?php
                  $query2=mysqli_query($con,"select * from settings order by sy,sem desc")or die(mysqli_error($con));
                      while($row2=mysqli_fetch_array($query2)){
                ?>
                      <option><?php echo $row2['sem']." ".$row2['sy'];?></option>
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

 <div id="award<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Athlete Award</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="award_add.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Award</label>
                <div class="col-md-9">
                    <input type="text" name="award" class="form-control" placeholder="Award">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            
              </div><br><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                 
<?php }?>           
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                        <th>Sport</th>
                        <th>Award/s</th>
                        <th>Action</th>
                      </tr>           
                    </tfoot>
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
                  <h3 class="box-title">Athlete</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="athlete_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Athlete Name</label>
                    <div class="input-group col-md-12">
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
                    <label for="date">Sport</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="sport" readonly>
                        <?php
                          $sports=$_REQUEST['sports'];
                          $query2=mysqli_query($con,"select * from sports where sports_name='$sports' order by sports_name")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['sports_id'];?>"><?php echo $row2['sports_name'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                    <input type="hidden" name="sports" value="<?php echo $sports;?>">
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Event</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="event" readonly>
                        <?php
                          $query2=mysqli_query($con,"select * from event where event_id='$event_id' order by event_name")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['event_id'];?>"><?php echo $row2['event_name'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save
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
