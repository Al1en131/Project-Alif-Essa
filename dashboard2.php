<?php
include 'dashboard.php';
include 'koneksibootstrap.php';


?>

<section id="main" class="section" style="margin-top: 80px;">
  <div class="pagetitle">
      <h1>Dashboard</h1>

            <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
          <li class="breadcrumb-item active">Dashboard</li>

                </ol>
              </nav>
            </div>
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 style="margin-top: 15px;"><a href="tabletka.php">Data TK A</a></h2><br>
              <p>Berisi Data Murid yang berada di TK A. Data dilengkapi dengan biodata masing-masing murid, baik dari data nama sampai tanggal masuk sekolah </p>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 style="margin-top: 15px;"><a href="tabletkb.php">Data TK B</a></h2><br>
              <p>Berisi Data Murid yang berada di TK B. Data dilengkapi dengan biodata masing-masing murid, baik dari data nama sampai tanggal masuk sekolah </p>
            </div>
          </div>
        </div>
    
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 style="margin-top: 15px;"><a href="tableguru.php">Data Pengajar</a></h2><br>
              <p>Berisi Data Guru yang mengajar di Taman Kanak-Kanak Alien. Data dilengkapi dengan biodata masing-masing Pengajar di Taman Kanak-Kanak Alien </p>
            </div>
          </div>

        </div>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 style="margin-top: 15px;"><a href="tablepegawai.php">Data Pegawai</a></h2><br>
              <p>Berisi Data Pegawai yang bekerja di Taman Kanak-Kanak Alien. Data dilengkapi dengan biodata masing-masing Pegawai di Taman Kanak-Kanak Alien </p>
            </div>
          </div>

        </div>
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h2 style="margin-top: 15px;"><a href="tablekelulusan.php">Data Kelulusan</a></h2><br>
              <p>Berisi Data Murid Taman Kanak-Kanak Alien yang telah lulus. Data dilengkapi dengan biodata masing-masing anak yang mana yang paling penting di sini adalah menyertakan tanggal masuk dan tanggal kelulusan </p>
            </div>
          </div>

        </div>
      </div>
    </section>