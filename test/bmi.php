<?php
echo "身長を入力してください : ";
$height = trim(fgets(STDIN));
echo "体重を入力してください : ";
$weight = trim(fgets(STDIN));
if($weight / ($height * $height) < 0.00185){
    echo "あなたは、低体重です。\n";
}else if($weight / ($height * $height) > 0.00185 && $weight / ($height * $height) < 0.0025){
    echo "あなたは、普通体重です。\n";
}else{
    echo "あなたは、肥満です。\n";
}

//echo $weight / ($height * $height);
?>