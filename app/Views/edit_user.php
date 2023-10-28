<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

    <div class="container-edit">
        <div class="profile-box">
        <div class = "profile-saya">
            <h1> Edit Profile </h1>
            <br>
        <div class="text">
        <form action="<?=base_url('user/' . $user['id'])?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field()?>
    <table>
        <tr>
            
        <div class="input-group mb-3">
            <div class="custom-file">
                <label for="label-foto">
                <div class="profile-saya">
                    <img src="<?= $user['foto'] ?? '<default-foto>' ?>" class="profile-pic">
                </div>
                <br>
                <input type="file" class="form-control" id="foto" placeholder="Foto" aria-label="Foto" aria-describedby="basic-addon1" name="foto" value="<?= $user['foto']?>"> 
                </label>
            </div>
        </div>
        </tr>
        <tr></tr>
        <tr>
            
            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" value="<?= $user['nama']?>" required>
            <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
            </div>
            
        </tr>
        <br>
        <tr>
        
        <select class="form-select" aria-label="Default select example" id="kelas" name="kelas" required placeholder="Kelas">
                    <option>Kelas</option>
                    <?php foreach($kelas as $item):?>
                        <option value="<?=$item['id']?>"<?= $item['id'] == $user['id_kelas'] ? "selected = 'selected'" : ""?>><?=$item['nama_kelas']?></option>
                    <?php endforeach;?>
                </select>
        </tr>
        <br>
        <tr>
        <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan" required placeholder="Jurusan">
                    <option>Jurusan</option>
                    <?php foreach($jurusan as $item):?>
                        <option value="<?=$item['id']?>"<?= $item['id'] == $user['id_jurusan'] ? "selected = 'selected'" : ""?>><?=$item['nama_jurusan']?></option>
                    <?php endforeach;?>
                </select>
        </tr>
        <br>
        <tr>
            <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" placeholder="NPM" aria-label="NPM" aria-describedby="basic-addon1" name="npm" value="<?= $user['npm']?>" required>
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