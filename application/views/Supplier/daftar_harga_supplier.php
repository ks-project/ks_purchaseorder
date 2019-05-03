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
            <nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <span class="nav-link disabled">Barang</span>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?=($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>" href="<?=base_url('supplier'); ?>">Daftar Harga</a>
                    </li>
                </ul>

            </nav>
            <!--/ SIDEBAR -->

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3 pl-4" role="main">                
                
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item active" aria-curent="page">Kelola Harga Barang</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Daftar Harga</h1>
                    <div class="">
                        <!-- <a href="<?=base_url('admin/cetak_laporan_barang');?>" class="btn btn-secondary">Cetak Harga</a> -->
                    </div>
                </div>
                
                
                <!-- NOTIFICATION -->
                <!-- NOTIFICATION::edit_barang -->
                <?php if ($this->session->flashdata('update_id')) { 
                        if (!$this->session->flashdata('update_gagal')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> update harga bahan baku <strong>#<?=$this->session->flashdata('update_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> mengedit data barang <strong>#<?=$this->session->flashdata('update_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>
                <!--/ NOTIFICATION -->


            <?php if(!$barangs) { ?>
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
                                <th>Harga</th>
                                <th>*</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangs as $barang) { ?>
                            <tr>
                                <td><?=$barang['idbarang']; ?></td>
                                <td><?=$barang['nama']; ?></td>
                                <td><?=$barang['kodebarang']; ?></td>
                                <td><?=$barang['harga']; ?></td>
                                <td>
                                    <a href="#" role="button" data-toggle="modal" data-target="#modal_update_harga" data-id="<?=$barang['idbarang']; ?>" data-nama="<?=$barang['idbarang']; ?>">Update Harga</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            </main>
        </div>
    </div>


    <!-- MODAL:: update harga barang -->
    <div class="modal fade" id="modal_update_harga">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Harga Barang #<span class="detail font-bold"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form class="form-inline" id="form_update_harga" method="POST">
                    <label class="mr-sm-2">Harga Barang: </label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="harga" id="harga" placeholder="0" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary modal-action">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- Data Table -->
    <script src="<?=base_url()?>assets/js/datatables.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_update_harga').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);
            var id = btn.data('id');
            var nama = btn.data('nama');
            var modal = $(this);
            var form = modal.find('#form_update_harga');
            form.attr('action', "<?=base_url('supplier/update_harga/') ?>" + id);
            modal.find('.modal-title span.detail').text(`${id}-${nama}`); 
            modal.find('.modal-action').on('click', function() { form.submit(); });
        
        })
    })
  </script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
    </script>
</body>
</html>