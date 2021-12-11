<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem E-Arsip DLH Kota Madiun">
    <meta name="author" content="Pengembang DLH Kota Madiun">
    <link rel="icon" href="<?= base_url('image/logo_kemenag.png') ?>">
   

    <title>Aplikasi Absensi MI PSM AL AMIN SUMBERAGUNG | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/library/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Data tables-->
    <link href="<?= base_url() ?>/library/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Select Search -->
    <link href="<?= base_url() ?>/library/select2/select2.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/library/sb-admin/sb-admin-2.min.css" rel="stylesheet">

  </head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('templates/sidebar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('templates/topbar') ?>

                <?= $this->renderSection('page-content') ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MI PSM AL AMIN SUMBERAGUNG <?= date("Y") ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar sistem?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan tekan tombol "Keluar" untuk konfirmasi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('logout') ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/library/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/library/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/library/jquery/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/library/sb-admin/sb-admin-2.min.js"></script>

    <!-- Data Tables -->
    <script src="<?= base_url() ?>/library/datatable/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/library/datatable/dataTables.bootstrap4.min.js"></script>

    <!-- Select Search -->
    <script src="<?= base_url() ?>/library/select2/select2.full.min.js"></script>

    <!-- Library init Script -->
    <script src="<?= base_url() ?>/script/library.init.js"></script>

  </body>
</html>