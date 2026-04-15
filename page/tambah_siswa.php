<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Siswa</h1>
      </div>
    </div>
  </div>
</div>

<?php
// kode otomatis
$carikode = mysqli_query($koneksi, "select max(kd_siswa) from siswa") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "M-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "M-";
}

$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $kd_siswa = $_POST['kd_siswa'];
    $nm_siswa = $_POST['nm_siswa'];
    

    $insert = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('$kd_siswa','$nm_siswa')");

    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h5><i class="icon fas fa-info"></i> Info </h5>
                <h4>Berhasil Disimpan</h4>
              </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h5><i class="icon fas fa-info"></i> Info </h5>
                <h4>Gagal Disimpan</h4>
              </div>';
    }
}
?><section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="card-body p-2">
          <form method="POST" action="">
            
            <div class="form-group">
              <label for="kd_siswa">kd siswa</label>
              <input type="text" name="kd_siswa" 
                     value="<?= $hasilkode; ?>" 
                     placeholder="Id Kat" 
                     class="form-control" readonly>
            </div>

            <div class="form-group">
              <label for="nm_siswa">Nama siswa</label>
              <input type="text" name="nm_siswa" id="nm_siswa" 
                     placeholder="Nama siswa" 
                     class="form-control">
            </div>

            <div class="card-footer">
              <input type="submit" class="btn btn-primary" 
                     name="tambah" value="simpan">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>