<?php

require "../Class.php";

$shortlink = new Shortlink();

//$url_shrinkme = "https://shrinkme.ink/s7LFbFX";
$url_shrinkme = "https://tpi.li/nue9atab";
$result = $shortlink->Bypass($url_shrinkme);
print $result;
//https://tpi.li/nue9atab
