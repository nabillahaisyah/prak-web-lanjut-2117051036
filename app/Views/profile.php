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
            <img src="<?=base_url('assets/img/billa.jpeg')?>" class = "profile-pic" >
        <div class="text">
            <p>Nama : <?= $nama ?></p>
            <p>Kelas : <?= $kelas ?></p>
            <p>NPM : <?= $npm ?></p>
            <br>
            <div class="social-media">
                <a href="https://instagram.com/nabillahasyh">
                    <img src="<?=base_url('assets/img/instagram.png')?>" class ="instagram-icon">
                </a>
                <a href="https://youtube.com/@nabillahaisyah1840">
                    <img src="<?=base_url('assets/img/youtube.png')?>" class ="youtube-icon">
                </a>
                <a href="https://github.com/nabillahaisyah">
                    <img src="<?=base_url('assets/img/github.png')?>" class ="github-icon">
                </a>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>