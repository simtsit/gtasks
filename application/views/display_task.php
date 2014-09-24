<?php include('elements/header.php'); ?>

  <body class="  ">
    <div class="bg-dark dk" id="wrap">

    <?php include('elements/top.php'); ?>

    <?php include('elements/left.php'); ?>

      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <style>
              .form-control.col-lg-6 {
                width: 50% !important;
              }
            </style>
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header class="dark">
                    <div class="icons">
                      <i class="fa fa-check"></i>
                    </div>
                    <h5>Add new Task</h5>

                    <!-- .toolbar -->
                  </header>
                  <div id="collapse2" class="body">
                    <form class="form-horizontal" id="popup-validation" action="add" method="post">

                      <div class="form-group">
			<label class="control-label col-lg-4">Task Type</label>
			<?php echo $task_types[$tasks[0]['type']]['name']; ?>
                      </div>


                      <div class="form-group">
			<label class="control-label col-lg-4">Project</label>
			<?php echo $projects[$tasks[0]['project']]['name']; ?>
		      </div>



                      <div class="form-group">
			<label class="control-label col-lg-4">Set from</label>
			<?php echo $users[$tasks[0]['setfrom']]['username']; ?>
		      </div>


                      <div class="form-group">
			<label class="control-label col-lg-4">Set for</label>
			<?php echo $users[$tasks[0]['setfor']]['username']; ?>
                      </div>

                      <div class="form-group">
			<label class="control-label col-lg-4">Priority</label>
			<?php echo $priorities[$tasks[0]['priority'] - 1]['name']; ?>
                      </div>


                      <div class="form-group">
			<label class="control-label col-lg-4">Description</label>
			<?php echo $tasks[0]['description']; ?>
                      </div>              

                      <div class="form-actions no-margin-bottom" style="text-align: center;">
                        <input type="submit" value="Complete Task" class="btn btn-primary">
                      </div>
                      
                      <div class="form-actions no-margin-bottom" style="text-align: center;">
                        <input type="submit" value="Edit Task" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
 

            </div><!-- /.row -->
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      
    <?php include ('elements/footer.php'); ?>
