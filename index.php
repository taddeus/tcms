<?php

include_once 'pquery.config.php';
include_once PQUERY_ROOT.'pquery.php';

__p::require_plugins('template', 'sql');

__tpl::set_root('templates');

$menu = array(
	array('Pagina\'s', 'pages'),
	array('Nieuws', 'news'),
	array('Foto\'s', 'photos'),
	array('Accounts', 'accounts'),
	array('Instellingen', 'settings'),
	array('Uitloggen', 'logout')
);

$layout = _tpl('layout');

foreach( $menu as $i => $item ) {
	list($title, $icon) = $item;
	$item = $layout->data->add('menu')->set(array('title' => $title, 'icon' => $icon));
	$i || $item->set('active', 'active');
}

echo $layout->parse();

?>