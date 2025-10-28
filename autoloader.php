<?php

class Autoloader
{
	public static function register()
	{
        spl_autoload_register(function ($class) {

        	// namespace : App\Article
        	// fichier physique : App/Article.php

            $file = '../src/'.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';


            if (file_exists($file)) {
                require $file;
            }
        });
	}
}