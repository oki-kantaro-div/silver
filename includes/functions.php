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
