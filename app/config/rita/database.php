<?php

return array(


	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'uzem',
			'username'  => 'root',
			'password'  => '123',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		
		'depconnection' => array(
			'driver'    => 'mysql',
			'host'      => '172.16.0.11',
			'database'  => 'dep',
			'username'  => 'dep',
			'password'  => 'dep201409',
			'charset'   => 'utf8',
			'collation' => 'utf8_general_ci',
			'prefix'    => '',
		),

		'erehber' => array(
			'driver'    => 'mysql',
			'host'      => '172.16.0.23',
			'database'  => 'erehber',
			'username'  => 'personel',
			'password'  => '(PersoneL!)',
			'charset'   => 'utf8',
			'collation' => 'utf8_general_ci',
			'prefix'    => '',
		),

	),

);
