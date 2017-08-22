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
        <small><button class="btn btn-info" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print </button></small>
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
<?php
$query1=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
    $row1=mysqli_fetch_array($query1);

?>                
        <h2 style="text-align: center;">List of Coaches for <?php echo $row1['event_name'];?></h2>                    
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Coach Name</th>
                        <th>Sports Name</th>
                        <th>Event</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from coach natural join member natural join sports natural join event where settings_id='$settings' and event_status='active' order by sports_name")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['event_name'];?></td>
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
