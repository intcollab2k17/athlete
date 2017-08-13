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
          <div class="box box-primary">
            <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Equipment Name</th>
                        <th>Qty</th>
                        <th>Borrower</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from borrow natural join equipment natural join member where status='0'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
            $id=$row['borrow_id'];
            if ($row['date_returned']!='0000-00-00 00:00:00')
            {
              $return=date("M d, Y h:i a", strtotime($row['date_returned']));
            }
            else{
              $return="";
            }
            
?>
                    <tr>
                        <td class="record"><?php echo $row['equipment_name'];?></td>
                        <td><?php echo $row['borrow_qty'];?></td>
                        <td><?php echo $row['member_last'].", ".$row['member_first'];?></td>
                        <td><?php echo date("M d, Y h:i a", strtotime($row['date_borrowed']));?></td>
                        <td><?php echo $return;?></td>
                        <td>
<?php 
  if ($row['status']==0){
    echo "<a href='#delete$row[borrow_id]' data-target='#delete$row[borrow_id]' data-toggle='modal' class='small-box-footer btn btn-primary'>Return</a>";    
  }
  else
  {
    echo "<span class='badge badge-success'>Returned</span>";     
  }
                          
?>                          
                        </td>
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

          <!-- solid sales graph -->
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Borrow Equipments</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
        <form method="post" action="borrow_add.php">
          <div class="row" style="min-height:400px">
            <div class="col-md-12">
              <div class="form-group">
              <label for="date">Select Equipment</label>
               
                <select class="form-control select2" name="equipment" tabindex="1" autofocus required>
                <?php
                   $query2=mysqli_query($con,"select * from equipment order by equipment_name")or die(mysqli_error($con));
                      while($row=mysqli_fetch_array($query2)){
                  
                ?>
                    <option value="<?php echo $row['equipment_id'];?>"><?php echo $row['equipment_name']." Available(".$row['qty'].")";?></option>
                  <?php }?>
                </select>
              </div><!-- /.form group -->
            <div class="form-group">
              <label for="date">Quantity</label>
              <div class="input-group">
                <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1" required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <label for="date"></label>
              <div class="input-group">
                <select class="form-control select2" name="member" required>
                <?php
                   $query2=mysqli_query($con,"select * from member where member_status='1' order by member_last,member_first")or die(mysqli_error($con));
                      while($row=mysqli_fetch_array($query2)){
                  
                ?>
                    <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
                  <?php }?>
                </select>
              </div>
            </div>  
    
          
            <div class="form-group">
              <label for="date"></label>
              <div class="input-group">
                <button class="btn btn-lg btn-block btn-success" type="submit">Borrow</button>
              </div>
            </div>  
          </div>
          </form>
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
