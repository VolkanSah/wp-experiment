<?php

/**
 * The plugin bootstrap file
 * @link              https://wordpress-webmaster.de
 * @since             1.0.0
 * @package           SETeam
 *
 * @wordpress-plugin
 * Plugin Name:       Wp-Experiment
 * Plugin URI:        https://wordpress-webmaster.de
 * Description:       Yet
 * Version:           1.0.0
 * Author:            Volkan Sah
 * Author URI:        https://wordpress-webmaster.de
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_advanced_toolbox
 * Domain Path:       /languages
 */
class WPAdvancedToolbox {
	private $wp_advanced_toolbox__options;
/**
// for multisite soon

	if ( !function_exists( 'activate_plugin' ) ) { 
        require_once ABSPATH . '/wp-admin/includes/plugin.php'; 
    } 
      
    // Plugin path to main plugin file with plugin data. 
    $plugin = '../wp-content/plugins/plugin.php'; 
      
    // Optional. URL to redirect to. 
    $redirect = ''; 
      
    // Optional. Whether to enable the plugin for all sites in the network 
    // or just the current site. Multisite only. Default false. 
    $network_wide = true; 
      
    // Optional. Whether to prevent calling activation hooks. Default false. 
    $silent = false; 
      
    // NOTICE! Understand what this does before running. 
    $result = activate_plugin($plugin, $redirect, $network_wide, $silent);

*/	
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_advanced_toolbox__add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_advanced_toolbox__page_init' ) );
	}
	public function wp_advanced_toolbox__add_plugin_page() {
		add_options_page(
			'WP Advanced Toolbox ', // page_title
			'WP Advanced Toolbox ', // menu_title
			'manage_options', // capability
			'wp-advanced-toolbox', // menu_slug
			array( $this, 'wp_advanced_toolbox__create_admin_page' ) // function
		);
	}
	// create admin_page
	public function wp_advanced_toolbox__create_admin_page() {
		$this->wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' ); ?>
		<!-- start --><div class="wrap">
			<h2>WP Advanced Toolbox </h2>
			<p>This free extension by WordPress-Webmaster.de should help you to avoid 
			chaos in your Wordpress installation. You will notice, your WordPress site will be much faster.</p>
			<?php settings_errors(); ?>
			<form method="post" action="options.php">
				<?php
					settings_fields( 'wp_advanced_toolbox__option_group' );
					do_settings_sections( 'wp-advanced-toolbox-admin' );
					submit_button();
				?>
			</form>
		</div> <!-- end -->
	<?php }
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
		add_settings_field(
			'wp_generator_1', // id
			'WP Generator', // title
			array( $this, 'wp_generator_1_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'feed_2', // id
			'Feed', // title
			array( $this, 'feed_2_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'wlwmanifest_3', // id
			'Wlwmanifest', // title
			array( $this, 'wlwmanifest_3_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'shortlinks_4', // id
			'Shortlinks', // title
			array( $this, 'shortlinks_4_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'random_and_parent_post_link_5', // id
			'random and parent post link', // title
			array( $this, 'random_and_parent_post_link_5_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'next_and_previous_post_links_6', // id
			'next and previous post links', // title
			array( $this, 'next_and_previous_post_links_6_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'emoji_7', // id
			'Emoji', // title
			array( $this, 'emoji_7_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'rest_api_8', // id
			'REST API', // title
			array( $this, 'rest_api_8_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'rest_api_endpoint_9', // id
			'REST API endpoint', // title
			array( $this, 'rest_api_endpoint_9_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'oembed_auto_discovery_10', // id
			'oEmbed auto discovery', // title
			array( $this, 'oembed_auto_discovery_10_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'oembed_results_11', // id
			'oEmbed results', // title
			array( $this, 'oembed_results_11_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'oembed_discovery_links_12', // id
			'oEmbed discovery links', // title
			array( $this, 'oembed_discovery_links_12_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'oembed_specific_javascript_13', // id
			'oEmbed-specific JavaScript', // title
			array( $this, 'oembed_specific_javascript_13_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'embeds_rewrite_14', // id
			'Embeds rewrite', // title
			array( $this, 'embeds_rewrite_14_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'jsonfilter_v_1_15', // id
			'jsonFilter v. 1', // title
			array( $this, 'jsonfilter_v_1_15_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'jsonfilter_v_2_16', // id
			'jsonFilter v. 2', // title
			array( $this, 'jsonfilter_v_2_16_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'shortcodes_to_widgets_17', // id
			'Shortcodes to widgets', // title
			array( $this, 'shortcodes_to_widgets_17_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'disable_ip_in_coments_18', // id
			'Disable IP in coments', // title
			array( $this, 'disable_ip_in_coments_18_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'more_tag_scroll_19', // id
			'more tag & scroll', // title
			array( $this, 'more_tag_scroll_19_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'date_20', // id
			'Date', // title
			array( $this, 'date_20_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
		add_settings_field(
			'showids_29', // id
			'Show IDs', // title
			array( $this, 'showids_29_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
			add_settings_field(
			'dummy_21', // id
			'Dummy', // title
			array( $this, 'dummy_21_callback' ), // callback
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
		if ( isset( $input['wp_generator_1'] ) ) {
			$sanitary_values['wp_generator_1'] = $input['wp_generator_1'];
		}
		if ( isset( $input['feed_2'] ) ) {
			$sanitary_values['feed_2'] = $input['feed_2'];
		}
		if ( isset( $input['wlwmanifest_3'] ) ) {
			$sanitary_values['wlwmanifest_3'] = $input['wlwmanifest_3'];
		}
		if ( isset( $input['shortlinks_4'] ) ) {
			$sanitary_values['shortlinks_4'] = $input['shortlinks_4'];
		}
		if ( isset( $input['random_and_parent_post_link_5'] ) ) {
			$sanitary_values['random_and_parent_post_link_5'] = $input['random_and_parent_post_link_5'];
		}
		if ( isset( $input['next_and_previous_post_links_6'] ) ) {
			$sanitary_values['next_and_previous_post_links_6'] = $input['next_and_previous_post_links_6'];
		}
		if ( isset( $input['emoji_7'] ) ) {
			$sanitary_values['emoji_7'] = $input['emoji_7'];
		}
		if ( isset( $input['rest_api_8'] ) ) {
			$sanitary_values['rest_api_8'] = $input['rest_api_8'];
		}
		if ( isset( $input['rest_api_endpoint_9'] ) ) {
			$sanitary_values['rest_api_endpoint_9'] = $input['rest_api_endpoint_9'];
		}
		if ( isset( $input['oembed_auto_discovery_10'] ) ) {
			$sanitary_values['oembed_auto_discovery_10'] = $input['oembed_auto_discovery_10'];
		}
		if ( isset( $input['oembed_results_11'] ) ) {
			$sanitary_values['oembed_results_11'] = $input['oembed_results_11'];
		}
		if ( isset( $input['oembed_discovery_links_12'] ) ) {
			$sanitary_values['oembed_discovery_links_12'] = $input['oembed_discovery_links_12'];
		}
		if ( isset( $input['oembed_specific_javascript_13'] ) ) {
			$sanitary_values['oembed_specific_javascript_13'] = $input['oembed_specific_javascript_13'];
		}
		if ( isset( $input['embeds_rewrite_14'] ) ) {
			$sanitary_values['embeds_rewrite_14'] = $input['embeds_rewrite_14'];
		}
		if ( isset( $input['jsonfilter_v_1_15'] ) ) {
			$sanitary_values['jsonfilter_v_1_15'] = $input['jsonfilter_v_1_15'];
		}
		if ( isset( $input['jsonfilter_v_2_16'] ) ) {
			$sanitary_values['jsonfilter_v_2_16'] = $input['jsonfilter_v_2_16'];
		}
		if ( isset( $input['shortcodes_to_widgets_17'] ) ) {
			$sanitary_values['shortcodes_to_widgets_17'] = $input['shortcodes_to_widgets_17'];
		}
		if ( isset( $input['disable_ip_in_coments_18'] ) ) {
			$sanitary_values['disable_ip_in_coments_18'] = $input['disable_ip_in_coments_18'];
		}
		if ( isset( $input['more_tag_scroll_19'] ) ) {
			$sanitary_values['more_tag_scroll_19'] = $input['more_tag_scroll_19'];
		}
		if ( isset( $input['date_20'] ) ) {
			$sanitary_values['date_20'] = $input['date_20'];
		}	
		if ( isset( $input['showids_29'] ) ) {
			$sanitary_values['showids_29'] = $input['showids_29'];
		}
		if ( isset( $input['dummy_21'] ) ) {
			$sanitary_values['dummy_21'] = $input['dummy_21'];
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

	public function wp_generator_1_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[wp_generator_1]" id="wp_generator_1" value="wp_generator_1" %s> <label for="wp_generator_1">remove wordpress version</label>',
			( isset( $this->wp_advanced_toolbox__options['wp_generator_1'] ) && $this->wp_advanced_toolbox__options['wp_generator_1'] === 'wp_generator_1' ) ? 'checked' : ''
		);
	}

	public function feed_2_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[feed_2]" id="feed_2" value="feed_2" %s> <label for="feed_2">remove rss feed links & feed extras</label>',
			( isset( $this->wp_advanced_toolbox__options['feed_2'] ) && $this->wp_advanced_toolbox__options['feed_2'] === 'feed_2' ) ? 'checked' : ''
		);
	}

	public function wlwmanifest_3_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[wlwmanifest_3]" id="wlwmanifest_3" value="wlwmanifest_3" %s> <label for="wlwmanifest_3">remove wlwmanifest.xml</label>',
			( isset( $this->wp_advanced_toolbox__options['wlwmanifest_3'] ) && $this->wp_advanced_toolbox__options['wlwmanifest_3'] === 'wlwmanifest_3' ) ? 'checked' : ''
		);
	}

	public function shortlinks_4_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[shortlinks_4]" id="shortlinks_4" value="shortlinks_4" %s> <label for="shortlinks_4">remove shortlink</label>',
			( isset( $this->wp_advanced_toolbox__options['shortlinks_4'] ) && $this->wp_advanced_toolbox__options['shortlinks_4'] === 'shortlinks_4' ) ? 'checked' : ''
		);
	}

	public function random_and_parent_post_link_5_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[random_and_parent_post_link_5]" id="random_and_parent_post_link_5" value="random_and_parent_post_link_5" %s> <label for="random_and_parent_post_link_5">remove random and parent post link</label>',
			( isset( $this->wp_advanced_toolbox__options['random_and_parent_post_link_5'] ) && $this->wp_advanced_toolbox__options['random_and_parent_post_link_5'] === 'random_and_parent_post_link_5' ) ? 'checked' : ''
		);
	}

	public function next_and_previous_post_links_6_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[next_and_previous_post_links_6]" id="next_and_previous_post_links_6" value="next_and_previous_post_links_6" %s> <label for="next_and_previous_post_links_6">remove the next and previous post links</label>',
			( isset( $this->wp_advanced_toolbox__options['next_and_previous_post_links_6'] ) && $this->wp_advanced_toolbox__options['next_and_previous_post_links_6'] === 'next_and_previous_post_links_6' ) ? 'checked' : ''
		);
	}

	public function emoji_7_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[emoji_7]" id="emoji_7" value="emoji_7" %s> <label for="emoji_7">disable emoji (Script & Styles)</label>',
			( isset( $this->wp_advanced_toolbox__options['emoji_7'] ) && $this->wp_advanced_toolbox__options['emoji_7'] === 'emoji_7' ) ? 'checked' : ''
		);
	}

	public function rest_api_8_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[rest_api_8]" id="rest_api_8" value="rest_api_8" %s> <label for="rest_api_8">remove the REST API lines from the HTML Header</label>',
			( isset( $this->wp_advanced_toolbox__options['rest_api_8'] ) && $this->wp_advanced_toolbox__options['rest_api_8'] === 'rest_api_8' ) ? 'checked' : ''
		);
	}

	public function rest_api_endpoint_9_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[rest_api_endpoint_9]" id="rest_api_endpoint_9" value="rest_api_endpoint_9" %s> <label for="rest_api_endpoint_9">remove the REST API endpoint</label>',
			( isset( $this->wp_advanced_toolbox__options['rest_api_endpoint_9'] ) && $this->wp_advanced_toolbox__options['rest_api_endpoint_9'] === 'rest_api_endpoint_9' ) ? 'checked' : ''
		);
	}

	public function oembed_auto_discovery_10_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[oembed_auto_discovery_10]" id="oembed_auto_discovery_10" value="oembed_auto_discovery_10" %s> <label for="oembed_auto_discovery_10">turn off oEmbed auto discovery</label>',
			( isset( $this->wp_advanced_toolbox__options['oembed_auto_discovery_10'] ) && $this->wp_advanced_toolbox__options['oembed_auto_discovery_10'] === 'oembed_auto_discovery_10' ) ? 'checked' : ''
		);
	}

	public function oembed_results_11_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[oembed_results_11]" id="oembed_results_11" value="oembed_results_11" %s> <label for="oembed_results_11">do not filter oEmbed results</label>',
			( isset( $this->wp_advanced_toolbox__options['oembed_results_11'] ) && $this->wp_advanced_toolbox__options['oembed_results_11'] === 'oembed_results_11' ) ? 'checked' : ''
		);
	}

	public function oembed_discovery_links_12_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[oembed_discovery_links_12]" id="oembed_discovery_links_12" value="oembed_discovery_links_12" %s> <label for="oembed_discovery_links_12">remove oEmbed discovery links</label>',
			( isset( $this->wp_advanced_toolbox__options['oembed_discovery_links_12'] ) && $this->wp_advanced_toolbox__options['oembed_discovery_links_12'] === 'oembed_discovery_links_12' ) ? 'checked' : ''
		);
	}

	public function oembed_specific_javascript_13_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[oembed_specific_javascript_13]" id="oembed_specific_javascript_13" value="oembed_specific_javascript_13" %s> <label for="oembed_specific_javascript_13">remove oEmbed-specific JavaScript from the front-end and back-end</label>',
			( isset( $this->wp_advanced_toolbox__options['oembed_specific_javascript_13'] ) && $this->wp_advanced_toolbox__options['oembed_specific_javascript_13'] === 'oembed_specific_javascript_13' ) ? 'checked' : ''
		);
	}

	public function embeds_rewrite_14_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[embeds_rewrite_14]" id="embeds_rewrite_14" value="embeds_rewrite_14" %s> <label for="embeds_rewrite_14">remove all embeds rewrite rules</label>',
			( isset( $this->wp_advanced_toolbox__options['embeds_rewrite_14'] ) && $this->wp_advanced_toolbox__options['embeds_rewrite_14'] === 'embeds_rewrite_14' ) ? 'checked' : ''
		);
	}

	public function jsonfilter_v_1_15_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[jsonfilter_v_1_15]" id="jsonfilter_v_1_15" value="jsonfilter_v_1_15" %s> <label for="jsonfilter_v_1_15">disable jsonFilters for WP-API version 1.x</label>',
			( isset( $this->wp_advanced_toolbox__options['jsonfilter_v_1_15'] ) && $this->wp_advanced_toolbox__options['jsonfilter_v_1_15'] === 'jsonfilter_v_1_15' ) ? 'checked' : ''
		);
	}

	public function jsonfilter_v_2_16_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[jsonfilter_v_2_16]" id="jsonfilter_v_2_16" value="jsonfilter_v_2_16" %s> <label for="jsonfilter_v_2_16">disable jsonFilters for WP-API version 2.x</label>',
			( isset( $this->wp_advanced_toolbox__options['jsonfilter_v_2_16'] ) && $this->wp_advanced_toolbox__options['jsonfilter_v_2_16'] === 'jsonfilter_v_2_16' ) ? 'checked' : ''
		);
	}

	public function shortcodes_to_widgets_17_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[shortcodes_to_widgets_17]" id="shortcodes_to_widgets_17" value="shortcodes_to_widgets_17" %s> <label for="shortcodes_to_widgets_17">adds shortcodes to widgets</label>',
			( isset( $this->wp_advanced_toolbox__options['shortcodes_to_widgets_17'] ) && $this->wp_advanced_toolbox__options['shortcodes_to_widgets_17'] === 'shortcodes_to_widgets_17' ) ? 'checked' : ''
		);
	}

	public function disable_ip_in_coments_18_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[disable_ip_in_coments_18]" id="disable_ip_in_coments_18" value="disable_ip_in_coments_18" %s> <label for="disable_ip_in_coments_18">do it!</label>',
			( isset( $this->wp_advanced_toolbox__options['disable_ip_in_coments_18'] ) && $this->wp_advanced_toolbox__options['disable_ip_in_coments_18'] === 'disable_ip_in_coments_18' ) ? 'checked' : ''
		);
	}

	public function more_tag_scroll_19_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[more_tag_scroll_19]" id="more_tag_scroll_19" value="more_tag_scroll_19" %s> <label for="more_tag_scroll_19">disable #more in url</label>',
			( isset( $this->wp_advanced_toolbox__options['more_tag_scroll_19'] ) && $this->wp_advanced_toolbox__options['more_tag_scroll_19'] === 'more_tag_scroll_19' ) ? 'checked' : ''
		);
	}

	public function date_20_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[date_20]" id="date_20" value="date_20" %s> <label for="date_20">disable date without css</label>',
			( isset( $this->wp_advanced_toolbox__options['date_20'] ) && $this->wp_advanced_toolbox__options['date_20'] === 'date_20' ) ? 'checked' : ''
		);
	}
	
	public function showids_29_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[showids_29]" id="showids_29" value="showids_29" %s> <label for="showids_29">Show IDs of page and post</label>',
			( isset( $this->wp_advanced_toolbox__options['showids_29'] ) && $this->wp_advanced_toolbox__options['showids_29'] === 'showids_29' ) ? 'checked' : ''
		);
	}
		

}
if ( is_admin() )
	$wp_advanced_toolbox_ = new WPAdvancedToolbox();

