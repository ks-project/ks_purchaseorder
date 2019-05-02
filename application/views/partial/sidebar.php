<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
  <ul class="nav nav-pills flex-column">
		<li class="nav-item">
      <span class="nav-link disabled">Menu</span>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>" href="<?=base_url('dashboard'); ?>">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'daftar_harga') ? 'active' : ''; ?>" href="<?=base_url('dashboard/daftar_harga'); ?>">Daftar Harga</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'pemesanan') ? 'active' : ''; ?>" href="<?=base_url('dashboard/pemesanan'); ?>">Pemesanan</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'daftar_pesanan') ? 'active' : ''; ?>" href="<?=base_url('dashboard/daftar_pesanan'); ?>">Daftar Pesanan</a>
		</li>
	</ul>

</nav>
