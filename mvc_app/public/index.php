<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER['DOCUMENT_ROOT']));//1.ルートパスの定義 puburicを''に置換する
require_once(ROOT_PATH.'libs/Smarty.class.php');//2.外部ファイルの読み込み
require_once(ROOT_PATH.'libs/route.php');

if (empty($_SERVER['REQUEST_URI'])) {   //3.リクエストURIのチェック
    exit();
}

$parse = parse_url($_SERVER['REQUEST_URI']);    //4.リクエストURIの解析
$method = strtolower($_SERVER['REQUEST_METHOD']);   //5.HTTPメソッドの取得

if (mb_substr($parse['path'], -1) === '/') {
    // URLがlocalhostのみの場合は HostControllerのindexメソッドを動かすように設定している。
    // トップページを変更したい場合は下のpathを変更すれば変更できる。
    $path = 'home/index';
}else{
    $path = mb_substr($parse['path'], 1);
}

// .htaccess経由で様々なURLでこのページが読まれるためURLに書かれている文字列を
// route()関数に値を渡している。
route($path, $method);