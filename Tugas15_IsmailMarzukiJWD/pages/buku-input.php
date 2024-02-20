<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input data Buku</h1>

</div>
<div class="col-lg-6">
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Upload buku</label>
            <input type="file" class="form-control" name="filebuku">
        </div>
        <div class="mb-3">
            <label class="form-label">ID Buku</label>
            <input type="text" class="form-control" name="id_buku">
        </div>
        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" class="form-control" name="judulbuku">
        </div>

        <div class="input-group mb-3">
            <select class="form-select" id="inputGroupSelect02" name="kategori">
                <option selected>Pilih kategori buku</option>
                <option value="ilmukomputer">Ilmu Komputer</option>
                <option value="karyasastra">Karya Sastra</option>
                <option value="ilmuagama">Ilmu Agama</option>
            </select>
            <label class="input-group-text" for="inputGroupSelect02">Kategori</label>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengarang</label>
            <input type="text" class="form-control" name="pengarang">
        </div>

        <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit">
        </div>

        <div class="mb-2">
            <label class="form-label">Status</label>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="Dipinjam" checked>
                <label class="form-check-label" for="inlineRadio1">Dipinjam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="Tersedia">
                <label class="form-check-label" for="inlineRadio2">Tersedia</label>
            </div>
        </div>


        <div class="mb-3">
            <label class="form-label"></label>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </div>

    </form>
</div>