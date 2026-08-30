<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'お問い合わせ | SILVER';
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
        <h1 class="section-heading">CONTACT<span class="section-heading__sub">お問い合わせ</span></h1>
        <p class="page-lead">
            商品に関するご質問、ご注文についてのお問い合わせなど、お気軽にご連絡ください。
            内容を確認のうえ、担当者よりご連絡いたします。
        </p>

        <form class="account-form account-form--contact" id="contactForm">
            <label class="account-form__field">
                <span>お名前</span>
                <input type="text" name="name" required placeholder="山田 花子">
            </label>

            <label class="account-form__field">
                <span>メールアドレス</span>
                <input type="email" name="email" required placeholder="example@mail.com">
            </label>

            <label class="account-form__field">
                <span>お問い合わせ種別</span>
                <select name="category">
                    <option>ご注文について</option>
                    <option>商品について</option>
                    <option>返品・交換について</option>
                    <option>その他</option>
                </select>
            </label>

            <label class="account-form__field">
                <span>お問い合わせ内容</span>
                <textarea name="message" rows="6" required placeholder="お問い合わせ内容をご記入ください"></textarea>
            </label>

            <button type="submit" class="btn-cart">送信する</button>
        </form>

        <div class="empty-state" id="contactThanks" hidden>
            <p>お問い合わせありがとうございます。<br>内容を確認のうえ、担当者よりご連絡いたします。</p>
            <a href="/silver/index.php" class="btn-outline">TOPへ戻る</a>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
