<?php
/**
 * Created by PhpStorm.
 * User: ngi
 * Date: 27/04/2018
 * Time: 19:37
 */

namespace Its\Utils;


class StringUtils {
	
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
		$text = self::slugify($text);
		$text = preg_replace('/-+/', '', $text);
		return $text;
	}
	
	public static function abbreviate($string) {
		if (strlen($string) >= 20) {
			return substr($string, 0, 10). " ... " . substr($string, -5);
		}
		else {
			return $string;
		}
	}
}