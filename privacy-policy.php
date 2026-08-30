<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'プライバシーポリシー | SILVER';
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
        <h1 class="section-heading">PRIVACY POLICY<span class="section-heading__sub">プライバシーポリシー</span></h1>
        <p class="page-lead">
            このページの内容はサンプルです。公開前に必ず内容をご確認・修正のうえ、必要に応じて専門家にご確認ください。
        </p>

        <div class="content-block">
            <h2 class="content-block__heading">1. 個人情報の定義</h2>
            <p class="content-block__text">
                「個人情報」とは、個人情報保護法にいう「個人情報」を指し、生存する個人に関する情報であって、氏名、住所、電話番号、メールアドレスその他の記述等により特定の個人を識別できる情報を指します。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">2. 個人情報の収集方法</h2>
            <p class="content-block__text">
                当店は、ユーザーが利用登録をする際や商品をご購入いただく際に、氏名、住所、電話番号、メールアドレスなどの個人情報をお尋ねすることがあります。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">3. 個人情報を収集・利用する目的</h2>
            <ul class="plain-list">
                <li>商品の発送、代金の決済等、本サービスの提供のため</li>
                <li>ご注文内容の確認、お問い合わせへの対応のため</li>
                <li>メンテナンス、重要なお知らせなど必要に応じたご連絡のため</li>
                <li>利用規約に違反したユーザーへの対応のため</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">4. 利用目的の変更</h2>
            <p class="content-block__text">
                当店は、利用目的が変更前と関連性を有すると合理的に認められる場合に限り、個人情報の利用目的を変更するものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">5. 個人情報の第三者提供</h2>
            <p class="content-block__text">
                当店は、法令に基づく場合を除き、あらかじめユーザーの同意を得ることなく、第三者に個人情報を提供することはありません。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">6. 個人情報の開示・訂正・利用停止</h2>
            <p class="content-block__text">
                当店は、本人から個人情報の開示、訂正、追加、削除、利用停止を求められた場合には、遅滞なく必要な調査を行い、その結果に基づき対応いたします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">7. プライバシーポリシーの変更</h2>
            <p class="content-block__text">
                本ポリシーの内容は、法令その他本ポリシーに別段の定めのある事項を除いて、ユーザーに通知することなく変更することができるものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">8. お問い合わせ窓口</h2>
            <p class="content-block__text">
                本ポリシーに関するお問い合わせは、下記の窓口までお願いいたします。
            </p>
            <p class="content-block__text">
                <a href="/silver/contact.php" class="account-form__link">お問い合わせフォームはこちら</a>
            </p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
