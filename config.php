<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

require_once 'vendor/autoload.php';
$basic 	= new stdClass();
$sql 		= new stdClass();

// Activar o desactivar motor de plantillas
$basic->debug 							= true;
$basic->runTemplateEnigne		= true;
$basic->template_dir 				= 'tpl/';
$basic->template_cache_dir 	= 'tpl-cache/';
$basic->title 							= 'WarezSystem.com';
$basic->slogan 							= 'descargas ilimitadas';
$current 										= $_GET;

$basic->categoryMaxResults	= 20;

// %1$s   <== Titulo del post
// %2$s   <== Nombre del sitio web
$basic->meta->titleFormat				= 'Descargar %1$s  - %2$s';

// %1$s   <== Titulo del post
// %2$s   <== Categoria del post
$basic->meta->descrptionFormat	= 'descargar %1$s ahora gratis! en %2$s';

$basic->db_config 	= [
	'host'      => 'localhost',
	'driver'    => 'mysql',
	'database'  => 'warez',
	'username'  => 'user',
	'password'  => '',
	'charset'   => 'utf8',
	'collation' => 'utf8_general_ci',
	'prefix'    => ''
];



/*
	@No tocar
*/

$db 	= new \Buki\Pdox($basic->db_config);
