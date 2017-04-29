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
<!-- 解答のほうは更新していません。--></p>
<p>pdfファイルの中にリンクが張ってあります。</p>
<ul>
<li><a href="00svg-all.pdf">授業配布資料</a></li>
</ul>
<h2>授業前の準備</h2>
演習時間内に印刷を行うためにプリンタドライバをインストールしてください。
<a href="driverDownload.pdf">インストールするための資料</a>を参考にしてください。
<h1>予習教材</h1>
<p>ビデオはブラウザ内でうまく閲覧できませんでしたので、右クリックで「名前を付けてリンク先を保存」を選択してください。そのファイルを別のアプリで見てください。</p>
_EOL_;
$today = time();//+24*60*60*3*7;//print "$today ";
$lastday = $today + 24*60*60*3*7;
$Prefix = "VIDEO/SVG17-";
$revisedDate = filemtime("Lecture.dat");
$Infos = json_decode(file_get_contents("Lecture.dat"));
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
    print <<<_EOL_
<div><a href=></a></div>
<div><a href="$Prefix$kk-$No.pdf"></a></div>
_EOL_;
    $files = $V->{"files"};
    for($j=0;$j<count($files);$j++) {
      showLink($files[$j]->{"name"}, $files[$j]->{"comment"});
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
function showLinkV($file,$message) {
    if(file_exists($file)) {
        print "<div><video src=\"$file\" width=\"800\" height=\"600\" controls>$message</video></div>";
    } else {
        print "<div>$message</div>";
    }
}
/*
print <<<_EOL_
 <h3><a href="closed.php">公開終了の内容</a></h3>
タイトルだけです。動画、ファイル等はダウンロードできません。サーバーから消去しています。
_EOL_;
*/
/*
<H2>SVGの例</H2>
授業用資料の中にあるSVGファイルの例を見ることができます。<h2>第2章</h2>
<table>
<tr><td>リスト2.1</td><td><a href="first.svg">XML文書としてエラーがあった場合</a></td>
<td>リスト2.2</td><td><a href="linecap.svg">直線の例</a></td></tr>
<tr><td>リスト2.3</td><td><a href="fick1.svg">フィックの錯視</a></td>
<td>リスト2.4</td><td><a href="muller-lyer.svg">ミューラー ライヤーの錯視</a></td></tr>
<tr><td>リスト2.5</td><td><a href="poggendorff.svg">ポッケンドルフ錯視</a></td>
<td>リスト2.6</td><td><a href="colorinenv.svg">周りの濃度で見え方が異なる</a></td></tr>
<tr><td>リスト2.7</td><td><a href="svg-hermann-line.svg">ヘルマン格子</a></td>
<td>リスト2.8</td><td><a href="svg-ellipse.svg">周りの大きさで見え方が変わる</a></td></tr>
<tr><td>リスト2.9</td><td><a href="svg-gradient1.svg">線形グラデーション</a></td>
<td>リスト2.10</td><td><a href="svg-gradient2.svg">傾いた方向の線形グラデーション</a></td></tr>
<tr><td>リスト2.11</td><td><a href="svg-gradient-bb-vs-us.svg"> gradientUnitsの値の違い</a></td>
<td>リスト2.12</td><td><a href="svg-raidalgradiation2.svg">放射グラデーション(userSpaceOnUseの場合)</a></td></tr>
<tr><td>リスト2.13</td><td><a href="svg-raidalgradiation3.svg">放射グラデーション(objectBoundingBoxの場合)</a></td>
<td>リスト2.14</td><td><a href="svg-opacity2.svg">円の内部に不透明度を設定した例</a></td></tr>
</tr>
</table>
<h2>第3章</h2>
<table>
<tr><td>リスト3.1</td><td><a href="svg-polygon5.svg">    &lt;polygon&gt; 要素の例</a></td>
<td>リスト3.2</td><td><a href="svg-linejoin.svg">    linejoin属性の違い</a></td></tr>
<tr><td>リスト3.3</td><td><a href="svg-vint.svg">ヴィントの錯視図形</a></td>
<td>リスト3.4</td><td><a href="svg-arc.svg">楕円の弧を描く</a></td></tr>
<tr><td>リスト3.5</td><td><a href="svg-kanisza.svg">カニッツァの主観的三角形</a></td>
<td>リスト3.6</td><td><a href="svg-bezier.svg">Bezier曲線の例</a></td></tr>
<tr><td>リスト3.7</td><td><a href="svg-bezier-circle4.svg">1/4円をBezier曲線で近似する</a></td>
<td>リスト3.8</td><td><a href="svg-rotate-full.svg">回転の中心を指定した    rotate</a></td></tr>
<tr><td>リスト3.9</td><td><a href="svg-skew.svg">座標軸方向への歪み</a></td>
<td>リスト3.10</td><td><a href="svg-hermann.svg">ヘルマン格子(パターンで描く)</a></td></tr>
<tr><td>リスト3.11</td><td><a href="patterndef1.svg">二つの線形グラデーションを市松模様に並べた例</a></td>
<td>リスト3.12</td><td><a href="svg-oouchi-rev.svg">浮動する円</a></td></tr>
<tr><td>リスト3.13</td><td><a href="svg-image.svg">    &lt;image&gt; 要素の使用例</a></td>
<td>リスト3.14</td><td><a href="svg-image-pattern.svg">画像を    &lt;pattern&gt; 要素で使用する</a></td></tr>
<tr><td>リスト3.15</td><td><a href="svg-image-pattern-mask.svg">画像をくりぬく(    &lt;mask&gt; 要素)</a></td>
</table>
<h2>第4章</h2>
<table>
<tr><td>リスト4.1</td><td><a href="svg-animation-transform.svg">図形の平行移動のアニメーション</a></td>
<td>リスト4.2</td><td><a href="svg-animation-rotate.svg">図形の回転のアニメーション</a></td></tr>
<tr><td>リスト4.3</td><td><a href="svg-moveandsizechange.svg">拡大縮小と移動のアニメーション</a></td>
<td>リスト4.4</td><td><a href="svg-animation-color.svg">色のアニメーション</a></td></tr>
<tr><td>リスト4.5</td><td><a href="svg-motion-along-path.svg">道のりに沿ったアニメーション</a></td>
<td>リスト4.6</td><td><a href="svg-animation-w-rect.svg">長方形の幅を変えるアニメーション</a></td></tr>
<tr><td>リスト4.7</td><td><a href="svg-bezier-circle4-square.svg">    &lt;path&gt; 要素の属性    dにアニメーションをつける</a></td>
<td>リスト4.8</td><td><a href="svg-mask.svg">グラデーションにアニメーションをつける</a></td></tr>
<tr><td>リスト4.9</td><td><a href="svg-animation-visibility.svg">図形が7秒後消える</a></td>
<td>リスト4.10</td><td><a href="svg-animation-transform-values.svg">初めの位置に戻る</a></td></tr>
<tr><td>リスト4.11</td><td><a href="svg-stopwatch.svg">ストップウォッチ？</a></td>
<td>リスト4.12</td><td><a href="svg-signal.svg">信号機のシミュレーション</a></td></tr>
<tr><td>リスト4.13</td><td><a href="svg-racing-recs.svg">追いかけっこをする長方形</a></td>
</table>
<h2>第5章</h2>
<table>
<tr><td>リスト5.1</td><td><a href="svg-showtext.svg">文字列の表示</a></td>
<td>リスト5.2</td><td><a href="svg-text-with-tspan.svg"> tspanの使用例</a></td></tr>
<tr><td>リスト5.3</td><td><a href="svg-show-text-gradiation-prep.svg">文字列をグラデーションで塗る</a></td>
<td>リスト5.4</td><td><a href="svg-text-along-path.svg">道程に沿った文字の表示</a></td></tr>
<tr><td>リスト5.5</td><td><a href="svg-moving-text-along-circle.svg">円周上を文字列が移動するアニメーション</a></td>
</table>
<h2>第6章</h2>
<table>
<tr><td>リスト6.1</td><td><a href="svg-filterGauss.svg">GaussianBlurフィルタ</a></td>
<td>リスト6.2</td><td><a href="svg-bergen0.svg">バーゲンのきらめき効果</a></td></tr>
<tr><td>リスト6.3</td><td><a href="svg-addshadow.svg">画像に影をつける</a></td>
<td>リスト6.4</td><td><a href="svg-colorchart.svg">加色混合と減色混合によるカラーチャート図</a></td></tr>
<tr><td>リスト6.5</td><td><a href="svg-CMatrix.svg"> feColorMatrixの例</a></td>
<td>リスト6.6</td><td><a href="svg-colorhue-Ex.svg">色相環</a></td></tr>
<tr><td>リスト6.7</td><td><a href="svg-feflood.svg"> feFloodの例</a></td>
<td>リスト6.8</td><td><a href="svg-feComposite.svg"> feCompositeの例</a></td></tr>
<tr><td>リスト6.9</td><td><a href="svg-filterturbulance.svg"> feTurbulenceの例</a></td>
</table>
<h2>第7章</h2>
<table>
<tr><td>リスト7.1</td><td><a href="svg-js-click.svg">マウスのクリックを検出するSVG(その1)</a></td>
<td>リスト7.2</td><td><a href="svg-js-click-rev.svg">マウスのクリックを検出するSVG(その2) -- イベントハンドラの登録</a></td></tr>
<tr><td>リスト7.3</td><td><a href="svg-js-click2.svg">マウスのクリックを検出するSVG(その3)</a></td>
<td>リスト7.4</td><td><a href="svg-js-click3.svg">マウスのクリックを検出するSVG(その3)</a></td></tr>
<tr><td>リスト7.5</td><td><a href="svg-js-showclickpos.svg">クリックした位置をSVG内に表示する</a></td>
<td>リスト7.6</td><td><a href="svg-js-showclickpos2.svg">クリックした位置をSVG内に表示する(改良版)</a></td></tr>
<tr><td>リスト7.7</td><td><a href="svg-js-click-rev2.svg">マウスのクリックを検出するSVG(その1)の改良</a></td>
<td>リスト7.8</td><td><a href="svg-event-check.svg">イベントバブリングとイベントキャプチャリングの確認</a></td></tr>
<tr><td>リスト7.9</td><td><a href="svg-js-drag.svg">ドラッグの例</a></td>
<td>リスト7.10</td><td><a href="svg-js-drag-rev.svg">ドラッグ処理の改良</a></td></tr>
<tr><td>リスト7.11</td><td><a href="svg-filterturbulance-interactive.svg">    feTurbulanceフィルタフィルタのパラメータをスクロールバーで設定する</a></td>
<td>リスト7.12</td><td><a href="svg-js-add-lines.svg">画面上に直線を引く</a></td></tr>
<tr><td>リスト7.13</td><td><a href="svg-cycloid.svg">サイクロイドを描く</a></td>
<td>リスト7.14</td><td><a href="make-svg-elm.js">DOMの要素を新規に作成し、属性を設定する関数群(make-svg-elm.js)</a></td></tr>
<tr><td>リスト7.15</td><td><a href="svg-js-zollner.svg">ツェルナーの錯視</a></td>
<td>リスト7.16</td><td><a href="svg-pinna.svg">バインジオ ピンナの錯視</a></td></tr>
<tr><td>リスト7.17</td><td><a href="svg-js-clickanimation2.svg">10秒後に色が変わります</a></td>
<td>リスト7.18</td><td><a href="svg-cycloid-animation.svg">サイクロイドを描く --- アニメーション版</a></td></tr>
<tr><td>リスト7.19</td><td><a href="show-text-color.svg">文字の表示色と文字名が異なる--- ノートレ版</a></td>
<td>リスト7.20</td><td><a href="ShowSetClickPos4.html">クリック位置をHTMLで表示し、HTMLのデータからSVGの図形を動かす</a></td></tr>
<tr><td>リスト7.21</td><td><a href="HTML.css">基本的なCSSファイル</a></td>
<td>リスト7.22</td><td><a href="svg-cycloid-animation-with-closure3.svg">サイクロイドを描く --- アニメーション版(グローバル変数なし)</a></td></tr>
</tr>
</table>
<h2>第8章</h2>
<table>
<tr><td>リスト8.1</td><td><a href="npolygon-server.html">正n角形を書く (npolygon-server.html)</a></td>
<td>リスト8.2</td><td><a href="svg-func.php">SVGを出力するための関数 (svg-func.php)</a></td></tr>
<tr><td>リスト8.3</td><td><a href="svg-polygon.php">正n角形を書く (svg-polygon.php)</a></td>
<td>リスト8.4</td><td><a href="server.php">サーバに伝えられる情報を調べる (server.php)</a></td></tr>
<tr><td>リスト8.5</td><td><a href="test-ajax.html">Ajaxを利用した正多角形の表示 (test-ajax.html)</a></td>
<td>リスト8.6</td><td><a href="Ajax.js">Ajaxを取り扱うJavaScriptファイル(Ajax.js)</a></td></tr>
<tr><td>リスト8.7</td><td><a href="svg-polygon-ajax.php">頂点の座標を計算するPHPプログラム (svg-polygon-ajax.php)</a></td>
<td>リスト8.8</td><td><a href="example-json3.html">JSONデータの処理の例 (example-json3.html)</a></td></tr>
<tr><td>リスト8.9</td><td><a href="ShowSetClickPos-jQuery.html">クリック位置をHTMLで表示し、HTMLのデータからSVGの図形を動かす (jQuery版)</a></td>
<td>リスト8.10</td><td><a href="Ajax-jQuery.js">正n角形を描く(Ajax-jQuery版)(Ajax-jQuery.js)</a></td></tr>
</tr>
</table>
<h2>第9章</h2>
<table>
<tr><td>リストC.1</td><td><a href="testScope.html">変数のスコープ (testScope.html)</a></td>
</table>
<H2>授業用資料</H2>
<a href="bezier-interactive-step.html">Bezier 曲線を操作する</a>
*/
?>
</body></html>
