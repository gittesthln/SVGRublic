var httpObj;
function createXMLHTTPReq( func ) {
  var xmlHttpObj = new XMLHttpRequest();
  if(xmlHttpObj) xmlHttpObj.onreadystatechange = func;
  return xmlHttpObj;
}
function getData() {
  var N = document.getElementById("N").value;
  if(N<3) {
    alert("辺の数が不正です");
    return false;
  }
  httpObj = createXMLHTTPReq(displayPolygon);
  if(httpObj) {
    httpObj.open("GET","./svg-polygon-ajax.php?N=" +
      encodeURI(N),true);
    httpObj.send(null);
  } 
}
function displayPolygon() {
    var polygon;
  if(httpObj.readyState == 4 && httpObj.status == 200) {
    alert(httpObj.responseText);
    polygon = document.getElementById("npolygon");
    polygon.setAttribute("points", httpObj.responseText);
  }
}
