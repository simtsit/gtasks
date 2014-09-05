<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="col-md-7"> <!-- Project List start -->
              <table class="table table-condensed table-hovered sortableTable">
                <tr>
                  <th>Project Name</th>
                  <th>Custmer</th>
                  <th>Project URL</th>
                </tr>

                  <?php
                    foreach($projects as $project) {
                      
                      echo "<tr>";
                      echo '<td><a href="' . base_url() . 'projects/project_info/' . $project['codename'] .'">' .$project['name'] . '</a></td>';
                      echo "<td>";

                      foreach($customers as $customer){
                        if ($project['customer']==$customer['id']) {
                          echo '<a href="' . base_url() . 'customers/profile/' . $customer['username'] . '">';
                          echo $customer['fullname'];
                          echo '</a>';
                        }
                      }
                      echo "</td>";
                      echo "<td>" . $project['URL'] . "</td>";
                    }
                  ?>
                  <tr class="bold">
                    <td>Total:</td>
                    <td><?php echo count($projects); ?></td>
                    <td></td>
              </table>
            </div><!-- end of Project List -->
            <div class="col-md-5">
           <script>
              $(function () {
     Highcharts.setOptions({colors: ['#993d00','#cc5200','#ff6600','#ff8533','#ffa366','#ffc299']});                
        $('.project-chart').highcharts({
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
              <div class="project-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div><!-- end of col-md-6 -->

          </div>
        </div><!-- /#right -->
      </div><!-- /#wrap -->
    
    <?php include ('elements/footer.php'); ?>