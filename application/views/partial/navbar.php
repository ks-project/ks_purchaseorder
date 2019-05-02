
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/logo-ks-gold.png" height="35px" width="170px" /></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
   <!--    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>
      </ul> -->
      <?php if (!$this->session->userdata('iduser')) { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <span class="nav-link">
            Purchase Order
          </span>
        </li>
      </ul>
      <?php } else { ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="#" class="nav-link">
            <?php echo $this->session->userdata('nama') ?>
            <?php if ($this->session->userdata('role') == '1') { ?>
            <span class="badge badge-primary"> ADMIN </span>
            <?php } else { ?>
              <span class="badge badge-primary"> SUPPLIER </span>
            <?php } ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('logout')?>">Logout</a>
        </li>
      </ul>
      <?php } ?>
    </div>
  </nav>