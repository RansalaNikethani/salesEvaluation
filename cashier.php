<?php
session_start();

if(!isset($_SESSION['login_code'])){
    die("error login");
}

if($_SESSION['user_role']!="cashier"){
    die("error role");
}
?>


<?php 
if(isset($_POST['invoiceSub'])){

include 'connection.php';

$branchCode =  $_POST['branchCode'];
$suprvceCode =  $_POST['suprvceCode'];
$teamLcode =  $_POST['teamLcode'];
$salesAcode =  $_POST['salesAcode'];
$invoiceDate =  $_POST['invoiceDate'];
$policyNo =  $_POST['policyNo'];
$preAmount =  $_POST['preAmount'];
$paymentFrequent =  $_POST['paymentFrequent'];
$agntSign =  $_POST['agntSign'];
$handedOverDate =  $_POST['handedOverDate'];

$sql = "INSERT INTO invoice (in_branch_code, in_supervisor_code, in_sales_agnt_code, in_team_lead_code, invoice_date, policy_no,
 pre_amount, pay_frequent, agnt_sign, cash_hnd_ovr_date  )
VALUES ('$branchCode', '$suprvceCode','$teamLcode ','$salesAcode','$invoiceDate', '$policyNo', 
'$preAmount', '$paymentFrequent', '$agntSign', '$handedOverDate' ); ";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
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
      <h5 class="mb-3"><i class="fa-solid fa-user"></i>  &nbsp &nbsp Cashier</h5>      
      <h6><i class="fa-solid fa-right-from-bracket fa-lg"></i> &nbsp &nbsp <a href="logout.php"> Sign Out</a> </h6>
    </div>

    <div class="col-6  p-3 mx-auto mw-100  bg-light">
      <h3 class="mt-3 mb-4 text-purple">Invoice Details</h3>
      <form  method="post" action="#" onsubmit="myFunction()">
      <div class="row mb-3">
            <!--branch code-->
            <div class="col col-sm-6">
            <label for="branchCode">Select Branch Code</label>
              <?php
                include 'connection.php';

                $query = "SELECT branch_code from branch";
                $data = mysqli_query($conn, $query);
                $array=[];
                while ($row = mysqli_fetch_array($data)) {
                    $array[] = $row['branch_code'];
                }

                ?>

              <select class="form-select" id="branchCode" name="branchCode" required>
              <option value="">--</option>
              <?php foreach ($array as $arr) { ?>               
                <option value = "<?php print($arr); ?>"> <?php print($arr); ?></option>
                <?php } ?>
              </select>
            </div>

            <!--Supervisor code-->
            <div class="col col-sm-6">
              <label for="suprvceCode">Select Supervisor Code</label>
              <?php
                include 'connection.php';

                $query = "SELECT emp_code from employees where emp_designation = 'supervisor'";
                $data = mysqli_query($conn, $query);
                $array=[];
                while ($row = mysqli_fetch_array($data)) {
                    $array[] = $row['emp_code'];
                }

                ?>

              <select class="form-select" id="suprvceCode" name="suprvceCode" required>
              <option value="">--</option>  
              <?php foreach ($array as $arr) { ?>
                    <option value = "<?php print($arr); ?>"> <?php print($arr); ?></option>
                    <?php } ?>
              </select>
            </div>
          </div>

           <!--Team Leader code-->
            <div class="row mb-3">
            <div class="col col-sm-6">
            <label for="teamLcode">Select Team Leader Code</label>
                <?php
                    include 'connection.php';

                    $query = "SELECT emp_code from employees where emp_designation = 'Team Leader'";
                    $data = mysqli_query($conn, $query);
                    $array=[];
                    while ($row = mysqli_fetch_array($data)) {
                        $array[] = $row['emp_code'];
                    }

                    ?>
                <select class="form-select" id="teamLcode" name="teamLcode" required>
                <option value="">--</option>
                <?php foreach ($array as $arr) { ?>
                        <option value = "<?php print($arr); ?>"> <?php print($arr); ?></option>
                        <?php } ?>
                </select>
            </div>

            <!-- Sales Agent code-->
            <div class="col col-sm-6">
            <label for="salesAcode">Select Sales Agent Code</label>
              <?php
                    include 'connection.php';

                    $query = "SELECT emp_code from employees where emp_designation = 'Sales Agent'";
                    $data = mysqli_query($conn, $query);
                    $array=[];
                    while ($row = mysqli_fetch_array($data)) {
                        $array[] = $row['emp_code'];
                    }

                ?>

            <select class="form-select" id="salesAcode" name="salesAcode" required>
            <option value="" >--</option>
              <?php foreach ($array as $arr) { ?>
                        <option value = "<?php print($arr); ?>"> <?php print($arr); ?></option>
                <?php } ?>
            </select>
            </div>
          </div>        

          <div class="row mb-3">
            <div class="col col-sm-6">
            <label for="invoiceDate">Select Invoice Date</label>
            <input type="date" id="invoiceDate" name="invoiceDate" class="form-control " required />
              
            </div>

            <div class="col col-sm-6">
            <label for="policyNo">Enter Policy Number</label>
            <input type="text" id="policyNo" name="policyNo" class="form-control" required>
            </div>
          </div>  

          <div class="row mb-3">
            <div class="col col-sm-6">
            <label for="preAmount">Enter Premium Amount</label>
            <input type="text" class="form-control" id="preAmount" name="preAmount" required/>
              
            </div>

            <div class="col col-sm-6">
              <label for="paymentFrequent" >Select Payment Frequent</label>
              <select class="form-select" id="paymentFrequent" name="paymentFrequent" required>               
                <option value="Monthly">Monthly</option>
                <option value="Quarter">Quarter</option>
                <option value="By Annual">By Annual</option>
                <option value="Annual">Annual</option>
              </select>
            </div>
          </div>  

          <div class="row mb-3">
          <div class="col col-sm-6">
          <label for="agntSign" >Agent Signature</label><br>
          <select class="form-select" id="agntSign" name="agntSign" required>               
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>              
            </div>

            <div class="col col-sm-6">
            <label for="handedOverDate">Select Handed Over Date</label>
            <input type="date" id="handedOverDate" name="handedOverDate" class="form-control"  required/>
            </div>
          </div>         
          <button type="submit" name="invoiceSub" id="invoiceSub" class="btn  btn-outline-light px-5 mb-3">SUBMIT</button>
        </form>
    </div>
  </div>
</div>
<script>
function myFunction() {
  alert("The form was submitted");
}
</script>
</body>
</html>




