<?php 
include 'connection.php';

$q = intval($_GET['q']);

//mysqli_select_db($conn,"spesDb");
$sql="SELECT emp_code, emp_designation, emp_name, emp_adress  FROM employees WHERE emp_designation = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>Employee Code</th>
<th>Designation</th>
<th>Name</th>
<th>Address</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['emp_code'] . "</td>";
  echo "<td>" . $row['emp_designation'] . "</td>";
  echo "<td>" . $row['emp_name'] . "</td>";
  echo "<td>" . $row['emp_adress'] . "</td>";
  
  echo "</tr>";
}
echo "</table>";


?>