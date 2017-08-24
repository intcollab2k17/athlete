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
        COACH : 
        <?php
        $sports=$_REQUEST['sports'];
        $campus=$_SESSION['campus'];
        
        $query=mysqli_query($con,"select *,athlete.member_id as member from athlete natural join member left join sports on athlete.sports_id=sports.sports_id")or die(mysqli_error($con));
            $row=mysqli_fetch_array($query);
              $cid=$row['coach_id'];
              
              echo $row['member_last'].", ".$row['member_first'];
    ?>
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
                  <h3 class="box-title">Line Up for <?php echo $sports;?>
                  
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                        <th>Sport</th>
                        <th>Uniform</th>
                        <th>Award/s</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    <form method="post" action="forward.php">
<?php
    $cid=$_REQUEST['cid'];
    
    $querye=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
      $rowe=mysqli_fetch_array($querye);
      $event=$row['event_id'];

    $query=mysqli_query($con,"select * from athlete natural join member natural join sports where coach_id='$cid'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];
    
?>
                      <tr>
                        <td><?= $row['member_last'];?></td>
                        <td><?php echo $row['member_first'];?></td>
                        <td><?php echo $row['sports_name'];?></td>
                        <td>
                          <?php
                            if ($row['uniform']=="0")
                                  echo "<a href='tshirt.php?status=yes&aid=$aid&sports=$sports' class='btn btn-danger'>No</a>";
                            else
                                  echo "<a href='tshirt.php?status=No&aid=$aid&sports=$sports' class='btn btn-info'>Yes</a>";    
                          ?>
                        
                        </td>
                        <td>
                          <?php
                            $aw=mysqli_query($con,"select * from award where athlete_id='$aid'")or die(mysqli_error($con));
                                while($rowaw=mysqli_fetch_array($aw)){
                                  echo $rowaw['award']." | ";
                                }
                          ?>
                        <a href="#award<?php echo $row['athlete_id'];?>" data-target="#award<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-orange"></i></a>
                        </td>

                        <td><?php echo $row['remarks'];?><a href="#remarks<?php echo $row['athlete_id'];?>" data-target="#remarks<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"> <i class="glyphicon glyphicon-plus text-blue"></i></a></td>
                        <td>
                          <a href="#forward<?php echo $row['athlete_id'];?>" data-target="#forward<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"> <i class="glyphicon glyphicon-forward text-blue"> </i></a>
                          <a href="profile.php?id=<?php echo $row['member_id'];?>" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-eye-open text-green"></i></a>
                          <a href="#remove<?php echo $row['athlete_id'];?>" data-target="#remove<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                        </td>
                      </tr>
<div id="remove<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Remove Athlete From Line Up</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="athlete_delete.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
            <input type="hidden" name="cid" value="<?php echo $cid;?>">
            <input type="hidden" name="sports" value="<?php echo $sports;?>">
             Are you sure you want to remove <?php echo $row['member_last'].", ".$row['member_first'];?> from the line up?
        
        
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Remove</button>
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

 <div id="remarks<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Remarks</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="remarks_add.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
            <input type="hidden" name="sports" value="<?php echo $row['sports_name'];?>">
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Remarks</label>
                <div class="col-md-9">
                    <textarea type="text" name="remarks" class="form-control" placeholder="Remarks"></textarea>
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
                        <th>Uniform</th>
                        <th>Award/s</th>
                        <th>Remarks</th>
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
                  <h3 class="box-title">Athlete <a href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add New</a></h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="athlete_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Athlete Name </label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="name" required>
                        <?php
                          $campus=$_SESSION['campus'];
                          $query2=mysqli_query($con,"select * from member where member_type='Student' and campus_id='$campus' order by member_last,member_first")or die(mysqli_error($con));
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
                    <input type="hidden" name="coach" value="<?php echo $cid;?>">
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
<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Member</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="member_add1.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Last Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" required>  
            <input type="text" class="form-control" id="name" name="last" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">First Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="first" required>  
          </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Course</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="course" required>
                <?php
                  $query2=mysqli_query($con,"select * from course order by course")or die(mysqli_error($con));
                      while($row2=mysqli_fetch_array($query2)){
                ?>
                      
                      <option value="<?php echo $row2['course'];?>"><?php echo $row2['course_title'];?></option>
                <?php }?>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Year & Section</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="ys" required>  
          </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Gender</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="gender" required>
                      <option>Male</option>
                      <option>Female</option>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Address</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="name" name="address"></textarea>
          </div>
        </div> 
        <input type="hidden" name="sports" value="<?php echo $sports;?>">
        <input type="hidden" name="sports_id" value="<?php echo $sports_id;?>">
        <input type="hidden" name="coach" value="<?php echo $cid;?>">
        <input type="hidden" name="event" value="<?php echo $event_id;?>">
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    