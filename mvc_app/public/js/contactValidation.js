document.addEventListener("DOMContentLoaded", function() {
    // フォームバリデーションのコード
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        let hasError = false;
        const name = document.querySelector("input[name='name']").value;
        const kana = document.querySelector("input[name='kana']").value;
        const tel = document.querySelector("input[name='tel']").value;
        const email = document.querySelector("input[name='email']").value;
        const body = document.querySelector("textarea[name='body']").value;

        // 氏名のバリデーション
        if (!name || name.length > 10) {
            alert("氏名は必須で、10文字以内で入力してください。");
            hasError = true;
        }

        // ふりがなのバリデーション
        if (!kana || kana.length > 10) {
            alert("ふりがなは必須で、10文字以内で入力してください。");
            hasError = true;
        }

        // 電話番号のバリデーション（数字のみ許可、必須ではない）
        if (tel && !/^\d+$/.test(tel)) {
            alert("電話番号は数字のみで入力してください。");
            hasError = true;
        }

        // メールアドレスのバリデーション
        if (!email || !/^[^@]+@[^@]+\.[^@]+$/.test(email)) {
            alert("有効なメールアドレスを入力してください。");
            hasError = true;
        }

        // お問い合わせ内容のバリデーション
        if (!body) {
            alert("お問い合わせ内容は必須です。");
            hasError = true;
        }

        if (hasError) {
            event.preventDefault(); // フォームの送信をキャンセル
        }
    });
});