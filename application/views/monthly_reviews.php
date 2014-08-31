<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="monthly-review-list col-md-6">
            <table class="table table-condensed table-hovered sortableTable">
              <tr>
                <th>#</th>
                <th>Period</th>
                <th>Manager</th>
                <th>Employee</th>
                <th>Quantity</th>
                <th>Quality</th>
                <th>Contribution</th>
                <th>Learning</th>
                <th>Cooperation</th>              
              </tr>

                <?php
                  $count=0;
                  foreach($monthly_reviews as $monthly_review) {
                    $count++;
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo "<td>" . $monthly_review['period'] . "</td>";

                    // Set from

                    echo '<td><a href="';
                    echo base_url() . 'users/profile/';
                    foreach($users as $user){
                      if($monthly_review['review_manager']==$user['id'])
                        echo $user['username'];
                    }
                    echo '">';
                    foreach($users as $user){
                      if($monthly_review['review_manager']==$user['id'])
                        echo $user['username'];
                    }
                    echo '</a></td>';


                    // Set for 

                    echo '<td><a href="';
                    echo base_url() . 'users/profile/';
                    foreach($users as $user){
                      if($monthly_review['review_employee']==$user['id'])
                        echo $user['username'];
                    }
                    echo '">';
                    foreach($users as $user){
                      if($monthly_review['review_employee']==$user['id'])
                        echo $user['username'];
                    }
                    echo '</a></td>';


                    echo '<td>';
                    foreach($review_marks as $review_mark){
                      if($monthly_review['stat1']==$review_mark['id'])
                        echo $review_mark['name'];
                    }
                    echo '</td>';


                    echo '<td>';
                    foreach($review_marks as $review_mark){
                      if($monthly_review['stat2']==$review_mark['id'])
                        echo $review_mark['name'];
                    }
                    echo '</td>';

                    echo '<td>';
                    foreach($review_marks as $review_mark){
                      if($monthly_review['stat3']==$review_mark['id'])
                        echo $review_mark['name'];
                    }
                    echo '</td>';

                    echo '<td>';
                    foreach($review_marks as $review_mark){
                      if($monthly_review['stat4']==$review_mark['id'])
                        echo $review_mark['name'];
                    }
                    echo '</td>';

                    echo '<td>';
                    foreach($review_marks as $review_mark){
                      if($monthly_review['stat5']==$review_mark['id'])
                        echo $review_mark['name'];
                    }
                    echo '</td>';

                    echo "</tr>";
                  }
                ?>
            </table>
            </div> <!-- end of monthly review div -->
            <script>
$(function () {
    $('.monthly-review-chart').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Above',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'Below',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'Meet',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});

            </script>
<div class="monthly-review-chart col-md-6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>