<?php
$primes = [];
array_push($primes,2);
for($i=3;$i<10000; $i+=2) {
    $flag = true;
    for($j=0;$j<count($primes);$j++) {
        if($i % $primes[$j] == 0) {
             $flag = false;
            break;
        }
        if($i< $primes[$j]*$primes[$j]) break;
    }
    if($flag) array_push($primes, $i);
}
print_r($primes);

?>