<?php
/**
 * WPSEO plugin test file.
 *
 * @package Yoast\Tests\Doubles\Oauth
 */

namespace Yoast\WP\SEO\Tests\Doubles\Oauth;

/**
 * Test Helper Class.
 */
class Client extends \Yoast\WP\SEO\Oauth\Client {

	/**
	 * Exposes the parent method which is protected.
	 *
	 * @param array $access_tokens Access tokens to format.
	 *
	 * @return \YoastSEO_Vendor\League\OAuth2\Client\Token\AccessTokenInterface[] Formatted AccessTokens.
	 */
	public function format_access_tokens( $access_tokens ) {
		return parent::format_access_tokens( $access_tokens );
	}
}
