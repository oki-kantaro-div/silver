<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = '新規会員登録 | SILVER';
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
    <section class="simple-page simple-page--narrow">
        <h1 class="section-heading">REGISTER<span class="section-heading__sub">新規会員登録</span></h1>
        <p class="page-lead">
            会員登録をしていただくと、購入履歴の確認やお気に入り登録、次回以降のスムーズなご購入が可能になります。
        </p>

        <form class="account-form" id="registerForm">
            <label class="account-form__field">
                <span>お名前</span>
                <input type="text" name="name" required placeholder="山田 花子">
            </label>

            <label class="account-form__field">
                <span>メールアドレス</span>
                <input type="email" name="email" required placeholder="example@mail.com">
            </label>

            <label class="account-form__field">
                <span>パスワード</span>
                <input type="password" name="password" required placeholder="8文字以上">
            </label>

            <label class="account-form__field">
                <span>パスワード（確認）</span>
                <input type="password" name="password_confirm" required placeholder="8文字以上">
            </label>

            <button type="submit" class="btn-cart">会員登録する</button>

            <a href="/silver/mypage.php" class="account-form__link">すでに会員の方はこちら</a>
        </form>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
