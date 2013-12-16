<?php
//Cache mashine implementation
//can be extended to provide smallest nominals and etc;
//
//Problam: cache mashine gives 200, 50 and 20 dollar amount notes; please find amount of notes for the amount;
//

$input = 210;
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
            }
        }
    }
}

//bigest
if (count($result)) {
    print_r(end($result))
}
print_r($result);
exit;
