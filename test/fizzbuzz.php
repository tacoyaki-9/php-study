<?php


for($i = 1;$i < 100;$i++){
    //for($j = 1;$j < 10;$j++){
        if($i % 3 == 0 && $i % 5 == 0){
            echo "FizzBuzz ";
            
        }else if($i % 3 == 0){
            echo "Fizz ";
            
        }else if($i % 5 == 0){
            echo "Buzz ";
            
        }else{
            echo $i." ";
        }
    //}
    if($i % 10 == 0){
        echo "\n";
    }
    
}
echo "\n";

?>