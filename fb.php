<?php
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

    if (count($dividers) === 1) {
        return array($n, reset($dividers));
    }

    $tmp = [];
    foreach ($dividers as $divider) {
        foreach ($fibo as $f) {
            if ($f>1 && !($f % $divider)) {
                $tmp[] = [$f, $divider];
            }
        }
    }

    if (count($tmp) == 1) {
        return reset($tmp);
    } else {
        asort($tmp);
        $min = [];
        foreach ($tmp as $it) {
            if (!$min) {
                $min = $it;
            } else {
                if ($min[0] < $it[0]) {
                    return reset($min);
                } else if ($min[0] == $it[0]) {
                    if ($min[1] < $it[1]) {
                        $min = $it;
                    }
                }
            }
        }

        return reset($min);
    }

    return array(-1, -1);
}


$fibo = [0, 1];
$fibo = buildFibbonace(max($input), $fibo);

$res = '';
foreach ($input as $n) {
    $data = getDivider($n, $fibo);
print_r($data);exit;
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
