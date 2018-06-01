<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Dou_Vacancies {

	const DOU_VACANCIES_URI_PATTERN = 'https://jobs.dou.ua/vacancies/{company}/feeds/';

	public static function load($company) {
		return Feed::loadRss(str_replace('{company}', $company, self::DOU_VACANCIES_URI_PATTERN));
	}
}
