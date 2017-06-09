<?php
function drawPath() {
  $N = $_GET['N'];
  $pathString = MaxSize . ',0';
  for( $i = 1; $i < $N; $i++) {
    $Angle = M_PI*(2.0*$i/$N);
    $pathString .= ' ' . 
      sprintf('%.4f,%.4f', MaxSize*cos($Angle), MaxSize*sin($Angle));
  }
  print $pathString;
}
define("MaxSize",200);
header("Content-type: text");
drawPath();
?>