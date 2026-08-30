<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$page_title = '会社情報 | SILVER';

/**
 * フロントのみのデザインモックのため、会社情報はすべて仮の記載内容。
 * 公開前に正式な情報へ差し替えること。
 */
$company_info = [
    '会社名' => '株式会社サンプル',
    '設立' => '20XX年X月',
    '代表者' => '代表取締役　〇〇 〇〇',
    '所在地' => '〒000-0000　東京都◯◯区◯◯ 0-0-0',
    '事業内容' => 'シルバーアクセサリーの企画・製造・販売',
    '資本金' => '0,000,000円',
    'TEL' => '00-0000-0000（受付時間 10:00〜18:00　土日祝除く）',
    'Email' => 'info@example.com',
];
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
        <h1 class="section-heading">COMPANY<span class="section-heading__sub">会社情報</span></h1>

        <dl class="info-list">
            <?php foreach ($company_info as $label => $value): ?>
                <div>
                    <dt><?= h($label) ?></dt>
                    <dd><?= h($value) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
