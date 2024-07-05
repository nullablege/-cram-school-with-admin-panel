<?php

function input_control($data){
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getFormattedDateTime() {
    
    $day = date('d');   
    $month = date('m'); 
    $year = date('Y');  
    $hour = date('H');  
    $minute = date('i'); 
    $second = date('s'); 
    return "Gün: $day, Ay: $month, Saat: $hour:$minute:$second, Yıl: $year";
}


function authcontrol($username,$password){
    echo "Girilen username : ".$username." Girilen password : ".$password."<br>";
    $myfile = fopen("adminbilgileri.txt","r");
    $myfile2 = fopen("log.txt","a");
    $ip = getUserIP();
    $tarih = getFormattedDateTime();
    while($satir = fgets($myfile)){
        $dilimler = explode("|",trim($satir));
        echo "while username : ".$dilimler[0]." password ".$dilimler[1]."<br>";
        if($username == $dilimler[0] && $password == $dilimler[1]){
            echo "if aktif <br>";
            setcookie("login",$username,time()+3600);
            $str = $tarih." Tarihinde ".$ip." İp adresli kullanıcı ".$username." Kullanıcısına başarıyla giriş yapmıştır. \n";
            fwrite($myfile2,$str);
            header("location:admin.php");
            echo "<div class='alert alert-danger mb-0 text-center'>Basariyla giris yapildi</div>";
            fclose($myfile2);
            fclose($myfile);
            return 1;
        }
    }
        $str = $tarih." Tarihinde ".$ip." İp adresli kullanıcı ".$username." Kullanıcısına başarısız giriş denemesinde bulundu.\n";
        fwrite($myfile2,$str);
        echo "<div class='alert alert-danger mb-0 text-center'>Giris Basarisiz</div>";
    
    fclose($myfile2);
    fclose($myfile);
}

function logkaydi($username,$yapilanislem){
    $myfile = fopen("log.txt","a");
    $str = getFormattedDateTime()." Tarihinde ".$username." ".$yapilanislem." İslemini ".getUserIP()." ip adresiyle gerçekleştirmiştir. \n";
    fwrite($myfile,$str);
    fclose($myfile);
}

function kullaniciKontrol($username){
    $myfile = fopen("adminbilgileri.txt","r");
    while($satir = fgets($myfile)){
        $dilim = explode("|",$satir);
        if($dilim[0] == $username){
            fclose($myfile);
            return 0;
        }
    }
    return 1;
    fclose($myfile);
}


function ogrenciKontrol($isim,$soyisim,$siralama,$dosyaadi){
    $myfile = fopen($dosyaadi,"r");
    while($satir = fgets($myfile)){
        $dilimler = explode("|",$satir);
        if($dilimler[0] == $isim && $dilimler[1] == $soyisim){
            if(isset($dilimler[5])){
                if($dilimler[5] == $siralama)
                return 0;
            }
            return 0;

        }
    }
    return 1;
}


function removeDuplicateLines($filename) {
    $file = fopen($filename, 'r');
    if (!$file) {
       // echo "<div class='alert alert-danger text-center mb-o'>Dosya okunamadı: $filename Gelistiriciyle iletisime gecin. !!!!</div>";
        return;
    }

    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    if ($lines === false) {
        //echo "<div class='alert alert-danger text-center mb-o'>Dosya okunamadı: $filename Gelistiriciyle iletisime gecin. !!!!</div>";
        fclose($file);
        return;
    }

    $uniqueLines = array_unique($lines);

    $file = fopen($filename, 'w');
    if (!$file) {
        //echo "Dosya açılamadı: $filename";
        return;
    }

    foreach ($uniqueLines as $line) {
        fwrite($file, $line . PHP_EOL);
    }

    fclose($file);
}


function deleteLineFromFile($filePath, $lineNumberToDelete) {
    $file = fopen($filePath, 'r');
    if (!$file) {
        echo "Dosya açılamadı!";
        return false;
    }

    $lines = [];
    $currentLine = 1;
    
    while (($line = fgets($file)) !== false) {
        if ($currentLine != $lineNumberToDelete) {
            $lines[] = $line;
        }
        $currentLine++;
    }
    
    fclose($file);

    $file = fopen($filePath, 'w');
    if (!$file) {
        echo "Dosya açılamadı!";
        return false;
    }

    foreach ($lines as $line) {
        fwrite($file, $line);
    }

    fclose($file);
    logkaydi($_COOKIE['login']," Kayit Silme");
    return true;
}

function satirSay($dosyaadi){
    $myfile = fopen($dosyaadi,"r");
    $sayac = 0;
        while($satir = fgets($myfile)){
            $sayac++;
        }
    fclose($myfile);
    return $sayac;
}

function tekrarlicagri(){
removeDuplicateLines('1718mezun.txt');
removeDuplicateLines('1819mezun.txt');
removeDuplicateLines('1920mezun.txt');
removeDuplicateLines('2021mezun.txt');
removeDuplicateLines('2122mezun.txt');
removeDuplicateLines('2223mezun.txt');
removeDuplicateLines('2324mezun.txt');
removeDuplicateLines('2425mezun.txt');
removeDuplicateLines('2526mezun.txt');
removeDuplicateLines('2627mezun.txt');
removeDuplicateLines('2728mezun.txt');
removeDuplicateLines('2829mezun.txt');
removeDuplicateLines('2930mezun.txt');
removeDuplicateLines('duyurular.txt');
logkaydi("Sistem","Otomatik olarak tüm mezun dosyaları kontrol edilip tekrarlı satırlar sıfırlanmıştır.");
}


?>

