<?php

return array(
	'topMenu' => array(
		array('name' => 'Главная','url' => BASE_URL .''),
		array('name' => 'О компании','url' => BASE_URL .'/about'),
		array('name' => 'Контакты','url' => BASE_URL .'/contacts'),
		array('name' => 'Новости','url' => BASE_URL .'/news')
	),
	'db' => array(
		'dsn' => 'mysql:host=localhost;dbname=mvc_news',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
	),
);