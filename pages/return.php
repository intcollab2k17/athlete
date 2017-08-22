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
        
        <!-- right col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Return Equipment/s</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Equipment Name</th>
                        <th>Qty</th>
                        <th>Borrowed Date</th>
                        <th>Returned Date</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from borrow natural join equipment where status='1' order by date_borrowed")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
            $id=$row['borrow_id'];
    
            
?>
                    <tr>
                        <td class="record"><?php echo $row['equipment_name'];?></td>
                        <td><?php echo $row['borrow_qty'];?></td>
                        <td><?php echo date("M d Y h:i A", strtotime($row['date_borrowed']));?></td>
                        <td><?php echo date("M d Y h:i A", strtotime($row['date_returned']));?></td>
                    </tr>
            
<div id="delete<?php echo $row['borrow_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Return Borrowed Equipment/s</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="return_add.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" name="borrow_id" value="<?php echo $id;?>" required>   
          <input type="hidden" class="form-control" name="borrower" value="<?php echo $bid;?>" required>   
          <input type="hidden" class="form-control" id="price" name="qty" value="<?php echo $row['borrow_qty'];?>" required> 
          <input type="hidden" class="form-control" id="price" name="eid" value="<?php echo $row['equipment_id'];?>" required>  
        <p><?php echo $row['equipment_name'];?> already returned?</p>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              </div>
        
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<?php }?>           
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->

        </div>  
  
        </form> 
        </section>
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
