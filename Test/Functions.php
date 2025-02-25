<?php

require "../Class.php";

Functions::Tmr(30); // 30 Seconds
Functions::setConfig("Cookie");
Functions::HiddenConfig("user", "iewil");
$getConfig = Functions::getConfig("Cookie");
print $getConfig;
Functions::removeConfig("Cookie");