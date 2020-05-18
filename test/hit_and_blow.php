<?php

//$answer = 123;
//$ary_ans = str_split($answer);
//echo $ary_ans[0]."\n";
$i = 1;
$hit = 0;
$blow = 0;


while(1){
    $answer = rand(102,987);
    $ary_ans = str_split($answer);
    if($ary_ans[0] != $ary_ans[1] && $ary_ans[0] != $ary_ans[2] && $ary_ans[1] != $ary_ans[2]){
        //echo $answer;
        break;
    }
}

while(1){
    echo "－－－－－－－－－－－－－－－－\n";
    echo $i."回目のチャレンジ\n";
    echo "3桁の半角数字を重複なしで入力してください : ";
    $test = trim(fgets(STDIN));
    $ary = str_split($test);
    if($ary[0] == $ary[1] || $ary[0] == $ary[2] ||$ary[1] == $ary[2] || count($ary) != 3){
        echo "エラー：3桁の半角数字を重複しないで入力したください\n";
        $i++;
        $hit = 0;
        $blow = 0;
        continue;
    }
    
    if($answer == $test){
        echo "正解です！".$i."回目でクリアです！";
        break;
    }
    for($j = 0;$j < 3;$j++){
        if($ary_ans[$j] == $ary[$j]){
            $hit++;
        }else{
            for($n = 0;$n < 3;$n++){
                if($ary_ans[$j] == $ary[$n]){
                    $blow++;
                }
            }
        }
    }
    echo "Hit:".$hit.", Blow:".$blow."\n";
    
    $i++;
    $hit = 0;
    $blow = 0;
    //echo "西暦で年を入力してください\n";
}


echo "\n";
?>