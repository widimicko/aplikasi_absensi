<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah Absensi</h1>


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

  <div class="card shadow mb-4">
    <div class="card-header p-3">
      Tambah Absensi
    </div>
    <div class="card-body p-3">
      <form action="<?= base_url('/absensi/create') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
          <label>Siswa</label><br>
          <select name="nis" class="select2 form-control <?= session('errors.nis') ? 'is-invalid' : '' ?>" style="width: 100%;">
            <?php foreach ($siswa as $data) : ?>
              <option value="<?= $data['nis'] ?>"><?= $data['nama'] ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.nis') ?>
          </div>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control <?= session('errors.tanggal') ? 'is-invalid' : '' ?>" name="tanggal" required>
          <div class="invalid-feedback">
            <?= session('errors.tanggal') ?>
          </div>
        </div>
        <div class="form-group">
          <label>Absen</label>
          <select name="absen" class="form-control <?= session('errors.abesn') ? 'is-invalid' : '' ?>">
            <option value="Sakit">Sakit</option>
            <option value="Ijin">Ijin</option>
            <option value="Alpha">Alpha</option>
            <option value="Terlambat">Terlambat</option>
          </select>
          <div class="invalid-feedback">
            <?= session('errors.absen') ?>
          </div>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="Opsional"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>