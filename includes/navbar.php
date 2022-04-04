<!-- <div class="py-1">
  <div class="container">
    <div class="row">

      <div class="col-md-3">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Iamme Blog" class="w-100">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
  <div class="container">

    <a class="navbar-brand" href="<?= base_url('index.php') ?>">Iamme</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">

        <a class="nav-link active" aria-current="page" href="<?= base_url('index.php') ?>">Home</a>

        <div class="dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
            <?php
              $navbarCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0'";
              $navbarCategory_run = mysqli_query($con, $navbarCategory);
              if(mysqli_num_rows($navbarCategory_run) > 0)
              {
                foreach($navbarCategory_run as $navItems)
                {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link text-dark mx-3" href="<?= base_url('category/'.$navItems['slug']) ?>"><?= $navItems['name']; ?></a>
                    <!-- <a class="nav-link text-white" href="category.php?title=<?= $navItems['slug']; ?>"><?= $navItems['name']; ?></a> -->
                  </li>
                  <?php
                }
              }
            ?>
            </a>
          </ul>
          
        </div>

        <a class="nav-link text-white" href="#">About Us</a>

        <?php if(isset($_SESSION['auth_user'])) : ?>
        <div class="dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if($_SESSION['auth_role'] == '1') : ?>
              <li><a href="admin/index.php" class="dropdown-item">Admin Section</a></li>
            <?php endif; ?>
            <?php if($_SESSION['auth_role'] == '2') : ?>
              <li><a href="admin/index.php" class="dropdown-item">Admin Section</a></li>
            <?php endif; ?>
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
              <form action="<?= base_url('allcode.php') ?>" method="POST">
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </div>
        <?php else : ?>
          <a class="nav-link text-white" href="<?= base_url('login.php') ?>">Login</a>
          <a class="nav-link text-white" href="<?= base_url('register.php') ?>">Register</a>
        <?php endif; ?>

      </div>
    </div>

    
  </div>
</nav>