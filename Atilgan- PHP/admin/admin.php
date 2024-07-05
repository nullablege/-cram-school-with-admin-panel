<?php
require "functions.php";
tekrarlicagri();
    if(!isset($_COOKIE['login'])){
        header("location:login.php");
        echo'<div class="alert alert-danger">Giriş Yapmadan Sayfaya Erişemezsin.!</div>';
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kullaniciekle'])){
       if($_COOKIE['login'] == 'muratatilgan')  {
        $uname = input_control($_POST['kusername']);
        if(kullaniciKontrol($uname)){
            
            $pwd = input_control($_POST['kayitpassword']);
            $myfile = fopen("adminbilgileri.txt","a");
            $str = $uname."|".$pwd."\n";
            fwrite($myfile,$str);
            fclose($myfile);
            logkaydi($_COOKIE['login'],$uname."Yeni Kullanıcı Kaydi");
            echo "<div class='alert alert-succes text-center mb-0'>Kayit İslemi Basariyla Tamamlanmistir.</div>";
        }
        else{
            
            echo "<div class='alert alert-danger text-center mb-0'>Aynı kullanıcı adından daha önce var olduğu için kayıt tamamlanamadı.</div>";
        }
       }
       else{
        echo "<div class='alert alert-danger text-center mb-0'>Bu işlemi sadece Murat ATILGAN yapabilir</div>";

       }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mezunkaydet'])){
        //<!--isim|soyisim|alan|okul|bölüm|sıralama-->
        $dosyaadi = $_POST['mezunsenesi']."mezun.txt";
        $myfile = fopen($dosyaadi,"a");
        $myfile2 = fopen($dosyaadi,"r");
        $myfile3 = fopen("log.txt","a");
        $isim = input_control($_POST['isim']);
        $soyisim = input_control($_POST['soyisim']);
        $alan = input_control($_POST['alan']);
        $siralama = "Türkiye ".$alan." ".input_control($_POST['siralama']).".";
        if(ogrenciKontrol($isim,$soyisim,$siralama,$dosyaadi)){
            
            $okul = input_control($_POST['okul']);
            $bolum = input_control($_POST['bolum']);
            $str = $isim."|".$soyisim."|".$alan."|".$okul."|".$bolum."|".$siralama."\n";
            fwrite($myfile,$str);
            echo "<div class='alert alert-success'>Basariyla Ogrenci Kaydi Yapilmistir.</div>";
            logkaydi($_COOKIE['login'],"Basarili Mezun Kaydi");
        }
        else{
            echo "<div class='alert alert-success'>Ayni Senede Ayni isim soyisme sahip ayni siralamadaki mezun olamaz.</div>";
            logkaydi($_COOKIE['login'],"Basarisiz Mezun Kaydi");
        }

        fclose($myfile3);
        fclose($myfile2);
        fclose($myfile);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mezunsil'])){
        $mezunsenesi = $_POST['silinecekmezunsenesi'];
        $dosyaadi = $mezunsenesi."mezun.txt";
        $silincekmezun = $_POST['silinecekmezunsirasi'];
        deleteLineFromFile($dosyaadi,$silincekmezun);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['fotoekle'])){
        //./image/s1.jpeg|ATILGAN EĞİTİM KURUMLARI
        $dosyayolu = "../admin/image/".md5(time()).$_FILES['foto']['name'];
        $aciklama = input_control($_POST['aciklama']);
            if(empty($aciklama))
                $aciklama = "ATILGAN EĞİTİM KURUMLARI";
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$dosyayolu)){
            $myfile = fopen("fotogaleri.txt","a");
            fwrite($myfile,ltrim($dosyayolu,'./')."|".$aciklama."\n");
            fclose($myfile);
        }
        else{
            echo "<div class='alert alert-danger text-center mb-0'>Dosya kaydedilirken bir problem oldu. Geliştiriciyle iletişime geçin !!!</div>";
        }

    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fotosil'])){
        print_r($_POST['sira']);
        if(deleteLineFromFile("fotogaleri.txt",$_POST['sira']))
        logkaydi($_COOKIE['login'],"Basarili Sekilde Foto - Galeri Sildi");
        else{
            echo "<div class='alert alert-danger text-center mb-0'>Dosya kaydedilirken bir problem oldu. Geliştiriciyle iletişime geçin !!!</div>";
            logkaydi($_COOKIE['login'],"Başarısız Foto - Galeri Silme Girişimi");
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['yilekle'])){
        $baslangicyil = input_control($_POST['basyil']);
        $sonyil = input_control($_POST['sonyil']);
        $dosyaadi = $baslangicyil.$sonyil."mezun.txt";
        $myfile = fopen($dosyaadi,"a");
        fclose($myfile);
        logkaydi($_COOKIE['login'],$dosyaadi." Olusumu / Yil olusumu");
    }
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['duyuruekle'])){
        $baslik = input_control($_POST['duyurubaslik']);
        $aciklama = input_controL($_POST['duyuruaciklama']);
        $myfile = fopen("duyurular.txt","a");
        $str = $baslik."|".$aciklama."\n";
        fwrite($myfile,$str);
        fclose($myfile);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['duyurukaldir'])){
        deleteLineFromFile('duyurular.txt',$_POST['duyurusira']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atilgan Eğitim - Yetkili</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>   
    

<div class="alert alert-danger text-center mb-0">SAYFAYI YENİLEMEYİNİZ. BURADA YAPILAN İŞLEMLER KRİTİK ÖNEM TAŞIDIĞI İÇİN SAYFAYI YENİLEMENİZ BU İŞLEMLERİN KAYBINA YOL AÇABİLİR.</div>

<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-secondary " type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo "Hosgeldin, ".$_COOKIE['login'];?>
                </button>
                <button class="btn btn-secondary " type="button" id="cyap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Çıkış Yap
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Ayarlar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Çıkış Yap</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Duyuru Kaldır -->

     <div class="container mt-5 my-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <center><h2>Duyuru Kaldır</h2></center> 
                    <form method="POST">
                        <label for="duyurubaslik" class="form-label">Silinecek Duyurunun Numarasını Seç :</label>
                        <select name="duyurusira" class="form-select form-select-lg mb-3" aria-label="Large select example">
                            <option selected>Silmek İstediğiniz Duyuru Başlığını Seçiniz :</option>
                            <?php
                            $duyurular = file("duyurular.txt");
                            foreach ($duyurular as $key => $satir) {
                                $dilim = explode("|", $satir);
                                echo '<option value="' . ($key + 1) . '">' . htmlspecialchars($dilim[0]) . '</option>';
                            }
                            ?>
                        </select>

                        <center><input type="submit" name="duyurukaldir" value="Duyuru Kaldır" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>


     <!-- Duyuru Ekle -->

     <div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Duyuru Ekle</h2> </center> 
                        <form  method="POST" >
                            <div class="mb-3">
                                <label for="duyurubaslik" class="form-label">Duyuru Başlığı</label>
                                <input type="text" class="form-control" name="duyurubaslik" id="duyurubaslik" required>
                            </div>
                            <div class="mb-3">
                                <label for="duyuruaciklama" class="form-label">Duyuru Açıklaması :</label>
                                <input type="text" class="form-control" name="duyuruaciklama" id="duyuruaciklama">
                            </div>

                            <center><input type="submit" name="duyuruekle" value="Duyuru Ekle" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
     

    <!-- Eğitim - Öğretim Yılı Ekleme

    <div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Yeni Eğitim Öğretim Yılı Ekleme</h2> </center> 
                        <form  method="POST" >

                            <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Baslangic Yili ( Örneğin : 23 )</span>
                            <input type="number" name="basyil" class="form-control" placeholder="Baslangic Yil" aria-label="basyil" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                            <span class="input-group-text " id="basic-addon1" >Bitis Yili ( Örneğin : 24 ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="number" name="sonyil" class="form-control" placeholder="Son Yil" aria-label="sonyil" aria-describedby="basic-addon1">
                            </div>

                            <center><input type="submit" name="yilekle" value="Eğitim - Öğretim Yılı Ekle" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div> -->

    <!--Foto Galeriden Fotoğraf Kaldır-->
    <div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Foto Galeriden Fotoğraf Kaldır</h2> </center> 
                        <form  method="POST" >
                            <div class="mb-3">
                                <label for="sira" class="form-label">Kaçıncı Fotoğraf Olduğunu Seçin :</label>
                                <select name="sira" class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected>Kaçıncı Fotoğrafı Silmek İstediğinizi Seçin :</option>
                                    <?php
                                        $sayi = satirSay("fotogaleri.txt");
                                    ?>
                                    <?php for($i = 1;$i<=$sayi;$i++):?>
                                    <option value=<?php echo $i?>><?php echo $i?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <center><input type="submit" name="fotosil" value="Fotoğraf Kaldır" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!--Foto Galeriye Fotoğraf Ekle-->
<div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Foto Galeriye Fotoğraf Ekle</h2> </center> 
                        <form  method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Fotoğrafı Buraya Ekleyin.</label>
                                <input type="file" class="form-control" name="foto" id="foto" required>
                            </div>
                            <div class="mb-3">
                                <label for="aciklama" class="form-label">Fotoğraf Açıklaması :</label>
                                <input type="text" class="form-control" name="aciklama" id="aciklama">
                            </div>

                            <center><input type="submit" name="fotoekle" value="Fotoğraf Ekle" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!--Mezun Kaldir-->
<div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Mezun Kaldir</h2> </center> 
                        <form  method="POST">

                            <div class="mb-3">
                                <label for="silinecekmezunsirasi" class="form-label">Kaçıncı Sıradaki Mezunu Silmek İstiyorsunuz ?</label>
                                <input type="number" class="form-control" name="silinecekmezunsirasi" id="silinecekmezunsirasi" required>
                            </div>
                            <div class="mb-3">
                            <label for="silinecekmezunsenesi" class="form-label">Silinecek Mezun Senesi</label>
                            <select name="silinecekmezunsenesi" class="form-select" aria-label="Default select example">
                            <option value="1718">2017 - 2018</option>
                            <option value="1819">2018 - 2019</option>    
                            <option value="1920">2019 - 2020</option>
                                <option value="2021">2020 - 2021</option>
                                <option value="2122">2021 - 2022</option>
                                <option value="2223">2022 - 2023</option>
                                <option value="2324">2023 - 2024</option>
                            </select>
                            </div>
                            <center><input type="submit" name="mezunsil" value="Mezun Kaldır" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
<!--isim|soyisim|alan|okul|bölüm|sıralama-->
<!--Mezun Ekle-->
<div class="container mt-5 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <center><h2>Mezun Ekleme</h2> </center> 
                        <form  method="POST">
                            <div class="mb-3">
                                <label for="isim" class="form-label">İsim</label>
                                <input type="text" class="form-control" name="isim" id="isim" required>
                            </div>
                            <div class="mb-3">
                                <label for="soyisim" class="form-label">Soyisim</label>
                                <input type="text" class="form-control" name="soyisim" id="soyisim" required>
                            </div>
                            <div class="mb-3">
                            <label for="alan" class="form-label">Alan</label>
                            <select name="alan" class="form-select" aria-label="Default select example">
                                <option value="Sayısal">Sayısal</option>
                                <option value="Eşit Ağırlık">Eşit Ağırlık</option>
                                <option value="Sözel">Sözel</option>
                                <option value="Dil">Dil</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="okul" class="form-label">Kazandığı Okul</label>
                                <input type="text" class="form-control" name="okul" id="okul" required>
                            </div>
                            <div class="mb-3">
                                <label for="bolum" class="form-label">Kazandığı Bölüm</label>
                                <input type="text" class="form-control" name="bolum" id="bolum" required>
                            </div>
                            <div class="mb-3">
                                <label for="siralama" class="form-label">Sıralama</label>
                                <input type="number" class="form-control" name="siralama" id="siralama" required>
                            </div>
                            <div class="mb-3">
                            <label for="mezunsenesi" class="form-label">Mezun Senesi</label>
                            <select name="mezunsenesi" class="form-select" aria-label="Default select example">
                            <option value="1718">2017 - 2018</option>
                            <option value="1819">2018 - 2019</option>    
                            <option value="1920">2019 - 2020</option>
                                <option value="2021">2020 - 2021</option>
                                <option value="2122">2021 - 2022</option>
                                <option value="2223">2022 - 2023</option>
                                <option value="2324">2023 - 2024</option>
                            </select>
                            </div>
                            <center><input type="submit" name="mezunkaydet" value="Mezun Kaydet" class="btn btn-primary"></center>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
<!-- Yeni Yetkili Ekle -->
<?php if(($_COOKIE['login']) == 'muratatilgan') :?>

    <div class="container mt-5 my-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                <center><h2>Kullanıcı Listesi</h2> </center> 
                    <div class="d-flex justify-content-center mb-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item" style="color:red">Kullanıcı Adı</li>
                            <li class="list-group-item" style="color:red">Şifre</li>
                            
                        </ul>
                    </div>
                    <?php
                        $myfile = fopen("adminbilgileri.txt","r");
                    ?>
                    <?php while($satir = fgets($myfile)) :?>
                        <?php
                            $dilimler = explode("|",$satir);
                            ?>
                        <div class="d-flex justify-content-center mb-3">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><?php echo $dilimler[0]?></li>
                            <li class="list-group-item"><?php echo $dilimler[1]?></li>
                            
                        </ul>
                    </div>
                    <?php endwhile;?>
                    <?php
                     fclose($myfile);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 my-3">
<div class="row">
    <div class="col-12">
    <div class="card">
       <div class="card-body">
           <form  method="POST">
            <h3>Yeni Yetkili Ekle</h3>
            <p>Not : Yeni yetkili eklemeyi sadece muratatilgan kullanıcı adına sahip kullanıcı yapabilecektir.</p>
               <div class="mb-3">
                   <label for="kusername" class="form-label">Kullanıcı Adı</label>
                   <input type="text" class="form-control" name="kusername" id="kusername">
               </div>

               <div class="mb-3">
                   <label for="kayitpassword" class="form-label">Şifre</label>
                   <input type="text" class="form-control" name="kayitpassword" id="kayitpassword">
               </div>
               <center><input type="submit" name="kullaniciekle" value="Kullanıcı Ekle" class="btn btn-primary"></center>
           </form>
       </div>
   </div>

    </div>    

    
</div>
<?php endif; ?>
<script>
    document.getElementById("cyap").addEventListener("click",()=>{
       window.location = "logout.php"; 
    });
</script>
</body>
</html>
