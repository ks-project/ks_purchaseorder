<!DOCTYPE html>
<html>
<head>
	<title>KartikaSari :: Pemesanan</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Pemesanan</h1>
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
                                <th>*</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($proposal as $prop) { ?>
                        <?php if ($prop['status'] == '1'){ ?>
                            <tr>
                                <td><?=$prop['idproposal']; ?></td>
                                <td><?=$prop['judul']; ?></td>
                                <td><?=$prop['status']; ?></td>
                                <td><?=$prop['idbuktilist']; ?></td>
                                <td><?=$prop['deadline']; ?></td>
                                <td><?=$prop['created']; ?></td>
                                <td><?=$prop['idsupplier']; ?></td>
                                <td class="text-center">
                                <a href="#" role="button" data-toggle="modal" data-target="#modal_submit" data-id="<?=$prop['idproposal']; ?>" data-nama="<?=$prop['judul']; ?>">Submit</a>
                                </td>
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

    <!-- MODAL:: submit proposal -->
    <div class="modal fade" id="modal_submit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Proposal #<span class="detail font-bold"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form class="form-inline" id="form_submit" method="POST">
                    <label class="mr-sm-2">Submit Pemesanan?</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="status" id="status" required value="2" hidden>
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