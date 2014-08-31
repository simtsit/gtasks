<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <table class="table table-condensed table-hovered sortableTable">
              <tr>
                <th>#</th>
                <th>Task ID</th>
                <th>Priority</th>
                <th>Task Type</th>
                <th>Set From</th>
                <th>Set For</th>
                <th>Description</th>
              </tr>

                <?php
                  $count=0;
                  foreach($tasks as $task) {
                    $count++;
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo "<td>" . $task['id'] . "</td>";
                    echo "<td>";
                      foreach($priorities as $priority){
                      if ($priority['id']==$task['priority'])
                        echo $priority['name'];
                    }
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


                    echo "<td>" . $task['description'] . "</td>";
                    echo "</tr>";
                  }
                ?>
            </table>

            <form action="<?php echo base_url(); ?>tasks/create">
                <input type="submit" value="Add Task" class="btn btn-primary">
            </form>

          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>