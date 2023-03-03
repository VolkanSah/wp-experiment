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

<?php
class WPAdvancedToolbox {
	protected $pdo;

	public function __construct() {
		try {
			$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}

		// require register-settings.php
		require_once plugin_dir_path(__FILE__) . 'register-settings.php';
		// require sanitize.php
		require_once plugin_dir_path(__FILE__) . 'sanitize.php';

		// add section to settings page
		add_action('admin_init', array($this, 'add_settings_section'));
	}

	public function add_settings_section() {
		add_settings_section(
			'wp_advanced_toolbox__setting_section', // id
			'Settings', // title
			'', // callback
			'wp-advanced-toolbox-admin' // page
		);

		// add other settings fields here
	}
}

if (is_admin()) {
	$wp_advanced_toolbox = new WPAdvancedToolbox();
}
