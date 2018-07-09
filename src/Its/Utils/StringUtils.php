<?php
/**
 * Created by PhpStorm.
 * User: ngi
 * Date: 27/04/2018
 * Time: 19:37
 */

namespace Its\Utils;


class Sanitize {
	
	public static function checkBool($string){
	    $string = strtolower($string);
	    return (in_array($string, array("true", "false"), true));
	}

	static public function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	public static function codify($text) {
		$text = Sanitize::slugify($text);
		$text = preg_replace('/-+/', '', $text);
		return $text;
	}
}