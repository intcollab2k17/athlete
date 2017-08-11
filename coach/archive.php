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
        <section class="col-lg-12 connectedSortable">
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
    $sid=$_REQUEST['sid'];
    $query=mysqli_query($con,"select * from coach natural join member natural join sports natural join event where campus_id='$campus_id' and settings_id='$sid' order by coach_id desc")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['event_name'];?></td>
                        <td><a href="lineup_archive.php?id=<?php echo $row['coach_id'];?>">View</a></td>
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
