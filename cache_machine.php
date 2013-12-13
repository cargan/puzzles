<?php

$inputs = [40, 80, 110, 210, 340, 230, 170, 520, 670];

$nominals = array(
    200, 50, 20
);

foreach ($inputs as $input) {
    $result = checkAvailability ($nominals, $input);
    if ($result == -1) {
        die('BAD AMOUNT');
    } else {
        print_r(array($input, $result));
    }
}

die('THE END');


function checkAvailability($nominals, $amount)
{
    $go = [];
    $count = count ($nominals);

    foreach ($nominals as $k=>$nominal) {
        while ($nominal && $amount > 0) {
            if ($nominal > $amount) {
                $nominal = null;
            } else {
                if (($count-1) != $k && ($amount - $nominal != 0 ) && (($amount - $nominal) < $nominals[$k+1])) {
                    $nominal = null;
                    continue;
                }

                if (($count-1) != $k && $amount < $nominal * 2) {
                    $nn = $nominals[$k+1];
                    if (($amount % $nn) == 0) {
                        $nominal = null;
                        continue;
                    }
                }

                $amount -= $nominal;
                if (!isset($go[$nominal])) {
                    $go[$nominal] = 0;
                }
                $go[$nominal] ++;
            }
        }
    }

    if ($amount) {
        return -1;
    } else {
        return $go;
    }
}

