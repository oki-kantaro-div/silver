<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'マイページ | SILVER';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($page_title) ?></title>
<link rel="stylesheet" href="/silver/assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>
    <section class="simple-page">
        <h1 class="section-heading">MY PAGE<span class="section-heading__sub">マイページ</span></h1>

        <div class="account-grid">
            <div class="account-panel">
                <h2 class="account-panel__heading">ログイン</h2>

                <form class="account-form js-mock-form">
                    <label class="account-form__field">
                        <span>メールアドレス</span>
                        <input type="email" name="email" required placeholder="example@mail.com">
                    </label>

                    <label class="account-form__field">
                        <span>パスワード</span>
                        <input type="password" name="password" required placeholder="••••••••">
                    </label>

                    <button type="submit" class="btn-cart">ログイン</button>

                    <a href="#" class="account-form__link">パスワードをお忘れの方はこちら</a>
                </form>
            </div>

            <div class="account-panel account-panel--register">
                <h2 class="account-panel__heading">はじめてご利用の方</h2>
                <p class="account-panel__text">
                    会員登録をしていただくと、購入履歴の確認やお気に入り登録、次回以降のスムーズなご購入が可能になります。
                </p>
                <a href="#" class="btn-outline">新規会員登録はこちら</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
