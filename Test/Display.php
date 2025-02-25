<?php

require "../Class.php";

$title = "ini tes";
$versi = "1.0.0";

Display::Ban($title, $versi);
Display::Menu(1, "ayam");
Display::Cetak("user", "iewil");
Display::Title("Testing");
Display::Line();

print Display::Error("Report Error\n");
print Display::Sukses("Report Success");
print Display::Isi("Data");