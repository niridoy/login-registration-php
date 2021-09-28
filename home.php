<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR); 

include ROOT_PATH . 'layouts/_header.php';
include ROOT_PATH . 'layouts/_navbar.php';

if(!isset($_SESSION["is_admin"])) {
    header('Location: index.php');
}

?>

<main role="main" class="container">
    <div class="starter-template">
    <h1>Home Page</h1>
    <p class="lead">Details About Home Page</p>
    </div>
</main><!-- /.container -->

<!-- Footer Section -->
<?php include ROOT_PATH . 'layouts/_footer.php' ?>