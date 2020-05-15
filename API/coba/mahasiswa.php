<?php

include("config.php");



$sql = "SELECT * FROM users";
$result = array();
$query = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_array($query)){
    array_push($result, array('nim' => $row['nim'],
    'name' => $row['name'],
    'address' => $row['address'],
    'imei' => $row['imei'],
    'email' => $row['email'],
    'jurusan' => $row['jurusan'],
    'fakultas' => $row['fakultas']
));
}
echo json_encode(array("result" => $result));
?>



