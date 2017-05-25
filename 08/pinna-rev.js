window.onload = function(){
  let Canvas = document.getElementById("Canvas");
  let C1 = document.getElementById("color1");
  let C2 = document.getElementById("color2");
  let Paths = new Array(6).fill(1).map(function() {
    return MKSVGElm(Canvas, "path", {"stroke-width": 6, "fill": "none"},{});
  });
  C1.value = "red";
  C2.value = "green";
  document.getElementById("SetColor").addEventListener("click", DrawFigs, true);
  DrawFigs();
  function DrawFigs() {
    let W1=8, W2=4;
    let Color1 = C1.value;  
    let Color2 = C2.value;  
    [[150, 30, W1, W2, Color1], [144, 30, W1, W2, Color2],
     [80, 20, W1, W2, Color1],  [86.5, 20, W1, W2, Color2],
     [14, 20, 0, 0, Color1],    [10, 20, 0, 0, Color2]].forEach(
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
