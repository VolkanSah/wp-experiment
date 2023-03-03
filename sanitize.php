<?php //register setings
	private function wp_advanced_toolbox__sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['set_rsd_0'] ) ) {
			$sanitary_values['set_rsd_0'] = $input['set_rsd_0'];
		}

		// etc ...
		
			return $sanitary_values;
	}



