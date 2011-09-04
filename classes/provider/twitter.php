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

class Provider_Twitter extends Provider {

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
	
	/*
	public function get_user_data($token)
	{
		\Config::load('oauth', true);
		
		$consumer = Consumer::factory(Config::get('oauth.twitter'));
		$options['token'] = $token->token;
		$options['secret'] = $token->secret;
		$access_token = Token::factory('access', $options);
		
		
		
		// http://api.twitter.com/1/users/lookup.format
		$request = new Request('GET', 'http://api.twitter.com/1/account.json', array(
			'id' => 6253282,
		));
		
		return $request->execute();
	}
	*/

} // End Provider_Twitter
