<?php
function authcontrol($username, $password) {
    $myfile = fopen("adminbilgileri.txt", "r");
    $myfile2 = fopen("log.txt", "a");
    $ip = getUserIP();
    $tarih = getFormattedDateTime();

    while ($satir = fgets($myfile)) {
        $dilimler = explode("|", trim($satir));  // Trim ile yeni satır karakterini kaldır
        if (count($dilimler) < 2) {
            continue; // Satırda yeterli veri yoksa atla
        }
        $file_username = trim($dilimler[0]);
        $file_password = trim($dilimler[1]);
        
        if ($username === $file_username && $password === $file_password) {
            setcookie("login", $username, time() + 3600);
            $str = "$tarih Tarihinde $ip İp adresli kullanıcı $username Kullanıcısına başarıyla giriş yapmıştır.\n";
            fwrite($myfile2, $str);
            fclose($myfile2);
            fclose($myfile);
            header("Location: admin.php");
            exit; // header() sonrası hemen çık
        }
    }

    $str = "$tarih Tarihinde $ip İp adresli kullanıcı $username Kullanıcısına başarısız giriş denemesinde bulundu.\n";
    fwrite($myfile2, $str);
    fclose($myfile2);
    fclose($myfile);
    echo "<div class='alert alert-danger mb-0 text-center'>Giriş Başarısız</div>";
}

?>