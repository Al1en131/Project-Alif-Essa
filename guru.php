<?php
include "koneksi.php";
include "dashboard.php";
include "koneksibootstrap.php";

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jeniskelamin = isset($_POST['jeniskelamin']) ? $_POST['jeniskelamin'] : '';
    $tempatlahir = isset($_POST['tempatlahir']) ? $_POST['tempatlahir'] : '';
    $tanggallahir = isset($_POST['tanggallahir']) ? $_POST['tanggallahir'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $gol = isset($_POST['gol']) ? $_POST['gol'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $ijazah = isset($_POST['ijazah']) ? $_POST['ijazah'] : '';
    $tanggalkerja = isset($_POST['tanggalkerja']) ? $_POST['tanggalkerja'] : '';
  

    // include database connection file
    // ...

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO dataguru(nama, jeniskelamin, tempatlahir, tanggallahir, alamat, gol, agama, status, ijazah, tanggalkerja) VALUES('$nama', '$jeniskelamin', '$tempatlahir', '$tanggallahir', '$alamat', '$gol', '$agama', '$status', '$ijazah', '$tanggalkerja')");
    if ($result) {
    $message = 'Data berhasil dimasukkan. Klik <a href="tableguru.php">di sini</a> untuk menuju ke tabel.';
    echo '<div class="notification">' . $message . '</div>';
    $url = 'tableguru.php';
    echo '<script>setTimeout(function() { window.location.href = "' . $url . '"; }, 3000)</script>';
} else {
    echo '<script>alert("Terjadi kesalahan dalam memasukkan data. Silakan coba lagi.")</script>';
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Data Kelulusan</title>
  </head>
  <style>
.notification {
  position: fixed;
  top: 70px; /* Sesuaikan dengan tinggi navbar Anda */
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 20px;
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  z-index: 9999;
}
</style>

  <body>

    <div id="main" class="container">
      <div class="row">
        <div class="col-md-9 offset-md-2">
          <div class="pagetitle">
            <h1>Form Data Guru</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                <li class="breadcrumb-item"><a href="dashboard2.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="tableguru.php">Database</a></li>
                <li class="breadcrumb-item active">Form</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="guru.php" method="POST">

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Guru" class="form-control">
                </div>
                <div class="form-group">
                    <label name="jeniskelamin">Jenis Kelamin</label>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin" value="Laki-Laki" >
                      <label class="form-check-label">Laki-Laki</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin"value="Perempuan">
                      <label class="form-check-label">Perempuan</label>
                  </div>
                  </div>
                  <div class="row g-3">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempatlahir" placeholder="Masukkan Tempat Lahir" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir">
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Guru" rows="4"></textarea>
                </div>
                <div class="form-group">
                <label >Golongan Darah </label>
                <div><select name="gol" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
                </div>
            </div>
                <div class="form-group">
                <label>Agama </label>
                <div><select name="agama" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="muslim">Muslim</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="konghucu">Konghucu</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                    <label name="status">status</label>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" value="Guru TK-A[]">Guru TK-A
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" value="Guru TK-B[]">Guru TK-B
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" value="Kepala Sekolah[]">Kepala Sekolah
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                <label >Ijazah </label>
                <div><select name="ijazah" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
                </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Kerja</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggalkerja" placeholder="Tanggal Kerja">
                  </div>
                </div>
                
                <button type="submit" name ="Submit" class="btn btn-success">SIMPAN</button>
                <button type="reset"  class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>