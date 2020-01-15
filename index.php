<?php
$winner = 'n';
$box = array('','','','','','','','','');
if (isset($_POST["submitbtn"])) {
   $box[0] = $_POST["box0"];
   $box[1] = $_POST["box1"];
   $box[2] = $_POST["box2"];
   $box[3] = $_POST["box3"];
   $box[4] = $_POST["box4"];
   $box[5] = $_POST["box5"];
   $box[6] = $_POST["box6"];
   $box[7] = $_POST["box7"];
   $box[8] = $_POST["box8"];
   //print_r($box);
   if (($box[0]=='×' && $box[1]=='×' && $box[2]=='×') || ($box[3]=='×' && $box[4]=='×' && $box[5]=='×') || ($box[6]=='×' && $box[7]=='×' && $box[8]=='×')
      || ($box[0]=='×' && $box[3]=='×' && $box[6]=='×') || ($box[1]=='×' && $box[4]=='×' && $box[7]=='×') || ($box[2]=='×' && $box[5]=='×' && $box[8]=='×')
      || ($box[0]=='×' && $box[4]=='×' && $box[8]=='×') || ($box[2]=='×' && $box[4]=='×' && $box[6]=='×')) {
       $winner = '×';
       print("×の勝ち");
      }
   $blank = 0;
   for ($i=0; $i<=8; $i++) {
       if ($box[$i] == '') {
           $blank = 1;
       }
   }
   if ($blank == 1 && $winner == 'n') {
       $i = rand() % 8;
       while ($box[$i] != '') {
           $i = rand() % 8;
       }
       $box[$i] = '〇';
    if (($box[0]=='〇' && $box[1]=='〇' && $box[2]=='〇') || ($box[3]=='〇' && $box[4]=='〇' && $box[5]=='〇') || ($box[6]=='〇' && $box[7]=='〇' && $box[8]=='〇')
    || ($box[0]=='〇' && $box[3]=='〇' && $box[6]=='〇') || ($box[1]=='〇' && $box[4]=='〇' && $box[7]=='〇') || ($box[2]=='〇' && $box[5]=='〇' && $box[8]=='〇')
    || ($box[0]=='〇' && $box[4]=='〇' && $box[8]=='〇') || ($box[2]=='〇' && $box[4]=='〇' && $box[6]=='〇')) {
        $winner = '〇';
        print("〇の勝ち");
       }  
   } else if ($winner == 'n') {
       $winner = 't';
       print("引き分け");
   }
}
?>
<html>
<head>
<title>〇×ゲーム</title>
<style type="text/css">
#box {
    width: 100px;
    height: 100px;
    font-size: 70px;
    text-align: center;
}
</style>
</head>
<body>
<form name="sanmokunarabe" method="post" action="index.php">
<?php
for ($i=0; $i<=8; $i++) {
    printf('<input type="text" name="box%s" value="%s" id="box">', $i, $box[$i]);
    if ($i == 2 || $i == 5 || $i == 8) {
        print('<br>');
    }
}
if ($winner == 'n') {
   print('<input type="submit" name="submitbtn" value="入力">');
} else {
    print('<input type="button" name="newgamebtn" value="もう一回" onclick="window.location.href=\'index.php\'">');
}
?>

</body>
</html>