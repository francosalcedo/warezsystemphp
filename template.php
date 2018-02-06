<?php

if($basic->runTemplateEnigne){
	Fenom::registerAutoload();
	$fenom 	= new Fenom(new Fenom\Provider($basic->template_dir));
	$fenom->setCompileDir($basic->template_cache_dir);
	if($basic->debug) $fenom->setOptions(Fenom::DISABLE_CACHE);

	/*
		@Modificadores fenom añadidos
	*/
	$fenom->addModifier('slug', function ($str, $delimiter = '-') {
		return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	});

}

class warez{
	static function slug($str, $delimiter = '-')
	{
		return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	}

	static function metas($data)
	{
		$description = sprintf($data['description'], $data['title'], $data['category']);
		$meta = "
		<meta content='".$description."' name='description' />
		<meta content='".$data['title']."' property='og:title' />
		<meta content='". $description ."' property='og:description' />
		";
		return $meta;
	}
}
