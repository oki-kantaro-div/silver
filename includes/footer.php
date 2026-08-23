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
                    <li><a href="#">ご利用ガイド</a></li>
                    <li><a href="#">お支払い・配送について</a></li>
                    <li><a href="#">よくあるご質問</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div>

            <div class="site-footer__col">
                <p class="site-footer__heading">ABOUT</p>
                <ul>
                    <li><a href="#">会社情報</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                    <li><a href="#">特定商取引法に基づく表記</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p class="site-footer__copy">&copy; <?= date('Y') ?> SILVER. All Rights Reserved.</p>
            <ul class="site-footer__sns">
                <li><a href="#" aria-label="Instagram">Instagram</a></li>
                <li><a href="#" aria-label="X">X</a></li>
                <li><a href="#" aria-label="LINE">LINE</a></li>
            </ul>
        </div>

    </div>
</footer>

<script src="/silver/assets/js/main.js"></script>
