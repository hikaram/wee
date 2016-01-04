<?php
/*
Template Name: ADD page
*/
get_header(); ?>
    <!-- page wapper-->
    <div class="columns-container">
        <div class="container" id="columns">

            <?php get_template_part('parts/breadcrumb'); ?>
            <!-- row -->
            <div class="row">



                <!-- Center colunm-->
                <div class="center_column" id="center_column">

                   <h1>Товар добавлен в корзину!"</h1>


                        <div class="row clearfix">
                          <div class="container clearfix">
                        <div class="col-sm-5 add-box">
        <span class="fa fa-check-circle fa-3x text-success panel-group-ico"></span>
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table cart" cellspacing="0">
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


					<td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
							}
						?>
					</td>

					<td class="product-name">
					<div>
						<?php
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?>
                        </div>
                        <div>
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
						</div>
					</td>


				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>


		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
                        </div>

                        <div class="col-sm-6 add-box">

                            <div>
                                <h2><?php echo 'В вашей корзине '.WC()->cart->get_cart_contents_count().' товар(ов). На сумму '.WC()->cart->get_cart_total();  ?> </h2>

                                <?php echo '<a href="' . esc_url( WC()->cart->get_checkout_url() ) . '" class="checkout-button button alt wc-forward" style="display: inline-block !important;">' . __( 'Proceed to Checkout', 'woocommerce' ) . '</a>'; ?>
                                <!--&nbsp;&nbsp;<a style="display: inline-block; margin-top: 10px;" href="/cart/">Перейти в корзину</a>-->&nbsp;&nbsp;
                                <a style="display: inline-block; margin-top: 10px;" href="/">Продолжить покупки</a>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
           </div>
    </div>
    <!-- ./page wapper-->
<?php get_footer(); ?>