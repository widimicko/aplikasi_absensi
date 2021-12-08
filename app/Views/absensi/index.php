<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengelolaan Absensi</h1>


  <?php if(session()->getFlashData('tx_success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashData('tx_success_message'); ?>
    </div>
  <?php elseif(session()->getFlashData('tx_error_message')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashData('tx_error_message'); ?>
    </div>
  <?php endif ?>
  <?= view('Myth\Auth\Views\_message_block') ?>

  <!-- DataTales -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Absensi</h6>
      <?= $current ? '<a href="'. base_url('absensi/add').'" class="btn btn-primary">+ Tambah</a>' : '' ?>
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th class="d-none">ID</th>
              <th>Tanggal</th>              
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <?= !$current ? '<th>Semester</th>' : '' ?>
              <th>Absen</th>
              <th>Keterangan</th>
              <?= $current ? '<th>Aksi</th>' : '' ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($absensi as $data) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td class="d-none"><?= $data['id'] ?></td>
                <?php $date = date_create($data['tanggal']); ?>
                <td><?= date_format($date,"D\, d F Y") ?></td>         
                <td><?= $data['nis'] ?></td>            
                <td><?= $data['nama']?></td>         
                <td><?= $data['kelas']?></td>
                <?= !$current ? '<td>'.$data['semester'].'</td>' : '' ?>       
                <td><?= $data['absen']?></td>        
                <td><?= $data['keterangan'] ? $data['keterangan'] : 'Kosong' ?></td>
                <?php 
                  if ($current) {
                    echo '<td>';
                    echo '<a href="'.base_url('absensi/edit/'. $data['id']) .'" class="btn btn-info">Ubah</a>';
                    echo '<a href="'. base_url('absensi/delete/'. $data['id']) .'" class="btn btn-danger">Hapus</a>';
                    echo '</td>';
                  }
                ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>