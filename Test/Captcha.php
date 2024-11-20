<?php

require "../Class.php";

$iewil = new Iewil();
Display::Clear();

// TES ANTIBOT
// SOURCE sollcrypto.com
$curlHandle = curl_init('https://sollcrypto.com/home/page/bitcoin/');
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$source = curl_exec($curlHandle);
curl_close($curlHandle);

$res = $iewil->Antibot($source);
echo $res;
// +8965+5115+5830+8125


// TES TURNSTILE
$pageurl = "https://turnstile.zeroclover.io/";
$sitekey = "0x4AAAAAAAEwzhD6pyKkgXC0";
$res = $iewil->Turnstile($sitekey, $pageurl);
echo substr($res,0,20);
// 0.GKK8mLFsa7xcOMHyCT