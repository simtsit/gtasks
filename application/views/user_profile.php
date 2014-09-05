<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="row">
              <div class="col-md-6"> <!-- User Stats Column Starts -->
              <?php
                  foreach($users as $user) { 
              ?>
              
                    <form class="form-horizontal" id="popup-validation" action="add" method="post">

                      <div class="form-group">
                        <div class="">
                          <p align="center">
                            <br>
                          <img src="<?php echo base_url() . 'dist/assets/img/users/' . $user['preview']; ?>">
                        </p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-4">Username</label>
                        <div class="col-lg-4">
                          <input type="text" name="username" id="priority" class="validate[required] form-control" value="<?php echo $user['username']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-4">First Name</label>
                        <div class="col-lg-4">
                          <input type="text" name="first_name" id="priority" class="validate[required] form-control" value ="<?php echo $user['first_name']; ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Last Name</label>
                        <div class="col-lg-4">
                          <input type="text" name="last_name" id="priority" class="validate[required] form-control" value="<?php echo $user['last_name']; ?>">                              
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Position</label>
                        <div class="col-lg-4">
                          <input type="text" name="position" id="priority" class="validate[required] form-control" value="<?php foreach($positions as $position){ if($position['id'] == $user['position']) echo $position['name']; } ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Email</label>
                        <div class="col-lg-4">
                          <input type="text" name="email" id="priority" class="validate[required] form-control" value="<?php echo $user['email']; ?>">
                        </div>
                      </div>

            

<!--                       <div class="form-actions no-margin-bottom" style="text-align: center;">
                        <input type="text" type="submit" value="Add Task" class="btn btn-primary">
                      </div>
                    </form> -->
<?php 
  }
?>

<script>
$(function () {

    $('#chart_container').highcharts({

        chart: {
            polar: true,
            type: 'area'
        },

        title: {
            text: 'User Personal Rating',
            x: -80
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['Social', 'Leadership', 'Resourceful', 'Methodic', 'Helpful', 'Teamwork'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
        },

        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 70,
            layout: 'vertical'
        },

        series: [{
            name: 'Personal Stats',
            data: [3, 2, 1, 2, 1, 1],
            pointPlacement: 'on '
        }]

    });
});</script>

<div id="chart_container" style="min-width: 400px; max-width: 600px; height: 400px; margin: 0 auto"></div>
</div> <!-- User Stats Column Ends -->
  <div class="col-md-6"> <!-- User Task List Starts -->
      
      <div class="user-tasks-for"> <!-- Tasks For List Starts -->
              <h3 align=center>Tasks set for <?php echo $users[0]['username'];?></h3>
           <?php
             if(count($tasks_for)==0)
              echo "There are no tasks set for this user yet.";
              else { ?>

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
                    foreach($tasks_for as $task) {
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
                        if($user['id']==$task['setfor'])
                          echo $user['username'];
                      }
                      echo '</a></td>';


                      // Set for 

                      echo '<td><a href="';
                      echo base_url() . 'users/profile/';
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


                      echo "<td>";
                      foreach($projects as $project){
                        if($task['project']==$project['id'])
                          echo $project['name'];
                      }

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
              <?php } ?>

      </div> <!-- Tasks For List Ends-->
      <div class="user-tasks-from"> <!-- Task From List Starts -->
             <h3 align=center>Tasks set from <?php echo $users[0]['username'];?></h3>

             <?php
             if(count($tasks_for)==0)
              echo "This user haven't set any task yet.";

              else { ?>

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
                    foreach($tasks_from as $task) {
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
                      echo base_url() . 'users/profile/';
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


                      echo "<td>";
                      foreach($projects as $project){
                        if($task['project']==$project['id'])
                          echo $project['name'];
                      }

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
              <?php } ?>
      <div>
      </div><!-- end of Task From List -->
  </div><!--User Task List Ends -->

</div> <!-- End of row -->

        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>