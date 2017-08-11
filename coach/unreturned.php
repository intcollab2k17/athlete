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
        Unreturned Equipment
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Unreturned Equipment</li>
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
          <div class="box box-primary">
            <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Equipment Name</th>
                        <th>Qty</th>
                        <th>Borrower</th>
                        <th>Date Borrowed</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from borrow natural join equipment natural join member where status='0'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
            $id=$row['borrow_id'];
            
?>
                    <tr>
                        <td class="record"><?php echo $row['equipment_name'];?></td>
                        <td><?php echo $row['borrow_qty'];?></td>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                       <td><?php echo date("M d, Y h:i a",strtotime($row['date_borrowed']));?></td>
                    </tr>
            
<div id="delete<?php echo $row['borrow_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Return Borrowed Equipment</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="return_add.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" name="borrow_id" value="<?php echo $id;?>" required>   
         
        <p>Return <?php echo $row['equipment_name']." borrowed by ".$row['member_last'].", ".$row['member_first'];?>?</p>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Return</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<?php }?>           
                    </tbody>
                    
                  </table>
          </div>
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">


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
