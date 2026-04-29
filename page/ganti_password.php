<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Mata Pelajaran</h1>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_POST['tambah'])) {
  $pl = $_POST['pl'];
  $pb = $_POST['pb'];
  $username = $_POST['username'];

  $check = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'"));

  if($check) {
    $update = mysqli_query($koneksi, "UPDATE users SET password = '$pb' WHERE password = '$pl' AND username = '$username' ");
  
    if ($update) {
        echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <h5><i class="icon fas fa-info"></i> Info </h5>
                <h4>Berhasil Diubah</h4>
              </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <h5><i class="icon fas fa-info"></i> Info </h5>
                <h4>Gagal Diubah</h4>
              </div>';
    }
  } // <-- ini penutup if($check)

} // <-- INI YANG KAMU KURANG
?>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="card-body p-2">
          <form method="POST" action="">
            
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" 
                     placeholder="Id Kat" 
                     class="form-control" readonly>
            </div>

            <div class="form-group">
              <label for="pl">Password Lama</label>
              <input type="text" name="pl" id="pl" 
                     placeholder="Masukkan Password Lama" 
                     class="form-control">
            </div>

            <div class="form-group">
              <label for="pb">Password Baru</label>
              <input type="text" name="pb" id="pb" 
                     placeholder="Masukkan Password Baru" 
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