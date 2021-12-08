<?= $this->extend('templates/index') ?>


<?= $this->section('page-content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengelolaan Semester</h1>

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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Semester</h6>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createModal">+ Tambah</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="tableData table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th class="d-none">ID</th>
              <th>Semester</th>              
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($semester as $data) : ?>
              <tr>              
                <td><?= $i++ ?></td>
                <td class="d-none"><?= $data['id'] ?></td>         
                <td><?= $data['semester'] ?></td>         
                <td><?= $data['status'] == 'aktif' ? '<div class="alert alert-success">Aktif</div>' : '<div class="alert alert-warning">Tidak Aktif</div>' ?></td>         
                <td>
                  <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal">Ubah</a>
                  <a href="<?= base_url('semester/delete/'. $data['id']) ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Create Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('/Semester/create') ?>" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Tambah Semester</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?= csrf_field() ?>
          <div class="form-group">
            <label>NIS</label>
            <input type="number" class="form-control" name="nis" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label>Kelas (1 Sampai 6)</label>
            <input type="number" class="form-control" name="kelas" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="editForm" method="POST">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Semester</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <?= csrf_field() ?>
            <div class="form-group">
              <label>NIS</label>
              <input type="number" id="input-nis" class="form-control" name="nis" required>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" id="input-nama" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
              <label>Kelas (1 Sampai 6)</label>
              <input type="number" id="input-kelas" class="form-control" name="kelas" required>
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </div>
    </form>
  </div>
</div>

<script>
  // Table onRowClick event
  const table = document.querySelector(".tableData")

  if (table) {
    for (let i = 0; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        getDataRow(this)
      }
    }
  }

  function getDataRow(tableRow) {
    // Get row data
    const id = tableRow.childNodes[3].innerHTML
    const semester = tableRow.childNodes[5].innerHTML
    const status = tableRow.childNodes[7].innerHTML

    // set to modal
    document.getElementById('editForm').setAttribute('action', `${window.location.origin}/semester/update/${id}`)
    document.getElementById('input-nis').setAttribute("value", nis)
    document.getElementById('input-nama').setAttribute("value", nama)
    document.getElementById('input-kelas').setAttribute("value", kelas)
  }
</script>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>