<?php 
include 'db.php';
session_start();  
$name=  $_SESSION['username'];
$obj = new dbh(); 
$mysqli = $obj->connect();
if (isset($_SESSION['logged_in'])) {
  echo $name;
  if(isset($_POST['edit'])){
    $sql= "SELECT * FROM projects WHERE assgin_project='$name'";
    echo $sql;
   $res=$mysqli->query($sql);
   $numrows= $res->num_rows;
   if($row = $numrows > 0 ){
     echo  $numrows;
     $row = $res->fetch_array(MYSQLI_BOTH);
     $project_title = $row['project_title'];
     $project_description = $row['project_description'];
     $assgin_project = $row['assgin_project'];
     $start_date = $row['start_date'];
     $end_date = $row['end_date'];
     $project_status = $row['project_status'];
   }
}
if (isset($_POST['save'])) {
  // code...
  $project_title = $_POST['project_title'];
  $project_status = $_POST['project_status'];
  if (empty($project_title) ||  empty($project_status)) {
  echo 'requried field are missing';
  }else {
   $obj = new dbh(); 
   $mysqli = $obj->connect();
   $sql = "UPDATE projects SET project_title='$project_title',project_status='$project_status' WHERE project_='$project_title'";
   echo $sql;
   $result =$mysqli->query($sql);  
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
          <a class="navbar-brand" href="dash_employee.php">EMPLOYEE PAGE</a>
          <div class="collapse navbar-collapse" id="navbarCollapse">
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
                  <a class="nav-link" href="#">Hello </a>
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
              <img src="employee.PNG" class="card-img-top" alt="admin">
              <div class="card-body">
                <h5 class="card-title">EMPLOYEE PAGE</h5>
                <p class="card-text">Manage your site</p>
              </div>
              <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="update_profile.php">Update profile</a></li>
                <li class="list-group-item"><a href="assgin_task.php">Group Task</a></li>
              </ul>
            </div>
              
              </div>
              <div class="col-md-9 insert">
              <h1>EDIT</h1>
              <br>  
              <form action="edit_employee.php" style="display:inline-block; width:45%;text-align:center;" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <label>Project Title</label>
              <input type="text" class="form-control" name="project_title"  value="<?php echo $project_title ?>"><br>
              <label>project status</label>
              <input type="text" class="form-control" name="project_status" value="<?php echo $project_status ?>" ><br>
              <input type="submit" class="form-control btn-outline-secondary" name="save" value="update">
              </form>
              </div>
            
          </div>
      </section>
     
</body>
</html>