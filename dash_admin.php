<?php
  include 'db.php';
  $obj = new dbh(); 
  $mysqli = $obj->connect();
  session_start();
  if (isset($_POST['login'])) {
  $mail =  $mysqli->real_escape_string(trim($_POST['username']));
  $password = $mysqli->real_escape_string(trim($_POST['password']));
  
  if (empty($mail) || empty($password)) {
    header("Location: index.php");
  }
  else {
    $obj = new dbh(); 
    $mysqli = $obj->connect();
    $sql = "SELECT * FROM admin WHERE admin_email='$mail' AND admin_password='$password'";
      if($result =$mysqli->query($sql)){
        $numrows= $result->num_rows;
        //echo $numrows;
        if($numrows == 1){
          //echo "logged in";
          $_SESSION['logged_in'] = true;
          $_SESSION['user'] = $mail;
         
        }else{
          header("Location: index.php");
          exit();
        }
      }else{
        printf("query failed: %s\n",$mysqli->error);
      }
    }
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
          <a class="navbar-brand" href="dash_admin.php">Admin Page</a>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav mr-auto">
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Projects
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="create_project.php">Create Project</a>
          <a class="dropdown-item" href="view_project.php">view Project</a>
          <a class="dropdown-item" href="project_status.php">Project Status</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Employee
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_employee.php">Add Employee</a>
          <a class="dropdown-item" href="employee_info.php">Employee</a>
      </li>
      
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item ">
                <?php
                $obj = new dbh(); 
                $mysqli = $obj->connect();
                $name = $_SESSION['user'];
                ?>
                  <a class="nav-link" href="#"><?php echo $name; ?> </a>
                
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_logout.php">Logout</a>
                </li>
              </ul>
            
          </div>
        </nav>
      <section id="main">
          <div class="row">
              <div class="col-md-3">
              <div class="card" style="width: 18rem;">
              <img src="admin.PNG" class="card-img-top" alt="admin">
              <div class="card-body">
                <h5 class="card-title">ADMIN PAGE</h5>
                <p class="card-text">Manage your site</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a  href="create_project.php">Create project</a></li>
                <li class="list-group-item"><a href="view_project.php">view Project</a></li>
                <li class="list-group-item"><a href="project_status.php">Project Status</a></li>
                <li class="list-group-item"><a href="add_employee.php">Add employee</a></li>
                <li class="list-group-item"><a href="employee_info.php">Employee Info</a></li>
              </ul>
            </div>
              
              </div>
              <div class="col-md-9">
              <div class="p-2 bd-highlight "> Website overview</div>
              <div class="card col-md-3">
                <h5 class="card-header">Employee</h5>
                <div class="card-body">
                <?php 
                $obj = new dbh(); 
                $mysqli = $obj->connect();
                $sql = "SELECT * FROM employee";
                  if($result =$mysqli->query($sql)){
                    $numrows= $result->num_rows;
                ?>
                  <h5 class="card-title">no of Employee : <?php echo $numrows ?></h5>
                  <?php } ?>
                  <p class="card-text"></p>
                  <a href="employee_info.php" class="btn btn-outline-success">GO</a>
                </div>
              </div> <br> <br>
                
              <div class="card col-md-3">
                <h5 class="card-header">Project</h5>
                <div class="card-body">
                <?php 
                $obj = new dbh(); 
                $mysqli = $obj->connect();
                $sql = "SELECT * FROM projects";
                  if($result =$mysqli->query($sql)){
                    $numrows= $result->num_rows;
                ?>
                  <h5 class="card-title">no of Projects : <?php echo $numrows ?></h5>
                  <?php } ?>
                  <p class="card-text"></p>
                  <a href="view_project.php" class="btn btn-outline-success">GO</a>
                </div>  
              </div>
          </div>
      </section>
      
</body>
</html>