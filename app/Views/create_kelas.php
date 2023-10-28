<!-- <!DOCTYPE html>
<html lang="en"> -->
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head> -->
<!-- <body> -->

<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

    <div class="container-create">
        <div class="profile-box">
        <div class = "profile-saya">
            <h1> Input Kelas </h1>
            <br>
        <div class="text">
        <form action="<?=base_url('kelas/store')?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            
            <input type="text" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ''; ?>" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama_kelas" required>
            <div class="invalid-feedback">
                    <?= $validation->getError('nama_kelas') ?>
            </div>
            
        </tr>
        <br>
        <br>
        <tr>
            <td><div class="col text-center"> <button class="btn btn-warning" type="submit" value="Simpan">Simpan</button></div></td>
        </tr>
    </form>

            </div>
        </div>
    </div>   
 <?= $this->endSection() ?>
    

<!-- </body>
</html> -->