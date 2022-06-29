<?php
//   	define('DB_SERVER', 'localhost');
//   	define('DB_USERNAME', 'root');
//   	define('DB_PASSWORD', '');
//   	define('DB_DATABASE', 'istudent_db');
//   	$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//   	if(!$connection){
//		die("Connection failed: " . mysqli_connect_error());
//  	}
?>

<?php  
require 'vendor/autoload.php';  
// Creating Connection  
$con = new MongoDB\Client("mongodb+srv://studylancer:Study%404321@studylancer.qvteuvb.mongodb.net/studyLacer?retryWrites=true&w=majority");  
// Creating Database  
$db = $con->studyLacer;  

$collection = $db->students;
 
// Fetching Record  
$record = $collection->find()->toArray();  

//foreach ($record as $records) {
//    var_dump($jreoke);
//}
//foreach ($record as $student) {  
//echo $student['name'], ': ', $student['email']."<br>";  
//}  
?>  