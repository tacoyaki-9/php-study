<?php
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$player_handに代入してください
(3) コンピューターの手は$pc_handに代入してください
**/
if ( isset( $_POST['playerHand'] ) ) {
     $hand = $_POST['playerHand'];
} else {
    //echo '受け取れてないよ';
}

while(1){
    $ans = rand(0,5);
    if($ans == 0 || $ans == 2 || $ans == 5){
        break;
    }
}
if(($ans == 0 && $hand == 5) || ($ans == 2 && $hand == 0) || ($ans == 5 && $hand == 2)){
    $result = "勝ち！";
}else if(($ans == 0 && $hand == 2) || ($ans == 2 && $hand == 5) || ($ans == 5 && $hand == 0)){
    $result = "負け！";
}else{
    $result = "あいこ";
}
//echo $result;

if($hand == 0){
    $player_hand = "ぐー";
}else if($hand == 2){
    $player_hand = "ちょき";
}else{
    $player_hand = "ぱー";
}

if($ans == 0){
    $pc_hand = "ぐー";
}else if($ans == 2){
    $pc_hand = "ちょき";
}else{
    $pc_hand = "ぱー";
}



//echo $hand;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <!-- じゃんけんの結果を表示しましょう -->
            <p><?php echo $result; ?></p>
            <p class="result-word"></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた：<?php echo $player_hand; ?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<?php echo $pc_hand; ?><br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </body>
</html>