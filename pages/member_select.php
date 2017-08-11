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
          
          <!-- /.nav-tabs-custom -->
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
                  <form method="post" action="borrow.php">
          <div class="row" style="min-height:400px">
          
           <div class="col-md-6">
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
          <div class="col-md-3">
            <div class="form-group">
              <label for="date"></label>
              <div class="input-group">
                <button class="btn btn-lg btn-block btn-info" type="submit" tabindex="3" name="addtocart">Next</button>
              </div>
            </div>  
          </div>
          </form> 
          
        </div>
                    
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->

        </div>  
               
                  
                  
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
 <script>
  
    $("#credit").click(function(){
        $("#tendered").hide('slow');
        $("#change").hide('slow');
      });

      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });

    $(function() {

      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
  $.ajax({
  type: "GET",
  url: "temp_trans_del.php",
  data: dataString,
  success: function(){
    
        }
    });
    
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
</body>
</html>
