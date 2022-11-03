<?php

if (empty($lang) || !is_array($lang))
	$lang = [];

$lang += [
    'OVERRIDE_USER_DATEFORMAT'				=> 'Override user’s date format',
    'OVERRIDE_USER_DATEFORMAT_EXPLAIN'		=> 'Use the date format set above for all users and disable the corresponding user option.',
    'OVERRIDE_USER_TIMEZONE'				=> 'Override user’s time zone',
    'OVERRIDE_USER_TIMEZONE_EXPLAIN'		=> 'Use the guest timezone set above for all users and disable the corresponding user option.',
    'OVERRIDE_USER_TIMEZONE_NOTICE'			=> 'Infotip about timezone',
    'OVERRIDE_USER_TIMEZONE_NOTICE_EXPLAIN'	=> 'Short infotip to be displayed on the board index page, just after the current time. For example, “All times are UTC”.',
];
