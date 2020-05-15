<?php

include("config.php");



$sql = "SELECT * FROM tbl_absensi";
$result = array();
$query = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_array($query)){
    array_push($result, array('id' => $row['id'],
    'mata_kuliah' => $row['mata_kuliah'],
     'nama' => $row['nama'],
      'nim' => $row['nim'],
       'absensi' => $row['absensi'],
        'imei' => $row['imei']
));
}
echo json_encode(array("result" => $result));
?>



