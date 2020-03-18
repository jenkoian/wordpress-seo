<?php
/**
 * WPSEO plugin file.
 *
 * @package WPSEO\Admin\Views
 *
 * @uses Yoast_Form $yform Form object.
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

$feature_toggles = Yoast_Feature_Toggles::instance()->get_all();

?>
<h2><?php esc_html_e( 'Features', 'wordpress-seo' ); ?></h2>
<div class="yoast-measure">
	<?php
	echo sprintf(
		/* translators: %1$s expands to Yoast SEO */
		esc_html__( '%1$s comes with a lot of features. You can enable / disable some of them below. Clicking the question mark gives more information about the feature.', 'wordpress-seo' ),
		'Yoast SEO'
	);

	foreach ( $feature_toggles as $feature ) {
		$yform->toggle_switch(
			$feature->setting,
			[
				'on'  => __( 'On', 'wordpress-seo' ),
				'off' => __( 'Off', 'wordpress-seo' ),
			],
			// @todo verify that all feature_toggles above have a proper read_more_url!
			'<strong>' . $feature->name . '</strong> ' . new WPSEO_Admin_Help_Button( $feature->read_more_url, $feature->read_more_label )
		);
	}
	?>
</div>
<?php

/*
 * Required to prevent our settings framework from saving the default because the field isn't
 * explicitly set when saving the Dashboard page.
 */
$yform->hidden( 'show_onboarding_notice', 'wpseo_show_onboarding_notice' );
