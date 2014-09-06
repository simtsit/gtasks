<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="col-md-6"> <!-- Task List starts -->
              <div class="form-block">
                <form action="<?php echo base_url(); ?>tasks/create">
              <input type="submit" value="Add a Task" class="btn btn-primary">
                </form>
              </div>
              <table class="table table-condensed table-hovered sortableTable">
                <tr>
                  <th>Priority</th>
                  <th>Task Type</th>
                  <th>Set From</th>
                  <th>Set For</th>
                  <th>Project</th>
                  <th>Status</th>
                </tr>

                  <?php
                    foreach($tasks as $task) {
                      echo "<tr>";

                      echo "<td class=";
                      foreach ($priorities as $priority)
                        if ($task['priority']==$priority['id'])
                          echo $priority['name'];
                      echo ">";
                      foreach ($priorities as $priority)
                        if ($task['priority']==$priority['id'])
                      echo $priority['name'];
                      echo "</td>";

                      echo "<td>";
                        foreach($task_types as $task_type){
                        if ($task_type['id']==$task['type'])
                          echo $task_type['name'];
                      }
                      echo "</td>";


                      // Set from

                      echo '<td><a href="';
                      echo base_url() . 'users/profile/';
                      foreach($users as $user){
                        if($user['id']==$task['setfrom'])
                          echo $user['username'];
                      }
                      echo '">';
                      foreach($users as $user){
                        if($user['id']==$task['setfrom'])
                          echo $user['username'];
                      }
                      echo '</a></td>';


                      // Set for 

                      echo '<td><a href="';
                      echo base_url() . 'users/project_info/';
                      foreach($users as $user){
                        if($user['id']==$task['setfor'])
                          echo $user['username'];
                      }
                      echo '">';
                      foreach($users as $user){
                        if($user['id']==$task['setfor'])
                          echo $user['username'];
                      }
                      echo '</a></td>';


                      echo '<td><a href="';
                      echo base_url() . 'projects/profile/';
                      foreach($projects as $project){
                        if($task['project']==$project['id'])
                          echo $project['codename'];
                      }
                      echo '">';
                      foreach($projects as $project){
                        if($task['project']==$project['id'])
                          echo $project['name'];
                      }
                      echo "</a>";
                      echo "</td>";

                      echo "<td>";
                      foreach($task_statuses as $task_status){
                        if($task['status']==$task_status['id'])
                          echo $task_status['name'];
                      }
                      echo "</td>";


                      echo "</tr>";
                    }
                  ?>
              </table>
              </div><!-- end of task list -->
              <div class="col-md-6"> <!-- Task Chart Starts -->
      <script>
$(function () {
 Highcharts.setOptions({colors: ['#90ED7D', '#7CB5EC', '#F7A35C','#FF0000']});  
    $('.task-priority-chart').highcharts({
            <?php
              $normaltaskcount=0;
              $mediumtaskcount=0;
              $urgenttaskcount=0;
              $criticaltaskcount=0;

              foreach($tasks as $task){
                  if($task['priority']==1) $normaltaskcount++;
                  if($task['priority']==2) $mediumtaskcount++;
                  if($task['priority']==3) $urgenttaskcount++;
                  if($task['priority']==4) $criticaltaskcount++;
              }
            ?>
      chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['<?php echo $priorities[0]['name'] ?>', <?php echo $nomrmaltaskcount; ?>],
                ['<?php echo $priorities[1]['name'] ?>', <?php echo $mediumtaskcount; ?>],
                ['<?php echo $priorities[2]['name'] ?>', <?php echo $urgenttaskcount; ?>],
                ['<?php echo $priorities[3]['name'] ?>', <?php echo $criticalaltaskcount; ?>],
            ]
        }]
    });
});

          </script>
          <div class="row">
              <div class="task-priority-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div> <!-- end of div row -->

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
          <div class="row">
              <div class="task-type-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div> <!-- end of div row -->








              </div> <!-- end of Task Chart List -->

          </div> <!-- end of inner -->
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>