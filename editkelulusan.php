
  <?php
// include database connection file
include("koneksi.php");
include 'koneksibootstrap.php';
include 'dashboard.php';

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = isset($_POST['id']) ? $_POST['id'] : '';
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


    // update user data
    $result = mysqli_query($mysqli, "UPDATE kelulusan SET nama='$nama',jeniskelamin='$jeniskelamin',tempatlahir='$tempatlahir', tanggallahir='$tanggallahir',alamat='$alamat', gol='$gol',agama='$agama',bapak='$bapak',ibu='$ibu',nilai='$nilai',tanggalmasuk='$tanggalmasuk' ,tanggalulus='$tanggalulus' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    if ($result) {
    $message = 'Data berhasil dimasukkan. Klik <a href="tabletka.php">di sini</a> untuk menuju ke tabel.';
    echo '<div class="notification">' . $message . '</div>';
    $url = 'tabletka.php';
    echo '<script>setTimeout(function() { window.location.href = "' . $url . '"; }, 3000)</script>';
} else {
    echo '<script>alert("Terjadi kesalahan dalam memasukkan data. Silakan coba lagi.")</script>';
}

}
?>

<?php
// Display selected user data based on id
// Getting id from url
if (isset($_GET['id'])) {
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kelulusan WHERE id=$id");

 if ($result && mysqli_num_rows($result) > 0) {
  while($user_data = mysqli_fetch_array($result))
{   

    $nama= $user_data['nama'];
    $jeniskelamin= $user_data['jeniskelamin'];
    $tempatlahir= $user_data['tempatlahir'];
    $tanggallahir= $user_data['tanggallahir'];
    $alamat = $user_data['alamat'];
    $gol = $user_data['gol'];
    $agama = $user_data['agama'];
    $bapak = $user_data['bapak'];
    $ibu = $user_data['ibu'];
    $nilai=$user_data['nilai'];
    $tanggalmasuk = $user_data['tanggalmasuk'];
    $tanggalulus= $user_data['tanggalulus'];

}

}
}


?>
<html>
<head>
    <title>Edit Data Kelulusan</title>
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
<br/><br/>
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
          <li class="breadcrumb-item active">Edit Form</li>

              </nav>
            </div>
          <div class="card">
            <div class="card-body">
              <form action="editkelulusan.php" method="POST">

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Murid" class="form-control" value="<?php echo $nama;?>">
                </div>
                <div class="form-group">
                    <label >Jenis Kelamin</label>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin" value="Laki-Laki">
                      <label class="form-check-label">Laki-Laki</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin" value="Perempuan">
                      <label class="form-check-label" >Perempuan</label>
                  </div>
                  </div>
                  <div class="row g-3">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempatlahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?php echo $tempatlahir;?>">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label >Tanggal Lahir</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir" value="<?php echo $tanggallahir;?>">
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Murid" rows="4" value="<?php echo $alamat;?>"></textarea>
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
                  <input type="text" name="bapak" placeholder="Masukkan Nama Ayah Murid" class="form-control" value="<?php echo $bapak;?>">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="tgl_lahir">Nama Ibu</label>
                    <input type="text" name="ibu" class="form-control" name="tgl_lahir" placeholder="Masukkan Nama Ibu Murid" value="<?php echo $ibu;?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label name="nilai">Keterangan Nilai </label>
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
                    <label >Tanggal Masuk</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggalmasuk" placeholder="Tanggal Masuk" value="<?php echo $tanggalmasuk;?>">
                  </div>
                  <div class="form-group">
                    <label >Tanggal Lulus</label>
                    <input type="date" id="datepicker" class="form-control" name="tanggalulus" value="<?php echo $tanggalulus;?>">
                  </div>
                  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                
                <button button style="margin-top: 10px;" type="submit" name ="update" class="btn btn-success">SIMPAN</button>
                <button button style="margin-top: 10px;" type="reset"  class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    
       
</body>
</html>