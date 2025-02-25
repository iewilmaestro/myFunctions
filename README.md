# Class Version
1.1.6

# Warna dan Perlengkapan
Line 6 - 49

# List Youtube view
Line 51 - 69

# Requests
- Fungsi statik
- Isi Fungsi
	- Curl
	```php
	// Fungsi global
	Requests::Curl($url, $header=0, $post=0, $data_post=0, $cookie=0, $proxy=0, $skip=0);
		
	// $url = url tujuan
	// $header = headers berupa array
	// $post = 1 jika mau request method post
	// $data_post = berupa data post, bisa query string atau array
	// $cookie = nama file cookie , contoh: cookie.txt
	// $proxy = proxy:port / https:proxy.com/user:password
	// $skip = jika tidak ada respon, karena fungsi ini deteksi no internet jika tidak ada respon
	```
		
	- GET
	```php
	Requests::get($url, $head =0);
	// $url = url tujuan
	// $head = headers berupa array
	```
	- POST
	```php
	Requests::post($url, $head=0, $data_post=0);
	// $url = url tujuan
	// $head = headers berupa array
	// $data_post = berupa data post, bisa query string atau array
	```

# Display
- Fungsi statik
- Isi Fungsi
	- Banner
	```php
	$title = "ini tes";
	$versi = "1.0.0";
	Display::Ban($title, $versi);
	```
	- Menu
	```php
	Display::Menu($no, $title);
	// $no = nomor urut
	// $title = nama Menu
	```
	- Cetak
	```php
	Display::Cetak($label, $msg = "[No Content]");
	// $label = jenis label
	// $msg = nama label
	```
	- Title
	```php
	Display::Title($activitas);
	// $activitas = judul
	```
	- Line
	```php
	Display::Line($len = 45);
	// $len = panjang garis
	```
	- Error
	```php
	print Display::Error($except);
	// $except = Report Error
	```
	- Sukses
	```php
	print Display::Sukses($msg);
	// $msg = Report Success
	```
	- Isi
	```php
	// membuat tampilan saja
	print Display::Isi($msg);
	// $msg = nama file
	```
# Functions
- Fungsi statik
- configFile = config.json
- Isi Fungsi
  - Cooldown / Timer
    ```php
    Functions::Tmr($tmr);
    // $tmr = waktu detik
    ```
  - setConfig
    ```php
    Functions::setConfig($key);
    // $key = idetitas yang mau di simpan
    ```
  - removeConfig
    ```php
    Functions::removeConfig($key);
     // $key = idetitas yang mau di hapus
    ```
  - view
    ```php
    Functions::view($youtube);
    // $youtube = link youtube
    ```
  - HiddenConfig
    ```php
    Functions::HiddenConfig($key, $data);
    // $key = identitas data
    // $data = isi data
    ```
  - temporary
    ```php
    Functions::temporary($newdata, $data=0);
    // $newdata = 
    // $data =
    // biasanya untuk menyimpan nama coin agar tidak terulang jika saldo dev habis
    ```
  - cfDecodeEmail
    ```php
    Functions::cfDecodeEmail($encodedString);
    // $encodedString = string cf email yang mau di encode
    ```
  - getConfig
    ```php
    Functions::getConfig($key);
    // $key = idetitas yang mau di lihat, pastikan sudah di simpan sebelumnya
    ```
# HtmlScrap
- Fungsi Publik
```php
// devinisikan fungsi publik dengan variable sebelum memanggil fungsi di dalamnya
$htmlscrap = new HtmlScrap();
```
- Isi Fungsi
  - Result
  ```php
  $htmlscrap->Result($html, $form = 1);
  // $html = body html sumber
  // $form = data yang mau di ambil dari form ke berapa, default form 1 karena sebagian besar menggunakan 1 form dalam 1 halaman
  ```
# Captcha
- Fungsi Publik
- Membutuhkan Class Functions & class Display
```php
// devinisikan fungsi publik dengan variable sebelum memanggil fungsi di dalamnya
$captcha = new Captcha();
```
- 2 Captcha solver
  - Multibot
  - Xevil
- Isi Fungsi
  - GetBalance
  - RecaptchaV2
  - Hcaptcha
  - Turnstile
  - Authkong
  - Ocr
  - AntiBot
  - Teaserfast
