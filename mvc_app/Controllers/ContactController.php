<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH . 'Models/Contact.php';

class ContactController extends Controller
{
    public function contact(){//ページ読み込み時に同時処理をする(変数名に注意)
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];

        if (!isset($_SESSION['csrf_token'])) {//トークンの生成
            $token = bin2hex(random_bytes(32));
            $_SESSION['csrf_token'] = $token;
        } else {
            $token = $_SESSION['csrf_token'];
        }

        unset($_SESSION['id']);

        $contactModel = new Contact;
        $contactsDisp = $contactModel->getContacts();

        $this->view('contact/contact', ['contact' => $contactsDisp, 'token' => $token, 'session' => $_SESSION]);

    }

    public function create_confirm()
    {

        if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            die('CSRF攻撃を検出しました。');
        }

        $errorMessages = [];

        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        } else if(mb_strlen($_POST['name']) > 10){
            $errorMessages['name'] = '氏名は10文字以内で入力してください。';
        }

        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        } else if(mb_strlen($_POST['kana']) > 10){
            $errorMessages['kana'] = 'ふりがなは10文字以内で入力してください。';
        }

        if (!empty($_POST['tel']) && !preg_match('/^\d+$/', $_POST['tel'])) {
            $errorMessages['tel'] = '電話番号は数字のみで入力してください。';
        }

        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = '有効なメールアドレスを入力してください。';
        }

        if (empty($_POST['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容を入力してください';
        }

        if (!empty($errorMessages)) {
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST;
            header('Location: /contact/contact');
        }else{

            // 確認画面への遷移フラグをセット
            $_SESSION['access'] = true;

            $_SESSION['post'] = $_POST;

            header('Location: /contact/confirm');

        }
    }

    public function confirm(){
        if (!isset($_SESSION['access']) || ($_SESSION['access'] !== true)) {
            // 正常な導線からのアクセスでない場合はエラー処理
            header('Location: /contact/contact');
            exit();
        }else {
            // 完了画面への遷移フラグをセット
            $_SESSION['access_complete'] = true;

            $formData = $_SESSION['post'] ?? [];
            unset($_SESSION['access']);
            $this->view('contact/confirm', ['post' => $formData, 'session' => $_SESSION]);
            
        }
    }

    public function create_comp(){
         if (!isset($_SESSION['access_complete']) || ($_SESSION['access_complete'] !== true)) {
            // 正常な導線からのアクセスでない場合はエラー処理
            header('Location: /contact/contact');
            exit();
          }  

        if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            die('CSRF攻撃を検出しました。');
         }

        $contact = new Contact;
            $result = $contact->create_contact(//createメソッドはIDを返す
                $_POST['name'],
                $_POST['kana'],
                $_POST['tel'],
                $_POST['email'],
                $_POST['body']
            );

            if (is_numeric($result)) {
                
                $this->view('contact/create_complete', ['session' => $_SESSION]);
                unset($_SESSION['access_complete']);
            } else {
                unset($_SESSION['access_complete']);
                header('Location: /contact/contact');
                exit();
            }
    }

    /*public function comp_disp(){
        if (!isset($_SESSION['access_complete']) || ($_SESSION['access_complete'] !== true)) {
            // 正常な導線からのアクセスでない場合はエラー処理
            header('Location: /contact/contact');
            exit();
          }  else {
            unset($_SESSION['access_complete']);
            $this->view('contact/create_complete', ['session' => $_SESSION]); 
            
          }
    }*/

    public function editContact(){
                
        $token = $_POST['csrf_token'];
        $id = $_POST['id'];
        $_SESSION['id'] = $id;

        $editModel = new Contact;
        $editResult = $editModel->getEditPage($id);
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        if(empty($errorMessages))
        {

            $this->view('contact/edit', ['data' => $editResult, 'id' => $id, 'token' => $token, 'session' => $_SESSION, 'post' => $_POST ]);
            unset($_SESSION['edit']);
        }else{
            $this->view('contact/edit', ['data' => $post,  'auth' => $id, 'errorMessages' => $errorMessages, 'token' => $token]);
        }
    }

    public function editUpdate(){
        if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            die('CSRF攻撃を検出しました。');
        }
        $errorMessages = [];

        $id = $_SESSION['id'];
        unset($_SESSION['id']);
        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名を入力してください。';
        } else if(mb_strlen($_POST['name']) > 10){
            $errorMessages['name'] = '氏名は10文字以内で入力してください。';
        }

        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        } else if(mb_strlen($_POST['kana']) > 10){
            $errorMessages['kana'] = 'ふりがなは10文字以内で入力してください。';
        }

        if (!empty($_POST['tel']) && !preg_match('/^\d+$/', $_POST['tel'])) {
            $errorMessages['tel'] = '電話番号は数字のみで入力してください。';
        }

        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスを入力してください';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = '有効なメールアドレスを入力してください。';
        }

        if (empty($_POST['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容を入力してください';
        }

        if(!empty($errorMessages)){
            // バリデーション失敗
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $_POST;
            header('Location: /contact/edit');
        }else{
            // 更新処理

            $edit = new Contact;
            $editResult = $edit->editUpdate(
                $id,
                $_POST['name'],
                $_POST['kana'],
                $_POST['tel'],
                $_POST['email'],
                $_POST['body']
            );
       
            if($editResult === true){
                header('Location: /contact/contact');
                exit();
            }else{
                $_SESSION['errorMessages'] = $errorMessages;
                $_SESSION['post'] = $_POST;
                header('Location: /contact/edit');
            }
        }
    }

    public function edit_disp(){
        if (!isset($_SESSION['id']) || ($_SESSION['id'] !== true)) {
            // 正常な導線からのアクセスでない場合はエラー処理
            header('Location: /contact/contact');
            exit();
          }/* else {
            unset($_SESSION['edit']);
            $this->view('contact/edit', ['session' => $_SESSION]); 
            
          }*/
    }

    public function contactDelete(){
        if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            die('CSRF攻撃を検出しました。');
        }
        $id = $_POST['id'];

        $delete = new Contact;
        $delete->contactDelete($id);
        header('Location: /contact/contact');
        exit();
    }
}