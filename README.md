## 常時ディレクトリ監視を行い任意の画像ファイルだけ別のディレクトリへ移動するコードです。
### コードを書いた経緯
- while(true)の使い道を一つの例として記載しました。

```:常時監視するLinuxコマンド
nohup php File_Check.php &
```

```:ディレクトリ構成
├── File_Check.php
├── upload
└── data
```

```php:File_Check.php
<?php
while(true){
    if($result = is_scandir("./upload")){
        foreach($result as $key=>$value){
            rename("./upload/$value","./data/$value");
        }
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
