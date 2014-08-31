<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="text-center">
             <!--  <ul class="stats_box">
                <li>
                  <div class="sparkline bar_week"></div>
                  <div class="stat_text">
                    <strong>2.345</strong> Weekly Visit
                    <span class="percent down"> <i class="fa fa-caret-down"></i> -16%</span> 
                  </div>
                </li>
                <li>
                  <div class="sparkline line_day"></div>
                  <div class="stat_text">
                    <strong>165</strong> Daily Visit
                    <span class="percent up"> <i class="fa fa-caret-up"></i> +23%</span> 
                  </div>
                </li>
                <li>
                  <div class="sparkline pie_week"></div>
                  <div class="stat_text">
                    <strong>$2 345.00</strong> Weekly Sale
                    <span class="percent"> 0%</span> 
                  </div>
                </li>
                <li>
                  <div class="sparkline stacked_month"></div>
                  <div class="stat_text">
                    <strong>$678.00</strong> Monthly Sale
                    <span class="percent down"> <i class="fa fa-caret-down"></i> -10%</span> 
                  </div>
                </li>
              </ul> -->
            </div>
            <!-- <hr> -->
            <div class="text-center">
              <a class="quick-btn" href="<?php echo base_url().'users'; ?>">
                <i class="fa fa-user fa-2x"></i>
                <span>Users</span> 
                <span class="label label-default"><?php echo count($users); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'customers'; ?>">
                <i class="fa fa-globe fa-2x"></i>
                <span>Customers</span> 
                <span class="label btn-metis-3"><?php echo count($customers); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'projects'; ?>">
                <i class="fa fa-star fa-2x"></i>
                <span>Projects</span> 
                <span class="label label-info"><?php echo count($projects); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'tasks'; ?>">
                <i class="fa fa-check fa-2x"></i>
                <span>Tasks</span> 
                <span class="label label-danger"><?php echo count($tasks); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'monthly_reviews'; ?>">
                <i class="fa fa-signal fa-2x"></i>
                <span>Reviews</span> 
                <span class="label label-warning"><?php echo count($monthly_reviews); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'daily_targets'; ?>">
                <i class="fa fa-building-o fa-2x"></i>
                <span>Daily Targets</span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'daily_target'; ?>">
                <i class="fa fa-external-link fa-2x"></i>
                <span>Daily Target</span> 
                <span class="label btn-metis-2">3.14159265</span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'monthly_target'; ?>">
                <i class="fa fa-envelope fa-2x"></i>
                <span>Mon. Target</span> 
                <span class="label label-success">-456</span> 
              </a> 
<!--               <a class="quick-btn" href="#">
                <i class="fa fa-lemon-o fa-2x"></i>
                <span>é</span> 
                <span class="label btn-metis-4">2.71828</span> 
              </a>  -->
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-8">
                <div class="box">
                  <header>
                    <h5>Tasks per Month</h5>
                  </header>

<script>
$(function () {
    $('.task-chart').highcharts({
        title: {
            text: 'Monthly Average Tasks',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: GeckoWebWorks.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Tasks'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Todo',
            data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
        }, {
            name: 'Completed',
            data: [3, 3, 3, 9.3, 14, 21, 20, 19, 22, 15, 16, 3]
        }, {
            name: 'Pending',
            data: [2, 2, 5, 11.3, 17, 22, 24, 24, 20, 14, 8, 2]
        }, {
            name: 'Failed',
            data: [2, 2, 3, 8, 13, 17, 18, 17, 14, 9, 3, 2]
        }, {
            name: 'Archived',
            data: [3, 4, 5, 8, 11, 15, 17, 16, 14, 10, 6, 4]
        }]
    });
});
</script>
<div class="task-chart" style="min-width: 310px; height: 500px; margin: 0 auto"></div>


                </div>
              </div>
              <div class="col-lg-4">
                <div class="box">

                    <header>
                      <h5>Tasks per Task Type</h5>
                    </header>
                  <script>
                  $(function () {
    $('.task-type-chart').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: [
            
            <?php
              foreach($task_types as $task_type) {
                echo "'" . $task_type['name'] . "',";
              }
              ?>
                ]
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Low',
            data: [
            
          <?php
            $low_count = 1;
            foreach($task_types as $task_type){

              $totalcount=0;

              foreach($tasks as $task){
            
                if($task['type'] == $task_type['id']){
                 
                  if($task['priority']==1){
                     //$totalcount = $totalcount + count($task['type']);
                     $totalcount++;
                  } /* end of if */

                } /* end of if */


            } /* end of foreach */

              echo $totalcount . ",";
              $low_count++;

            } /* end of foreach */
 
          ?>
          ]

        }, {
            name: 'Medium',
            data: [

          <?php
            $medium_count = 1;
            foreach($task_types as $task_type){

              $totalcount=0;

              foreach($tasks as $task){
            
                if($task['type'] == $task_type['id']){
                 
                  if($task['priority']==2){
                     //$totalcount = $totalcount + count($task['type']);
                     $totalcount++;
                  } /* end of if */

                } /* end of if */


            } /* end of foreach */

              echo $totalcount . ",";
              $medium_count++;

            } /* end of foreach */
 
          ?>
          ]



        }, {          
            name: 'Urgent',
            data: [

          <?php
            $urgent_count = 1;
            foreach($task_types as $task_type){

              $totalcount=0;

              foreach($tasks as $task){
            
                if($task['type'] == $task_type['id']){
                 
                  if($task['priority']==3){
                     //$totalcount = $totalcount + count($task['type']);
                     $totalcount++;
                  } /* end of if */

                } /* end of if */


            } /* end of foreach */

              echo $totalcount . ",";
              $urgent_count++;

            } /* end of foreach */
 
          ?>
          ]


        }, {
            name: 'Critical',
            data: [
          
          <?php
            $critical_count = 1;
            foreach($task_types as $task_type){

              $totalcount=0;

              foreach($tasks as $task){
            
                if($task['type'] == $task_type['id']){
                 
                  if($task['priority']==4){
                    //$totalcount = $totalcount + count($task['type']);
                     $totalcount++;
                  } /* end of if */

                } /* end of if */


            } /* end of foreach */

              echo $totalcount . ",";
              $critical_count++;

            } /* end of foreach */
 
          ?>
          ]



        }]
    });
});
                  </script>
<div class="task-type-chart" style="min-width: 310px; max-width: 800px; height: 500px; margin: 0 auto"></div>




                </div>
              </div>
            </div>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
            </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
            </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
            </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
            </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>