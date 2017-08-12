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
                  <h3 class="box-title">User List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Designation</th>
                        <th>Campus</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from user natural join campus")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['designation'];?></td>
                        <td><?php echo $row['campus'];?></td>
                        <td>
      
        <a href="#update<?php echo $row['user_id'];?>" data-target="#update<?php echo $row['user_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
        
            </td>
                      </tr>
<div id="update<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update User Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="user_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Full Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['user_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Username</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="username" value="<?php echo $row['username'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Password</label>
          <div class="col-lg-9">
            <input type="password" class="form-control" id="name" name="password" value="<?php echo $row['password'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Designation</label>
            <div class="col-lg-9">
              <select class="form-control select2" style="width: 100%;" name="designation" required>
                        <option><?php echo $row['designation'];?></option>
                        <option>Sports Director</option>
                        <option>Sports Coordinator</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
              <div class="form-group">
               <label class="control-label col-lg-3" for="file">Campus</label>
                <div class="col-lg-9">
                <select class="form-control select2" name="campus" tabindex="1" required>
                    <option value="<?php echo $row['campus_id'];?>"><?php echo $row['campus'];?></option>
                <?php
                   $query2=mysqli_query($con,"select * from campus order by campus")or die(mysqli_error($con));
                      while($row=mysqli_fetch_array($query2)){
                  
                ?>
                    <option value="<?php echo $row['campus_id'];?>"><?php echo $row['campus'];?></option>
                  <?php }?>
                </select>
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
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Designation</th>
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
                  <h3 class="box-title">User</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="user_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="date" name="password" placeholder="Password" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Designation</label>
                    <div class="input-group col-md-12">
                    <select class="form-control select2" style="width: 100%;" name="designation" required>
                          <option>Sports Director</option>
                          <option>Sports Coordinator</option>
                    </select>
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
                <div class="form-group">
              <label for="date">Campus</label>
               
                <select class="form-control select2" name="campus" required>
                <?php
                   $query2=mysqli_query($con,"select * from campus order by campus")or die(mysqli_error($con));
                      while($row=mysqli_fetch_array($query2)){
                  
                ?>
                    <option value="<?php echo $row['campus_id'];?>"><?php echo $row['campus'];?></option>
                  <?php }?>
                </select>
              </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save
                      </button>
                       <button class="btn btn-lg" id="daterange-btn" type="reset">
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
