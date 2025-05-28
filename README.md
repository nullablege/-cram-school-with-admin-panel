# 🏛️ X Eğitim Kurumları - Web Sitesi ve Admin Paneli (PHP ile Dosya Tabanlı Veri Yönetimi)


Bu proje, "X Eğitim Kurumları" adlı bir dershane için geliştirilmiş, **tamamen PHP ile kodlanmış dinamik bir web sitesi ve bu siteyi yönetmek için kapsamlı bir admin paneli içerir.** Projenin en dikkat çekici ve özgün yönü, veritabanı işlemlerini geleneksel bir MySQL veya benzeri bir veritabanı sistemi kullanmak yerine, **doğrudan metin dosyaları (`.txt`) üzerinden gerçekleştirmesidir.** Bu yaklaşım, PHP'nin dosya okuma, yazma ve manipülasyon yeteneklerini sergilemek ve temel veri yönetimi prensiplerini anlamak için mükemmel bir pratik sunar.

Web sitesi, dershanenin tanıtımını yapar, "Hakkımızda", "İletişim", "Foto Galeri", "Mezunlarımız" ve "Duyurular" gibi standart sayfaları içerir. Bu sayfaların içerikleri (mezun listeleri, galeri fotoğrafları, duyurular), **herhangi bir yazılım bilgisi gerektirmeksizin admin paneli üzerinden kolayca güncellenebilir (ekleme, kaldırma işlemleri).** Admin paneli ayrıca yetkili kullanıcı yönetimi ve yapılan tüm işlemlerin detaylı bir şekilde loglandığı bir kayıt sistemine sahiptir. Sistem, **mobil uyumlu (responsive)** bir tasarıma sahip olup, farklı ekran boyutlarında optimum kullanıcı deneyimi sunar.

Bu projenin temel amacı, PHP ile **backend geliştirme becerilerini pratiğe dökmek ve dosya tabanlı veri yönetimi konusunda yetkinlik kazanmaktır.**

---

## 🌟 Temel Özellikler ve Fonksiyonlar

*   **Dinamik Web Sitesi (Frontend - `index.php`, `hakkimizda.php`, `iletisim.php`, `fotogaleri.php`, `mezunlarimiz.php`, `duyurular.php`):**
    *   **Anasayfa:** Dershanenin genel tanıtımı ve misyonu.
    *   **Hakkımızda:** Kurumun geçmişi, vizyonu ve eğitim anlayışı hakkında detaylı bilgiler.
    *   **İletişim:** Adres, telefon numaraları, WhatsApp hattı ve Google Haritalar entegrasyonu ile ulaşım kolaylığı.
    *   **Foto Galeri:** Kurum etkinliklerinden veya derslerden fotoğrafların sergilendiği bölüm. Fotoğraflar ve açıklamaları admin panelinden yönetilir.
    *   **Mezunlarımız:** Farklı eğitim-öğretim yıllarına ait mezun öğrencilerin bilgileri (isim, soyisim, bölüm, kazandığı okul, kazandığı bölüm, sıralama) şık tablolarda listelenir. Tüm mezun verileri admin panelinden eklenebilir/kaldırılabilir.
    *   **Duyurular:** Kurumdan yapılan güncel duyuruların başlık ve içerik olarak gösterildiği bölüm. Admin panelinden yönetilir.
    *   **Responsive Tasarım (`style.css`, `script.js`):** CSS ve JavaScript kullanılarak oluşturulmuş, mobil cihazlarda (hamburger menü ile) ve masaüstünde kullanıcı dostu bir arayüz.
