<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atılgan Eğitim Kurumları</title>
    <link rel="icon" href="icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h1 id="logo">Atılgan Eğitim Kurumları</h1>
        <div class="menu-toggle" id="menu-toggle">
            ☰
        </div>
        <div class="mobilnav">
            <ul>
                <li><a href="./index.php" >Anasayfa</a></li>
                <li><a href="./hakkimizda.php">Hakkımızda</a></li>
                <li><a href="./iletisim.php">İletişim</a></li>
                <li><a href="./fotogaleri.php" >Foto Galeri</a></li>
                <li><a href="./mezunlarimiz.php">Mezunlarimiz</a></li>
                <li><a href="./duyurular.php" class="active">Duyurular</a></li>
            </ul>
        </div>
        <div class="box">
            <a href="./index.php" >Anasayfa</a>
            <a href="./hakkimizda.php" >Hakkımızda</a>
            <a href="./iletisim.php">İletişim</a>
            <a href="./fotogaleri.php">Foto Galeri</a>
            <a href="./mezunlarimiz.php">Mezunlarimiz</a>
            <a href="./duyurular.php" class="active">Duyurular</a>
        </div>
    </div>
    <div class="why">
        <h1 class="neden">&nbsp; Duyurular &nbsp;</h1>



        <div class="container mt-5">
    <div class="row">
        <?php
            $myfile = fopen("./admin/duyurular.txt","r");
        ?>
<?php while($satir = fgets($myfile)) :?>
    <?php
        $dilim = explode("|",$satir);
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dilim[0]?></h5>
                    <p class="card-text"><?php echo $dilim[1]?></p>
                </div>
            </div>
        </div>
        <?php endwhile;?>
        <?php
        fclose($myfile);
        ?>













        </div>
    </div>







    </div>
    
    <script src="script.js"></script>
</body>
<footer>
    <p>&copy; 2022 Atılgan Eğitim Kurumları. Tüm Hakları Saklıdır.</p>
  </footer>
</html>