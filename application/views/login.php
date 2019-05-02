<!DOCTYPE html>
<html>
<head>
	<title>KartikaSari :: Beranda</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
</head>
<body>
<?php if ($this->session->userdata('id_karyawan')) {
			redirect('dashboard', 'location');
}?>
    <!-- NAVBAR -->
    <?php $this->load->view('partial/navbar.php'); ?>
		<!--/ NAVBAR -->
	
	<!-- LOGIN -->
	<div class="container-fluid p-0">
		<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
			<div class="container form-signin">
				<div class="card card-login mx-auto mt-5">
					<div class="card-header">Sign in</div>
					<div class="card-body">
						<?php if ($this->session->userdata('login-gagal')) {?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>Login gagal!</strong> Masukan ID dan password dengan benar.
							</div>
						<?php } ?>
						<form action="<?=base_url('login/login');?>" method="post">
							<div class="form-group">
							<label for="inputuname">Username</label>
								<div class="form-label-group">
									<input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
								</div>
							</div>
							<div class="form-group">
								<div class="form-label-group">
								<label for="inputPassword">Password</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
								</div>
							</div>
							<input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!--/ LOGIN -->

	
  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

</body>
</html>