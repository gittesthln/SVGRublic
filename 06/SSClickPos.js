let Circle, X, Y, XP, YP, oT, oL, B;//// ref="InitS"
window.onload = function() {//// ref="OnLoad"
  let Colors = {"red":"赤", "yellow":"黄色","green":"緑", //// ref="InitOptS"
                     "blue":"青","gray":"灰色","black":"黒"};
  let tmp, tmpText, Color;
  let SelectColor = document.getElementById("SelectColor");//// ref="Setcolor"
  for( Color in Colors) {//// ref="makeOptS"
    tmp = document.createElement("option");//// ref="createOption"
    tmp.setAttribute("value", Color);//// ref="setValue"
    tmpText = document.createTextNode(Colors[Color]);//// ref="createTextNode"
    tmp.appendChild(tmpText);//// ref="appendTextNode"
    SelectColor.appendChild(tmp);//// ref="appendChild"
  }//// ref="InitOptE"
  XP = document.getElementById("XP");//// ref="getObjectS"
  YP = document.getElementById("YP");
  Circle = document.getElementById("Circle");
  X = document.getElementById("X");
  Y = document.getElementById("Y");//// ref="getObjectE"
  XP.value = Circle.getAttribute("cx");//// ref="GetX"
  YP.value = Circle.getAttribute("cy");//// ref="GetY"
  document.getElementById("field").addEventListener("click",click, false);//// ref="setEventListner"
  document.getElementById("SetColor").onclick = refresh;//// ref="Set"

  B = document.getElementById("canvas").getBoundingClientRect();//// ref="CorrectS"
  oL = Math.floor(B.left)+5;//// ref="SetOffset1"
  oT = Math.floor(B.top)+5; //// ref="SetOffset2"
  refresh();
}
function click(event) {//// ref="ClickS"
  XP.value = event.clientX-oL;
  YP.value = event.clientY-oT;
  refresh();
}//// ref="ClickE"
function refresh() {
  SetText(X,"cx", XP.value);
  SetText(Y,"cy", YP.value);
  Circle.setAttribute("fill", SelectColor.value);
}

function SetText(Element, attrib, Value) {
  let txtNode = document.createTextNode(Value);
  if( Element.firstChild) {
     Element.replaceChild(txtNode, Element.firstChild);
  } else {
     Element.appendChild(txtNode);
  }
  Circle.setAttribute(attrib, Value);
}
