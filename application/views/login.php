<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="dist/assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/assets/lib/font-awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="dist/assets/css/main.min.css">
    <link rel="stylesheet" href="dist/assets/lib/animate.css/animate.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="dist/assets/css/geckotaskman.css">

  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="http://geckowebworks.com/images/gecko_logo.png" alt="Gecko Logo">
      </div>
      <hr>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
         

    <?php echo form_open('login'); ?>
    <p>

      <?php
        echo form_label('Email Address:', 'email_address','class="form-control top"');
        echo form_input('email_address', set_value('email_address'), 'class="form-control top" id="email_address"');
      ?>
    </p>

    <p>
      <?php
        echo form_label('Password:', 'password','class="form-control bottom"');
        echo form_password('password', '', 'id="password" class="form-control bottom"');
      ?>
    </p>
    <br>
<p>
  <?php echo form_submit('submit', 'Login',"class='btn btn-lg btn-primary btn-block'"); ?>
  </p>

    <?php echo form_close(); ?>

    <div class="errors"> <?php echo validation_errors(); ?> </div>


        </div>
      </div>
      <hr>
      2014 &copy; Gecko Task Manager
    </div>
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
  </body>
</html>
