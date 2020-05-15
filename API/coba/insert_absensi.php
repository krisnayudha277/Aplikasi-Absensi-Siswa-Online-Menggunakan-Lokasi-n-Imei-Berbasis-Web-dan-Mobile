<?php
	include("config.php");

	$mata_kuliah= $_POST['mata_kuliah'];
		$nama= $_POST['nama'];
	$nim= $_POST['nim'];
		$absensi= $_POST['absensi'];
	$imei= $_POST['imei'];

	$sql = "INSERT INTO tbl_absensi (mata_kuliah,nama,nim,absensi,imei) VALUES('$mata_kuliah','$nama
	','$nim','$absensi','$imei')";
	$query = mysqli_query($db, $sql);

	//apakah query update berhasil
	if ($query) {
		
	}else{
		//kalu gagal tampilkan pesan
		die("gagal menyimpan perubahan....");
	}

?>