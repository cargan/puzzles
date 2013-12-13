<?php
fscanf(STDIN, "%d\n", $number);
$input = [];
while ($number--) {
    fscanf(STDIN, "%d\n", $it);
    $input[] = $it;
}


function getDividers($number) {
    $div = [];
    for ($i=2;$i<=$number;$i++) {
        if (!($number % $i)) {
            $div[] = $i;
        }
    }
    return $div;
}


function getDivider($n, $fibo) {
    $dividers = getDividers($n);
    if (count($dividers) === 1) {
        return array($n, reset($dividers));
    }

    foreach ($dividers as $divider) {
        foreach ($fibo as $f) {
            if ($f>1 && !($f % $divider)) {
                return [$f, $divider];
            }
        }
    }
}


$fibo = [0, 1];
$fibo = buildFibbonace(max($input), $fibo);

$res = '';
foreach ($input as $n) {
    $data = getDivider($n, $fibo);
    $res .= "{$data[0]} {$data[1]} \n";
}
fwrite(STDOUT, $res);



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
