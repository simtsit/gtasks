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
                <th>Project ID</th>
                <th>Custmer</th>
                <th>Project Name</th>
                <th>Project URL</th>
              </tr>

                <?php
                  $count=0;
                  foreach($projects as $project) {
                    $count++;
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo "<td>" . $project['id'] . "</td>";
                    echo "<td>";
                    foreach($customers as $customer){
                      if ($project['customer']==$customer['id']) echo $customer['fullname'];
                    }
                    echo "</td>";
                    echo "<td>" . $project['name'] . "</td>";                    
                    echo "<td>" . $project['URL'] . "</td>";
                  }
                ?>
            </table>
          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>