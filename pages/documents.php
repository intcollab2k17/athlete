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
                  <h3 class="box-title">Communication/Letter List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Download</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from document order by date_uploaded desc")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['sender'];?></td>
                        <td><?php echo $row['receiver'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['category'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <td><a href="../dist/uploads/<?php echo $row['file'];?>" download><span class="badge">Download</span></a></td>
                        <td>
      
        <a href="#update<?php echo $row['document_id'];?>" data-target="#update<?php echo $row['document_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
        <a href="#upload<?php echo $row['document_id'];?>" data-target="#upload<?php echo $row['document_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer" alt="Upload new file"><i class="glyphicon glyphicon-upload text-blue"></i></a>
        
            </td>
                      </tr>
<div id="update<?php echo $row['document_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Document Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="document_update.php" enctype='multipart/form-data'>
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Sender</label>
                <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $row['document_id'];?>">
                    <input class="form-control" type="text" name="sender" value="<?php echo $row['sender'];?>">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Receiver</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="receiver" value="<?php echo $row['receiver'];?>">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Title</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="title" value="<?php echo $row['title'];?>">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Description</label>
                <div class="col-md-9">
                    <textarea class="form-control" type="text" name="desc"><?php echo $row['description'];?></textarea>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Category</label>
                <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%;" name="cat" required>
                         <option><?php echo $row['category'];?></option>
                    <?php
                      $query2=mysqli_query($con,"select * from category order by category_name")or die(mysqli_error($con));
                          while($row2=mysqli_fetch_array($query2)){
                    ?>
                          <option><?php echo $row2['category_name'];?></option>
                    <?php }?>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">Type</label>
                <div class="col-md-9">
                    <select class="form-control" style="width: 100%;" name="type" required>
                         <option><?php echo $row['type'];?></option>
                         <option>Incoming</option>
                         <option>Outgoing</option>
                    </select>
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            
        
        
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
        </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->    

 <div id="upload<?php echo $row['document_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Upload New File</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="upload.php" enctype='multipart/form-data'>
            <div class="form-group">
                <label class="control-label col-lg-3" for="date">File</label>
                <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $row['document_id'];?>">
                    <input class="form-control" type="file" name="image">
                </div><!-- /.input group -->
            </div><!-- /.form group -->
            
              </div><br><br><br><hr>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save changes</button>
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
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Download</th>
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
                  <h3 class="box-title">Communication/Letter</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="document_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Sender Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="sender" placeholder="Sender Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Receiver Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="receiver" placeholder="Receiver Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Title</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="title" placeholder="Title" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="date" name="desc" placeholder="Description"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Category</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="category" required>
                        <?php
                          $query2=mysqli_query($con,"select * from category order by category_name")or die(mysqli_error($con));
                              while($row2=mysqli_fetch_array($query2)){
                        ?>
                              <option><?php echo $row2['category_name'];?></option>
                        <?php }?>
                        </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                      <label for="date">Type</label>
                      <div class="input-group col-md-12">
                          <select class="form-control" style="width: 100%;" name="type" required>
                               <option>Incoming</option>
                               <option>Outgoing</option>
                          </select>
                      </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">File</label>
                    <div class="input-group col-md-12">
                        <input type="file" class="form-control pull-right" id="date" name="image">
                    </div><!-- /.input group -->
                </div><!-- /.form group -->
                
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-info btn-lg" id="daterange-btn" name="">
                        Save
                      </button>
                       <button class="btn btn-lg" id="daterange-btn" type="reset">
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
