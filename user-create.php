<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR); 

    if(isset($_SESSION["is_admin"])) {
        if($_SESSION["is_admin"] != 'admin') {
            header('Location: index.php');
        }
    }

    include ROOT_PATH . 'layouts/_header.php';
    include ROOT_PATH . 'layouts/_navbar.php';

?>

<main role="main" class="container">
      <div class="row starter-template">
       <div class="col-md-8">
       <h1>Crate New User</h1>
       </div>
        <div class="col-md-8">
          <form action="functions/user_create_post.php" method="POST">
            <div class="form-group">
              <label for="user_name">User Name:</label>
              <input type="text" class="form-control" placeholder="Enter User Name" name="user_name" id="user_name">
            </div>
            <div class="form-group">
              <label for="user_id">User Name:</label>
              <input type="user_id" class="form-control" placeholder="Enter User ID" name="user_id" id="user_id">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <?php 
            if(isset($_SESSION["success"])) {
                if(!$_SESSION["success"]) {
                    if(isset($_SESSION["has_unique"])) {
                      echo '<div class="alert alert-danger mt-2" role="alert">
                        User Id is unique;
                      </div> ';
                    }else{
                      echo '<div class="alert alert-danger mt-2" role="alert">
                        User Name , User ID & Password fields are required !
                      </div> ';
                    }
                }
                unset($_SESSION["success"]);
                unset($_SESSION["has_unique"]);
            }
          ?> 
        </div>
      </div>
</main><!-- /.container -->


<!-- Footer Section -->
<?php include ROOT_PATH . 'layouts/_footer.php' ?>