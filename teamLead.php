<?php
session_start();

if(!isset($_SESSION['login_code'])){
    die("error login");
}

if($_SESSION['user_role']!="team leader"){
    die("error login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPES Manager Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/00dd2119dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:white; ">


<div class="container-fluid min-vh-100">
  <div class="row vh-100">

    <div class="col-sm-6 col-lg-3 bg-gradient p-3 text-white text-center mw-100">
      <h3 class="mt-3 mb-5">Dashboard</h3>
      <h5 class="mb-3"><i class="fa-solid fa-user"></i>  &nbsp &nbsp Team Leader</h5>
      
      <h6><i class="fa-solid fa-right-from-bracket fa-lg"></i> &nbsp &nbsp <a href="logout.php"> Sign Out</a></h6>
    </div>

    <div class="col-6 col-lg-9 col-md-6 mx-auto p-5 bg-light">
    <h3 class="mt-3 mb-4 text-purple">Responsibilities</h3>  
    
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
        <div class="card border-success border-start border-0  mb-4 shadow-sm">            
        <div class="card-body">
        <h5 class="card-title">Sales Agent</h5>
          <p>Recruitments</p>
              <?php
              include 'connection.php';

              $query = "SELECT emp_code FROM employees WHERE emp_designation = 'Sales Agent' "; 
              $result = mysqli_query($conn, $query); 
                
              if ($result) 
              {  
                  $row = mysqli_num_rows($result);                   
                     if ($row) 
                        { 
                           printf("Number of Recruited Agents : " . $row. "/ 2(wanted)"); 
                           $presentage = ($row/2)*100; 
                           echo "<br>"."Precentage : ".$presentage . "%";
                        } 
                  mysqli_free_result($result); 
              }        
              ?> 
        <div class="progress" role="progressbar" aria-label="Default example" aria-valuenow="150" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger " style="width: 150%"></div></div>                 
        </div>
        </div>
        </div>
    </div>


    <h3 class="mt-3 mb-4 text-purple">Sales Targets</h3>  
    
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
        <div class="card border-success border-start border-0  mb-4 shadow-sm">            
        <div class="card-body">
        <h5 class="card-title mb-3">Introduce 3 new life policies</h5>
        <div class="progress text-center" role="progressbar" aria-label="Default example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger " style="width:0%"></div>0%</div>             
        </div>
        </div>
        </div>

        <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card border-success border-start border-0  mb-4 shadow-sm">            
        <div class="card-body">
        <h5 class="card-title mb-3">Collect LKR 500,000 premium collection per month</h5>
        <div class="progress" role="progressbar" aria-label="Default example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger " style="width: 0%"></div>0%</div>             
        </div>
        </div>
        </div>
    </div>

  </div>
</div>
</div>

</body>
</html>




