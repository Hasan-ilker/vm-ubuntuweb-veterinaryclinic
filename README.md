# vm-ubuntuweb-veterinaryclinic
# Veteriner Kliniği Kayıt Projesi

Bu proje, bir veteriner kliniğine gelen hayvanların temel bilgilerini kaydetmek için basit bir web uygulamasıdır.

## Gereksinimler

*   Linux işletim sistemi (Ubuntu önerilir)
*   Apache web sunucusu
*   PHP
*   MySQL veritabanı

## Kurulum

1.  **Gerekli Yazılımları Kurun:**

    Aşağıdaki komutları kullanarak Apache, PHP ve MySQL'i kurun:

    ```bash
    sudo apt update
    sudo apt upgrade
    sudo apt install apache2 php libapache2-mod-php php-mysql mysql-server mysql-client
    ```

2.  **MySQL Güvenlik Ayarlarını Yapılandırın:**

    ```bash
    sudo mysql_secure_installation
    ```

    Bu komut size bir dizi soru soracaktır. Güvenlik için önerilen seçenekleri seçin.

3.  **MySQL Veritabanı ve Kullanıcı Oluşturun:**

    MySQL'e root kullanıcısıyla giriş yapın:

    ```bash
    sudo mysql -u root -p
    ```

    Veritabanını oluşturun:

    ```sql
    CREATE DATABASE veteriner_klinigi;
    ```

    Kullanıcı oluşturun ve yetkilendirin:

    ```sql
    CREATE USER 'veteriner'@'localhost' IDENTIFIED BY 'parola';
    GRANT ALL PRIVILEGES ON veteriner_klinigi.* TO 'veteriner'@'localhost';
    FLUSH PRIVILEGES;
    ```

    (Parola yerine güvenli bir parola seçtiğinizden emin olun.)

    MySQL'den çıkın:

    ```sql
    exit
    ```

4.  **Web Sunucusunun Kök Dizinine Dosyaları Kopyalayın:**

    ```bash
    sudo cp index.php kaydet.php /var/www/html/
    ```

5.  **`kaydet.php` Dosyasında Veritabanı Bağlantı Bilgilerini Ayarlayın:**

    `kaydet.php` dosyasını bir metin düzenleyiciyle açın (örneğin, `nano`):

    ```bash
    sudo nano /var/www/html/kaydet.php
    ```

    Aşağıdaki satırları kendi veritabanı bilgilerinizle güncelleyin:

    ```php
    $servername = "localhost";
    $username = "veteriner";
    $password = "parola"; // Kendi parolanızı buraya girin
    $dbname = "veteriner_klinigi";
    ```

    Dosyayı kaydedin ve kapatın.

6.  **Veritabanı Tablosunu Oluşturun:**

    MySQL'e giriş yapın:

    ```bash
    sudo mysql -u root -p
    ```

    Veritabanını seçin:

    ```sql
    USE veteriner_klinigi;
    ```

    Tabloyu oluşturun:

    ```sql
    CREATE TABLE hayvanlar (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ad VARCHAR(255) NOT NULL,
        tur VARCHAR(255),
        cins VARCHAR(255)
    );
    ```

    MySQL'den çıkın:

    ```sql
    exit
    ```

7.  **Apache'yi Yeniden Başlatın:**

    ```bash
    sudo systemctl restart apache2
    ```
