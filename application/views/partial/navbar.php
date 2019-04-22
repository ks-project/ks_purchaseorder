
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Kartika Sari</a>
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
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="<?=base_url('profil/edit_profil'); ?>" class="nav-link">
            <?php echo "ILHAM IBNU PURNOMO" ?>
            <span class="badge badge-primary"> ADMEN </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('logout')?>">Logout</a>
        </li>
      </ul>
    </div>
  </nav>