
<?php
function input_control($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function girisiLogla($username,$dogruluk){
    $myfile = fopen("girisler.txt","a");
    if($dogruluk)
    $str = time()." Tarihinde ".$username." Giris yapti.\n";
    else
    $str = time()." Tarihinde ".$username." Giris yapamadi.\n";
    fwrite($myfile,$str);
    fclose($myfile);
}
function girisleriListele(){
    $myfile = fopen("girisler.txt","r");
    while($satir = fgets($myfile)){
        echo $satir."<br>";
    }
    fclose($myfile);
}

function authkontrol($username,$password){
    $myfile = fopen("kullanicilar.txt","r");
    echo"authkontrol ";
    while($satir = fgets($myfile)){
        $satir = explode("|",$satir);
        if($satir[0] == $username && $satir[1] == $password){
            return 1;
        }
    }
    fclose($myfile);
    return 0;
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = input_control($_POST["email"]);
        $password = input_control($_POST["password"]);
        $kontrol = authkontrol($username,$password);
        echo $kontrol;
        if($kontrol){
            setcookie("username",$username,time()+3600);
            setcookie("login",true,time()+3600);
            girisiLogla($username,1);
            echo "giris yapildi";
            header("location:deneme.php");
    
        }
        else{
            echo "giris basarisiz";
            girisiLogla($username,0);
        }
    
    }

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_COOKIE['login'])): ?>
    <p>Giris yapilmis <a href="logout.php" id="out">Cikis yap</a></p>
    <?php else: ?>
        <p>Giris yapilmamis </p>
    <?php endif; ?>

    <form action="deneme.php" method="POST">
       Email : <input type="text" name="email" >
       Password : <input type="password" name="password">
       Password 2 : <input type="password" name="password2" id="">
       <button type="submit" name="sbtn">Submit</button>
    </form>
    <script>
        document.getElementById("out").addEventListener("click",()=>{
            window.location.replace('logout.php');
        })
    </script>
</body>
</html>






