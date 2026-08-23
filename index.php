<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

$current_cat = null;
$new_items = new_products($products, 8);
$pickups = pickup_products($products);
$ranking = ranking_by_category($products, $categories, 5);
$first_cat = array_key_first($categories);

$hero_slides = [
    [
        'image' => '/silver/assets/img/hero-1.svg',
        'eyebrow' => 'NEW COLLECTION',
        'title' => "Silver jewelry,\nquietly refined.",
        'link' => '/silver/category.php?cat=ring',
        'link_label' => 'SHOP RING',
    ],
    [
        'image' => '/silver/assets/img/hero-2.svg',
        'eyebrow' => 'PICK UP',
        'title' => "身につける、\n静かな輝き。",
        'link' => '/silver/category.php?cat=necklace',
        'link_label' => 'SHOP NECKLACE',
    ],
    [
        'image' => '/silver/assets/img/hero-3.svg',
        'eyebrow' => 'DAILY WEAR',
        'title' => "Everyday,\nelevated.",
        'link' => '/silver/category.php?cat=bracelet',
        'link_label' => 'SHOP BRACELET',
    ],
];

$page_title = 'SILVER | シルバーアクセサリ';
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
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>

    <section class="hero-slider" id="heroSlider">
        <div class="hero-slider__track">
            <?php foreach ($hero_slides as $i => $slide): ?>
                <div class="hero-slider__slide <?= $i === 0 ? 'is-active' : '' ?>"
                     style="background-image:url('<?= h($slide['image']) ?>')">
                    <div class="hero-slider__content">
                        <p class="hero-slider__eyebrow"><?= h($slide['eyebrow']) ?></p>
                        <h1 class="hero-slider__title"><?= nl2br(h($slide['title'])) ?></h1>
                        <a href="<?= h($slide['link']) ?>" class="hero-slider__link"><?= h($slide['link_label']) ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" class="hero-slider__arrow hero-slider__arrow--prev" aria-label="前のスライド">&#8249;</button>
        <button type="button" class="hero-slider__arrow hero-slider__arrow--next" aria-label="次のスライド">&#8250;</button>

        <div class="hero-slider__dots">
            <?php foreach ($hero_slides as $i => $slide): ?>
                <button type="button" class="<?= $i === 0 ? 'is-active' : '' ?>" data-index="<?= $i ?>" aria-label="スライド<?= $i + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cat-icons">
        <ul>
            <?php foreach ($categories as $key => $label): ?>
                <li>
                    <a href="/silver/category.php?cat=<?= h($key) ?>">
                        <span class="cat-icons__image">
                            <img src="<?= h($img_base . $key . '.svg') ?>" alt="<?= h($label) ?>">
                        </span>
                        <span class="cat-icons__label"><?= h($label) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="h-scroll-section">
        <div class="h-scroll-section__head">
            <h2 class="section-heading">NEW ARRIVAL<span class="section-heading__sub">新着アイテム</span></h2>
            <div class="h-scroll-nav">
                <button type="button" class="h-scroll-btn" data-target="newArrivalTrack" data-dir="-1" aria-label="前へ">&#8249;</button>
                <button type="button" class="h-scroll-btn" data-target="newArrivalTrack" data-dir="1" aria-label="次へ">&#8250;</button>
            </div>
        </div>
        <div class="h-scroll-track" id="newArrivalTrack">
            <?php foreach ($new_items as $product): ?>
                <div class="h-scroll-item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="h-scroll-section">
        <div class="h-scroll-section__head">
            <h2 class="section-heading">PICK UP<span class="section-heading__sub">おすすめアイテム</span></h2>
            <div class="h-scroll-nav">
                <button type="button" class="h-scroll-btn" data-target="pickupTrack" data-dir="-1" aria-label="前へ">&#8249;</button>
                <button type="button" class="h-scroll-btn" data-target="pickupTrack" data-dir="1" aria-label="次へ">&#8250;</button>
            </div>
        </div>
        <div class="h-scroll-track" id="pickupTrack">
            <?php foreach ($pickups as $product): ?>
                <div class="h-scroll-item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="ranking">
        <h2 class="section-heading">RANKING<span class="section-heading__sub">ランキング</span></h2>

        <div class="ranking-tabs" role="tablist">
            <?php foreach ($categories as $key => $label): ?>
                <button type="button"
                        class="ranking-tab <?= $key === $first_cat ? 'is-active' : '' ?>"
                        data-panel="ranking-<?= h($key) ?>"
                        role="tab">
                    <?= h($label) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($categories as $key => $label): ?>
            <div class="ranking-panel <?= $key === $first_cat ? 'is-active' : '' ?>" id="ranking-<?= h($key) ?>" role="tabpanel">
                <div class="ranking-list">
                    <?php foreach ($ranking[$key] as $i => $product): $card_rank = $i + 1; ?>
                        <div class="ranking-list__item"><?php include __DIR__ . '/includes/product-card.php'; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
