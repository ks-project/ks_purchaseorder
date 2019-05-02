<!DOCTYPE html>
<html>
<head>
	<title>KartikaSari :: Purchase Order</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
</head>
<body>

    <!-- NAVBAR -->
    <?php $this->load->view('partial/navbar.php'); ?>
    <!--/ NAVBAR -->

    <!-- MAIN -->
    <div class="container-fluid">
        <!-- ROW -->
        <div class="row">
            <!-- SIDEBAR -->
            <?php $this->load->view('partial/sidebar.php'); ?>
            <!--/ SIDEBAR -->

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3 pl-4" role="main">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
                    </ol>
                </nav>
                <div class="text-center">
                    <img src="<?=base_url()?>assets/background.png" style="width : 40%;" class="text-center">
                    <br>
                    <br>
                    <br>
                    <h1>Selamat Datang!</h1>

                    <div>
                        <h2> di Kartika Sari - Purchase Order</h2>
                    </div>

                    <p>Kue-kue Kartika Sari® yang menjadi oleh-oleh favorit Anda adalah resep turun-menurun keluarga Ibu Ratnawati yang didapatkan sejak jaman kolonial Belanda.</p>
                </div>
                <!-- NOTIFICATION -->
                <!-- NOTIFICATION::hapus_barang -->
                <?php if ($this->session->flashdata('hapus_id')) { 
                        if ($this->session->flashdata('hapus_berhasil')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menghapus data barang <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menghapus data barang <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!-- NOTIFICATION::tambah_barang -->
                <?php if ($this->session->flashdata('tambah_id')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menambah data barang <strong>#<?=$this->session->flashdata('tambah_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>

                <!-- NOTIFICATION::edit_barang -->
                <?php if ($this->session->flashdata('edit_id')) { 
                        if (!$this->session->flashdata('edit_gagal')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> mengedit data barang <strong>#<?=$this->session->flashdata('edit_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> mengedit data barang <strong>#<?=$this->session->flashdata('edit_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!-- NOTIFICATION::tambah_stok_barang -->
                <?php if ($this->session->flashdata('tambah_stok_id')) { 
                        if ($this->session->flashdata('tambah_stok_berhasil')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menambah stok barang <strong>#<?=$this->session->flashdata('tambah_stok_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menambah barang <strong>#<?=$this->session->flashdata('tambah_stok_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!--/ NOTIFICATION -->


                
        </div>
        <!--/ ROW -->
    </div>
    <!--/ MAIN -->
  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_konfirmasi_hapus').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);

            var modal = $(this);
            modal.find('.modal-title span.detail').text(`${btn.data('id')}-${btn.data('nama')}`);
            modal.find('.modal-action').attr('href', `<?=base_url()?>admin/hapus_barang/${btn.data('id')}`);
        });
        $('#modal_tambah_stok').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);
            var id = btn.data('id');
            var nama = btn.data('nama');
            var modal = $(this);
            var form = modal.find('#form_tambah_stok');
            form.attr('action', "<?=base_url('admin/tambah_stok_barang/') ?>" + id);
            modal.find('.modal-title span.detail').text(`${id}-${nama}`); 
            modal.find('.modal-action').on('click', function() { form.submit(); });
        
        })
    })
  </script>
</body>
</html>