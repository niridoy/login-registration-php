<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">User Manage</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <?php 
          
            if($_SESSION["is_admin"] == 'admin') {
              echo '<li class="nav-item">
                    <a class="nav-link" href="user-create.php">User Create</a>
                </li><li class="nav-item">
                <a class="nav-link" href="user-list.php">User List</a>
            </li>';
            }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="functions/logout.php">Log Out</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>