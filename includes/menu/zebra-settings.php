<?php
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class ZebraSettings {
	private $zebra_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'zebra_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'zebra_settings_page_init' ) );
    }

	public function zebra_settings_add_plugin_page() {
		add_menu_page(
			'Zebra Settings', // page_title
			'Zebra', // menu_title
			'manage_options', // capability
			'zebra-settings', // menu_slug
			array( $this, 'zebra_settings_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			3 // position
		);
	}

	public function zebra_settings_create_admin_page() {
		$this->zebra_settings_options = get_option( 'zebra_settings_option_name' ); ?>

		<div class="wrap">
			<h2>Zebra Settings</h2>
			<p>Zebra API Settings</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'zebra_settings_option_group' );
					do_settings_sections( 'zebra-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function zebra_settings_page_init() {
		register_setting(
			'zebra_settings_option_group', // option_group
			'zebra_settings_option_name', // option_name
			array( $this, 'zebra_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'zebra_settings_setting_section', // id
			'Settings', // title
			array( $this, 'zebra_settings_section_info' ), // callback
			'zebra-settings-admin' // page
		);

		add_settings_field(
			'zebra_stripe_key_0', // id
			'zebra_stripe_key', // title
			array( $this, 'zebra_stripe_key_0_callback' ), // callback
			'zebra-settings-admin', // page
			'zebra_settings_setting_section' // section
		);

		add_settings_field(
			'use_test_mode_1', // id
			'use test mode?', // title
			array( $this, 'use_test_mode_1_callback' ), // callback
			'zebra-settings-admin', // page
			'zebra_settings_setting_section' // section
		);

		add_settings_field(
			'zebra_stripe_key_dev_2', // id
			'zebra_stripe_key_dev', // title
			array( $this, 'zebra_stripe_key_dev_2_callback' ), // callback
			'zebra-settings-admin', // page
			'zebra_settings_setting_section' // section
		);

		add_settings_field(
			'zebra_host_3', // id
			'zebra_host', // title
			array( $this, 'zebra_host_3_callback' ), // callback
			'zebra-settings-admin', // page
			'zebra_settings_setting_section' // section
		);
	}

	public function zebra_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['zebra_stripe_key_0'] ) ) {
			$sanitary_values['zebra_stripe_key_0'] = sanitize_text_field( $input['zebra_stripe_key_0'] );
		}

		if ( isset( $input['use_test_mode_1'] ) ) {
			$sanitary_values['use_test_mode_1'] = $input['use_test_mode_1'];
		}

		if ( isset( $input['zebra_stripe_key_dev_2'] ) ) {
			$sanitary_values['zebra_stripe_key_dev_2'] = sanitize_text_field( $input['zebra_stripe_key_dev_2'] );
		}

		if ( isset( $input['zebra_host_3'] ) ) {
			$sanitary_values['zebra_host_3'] = sanitize_text_field( $input['zebra_host_3'] );
		}

		return $sanitary_values;
	}

	public function zebra_settings_section_info() {
		
	}

	public function zebra_stripe_key_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="zebra_settings_option_name[zebra_stripe_key_0]" id="zebra_stripe_key_0" value="%s">',
			isset( $this->zebra_settings_options['zebra_stripe_key_0'] ) ? esc_attr( $this->zebra_settings_options['zebra_stripe_key_0']) : ''
		);
	}

	public function use_test_mode_1_callback() {
		printf(
			'<input type="checkbox" name="zebra_settings_option_name[use_test_mode_1]" id="use_test_mode_1" value="use_test_mode_1" %s> <label for="use_test_mode_1">Use stripe test mode?</label>',
			( isset( $this->zebra_settings_options['use_test_mode_1'] ) && $this->zebra_settings_options['use_test_mode_1'] === 'use_test_mode_1' ) ? 'checked' : ''
		);
	}

	public function zebra_stripe_key_dev_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="zebra_settings_option_name[zebra_stripe_key_dev_2]" id="zebra_stripe_key_dev_2" value="%s">',
			isset( $this->zebra_settings_options['zebra_stripe_key_dev_2'] ) ? esc_attr( $this->zebra_settings_options['zebra_stripe_key_dev_2']) : ''
		);
	}

	public function zebra_host_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="zebra_settings_option_name[zebra_host_3]" id="zebra_host_3" value="%s">',
			isset( $this->zebra_settings_options['zebra_host_3'] ) ? esc_attr( $this->zebra_settings_options['zebra_host_3']) : ''
		);
	}

}
if ( is_admin() )
	$zebra_settings = new ZebraSettings();

/* 
 * Retrieve this value with:
 * $zebra_settings_options = get_option( 'zebra_settings_option_name' ); // Array of All Options
 * $zebra_stripe_key_0 = $zebra_settings_options['zebra_stripe_key_0']; // zebra_stripe_key
 * $use_test_mode_1 = $zebra_settings_options['use_test_mode_1']; // use test mode?
 * $zebra_stripe_key_dev_2 = $zebra_settings_options['zebra_stripe_key_dev_2']; // zebra_stripe_key_dev
 * $zebra_host_3 = $zebra_settings_options['zebra_host_3']; // zebra_host
 */
