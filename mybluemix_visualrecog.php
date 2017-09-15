<?php
$API_KEY = "YOUR_API_KEY";
$API_URL ="https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key=" .$API_KEY ."&version=2016-05-20";


$ch = curl_init();

$path = "./img";
$img = "neko.jpg";
$img_path = $path ."/" .$img;

$cfile = new CURLFile($img_path,'image/jpeg', $img);

$data = array("images_file" => $cfile,
              "classifier_id" => "default");

curl_setopt($ch, CURLOPT_URL, $API_URL);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$vr_exec = curl_exec($ch);
curl_close($ch);

$json = mb_convert_encoding($vr_exec, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);
$ResultStr = "";

if ($arr === NULL) {
    $ResultStr = "NoData\n";
}else{
    $json_count = count($arr["images"][0]["classifiers"][0]["classes"]);

    $class = array();
    $score = array();
    for($i=$json_count-1;$i>=0;$i--){
        $class[] = $arr["images"][0]["classifiers"][0]["classes"][$i]["class"];
        $score[] = $arr["images"][0]["classifiers"][0]["classes"][$i]["score"];
    }

}
for($i=0, $j=count($class);$i<$j;$i++){
    $ResultStr .= $class[$i] .' [' .(String)$score[$i] .']';
    if($i != $j)$ResultStr .= "\n";
}

var_dump($ResultStr);
?>