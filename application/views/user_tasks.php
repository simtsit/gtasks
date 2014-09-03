<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="col-md-6"> <!-- Task For List starts -->
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

              </div><!-- End of Task For list -->

            <div class="col-md-6"> <!-- Task From List starts -->
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

              </div><!-- end of Task From List -->



          </div> <!-- end of inner -->
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>
