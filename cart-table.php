<?php
	//wp_enqueue_script('wc-cart');
	$product_ids = [15,14,13];
?>

<form class="woocommerce-cart-form" action="<?php echo $PHP_SELF;?>" method="post">
	<table class="shop_table shop_table_responsive" cellspacing="0">
		<thead>
			<tr>
				<th class="product-name">Product</th>
				<th class="product-price">Price</th>
				<th class="product-quantity">Quantity</th>
				<th class="product-subtotal">Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($product_ids as $key => $p_id) {
					$product_retail = wc_get_product($p_id);
					$pr_name = $product_retail->get_name();
					$pr_img = $product_retail->get_image();
					$pr_price = $product_retail->get_price();
					$pr_link = $product_retail->get_permalink();
					$car_id = WC()->cart->generate_cart_id( $p_id );
			?>
				<tr class="product_item-retail">
					<td class="product-name" data-title="Product">
						<div class="fusion-product-name-wrapper">
							<span class="product-thumbnail">
								<a href="<?php echo $pr_link; ?>">
									<?php echo $pr_img; ?>
								</a>
							</span>
							<div class="product-info">
								<a class="product-title" href="<?php $pr_link; ?>"><?php echo $pr_name; ?></a>
							</div>
						</div>
					</td>
					<td class="product-price" data-title="Price">
						<span class="woocommerce-Price-amount amount" data-amount="<?php echo $pr_price;?>">
							<span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span><?php echo $pr_price; ?>
						</span>
					</td>
					<td class="product-quantity" data-title="Quantity">
						<div class="quantity">
							<input type="button" value="-" class="minus">						
							<input type="number" id="quantity_<?php echo $p_id;?>" class="input-text qty text" step="1" min="0" max="" name="<?php echo 'quantity_'.$p_id;?>" value="<?php echo WC()->cart->get_cart_item_quantities()[$p_id]; ?>" title="Qty" size="4" placeholder="" inputmode="numeric">
							<input type="button" value="+" class="plus">
						</div>
					</td>
					<td class="product-subtotal" data-title="Total">
						<span class="woocommerce-Price-amount amount">
							<?php echo WC()->cart->get_product_subtotal( $product_retail, WC()->cart->get_cart_item_quantities()[$p_id] ); ?>
						</span>
					</td>
				</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="6" class="actions">
					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
				</td>
			</tr>
		</tbody>
	</table>
</form>
