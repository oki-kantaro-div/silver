<?php
/**
 * 呼び出し側で $product をセットしてから include すること。
 * $card_rank に数値をセットするとランキング番号バッジを表示する。
 */
$rank = isset($card_rank) ? $card_rank : null;
?>
<a href="/silver/product.php?id=<?= h($product['id']) ?>" class="product-card">
    <span class="product-card__image">
        <?php if ($rank): ?>
            <span class="product-card__rank">No.<?= h($rank) ?></span>
        <?php elseif (!empty($product['new'])): ?>
            <span class="product-card__badge">NEW</span>
        <?php endif; ?>
        <img src="<?= h($product['image']) ?>" alt="<?= h($product['name']) ?>" loading="lazy">
    </span>
    <span class="product-card__name"><?= h($product['name']) ?></span>
    <span class="product-card__price"><?= h(format_price($product['price'])) ?></span>
</a>
<?php $card_rank = null; ?>
