<?php
require_once('svg-func.php');
function drawPath() {
  $N = $_GET['N'];   
  $pathString = MaxSize . ',0';  
  for( $i = 1; $i < $N; $i++) {  
    $Angle = M_PI*(2.0*$i/$N);   
    $pathString .= 
      sprintf(' %.4f,%.4f', MaxSize*cos($Angle), MaxSize*sin($Angle));  
  }                               
  outputTag('polygon',             
    array('points'=>$pathString, 'fill'=>'blue', 
          'stroke-width'=>4, 'stroke'=>'red')); 
}                  
define("MaxSize",200);
header("Content-type: image/svg+xml");
printHeader('100%','100%');           
outputTag('g', array('transform'=>'translate(210,210)'));
drawPath();
closeSVG(); 
?>