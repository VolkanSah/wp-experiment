<?php
class WPAdvancedToolbox {
	private $wp_advanced_toolbox__options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_advanced_toolbox__add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_advanced_toolbox__page_init' ) );
	}

	public function wp_advanced_toolbox__add_plugin_page() {
		add_menu_page(
			'WP Advanced Toolbox ', // page_title
			'WP Advanced Toolbox ', // menu_title
			'manage_options', // capability
			'wp-advanced-toolbox', // menu_slug
			array( $this, 'wp_advanced_toolbox__create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			2 // position
		);
	}

	public function wp_advanced_toolbox__create_admin_page() {
		$this->wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' ); ?>

		<div class="wrap">
			<h2>WP Advanced Toolbox </h2>
			<p>This free extension by by WordPress-Webmaster.de should help you to avoid chaos in your Wordpress installation. You will notice, your WordPress site will be much faster.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'wp_advanced_toolbox__option_group' );
					do_settings_sections( 'wp-advanced-toolbox-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

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
			'set_rsd_0', // id
			'set_rsd', // title
			array( $this, 'set_rsd_0_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_version_1', // id
			'set_version', // title
			array( $this, 'set_version_1_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_feed_2', // id
			'set_feed', // title
			array( $this, 'set_feed_2_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_feedx_3', // id
			'set_feedx', // title
			array( $this, 'set_feedx_3_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_wlwm_4', // id
			'set_wlwm', // title
			array( $this, 'set_wlwm_4_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_shortl_5', // id
			'set_shortl', // title
			array( $this, 'set_shortl_5_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_postl_6', // id
			'set_postl', // title
			array( $this, 'set_postl_6_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_nplink_7', // id
			'set_nplink', // title
			array( $this, 'set_nplink_7_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_emoji_8', // id
			'set_emoji', // title
			array( $this, 'set_emoji_8_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_rrestapi_9', // id
			'set_rrestapi', // title
			array( $this, 'set_rrestapi_9_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_rrestapiend_10', // id
			'set_rrestapiend', // title
			array( $this, 'set_rrestapiend_10_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_rrestapiend_11', // id
			'set_rrestapiend', // title
			array( $this, 'set_rrestapiend_11_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_ooembed_12', // id
			'set_ooembed', // title
			array( $this, 'set_ooembed_12_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_foembed_13', // id
			'set_foembed', // title
			array( $this, 'set_foembed_13_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_roembed_14', // id
			'set_roembed', // title
			array( $this, 'set_roembed_14_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_soembed_15', // id
			'set_soembed', // title
			array( $this, 'set_soembed_15_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_xembeds_16', // id
			'set_xembeds', // title
			array( $this, 'set_xembeds_16_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_json1x_17', // id
			'set_json1x', // title
			array( $this, 'set_json1x_17_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_json2x_18', // id
			'set_json2x', // title
			array( $this, 'set_json2x_18_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);

		add_settings_field(
			'set_shortw_19', // id
			'set_shortw', // title
			array( $this, 'set_shortw_19_callback' ), // callback
			'wp-advanced-toolbox-admin', // page
			'wp_advanced_toolbox__setting_section' // section
		);
	}

	public function wp_advanced_toolbox__sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['set_rsd_0'] ) ) {
			$sanitary_values['set_rsd_0'] = $input['set_rsd_0'];
		}

		if ( isset( $input['set_version_1'] ) ) {
			$sanitary_values['set_version_1'] = $input['set_version_1'];
		}

		if ( isset( $input['set_feed_2'] ) ) {
			$sanitary_values['set_feed_2'] = $input['set_feed_2'];
		}

		if ( isset( $input['set_feedx_3'] ) ) {
			$sanitary_values['set_feedx_3'] = $input['set_feedx_3'];
		}

		if ( isset( $input['set_wlwm_4'] ) ) {
			$sanitary_values['set_wlwm_4'] = $input['set_wlwm_4'];
		}

		if ( isset( $input['set_shortl_5'] ) ) {
			$sanitary_values['set_shortl_5'] = $input['set_shortl_5'];
		}

		if ( isset( $input['set_postl_6'] ) ) {
			$sanitary_values['set_postl_6'] = $input['set_postl_6'];
		}

		if ( isset( $input['set_nplink_7'] ) ) {
			$sanitary_values['set_nplink_7'] = $input['set_nplink_7'];
		}

		if ( isset( $input['set_emoji_8'] ) ) {
			$sanitary_values['set_emoji_8'] = $input['set_emoji_8'];
		}

		if ( isset( $input['set_rrestapi_9'] ) ) {
			$sanitary_values['set_rrestapi_9'] = $input['set_rrestapi_9'];
		}

		if ( isset( $input['set_rrestapiend_10'] ) ) {
			$sanitary_values['set_rrestapiend_10'] = $input['set_rrestapiend_10'];
		}

		if ( isset( $input['set_rrestapiend_11'] ) ) {
			$sanitary_values['set_rrestapiend_11'] = $input['set_rrestapiend_11'];
		}

		if ( isset( $input['set_ooembed_12'] ) ) {
			$sanitary_values['set_ooembed_12'] = $input['set_ooembed_12'];
		}

		if ( isset( $input['set_foembed_13'] ) ) {
			$sanitary_values['set_foembed_13'] = $input['set_foembed_13'];
		}

		if ( isset( $input['set_roembed_14'] ) ) {
			$sanitary_values['set_roembed_14'] = $input['set_roembed_14'];
		}

		if ( isset( $input['set_soembed_15'] ) ) {
			$sanitary_values['set_soembed_15'] = $input['set_soembed_15'];
		}

		if ( isset( $input['set_xembeds_16'] ) ) {
			$sanitary_values['set_xembeds_16'] = $input['set_xembeds_16'];
		}

		if ( isset( $input['set_json1x_17'] ) ) {
			$sanitary_values['set_json1x_17'] = $input['set_json1x_17'];
		}

		if ( isset( $input['set_json2x_18'] ) ) {
			$sanitary_values['set_json2x_18'] = $input['set_json2x_18'];
		}

		if ( isset( $input['set_shortw_19'] ) ) {
			$sanitary_values['set_shortw_19'] = $input['set_shortw_19'];
		}

		return $sanitary_values;
	}

	public function wp_advanced_toolbox__section_info() {
		
	}

	public function set_rsd_0_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_rsd_0]" id="set_rsd_0" value="set_rsd_0" %s> <label for="set_rsd_0">Remove really simple discovery link</label>',
			( isset( $this->wp_advanced_toolbox__options['set_rsd_0'] ) && $this->wp_advanced_toolbox__options['set_rsd_0'] === 'set_rsd_0' ) ? 'checked' : ''
		);
	}

	public function set_version_1_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_version_1]" id="set_version_1" value="set_version_1" %s> <label for="set_version_1">Remove wordpress version</label>',
			( isset( $this->wp_advanced_toolbox__options['set_version_1'] ) && $this->wp_advanced_toolbox__options['set_version_1'] === 'set_version_1' ) ? 'checked' : ''
		);
	}

	public function set_feed_2_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_feed_2]" id="set_feed_2" value="set_feed_2" %s> <label for="set_feed_2">Remove rss feed links</label>',
			( isset( $this->wp_advanced_toolbox__options['set_feed_2'] ) && $this->wp_advanced_toolbox__options['set_feed_2'] === 'set_feed_2' ) ? 'checked' : ''
		);
	}

	public function set_feedx_3_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_feedx_3]" id="set_feedx_3" value="set_feedx_3" %s> <label for="set_feedx_3">Removes all extra rss feed links</label>',
			( isset( $this->wp_advanced_toolbox__options['set_feedx_3'] ) && $this->wp_advanced_toolbox__options['set_feedx_3'] === 'set_feedx_3' ) ? 'checked' : ''
		);
	}

	public function set_wlwm_4_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_wlwm_4]" id="set_wlwm_4" value="set_wlwm_4" %s> <label for="set_wlwm_4">Remove wlwmanifest.xml</label>',
			( isset( $this->wp_advanced_toolbox__options['set_wlwm_4'] ) && $this->wp_advanced_toolbox__options['set_wlwm_4'] === 'set_wlwm_4' ) ? 'checked' : ''
		);
	}

	public function set_shortl_5_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_shortl_5]" id="set_shortl_5" value="set_shortl_5" %s> <label for="set_shortl_5">Remove shortlink</label>',
			( isset( $this->wp_advanced_toolbox__options['set_shortl_5'] ) && $this->wp_advanced_toolbox__options['set_shortl_5'] === 'set_shortl_5' ) ? 'checked' : ''
		);
	}

	public function set_postl_6_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_postl_6]" id="set_postl_6" value="set_postl_6" %s> <label for="set_postl_6">remove random and parent post link</label>',
			( isset( $this->wp_advanced_toolbox__options['set_postl_6'] ) && $this->wp_advanced_toolbox__options['set_postl_6'] === 'set_postl_6' ) ? 'checked' : ''
		);
	}

	public function set_nplink_7_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_nplink_7]" id="set_nplink_7" value="set_nplink_7" %s> <label for="set_nplink_7">Remove the next and previous post links</label>',
			( isset( $this->wp_advanced_toolbox__options['set_nplink_7'] ) && $this->wp_advanced_toolbox__options['set_nplink_7'] === 'set_nplink_7' ) ? 'checked' : ''
		);
	}

	public function set_emoji_8_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_emoji_8]" id="set_emoji_8" value="set_emoji_8" %s> <label for="set_emoji_8">Disable emoji (Script & Styles)</label>',
			( isset( $this->wp_advanced_toolbox__options['set_emoji_8'] ) && $this->wp_advanced_toolbox__options['set_emoji_8'] === 'set_emoji_8' ) ? 'checked' : ''
		);
	}

	public function set_rrestapi_9_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_rrestapi_9]" id="set_rrestapi_9" value="set_rrestapi_9" %s> <label for="set_rrestapi_9">Remove the REST API lines from the HTML Header</label>',
			( isset( $this->wp_advanced_toolbox__options['set_rrestapi_9'] ) && $this->wp_advanced_toolbox__options['set_rrestapi_9'] === 'set_rrestapi_9' ) ? 'checked' : ''
		);
	}

	public function set_rrestapiend_10_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_rrestapiend_10]" id="set_rrestapiend_10" value="set_rrestapiend_10" %s> <label for="set_rrestapiend_10">Remove the REST API endpoint</label>',
			( isset( $this->wp_advanced_toolbox__options['set_rrestapiend_10'] ) && $this->wp_advanced_toolbox__options['set_rrestapiend_10'] === 'set_rrestapiend_10' ) ? 'checked' : ''
		);
	}

	public function set_rrestapiend_11_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_rrestapiend_11]" id="set_rrestapiend_11" value="set_rrestapiend_11" %s> <label for="set_rrestapiend_11">Remove the REST API endpoint</label>',
			( isset( $this->wp_advanced_toolbox__options['set_rrestapiend_11'] ) && $this->wp_advanced_toolbox__options['set_rrestapiend_11'] === 'set_rrestapiend_11' ) ? 'checked' : ''
		);
	}

	public function set_ooembed_12_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_ooembed_12]" id="set_ooembed_12" value="set_ooembed_12" %s> <label for="set_ooembed_12">Turn off oEmbed auto discovery.</label>',
			( isset( $this->wp_advanced_toolbox__options['set_ooembed_12'] ) && $this->wp_advanced_toolbox__options['set_ooembed_12'] === 'set_ooembed_12' ) ? 'checked' : ''
		);
	}

	public function set_foembed_13_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_foembed_13]" id="set_foembed_13" value="set_foembed_13" %s> <label for="set_foembed_13">Don\'t filter oEmbed results</label>',
			( isset( $this->wp_advanced_toolbox__options['set_foembed_13'] ) && $this->wp_advanced_toolbox__options['set_foembed_13'] === 'set_foembed_13' ) ? 'checked' : ''
		);
	}

	public function set_roembed_14_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_roembed_14]" id="set_roembed_14" value="set_roembed_14" %s> <label for="set_roembed_14">Remove oEmbed discovery links</label>',
			( isset( $this->wp_advanced_toolbox__options['set_roembed_14'] ) && $this->wp_advanced_toolbox__options['set_roembed_14'] === 'set_roembed_14' ) ? 'checked' : ''
		);
	}

	public function set_soembed_15_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_soembed_15]" id="set_soembed_15" value="set_soembed_15" %s> <label for="set_soembed_15">Remove oEmbed-specific JavaScript from the front-end and back-end</label>',
			( isset( $this->wp_advanced_toolbox__options['set_soembed_15'] ) && $this->wp_advanced_toolbox__options['set_soembed_15'] === 'set_soembed_15' ) ? 'checked' : ''
		);
	}

	public function set_xembeds_16_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_xembeds_16]" id="set_xembeds_16" value="set_xembeds_16" %s> <label for="set_xembeds_16">Remove all embeds rewrite rules</label>',
			( isset( $this->wp_advanced_toolbox__options['set_xembeds_16'] ) && $this->wp_advanced_toolbox__options['set_xembeds_16'] === 'set_xembeds_16' ) ? 'checked' : ''
		);
	}

	public function set_json1x_17_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_json1x_17]" id="set_json1x_17" value="set_json1x_17" %s> <label for="set_json1x_17">Disable jsonFilters for WP-API version 1.x</label>',
			( isset( $this->wp_advanced_toolbox__options['set_json1x_17'] ) && $this->wp_advanced_toolbox__options['set_json1x_17'] === 'set_json1x_17' ) ? 'checked' : ''
		);
	}

	public function set_json2x_18_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_json2x_18]" id="set_json2x_18" value="set_json2x_18" %s> <label for="set_json2x_18">Disable jsonFilters for WP-API version 2.x</label>',
			( isset( $this->wp_advanced_toolbox__options['set_json2x_18'] ) && $this->wp_advanced_toolbox__options['set_json2x_18'] === 'set_json2x_18' ) ? 'checked' : ''
		);
	}

	public function set_shortw_19_callback() {
		printf(
			'<input type="checkbox" name="wp_advanced_toolbox__option_name[set_shortw_19]" id="set_shortw_19" value="set_shortw_19" %s> <label for="set_shortw_19">Adds shortlink use to widgets</label>',
			( isset( $this->wp_advanced_toolbox__options['set_shortw_19'] ) && $this->wp_advanced_toolbox__options['set_shortw_19'] === 'set_shortw_19' ) ? 'checked' : ''
		);
	}

}
if ( is_admin() )
	$wp_advanced_toolbox_ = new WPAdvancedToolbox();

