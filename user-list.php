<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR); 

require_once ROOT_PATH . 'classes/DatabaseConnection.php';
require_once ROOT_PATH . 'classes/Entity.php';
require_once ROOT_PATH . 'classes/User.php';

include ROOT_PATH . 'layouts/_header.php';
include ROOT_PATH . 'layouts/_navbar.php';

    if(isset($_SESSION["is_admin"])) {
        if($_SESSION["is_admin"] != 'admin') {
            header('Location: index.php');
        }
    }

    //Database conneciton
    DatabaseConnection::connect('localhost','login_reg_db','root','');
    $dbInstance = DatabaseConnection::getInstance();
    $dbConnection = $dbInstance->getConneciton();
    $user = new User($dbConnection);
?>

<main role="main" class="container">
      <div class="row starter-template">
       <div class="col-md-8">
       <h1>User List</h1>
       </div>
        <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">User ID</th>
                <th scope="col">User Type</th>
                </tr>
            </thead>
                <tbody>
                    <?php 
                    foreach ($user->all() as $row) {
                        $user_type = $row["IsAdmin"] ? 'Admin' : 'User';
                        echo '<tr>
                            <th scope="row">' .$row["Id"] . '</th>
                            <td>' .$row["UserName"] . '</td>
                            <td>' . $row["UserId"] . '</td>
                            <td> ' . $user_type  . ' </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
          <?php 
        if(isset($_SESSION["success"])) {
          unset($_SESSION["success"]);
          echo '<div class="alert alert-success" role="alert">
                    User has been created successfully !
            </div>';
        }
      ?> 
        </div>
      </div>
</main><!-- /.container -->


<!-- Footer Section -->
<?php include ROOT_PATH . 'layouts/_footer.php' ?>