<?php
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
  

?>