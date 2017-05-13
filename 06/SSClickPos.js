let Circle, X, Y, XP, YP, oT, oL, B;
window.onload = function() {
  let Colors = {"red":"赤", "yellow":"黄色","green":"緑", 
                "blue":"青","gray":"灰色","black":"黒"};
  let SelectColor = document.getElementById("SelectColor");
  for( let Color in Colors) {
    let opt = MKHTMLElm(SelectColor,"option", {value: Color},{});
    opt.appendChild(document.createTextNode(Colors[Color]));
  }
  XP = document.getElementById("XP");
  YP = document.getElementById("YP");
  Circle = document.getElementById("Circle");
  X = document.getElementById("X");
  Y = document.getElementById("Y");
  XP.value = Circle.getAttribute("cx");
  YP.value = Circle.getAttribute("cy");
  document.getElementById("field").addEventListener("click",click, false);
  document.getElementById("SetColor").addEventListener("click",refresh, false); 
  B = document.getElementById("canvas").getBoundingClientRect();
  oL = Math.floor(B.left)+5;
  oT = Math.floor(B.top)+5; 
  refresh();
}
function click(event) {
  XP.value = event.clientX-oL;
  YP.value = event.clientY-oT;
  refresh();
}
function refresh() {
  SetText(X,"cx", XP.value);
  SetText(Y,"cy", YP.value);
  SetAttributes(Circle,{fill:SelectColor.value, cx:XP.value, cy:YP.value});
}
function SetText(Element, attrib, Value) {
  let txtNode = document.createTextNode(Value);
  if(Element.firstChild) {
     Element.replaceChild(txtNode, Element.firstChild);
  } else {
     Element.appendChild(txtNode);
  }
}
