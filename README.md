<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Template Aplikasi Pengolahan Yii 2</h1>
    <br>
</p>

Template Aplikasi Pengolahan Yii 2 adalah kerangka aplikasi pengolahan menggunakan framework [Yii 2](http://www.yiiframework.com/) untuk mempercepat pengembangan aplikasi pengolahan khususnya di Direktorat IPD [Badan Pusat Statistik](https://bps.go.id/).

Template ini mengandung fitur-fitur aplikasi pengolahan seperti login community, manajemen user, manajemen daftar sampel, entri data, dll.

<!-- [![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic) -->

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      node_modules/       contains npm packages
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

Persyaratan minimun template ini adalah web server yang mendukung PHP 5.4.0. Project ini juga membutuhkan [Composer](http://getcomposer.org/) dan [npm](https://www.npmjs.com/) untuk mengelola dependensi pada project ini.


INSTALLATION
------------

<!-- ### Install via Composer -->

Untuk menjalankan template ini di environment anda, lakukan langkah berikut:

1. Clone project ini dengan menggunakan git:

   ~~~
   git clone https://github.com/farhanyh/ipbhp.git
   ~~~

2. Jalankan `composer` dan `npm` untuk menginstal dependensi yang diperlukan.

   ~~~
   composer install
   npm install
   ~~~

3. Jalakan perintah berikut untuk menjalankan server:

   ~~~
   php yii serve
   ~~~

4. Akses template ini melalui URL berikut:

   ~~~
   http://localhost:8080/
   ~~~

CONFIGURATION
-------------

### Database

Buat file `config/db.php` dan isi dengan informasi database yang digunakan, sebagai contoh:

```php
# config/db.php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Database yang akan digunakan harus dibuat terlebih dahulu sebelumnya.
- Konfigurasi lebih lanjut dapat dilakukan di file-file dalam direktori `config/` untuk mengkonfigurasi aplikasi sesuai keperluan.

### Asset dan Tema

Template ini menggunakan fitur [Asset Bundles](https://www.yiiframework.com/doc/guide/2.0/en/structure-assets) pada Yii 2 untuk mengelola asset yang digunakan dalam aplikasi. Untuk menggunakan Asset Bundles pada view Anda, gunakan line berikut pada view Anda:

```php
# Tambahkan line berikut untuk menggunakan Asset Bundles pada view Anda

use app\assets\AppAsset;

AppAsset::register($this);
```

Secara default, template ini menggunakan tema [CoreUI](https://coreui.io/) yang didefinisikan dalam file `assets/CoreUIAsset.php`.

```php
# assets/CoreUIAsset.php

namespace app\assets;

use yii\web\AssetBundle;

class CoreUIAsset extends AssetBundle
{
    public $sourcePath = '@npm/@coreui';
    public $css = [
        'coreui/dist/css/coreui.min.css',
        'icons/css/coreui-icons.min.css',
    ];
    public $js = [
        'coreui/dist/js/coreui.min.js',
    ];
    public $depends = [
        'app\assets\JQueryAsset',
        'app\assets\PopperAsset',
        'app\assets\BootstrapAsset',
    ];
}
```

Anda dapat menggunakan asset yang Anda tentukan sendiri dengan mendefinisikan Asset Bundles baru seperti dijelaskan [di sini](https://www.yiiframework.com/doc/guide/2.0/en/structure-assets#defining-asset-bundles) kemudian menambahkan Asset Bundles yang telah Anda buat ke file `assets/AppAsset.php`.

```php
# assets/AppAsset.php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [];
    public $depends = [
        'app\assets\CoreUIAsset', // replace dengan Asset Bundles yang Anda buat

        // atau tambahkan di sini jika ingin menggunakan CoreUI bersama dengan
        // Asset Bundles yang Anda buat
    ];
}
```