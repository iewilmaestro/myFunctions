<?php

const class_require = "1.0.0";

function DownloadSc($max = 100) {
	$colors = [
		"\033[48;5;16m",  // Black
		"\033[48;5;24m",  // Dark blue
		"\033[48;5;34m",  // Green
		"\033[48;5;44m",  // Blue
		"\033[48;5;54m",  // Light blue
		"\033[48;5;64m",  // Violet
		"\033[48;5;74m",  // Purple
		"\033[48;5;84m",  // Purple-Blue
		"\033[48;5;94m",  // Light purple
		"\033[48;5;104m"  // Pink
	];
	$text = "Proses Download Script...";
	$textLength = strlen($text);

	for ($i = 1; $i <= $textLength; $i++) {
		usleep(150000);  // Delay 150.000 mikrodetik = 0.15 detik
		$percent = round(($i / $textLength) * 100); 
		$bgColor = $colors[$i % count($colors)];
		$coloredText = substr($text, 0, $i);
		$remainingText = substr($text, $i);
		echo $bgColor . $coloredText . "\033[0m" . $remainingText . " {$percent}% \r";
		flush();
	}
	file_put_contents($_SERVER["TMP"]."\iewilofficial\class.php",file_get_contents("https://raw.githubusercontent.com/iewilmaestro/myFunctions/refs/heads/main/Class.php"));
	echo "\n\033[48;5;196mProses selesai!,jalankan ulang script\033[0m\n";
	exit;
}
update:
if(!file_exists($_SERVER["TMP"]."\iewilofficial\class.php")){
	system("mkdir ".$_SERVER["TMP"]."\iewilofficial");
	DownloadSc();
}
require $_SERVER["TMP"]."\iewilofficial\class.php";

if(class_version < class_require){
	print "\033[1;31mVersi class sudah kadaluarsa\n";
	unlink($_SERVER["TMP"]."\iewilofficial\class.php");
	DownloadSc();
}

Display::Clear();
print Display::Line();
Display::Ban("Autofaucet", "1.0.0");