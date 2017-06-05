<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>サーバーに伝えられる情報</title>
    <link rel="stylesheet" type="text/css" href="table.css">
  </head>
  <body>
    <div class="table">
<?php
foreach($_SERVER as $key => $val) {
  print <<<_EOL_
      <div class="Row">
        <div class="Cell">$key</div>
        <div class="Cell">$val</div>
      </div>
_EOL_;
}
?>
    </div>
  </body>
</html>