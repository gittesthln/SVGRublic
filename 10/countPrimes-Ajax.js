function createXMLHTTPReq( func ) {
  let xmlHttpObj = new XMLHttpRequest();
  if(xmlHttpObj) xmlHttpObj.onreadystatechange = func;
  return xmlHttpObj;
}
function getData() {
    let table = document.getElementsByTagName("table")[0];
    let request = 0, start = new Date();
  for(let i=0; i<10; i++) {
    let httpObj = createXMLHTTPReq(function(){
      if(httpObj.readyState == 4 && httpObj.status == 200) {
        let tr = MKHTMLElm(table,"tr",{}, {});
        MKHTMLElm(tr, "td", {}, {}).
            appendChild(document.createTextNode(`${i*1000000+1}`));
        MKHTMLElm(tr, "td", {}, {}).
              appendChild(document.createTextNode(httpObj.responseText));
          request--;
          console.log(new Date()-start);
          if(request <= 0) console.log("done");
      }
    });
      if(httpObj) {
          request++;
      httpObj.open("GET",`./countPrimes.php?N=${i*1000000+1}`,true);
      httpObj.send(null);
    }
  }
}
