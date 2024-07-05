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
                <li><a href="./fotogaleri.php" class="active">Foto Galeri</a></li>
                <li><a href="./mezunlarimiz.php">Mezunlarimiz</a></li>
                <li><a href="./duyurular.php">Duyurular</a></li>
            </ul>
        </div>
        <div class="box">
            <a href="./index.php" >Anasayfa</a>
            <a href="./hakkimizda.php">Hakkımızda</a>
            <a href="./iletisim.php">İletişim</a>
            <a href="./fotogaleri.php" class="active">Foto Galeri</a>
            <a href="./mezunlarimiz.php">Mezunlarimiz</a>
            <a href="./duyurular.php">Duyurular</a>
        </div>
    </div>
    <div class="galeri">
        <?php
            $myfile = fopen("./admin/fotogaleri.txt","r");
            $fotolist = [];
            while($satir = fgets($myfile)){
                //foto-uzantisi | acıklama
                $dilimler = explode("|",$satir);
                array_push($fotolist,[$dilimler[0],$dilimler[1]]);
            }
            fclose($myfile);
        ?>
    <?php  foreach($fotolist as $foto): ?> 

                <div class="card">
                <img src=<?php echo $foto[0]?> alt="">
                <h2><?php echo $foto[1]?></h2>
            </div>
            <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
<footer>
    <p>&copy; 2022 Atılgan Eğitim Kurumları. Tüm Hakları Saklıdır.</p>
  </footer>
</html>