<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="users-list col-md-7">

                <div class="users-block">

                <?php
                foreach($users as $user){
                    echo '<div class="user-block">';
                    echo '<a href="' . base_url() . 'users/profile/' . $user['username'] .'">';
                    echo '<img class="center media-object img-thumbnail user-img" alt="User Picture" src="' . base_url() . 'dist/assets/img/users/' . $user['preview'] . '">';
                    echo '</a>';
                    echo $user['first_name'] . ' ' . $user['last_name'] . '<br>';
                    foreach($positions as $position){
                        if($user['position']==$position['id'])
                            echo $position['name']. "<br>";
                    }
                    echo 'Tasks: <span class="bold">';
                    $taskcount=0;
                    foreach($tasks as $task){
                        if($task['setfor']==$user['id'])
                            $taskcount++;
                    }
                    $tasks[$user['username']]=$taskcount;

                    echo $tasks[$user['username']] . '</span>';
                    echo '</div>';
                }

            ?>
        </div>
          </div> <!-- end of users list -->

          <script>
          $(function () {
    Highcharts.setOptions({colors: ['#ff6600','#ff8533','#ffa366','#ffc299']});                            
    $('.users-chart').highcharts({

        chart: {
            type: 'column'
        },
        title: {
            text: 'World\'s largest cities per 2014'
        },
        subtitle: {
            text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
        },
        series: [{
            name: 'Population',
            data: [

            <?php 
                foreach($users as $user) {
                    echo "['" . $user['username'] . "', " . $tasks[$user['username']] . "],";
                }
            ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
        }]
    });
});
          </script>

          <div class="users-chart col-md-5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>