<?php
/**
 * OAuth Request Token
 *
 * @package    Kohana/OAuth
 * @category   Token
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

class Token_Request extends Token {

	protected $name = 'request';

	/**
	 * @var  string  request token verifier
	 */
	protected $verifier;

	/**
	 * Change the token verifier.
	 *
	 *     $token->verifier($key);
	 *
	 * @param   string   new verifier
	 * @return  $this
	 */
	public function verifier($verifier)
	{
		$this->verifier = $verifier;

		return $this;
	}

} // End Token_Request
