<body bgcolor="#65a9d7">
<?php
include "../koneksi.php";

if(!empty($_POST['nim']))
{
 $nim=$_POST['nim'];
 $kehadiran=$_POST['kehadiran'];
 $tugas_1=$_POST['tugas1'];
 $tugas_2=$_POST['tugas2'];
 $tugas_3=$_POST['tugas3'];
 $uts=$_POST['uts'];
 $uas=$_POST['uas'];
 
 //hitung kehadiran
 $n_kehadiran = 0.1 * ((100/14) * $kehadiran);
//hitung tugas
 $n_tugas = 0.2 * (($tugas_1 + $tugas_1 + $tugas_1)/3);
 //hitung uts
 $n_uts = 0.3 * $uts;
 //hitung uas
 $n_uas = 0.4 * $uas;
 //nilai akhir
 $nilai_akhir = $n_kehadiran + $n_tugas + $n_uts + $n_uas;
//indeks
 if($nilai_akhir>=80 && $nilai_akhir<=100){
 	$indeks = "A";
 	$keterangan = "Sangat Baik (Lulus)";
 }elseif($nilai_akhir>=68 && $nilai_akhir<=79){
 	$indeks="B";
 	$keterangan ="Baik (Lulus)";
 }elseif($nilai_akhir>=55 && $nilai_akhir<=69){
 	$indeks="C";
 	$keterangan ="Cukup (Lulus)";
 }elseif($nilai_akhir>=45 && $nilai_akhir<=55){
 	$indeks="D";
 	$keterangan ="Kurang(Lulus)";
 }elseif($nilai_akhir>=0 && $nilai_akhir<=44){
 	$indeks="E";
 	$keterangan ="Sangat Kurang (Tidak Lulus)";
 }

 $link=koneksi_db();
 $sql="UPDATE t_nilai SET kehadiran='$kehadiran',tugas_1='$tugas_1',tugas_2='$tugas_2',tugas_3='$tugas_3',uts='$uts',uas='$uas',nilai_kehadiran='$n_kehadiran',nilai_tugas='$n_tugas',nilai_uts='$n_uts',nilai_uas='$n_uas',nilai_akhir='$nilai_akhir',indeks='$indeks',ket='$keterangan' WHERE nim='$nim';";
 $res=mysqli_query($link,$sql);
 
 if($res)
 {
 	echo "<center><h1>Sukses mengubah data nilai $nim</h1><br>";
	echo "untuk melihatnya silahkan klik<br> <a href='tampil_nilai.php'>Link ini</a></center>";
 }
 else
 {
	echo "<center><h1>Gagal mengubah data nilai $nim</h1><br>";
	echo "Error : ".mysqli_error($link);
	echo "<br>Kembali<br> <a href='tampil_nilai.php'>Link ini</a>
	</center>";
 }
}
?>
</body>