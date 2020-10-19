<?php 
include 'db.php';
session_start();  
$name=  $_SESSION['user'];
$obj = new dbh(); 
$mysqli = $obj->connect();
if (isset($_SESSION['logged_in'])) {
    $sql ="SELECT * FROM projects ";
    //echo $sql;
    $res=$mysqli->query($sql);
    $numrows= $res->num_rows;
    if($row = $numrows > 0 ){
      //echo  $numrows;
      $row = $res->fetch_array(MYSQLI_BOTH);
      $project_title = $row['project_title'];
      $project_description = $row['project_description'];
      $assgin_project = $row['assgin_project'];
      $start_date = $row['start_date'];
      $end_date = $row['end_date'];
      $project_status = $row['project_status'];
    }
    if(isset($_POST['save'])){
        $id =  $mysqli->real_escape_string(trim($_POST['id']));
        $emp_name= $mysqli->real_escape_string(trim($_POST['employee_name']));
        $sql = "INSERT INTO  projects (project_title,project_description,assgin_project,start_date,end_date)
        VALUES ('$project_title','$project_description',' $emp_name','$start_date',' $end_date')";
         $result =$mysqli->query($sql);
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
        <a class="navbar-brand" href="dash_employee.php">EMPLOYEE PAGE</a>
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
          <a class="dropdown-item" href="employee_info">Employee Info</a>
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
              <div class=" col-md-9">
              <h1>ASSGIN PROJECT</h1>
              <br>  
              <table class="table">
                <thead>
                    <tr>
                    <th>Employee Name</th>
                    <th>Employee email</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <?php
                $obj = new dbh(); 
                $mysqli = $obj->connect();
                $sql ="SELECT * FROM employee";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()){
                ?>
                 <tr>
                    <td><?php echo $row['employee_name']; ?></td>
                    <td><?php echo $row['employee_email']; ?></td>
                    <td>
                    <form action="assgin_task.php"  method="post">
                    <input type="hidden" name="id" value="<?php echo $row['project_id']; ?>">
                    <input type="hidden" name="employee_name" value="<?php echo $row['employee_name']; ?>">
                    <button  type="submit" class="btn btn-outline-danger" name="save" >ASSGIN TASK</button>
                    </form>
                   </td>
                 </tr>  
                 <?php }  ?>
               </table>
               
              </div>
              </div>
          </div>
      </section>
              
</body>
</html>