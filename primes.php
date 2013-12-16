<?php
# Given an integer, print out all the prime numbers smaller than that integer.

if (!isset($argv[1])) {
  die('No number provided.');
}
$number = (int)$argv[1];

if (!$number) {
  die('Could not recignize a number.');
}


function isPrimeTwo($n) {
  $prime = true;
  if ($n > 2 && !($n % 2)) {
    return false;
  }

  if ($n > 3 && !($n % 3)) {
    return false;
  }

  return isPrime($n);

  return (bool) $prime;
}


function isPrime($n) {
  if ($n == 1) {
    return true;
  }

  $prime = true;
  $m = $n;
  while (--$m) {
    if ($m > 1 && !($n % $m)) {
      $prime = false;
      break;
    }
  }
  return (bool) $prime;
}


$primes = [];
for ($i=2; $i<$number; $i++) {
  if (isPrime($i)) {
    $primes[] = $i;
  }
}

print_r($primes);