/* 
 * Retrieve this value with:
 * $wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' ); // Array of All Options
 * $rsd_link_0 = $wp_advanced_toolbox__options['rsd_link_0']; // RSD link
 * $wp_generator_1 = $wp_advanced_toolbox__options['wp_generator_1']; // WP Generator
 * $feed_2 = $wp_advanced_toolbox__options['feed_2']; // Feed
 * $wlwmanifest_3 = $wp_advanced_toolbox__options['wlwmanifest_3']; // Wlwmanifest
 * $shortlinks_4 = $wp_advanced_toolbox__options['shortlinks_4']; // Shortlinks
 * $random_and_parent_post_link_5 = $wp_advanced_toolbox__options['random_and_parent_post_link_5']; // random and parent post link
 * $next_and_previous_post_links_6 = $wp_advanced_toolbox__options['next_and_previous_post_links_6']; // next and previous post links
 * $emoji_7 = $wp_advanced_toolbox__options['emoji_7']; // Emoji
 * $rest_api_8 = $wp_advanced_toolbox__options['rest_api_8']; // REST API
 * $rest_api_endpoint_9 = $wp_advanced_toolbox__options['rest_api_endpoint_9']; // REST API endpoint
 * $oembed_auto_discovery_10 = $wp_advanced_toolbox__options['oembed_auto_discovery_10']; // oEmbed auto discovery
 * $oembed_results_11 = $wp_advanced_toolbox__options['oembed_results_11']; // oEmbed results
 * $oembed_discovery_links_12 = $wp_advanced_toolbox__options['oembed_discovery_links_12']; // oEmbed discovery links
 * $oembed_specific_javascript_13 = $wp_advanced_toolbox__options['oembed_specific_javascript_13']; // oEmbed-specific JavaScript
 * $embeds_rewrite_14 = $wp_advanced_toolbox__options['embeds_rewrite_14']; // Embeds rewrite
 * $jsonfilter_v_1_15 = $wp_advanced_toolbox__options['jsonfilter_v_1_15']; // jsonFilter v. 1
 * $jsonfilter_v_2_16 = $wp_advanced_toolbox__options['jsonfilter_v_2_16']; // jsonFilter v. 2
 * $shortcodes_to_widgets_17 = $wp_advanced_toolbox__options['shortcodes_to_widgets_17']; // Shortcodes to widgets
 * $disable_ip_in_coments_18 = $wp_advanced_toolbox__options['disable_ip_in_coments_18']; // Disable IP in coments
 * $more_tag_scroll_19 = $wp_advanced_toolbox__options['more_tag_scroll_19']; // more tag & scroll
 * $date_20 = $wp_advanced_toolbox__options['date_20']; // Date
 * $showids_29 = $wp_advanced_toolbox__options['showids_29']; // shows id in page and post

 */



