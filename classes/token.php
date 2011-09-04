<?php
/**
 * OAuth Token
 *
 * @package    Kohana/OAuth
 * @category   Token
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

abstract class Token {

	/**
	 * Create a new token object.
	 *
	 *     $token = Token::factory($name);
	 *
	 * @param   string  token type
	 * @param   array   token options
	 * @return  Token
	 */
	public static function factory($name, array $options = NULL)
	{
		$class = 'Token_'.\Inflector::classify($name);

		return new $class($options);
	}

	/**
	 * @var  string  token type name: request, access
	 */
	protected $name;

	/**
	 * @var  string  token key
	 */
	protected $token;

	/**
	 * @var  string  token secret
	 */
	protected $secret;

	/**
	 * Sets the token and secret values.
	 *
	 * @param   array   token options
	 * @return  void
	 */
	public function __construct(array $options = NULL)
	{
		if ( ! isset($options['token']))
		{
			throw new Exception('Required option not passed: :option',
				array(':option' => 'token'));
		}

		if ( ! isset($options['secret']))
		{
			throw new Exception('Required option not passed: :option',
				array(':option' => 'secret'));
		}

		$this->token = $options['token'];

		$this->secret = $options['secret'];
	}

	/**
	 * Return the value of any protected class variable.
	 *
	 *     // Get the token secret
	 *     $secret = $token->secret;
	 *
	 * @param   string  variable name
	 * @return  mixed
	 */
	public function __get($key)
	{
		return $this->$key;
	}

	/**
	 * Returns the token key.
	 *
	 * @return  string
	 */
	public function __toString()
	{
		return (string) $this->token;
	}

} // End Token
