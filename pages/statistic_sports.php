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
        Report
        <small><button class="btn btn-info" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print </button></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Report</li>
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
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Athlete Statistics by Sports Talisay Campus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="graph" class="col-md-6 col-sm-6"></div>
                  <div class="col-md-6 col-sm-6">
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
      
  
    
$result = mysqli_query($con,"SELECT sports_name,COUNT(*) FROM athlete natural join member natural join sports natural join settings natural join event where campus_id='1' and status='active' and event_status='active' group by sports_id");
    while($r = mysqli_fetch_array($result)) {
  
  ?>
                        <tr>
                          <td><?php echo $r[0];?></td>
                          <td><?php echo $r[1];?></td>
                        </tr>

  <?php }?>           
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.box-body -->

        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Athlete Statistics by Sports Fortune Towne Campus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="graph2" class="col-md-6"></div>
                  <div class="col-md-6">
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
      
  
    
$result = mysqli_query($con,"SELECT sports_name,COUNT(*) FROM athlete natural join member natural join sports natural join settings natural join event where campus_id='2' and status='active' and event_status='active' group by sports_id");
    while($r = mysqli_fetch_array($result)) {
  
  ?>
                        <tr>
                          <td><?php echo $r[0];?></td>
                          <td><?php echo $r[1];?></td>
                        </tr>

  <?php }?>           
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.box-body -->

        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Athlete Statistics by Sports Alijis Campus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="graph3" class="col-md-6"></div>
                  <div class="col-md-6">
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
      
  
    
$result = mysqli_query($con,"SELECT sports_name,COUNT(*) FROM athlete natural join member natural join sports natural join settings natural join event where campus_id='3' and status='active' and event_status='active' group by sports_id");
    while($r = mysqli_fetch_array($result)) {
  
  ?>
                        <tr>
                          <td><?php echo $r[0];?></td>
                          <td><?php echo $r[1];?></td>
                        </tr>

  <?php }?>           
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.box-body -->

        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
        </section>
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-success">
    
                <div class="box-header">
                  <h3 class="box-title">Athlete Statistics by Sports Binalbagan Campus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="graph4" class="col-md-6"></div>
                  <div class="col-md-6">
                    <table id="" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Course</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
      
  
    
$result = mysqli_query($con,"SELECT sports_name,COUNT(*) FROM athlete natural join member natural join sports natural join settings natural join event where campus_id='4' and status='active' and event_status='active' group by sports_id");
    while($r = mysqli_fetch_array($result)) {
  
  ?>
                        <tr>
                          <td><?php echo $r[0];?></td>
                          <td><?php echo $r[1];?></td>
                        </tr>

  <?php }?>           
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.box-body -->

        </div><!-- /.box -->
          <!-- /.nav-tabs-custom -->
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
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '18px', fontSize: '26px' }
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
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '14px', fontSize: '14px' },
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
            
            $.getJSON("sports1.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graph2',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 50,
                    spacingLeft: 35
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '18px', fontSize: '26px' }
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
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '14px', fontSize: '14px' },
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
            
            $.getJSON("sports2.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graph3',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 50,
                    spacingLeft: 35
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '18px', fontSize: '26px' }
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
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '14px', fontSize: '14px' },
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
            
            $.getJSON("sports3.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graph4',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 50,
                    spacingLeft: 35
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '18px', fontSize: '26px' }
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
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '14px', fontSize: '14px' },
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
            
            $.getJSON("sports4.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
      <script src="../dist/js/highcharts.js"></script>
        <script src="../dist/js/exporting.js"></script>
</body>
</html>
