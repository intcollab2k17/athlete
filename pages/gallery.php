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
       <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Gallery</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="album_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Album Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Album Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
              <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="date" name="desc" placeholder="Album Description" required></textarea>
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
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">List of Albums</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
    
                      $query=mysqli_query($con,"select * from album order by date_posted desc")or die(mysqli_error($con));
                          while($row=mysqli_fetch_array($query)){
                  ?>
                    <div class="col-xs-3" style="text-align: center;">
                      <div class="box box-success">
                        <div class="box-header">
                          <a href="album.php?album_id=<?php echo $row['album_id'];?>"><img src="../dist/img/gallery.jpg" style="height: 100%;width: 100%"></a>
                          <h4 class="box-title"><?php echo $row['album_name'];?></h4>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <?php echo $row['album_description'];?>
                        </div><!-- /.box-body -->
                      </div><!-- /.col -->        
                    </div><!-- /.box-body -->
<?php }?> 
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
