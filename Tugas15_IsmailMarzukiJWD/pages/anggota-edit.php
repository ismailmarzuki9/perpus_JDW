<?php
$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
	$foto = "admin-no-photo.jpg";
else
	$foto = $r_tampil_anggota['foto'];
?>
<div id="label-page">
	<h3>Edit Data Anggota</h3>
</div>
<div id="content">
	<form action="proses/anggota-edit-proses.php" method="post" enctype="multipart/form-data">
		<table id="tabel-input">
			<tr>
				<td class="label-formulir">FOTO</td>
				<td class="isian-formulir">
					<img src="images/<?php echo $foto; ?>" width=70px height=75px>
					<input type="file" name="foto" class="isian-formulir isian-formulir-border">
					<input type="hidden" name="foto_awal" value="<?php echo $r_tampil_anggota['foto']; ?>">
				</td>
			</tr>
			<tr>
				<td class="label-formulir">ID Anggota</td>
				<td class="isian-formulir"><input type="text" name="id_anggota" value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
			</tr>
			<tr>
				<td class="label-formulir">Nama</td>
				<td class="isian-formulir"><input type="text" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Jenis Kelamin</td>
				
				<td class="isian-formulir">
					<?php if ($r_tampil_anggota['jeniskelamin'] == "Pria") { ?>
						<input type="radio" name="jenis_kelamin" value="Pria" checked> Pria
						<input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
					<?php } elseif ($r_tampil_anggota['jeniskelamin'] == "Wanita") { ?>
						<input type="radio" name="jenis_kelamin" value="Pria"> Pria
						<input type="radio" name="jenis_kelamin" value="Wanita" checked> Wanita
					<?php } ?>
				</td>


				<input type="radio" name="jenis_kelamin" value="<?php echo $r_tampil_anggota['jeniskelamin']; ?>" class="isian-formulir isian-formulir-border"></td>
			</tr>
			<tr>
				<td class="label-formulir">Alamat</td>
				<td class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_anggota['alamat']; ?></textarea></td>
			</tr>
			<tr>
				<td class="label-formulir"></td>
				<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
			</tr>
		</table>
	</form>
</div>