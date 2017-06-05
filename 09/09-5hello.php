<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>簡単なデータのやり取りの結果</title>
</head>
  <body>
<?php 
  if($_POST['user']!='') {
    print("ようこそ{$_POST['user']}さん\n");
  } else {
?>
  <form method="POST" action="start.php">
    <input type="submit" value="戻る"/>
  </form>
<?php
  }
?>
  </body>
</html>
