<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->id);
$date = mysqli_real_escape_string($con, $data->date);
$firstbin = mysqli_real_escape_string($con, $data->firstbin);
$countries = mysqli_real_escape_string($con, $data->countries);
$demos = mysqli_real_escape_string($con, $data->demos);
$description = mysqli_real_escape_string($con, $data->description);
$notes = mysqli_real_escape_string($con, $data->notes);

// mysqli query to insert the updated data
$query = "UPDATE emp_details SET emp_date='$date',emp_firstbin='$firstbin',emp_countries='$countries',emp_demos='$demos', description ='$description', notes='$notes' WHERE emp_id=$id";
mysqli_query($con, $query);
echo true;
?>