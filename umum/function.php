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

	// VALIDASI NIP
    $cek_no_sk = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE no_sk = '$no_sk'");
    if (mysqli_fetch_array($cek_no_sk)) {
        echo "<script>
        alert('Nomor SK Sudah Ada');
        document.location.href='tb_penomoran.php';
        </script>";
        return false;
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


function hapus($id_sk_mengajar) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_sk_mengajar WHERE id_sk_mengajar = $id_sk_mengajar");
	
	return mysqli_affected_rows($conn);
}

function acc_wadir($id_sk_mengajar) {
	global $conn;
	

		//insert data
	$query ="UPDATE tb_sk_mengajar SET status = '2' WHERE id_sk_mengajar = $id_sk_mengajar
	";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
	
	return mysqli_affected_rows($conn);
}
function dec_wadir($id_sk_mengajar) {
	global $conn;
	

		//insert data
	$query ="UPDATE tb_sk_mengajar SET status = '4' WHERE id_sk_mengajar = $id_sk_mengajar
	";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
	
	return mysqli_affected_rows($conn);
}

?>