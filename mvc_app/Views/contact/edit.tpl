<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>更新画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script defer src="../js/contactValidation.js"></script>
</head>
<body> {debug}
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">更新画面</h2>
            <form action="/contact/editUpdate" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$data->name|default:$data['name']}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$data->kana|default:$data['kana']}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>
                 <div class="form-group">
                    <label for="tel">電話番号※ハイフンなし</label>
                    <input type="tel" class="form-control" name="tel" placeholder="登録なし" value="{$data->tel|default:''}">
                    <p class="error-text">{$errorMessages['tel']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="geekation@exemple.com" value="{$data->email|default:$data['email']}">
                    <p class="error-text">{$errorMessages['email']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="body">お問い合わせ内容</label>
                    <textarea class="form-control" name="body" placeholder="ここに入力">{$data->body|default:$data['body']}</textarea>
                    <p class="error-text">{$errorMessages['body']|default:''}</p>
                </div>
                <h3>上記の内容でよろしいですか？</h3>
                <input type="hidden" name="csrf_token" value="{$token|escape}">
                <button type="button" onclick="history.back();" class="btn btn-secondary">キャンセル</button>
                <input type="submit" class="btn bg-success my-2" value="更新">
            </form>
        </div>
    </div>
    <div>
    <div class="container mt-4">
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
</html>