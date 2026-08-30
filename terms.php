<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = 'ご利用規約 | SILVER';
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
        <h1 class="section-heading">TERMS<span class="section-heading__sub">ご利用規約</span></h1>
        <p class="page-lead">
            このページの内容はサンプルです。公開前に必ず内容をご確認・修正のうえ、必要に応じて専門家にご確認ください。
        </p>

        <div class="content-block">
            <h2 class="content-block__heading">第1条（適用）</h2>
            <p class="content-block__text">
                本規約は、当店（以下「当店」といいます）が提供するオンラインストア（以下「本サービス」といいます）の利用条件を定めるものです。ユーザーの皆さまには、本規約に従って本サービスをご利用いただきます。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第2条（利用登録）</h2>
            <p class="content-block__text">
                登録希望者が当店の定める方法によって利用登録を申請し、当店がこれを承認することによって、利用登録が完了するものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第3条（ユーザーIDおよびパスワードの管理）</h2>
            <p class="content-block__text">
                ユーザーは、自己の責任において、本サービスのユーザーIDおよびパスワードを適切に管理するものとし、第三者に利用させてはならないものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第4条（禁止事項）</h2>
            <ul class="plain-list">
                <li>法令または公序良俗に違反する行為</li>
                <li>犯罪行為に関連する行為</li>
                <li>当店のサービスの運営を妨害するおそれのある行為</li>
                <li>他のユーザーに関する個人情報等を収集または蓄積する行為</li>
                <li>不正アクセスをし、またはこれを試みる行為</li>
                <li>その他、当店が不適切と判断する行為</li>
            </ul>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第5条（本サービスの提供の停止等）</h2>
            <p class="content-block__text">
                当店は、システムの保守点検、火災・停電・天災などの不可抗力、その他運営上・技術上の理由により、ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第6条（保証の否認および免責事項）</h2>
            <p class="content-block__text">
                当店は、本サービスに事実上または法律上の瑕疵がないことを明示的にも黙示的にも保証しておりません。当店は、本サービスに起因してユーザーに生じたあらゆる損害について、当店の故意または重過失による場合を除き、一切の責任を負いません。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第7条（サービス内容の変更等）</h2>
            <p class="content-block__text">
                当店は、ユーザーへの事前の告知をもって、本サービスの内容を変更、追加または廃止することがあり、ユーザーはこれを承諾するものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第8条（利用規約の変更）</h2>
            <p class="content-block__text">
                当店は、必要と判断した場合には、ユーザーに通知することなくいつでも本規約を変更することができるものとします。変更後の規約は、当店ウェブサイトに掲示した時点から効力を生じるものとします。
            </p>
        </div>

        <div class="content-block">
            <h2 class="content-block__heading">第9条（準拠法・裁判管轄）</h2>
            <p class="content-block__text">
                本規約の解釈にあたっては、日本法を準拠法とします。本サービスに関して紛争が生じた場合には、当店の本店所在地を管轄する裁判所を専属的合意管轄とします。
            </p>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
