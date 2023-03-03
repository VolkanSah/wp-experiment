<?php //register setings

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
			'add_settings_fieldn' // section
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
	

