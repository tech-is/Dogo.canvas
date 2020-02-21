<?php
//アップロード先のフォルダを定義
define('UPLOAD_PATH', dirname(__FILE__).'/upload/img/');

//リクエストがPOSTか判定してPOSTでなければ弾く
if($_SERVER["REQUEST_METHOD"] === "POST"){
    //canvasでアップロードされた画像をbase64からバイナリデータにデコード
    $image = base64_decode(str_replace(' ', '+', str_replace('data:image/png;base64,', '', $_POST['image_data'])));
    $rand = convert_microtime_to_string();
    $image_path = UPLOAD_PATH."{$rand}.png";
    $upload_path = same_file_exists($image_path);
    file_put_contents($upload_path, $image);
    echo "success";
    exit;
} else {
    echo "POSTでリクエストしてください";
    exit;
}

//現在のマイクロ秒を取得して文字列として出力する
function convert_microtime_to_string()
{
    return (string) microtime(true) * 10000;
}

//アップロード先のフォルダに同じファイルがないかチェックしてファイルが存在する場合は新しくファイル名を付け直す
function same_file_exists($path)
{
    if(file_exists($path)) {
        $generate_path = UPLOAD_PATH.convert_microtime_to_string().".png";
        same_file_exists($generate_path);
    } else {
        return $path;
    }
}