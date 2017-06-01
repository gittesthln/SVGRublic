let Storage = window.localStorage;
//let Storage = window.sessionStorage;
window.onload = function(){
  let Canvas = document.getElementById("Canvas");
  let Cs = document.querySelectorAll('input[type="text"]');
  let Paths = new Array(6).fill(1).map(function() {
    return MKSVGElm(Canvas, "path", {"stroke-width": 6, "fill": "none"},{});
  });
  let Colors = Storage.C?JSON.parse(Storage.C):["red", "green"];
  Colors.forEach(function(C,i){Cs[i].value = C;});
  document.getElementById("SetColor").addEventListener("click", DrawFigs, true);
  DrawFigs();
  function DrawFigs() {
    let W1=8, W2=4;
    Colors.forEach(function(C,i, Colors){return Colors[i] = Cs[i].value;});
    Storage.C = JSON.stringify(Colors);
    [[150, 30, W1, W2, Colors[0]], [144, 30, W1, W2, Colors[1]],
     [80, 20, W1, W2, Colors[0]], [86.5, 20, W1, W2, Colors[1]],
     [14, 20, 0, 0, Colors[0]],   [10, 20, 0, 0, Colors[1]]].forEach(
      function(Param, No) {
        let [R, sR, W, W2, Color] = Param;        
        let d = "M" + 
          Array(720).fill(0).map(function(dummy,i) {
            let Ang= Math.PI*i/180/2;
            let R0=R+sR*(Math.cos(W*Ang)*Math.cos(W2*Ang));
            return `${R0*Math.cos(Ang)},${R0*Math.sin(Ang)}`;
          }).join(" ")+"z";
        SetAttributes(Paths[No], {"d": d, "stroke": Color});
     })
  }
}
