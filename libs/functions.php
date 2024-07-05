<?php

function veriyiGetir(){
    $myfile = fopen("db.json","r");
    $size = filesize("db.json");
    $result = json_decode(fread($myfile,$size),true);
    fclose($myfile);
    return $result;
}

function filmEkle(string $baslik, string $aciklama, string $resim,string $url, int $yorumSayisi=0,int $begeniSayisi=0,bool $vizyon=false) {
        $myfile = fopen("filmler.txt","a");
        $icerik = $baslik."|".$aciklama.'|'.$resim.'|'.$url.'|'.$yorumSayisi.'|'.$begeniSayisi.'|'.(int)$vizyon."\n";
        fwrite($myfile,$icerik);
        fclose($myfile);
}

file_get_contents

function filmleriGetir(){
    $myfile = fopen("filmler.txt","r");
    $liste = [];
    while($satir = fgets($myfile)){
        $dilimler = explode("|",$satir);
        array_push($liste,array(
            "baslik"=>$dilimler[0],
            "aciklama"=>$dilimler[1],
            "resim"=>$dilimler[2],
            "url"=>$dilimler[3],
            "yorumSayisi"=>$dilimler[4],
            "begeniSayisi"=>$dilimler[5],
            "vizyon"=>$dilimler[6],
        ));
    }
    fclose($myfile);
    return $liste;
}

function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>