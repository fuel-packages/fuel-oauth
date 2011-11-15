<?php

namespace OAuth;

class Provider_Gmail extends Provider {

	public $name = 'gmail';
	
	public $uid_key = 'user_id';
	
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
		return array(
			'nickname' => null,
			'name' => null,
			'location' => null,
			'image' => null,
			'description' => null,
			'urls' => array(),
			'credentials' => array(
				'uid' => $token->uid,
				'provider' => $this->name,
				'token' => $token->token,
				'secret' => $token->secret,
			),
		);
	}

} // End Provider_Gmail