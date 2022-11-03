<?php
if($argv[0]){
    while(true){
        if($result = is_scandir("./upload")){
            foreach($result as $key=>$value){
                rename("./upload/$value","./data/$value");
            }
        }
        sleep(3);    
    }
}

function is_scandir(string $dirname="",array $ext_list = ["png","jpg"]){
    $is_filelest = [];
    $result = scandir($dirname);
    foreach($result as $key=>$value){
        $ext = substr($value, strrpos($value, '.') + 1);
        if(in_array($ext,$ext_list,false)!== false){
            $is_filelest[] = $value;
        }
    }
    return count($is_filelest)>0 ? $is_filelest : false;
}
