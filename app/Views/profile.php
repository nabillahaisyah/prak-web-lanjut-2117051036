<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,100&display=swap" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="profile-box">
        <div class = "profile-saya">
            <h1> My Profile </h1>
            <img src="<?= $user['foto'] ?? 'assets/img/default-foto.png'?>" class = "profile-pic" >
        <div class="text">
            <p>Nama : <?= $user['nama'] ?></p>
            
            <p>Kelas : <?= $user['nama_kelas']?></p>
            <p>NPM : <?= $user['npm']?></p>
            <br>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>