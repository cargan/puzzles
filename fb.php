<?php

//AMAZON challange
//https://amazon.interviewstreet.com/challenges/dashboard/#problem/4fd653336df28

fscanf(STDIN, "%d\n", $number);
$input = [];
while ($number--) {
    fscanf(STDIN, "%d\n", $it);
    $input[] = $it;
}

function getDividers($number) {
    if (!($number % 2)) {
        return array(2);
    }
    $div = [];
    for ($i=3;$i<=$number;$i++) {
        if (!($number % $i)) {
            $div[] = $i;
        }
    }

    return $div;
}


function getDivider($n, $fibo) {
    $dividers = getDividers($n);
    print_r($dividers);
    $tmp = [];
    foreach ($dividers as $divider) {
        foreach ($fibo as $f) {
            if ($f>1 && !($f % $divider)) {
                $tmp[$f] = [$divider];
            }
        }
    }

    if (!$tmp) {
        return array();
    }

    ksort($tmp);
    $key = key($tmp);
    $value = min($tmp[$key]);

    return array($key, $value);
}

$fibo = [0, 1];
$fibo = buildFibbonace(pow(2, 18), $fibo);

function buildFibbonace($n, $fibo) {
    while (true) {
        $c = count($fibo);
        $val = $fibo[$c-2] + $fibo[$c-1];
        if ($val > $n) {
            break;
        }
        $fibo[] = $val;
    }
    return $fibo;
}


$res = '';
foreach ($input as $n) {
    $data = getDivider($n, $fibo);
    if ($data) {
        $res .= "{$data[0]} {$data[1]} \n";
    }
}

fwrite(STDOUT, $res);
