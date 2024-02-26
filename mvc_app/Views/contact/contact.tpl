<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問合せ画面</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script defer src="../js/contactValidation.js"></script>
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">入力画面</h2>
            <form action="/contact/create_confirm" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" value="{$post['name']|default:''}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" value="{$post['kana']|default:''}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>
                 <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" name="tel" placeholder="09000000000※ハイフンなし" value="{$post['tel']|default:''}">
                    <p class="error-text">{$errorMessages['tel']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="geekation@exemple.com" value="{$post['email']|default:''}">
                    <p class="error-text">{$errorMessages['email']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="body">お問い合わせ内容</label>
                    <textarea class="form-control" name="body" placeholder="ここに入力">{$post['body']|default:''}</textarea>
                    <p class="error-text">{$errorMessages['body']|default:''}</p>
                </div>
                <input type="hidden" name="csrf_token" value={$token|escape}>
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
            {foreach $contact as $item}
            <tr>
            <td>{$item->name|escape|default:''}</td>
            <td>{$item->kana|escape}</td>
            <td>{$item->tel|escape}</td>
            <td>{$item->email|escape}</td>
            <td>{$item->body|escape|nl2br}</td>
            <td>
            <form action="/contact/edit" method="post">
            <input type="hidden" name="id" value={$item->id}>
            <input type="hidden" name="csrf_token" value={$token|escape}>
            <button class="btn bg-primary my-2">編集</button>
            </form>
            </td>
            <td>
            <form action="/contact/contactDelete" method="post">
            <input type="hidden" name="id" value={$item->id}>
            <input type="hidden" name="csrf_token" value={$token|escape}>
            <button class="btn bg-danger my-2" onclick="return confirm('本当に削除しますか?')">削除</button>
            </form>
            </td>
            </tr>
            {/foreach}
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
</html>