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
	$nip            = htmlspecialchars($data['nip']);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$jabatan        = htmlspecialchars($data['jabatan']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);

	$query="INSERT INTO tb_user
		VALUES ('$nip','$username','$password','$email','$jabatan','$no_hp','$level')";
	mysqli_query($conn, $query);

}

function ubah($data){

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

function hapus($nip) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_user WHERE nip = $nip");
	
	return mysqli_affected_rows($conn);
}
?>