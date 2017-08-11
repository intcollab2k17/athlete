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
        Members
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Members</li>
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
                  <h3 class="box-title">Athlete List
                  
                  
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
    
    $query=mysqli_query($con,"select *,athlete.member_id as member from athlete natural join member left join sports on athlete.sports_id=sports.sports_id where sem='$sem' and sy='$sy'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];
    
?>
                      <tr>
                        <td><?php echo $row['member_last'];?></td>
                        <td><?php echo $row['member_first'];?></td>
                        <td><?php echo $row['sports_name']." ".$row['sports_type']." ".$row['sports_gender'];?></td>
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
                          <a href="#update<?php echo $row['athlete_id'];?>" data-target="#update<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-orange"></i></a>
                          <a href="#forward<?php echo $row['athlete_id'];?>" data-target="#forward<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-forward text-blue"></i></a>
                          <a href="profile.php?id=<?php echo $row['member'];?>" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-eye-open text-green"></i></a>
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
                  <div class="form-group">
                    <label for="date">Semester</label>
                    <div class="input-group col-md-12">
                        <select class="form-control" style="width: 100%;" name="sem" required>
                              <option><?php echo $sem;?></option>
                        </select>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
                <div class="form-group">
                    <label for="date">School Year</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="sy" required>
                              <option><?php echo $sy;?></option>
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
