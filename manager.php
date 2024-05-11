<?php
session_start();

if(!isset($_SESSION['login_code'])){
    die("error login");
}

if($_SESSION['user_role']!="manager"){
    die("error role");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/00dd2119dc.js" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="style.css">

</head>
<body style="background-color:white; ">


<div class="container-fluid min-vh-100">
  <div class="row vh-100">
    <div class="col-sm-6 col-lg-3 bg-gradient p-3 text-white text-center mw-100">
      <h3 class="mt-3 mb-5">Dashboard</h3>
      <h5 class="mb-3"><i class="fa-solid fa-user"></i>  &nbsp &nbsp Manager</h5>      
      <h6><i class="fa-solid fa-right-from-bracket fa-lg"></i> &nbsp &nbsp <a href="logout.php">Sign Out</a></h6>
    </div>

    <div class="col-6 col-lg-9 col-md-6 mx-auto p-5 bg-light">
    <h3 class="mt-3 mb-4 text-purple">Responsibilities</h3>  
    
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
          <div class="card border-success border-start border-0  mb-4 shadow-sm">            
          <div class="card-body">
          <h5 class="card-title ">Sales Agent</h5>
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
                           echo "<br>"."Precentage : ".round($presentage,2) . "%";
                        } 
                  mysqli_free_result($result); 
              }        
              ?>
              <div class="progress" role="progressbar" aria-label="Default example" aria-valuenow="150" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger " style="width: 150%"></div>
              </div>             
            </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card border-success border-start border-0  mb-4 shadow-sm">            
          <div class="card-body">
          <h5 class="card-title ">Team Leader</h5>
          <p>Recruitments</p>
              <?php
              include 'connection.php';

              $query = "SELECT emp_code FROM employees WHERE emp_designation = 'Team Leader' "; 
              $result = mysqli_query($conn, $query); 
                
              if ($result) 
              {  
                  $row = mysqli_num_rows($result);                   
                     if ($row) 
                        { 
                           printf("Number of Recruited Agents : " . $row . "/ 2(wanted)"); 
                           $presentage = ($row/2)*100; 
                           echo "<br>"."Precentage : ".round($presentage,2). "% ";
                        } 
                  mysqli_free_result($result); 
              }        
              ?>
              <div class="progress" role="progressbar" aria-label="Default example" aria-valuenow="150" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger " style="width: 150%"></div>
              </div>             
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
          <div class="card border-success border-start border-0  mb-4 shadow-sm">            
          <div class="card-body">
          <h5 class="card-title ">Sales Supervisor</h5>
          <p>Recruitments</p>
              <?php
              include 'connection.php';

              $query = "SELECT emp_code FROM employees WHERE emp_designation = 'Supervisor' "; 
              $result = mysqli_query($conn, $query); 
                
              if ($result) 
              {  
                  $row = mysqli_num_rows($result);                   
                     if ($row) 
                        { 
                           printf("Number of Recruited Supervisors : " . $row. "/ 2(wanted)"); 
                           $presentage = ($row/2)*100; 
                           echo "<br>"."Precentage : ".round($presentage,2). "%";
                        } 
                  mysqli_free_result($result); 
              }        
              ?>
              <div class="progress" role="progressbar" aria-label="Default example" aria-valuenow="150" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger " style="width: 150%"></div>
              </div>             
            </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card border-success border-start border-0 shadow-sm">
          <div class="card-body">
          <form action="">
              <select class="form-select" name="employees" onchange="showUser(this.value)">
                  <option value="">--Select a Role--</option>
                  <option value="manager">Manager</option>
                  <option value="Supervisor">Sales Supervisor</option>
                  <option value="Team Leader">Team Leader</option>
                  <option value="Sales Agent">Sales Agent</option>
                  <option value="Advisor">Life Insuarance Advisor</option>
                  <option value="cashier">Cashier</option>
              </select>
          </form>
          <br>
          <div id="txtHint"><b>Person info will be listed here...</b></div>
          </div>
          </div>
        </div>
    </div>

    <div class="row mt-3 mt-sm-2">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card border-success border-start border-0 shadow-sm">
          <div class="card-body">
          <h5 class="card-title ">Life Insurance Advisors</h5>  
          <p>Recruitments</p>
              <?php
              include 'connection.php';

              $query = "SELECT emp_code FROM employees WHERE emp_designation = 'Advisor' "; 
      
              // Execute the query and store the result set 
              $result = mysqli_query($conn, $query); 
                
              if ($result) 
              { 
                  // it return number of rows in the table. 
                  $row = mysqli_num_rows($result); 
                    
                     if ($row) 
                        { 
                           printf("Number of Recruited Agents : " . $row . "/ 3(wanted)"); 

                           $presentage = ($row/3)*100; 

                           echo "<br>"."Precentage : ".round($presentage,2) . " % ";
                        } 
                  // close the result. 
                  mysqli_free_result($result); 
              }        
              ?>
              <div class="progress" role="progressbar" aria-label="Default  example" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-warning" style="width: 33%"></div></div>
      </div>
      </div>
      </div>

      <div class="col-sm-6  mb-sm-0">
      <div class="card border-success border-start border-0 shadow-sm">
      <div class="card-body">
            <h5 class="card-title">Total Policies</h5>
            <p class="card-text">Current status</p>
            <?php
              include 'connection.php';

              $query = "SELECT invoice_id FROM invoice "; 
      
              // Execute the query and store the result set 
              $result = mysqli_query($conn, $query); 
                
              if ($result) 
              { 
                  // it return number of rows in the table. 
                  $row = mysqli_num_rows($result); 
                    
                     if ($row) 
                        { 
                           printf("Number of policies : " . $row . "/ 13(wanted)"); 

                           $presentage = ($row/13)*100; 

                           echo "<br>"."Precentage : ".round($presentage,2). " % ";
                        } 
                  // close the result. 
                  mysqli_free_result($result); 
              }        
              ?>
              <div class="progress" role="progressbar" aria-label="Default  example" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-success" style="width: 69%"></div></div>
      </div>
      </div>
      </div>

    </div>

    <h3 class="mt-5 mb-4 text-purple">Targets</h3> 
    <div class="card mt-4 mb-3 border-success border-start border-0 shadow-sm">
      <div class="card-body ">
        <h5 class="card-title">Monthly Target</h5>        
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      </div>
    </div>

    </div>
  </div>
</div>


<script>
      function showUser(str) {
        var xhttp;
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET","getemployee.php?q="+str,true);
          xhttp.send();
        }
      }
</script>

<script>
const xValues = ["Advisor", "Team Leader", "Sales Agent"];
const yValues = [75000, 50000, 300000];
const barColors = ["green","red","orange"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Monthly Premium Collection"
    }
  }
});
</script>
</body>
</html>




