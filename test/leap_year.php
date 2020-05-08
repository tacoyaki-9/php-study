<?php

echo "西暦で年を入力してください\n";
$year = trim(fgets(STDIN));

if($year % 400 == 0){
    echo "入力された年は、うるう年です。";
}else if($year % 4 == 0 && $year % 100 == 0){
    echo "入力された年は、平年です。";
}else if($year % 4 == 0){
    echo "入力された年は、うるう年です。";
}else{
    echo "入力された年は、平年です。";
}
echo "\n";
?>