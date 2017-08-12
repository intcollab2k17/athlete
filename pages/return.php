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
                        <th>Status</th>
                        <th>Return</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from borrow natural join equipment order by date_borrowed")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
            $id=$row['borrow_id'];
    
            if($row['status']==1) {
              $status="returned";
              $badge="green";
            }
            else 
              {
                $status= "unreturned";
                $badge="red";
              }
?>
                    <tr>
                        <td class="record"><?php echo $row['equipment_name'];?></td>
                        <td><?php echo $row['borrow_qty'];?></td>
                        <td><?php echo date("M d Y h:i A", strtotime($row['date_borrowed']));?></td>
                        <td><?php echo date("M d Y h:i A", strtotime($row['date_returned']));?></td>
                        <td><span class='badge bg-<?php echo $badge;?>'><?php echo $status; ?></span></td>
                        <td>
                          
                          <a href="#delete<?php echo $row['borrow_id'];?>" data-target="#delete<?php echo $row['borrow_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                          
                        </td>
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
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Borrower's Name</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="">
                    <div class="row" style="min-height:400px">
          
                       <div class="col-md-12">
                          <div class="form-group">
                            <label for="date">Borrower's Name</label>
                            <select class="form-control select2" name="borrower" tabindex="1" autofocus required>
                            <?php
                              include('../dist/includes/dbcon.php');
                               $query2=mysqli_query($con,"select * from member order by member_last,member_first")or die(mysqli_error());
                                  while($row=mysqli_fetch_array($query2)){
                            ?>
                                <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
                              <?php }?>
                            </select>
                          </div><!-- /.form group -->
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="date"></label>
                          <div class="input-group">
                            <button class="btn btn-lg btn-block btn-info" type="submit" tabindex="3" name="addtocart">Find</button>
                          </div>
                        </div>  
                      </div>
                  </div>
              </form> 
            </div>

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
