<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="users-list col-md-6">
            <table class="table table-condensed table-hovered sortableTable">
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Email</th>
              </tr>

                <?php
                  $count=0;
                  foreach($users as $user) {
                    $count++;
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    echo '<td><a href="';
                    echo base_url() . 'users/profile/' . $user['username'];
                    echo '">'. $user['username']. '</a></td>';


                    echo "<td>" . $user['first_name'] . "</td>";
                    echo "<td>" . $user['last_name'] . "</td>";
                    echo "<td>";
                    foreach($positions as $position) {
                      if($position['id']==$user['position']) echo $position['name'];
                    } 
                    echo "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                  }
                ?>
            </table>
          </div> <!-- end of users list -->

          <script>
          $(function () {
    $('.users-chart').highcharts({
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
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
          </script>

          <div class="users-chart col-md-6" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>