 
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
    $anak = isset($_POST['anak']) ? $_POST['anak'] : '';
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $gol = isset($_POST['gol']) ? $_POST['gol'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    $bapak = isset($_POST['bapak']) ? $_POST['bapak'] : '';
    $ibu = isset($_POST['ibu']) ? $_POST['ibu'] : '';
    $tanggalmasuk = isset($_POST['tanggalmasuk']) ? $_POST['tanggalmasuk'] : '';

    // update user data
    $result = mysqli_query($mysqli, "UPDATE tkb SET nama='$nama', jeniskelamin='$jeniskelamin', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', anak='$anak', hobi='$hobi', alamat='$alamat', gol='$gol', agama='$agama', bapak='$bapak', ibu='$ibu', tanggalmasuk='$tanggalmasuk' WHERE id=$id");

    // Redirect to homepage after update
     if ($result) {
    $message = 'Data berhasil dimasukkan. Klik <a href="tabletkb.php">di sini</a> untuk menuju ke tabel.';
    echo '<div class="notification">' . $message . '</div>';
    $url = 'tabletkb.php';
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
$result = mysqli_query($mysqli, "SELECT * FROM tkb WHERE id=$id");

 if ($result && mysqli_num_rows($result) > 0) {
  while($user_data = mysqli_fetch_array($result))
{   
    $nama = $user_data['nama'];
    $jeniskelamin = $user_data['jeniskelamin'];
    $tempatlahir = $user_data['tempatlahir'];
    $tanggallahir = $user_data['tanggallahir'];
    $anak = $user_data['anak'];
    $hobi = $user_data['hobi'];
    $alamat = $user_data['alamat'];
    $gol = $user_data['gol'];
    $agama = $user_data['agama'];
    $bapak = $user_data['bapak'];
    $ibu = $user_data['ibu'];
    $tanggalmasuk = $user_data['tanggalmasuk'];
}
}
}

?>
<html>
<head>
    <title>Edit User Data</title>
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
<div id="main" class="container">
      <div class="row">
        <div class="col-md-9 offset-md-2">
          <div class="pagetitle">
            <h1>Form Data Murid</h1>

            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                  <li class="breadcrumb-item"><a href="dashboard2.php">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="tabletkb.php">Database</a></li>
                  <li class="breadcrumb-item active">Edit Form</li>

                </ol>
              </nav>
            </div>
          <div class="card">
            <div class="card-body">
              <form action="edittkb.php" method="POST">

                <div class="form-group">
                  <label>Nama Lengkap</label><br>
                  <input type="text" name="nama" placeholder="Masukkan Nama Murid" class="form-control" value="<?php echo $nama;?>">
                </div>
                <div class="form-group">
                    <label >Jenis Kelamin</label><br>
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
                  <label>Tempat Lahir</label><br>
                  <input type="text" name="tempatlahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?php echo $tempatlahir;?>">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label >Tanggal Lahir</label><br>
                    <input type="date" id="datepicker" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir" value="<?php echo $tanggallahir;?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label>Anak Ke -</label><br>
                  <input type="number" name="anak" class="form-control" value="<?php echo $anak; ?>">
                </div>
               <div class="form-group">
                    <label>Hobi</label><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hobi[]" value="Sepak Bola">Sepak Bola
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hobi[]" value="Membaca Buku">Membaca Buku
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hobi[]" value="Berenang">Berenang
                      </label>
                    </div> 
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hobi[]" value="Bermain Alat Musik">Bermain Alat Musik
                      </label>
                    </div> 
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="hobi[]" value="Traveling">Traveling
                      </label>
                    </div> 
                  </div>


                <div class="form-group">
                  <label>Alamat</label><br>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Murid" rows="4" value="<?php echo $alamat;?>"></textarea>
                </div>
                <div class="form-group">
                <label >Golongan Darah </label><br>
                <div><select name="gol" class="form-control select2" style="width: 100%;">
                  <option value="-" <?php if ($gol == '-') echo 'selected'; ?>>---</option>
                  <option value="A" <?php if ($gol == 'A') echo 'selected'; ?>>A</option>
                  <option value="B" <?php if ($gol == 'B') echo 'selected'; ?>>B</option>
                  <option value="AB" <?php if ($gol == 'AB') echo 'selected'; ?>>AB</option>
                  <option value="O" <?php if ($gol == 'O') echo 'selected'; ?>>O</option>
</select>

                </div>
            </div>
                <div class="form-group">
                <label>Agama </label><br>
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
                  <label>Nama Ayah</label><br>
                  <input type="text" name="bapak" placeholder="Masukkan Nama Ayah Murid" class="form-control" value="<?php echo $bapak;?>">
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="tgl_lahir">Nama Ibu</label><br>
                    <input type="text" name="ibu" class="form-control" name="tgl_lahir" placeholder="Masukkan Nama Ibu Murid" value="<?php echo $ibu;?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                    <label for="tgl_lahir">Tanggal Masuk</label><br>
                    <input type="date" id="datepicker" class="form-control" name="tanggalmasuk" placeholder="Tanggal Masuk" value="<?php echo $tanggalmasuk;?>">
                  </div>
                  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                
                <button style="margin-top: 10px;" type="submit" name ="update" class="btn btn-success">SIMPAN</button>
                <button style="margin-top: 10px;" type="reset"  class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    
       
</form>
</body>
</html>
