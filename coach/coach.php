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
        Coaches
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Coaches</li>
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
                  <h3 class="box-title">List of Coaches</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Coach Name</th>
                        <th>Sports Name</th>
                        <th>Event</th>
                        <th>Line Up</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    $campus_id=$_SESSION['campus'];
    $query=mysqli_query($con,"select * from coach natural join member natural join sports natural join event where event_status='active' and campus_id='$campus_id' order by sports_name")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $cid=$row['coach_id'];
    
?>
                      <tr>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['event_name'];?></td>
                        <td><a href="athlete.php?cid=<?php echo $cid;?>&sports=<?php echo $row['sports_name'];?>">View</a></td>
                      </tr>

<?php }?>           
                    </tbody>
                  </table>
                </div><!-- /.box-body -->

        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Coach</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="coach_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Coach Name</label>
                    <div class="input-group col-md-12">
                        <select class="form-control select2" style="width: 100%;" name="coach" required>
                        <?php
                          $query2=mysqli_query($con,"select * from member where member_type<>'Student' and member_status='1' and campus_id='$campus_id' order by member_last,member_first")or die(mysqli_error());
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
                          $query2=mysqli_query($con,"select * from sports where sports_status='active'")or die(mysqli_error());
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['sports_id'];?>"><?php echo $row2['sports_name'];?></option>
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
