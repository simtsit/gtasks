<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row"> <!-- first row start -->

              <div class="col-md-7">
                <br>
                <p><strong>Welcome to GeckoTasks!</strong> This is a simple task manager with an even more simple perpose: to simulate a modern working enviroment.</p>
                <p>There is already some basic functionality enabled. Yet, many features are about to come.</p>
                <p>Feel free to navigate around and don't afraid to play. And please don't forget to give me some nice feedback with issues or ideas of improvement! ;)</p>
              </div>

            <div class="text-center col-md-5">
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
                <i class="fa fa-tasks fa-2x"></i>
                <span>Tasks</span> 
                <span class="label label-danger"><?php echo count($tasks); ?></span> 
              </a> 
              <a class="quick-btn" href="<?php echo base_url().'users'; ?>">
                <i class="fa fa-user fa-2x"></i>
                <span>Users</span> 
                <span class="label label-default"><?php echo count($users); ?></span> 
              </a> 
            </div>


          </div><!-- end of first row -->


            <div class="row">
              <div class="col-lg-8">
                <div class="box">
                  <header>
                    <h5>Tasks per Month</h5>
                  </header>

<script>
$(function () {
  Highcharts.setOptions({colors: ['#7CB5EC', '#90ED7D','#F7A35C','#ff0000', '#8085E9']});
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
    Highcharts.setOptions({colors: ['#90ED7D', '#7CB5EC', '#F7A35C','#FF0000']});
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

            } /* end of foreach */
 
          ?>
          ]

        }, {
            name: 'Medium',
            data: [

          <?php
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

            } /* end of foreach */
 
          ?>
          ]



        }, {          
            name: 'Urgent',
            data: [

          <?php
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

            } /* end of foreach */
 
          ?>
          ]


        }, {
            name: 'Critical',
            data: [
          
          <?php
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
    </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>