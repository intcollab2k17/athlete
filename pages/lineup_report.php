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
<?php 
  $query0=mysqli_query($con,"select * from settings where status='active'")or die(mysqli_error($con));
    $row0=mysqli_fetch_array($query0);
      $settings=$row0['settings_id'];  
      $sem=$row0['sem'];
      $sy=$row0['sy'];
?>     
<?php
$query1=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
    $row1=mysqli_fetch_array($query1);

?>        
    <section class="content-header">
      <h1>
        Sports Lineup for <?php echo $row1['event_name'];?>
        <small><button class="btn btn-info" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print </button></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Members for  <?php echo $row1['event_name'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <h2 style="text-align: center;">Sports Lineup for <?php echo $row1['event_name'];?></h2>
<?php
    $querye=mysqli_query($con,"select * from event where event_status='active'")or die(mysqli_error($con));
      $rowe=mysqli_fetch_array($querye);
      $event=$row['event_id'];

    $query=mysqli_query($con,"select * from campus")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){
      $cid=$row['campus_id'];
      $campus=$row['campus'];
?>        
        <section class="col-lg-12 col-md-12 col-sm-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">

                  <h3 class="box-title"><b><?php echo $campus;?></b></h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
<?php
    
    $query1=mysqli_query($con,"select * from sports where sports_status='active'")or die(mysqli_error($con));
        while($row1=mysqli_fetch_array($query1)){
          $sport=$row1['sports_id'];

           $query2=mysqli_query($con,"select * from coach natural join member where sports_id='$sport' and settings_id='$settings' and campus_id='$cid' and event_id='$event'")or die(mysqli_error($con));
            $row2=mysqli_fetch_array($query2);
?>    
                      <div class="col-md-3 col-lg-3 col-sm-3  ">
                          <h4><?php echo $row1['sports_name'];?></h4>
                          <h6>Coach: <?php echo $row2['member_last'].", ".$row2['member_first'];?></h6>
                          <ol>
<?php
    
    $query2=mysqli_query($con,"select * from athlete natural join member natural join event where event_status='active' and settings_id='$settings' and sports_id='$sport' and campus_id='$cid'")or die(mysqli_error($con));
        while($row2=mysqli_fetch_array($query2)){
?>
                            <li><?php echo $row2['member_last'].", ".$row2['member_first'];?></li>
<?php }?>
                          </ol>
                      </div>
<?php }?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
<?php }?>        
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
