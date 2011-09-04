<?php
/**
 * OAuth Authorization Request
 *
 * @package    Kohana/OAuth
 * @category   Request
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */

namespace OAuth;

class Request_Authorize extends Request {

	protected $name = 'request';

	// http://oauth.net/core/1.0/#rfc.section.6.2.1
	protected $required = array(
		'oauth_token' => TRUE,
	);

	public function execute(array $options = NULL)
	{
		return \Response::redirect($this->as_url());
	}

} // End Request_Authorize