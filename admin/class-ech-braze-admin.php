<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://127.0.0.1
 * @since      1.0.0
 *
 * @package    Ech_Braze
 * @subpackage Ech_Braze/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ech_Braze
 * @subpackage Ech_Braze/admin
 * @author     Rowan Chang <rowanchang@prohaba.com>
 */
class Ech_Braze_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		if ( (isset($_GET['page']) && $_GET['page'] == 'ech_braze_general_settings')) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ech-braze-admin.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		if ( (isset($_GET['page']) && $_GET['page'] == 'ech_braze_general_settings')) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ech-braze-admin.js', array( 'jquery' ), $this->version, false );
		}

	}

		/**
	 * ^^^ Add Plugin Admin menu
	 *
	 * @since    1.0.0
	 */
	public function braze_admin_menu() {
		add_menu_page( 'ECH Braze Plugin Settings', 'ECH Braze', 'manage_options', 'ech_braze_general_settings', array($this, 'braze_admin_page'), 'dashicons-buddicons-tracking', 110 );
	}

	// return views
	public function braze_admin_page() {
		require_once ('partials/ech-braze-admin-display.php');
	}

	/**
	 * ^^^ Register custom fields for plugin settings
	 *
	 * @since    1.0.0
	 */
	public function reg_braze_general_settings() {
		// Register all settings for general setting page
		register_setting( 'braze_gen_settings', 'ech_braze_api_key');
		register_setting( 'braze_gen_settings', 'ech_braze_base_url');
		register_setting( 'braze_gen_settings', 'ech_braze_website_brand_name');
	}

}
