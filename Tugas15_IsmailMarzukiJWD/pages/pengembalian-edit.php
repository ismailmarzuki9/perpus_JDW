<?php
$id_transaksi = $_GET['id'];
$q_tampil_tr = mysqli_query($db, "SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'");
$r_tampil_tr = mysqli_fetch_array($q_tampil_tr);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit data Pengembalian</h1>

</div>
<div class="col-lg-6">
    <form action="proses/pengembalian-edit-proses.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">ID Transaksi</label>
            <input type="text" class="form-control" name="idtransaksi" value="<?php echo $r_tampil_tr['idtransaksi']; ?>" readonly="readonly">
        </div>

        <div class="mb-3">
            <label class="form-label">ID Anggota</label>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" value="<?php echo $r_tampil_tr['idanggota']; ?>" name="idanggota">

                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM tbanggota ";
                    $q_tampil_buku = mysqli_query($db, $query);
                    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) :
                    ?>
                        <?php $id = $r_tampil_buku['idanggota'];
                        //    $nama = $r_tampil_buku['nama'];  
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $r_tampil_buku['idanggota']; ?></option>
                    <?php
                    endwhile
                    ?>
                </select>
                <label for="floatingSelect">pilih nama anggota terdaftar</label>
            </div>
        </div>




        <div class="mb-3">
            <label class="form-label">ID Buku</label>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" value="<?php echo $r_tampil_tr['idbuku']; ?>" name="idbuku">

                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM tbbuku ";
                    $q_tampil_buku = mysqli_query($db, $query);
                    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) :
                    ?>
                        <?php $id = $r_tampil_buku['idbuku'];

                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $r_tampil_buku['idbuku']; ?></option>
                    <?php
                    endwhile
                    ?>
                </select>
                <label for="floatingSelect">pilih nama anggota terdaftar</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="tglpinjam">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tglpinjam" value="<?php echo $r_tampil_tr['tglpinjam']; ?>" name="tglpinjam">
        </div>

        <div class="mb-3">
            <label class="tglpinjam">Tanggal kembali</label>
            <input type="date" class="form-control" id="tglpinjam" value="<?php echo $r_tampil_tr['tglpinjam']; ?>" name="tglkembali">
        </div>

        <div class="mb-3">
            <label class="form-label"></label>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>

    </form>
</div>