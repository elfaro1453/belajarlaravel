# Cara Clone Project ini di localhost anda

Pastikan versi php yang telah terinstall di komputer anda adalah minimal versi 7.4, silahkan cek di command line dengan menjalankan kode berikut di command line:

```php
php --version
```

Jika versi PHP anda di bawah 7.4, update php ke versi terbaru.

Kemudian cek versi composer dari command line :

```php
composer --version
```

hasilnya ada versi composer yang telah terinstall pada komputer anda, minimal versi composer yang mendukung Laravel adalah versi 2, jika command tidak ditemukan, silahkan install terlebih dahulu composernya, jika versi composer masih menggunakan versi 1 maka install versi 2 atau yang lebih baru.

Selanjutnya cek versi nodejs, versi yang didukung adalah minimal versi 14, jika nodejs belum terinstall atau masih menggunakan versi yang lama, maka install versi terbaru.

```php
node --version
```

Jika tools telah terinstall dengan baik, maka selanjutnya adalah mengcopy project ini ke dalam localhost anda.

Pada command line / terminal, git clone repository ini di workfolder anda, semisal di dalam folder htdocs

```php
git clone https://github.com/elfaro1453/belajarlaravel.git laravel
```

Kemudian masuk ke folder yang telah dibuat tadi

```php
cd laravel
```

Pada finder atau explorer, copy .env.example, paste dengan nama .env saja.

pada command line jalankan perintah berikut :

```php
php artisan key:generate
composer install
npm install
npm run dev
```

Buat database dan sesuaikan file .env dengan database yang telah anda buat.

Setelah itu jalankan perintah berikut untuk membuat tabel database

```php
php artisan migrate
```

Jalankan server laravel

```php
php artisan serve
```

buka `http://localhost:8000` untuk membuka laravel yang telah dijalankan.
