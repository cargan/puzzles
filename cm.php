<?php


// $inputs = [40, 80, 110, 210, 340, 230, 170, 520, 670];
//

$input = 1210;
$nominals = array(
    200, 50, 20
);

$gogo = array(
    200 => 0,
    50  => 0,
    20  => 0
);
foreach ($nominals as $nominal) {
    $gogo[$nominal] = ($input - ($input % $nominal)) / $nominal;
}

print_r($gogo);
$result = [];
for ($x=0;$x<=$gogo[200];$x++) {
    for ($y=0;$y<=$gogo[50];$y++) {
        for ($z=0;$z<=$gogo[20];$z++) {

            $amount = $x*200 + $y*50 + $z*20;

            if ($amount == $input) {
                $data['200'] = $x;
                $data['50'] = $y;
                $data['20'] = $z;
                $data['amount'] = $amount;
                $result[] = $data;
                // break;

// print_r($result);
// exit;
            }
        }
    }
}

print_r($result);
exit;
