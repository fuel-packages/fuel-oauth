<?php
/**
 * Configuration for OAuth providers.
 */
return array(
	/**
	 * Twitter applications can be registered at https://twitter.com/apps.
	 * You will be given a "consumer key" and "consumer secret", which must
	 * be provided when making OAuth requests.
	 */
	'twitter' => array(
		'key' => '',
		'secret' => ''
	),
	
	'facebook' => array(
		'key' => '',
		'secret' => '',
		'scope' => 'publish_stream,offline_access,publish_checkins,user_location,read_stream,user_checkins'
	),
	
);