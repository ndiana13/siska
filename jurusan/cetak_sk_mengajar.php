<?php
include '../login/config.php';
$id_sp = $_GET['id_sp'];
$query     =mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE id_sp='$id_sp'");
$result    =mysqli_fetch_array($query);

   $y = substr($result['tgl_direktur'],0,4);
   $m = substr($result['tgl_direktur'],5,2);
   $h = substr($result['tgl_direktur'],8,2);

   if($m == "01"){
       $nm = "Januari";
   } elseif($m == "02"){
       $nm = "Februari";
   } elseif($m == "03"){
       $nm = "Maret";
   } elseif($m == "04"){
       $nm = "April";
   } elseif($m == "05"){
       $nm = "Mei";
   } elseif($m == "06"){
       $nm = "Juni";
   } elseif($m == "07"){
       $nm = "Juli";
   } elseif($m == "08"){
       $nm = "Agustus";
   } elseif($m == "09"){
       $nm = "September";
   } elseif($m == "10"){
       $nm = "Oktober";
   } elseif($m == "11"){
       $nm = "November";
   } elseif($m == "12"){
       $nm = "Desember";
  }
if ($result['id_jurusan']){
	$kon = mysqli_connect("localhost",'root',"","siska");
    if (!$kon){
       	die("Koneksi database gagal:".mysqli_connect_error());
   	}
	$jurusan = $result['id_jurusan'];
    $sql="SELECT nm_jurusan FROM tb_jurusan WHERE id_jurusan ='$jurusan'";
    $hasil=mysqli_query($kon,$sql);
    while ($data = mysqli_fetch_array($hasil)) {
    $nm_jurusan = $data['nm_jurusan']; 
}
}
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			border-width: 1px;
			border-color: white;
		}

		table tr,td .text2 {
			vertical-align: top!important;
			text-align: justify;
			font-size: 17px;
		}

		

	</style>
