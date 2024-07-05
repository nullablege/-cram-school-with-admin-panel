<ul class="list-group">
    <?php
        foreach(veriyiGetir()["kategoriler"] as $kategori) {
            echo '<li class="list-group-item">'.$kategori.'</li>';
        };
    ?>                   
</ul>