//Add to Cart products fro dashboard
add_action('wp_ajax_add_cart_products', 'add_cart_products');
add_action('wp_ajax_nopriv_add_cart_products', 'add_cart_products');

function add_cart_products(){
	$product_ids = [15,14,13];

	foreach ($product_ids as $key => $value) {
		$p_hname = 'quantity_'.($key + 1);
		$p_hcount = $_POST[$p_hname];
		$product_cart_id = WC()->cart->generate_cart_id( $value );
		$cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
		if ( $cart_item_key ){
			WC()->cart->remove_cart_item( $cart_item_key );
		}
		WC()->cart->add_to_cart( $value, $p_hcount );

	}

	return json_encode('success');
}
