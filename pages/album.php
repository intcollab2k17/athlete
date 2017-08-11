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
          <?php
              $album_id=$_REQUEST['album_id'];    
              $query=mysqli_query($con,"select * from album order by date_posted desc")or die(mysqli_error($con));
                $row=mysqli_fetch_array($query);
          ?>  
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $row['album_name'];?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
    
                      $query1=mysqli_query($con,"select * from album_content where album_id='$album_id'")or die(mysqli_error($con));
                          while($row1=mysqli_fetch_array($query1)){
                  ?>
                    <div class="col-xs-3" style="text-align: center;">
                      <div class="box box-success">
                        <div class="box-header">
                          <a href="../dist/uploads/<?php echo $row1['file'];?>"><img src="../dist/uploads/<?php echo $row1['file'];?>" style="height: 130px;width: 100%"></a>
                         
                        </div><!-- /.box-header -->
                       
                      </div><!-- /.col -->        
                    </div><!-- /.box-body -->
<?php }?> 
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Gallery</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="picture.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Album Name</label>
                    <div class="input-group col-md-12">
                      <?php $album_id=$_REQUEST['album_id']; ?>
                      <input type="hidden" class="form-control pull-right" id="date" name="album_id" value="<?php echo $album_id;?>" required>
                      <input type="file" class="form-control pull-right" id="date" name="image" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
             
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save
                      </button>
                       <button class="btn btn-lg" id="daterange-btn" type="reser">
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
