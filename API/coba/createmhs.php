<?php

include("config.php");

        $nim=$_POST['nim'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $imei=$_POST['imei'];
        $email=$_POST['email'];
        $jurusan=$_POST['jurusan'];
        $fakultas=$_POST['fakultas'];
                $password=$_POST['password'];

$sql = "INSERT INTO users (nim, name, address, imei, email, jurusan, fakultas,password) values('$nim','$name','$address','$imei','$email','$jurusan','$fakultas','$password')";
$query = mysqli_query($db, $sql);

if( $query ) {

} else {

	die("Gagal menyimpan perubahan . . .");
}

?>