<?php include '../db.php';
session_start();
$name  = $_SESSION['user'];
if (isset($_SESSION['logged_in'])) {
    if(isset($_POST['save'])){
      $obj = new dbh(); 
  $mysqli = $obj->connect();
        $project_title =  $mysqli->real_escape_string(trim($_POST['project_title']));
        $project_description =  $mysqli->real_escape_string(trim($_POST['project_description']));
        $assgin_project =  $mysqli->real_escape_string(trim($_POST['assgin_project']));
        $start_date =  $mysqli->real_escape_string(trim($_POST['start_date']));
        $end_date =  $mysqli->real_escape_string(trim($_POST['end_date']));
        $project_status =  $mysqli->real_escape_string(trim($_POST['project_status']));
        if (empty($project_title) || empty($project_description) || empty($assgin_project) || empty($start_date) || empty($end_date) || empty($project_status)) {
            echo 'requried field are missing';
           }else {
             $obj = new dbh(); 
             $mysqli = $obj->connect();
             $sql = "INSERT INTO  projects (project_title,project_description,assgin_project,start_date,end_date,project_status)
             VALUES ('$project_title','$project_description','$assgin_project','$start_date',' $end_date','$project_status')";
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
          <a class="navbar-brand" href="dash_admin.php">Admin Page</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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
          <a class="dropdown-item" href="employee_info">Employee Info</a>
      </li>
      
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item ">
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
              <div class="card">
              <img src="../images/admin.PNG" class="card-img-top" alt="admin">
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
              <div class="col-md-9 insert">
              <div class=" col-md-6">
              <h1>ADD PROJECT</h1>
              <br>  
              <form action="create_project.php" method="post">
              <label>Project Title</label>
              <input type="text" class="form-control" name="project_title"  ><br>
              <label>Project Description</label>
              <input type="text" class="form-control" name="project_description"  > <br>
              <label>Assgin Project</label>
              <input type="text" class="form-control" name="assgin_project" ><br>
              <label>Start Date</label>
              <input type="date" class="form-control" name="start_date"  ><br>
              <label>End Date</label>
              <input type="date" class="form-control" name="end_date" ><br>
              <label>Project Status</label>
              <input type="text" class="form-control" name="project_status" ><br>
              <input type="submit" class="form-control btn-outline-secondary" name="save" value="Add Project">
              </form>
              </div>
              </div>
          </div>
      </section>
      
</body>
</html>