<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container-list">
    <br>
    <div class="data-box">
        <div class="data-mahasiswa">
            <br>
        <h2> Data Kelas </h2>
        </div>
    </div>
    <div class="table-box">
    <div class="tambah-data-box">
        <a class="btn btn-success" href="<?=base_url('/kelas/create')?>">Tambah</a>
    </div>
    <table class="table1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
		    </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach ($kelas as $kelas):
                
            ?>

                
            <tr>
                <td><?= $i?></td>
                <td><?= $kelas['nama_kelas']?></td>
                
                <td class="d-flex justify-content">
                    <a href="<?= base_url('kelas/' . $kelas['id'] . '/edit')?>" class="btn btn-warning">Edit</a>
                    <form action="<?= base_url('kelas/' . $kelas['id'])?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <?= csrf_field()?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <!-- <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Hapus</button> -->
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
