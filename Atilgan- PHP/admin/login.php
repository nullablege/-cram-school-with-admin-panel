<?php
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = input_control($_POST['username']);
    $password = input_control($_POST['password']);
    authcontrol($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Girişi</title>
</head>
<body>
    <h1><center>Atılgan Eğitim Kurumları Yetkili Girişi</center></h1>
    <div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Kullanıcı Adı</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Şifre</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <center><input type="submit" name="login" value="Giriş" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>
