<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container-list">
    <br>
    <div class="data-box">
        <div class="data-mahasiswa">
            <br>
        <h2> Data Mahasiswa </h2>
        </div>
    </div>
    <div class="table-box">
    <div class="tambah-data-box">
        <a class="btn btn-success" href="<?=base_url('/user/create')?>">Tambah</a>
    </div>
    <table class="table1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
		    </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach ($users as $user):
                
            ?>

                
            <tr>
                <td><?= $i?></td>
                
                <td><?= $user['nama']?></td>
                <td><?= $user['npm']?></td>
                <td><?= $user['nama_kelas']?></td>
                <td><?= $user['nama_jurusan']?></td>

                
                <td class="d-flex justify-content">
                    <a href="<?= base_url('user/' . $user['id'])?>" class="btn btn-primary">Detail</a>
                    <br>
                    <a href="<?= base_url('user/' . $user['id'] . '/edit')?>" class="btn btn-warning">Edit</a>
                    <br>
                    <form action="<?= base_url('user/' . $user['id'])?>" method="post">
                        <input type="hidden" name="_method" value="DELETE" class="delete-form">
                        <?= csrf_field()?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
                $i++;
        
            ?>
            <?php endforeach;?>
        </tbody>
		
	</table>
    </div>
</div>

    
    <?= $this->endSection() ?>
