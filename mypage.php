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
<?php include __DIR__ . '/includes/head-assets.php'; ?>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>
    <section class="simple-page">
        <h1 class="section-heading">MY PAGE<span class="section-heading__sub">マイページ</span></h1>

        <div class="account-grid">
            <div class="account-panel">
                <h2 class="account-panel__heading">ログイン</h2>

                <form class="account-form" id="loginForm">
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
                <a href="/silver/register.php" class="btn-outline">新規会員登録はこちら</a>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
