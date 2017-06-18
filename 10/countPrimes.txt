<?php
function isPrime($n, &$Primes, $No) {
  for($j=0;$j<$No;$j++) {
    $p = $Primes[$j];
    if($n % $p == 0) return false;
    if($n < $p*$p+$p) break;
  }
  return true;
}
$start = (array_key_exists('N', $_GET))?$_GET['N']:$argv[1];
$step  = 10*10000;
$limit = 10000;
$primes = [2];
for($i=3;$i<$limit; $i+=2) {
  if(isPrime($i, $primes, count($primes))) array_push($primes, $i);
}
$c = 0;
if($start < $limit ) {
  $c = count($primes);
  $start = $limit;
}
$start = $start - $start % 2 + 1;
$pNo = count($primes);
$L = ($start < $step)?$step: ($start + $step);
for($i=$start;$i<$L; $i+=2) {
  if(isPrime($i, $primes, $pNo)) $c++;
}
print $c;
?>