<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Lanjut</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=base_url()?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?=base_url('user')?>">Mahasiswa</a>
      <a class="nav-item nav-link" href="<?=base_url('kelas')?>">Kelas</a>
      <a class="nav-item nav-link" href="<?=base_url('jurusan')?>">Jurusan</a>
    </div>
  </div>
    <!-- <a class="navbar-brand" href="<?= base_url('user')?>">Mahasiswa</a>
    <a class="navbar-brand" href="<?= base_url('kelas')?>">Kelas</a>
    <a class="navbar-brand" href="<?= base_url('jurusan')?>">Jurusan</a> -->


  
    </nav>

    <!-- <header>
         <a href="<?=base_url()?>" class="logo"><img src="<?=base_url('assets/img/travelgo.png')?>"></a>

         <ul class="navmenu">
             <li><a href="index.php">Home</a></li>
             <li><a href="view.php">View Bus Schedule</a></li>
         </ul>

         <div class="nav-icon">
             <a href="login.php" class="btn">Login As Admin</a>
             <div class="bx bx-menu" id="menu-icon"></div>
         </div>
     </header> -->

    <?= $this->renderSection('content') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>