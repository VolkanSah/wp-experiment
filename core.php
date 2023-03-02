<?php

/*
 * The plugin bootstrap file
 * @link              https://wordpress-webmaster.de
 * @since             1.0.0
 * @package           SETeam
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
	private $wp_advanced_toolbox__options;

	public function __construct() {
		try {
			$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}

		add_action('admin_menu', array($this, 'wp_advanced_toolbox_add_plugin_page'));
		add_action('admin_init', array($this, 'wp_advanced_toolbox_page_init'));
	}

	private function wp_advanced_toolbox_add_plugin_page() {
		add_options_page(
			'Wp-Experiment',
			'Wp-Experiment',
			'manage_options',
			'wp-advanced-toolbox',
			array($this, 'wp_advanced_toolbox_create_admin_page')
		);
	}

	private function wp_advanced_toolbox_create_admin_page() {
		$this->wp_advanced_toolbox__options = get_option('wp_advanced_toolbox__option_name');
		?>
		<div class="wrap">
			<h2>Wp-Experiment</h2>
			<p>some text 1 some text 2</p>
			<form method="post" action="options.php">
				<?php settings_fields('wp_advanced_toolbox__option_group'); ?>
				<?php do_settings_sections('wp-advanced-toolbox-admin'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	public function wp_advanced_toolbox_page_init() {
		register_setting(
			'wp_advanced_toolbox__option_group',
			'wp_advanced_toolbox__option_name',
			array($this, 'wp_advanced_toolbox_sanitize')
		);

		add_settings_section(
			'wp_advanced_toolbox__setting_section',
			'Settings',
			array($this, 'wp_advanced_toolbox_section_info'),
			'wp-advanced-toolbox-admin'
		);

		add_settings_field(
			'rsd_link_0',
			'RSD link',
			array($this, 'rsd_link_0_callback'),
			'wp-advanced-toolbox-admin',
			'wp_advanced_toolbox__setting_section'
		);
	}

	

	public function wp_advanced_toolbox_sanitize($input) {
		$sanitary_values = array();

		if (isset($input['rsd_link_0'])) {
			$sanitary_values['rsd_link_0'] = $input['rsd_link_0'];
		}

		if (isset($input['rsd_link_0'])) {
			$new_option_value = $input['rsd_link_0'];
			$stmt_update_option = $this->pdo->prepare("UPDATE wp_options SET option_value = :rsd_link_0 WHERE option_name = 'remove RSD link'");
			)

			return $sanitary_values;
}
}
if (is_admin()) {
$wp_advanced_toolbox = new WPAdvancedToolboxPDO();
$wp_advanced_toolbox_options = get_option('wp_advanced_toolbox__option_name');
if ($wp_advanced_toolbox_options && isset($wp_advanced_toolbox_options['rsd_link_0'])) {
remove_action('wp_head', 'rsd_link');
}
}

