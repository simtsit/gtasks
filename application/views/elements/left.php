      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $preview; ?>"> 
            </a> 
            <div class="media-body">
              <br>
              <ul class="list-unstyled user-info">
                <li><font color=orange><?php echo $first_name; ?></font></li>
                <li><?php echo $position; ?></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>

      
              <li>
                <a href="<?php echo base_url(); ?>dashboard">
                  <i class="fa fa-dashboard <?php if ($active == "Dashboard") echo 'active'; ?>"></i>&nbsp; Dashboard
                </a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>customers">
                  <i class="fa fa-table <?php if ($active == "Customers") echo 'active'; ?>"></i>&nbsp; Customers
                </a> 
              </li>


              <li>
                <a href="<?php echo base_url(); ?>projects">
                  <i class="fa fa-pencil <?php if ($active == "Projects") echo 'active'; ?>"></i>&nbsp; Projects</a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>tasks">
                  <i class="fa fa-tasks <?php if ($active == "Tasks") echo 'active'; ?>"></i>&nbsp; Tasks</a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>users">
                  <i class="fa fa-font <?php if ($active == "Users") echo 'active'; ?>"></i>&nbsp; Users</a> 
              </li>


              <li>
                <a href="<?php echo base_url(); ?>monthly_reviews">
                  <i class="fa fa-table <?php if ($active == "Users") echo 'active'; ?>"></i>&nbsp; Monthly Reviews</a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>daily_targets">
                  <i class="fa fa-file <?php if ($active == "Users") echo 'active'; ?>"></i>&nbsp; Daily Targets</a> 
              </li>


              <li>
                <a href="<?php echo base_url(); ?>daily_target">
                  <i class="fa fa-font <?php if ($active == "Users") echo 'active'; ?>"></i>&nbsp; Daily Target</a> 
              </li>

              <li>
                <a href="<?php echo base_url(); ?>monthly_targets">
                  <i class="fa fa-tasks <?php if ($active == "Tasks") echo 'active'; ?>"></i>&nbsp; Monthly Targets</a> 
              </li>

        </ul><!-- /#menu -->
      </div><!-- /#left -->