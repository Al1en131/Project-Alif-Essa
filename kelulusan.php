<html>
<?php
include "koneksi.php";
include 'koneksibootstrap.php';
include "dashboard.php";

// Check if form submitted, insert form data into tka table
if(isset($_POST['Submit'])) {
    // Assign values from form inputs to variables
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jeniskelamin = isset($_POST['jeniskelamin']) ? $_POST['jeniskelamin'] : '';
    $tempatlahir = isset($_POST['tempatlahir']) ? $_POST['tempatlahir'] : '';
    $tanggallahir = isset($_POST['tanggallahir']) ? $_POST['tanggallahir'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $gol = isset($_POST['gol']) ? $_POST['gol'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    $bapak = isset($_POST['bapak']) ? $_POST['bapak'] : '';
    $ibu = isset($_POST['ibu']) ? $_POST['ibu'] : '';
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
    $tanggalmasuk = isset($_POST['tanggalmasuk']) ? $_POST['tanggalmasuk'] : '';
    $tanggalulus = isset($_POST['tanggalulus']) ? $_POST['tanggalulus'] : '';

    

    // Insert user data into tka table
    $result = mysqli_query($mysqli, "INSERT INTO kelulusan(nama, jeniskelamin, tempatlahir, tanggallahir,  alamat, gol, agama, bapak, ibu, nilai, tanggalmasuk, tanggalulus)
                VALUES ('$nama', '$jeniskelamin', '$tempatlahir', '$tanggallahir',  '$alamat', '$gol', '$agama', '$bapak', '$ibu', '$nilai','$tanggalmasuk','$tanggalulus')");
   if ($result) {
    $message = 'Data berhasil dimasukkan. Klik <a href="tablekelulusan.php">di sini</a> untuk menuju ke tabel.';
    echo '<div class="notification">' . $message . '</div>';
    $url = 'tablekelulusan.php';
    echo '<script>setTimeout(function() { window.location.href = "' . $url . '"; }, 3000)</script>';
} else {
    echo '<script>alert("Terjadi kesalahan dalam memasukkan data. Silakan coba lagi.")</script>';
}



    
}
?>
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

    <div id="main" class="container" >
      <div class="row">
        <div class="col-md-9 offset-md-2">
           <div class="pagetitle">
      <h1>Form Data Kelulusan</h1>

            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
          <li class="breadcrumb-item"><a href="dashboard2.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="tablekelulusan.php">Database</a></li>
          <li class="breadcrumb-item active">Form</li>

                </ol>
              </nav>
            </div>
          <div class="card">

            <div class="card-body">
              <form action="kelulusan.php" method="POST">

                <div class="form-group" style="margin-top: 10px">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Murid" class="form-control">
                </div>
                <div class="form-group">
                    <label name="jeniskelamin">Jenis Kelamin</label>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin" value="Laki-Laki" >
                      <label class="form-check-label">Laki-Laki</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin" value="Perempuan">
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
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Murid" rows="4"></textarea>
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
            <div class="row g-3">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label>Nama Ayah</label>
                  <input type="text" name="bapak" placeholder="Masukkan Nama Ayah Murid" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="tgl_lahir">Nama Ibu</label>
                    <input type="text" name="ibu" class="form-control" name="tgl_lahir" placeholder="Masukkan Nama Ibu Murid">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Keterangan Nilai </label>
                <div><select name="nilai" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                </div>
            </div>
              <div class="form-group">
                    <label for="tgl_lahir">Tanggal Masuk</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggalmasuk">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lulus</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggalulus" >
                  </div>
                
                <button style="margin-top: 10px;" type="submit" name ="Submit" class="btn btn-success">SIMPAN</button>
                <button style="margin-top: 10px;" type="reset"  class="btn btn-warning">RESET</button>


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>