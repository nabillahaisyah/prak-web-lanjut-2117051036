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
            <h1> Input Profile </h1>
            <br>
        <div class="text">
        <form action="<?=base_url('user/store')?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            
        <div class="input-group mb-3">
            <div class="custom-file">
                <label for="label-foto">
                <input type="file" class="form-control" id="foto" placeholder="Foto" aria-label="Foto" aria-describedby="basic-addon1" name="foto">
                </label>
            </div>
        </div>
        </tr>
        <tr>
            
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" required>
            <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
            </div>
            
        </tr>
        <br>
        <tr>
        <select class="form-select" aria-label="Default select example" id="kelas" name="kelas" required placeholder="Kelas">
                    <option selected>Kelas</option>
                    <?php foreach($kelas as $item):?>
                        <option value="<?=$item['id']?>"><?=$item['nama_kelas']?></option>
                    <?php endforeach;?>
                </select>
        </tr>
        <br>
        <tr>
        <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan" required placeholder="Jurusan">
                    <option selected>Jurusan</option>
                    <?php foreach($jurusan as $item):?>
                        <option value="<?=$item['id']?>"><?=$item['nama_jurusan']?></option>
                    <?php endforeach;?>
                </select>
        </tr>
        <br>
        <tr>
            <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" placeholder="NPM" aria-label="NPM" aria-describedby="basic-addon1" name="npm" required>
            <div class="invalid-feedback">
            <?= $validation->getError('npm') ?>
            </div>
        </tr>
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