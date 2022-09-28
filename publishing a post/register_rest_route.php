<?php
/**
 * @package Tooltip
 * @version 0.0.1
 * /*
 * Plugin Name: publishing post rout
 * Plugin URI: http://wordpress.org/plugins/Tooltip/
 * Description:
 * Author: Evgeny Klimovich
 * Version: 0.0.2
 * Author URI: http://testsite.ru
 */

add_action( 'rest_api_init', function () {

	register_rest_route( 'publishing_post', '/publishing', array(
		[
			'methods'             => 'POST',
			'callback'            => 'add_coin_post',
			'permission_callback' => null,
			'args'                => [],
		],
	) );} );
function add_coin_post(){

	// Добавляем пост в БД

	$post_data = [
		'post_type'   => 'post',
		'post_title'  => ['name'],
		'post_name'   => '',
		'post_status' => 'pending',
	];

	$post_id = wp_insert_post( wp_slash( $post_data ), true, false );

	if( is_wp_error( $post_id ) ){
		return $post_id;
	}}


