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


	    }

		// start output hooks as example here : remove rsd link

if (is_admin()) {
$wp_advanced_toolbox = new WPAdvancedToolboxPDO();
$wp_advanced_toolbox_options = get_option('wp_advanced_toolbox__option_name');
if ($wp_advanced_toolbox_options && isset($wp_advanced_toolbox_options['rsd_link_0'])) {
$this->remove_action('wp_head', 'rsd_link');
}
	
	// etc
	

