<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Halaman Rekap <?= $kelas ? "(Kelas $kelas)" : '' ?></h1>

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
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Rekap</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable-print" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
              <?= !$kelas ? '<th>Kelas</th>' : '' ?>           
              <th>Sakit</th>
              <th>Ijin</th>
              <th>Alpha</th>
              <th>Terlambat</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($rekap as $data) : ?>
              <tr>              
                <td><?= $i++ ?></td>
                <td><?= $data['nis'] ?></td>         
                <td><?= $data['nama'] ?></td>            
                <?= !$kelas ? "<td>".$data['kelas']."</td>" : '' ?>            
                <td><?= $data['sakit'] ?></td>            
                <td><?= $data['ijin'] ?></td>            
                <td><?= $data['alpha'] ?></td>            
                <td><?= $data['terlambat'] ?></td>            
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