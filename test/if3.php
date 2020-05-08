<?php


function body_temperature($temp){
    if($temp  <= 37.0){
        echo "平熱です";
    }else if($temp > 37.0 && $temp < 37.5){
        echo "微熱です";
    }else{
        echo "コロナの可能性があります";
    }
}

body_temperature(36.4);

?>