/* 
 * Retrieve this value with:
 * $wp_advanced_toolbox__options = get_option( 'wp_advanced_toolbox__option_name' ); // Array of All Options
 * $set_rsd_0 = $wp_advanced_toolbox__options['set_rsd_0']; // set_rsd
 * $set_version_1 = $wp_advanced_toolbox__options['set_version_1']; // set_version
 * $set_feed_2 = $wp_advanced_toolbox__options['set_feed_2']; // set_feed
 * $set_feedx_3 = $wp_advanced_toolbox__options['set_feedx_3']; // set_feedx
 * $set_wlwm_4 = $wp_advanced_toolbox__options['set_wlwm_4']; // set_wlwm
 * $set_shortl_5 = $wp_advanced_toolbox__options['set_shortl_5']; // set_shortl
 * $set_postl_6 = $wp_advanced_toolbox__options['set_postl_6']; // set_postl
 * $set_nplink_7 = $wp_advanced_toolbox__options['set_nplink_7']; // set_nplink
 * $set_emoji_8 = $wp_advanced_toolbox__options['set_emoji_8']; // set_emoji
 * $set_rrestapi_9 = $wp_advanced_toolbox__options['set_rrestapi_9']; // set_rrestapi
 * $set_rrestapiend_10 = $wp_advanced_toolbox__options['set_rrestapiend_10']; // set_rrestapiend
 * $set_rrestapiend_11 = $wp_advanced_toolbox__options['set_rrestapiend_11']; // set_rrestapiend
 * $set_ooembed_12 = $wp_advanced_toolbox__options['set_ooembed_12']; // set_ooembed
 * $set_foembed_13 = $wp_advanced_toolbox__options['set_foembed_13']; // set_foembed
 * $set_roembed_14 = $wp_advanced_toolbox__options['set_roembed_14']; // set_roembed
 * $set_soembed_15 = $wp_advanced_toolbox__options['set_soembed_15']; // set_soembed
 * $set_xembeds_16 = $wp_advanced_toolbox__options['set_xembeds_16']; // set_xembeds
 * $set_json1x_17 = $wp_advanced_toolbox__options['set_json1x_17']; // set_json1x
 * $set_json2x_18 = $wp_advanced_toolbox__options['set_json2x_18']; // set_json2x
 * $set_shortw_19 = $wp_advanced_toolbox__options['set_shortw_19']; // set_shortw
 */
// Uncomment to debug
// var_dump($check);
// die();
$check = get_option( 'wordpress_tuning_option_name' );
if( $check )
{
    if( isset( $check['set_rsd_0']) )
    {
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    }
	if( isset( $check['set_version_1']) )
    {
remove_action('wp_head', 'wp_generator'); // remove wordpress version
    }
	if( isset( $check['set_feed_2']) )
    {
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    }
	if( isset( $check['set_feedx_3']) )
	{
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
	}
	if( isset( $check['set_wlwm_4']) )
	{
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
	}
	
	
	
}
