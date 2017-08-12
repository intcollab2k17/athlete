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
        Account Settings
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
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-12 connectedSortable">
<?php
      $id=$_SESSION['id'];
      $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error($con));
        $row=mysqli_fetch_array($query);
?>
          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="account_update.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" id="date" name="name" value="<?php echo $row['name'];?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="username" value="<?php echo $row['username'];?>" required>
                    </div><!-- /.input group -->
                    <input type="hidden" name="sports" value="<?php echo $sports;?>">
                  </div><!-- /.form group -->
                   <div class="form-group">
                    <label for="date">Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="date" name="password" value="<?php echo $row['password'];?>" required>
                    </div><!-- /.input group -->
                    <input type="hidden" name="sports" value="<?php echo $sports;?>">
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Designation</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="designation" value="<?php echo $row['designation'];?>" readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save Changes
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
