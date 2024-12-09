# hover-image-elementor
Custom code for adding hover images in WooCommerce with Elementor widget products using PHP and CSS.

PHP:
//Hover image on products
add_action('woocommerce_before_shop_loop_item_title', 'add_second_image_on_hover', 10);

function add_second_image_on_hover() {
    global $product;

    $gallery = $product->get_gallery_image_ids();
    if (!empty($gallery)) {
        $hover_image_id = $gallery[0];
        $hover_image_url = wp_get_attachment_image_url($hover_image_id, 'woocommerce_single'); // Gebruik een hogere resolutie
        echo '<img src="' . esc_url($hover_image_url) . '" class="hover-image">';
    }
}

CSS:
/* Standard image en hover image */
.woocommerce ul.products li.product img {
    transition: opacity 0.3s ease-in-out;
    position: relative;
}

.woocommerce ul.products li.product .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    z-index: 2;
}

.woocommerce ul.products li.product:hover .hover-image {
    opacity: 1;
}
