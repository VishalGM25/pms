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
<?php
  include '../db.php';
  session_start(); 
  $obj = new dbh(); 
  $mysqli = $obj->connect();
  if (isset($_POST['employee_login'])) {
  $username =  $mysqli->real_escape_string(trim($_POST['username']));
  $pwd =  $mysqli->real_escape_string(trim($_POST['pwd']));
  $id =  $mysqli->real_escape_string(trim($_POST['id']));
  //echo $username;
  //echo $pwd;
  if (empty($username) || empty($pwd)) {
    header("Location: ../employee_login.php");
  }else{
     $obj = new dbh(); 
     $mysqli = $obj->connect();
     $sql = "SELECT * FROM employee WHERE employee_name='$username' AND employee_password='$pwd'";
       if($result =$mysqli->query($sql)){
         $numrows= $result->num_rows;
         //echo $numrows;
         if($numrows == 1){
           //echo "logged in";
           $_SESSION['logged_in'] = true;
           $_SESSION['user'] = $username;
           
         }else{
           header("Location: ../employee_login.php");
           exit();
         }
       }else{
         printf("query failed: %s\n",$this->connect()->error);
       }
      
  }
} 
     
?>
    
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light  bg-light">
          <a class="navbar-brand" href="dash_employee.php">Employee Page</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item ">
            <?php $name = $_SESSION['user'] ?>
                  <a class="nav-link" href="#"><?php echo $name ?> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee_logout.php">Logout</a>
                </li>
              </ul>
            
          </div>
        </nav>
      <section id="main">
          <div class="row">
              <div class="col-md-3">
              <div class="card" >
              <img src="../images/employee.PNG" class="card-img-top" alt="employee">
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
              <div class="col-md-9">
              <br>
              <br>
              <div class="card col-md-3">
                <h5 class="card-header">ASSGIN PROJECTS</h5>
              
              
          </div>
          <br>
          <br>
          <div class="table-responsive"> 
          <table class="table table-md">
                <thead>
                    <tr>
                    <th>Project Title</th>
                    <th>Project Description</th>
                    <th>Assgin Project</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Status</th>
                    <th> Action</th>
                    </tr>
                </thead>
                <?php
                $obj = new dbh(); 
                $mysqli = $obj->connect();
                $name  = $_SESSION['user']; 
                $sql ="SELECT * FROM projects WHERE assgin_project='$name'";
                //echo $sql;
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()){
                ?>
                 <tbody>
                 <tr>
                    <td><?php echo $row['project_title']; ?></td>
                    <td><?php echo $row['project_description']; ?></td>
                    <td><?php echo $row['assgin_project']; ?></td>
                    <td><?php echo $row['start_date']; ?></td>
                    <td><?php echo $row['end_date']; ?></td>
                    <td><?php echo $row['project_status']; ?></td>
                    <td>
                    <form action="update_status_project.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['project_id']; ?>">
                    <button  type="submit" class="btn btn-outline-danger" name="edit" >EDIT</button>
                    </form>
                    </td>
                 </tr>
                 </tbody>  
                 <?php }  ?>
               </table>
               </div>
      </section>
      
</body>
</html>