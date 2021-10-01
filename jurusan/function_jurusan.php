<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "sisk";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
function tambah($data){
	global $conn;
	$id_jurusan     = htmlspecialchars($data['id_jurusan']);
	$nm_jurusan     = htmlspecialchars($data['nm_jurusan']);

	$query="INSERT INTO tb_jurusan
		VALUES ('$id_jurusan','$nm_jurusan')";
	mysqli_query($conn, $query);

}


function ubah($data){

	global $conn;

	$id_jurusan     	 = htmlspecialchars($data['id_jurusan']);
	$nm_jurusan     	 = htmlspecialchars($data['nm_jurusan']);

		

	
		//insert data
	$query ="UPDATE tb_jurusan SET
	
	id_jurusan 	='$id_jurusan',
	nm_jurusan 	='$nm_jurusan'
	
	WHERE id_jurusan= '$id_jurusan'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus($id_jurusan) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_jurusan WHERE id_jurusan=$id_jurusan");
	
	return mysqli_affected_rows($conn);
}
?>