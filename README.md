# SampleVisualRecog_for_PHP
PHPでBluemixのVisualRecog(画像解析)のAPIを呼び出すサンプルプログラム

## 動作確認環境
* PHP 5.5.9-1ubuntu4.22 (cli) (built: Aug  4 2017 19:40:28)


## 使い方
事前にVisualRecogのAPIを取得してきてください

サンプルとして./img/neko.jpgを解析してみます

起動すると下記のように出てきます

```bash
$ php mybluemix_visualrecog.php
string(173) "ash grey color [0.732]
beige color [0.918]
tabby cat [0.5]
domestic cat [0.829]
tiger cat [0.618]
animal [0.992]
mammal [0.992]
carnivore [0.992]
feline [0.992]
cat [0.991]
"
```

書き換えるところ
```php
//取得したAPIKEYを入力してください
$API_KEY = "YOUR_API_KEY";

//--省略--

//解析したい画像ファイルを指定してください
$path = "./img";
$img = "neko.jpg";
$img_path = $path ."/" .$img;
```

あとは解析等々をやってくれ結果を出力してくれます