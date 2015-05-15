<?php

return array(

	'groups' => array(
		'default' => array(
			'salt' => $_ENV['HASH_HASHIDS'],
			'min_length' => 7,
			'alphabet' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
		)
	)
);
