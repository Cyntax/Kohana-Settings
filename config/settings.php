<?php defined('SYSPATH') OR die('No direct script access.');

	$_results = DB_ORM::select('settings')->query();
	$settings = array();
	foreach($_results as $result)
		$settings[$result->name] = $result->value;
	return $settings;

// End of config/settings.php
