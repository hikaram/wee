<?php
/**
 * Product loop sale flash
 *
 * @author 		AngelsIT
 * @package 	Kute Theme
 * @version     2.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_attr__( 'Распродажа', 'kutetheme' ) . '</span>', $post, $product ); ?>

<?php endif; ?>
