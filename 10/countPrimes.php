<?php
$start = (array_key_exists('N', $_GET))?$_GET['N']:$argv[1];
$step  = 100*10000;
$limit = 10000;
$primes = [];
array_push($primes,2);
for($i=3;$i<$limit; $i+=2) {
    $flag = true;
    for($j=0;$j<count($primes);$j++) {
				$p = $primes[$j];
        if($i % $p == 0) {
             $flag = false;
            break;
        }
        if($i< $p*$p) break;
    }
    if($flag) array_push($primes, $i);
}
if($start < $limit ) {
  $c = count($primes);
	$start = $limit;
} else {
  $c = 0;
}
$start = $start - $start % 2 + 1;
$pNo = count($primes);
$L = ($start < $step)?$step: ($start + $step);
for($i=$start;$i<$L; $i+=2) {
    $flag = true;
//
for($j=0;$j<$pNo;$j++) {
//    for($j=0;$j<count($primes);$j++) {
				$p = $primes[$j];
        if($i % $p == 0) {
             $flag = false;
            break;
        }
        if($i< ($p+2)*($p+2)) break;
    }
    if($flag) $c++;
}
print $c;
?>