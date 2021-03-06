      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="<?php echo base_url() . 'users/profile/' . $active_user[0]['username']; ?>">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $preview; ?>"> 
            </a> 
            <div class="media-body">
              <br>
              <ul class="list-unstyled user-info">
                <li>
                  <a class="user-link" href="<?php echo base_url() . 'users/profile/' . $active_user[0]['username']; ?>">
                    <font color=orange><?php echo $active_user[0]['first_name'] . ' ' . $active_user[0]['last_name']; ?></font>
                  </a>
                </li>
                <br>
                <li><?php echo $position; ?></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>

      
              <li class="<?php if($active == "Dashboard") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>dashboard">
                  <i class="fa fa-dashboard"></i>&nbsp; Dashboard
                </a> 
              </li>

              <li class="<?php if($active == "Customers") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>customers">
                  <i class="fa fa-star"></i>&nbsp; Customers
                </a> 
              </li>

              <li class="<?php if($active == "Projects") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>projects">
                  <i class="fa fa-pencil"></i>&nbsp; Projects</a> 
              </li>

              <li class="<?php if($active == "Tasks") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>tasks">
                  <i class="fa fa-tasks"></i>&nbsp; Tasks</a> 
              </li>

              <li class="<?php if($active == "Users") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>users">
                  <i class="fa fa-user"></i>&nbsp; Users</a> 
              </li>

              <li class="<?php if($active == "Dontclickhere") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>dontclickhere">
                  <i class="fa fa-warning"></i>&nbsp; Don't click this!</a> 
              </li>

              <li class="<?php if($active == "History_log") echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>history_log">
                  <i class="fa fa-bar-chart-o"></i>&nbsp; History Log</a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>logout">
                  <i class="fa fa-power-off"></i>&nbsp; Logout</a> 
              </li>
        </ul><!-- /#menu -->
      </div><!-- /#left -->