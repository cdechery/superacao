<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Parametros do site
| -------------------------------------------------------------------
*/

$config['site_params'] = array(
	'erro_generico' => 'Ocorreu um erro inesperado',
	'erro_acesso' => 'Acesso negado',
	'titulo_site' => 'Instituto SuperAÇÃO',
	'image_settings' => array(
		'thumb_sizes' => array(40, 60, 80, 120, 200), // size of thumbs to generate
		'allowed_types' => array('jpeg', 'jpg', 'png'),
		'min_image_size' => '200'
	),
	'max_item_imgs' => 3,
	'upload' => array(
		'path' => './files/',
		'max_size' => (8*1024)
	),
	'update_tool' => array('password'=>'###changethis###',
		'skip_files'=>'' ),
	'pagseguro_token' => '72DCD89CDF314AB88EFA8299565DEF74',
	'pagseguro_email' => 'instituto.superacao@gmail.com'
);