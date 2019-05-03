<!DOCTYPE html>
<html>
<head>
	<title>KartikaSari :: Daftar Harga</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    <!-- Data Tables -->
    <link href="<?=base_url()?>assets/css/datatables.min.css" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <?php $this->load->view('partial/navbar.php'); ?>
    <!--/ NAVBAR -->

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <?php $this->load->view('partial/sidebar.php'); ?>
            <!--/ SIDEBAR -->

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3 pl-4" role="main">                
                
                <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Harga</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Daftar Harga</h1>
                </div>

            <?php if (!$barangs) { ?>
                <div class="alert alert-warning" role="alert">
                    Tidak ada barang!
                </div>
            <?php } else { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th># ID Barang</th>
                                <th>Nama</th>
                                <th>Kode Barang</th>
                                <th>Sisa Stock</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangs as $barang) { ?>
                            <tr>
                                <td><?=$barang['idbarang']; ?></td>
                                <td><?=$barang['nama']; ?></td>
                                <td><?=$barang['kodebarang']; ?></td>
                                <td><?=$barang['qty']; ?></td>
                                <td><?=$barang['harga']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- Data Table -->
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>

    <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
    </script>
</body>
</html>