// _data


$wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' );
if( wp_advanced_toolbox__options )
{
if( isset( $wp_advanced_toolbox__options['rsd_link_0']) )
	{
		// remove really simple discovery
		$this->remove_action('wp_head', 'rsd_link'); 
	}
if( isset( $wp_advanced_toolbox__options['wp_generator_1']) )
	{
		 // remove wordpress version
		 $this->remove_action('wp_head', 'wp_generator');
	}
if( isset( $wp_advanced_toolbox__options['feed_2']) )
	{
		$this->remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
		$this->remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

	}
if( isset( $wp_advanced_toolbox__options['wlwmanifest_3']) )
	{
		 // remove wlwmanifest.xml
		 $this->remove_action('wp_head', 'wlwmanifest_link');
	}
if( isset( $wp_advanced_toolbox__options['shortlinks_4']) )
	{
		 // remove shortlink
		 $this->remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	}
if( isset( $wp_advanced_toolbox__options['random_and_parent_post_link_5']) )
	{
$this->remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
$this->remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
	}
if( isset( $wp_advanced_toolbox__options['next_and_previous_post_links_6']) )
	{
$this->remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
$this->remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	}
if( isset( $wp_advanced_toolbox__options['emoji_7']) )
	{
	// emojis
	$this->remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	$this->remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	$this->remove_action( 'wp_print_styles', 'print_emoji_styles' );
	$this->remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	$this->remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	$this->remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	$this->remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	// emojis from TinyMCE
	//add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
if( isset( $wp_advanced_toolbox__options['rest_api_8']) )
	{
		  // Remove the REST API lines from the HTML Header
			$this->remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	}
if( isset( $wp_advanced_toolbox__options['rest_api_endpoint_9']) )
	{
		 // Remove the REST API endpoint
			$this->remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	}
if( isset( $wp_advanced_toolbox__options['oembed_auto_discovery_10']) )
	{
		  // Turn off oEmbed auto discovery
			$this->add_filter( 'embed_oembed_discover', '__return_false' );
	}
if( isset( $wp_advanced_toolbox__options['oembed_results_11']) )
	{
		 // Don't filter oEmbed results
		$this->remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	}
if( isset( $wp_advanced_toolbox__options['oembed_discovery_links_12']) )
	{
		 // Remove oEmbed discovery links
		$this->remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	}
if( isset( $wp_advanced_toolbox__options['oembed_specific_javascript_13']) )
	{
		 // Remove oEmbed-specific JavaScript from the front-end and back-end
			$this->remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	}
if( isset( $wp_advanced_toolbox__options['embeds_rewrite_14']) )
	{
		  // Remove all embeds rewrite rules
			$this->add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	}
if( isset( $wp_advanced_toolbox__options['jsonfilter_v_1_15']) )
	{
		   // Filters for WP-API version 1.x
			$this->add_filter('json_enabled', '__return_false');
			$this->add_filter('json_jsonp_enabled', '__return_false');
	}
if( isset( $wp_advanced_toolbox__options['jsonfilter_v_2_16']) )
	{
		   // Filters for WP-API version 2.x
			$this->add_filter('rest_enabled', '__return_false');
			$this->add_filter('rest_jsonp_enabled', '__return_false');
	}
if( isset( $wp_advanced_toolbox__options['shortcodes_to_widgets_17']) )
	{
		 // adds shortcodes to widget
		 $this->add_filter( 'widget_text', 'do_shortcode' );
	}
if( isset( $wp_advanced_toolbox__options['disable_ip_in_coments_18']) )
	{
		 // disable user comments ip
		function wpwm_remove_commentsip( $comment_author_ip ) {
		return '';
		}
		$this->add_filter( 'pre_comment_user_ip', 'wpwm_remove_commentsip' );
	}
if( isset( $wp_advanced_toolbox__options['more_tag_scroll_19']) )
	{
		// remove content more link and autoscroll
		function wpwm_remove_more_and_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
		}
		$this->add_filter( 'the_content_more_link', 'wpwm_remove_more_and_scroll' );
	}
if( isset( $wp_advanced_toolbox__options['date_20']) )
	{
		// remove date - hardcode
		function wpwm_remove_post_dates() {
		$this->add_filter('the_date', '__return_false');
		$this->add_filter('the_time', '__return_false');
		$this->add_filter('the_modified_date', '__return_false');
		$this->add_filter('get_the_date', '__return_false');
		$this->add_filter('get_the_time', '__return_false');
		$this->add_filter('get_the_modified_date', '__return_false');
		} 
		$this->add_action('loop_start', 'wpwm_remove_post_dates');
	}
if( isset( $wp_advanced_toolbox__options['showids_29']) )
	{
		function wpwm_add_column( $columns ){
		$columns['wpwm_post_id_clmn'] = 'ID'; 
		// $columns['Column ID'] = 'Column Title';
		return $columns;
	}
		$this->add_filter('manage_posts_columns', 'wpwm_add_column', 5); // for posts
		$this->add_filter('manage_pages_columns', 'wpwm_add_column', 5); // for pages
		function wpwm_column_content( $column, $id ){
		if( $column === 'wpwm_post_id_clmn')
		echo $id;
		}
		$this->add_action('manage_posts_custom_column', 'wpwm_column_content', 5, 2); // for posts
		$this->add_action('manage_pages_custom_column', 'wpwm_column_content', 5, 2); // for pages
	}

*/
