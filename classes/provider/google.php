<?php

namespace OAuth;

class Provider_Google extends Provider {

	public $name = 'google';
	
	/**
	 * @var  string  scope separator, most use "," but some like Google are spaces
	 */
	public $scope_seperator = ' ';

	public function url_request_token()
	{
		return 'https://www.google.com/accounts/OAuthGetRequestToken';
	}

	public function url_authorize()
	{
		return 'https://www.google.com/accounts/OAuthAuthorizeToken';
	}

	public function url_access_token()
	{
		return 'https://www.google.com/accounts/OAuthGetAccessToken';
	}
	
	public function get_user_info(Consumer $consumer, Token $token)
	{
		// Create a new GET request with the required parameters
		$request = Request::factory('resource', 'GET', 'https://www.google.com/m8/feeds/contacts/default/full?max-results=1&alt=json', array(
			'oauth_consumer_key' => $consumer->key,
			'oauth_token' => $token->token,
		));

		// Sign the request using the consumer and token
		$request->sign($this->signature, $consumer, $token);

		$response = json_decode($request->execute(), true);
		
		// Fetch data parts
		$email = \Arr::get($response, 'feed.id.$t');
		$name = \Arr::get($response, 'feed.author.0.name.$t');
		$name == '(unknown)' and $name = $email;
		
		return array(
			'nickname' => \Inflector::friendly_title($name),
			'name' => $name,
			'email' => $email,
			'location' => null,
			'image' => null,
			'description' => null,
			'urls' => array(),
			'credentials' => array(
				'uid' => $email,
				'provider' => $this->name,
				'token' => $token->token,
				'secret' => $token->secret,
			),
		);
	}

} // End Provider_Gmail