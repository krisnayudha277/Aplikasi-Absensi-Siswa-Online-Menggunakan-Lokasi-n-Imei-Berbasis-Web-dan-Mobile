<?php

include("config.php");

$nim= $_POST['nim'];
$password= $_POST['password'];


$sql = "SELECT * FROM users WHERE nim='$nim' AND password='$password'";
$result = array();
$query = mysqli_query($db, $sql);
$stat=mysqli_num_rows ( $query ); 

array_push($result, array('status' => $stat));
echo json_encode(array("result" => $result));
?>
