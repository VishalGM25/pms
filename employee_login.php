<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
    <link rel="stylesheet" href="styles/styles.css">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
     *{
       padding: 0;
       margin: 0;
       box-sizing : broder-box;
     }
     body{
       background: #ffffdc;
     }
     .row{
         border-radius: 10px;
     }
     .Form{
         margin-top: 100px;
          background: #ffffdc;
     }
     img{
         margin-top: 40px;
         text-align:center;
     }
   </style>
 </head>
 <body>
 <section class="Form">
         <div class="container">
           <div class="row no-gutters">
             <div class="col-lg-5">
               <img src="pc.png" class="img-fluid" alt="pc">
             </div>
             <div class="col-lg-7 px-5 pt-5">
             <h1>EMPLOYEE</h1><br>
              <form  action="employee/dash_employee.php" method="post">
                 <div class="form-row">
                   <div class="col-lg-7">
                      <input type="hidden" name="id" >
                   <label>Username</label>
                   <input type="text" class="form-control" name="username" placeholder="enter username"><br>
                   <label>Password</label>
                   <input type="password" name="pwd" class="form-control" placeholder="enter password"> <br>
                   <button type="submit" class="btn btn-success" name="employee_login">Login</button>
                   </div>
                 </div>
               </form>
               <a href="index.php">Admin Login Here...</a>
             </div>
           </div>
         </div>

       </section>


</body>
</html>
