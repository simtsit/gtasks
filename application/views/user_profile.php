<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">

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
                        <label class="control-label col-lg-4">User ID</label>
                        <div class="col-lg-4">
                          <input type="text" name="user_id" id="priority" class="validate[required] form-control" value="<?php echo $user['id']; ?>">
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

  <div style="width: 600px; padding-bottom: 40px; margin: 0 auto;">
    <h2>Monthly Reviews for <?php echo $user['first_name'] . ' ' , $user['last_name']; ?></h2>

    <?php 

    if (!empty($monthly_reviews)) { 
     echo '<table class="table table-condensed table-hovered sortableTable">';
     echo '<tr>';
     echo '<th>Month</th>';
     echo '<th>Made by</th>';
     echo '<th>Quantity</th>';
     echo '<th>Quality</th>';
     echo '<th>Contribution</th>';
     echo '<th>Learning</th>';
     echo '<th>Cooperative</th>';
     echo '</tr> ';
                            
              foreach ($monthly_reviews as $monthly_review) {
            
                echo "<tr>";
                echo "<td>" . $monthly_review['period'] . "</td>";
            
            
                echo '<td><a href="';
                echo base_url() . 'users/profile/';
                foreach($usernames as $username){
                  if($username['id']==$monthly_review['review_manager'])
                    echo $username['username'];
                }
                echo '">';
                foreach($usernames as $username){
                  if($username['id']==$monthly_review['review_manager'])
                    echo $username['username'];
                }
                echo '</a></td>';


                // STAT 1 //
                echo '<td>';
                foreach($review_marks as $review_mark){
                  if($review_mark['id']==$monthly_review['stat1'])
                    echo $review_mark['name'];
                }
                echo '</td>';


                // STAT 2 //
                echo '<td>';
                foreach($review_marks as $review_mark){
                  if($review_mark['id']==$monthly_review['stat2'])
                    echo $review_mark['name'];
                }
                echo '</td>';



                // STAT 3 //
                echo '<td>';
                foreach($review_marks as $review_mark){
                  if($review_mark['id']==$monthly_review['stat3'])
                    echo $review_mark['name'];
                }
                echo '</td>';


                // STAT 4 //
                echo '<td>';
                foreach($review_marks as $review_mark){
                  if($review_mark['id']==$monthly_review['stat4'])
                    echo $review_mark['name'];
                }
                echo '</td>';


                // STAT 5 //
                echo '<td>';
                foreach($review_marks as $review_mark){
                  if($review_mark['id']==$monthly_review['stat5'])
                    echo $review_mark['name'];
                }
                echo '</td>';

                  
                  }
            echo '</table>';

             } 
              else echo "No monthly reviews!"; 
            ?>
  </div>



          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>