<?php
/*
 * Plugin Name: Bottom Admin Bar by Themecraft Studio
 * Plugin URI:  https://themecraft.studio/wordpress-bottom-admin-bar/
 * Description: Move your admin bar to the bottom of the page.
 * Version:     0.0.1
 * Author:      Themecraft Studio
 * Author URI:  https://themecraft.studio/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: tc-admin-bar
 * Domain Path: /languages
 * GitHub Plugin URI: https://github.com/themecraftstudio/wordpress-bottom-admin-bar

 Content Attachments is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version.

 Content Attachments is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Content Attachments. If not, see LICENSE.txt .
 */

add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

add_action( 'admin_bar_menu', function (/** @var WP_Admin_Bar $bar */ $bar) {
	$bar->add_node([
		'id' => 'visibility',
		'title' => __('Toggle Visibility', 'tc-admin-bar'),
		'parent' => 'top-secondary',
		'meta' => ['title' => __('Toggle visibility', 'tc-admin-bar')]
	]);
	$bar->add_node([
		'id' => 'position',
		'title' => sprintf('%s', __('Toggle Position', 'tc-admin-bar')),
		'parent' => 'top-secondary',
		'meta' => ['title' => __('Toggle position', 'tc-admin-bar')]
//		'meta' => ['html' => '<span>markup inserted inside the <li> and after the title</span>']
	]);
}, 5 );

add_action('wp_before_admin_bar_render', function () {
	/** @var WP_Admin_Bar $wp_admin_bar */
	global $wp_admin_bar;

	if (!$myAccountNode = $wp_admin_bar->get_node('my-account')) // returns *cloned* node
		return;

	$title = preg_replace('/^Howdy, <span[^>].+<\/span>/', '', $myAccountNode->title );

	// Override node settings
	$wp_admin_bar->add_node([
		'id' => 'my-account',
		'title' => $title
	]);
});

add_action( 'admin_bar_init', function () {
	wp_enqueue_style( 'tc-admin-bar', plugins_url( 'admin-bar.css',__FILE__), [ 'admin-bar' ] );

	wp_register_script( 'tc-admin-bar', plugins_url( 'admin-bar.js', __FILE__), ['jquery'], '1.0.0', true );
	wp_enqueue_script( 'tc-admin-bar' );
} );