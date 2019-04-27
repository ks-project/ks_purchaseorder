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


        </div>
        <!--/ ROW -->
    </div>
    <!--/ MAIN -->




  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

</body>
</html>