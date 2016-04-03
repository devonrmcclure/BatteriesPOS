<?php

namespace App\Helpers;

class Phone
{
	public static function formatNumber($number)
	{
		$numbers_only = preg_replace("/[^\d]/", "", $number);
		return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
	}
}