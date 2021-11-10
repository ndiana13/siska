<?php
include '../login/config.php';
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
$id_sp = $_GET['id_sp'];
$query     =mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE id_sp='$id_sp'");
$result    =mysqli_fetch_array($query);

   $t = substr($result['tgl_sp'],0,4);
   $b = substr($result['tgl_sp'],5,2);
   $h = substr($result['tgl_sp'],8,2);

   if($b == "01"){
       $nm = "Januari";
   } elseif($b == "02"){
       $nm = "Februari";
   } elseif($b == "03"){
       $nm = "Maret";
   } elseif($b == "04"){
       $nm = "April";
   } elseif($b == "05"){
       $nm = "Mei";
   } elseif($b == "06"){
       $nm = "Juni";
   } elseif($b == "07"){
       $nm = "Juli";
   } elseif($b == "08"){
       $nm = "Agustus";
   } elseif($b == "09"){
       $nm = "September";
   } elseif($b == "10"){
       $nm = "Oktober";
   } elseif($b == "11"){
       $nm = "November";
   } elseif($b == "12"){
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
error_reporting();
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
			text-align: justify;
			font-size: 16px;
		}

		

	</style>
</head>
<body>
	<center>
		<table width="700">
			<tr>
				<td><img src="../AdminLTE/dist/img/pnc.png" width="100" height="`100"></td>
				<td><center>
					<font size="5">KEMENTRIAN PENDIDIKAN, DAN KEBUDAYAAN<br></font>
					<font size="4">POLITEKNIK NEGERI CILACAP<br></font>
					<font size="4" style="text-transform:uppercase;"><strong><?php echo "<a>".$nm_jurusan."</a>"?></strong><br></font>
					<font size="2">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>
						Telepon: (0282)533329, Faksimile: (0282)537992<br>
						Laman: www.politeknikcilacap.ac.id Email: poltec@politeknikcilacap.ac.id</font>
				</center></td>			
			</tr>
			<tr>
				<td colspan="2"><hr size="1px" color="black"></td>
			</tr>
		</table>
	</center>
		<table width="700">
			<td width="500"></td>
			<td>
				<?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?>
			</td>
			</tr>
		</table>		
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Nomor</td>
				<td width="20"><span>:</span><td>
				<td width="300"><?php echo $result['no_sp'];?></td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Lampiran</td>
				<td width="20"><span>:</span><td>
				<td width="300">1 bundle<td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Hal</td>
				<td width="20"><span>:</span><td>
				<td width="300"><?php echo $result['perihal'];?><td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70"></td>
				<td width="20"><td>
				<td width="300">Semester <?php echo $result['semester'];?> TA <?php echo $result['thn_akademik'];?><td>
			</tr>
				
		</table>
		<br><br>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="400">Kepada Yth.<br>
				Ka.Subbag. Akademik dan Kemahasiswaan<br>
				Politeknik Negeri Cilacap<br>
				Di Tempat</td>
			</tr>			
		</table>
		<?php
		if($result['jns_sp']=='skdoswal'){
		?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> dengan nama dosen-dosen terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$kon = mysqli_connect("localhost",'root',"","siska");
			    if (!$kon){
			       	die("Koneksi database gagal:".mysqli_connect_error());
			   	}
				$jur 	= $result['id_jurusan'];
				$kajur 	= "SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip WHERE tb_kajur.id_jurusan='$jur'";
				$sql    = mysqli_query($kon,$kajur);
				$row    = mysqli_fetch_array($sql);
				?>
				<img src="../AdminLTE/dist/img/<?= $row['ttd'];?>" width="120" height="90">
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
			</tr>
		</table>
		<?php
		}
		elseif($result['jns_sp']=='skmengajar'){
		?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada dosen-dosen dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$kon = mysqli_connect("localhost",'root',"","siska");
			    if (!$kon){
			       	die("Koneksi database gagal:".mysqli_connect_error());
			   	}
				$jur 	= $result['id_jurusan'];
				$kajur 	= "SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip WHERE tb_kajur.id_jurusan='$jur'";
				$sql    = mysqli_query($kon,$kajur);
				$row    = mysqli_fetch_array($sql);
				if ($result['status']>='1') {
					echo "<img src='../AdminLTE/dist/img/".$row['ttd']."' width='120' height='90'>";
				}
				else{
					echo "";
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
			</tr>
		</table>
		<?php
		}  elseif($result['jns_sp']=='skmagang'){ ?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada dosen-dosen dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$kon = mysqli_connect("localhost",'root',"","siska");
			    if (!$kon){
			       	die("Koneksi database gagal:".mysqli_connect_error());
			   	}
				$jur 	= $result['id_jurusan'];
				$kajur 	= "SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip WHERE tb_kajur.id_jurusan='$jur'";
				$sql    = mysqli_query($kon,$kajur);
				$row    = mysqli_fetch_array($sql);
				if ($result['status']>='1') {
					echo "<img src='../AdminLTE/dist/img/".$row['ttd']."' width='120' height='90'>";
				}
				else{
					echo "";
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
			</tr>
		</table>
		<?php
		}
		else {
			echo "";
		}
		?>

		

	    
</body>
</html>
<script>
		window.print();
</script>
