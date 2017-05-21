console.log(`x=${x}`);
var x = "defined as global";
console.log(`x=${x}`);
{
  var x = "defined as local?";
  console.log(`x=${x}`);
}
console.log(`x=${x}`);
let v;
console.log(`v=${v}`);
//let
v = "defined as global";
{
  let v = "defined as local";
  console.log(`v=${v}`);
}
console.log(`v=${v}`);
