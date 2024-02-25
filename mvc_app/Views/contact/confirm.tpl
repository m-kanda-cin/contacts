<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問合せ画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body> {debug}
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">確認画面</h2>
            <form action="/contact/create_comp" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <p>{$post.name|escape|default:''}</p>
                    <input type="hidden" name="name" value="{$post.name}">
                </div>
                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <p>{$post.kana|escape|default:''}</p>
                    <input type="hidden" name="kana" value="{$post.kana}">
                </div>
                 <div class="form-group">
                    <label for="tel">電話番号</label>
                    <p>{$post.tel|escape|default:''}</p>
                    <input type="hidden" name="tel" value="{$post.tel}">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <p>{$post.email|escape|default:''}</p>
                    <input type="hidden" name="email" value="{$post.email}">
                </div>
                <div class="form-group"|default:''>
                    <label for="body">お問い合わせ内容</label>
                    <p>{$post.body|escape|nl2br}</p>
                    <input type="hidden" name="body" value="{$post.body}">
                </div>
                <h3>上記の内容でよろしいですか？</h3>
                <input type="hidden" name="csrf_token" value={$post.csrf_token|escape}>
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
    </div>