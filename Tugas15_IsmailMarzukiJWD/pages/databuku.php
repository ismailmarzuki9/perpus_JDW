<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Tampil Data Buku</h1>

</div>

<p id="tombol-tambah-container"><a href="index.php?p=buku-input" class="btn btn-primary">Tambah Buku</a>
	<a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>
<FORM CLASS="form-inline" METHOD="POST">
	<div align="right">
		<form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
</FORM>
</p>
<table class="table table-bordered table-striped">
	<tr>
		<th id="label-tampil-no">No</td>
		<th>ID Buku</th>
		<th> Judul Buku</th>
		<th> kategori</th>
		<th> Status</th>
		<th> Pengarang</th>
		<th> Penerbit</th>

		<th id="label-opsi">Opsi</th>
	</tr>



	<?php
	$batas = 5;
	extract($_GET);
	if (empty($hal)) {
		$posisi = 0;
		$hal = 1;
		$nomor = 1;
	} else {
		$posisi = ($hal - 1) * $batas;
		$nomor = $posisi + 1;
	}
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
		if ($pencarian != "") {
			$sql = "SELECT * FROM tbbuku WHERE judulbuku LIKE '%$pencarian%'
						OR idbuku LIKE '%$pencarian%'
						OR kategori LIKE '%$pencarian%'
                        OR pengarang LIKE '%$pencarian%'
						OR penerbit LIKE '%$pencarian%'";

			$query = $sql;
			$queryJml = $sql;
		} else {
			$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbbuku";
			$no = $posisi * 1;
		}
	} else {
		$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
		$queryJml = "SELECT * FROM tbbuku";
		$no = $posisi * 1;
	}

	//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
	$q_tampil_buku = mysqli_query($db, $query);
	if (mysqli_num_rows($q_tampil_buku) > 0) {
		while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
			if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_buku['foto'];
	?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $r_tampil_buku['idbuku']; ?></td>
				<td><?php echo $r_tampil_buku['judulbuku']; ?></td>
				<td><?php echo $r_tampil_buku['kategori']; ?></td>
				<td><?php echo $r_tampil_buku['status']; ?></td>
				<td><?php echo $r_tampil_buku['pengarang']; ?></td>
				<td><?php echo $r_tampil_buku['penerbit']; ?></td>

				<td>
					<!-- <a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_buku['idanggota']; ?>" class="btn btn-info btn-sm">Cetak Kartu</a> -->
					<!--edit dan hapus belum dibuat-->
					<a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>" class="btn btn-warning btn-sm">Edit</a>
					<a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
	<?php $nomor++;
		}
	} else {
		echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
	} ?>
</table>
<?php
if (isset($_POST['pencarian'])) {
	if ($_POST['pencarian'] != '') {
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
} else { ?>
	<div style="float: left;">
		<?php
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Jumlah Data : <b>$jml</b>";
		?>
	</div>
	<div class="pagination">
		<?php
		$jml_hal = ceil($jml / $batas);
		for ($i = 1; $i <= $jml_hal; $i++) {
			if ($i != $hal) {
				echo "<a href=\"?p=databuku&hal=$i\">$i</a>";
			} else {
				echo "<a class=\"active\">$i</a>";
			}
		}
		?>
	</div>
<?php
}
?>


<?php
$q_tampil_buku = mysqli_query($db, $query);
while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) :
?>
	<div class="row d-flex justify-content-around">
		<div class="card" style="width: 18rem;">
			<img src="../images/AG011.png" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title"><?php echo $r_tampil_buku['judulbuku']; ?></h5>
				<h6 class="card-title"><?php echo $r_tampil_buku['pengarang']; ?></h6>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="btn btn-primary">Cek buku</a>
			</div>
		</div>
	</div>
<?php
endwhile;
?>