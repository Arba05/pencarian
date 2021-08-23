<?php 
	error_reporting(0);
	include 'connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Halaman Siswa
	</title>
</head>
<body>
<h2>Data Siswa</h2>

<form action="" method="POST">
	<input type="text" name="query" placeholder="Cari Data" />
	<input type="Submit" name="Cari" value="Search" />
</form><br>

<table border="1" cellspacing="0">
	<tr style="font-weight: bold;">
		<td>NO</td>
		<td>NAMA</td>
		<td>NIS</td>
		<td>TEMPAT LAHIR</td>
	</tr>
	<?php
	$no = 1;

	$query = $_POST['query'];

	if($query !=''){
		$select = mysqli_query($conn, "SELECT *FROM db_siswa WHERE nis LIKE '%".$query."%' OR nama LIKE '%".$query."%' ");
	}else{
		$select = mysqli_query($conn, "SELECT *FROM db_siswa");
	}

	if(mysqli_num_rows($select)){
	while($baris = mysqli_fetch_array($select)){
	?>
	<tr>
		<td><?php echo $no++?></td>
		<td><?php echo $baris['nama']?></td>
		<td><?php echo $baris['nis']?></td>
		<td><?php echo $baris['tempat lahir']?></td>
	</tr>
<?php }}else{
	echo '<tr><td colspan="4">Data Tidak Ditemukan</td></tr>';
} ?>
</table>
</body>
</html>