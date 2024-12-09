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
