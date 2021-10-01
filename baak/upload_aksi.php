<?php 
// menghubungkan dengan koneksi
include '../login/config.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['file_lampiran']['name']) ;
move_uploaded_file($_FILES['file_lampiran']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['file_lampiran']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['file_lampiran']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nm_dosen = $data->val($i, 1);
	$nidn     = $data->val($i, 2);
	$nip_dis  = $data->val($i, 3);
	$matkul1  = $data->val($i, 4);
	$matkul2  = $data->val($i, 5);
	$matkul3  = $data->val($i, 6);
	$matkul4  = $data->val($i, 7);
	$matkul5  = $data->val($i, 8);
	$matkul6  = $data->val($i, 9);
	$matkul7  = $data->val($i, 10);
	$matkul8  = $data->val($i, 11);
	$matkul9  = $data->val($i, 12);
	$matkul10 = $data->val($i, 13);
	$prodi1  = $data->val($i, 14);
	$prodi2  = $data->val($i, 15);
	$prodi3  = $data->val($i, 16);
	$prodi4  = $data->val($i, 17);
	$prodi5  = $data->val($i, 18);
	$prodi6  = $data->val($i, 19);
	$prodi7  = $data->val($i, 20);
	$prodi8  = $data->val($i, 21);
	$prodi9  = $data->val($i, 22);
	$prodi10  = $data->val($i, 23);
	$kelas1  = $data->val($i, 24);
	$kelas2  = $data->val($i, 25);
	$kelas3  = $data->val($i, 26);
	$kelas4  = $data->val($i, 27);
	$kelas5  = $data->val($i, 28);
	$kelas6  = $data->val($i, 29);
	$kelas7  = $data->val($i, 30);
	$kelas8  = $data->val($i, 31);
	$kelas9  = $data->val($i, 32);
	$kelas10  = $data->val($i, 33);
	$sks_matkul1  = $data->val($i, 34);
	$sks_matkul2  = $data->val($i, 35);
	$sks_matkul3  = $data->val($i, 36);
	$sks_matkul4  = $data->val($i, 37);
	$sks_matkul5  = $data->val($i, 38);
	$sks_matkul6  = $data->val($i, 39);
	$sks_matkul7  = $data->val($i, 40);
	$sks_matkul8  = $data->val($i, 41);
	$sks_matkul9  = $data->val($i, 42);
	$sks_matkul10  = $data->val($i, 43);
	$sks1  = $data->val($i, 44);
	$sks2  = $data->val($i, 45);
	$sks3  = $data->val($i, 46);
	$sks4  = $data->val($i, 47);
	$sks5  = $data->val($i, 48);
	$sks6  = $data->val($i, 49);
	$sks7  = $data->val($i, 50);
	$sks8  = $data->val($i, 51);
	$sks9  = $data->val($i, 52);
	$sks10  = $data->val($i, 53);
	if($nm_dosen != "" OR $nidn != "" OR $nip_dis != "" OR $nm_dosen != "" OR $nidn != "" OR $nip_dis != "" OR $matkul1 != "" OR $matkul2 != "" OR $matkul3 != "" OR $matkul4 != "" OR $matkul5 != "" OR $matkul6 != "" OR $matkul7 != "" OR $matkul8 != "" OR $matkul9 != "" OR $matkul10 != "" OR $prodi1 != "" OR $prodi2 != "" OR $prodi3 != "" OR $prodi4 != "" OR $prodi5 != "" OR $prodi6 != "" OR $prodi7 != ""  OR $prodi8 != "" OR $prodi9 != ""  OR $prodi10 != "" OR $kelas1 != "" OR $kelas2 != "" OR $kelas3 != "" OR $kelas4 != "" OR $kelas5 != "" OR $kelas6 != "" OR $kelas7 != ""  OR $kelas8 != "" OR $kelas9 != ""  OR $kelas10 != "" OR $sks_matkul1 != "" OR $sks_matkul2 != "" OR $sks_matkul3 != "" OR $sks_matkul4 != "" OR $sks_matkul5 != "" OR $sks_matkul6 != "" OR $sks_matkul7 != ""  OR $sks_matkul8 != "" OR $sks_matkul9 != ""  OR $sks_matkul10 != "" OR $sks1 != "" OR $sks2 != "" OR $sks3 != "" OR $sks4 != "" OR $sks5 != "" OR $sks6 != "" OR $sks7 != ""  OR $sks8 != "" OR $sks9 != ""  OR $sks10 != ""  ){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into mhs values('','$nm_dosen','$nidn','$nip_dis','$matkul1','$matkul2','$matkul3','$matkul4','$matkul5','$matkul6','$matkul7','$matkul8','$matkul9','$matkul10','$prodi1','$prodi2','$prodi3','$prodi4','$prodi5','$prodi6','$prodi7','$prodi8','$prodi9','$prodi10','$kelas1','$kelas2','$kelas3','$kelas4','$kelas5','$kelas6','$kelas7','$kelas8','$kelas9','$kelas10','$sks_matkul1','$sks_matkul2','$sks_matkul3','$sks_matkul4','$sks_matkul5','$sks_matkul6','$sks_matkul7','$sks_matkul8','$sks_matkul9','$sks_matkul10')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['file_lampiran']['name']);

// alihkan halaman ke index.php
header("location:lam_skm.php?berhasil=$berhasil");
?>