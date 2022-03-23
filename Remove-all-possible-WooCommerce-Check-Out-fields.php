<?php
 /**
 Remove all possible WooCommerce Check Out fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    unset( $fields['billing']['billing_last_name'] );
    unset( $fields['billing']['billing_postcode'] );
	unset( $fields['billing']['billing_company']);
	unset( $fields['billing']['billing_city']);
	unset( $fields['billing']['billing_address_2']);

    // Shipping fields
    unset( $fields['shipping']['shipping_last_name'] );
    unset( $fields['shipping']['shipping_postcode'] );
	unset( $fields['shipping']['shipping_company']);
	unset( $fields['shipping']['shipping_city']);
	unset( $fields['shipping']['shipping_address_2']);

    // Order fields
    //unset( $fields['order']['order_comments'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

function custom_override_checkout_fields($fields) {
	// Billing
	$fields['billing']['billing_first_name']['placeholder'] = 'Full Name';
	$fields['billing']['billing_first_name']['label'] = 'Name';
	$fields['billing']['billing_first_name']['class'][0] = 'form-row-wide';

	// Shipping
	$fields['shipping']['shipping_first_name']['placeholder'] = 'Full Name';
	$fields['shipping']['shipping_first_name']['label'] = 'Full Name';

	/* echo '<pre>';
	print_r( $fields );
	echo '</pre>'; */

	return $fields;
}
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_address_field( $fields ) {
    $fields['address_1']['placeholder'] = 'House number, Street name and Area name';
	$fields['address_1']['label'] = 'Address';

	/* echo '<pre>';
	print_r( $fields );
	echo '</pre>'; */

    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'custom_override_checkout_address_field' );
