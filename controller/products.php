<?php
$products = [
    [
        "name" => "Apple iPhone 14 Pro Max",
        "price" => 1399,
        "category" => "Smartphones",
        "description" => "The latest iPhone with an advanced triple-camera system, 6.7-inch display, and A16 Bionic chip.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/apple_iphone_14_pro_max.jpg",
        "availability" => "In Stock"
    ],
    [
        "name" => "Samsung Galaxy S23 Ultra",
        "price" => 1299,
        "category" => "Smartphones",
        "description" => "High-performance smartphone with a powerful camera, Snapdragon 8 Gen 2, and a 6.8-inch display.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/samsung_galaxy_s23_ultra.jpg",
        "availability" => "In Stock"
    ],
    [
        "name" => "Apple AirPods Pro (2nd Gen)",
        "price" => 249,
        "category" => "Accessories",
        "description" => "Noise-canceling wireless earphones with MagSafe charging and improved battery life.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/apple_airpods_pro.jpg",
        "availability" => "In Stock"
    ],
    [
        "name" => "Samsung Galaxy Watch 6",
        "price" => 399,
        "category" => "Wearables",
        "description" => "A sleek smartwatch with advanced health monitoring and a 1.4-inch AMOLED display.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/samsung_galaxy_watch_6.jpg",
        "availability" => "In Stock"
    ],
    [
        "name" => "Xiaomi Redmi Note 12",
        "price" => 299,
        "category" => "Smartphones",
        "description" => "Mid-range smartphone with a 6.6-inch display, 48MP camera, and 5000mAh battery.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/xiaomi_redmi_note_12.jpg",
        "availability" => "In Stock"
    ],
    [
        "name" => "Apple iPad Air (5th Gen)",
        "price" => 699,
        "category" => "Tablets",
        "description" => "Powerful tablet with a 10.9-inch Liquid Retina display and M1 chip for smooth performance.",
        "image_url" => "https://eshop.orange.jo/media/catalog/product/cache/1/image/400x533/apple_ipad_air_5.jpg",
        "availability" => "In Stock"
    ]
];

function filterByName($products, $name)
{
    $filteredProducts = [];
    foreach ($products as $product) {
        if ($product['name'] == $name) {
            $filteredProducts[] = $product;
        }
    }
    return $filteredProducts;
}

{

}
?>
<?php require 'views/products.view.php'; ?>
