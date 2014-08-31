<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">

        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row"> 
                <div class="users-list col-md-3">

                <table class="table table-condensed table-hovered sortableTable">
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Related Projects</th>
                    <th>Related Tasks</th>
                  </tr>

                    <?php

                      $count=1;
                      foreach($customers as $customer) {
                        
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                       
                        echo "<td><a href='" . base_url() . "customers/profile/" . $customer['username'] . "'>";
                        echo $customer['fullname'];
                        echo "</a></td>";

                        echo "<td>";
                        echo $projectcount[$customer['id']];
                        echo "</td>";                    
                        
                        echo "<td>";
                        echo $customer_tasks[$customer['id']];
                        echo "</td>";
                        $count++;
                      }
                    ?>
                </table>
            </div> <!-- end of customer list -->

           <script>
              $(function () {
        $('.project-chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 1,//null,
                plotShadow: false
            },
            title: {
                text: 'Project % by Customer'
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
                        format: '<b>{point.name}</b>: {point.percentage:.1f} % ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '% of Total projects',
                data: [

                  
                  <?php
                    foreach ($customers as $customer) {
                      echo "['" . $customer['fullname'] . "'," . $projectcount[$customer['id']] . "],";
                    }
                    ?>

                ]
            }]
        });
    });
              </script>

              <div class="project-chart col-md-5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


           <script>
$(function () {
    $('.task-chart').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: [

            <?php 
            foreach($customers as $customer){
                echo "'" . $customer['fullname'] . "',";

            }
            ?>
                ]
        },
    yAxis: {
            min: 0,
            title: {
                text: 'Project Tasks by Priority'
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
            foreach($customers as $customer){

                $totalcount=0;        
                foreach($projects as $project){


                    foreach($tasks as $task){

                        // if($project['customer']==$customer['id']){

                        //     if($task['project']==$project['id']){

                        //         if($task['priority']==1){

                        //             $totalcount++;

                        //         } /* end of if */

                        //     }/* end of if */

                        // } /* end of if */

                        if(($project['customer']==$customer['id']) && ($task['project']==$project['id'])){

                                if($task['priority']==1){

                                    $totalcount++;

                                } /* end of if */

                            }/* end of if */


                    } /* end of customer foreach */

                } /* end of project foreach  */

                echo $totalcount . ", ";

            } /* end of task foreach */

          ?>
          ]

        }, {
            name: 'Medium',
            data: [
         <?php
            foreach($customers as $customer){

                $totalcount=0;

                foreach($projects as $project){        

                    foreach($tasks as $task){

                        if(($project['customer']==$customer['id']) && ($task['project']==$project['id'])){

                                if($task['priority']==2){

                                    $totalcount++;

                                } /* end of if */

                            }/* end of if */


                    } /* end of customer foreach */

                } /* end of project foreach  */

                echo $totalcount . ", ";

            } /* end of task foreach */
          ?>
          ]            
        }, {
            name: 'Urgent',
            data: [
         <?php
            foreach($customers as $customer){

                $totalcount=0;
                
                foreach($projects as $project){        

                    foreach($tasks as $task){

                        if(($project['customer']==$customer['id']) && ($task['project']==$project['id'])){

                                if($task['priority']==3){

                                    $totalcount++;

                                } /* end of if */

                            }/* end of if */


                    } /* end of customer foreach */

                } /* end of project foreach  */

                echo $totalcount . ", ";

            } /* end of task foreach */
          ?>
          ]            
        }, {
            name: 'Critical',
            data: [
         <?php
            foreach($customers as $customer){

                $totalcount=0;
                
                foreach($projects as $project){        

                    foreach($tasks as $task){

                        if(($project['customer']==$customer['id']) && ($task['project']==$project['id'])){

                                if($task['priority']==4){

                                    $totalcount++;

                                } /* end of if */

                            }/* end of if */


                    } /* end of customer foreach */

                } /* end of project foreach  */

                echo $totalcount . ", ";

            } /* end of task foreach */
          ?>
          ]            
        }]
    });
});                  </script>
              
<div class="task-chart col-md-4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

              </div> <!-- end of row -->
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>