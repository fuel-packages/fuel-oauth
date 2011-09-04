<?php
/**
 * OAuth Twitter Provider
 *
 * Documents for implementing Twitter OAuth can be found at
 * <http://dev.twitter.com/pages/auth>.
 *
 * [!!] This class does not implement the Twitter API. It is only an
 * implementation of standard OAuth with Twitter as the service provider.
 *
 * @package    Kohana/OAuth
 * @category   Provider
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

class OAuth_Provider_Twitter extends OAuth_Provider {

	public $name = 'twitter';

	protected $signature = 'HMAC-SHA1';

	public function url_request_token()
	{
		return 'https://api.twitter.com/oauth/request_token';
	}

	public function url_authorize()
	{
		return 'https://api.twitter.com/oauth/authenticate';
	}

	public function url_access_token()
	{
		return 'https://api.twitter.com/oauth/access_token';
	}
	
	public function get_user_data(OAuth_Consumer $consumer, OAuth_Token $token)
	{	
		// http://api.twitter.com/1/users/lookup.format
/*
		$request = new OAuth_Request('GET', 'http://api.twitter.com/1/statuses/public_timeline.json', array(
			'token' => $token->token,
			'secret' => $token->secret,
				'consumer_key' => $twitter['key'],
				'consumer_secret' => $twitter['secret'],
		));*/
		
		// Create a new GET request with the required parameters
		$request = OAuth_Request::factory('resource', 'GET', 'http://api.twitter.com/1/statuses/home_timeline', array(
			'oauth_consumer_key' => $consumer->key,
			'oauth_token' => $token->token,
		));

		// Sign the request using the consumer and token
		$request->sign($this->signature, $consumer, $token);

		// Create a response from the request
		return $response = $request->execute();
	}

} // End OAuth_Provider_Twitter