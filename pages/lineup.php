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
        <section class="col-lg-9 connectedSortable">
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
                        <th>T-Shirt</th>
                        <th>Action</th>
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
                        <td><?php if ($row['uniform']=='1') echo "<span class='btn btn-primary'>Yes</span>";
                        else echo "<span class='btn btn-danger'>No</span>";?></td>
                        <td>
                          <a href="#remove<?php echo $row['athlete_id'];?>" data-target="#remove<?php echo $row['athlete_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
                        </td>
                      </tr>
                      

 <div id="remove<?php echo $row['athlete_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Remove Athlete From Line Up</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="athlete_delete.php" enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $row['athlete_id'];?>">
            <input type="hidden" name="cid" value="<?php echo $cid;?>">
             Are you sure you want to remove <?php echo $row['member_last'].", ".$row['member_first'];?> from the line up?
        
        
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Remove</button>
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
                        <th>Athlete Last Name</th>
                        <th>Athlete First Name</th>
                        <th>T-Shirt</th>
                        <th>Action</th>
                      </tr>           
                    </tfoot>
                  </table>
               
                </div><!-- /.box-body -->
              
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- solid sales graph -->
          <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Add Lineup</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="lineup_add.php" enctype="multipart/form-data">
                  <input type="hidden" name="cid" value="<?php echo $cid;?>">
                  <div class="form-group">
                    <label for="date">Athlete Name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="name" required>
                        <?php
                          $query2=mysqli_query($con,"select * from member where member_type='Student' order by member_last,member_first")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option value="<?php echo $row2['member_id'];?>"><?php echo $row2['member_last'].", ".$row2['member_first'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save
                      </button>
                       <button type="reset" class="btn btn-lg" id="daterange-btn">
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
