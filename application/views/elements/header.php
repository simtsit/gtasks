<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?></title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/lib/font-awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/css/main.min.css">

    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/lib/fullcalendar/fullcalendar.css">

    <!-- Gecko CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/css/gecko.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/dist/assets/css/less/theme.less">
    <script src="<?php echo base_url(); ?>/dist/assets/lib/less/less-1.7.3.min.js"></script>

    <!--Modernizr 2.8.2-->
    <script src="<?php echo base_url(); ?>/dist/assets/lib/modernizr/modernizr.min.js"></script>

    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <!-- High Charts -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    
    

  </head>