let Storage = window.localStorage;
//let Storage = window.sessionStorage;
window.onload = function(){
  let Canvas = document.getElementById("Canvas");
  let Cs = document.querySelectorAll("input[type=\"text\"]");
  let Paths = new Array(6).fill(1).map(function() {
    return MKSVGElm(Canvas, "path", {"stroke-width": 6, "fill": "none"},{});
  });
  let Color = Storage.C?JSON.parse(Storage.C):["red", "green"];
  Cs.forEach(function(C,i){Cs[i].value = Color[i];});
  document.getElementById("SetColor").addEventListener("click", DrawFigs, true);
  DrawFigs();
  function DrawFigs() {
    let W1=8, W2=4;
    let Color = Array.prototype.map.call(Cs,function(C){return C.value;});
    Storage.C = JSON.stringify(Color);
    [[150, 30, W1, W2, Color[0]], [144, 30, W1, W2, Color[1]],
     [80, 20, W1, W2, Color[0]], [86.5, 20, W1, W2, Color[1]],
     [14, 20, 0, 0, Color[0]],   [10, 20, 0, 0, Color[1]]].forEach(
      function(Param, No) {
        let R=Param[0], sR = Param[1], W = Param[2],
            W2 = Param[3], Color = Param[4];        
        let d = "M", i, Ang, R0;
        for(i=0;i<720;i++) {
          Ang= Math.PI*i/180/2;
          R0=R+sR*(Math.cos(W*Ang)*Math.cos(W2*Ang));
          d += `${R0*Math.cos(Ang)},${R0*Math.sin(Ang)} `;
        }
        SetAttributes(Paths[No], {"d": d+"z", "stroke": Color});
     })
  }
}
