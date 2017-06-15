function createXMLHTTPReq( func ) {
  let xmlHttpObj = new XMLHttpRequest();
  if(xmlHttpObj) xmlHttpObj.onreadystatechange = func;
  return xmlHttpObj;
}
let httpObj;
function getData() {
  httpObj = createXMLHTTPReq(displayResult);
  if(httpObj) {
			httpObj.open("GET",`./countPrimes.php?N=1`,true);
			httpObj.send(null);
  }
}
function displayResult() {
  let polygon;
  if(httpObj.readyState == 4 && httpObj.status == 200) {
			console.log(httpObj.responseText);
  }
}
