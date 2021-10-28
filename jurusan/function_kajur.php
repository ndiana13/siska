<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
function tambah($data){
	global $conn;
	$id_kajur		= htmlspecialchars($data['id_kajur']);
	$id_jurusan     = htmlspecialchars($data['id_jurusan']);
	$nip     		= htmlspecialchars($data['nip']);

	$query="INSERT INTO tb_kajur
		VALUES ('$id_kajur', '$nip', '$id_jurusan')";
	mysqli_query($conn, $query);

}


function ubah($data){

	global $conn;
	$id_kajur		= htmlspecialchars($data['id_kajur']);
	$id_kajur_edit  = htmlspecialchars($data['id_kajur_edit']);
	$id_jurusan     = htmlspecialchars($data['id_jurusan']);
	$nip     		= htmlspecialchars($data['nip']);

	
		//insert data
	$query ="UPDATE tb_kajur SET
	
	id_kajur= '$id__kajur_edit',
	nip 	='$nip',
	id_jurusan 	='$id_jurusan'
	
	
	WHERE id_kajur= '$id_kajur'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus($id_kajur) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_kajur WHERE id_kajur=$id_kajur");
	
	return mysqli_affected_rows($conn);
}
?>