<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);


if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [] ;
	while($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
		
	}
	return $rows;
}
function tambah_pengguna($data){
	global $conn;

	$foto = upload_foto();
	if(!$foto){
		return false;	
	}
	$ttd = upload_ttd();
	if(!$ttd){
		return false;	
	}

	$nip            = htmlspecialchars($data['nip']);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$nama_lengkap   = htmlspecialchars($data['nama_lengkap']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);


	$query="INSERT INTO tb_pengguna
		VALUES ('$nip','$username','$password','$email','$nama_lengkap','$no_hp', '$level', '$foto', '$ttd')";
	mysqli_query($conn, $query);

}
function upload_foto() {
	
	$namaFile   = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error      = $_FILES['foto']['error'];
	$tmpName    = $_FILES['foto']['tmp_name'];
	
			//cek apakah tidak ada foto yang di upload
	if($error === 4) {
		
		return ("tidak ada");
	}
	else {
	
			//cek apakah yang boleh diupload
		$ekstensifoto_transaksiValid = ['jpg','jpeg','png'];
		$ekstensifoto_transaksi = explode('.', $namaFile);
		$ekstensifoto_transaksi = strtolower(end($ekstensifoto_transaksi));
		if(!in_array($ekstensifoto_transaksi,$ekstensifoto_transaksiValid)){
			echo "<script>
			alert('Tolong Upload foto !!');
			</script>";
			return false;
		}
		
				//cek jika  ukuran  file foto_transaksi  terlalu besar
		if ($ukuranFile > 50000000) 
		{
			echo "<script>
			alert('Ukuran foto Terlalu Besar ');
			</script>";
			return false;
		}
		
				//lolos pengecekan
				//nama baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .=$ekstensifoto_transaksi;
		
		
		move_uploaded_file($tmpName,'../AdminLTE/dist/img/'.$namaFileBaru);
		return $namaFileBaru;
	}	
}
function upload_ttd() {
	
	$namaFile   = $_FILES['ttd']['name'];
	$ukuranFile = $_FILES['ttd']['size'];
	$error      = $_FILES['ttd']['error'];
	$tmpName    = $_FILES['ttd']['tmp_name'];

	if($error === 4) {
		
		return ("tidak ada");
	}
	else {
		$ekstensiValid = ['jpg','jpeg','png'];
		$ekstensi = explode('.', $namaFile);
		$ekstensi = strtolower(end($ekstensi));
		if(!in_array($ekstensi,$ekstensiValid)){
			echo "<script>
			alert('Tolong Upload File Tanda Tangan (jpg/jpeg/png) !!');
			</script>";
			return false;
		}
		
				//cek jika  ukuran  file   terlalu besar
		if ($ukuranFile > 50000000) 
		{
			echo "<script>
			alert('Ukuran File Terlalu Besar (Max 5 MB)');
			</script>";
			return false;
		}
				//lolos pengecekan
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .=$ekstensi;


		move_uploaded_file($tmpName,'../AdminLTE/dist/img/'.$namaFileBaru);
		return $namaFileBaru;	
	}	
}

function ubah_profil($data){

	global $conn;

	$nip 			= htmlspecialchars($data["nip"]);
	$nip_edit 		= htmlspecialchars($data["nip_edit"]);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$nama_lengkap   = htmlspecialchars($data['nama_lengkap']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);
	$fotoLama       = htmlspecialchars($data['fotoLama']);
	$ttdLama        = htmlspecialchars($data['ttdLama']);
		
	//cek apakah user pilih foto baru atau tidak
	if($_FILES['foto']['error'] === 4){
		$foto  = $fotoLama;
	}else{
		$foto =upload_foto();
	}
	if($_FILES['ttd']['error'] === 4){
		$ttd  = $ttdLama;
	}else{
		$ttd =upload_ttd();
	}		
	
		//insert data
	$query ="UPDATE tb_pengguna SET
	
	nip 		='$nip_edit',
	username 	='$username',
	password	='$password',
	email 		='$email',
	nama_lengkap ='$nama_lengkap',
	no_hp 		='$no_hp',
	level 		='$level',
	foto 		='$foto',
	ttd 		='$ttd'
	
	WHERE nip= '$nip'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}
function hapus($nip) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_pengguna WHERE nip = $nip");
	
	return mysqli_affected_rows($conn);
}
?>