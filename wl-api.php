<?php
/**
 * Plugin Name: Custom API
 * Plugin URI: https://appsumo.com/
 * Description: app summo api
 * Version: 1.0
 * Author: Umer Farooq
 * Author URI: https://appsumo.com/
 */
 

 
function awhitepixel_rest_route_getsomedata( $request ) {
	$product_id = $request->get_param( 'message' );
	if (  $product_id   == 'product_activated' ) {
		//http://summoapi.test/wp-json/custom/v1/summoapi?message=asds
		$response = 'Return product data for ID ' . $product_id;
	} else if(  $product_id  == 'transaction') {
		$response = 'Transaction2';
	} else if(  $product_id   == 'reduce_tier') {
		$response = 'Reduce Tier';
	} else if(  $product_id   == 'enhanced') {
		$response = 'Enhanced';
	}  else if(  $product_id   == 'refunded') {
		$response = 'Refunded';
	} else{
		$response = 'Worng Request';
	}
	return rest_ensure_response( $response );
}



add_filter( 'jwt_auth_whitelist', function ( $endpoints ) {
	return array(
		'/wp-json/custom/v1/*',
	);
} );


 

add_action( 'rest_api_init', function () {
	register_rest_route( 'custom/v1', 'summoapi', array(
		'methods'  => 'POST',
		'callback' => 'awhitepixel_rest_route_getsomedata',
	) );
} );