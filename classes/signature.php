<?php
/**
 * OAuth Signature
 *
 * @package    Kohana/OAuth
 * @category   Signature
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

abstract class Signature {

	/**
	 * Create a new signature object by name.
	 *
	 *     $signature = Signature::forge('HMAC-SHA1');
	 *
	 * @param   string  signature name: HMAC-SHA1, PLAINTEXT, etc
	 * @param   array   signature options
	 * @return  Signature
	 */
	public static function forge($name, array $options = NULL)
	{
		// Create the class name as a base of this class
		$class = '\\OAuth\\Signature_'.str_replace('-', '_', $name);

		return new $class($options);
	}

	/**
	 * @var  string  signature name: HMAC-SHA1, PLAINTEXT, etc
	 */
	protected $name;

	/**
	 * Return the value of any protected class variables.
	 *
	 *     $name = $signature->name;
	 *
	 * @param   string  variable name
	 * @return  mixed
	 */
	public function __get($key)
	{
		return $this->$key;
	}

	/**
	 * Get a signing key from a consumer and token.
	 *
	 *     $key = $signature->key($consumer, $token);
	 *
	 * [!!] This method implements the signing key of [OAuth 1.0 Spec 9](http://oauth.net/core/1.0/#rfc.section.9).
	 *
	 * @param   Consumer  consumer
	 * @param   Token     token
	 * @return  string
	 * @uses    OAuth::urlencode
	 */
	public function key(Consumer $consumer, Token $token = NULL)
	{
		$key = OAuth::urlencode($consumer->secret).'&';

		if ($token)
		{
			$key .= OAuth::urlencode($token->secret);
		}

		return $key;
	}

	abstract public function sign(Request $request, Consumer $consumer, Token $token = NULL);

	abstract public function verify($signature, Request $request, Consumer $consumer, Token $token = NULL);

} // End Signature
