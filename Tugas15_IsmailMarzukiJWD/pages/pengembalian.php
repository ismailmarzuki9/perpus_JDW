<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tampil data pengembalian join table transaksi, buku dan anggota</h1>

</div>

<p id="tombol-tambah-container"><a href="index.php?p=pengembalian-input" class="btn btn-primary">Tambah Data Pengembalian</a>
    <a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>
<FORM CLASS="form-inline" METHOD="POST">
    <div align="right">
        <form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
</FORM>
</p>
<table class="table table-bordered table-striped">
    <tr>
        <th id="label-tampil-no">No</td>
        <th>ID Transaksi</th>
        <th>ID anggota</th>
        <th>Nama</th>
        <th>ID Buku</th>
        <th>Judul Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl kembali</th>
        <th> Status</th>


        <th id="label-opsi">Opsi</th>
    </tr>



    <?php
    $batas = 10;
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
            
            $sql = "SELECT tbtransaksi.idtransaksi, tbanggota.idanggota, tbanggota.nama, tbbuku.idbuku, tbbuku.judulbuku, tbtransaksi.tglpinjam, tbtransaksi.tglkembali 
                    FROM tbtransaksi 
                    INNER JOIN tbanggota ON tbtransaksi.idanggota=tbanggota.idanggota 
                    INNER JOIN tbbuku ON tbtransaksi.idbuku=tbbuku.idbuku  
                    WHERE tbanggota.nama LIKE '%$pencarian%'
                    OR idtransaksi LIKE '%$pencarian%'
                    OR idanggota LIKE '%$pencarian%'
                    OR idbuku LIKE '%$pencarian%'
                    OR tbbuku.judulbuku LIKE '%$pencarian%'
                    OR tglpinjam LIKE '%$pencarian%'";


            $query = $sql;
            $queryJml = $sql;
        } else {
            $query = "SELECT tbtransaksi.idtransaksi, tbanggota.idanggota, tbanggota.nama, tbbuku.idbuku, tbbuku.judulbuku, tbtransaksi.tglpinjam, tbtransaksi.tglkembali 
            FROM tbtransaksi 
            INNER JOIN tbanggota ON tbtransaksi.idanggota=tbanggota.idanggota 
            INNER JOIN tbbuku ON tbtransaksi.idbuku=tbbuku.idbuku
             LIMIT $posisi, $batas";

            $queryJml = "SELECT tbtransaksi.idtransaksi, tbanggota.idanggota, tbanggota.nama, tbbuku.idbuku, tbbuku.judulbuku, tbtransaksi.tglpinjam, tbtransaksi.tglkembali 
            FROM tbtransaksi 
            INNER JOIN tbanggota ON tbtransaksi.idanggota=tbanggota.idanggota 
            INNER JOIN tbbuku ON tbtransaksi.idbuku=tbbuku.idbuku";
            $no = $posisi * 1;
        }
    } else {
        $query = "SELECT tbtransaksi.idtransaksi, tbanggota.idanggota, tbanggota.nama, tbbuku.idbuku, tbbuku.judulbuku, tbtransaksi.tglpinjam, tbtransaksi.tglkembali 
        FROM tbtransaksi 
        INNER JOIN tbanggota ON tbtransaksi.idanggota=tbanggota.idanggota 
        INNER JOIN tbbuku ON tbtransaksi.idbuku=tbbuku.idbuku
         LIMIT $posisi, $batas";

        $queryJml = "SELECT tbtransaksi.idtransaksi, tbanggota.idanggota, tbanggota.nama, tbbuku.idbuku, tbbuku.judulbuku, tbtransaksi.tglpinjam, tbtransaksi.tglkembali 
        FROM tbtransaksi 
        INNER JOIN tbanggota ON tbtransaksi.idanggota=tbanggota.idanggota 
        INNER JOIN tbbuku ON tbtransaksi.idbuku=tbbuku.idbuku";
        $no = $posisi * 1;
    }

    //$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
    $q_tampil_anggota = mysqli_query($db, $query);
    if (mysqli_num_rows($q_tampil_anggota) > 0) {
        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
            if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
                $foto = "admin-no-photo.jpg";
            else
                $foto = $r_tampil_anggota['foto'];
    ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_anggota['idtransaksi']; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><?php echo $r_tampil_anggota['idbuku']; ?></td>
                <td><?php echo $r_tampil_anggota['judulbuku']; ?></td>
                <td><?php echo $r_tampil_anggota['tglpinjam']; ?></td>
                <td><?php echo $r_tampil_anggota['tglkembali']; ?></td>
                <td><?php if ($r_tampil_anggota['tglkembali']== '0000-00-00') {
                    echo"Belum kembali";
                }else{
                    echo "Suda kembali";
                } 
                ?></td>

                <td>
                    <a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" class="btn btn-info btn-sm">Cetak Kartu</a>
                    <a href="index.php?p=pengembalian-edit&id=<?php echo $r_tampil_anggota['idtransaksi']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses/pengembalian-hapus.php?id=<?php echo $r_tampil_anggota['idtransaksi']; ?>" onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
                echo "<a href=\"?p=pengembalian&hal=$i\">$i</a>";
            } else {
                echo "<a class=\"active\">$i</a>";
            }
        }
        ?>
    </div>
<?php
}
?>