</head>
<body>
	<center>
		<table width="700">
			<tr>
				<td><img src="../AdminLTE/dist/img/pnc.png" width="80" height="80"></td>
				<td><center>
					<font size="4"> KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI<br></font>
					<font size="4"><strong>POLITEKNIK NEGERI CILACAP</strong><br></font>
					<font size="2">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>
						Telepon: (0282)533329, Faksimile: (0282)537992<br>
						Laman: www.politeknikcilacap.ac.id Email: poltec@politeknikcilacap.ac.id</font>
				</center></td>			
			</tr>
			<tr>
				<td colspan="2"><hr size="3px"></td>
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<font size="3">KEPUTUSAN DIREKTUR POLITEKNIK NEGERI CILACAP<br>
						NOMOR : <?php echo $result['no_sk'];?></font>
				</center>
				</td>			
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<font size="3">TENTANG</font>
				</center>
				</td>			
			</tr>
		</table>
		<table width="600">
			<tr>
				<td>
				<center>
					<font size="3" style="text-transform:uppercase;"><?php echo $result['perihal'];?><br></font>
					<font size="3"style="text-transform:uppercase;">PADA JURUSAN <?php echo "<a>". $nm_jurusan."</a>";?> SEMESTER <?php echo $result['semester'];?><br>TAHUN AKADEMIK <?php echo $result['thn_akademik'];?><br></font>
				</center>
				</td>
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<font size="3" >DIREKTUR POLITEKNIK NEGERI CILACAP<br></font>
				</center>
				</td>
			</tr>
		</table>
		</center>
		<table>
			<tr class="text2">
				<td width="110">Menimbang</td>
				<td width="20"><span>:</span><td>
				<td width="30">a.</td>
				<td width="450">bahwa dalam rangka melaksanakan Tri Darma Perguruan Tinggi dilingkungan Politeknik Negeri Cilacap, perlu diatur beban tugas dosen/tenaga pengajar;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">b.</td>
				<td width="450">bahwa sehubungan dengan butir a diatas, perlu ditetapkan Surat Keputusan Direktur Politeknik Negeri Cilacap.</td>
			</tr>
			
		</table>
		<table>
			<tr class="text2">
				<td width="110">Mengingat</td>
				<td width="20"><span>:</span><td>
				<td width="30">1.</td>
				<td width="450">Undang-Undang Republik Indonesia Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">2.</td>
				<td width="450">Undang-Undang Republik Indonesia Nomor 14 Tahun 2005 tentang Guru dan Dosen;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">3.</td>
				<td width="450">Undang-Undang Republik Indonesia Nomor 12 Tahun 2012 tentang Pendidikan Tinggi;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">4.</td>
				<td width="450">Peraturan Pemerintah Nomor 4 Tahun 2014  tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Perguruan tinggi;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">5.</td>
				<td width="450">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 102 Tahun 2014 tentang Pendirian, Organisasi dan Tata Kerja Politeknik Negeri Cilacap;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">6.</td>
				<td width="450">Peraturan Menteri Riset, Teknologi dan Pendidikan Tinggi Nomor 44 Tahun 2015 tentang Standar Nasional Pendidikan Tinggi;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">7.</td>
				<td width="450">Peraturan Menteri Keuangan Nomor 32/PMK.02/2018 tentang Standar Biaya Masukan Tahun Anggaran 2020.</td>
			</tr>
			
		</table>
		<table>
			<tr class="text2">
				<td width="110">Memperhatikan</td>
				<td width="20"><span>:</span><td>
				<td width="30">1.</td>
				<td width="450">Kalender Akademik Politeknik Negeri Cilacap Tahun Akademik <?php echo $result['thn_akademik'];?>;</td>
			</tr>
			<tr class="text2">
				<td width="110"></td>
				<td width="20"><span></span><td>
				<td width="30">2.</td>
				<td width="450">Surat Ketua Jurusan tentang Permohonan Surat Keputusan Beban Tugas Tenaga Pengajar Semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>.</td>
			</tr>
			
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<font size="3">MEMUTUSKAN :</font>
				</center>
				</td>			
			</tr>
		</table>
		<table>
			<tr class="text2">
				<td width="110">Menetapkan</td>
				<td width="20"><span>:</span><td>
				<td width="480" style="text-transform:uppercase;">Keputusan direktur politeknik negeri cilacap tentang <?php echo $result['perihal'];?> JURUSAN <?php echo "<a>". $nm_jurusan."</a>";?> Semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>.</td>
			</tr>		
		</table>
		<table>
			<tr class="text2">
				<td width="110">KESATU</td>
				<td width="20"><span>:</span><td>
				<td width="480">Menetapkan nama-nama yang terdapat pada lampiran surat keputusan ini, sebagai dosen/tenaga pengajar yang diberi tugas mengajar/menguji untuk Semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>.</td>
			</tr>
			<tr class="text2">
				<td width="110">KEDUA</td>
				<td width="20"><span>:</span><td>
				<td width="480">Tugas mengajar/menguji dosen tercantum dalam lampiran keputusan ini yang terdapat pada kolom 1 nomor, kolom 2 nama dosen, kolom 3 nama matakuliah, kolom 4 program studi, kolom 5 kelas, kolom 6 SKS matakuliah dan kolom 7 SKS pararel.</td>
			</tr>
			<tr class="text2">
				<td width="110">KETIGA</td>
				<td width="20"><span>:</span><td>
				<td width="480">Dalam melaksanakan tugasnya dosen/tenaga pengajar sebagaimana dalam diktum kesatu bertanggungjawab kepada Direktur Politeknik Negeri Cilacap melalui Ketua Jurusan.</td>
			</tr>
			<tr class="text2">
				<td width="110">KEEMPAT</td>
				<td width="20"><span>:</span><td>
				<td width="480">Segala biaya yang timbul sebagai akibat ditetapkannya Surat Keputusan ini dibebankan pada DIPA Politeknik Negeri Cilacap Tahun Anggaran 2019 Nomor: DIPA.042.01.2.400867/2019 tanggal 5 Desember 2018.</td>
			</tr>
			<tr class="text2">
				<td width="110">KELIMA</td>
				<td width="20"><span>:</span><td>
				<td width="480">Keputusan Direktur ini mulai berlaku pada tanggal ditetapkan.</td>
			</tr>					
		</table>
		<br><br><br>
		<table width="700">
			<tr>
				<td width="320"><br><br><br></td>
				<td>Ditetapkan di Cilacap<br><?php echo  "<a>". $h." ". $nm. " ". $y. "</a>" ?><br>DIREKTUR POLITEKNIK NEGERI<br>CILACAP<br>
				<br><br><br><br><span style="text-transform:uppercase;text-align: center;"><?php 
		$direktur = "SELECT * FROM tb_pengguna WHERE level=5";
		$sql     =mysqli_query($conn,$direktur);
		$r    =mysqli_fetch_array($sql);?><?php echo $r['nama_lengkap'];?></span><br><?php echo $r['nip'];?></td>
			</tr>
	     </table>
	     <div style="page-break-before:always;">
	     	<table width="700">
				<tr style="font-size: 10px;">
					<td width="300"></td>
					<td width="400">Lampiran Keputusan Direktur Politeknik Negeri Cilacap</td>
				</tr>
				<tr style="font-size: 10px;">
					<td width="400"></td>
					<td width="30">Nomor &nbsp;&nbsp;&nbsp;: <?php echo $result['no_sk'];?></td>
				</tr>
				<tr style="font-size: 10px;">
					<td width="300"></td>
					<td>Tanggal &nbsp;&nbsp;: <?php echo  "<a>". $h." ". $nm. " ". $y. "</a>" ?></td>
				</tr>
				<tr style="font-size: 10px;">
					<td width="300"></td>
					<td>Tentang : <?php echo $result['perihal'];?> Semester <?php echo $result['semester'];?> Jurusan <?php echo "<a>". $nm_jurusan."</a>";?> Tahun Akademik <?php echo $result['thn_akademik'];?>
					<td>
				</tr>
			</table><br><br>		
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="1" style="text-transform:uppercase;" >DAFTAR NAMA-NAMA DOSEN / TENAGA PENGAJAR YANG DIBERI BEBAN TUGAS MENGAJAR DAN MENGUJI<br>
						PADA JURUSAN <?php echo "<a>". $nm_jurusan."</a>";?> SEMESTER <?php echo $result['semester'];?><br>
						TAHUN AKADEMIK <?php echo $result['thn_akademik'];?>
						</font>
					</center>
					</td>			
				</tr>
			</table>
			<table border="1" cellspacing="0"  width="680">
				<tbody>
				<?php
					$connection = mysqli_connect("localhost",'root',"","siska");
					if ($result['id_jurusan']== 'TI') {
						$sql = "SELECT * FROM lam_skm ORDER BY id";
					}
					elseif ($result['id_jurusan']=='TM') {
						$sql = "SELECT * FROM lam_skm_tm ORDER BY id";
					}
					elseif ($result['id_jurusan']=='TE') {
						$sql = "SELECT * FROM lam_skm_te ORDER BY id";
					}
		           elseif ($result['id_jurusan']=='TPPL') {
						$sql = "SELECT * FROM lam_skm_tppl ORDER BY id";
					}
					else {
						echo "database tidak tersedia!";
					}		           
		            $result = mysqli_query($connection,$sql);
		            $no= 1;
		            while($d = mysqli_fetch_array($result)) {
		            $jml_sks_a = $d['sks_matkul1']+$d['sks_matkul2']+$d['sks_matkul3']+$d['sks_matkul4']+$d['sks_matkul5']+$d['sks_matkul6']+$d['sks_matkul7']+$d['sks_matkul8']+$d['sks_matkul9']+$d['sks_matkul10'];
		            $jml_sks_b = $d['sks1']+$d['sks2']+$d['sks3']+$d['sks4']+$d['sks5']+$d['sks6']+$d['sks7']+$d['sks8']+$d['sks9']+$d['sks10'];
				?>
				<tr style="font-size: 9px; text-align: center;">
					<td width="10">NO</td>
					<td width="150">NAMA DOSEN</td>
					<td width="150">MATA KULIAH</td>
					<td width="40">PRODI</td>
					<td width="40">KELAS</td>
					<td width="40">SKS Mata Kuliah</td>
					<td width="40">SKS Paralel</td>		
				</tr>
				<tr style="font-size: 9px; text-align: center;">
					<td width="10">I</td>
					<td width="150">II</td>
					<td width="150">III</td>
					<td width="40">IV</td>
					<td width="40">V</td>
					<td width="40">VI</td>
					<td width="40">VII</td>
				</tr>
				<tr style="font-size: 9px;">
					<td style="text-align: center;" rowspan="10"><?php echo $no++; ?></td>
					<td rowspan="10"><?php echo $d['nm_dosen']; ?><br><?php echo $d['nidn']; ?><br><?php echo $d['nip_dis']; ?></td>
                    <td><?php echo $d['matkul1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['prodi1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['kelas1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['sks_matkul1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['sks1']; ?></td>
                </tr>
                <?php
	                $matkul2 = $d['matkul2'];
	                $matkul3 = $d['matkul3'];
	                $matkul4 = $d['matkul4'];
	                $matkul5 = $d['matkul5'];
	                $matkul6 = $d['matkul6'];
	                $matkul7 = $d['matkul7'];
	                $matkul8 = $d['matkul8'];
	                $matkul9 = $d['matkul9'];
	                $matkul10 = $d['matkul10'];

	                if (!empty($matkul2)){
	                	echo "
	                	<tr style='font-size: 9px;'>
	                    <td>".$d['matkul2']."</td>
	                    <td style='text-align: center'>".$d['prodi2']."</td>
	                    <td style='text-align: center'>".$d['kelas2']."</td>
	                    <td style='text-align: center'>".$d['sks_matkul2']."</td>
	                    <td style='text-align: center'>".$d['sks2']."</td>
	                	</tr>";
	                	if (!empty($matkul3)){

	                	echo "
	                	<tr style='font-size: 9px;'>
	                    <td>".$d['matkul3']."</td>
	                    <td style='text-align: center'>".$d['prodi3']."</td>
	                    <td style='text-align: center'>".$d['kelas3']."</td>
	                    <td style='text-align: center'>".$d['sks_matkul3']."</td>
	                    <td style='text-align: center'>".$d['sks3']."</td>
	                	</tr>";
		                	if (!empty($matkul4)){

		                	echo "
		                	<tr style='font-size: 9px;'>
		                    <td>".$d['matkul4']."</td>
		                    <td style='text-align: center'>".$d['prodi4']."</td>
		                    <td style='text-align: center'>".$d['kelas4']."</td>
		                    <td style='text-align: center'>".$d['sks_matkul4']."</td>
		                    <td style='text-align: center'>".$d['sks4']."</td>
		                	</tr>";
		                	
			                	if (!empty($matkul5)){

			                	echo "
			                	<tr style='font-size: 9px;'>
			                    <td>".$d['matkul5']."</td>
			                    <td style='text-align: center'>".$d['prodi5']."</td>
			                    <td style='text-align: center'>".$d['kelas5']."</td>
			                    <td style='text-align: center'>".$d['sks_matkul5']."</td>
			                    <td style='text-align: center'>".$d['sks5']."</td>
			                	</tr>";
				                	if (!empty($matkul6)){

				                	echo "
				                	<tr style='font-size: 9px;'>
				                    <td>".$d['matkul6']."</td>
				                    <td style='text-align: center'>".$d['prodi6']."</td>
				                    <td style='text-align: center'>".$d['kelas6']."</td>
				                    <td style='text-align: center'>".$d['sks_matkul6']."</td>
				                    <td style='text-align: center'>".$d['sks6']."</td>
				                	</tr>";
				                	
					                	if (!empty($matkul7)){

					                	echo "
					                	<tr style='font-size: 9px;'>
					                    <td>".$d['matkul7']."</td>
					                    <td style='text-align: center'>".$d['prodi7']."</td>
					                    <td style='text-align: center'>".$d['kelas7']."</td>
					                    <td style='text-align: center'>".$d['sks_matkul7']."</td>
					                    <td style='text-align: center'>".$d['sks7']."</td>
					                	</tr>";
						                	if (!empty($matkul8)){

						                	echo "
						                	<tr style='font-size: 9px;'>
						                    <td>".$d['matkul8']."</td>
						                    <td style='text-align: center'>".$d['prodi8']."</td>
						                    <td style='text-align: center'>".$d['kelas8']."</td>
						                    <td style='text-align: center'>".$d['sks_matkul8']."</td>
						                    <td style='text-align: center'>".$d['sks8']."</td>
						                	</tr>";
						                	
							                	if (!empty($matkul9)){

							                	echo "
							                	<tr style='font-size: 9px;'>
							                    <td>".$d['matkul9']."</td>
							                    <td style='text-align: center'>".$d['prodi9']."</td>
							                    <td style='text-align: center'>".$d['kelas9']."</td>
							                    <td style='text-align: center'>".$d['sks_matkul9']."</td>
							                    <td style='text-align: center'>".$d['sks9']."</td>
							                	</tr>";
								                	if (!empty($matkul9)){

								                	echo "
								                	<tr style='font-size: 9px;'>
								                    <td>".$d['matkul9']."</td>
								                    <td style='text-align: center'>".$d['prodi9']."</td>
								                    <td style='text-align: center'>".$d['kelas9']."</td>
								                    <td style='text-align: center'>".$d['sks_matkul9']."</td>
								                    <td style='text-align: center'>".$d['sks10']."</td>
								                	</tr>";
								                	}
							                	}
							                }
					                	}
					                }
					            }
					        }
					    }
					}

                ?>
                 <tr style="font-size: 9px; text-align: center;">
					<td width="200"></td>
					<td colspan="2">Jumlah SKS</td>
					<td width="40"><?php echo "$jml_sks_a";?></td>
					<td width="50"><?php echo "$jml_sks_b";?></td>
				</tr>
            	</tbody>
            	<?php
				}
				?>
			</table>
			<br><br><br>
			<table width="700">
				<tr>
					<td width="420"><br><br><br><br></td>
					<td style="font-size: 12px;"> Ditetapkan di Cilacap<br><?php echo  "<a>". $h." ". $nm. " ". $y. "</a>" ?><br>DIREKTUR POLITEKNIK NEGERI<br>CILACAP<br>
					<br><br><br><br><span style="text-transform:uppercase;text-align: center;"><?php 
					$direktur = "SELECT * FROM tb_pengguna WHERE level=5";
					$sql     =mysqli_query($conn,$direktur);
					$r    =mysqli_fetch_array($sql);?><?php echo $r['nama_lengkap'];?></span><br><?php echo $r['nip'];?></td>
				</tr>
		     </table>
	     </div>
	    
</body>
</html>
<script>
		window.print();
</script>
