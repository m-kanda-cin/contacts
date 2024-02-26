<?php
/* Smarty version 4.3.4, created on 2024-02-25 22:53:52
  from 'C:\xampp\htdocs\mvc_app\Views\contact\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65db46701b3114_68824273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc07ac0bd7f54853c0479dd7249d59530d5c40ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contact\\contact.tpl',
      1 => 1708869224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65db46701b3114_68824273 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問合せ画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php echo '<script'; ?>
 defer src="../js/contactValidation.js"><?php echo '</script'; ?>
>
</head>
<body> <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">入力画面</h2>
            <form action="/contact/create_confirm" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>
                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>
                 <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" name="tel" placeholder="09000000000※ハイフンなし" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="geekation@exemple.com" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>
                <div class="form-group">
                    <label for="body">お問い合わせ内容</label>
                    <textarea class="form-control" name="body" placeholder="ここに入力"><?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>
                <input type="hidden" name="csrf_token" value=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
>
                <button class="btn bg-warning my-2">送信</button>
            </form>
        </div>
    </div>
    <div>
    <div class="container mt-4">
    <h2>お問い合わせデータ一覧</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="table-info">
                <th>氏名</th>
                <th>ふりがな</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contact']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr>
            <td><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value->name, ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value->kana, ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value->tel, ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value->email, ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value->body, ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
            <td>
            <form action="/contact/edit_page" method="post">
            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
>
            <input type="hidden" name="csrf_token" value=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
>
            <button class="btn bg-primary my-2">編集</button>
            </form>
            </td>
            <td>
            <form action="/contact/contactDelete" method="post">
            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
>
            <input type="hidden" name="csrf_token" value=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
>
            <button class="btn bg-danger my-2" onclick="return confirm('本当に削除しますか?')">削除</button>
            </form>
            </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <p><a href="/">トップページへ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</body>
</html><?php }
}
