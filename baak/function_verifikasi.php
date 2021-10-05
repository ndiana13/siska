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
	$id_sp = htmlspecialchars($data["id_sp"]);
	$tgl_verifikasi  =htmlspecialchars($data["tgl_verifikasi"]);
	$status = htmlspecialchars($data["status"]);
	$catatan = htmlspecialchars($data["catatan"]);

	$query = "INSERT INTO tb_verifikasi VALUES ('','$id_sp', '$tgl_verifikasi', '$status', '$catatan')";
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
	$ekstensifile_transaksiValid = ['csv'];
	$ekstensifile_transaksi = explode('.', $namaFile);
	$ekstensifile_transaksi = strtolower(end($ekstensifile_transaksi));
	if(!in_array($ekstensifile_transaksi,$ekstensifile_transaksiValid)){
		echo "<script>
		alert('Tolong Upload File !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file gambar_transaksi  terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifile_transaksi;
	
	
	move_uploaded_file($tmpName,'lampiran/skmengajar/'.$namaFileBaru);
	return $namaFileBaru;	
}

function ubah($data){

	global $conn;

	$id_sp 				= htmlspecialchars($data["id_sp"]);
	$id_sp_edit 		= htmlspecialchars($data["id_sp_edit"]);
	$nip 				= htmlspecialchars($data["nip"]);
	$nm_jurusan 		= htmlspecialchars($data["nm_jurusan"]);
	$tgl_sp 			= htmlspecialchars($data["tgl_sp"]);
	$thn_akademik 		= htmlspecialchars($data["thn_akademik"]);
	$semester  			= htmlspecialchars($data["semester"]);
	$perihal  			= htmlspecialchars($data["perihal"]);
	$lampiran_sp_lama 	= htmlspecialchars($data["lampiran_sp_lama"]);


		//cek apakah user pilih gambar baru atau tidak
	if($_FILES['lampiran_sp']['error'] === 4){
		$lampiran_sp  = $lampiran_sp_lama;
	}else{
		$lampiran_sp =upload();
	}
	
	
		//insert data
	$query ="UPDATE tb_sp_mengajar SET
	
	id_sp   ='$id_sp_edit',
	nip ='$nip',
	tgl_sp  ='$tgl_sp',
	nm_jurusan ='$nm_jurusan',
	thn_akademik ='$thn_akademik',
	semester ='$semester',
	perihal ='$perihal' ,	
	lampiran_sp   ='$lampiran_sp'
	WHERE id_sp = $id_sp";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus($id_sp) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_sp_mengajar WHERE id_sp = $id_sp");
	
	return mysqli_affected_rows($conn);
}

?>