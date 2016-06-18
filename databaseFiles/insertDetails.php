<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from submitting data & storing in new variables.
$date = mysqli_real_escape_string($con, $data->date);
$firstbin = mysqli_real_escape_string($con, $data->firstbin);
$countries = mysqli_real_escape_string($con, $data->countries);
$demos = mysqli_real_escape_string($con, $data->demos);
$description = mysqli_real_escape_string($con, $data->description);
$notes = mysqli_real_escape_string($con, $data->notes);

// mysqli insert query
$query = "INSERT into emp_details (emp_date,emp_firstbin,emp_countries,emp_demos, description, notes) VALUES ('$date','$firstbin','$countries','$demos', '$description', '$notes')";
// Inserting data into database
mysqli_query($con, $query);
echo true;
?>