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
                <li><a href="./hakkimizda.php" >Hakkımızda</a></li>
                <li><a href="./iletisim.php" >İletişim</a></li>
                <li><a href="./fotogaleri.php" >Foto Galeri</a></li>
                <li><a href="./mezunlarimiz.php" class="active">Mezunlarimiz</a></li>
                <li><a href="./duyurular.php">Duyurular</a></li>
            </ul>
        </div>
        <div class="box">
            <a href="./index.php">Anasayfa</a>
            <a href="./hakkimizda.php">Hakkımızda</a>
            <a href="./iletisim.php">İletişim</a>
            <a href="./fotogaleri.php">Foto Galeri</a>
            <a href="./mezunlarimiz.php" class="active">Mezunlarimiz</a>
            <a href="./duyurular.php">Duyurular</a>
        </div>
    </div>

    <h1 class="mezunh1">2023/2024 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/2324mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>

    <h1 class="mezunh1">2022/2023 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/2223mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>

    <h1 class="mezunh1">2021/2022 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/2122mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>
    

    <h1 class="mezunh1">2020/2021 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/2021mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>


    <h1 class="mezunh1">2019/2020 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/1920mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>


    <h1 class="mezunh1">2018/2019 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/1819mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>


    <h1 class="mezunh1">2017/2018 Mezunlarımız</h1><br>

    <table>
        <tr>
            <th>İsim</td>
            <th>Soyisim</th>
            <th>Bölüm</th>
            <th>Kazandığı Okul</th>
            <th>Kazandığı Bölüm</th>
            <th>Sıralama</th>
        </tr>
        <?php
            $myfile = fopen("admin/1718mezun.txt","r");
        ?>
        <?php while($satir = fgets($myfile)):?>
            <?php
                $dilimler = explode("|",$satir);
            ?>
        <tr>
            <td><?php echo $dilimler[0]?></td>
            <td><?php echo $dilimler[1]?></td>
            <td><?php echo $dilimler[2]?></td>
            <td><?php echo $dilimler[3]?></td>
            <td><?php echo $dilimler[4]?></td>
            <td><?php echo $dilimler[5]?></td>
        </tr>
        <?php endwhile; ?>
        <?php fclose($myfile)?>

    </table>
 
    <script src="script.js"></script>
</body>
<footer>
    <p>&copy; 2022 Atılgan Eğitim Kurumları. Tüm Hakları Saklıdır.</p>
  </footer>
</html>