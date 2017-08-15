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
    $search=$_POST['name'];

    $query=mysqli_query($con,"select * from member where CONCAT(member_first,member_last) LIKE '%$search%'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
          $mid=$row['member_id'];
          $type=$row['member_type'];
          //echo $mid;
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
                    
<?php
    if ($type=="Student")  
    {
      
      echo "<thead>
                      <tr>
                        <th>Sport</th>
                        <th>Event</th>
                        <th>Award</th>
                      </tr>
                    </thead>
                    <tbody>
          ";
                    
      $query=mysqli_query($con,"select * from athlete natural join member natural join sports natural join event where member_id='$mid'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];  
          include('student.php');
          } 
    }
    else
    {
      
      echo "<thead>
                      <tr>
                        <th>Sport</th>
                        <th>Event</th>
                      </tr>
                    </thead>
                    <tbody>
          ";
                    
      $query=mysqli_query($con,"select * from coach natural join member natural join sports natural join event where member_id='$mid'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          include('faculty.php');
          } 
    }
?>
                      
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
    $query=mysqli_query($con,"select * from member where member_id='$mid'")or die(mysqli_error($con));
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
