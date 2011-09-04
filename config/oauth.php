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
		'key' => 'rTEn9REHxgE4OOrAva8mw',
		'secret' => 'FpQCqRQlZKNOYtcFMYI9RMcpeKF1p8AKNKcz9VL56E'
	),
	
	'facebook' => array(
		'key' => '166876746665872',
		'secret' => '31eab09faa60010e0dd6a81c8df14785',
		'scope' => 'publish_stream,offline_access,publish_checkins,user_location,read_stream,user_checkins'
	),
	
);