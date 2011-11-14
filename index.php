<?php

//include_once '../debug.php';
include_once 'pquery.config.php';
include_once PQUERY_ROOT.'pquery.php';

__p::require_plugins('template', 'sql', 'url', 'js', 'css');

__tpl::set_root('templates');

__url::add_handlers(array(
	'css/(.*)' => 'css_handler',
	'js/(.*)' => 'js_handler',
	'' => 'layout',
	'(.*)' => 'content'
));

header('Vary: Accept-Encoding');

$handler = strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false ? 'ob_gzhandler' : '';

ob_start($handler);
_url($_SERVER['QUERY_STRING'])->handler();
ob_end_flush();

/**
 * 
 * 
 * @param string $files One or more scripts separated by commas (',').
 */
function js_handler($files) {
	$prepend_folder = create_function('$x', 'return "js/$x";');
	_js(array_map($prepend_folder, explode(',', $files)))->output();
}

function css_handler($files) {
	$prepend_folder = create_function('$x', 'return "css/$x";');
	_css(array_map($prepend_folder, explode(',', $files)))->output();
}

function content() {
	header('Content-Type: text/html; charset=utf-8');
	
	echo 'content';
}

function layout() {
	header('Content-Type: text/html; charset=utf-8');
	
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
}

?>