<?php
include '../login/config.php';
$id_sk_mengajar = $_GET['id_sk_mengajar'];
$query     =mysqli_query($conn, "SELECT * FROM tb_sk_mengajar WHERE id_sk_mengajar='$id_sk_mengajar'");
$result    =mysqli_fetch_array($query);
if ($result['id_jurusan']){
	$kon = mysqli_connect("localhost",'root',"","siska");
    if (!$kon){
    		die("Koneksi database gagal:".mysqli_connect_error());
    }
    $sql="select * from tb_jurusan";
    $hasil=mysqli_query($kon,$sql);
    while ($data = mysqli_fetch_array($hasil)) {
    $nm_jurusan = $data['nm_jurusan'];
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 4px;
			border-color: white;
		}

		table tr,td .text2 {
			vertical-align: top!important;
			text-align: justify;
			font-size: 16px;
		}

		

	</style>
</head>
<body>
	<center>
		<table width="700">
			<tr>
				<td><img src="../AdminLTE/dist/img/pnc.png" width="80" height="80"></td>
				<td><center>
					<font size="4"> KEMENTRIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI<br></font>
					<font size="4"><strong>POLITEKNIK NEGERI CILACAP</strong><br></font>
					<font size="2">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>
						Telepon: (0282)533329, Faksimile: (0282)537992<br>
						Laman: www.politeknikcilacap.ac.id Email: poltec@politeknikcilacap.ac.id</font>
				</center></td>			
			</tr>
			<tr>
				<td colspan="4"><hr></td>
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
					<font size="3"style="text-transform:uppercase;">PADA JURUSAN <?php echo "<a>". $nm_jurusan."</a>";?> SEMESTER <?php echo $result['semester'];?><br>SEMESTER <?php echo $result['thn_akademik'];?><br></font>
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
					<font size="3">MEMUTUSKAN</font>
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
				<td width="480">Menetapkan nama-nama yang terdapat pada lampiran surat keputusan ini, sebagai dosen/tenaga pengajar yang diberi tugas mengajar/menguji untuk Semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>.</td>
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
				<td width="350"><br><br><br><br></td>
				<td>Ditetapkan di Cilacap<br><?php echo date("d-m-Y") ?><br>DIREKTUR POLITEKNIK NEGERI<br>CILACAP<br>
				<br><br><br><br><span style="text-transform:uppercase;text-align: center;"><?php 
		$direktur = "SELECT * FROM tb_user WHERE level=3";
		$sql     =mysqli_query($conn,$direktur);
		$r    =mysqli_fetch_array($sql);?><?php echo $r['username'];?></span><br><?php echo $r['nip'];?></td>
			</tr>
	     </table>
	     <div style="page-break-before:always;">
	     	<table width="700">
				<tr style="font-size: 12px;">
				<td width="400"></td>
				<td width="400">Lampiran Keputusan Direktur Politeknik Negeri Cilacap<br>Nomor &nbsp;&nbsp;: <?php echo $result['no_sk'];?><br>Tanggal &nbsp;: <?php echo $result['tgl_sp'];?><br>Tentang : <?php echo $result['perihal'];?> Semester <?php echo $result['semester'];?> Jurusan <?php echo "<a>". $nm_jurusan."</a>";?> Tahun Ajaran <?php echo $result['thn_akademik'];?>
				<td>
				</tr>
			</table>
	     </div>

</body>
</html>
<script>
		window.print();
</script>
