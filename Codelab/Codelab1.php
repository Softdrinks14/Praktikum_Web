<?php
$kolom = 5;
for ($i = 1; $i <= $kolom; $i++) {
    for ($x = $i; $x < $kolom; $x++) {
        echo "&nbsp&nbsp";
    }
    for ($j = 1; $j <= ($i * 2 - 1); $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for ($i = $kolom; $i >= 1; $i--) {
    for ($x = $i; $x < $kolom; $x++) {
        echo "&nbsp&nbsp";
    }
    for ($j = 1; $j <= ($i * 2 - 1); $j++) {
        echo "*";
    }
    echo "<br>";
}
