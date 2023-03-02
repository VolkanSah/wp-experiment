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

class WPAdvancedToolboxPDO 	{
	private $wp_advanced_toolbox__options;
	protected $plugin_name;
	protected $version;
	protected $pdo;
	public function __construct() {
		try 	{
			$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) 	{
			die("Connection failed: " . $e->getMessage());
				}

		$this->plugin_name = 'WPAdvancedToolboxPDO';
		$this->version = '1.0.0';
		$this->add_actions();
		$this->remove_action();
							}
	
	}
	private function add_actions() {
		add_action( 'admin_menu', array( $this, 'wp_advanced_toolbox__add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_advanced_toolbox__page_init' ) );

	}


	public function wp_advanced_toolbox__add_plugin_page( $atts ) {
		add_options_page(
			'Wp-Experiment', // page_title
			'Wp-Experiment', // menu_title
			'manage_options', // capability
			'wp-advanced-toolbox', // menu_slug
			array( $this, 'wp_advanced_toolbox__create_admin_page' ) // function
		);
	}



	// create admin_page
	private function wp_advanced_toolbox__create_admin_page() {
		$this->wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' );
		$html = "<div class="wrap">";
			$html = "<h2> Wp-Experiment </h2>";
			$html = "<p>some text 1 ";
			$html = "some text 2</p>";
			$html = "<form method="post" action="options.php">";
			
		}



		// setting fields
	public function wp_advanced_toolbox__page_init() {
		register_setting(
			'wp_advanced_toolbox__option_group', // option_group
			'wp_advanced_toolbox__option_name', // option_name
			array( $this, 'wp_advanced_toolbox__sanitize' ) // sanitize_callback
		);
		add_settings_section(
			'wp_advanced_toolbox__setting_section', // id
			'Settings', // title
			array( $this, 'wp_advanced_toolbox__section_info' ), // callback
			'wp-advanced-toolbox-admin' // page
		);
		add_settings_field(
			'rsd_link_0', // id
			'RSD link', // title
			array( $this, 'rsd_link_0_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		}
		// sanitize
		public function wp_advanced_toolbox__sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['rsd_link_0'] ) ) {
			$sanitary_values['rsd_link_0'] = $input['rsd_link_0'];
		}
				return $sanitary_values;
		}
	// callback
	public function wp_advanced_toolbox__section_info() {
		
	}

	public function rsd_link_0_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[rsd_link_0]" id="rsd_link_0" value="rsd_link_0" %s> <label for="rsd_link_0">remove really simple discovery link</label>',
			( isset( $this->wp_advanced_toolbox__options['rsd_link_0'] ) && $this->wp_advanced_toolbox__options['rsd_link_0'] === 'rsd_link_0' ) ? 'checked' : ''
		);
	}
	}
if ( is_admin() )
	$wp_advanced_toolbox_ = new WPAdvancedToolboxPDO();
$wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' );
if( wp_advanced_toolbox__options )
{
if( isset( $wp_advanced_toolbox__options['rsd_link_0']) )
	{
		// remove really simple discovery
		$this->remove_action('wp_head', 'rsd_link'); 
	}

}
			
}
new WPAdvancedToolboxPDO();

