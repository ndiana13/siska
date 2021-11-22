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

function tambah_sp($data){
	global $conn;
		//ambil data dari form
	$lampiran_sp = upload();
	if(!$lampiran_sp){
		return false;
	}
	$upload_sk = upload_sk();
	if(!$upload_sk){
		return false;
	}

	$id_sp 			= htmlspecialchars($data["id_sp"]);
	$nip 			= htmlspecialchars($data["nip"]);
	$jns_sp  		= htmlspecialchars($data["jns_sp"]);
	$no_sp  		= htmlspecialchars($data["no_sp"]);
	$id_jurusan  	= htmlspecialchars($data["id_jurusan"]);
	$tgl_sp 		= htmlspecialchars($data["tgl_sp"]);
	$thn_akademik 	= htmlspecialchars($data["thn_akademik"]);
	$semester  		= htmlspecialchars($data["semester"]);
	$perihal  		= htmlspecialchars($data["perihal"]);
	$status  		= htmlspecialchars($data["status"]);
	$no_sk  		= htmlspecialchars($data["no_sk"]);

	$query = "INSERT INTO tb_pengajuan VALUES ('$id_sp', '$nip', '$jns_sp', '$no_sp', '$id_jurusan', '$tgl_sp', '$thn_akademik', '$semester', '$perihal', '$lampiran_sp', '$status', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '$no_sk', '$upload_sk')";
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
		
		return (" ");
	}
	else {
	
			//cek apakah yang boleh diupload
	$ekstensifile_transaksiValid = ['xls','docx','xlsx','pdf'];
	$ekstensifile_transaksi = explode('.', $namaFile);
	$ekstensifile_transaksi = strtolower(end($ekstensifile_transaksi));
	if(!in_array($ekstensifile_transaksi,$ekstensifile_transaksiValid)){
		echo "<script>
		alert('Tolong Upload File !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file gambar_transaksi  terlalu besar
	if ($ukuranFile > 5000000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar Maksimal File 50MB ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifile_transaksi;
	
	
	move_uploaded_file($tmpName,'../baak/lampiran/'.$namaFileBaru);
	return $namaFileBaru;
	}
}

function upload_sk(){
	$namaFile   = $_FILES['upload_sk']['name'];
	$ukuranFile = $_FILES['upload_sk']['size'];
	$error      = $_FILES['upload_sk']['error'];
	$tmpName    = $_FILES['upload_sk']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		
		return (" ");
	}
	else {
	
			//cek apakah yang boleh diupload
	$ekstensifile_transaksiValid = ['pdf','docx'];
	$ekstensifile_transaksi = explode('.', $namaFile);
	$ekstensifile_transaksi = strtolower(end($ekstensifile_transaksi));
	if(!in_array($ekstensifile_transaksi,$ekstensifile_transaksiValid)){
		echo "<script>
		alert('Tolong Upload File !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file gambar_transaksi  terlalu besar
	if ($ukuranFile > 5000000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar Maksimal File 50MB ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifile_transaksi;
	
	
	move_uploaded_file($tmpName,'../baak/sk/'.$namaFileBaru);
	return $namaFileBaru;
	}
}

function ubah_sp($data){

	global $conn;

	$id_sp 					    = htmlspecialchars($data["id_sp"]);
	$id_sp_edit 				= htmlspecialchars($data["id_sp_edit"]);
	$nip 						= htmlspecialchars($data["nip"]);
	$jns_sp  					= htmlspecialchars($data["jns_sp"]);
	$no_sp  					= htmlspecialchars($data["no_sp"]);
	$id_jurusan 				= htmlspecialchars($data["id_jurusan"]);
	$tgl_sp 					= htmlspecialchars($data["tgl_sp"]);
	$thn_akademik 				= htmlspecialchars($data["thn_akademik"]);
	$semester  					= htmlspecialchars($data["semester"]);
	$perihal  					= htmlspecialchars($data["perihal"]);
	$lampiran_sp_lama 			= htmlspecialchars($data["lampiran_sp_lama"]);
	$upload_sk_lama 			= htmlspecialchars($data["upload_sk_lama"]);
	$status  					= htmlspecialchars($data["status"]);
	$no_sk  					= htmlspecialchars($data["no_sk"]);
		//cek apakah user pilih gambar baru atau tidak
	if($_FILES['lampiran_sp']['error'] === 4){
		$lampiran_sp  = $lampiran_sp_lama;
	}else{
		$lampiran_sp =upload();
	}
	if($_FILES['upload_sk']['error'] === 4){
		$upload_sk  = $upload_sk_lama;
	}else{
		$upload_sk =upload_sk();
	}
	
	
		//insert data
	$query ="UPDATE tb_pengajuan SET
	
	id_sp   ='$id_sp_edit',
	nip ='$nip',
	jns_sp ='$jns_sp',
	no_sp ='$no_sp',
	tgl_sp  ='$tgl_sp',
	id_jurusan ='$id_jurusan',
	thn_akademik ='$thn_akademik',
	semester ='$semester',
	perihal ='$perihal' ,	
	lampiran_sp   ='$lampiran_sp',
	status = '$status',
	no_sk = '$no_sk',
	upload_sk   ='$upload_sk'
	WHERE id_sp = $id_sp";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus_sp($id_sp) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_pengajuan WHERE id_sp = $id_sp");
	
	return mysqli_affected_rows($conn);
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

	$nip 			=htmlspecialchars($data["nip"]);
	$nip_edit 		=htmlspecialchars($data["nip_edit"]);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$nama_lengkap   = htmlspecialchars($data['nama_lengkap']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);
	$fotoLama       = htmlspecialchars($data['fotoLama']);
	$ttdLama       	= htmlspecialchars($data['ttdLama']);
		
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

function acc_kajur($id_sp) {
	global $conn;	
	$tgl = date('Y-m-d');

	$query ="UPDATE tb_pengajuan SET status = '1', tgl_kajur = '$tgl'  WHERE id_sp = $id_sp
	";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
}
function dec_kajur($id_sp) {
	global $conn;
	$tgl = date('Y-m-d');
	
	$query ="UPDATE tb_pengajuan SET status = '5', tgl_kajur = '$tgl' WHERE id_sp = $id_sp";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
}
?>