<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

    <div class="container-create">
        <div class="profile-box">
        <div class = "profile-saya">
            <h1> Input Data </h1>
            <br>
        <div class="text">
        <form action="<?=base_url('user/store')?>" method="post">
    <table>
        <tr>
            
            <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama">
            
        </tr>
        <br>
        <tr>
        <input type="text" class="form-control" placeholder="Kelas" aria-label="Kelas" aria-describedby="basic-addon1" name="kelas">

        </tr>
        <br>
        <tr>
        <input type="text" class="form-control" placeholder="NPM" aria-label="NPM" aria-describedby="basic-addon1" name="npm">

        </tr>
        <br>
        <tr>
            <td><input class="btn btn-warning   " type="submit" value="Simpan"></td>
        </tr>
    </form>

        </div>
</div>
    </div>    
</body>
</html>