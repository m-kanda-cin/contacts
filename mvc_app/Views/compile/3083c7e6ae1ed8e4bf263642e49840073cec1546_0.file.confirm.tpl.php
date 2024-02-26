<?php
/* Smarty version 4.3.4, created on 2024-02-25 20:57:05
  from 'C:\xampp\htdocs\mvc_app\Views\contact\confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65db2b11645946_33958043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3083c7e6ae1ed8e4bf263642e49840073cec1546' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\contact\\confirm.tpl',
      1 => 1708861670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65db2b11645946_33958043 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問合せ画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body> <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">確認画面</h2>
            <form action="/contact/create_comp" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <p><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['name'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
">
                </div>
                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <p><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['kana'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    <input type="hidden" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['kana'];?>
">
                </div>
                 <div class="form-group">
                    <label for="tel">電話番号</label>
                    <p><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['tel'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['tel'];?>
">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <p><?php echo (($tmp = htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['email'];?>
">
                </div>
                <div class="form-group"|default:''>
                    <label for="body">お問い合わせ内容</label>
                    <p><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</p>
                    <input type="hidden" name="body" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
">
                </div>
                <h3>上記の内容でよろしいですか？</h3>
                <input type="hidden" name="csrf_token" value=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['csrf_token'], ENT_QUOTES, 'UTF-8', true);?>
>
                <button type="button" onclick="history.back();" class="btn btn-secondary">キャンセル</button>
                <button class="btn bg-warning my-2">送信</button>
            </form>
        </div>
    </div>
    <div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <p><a href="/">トップページへ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div><?php }
}
