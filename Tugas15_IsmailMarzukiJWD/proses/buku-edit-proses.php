<?php
include '../koneksi.php';

$id_buku=$_POST['id_buku'];
$judulbuku=$_POST['judulbuku'];
$kategori=$_POST['kategori'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$status=$_POST['status'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['filebuku']['name'];

		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['filebuku']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_buku.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../filebuku/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="--";
	
	mysqli_query($db,
		"UPDATE tbbuku
		SET judulbuku='$judulbuku',kategori='$kategori',pengarang='$pengarang',penerbit='$penerbit', status='$status'
		WHERE idbuku='$id_buku'"
	);
	header("location:../index.php?p=databuku");
}
?>
