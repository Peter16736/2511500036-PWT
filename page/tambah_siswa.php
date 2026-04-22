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
$carikode = mysqli_query($koneksi, "select max(nis) from siswaa") or die(mysqli_error());
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
    $nis = $_POST['nis'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $hp = $_POST['hp'];
    $id_kelas = $_POST['id_kelas'];
    

    $insert = mysqli_query($koneksi, "INSERT INTO siswaa VALUES ('$nis','$nm_siswa','$jenkel','$hp','$id_kelas')");

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
              <label for="nis">nis</label>
              <input type="text" name="nis" 
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

            <div class="form-group">
              <label for="jenkel">Jenis Kelamin</label>
              <select name="jenkel" id="jenkel" 
                     class="form-control">
                     <option value="">-- Pilih --</option>
                     <option value="L">Laki-laki</option>
                     <option value="P">Perempuan</option>
              </select>
            </div>


            <div class="form-group">
              <label for="hp">NO HP</label>
              <input type="text" name="hp" id="hp" 
                     placeholder="NO HP" 
                     class="form-control">
            </div>

            <div class="form-group">
              <label for="id_kelas">Id Kelas</label>
              <input type="text" name="id_kelas" id="id_kelas" 
                     placeholder="Id kelas" 
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