<?php

// modern ruble symbol
add_filter( 'woocommerce_currencies', 'add_ruble' );

function add_ruble( $currencies ) {
    $currencies['ABC'] = __( 'Российский рубль1', 'woocommerce' );
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_ruble_symbol', 10, 2);

function add_ruble_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
	case 'ABC': $currency_symbol = '<span class="rur">&nbsp;руб.</span>'; break;
    }
    return $currency_symbol;
}

// Add "featured" product category banner
function featuredbanner_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[featuredbanner_meta]"><?php _e( 'Featured banner', 'featuredbanner' ); ?></label>
		<input type="text" name="term_meta[featuredbanner_meta]" id="term_meta[featuredbanner_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку на картинку банера','featuredbanner' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'featuredbanner_taxonomy_add_new_meta_field', 10, 2 );

function featuredbannerlink_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[featuredbannerlink_meta]"><?php _e( 'Featured banner Link', 'featuredbannerlink' ); ?></label>
		<input type="text" name="term_meta[featuredbannerlink_meta]" id="term_meta[featuredbannerlink_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','featuredbannerlink' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'featuredbannerlink_taxonomy_add_new_meta_field', 10, 2 );

// Edit "featured" product category banner
function featuredbanner_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[featuredbanner_meta]"><?php _e( 'Featured banner', 'featuredbanner' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[featuredbanner_meta]" id="term_meta[featuredbanner_meta]" size="40" value="<?php echo esc_attr( $term_meta['featuredbanner_meta'] ) ? esc_attr( $term_meta['featuredbanner_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку на картинку банера','featuredbanner' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'featuredbanner_taxonomy_edit_meta_field', 10, 2 );

function featuredbannerlink_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[featuredbannerlink_meta]"><?php _e( 'Featured banner Link', 'featuredbannerlink' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[featuredbannerlink_meta]" id="term_meta[featuredbannerlink_meta]" size="40" value="<?php echo esc_attr( $term_meta['featuredbannerlink_meta'] ) ? esc_attr( $term_meta['featuredbannerlink_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','featuredbannerlink' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'featuredbannerlink_taxonomy_edit_meta_field', 10, 2 );



// Add left horizontal product category banner
function leftbanner_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[leftbanner_meta]"><?php _e( 'Left horizontal banner', 'leftbanner' ); ?></label>
		<input type="text" name="term_meta[leftbanner_meta]" id="term_meta[leftbanner_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку на картинку банера','leftbanner' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'leftbanner_taxonomy_add_new_meta_field', 10, 2 );

function leftbannerlink_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[leftbannerlink_meta]"><?php _e( 'Left horizontal banner Link', 'leftbannerlink' ); ?></label>
		<input type="text" name="term_meta[leftbannerlink_meta]" id="term_meta[leftbannerlink_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','leftbannerlink' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'leftbannerlink_taxonomy_add_new_meta_field', 10, 2 );

// Edit left horizontal product category banner
function leftbanner_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[leftbanner_meta]"><?php _e( 'Left horizontal banner', 'leftbanner' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[leftbanner_meta]" id="term_meta[leftbanner_meta]" size="40" value="<?php echo esc_attr( $term_meta['leftbanner_meta'] ) ? esc_attr( $term_meta['leftbanner_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку на картинку банера','leftbanner' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'leftbanner_taxonomy_edit_meta_field', 10, 2 );

function leftbannerlink_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[leftbannerlink_meta]"><?php _e( 'Left horizontal banner Link', 'leftbannerlink' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[leftbannerlink_meta]" id="term_meta[leftbannerlink_meta]" size="40" value="<?php echo esc_attr( $term_meta['leftbannerlink_meta'] ) ? esc_attr( $term_meta['leftbannerlink_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','leftbannerlink' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'leftbannerlink_taxonomy_edit_meta_field', 10, 2 );

// Add right horizontal product category banner
function rightbanner_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[rightbanner_meta]"><?php _e( 'Right horizontal banner', 'rightbanner' ); ?></label>
		<input type="text" name="term_meta[rightbanner_meta]" id="term_meta[rightbanner_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку на картинку банера','rightbanner' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'rightbanner_taxonomy_add_new_meta_field', 10, 2 );

function rightbannerlink_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[rightbannerlink_meta]"><?php _e( 'Right horizontal banner Link', 'rightbannerlink' ); ?></label>
		<input type="text" name="term_meta[rightbannerlink_meta]" id="term_meta[rightbannerlink_meta]" size="40" value="">
		<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','rightbannerlink' ); ?></p>
	</div>
<?php
}
add_action( 'product_cat_add_form_fields', 'rightbannerlink_taxonomy_add_new_meta_field', 10, 2 );



// Edit right horizontal product category banner
function rightbanner_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[rightbanner_meta]"><?php _e( 'Right horizontal banner', 'rightbanner' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[rightbanner_meta]" id="term_meta[rightbanner_meta]" size="40" value="<?php echo esc_attr( $term_meta['rightbanner_meta'] ) ? esc_attr( $term_meta['rightbanner_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку на картинку банера','rightbanner' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'rightbanner_taxonomy_edit_meta_field', 10, 2 );

function rightbannerlink_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[rightbannerlink_meta]"><?php _e( 'Right horizontal banner Link', 'rightbannerlink' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[rightbannerlink_meta]" id="term_meta[rightbannerlink_meta]" size="40" value="<?php echo esc_attr( $term_meta['rightbannerlink_meta'] ) ? esc_attr( $term_meta['rightbannerlink_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Введите ссылку, по которой будет переход с банера','rightbannerlink' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'rightbannerlink_taxonomy_edit_meta_field', 10, 2 );


// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_product_cat', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_product_cat', 'save_taxonomy_custom_meta', 10, 2 );
 

?>
