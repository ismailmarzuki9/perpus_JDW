<?php
include '../koneksi.php';
$idtr=$_GET['id'];

$hapus =mysqli_query($db,
	"DELETE FROM tbtransaksi
	WHERE idtransaksi='$idtr'"
);


header("location:../index.php?p=peminjaman");
?>