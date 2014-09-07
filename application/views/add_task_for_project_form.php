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
                    <form class="form-horizontal" id="popup-validation" action="../add_to/<?php echo $codename; ?>" method="post">

                      <div class="form-group">
                        <label class="control-label col-lg-4">Task Type</label>
                        <div class="col-lg-4">
                          <select name="task_type" id="setfor" class="validate[required] form-control">
                            <option value="">Choose a Type</option>
                            <?php foreach($task_types as $task_type){
                              echo '<option value="' . $task_type['id'] . '">' . $task_type['name'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-lg-4">Project</label>
                        <div class="col-lg-4">
                            <label><?php echo $project_name; ?></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-4">Set for</label>
                        <div class="col-lg-4">
                          <select name="setfor" id="setfor" class="validate[required] form-control">
                            <option value="">Choose a user</option>
                            <?php foreach($users as $user){
                              echo '<option value="' . $user['id'] . '">' . $user['username'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-4">Priority</label>
                        <div class="col-lg-4">
                          <select name="priority" id="priority" class="validate[required] form-control">
                            <?php foreach($priorities as $priority){
                              echo '<option value="' . $priority['id'] . '">' . $priority['name'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-4">Description</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" type="text" name="description" id="description" />
                        </div>
                      </div>              

                      <div class="form-actions no-margin-bottom" style="text-align: center;">
                        <input type="submit" value="Add Task" class="btn btn-primary">
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