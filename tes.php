<?php

if(!file_exists($_SERVER["TMP"]."\iewilofficial\class.php")){
	system("mkdir ".$_SERVER["TMP"]."\iewilofficial");
	file_put_contents($_SERVER["TMP"]."\iewilofficial\class.php",file_get_contents("https://raw.githubusercontent.com/iewilmaestro/myFunctions/refs/heads/main/Class.php"));
}
require $_SERVER["TMP"]."\iewilofficial\class.php";

$class_require = "1.0.1";

if(class_version < $class_require)
	print "versi lebih rendah";
exit;

Display::Clear();
print Display::Line();