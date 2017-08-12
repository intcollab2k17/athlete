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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<?php
    $query=mysqli_query($con,"select * from campus")or die(mysqli_error($con));
        $i=0;
        $color=array("bg-aqua","bg-green","bg-yellow","bg-red");
        $count=0;
        while($row=mysqli_fetch_array($query)){
            $cid=$row['campus_id'];

            $result = mysqli_query($con,"SELECT campus_id,status,COUNT(*) as count FROM athlete natural join member natural join settings where status='active' and campus_id='$cid' group by campus_id");
                $row1=mysqli_fetch_array($result);
                  $count=$row1['count'];

?>      
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box <?php echo $color[$i];?>">
            <div class="inner">
              <h3><?php echo $count;if ($count=="") echo "0";?> </h3>

              <p># of Athletes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><?php echo $row['campus'];?></a>
          </div>
        </div>
        <!-- ./col -->
<?php $i++; }?>   
<?php 
 $result = mysqli_query($con,"SELECT COUNT(*) as count FROM athlete natural join member natural join settings where status='active'");
                $row1=mysqli_fetch_array($result);
                  $count=$row1['count'];    
?>           
        <div class="col-lg-4 col-xs-6" style="text-align: center">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              <h3><?php echo $count;?></h3>

              <p># of Athletes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">TOTAL</a>
          </div>
        </div>
        <!-- ./col -->       
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Upcoming Events</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Event</th>
                        <th>Date</th>                      
                      </tr>
                    </thead>
                    <tbody>
<?php

    $query=mysqli_query($con,"select * from event")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['event_name'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row['event_date']));?></td>
                   
                  
<?php }?>           
                    </tbody>
                    
                  </table>  
            </div>
          </div>
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Sports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Available Sports</th>
                      </tr>
                    </thead>
                    <tbody>
<?php

    $query=mysqli_query($con,"select * from sports where sports_status='active'")or die(mysqli_error($con));
        while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
                        <td><?php echo $row['sports_name'];?></td>
                   
                  
<?php }?>           
                    </tbody>
                    
                  </table>  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
    
                <div class="box-header">
                  <h3 class="box-title">Athlete Statistics by Campus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="graph" class="col-md-12" style="height: 200px"></div>
                </div><!-- /.box-body -->

        </div><!-- /.box -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Statistics By Course</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div id="graphcourse" class="col-md-12" style="height: 200px"></div>
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
<script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 50,
                    spacingLeft: 35
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' },
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
            }
            
            $.getJSON("datacampus.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graphcourse',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 50,
                    spacingLeft: 35
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '10px' },
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
            }
            
            $.getJSON("datacourse.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script src="../dist/js/highcharts.js"></script>
      <script src="../dist/js/exporting.js"></script>
</body>
</html>
