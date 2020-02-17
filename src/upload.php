<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    // ブラウザからHTMLページを要求された場合
    $image = base64_decode(str_replace(' ', '+', str_replace('data:image/png;base64,', '', $_POST['image_data'])));
    $rand = uniqid(mt_rand());
    file_put_contents("./upload/img/{$rand}.png",$image);
    echo "success";
    exit;
} else {
    echo "POSTでリクエストしてください";
    exit;
}
?>