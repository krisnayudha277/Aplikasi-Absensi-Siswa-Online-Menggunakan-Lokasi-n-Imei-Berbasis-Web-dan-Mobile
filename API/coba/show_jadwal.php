<?php

include("config.php");



$sql = "SELECT * FROM tbl_matakuliah";
$result = array();
$query = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_array($query)){
    array_push($result, array('id' => $row['id'],
    'mata_kuliah' => $row['mata_kuliah'],
     'dosen' => $row['dosen'],
      'hari' => $row['hari'],
       'jam' => $row['jam']
));
}
echo json_encode(array("result" => $result));
?>



