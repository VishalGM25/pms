<?php 
include '../db.php';
session_start();  
$name=  $_SESSION['user'];
$obj = new dbh(); 
$mysqli = $obj->connect();
if (isset($_SESSION['logged_in'])) {
$sql ="SELECT * FROM employee WHERE employee_name='$name' ";
//echo $sql;
$res=$mysqli->query($sql);
$numrows= $res->num_rows;
if($row = $numrows > 0 ){
  //echo  $numrows;
  $row = $res->fetch_array(MYSQLI_BOTH);
  $employee_name = $row['employee_name'];
  $employee_email = $row['employee_email'];
  $employee_password = $row['employee_password'];
}
}
if (isset($_POST['save'])) {
    // code..
    $employee_name =  $mysqli->real_escape_string(trim($_POST['employee_name']));
    $employee_email =  $mysqli->real_escape_string(trim($_POST['employee_email']));
    $employee_password =  $mysqli->real_escape_string(trim($_POST['employee_password']));
    if (empty($employee_name) || empty($employee_email) || empty($employee_password)) {
    echo 'requried field are missing';
    }else {
     $obj = new dbh(); 
     $mysqli = $obj->connect();
     $sql = "UPDATE employee SET employee_email='$employee_email',employee_password='$employee_password' WHERE employee_name='$name'";
     $result =$mysqli->query($sql);
     header("location: dash_employee.php");      
    }
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light  bg-light">
          <a class="navbar-brand" href="dash_employee.php">EMPLOYEE PAGE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="nav navbar-nav mr-auto">
            <li class="nav-item dropdown">
       
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
      </li>
      <li class="nav-item dropdown">
       
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
      </li>
      
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item ">
                  <a class="nav-link" href="#"><?php echo $name ?> </a>
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
              <div class="card">
              <img src="../images/employee.PNG" class="card-img-top" alt="admin">
              <div class="card-body">
                <h5 class="card-title">EMPLOYEE PAGE</h5>
                <p class="card-text">Manage your site</p>
              </div>
              <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="update_profile.php">Update profile</a></li>
                <li class="list-group-item"><a href="assgin_task.php">Group Project</a></li>
              </ul>
            </div>
              
              </div>
              <div class="col-md-9 insert">
              <div class=" col-md-6">
              <h1>UPDATE PROFILE</h1>
              <br>  
              <form action="update_profile.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <label>Employee Name</label>
              <input type="text" class="form-control" name="employee_name"  value="<?php echo $employee_name ?>"><br>
              <label>Employee Email</label>
              <input type="text" class="form-control" name="employee_email" value="<?php echo $employee_email ?>" ><br>
              <label>Employee Password</label>
              <input type="text" class="form-control" name="employee_password" value="<?php echo $employee_password ?>"><br>
              <input type="submit" class="form-control btn-outline-secondary" name="save" value="update">
              </form>
              </div>
              </div>
          </div>
      </section>
     
</body>
</html>