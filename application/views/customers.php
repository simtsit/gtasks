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
    $('.customer-chart').highcharts({
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

                //  ADD this to select slice
                // {
                //     name: 'somename',
                //     y: 12.8,
                //     sliced: true,
                //     selected: true
                // },

              
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

          <div class="customer-chart col-md-6" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>