<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        body{
            background-color : #FFEBCD;

        }
    </style>
    <br>
    <h1><center>Profile Saya</center></h1>
    <br>
    <div style="text-align:center;">
        <img src="<?php echo base_url('billa.jpeg'); ?>" alt="billa" style="height: 200px; width: 200px; border-radius: 50%; object-fit: cover;"  border="1.5px" ><br>
        <br>
        <br>
        <button type="button" class="btn btn-outline-warning" style="width: 250px;"><b>Nama : <?= $nama ?></b></button><br><br>
        <button type="button" class="btn btn-outline-warning" style="width: 250px;"><b>Kelas : <?= $kelas ?></b></button><br><br>
        <button type="button" class="btn btn-outline-warning" style="width: 250px;"><b>NPM : <?= $npm ?></b></button><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>