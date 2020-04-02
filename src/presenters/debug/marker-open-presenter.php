<?php
/**
 * Final presenter class for the debug open marker.
 *
 * @package Yoast\YoastSEO\Presenters\Debug
 */

namespace Yoast\WP\SEO\Presenters\Debug;

use Yoast\WP\SEO\Presenters\Abstract_Indexable_Presenter;

/**
 * Class Debug_Marker_Open_Presenter
 */
final class Marker_Open_Presenter extends Abstract_Indexable_Presenter {

	/**
	 * Returns the debug close marker.
	 *
	 * @param bool $output_tag Optional. Whether or not to output the HTML tag. Defaults to true.
	 *
	 * @return string The debug close marker.
	 */
	public function present( $output_tag = true ) {
		return \sprintf(
			'<!-- This site is optimized with the %1$s %2$s - https://yoast.com/wordpress/plugins/seo/ -->',
			\esc_html( $this->helpers->product->get_name() ),
			/**
			 * Filter: 'wpseo_hide_version' - can be used to hide the Yoast SEO version in the debug marker (only available in Yoast SEO Premium).
			 *
			 * @api bool
			 */
			( ( \apply_filters( 'wpseo_hide_version', false ) && \WPSEO_Utils::is_yoast_seo_premium() ) ? '' : 'v' . \WPSEO_VERSION )
		);
	}
}
