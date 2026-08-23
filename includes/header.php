<?php
$current_cat = isset($current_cat) ? $current_cat : null;
?>
<div class="announce-bar">SILVER925 全品 &yen;8,800以上のご購入で送料無料</div>

<header class="site-header">
    <div class="site-header__row">
        <button type="button" class="site-menu-toggle" id="siteNavToggle" aria-label="メニュー">
            <span></span><span></span><span></span>
        </button>

        <a href="/silver/index.php" class="site-logo">
            <img src="/silver/assets/img/main-logo-3.png" alt="Lost Paradise" class="site-logo__img">
        </a>

        <div class="site-header__utility">
            <a href="#" class="utility-link" aria-label="お気に入り">
                <span class="utility-link__icon">
                    <svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 17.2C10 17.2 2.3 12.6 2.3 6.9C2.3 4.1 4.4 2 7.1 2C8.7 2 10 2.8 10 4.1C10 2.8 11.3 2 12.9 2C15.6 2 17.7 4.1 17.7 6.9C17.7 12.6 10 17.2 10 17.2Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="utility-link__text">お気に入り</span>
            </a>

            <a href="#" class="utility-link" aria-label="マイページ">
                <span class="utility-link__icon">
                    <svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="6.4" r="3.4" stroke="currentColor" stroke-width="1.3"/>
                        <path d="M3.2 18C3.2 13.6 6.2 11.1 10 11.1C13.8 11.1 16.8 13.6 16.8 18" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="utility-link__text">マイページ</span>
            </a>

            <button type="button" class="utility-link" id="searchToggle" aria-label="検索">
                <span class="utility-link__icon">
                    <svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8.6" cy="8.6" r="5.8" stroke="currentColor" stroke-width="1.3"/>
                        <line x1="13" y1="13" x2="17.8" y2="17.8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="utility-link__text">検索</span>
            </button>

            <a href="#" class="utility-link site-cart" aria-label="カート">
                <span class="utility-link__icon">
                    <svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.2 7H14.8L14.1 17.2H5.9L5.2 7Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                        <path d="M7.6 7V5.6C7.6 3.8 8.7 2.4 10 2.4C11.3 2.4 12.4 3.8 12.4 5.6V7" stroke="currentColor" stroke-width="1.3"/>
                    </svg>
                </span>
                <span class="utility-link__text">カート (0)</span>
            </a>
        </div>
    </div>

    <div class="site-search" id="siteSearch">
        <input type="search" placeholder="商品を検索する" aria-label="商品を検索する">
        <button type="button">検索</button>
    </div>

    <nav class="site-nav" id="siteNav">
        <ul>
            <li>
                <a href="/silver/index.php" class="<?= $current_cat === null ? 'is-active' : '' ?>">TOP</a>
            </li>
            <?php foreach ($categories as $key => $label): ?>
                <li>
                    <a href="/silver/category.php?cat=<?= h($key) ?>"
                       class="<?= $current_cat === $key ? 'is-active' : '' ?>">
                        <?= h($label) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
