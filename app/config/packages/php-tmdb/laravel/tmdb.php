<?php
/**
 * @package php-tmdb\laravel
 * @author Mark Redeman <markredeman@gmail.com>
 * @copyright (c) 2014, Mark Redeman
 */
return [
	/*
	* Api key
	*/
	'api_key' => $_ENV['TMDB_API'],

	/**
	* Client options
	*/
	'options' => [
		/**
		* Use https
		*/
		'secure' => true,

		/*
		* Cache
		*/
		'cache' => [
			'enabled' => false,
			// Keep the path empty or remove it entirely to default to storage/tmdb
			'path' => storage_path('tmdb')
		],

		/*
		* Log
		*/
		'log' => [
			'enabled' => false,
			// Keep the path empty or remove it entirely to default to storage/logs/tmdb.log
			'path' => storage_path('logs/tmdb.log')
		]
	],
];
