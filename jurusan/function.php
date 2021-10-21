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


function tambah($data){
	global $conn;
		//ambil data dari form
	$lampiran_sp = upload();
	if(!$lampiran_sp){
		return false;
	}
	$id_sk_mengajar = htmlspecialchars($data["id_sk_mengajar"]);
	$nip 			= htmlspecialchars($data["nip"]);
	$id_jurusan  	= htmlspecialchars($data["id_jurusan"]);
	$tgl_sp 		= htmlspecialchars($data["tgl_sp"]);
	$thn_akademik 	= htmlspecialchars($data["thn_akademik"]);
	$semester  		= htmlspecialchars($data["semester"]);
	$perihal  		= htmlspecialchars($data["perihal"]);
	$status  		= htmlspecialchars($data["status"]);
	$no_sk  		= htmlspecialchars($data["no_sk"]);

	$query = "INSERT INTO tb_sk_mengajar VALUES ('$id_sk_mengajar', '$nip', '$id_jurusan', '$tgl_sp', '$thn_akademik', '$semester', '$perihal', '$lampiran_sp', '$status', '$no_sk')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile   = $_FILES['lampiran_sp']['name'];
	$ukuranFile = $_FILES['lampiran_sp']['size'];
	$error      = $_FILES['lampiran_sp']['error'];
	$tmpName    = $_FILES['lampiran_sp']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih file terlebih dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensifile_transaksiValid = ['xls'];
	$ekstensifile_transaksi = explode('.', $namaFile);
	$ekstensifile_transaksi = strtolower(end($ekstensifile_transaksi));
	if(!in_array($ekstensifile_transaksi,$ekstensifile_transaksiValid)){
		echo "<script>
		alert('Tolong Upload File !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file gambar_transaksi  terlalu besar
	if ($ukuranFile > 50000000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar Maksimal File 50MB ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru

	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '',  $_SESSION["username"]); 
	$namaFileBaru = ("Lamp_SKM_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifile_transaksi;
	
	
	move_uploaded_file($tmpName,'../baak/lampiran/skmengajar/'.$namaFileBaru);
	return $namaFileBaru;
}

function ubah($data){

	global $conn;

	$id_sk_mengajar 	= htmlspecialchars($data["id_sk_mengajar"]);
	$nip 				= htmlspecialchars($data["nip"]);
	$id_jurusan 		= htmlspecialchars($data["id_jurusan"]);
	$tgl_sp 			= htmlspecialchars($data["tgl_sp"]);
	$thn_akademik 		= htmlspecialchars($data["thn_akademik"]);
	$semester  			= htmlspecialchars($data["semester"]);
	$perihal  			= htmlspecialchars($data["perihal"]);
	$lampiran_sp_lama 	= htmlspecialchars($data["lampiran_sp_lama"]);
	$status  			= htmlspecialchars($data["status"]);
	$no_sk  			= htmlspecialchars($data["no_sk"]);
		//cek apakah user pilih gambar baru atau tidak
	if($_FILES['lampiran_sp']['error'] === 4){
		$lampiran_sp  = $lampiran_sp_lama;
	}else{
		$lampiran_sp =upload();
	}
	
	
		//insert data
	$query ="UPDATE tb_sk_mengajar SET
	
	id_sk_mengajar   ='$id_sk_mengajar',
	nip ='$nip',
	tgl_sp  ='$tgl_sp',
	id_jurusan ='$id_jurusan',
	thn_akademik ='$thn_akademik',
	semester ='$semester',
	perihal ='$perihal' ,	
	lampiran_sp   ='$lampiran_sp',
	status = '$status',
	no_sk = '$no_sk'
	WHERE id_sk_mengajar = $id_sk_mengajar";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function ubah_profil($data){

	global $conn;

	$nip 			=htmlspecialchars($data["nip"]);
	$nip_edit 		=htmlspecialchars($data["nip_edit"]);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$jabatan        = htmlspecialchars($data['jabatan']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);
		

	
		//insert data
	$query ="UPDATE tb_user SET
	
	nip 		='$nip_edit',
	username 	='$username',
	password	='$password',
	email 		='$email',
	jabatan 	='$jabatan',
	no_hp 		='$no_hp',
	level 		='$level'
	
	WHERE nip= '$nip'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus($id_sk_mengajar) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_sk_mengajar WHERE id_sk_mengajar = $id_sk_mengajar");
	
	return mysqli_affected_rows($conn);
}

?>