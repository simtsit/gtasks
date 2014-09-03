      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="<?php echo base_url(); ?>/dist/assets/img/logo.png" alt="">
              </a> 
            </header>

            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <p class="page-title">GeckoTasks | GeckoWebWorks.com</p>
              <!-- .nav -->
              <ul class="nav navbar-nav">
                <li><a href="users/profile/<?php echo $_SESSION['user'] ?>">My Profile</a></li>
                <li><a href="tasks/mytasks/<?php echo $_SESSION['user']; ?>">My Tasks</a></li>
                <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
              </ul><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="main-bar">
            <h3>
              <i class="fa
              <?php
              if($active=="Dashboard") echo " fa-dashboard";
              if($active=="Customers") echo " fa-star";
              if($active=="Projects") echo " fa-pencil";
              if($active=="Tasks") echo " fa-tasks";
              if($active=="Users") echo " fa-users";
              if($active=="Monthly Reviews") echo " fa-bar-chart-o";
              if($active=="Monthly Targets") echo " fa-table";
              if($active=="Logs") echo " fa-warning";
              ?>
              ">
              </i>&nbsp; <?php echo $title; ?></i>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->