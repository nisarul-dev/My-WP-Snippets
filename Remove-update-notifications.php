<?php
/**
 * Disable individual Theme update notification
 */
function disable_theme_update_notification( $value ) {

    if ( isset( $value ) && is_object( $value ) ) {
		// Astra Theme
        unset( $value->response['astra'] );

		// Twenty Twenty Theme
		unset( $value->response['twentytwenty'] );
    }

    return $value;
}
add_filter( 'site_transient_update_themes', 'disable_theme_update_notification' );

/**
 * Disable individual Plugin update notification
 */
function disable_plugin_update_notification( $value ) {

    if ( isset( $value ) && is_object( $value ) ) {
		// Elementor Plugin
        unset( $value->response[ 'elementor-pro/elementor-pro.php' ] );
		unset( $value->response[ 'elementor/elementor.php' ] );

		// Super-Socializer Plugin
		unset( $value->response[ 'super-socializer/super_socializer.php' ] );

		// Kadence email designer Plugin
		unset( $value->response[ 'kadence-woocommerce-email-designer/kadence-woocommerce-email-designer.php' ] );

		// WP Mail Bank Plugin
		unset( $value->response[ 'wp-mail-bank/wp-mail-bank.php' ] );

		// Astra-addon Bank Plugin
		unset( $value->response['astra-addon/astra-addon.php'] );
    }

    return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_update_notification' );
