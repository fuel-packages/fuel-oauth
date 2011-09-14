<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The PLAINTEXT signature does not provide any security protection and should
 * only be used over a secure channel such as HTTPS.
 *
 * @package    Kohana/OAuth
 * @category   Signature
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

class Signature_PLAINTEXT extends Signature {

	protected $name = 'PLAINTEXT';

	/**
	 * Generate a plaintext signature for the request _without_ the base string.
	 *
	 *     $sig = $signature->sign($request, $consumer, $token);
	 *
	 * [!!] This method implements [OAuth 1.0 Spec 9.4.1](http://oauth.net/core/1.0/#rfc.section.9.4.1).
	 *
	 * @param   OAuth_Request   request
	 * @param   OAuth_Consumer  consumer
	 * @param   OAuth_Token     token
	 * @return  $this
	 */
	public function sign(Request $request, Consumer $consumer, Token $token = NULL)
	{
		// Use the signing key as the signature
		return $this->key($consumer, $token);
	}

	/**
	 * Verify a plaintext signature.
	 *
	 *     if ( ! $signature->verify($signature, $request, $consumer, $token))
	 *     {
	 *         throw new Exception('Failed to verify signature');
	 *     }
	 *
	 * [!!] This method implements [OAuth 1.0 Spec 9.4.2](http://oauth.net/core/1.0/#rfc.section.9.4.2).
	 *
	 * @param   string          signature to verify
	 * @param   OAuth_Request   request
	 * @param   OAuth_Consumer  consumer
	 * @param   OAuth_Token     token
	 * @return  boolean
	 * @uses    OAuth_Signature_PLAINTEXT::sign
	 */
	public function verify($signature, Request $request, Consumer $consumer, Token $token = NULL)
	{
		return $signature === $this->key($consumer, $token);
	}

} // End OAuth_Signature_PLAINTEXT
