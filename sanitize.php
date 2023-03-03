<?php //register setings
class WPAdvancedToolboxPDO {
	protected $pdo;
	protected $this;
  protected $input;
	private $wp_advanced_toolbox__options;

	public function __construct() {
		try {
			$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}

		$this->return $sanitary_values;
	}


  private function wp_advanced_toolbox__sanitize($input) {
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

		
	  }
		$conn->close();

	}// end class

