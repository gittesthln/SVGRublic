<?php
function printHeader($width, $height) {
  print<<<_EOF_
<?xml version="1.0" encoding="utf-8" ?>
   <svg xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        height="$height" width="$width">
   <title>正n角形の表示</title>
_EOF_;
  $GLOBALS['setTags'] = array("svg");
}
function outputSpaces($n) {
  while( $n-- > 0 ) print '  ';
}                         
function outputTag($tagName, $attributes, $close=false){
  outputSpaces(count($GLOBALS['setTags']));  
  print "<$tagName ";                        
  foreach($attributes as $key => $value ) {  
    print $key . '="' . $value . '" ';       
  }                                          
  if($close) {                               
    print '/';                               
  } else {
    array_push($GLOBALS['setTags'],$tagName);
  }                                          
  print ">\n";
}                         
function closeTag() {                        
  outputSpaces(count($GLOBALS['setTags'])-1);
  print '</' . array_pop($GLOBALS['setTags']) . ">\n"; 
}                                            
function closeSVG() {                        
  while (count($GLOBALS['setTags'])>0) {     
    closeTag();
  }
}                                            
?>