<?php
date_default_timezone_set("ASIA/Tokyo");
$today = time();//+24*60*60*3*7;//print "$today ";
$lastday = $today + 24*60*60*3*7;
$Prefix = "VIDEO/SVG17-";
$dataFile = "Lecture.dat";
$revisedDate = filemtime($dataFile);
$Infos = json_decode(file_get_contents($dataFile));

$year = date("Y",$revisedDate);
$month = date("n",$revisedDate);
$Y = $year;
if($month < 4) $Y--;
$revDate = date("Y年n月j日",$revisedDate);
print <<<_EOL_
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>SVGではじめるGraphical Web({$Y}年度版)--情報メディア専門ユニットI</title>
</head>
<body>
<h1>SVGではじめるGraphical Web({$Y}年度版)--情報メディア専門ユニットI</h1>
{$revDate}改定
<A href="http://www.hilano.org/hilano-lab">平野研究室トップへ</A>
<h2>授業配布資料</h2>
<p>pdfファイルからソースがコピーできます。
pdfファイルの中にリンクが張ってあります。</p>
<ul>
<li><a href="00svg-all.pdf">授業配布資料</a></li>
</ul>
<h2>授業前の準備</h2>
演習時間内に印刷を行うためにプリンタドライバをインストールしてください。
<a href="driverDownload.pdf">インストールするための資料</a>を参考にしてください。
<h1>予習教材</h1>
<p>ビデオはブラウザ内でうまく閲覧できませんでしたので、
右クリックで「名前を付けてリンク先を保存」を選択してください。
そのファイルを別のアプリで見てください。</p>
_EOL_;
for($k=0;$k<count($Infos);$k++){
  $Info = $Infos[$k];
  $name = $Info->{"name"};
  list($m, $d) = mb_split("\s|/", $Info->{"date"});
  $ft = mktime(23,59,59,$m,$d,$year);//print $ft;
  if($ft<$today) continue;
  if($ft> $lastday) break;
//  print "{$m}月{$d}日\n";
  $kk = sprintf("%02d",$k+1);
  print '<h2>' . $Info->{"date"} . '</h2>';
  $Videos = $Info->{"Videos"};
  showLink("UnitISVG$kk.pdf","予習内容資料");
  for($i=0;$i<count($Videos); $i++) {
    $V = $Videos[$i];
    print '<h3>' . $V->{"title"} . '</h3>';
    $No = $i+1;
    showLink("$Prefix$kk-$No.mp4","ビデオ教材");
    showLink("$Prefix$kk-$No.pdf","ビデオ内のPDFファイル");
    $files = $V->{"files"};
    for($j=0;$j<count($files);$j++) {
        if($files[$j]->{"name"}) {
          showLink($files[$j]->{"name"}, $files[$j]->{"comment"});
        } else {
          showLinkS($files[$j]->{"file"}, $files[$j]->{"comment"});
        }            
    }
  }
}
function showLink($file,$message) {
  if(file_exists($file)) {
      print "<div><a href=\"$file\">$message</a></div>";
  } else {
      print "<div>$message</div>";
  }
}
function showLinkS($file,$message) {
  if(file_exists($file)) {
      print "<div><a href=\"sendfile.php?file=$file\">$message</a></div>";
  } else {
      print "<div>$message</div>";
  }
}
?>
</body></html>