*   **Kapsamlı Admin Paneli (`admin/admin.php`, `admin/functions.php`, `admin/login.php`):**
    *   **Güvenli Giriş:** Yetkili kullanıcıların `adminbilgileri.txt` dosyasında saklanan kullanıcı adı ve şifreleri ile sisteme giriş yapması. Başarılı ve başarısız giriş denemeleri `log.txt` dosyasına IP adresi ve zaman damgasıyla kaydedilir.
    *   **Mezun Yönetimi:**
        *   Farklı eğitim-öğretim yılları için yeni mezun öğrenci kayıtları ekleme. (Her yıl için ayrı `.txt` dosyaları, örn: `2324mezun.txt`).
        *   Mevcut mezun listelerinden belirli bir öğrenciyi sıra numarasına göre silme.
        *   Yeni eğitim-öğretim yılı için boş mezun listesi dosyası oluşturma (kullanımdan kaldırılmış gibi duruyor).
    *   **Foto Galeri Yönetimi:**
        *   Siteye yeni fotoğraflar yükleme (sunucuya kaydetme ve yolunu `fotogaleri.txt`'ye yazma). Yüklenen dosya adları çakışmayı önlemek için `md5(time())` ile benzersizleştirilir.
        *   Galeriden belirli bir fotoğrafı (ve açıklamasını) sıra numarasına göre kaldırma.
    *   **Duyuru Yönetimi:**
        *   Yeni duyurular (başlık ve açıklama) ekleyerek `duyurular.txt` dosyasına kaydetme.
        *   Mevcut duyuruları sıra numarasına göre silme.
    *   **Yetkili Kullanıcı Yönetimi (Sınırlı):**
        *   `muratatilgan` adlı süper kullanıcı tarafından, sisteme giriş yapabilecek yeni admin kullanıcıları (`adminbilgileri.txt`'ye ekleme) oluşturulabilir. Kullanıcı adı çakışma kontrolü yapılır. (Kullanıcı silme veya şifre güncelleme gibi özellikler belirtilmemiş.)
    *   **İşlem Loglama (`log.txt`):** Admin panelinde yapılan tüm önemli işlemler (giriş denemeleri, kayıt ekleme/silme, dosya oluşturma vb.) kullanıcı adı, IP adresi ve zaman damgasıyla birlikte `log.txt` dosyasına kaydedilir. Bu, sistem güvenliği ve denetimi için kritik bir özelliktir.
    *   **Otomatik Tekrarlı Satır Temizleme (`tekrarlicagri`, `removeDuplicateLines`):** `admin.php` sayfası her yüklendiğinde veya belirli aralıklarla, tüm mezun `.txt` dosyaları ve `duyurular.txt` dosyası taranarak **potansiyel olarak tekrar eden satırlar otomatik olarak temizlenir.** Bu, kullanıcı hatalarından veya sistemsel bir aksaklıktan kaynaklanabilecek veri tutarsızlıklarının önüne geçmek için **çok zekice düşünülmüş bir özelliktir!**
*   **Dosya Tabanlı Veri Yönetimi (`.txt` dosyaları):**
    *   Tüm dinamik veriler (mezunlar, foto galeri bilgileri, duyurular, admin kullanıcıları) MySQL gibi bir veritabanı yerine, `admin` klasörü altında bulunan çeşitli metin dosyalarında (`|` (pipe) veya `,(virgül)` karakteri ile ayrılmış formatlarda) saklanır.
    *   PHP'nin dosya işleme fonksiyonları (`fopen`, `fgets`, `fwrite`, `fclose`, `file`, `array_unique`) aktif olarak kullanılır.
*   **Fonksiyonel PHP Kullanımı (`admin/functions.php`):**
    *   Girdi kontrolü (`input_control`), IP adresi alma (`getUserIP`), log kaydı (`logkaydi`), kullanıcı/öğrenci varlık kontrolü (`kullaniciKontrol`, `ogrenciKontrol`), dosyadan satır silme (`deleteLineFromFile`), dosyadaki satır sayısını bulma (`satirSay`) gibi tekrar kullanılabilir işlemler ayrı fonksiyonlar olarak tanımlanmıştır.

---

## 🛠️ Kullanılan Teknolojiler ve Kütüphaneler

*   **Backend:** PHP (Procedural/Functional ağırlıklı)
*   **Frontend:** HTML5, CSS3, JavaScript (Temel DOM manipülasyonu ve responsive menü için)
*   **Veri Saklama:** Metin Dosyaları (`.txt`)
*   **Styling Kütüphanesi (Frontend):** Bootstrap 5 (Duyurular sayfasında kullanıldığı görülüyor, genel sitede de etkileri olabilir)
*   **PHP Fonksiyonları:**
    *   Dosya İşlemleri: `fopen`, `fgets`, `fwrite`, `fclose`, `file`, `array_unique`, `move_uploaded_file`.
    *   String İşlemleri: `explode`, `trim`, `stripslashes`, `htmlspecialchars`, `ltrim`, `md5`.
    *   Zaman/Tarih: `time`, `date`.
    *   Cookie Yönetimi: `setcookie`, `$_COOKIE`.
    *   Session Yönetimi (Admin panelinde kullanılmamış, frontend tarafında `session_start()` görülebilir ama aktif rolü belirsiz).

---

## 📁 Proje Dosya Yapısı (Görsellere Göre Tahmini)

```
-cram-school-with-admin-panel/
├── Atilgan-PHP/ # Ana web sitesi dosyaları
│ ├── admin/ # Admin paneli dosyaları ve veri dosyaları
│ │ ├── image/ # Yüklenen fotoğrafların saklandığı klasör
│ │ ├── 1213mezun.txt # (ve diğer Xmezun.txt dosyaları) Mezun listeleri
│ │ ├── admin.php # Ana admin paneli script'i
│ │ ├── adminbilgileri.txt# Admin kullanıcı adı ve şifreleri
│ │ ├── deneme.php # (Muhtemelen test veya geliştirme amaçlı)
│ │ ├── duyurular.txt # Duyuru verileri
│ │ ├── fotogaleri.txt # Foto galeri bilgileri (dosya yolu|açıklama)
│ │ ├── functions.php # Yardımcı PHP fonksiyonları
│ │ ├── index.php # (Admin için bir index olabilir veya kullanılmıyor)
│ │ ├── log.txt # İşlem logları
│ │ ├── login.php # Admin giriş sayfası
│ │ └── logout.php # Admin çıkış işlemi
│ ├── Atilgan-PHP.rar # Projenin sıkıştırılmış arşivi
│ ├── atilgan.js # (Muhtemelen mobil menü gibi frontend JavaScript kodları)
│ ├── duyurular.php # Duyurular sayfası (frontend)
│ ├── fotogaleri.php # Foto galeri sayfası (frontend)
│ ├── hakkimizda.php # Hakkımızda sayfası (frontend)
│ ├── icon.png # Site ikonu (favicon)
│ ├── iletisim.php # İletişim sayfası (frontend)
│ ├── index.php # Ana sayfa (frontend)
│ ├── mezunlarimiz.php # Mezunlarımız sayfası (frontend)
│ ├── notlar.txt # (Kullanım amacı belirsiz, notlar veya test verisi olabilir)
│ ├── script.js # Genel frontend JavaScript (atilgan.js ile aynı veya farklı olabilir)
│ └── style.css # Ana CSS stil dosyası
```


---

## ⚙️ Kurulum ve Çalıştırma

Bu PHP projesini yerel veya uzak bir sunucuda çalıştırmak için:

1.  **PHP Destekli Web Sunucusu:**
    *   Sisteminizde PHP yorumlayıcısının kurulu olduğu bir web sunucusuna (Apache, Nginx vb.) ihtiyacınız vardır. XAMPP, WAMP (Windows için), MAMP (macOS için) veya LAMP/LEMP (Linux için) gibi hazır paketler bu ortamı kolayca sağlar.

2.  **Dosyaları Sunucuya Yükleme:**
    *   Proje klasörünü (`Atilgan-PHP` veya ana klasörünüzün adı) web sunucunuzun yayın dizinine (örn: `htdocs`, `www`, `public_html`) kopyalayın.

3.  **Dosya İzinleri (Önemli):**
    *   PHP script'lerinin `admin` klasörü içindeki `.txt` dosyalarına (örn: `adminbilgileri.txt`, `log.txt`, mezun dosyaları, `fotogaleri.txt`, `duyurular.txt`) **hem okuma hem de yazma izni** olduğundan emin olun.
    *   Ayrıca, `admin/image/` klasörüne PHP'nin **dosya yükleyebilmesi (yazma izni)** gereklidir.
    *   Bu izinler genellikle dosya/klasör özelliklerinden veya terminal üzerinden `chmod` komutu ile ayarlanır (örn: `chmod 666 dosya.txt`, `chmod 777 image_klasoru`). Sunucu yapılandırmanıza göre doğru izinleri ayarlamanız kritik öneme sahiptir.

4.  **Kullanıma Hazır!**
    *   **Web Sitesi:** Tarayıcınızdan yüklediğiniz ana dizindeki `index.php` dosyasına gidin (örn: `http://localhost/Atilgan-PHP/index.php`).
    *   **Admin Paneli:** Tarayıcınızdan `admin/login.php` dosyasına gidin (örn: `http://localhost/Atilgan-PHP/admin/login.php`).
        *   **Varsayılan Süper Kullanıcı:** Eğer `adminbilgileri.txt` dosyası başlangıçta boşsa veya ilk admin kullanıcısını oluşturmanız gerekiyorsa, `muratatilgan` kullanıcı adıyla (şifresi de muhtemelen `muratatilgan` veya kodda tanımlı bir varsayılan) giriş yapmayı deneyebilirsiniz. Mevcut README'ye göre yeni kullanıcı ekleme yetkisi sadece bu kullanıcıya ait.

---

## 🧠 Kod Akışı ve Teknik Detaylar (Örnekler)

*   **Frontend Sayfaları (`duyurular.php`, `fotogaleri.php`, `mezunlarimiz.php`):**
    *   Bu sayfalar, ilgili `.txt` dosyalarını `fopen("dosya_adi.txt", "r")` ile okuma modunda açar.
    *   `fgets()` ile satır satır okuma yapar.
    *   `explode("|", $satir)` veya benzeri bir yöntemle satırdaki verileri ayırır (pipe `|` veya virgül `,` ile ayrılmış veriler).
    *   Ayrıştırılan verileri HTML etiketleri içinde dinamik olarak ekrana basar (Bootstrap card'ları, HTML tabloları vb. kullanarak).
*   **Admin Paneli - Giriş (`admin/login.php` ve `admin/functions.php` içindeki `authcontrol`):**
    *   Kullanıcı adı ve şifre alınır, `input_control` ile temizlenir.
    *   `adminbilgileri.txt` dosyası okunarak satır satır kontrol edilir.
    *   Girilen bilgilerle eşleşen bir kayıt bulunursa, `login` adında bir cookie oluşturulur (`setcookie("login", $username, time()+3600);`) ve kullanıcı `admin.php`'ye yönlendirilir. Başarılı/başarısız girişler loglanır.
*   **Admin Paneli - İçerik Yönetimi (`admin/admin.php`):**
    *   Formlardan (`<form method="POST">`) gelen verilerle (`$_POST`, `$_FILES`) ilgili `.txt` dosyaları güncellenir.
    *   **Mezun Ekleme:** Girilen bilgiler, seçilen yılın mezun dosyasına (`$dosyaadi = $_POST['mezunsenesi']."mezun.txt";`) `fopen($dosyaadi, "a")` (append modu) ile eklenir. Öncesinde `ogrenciKontrol` ile aynı sene, aynı isimde ve aynı sıralamada mükerrer kayıt olup olmadığı kontrol edilir.
    *   **Mezun Silme:** `deleteLineFromFile()` fonksiyonu çağrılarak, belirtilen dosyadaki belirli bir satır numarası silinir. Bu fonksiyon, dosyayı okur, silinecek satır dışındaki tüm satırları bir diziye alır ve sonra dosyayı yazma modunda (`"w"`) açıp bu diziyi tekrar dosyaya yazar.
    *   **Fotoğraf Ekleme:** `$_FILES['foto']` ile yüklenen fotoğraf `move_uploaded_file()` ile `admin/image/` klasörüne kaydedilir (dosya adı çakışmaması için `md5(time())` ile benzersizleştirilir). Fotoğrafın yolu ve açıklaması `fotogaleri.txt`'ye eklenir.
    *   **Otomatik Tekrarlı Satır Temizleme (`removeDuplicateLines`):** Bu fonksiyon, belirtilen bir dosyayı okur, `file()` ile tüm satırları bir diziye alır, `array_unique()` ile tekrarlı satırları çıkarır ve sonra dosyayı güncellenmiş benzersiz satırlarla yeniden yazar. `tekrarlicagri()` fonksiyonu ile tüm önemli veri dosyaları için bu işlem periyodik olarak tetiklenir.

---

## ⚠️ Önemli Notlar ve Güvenlik Hususları

*   **Dosya İzinleri (Çok Kritik):** PHP'nin `.txt` dosyalarına yazabilmesi ve `admin/image/` klasörüne dosya yükleyebilmesi için sunucuda doğru dosya ve klasör izinlerinin (genellikle `666` veya `777` gibi, ancak sunucu yapılandırmanıza göre değişir) ayarlanmış olması hayati önemdedir.
*   **Veri Bütünlüğü ve Performans:** Büyük miktarda veri için metin dosyalarıyla çalışmak performans sorunlarına ve veri bütünlüğü risklerine yol açabilir. Veri arttıkça okuma, yazma, arama ve güncelleme işlemleri yavaşlayacaktır. Bu proje eğitimsel bir amaç taşısa da, gerçek dünya uygulamalarında bu tür senaryolar için **SQL veya NoSQL veritabanları** çok daha uygun ve ölçeklenebilir çözümler sunar.
*   **Güvenlik Açıkları:**
    *   **Doğrudan Dosya Erişimi:** Eğer `admin` klasörü web üzerinden doğrudan erişilebilir durumdaysa (`.htaccess` veya sunucu konfigürasyonu ile korunmuyorsa), `adminbilgileri.txt`, `log.txt` gibi hassas dosyalar kötü niyetli kişiler tarafından okunabilir.
    *   **Girdi Doğrulama (`input_control`):** `htmlspecialchars`, `stripslashes`, `trim` kullanımı temel XSS ve bazı basit ataklara karşı koruma sağlar. Ancak dosya isimleri (`$_POST['mezunsenesi']` gibi) oluşturulurken veya dosya yolları manipüle edilirken path traversal gibi zafiyetlere karşı daha dikkatli olunmalıdır.
    *   **Şifre Saklama:** `adminbilgileri.txt` dosyasında şifrelerin düz metin olarak saklanması **çok büyük bir güvenlik açığıdır.** Şifreler mutlaka `password_hash()` ile güvenli bir şekilde hashlenmeli ve giriş sırasında `password_verify()` ile doğrulanmalıdır.
    *   **Brute-Force Saldırıları:** Admin giriş formunda, çok sayıda başarısız giriş denemesine karşı bir sınırlama (örn: CAPTCHA, IP bazlı engelleme, deneme sayacı) bulunmamaktadır.
*   **Mükerrer Kayıt Kontrolü:** `ogrenciKontrol` fonksiyonu, mezun eklerken temel bir mükerrer kayıt kontrolü yapar. Bu tür kontrollerin daha kapsamlı olması ve tüm veri ekleme noktalarında uygulanması önemlidir. `removeDuplicateLines` fonksiyonu bir tür sonradan düzeltme sağlar ancak en baştan mükerrerliği engellemek daha iyidir.

---

## 🚀 Gelecekteki Geliştirmeler İçin Fikirler

*   **Veritabanına Geçiş:** Projenin ölçeklenebilirliği, performansı ve güvenliği için MySQL veya PostgreSQL gibi bir ilişkisel veritabanına geçilmesi en önemli geliştirme olacaktır. Bu, SQLite gibi dosya tabanlı bir SQL veritabanı ile de başlayabilir.
*   **Gelişmiş Güvenlik:**
    *   Tüm şifreler için `password_hash()` ve `password_verify()`.
    *   Admin paneline erişim için daha güçlü session yönetimi.
    *   CSRF tokenları.
    *   Giriş formunda brute-force koruması.
    *   Tüm kullanıcı girdileri için daha kapsamlı doğrulama ve temizleme.
*   **Kullanıcı Yönetiminin Genişletilmesi:** Adminlerin şifrelerini değiştirebilmesi, kullanıcı rollerinin tanımlanabilmesi.
*   **Arayüz Geliştirmeleri:**
    *   Admin paneli için daha modern bir tasarım ve AJAX kullanarak sayfa yenilenmeden işlemler yapabilme.
    *   Frontend için daha interaktif öğeler.
*   **İçerik Düzenleme:** Mezun, duyuru, fotoğraf galerisi girdilerini silmek yerine düzenleyebilme (update) özelliği.
*   **Yedekleme Mekanizması:** Admin panelinden `.txt` dosyalarının veya veritabanının (eğer geçilirse) yedeğini alabilme.
*   **Hata Loglamasının Geliştirilmesi:** Sadece işlem logları değil, PHP hatalarının ve istisnalarının da detaylı bir şekilde loglanması.

---

Bu "X Eğitim Kurumları" web sitesi ve admin paneli, **PHP ile dosya tabanlı veri yönetiminin ilginç ve öğretici bir uygulamasını sunmaktadır.** Veritabanı kullanmadan dinamik bir web sitesi oluşturma ve içerik yönetme konusunda pratik bir deneyim kazandırır. Özellikle **otomatik tekrarlı satır temizleme mekanizması** gibi düşünülmüş detaylar, projenin ne kadar emek verilerek hazırlandığını göstermektedir. Önerilen güvenlik ve mimari iyileştirmeleriyle birlikte, bu proje backend becerilerinizi sergilemek için **çok değerli bir çalışmadır!**
