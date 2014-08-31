<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">

            <div class="customer-info col-md-6">
              <?php
                  foreach($customers as $customer) { 
              ?>
              
                    <form class="form-horizontal" id="popup-validation" action="add" method="post">

                      <div class="form-group">
                        <label class="control-label col-lg-4">First Name:</label>
                        <!-- <div class="col-lg-4"> -->
                        <label class="control-label"><?php echo $customer['first_name']; ?></label>
                          <!-- <input type="text" name="first_name" id="priority" class="validate[required] form-control" value ="<?php echo $customer['first_name']; ?>"> -->
                        <!-- </div> -->
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Last Name:</label>
                        <!-- <div class="col-lg-4"> -->
                        <label class="control-label"><?php echo $customer['last_name']; ?></label>
                          <!-- <input type="text" name="last_name" id="priority" class="validate[required] form-control" value="<?php echo $customer['last_name']; ?>"> -->
                        <!-- </div> -->
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Contact:</label>
                        <!-- <div class="col-lg-4"> -->
                        <label class="control-label"><?php echo $customer['email']; ?></label>
                          <!-- <input type="text" name="email" id="priority" class="validate[required] form-control" value="<?php echo $customer['email']; ?>"> -->
                        <!-- </div> -->
                      </div>
                  <?php 
                    }
                  ?>
                </div> <!-- end of customer info -->




            <div class="row">

                <div class="task-list col-md-6">

                <?php 
                  if (count($tasks)==0) 
                    echo "No Tasks... Yet!";
                  else {
                    ?>
                    <table class="table table-condensed table-hovered sortableTable">
                      <tr>
                        <th>Task ID</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Project</th>
                        <th>Set From</th>
                        <th>Set For</th>
                      
                      </tr>
                      
                      <?php
                      foreach($tasks as $task){
                        echo "<tr>";
                        echo "<td>";
                        echo $task['id'];
                        echo "</td>";

                        echo "<td>";
                        foreach ($priorities as $priority)
                          if ($task['priority']==$priority['id'])
                            echo $priority['name'];
                        echo "</td>";

                        echo "<td>";
                        foreach ($task_types as $task_type)
                          if ($task['type']==$task_type['id'])
                            echo $task_type['name'];                        
                        echo "</td>";

                        echo "<td>";
                        foreach ($projects as $project)
                          if ($task['project']==$project['id'])
                            echo $project['name'];                        
                        echo "</td>";                        

                        echo "<td>";
                        foreach ($users as $user)
                          if ($task['setfrom']==$user['id'])
                            echo $user['username'];
                        echo "</td>";

                        echo "<td>";
                        foreach ($users as $user)
                          if ($task['setfor']==$user['id'])
                            echo $user['username'];                        
                        echo "</td>";

                        echo "</tr>";
                      }
                    ?>
                  </table>

                  <?php
                    }
                  ?>

                </div> <!-- end of task list -->




                <div class="users-list col-md-6">
                  <?php 
                  if (count($projects)==0) 
                    echo "No projects... Yet!";
                  else {
                    ?>
                    <table class="table table-condensed table-hovered sortableTable">
                      <tr>
                        <th>Project Name</th>
                        <th>Project URL</th>
                        <th>Related Tasks</th>
                      </tr>
                      
                      <?php
                      $count=1;
                      foreach($projects as $project){
                        
                        echo "<tr>";
                        echo "<td>";
                        echo $project['name'];
                        echo "</td>";

                        echo "<td>";
                        echo $project['URL'];
                        echo "</td>";

                        echo "<td>";
                        echo $taskcount[$count];
                        echo "</td>";

                        echo "</tr>";
                        $count++;
                      }
                    ?>
                  </table>

                  <?php
                    }
                  ?>

                </div> <!-- end of users list -->

</div> <!-- end of row -->

<div class="row">

       <script>
$(function () {
    $('.task-priority-chart').highcharts({
        title: {
            text: 'Combination chart'
        },
        xAxis: {
            categories: ['project1', 'project2', 'Project3', 'project4', 'project5']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'low',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'medium',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'urgent',
            data: [4, 3, 3, 9, 2]
        }, {
            type: 'column',
            name: 'critical',
            data: [2, 3, 5, 7, 6]
        }, {

            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'low',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'medium',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'urgent',
                y: 23,
                color: Highcharts.getOptions().colors[2] // John's color
            }, {
                name: 'critical',
                y: 19,
                color: Highcharts.getOptions().colors[3] // Joe's color

            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
});


          </script>

          <div class="task-priority-chart col-md-6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
$(function () {
    $('.task-type-chart').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Stacked bar chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total fruit consumption'
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
            name: 'John',
            data: [5, 3, 4, 7, 2]
        }, {
            name: 'Jane',
            data: [2, 2, 3, 2, 1]
        }, {
            name: 'Joe',
            data: [3, 4, 4, 2, 5]
        }]
    });
});

</script>
          
  <div class="task-type-chart col-md-6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



</div> <!-- end of row -->

            <div style="width: 600px; padding-bottom: 40px; margin: 0 auto;">    </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    


    <?php include ('elements/footer.php'); ?>



