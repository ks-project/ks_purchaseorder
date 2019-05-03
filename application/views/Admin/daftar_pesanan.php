<!DOCTYPE html>
<html>
<head>
	<title>KartikaSari :: Daftar Pesanan</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Daftar Pesanan</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Daftar Pesanan</h1>
                </div>

                <!-- NOTIFICATION -->
                <!-- NOTIFICATION::edit_barang -->
                <?php if ($this->session->flashdata('submit_id')) { 
                        if (!$this->session->flashdata('submit_gagal')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> melakukan pemesanan bahan baku <strong>#<?=$this->session->flashdata('submit_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> memesan bahan baku <strong>#<?=$this->session->flashdata('submit_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>
                <!--/ NOTIFICATION -->
            <?php if (!$proposal) { ?>
                <div class="alert alert-warning" role="alert">
                    Tidak ada barang!
                </div>
            <?php } else { ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th># ID Proposal</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>ID Bukti List</th>
                                <th>Deadline</th>
                                <th>Created</th>
                                <th>ID Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($proposal as $prop) { ?>
                        <?php if ($prop['status'] == '2'){ ?>
                            <tr>
                                <td><?=$prop['idproposal']; ?></td>
                                <td><?=$prop['judul']; ?></td>
                                <td><?=$prop['status']; ?></td>
                                <td><?=$prop['idbuktilist']; ?></td>
                                <td><?=$prop['deadline']; ?></td>
                                <td><?=$prop['created']; ?></td>
                                <td><?=$prop['idsupplier']; ?></td>
                            </tr>
                        <?php } ?>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_submit').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);
            var id = btn.data('id');
            var nama = btn.data('nama');
            var modal = $(this);
            var form = modal.find('#form_submit');
            form.attr('action', "<?=base_url('dashboard/submitproposal/') ?>" + id);
            modal.find('.modal-title span.detail').text(`${id}-${nama}`); 
            modal.find('.modal-action').on('click', function() { form.submit(); });
        
        })
    })
  </script>
</body>
</html>