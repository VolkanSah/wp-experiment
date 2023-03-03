<?php

/*
 * The plugin bootstrap file
 * @link              https://wordpress-webmaster.de
 * @since             1.0.0
 * @package           WPWM
 *
 * @wordpress-plugin
 * Plugin Name:       Wp-Experiment
 * Plugin URI:        https://wordpress-webmaster.de
 * Description:       using PDO and prepared statements.
 * Version:           1.0.0
 * Author:            Volkan Sah
 * Author URI:        https://wordpress-webmaster.de
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_advanced_toolbox
 * Domain Path:       /languages
 */

class WPAdvancedToolboxPDO {
	protected $pdo;
	protected $version;
	protected $do_settings_sections;
	private $wp_advanced_toolbox__options;
	//  start function __construct
	public function __construct() {
		// use pdo
		try {	$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
	}
			// Name & Version for updates
			$this->plugin_name = 'wp-advanced-toolbox-pdp-stmt';
			$this->version = '1.0.b';
			$this->stmt->require_once plugin_dir_path( dirname( __FILE__ ) ) . 'register-settings.php';
			$this->add_action('admin_init', array($this, 'wp_advanced_toolbox_page_init'));
			$this->stmt->require_once plugin_dir_path( dirname( __FILE__ ) ) . 'sanitize.php';

			$this->add_settings_field(), 
			$this->get_version(), 
			$this->do_settings_sections() );
			$this->add_action('admin_menu', array($this, 'wp_advanced_toolbox_add_plugin_page'));
			$this->wp_advanced_toolbox_add_plugin_page() {
			$this->add_options_page('Wp-Experiment','Wp-Experiment','manage_options','wp-advanced-toolbox',array($this, 'wp_advanced_toolbox_create_admin_page'));
			$this->wp_advanced_toolbox_create_admin_page() {
			$this->wp_advanced_toolbox__options = get_option('wp_advanced_toolbox__option_name');
			// escape php? dont like!
			?> 
			<div class="wrap">
			<h2>Wp-Experiment</h2>
			<form method="post" action="options.php">
				<?php settings_fields('wp_advanced_toolbox__option_group'); ?>
				<?php do_settings_sections('wp-advanced-toolbox-admin'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php // start php
	}
		
	}


}

