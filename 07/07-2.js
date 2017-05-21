"use strict";
x = 1;
console.log(`x=${x}`);
var x = "defined as global";
console.log(`x=${x}`);
{
  var x = "defined as local?";
  console.log(`x=${x}`);
}
console.log(`x=${x}`);
let v ;
console.log(`v=${v}`);
//      let
v = "defined as global";
{
  var x = "defined as local";
  console.log(`x=${x}`);
}
console.log(`v=${v}`);
