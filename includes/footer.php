<?php
$sns_icon_instagram = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.5" y="2.5" width="15" height="15" rx="4" stroke="currentColor" stroke-width="1.3"/><circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="1.3"/><circle cx="14.3" cy="5.7" r="0.9" fill="currentColor"/></svg>';

$sns_icon_x = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="4" y1="4" x2="16" y2="16" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><line x1="16" y1="4" x2="4" y2="16" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>';

$sns_icon_line = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5C5.6 3.5 2 6.4 2 10C2 12.9 4.3 15.3 7.5 16.1C7.7 16.2 7.9 16.3 7.9 16.6C7.9 16.8 7.7 17.6 7.6 17.9C7.6 18.2 7.8 18.4 8.1 18.2C8.5 17.9 10.4 16.7 11.4 15.9C11.6 15.7 11.8 15.7 12 15.7C16 15.3 18 12.5 18 10C18 6.4 14.4 3.5 10 3.5Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>';

$sns_icon_facebook = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="7.5" stroke="currentColor" stroke-width="1.3"/><path d="M11.8 6.8H10.6C9.8 6.8 9.3 7.3 9.3 8.1V9.8H11.7L11.4 12H9.3V17" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/><line x1="7.2" y1="9.8" x2="9.3" y2="9.8" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>';

$sns_icon_tiktok = '<svg viewBox="0 0 20 20" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="7.5" cy="14.3" r="2.6" stroke="currentColor" stroke-width="1.3"/><path d="M10.1 14.3V3.3C10.1 3.3 10.5 6 12.3 6.9C13.3 7.4 14.3 7.4 14.3 7.4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<footer class="site-footer">
    <div class="site-footer__inner">

        <div class="site-footer__top">
            <div class="site-footer__brand">
                <p class="site-footer__logo">SILVER</p>
                <p class="site-footer__tagline">Silver jewelry, quietly refined.</p>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">SHOP</p>
                <ul>
                    <li><a href="/silver/index.php">TOP</a></li>
                    <?php foreach ($categories as $key => $label): ?>
                        <li><a href="/silver/category.php?cat=<?= h($key) ?>"><?= h($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">GUIDE</p>
                <ul>
                    <li><a href="/silver/guide.php">ご利用ガイド</a></li>
                    <li><a href="/silver/guide.php#payment">お支払い・配送について</a></li>
                    <li><a href="/silver/refund-policy.php">返品ポリシー</a></li>
                    <li><a href="/silver/faq.php">よくあるご質問</a></li>
                    <li><a href="/silver/contact.php">お問い合わせ</a></li>
                </ul>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">ABOUT</p>
                <ul>
                    <li><a href="/silver/company.php">会社情報</a></li>
                    <li><a href="/silver/privacy-policy.php">プライバシーポリシー</a></li>
                    <li><a href="/silver/terms.php">ご利用規約</a></li>
                    <li><a href="/silver/legal-notice.php">特定商取引法に基づく表記</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p class="site-footer__copy">&copy; <?= date('Y') ?> SILVER. All Rights Reserved.</p>
            <ul class="site-footer__sns">
                <li><a href="#" class="sns-link" aria-label="Instagram"><?= $sns_icon_instagram ?></a></li>
                <li><a href="#" class="sns-link" aria-label="X"><?= $sns_icon_x ?></a></li>
                <li><a href="#" class="sns-link" aria-label="LINE"><?= $sns_icon_line ?></a></li>
                <li><a href="#" class="sns-link" aria-label="Facebook"><?= $sns_icon_facebook ?></a></li>
                <li><a href="#" class="sns-link" aria-label="TikTok"><?= $sns_icon_tiktok ?></a></li>
            </ul>
        </div>

    </div>
</footer>

<script src="/silver/assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>"></script>
