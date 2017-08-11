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
        Line Up
        <small>Control panel</small>
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
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Line Up for
<?php
    $cid=$_REQUEST['id'];
    $line=mysqli_query($con,"select * from coach natural join sports where coach_id='$cid'")or die(mysqli_error($con));
        $rowl=mysqli_fetch_array($line);
          echo $rowl['sports_name'];
    
?>                  
                  
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                      </tr>
                    </thead>
                     
                    <tbody>
                    
<?php
    
    $query=mysqli_query($con,"select *,athlete.member_id as member from athlete natural join member left join sports on athlete.sports_id=sports.sports_id")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
          $aid=$row['athlete_id'];
    
?>
                      <tr>
                        <td><?php echo $row['member_last'];?></td>
                        <td><?php echo $row['member_first'];?></td>
                        
                      </tr>
                      

 

<?php }?>           
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                      </tr>           
                    </tfoot>
                  </table>
               
                </div><!-- /.box-body -->
              
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
