<html>
    <body>
      <?php
    include('dashboard.php');
    include 'koneksibootstrap.php';

    ?>
   



    <div id="main" class="container" style="">
      <div class="pagetitle">
      <h1>Data Guru</h1>

            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.php"><i class="bi bi-house-door"></i></a></li>
                  <li class="breadcrumb-item"><a href="dashboard2.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Database</li>
                </ol>
              </nav>
            </div>


<section class="section">
        <div class="col-md-15">
          <div class="card">
            <div class="card-body">
              <a href="guru.php" class="btn btn-md btn-success" style="margin-top: 10px; margin-bottom: 10px;">TAMBAH DATA</a>
              <table class="table table-bordered table-striped" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">IJAZAH</th>
                    <th scope="col">TANGGAL KERJA</th>
                    <th scope="col">AKSI</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('koneksi.php');
                      $id = 101;
                      $result = mysqli_query($mysqli,"SELECT * FROM dataguru");
                      while($user_data = mysqli_fetch_array($result)){
                  ?>

                  <tr>
                      <td><?php echo $id++ ?></td>
                      <td><?php echo $user_data['nama'] ?></td>
                      <td><?php echo $user_data['jeniskelamin'] ?></td>
                      <td><?php echo $user_data['tanggallahir'] ?></td>
                      <td><?php echo $user_data['status'] ?></td>
                      <td><?php echo $user_data['ijazah'] ?></td>
                      <td><?php echo $user_data['tanggalkerja'] ?></td>
                      <td class="text-center">
                        <a href="editguru.php?id=<?php echo $user_data['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="deletedataguru.php?id=<?php echo $user_data['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>


                <?php } ?>
                  

                  

                
                </tbody>
              </table>
            </div>
          </div>
          
        
      </div>
    </div>
  </section>

  </body>
</html>