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
                  <h3 class="box-title">Member List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Year & Section</th>
                        <th>Address</th>
                        <th>Member Type</th>
                        <th>Campus</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from member natural join course natural join campus")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['member_last'];?></td>
                        <td><?php echo $row['member_first'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['course'];?></td>
                        <td><?php echo $row['ys'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['member_type'];?></td>
                        <td><?php echo $row['campus'];?></td>
                        <td>
      
        <a href="#update<?php echo $row['member_id'];?>" data-target="#update<?php echo $row['member_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
        
            </td>
                      </tr>
<div id="update<?php echo $row['member_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Member Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="member_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Last Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['member_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="last" value="<?php echo $row['member_last'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">First Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="first" value="<?php echo $row['member_first'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Course</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="course" required>
                      <option value="<?php echo $row['course'];?>"><?php echo $row['course_title'];?></option>
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
            <input type="text" class="form-control" id="name" name="ys" value="<?php echo $row['ys'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Gender</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="gender" required>
                      <option><?php echo $row['gender'];?></option>
                      <option>Male</option>
                      <option>Female</option>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Address</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="name" name="address"><?php echo $row['address'];?></textarea>
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Member Type</label>
            <div class="col-lg-9">
              <select class="form-control select2" style="width: 100%;" name="type" required>
                        <option><?php echo $row['member_type'];?></option>
                        <option>Student</option>
                        <option>Faculty</option>
                        <option>Staff</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
        
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
<?php }?>           
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Year & Section</th>
                        <th>Address</th>
                        <th>Member Type</th>
                        <th>Campus</th>
                        <th>Action</th> 
                      </tr>           
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Member</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="member_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Last Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="last" placeholder="Last Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">First Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="first" placeholder="First Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Course</label>
                    <div class="input-group col-md-12">
                        <select class="form-control select2" style="width: 100%;" name="course" required>
                        <?php
                          $query2=mysqli_query($con,"select * from course order by course")or die(mysqli_error());
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['course'];?>"><?php echo $row2['course_title'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
                <div class="form-group">
                    <label for="date">Year and Section</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="ys" placeholder="Year and Section" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                <div class="form-group">
                  <label class="control-label" for="date">Gender</label>
                  <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="gender" required>
                            <option>Male</option>
                            <option>Female</option>
                      </select>
                  </div><!-- /.input group -->
              </div><!-- /.form group -->
              <div class="form-group">
                    <label for="date">Address</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="date" name="address" placeholder="Complete Address" required></textarea>
                    </div><!-- /.input group -->
              </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Member Type</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="type" required>
                        <option>Student</option>
                        <option>Faculty</option>
                        <option>Staff</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                   <div class="form-group">
                    <label for="date">Campus</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="campus" required>
                        <?php
                          $query2=mysqli_query($con,"select * from campus")or die(mysqli_error());
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['campus_id'];?>"><?php echo $row2['campus'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info" id="daterange-btn" name="">
                        Save
                      </button>
                       <button class="btn" id="daterange-btn" type="reset">
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
