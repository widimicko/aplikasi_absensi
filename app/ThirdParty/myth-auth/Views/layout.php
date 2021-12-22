<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('image/logo_kemenag.png') ?>">
    

    <title>Aplikasi Absensi MI PSM AL AMIN SUMBERAGUNG</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>/library/auth/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 5rem;
        }
    </style>
    
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

<?= view('Myth\Auth\Views\_navbar') ?>

<main role="main" class="container">
	<?= $this->renderSection('main') ?>
</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url() ?>/library/auth/jquery.slim.min.js"></script>
<script src="<?= base_url() ?>/library/auth/popper.min.js"></script>
<script src="<?= base_url() ?>/library/auth/bootstrap.min.js"></script>

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
