<?php

function h($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function format_price($price) {
    return '¥' . number_format((int) $price);
}

function find_product($products, $id) {
    foreach ($products as $product) {
        if ((int) $product['id'] === (int) $id) {
            return $product;
        }
    }
    return null;
}

function pickup_products($products) {
    return array_values(array_filter($products, function ($p) {
        return !empty($p['pickup']);
    }));
}

function products_by_category($products, $category) {
    if (!$category) {
        return $products;
    }
    return array_values(array_filter($products, function ($p) use ($category) {
        return $p['category'] === $category;
    }));
}

function new_products($products, $limit = 8) {
    $items = array_values(array_filter($products, function ($p) {
        return !empty($p['new']);
    }));
    return array_slice($items, 0, $limit);
}

function ranking_by_category($products, $categories, $limit = 5) {
    $ranking = [];
    foreach (array_keys($categories) as $key) {
        $ranking[$key] = array_slice(products_by_category($products, $key), 0, $limit);
    }
    return $ranking;
}

function build_cart($products, $lines, $free_shipping_threshold = 8800, $shipping_fee = 660) {
    $items = [];
    $subtotal = 0;

    foreach ($lines as $line) {
        $product = find_product($products, $line['id']);
        if (!$product) {
            continue;
        }
        $product['qty'] = $line['qty'];
        $product['line_total'] = $product['price'] * $line['qty'];
        $subtotal += $product['line_total'];
        $items[] = $product;
    }

    $fee = ($subtotal === 0 || $subtotal >= $free_shipping_threshold) ? 0 : $shipping_fee;

    return [
        'items' => $items,
        'subtotal' => $subtotal,
        'free_shipping_threshold' => $free_shipping_threshold,
        'shipping_fee' => $fee,
        'total' => $subtotal + $fee,
    ];
}

function search_products($products, $keyword) {
    $keyword = trim((string) $keyword);
    if ($keyword === '') {
        return [];
    }
    return array_values(array_filter($products, function ($p) use ($keyword) {
        return mb_stripos($p['name'], $keyword) !== false
            || mb_stripos($p['description'], $keyword) !== false;
    }));
}
