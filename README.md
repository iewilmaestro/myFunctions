# Class Version
1.1.6

# Warna dan Perlengkapan
Line 6 - 49

# List Youtube auto view
Line 51 - 69

# Requests

- Fungsi statik
	
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
