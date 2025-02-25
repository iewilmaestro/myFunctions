<?php

require "../Class.php";

$requests = new Requests();

$url = "https://iewilbot.my.id/test/index.php";

$get = $requests->get($url);
print_r($get);

$data_post = "user=iewil";
$post = $requests->post($url, '', $data_post);
print_r($post);