<?php
class Controller    //コントローラークラス
{
    function __construct()  //セッション用の関数：セッションが開始されていない場合に開始
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function view(string $template, array $params = []): void    //指定テンプレートのレンダリング
    {
        $Smarty = new Smarty(); //Smartyテンプレートエンジンのインスタンス作成
        $Smarty->setTemplateDir(ROOT_PATH.'Views');
        $Smarty->setCompileDir(ROOT_PATH.'Views/compile');
        $Smarty->assign($params);   //ビューに渡すデータの設定：連想配列を使って複数の変数に割り当て
        try {
            $Smarty->display($template . '.tpl');
        } catch (SmartyException|Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}