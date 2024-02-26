<?php
function route($path, $httpMethod){
    try {
        list($controller, $method) = explode('/', $path);   //パスとHTTPメソッドの分解
        $case = [$method, $httpMethod]; //メソッド名+HTTPメソッドの組み合わせ
        switch ($controller) {  //コントローラー名に基づいてクラス名の選択
            case 'home':
                $controllerName = 'HomeController';
                switch ($case) {                //内部swith文で実行するメソッド名を選択
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

            case 'user':
                $controllerName = 'UserController';
                switch ($case) {
                    case ['log-in', 'get']:
                            $methodName = 'logIn';
                            break;
                    case ['sign-up', 'get']:
                            $methodName ='signUp';
                            break;
                    case ['create', 'post']:
                           $methodName = 'create';
                            break;  
                    case ['log-out', 'get']:
                            $methodName = 'logOut';
                            break;
                    case ['certification', 'post']:
                            $methodName = 'certification';
                            break;
                    case ['my-page', 'get']:
                            $methodName ='myPage';
                            break;
                    case ['edit', 'get']:
                            $methodName = 'edit';
                            break;
                    case ['update', 'post']:
                            $methodName = 'update';
                            break;
                    case ['delete', 'get']:
                            $methodName = 'delete';
                            break;
                }
                break;

            case 'contact':
                $controllerName = 'ContactController';
                switch($case){
                    case ['contact', 'get']://入力画面へのルート
                            $methodName = 'contact';
                            break;
                    case ['create_confirm', 'post']:
                            $methodName = 'create_confirm';
                            break;
                    case ['confirm', 'get']:
                            $methodName = 'confirm';
                            break;
                    case ['create_comp', 'post']:
                            $methodName = 'create_comp';
                            break;                          
                    case ['edit_page', 'post']:
                            $methodName = 'editContact';
                            break;
                    case ['editUpdate', 'post']:
                            $methodName = 'editUpdate';
                            break;
                    case ['contactDelete', 'post']:
                            $methodName = 'contactDelete';
                            break;
               /* case ['create_complete', 'get']:
                        $methodName = 'comp_disp';
                        break;
                case ['edit', 'get']:
                        $methodName = 'edit_disp';
                        break;*/
        
                }
                break;

            default:
                $controllerName = '';
                $methodName = '';
        }
        require_once (ROOT_PATH."Controllers/{$controllerName}.php");   //コントローラーのPHPファイルの読み込み

        $obj = new $controllerName();
        $obj->$methodName();

    } catch (Throwable $e) {    //例外処理
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}