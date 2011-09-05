<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @OAuthor     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */


Autoloader::add_core_namespace('OAuth');

Autoloader::add_classes(array(
	'OAuth\\OAuth'           => __DIR__.'/classes/oauth.php',
	'OAuth\\Exception'  	=> __DIR__.'/classes/oauth.php',

	'OAuth\\OAuth_Consumer'  => __DIR__.'/classes/oauth/consumer.php',
	'OAuth\\OAuth_Provider'  => __DIR__.'/classes/oauth/provider.php',
	
	'OAuth\\OAuth_Provider_Dropbox'  => __DIR__.'/classes/oauth/provider/dropbox.php',
	'OAuth\\OAuth_Provider_Twitter'  => __DIR__.'/classes/oauth/provider/twitter.php',
	'OAuth\\OAuth_Provider_Google'  => __DIR__.'/classes/oauth/provider/google.php',
	
	'OAuth\\OAuth_Request'  => __DIR__.'/classes/oauth/request.php',
	
	'OAuth\\OAuth_Request_Access' => __DIR__.'/classes/oauth/request/access.php',
	'OAuth\\OAuth_Request_Authorize' => __DIR__.'/classes/oauth/request/authorize.php',
	'OAuth\\OAuth_Request_Resource' => __DIR__.'/classes/oauth/request/resource.php',
	'OAuth\\OAuth_Request_Token'  => __DIR__.'/classes/oauth/request/token.php',
	
	'OAuth\\OAuth_Response'  => __DIR__.'/classes/oauth/response.php',
	'OAuth\\OAuth_Server'  => __DIR__.'/classes/oauth/server.php',
	'OAuth\\OAuth_Signature'  => __DIR__.'/classes/oauth/signature.php',
	'OAuth\\OAuth_Token'  => __DIR__.'/classes/oauth/token.php',
	'OAuth\\OAuth_Token_Access'  => __DIR__.'/classes/oauth/token/access.php',
	'OAuth\\OAuth_Token_Request'  => __DIR__.'/classes/oauth/token/request.php',
	
	'OAuth\\OAuth_Signature_HMAC_SHA1'  => __DIR__.'/classes/oauth/signature/hmac/sha1.php',
	
));


/* End of file bootstrap.php */