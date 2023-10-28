<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

    <div class="container-edit">
        <div class="profile-box">
        <div class = "profile-saya">
            <h1> Edit Jurusan </h1>
            <br>
        <div class="text">
        <form action="<?=base_url('jurusan/' . $jurusan['id'])?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field()?>
    <table>
        <tr></tr>
        <tr>
            
            <input type="text" class="form-control <?= ($validation->hasError('nama_jurusan')) ? 'is-invalid' : ''; ?>" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama_jurusan" value="<?= $jurusan['nama_jurusan']?>" required>
            <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
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