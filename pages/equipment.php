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
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Equipment</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="equipment_add.php" enctype="multipart/form-data">
  
                  <div class="form-group">
                    <label for="date">Equipment Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Equipment Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control" name="desc" placeholder="Description"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" required>
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
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Equipment List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Equipment Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    include('../dist/includes/dbcon.php');

    $query=mysqli_query($con,"select * from equipment order by equipment_name")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['equipment_name'];?></td>
                        <td><?php echo $row['equipment_desc'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td>
                          <a href="#update<?php echo $row['equipment_id'];?>" data-target="#update<?php echo $row['equipment_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                        </td>
                      </tr>
<div id="update<?php echo $row['equipment_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Equipment Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="equipment_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['equipment_id'];?>" required>  
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['equipment_name'];?>" required>  
          </div>
        </div> 
        
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Description</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="price" name="desc"><?php echo $row['equipment_desc'];?></textarea>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Quantity</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" id="price" name="qty" value="<?php echo $row['qty'];?>" required>  
          </div>
        </div>
              </div><br><br><br><br><br><br><br>
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
                        <th>Equipment Name</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Action</th>
                      </tr>           
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
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
