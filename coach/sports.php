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
                  <h3 class="box-title">Sports List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sport Name</th>
                        <th>Coach</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from sports natural join member")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $member_id=$row['member_id'];
?>
                      <tr>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                        <td><?php echo $row['sports_status'];?></td>
                        <td>
      
        <a href="#update<?php echo $row['member_id'];?>" data-target="#update<?php echo $row['sports_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
        
            </td>
                      </tr>
<div id="update<?php echo $row['sports_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Sport Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="sport_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Sports Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['sports_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['sports_name'];?>" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="file">Type</label>
          <div class="col-lg-9">
            <select class="form-control select2" style="width: 100%;" name="type" required>
                            <option><?php echo $row['sports_type'];?></option>
                            <option>Single</option>
                            <option>Dual</option>
                            <option>Team</option>
                        </select>
          </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Category</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="category" required>
                            <option><?php echo $row['sports_gender'];?></option>
                            <option>Men</option>
                            <option>Women</option>
                            <option>Mix</option>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
        <div class="form-group">
            <label class="control-label col-lg-3" for="date">Coach</label>
            <div class="col-md-9">
                <select class="form-control select2" style="width: 100%;" name="coach" required>
                    <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
                <?php
                  $query2=mysqli_query($con,"select * from member where member_type='Faculty' and member_id<>'$member_id'")or die(mysqli_error($con));
                      while($row2=mysqli_fetch_array($query2)){
                ?>
                      <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
                <?php }?>
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
                        <th>Sport Name</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Coach</th>
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
                  <h3 class="box-title">Add Sports Details</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="sports_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Sports Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Name of Sports" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Type</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="type" required>
                            <option>Single</option>
                            <option>Dual</option>
                            <option>Team</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Category</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="category" required>
                            <option>Men</option>
                            <option>Women</option>
                            <option>Mix</option>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Coach</label>
                    <div class="input-group col-md-12">
                        <select class="form-control select2" style="width: 100%;" name="coach" required>
                        <?php
                          $query2=mysqli_query($con,"select * from member where member_type='Faculty' order by member_last,member_first")or die(mysqli_error());
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['member_id'];?>"><?php echo $row2['member_last'].", ".$row2['member_first'];?></option>
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
