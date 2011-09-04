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
	
	public function get_user_info(OAuth_Consumer $consumer, OAuth_Token $token)
	{
		// Create a new GET request with the required parameters
		$request = OAuth_Request::factory('resource', 'GET', 'http://api.twitter.com/1/users/lookup.json', array(
			'oauth_consumer_key' => $consumer->key,
			'oauth_token' => $token->token,
			'user_id' => $token->uid,
		));

		// Sign the request using the consumer and token
		$request->sign($this->signature, $consumer, $token);

		$user = current(json_decode($request->execute()));
		
		// Create a response from the request
		return array(
			'nickname' => $user->screen_name,
			'name' => $user->name ?: $user->screen_name,
			'location' => $user->location,
			'image' => $user->profile_image_url,
			'description' => $user->description,
			'urls' => array(
			  'Website' => $user->url,
			  'Twitter' => 'http://twitter.com/'.$user->screen_name,
			),
			'credentials' => array(
				'uid' => $token->uid,
				'provider' => $this->name,
				'token' => $token->token,
				'secret' => $token->secret,
			),
		);
	}
	
	/**
	 * Exchange the request token for an access token.
	 *
	 *     $token = $provider->access_token($consumer, $token);
	 *
	 * @param   OAuth_Consumer       consumer
	 * @param   OAuth_Token_Request  token
	 * @param   array                additional request parameters
	 * @return  OAuth_Token_Access
	 */
	public function access_token(OAuth_Consumer $consumer, OAuth_Token_Request $token, array $params = NULL)
	{
		// Create a new GET request for a request token with the required parameters
		$request = OAuth_Request::factory('access', 'GET', $this->url_access_token(), array(
			'oauth_consumer_key' => $consumer->key,
			'oauth_token'        => $token->token,
			'oauth_verifier'     => $token->verifier,
		));

		if ($params)
		{
			// Load user parameters
			$request->params($params);
		}

		// Sign the request using only the consumer, no token is available yet
		$request->sign($this->signature, $consumer, $token);

		// Create a response from the request
		$response = $request->execute();
		
		// Store this token somewhere useful
		return OAuth_Token::factory('access', array(
			'token'  => $response->param('oauth_token'),
			'secret' => $response->param('oauth_token_secret'),
			'uid' => $response->param('user_id'),
		));
	}

} // End OAuth_Provider_Twitter