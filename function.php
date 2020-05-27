jQuery(document).ready(function($){
		$('.woocommerce-cart-form').submit(function(e){
			e.preventDefault();
			var form_data = $(this).serialize();
			var quantity1 = $('.qty').eq(0).val();
			var quantity2 = $('.qty').eq(1).val();
			var quantity3 = $('.qty').eq(2).val();
			var s_data = {
				'action': 'add_cart_products',
				'quantity_1':  quantity1,
				'quantity_2':  quantity2,
				'quantity_3':  quantity3
			};
			$.ajax({
			  url: "/wp-admin/admin-ajax.php",
			  method: "POST",
			  data: s_data,
			  beforeSend: function(){

			  },
			  success: function(response){
			  	setTimeout(function(){ location.reload(true); }, 1000);
			  }
			});
		});
	});
